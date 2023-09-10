<?php 
mysql_pconnect("localhost", "wmmktg_aqua", "8lQ=kT!mJlfi") or die("Could not connect");
mysql_select_db("wmmktg_aqua") or die("Could not select database");
include("commonFunction.php");
$data = $_POST['lead_id'];
$lead_data = explode('/',$data);
$lead_id = $lead_data[1];
if($lead_id !=''){
$sql_data = "SELECT ol.contact,oc.companyname as company FROM `oxy2_lead` as ol join oxy2_clientn as oc on oc.id=ol.companyname WHERE ol.leadno= $lead_id";
	//print_r($sql_data);

$res2 = mysql_query($sql_data);
if (!$res2) {
   return "test";
   exit;
}

$res = mysql_fetch_array($res2);
//companyData = getClientDetails($res['companyname']);
$final_data = array('client_name'=>$res['contact'],
					'compnay_name'=>$res['company']);
					echo json_encode($final_data);
}
?>