<?php
ob_start();
session_start();
##	Initializing global variables.
## super admin 			= 1
## HR admin 		= 2
## clients or User	= 3
## Low level User			= 4

$ss = session_id();
$config['tbl_prefix']="oxy2_";
$config['email']="Amit.kr@141sercon.com"; ## Super Admin Mail.
$config['item_per_page']="10"; ## Setting items to show per page.
$config['min_password_length']="6"; ## Setting minimum password length.
$config['min_username_length']="6"; ## Setting minimum user name length.
$config['max_password_length']="12"; ## Setting maximum password length.
$config['max_username_length']="12"; ## Setting maximum user name length.
$config['username_text']="[Min. ".$config['min_username_length'].", Max. ".$config['max_username_length']."]"; ## Setting text for user name.

$config['password_text']="[Min. ".$config['min_password_length'].", Max. ".$config['max_password_length']."]"; ## Setting text for password.


$config_month_ddl['1']	=	"January";
$config_month_ddl['2']	=	"February";
$config_month_ddl['3']	=	"March";
$config_month_ddl['4']	=	"April";
$config_month_ddl['5']	=	"May";
$config_month_ddl['6']	=	"June";
$config_month_ddl['7']	=	"July";
$config_month_ddl['8']	=	"August";
$config_month_ddl['9']	=	"September";
$config_month_ddl['10']	=	"October";
$config_month_ddl['11']	=	"November";
$config_month_ddl['12']	=	"December";


## 	Initializing database connection variables.
if($_SERVER['HTTP_HOST']=="server")
{
	$naConfig_host="localhost";
	$naConfig_db="wmmktg_aqua";
	$naConfig_user="wmmktg_aqua";
	$naConfig_password="8lQ=kT!mJlfi";
	$local=true;		
}
else
{
	$naConfig_host="localhost";
	$naConfig_db="wmmktg_aqua";
	$naConfig_user="wmmktg_aqua";
	$naConfig_password="8lQ=kT!mJlfi";
	$local=false;
	$base_url = "http://www.watermarkmktg.com/aqua/";

}


?>