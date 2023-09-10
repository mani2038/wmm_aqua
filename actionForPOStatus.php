<?php
set_time_limit(300);
  include_once('inc_connection.php');
		$yes = addslashes(trim($_POST['yes']));
		$no = addslashes(trim($_POST['no']));
		
		//Start checking for the User is Valid
		$userr = addslashes(trim($_POST['userr']));
		$password = addslashes(trim($_POST['password']));
		$user_password	=	md5($password);
		
		$query			=	"SELECT * from oxy2_users where user_id='$userr' and password='$user_password' and status='1'";
				
		$rs				=	mysql_query($query);
		$count = mysql_num_rows($rs);
		if($count>=1)
		{
		
		
				$raisePOId = addslashes(trim($_POST['raisePOId']));
				
				$que="SELECT appDisStatus FROM oxy2_raise_povendor WHERE raisePoId = '$raisePOId'";
				$res=mysql_query($que);
				$row=mysql_fetch_array($res);
				$appDisStatus = $row[appDisStatus];
						
				if($yes == "Approve"){
					
				//Update permision record 
				$newvalue = $appDisStatus + 1;
				$sql1="UPDATE oxy2_raise_povendor SET appDisStatus = '$newvalue' WHERE raisePoId='$raisePOId'";
				
				//Activate the Log record for the User those have Apporved
				
				$sqlApproveLog="INSERT INTO oxy2_userpermit_records 
(`userId`,`vendorRaisedId`,`status`,`dateAdded`)

VALUES

('$userr','$raisePOId','1',date_add(now(), interval 630 minute))";


$result = mysql_query($sqlApproveLog);

				
				$result = mysql_query($sql1);
				$test = "Approved";
				header("location:./?id=10&subId=2&mess=$test");
					
				 //header("location:./?id=10");
		
				
				}
				
				if($no == "Disapprove"){
					
					$newvalue = $appDisStatus - 1;
					
				$sql1="UPDATE oxy2_raise_povendor SET appDisStatus = '$newvalue' WHERE raisePoId='$raisePOId'";
				
				//Activate the Log record for the User those have Apporved
				
				$sqlDisapprovedLog="INSERT INTO oxy2_userpermit_records 
(`userId`,`vendorRaisedId`,`status`,`dateAdded`)

VALUES

('$userr','$raisePOId','0',date_add(now(), interval 630 minute))";
$result = mysql_query($sqlDisapprovedLog);


				$result = mysql_query($sql1);
				$test = "Disapproved";	
				header("location:./?id=10&subId=2&mess=$test");
					
				//header("location:./?id=3&subId=10");
				}
		}
		else
		{
			?>
<script type="text/javascript">
alert("You have entered a wrong password.");
window.location = "./?id=6&subId=9";
</script>
<?php 
		}


		
		

  
  ?>