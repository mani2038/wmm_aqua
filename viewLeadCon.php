<?php
include_once('commonFunction.php');
include_once('inc_connection.php');

$ldId = $_REQUEST['ldId'];
$LeadListDetails = getLeadListDetails($ldId);
$leadNumber = $LeadListDetails['0'];

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

-->
</style>
    
  <div style="width:250px; height:200px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">  
    
<table width="250" border="0" cellspacing="4" cellpadding="4" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">

 <tr>
   <td colspan="3" align="center"><span style="font-size:17px; font-weight:bold;">Contract Support files</span></td></tr>
 <tr><td colspan="3" align="center"><hr /></td></tr>
 
 <tr style="font-weight:bold; font-size:14px;"><td align="center">S.No.</td>
   <td align="center">File Name</td>
 <td align="center">Uploaded Date</td></tr>
 <tr><td colspan="3" align="center"><br/></td></tr>
 
 
 <?php

$SelQuery = "SELECT * FROM oxy2_upload_op WHERE event_id = '$ldId' and path='contracted' ";
$SelExec = mysql_query($SelQuery);
$cntt = mysql_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysql_fetch_array($SelExec))
				{
				$i++;
				$id= $SelResult['id'];
				
				$filename= $SelResult['name'];
				$lead= $SelResult['event_id'];
				$uploaded_dt= $SelResult['dt'];
							
?>  
 <tr><td align="center"><?php echo $i; ?></td><td align="center"><a href="download.php?id=<?php echo $id; ?>" target="_blank">Download</a></td><td align="center"><?php echo $uploaded_dt; ?></td></tr>
 <tr><td colspan="3" align="center"><br/></td></tr>
 
 <?php } 
}
else {
 ?>
  <tr><td colspan="3" align="center"><br/></td></tr>
  
  <?php } ?>
  </table>
  
  </div>



        

        


        

        

  