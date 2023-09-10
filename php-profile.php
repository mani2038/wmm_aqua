<?php

#
# Example PHP server-side script for generating
# responses suitable for use with jquery-tokeninput
#

# Connect to the database
mysql_pconnect("localhost", "wmmktg_aqua", "8lQ=kT!mJlfi") or die("Could not connect");
mysql_select_db("wmmktg_aqua") or die("Could not select database");

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
# Perform the query
$query = sprintf("SELECT user_id as id,fname as first_name,lname as last_name,emailid as email  from oxy2_users WHERE fname LIKE '%%%s%%' ORDER BY fname DESC LIMIT 10", mysql_real_escape_string($_GET["q"]));
$arr = array();
$rs = mysql_query($query);

# Collect the results
while($obj = mysql_fetch_array($rs)) {
$row_array['id']=$obj['id'];
$row_array['first_name']=$obj['first_name'];
$row_array['last_name']=$obj['last_name'];
$row_array['email']=$obj['email'];
$row_array['url']=getprofilepic($obj['id']);


//echo $obj['id'];
array_push($arr,$row_array);
    /*$arr[] = array ('id'    =>  $obj['id'],
    'first_name'    =>    "sdfsd",
    'last_name'      =>    "sdfds",
    'email'    =>    "sdf",
	'url'    =>    "fds"
);*/
}
//array_push($return_arr,$row_array);
//[{"id":"2","first_name":"Manish","last_name":"Yadav","email":"imanish.yadav@gmail.com","url":"2"}
# JSON-encode the response
$json_response = json_encode($arr);

# Optionally: Wrap the response in a callback function for JSONP cross-domain support
if($_GET["callback"]) {
    $json_response = $_GET["callback"] . "(" . $json_response . ")";
}

# Return the response
echo $json_response;

?>
