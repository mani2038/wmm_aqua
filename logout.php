<?php 
setcookie("username", "", time()-60*60*24*100);
setcookie("user_id", "", time()-60*60*24*100);
setcookie("emp_id", "", time()-60*60*24*100);
setcookie("user_type", "", time()-60*60*24*100);
setcookie("name", "", time()-60*60*24*100);
setcookie("dept", "", time()-60*60*24*100);
setcookie("branch", "", time()-60*60*24*100);
setcookie("email", "", time()-60*60*24*100);

header('Location:login.php');
?>