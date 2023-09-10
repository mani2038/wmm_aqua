<?php
	
	
	function  update_model_number_master($post)
{
	global $ss,$config;
	$model_number		=	$_POST['model_number'];
	$more_info			=	$_POST['more_info'];
	$id		=	$_POST['id'];
	$_SESSION['model_id']=$id;
	$elems[] = array('name'=>'model_number', 'label'=>'Model Number', 'type'=>'text', 'required'=>true);
	$f = new FormValidator($elems);
	$err = $f->validate($post);
	if ($err === true)
	{
		return $valid_array = $f->getValidElems();
	}
	 $query			=	"select * from ".$config['tbl_prefix']."model_number where model_number='$model_number' and model_id !='$id'";
	
	$rs				=	mysql_query($query);
	if($_FILES['model_image']['name']!='')
				{	
				
			$sql1=mysql_query("SELECT model_image FROM ".$config['tbl_prefix']."model_number WHERE model_id=".$id);
			 $del_item=mysql_result($sql1,0);
			if($del_item!=''){
			@unlink("uploaded_file/model_image/".$del_item);
			}
	
					$newPath="uploaded_file/model_image/";
					$newFile=$id."_";
					$ext=array('jpg','gif','png');
					$size=array('fsize'=>0,'unit'=>'kb','unitOpt'=>'<=','imgW'=>0,'wOpt'=>'<=','imgH'=>0,'hOpt'=>'<=');
					
					$errMsg=uploadFile("model_image",$newPath,$newFile,$ext,$size,'');
					if($errMsg['err']!='')
					{ echo $errMsg['err']; die;}
					else
					{ $fileName=$errMsg['file_name']; }
					
					$update_gift="update ".$config['tbl_prefix']."model_number set model_image='".$fileName."' where model_id='".$id."'";
					mysql_query($update_gift);
				}
	if(mysql_num_rows($rs)>=1)
	{
		$error=629;
		return $error;
		//header("Location: ./?ss=".$ss."&life=22&error=629");
		//die;
	}
	else
	{
		$sql_insert	=	"update ".$config['tbl_prefix']."model_number set model_number='$model_number', more_info='$more_info', modified_on=now(), modified_by='".$_SESSION['user']['user_id']."'  where model_id='$id'";
		if(mysql_query($sql_insert))
		{
			$error=630;
		return $error;
			//header("Location: ./?ss=".$ss."&life=15&error=630&ns=1&model_id=".$id);
			//die;
		}
	}
}

function add_model_number_master($post)
{
	global $ss,$config;
	$model_number		=	$_POST['model_number'];
	$more_info		=	addslashes($_POST['more_info']);
	
	$elems[] = array('name'=>'model_number', 'label'=>'Model Number', 'type'=>'text', 'required'=>true);
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else if(empty($id))
	{
		$sql_select  =	"SELECT * FROM ".$config['tbl_prefix']."model_number WHERE model_number='".$model_number."'";
		$rs 		 =	mysql_query($sql_select) or die(mysql_error());
		if(mysql_num_rows($rs) > 0){
			$error= 629;		
			return $error; ## Error for duplicate .
		}
		else
		{
			### Insert into table 
			$query_insert = "INSERT INTO ".$config['tbl_prefix']."model_number set model_number='$model_number', more_info='$more_info', created_on=now(), created_by='".$_SESSION['user']['user_id']."'";
			
			
			
			
			if(mysql_query($query_insert) or die(mysql_error()))
			{
				$id=mysql_insert_id();
				$_SESSION['model_id']=$id;
				if($_FILES['model_image']['name']!='')
				{	
				
					$newPath="uploaded_file/model_image/";
					$newFile=$id."_";
					$ext=array('jpg','gif','png');
					$size=array('fsize'=>0,'unit'=>'kb','unitOpt'=>'<=','imgW'=>0,'wOpt'=>'<=','imgH'=>0,'hOpt'=>'<=');
					
					$errMsg=uploadFile("model_image",$newPath,$newFile,$ext,$size,'');
					if($errMsg['err']!='')
					{ echo $errMsg['err']; die;}
					else
					{ $fileName=$errMsg['file_name']; }
					
					$update_gift="update ".$config['tbl_prefix']."model_number set model_image='".$fileName."' where model_id='".$id."'";
					mysql_query($update_gift);
				}
				
				$error= 628;
				//header("Location: ./?life=15");	
				return $error;
			}

	}}### End insersion
}

	  function carrierName($carierId)
	  {
		global $config;
		$carrier_name=@mysql_result(mysql_query("select carrier_name from ".$config['tbl_prefix']."carrier where carrier_id='$carierId'"),0);
		return $carrier_name;
	  }
	 function zoneName($zoneId)
	  {
		global $config;
		$zone_name=@mysql_result(mysql_query("select city_name from ".$config['tbl_prefix']."city where city_id='$zoneId'"),0);
		return $zone_name;
	  }
	  function clientName($clientId)
	  {
		global $config;
		$client_name=@mysql_result(mysql_query("select name from ".$config['tbl_prefix']."users where user_id='$clientId'"),0);
		return $client_name;
	  }
	
	  function getUserName($userId)
	  {
	  	return clientName($userId);
		
	  }
  	  // get carrier id from outlet id
	  function carrierid_from_outletid($outlet_id)
		{
			global $config;
			$outlet_sql="select * from ".$config['tbl_prefix']."outlet  where outlet_id ='$outlet_id'";
			$outlet_rs=mysql_query($outlet_sql);
			if(mysql_num_rows($outlet_rs)>0)
			{
				
				$outlet_data=mysql_fetch_array($outlet_rs);
				$carrier_id=$outlet_data['carrier_id'];
			}	
			return $carrier_id;
		}


	  // get client id from outlet id
	  function clientid_from_outletid($outlet_id)
		{
			global $config;
			$outlet_sql="select * from ".$config['tbl_prefix']."outlet  where outlet_id ='$outlet_id'";
			$outlet_rs=mysql_query($outlet_sql);
			if(mysql_num_rows($outlet_rs)>0)
			{
				
				$outlet_data=mysql_fetch_array($outlet_rs);
				$client_id=$outlet_data['client_id'];
			}	
			return $client_id;
		}
	  // get outlet id from user id	
	function outletid_from_userid($user_id)
			{
				global $config;
				$outlet_sql="select * from ".$config['tbl_prefix']."users  where user_id ='$user_id' and user_type='3'";
				$outlet_rs=mysql_query($outlet_sql);
				if(mysql_num_rows($outlet_rs)>0)
				{
					
					$outlet_data=mysql_fetch_array($outlet_rs);
					$outlet_id=$outlet_data['outlet_id'];
				}	
				return $outlet_id;
			}
	
	//-- get Outlet ID of a client -----------------------
	function getOutletIdOfClient($user_id)
	{
		global $config;
		
		$sel_outlet="SELECT * FROM ".$config['tbl_prefix']."outlet WHERE client_id = '".$user_id."'";
		$res_outlet=mysql_query($sel_outlet);
		$arr_outlet=array();
		while($fetch_outlet=mysql_fetch_array($res_outlet))
		{
			$arr_outlet[]=$fetch_outlet['outlet_id'];
		}
		
		if(sizeof($arr_outlet))
		{
			$in_outlet_id=implode(',',$arr_outlet);
			return $in_outlet_id;
		}	
		else
			return 0;	
	}
	
	// Sales by Carrier
	function sales_by_carrier($carrier_id)
	{
		global $config;
		 $sql="select * from ".$config['tbl_prefix']."outlet  where carrier_id ='$carrier_id'";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)>0)
		{
			$user_array=array();
			$index=0;
			while($data=mysql_fetch_array($rs))
			{
				$user_sql="select * from ".$config['tbl_prefix']."users where outlet_id ='".$data['outlet_id']."' and user_type='3'";
				$user_rs=mysql_query($user_sql);
				if(mysql_num_rows($user_rs)>0)
				{
					while($user_data=mysql_fetch_array($user_rs))
					{
						$user_array[$index]['user_id']=$user_data['user_id'];
						$user_array[$index]['outlet_id']=$data['outlet_id'];
						$index++;
					}
				}
				
			}
		}	
		return $user_array;
	}
	
	// sales by Client
	function sales_by_client($client_id)
	{
		global $config;
		$client_sql="select * from ".$config['tbl_prefix']."outlet  where client_id ='$client_id'";
		$client_rs=mysql_query($client_sql);
		if(mysql_num_rows($client_rs)>0)
		{
			$user_array=array();
			$index=0;
			while($client_data=mysql_fetch_array($client_rs))
			{
				$user_sql="select * from ".$config['tbl_prefix']."users where outlet_id ='".$client_data['outlet_id']."' and user_type='3'";
				$user_rs=mysql_query($user_sql);
				if(mysql_num_rows($user_rs)>0)
				{
					while($user_data=mysql_fetch_array($user_rs))
					{
						$user_array[$index]['user_id']=$user_data['user_id'];
						$user_array[$index]['outlet_id']=$client_data['outlet_id'];
						$index++;
					}
				}
				
			}
		}	
		return $user_array;
	}
	function salespersonid_from_client($client_id)
	{
		global $config;
		$client_sql="select * from ".$config['tbl_prefix']."outlet  where client_id ='$client_id'";
		$client_rs=mysql_query($client_sql);
		if(mysql_num_rows($client_rs)>0)
		{
			$user_array=array();
			$index=0;
			while($client_data=mysql_fetch_array($client_rs))
			{
				$user_sql="select * from ".$config['tbl_prefix']."users where outlet_id ='".$client_data['outlet_id']."' and user_type='3'";
				$user_rs=mysql_query($user_sql);
				if(mysql_num_rows($user_rs)>0)
				{
					while($user_data=mysql_fetch_array($user_rs))
					{
						$user_array[$index]=$user_data['user_id'];
						$index++;
					}
				}
				
			}
		}	
		return $user_array;
	}
	// Sales by outlet
	function sales_by_outlet($outlet_id)
		{
			global $config;
				$user_array=array();
				$index=0;
					$user_sql="select * from ".$config['tbl_prefix']."users where outlet_id ='".$outlet_id."' and user_type='3'";
					$user_rs=mysql_query($user_sql);
					if(mysql_num_rows($user_rs)>0)
					{
						while($user_data=mysql_fetch_array($user_rs))
						{
							$user_array[$index]['user_id']=$user_data['user_id'];
							$user_array[$index]['outlet_id']=$outlet_id;
							$index++;
						}
					}
			return $user_array;
		}
		function sales_by_outlet_multiple($outlet_id_arr)
		{
			global $config;
				$user_array=array();
				$index=0;
					
				if(count($outlet_id_arr)>0)
				{
					foreach($outlet_id_arr as $outlet_id)
					{
						$user_sql="select * from ".$config['tbl_prefix']."users where outlet_id ='".$outlet_id."' and user_type='3'";
						$user_rs=mysql_query($user_sql);
						if(mysql_num_rows($user_rs)>0)
						{
							while($user_data=mysql_fetch_array($user_rs))
							{
								$user_array[$index]['user_id']=$user_data['user_id'];
								$user_array[$index]['outlet_id']=$outlet_id;
								$index++;
							}
						}
					}
					
				}
					
			return $user_array;
		}

		function userid_from_clientid($clientid)
		{
			global $config;
			$sql="select outlet_id from ".$config['tbl_prefix']."outlet  where client_id ='".$clientid."'";
			$rs=mysql_query($sql);
			if(mysql_num_rows($rs)>0)
			{
				$outlet_list='';
				while($data=mysql_fetch_array($rs))
				{
					$outlet_list.=$data['outlet_id'].",";
				}
			}	
			  $outlet_list = rtrim($outlet_list,",");
			  
			if($outlet_list!='')
			{ 
				$sql_user="select * from ".$config['tbl_prefix']."users  where outlet_id IN (".$outlet_list.")";
				$rs_user=mysql_query($sql_user);
				if(mysql_num_rows($rs_user)>0)
				{
					$user_list='';
					while($data=mysql_fetch_array($rs_user))
					{
						$user_list.=$data['user_id'].",";
					}
				}		
				 $user_list = rtrim($user_list,",");
			}	 
			 return $user_list;
		}

	////MAKE TOTAL POINTS OF A USER ------------------------
