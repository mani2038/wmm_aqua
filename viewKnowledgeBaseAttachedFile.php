<?php
include_once('commonFunction.php');
include_once('inc_connection.php');

$knowledgeBaseId = $_REQUEST['knowledgeBaseId'];
$extension = $_REQUEST['extension'];



?>
<style type="text/css">
<!--


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
    
  <div style="width:600px; height:200px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">  
    
<table width="100%" border="0" cellspacing="4" cellpadding="4" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">

 <tr>
   <td colspan="5" align="left"><span style="font-size:10px; font-weight:bold;">Attached files</span></td></tr>
 <tr><td colspan="5" align="left"><hr /></td></tr>
 
<tr style="font-weight:bold; font-size:14px;"><td align="center">S.No.</td>
   <td align="center">File Name</td>
   <td align="center">Size</td>
   <td align="center">Type</td>
   <td align="center">Uploaded Date</td></tr>
 <tr><td colspan="5" align="center"><br/></td></tr>
 
 
 <?php

$SelQuery = "SELECT * FROM oxy2_upload_op WHERE event_id = '$knowledgeBaseId' and extension='$extension' ";
$SelExec = mysql_query($SelQuery);
$cntt = mysql_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysql_fetch_array($SelExec))
				{
				$i++;
				$id= $SelResult['id'];
				
				$filename= $SelResult['name'];
				$size= $SelResult['size'];
				$file_name= $SelResult['area'];
				$type= $SelResult['extension'];
								
				$lead= $SelResult['event_id'];
				$uploaded_dt= $SelResult['dt'];
										
?>  
 
 
 
 
<tr style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:12px; color:#000"><td align="center"><?php echo $i; ?></td><td align="center"><a href="download.php?id=<?php echo $id; ?>" target="_blank" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:10px; color:#000"><?php echo $file_name; ?></a></td>
   <td align="center"><?php echo $size; ?></td>
   <td align="center"><?php echo $type; ?></td>
   <td align="center"><?php echo $uploaded_dt; ?></td></tr>
 <tr><td colspan="5" align="center"><br/></td></tr>
 
 
 
 
 
 <?php } 
}
else {
 ?>
  <tr><td colspan="12" align="center" style="font-size:14px; font-weight:bold;"><br/>No records found</td></tr>
  
  <?php } ?>
  </table>
  
  </div>



        

        


        

        

  