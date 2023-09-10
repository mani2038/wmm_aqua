<?php
include_once('inc_connection.php');
if(isset($_POST['category']) && $_POST['category']!='')
{
$itemId = addslashes(trim($_POST['itemId']));
$category = addslashes(trim($_POST['category']));
$item = addslashes(trim($_POST['item']));
$details = addslashes(trim($_POST['details']));



$sql1="UPDATE oxy2_item SET itemName='$item',itemDetails='$details',categoryId='$category' WHERE itemId='$itemId'";

$result = mysql_query($sql1);

header("Location: ./?id=6&subId=2");
}

?>






