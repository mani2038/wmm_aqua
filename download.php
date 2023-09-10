<?php

include("include/include_sessions.php");
$id = intval($_REQUEST['id']);

include_once('commonFunction.php');
include_once('inc_connection.php');

$user = $_COOKIE["name"];
$userid = $_COOKIE["user_id"];

function getRealIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$ips = getRealIpAddr();


$SelExec = mysqli_query($con, 'SELECT * FROM oxy2_upload_op WHERE id = ' . $id);
$cntt = mysqli_num_rows($SelExec);

if ($cntt > 0) {
    $i = 0;
    $row = mysqli_fetch_array($SelExec, MYSQLI_ASSOC);

//    die();
    //header('Content-Disposition: attachment; filename=./usr_chart_op/' . basename($row[0]));
    //readfile($row[0]);
    $file = '/public_html/aqua/fivefy/usr_chart_op/' . $row['name'];
    

    //$file2 = 'usr_chart_op/'.$row['name'];
    $type = $row['extension'];
   // if (file_exists($file)) {

        $sql = "INSERT INTO `activity_logs` (`usr_id`, `Calling_Status`, `Status`, `Sources`,`ip`,`updated_by`,`updated_on`)VALUES('" . $userid . "','Contract','" . $row['name'] . "','" . $id . "','" . $ips . "','" . $user . "',now());";

//echo "$sql";

        $result2 = mysqli_query($con, $sql);

        if ($type == 'mp4') {
            header("location:.?id=5&subId=4&pid=$id");
            exit;
        } else {


            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }//end of type if
   // }
}



exit;
?>