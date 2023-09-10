<?php

include("inc_connection.php");

include("include/config.inc.php");

include_once("include/class.Database.php");

include_once("include/class.data.php");

$db=new ClassData();

include("include/include_files.php");


if(isset($_POST['login']) && $_POST['login'] !='')

{

	

	$user_name		=	mysqli_real_escape_string($con,$_POST['user_name']);

	$user_password	=	md5(mysqli_real_escape_string($con,$_POST['user_password']));
	
	$query			=	"SELECT * from ".$config['tbl_prefix']."users where username='$user_name' and password='$user_password' and status='1'";
        
		
	$rs				=	mysqli_query($con,$query);


	if(mysqli_num_rows($rs)>=1)

	{
		while($objUser = mysqli_fetch_array($rs))

		{

			$fullName = $objUser['fname']." ".$objUser['lname'];
			setcookie("username", $objUser['username'], time()+3600*24);
			
			setcookie("user_id", $objUser['user_id'], time()+3600*24);
			
			setcookie("emp_id", $objUser['emp_id'], time()+3600*24);
			
			setcookie("user_type", $objUser['user_type'], time()+3600*24);
			
			setcookie("name", $fullName, time()+3600*24);
			
			setcookie("dept", $objUser['dept'], time()+3600*24);
			
			setcookie("branch", $objUser['branch'], time()+3600*24);
			
			setcookie("email", $objUser['emailid'], time()+3600*24);
			header("Location: ./?id=1");

		}

	}

	else

	{

		$err = 22;

		header("Location: login.php?error=$err");

		die();

	}

	

	if(isset($_COOKIE['user_type']))

	{

		$type = $_COOKIE["user_type"];
		

		switch($type)

	  	{

			case "1":

				header("Location: ./?id=1");

				exit();

				break;

			default:

				header("Location: ./?id=1");

				exit();

				break;
			
			

		}

	}

}



?>