<?php
include_once('commonFunction.php');
include_once('inc_connection.php');



$title = addslashes(trim($_POST['title']));
$description = addslashes(trim($_POST['description']));

$checkbox1 = $_POST['digi'];
$digital_work = "";
foreach( $checkbox1 as $key => $value){
     $digital_work = $value.','.$digital_work;
}

$industry = addslashes(trim($_POST['industry']));

$type_work = "";

foreach ($_POST['type'] as $type)
{
        $type_work = $type.','.$type_work;
}


$creatorName = addslashes(trim($_POST['creatorName']));

$creatorId = addslashes(trim($_POST['creatorId']));

$sql="INSERT INTO oxy2_knowledgebase (`title`,`description`,`department`,`industrialRelevance`,`type`, `createdby`,`creatorId`,`flag`,`createdOn`)

VALUES

('$title','$description','$digital_work','$industry','$type_work', '$creatorName', '$creatorId','1',date_add(now(), interval 630 minute))";

$result = mysql_query($sql);

header("Location: ./?id=10&subId=1");

?>