//	function makeTotalPoint($user_id)
//	{
//		global $ss,$config,$db;
//		
//		$total_point=@mysql_result(mysql_query("SELECT sum(point) FROM ".$config['tbl_prefix']."earn_points where user_id='".$user_id."' group by user_id"),0);
//		$sql_user="select * from ".$config['tbl_prefix']."total_points where user_id='".$user_id."'";
//		$user_exist=@mysql_result(mysql_query($sql_user),0);
//		if($user_exist)
//		{
//			mysql_query("update ".$config['tbl_prefix']."total_points set total_point='".$total_point."' where user_id='".$user_id."'");
//		}	
//		else
//		{
//			$sql_insert="insert into ".$config['tbl_prefix']."total_points set user_id='".$user_id."',total_point='".$total_point."'";
//			mysql_query($sql_insert);
//		}
//		
//		
//	}
	
	//GET TOTAL POINTS OF A USER ------------------------
	function getTotalPoint($user_id)
	{
		global $ss,$config,$db;
		
		$total_point=@mysql_result(mysql_query("SELECT sum(point) FROM ".$config['tbl_prefix']."earn_points where user_id='".$user_id."' group by user_id"),0);
		
		/*$total_p2=@mysql_result(mysql_query("SELECT sum(tot_points) FROM ".$config['tbl_prefix']."used_points_details WHERE status=0 and used_point_id=(select used_point_id from ".$config['tbl_prefix']."used_points where user_id='".$user_id."') group by used_point_id"));
		
		$total_point=$total_p1 + $total_p2 ;*/
		
		if($total_point)
			return $total_point;
		else
			return 0;	
	}
	
	
	
	
	//GET USED POINTS OF A USER ------------------------
	function getUsedPoint($user_id)
	{
		global $ss,$config,$db;
		
		//--from temp table (in cart)
		$sql_used1="SELECT sum(tot_points) FROM ".$config['tbl_prefix']."temp_used_points WHERE user_id = '".$user_id."'
		GROUP by user_id";
		$res_used1=@mysql_query($sql_used1);
		 $used_tot1=@mysql_result($res_used1,0);
		
		//--for approved or not verified 
		
		//echo $sql_used2="SELECT sum(tot_points) as  FROM ".$config['tbl_prefix']."used_points_details WHERE used_point_id=(select used_point_id from ".$config['tbl_prefix']."used_points where user_id='".$user_id."') and (status=1 || status=2 ) group by used_point_id";
		
		$sql_used2="select sum(tot_p) as tot from (SELECT sum(tot_points) as tot_p FROM ".$config['tbl_prefix']."used_points_details WHERE used_point_id in(".getUsedPointsIDCount($user_id).") and (status=1 || status=2 ) group by used_point_id ) as tot_result";
		
				
		$res_used2=@mysql_query($sql_used2);
		//$used_tot2=@mysql_result($res_used2,0);
		$used_tot2=mysql_fetch_array($res_used2);
		$res_sum=$used_tot2['tot'];
		/*$res_sum=0;
		while($ftot=mysql_fetch_array($res_used2))
		{
			$res_sum= $res_sum + $ftot['tpt_p'];
		}*/
		
	 	$tot_used_points= ($used_tot1 + $res_sum) ;
		
		if($tot_used_points)
			return $tot_used_points;
		else
			return 0;	
	}
	
	
	//--
	function getUsedPointsIDCount($user_id)
	{
		global $config;
		
		$sel_outlet="select used_point_id from ".$config['tbl_prefix']."used_points where user_id='".$user_id."'";
		$res_outlet=mysql_query($sel_outlet);
		$arr_outlet=array();
		while($fetch_outlet=mysql_fetch_array($res_outlet))
		{
			$arr_outlet[]=$fetch_outlet['used_point_id'];
		}
		
		if(sizeof($arr_outlet))
		{
			$in_outlet_id=implode(',',$arr_outlet);
			return $in_outlet_id;
		}	
		else
			return 0;	
	}
	
	
	////MAKE USED POINTS OF A USER ------------------------
//	function manageUsedPoint($user_id)
//	{
//		global $ss,$config,$db;
//		
//		echo "<br>".$sql_used="SELECT sum( gift.gift_point * temp.gift_qty ) as upoint
//		FROM ".$config['tbl_prefix']."gift_product AS gift, ".$config['tbl_prefix']."temp_used_points AS temp
//		WHERE temp.gift_id = gift.gift_id
//		AND temp.user_id = '".$user_id."'
//		GROUP by temp.user_id";
//		
//		$used_point_from_temp=mysql_fetch_array(mysql_query($sql_used));
//		echo "<br>used-point-temp=". $used_point_from_temp['upoint']; 
//		
//		
//		
//		echo "<br>".$sql2="SELECT sum(total_used_point) FROM ".$config['tbl_prefix']."used_points WHERE user_id = '".$user_id."' GROUP by user_id";
//		$res_sql2=mysql_query($sql2);
//		$used_points_from_used_points=@mysql_result($res_sql2,0);
//		echo  "<br>used-point-from-used=".$used_points_from_used_points;
//		
//		echo "<br>tot-used-point=". $tot_used_points=$used_point_from_temp['upoint'] + $used_points_from_used_points ;
//		
//		//die;
//		mysql_query("update ".$config['tbl_prefix']."total_points set used_point='".$tot_used_points."' where user_id='".$user_id."'");
//		
//		
//	}
//	
	
	//PRINT TOTAL POINTS OF A USER------------------
	function print_total_points($user_id)
	{
		global $config;
		$total_point=select_saved_data($config['tbl_prefix']."total_points","user_id",$user_id,"");
		if($total_point)
			return $total_point[0]->total_point; 
		else
			return 0;	
	}
	
	//PRINT USED POINTS OF A USER------------------
	function print_used_points($user_id)
	{
		global $config;
		$used_point=select_saved_data($config['tbl_prefix']."total_points","user_id",$user_id,"");
		if($used_point)
			return $used_point[0]->used_point; 
		else
			return 0;	
	}


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

function area_combo_data($table, $val1, $htm1, $selected='', $ord='',$ext1='',$ext2='',$ext3=''){
				$stri='';
				$pass_sql1="select * from ".$table ;
				(strlen($ext1) > 0)  ?	$pass_sql1.=" ".$ext1  :  $pass_sql1.="" ;
				(strlen($ext2) > 0)  ?	$pass_sql1.=" ".$ext2  :  $pass_sql1.="" ;
				(strlen($ext3) > 0)  ?	$pass_sql1.=" ".$ext3  :  $pass_sql1.="" ;
				(strlen($ord) > 0)  ?	$pass_sql1.=" ".$ord  :  $pass_sql1.="" ;

			$rs=mysql_query($pass_sql1);
			
			if(is_array($selected))
					{
						while ($row = mysql_fetch_array($rs))
							{	
								(in_array($row[$val1],$selected)) ? $sel="selected" : $sel='';
								$stri.='<option value="'.$row[$val1].'" '.$sel.'>'.stripslashes(ucfirst($row[$htm1])).'</option>';
							}
					}
				else
				{
					while ($row = mysql_fetch_array($rs))
						{
								($row[$val1]==$selected) ? $sel="selected" : $sel='';
								$stri.='<option value="'.$row[$val1].'" '.$sel.'>'.stripslashes(ucfirst($row[$htm1])).'</option>';
						}
				}
				//echo $pass_sql1;
			return $stri;
		}
		
		
