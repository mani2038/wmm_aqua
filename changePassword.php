<style type="text/css">
.form_fields_container li div.form_input input, .form_fields_container li div.form_input textarea{
width:30%;
}

</style>
<script type="text/javascript">
function check()
{
	
		
	if (document.form1.newPassword.value==" ")
	{
		alert("Please enter the new password.");
		document.form1.newPassword.focus();
		return false;
	}
	
	return true;
}
</script>
<?php
$userId = $_COOKIE["user_id"];
$username = $_COOKIE["username"];
$name11 = $_COOKIE["name"];

if(isset($_POST['newPassword']) && $_POST['newPassword']!='')
{
$newPassword = md5(addslashes(trim($_POST['newPassword'])));
$newPassword_temp = addslashes(trim($_POST['newPassword']));

$sql1="UPDATE oxy2_users SET password = '$newPassword',password_temp = '$newPassword_temp'  WHERE user_id='$userId'";
$result = mysqli_query($con,$sql1);


//Sending Mail
		
		$to = $username;
		
		$subject = 'Employee Details : '.$name11; 
		$random_hash = md5(date('r', time())); 
		
		$headers = "From:Watermark Marketing Aqua<contact@watermarkmktg.com>\r\nReply-To:contact@watermarkmktg.com";
		$headers .= "\r\nContent-type: text/html\r\n";
		
		$message.= "<html>";
		$message.= "<head>";
		$message.= "<title>Watermark Marketing Aqua Password changed</title>";
		$message.= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>";
		$message.= "</head>";
		$message.= "<body>";
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='border:1px solid lightgray;width:100%;'>";
		$message.= "";
		
		$message.= "<tr style='background:#515B5E;'>";
		$message.= "<td colspan='2'><img src='http://watermarkmktg.com/aqua/images/logo.png' alt='Watermark Marketing Aqua' style='width:154px;height:39px;padding:10px;color:white;border:none;'/></td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='padding:10px;width:100%;'>";
		$message.= "<tr>";
		$message.= "<td style='margin:10px;'><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><b>Dear $name11,</b></td>";
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>Your password has been succesfully changed , with the following details.<br/><br/></td>";
		
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>New Password : 
		
		</td>";
		$message.= "<td align='left' width='40%'><b>$newPassword_temp</b></td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		
	
		
		
		
		$message.= "</table>";
		$message.= "</body>";
		$message.= "</html>";
		$mail_sent = @mail( $to, $subject, $message, $headers );
		
		//Mail Ended


	header("location:.?id=1&subId=11");


}
?>

<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span>
        	<h5>Change Password</h5></div>
            <div class="widget_body">
            
            
           
            <form action="#" method="post" name="form1" id="form1" onSubmit="return check()">
            
            
            <ul class="form_fields_container">
            
            <li><label>New Password: *</label> <div class="form_input"><input name="newPassword" id="newPassword"  type="password" class="tip_east" title="New Password"></div></li>
            
            <li style="text-align:center"><input type="submit" name="submit" id="submit" value="Submit" style="background: #CCC;color:#000000;text-shadow: 1px 1px #DDD; padding:6px;border-radius:5px; font-weight:bold;"/></li>
            </ul>
            </form> 
  
  </div>
        </div>
    </div>
                     
 	<br class="clear" />   

