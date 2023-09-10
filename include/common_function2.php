<?php
	

	//--make the date ------------------------
	function makeDateToYMDFromDMY($myDate,$separator,$returnSeparator)
	{
		$dateArray = explode($separator,$myDate);
		$result = $dateArray[2].$returnSeparator.$dateArray[1].$returnSeparator.$dateArray[0];
		return $result;
	}
	
	function makeDateToDMYFromYMD($myDate,$separator,$returnSeparator)
	{
		$dateArray = explode($separator,$myDate);
		$result = $dateArray[2].$returnSeparator.$dateArray[1].$returnSeparator.$dateArray[0];
		return $result;
	}

//START *********************** IMAGE UPLOAD FUNCTIONS *************************************************//	
	function chkValidExt($fileName,$validExt)
	{
		//start-- Check extension of file --
			$infoArr = pathinfo($_FILES[$fileName]['name']);
			$ext = $infoArr['extension'];
			if(sizeof($validExt))
			{
				if(in_array($ext,$validExt))
				{
					return '';
				}	
				else
				{	return "Extention is not valid !"; }
						
			}
			else
			{ return ''; }
			//end-- Check extension of file --
	}
	
	function chkOperatorWise($opt,$currentVal,$chkValFor,$errMsg)
	{
	
		switch($opt)
			{
				case '=':
					if($currentVal = $chkValFor)
						return ''; 
					else
						return $errMsg;	
						break;
				case '<=': 
					if($currentVal <= $chkValFor)
						return ''; 
					else
						return $errMsg;		
						break; 
				case '>=': 
					if($currentVal >= $chkValFor)
						return ''; 
					else
						return $errMsg;		
						break;
				default:
						return "chkWhat parameter is not valid";				
			}
	}
	
	
	function chkSizeParam($fileName,$sizeParam)
	{
		$currentSize=$_FILES[$fileName]["size"];
		
		if(sizeof($sizeParam))
		{
			if($sizeParam['fsize']!=0)
			{
				switch($sizeParam['unit'])
				{
					case 'byt': 
							$currentSize = $currentSize;
							break;
					case 'kb':
							$currentSize = number_format(($currentSize / 1024 ),2);
							break;
					case 'mb': 
							$currentSize = number_format((($currentSize / 1024 )/ 1024),2);
							break;
					default:
							return "Unit is not valid";		
				}
				
				$retErr=chkOperatorWise($sizeParam['unitOpt'],$currentSize,$sizeParam['fsize']," Size is not valid ! ");
				if($retErr!='')
					return $retErr;
			}		
				
					
			if($sizeParam['imgW']!=0 || $sizeParam['imgH']!=0)
			{			
				
				
				if(substr($_FILES[$fileName]['type'],0,5)=='image')
				{
					list($width, $height, $type, $attr) = getimagesize($_FILES[$fileName]['tmp_name']);
					
					if($sizeParam['imgW']!=0)
					{
						$wErr=chkOperatorWise($sizeParam['wOpt'],$width,$sizeParam['imgW'],"Width is not valid ! ");
						if($wErr!='')
							return $wErr;
					}
					if($sizeParam['imgH']!=0)
					{
						$hErr=chkOperatorWise($sizeParam['hOpt'],$height,$sizeParam['imgH'],"Height is not valid ! ");
						if($hErr!='')
							return $hErr;
					}
				
				}
			}
			
			return '';
		}
		else
		{
			return '';
		}		
	}
		
	
	function uploadFile($fileName='',$newPath='',$newFileName='',$validExt=array(),$fileSizeParam=array(),$delFromDIR=array())
	{
		if(is_uploaded_file($_FILES[$fileName]['tmp_name'])) 
		{
			//start-- Check extension of file --
			$extErr=chkValidExt($fileName,$validExt);
			if($extErr!='')
			{	return $extErr;	}
			
			//start-- check size parameters --
			$sizeErr=chkSizeParam($fileName,$fileSizeParam);
			if($sizeErr=='')
			{
				$newFileName.= $_FILES[$fileName]['name'];
				if(move_uploaded_file($_FILES[$fileName]['tmp_name'],$newPath.$newFileName))
				{	
					if(sizeof($delFromDIR)) //-- delete existing file from dir 
					{
						$sql="select ".$delFromDIR['imgFldName']." from ".$delFromDIR['tableName']." where ".$delFromDIR['pkFldName']."='".$delFromDIR['selRecID']."'";
						$oldImgName=@mysql_result(mysql_query($sql),0);
						if(file_exists($newPath.$oldImgName))
						{	@unlink($newPath.$oldImgName);	}
					}
					
					return $UpErr=array('err'=>'','file_name'=>$newFileName);	
				
				}
				else
				{	return $UpErr=array('err'=>'Error in uploading function !','file_name'=>'');	}
				
			}
			else
			{ return $sizeErr; }
		}	
	}		