function area_combo_outlet($table, $val1, $htm1, $selected='', $ord='',$ext1='',$ext2='',$ext3=''){
				$stri='';
				$pass_sql1="select * from ".$table ;
				(strlen($ext1) > 0)  ?	$pass_sql1.=" ".$ext1  :  $pass_sql1.="" ;
				(strlen($ext2) > 0)  ?	$pass_sql1.=" ".$ext2  :  $pass_sql1.="" ;
				(strlen($ext3) > 0)  ?	$pass_sql1.=" ".$ext3  :  $pass_sql1.="" ;
				(strlen($ord) > 0)  ?	$pass_sql1.=" ".$ord  :  $pass_sql1.="" ;

			$rs=mysql_query($pass_sql1);
			
			if(is_array($selected))
					{
						while ($row = mysql_fetch_array($rs))
							{	
								(in_array($row[$val1],$selected)) ? $sel="selected" : $sel='';
								$stri.='<option value="'.$row[$val1].'" '.$sel.'>'.stripslashes(ucfirst($row[$htm1]))."&nbsp;-&nbsp;".stripslashes(zoneName($row['city']))."&nbsp;-&nbsp;".stripslashes($row['address']).'</option>';
							}
					}
				else
				{
					while ($row = mysql_fetch_array($rs))
						{
								($row[$val1]==$selected) ? $sel="selected" : $sel='';
								$stri.='<option value="'.$row[$val1].'" '.$sel.'>'.stripslashes(ucfirst($row[$htm1]))."&nbsp;-&nbsp;".stripslashes(zoneName($row['city']))."&nbsp;-&nbsp;".stripslashes($row['address']).'</option>';
						}
				}
				//echo $pass_sql1;
			return $stri;
		}
				
//------------------------------------------------------------------------------------------

	function add_country_master($post)
{
	global $ss,$config;
	$country		=	ucfirst($_POST['country']);
	
	$elems[] = array('name'=>'country', 'label'=>'Country Name', 'type'=>'text', 'required'=>true);
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else if(empty($id))
	{
		### Start to check the duplicate entry
		$sql_select  =	"SELECT * FROM ".$config['tbl_prefix']."country WHERE country_name='".$country."' and created_by='".$_SESSION['user']['user_id']."'";
		$rs 		 =	mysql_query($sql_select) or die(mysql_error());
		if(mysql_num_rows($rs) > 0){
			$error= 601;		
			return $error; ## Error for duplicate .
		}
		else
		{
			### Insert into table 
			$query_insert = "INSERT INTO ".$config['tbl_prefix']."country set country_name='$country', created_on=now(), created_by='".$_SESSION['user']['user_id']."', parent_id='".$_SESSION['user']['created_by']."'";
			mysql_query($query_insert);
			$error= 600;		
			return $error;

	}}### End insersion
}

function  update_country_master($post)
{
	global $ss,$config;
	$country		=	ucfirst($_POST['country']);
	$id		=	$_POST['id'];
	$elems[] = array('name'=>'country', 'label'=>'Country Name', 'type'=>'text', 'required'=>true);
	$f = new FormValidator($elems);
	$err = $f->validate($post);
	if ($err === true)
	{
		return $valid_array = $f->getValidElems();
	}
	$query			=	"select * from ".$config['tbl_prefix']."country where country_name='$country' and created_by='".$_SESSION['user']['user_id']."' and country_id !='$id'";
	$rs				=	mysql_query($query);
	if(mysql_num_rows($rs)>=1)
	{
		header("Location: ./?ss=".$ss."&life=81&error=601");
		die;
	}
	else
	{
		$sql_insert	=	"update ".$config['tbl_prefix']."country set country_name='$country', modified_on=now(), modified_by='".$_SESSION['user']['user_id']."'  where country_id='$id'";
		if(mysql_query($sql_insert))
		{
			header("Location: ./?ss=".$ss."&life=81&error=602");
			die;
		}
	}
}

function add_region_master($post,$logic)
{
	global $ss,$config;
	
	
	$region		=	ucfirst($_POST['region']);
	$country		=	$_POST['country'];
	
	if($logic=='a01' || $logic=='a012')
		$elems[] = array('name'=>'country', 'label'=>'Country Name', 'type'=>'select', 'required'=>true);
	
	$elems[] = array('name'=>'region', 'label'=>'Region Name', 'type'=>'text', 'required'=>true);
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else if(empty($id))
	{
		### Start to check the duplicate entry
		if($logic=='a01' || $logic=='a012')
		{	
			$sql_select  =	"SELECT * FROM ".$config['tbl_prefix']."region WHERE region_name='".$region."' and country_id='".$country."' and created_by='".$_SESSION['user']['user_id']."'"; 
		}
		else
		{
			$sql_select  =	"SELECT * FROM ".$config['tbl_prefix']."region WHERE region_name='".$region."' and created_by='".$_SESSION['user']['user_id']."'"; 
		}
		
		$rs 		 =	mysql_query($sql_select) or die(mysql_error());
		if(mysql_num_rows($rs) > 0){
			$error= 611;		
			return $error; ## Error for duplicate .
		}
		else
		{
			### Insert into table 
			$query_insert = "INSERT INTO ".$config['tbl_prefix']."region set region_name='$region', country_id='$country', created_on=now(), created_by='".$_SESSION['user']['user_id']."', parent_id='".$_SESSION['user']['created_by']."'";
			mysql_query($query_insert);
			$error= 610;		
			return $error;

	}}### End insersion
}

function  update_region_master($post,$logic)
{
	global $ss,$config;
	$region		=	ucfirst($_POST['region']);
	$country		=	$_POST['country'];
	$id		=	$_POST['id'];
	if($logic=='a01' || $logic=='a012')
		$elems[] = array('name'=>'region', 'label'=>'Region Name', 'type'=>'text', 'required'=>true);
	
	$elems[] = array('name'=>'country', 'label'=>'Country Name', 'type'=>'select', 'required'=>true);
	$f = new FormValidator($elems);
	$err = $f->validate($post);
	if ($err === true)
	{
		return $valid_array = $f->getValidElems();
	}
	
	if($logic=='a01' || $logic=='a012')
	{	
		$query	=	"select * from ".$config['tbl_prefix']."region where region_name='$region' and country_id='$country' and created_by='".$_SESSION['user']['user_id']."' and region_id !='$id'";
	}
	else
	{
		$query	=	"select * from ".$config['tbl_prefix']."region where region_name='$region' and created_by='".$_SESSION['user']['user_id']."' and region_id !='$id'";
	}	
	
	$rs				=	mysql_query($query);
	if(mysql_num_rows($rs)>=1)
	{
		header("Location: ./?ss=".$ss."&life=82&error=611");
		die;
	}
	else
	{
		$sql_insert	=	"update ".$config['tbl_prefix']."region set region_name='$region', country_id='$country', modified_on=now(), modified_by='".$_SESSION['user']['user_id']."'  where region_id='$id'";
		if(mysql_query($sql_insert))
		{
			header("Location: ./?ss=".$ss."&life=82&error=612");
			die;
		}
	}
}


function add_city_master($post,$logic)
{
	global $ss,$config;
	$city		=	ucfirst($_POST['city']);
	$region		=	$_POST['region'];
	$country		=	$_POST['country'];
	
	if($logic=='a02' || $logic=='a012')
		$elems[] = array('name'=>'country', 'label'=>'Country Name', 'type'=>'select', 'required'=>true);
	if($logic=='a12' || $logic=='a012')
		$elems[] = array('name'=>'region', 'label'=>'Region Name', 'type'=>'select', 'required'=>true);
	
	$elems[] = array('name'=>'city', 'label'=>'City Name', 'type'=>'text', 'required'=>true);
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else if(empty($id))
	{
		### Start to check the duplicate entry
		if($logic=='a02') // country - city
			$sql_select  =	"SELECT * FROM ".$config['tbl_prefix']."city WHERE city_name='".$city."' and country_id='$country' and created_by='".$_SESSION['user']['user_id']."'";
		if($logic=='a12') // region -city
			$sql_select  =	"SELECT * FROM ".$config['tbl_prefix']."city WHERE city_name='".$city."' and region_id='$region' and created_by='".$_SESSION['user']['user_id']."'";
		if($logic=='a012') // country-region-city 
			$sql_select  =	"SELECT * FROM ".$config['tbl_prefix']."city WHERE city_name='".$city."' and region_id='$region' and country_id='$country' and created_by='".$_SESSION['user']['user_id']."'";
		if($logic=='a2') // city
			$sql_select  =	"SELECT * FROM ".$config['tbl_prefix']."city WHERE city_name='".$city."' and created_by='".$_SESSION['user']['user_id']."'";			
		
		
		$rs 		 =	mysql_query($sql_select) or die(mysql_error());
		if(mysql_num_rows($rs) > 0){
			$error= 621;		
			return $error; ## Error for duplicate .
		}
		else
		{
			### Insert into table 
			$query_insert = "INSERT INTO ".$config['tbl_prefix']."city set city_name='$city', country_id='$country', region_id='$region', created_on=now(), created_by='".$_SESSION['user']['user_id']."', parent_id='".$_SESSION['user']['created_by']."'";
			mysql_query($query_insert);
			$error= 620;		
			return $error;

	}}### End insersion
}

