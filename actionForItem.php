<?php
include_once('commonFunction.php');
include_once('inc_connection.php');



$item = addslashes(trim($_POST['item']));
$details = addslashes(trim($_POST['details']));
$category = addslashes(trim($_POST['category']));

//Making a check to validate category whether it exists.
$sql_check = "SELECT count(*) FROM oxy2_item WHERE itemName = '$item'";

$res2_check = mysql_query($sql_check);
$row_check = mysql_fetch_row($res2_check);
$value=$row_check[0];

if($value > 0)
{ ?>
<script type="text/javascript">
alert("Item Name already exists");
window.location = "./?id=6&subId=2";
</script>
<?php 
}

else
{	

$sql="INSERT INTO oxy2_item (`itemName`,`itemDetails`,`categoryId`,`status`,`dateAdded`)

VALUES

('$item','$details','$category','0',date_add(now(), interval 630 minute))";

$result = mysql_query($sql);

header("Location: ./?id=6&subId=2");
}

?>






