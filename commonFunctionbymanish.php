<?php 
//Function to find the BD Name from oxy_user 
function getBDdetails($id) {
//global $tablename, $db;
$sql = "SELECT * FROM oxy2_users WHERE user_type = '3' AND user_id = '$id'";
$res2 = mysql_query($sql);
if (!$res2) {
   return " ";
   exit;
}
while($res = mysql_fetch_array($res2))
{
	$fname = $res['fname'];
	$lname = $res['lname'];
	$name=$fname." ".$lname;
	
	$getBDdetails['0'] = $name;
}

return $getBDdetails;
}

//Function to find the Project Leader from oxy_user 
function getProjectDetails($id) {
//global $tablename, $db;
$sql = "SELECT * FROM oxy2_users WHERE user_type = '2' AND user_id = '$id'";
$res2 = mysql_query($sql);
if (!$res2) {
   return " ";
   exit;
}
while($res = mysql_fetch_array($res2))
{
	$fname = $res['fname'];
	$lname = $res['lname'];
	$name=$fname." ".$lname;
	
	$getProjectDetails['0'] = $name;
	
}

return $getProjectDetails;
}

//Function to find the Project Leader from oxy_user 
function getClientDetails($id) {
//global $tablename, $db;
$sql = "SELECT * FROM oxy2_clientn WHERE id = '$id'";
$res2 = mysql_query($sql);
if (!$res2) {
   return " ";
   exit;
}
while($res = mysql_fetch_array($res2))
{
	$companyname['0'] = $res['companyname'];

	
}

return $companyname;
}

//Function to find the Project Leader from oxy_user 
function getClientListDetails($id) {
//global $tablename, $db;
$sql = "SELECT * FROM oxy2_clientn WHERE id = '$id'";
$res2 = mysql_query($sql);
if (!$res2) {
   return " ";
   exit;
}
while($res = mysql_fetch_array($res2))
{
	$companyname['0'] = $res['companyname'];

	
}

return $companyname;
}


function getStatus($status,$dept) {
//global $tablename, $db;

$sql = "SELECT count(*) FROM oxy2_action WHERE department = '$dept' AND status = '$status'";
//echo "$sql";
$res2 = mysql_query($sql);
if (!$res2) {
   return mysql_error();
   exit;
}
$row = mysql_fetch_array($res2);
$fname=$row[0];
return $fname;
}

//--------------------get total charts for status-----------------------------------
function get2Status($status) {
//global $tablename, $db;

$sql = "SELECT count(*) FROM oxy2_action WHERE status = '$status'";
//echo "$sql";
$res2 = mysql_query($sql);
if (!$res2) {
   return mysql_error();
   exit;
}
$row = mysql_fetch_array($res2);
$fname=$row[0];
return $fname;
}
//----------------------------------------------------------------------------



function getempetails($id) {
//global $tablename, $db;
$sql = "SELECT * FROM oxy2_users WHERE user_id = '$id'";
$res2 = mysql_query($sql);
if (!$res2) {
   return " ";
   exit;
}
$res = mysql_fetch_array($res2);
	$fname = $res['fname'];
	$lname = $res['lname'];
	$name=$fname." ".$lname;
	
	//$getempdetails['0'] = $name;


return $name;
}


//------------------------branch--------------------
function getbranch($id) {
//global $tablename, $db;
$sql = "SELECT * FROM oxy2_users WHERE user_id = '$id' and status='1'";
$res2 = mysql_query($sql);
if (!$res2) {
   return " ";
   exit;
}
$res = mysql_fetch_array($res2);
	$branch = $res['branch'];

return $branch;
}
//------------------------------------------------------------

//------------------------branch count--------------------
function getbranchcount($id) {
//global $tablename, $db;
$sql = "SELECT count(*) as cnt FROM oxy2_users WHERE branch = '$id'  and status='1'";
$res2 = mysql_query($sql);
if (!$res2) {
   return " ";
   exit;
}
$res = mysql_fetch_array($res2);
$branch = $res['cnt'];

return $branch;
}
//------------------------------------------------------------


//------------------------branchall count--------------------
function getbranchcountall() {
//global $tablename, $db;
$sql = "SELECT count(*) as cnt FROM oxy2_users WHERE status='1'";
$res2 = mysql_query($sql);
if (!$res2) {
   return " ";
   exit;
}
$res = mysql_fetch_array($res2);
$branch = $res['cnt'];

return $branch;
}
//------------------------------------------------------------

//Function to find the Project Leader from oxy_user 
function getUserDetailsBasedOnUserId($id) {
//global $tablename, $db;
$sql = "SELECT * FROM oxy2_users WHERE user_id in($id)";
$res2 = mysql_query($sql);

if (!$res2) {
   return " ";
   exit;
}
$getUserDetails['0'] = "";
while($res = mysql_fetch_array($res2))
{
	$emailid = $res['emailid'];
	$getUserDetails['0'] = $emailid.",".$getUserDetails['0'];
	
}

return $getUserDetails;
}

//Function to return the user type name 
function getUserTypeName($user_type) {
//global $tablename, $db;

if($user_type == "1"){$userTypeName = "Admin";}
else if($user_type == "2"){$userTypeName = "Project Leader";}
else if($user_type == "3"){$userTypeName = "BD Head";}
else if($user_type == "4"){$userTypeName = "BD Person";}
else if($user_type == "5"){$userTypeName = "Regular";}
else {$userTypeName = "Something wrong";}

return $userTypeName;
}


function getClientCount() {
//global $tablename, $db;

$sql = "SELECT count(*) FROM oxy2_clientn";
//echo "$sql";
$res2 = mysql_query($sql);
if (!$res2) {
   return mysql_error();
   exit;
}
$row = mysql_fetch_array($res2);
$count=$row[0];
return $count;
}

//------------------------profile pic--------------------
function getprofilepic($id) {
//global $tablename, $db;
$sql = "SELECT * FROM oxy2_uploadedimage WHERE usr_Id = '$id' AND area = '1'";
$res2 = mysql_query($sql);
if (!$res2) {
   return " ";
   exit;
}
$res = mysql_fetch_array($res2);
	$pic = $res['name'];

return $pic;
}
//------------------------------------------------------------

//------------------------profile pic--------------------
function getUserDetail($email) {
//global $tablename, $db;
$sql = "SELECT * FROM oxy2_users WHERE username = '$email' AND status = '1'";
$res2 = mysql_query($sql);
if (!$res2) {
   return " ";
   exit;
}
$res = mysql_fetch_array($res2);
	$user_id = $res['user_id'];

return $user_id;
}
//------------------------------------------------------------

//--------------------get total lead for status-----------------------------------
function gettotlead() {
//global $tablename, $db;

$sql = "SELECT count(*) FROM oxy2_lead WHERE bdstatus != 'Proposal'";
//echo "$sql";
$res2 = mysql_query($sql);
if (!$res2) {
   return mysql_error();
   exit;
}
$row = mysql_fetch_array($res2);
$fname=$row[0];
return $fname;
}
//----------------------------------------------------------------------------

?>