//END *********************** IMAGE UPLOAD FUNCTIONS *************************************************//	



//START-- A COMMON FUNCTION FOR to DELETE SELECTED RECORDS [ SELECTED BY CHECKBOX] --//
	function delete_selected_record_by_checkbox($post,$table_name,$keyFieldName,$extraParaArr=array(),$deleteFile=array())
	{
		global $ss;
		
		if (empty($post['chk']))
			$g_error[] = 8;
		else
		{
			$id=implode(",",$post['chk']);
			if($post['action']=="delete")
			{
				//-- delete file (images,video etc.)-- //
				if(sizeof($deleteFile))
				{
					$totId=$post['chk'];
					foreach($totId as $idVal)
					{
						foreach($deleteFile as $dKey=>$dVal) // assign path(store folder) and file name to delete
						{
							$fetchFileName=@mysql_result(mysql_query("select ".$deleteFile[$dKey]['fileDbFldName']." from ".$table_name." where ".$keyFieldName."='".$idVal."'"),0);
							
							if(file_exists($deleteFile[$dKey]['path'].$fetchFileName))
							{
								unlink($deleteFile[$dKey]['path'].$fetchFileName);
							}
						}
					}
				}
				//-- delete file (images,video etc.)-- //
								
				#Delete the record 
				 $deleteSql2="delete from ".$table_name."  WHERE ".$keyFieldName." IN (".$id.")";
				 mysql_query($deleteSql2) or die(mysql_error());
				
			}
		}
		
		//--pass extra parameters by url --//
			$paraStr='';
			if(sizeof($extraParaArr))
			{
				foreach($extraParaArr as $key => $val)
				{
					$paraStr.= "&".$key."=".$val;	
				}
			}	
		//--pass extra parameters by url --//
				
		header("Location: ./?ss=".$ss.$paraStr);
		//die;
		
	}
	//END-- A COMMON FUNCTION FOR DELETE SELECTED RECORDS [SELECTED BY CHECKBOX] --//	
	

//START-- A COMMAON FUNCTION FOR SELECT SAVED DATA FOR EDITING   --//		
	function select_saved_data($tableName,$keyFieldName,$valueForWhere,$extraCondition='',$onlySelect=false)
	{
		global $db;
		
		if($onlySelect)
		$pass_sql1="select * from ".$tableName;
		else
		$pass_sql1="select * from ".$tableName." where ".$keyFieldName."='".$valueForWhere."' ";
		
		if($extraCondition!='') //-- if extra condition apply
		{ $pass_sql1.= $extraCondition; }
		return $db->GetQueryData($pass_sql1);
	}
	//END-- A COMMAON FUNCTION FOR SELECT SAVED DATA FOR EDITING   --//		

	//START-- A GLOBAL FUNCTION FOR SELECTE RECORD FOR PAGINATION --//
	function select_record_for_pagination($limitstart=0, $limit=0,$tableName,$conditionStartFromWhere='')
	{
		global $db;
		if($limitstart=='0' && $limit=='0'){
			$str="";
		}else
		{
			$str=" limit {$limitstart}, {$limit}";
		}
		
		$pass_sql1="select * from ".$tableName  . $conditionStartFromWhere ;
		
		
		
		$pass_sql1.=$str;
		return $db->GetQueryData($pass_sql1);
	}
	//END-- A GLOBAL FUNCTION FOR SELECTE RECORD FOR PAGINATION --//	

