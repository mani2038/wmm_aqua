<?php

if(!$_COOKIE["user_id"]){
	echo "<script type='text/javascript'>alert('Please login first')</script>";
	echo "<script type='text/javascript'>window.location = 'login.php'</script>";
	}


$actionChartId = $_REQUEST['actionChartId'];
$leadNumber = $_REQUEST['leadNumber'];
$counts = $_POST['counts'];
if($counts==""){$counts=1;}


?>
<html><title>Sercon Oxygen - Create Dateline</title>
<head>

<LINK REL="stylesheet" type="text/css" href="images/popcalendar.css" />
<script language='javascript' src='images/popcalendar.js'></script>

<!-- Calender Start -->
	<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    
    
    <script type="text/javascript">
	function ajaxCall2(t){

	$("#datepicker"+t).datepicker();
	$("#datepickerA"+t).datepicker();
	
		
	}

</script> -->
    
    
    
    <!-- Ends -->

<style type="text/css">
<!--
input
{
border: 1px solid #CCC;
background: #FCFCFC;
padding: 8px 5px;
width: 25%
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
function check()
{
for (x=0; x<document.form2.elements.length; x++)
 {
  if (document.form2.elements[x].value == "") 
  {
   alert("Sorry, you forgot required fields. Please try again. : "+document.form2.elements[x].name); 
	//document.form2.elements[x].focus();
   return false;
  }
 }
 document.form2.submit2.value ="Dateline is Uploading.....";
 return true;
}

function check1()
{
document.form1.submit();	
}

</SCRIPT>
</head>

<body>

<form method="post" action="#" name="form1">
  <div align="center"><span class="style10">Number of Tasks</span>
    <select name="counts" onChange="check1();" style="min-width: 5%;">
  <option>Select</option>
  <?php
for($i=1;$i<=20;$i++)
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
<input type="hidden" name="eventid" value="<?php echo $actionChartId; ?>">
</form>



<form name="form2" action="actionForaddDateLine.php" method="post" onSubmit="return check();">
<table width="100%" align="center" cellpadding="1" cellspacing="1" bgcolor="#999999">
	<tr>
		
		<td width="48" rowspan="2" align="center" valign="middle" bgcolor="#515B5E"> <span class="style1 style8 style9"> <label>S No.<label></span> </td>
		<td width="176" rowspan="2" align="center" bgcolor="#515B5E"><span class="style1 style8 style9"><label>Task</label></span></td>
		<td height="17" colspan="5" align="center" bgcolor="#515B5E"><span class="style1 style8 style9"><label>No of Hours</label></span></td>
		<td width="147" rowspan="2" align="center" bgcolor="#515B5E"><span class="style1 style8 style9"><label>Start date</label></span></td>
	    <td width="138" rowspan="2" align="center" bgcolor="#515B5E"><span class="style1 style8 style9"><label>Finish Date</label></span></td>
	    <td width="221" rowspan="2" align="center" bgcolor="#515B5E"><span class="style1 style8 style9"><label>Responsibilites</label></span></td>
    </tr>
	<tr>
	  <td width="82" align="center" style="background:rgb(252,250,-240,0.9);"><span class="style1 style8 style9"><label><a href="#" title="Project Leader" style="color:#FFF; text-decoration:none; cursor:pointer;">PL</a></label></span></td>
      <td width="57" align="center" style="background:rgb(252,250,-240,0.9);"><span class="style1 style8 style9"><label><a href="#" title="Team Leader" style="color:#FFF; text-decoration:none; cursor:pointer;">TL</a></label></span></td>
      <td width="60" align="center" style="background:rgb(252,250,-240,0.9);"><span class="style1 style8 style9"><label><a href="#" title="Client Servicing Manager" style="color:#FFF; text-decoration:none; cursor:pointer;">CS</a></label></span></td>
      <td width="55" align="center" style="background:rgb(252,250,-240,0.9);"><span class="style1 style8 style9"><label><a href="#" title="Zone Head" style="color:#FFF; text-decoration:none; cursor:pointer;">ZH</a></label></span></td>
	  <td width="54" align="center" style="background:rgb(252,250,-240,0.9);"><span class="style1 style9 style8"><label><a href="#" title="Accounts Department" style="color:#FFF; text-decoration:none; cursor:pointer;">ACT</a></label></span></td>
	</tr>			
	
<?php
for($i=1;$i<=$counts;$i++)
{
?>
	<tr bgcolor="#FFFFFF">
	<td align="center" valign="middle" ><span class="style4"><?php echo $i; ?>.</span></td>
	<td align="center" valign="middle"><input name="task<?php echo $i; ?>" type="text"></td>
	<td align="center" valign="middle"><select name="pl<?php echo $i; ?>" size="1"  >
 <?php
for($j=1;$j<=24;$j++)
{
?>
        <option value="<?php echo $j; ?>"  ><?php echo $j; ?></option>
        <?php
}
?>
      </select></td>
	<td align="center" valign="middle"><select name="tl<?php echo $i; ?>" size="1"  >

	  <?php
for($k=1;$k<=24;$k++){
	?>
      <option value="<?php echo $k; ?>" ><?php echo $k; ?></option>
      <?php
}
?>
    </select>	</td>
	<td align="center" valign="middle"><select name="sh<?php echo $i; ?>" size="1" >
	  <?php
for($l=1;$l<=24;$l++){
?>
      <option value="<?php echo $l; ?>" ><?php echo $l; ?></option>
      <?php
}
?>
    </select></td>
	<td align="center" valign="middle"><select name="anoh<?php echo $i; ?>" size="1" >
      <?php
for($m=1;$m<=24;$m++){
?>
      <option value="<?php echo $m; ?>" ><?php echo $m; ?></option>
      <?php
}
?>
    </select></td>
	<td align="center" valign="middle"><select name="es<?php echo $i; ?>" size="1" >
      <?php
for($n=1;$n<=24;$n++){
?>
      <option value="<?php echo $n; ?>" ><?php echo $n; ?></option>
      <?php
}
?>
    </select></td>
	<td align="center" valign="middle">
    
    <input name="startdate<?php echo $i; ?>" type="text" size="10" maxlength="10"  readonly="readonly" class="input" />
	  
  <script language='JavaScript' type="text/javascript">
							if (!document.layers) {
								document.write("<img src='images/show-calendar.gif' onclick='popUpCalendar(this, form2.startdate<?php echo $i; ?>,\"mm/dd/yyyy\")' style='cursor:hand'>")
							}
						</script>
    
   <!-- <input type="hidden" id="uu<?php echo $i; ?>" value="<?php echo $i; ?>" />
    
    <input name="startdate<?php echo $i; ?>" type="text" id="datepicker<?php echo $i; ?>" onclick="ajaxCall2(document.getElementById('uu<?php echo $i; ?>').value); return false;" />
    
   --> 
	
    </td><td align="center" valign="middle">
    
    <input name="enddate<?php echo $i; ?>" type="text" size="10" maxlength="10"  readonly="readonly" class="input" />
	  
<script language='JavaScript' type="text/javascript">
							if (!document.layers) {
								document.write("<img src='images/show-calendar.gif' onclick='popUpCalendar(this, form2.enddate<?php echo $i; ?>,\"mm/dd/yyyy\")' style='cursor:hand'>")
							}
						</script>
    
   <!-- <input name="enddate<?php echo $i; ?>" type="text" id="datepickerA<?php echo $i; ?>" onclick="ajaxCall2(document.getElementById('uu<?php echo $i; ?>').value); return false;" />
     	  -->
</td>
	<td align="center" valign="middle"><input name="responsibilties<?php echo $i; ?>" type="text" size="30"/></td>
	</tr>	
<?php
}
?>
<tr bgcolor="#FFFFFF">
<td colspan="10" align="center" bgcolor="#515B5E"><input   name="submit2" type="submit" class="but" value="            Submit               "></td>
</tr>		
</table>
<input type="hidden" name="count" value="<?php echo $counts; ?>">
<input type="hidden" name="eventid" value="<?php echo $actionChartId; ?>">
<input type="hidden" name="leadNumber" value="<?php echo $leadNumber; ?>">
</form>

</body>