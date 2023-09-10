<?php
include_once('inc_connection.php');
$vendorId = $_REQUEST['vendorId'];
if(!$_COOKIE["user_id"] && !isset($leadId)){
	echo "<script type='text/javascript'>alert('Please login first')</script>";
	echo "<script type='text/javascript'>window.location = 'login.php'</script>";
	}



$counts = $_POST['counts'];
if($counts==""){$counts=1;}


?>
<html><title>Sercon Oxygen - Add Items To vendor</title>
<style type="text/css">
<!--

body {
	font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
	font-size: 62.5%;
}

.but1 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
	background-color: #3a83ba;
	background-position: center center;
	display: block;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	border-top-color: #3a83ba;
	border-right-color: #3a83ba;
	border-bottom-color: #3a83ba;
	border-left-color: #3a83ba;
}
.but1 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
	background-color: #3a83ba;
	background-position: center center;
	display: block;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	border-top-color: #3a83ba;
	border-right-color: #3a83ba;
	border-bottom-color: #3a83ba;
	border-left-color: #3a83ba;
}
.style11 {font-family: Arial, Helvetica, sans-serif}
.style11 {font-family: Arial, Helvetica, sans-serif}
.style41 {font-size: 12px}
.style41 {font-size: 12px}
.style81 {font-size: 11px}
.style81 {font-size: 11px}
.style91 {	color: #FFFFFF;
	font-weight: bold;
	text-decoration: underline;
	font-family: Arial, Helvetica, sans-serif;
	background-position: center;
}
.style91 {	color: #FFFFFF;
	font-weight: bold;
	text-decoration: underline;
	font-family: Arial, Helvetica, sans-serif;
	background-position: center;
}
-->
</style>
<head>

 <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script>
    $(function() {
        
	<?php 
	for($i=1;$i<=$counts;$i++)
	{?>
		
		$( "#startdate<?php echo $i; ?>" ).datepicker();
		$( "#enddate<?php echo $i; ?>" ).datepicker();
		$( "#expDate<?php echo $i; ?>" ).datepicker();
		$( "#closureDate<?php echo $i; ?>" ).datepicker();
		
	<?php 
	}?>	
    });
    </script>

<style type="text/css">
<!--
input
{
border: 1px solid #CCC;
background: #FCFCFC;
padding: 4px 0px;
width: 5%
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
-moz-box-shadow: inset 1px 1px 2px #ddd;
-webkit-box-shadow: inset 1px 1px 2px #DDD;
box-shadow: inset 1px 1px 2px #DDD;
color: #666;
}

select
{
border: 1px solid #CCC;
padding: 4px 5px;
min-width: 25%;
background: #FCFCFC;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
-moz-box-shadow: inset 1px 1px 2px #ddd;
-webkit-box-shadow: inset 1px 1px 2px #DDD;
box-shadow: inset 1px 1px 2px #DDD;
color: #666;
}

label
{
padding: 5px 0px;

font-size: 13px;
}

