<?php
include_once('commonFunction.php');
include_once('inc_connection.php');


$vendor = addslashes(trim($_POST['vendor']));
$contactPerson = addslashes(trim($_POST['contactPerson']));
$zone = addslashes(trim($_POST['zone']));
$city = addslashes(trim($_POST['city']));
$address = addslashes(trim($_POST['address']));
$status = addslashes(trim($_POST['status']));
$category = addslashes(trim($_POST['category']));
$phoneNumber = addslashes(trim($_POST['phoneNumber']));
$mobileNumber = addslashes(trim($_POST['mobileNumber']));
$fax = addslashes(trim($_POST['fax']));
$email = addslashes(trim($_POST['email']));
$pan = addslashes(trim($_POST['pan']));
$vat = addslashes(trim($_POST['vat']));
$vinfa = addslashes(trim($_POST['vinfa']));
$currency = addslashes(trim($_POST['currency']));
$credit = addslashes(trim($_POST['credit']));


//Making a check to validate category whether it exists.
$sql_check = "SELECT count(*) FROM oxy2_vendor WHERE vendor = '$vendor'";



$res2_check = mysql_query($sql_check);
$row_check = mysql_fetch_row($res2_check);
$value=$row_check[0];

if($value > 0)
{ ?>
<script type="text/javascript">
alert("Vendor already exists");
window.location = "./?id=6&subId=3";
</script>
<?php 
}

else
{	

$sql="INSERT INTO oxy2_vendor (`vendor`,`contactPerson`,`zone`,`city`,`address`,`status`,`category`,`phoneNumber`,`mobileNumber`,`fax`,`email`,`pan`,`vat`,`vinfa`,`currency`,`credit`,`dateAdded`)

VALUES

('$vendor','$contactPerson','$zone','$city','$address','$status','$category','$phoneNumber','$mobileNumber','$fax','$email','$pan','$vat','$vinfa','$currency','$credit',date_add(now(), interval 630 minute))";

$result = mysql_query($sql);

header("Location: ./?id=10&subId=2");
}

?>






