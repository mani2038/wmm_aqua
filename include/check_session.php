<?php
/*if(!isset($_SESSION['user']) && $_SESSION['user']['user_id'] =='')
{
	header("Location: login.php");
	die;
}
*/

if(!$_COOKIE["user_id"]){
	echo "<script type='text/javascript'>window.location = 'login.php'</script>";
	}
?>
