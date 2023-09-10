<?php
include_once('commonFunction.php');
include_once('inc_connection.php');


$city = addslashes(trim($_POST['city']));
$vendor = addslashes(trim($_POST['vendor']));
$noi = addslashes(trim($_POST['noi']));
$itemName = addslashes(trim($_POST['itemName']));
$rate = addslashes(trim($_POST['rate']));
$tax = addslashes(trim($_POST['tax']));


//Making a check to validate category whether it exists.
$sql_check = "SELECT count(*) FROM oxy2_itemtovendor WHERE city = '$city' AND vendor = '$vendor' AND itemName = '$itemName'";

$res2_check = mysql_query($sql_check);
$row_check = mysql_fetch_row($res2_check);
$value=$row_check[0];

if($value > 0)
{ ?>
<script type="text/javascript">
alert("Item Already Assigned to Vendor");
window.location = "./?id=6&subId=6";
</script>
<?php 
}

else
{	

$sql="INSERT INTO oxy2_itemtovendor (`city`,`vendor`,`itemName`,`items`,`rate`,`tax`,`dateAdded`)

VALUES

('$city','$vendor','$itemName','$noi','$rate','$tax',date_add(now(), interval 630 minute))";

$result = mysql_query($sql);

header("Location: ./?id=10&subId=2");
}

?>






