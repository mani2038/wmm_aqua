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
    
  <div style="width:1000px; height:300px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">  
    
<table width="1000" border="0" cellspacing="4" cellpadding="4" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">

 <tr><td colspan="12" align="left"><span style="font-size:17px; font-weight:bold;">List of Invoice filed in this Lead No. : <?php echo $leadNumber;?></span></td></tr>
 <tr><td colspan="12" align="center"><hr/></td></tr>
 
 <tr style="font-weight:bold; font-size:14px;"><td align="center">S.No.</td><td align="center">Comp. Name</td><td align="center">Invoice Date</td><td align="center">Invoice No.</td><td align="center">Invoice Value</td><td align="center">Invoice GP</td><td align="center">Cheque No.</td><td align="center">Payment Received</td><td align="center">Receiving Date</td><td align="center">Balance</td><td align="center">Expiry Date</td><td align="center">Closure Date</td><td align="center">Action</td></tr>
 <tr><td colspan="12" align="center"><br/></td></tr>
 
 
 <?php

$SelQuery = "SELECT * FROM oxy2_leadinvoice WHERE leadId = '$ldId'";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				$i++;
				$companyId= $SelResult['companyId'];
				$clientNamee = getClientListDetails($companyId);
				$clientName = $clientNamee['0'];
				
				$invoiceDate= $SelResult['invoiceDate'];
				$invoiceNumber= $SelResult['invoiceNumber'];
				$invoiceValue= $SelResult['invoiceValue'];
				$invoiceGp= $SelResult['invoiceGp'];
				$chequeNumber= $SelResult['chequeNumber'];
				$paymentRecieved= $SelResult['paymentRecieved'];
				$receivingDate= $SelResult['receivingDate'];
				$balance= $SelResult['balance'];
				$expiryDate= $SelResult['expiryDate'];
				$closureDate= $SelResult['closureDate'];
							
?>  
 <tr><td align="center"><?php echo $i; ?></td><td align="center"><?php echo $clientName; ?></td><td align="center"><?php echo $invoiceDate; ?></td><td align="center"><?php echo $invoiceNumber; ?></td><td align="center"><?php echo $invoiceValue; ?></td><td align="center"><?php echo $invoiceGp; ?></td><td align="center"><?php echo $chequeNumber; ?></td><td align="center"><?php echo $paymentRecieved; ?></td><td align="center"><?php echo $receivingDate; ?></td><td align="center"><?php echo $balance; ?></td><td align="center"><?php echo $expiryDate; ?></td><td align="center"><?php echo $closureDate; ?></td><td align="center"><a href="./?id=2&subId=28&inId=<?= $SelResult['id']?>" target="_blank">Edit</a></td></tr>
 <tr><td colspan="12" align="center"><br/></td></tr>
 
 <?php } 
}
else {
 ?>
  <tr><td colspan="12" align="center"><br/></td></tr>
  
  <?php } ?>
  </table>
  
  </div>



        

        


        

        

  