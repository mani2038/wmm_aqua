<?php
include_once('commonFunction.php');
$actionId = $_REQUEST['actionId'];


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
 <form method="post" name="form1" action="actionForAC.php" onSubmit="return check()">
	<input type="hidden" name="actionId" id="actionId" class="smallinput" value="<?php echo $actionId; ?>" readonly="readonly"/>
    

    
<table width="400" border="0" cellspacing="4" cellpadding="4" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">

 
 
 <tr>
   <td colspan="3" align="center"><span style="font-size:17px; font-weight:bold;">Request for Action Char Deletion</span></td></tr>
 <tr><td colspan="3" align="center"><hr /></td></tr>
    
 
  <tr><td>Reason type :*</td><td colspan="2">
  <select name="reasonType">
  <option value="">Select Reason Type</option>
  <option value="Lost">Lost</option>
   <option value="Invoiced">Invoiced</option>
  </select>
  
  </td></tr>  
  
  <tr><td valign="top">Reason :*</td><td colspan="2">
  <textarea name="reason" id="reason" rows="5" cols="20"></textarea>
  </td></tr>  
  
  <tr><td></td><td colspan="2"><input type="submit" name="submit" value="Submit" id="submit" /></td></tr>  
  

    

</table>

</form>
</div>