function  update_city_master($post,$logic)
{
	global $ss,$config;
	$city		=	ucfirst($_POST['city']);
	$region		=	$_POST['region'];
	$country		=	$_POST['country'];
	$id		=	$_POST['id'];
	
	if($logic=='a02' || $logic=='a012')
		$elems[] = array('name'=>'country', 'label'=>'Country Name', 'type'=>'select', 'required'=>true);
	if($logic=='a12' || $logic=='a012')
		$elems[] = array('name'=>'region', 'label'=>'Region Name', 'type'=>'select', 'required'=>true);
		
	$elems[] = array('name'=>'city', 'label'=>'City Name', 'type'=>'text', 'required'=>true);
	$f = new FormValidator($elems);
	$err = $f->validate($post);
	if ($err === true)
	{
		return $valid_array = $f->getValidElems();
	}
	
	if($logic=='a02') // country - city
			$query	="select * from ".$config['tbl_prefix']."city where city_name='$city' and country_id='$country' and created_by='".$_SESSION['user']['user_id']."' and city_id !='$id'";
		if($logic=='a12') // region -city
			$query	="select * from ".$config['tbl_prefix']."city where city_name='$city' and region_id='$region' and created_by='".$_SESSION['user']['user_id']."' and city_id !='$id'";
		if($logic=='a012') // country-region-city 
			$query	="select * from ".$config['tbl_prefix']."city where city_name='$city' and region_id='$region' and country_id='$country' and created_by='".$_SESSION['user']['user_id']."' and city_id !='$id'";
		if($logic=='a2') // city
			$query	="select * from ".$config['tbl_prefix']."city where city_name='$city' and created_by='".$_SESSION['user']['user_id']."' and city_id !='$id'";
	
	
	$rs				=	mysql_query($query);
	if(mysql_num_rows($rs)>=1)
	{
		header("Location: ./?ss=".$ss."&life=83&error=621");
		die;
	}
	else
	{
		$sql_insert	=	"update ".$config['tbl_prefix']."city set city_name='$city', country_id='$country', region_id='$region', modified_on=now(), modified_by='".$_SESSION['user']['user_id']."'  where city_id='$id'";
		if(mysql_query($sql_insert))
		{
			header("Location: ./?ss=".$ss."&life=83&error=622");
			die;
		}
	}
}

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
				header("Location: ./?ss=".$ss."&life=10&error=$error");
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
	
	//$country		=	$post['country'];
	$region		=	$post['region'];
	
	//$client_id		=	$post['client_id'];
	//$carrier_name	=	addslashes($post['carrier_name']);
	$city			=	addslashes($post['city']);
	$outlet_name	=	addslashes(ucfirst($post['outlet_name']));
	$address		=	addslashes($post['address']);
	$cperson	=	$_POST['cperson'];
	$cnumber	=	$_POST['cnumber'];
	$type	=	$_POST['type'];
	
	$update_id	=	$post['update_id'];
	    //echo"fbdfgdf";	
	//if($logic=='a0')
	//$elems[] = array('name'=>'type', 'label'=>'Type', 'type'=>'select', 'required'=>true);

	//if($logic=='a1' || $logic=='01')
	//$elems[] = array('name'=>'region', 'label'=>'Region', 'type'=>'select', 'required'=>true);

	//if($logic=='a2' || $logic=='012' || $logic=='12' || $logic=='02')
	//$elems[] = array('name'=>'city', 'label'=>'City', 'type'=>'select', 'required'=>true,);
	
	$elems[] = array('name'=>'outlet_name', 'label'=>'Outlet Name', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'city', 'label'=>'City', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'region', 'label'=>'Region', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'type', 'label'=>'Type', 'type'=>'text', 'required'=>true,);
	
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
		$query	="select * from boursin_reg where outlet_name='$outlet_name' and city ='$city' and address='$address' and outlet_id != $update_id ";
		
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
			$query_insert = "update boursin_reg set 
			region='$region', 
			city='$city',
			outlet_name='$outlet_name',
			address='$address',
			type='$type',
			cperson='$cperson',
			cnumber='$cnumber' 
			where outlet_id='".$update_id."'
			";

			if(mysql_query($query_insert) or die(mysql_error()))
			{
				$error= 6;		
				header("Location: ./?ss=".$ss."&life=80&error=$error");
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
					header("Location: ./?ss=".$ss."&life=11&error=$error");
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
					header("Location: ./?ss=".$ss."&life=70&error=$error");
					die;
				}
				elseif($user_type=='3'){
					$msg  ="Hi {$name},\n\n";
					$msg .="Here is the login information for at Marketlife.\n\n";
					$msg .="User Id: {$username}\n";
					$msg .="Password: {$password}\n\n";
					$msg .="You can login from http://lifesuite.com/marketlife/client/login.php \n\n";
					$msg .="Thank you for being our member.\n\n";
					$msg .="Warm Regards,\n";
					$msg .="Team Marketlife\n";
					$msg .="Marketlife";	
					$frommail="abhishek@wisitech.com";
					$headers = "";
					//@mail($emailid,'Login information from Marketlife',$msg,$headers);	/// Please oncomment to sent mail in future.
					$error= 4;		
					header("Location: ./?ss=".$ss."&life=60&error=$error");
					die;
				}
				
			}
		}
	}### End insersion
}
//end -- a common function for add user --------------------------------------------// 


//start -- a common function for edit user -----------------------------------------//
function  update_user_master($post)
{
	global $ss,$config;
/*	$news_title				=	$_POST['news_title'];
	$news_small_desc		=	$_POST['news_small_desc'];
	$news_large_desc		=	$_POST['news_large_desc'];
	$news_image				=	$_FILES['news_image'];*/
	
/*	$fname		=	$_POST['fname'];
	$lname		=	$_POST['lname'];
	$job_title		=	$_POST['job_title'];
	$dob	=	$_POST['dob'];//makeDateToDMYFromYMD($_POST['dob'],"/","-");
	$aob	=	$_POST['aob'];//makeDateToDMYFromYMD($_POST['aob'],"/","-");
	$branch		=	$_POST['branch'];
	$about_me		=	$_POST['about_me'];
	$interest		=	$_POST['interest'];
	$last_college		=	$_POST['last_college'];
	$degree		=	$_POST['degree'];
	$h_school		=	$_POST['h_school'];
	$m_status		=	$_POST['m_status'];
	$p_email		=	$_POST['p_email'];
	$news_image				=	$_FILES['news_image'];*/
	
	$fname			=	$_POST['fname'];
	$lname			=	$_POST['lname'];
	$phone		=	$_POST['phone'];
	$job_title		=	$_POST['job_title'];
	$company		=	$_POST['company'];
	$address		=	$_POST['address1'];
	$address2			=	$_POST['address2'];
	$city			=	$_POST['city'];
	$state			=	$_POST['state'];
	$email2		=	$_POST['email2'];
	$phone2		=	$_POST['phone2'];
	$zip		=	$_POST['pin'];
	$news_image				=	$_FILES['news_image'];
	
	
	
	$id		=	$_POST['id'];
	$elems[] = array('name'=>'fname', 'label'=>'First Name', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'lname', 'label'=>'Last Name', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'job_title', 'label'=>'job_title', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'phone', 'label'=>'Mobile No.', 'type'=>'text', 'required'=>true,  'cont' => 'digit');
	$elems[] = array('name'=>'email2', 'label'=>'Email ID', 'type'=>'text', 'required'=>true, 'cont' => 'email');
	$elems[] = array('name'=>'company', 'label'=>'company', 'type'=>'text', 'required'=>true,);
	//$elems[] = array('name'=>'address1', 'label'=>'address1', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'state', 'label'=>'State', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'city', 'label'=>'City', 'type'=>'text', 'required'=>true,);
	//$elems[] = array('name'=>'pin', 'label'=>'Pin Code', 'type'=>'text', 'required'=>true,  'cont' => 'digit');
	//$elems[] = array('name'=>'phone2', 'label'=>'Office Phone', 'type'=>'text', 'required'=>true,  'cont' => 'digit');
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);
	if ($err === true)
	{
		return $valid_array = $f->getValidElems();
	}
	$query			=	"select * from ".$config['tbl_prefix']."users WHERE fname='".$fname."' and user_id !='$id'";
	$rs				=	mysql_query($query);
	if(mysql_num_rows($rs)>=100)
	{
		$error=625;
		return $error;
	}
	else
	{
		$sql_insert	="update ".$config['tbl_prefix']."users set fname='$fname', lname='$lname' , job_title='$job_title',phone='$phone',company='$company',address1='$address',address2='$address2',city='$city',state='$state',zip='$zip',phone2='$phone2',email2='$email2',modified_on=now(), modified_by='".$_SESSION['user']['user_id']."'  where user_id='$id'";
		if(mysql_query($sql_insert))
		{
			//- uploade image ------------------------
			if($_FILES['news_image']['name']!='')
			{	
				$newPath="uploaded_file/user_img/";
				$newFile=$id."_";
				$ext=array('jpg','gif','png');
				$size=array('fsize'=>0,'unit'=>'kb','unitOpt'=>'<=','imgW'=>0,'wOpt'=>'<=','imgH'=>0,'hOpt'=>'<=');
				$deleteFromDir=array('selRecID'=>$id,'pkFldName'=>'news_id','tableName'=>$config['tbl_prefix'].'news','imgFldName'=>'news_image');
				
				$errMsg=uploadFile("news_image",$newPath,$newFile,$ext,$size,$deleteFromDir);
				if($errMsg['err']!='')
				{ 
				echo "Problem with images / file_Name is case sensative or should be all small...";
				echo $errMsg['err']; die;}
				else
				{ $fileName=$errMsg['file_name']; }
				
				$update_news="update ".$config['tbl_prefix']."users set upload_logo='".$fileName."' where user_id='".$id."'";
				mysql_query($update_news);
			}
			//end - uploade image --------------------------
			
			
			header("Location: ./?ss=".$ss."&life=64&error=6");
			die;
		}
	}
}
//end -- a common function for edit user --------------------------------------------// 





