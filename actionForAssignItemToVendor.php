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

$vendorId = addslashes(trim($_POST['vendorId']));

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
		
		
	
		
		$sql="INSERT INTO oxy2_itemtovendor (`vendor`,`itemName`,`rate`,`tax`, `dateAdded`)VALUES('".$_POST['vendorId']."','".$_POST['itemName'.$i]."','".$_POST['rate'.$i]."','".$_POST['tax'.$i]."',date_add(now(), interval 630 minute));";

	
		$result = mysql_query($sql);
		
if($result){$actionResultRedirection = "true";}
else
{$actionResultRedirection = "false";}
header("location:addItemsToVendor.php?mess=$actionResultRedirection");
			
	}



?>






