<?php
$loggedname = $_COOKIE["name"];
function convertDateinProperFormat($nDate)
{
$der = explode("/",$nDate);
$mm = $der['0'];
$dd = $der['1'];
$yy = $der['2'];
$newDate = $yy."-".$mm."-".$dd;
return $newDate;
}


$count = addslashes(trim($_POST['count']));
include_once('inc_connection.php');

for ($i=1;$i<=$count;$i++)
	{
		$dateeventStart = addslashes(trim($_POST['startdate'.$i]));
		$convertedDateEventStart = convertDateinProperFormat($dateeventStart);
		
		$dateeventEnd = addslashes(trim($_POST['enddate'.$i]));
		$convertedDateEventEnd = convertDateinProperFormat($dateeventEnd);

		
		$sql="INSERT INTO oxy2_dateline (`eventid`,`leadNumber`,`task`,`pl_hours`, `tl_hours`, `sh_hours`, `anoh_hours`, `es_hours`, `startDate`, `EndDate`, `responsibilities`, `creator`,`dateAdded`)VALUES('".$_POST['eventid']."','".$_POST['leadNumber']."','".$_POST['task'.$i]."','".$_POST['pl'.$i]."','".$_POST['tl'.$i]."','".$_POST['sh'.$i]."','".$_POST['anoh'.$i]."','".$_POST['es'.$i]."','$convertedDateEventStart','$convertedDateEventEnd','".$_POST['responsibilties'.$i]."','$loggedname',date_add(now(), interval 630 minute));";
		
	
		$result = mysqli_query($con,$sql);
		
if($result){$actionResultRedirection = "success=true";}
else
{$actionResultRedirection = "success=false";}
header("location:.?id=10&$actionResultRedirection");
			
	}



?>






