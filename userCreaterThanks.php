<?php 
$emailt = $_REQUEST['em'];
$fetchedUserId = getUserDetail($emailt);

$sql="INSERT INTO oxy2_uploadedimage 
(`usr_Id`,`name`,`area`)

VALUES

('$fetchedUserId','default.png','1')";

$result = mysqli_query($con,$sql);

?>


<div class="msgbar msg_Info hide_onC">
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td align="center"><img src="icons/createUser.png" width="256" height="256" /></td>
  </tr>
  <tr>
    <td align="center"><span style="font-size:16px; font-weight:bold;"> User Created Succesfully</span></td>
  </tr>
</table>

	  
        </div>