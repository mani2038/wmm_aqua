<?php
include_once('commonFunction.php');
include_once('inc_connection.php');

function convertDateinProperFormat($nDate)
{
if($nDate != ""){
$der = explode("/",$nDate);
$mm = $der['0'];
$dd = $der['1'];
$yy = $der['2'];
$newDate = $yy."-".$mm."-".$dd;
return $newDate;
}
else
{
return "0000-00-00";
}

}

$leadId = addslashes(trim($_POST['leadId']));
$LeadListDetails = getLeadListDetails($leadId);
$companyId = $LeadListDetails['2'];


$count = addslashes(trim($_POST['count']));


for ($i=1;$i<=$count;$i++)
	{
		$invoiceDate = addslashes(trim($_POST['startdate'.$i]));
		$convertedinvoiceDate = convertDateinProperFormat($invoiceDate);
		
		$invoiceReceiveDate = addslashes(trim($_POST['enddate'.$i]));
		$convertedinvoiceReceiveDate = convertDateinProperFormat($invoiceReceiveDate);
		
		$invoiceExpectedDate = addslashes(trim($_POST['expDate'.$i]));
		$convertedinvoiceExpectedDate = convertDateinProperFormat($invoiceExpectedDate);
		
		$invoiceClosureDateDate = addslashes(trim($_POST['closureDate'.$i]));
		$convertedinvoiceClosureDate = convertDateinProperFormat($invoiceClosureDateDate);
		
		

		
		$sql="INSERT INTO oxy2_leadinvoice (`leadId`,`companyId`,`invoiceDate`,`invoiceNumber`,`invoiceValue`, `invoiceGp`, `chequeNumber`, `paymentRecieved`, `receivingDate`, `balance`, `expiryDate`, `closureDate`, `dateAdded`)VALUES('".$_POST['leadId']."','$companyId','$convertedinvoiceDate','".$_POST['iNum'.$i]."','".$_POST['iVal'.$i]."','".$_POST['iGp'.$i]."','".$_POST['iCheq'.$i]."','".$_POST['iPay'.$i]."','$convertedinvoiceReceiveDate','".$_POST['iBal'.$i]."','$convertedinvoiceExpectedDate','$convertedinvoiceClosureDate',date_add(now(), interval 630 minute));";
		
	
		$result = mysqli_query($con,$sql);
		
if($result){$actionResultRedirection = "success=true";}
else
{$actionResultRedirection = "success=false";}
header("location:.?id=10&$actionResultRedirection");
			
	}



?>






