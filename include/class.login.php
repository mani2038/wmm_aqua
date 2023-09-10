<?php
	class ClassLogin extends Database {
		//constructor
		function ClassLogin(){
			// Make a connection to the database
			$this->Database();
		}
		function CheckUser($username,$password){
		// Do some escaping
			//$username = $this->escapeForDatabase($username);
			//$password = $this->escapeForDatabase($password);
			$this->QueryExec('SELECT * from customers where customers_email_address = "'.$username.'" and customers_password = "'.md5($password).'" and confirm="1"');
			if ($this->Record_Count() > 0){
			$row1=$this->FetchObject();
			session_register('customers_detail');
			session_register('customers_email');
			session_register('customers_id');
			$_SESSION['customers_detail']=$row1->customers_lastname.' '.$row1->customers_firstname ;
			$_SESSION['customers_email']=$row1->customers_email_address;
			$_SESSION['customers_id']=$row1->customers_id;
			return true;
			} else {
			return false;
			}
		}
		function LogoutUser(){
			unset($_SESSION['customers_detail']);
			unset($_SESSION['customers_email']);
			unset($_SESSION['customers_id']);
			return true;
		}
		function validate_new_user($post){
			if($post['customers_email_address']=='' || $post['customers_street_address']==''){
				$ret="Invalid submission some fields are blank";
			/*}else if(ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $post['customers_email_address'])) {
				$ret="The e-mail is not valid"; 	
			}else if($post['customers_password']!=$post['confirmation_password']){
				$ret="Password and confirm password are different"; 	
			}else if(!ctype_alnum($post['customers_password']) || 
				strlen($post['customers_password']) <6){	
				$ret="invalid password"; */	
			}else{
					$this->QueryExec('SELECT * from customers where 
					customers_email_address = "'.$post['customers_email_address'].'"');
					$temp_row=$this->FetchObject();
					$this->QueryExec('SELECT * from customers_address where 
					customers_id = "'.$temp_row->customers_id.'"');
					
					if ($this->Record_Count() > 0){
					$ret="Already Information Exist"; 	
					}else{
					//insert into tables
							$sql1="update customers
								set customers_firstname = '".$post['customers_firstname']."',
								customers_lastname = '".$post['customers_lastname']."',
								customers_telephone = '".$post['customers_telephone']."',
								alternate_email = '".$post['alternate_email']."'
								Where customers_id = '".$temp_row->customers_id."'";
								$this->QueryExec($sql1);	
								$idn=$temp_row->customers_id;
							if($idn>0){	
									$sql2="insert into customers_address
									  (customers_id,
									   customers_street_address,
									   customers_suburb,
									   customers_city,
									   customers_postcode,
									   customers_state,
									   customers_country,
									   customers_telephone,
									   customers_email_address,
									   delivery_street_address,
									   delivery_suburb,
									   delivery_city,
									   delivery_postcode,
									   delivery_state,
									   delivery_country
									   )values(
									   '".$idn."',
									   '".$post['customers_street_address']."',
									   '".$post['customers_suburb']."',
									   '".$post['customers_city']."',
									   '".$post['customers_postcode']."',
									   '".$post['customers_state']."',
									   '".$post['customers_country']."',
									   '".$post['customers_telephone']."',
									   '".$post['customers_email_address']."',
									   '".$post['delivery_street_address']."',
									   '".$post['delivery_suburb']."',
									   '".$post['delivery_city']."',
									   '".$post['delivery_postcode']."',
									   '".$post['delivery_state']."',
									   '".$post['delivery_country']."'
									   )";
									   $this->QueryExec($sql2);	
									   if($this->Insert_ID()>0){
										$ret=101;
									   }else{
		       						    $ret="Some error found on executing of sql";
									   } 		   
							}else{
								$ret="Some error found on executing of sql";
							}//end of idn
					}// end of record count
			}//end of if 551e683efe	
			return $ret;
		}
		function validate_new_user2($post){
			if($post['customers_email_address']=='' || $post['customers_password']==''){
				$ret="Invalid submission some fields are blank";
			}else if(ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $post['customers_email_address'])) {
				$ret="The e-mail is not valid"; 	
			}else if($post['customers_password']!=$post['confirmation_password']){
				$ret="Password and confirm password are different"; 	
			}else{
					$this->QueryExec('SELECT * from customers where 
					customers_email_address = "'.$post['customers_email_address'].'"');
					if ($this->Record_Count() > 0){
					$ret="Already a user registered with this email address."; 	
					}else{
					//insert into tables
							$sql1="insert into customers
								(customers_firstname,
								customers_lastname,
								customers_email_address,
								customers_password,
								confirm_id,
								confirm
								)values(
								'".$post['customers_firstname']."',
								'".$post['customers_lastname']."',
								'".$post['customers_email_address']."',
								'".md5($post['customers_password'])."',
								'551e683efe".session_id()."',
								'1'
								)";
								$this->QueryExec($sql1);	
								$idn=$this->Insert_ID();
							if($idn>0){	
									$ret=101;   
							}else{
								$ret="Some error found on executing of sql";
							}//end of idn
					}// end of record count
			}//end of if 551e683efe	
			return $ret;
		}
		function update_customers($post){
					if(strlen($post['customers_password'])>0){
					 $sql1="update customers
						   set customers_firstname = '".$post['customers_firstname']."',
						   customers_lastname = '".$post['customers_lastname']."',
						   customers_telephone = '".$post['customers_telephone']."',
						   alternate_email = '".$post['alternate_email']."',
						   customers_password = '".md5($post['customers_password'])."'
						   Where customers_id = '".$post['customers_id']."'";
					}else{
					$sql1="update customers
						   set customers_firstname = '".$post['customers_firstname']."',
						   customers_lastname = '".$post['customers_lastname']."',
						   customers_telephone = '".$post['customers_telephone']."',
						   alternate_email = '".$post['alternate_email']."'
						   Where customers_id = '".$post['customers_id']."'";
					}
				   $this->QueryExec($sql1);	
				   if($this->Affected_Rows()>0){
				   return 101;
				   }
		}
		
		function update_addresses($post){
					$sql1="update customers_address  set
					customers_street_address= '".$post['customers_street_address']."',
				   customers_suburb= '".$post['customers_suburb']."',
				   customers_city ='".$post['customers_city']."',
				   customers_postcode='".$post['customers_postcode']."',
				   customers_state='".$post['customers_state']."',
				   customers_country='".$post['customers_country']."',
				   delivery_street_address='".$post['delivery_street_address']."',
				   delivery_suburb='".$post['delivery_suburb']."',
				   delivery_city= '".$post['delivery_city']."',
				   delivery_postcode='".$post['delivery_postcode']."',
				   delivery_state= '".$post['delivery_state']."',
				   delivery_country= '".$post['delivery_country']."' 
				   where customers_id='".$post['customers_id']."'";
				  $this->QueryExec($sql1);	
				   if($this->Affected_Rows()>0){
				   return 101;
				   }
		}
				
		
	/*	$message = sprintf (_USEND_MSG_ACTIVATE, $name, $mosConfig_sitename, $mosConfig_live_site."/index.php?option=com_registration&task=activate&activation=".$row->activation, $mosConfig_live_site, $username, $pwd, $link_user, $link_forum, $link_user, $mosConfig_sitename);
	} else {
		$message = sprintf (_USEND_MSG, $name, $mosConfig_sitename, $mosConfig_live_site);
		$message = html_entity_decode($message, ENT_QUOTES);
		mosMail($adminEmail2, $adminName2, $email, $subject, $message);
		
		
		*/
		
		
		
		
		
	}//ebd of class
	
?>
