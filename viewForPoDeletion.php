<?php
include_once('commonFunction.php');
include_once('inc_connection.php');
$raisePOId = base64_decode($_REQUEST['raisePoId']);


?>

<!-- Jquery Calender Script -->

<style type="text/css">
#queue {
	border: 1px solid #E5E5E5;
	height: 65px;
	overflow: auto;
	margin-bottom: 10px;
	padding: 0 3px 3px;
	width: 300px;
}
</style>	

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

#fancybox-outer{
border:6px solid black;
border-radius:4px;
}
input[type="submit"] 
{
padding: 5px 15px;
background: #333;
color: #eee;
margin-left: 5px;
font-weight: bold;
text-shadow: 1px 1px #111;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
width:100px;
}

-->
</style>
    
    <script language = "JavaScript">

function check()
{
	var numtest= /^[0-9]+$/;

	var emailtest=/^[a-zA-Z][\w\_\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;


	if (document.form1.reasonType.value=="")
	{
		alert("Please select the Reason type.");
		document.form1.reasonType.focus();
		return false;
	}
	
	
	if (document.form1.reason.value=="")
	{
		alert("Please select the Reason.");
		document.form1.reason.focus();
		return false;
	}
	
	//----------------------------------------------------------------------------------------------------

	return true;
}

</script>
    
 
 
    <div style="width:400px; height:200px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">
   
 
    
 <form method="post" name="form1" action="actionForPOStatus.php" onSubmit="return check()">
	<input type="hidden" name="raisePOId" id="raisePOId" class="smallinput" value="<?php echo $raisePOId; ?>" readonly="readonly"/>
    

    
<table width="400" border="0" cellspacing="4" cellpadding="4" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">

 
 
 <tr>
   <td colspan="3" align="center"><span style="font-size:17px; font-weight:bold;">Request for PO Approval / Disapproval</span></td></tr>
 <tr><td colspan="3" align="center"><hr /></td></tr>
    
 
  <tr><td>User's List :*</td><td colspan="2">
  <select name="userr">
  <option value="">Please Choose</option>
    
    <?php
    $que="SELECT * FROM oxy2_userpermit WHERE permission = '1'";
    $res=mysqli_query($con,$que);
    while($row=mysqli_fetch_array($res))
    {
    $userId = $row['userId'];
	$getUserListDetails = getUserListDetails($userId);
	$email = $getUserListDetails['10'];
    
	//Checking whether User had ever approved or disparoved the PO before
	$getUserPocheckStatus = getUserPocheckStatus($userId,$raisePOId);
	if($getUserPocheckStatus == "0"){
	
	echo "<option value='$userId'>$email</option>";
	}
	
	}                        
    ?>
    </select>
  
  </td></tr>  
  
  <tr><td valign="top">Enter Your Password :*</td><td colspan="2">
 <input type="text" name="password" id="password" class="smallinput"/>
  </td></tr>  
  
  <tr><td></td><td><input type="submit" name="yes" id="yes" class="smallinput" value="Approve" /></td><td> <input type="submit" name="no" id="no" class="smallinput" value="Disapprove" /></td></tr>  
  

    

</table>

</form>


</div>










        

        


        

        

  