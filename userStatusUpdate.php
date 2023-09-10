<?php  
include 'inc_connection.php';
$ids = $_POST['twittId'];
$status = $_POST['stat'];

$sqll = "UPDATE oxy2_users SET status='$status'
WHERE user_id='$ids'";
mysqli_query($con,$sqll); 

?>