//------------------------To Bulletin News Section---------------------------------------------------------------------
function add_news_master($post)
{
	global $ss,$config;
	$news_title				=	$_POST['news_title'];
	$news_small_desc		=	$_POST['news_small_desc'];
	$news_large_desc		=	$_POST['news_large_desc'];
	$news_image				=	$_FILES['news_image'];
	
	$elems[] = array('name'=>'news_title', 'label'=>'Title', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'news_small_desc', 'label'=>'Small Description', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'news_large_desc', 'label'=>'Large Description', 'type'=>'text', 'required'=>true);
	
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else if(empty($id))
	{
		$sql_select  =	"SELECT * FROM ".$config['tbl_prefix']."news WHERE news_title ='".$news_title ."'";
		$rs 		 =	mysql_query($sql_select) or die(mysql_error());
		if(mysql_num_rows($rs) > 0){
			$error= 625;		
			return $error; ## Error for duplicate .
		}
		else
		{
			### Insert into table 
			$query_insert = "INSERT INTO ".$config['tbl_prefix']."news set news_title='$news_title', news_small_desc ='$news_small_desc ' , news_large_desc ='$news_large_desc ',  created_on=now(), created_by='".$_SESSION['user']['user_id']."'";
			if(mysql_query($query_insert) or die(mysql_error()))
			{
				
				//- uploade image ------------------------
				$newPath="uploaded_file/news_img/";
				$newFile=mysql_insert_id()."_";
				$ext=array('jpg','gif','png');
				$size=array('fsize'=>0,'unit'=>'kb','unitOpt'=>'<=','imgW'=>0,'wOpt'=>'<=','imgH'=>0,'hOpt'=>'<=');
				
				
				$errMsg=uploadFile("news_image",$newPath,$newFile,$ext,$size);
				if($errMsg['err']!='')
				{ 
				echo "Problem with images / file Name should be all small...";
				echo $errMsg['err']; die;}
				else
				{ $fileName=$errMsg['file_name']; }
				
				$update_news="update ".$config['tbl_prefix']."news set news_image='".$fileName."' where news_id='".mysql_insert_id()."'";
				mysql_query($update_news);
				//end - uploade image --------------------------
							
				$error= 4;		
				header("Location: ./?ss=".$ss."&life=76&error=$error");
				die;
			}

	}}### End insersion
}


function  update_news_master($post)
{
	global $ss,$config;
	$news_title				=	$_POST['news_title'];
	$news_small_desc		=	$_POST['news_small_desc'];
	$news_large_desc		=	$_POST['news_large_desc'];
	$news_image				=	$_FILES['news_image'];
	
	$id		=	$_POST['id'];
	$elems[] = array('name'=>'news_title', 'label'=>'Title', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'news_small_desc', 'label'=>'Small Description', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'news_large_desc', 'label'=>'Large Description', 'type'=>'text', 'required'=>true);
	
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);
	if ($err === true)
	{
		return $valid_array = $f->getValidElems();
	}
	$query			=	"select * from ".$config['tbl_prefix']."news WHERE news_title='".$news_title."' and news_id !='$id'";
	$rs				=	mysql_query($query);
	if(mysql_num_rows($rs)>=1)
	{
		$error=625;
		return $error;
	}
	else
	{
		$sql_insert	=	"update ".$config['tbl_prefix']."news set news_title='$news_title', news_small_desc='$news_small_desc' , news_large_desc='$news_large_desc',  modified_on=now(), modified_by='".$_SESSION['user']['user_id']."'  where news_id='$id'";
		if(mysql_query($sql_insert))
		{
			//- uploade image ------------------------
			if($_FILES['news_image']['name']!='')
			{	
				$newPath="uploaded_file/news_img/";
				$newFile=$id."_";
				$ext=array('jpg','gif','png');
				$size=array('fsize'=>0,'unit'=>'kb','unitOpt'=>'<=','imgW'=>0,'wOpt'=>'<=','imgH'=>0,'hOpt'=>'<=');
				$deleteFromDir=array('selRecID'=>$id,'pkFldName'=>'news_id','tableName'=>$config['tbl_prefix'].'news','imgFldName'=>'news_image');
				
				$errMsg=uploadFile("news_image",$newPath,$newFile,$ext,$size,$deleteFromDir);
				if($errMsg['err']!='')
				{ 
				echo "Problem with images / file_Name is case sensative or should be all small...";
				echo $errMsg['err']; die;}
				else
				{ $fileName=$errMsg['file_name']; }
				
				$update_news="update ".$config['tbl_prefix']."news set news_image='".$fileName."' where news_id='".$id."'";
				mysql_query($update_news);
			}
			//end - uploade image --------------------------
			
			
			header("Location: ./?ss=".$ss."&life=76&error=6");
			die;
		}
	}
}

//------------------------To Knowsledge Bank Section---------------------------------------------------------------------
function add_knows_master($post)
{
	global $ss,$config;
	$category_id			=	$_POST['cat_id'];
	$subcategory_id			=	$_POST['subcat_id'];
	$product_name			=	$_POST['product_name'];
	$product_description	=	$_POST['product_description'];
	$product_number			=	$_POST['product_number'];
	$product_rate			=	$_POST['product_rate'];
	$product_sale			=	$_POST['product_sale'];
	$news_image				=	$_FILES['news_image'];
	
	$elems[] = array('name'=>'cat_id', 'label'=>'Category', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'subcat_id', 'label'=>'Sub Category', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'product_name', 'label'=>'Product Name', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'product_number', 'label'=>'Product Code', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'product_rate', 'label'=>'Product Rate', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'product_sale', 'label'=>'Product Sale', 'type'=>'text', 'required'=>true);
    
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else if(empty($id))
	{
		$sql_select  =	"SELECT * FROM png_products WHERE product_name ='".$product_name."'";
		$rs =	mysql_query($sql_select) or die(mysql_error());
		if(mysql_num_rows($rs) > 0){
			$error= 625;		
			return $error; ## Error for duplicate .
		}
		else
		{
			### Insert into table 
			$query_insert = "INSERT INTO png_products set category_id='$category_id',subcategory_id='$subcategory_id', product_name='$product_name', product_description='$product_description', product_number='$product_number', product_rate='$product_rate', product_sale='$product_sale'";
			//echo"$query_insert";
			if(mysql_query($query_insert) or die(mysql_error()))
			{
				
				//- uploade image ------------------------
				$newPath="uploaded_file/product_img/";
				$newFile=mysql_insert_id()."_";
				$ext=array('jpg','gif','png');
				$size=array('fsize'=>0,'unit'=>'kb','unitOpt'=>'<=','imgW'=>0,'wOpt'=>'<=','imgH'=>0,'hOpt'=>'<=');
				
				
				$errMsg=uploadFile("news_image",$newPath,$newFile,$ext,$size);
				if($errMsg['err']!='')
				{ 
				echo "Problem with images / file Name should be all small letter...";
				echo $errMsg['err']; die;}
				else
				{ $fileName=$errMsg['file_name']; }
				
				$update_news="update png_products set news_image='".$fileName."' where product_id='".mysql_insert_id()."'";
				mysql_query($update_news);
				//end - uploade image --------------------------
							
				$error= 4;		
				header("Location: ./?ss=".$ss."&life=81&error=$error");
				die;
			}

	}}### End insersion
}


function  update_knows_master($post)
{
	global $ss,$config;
	$category_id			=	$_POST['cat_id'];
	$subcategory_id			=	$_POST['subcat_id'];
	$product_name			=	$_POST['product_name'];
	$product_description	=	$_POST['product_description'];
	$product_number			=	$_POST['product_number'];
	$product_rate			=	$_POST['product_rate'];
	$product_sale			=	$_POST['product_sale'];
	$news_image				=	$_FILES['news_image'];
	
	$id		=	$_POST['id'];
	$elems[] = array('name'=>'cat_id', 'label'=>'Category', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'subcat_id', 'label'=>'Sub Category', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'product_name', 'label'=>'Product Name', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'product_number', 'label'=>'Product Code', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'product_rate', 'label'=>'Product Rate', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'product_sale', 'label'=>'Product Sale', 'type'=>'text', 'required'=>true);
	
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);
	if ($err === true)
	{
		return $valid_array = $f->getValidElems();
	}
	$query			=	"SELECT * FROM png_products WHERE product_name='".$outlet_name."' and product_id !='$id'";
	$rs				=	mysql_query($query);
	if(mysql_num_rows($rs)>=100)
	{
		$error=625;
		return $error;
	}
	else
	{
		$sql_insert	=	"update png_products set category_id='$category_id',subcategory_id='$subcategory_id', product_name='$product_name', product_description='$product_description', product_number='$product_number', product_rate='$product_rate', product_sale='$product_sale'  where product_id='$id'";
		//echo"$sql_insert";
		if(mysql_query($sql_insert))
		{
			//- uploade image ------------------------
			if($_FILES['news_image']['name']!='')
			{	
				$newPath="uploaded_file/product_img/";
				$newFile=$id."_";
				$ext=array('jpg','gif','png');
				$size=array('fsize'=>0,'unit'=>'kb','unitOpt'=>'<=','imgW'=>0,'wOpt'=>'<=','imgH'=>0,'hOpt'=>'<=');
				$deleteFromDir=array('selRecID'=>$id,'pkFldName'=>'news_id','tableName'=>'boursin_reg','imgFldName'=>'news_image');
				
				$errMsg=uploadFile("news_image",$newPath,$newFile,$ext,$size,$deleteFromDir);
				if($errMsg['err']!='')
				{ 
				echo "Problem with images / file_Name is case sensative or should be all small letter...";
				echo $errMsg['err']; die;}
				else
				{ $fileName=$errMsg['file_name']; }
				
				$update_news="update png_products set news_image='".$fileName."' where product_id='".$id."'";
				mysql_query($update_news);
			}
			//end - uploade image --------------------------
			
			
			header("Location: ./?ss=".$ss."&life=81&error=6&id=$id");
			die;
		}
	}
}

