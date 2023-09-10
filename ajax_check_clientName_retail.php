<?php
include('inc_connection.php');
//Include The Database Connection File 

if(isset($_POST['companyname']))//If a username has been submitted 
{
$companyname = mysqli_real_escape_string($con,$_POST['companyname']);//Some clean up :)

$check_for_username = mysqli_query($con,"SELECT companyname FROM oxy2_clientn_retail WHERE companyname='$companyname'");
//Query to check if username is available or not 

if(mysqli_num_rows($check_for_username))
{
echo '1';//If there is a  record match in the Database - Not Available
}
else
{
echo '0';//No Record Found - Username is available 
}

}

?>