//start ==== add outlet ==========================================================//
function add_outlet($post,$logic)
{
	global $ss,$config;
	
	$country		=	$post['country'];
	$region		=	$post['region'];
	
	$client_id		=	$post['client_id'];
	$carrier_name	=	addslashes($post['carrier_name']);
	$city			=	addslashes($post['city']);
	$outlet_name	=	addslashes(ucfirst($post['outlet_name']));
	$address		=	addslashes($post['address']);
	
	if($logic=='a0')
		$elems[] = array('name'=>'country', 'label'=>'Country', 'type'=>'select', 'required'=>true);

	if($logic=='a1' || $logic=='01')
		$elems[] = array('name'=>'region', 'label'=>'Region', 'type'=>'select', 'required'=>true);

	if($logic=='a2' || $logic=='012' || $logic=='12' || $logic=='02')
	$elems[] = array('name'=>'city', 'label'=>'City', 'type'=>'select', 'required'=>true,);
	
	$elems[] = array('name'=>'outlet_name', 'label'=>'Outlet Name', 'type'=>'text', 'required'=>true,);
	
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
		//- check duplicate outlet ----
		$query	="select * from ".$config['tbl_prefix']."outlet where outlet_name='$outlet_name' and city ='$city' and carrier_id='$carrier_name' and address='$address'";
		
		$rs	=	mysql_query($query);
		if(mysql_num_rows($rs)>=1)
		{
			$error=6231;
			return $error;
			die;
		}
		else
		{	
			
			### Insert into table 
			$query_insert = "INSERT INTO ".$config['tbl_prefix']."outlet set 
			country='$country', 
			region='$region', 
			client_id='$client_id',
			carrier_id='$carrier_name',
			city='$city',
			outlet_name='$outlet_name',
			address='$address'";

			if(mysql_query($query_insert) or die(mysql_error()))
			{
				$error= 4;		
				header("Location: ./?ss=".$ss."&pulse=10&error=$error");
				die;
			}
		}	
		
	### End insersion
}
//end ====== add outlet ==========================================================//


//start ==== add outlet ==========================================================//
function update_outlet($post,$logic)
{
	global $ss,$config;
	
	$country		=	$post['country'];
	$region		=	$post['region'];
	
	$client_id		=	$post['client_id'];
	$carrier_name	=	addslashes($post['carrier_name']);
	$city			=	addslashes($post['city']);
	$outlet_name	=	addslashes(ucfirst($post['outlet_name']));
	$address		=	addslashes($post['address']);
	
	$update_id	=	$post['update_id'];
	
	if($logic=='a0')
		$elems[] = array('name'=>'country', 'label'=>'Country', 'type'=>'select', 'required'=>true);

	if($logic=='a1' || $logic=='01')
		$elems[] = array('name'=>'region', 'label'=>'Region', 'type'=>'select', 'required'=>true);

	if($logic=='a2' || $logic=='012' || $logic=='12' || $logic=='02')
	$elems[] = array('name'=>'city', 'label'=>'City', 'type'=>'select', 'required'=>true,);
	
	$elems[] = array('name'=>'outlet_name', 'label'=>'Outlet Name', 'type'=>'text', 'required'=>true,);
	
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
		$query	="select * from ".$config['tbl_prefix']."outlet where outlet_name='$outlet_name' and city ='$city' and carrier_id='$carrier_name' and address='$address' and outlet_id != $update_id ";
		
		$rs	=	mysql_query($query);
		if(mysql_num_rows($rs)>=1)
		{
			$error=6231;
			return $error;
			die;
		}
		else
		{
			### Insert into table 
			$query_insert = "update ".$config['tbl_prefix']."outlet set 
			country='$country', 
			region='$region', 
			client_id='$client_id',
			carrier_id='$carrier_name',
			city='$city',
			outlet_name='$outlet_name',
			address='$address' 
			where outlet_id='".$update_id."'
			";

			if(mysql_query($query_insert) or die(mysql_error()))
			{
				$error= 6;		
				header("Location: ./?ss=".$ss."&pulse=10&error=$error");
				die;
			}
		}
	### End insersion
}
//end ====== add outlet ==========================================================//