########### BY MANOJ #############
//start -- function to add promotion -----------------------------------------//
function add_promotion($post)
{
	global $ss,$config;
	$ddModelNo		=	$post['ddModelNo'];
	$txtDate_from	=	$post['txtDate_from'];
	$txtDate_to		=	$post['txtDate_to'];
	$txtPoints		=	$post['txtPoints'];
	$txtSalesQty	=	$post['txtSalesQty'];
	$txtProcode		=	strtoupper($post['txtProcode']);
	
	$txtDate_from=makeDateToYMDFromDMY($txtDate_from,"-","-");
	$txtDate_to=makeDateToYMDFromDMY($txtDate_to,"-","-"); 
	
	$elems[] = array('name'=>'ddModelNo', 'label'=>'Model Number', 'type'=>'select', 'required'=>true);
	$elems[] = array('name'=>'txtDate_from', 'label'=>'Validate date from', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'txtDate_to', 'label'=>'Validate date to', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'txtPoints', 'label'=>'Points', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'txtSalesQty', 'label'=>'Sales Quantity', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'txtProcode', 'label'=>'Promotion Code', 'type'=>'text', 'required'=>true,);
	
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);
	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else
		{
			$sql_select  =	"SELECT promotion_code FROM ".$config['tbl_prefix']."promotion WHERE promotion_code ='".$txtProcode."'";
			$rs 		 =	mysql_query($sql_select) or die(mysql_error());
			if(mysql_num_rows($rs) > 0)
			{
				$error= 17;		
				return $error; ## Error for duplicate .
			}
			else
			{
			### Insert into table 
			$query_insert = "INSERT INTO ".$config['tbl_prefix']."promotion set 
			promotion_model='$ddModelNo', 
			promotion_from='".$txtDate_from."', 
			promotion_to='$txtDate_to', 
			promotion_points=$txtPoints, 
			promotion_qty=$txtSalesQty, 
			promotion_code='$txtProcode',
			promotion_insert=now()";
			//echo $query_insert; die;
			
			if(mysql_query($query_insert) or die(mysql_error()))
			{
				$insert_user_id=mysql_insert_id();
					
					//upload image -------------------
					$newPath="uploaded_file/promotion_image/";
					$newFile=$insert_user_id."_";
					$ext=array('jpg','gif','png');
					//$size=array('fsize'=>0,'unit'=>'kb','unitOpt'=>'<=','imgW'=>0,'wOpt'=>'<=','imgH'=>0,'hOpt'=>'<=');
					$errMsg=uploadFile("p_image",$newPath,$newFile,$ext,'');
					if($errMsg['err']!='')
					{ echo $errMsg['err']; die;}
					else
					{ $fileName=$errMsg['file_name']; }
					
					$updatePromo="update ".$config['tbl_prefix']."promotion set promotion_image='".$fileName."' where promotion_id='".$insert_user_id."'";
					mysql_query($updatePromo);
					//upload image -------------------					
					
					
					$error= 4;		
					header("Location: ./?ss=".$ss."&life=2&error=$error");
					die;
				
				
			}
		}
	}### End insersion
	
}
//end -- function to add promotion --------------------------------------------// 

//start -- function to update promotion -----------------------------------------//
function update_promotion($post)
{
	global $ss,$config;
	$ddModelNo		=	$post['ddModelNo'];
	$txtDate_from	=	$post['txtDate_from'];
	$txtDate_to		=	$post['txtDate_to'];
	$txtPoints		=	$post['txtPoints'];
	$txtSalesQty	=	$post['txtSalesQty'];
	$txtProcode		=	strtoupper($post['txtProcode']);
	$promotion_id	= 	$post['pro_id'];
	
	$txtDate_from=makeDateToYMDFromDMY($txtDate_from,"-","-");
	$txtDate_to=makeDateToYMDFromDMY($txtDate_to,"-","-"); 
	
	$elems[] = array('name'=>'ddModelNo', 'label'=>'Model Number', 'type'=>'select', 'required'=>true);
	$elems[] = array('name'=>'txtDate_from', 'label'=>'Validate date from', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'txtDate_to', 'label'=>'Validate date to', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'txtPoints', 'label'=>'Points', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'txtSalesQty', 'label'=>'Sales Quantity', 'type'=>'text', 'required'=>true,);
	$elems[] = array('name'=>'txtProcode', 'label'=>'Promotion Code', 'type'=>'text', 'required'=>true,);
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);
	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else
		{
			$sql_select  =	"SELECT promotion_code FROM ".$config['tbl_prefix']."promotion WHERE promotion_code ='".$txtProcode."' and promotion_id<>".$promotion_id."";
			$rs 		 =	mysql_query($sql_select) or die(mysql_error());
			if(mysql_num_rows($rs) > 0)
			{
				$error= 17;		
				return $error; ## Error for duplicate .
			}
			else
			{
			### Insert into table 
			$query_insert = "update ".$config['tbl_prefix']."promotion set 
			promotion_model='$ddModelNo', 
			promotion_from='".$txtDate_from."', 
			promotion_to='$txtDate_to', 
			promotion_points=$txtPoints, 
			promotion_qty=$txtSalesQty, 
			promotion_code='$txtProcode',
			promotion_update=now()
			WHERE promotion_id=".$promotion_id."
			";
			//echo $query_insert; die;
			
			if(mysql_query($query_insert) or die(mysql_error()))
			{
				//$insert_user_id=mysql_insert_id();
					
					//upload image -------------------
					if($_FILES['p_image']['name']!='')
					{
						$newPath="uploaded_file/promotion_image/";
						$newFile=$promotion_id."_";
						$ext=array('jpg','gif','png');
						//$size=array('fsize'=>0,'unit'=>'kb','unitOpt'=>'<=','imgW'=>0,'wOpt'=>'<=','imgH'=>0,'hOpt'=>'<=');
						$errMsg=uploadFile("p_image",$newPath,$newFile,$ext,'');
						if($errMsg['err']!='')
						{ echo $errMsg['err']; die;}
						else
						{ $fileName=$errMsg['file_name']; }
						
					
					$updatePromo="update ".$config['tbl_prefix']."promotion set promotion_image='".$fileName."' where promotion_id='".$promotion_id."'";
					mysql_query($updatePromo);
					}
					//upload image -------------------					
										
					$error= 6;		
					header("Location: ./?ss=".$ss."&life=2&error=$error");
					die;
				
				
			}
		}
	}### End insersion
	
}
//end -- function to update promotion --------------------------------------------// 

function delete_image($image_id)
	{			
				global $ss;
				$sql=mysql_query("SELECT promotion_image FROM sam_promotion WHERE promotion_id='".$image_id."'");
				$del_item=mysql_result($sql,0);
				if($del_item!="")
				{
					$delete_path="uploaded_file/promotion_image/";
					if(file_exists($delete_path.$del_item))
					{
						unlink($delete_path.$del_item);
						mysql_query("update sam_promotion set promotion_image='' where promotion_id=".$image_id."");	
						header("Location: ./?ss=".$ss."&life=1&id=".$image_id."&g_error=300");
					}
					
					
				}
	}


############END BY MANOJ #########
//----------------------------------------------------------------------------------------------

//start -- display tabs for country , region , city -------------------------------
function displayTab($selectedTab,$logic)
	{
		$tdStr="";
		$tabLength=strlen($logic);
		
		for($tr=0;$tr<$tabLength;$tr++)
		{
			$ch=substr($logic,$tr,1);
			switch($ch)
			{
				case 0:
					if($selectedTab==0)
					$tdStr .="<td align='center'><strong>Country</strong></td>";
					else
					$tdStr .="<td align='center'><a href='./?ss=$ss&life=81'><strong>Country</strong></a></td>";
					break;
				case 1:
					if($selectedTab==1)
					$tdStr .="<td align='center'><strong>Region</strong></td>";
					else
					$tdStr .="<td align='center'><a href='./?ss=$ss&life=82'><strong>Region</strong></a></td>";
					break;
				case 2:
					if($selectedTab==2)
					$tdStr .="<td align='center'><strong>Zone</strong></td>";
					else
					$tdStr .="<td align='center'><a href='./?ss=$ss&life=83'><strong>Zone</strong></a></td>";
					break;
			}	
		}
		
		return $tdStr;
	}
//End -- display tabs for country , region , city -------------------------------


//start -- display controls for country , region , city -------------------------------

