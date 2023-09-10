<?php 
include("inc_connection.php");
include_once('commonFunction.php');
ob_start();
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
$file = 'teamachievement';
$filename = $file."_".date("Y-m-d_H-i",time());
header( "Content-disposition: filename=".$filename.".csv");
$csv_output .="Employee Name,";
$csv_output .="Client,";
$csv_output .="Client Name,";
$csv_output .="Lead No,";
$csv_output .="Lead Name,";
$csv_output .="City,";
$csv_output .="Invoiced Amount,";
$csv_output .="Pre-event P&L Amount,";
$csv_output .="Pre-event P&L(%),";

$csv_output .="Final P&L Amount,";
$csv_output .="Final P&L(%),";
$csv_output .= "\n";
$SelQuery = "SELECT * FROM oxy2_lead $where ORDER BY leadno DESC";
//    print_r($SelQuery);
$SelExec = mysqli_query($con, $SelQuery);
$cntt = mysqli_num_rows($SelExec);
while ($SelResult = mysqli_fetch_array($SelExec)) {
   $clientNamee = getClientListDetails($SelResult['companyname']);
    $csv_output .= $SelResult['creator'].",";
    $csv_output .= $clientNamee['0'].",";
    $csv_output .= $SelResult['contact'].",";
    $csv_output .= $SelResult['leadno'].",";
    $csv_output .= $SelResult['leadname'].",";
    $csv_output .= $SelResult['ccity'].",";
    $csv_output .= $SelResult['grand_amount_total'].",";
    $csv_output .= $SelResult['project_pl_amount'].",";
    $csv_output .= $SelResult['pl_percentage'].",";
    $csv_output .= $SelResult['revnue'].",";
    $csv_output .= $SelResult['profit'].",";
    $csv_output .= "\n";
}
print $csv_output;
?>