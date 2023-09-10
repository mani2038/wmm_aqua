<?php
include_once('commonFunction.php');
include_once('inc_connection.php');



$count = addslashes(trim($_POST['count']));
$vendorIdd = addslashes(trim($_POST['vendorIdd']));
$raisefor = addslashes(trim($_POST['raisefor']));
$choices = addslashes(trim($_POST['choices']));
$per = addslashes(trim($_POST['per']));


for ($i=1;$i<=$count;$i++)
	{
		$itemName = addslashes(trim($_POST['itemName'.$i]));
		$qty = addslashes(trim($_POST['qty'.$i]));
		$rate = addslashes(trim($_POST['rate'.$i]));
		$tax = addslashes(trim($_POST['tax'.$i]));
		$amount = addslashes(trim($_POST['amount'.$i]));
		
		
		$sql="INSERT INTO oxy2_raise_vendoritem (`raisePoId`,`vendorId`,`itemId`,`quantity`,`rate`, `tax`, `amount`, `choice`, `finalTax`, `dateAdded`)VALUES('$raisefor','$vendorIdd','$itemName','$qty','$rate','$tax','$amount','$choices','$per',date_add(now(), interval 630 minute));";
		
	
		$result = mysql_query($sql);
		
if($result){$actionResultRedirection = "success=true";}
else
{$actionResultRedirection = "success=false";}
header("location:.?id=10&$actionResultRedirection");
			
	}



?>