//start -- a common function for add user -----------------------------------------//
function add_user_master($post,$user_type=0)
{
	global $ss,$config;
	$name		=	$post['name'];
	$outlet_id	=	$post['outlet_id'];
	$emailid	=	$post['emailid'];
	$address1	=	$post['address1'];
	$address2	=	$post['address2'];
	$state		=	$post['state'];
	$city		=	$post['city'];
	$zip		=	$post['zip'];
	$username	= 	$post['username'];
	$password	= 	$post['password'];
	
	$outlet_name	= 	$post['outlet_name'];
	
	$elems[] = array('name'=>'name', 'label'=>'Name', 'type'=>'text', 'required'=>true);
	if($user_type=='3')
		$elems[] = array('name'=>'outlet_id', 'label'=>'Outlet Name', 'type'=>'select', 'required'=>true);
	
	$elems[] = array('name'=>'emailid', 'label'=>'Email ID', 'type'=>'text', 'required'=>true, 'cont' => 'email');
	$elems[] = array('name'=>'address1', 'label'=>'Address 1', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'state', 'label'=>'State', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'city', 'label'=>'City', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'zip', 'label'=>'Zip', 'type'=>'text', 'required'=>true,  'cont' => 'digit');
	$elems[] = array('name'=>'username', 'label'=>'Username', 'type'=>'text', 'required'=>true, 'len_min'=>'6', 'len_max'=>'12');
	$elems[] = array('name'=>'password', 'label'=>'Password', 'type'=>'text', 'required'=>true, 'len_min'=>'6', 'len_max'=>'12');
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	$uname=explode(' ',$username);
	$pword=explode(' ',$password);
	
	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else if(count($uname)>1)
	{
			$error= 12;		
			return $error; ## Error Space in user name.
	}
	else if(count($pword)>1)
	{
			$error= 13;		
			return $error; ## Error Space in pasword.
	}
	else if(empty($id))
	{
		### Start to check the duplicate entry
		$sql_select  =	"SELECT user_id FROM ".$config['tbl_prefix']."users WHERE username ='".$username."'";
		$rs 		 =	mysql_query($sql_select) or die(mysql_error());
		if(mysql_num_rows($rs) > 0){
			$error= 5;		
			return $error; ## Error for duplicate .
		}
		else
		{
			### Insert into table 
			$query_insert = "INSERT INTO ".$config['tbl_prefix']."users set 
			username='$username', 
			password='".md5($password)."', 
			password_temp='$password', 
			user_type='".$user_type."', 
			status='1',
			name='$name', 
			emailid='$emailid', 
			address1='$address1', 
			address2='$address2', 
			state='$state', 
			city='$city',
			zip='$zip',  
			outlet_id='$outlet_id',
			created_on=now()";
			
			//echo $query_insert; die;
			
			if(mysql_query($query_insert) or die(mysql_error()))
			{
				$insert_user_id=mysql_insert_id();
				if($user_type=='1')
				{
					$error= 4;		
					header("Location: ./?ss=".$ss."&pulse=11&error=$error");
					die;
				}
				if($user_type=='2')
				{
					//start -- update outlet for the client -----------------------------
					foreach($outlet_name as $val)
					{
						$update_outlet = "update ".$config['tbl_prefix']."outlet set 
						client_id='$insert_user_id' where outlet_id='$val'";
						mysql_query($update_outlet);
					}
					//end -- update outlet for the client -----------------------------		
				
					$error= 4;		
					header("Location: ./?ss=".$ss."&pulse=70&error=$error");
					die;
				}
				elseif($user_type=='3'){
					$msg  ="Hi {$name},\n\n";
					$msg .="Here is the login information for at MarketPulse.\n\n";
					$msg .="User Id: {$username}\n";
					$msg .="Password: {$password}\n\n";
					$msg .="You can login from http://pulsesuite.com/marketpulse/client/login.php \n\n";
					$msg .="Thank you for being our member.\n\n";
					$msg .="Warm Regards,\n";
					$msg .="Team MarketPulse\n";
					$msg .="MarketPulse";	
					$frommail="abhishek@wisitech.com";
					$headers = "";
					//@mail($emailid,'Login information from MarketPulse',$msg,$headers);	/// Please oncomment to sent mail in future.
					$error= 4;		
					header("Location: ./?ss=".$ss."&pulse=60&error=$error");
					die;
				}
				
			}
		}
	}### End insersion
}
//end -- a common function for add user --------------------------------------------// 


