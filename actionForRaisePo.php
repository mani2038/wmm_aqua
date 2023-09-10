<?php
include_once('commonFunction.php');
include_once('inc_connection.php');

function convertDateinProperFormat($nDate)
{
$der = explode("/",$nDate);
$dd = $der['0'];
$mm = $der['1'];
$yy = $der['2'];
$newDate = $yy."-".$dd."-".$mm;
return $newDate;
}

$userName = $_COOKIE["name"];

$vendorId = addslashes(trim($_POST['vendorId']));
$leadNumber = addslashes(trim($_POST['leadNumber']));
$categoryId = addslashes(trim($_POST['categoryId']));
$vendor = addslashes(trim($_POST['vendor']));
$contactPerson = addslashes(trim($_POST['contactPerson']));
$city = addslashes(trim($_POST['city']));
$telephone = addslashes(trim($_POST['telephone']));
$fax = addslashes(trim($_POST['fax']));
$email = addslashes(trim($_POST['email']));
$quotationRef = addslashes(trim($_POST['quotationRef']));

$deliveryDatee = addslashes(trim($_POST['deliveryDate']));
$deliveryDate = convertDateinProperFormat($deliveryDatee);
$deliveryInstruction = addslashes(trim($_POST['deliveryInstruction']));
$remarks = addslashes(trim($_POST['remarks']));
$year = date("Y");
$month =  date("M");

//Increase numbr according month and year
$sql_check = "SELECT count(*) FROM oxy2_raise_povendor WHERE month = '$month' AND year = '$year'";
$res2_check = mysql_query($sql_check);
$row_check = mysql_fetch_row($res2_check);
$value=$row_check[0];

if($value > 0)
{ 
$counter = $value + 1;

}

else
{
	$counter = "1";
}
//Ended

$sql="INSERT INTO oxy2_raise_povendor  (`vendorId`,`leadNumber`,`category`,`vendor`,`contactPerson`,`city`,`telephone`,`fax`,`email`,`quotationRef`,`deliveryDate`,`deliveryInstruction`,`remarks`,`year`,`month`,`raisePoId`,`status1`,`orderBy`,`approvedBy`,`appDisStatus`,`dateAdded`)

VALUES

('$vendorId','$leadNumber','$categoryId','$vendor','$contactPerson','$city','$telephone','$fax','$email','$quotationRef','$deliveryDate','$deliveryInstruction','$remarks','$year','$month','$counter','0','$userName','','0',date_add(now(), interval 630 minute))";

$result = mysql_query($sql);
$lastInsertedId = mysql_insert_id();

header("Location: ./?id=6&subId=8&raisefor=".$lastInsertedId);


?>






