<?php
include_once('inc_connection.php');
if(isset($_POST['category']) && $_POST['category']!='')
{
$catId = addslashes(trim($_POST['catId']));
$category = addslashes(trim($_POST['category']));
$details = addslashes(trim($_POST['details']));


$sql1="UPDATE oxy2_category SET categoryName='$category',categoryDetails='$details' WHERE categoryId='$catId'";

$result = mysql_query($sql1);

header("Location: ./?id=6&subId=1");
}

?>