//start -- a common function for edit user -----------------------------------------//
function update_user_master($post,$user_type=0)
{
	global $ss,$config;
	$name		=	$post['name'];
	$outlet_id	=	$post['outlet_id'];
	$emailid	=	$post['emailid'];
	$address1	=	$post['address1'];
	$address2	=	$post['address2'];
	$state		=	$post['state'];
	$city		=	$post['city'];
	$zip		=	$post['zip'];
	$username	= 	$post['username'];
	$password	= 	$post['password'];
	
	$outlet_name	= 	$post['outlet_name'];
	
	$edit_id=$post['id'];
	
	$elems[] = array('name'=>'name', 'label'=>'Name', 'type'=>'text', 'required'=>true);
	if($user_type=='3')
		$elems[] = array('name'=>'outlet_id', 'label'=>'Outlet Name', 'type'=>'select', 'required'=>true);
	
	$elems[] = array('name'=>'emailid', 'label'=>'Email ID', 'type'=>'text', 'required'=>true, 'cont' => 'email');
	$elems[] = array('name'=>'address1', 'label'=>'Address 1', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'state', 'label'=>'State', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'city', 'label'=>'City', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'zip', 'label'=>'Zip', 'type'=>'text', 'required'=>true,  'cont' => 'digit');
	/*if(!isset($edit_id))
	{
		$elems[] = array('name'=>'username', 'label'=>'Username', 'type'=>'text', 'required'=>true, 'len_min'=>'6', 'len_max'=>'12');
		$elems[] = array('name'=>'password', 'label'=>'Password', 'type'=>'text', 'required'=>true, 'len_min'=>'6', 'len_max'=>'12');
	}*/
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	$uname=explode(' ',$username);
	$pword=explode(' ',$password);
	
	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else if(count($uname)>1)
	{
			$error= 12;		
			return $error; ## Error Space in user name.
	}
	else if(count($pword)>1)
	{
			$error= 13;		
			return $error; ## Error Space in pasword.
	}
	else if(!empty($edit_id))
	{
		### Start to check the duplicate entry
		$sql_select  =	"SELECT user_id FROM ".$config['tbl_prefix']."users WHERE username ='".$username."' and user_id!='".$edit_id."'";
		$rs 		 =	mysql_query($sql_select) or die(mysql_error());
		if(mysql_num_rows($rs) > 0){
			$error= 5;		
			return $error; ## Error for duplicate .
		}
		else
		{
			### Insert into table 
			$query_update = "update ".$config['tbl_prefix']."users set 
			
			user_type='".$user_type."', 
			status='1',
			name='$name', 
			emailid='$emailid', 
			address1='$address1', 
			address2='$address2', 
			state='$state', 
			city='$city',
			zip='$zip',  
			outlet_id='$outlet_id',
			created_on=now() where user_id='".$edit_id."'";
			
			//echo $query_insert; die;
			
			if(mysql_query($query_update) or die(mysql_error()))
			{
				$insert_user_id=$edit_id;
				if($user_type=='1')
				{
					$error= 6;		
					header("Location: ./?ss=".$ss."&pulse=11&error=$error");
					die;
				}
				if($user_type=='2')
				{
					//start -- update outlet for the client -----------------------------
					$res_outlet=mysql_query("select outlet_id from ".$config['tbl_prefix']."outlet where client_id='$insert_user_id'");
					while($fetchOut=mysql_fetch_array($res_outlet))
					{
						$update_outlet_to_blank = "update ".$config['tbl_prefix']."outlet set 
						client_id='' where outlet_id='".$fetchOut['outlet_id']."'";
						mysql_query($update_outlet_to_blank);
					}
					
					foreach($outlet_name as $val)
					{
						$update_outlet = "update ".$config['tbl_prefix']."outlet set 
						client_id='$insert_user_id' where outlet_id='$val'";
						mysql_query($update_outlet);
					}
					//end -- update outlet for the client -----------------------------		
					
					$error= 6;		
					header("Location: ./?ss=".$ss."&pulse=70&error=$error");
					die;
				}
				elseif($user_type=='3'){
					$msg  ="Hi {$name},\n\n";
					$msg .="Here is the login information for at MarketPulse.\n\n";
					$msg .="User Id: {$username}\n";
					$msg .="Password: {$password}\n\n";
					$msg .="You can login from http://pulsesuite.com/marketpulse/client/login.php \n\n";
					$msg .="Thank you for being our member.\n\n";
					$msg .="Warm Regards,\n";
					$msg .="Team MarketPulse\n";
					$msg .="MarketPulse";	
					$frommail="abhishek@wisitech.com";
					$headers = "";
					//@mail($emailid,'Login information from MarketPulse',$msg,$headers);	/// Please oncomment to sent mail in future.
					$error= 6;		
					header("Location: ./?ss=".$ss."&pulse=60&error=$error");
					die;
				}
				
			}
		}
	}### End insersion
}
//end -- a common function for edit user --------------------------------------------// 

