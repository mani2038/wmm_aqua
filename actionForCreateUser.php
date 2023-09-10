<?php
include('inc_connection.php');
include('commonFunction.php');
function convertDateinProperFormat($nDate)
{
$der = explode("/",$nDate);
$dd = $der['0'];
$mm = $der['1'];
$yy = $der['2'];
$newDate = $yy."-".$dd."-".$mm;
return $newDate;
}
if(isset($_POST['dept']) && $_POST['dept']!='')
{
	
$userName = $_COOKIE["name"];


$department = addslashes(trim($_POST['dept']));

$empId = addslashes(trim($_POST['empId']));

$fname = addslashes(trim($_POST['fname']));

$lname = addslashes(trim($_POST['lname']));

$gender = addslashes(trim($_POST['gender']));

$job_title = addslashes(trim($_POST['job_title']));

$phone = addslashes(trim($_POST['phone']));

$landlineNumber = addslashes(trim($_POST['landline']));


$address1 = addslashes(trim($_POST['address1']));

$user_type = addslashes(trim($_POST['user_type']));
$userTypeName = getUserTypeName($user_type);


$dateofjoining = addslashes(trim($_POST['dateofjoining']));
$converteddateofjoining = convertDateinProperFormat($dateofjoining);


$dateofbirth = addslashes(trim($_POST['dateofbirth']));
$converteddateofbirth = convertDateinProperFormat($dateofbirth);


$email = addslashes(trim($_POST['email']));
$alternateEmail = addslashes(trim($_POST['alternateEmail']));

//$genpwd = mt_rand(); 

$gen_md5_password = gen_md5_password(8);
$databaseUpdatedPassword = md5($gen_md5_password);

$password = $databaseUpdatedPassword;
$password_temp = $gen_md5_password;

$city = addslashes(trim($_POST['city']));

$branch = addslashes(trim($_POST['branch']));

//Checking wherher company name exists or Not in case of Ajax Checking Failure.
$sql_check = "SELECT count(*) FROM oxy2_users WHERE username = '$email'";

$res2_check = mysqli_query($con,$sql_check);
$row_check = mysqli_fetch_row($res2_check);
$value=$row_check[0];

if($value > 0)
{ ?>
<script type="text/javascript">
alert("Email already exist , please try with different email.");
window.location = "./?id=1&subId=5";
</script>
<?php 
}

else
{


$sql="INSERT INTO oxy2_users 
(`emp_id`,`username`,`password`,`user_type`,`status`,`fname`, `lname`, `gender`,`doj`, `dob`,`job_title`, `emailid`, `alternateEmail`, `branch`, `address1`, `phone`, `landlineNumber`,`city`,`created_on`,`modified_on`,`modified_by`,`deleted_on`,`deleted_by`,`password_temp`,`dept`)

VALUES

('$empId','$email','$password','$user_type','1','$fname','$lname','$gender','$converteddateofjoining','$converteddateofbirth','$job_title','$email','$alternateEmail','$branch','$address1','$phone','$landlineNumber','$city',date_add(now(), interval 630 minute),date_add(now(), interval 630 minute),'$userName','','','$password_temp','$department')";


$result = mysqli_query($con,$sql);

$sqlForLog="INSERT INTO oxy2_userslogs 
(`emp_id`,`username`,`password`,`user_type`,`status`,`fname`, `lname`, `gender`,`doj`, `dob`,`job_title`, `emailid`, `alternateEmail`, `branch`, `address1`, `phone`, `landlineNumber`,`city`,`created_on`,`modified_on`,`modified_by`,`deleted_on`,`deleted_by`,`password_temp`,`dept`)

VALUES

('$empId','$email','$password','$user_type','1','$fname','$lname','$gender','$converteddateofjoining','$converteddateofbirth','$job_title','$email','$alternateEmail','$branch','$address1','$phone','$landlineNumber','$city',date_add(now(), interval 630 minute),date_add(now(), interval 630 minute),'$userName','','','$password_temp','$department')";


$resultForLog = mysqli_query($con,$sqlForLog);

$lastInsertedID = mysqli_insert_id($con);
$sql2="INSERT INTO oxy2_uploadedimage 
(`usr_Id`,`name`,`type`,`extension`,`size`,`area`)

VALUES

('$lastInsertedID','default.png','','','','1')";


$result2 = mysqli_query($con,$sql2);


//Sending Mail
		
		$to = $email;
		//$to = "imanish.yadav@gmail.com";
		
		$subject = 'Employee Details : '.$fname.' '.$lname; 
		$random_hash = md5(date('r', time())); 
		
		$headers = "From:WaterMarketing Aqua <contact@watermarkmktg.com>\r\nReply-To:contact@watermarkmktg.com\r\n";
		$headers .= "\r\nContent-type: text/html\r\n";
		
		
		$message.= "<html>";
		$message.= "<head>";
		$message.= "<title>Employee Details : $fname $lname</title>";
		$message.= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>";
		$message.= "</head>";
		$message.= "<body>";
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='border:1px solid lightgray;width:100%;'>";
		$message.= "";
		
		$message.= "<tr style='background:#515B5E;'>";
		$message.= "<td colspan='2'><img src='http://watermarkmktg.com/aqua/images/logo.png' alt='Aqua Logo' style='width:154px;height:39px;padding:10px;color:white;border:none;'/></td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='padding:10px;width:100%;'>";
		$message.= "<tr>";
		$message.= "<td style='margin:10px;'><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><b>Welcome </b>$fname $lname !,</td>";
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>Your account has been created successfully , with the following details<br/><br/></td>";
		
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Username is : 
		
		</td>";
		$message.= "<td>$email</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Password is : 
		
		</td>";
		$message.= "<td>$password_temp</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Employee Id : 
		
		</td>";
		$message.= "<td>$empId</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Department : 
		
		</td>";
		$message.= "<td>$department</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>User Type : 
		
		</td>";
		$message.= "<td>$userTypeName</td>";
		$message.= "</tr>";
			
		$message.= "<br />";
				
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td> Gender: 
		
		</td>";
		$message.= "<td>$gender</td>";
		$message.= "</tr>";

		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Date Of Joining : 
		
		</td>";
		$message.= "<td>$converteddateofjoining</td>";
		$message.= "</tr>";
			
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Date Of Birth : 
		
		</td>";
		$message.= "<td>$converteddateofbirth</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Designation : 
		
		</td>";
		$message.= "<td>$job_title</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
				
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Branch : 
		
		</td>";
		$message.= "<td>$branch</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td colspan='2'><a href='http://watermarkmktg.com/aqua'>Click here </a> to access WaterMarketing Aqua 
		
		</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		
		
		
		
		$message.= "</table>";
		$message.= "</body>";
		$message.= "</html>";
		$mail_sent = @mail( $to, $subject, $message, $headers );
		
		//Mail Ended



	header("location:.?id=1&subId=7&em=$email");
	
}


}


?>