function displayControls($selectedTab,$logic,$country='',$region='',$city='')
	{
		global $config;
		$tdStr="";
		$tabLength=strlen($logic);
		
		for($tr=0;$tr<$tabLength;$tr++)
		{
			$ch =substr($logic,$tr,1);
			if($ch <= $selectedTab)
			$strCh.=$ch;
		}	
						
			$strCh=(string)"a".$strCh;
			
			switch($strCh)
			{
				case "a0":
					$trStr.="<tr>
                        	<td width='49%' align='right'>Country:</td>
                        <td width='51%'><input name='country' id='country' type='text' maxlength='50'  class='text' title='mandatory5::Please enter country name.' value='$country'/></td>
                      </tr>";
					break;
					
				case "a1":
					$trStr.="<tr>
                        <td align='right'>Region:</td>
                        <td><input name='region' id='region' type='text' maxlength='50'  class='text' title='mandatory5::Please enter region name.' value='$region'/></td>
                      </tr>";
					 break;
					  
				case "a2":
					
					$trStr.=" <tr>
                        <td align='right' width='49%'>Zone:</td>
                        <td><input name='city' id='city' type='text' maxlength='50'  class='text' title='mandatory5::Please enter zone name.' value='$city'/></td>
                      </tr>";	
					break;
				
				case "a01":
					
					$trStr.="<tr>
                        <td align='right'>Country:</td>
                        <td><select name='country' id='country'  style='width:150px;'  title='mandatory::Please select country' >
						<option value=''>-- Select --</option>".
						area_combo_data($config['tbl_prefix']."country", "country_id", "country_name", $country, "order by country_name asc", " where created_by='".$_SESSION['user']['user_id']."'").
					"</select></td>
                      </tr>
                      <tr>
                        <td align='right'>Region:</td>
                        <td><input name='region' id='region' type='text' maxlength='50'  class='text' title='mandatory5::Please enter region name.' value='$region'/></td>
                      </tr>";
				
					break;
					
				case "a12":
					
					$trStr.="<tr>
                        <td align='right'>Region:</td>
                        <td>
						<select name='region' style='width:138px;' title='mandatory::Please select region'>
						<option value=''>-- Select --</option>".
						
						area_combo_data($config['tbl_prefix']."region", "region_id", "region_name", $region, "order by region_name asc",'','' ).
						"</select></td>
						  </tr>
						  <tr>
							<td align='right'>Zone:</td>
							<td><input name='city' id='city' type='text' maxlength='50'  class='text' title='mandatory5::Please enter zone name.' value='$city'/></td>
						  </tr>";
					break;	
					
				
				case "a02":
					
					$trStr.="<tr>
                        <td align='right'>Country:</td>
                        <td>
						<select name='country' style='width:138px;' id='country' title='mandatory::Please select region'>
						<option value=''>-- Select --</option>".
						
						area_combo_data($config['tbl_prefix']."country", "country_id", "country_name", $country, "order by country_name asc",'','' ).
						"</select></td>
						  </tr>
						  <tr>
							<td align='right'>Zone:</td>
							<td><input name='city' id='city' type='text' maxlength='50'  class='text' title='mandatory5::Please enter zone name.' value='$city'/></td>
						  </tr>";
					break;	
					
				case "a012":
					
					$trStr.="<tr>
                        <td align='right'>Country:</td>
                        <td><select name='country' id='country'  style='width:138px;'  title='mandatory::Please select country' onchange='form.submit();'>
						<option value=''>-- Select --</option>".
					area_combo_data($config['tbl_prefix']."country", "country_id", "country_name", $country, "order by country_name asc"," where created_by='".$_SESSION['user']['user_id']."'").
						"</select></td>
                      </tr>
					   <tr>
                        <td align='right'>Region:</td>
                        <td>";
						
							if($country!=''){
								$condition1="where country_id='".$country."'";
								$condition2=" and created_by='".$_SESSION['user']['user_id']."'";
								}
							else{
								$condition2=" where created_by='".$_SESSION['user']['user_id']."'";
								}
						
						$trStr.="<select name='region' style='width:138px;' title='mandatory::Please select region'>
						<option value=''>-- Select --</option>".
					area_combo_data($config['tbl_prefix']."region", "region_id", "region_name", $region, "order by region_name asc",$condition1,$condition2 ).
					"</select></td>
                      </tr>
                      <tr>
                        <td align='right'>Zone:</td>
                        <td><input name='city' id='city' type='text' maxlength='50'  class='text' title='mandatory5::Please enter zone name.' value='$city'/></td>
                      </tr>";
					
					break;	
			}	
		
		
		return $trStr;
	}
//end -- display controls for country , region , city -------------------------------


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
						header("Location: ./?ss=".$ss."&life=8&error=95");
					}
				else
					{
						header("Location: ./?ss=".$ss."&life=8&error=96");
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
					header("Location: ./?ss=".$ss."&life=11&error=$error");
					die;
				}
				if($user_type=='2')
				{
					$error= 6;		
					header("Location: ./?ss=".$ss."&life=81&error=$error");
					die;
				}
				elseif($user_type=='3'){
					$msg  ="Hi {$name},\n\n";
					$msg .="Here is the login information for at Marketlife.\n\n";
					$msg .="User Id: {$username}\n";
					$msg .="Password: {$password}\n\n";
					$msg .="You can login from http://lifesuite.com/marketlife/client/login.php \n\n";
					$msg .="Thank you for being our member.\n\n";
					$msg .="Warm Regards,\n";
					$msg .="Team Marketlife\n";
					$msg .="Marketlife";	
					$frommail="abhishek@wisitech.com";
					$headers = "";
					//@mail($emailid,'Login information from Marketlife',$msg,$headers);	/// Please oncomment to sent mail in future.
					$error= 6;		
					header("Location: ./?ss=".$ss."&life=81&error=$error");
					die;
				}
				
			}
		}
	}### End insersion

}
	
//--start -- add sales entry ---------------------------------------------------------------
function add_sales_entry($post)
{
	global $ss,$config;
	
	$sales_date		=	$post['sales_date'];
	$qty			=	$post['qty'];
	$model_id		=	$post['model_id'];
	$imei_number	=	$post['imei_number'];
	$sales_type		=	$post['sales_type'];
	
	$y=substr($sales_date,6,4);	
	$m=substr($sales_date,3,2);
	$d=substr($sales_date,0,2);
	$sales_date=$y."-".$m."-".$d;
	
	$elems[] = array('name'=>'sales_date', 'label'=>'Validate date ', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'qty', 'label'=>'Quantity', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'sales_type', 'label'=>'Sales Type', 'type'=>'select', 'required'=>true);
	$elems[] = array('name'=>'model_id', 'label'=>'Model Number', 'type'=>'select', 'required'=>true);
	
		
	$f = new FormValidator($elems);
	$err = $f->validate($post);
	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else
	{
		if(sizeof($imei_number)!=$qty)
		{
			$error=41;
			return $error;
			//header("Location: ./?ss=".$ss."&life=41&error=$error");
		}
		else
		{
			### Insert into table 
			if($_SESSION['user']['user_id']!='')
				$outletid	=	outletid_from_userid($_SESSION['user']['user_id']);
	
			if($outletid!='')
				$clientid	=	clientid_from_outletid($outletid);
			if($outletid!='')	
				$carrierid	=	carrierid_from_outletid($outletid);
				

			
			$query_insert = "INSERT INTO ".$config['tbl_prefix']."sales_entry set 
			user_id='".$_SESSION['user']['user_id']."',
			sales_date='".$sales_date."', 
			sales_type='".$sales_type."',
			qty='".$qty."', 
			outlet_id='".$outletid."',
			client_id='".$clientid."',
			carrier_id='".$carrierid."',
			model_id='$model_id'";

			//echo $query_insert; die;
			
			if(mysql_query($query_insert) or die(mysql_error()))
			{
				$ins_id=mysql_insert_id();
				//start -- store IMEI in sam_sold_iemi table -----------------------------
				foreach($imei_number as $val)
				{
					$insert = "INSERT INTO ".$config['tbl_prefix']."sold_imei set 
					sales_id='$ins_id', 
					imei_number='$val'";
				 	mysql_query($insert);
					$udate="update ".$config['tbl_prefix']."imei set imei_sold='1' where imei_code='$val'";
					mysql_query($udate);
				}
				//end -- store IMEI in sam_sold_iemi table -----------------------------		
				
				//start--- count points --------------------------
				$sql_promotion="select * from ".$config['tbl_prefix']."promotion where promotion_model='".$model_id."' and status='1' and ('".$sales_date."' >=promotion_from and '".$sales_date."' <= promotion_to )";
				$res_promotion=mysql_query($sql_promotion);
				while($fetch=mysql_fetch_array($res_promotion))
				{
					$sql_sales="select sum(qty) as sum_qty from ".$config['tbl_prefix']."sales_entry where user_id='".$_SESSION['user']['user_id']."' and model_id='".$model_id."' and (sales_date between '".$fetch['promotion_from']."' and '".$fetch['promotion_to']."' )";
					$res_sales=mysql_query($sql_sales);
					$fetch_sales=mysql_fetch_array($res_sales);
					
					/*echo "<br>-----------------------";
					echo $fetch_sales['sum_qty'];
					echo "<br>-----------------------";
					echo $fetch['promotion_qty'];*/
					
					if($fetch_sales['sum_qty'] >= $fetch['promotion_qty'])
					{
						$multi=($fetch_sales['sum_qty']/$fetch['promotion_qty']);
						if( $multi >=1) //--  
						{
							$multi= floor($multi);
							$new_point=$fetch['promotion_points'] * $multi;
						}
						
						$insert_point="INSERT into ".$config['tbl_prefix']."earn_points set user_id='".$_SESSION['user']['user_id']."' ,model_id='".$model_id."' , point='".$new_point."',qty='".$fetch_sales['sum_qty']."',date_from='".$fetch['promotion_from']."',date_to='".$fetch['promotion_to']."',point_date=now()";
						//-- promotion id ---
						$promo_id=$fetch['promotion_id'];
					
					$del_sql="DELETE from ".$config['tbl_prefix']."earn_points where user_id='".$_SESSION['user']['user_id']."' and model_id='".$model_id."' and date_from='".$fetch['promotion_from']."' and date_to='".$fetch['promotion_to']."'";
					}
				}
				mysql_query($del_sql);
				mysql_query($insert_point);
				
				//--update _sales entry for promotion id ---------- 
				mysql_query("UPDATE ".$config['tbl_prefix']."sales_entry set promotion_id='".$promo_id."' where sales_id='".$ins_id."'");
				
				
				/*echo "<br>Delete".$del_sql;
				echo "<br>INSERT LAST=".$insert_point; die;*/
				
				//end -- count points --------------------------
				
				//makeTotalPoint($_SESSION['user']['user_id']);
				
				
				
				$error= 4;		
				header("Location: ./?ss=".$ss."&life=4&error=$error");
				die;
			}
		}	
	}
	
	
}
//--end -- add sales entry ------------------------------------------------------------------


