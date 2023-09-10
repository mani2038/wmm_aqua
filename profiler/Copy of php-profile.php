<?

#
# Example PHP server-side script for generating
# responses suitable for use with jquery-tokeninput
#

# Connect to the database
mysql_pconnect("localhost", "serc0n_oxusr", "ms,dgI}6FShI") or die("Could not connect");
mysql_select_db("serc0n_oxyg") or die("Could not select database");

# Perform the query
$query = sprintf("SELECT user_id as id,fname as first_name,lname as last_name,emailid as email, upload_logo as url  from oxy2_users WHERE fname LIKE '%%%s%%' ORDER BY fname DESC LIMIT 10", mysql_real_escape_string($_GET["q"]));
$arr = array();
$rs = mysql_query($query);

# Collect the results
while($obj = mysql_fetch_object($rs)) {
    $arr[] = $obj;
}

# JSON-encode the response
$json_response = json_encode($arr);

# Optionally: Wrap the response in a callback function for JSONP cross-domain support
if($_GET["callback"]) {
    $json_response = $_GET["callback"] . "(" . $json_response . ")";
}

# Return the response
echo $json_response;

?>
