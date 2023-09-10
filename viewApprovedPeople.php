<?php
include_once('commonFunction.php');
include_once('inc_connection.php');

$raisePoId = $_REQUEST['raisePoId'];



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
td{
	padding:3px;
	
	}


-->
</style>
    
  <div style="width:500px; height:150px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">  
  
  <table width="100%" border="1" cellspacing="1" cellpadding="1">
   <tr>
    <td colspan="4"><span style="font-size:18px; font-weight:bold;">Approved By : </span><br/></td>
  </tr>
  <tr>
    <td colspan="4"><br/></td>
  </tr>
  
  <tr>
   <td><label>S.No</label></td>
    <td><label>Name</label></td>
    <td><label>Email</label></td>
    <td><label>Contact Number</label></td>
  </tr>
  <tr>
    <td colspan="4"><br/></td>
  </tr>
  
   <?php

$SelQuery = "SELECT * FROM oxy2_userpermit_records WHERE vendorRaisedId = '$raisePoId' AND status = '1'";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				$i++;
				$userId= $SelResult['userId'];
				$id= $SelResult['id'];
				$getUserListDetails = getUserListDetails($userId);
				
?>  
 
  <tr>
    <td><?php echo $i; ?></td>
    
    <td><?php echo $getUserListDetails['4']." ".$getUserListDetails['5']; ?></td>
 	<td><?php echo $getUserListDetails['10']; ?></td>
    <td><?php echo $getUserListDetails['14']; ?></td>
  </tr>
  
  <?php } 
}
else {
 ?>
  <tr>
    <td colspan="4">No record Found</td>
  </tr>
  
  <?php } ?>
  </table>
  
  </div>



        

        


        

        

  