//--- CARRIER ------------------------------------
function  update_carrier_master($post)
{
	global $ss,$config;
	$carrier_name		=	ucfirst($_POST['carrier_name']);
	$id		=	$_POST['id'];
	$elems[] = array('name'=>'carrier_name', 'label'=>'Carrier Name', 'type'=>'text', 'required'=>true);
	$f = new FormValidator($elems);
	$err = $f->validate($post);
	if ($err === true)
	{
		return $valid_array = $f->getValidElems();
	}
	$query			=	"select * from ".$config['tbl_prefix']."carrier where carrier_name='$carrier_name' and carrier_id !='$id'";
	$rs				=	mysql_query($query);
	if(mysql_num_rows($rs)>=1)
	{
		header("Location: ./?ss=".$ss."&life=14&error=4141");
		die;
	}
	else
	{
		$sql_insert	=	"update ".$config['tbl_prefix']."carrier set carrier_name='$carrier_name' where carrier_id='$id'";
		if(mysql_query($sql_insert))
		{
			header("Location: ./?ss=".$ss."&life=14&error=6");
			die;
		}
	}
}

function add_carrier_master($post)
{
	global $ss,$config;
	$carrier_name		=	ucfirst($_POST['carrier_name']);
	
	$elems[] = array('name'=>'carrier_name', 'label'=>'Carrier Name', 'type'=>'text', 'required'=>true);
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else if(empty($id))
	{
		$sql_select  =	"SELECT * FROM ".$config['tbl_prefix']."carrier WHERE carrier_name='".$carrier_name."'";
		$rs 		 =	mysql_query($sql_select) or die(mysql_error());
		if(mysql_num_rows($rs) > 0){
			$error= 4141;		
			header("Location: ./?ss=".$ss."&life=14&error=$error"); ## Error for duplicate .
		}
		else
		{
			### Insert into table 
			$query_insert = "INSERT INTO ".$config['tbl_prefix']."carrier set carrier_name='$carrier_name' ";
			mysql_query($query_insert);
			$error= 4;		
			header("Location: ./?ss=".$ss."&life=14&error=$error");
	}}### End insersion
}







//START- ADD N UPDATE -- GIFT --------------------------------------------

function add_gift_product_master($post)
{
	global $ss,$config;
	$gift_category	=	$_POST['gift_category'];
	$gift_name		=	$_POST['gift_name'];
	$gift_code		=	$_POST['gift_code'];
	$gift_point		=	$_POST['gift_point'];
	$description	=	addslashes($_POST['description']);
	
	$elems[] = array('name'=>'gift_category', 'label'=>'Gift Category', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'gift_name', 'label'=>'Gift Name', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'gift_code', 'label'=>'Gift Code', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'gift_point', 'label'=>'Gift Point', 'type'=>'text', 'required'=>true, 'cont' => 'digit');
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);

	if ($err === true)
	{
		return	$valid_array = $f->getValidElems();
	}
	else if(empty($id))
	{
		$sql_select  =	"SELECT * FROM ".$config['tbl_prefix']."gift_product WHERE gift_name='".$gift_name."' and gift_code='".$gift_code."' and gift_category='".$gift_category."'";
		$rs 		 =	mysql_query($sql_select) or die(mysql_error());
		if(mysql_num_rows($rs) > 0){
			$error= 615;		
			return $error; ## Error for duplicate .
		}
		else
		{
			### Insert into table 
			$query_insert = "INSERT INTO ".$config['tbl_prefix']."gift_product set gift_name='$gift_name', gift_code='$gift_code' , gift_category='$gift_category', gift_point='$gift_point',description='$description', created_on=now(), created_by='".$_SESSION['user']['user_id']."'";
			if(mysql_query($query_insert) or die(mysql_error()))
			{
				$id=mysql_insert_id();
				//- uploade image ------------------------
				if($_FILES['gift_image']['name']!='')
				{	
					$newPath="uploaded_file/gift_image/";
					$newFile=$id."_";
					$ext=array('jpg','gif','png');
					$size=array('fsize'=>0,'unit'=>'kb','unitOpt'=>'<=','imgW'=>0,'wOpt'=>'<=','imgH'=>0,'hOpt'=>'<=');
					//$deleteFromDir=array('selRecID'=>$id,'pkFldName'=>'news_id','tableName'=>$config['tbl_prefix'].'news','imgFldName'=>'news_image');
					
					$errMsg=uploadFile("gift_image",$newPath,$newFile,$ext,$size,'');
					if($errMsg['err']!='')
					{ echo $errMsg['err']; die;}
					else
					{ $fileName=$errMsg['file_name']; }
					
					$update_gift="update ".$config['tbl_prefix']."gift_product set gift_image='".$fileName."' where gift_id='".$id."'";
					mysql_query($update_gift);
				}
				//end - uploade image --------------------------
				
				$error= 614;		
				//header("Location: ./?ss=".$ss."&life=74&error=$error");
				header("Location: ./?ss=".$ss."&life=751&id=$id&error=$error");
				die;
			}

	}}### End insersion
}

function  update_gift_product_master($post)
{
	global $ss,$config;
	$gift_category	=	$_POST['gift_category'];
	$gift_name		=	$_POST['gift_name'];
	$gift_code		=	$_POST['gift_code'];
	$gift_point		=	$_POST['gift_point'];
	$description	=	addslashes($_POST['description']);
	
	$id		=	$_POST['id'];
	$elems[] = array('name'=>'gift_category', 'label'=>'Gift Category', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'gift_name', 'label'=>'Gift Name', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'gift_code', 'label'=>'Gift Code', 'type'=>'text', 'required'=>true);
	$elems[] = array('name'=>'gift_point', 'label'=>'Gift Point', 'type'=>'text', 'required'=>true, 'cont' => 'digit');
	
	$f = new FormValidator($elems);
	$err = $f->validate($post);
	if ($err === true)
	{
		return $valid_array = $f->getValidElems();
	}
	$query			=	"select * from ".$config['tbl_prefix']."gift_product WHERE gift_name='".$gift_name."' and gift_code='".$gift_code."' and gift_category='".$gift_category."' and gift_id !='$id'";
	$rs				=	mysql_query($query);
	if(mysql_num_rows($rs)>=1)
	{
		$error=615;
		return $error;
	}
	else
	{
		$sql_insert	=	"update ".$config['tbl_prefix']."gift_product set gift_name='$gift_name', gift_code='$gift_code' , gift_category='$gift_category', gift_point='$gift_point',description='$description', modified_on=now(), modified_by='".$_SESSION['user']['user_id']."'  where gift_id='$id'";
		if(mysql_query($sql_insert))
		{
			
			//- uploade image ------------------------
			if($_FILES['gift_image']['name']!='')
			{	
				$newPath="uploaded_file/gift_image/";
				$newFile=$id."_";
				$ext=array('jpg','gif','png');
				$size=array('fsize'=>0,'unit'=>'kb','unitOpt'=>'<=','imgW'=>0,'wOpt'=>'<=','imgH'=>0,'hOpt'=>'<=');
				$deleteFromDir=array('selRecID'=>$id,'pkFldName'=>'gift_id','tableName'=>$config['tbl_prefix'].'gift_product','imgFldName'=>'gift_image');
				
				$errMsg=uploadFile("gift_image",$newPath,$newFile,$ext,$size,$deleteFromDir);
				if($errMsg['err']!='')
				{ echo $errMsg['err']; die;}
				else
				{ $fileName=$errMsg['file_name']; }
				
				$update_gift="update ".$config['tbl_prefix']."gift_product set gift_image='".$fileName."' where gift_id='".$id."'";
				mysql_query($update_gift);
			}
			//end - uploade image --------------------------
		
			
			//header("Location: ./?ss=".$ss."&life=74&error=616");
			header("Location: ./?ss=".$ss."&life=751&id=$id&error=616");
			die;
		}
	}
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

//---------------------------To Get Employee List for Attend Summary----------------------------
function getEmployeeList(){
	global $ss,$config;
	echo"<select name='employee'>";
	$sql="SELECT * from ".$config['tbl_prefix']."users";
	echo"$sql";
	//exit();
	$result=mysql_query($sql);
	if(mysql_num_rows($result)>=1) {
		while($row=mysql_fetch_array($result)) {
			$empId=$row[0];
			$empName=$row[5]." ".$row[6];
			$empJobTitle=$row[10];
			$empJobTitle2=$row[12];
			echo"<option value='$empId'>$empName - $empJobTitle - $empJobTitle2</option>";
		}
	} else {
		echo"<option value='NULL'>---------No Record-------</option>";
	}
	echo"</select>";
	
}
//------------------------------------------------------------------------------------------------