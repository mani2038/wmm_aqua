<?php
include_once('commonFunction.php');
include_once('inc_connection.php');

$actionId = $_REQUEST['actionId'];
$leadNumber = $_REQUEST['leadNumber'];


?>
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
label{
	font-weight:bold;
	font-size:14px;
}

-->
</style>
    
  <div style="width:1000px; height:300px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">  
    
<table width="1000" border="0" cellspacing="4" cellpadding="4" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">

 <tr><td colspan="12" align="left"><span style="font-size:17px; font-weight:bold;">Lead No. : <?php echo $leadNumber;?></span></td></tr>
 <tr><td colspan="12" align="center"><br/></td></tr>
 
 <tr>
		
		<td width="48" rowspan="2" align="center" valign="middle">  <label>S No.<label>  </td>
		<td width="176" rowspan="2" align="center"><span class="style1 style8 style9"><label>Task</label></span></td>
		<td height="17" colspan="5" align="center"><span class="style1 style8 style9"><label>No of Hours</label></span></td>
		<td width="147" rowspan="2" align="center"><span class="style1 style8 style9"><label>Start date</label></span></td>
	    <td width="138" rowspan="2" align="center"><span class="style1 style8 style9"><label>Finish Date</label></span></td>
	    <td width="221" rowspan="2" align="center" style="text-align:justify"><span class="style1 style8 style9"><label>Responsibilites</label></span></td>
    </tr>
	<tr>
	  <td width="82" align="center" style="background:rgb(252,250,-240,0.9);"><span class="style1 style8 style9"><label><a href="#" title="Project Leader" style="color:#000; text-decoration:none; cursor:pointer;">PL</a></label></span></td>
      <td width="57" align="center" style="background:rgb(252,250,-240,0.9);"><span class="style1 style8 style9"><label><a href="#" title="Team Leader" style="color:#000; text-decoration:none; cursor:pointer;">TL</a></label></span></td>
      <td width="60" align="center" style="background:rgb(252,250,-240,0.9);"><span class="style1 style8 style9"><label><a href="#" title="Client Servicing Manager" style="color:#000; text-decoration:none; cursor:pointer;">CS</a></label></span></td>
      <td width="55" align="center" style="background:rgb(252,250,-240,0.9);"><span class="style1 style8 style9"><label><a href="#" title="Zone Head" style="color:#000; text-decoration:none; cursor:pointer;">ZH</a></label></span></td>
	  <td width="54" align="center" style="background:rgb(252,250,-240,0.9);"><span class="style1 style9 style8"><label><a href="#" title="Accounts Department" style="color:#000; text-decoration:none; cursor:pointer;">ACT</a></label></span></td>
	</tr>
 
 
 <?php

$SelQuery = "SELECT * FROM oxy2_dateline WHERE leadNumber = '$leadNumber' AND eventid = '$actionId'";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				$i++;
				$task= $SelResult['task'];
				$pl_hours= $SelResult['pl_hours'];
				$tl_hours= $SelResult['tl_hours'];
				$sh_hours= $SelResult['sh_hours'];
				$anoh_hours= $SelResult['anoh_hours'];
				$es_hours= $SelResult['es_hours'];
				$startDate= $SelResult['startDate'];
				$EndDate= $SelResult['EndDate'];
				$responsibilities= $SelResult['responsibilities'];
										
?>  
 
 
 
 
 <tr bgcolor="#FFFFFF">
	<td align="center" valign="middle" ><?php echo $i; ?></td>
	<td align="center" valign="middle"><?php echo $task; ?></td>
	<td align="center" valign="middle"><?php echo $pl_hours; ?></td>
	<td align="center" valign="middle"><?php echo $tl_hours; ?></td>
	<td align="center" valign="middle"><?php echo $sh_hours; ?></td>
	<td align="center" valign="middle"><?php echo $anoh_hours; ?></td>
	<td align="center" valign="middle"><?php echo $es_hours; ?></td>
	<td align="center" valign="middle"><?php echo $startDate; ?></td>
    <td align="center" valign="middle"><?php echo $EndDate; ?></td>
	<td align="center" valign="middle" style="text-align:justify;"><?php echo $responsibilities; ?></td>
	</tr>
 
 
 
 
 
 <?php } 
}
else {
 ?>
  <tr><td colspan="12" align="center" style="font-size:14px; font-weight:bold;"><br/>No records found</td></tr>
  
  <?php } ?>
  </table>
  
  </div>



        

        


        

        

  