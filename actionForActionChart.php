<?php
include("inc_connection.php");
include("commonFunction.php");
include('NewClass.php');
$newclass = new NewClass(); 
function convertDateinProperFormat($nDate)
{
$der = explode("/",$nDate);
$dd = $der['0'];
$mm = $der['1'];
$yy = $der['2'];
$newDate = $yy."-".$dd."-".$mm;
return $newDate;
}
if(isset($_POST['dept']) && $_POST['dept']!='')
{
	
$userId = $_COOKIE["user_id"];
$userName = $_COOKIE["name"];
$userLoggedEmail = $_COOKIE["username"];

$leadDetaile = addslashes(trim($_POST['dept']));

$explodeDep = explode("/",$leadDetaile);

$department = $explodeDep['0'];
$leadnumber = $explodeDep['1'];

$leadIdentification = addslashes(trim($_POST['leadno']));

$completeLeadNumber = "WMM/".$department."/".$leadnumber;


$eventname = addslashes(trim($_POST['eventname']));

$clientname = addslashes(trim($_POST['clientname']));

$stage = addslashes(trim($_POST['stage']));

$key = addslashes(trim($_POST['key']));
$keyact = addslashes(trim($_POST['keyactt']));


$venue = addslashes(trim($_POST['venue']));

$city = addslashes(trim($_POST['city']));

$eventtype = addslashes(trim($_POST['eventtype']));

$dateevent = addslashes(trim($_POST['dateevent']));
$convertedDateEvent = convertDateinProperFormat($dateevent);


$datefrom = addslashes(trim($_POST['datefrom']));
$convertedDateFrom = convertDateinProperFormat($datefrom);


$dateto = addslashes(trim($_POST['dateto']));
$convertedDateTo = convertDateinProperFormat($dateto);

$name = addslashes(trim($_POST['name']));


$bdname = addslashes(trim($_POST['bdname']));

$status = addslashes(trim($_POST['status']));

$email = addslashes(trim($_POST['email']));
if (empty($email)){
$getUserDetailsBasedOnUserId = "";
}
else
{
	$getUserDetailsBasedOnUserId = getUserDetailsBasedOnUserId($email);
}


$eventbr = addslashes(trim($_POST['eventbr']));

$progress = addslashes(trim($_POST['progress']));

$issues = addslashes(trim($_POST['issues']));

$task = addslashes(trim($_POST['task']));

$sql="INSERT INTO oxy2_action 
(`userId`,`department`,`leadNum`,`leadIdentification`,`completeLeadNumber`,`campaignName`,`clientName`, `stage`, `keyAccount`,`keyact`, `venue`,`city`, `type`, `eventDate`, `fromDate`, `endDate`,`projectLeader`,`bdName`,`status`,`email`,`campaignBrief` ,`progress` ,`criticalIssue`,`taskDay`,`updatedBy`,`updatedOn`,`dateAdded`)
VALUES('$userId','$department','$leadnumber','$leadIdentification','$completeLeadNumber','$eventname','$clientname','$stage','$key','$keyact','$venue','$city','$eventtype','$convertedDateEvent','$convertedDateFrom','$convertedDateTo','$name','$bdname','$status','$email','$eventbr','$progress','$issues','$task','$userName',date_add(now(), interval 630 minute),date_add(now(), interval 630 minute))";
$result = mysqli_query($con,$sql);

$sqlForLog="INSERT INTO oxy2_actionlog 
(`userId`,`department`,`leadNum`,`leadIdentification`,`completeLeadNumber`,`campaignName`,`clientName`, `stage`, `keyAccount`,`keyact`, `venue`,`city`, `type`, `eventDate`, `fromDate`, `endDate`,`projectLeader`,`bdName`,`status`,`email`,`campaignBrief` ,`progress` ,`criticalIssue`,`taskDay`,`updatedBy`,`updatedOn`,`dateAdded`)
VALUES('$userId','$department','$leadnumber','$leadIdentification','$completeLeadNumber','$eventname','$clientname','$stage','$key','$keyact','$venue','$city','$eventtype','$convertedDateEvent','$convertedDateFrom','$convertedDateTo','$name','$bdname','$status','$email','$eventbr','$progress','$issues','$task','$userName',date_add(now(), interval 630 minute),date_add(now(), interval 630 minute))";
$resultForLog = mysqli_query($con,$sqlForLog);

//Sending Mail
		
		//Fetching Data 
		$get_bd_name = getempetails($bdname);
		$get_project_leader = getempetails($name);
		$get_key_account_0 = getCompleteClientListDetails($keyact);
		$get_key_account = $get_key_account_0[0];
		
		$to = $userLoggedEmail.",atul.gupta@watermarkexperience.com,imanish.yadav@gmail.com,rajesh.o@watermarkexperience.com";
		
		//$to = "bhalani.akashb@gmail.com ,akash.bhalani88@gmail.com";
		

		/*if($getUserDetailsBasedOnUserId != ""){$ccEmail = "sercon.oxygen@batessercon.com,".$getUserDetailsBasedOnUserId;}
		else{$ccEmail = "sercon.oxygen@batessercon.com";} */

		
		$subject = 'New Action Chart : WMM / '.$department.' / '.$leadnumber; 
		$random_hash = md5(date('r', time())); 
		
		$headers = "From:WaterMarketing Aqua <contact@watermarkmktg.com>\r\nReply-To:contact@watermarkmktg.com\r\n";
		$headers .= "\r\nContent-type: text/html\r\n";
		
		$message.= "<html>";
		$message.= "<head>";
		$message.= "<title>Aqua Lead Creation : Thank you</title>";
		$message.= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>";
		$message.= "</head>";
		$message.= "<body>";
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='border:1px solid lightgray;width:100%;'>";
		$message.= "";
		
		$message.= "<tr style='background:#00ABEB;'>";
		 $message.= "<td colspan='2'><img src='http://watermarkmktg.com/aqua/images/WM1.png' alt='Aqua Logo' style='padding:10px;color:white;border:none;'/></td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='padding:10px;width:100%;'>";
		$message.= "<tr>";
		$message.= "<td style='margin:10px;'><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><b>Dear $userName,</b></td>";
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>Following are the details for your Action Chart.<br/></td>";
		
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
		$message.= "<td>$get_key_account</td>";
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
		$message.= "<td>$get_project_leader</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>BD Name : 
		
		</td>";
		$message.= "<td>$get_bd_name</td>";
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
				$newclass->SentMail($to,$subject,$message);
		//Mail Ended

	header("location:.?id=3&subId=4");


}


?>