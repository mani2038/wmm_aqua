<?php
ob_start();
include_once("inc_connection_1.php");
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
$file = 'export';
$filename = $file."_".date("Y-m-d_H-i",time());
header( "Content-disposition: filename=".$filename.".csv");

$table = 'oxy2_leaddeleted';


$result = mysql_query("SHOW COLUMNS FROM ".$table."");
$i = 0;

if (mysql_num_rows($result) > 0) {
while ($row = mysql_fetch_assoc($result)) {
$csv_output .= $row['Field'].",";
$i++;
}
}

$csv_output .= "\n";

$values = mysql_query("SELECT * FROM ".$table.$cond." ORDER BY leadno ASC");
while ($rowr = mysql_fetch_row($values)) {
for ($j=0;$j<$i;$j++) {
	 $data = $rowr[$j];
	 $data = preg_replace("/,/", ' - ', $data);
	 $data = trim(preg_replace( '/\s+/', ' ',$data));
	 $csv_output .= $data.",";
	
}
$csv_output .= "\n";
}



print $csv_output;


?>