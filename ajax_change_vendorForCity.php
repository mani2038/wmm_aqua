<?php
include('inc_connection.php');
$city = $_POST['id'];
$que="SELECT * FROM oxy2_vendor WHERE city = '$city'";
$res=mysql_query($que);
while($row=mysql_fetch_array($res))
{
$vendorId=$row['vendorId'];
$vendor=$row['vendor'];
echo '<option value="'.$vendorId.'">'.$vendor.'</option>';
}
?>