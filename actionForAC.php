<?php

  if(isset($_POST['reasonType']) && $_POST['reasonType']!='')
{
include_once('commonFunction.php');
include_once('inc_connection.php');
		$reasonType = addslashes(trim($_POST['reasonType']));
		$reason = addslashes(trim($_POST['reason']));
		$actionId = addslashes(trim($_POST['actionId']));
		
  	  
	
	  $getActionChartDetails = getActionChartDetails($actionId);
	  $id = $getActionChartDetails['0'];
	  $userId = $getActionChartDetails['1'];
	  $department = $getActionChartDetails['2'];
	  $leadNum = $getActionChartDetails['3'];
	  $leadIdentification = $getActionChartDetails['4'];
	  $completeLeadNumber = $getActionChartDetails['5'];
	  $campaignName = $getActionChartDetails['6'];
	  $clientName = $getActionChartDetails['7'];
	  $stage = $getActionChartDetails['8'];
	  
	  $keyAccount = $getActionChartDetails['9'];
	  $keyact = $getActionChartDetails['10'];
	  $getCompleteClientListDetails = getCompleteClientListDetails($keyact);
	  $getKeyClientName = $getCompleteClientListDetails['0'];
	  
	  $venue = $getActionChartDetails['11'];
	  $city = $getActionChartDetails['12'];
	  $type = $getActionChartDetails['13'];
	  $eventDate = $getActionChartDetails['14'];
	  $fromDate = $getActionChartDetails['15'];
	  $endDate = $getActionChartDetails['16'];
	  
	  $projectLeader = $getActionChartDetails['17'];
	  $getUserListDetails = getUserListDetails($projectLeader);
	  $getProjectLeaderf = $getUserListDetails['4'];
	  $getProjectLeaderl = $getUserListDetails['5'];
	  
	  $getProjectLeader = $getProjectLeaderf." ".$getProjectLeaderl;
	  
	  $bdName = $getActionChartDetails['18'];
	  $getUserListDetailsforBd = getUserListDetails($bdName);
	  $getProjectLeaderBdf = $getUserListDetailsforBd['4'];
	  $getProjectLeaderBdl = $getUserListDetailsforBd['5'];
	  
	  $getBd = $getProjectLeaderBdf." ".$getProjectLeaderBdl;
	  
	  $status = $getActionChartDetails['19'];
  	  $email = $getActionChartDetails['20'];
	  $campaignBrief = $getActionChartDetails['21'];
 	  $progress = $getActionChartDetails['22'];
	  $criticalIssue = $getActionChartDetails['23'];
	  $taskDay = $getActionChartDetails['24'];
	  $updatedBy = $getActionChartDetails['25'];
	  $updatedOn = $getActionChartDetails['26'];
	  $dateAdded = $getActionChartDetails['27'];
	  
	  
	  
	  $getUserListDetails = getUserListDetails($userId);
	  $userEmail = $getUserListDetails['1'];
      
	  
	  $sql1="UPDATE oxy2_action SET reasonType = '$reasonType',leadDeletionReason = '$reason',actionStatus='4' WHERE id='$actionId'";

	$result = mysql_query($sql1);
	  
	  //Sending Mail
				  
				  
				$to = "mukesh.das@batessercon.com,amit.kumar@batessercon.com";
				//$to = "Amit.Kr@batessercon.com";
				
				//$ccEmail = $userEmail.",".$userEmailForAd;
				$ccEmail = $userEmail;
				  
				  $subject = 'Request for Lead Deletion('.$type.') : SERCON / '.$dept.' / '.$leadno ; 
				  $random_hash = md5(date('r', time())); 
				  
				  $headers = "From:Sercon Oxygen<sercon.oxygen@batessercon.com>\r\nReply-To:sercon.oxygen@batessercon.com\r\nCc: $ccEmail";
				  $headers .= "\r\nContent-type: text/html\r\n";
				  
				  $message.= "<html>";
				  $message.= "<head>";
				  $message.= "<title>Oxygen Request for Action Chart Deletion : Thank you</title>";
				  $message.= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>";
				  $message.= "</head>";
				  $message.= "<body>";
				  $message.= "<table align='center' cellpadding='0' cellspacing='0' style='border:1px solid lightgray;width:100%;'>";
				  $message.= "";
				  
				  $message.= "<tr style='background:#515B5E;'>";
				  $message.= "<td colspan='2'><img src='http://www.pulsesuite.com/oxygen/images/logo.png' alt='Oxygen Logo' style='width:154px;height:39px;padding:10px;color:white;border:none;'/></td>";
				  $message.= "</tr>";
				  $message.= "<br />";
				  
				  $message.= "<tr>";
				  $message.= "<td colspan='2'>";
				  $message.= "<table width='100%' border='0' cellspacing='1' cellpadding='1'><tr><td><h2>SERCON / $department / $leadNum</h2></td><td align='right'><img src='http://www.pulsesuite.com/oxygen/barcode.php?code=SERCON/$department/$leadNum' /></td></tr></table>";
				  
				  $message.= "</td>";
				  $message.= "</tr>";
				  
				  
				 $message.= "<tr style='margin:10px;'>";
		$message.= "<td><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>Following are the details for your Action Chart to be deleted.<br/></td>";
		
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Reason Type : 
		
		</td>";
		$message.= "<td>$reasonType</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Reason : 
		
		</td>";
		$message.= "<td>$reason</td>";
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
		$message.= "<td>$campaignName</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Client Name : 
		
		</td>";
		$message.= "<td>$clientName</td>";
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
		$message.= "<td>$getKeyClientName</td>";
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
		$message.= "<td>$type</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Event Date : 
		
		</td>";
		$message.= "<td>$eventDate</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Project Leader : 
		
		</td>";
		$message.= "<td>$getProjectLeader</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>BD Name : 
		
		</td>";
		$message.= "<td>$getBd</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Campaign Brief : 
		
		</td>";
		$message.= "<td>$campaignBrief</td>";
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
		$message.= "<td>$criticalIssue</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Task for the day : 
		
		</td>";
		$message.= "<td>$taskDay</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
				  
				 
				  $message.= "</table>";
				  $message.= "</body>";
				  $message.= "</html>";
				  
				  
				  $mail_sent = @mail( $to, $subject, $message, $headers );
				  
				  //Mail Ended
	  
	 header("location:./?id=3&subId=1&res=1");
}
  
  ?>