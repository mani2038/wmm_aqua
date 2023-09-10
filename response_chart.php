<?php

#
# Example PHP server-side script for generating
# responses suitable for use with jquery-tokeninput
#

# Connect to the database
include('inc_connection.php');

include("commonFunction.php");

$col=$_REQUEST['cid'];
?>
<?php echo get2Status("$col"); ?>