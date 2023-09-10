<?php  
include 'inc_connection.php';
$ids = $_POST['twittId'];
$status = $_POST['stat'];
$upda = $_POST['upda'];
echo $status;

$sqll = "UPDATE oxy_pnl SET leadStatus='$status', leadApprovedBy='$upda',leadApprovedOn=now()
WHERE id='$ids'";
mysqli_query($con,$sqll); 
?>