// Super Admin Change Password Function Starts Here

	function change_password($post)
	{	
		global $config;
		$old_password		=	$_POST['old_password'];
		$new_password		=	$_POST['new_password'];
		$confirm_password	=	$_POST['confirm_password'];
		
		echo $search_user_query	=	"select * from ".$config['tbl_prefix']."users where user_id='".$_SESSION['user']['user_id']."'";
		
		
		$search_user_result  =	mysql_query($search_user_query);
		$search_user_row	=	mysql_num_rows($search_user_result);
	
		if($search_user_row>0)
			{
				$check_user_query	=	"select * from ".$config['tbl_prefix']."users where password='".md5($old_password)."' and user_id='".$_SESSION['user']['user_id']."'";
				$check_user_result 	=	mysql_query($check_user_query);
				$check_user_row		=	mysql_num_rows($check_user_result);
				
				if($check_user_row>0)
					{
						$update_user_query	=	"UPDATE ".$config['tbl_prefix']."users set password='".md5($new_password)."',password_temp='$new_password' where user_id=".$_SESSION['user']['user_id']."";
						$update_user_result	=	mysql_query($update_user_query);
						header("Location: ./?ss=".$ss."&pulse=8&error=95");
					}
				else
					{
						header("Location: ./?ss=".$ss."&pulse=8&error=96");
					}
			}
	}

