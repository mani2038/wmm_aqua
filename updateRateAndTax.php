<?php  
include 'inc_connection.php';
$itemId = $_POST['itemId'];
$vendorId = $_POST['vendorId'];
$colId = $_POST['colId'];
$rr = "rate".$colId;
?>


<?php 

$que = "SELECT * FROM oxy2_itemtovendor WHERE vendor = $vendorId AND itemName = $itemId";

$res=mysql_query($que);
$row=mysql_fetch_array($res);
$rate = $row[rate];
$tax = $row[tax];

echo $rate."-".$tax;

?>

