<style type="text/css">
.error{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-align: center;
	font-size:12px;
	color:#FF0000;
}
</style>
<?php
// Get error message
function getError($n)
{
	global $config;
	switch($n)
	{
	
	case 1:
		return '<div class="msgbar msg_Info hide_onC">
		<span style="font-size:16px; font-weight:bold;">Request for Action Chart Deletion taken.</span>
    
        </div>';
		
	case 2:
		return '<div class="msgbar msg_Info hide_onC">
		<span style="font-size:16px; font-weight:bold;">Action Chart Deleted.</span>
    
        </div>';
		
	case 3:
		return '<div class="msgbar msg_Info hide_onC">
		<span style="font-size:16px; font-weight:bold;">Action Chart Restored.</span>
    
        </div>';	
		
	
	 
	default:
		return '<div class="error">UNKNOWN ERROR.</div>';
	}
}

// display error
//		array error codes
function showError($error)
{
	$error = array_unique($error);
	foreach($error as $v)
		return getError($v);
		##echo getError($v);
}
function showErrorMessage($error)
{
	echo getError($error);
}

function show_error($valid)
{
	$message="<div class='error' style='padding-bottom:4px;'><br><b>You need to fill the following fields</b><br></div>";
	foreach ($valid as $k => $v) {
		## if ($v[0][1] == false) {
			if ($v[1] === false) {
			// Checking for empty label field.
			## if (empty($v[0][2])) {
			if (empty($v[2])) {
				// then echo the form name of a field.
				$message .= $k.", ";
			}
			else {
				## $message .= "<span class='error'>".$v[0][2].", </span>";
				$message .=$v[2].", ";
			}
		}
	}

	return ("<span class='error'>".rtrim(trim($message), ",")."<br><br></span>"); ## Removing comma from the last.
}
?>