// Super Admin Change Password Function Ends Here


	function edit_user_account($post,$user_type)
{
	
	global $ss,$config;
	$name		=	$post['name'];
	//$outlet_id	=	$post['outlet_id'];
	$emailid	=	$post['emailid'];
	$address1	=	$post['address1'];
	$address2	=	$post['address2'];
	$state		=	$post['state'];
	$city		=	$post['city'];
	$zip		=	$post['zip'];
	
	//$background_color	= 	$_POST['background_color'];
	$edit_id=$post['id'];
	
	//echo 'id'.$edit_id; die;
	
	$elems[] = array('name'=>'name', 'label'=>'Name', 'type'=>'text', 'required'=>true);
		
	$elems[] = array('name'=>'emailid', 'label'=>'Email ID', 'type'=>'text', 'required'=>true, 'cont' => 'email');
	$elems[] = array('name'=>'address1', 'label'=>'Address 1', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'state', 'label'=>'State', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'city', 'label'=>'City', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'zip', 'label'=>'Zip', 'type'=>'text', 'required'=>true,  'cont' => 'digit');
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	$uname=explode(' ',$username);
	$pword=explode(' ',$password);
	
	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else if(count($uname)>1)
	{
			$error= 12;		
			return $error; ## Error Space in user name.
	}
	else if(count($pword)>1)
	{
			$error= 13;		
			return $error; ## Error Space in pasword.
	}
	else if(!empty($edit_id))
	{
		### Start to check the duplicate entry
		$sql_select  =	"SELECT user_id FROM ".$config['tbl_prefix']."users WHERE username ='".$username."' and user_id!='".$edit_id."'";
		$rs 		 =	mysql_query($sql_select) or die(mysql_error());
		if(mysql_num_rows($rs) > 0){
			$error= 5;		
			return $error; ## Error for duplicate .
		}
		else
		{
			### Insert into table 
			$query_insert = "update ".$config['tbl_prefix']."users set 
			
			user_type='".$user_type."', 
			status='1',
			name='$name', 
			emailid='$emailid', 
			address1='$address1', 
			address2='$address2', 
			state='$state', 
			city='$city',
			zip='$zip',  
			created_on=now() where user_id='".$edit_id."'";
			
			//echo $query_insert; die;
			
			if(mysql_query($query_insert) or die(mysql_error()))
			{
				$insert_user_id=mysql_insert_id();
				if($user_type=='1')
				{
					$error= 6;		
					header("Location: ./?ss=".$ss."&pulse=11&error=$error");
					die;
				}
				if($user_type=='2')
				{
					$error= 6;		
					header("Location: ./?ss=".$ss."&pulse=81&error=$error");
					die;
				}
				elseif($user_type=='3'){
					$msg  ="Hi {$name},\n\n";
					$msg .="Here is the login information for at MarketPulse.\n\n";
					$msg .="User Id: {$username}\n";
					$msg .="Password: {$password}\n\n";
					$msg .="You can login from http://pulsesuite.com/marketpulse/client/login.php \n\n";
					$msg .="Thank you for being our member.\n\n";
					$msg .="Warm Regards,\n";
					$msg .="Team MarketPulse\n";
					$msg .="MarketPulse";	
					$frommail="abhishek@wisitech.com";
					$headers = "";
					//@mail($emailid,'Login information from MarketPulse',$msg,$headers);	/// Please oncomment to sent mail in future.
					$error= 6;		
					header("Location: ./?ss=".$ss."&pulse=81&error=$error");
					die;
				}
				
			}
		}
	}### End insersion

}

// Create month drop down list
function create_month_ddl($selected_month='',$width='138px',$selecttype='Select')
{
	global $config_month_ddl;
	
	
	$month_str = '';
	$month_str .= "<select name='month_ddl' id='month_ddl' style='width:$width;'  >
                   <option value=''>-- $selecttype --</option>";

				  foreach($config_month_ddl as $key_val => $month_val)
				  {
					if($selected_month==$key_val)
						$sel_month='selected';
					else
						$sel_month='';	
					$month_str .= "<option value='".$key_val."' $sel_month>$month_val</option>";
				  }
   $month_str .= "</select>";
   echo $month_str;
}
//END - ADD N UPDATE -- GIFT --------------------------------------------