.style1 {font-family: Arial, Helvetica, sans-serif}
.but {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
	background-color: #3a83ba;
	background-position: center center;
	display: block;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	border-top-color: #3a83ba;
	border-right-color: #3a83ba;
	border-bottom-color: #3a83ba;
	border-left-color: #3a83ba;
}
.style10 {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
-->

.select { font-family: Verdana; font-size: 10pt; color: #333333; background-color: #FFFFFF; border: 1 solid #6699CC }
submit { background-color: #000066; color: #FFFFFF; font-family: verdana; color:#000000 ; font-size: 8pt;}
.style4 {font-size: 12px}
.style8 {font-size: 11px}
.style9 {
	color: #FFFFFF;
	font-weight: bold;
	text-decoration: underline;
	font-family: Arial, Helvetica, sans-serif;
	background-position: center;
}
</style>


<script language=javascript>
/*function check()
{
	alert(document.form2.elements.length);
for (x=0; x<document.form2.elements.length; x++)
 {
  if (document.form2.elements[x].value == "") 
  {
   alert("Sorry, you forgot required fields. Please try again. : "+document.form2.elements[x].name); 
	document.form2.elements[x].focus();
   return false;
  }
 }
 document.form2.submit2.value ="Invoice is Uploading.....";
 return true;
}*/

function check(form) {
	
var numtest= /^[0-9]+$/;

var emailtest=/^[a-zA-Z][\w\_\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;

<?php 
for($i=1;$i<=$counts;$i++)
{?>

	if(form.startdate<?php echo $i; ?>.value == "") {
		alert("Please enter the Invoice Date<?php echo $i; ?>");
		form.startdate<?php echo $i; ?>.focus();
		return(false);
	}
	
	if(form.iNum<?php echo $i; ?>.value == "") {
		alert("Please enter the Invoice Number<?php echo $i; ?>");
		form.iNum<?php echo $i; ?>.focus();
		return(false);
	}
	
	if(!(numtest.test(form.iNum<?php echo $i; ?>.value)))
	{
	alert("Only Digits Required!");
	form.iNum<?php echo $i; ?>.value = "";
	form.iNum<?php echo $i; ?>.focus();
	return(false);
	}
	
	if(form.iVal<?php echo $i; ?>.value == "") {
		alert("Please enter the Invoice Value<?php echo $i; ?>");
		form.iVal<?php echo $i; ?>.focus();
		return(false);
	}
	if(!(numtest.test(form.iVal<?php echo $i; ?>.value)))
	{
	alert("Only Digits Required!");
	form.iVal<?php echo $i; ?>.value = "";
	form.iVal<?php echo $i; ?>.focus();
	return(false);
	}
	
	
	if(form.iGp<?php echo $i; ?>.value == "") {
		alert("Please enter the Invoice GP<?php echo $i; ?>");
		form.iGp<?php echo $i; ?>.focus();
		return(false);
	}
	if(!(numtest.test(form.iGp<?php echo $i; ?>.value)))
	{
	alert("Only Digits Required!");
	form.iGp<?php echo $i; ?>.value = "";
	form.iGp<?php echo $i; ?>.focus();
	return(false);
	}
	
	
	/*if(form.iCheq<?php echo $i; ?>.value == "") {
		alert("Please enter the Cheque Number<?php echo $i; ?>");
		form.iCheq<?php echo $i; ?>.focus();
		return(false);
	}
	if(!(numtest.test(form.iCheq<?php echo $i; ?>.value)))
	{
	alert("Only Digits Required!");
	form.iCheq<?php echo $i; ?>.value = "";
	form.iCheq<?php echo $i; ?>.focus();
	return(false);
	}
	
	if(form.iPay<?php echo $i; ?>.value == "") {
		alert("Please enter the Payment Received<?php echo $i; ?>");
		form.iPay<?php echo $i; ?>.focus();
		return(false);
	}
	if(!(numtest.test(form.iPay<?php echo $i; ?>.value)))
	{
	alert("Only Digits Required!");
	form.iPay<?php echo $i; ?>.value = "";
	form.iPay<?php echo $i; ?>.focus();
	return(false);
	}
	
	if(form.enddate<?php echo $i; ?>.value == "") {
		alert("Please enter the Receiving Date<?php echo $i; ?>");
		form.enddate<?php echo $i; ?>.focus();
		return(false);
	}
	
	if(form.iBal<?php echo $i; ?>.value == "") {
		alert("Please enter the Balance<?php echo $i; ?>");
		form.iBal<?php echo $i; ?>.focus();
		return(false);
	}
	if(!(numtest.test(form.iBal<?php echo $i; ?>.value)))
	{
	alert("Only Digits Required!");
	form.iBal<?php echo $i; ?>.value = "";
	form.iBal<?php echo $i; ?>.focus();
	return(false);
	}
	*/
	
	if(form.expDate<?php echo $i; ?>.value == "") {
		alert("Please enter the Expected Date<?php echo $i; ?>");
		form.expDate<?php echo $i; ?>.focus();
		return(false);
	}
	
	if(form.closureDate<?php echo $i; ?>.value == "") {
		alert("Please enter the Closure Date<?php echo $i; ?>");
		form.closureDate<?php echo $i; ?>.focus();
		return(false);
	}
	
	
<?php  } ?>	
	
			
	   
}


function check1()
{
document.form1.submit();	
}

</SCRIPT>
</head>

<body>

<?php if(isset($_REQUEST['mess']) && $_REQUEST['mess'] == "true" ){
?>
<div style="width:100%; height:40px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px; background:#CCC; border-radius:5px;">
    <table width="300" border="0" cellspacing="4" cellpadding="4" align="center" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">

<tr>
   <td colspan="3" align="center"><span style="font-size:17px; font-weight:bold;">Item Assigned to the Vendor </span></td></tr>
</table>
</div>

<?php
} else {
?>

<form method="post" action="#" name="form1">
  <div align="center"><span class="style10">Number of Items</span>
    <select name="counts" onChange="check1();" style="min-width: 5%;">
  <option>Select</option>
  <?php
for($i=1;$i<=10;$i++)
{
	if($counts == $i){$counntSele = "SELECTED = 'SELECTED'";}
	else
	{
		$counntSele = "";
	}
?>
  <option value="<?php echo $i;?>" <?php echo $counntSele; ?>><?php echo $i;?></option>
  <?php
}
?>
    </select>
  </div>
<input type="hidden" name="vendorId" value="<?php echo $vendorId; ?>">
</form>



<form name="form2" action="actionForAssignItemToVendor.php" method="post" onSubmit="return check(this);">
  <table width="100%" align="center" cellpadding="1" cellspacing="1" bgcolor="#999999">
    <tr>
      <td width="34" height="17" align="center" bgcolor="#515B5E"><span class="style1 style8 style9">
        <label>S.No.</label>
      </span></td>
      <td width="101" align="center" bgcolor="#515B5E"><span class="style1 style8 style9">
        <label>Item Name</label>
      </span></td>
      <td width="89" align="center" bgcolor="#515B5E"><span class="style1 style8 style9">
        <label>Rate</label>
      </span></td>
      <td width="99" align="center" bgcolor="#515B5E"><span class="style1 style8 style9">
        <label>Tax</label>
      </span></td>
      
    </tr>
    <?php
for($i=1;$i<=$counts;$i++)
{
?>
    <tr bgcolor="#FFFFFF">
      <td align="center" valign="middle" ><span class="style41"><?php echo $i; ?>.</span></td>
      <td align="center" valign="middle"><select name="itemName<?php echo $i; ?>" id="itemName<?php echo $i; ?>">
                	    <option value="">Select Item Name</option>
						<?php
                        $que="SELECT * FROM oxy2_item";
                        $res=mysql_query($que);
                        while($row=mysql_fetch_array($res))
                        {
                        $itemName = $row[itemName];
						$itemId = $row[itemId];
                        echo "<option value='$itemId'>$itemName</option>";
                        }                        
                        ?>
               	      </select> </td>
      <td align="center" valign="middle"><input name="rate<?php echo $i; ?>" type="text" size="20"/></td>
      <td align="center" valign="middle"><input name="tax<?php echo $i; ?>" type="text" size="20"/>
        </td>
      
    </tr>
    <?php
}
?>
    <tr bgcolor="#FFFFFF">
      <td colspan="11" align="center" bgcolor="#515B5E"><input   name="submit2" type="submit" class="but1" value="            Submit               "></td>
    </tr>
  </table>
  <input type="hidden" name="count" value="<?php echo $counts; ?>">
<input type="hidden" name="vendorId" value="<?php echo $vendorId; ?>">
</form>

<?php } ?>

</body>