<?php
include('inc_connection.php');
include('commonFunction.php');

if(isset($_POST['companyname']) && $_POST['companyname']!='')
{
	
$userName = $_COOKIE["name"];


$companyname = addslashes(trim($_POST['companyname']));

$contact = addslashes(trim($_POST['contact']));

$desg = addslashes(trim($_POST['desg']));

$email = addslashes(trim($_POST['email']));

$add1 = addslashes(trim($_POST['add1']));

$email2 = addslashes(trim($_POST['email2']));

$add2 = addslashes(trim($_POST['add2']));


$ph1_ext = addslashes(trim($_POST['ph1_ext']));
$ph2_ext = addslashes(trim($_POST['ph2_ext']));
$phone1 = addslashes(trim($_POST['phone1']));

$ccity = addslashes(trim($_POST['ccity']));

$ph1_ext2 = addslashes(trim($_POST['ph1_ext2']));
$ph2_ext2 = addslashes(trim($_POST['ph2_ext2']));
$phone2 = addslashes(trim($_POST['phone2']));

$country = addslashes(trim($_POST['country']));

$ph1_ext3 = addslashes(trim($_POST['ph1_ext3']));
$ph2_ext3 = addslashes(trim($_POST['ph2_ext3']));
$phone3 = addslashes(trim($_POST['phone3']));

$pin = addslashes(trim($_POST['pin']));

$mob = addslashes(trim($_POST['mob']));

$url = addslashes(trim($_POST['url']));


//Checking wherher company name exists or Not in case of Ajax Checking Failure.
$sql_check = "SELECT count(*) FROM oxy2_clientn_retail WHERE companyname = '$companyname'";

$res2_check = mysqli_query($con,$sql_check);
$row_check = mysqli_fetch_row($res2_check);
$value=$row_check[0];

if($value > 0)
{ ?>
<script type="text/javascript">
alert("Client already exist , please try with different name.");
window.location = "./?id=2&subId=4";
</script>
<?php 
}

else
{

		
		$sql="INSERT INTO oxy2_clientn_retail 
		(`companyname`,`contact`,`lname`,`add1`,`add2`,`ccity`, `country`, `pin`,`ph1_ext`, `ph2_ext`,`phone1`, `ph1_ext2`, `ph2_ext2`, `phone2`, `ph1_ext3`, `ph2_ext3`, `phone3`,`mob`,`email`,`email2`,`desg`,`url`,`zone`,`ad`,`dateAdded`)
		
		VALUES
		
		('$companyname','$contact','','$add1','$add2','$ccity','$country','$pin','$ph1_ext','$ph2_ext','$phone1','$ph1_ext2','$ph2_ext2','$phone2','$ph1_ext3','$ph2_ext3','$phone3','$mob','$email','$email2','$desg','$url','','',date_add(now(), interval 630 minute))";
		
		$result = mysqli_query($con,$sql);
		
		
		header("location:.?id=2&subId=5");
		
}
		

}


?>