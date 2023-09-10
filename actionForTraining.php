<?php
$trainingTitle = addslashes(trim($_POST['trainingTitle']));
include("inc_connection.php");
include("commonFunction.php");
function convertDateinProperFormat($nDate)
{
$der = explode("/",$nDate);
$dd = $der['0'];
$mm = $der['1'];
$yy = $der['2'];
$newDate = $yy."-".$dd."-".$mm;
return $newDate;
}
if(isset($_POST['trainingTitle'])) {

$userId = $_COOKIE["user_id"];
$userName = $_COOKIE["name"];
$userLoggedEmail = $_COOKIE["username"];

$trainingTitle = addslashes(trim($_POST['trainingTitle']));

$datefrom = addslashes(trim($_POST['datepicker1']));
$convertedDateFrom = convertDateinProperFormat($datefrom);

$timepicker = addslashes(trim($_POST['timepicker']));
$trainingUsers1 = "";
foreach($_POST['trainingUsers'] as $check) {
 $trainingUsers1 = $trainingUsers1.$check.","; 
 
 }
  $trainingUsers = rtrim($trainingUsers1, ",");
//$getUserDetailsBasedOnUserId = getUserDetailsBasedOnUserId($trainingUsers);

$creditPoints = addslashes(trim($_POST['creditPoints']));

$sql="INSERT INTO oxy2_training
(`trainingTitle`,`datepicker1`,`timepicker`,`trainingUsers`,`creditPoints`,`dateAdded`)
VALUES('$trainingTitle','$convertedDateFrom','$timepicker','$trainingUsers','$creditPoints',date_add(now(), interval 630 minute))";
$result = mysql_query($sql);

//Sending Mail
		
		$to = $userLoggedEmail;
		$ccEmail = $getUserDetailsBasedOnUserId;
		
		$subject = 'Oxygen Action Chart : Thank You'; 
		$random_hash = md5(date('r', time())); 
		
		$headers = "From:Oxygen Action Chart: Thank you<info@oxygen.com>\r\nReply-To:info@oxygen.com\r\nCc: $ccEmail";
		$headers .= "\r\nContent-type: text/html\r\n";
		
		$message.= "<html>";
		$message.= "<head>";
		$message.= "<title>Oxygen Action Chart : Thank you</title>";
		$message.= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>";
		$message.= "</head>";
		$message.= "<body>";
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='border:1px solid lightgray;width:100%;'>";
		$message.= "";
		
		$message.= "<tr style='background:#515B5E;'>";
		$message.= "<td colspan='2'><img src='http://www.pulsesuite.com/oxygen/images/logo.png' alt='Oxygen Logo' style='width:154px;height:39px;padding:10px;color:white;border:none;'/></td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='padding:10px;width:100%;'>";
		$message.= "<tr>";
		$message.= "<td style='margin:10px;'><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><b>Dear $userName,</b></td>";
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>Following are the details for your Action Chart.<br/><br/></td>";
		
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Lead Number : 
		
		</td>";
		$message.= "<td>$completeLeadNumber</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Campaign Name : 
		
		</td>";
		$message.= "<td>$eventname</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Client Name : 
		
		</td>";
		$message.= "<td>$clientname</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Stage: 
		
		</td>";
		$message.= "<td>$stage</td>";
		$message.= "</tr>";
			
		$message.= "<br />";
				
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td> KeyAccount: 
		
		</td>";
		$message.= "<td>$keyact</td>";
		$message.= "</tr>";

		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Venue : 
		
		</td>";
		$message.= "<td>$venue</td>";
		$message.= "</tr>";
			
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>City : 
		
		</td>";
		$message.= "<td>$city</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Event Type : 
		
		</td>";
		$message.= "<td>$eventtype</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Event Date : 
		
		</td>";
		$message.= "<td>$convertedDateEvent</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Project Leader : 
		
		</td>";
		$message.= "<td>$name</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>BD Name : 
		
		</td>";
		$message.= "<td>$bdname</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Campaign Brief : 
		
		</td>";
		$message.= "<td>$eventbr</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Progress So Far : 
		
		</td>";
		$message.= "<td>$progress</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Critical Issues : 
		
		</td>";
		$message.= "<td>$issues</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Task for the day : 
		
		</td>";
		$message.= "<td>$task</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		
		
		$message.= "</table>";
		$message.= "</body>";
		$message.= "</html>";
		//$mail_sent = @mail( $to, $subject, $message, $headers );
		
		//Mail Ended

	header("location:.?id=13&subId=3&res=4");


}


?>