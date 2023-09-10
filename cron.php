<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="font-family:Verdana, Geneva, sans-serif; font-size:10px">
<?php
include_once('commonFunction.php');
include_once('inc_connection.php');
include('NewClass.php');
$newclass = new Newclass();
					
$SelQuery = "SELECT * FROM oxy2_action";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				$i++;
				$actionId= $SelResult['id'];
				
				$actionData = getActionChartDetails($actionId);
				
				$id = $actionData['0'];
				$userId = $actionData['1'];
				$department = $actionData['2'];
				$leadNum = $actionData['3'];
				$leadIdentification = $actionData['4'];
				$completeLeadNumber = $actionData['5'];
				$campaignName = $actionData['6'];
				$clientName = $actionData['7'];
				$stage = $actionData['8'];
				$keyAccount = $actionData['9'];
				$keyact = $actionData['10'];
				$venue = $actionData['11'];
				$city = $actionData['12'];
				$type = $actionData['13'];
				$eventDate = $actionData['14'];
				$fromDate = $actionData['15'];
				$endDate = $actionData['16'];
				$projectLeader = $actionData['17'];
				$bdName = $actionData['18'];
				
				
				$status = $actionData['19'];
				$email = $actionData['20'];
				$campaignBrief = $actionData['21'];
				$progress = $actionData['22'];
				$criticalIssue = $actionData['23'];
				$taskDay = $actionData['24'];
				$updatedBy = $actionData['25'];
				$updatedOn = $actionData['26'];
				$dateAdded = $actionData['27'];
			
				$getUserListDetails = getUserListDetails($userId);
				$userLoggedEmail = $getUserListDetails['1'];
				
				$bdName = "No";
				if(is_numeric($bdName)){ 
				$getUserListDetailsforBD = getUserListDetails($bdName);
				$bdName = $getUserListDetailsforBD['4']." ".$getUserListDetailsforBD['5'];

				}
				
				
				$userLoggedEmailForPro = "";
				$projectLeaderName = "No";
				if(is_numeric($projectLeader)){ 
				$getUserListDetailsforProject = getUserListDetails($projectLeader);
				$userLoggedEmailForPro = $getUserListDetailsforProject['1'];
				$projectLeaderName = $getUserListDetailsforProject['4']." ".$getUserListDetailsforProject['5'];

				$mailMembers = $userLoggedEmail.",".$userLoggedEmailForPro;
				}
				else
				{
					$mailMembers = $userLoggedEmail;
				}
				
								
				
					//Calculating the Date Diffrenece				
					$date1 = $updatedOn;
					$date2 = date('y-m-d');
				
					$diff = abs(strtotime($date2) - strtotime($date1));
					
					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
					
					
				
					if($stage == "Lead")
					{
						
						if($status == "green" && $days <= 2)
						{
							
							$SelQuery_yell = "UPDATE oxy2_action SET status = 'green' WHERE id = ".$id;

							
							$SelExec_yell = mysqli_query($con,$SelQuery_yell);
							$newStatus = "green";
						}
						
						else if($status == "green" && $days > 2 && $days < 6)
						{
							
							$SelQuery_yell = "UPDATE oxy2_action SET status = 'yellow' WHERE id = ".$id;

							
						$SelExec_yell = mysqli_query($con,$SelQuery_yell);
							$newStatus = "yellow";
						}
						else if($status == "yellow" && $days > 6)
						{
							
							$SelQuery_red = "UPDATE oxy2_action SET status = 'red' WHERE id = ".$id;
							
							$SelExec_red = mysqli_query($con,$SelQuery_red);
							$newStatus = "red";
							
							
							
						}
						else
						{
							
							$SelQuery_yell = "UPDATE oxy2_action SET status = 'red' WHERE id = ".$id;
							$SelQuery_yell = mysqli_query($con,$SelQuery_yell);
							$newStatus = "red";
						}
					}
					else if($stage == "Invoice")
					{
						
						if($status == "green" && $days <= 2)
						{
							
							$SelQuery_yell = "UPDATE oxy2_action SET status = 'green' WHERE id = ".$id;
							
							$SelExec_yell = mysqli_query($con,$SelQuery_yell);
							$newStatus = "green";
						}
						
						else if($status == "green" && $days > 2 && $days < 5)
						{
							
							$SelQuery_yell = "UPDATE oxy2_action SET status = 'Yellow' WHERE id = ".$id;
							
							$SelExec_yell = mysqli_query($con,$SelQuery_yell);
							
							$newStatus = "yellow";
						}
						else if($status == "yellow" && $days > 5)
						{
							
							$SelQuery_red = "UPDATE oxy2_action SET status = 'red' WHERE id = ".$id;
							
							$SelExec_red = mysqli_query($con,$SelQuery_red);
							
							$newStatus = "red";
							
						}
						else
						{
							
							$SelQuery_red = "UPDATE oxy2_action SET status = 'red' WHERE id = ".$id;
							$SelExec_red = mysqli_query($con,$SelQuery_red);
							$newStatus = "red";
						}
					}
					else if($stage == "Execution")
					{
						
						
						if($status == "green" && $days <= 2)
						{
							
							$SelQuery_yell = "UPDATE oxy2_action SET status = 'green' WHERE id = ".$id;
							
							$SelExec_yell = mysqli_query($con,$SelQuery_yell);
							$newStatus = "green";
						}
						
						if($status == "green" && $days > 2 && $days < 4)
						{
							
							$SelQuery_yell = "UPDATE oxy2_action SET status = 'yellow' WHERE id = ".$id;
							
							$SelExec_yell = mysqli_query($con,$SelQuery_yell);
							
							$newStatus = "yellow";
						}
						else if($status == "yellow" && $days > 4)
						{
							
							$SelQuery_red = "UPDATE oxy2_action SET status = 'red' WHERE id = ".$id;
							
							$SelExec_red = mysqli_query($con,$SelQuery_red);
							
							$newStatus = "red";
							
							
						}
						else
						{
							
							$SelQuery_red = "UPDATE oxy2_action SET status = 'red' WHERE id = ".$id;
							$SelExec_red = mysqli_query($con,$SelQuery_red);
							$newStatus = "red";

						}
					}
					else
					{
						
					}
		
		
		if($newStatus == "yellow"){
		echo "<b>Id-></b>".$id." :: <b>Lead-></b>".$department."/".$leadNum." :: <b>Stage-></b>".$stage." :: <b>Status-></b>".$status." :: <b>diff-></b>".$days." :: <b>New Status-></b>".$newStatus." :: <b>Email to-></b>".$mailMembers." :: <b>PL-></b>".$projectLeaderName." :: <b>BD-></b>".$bdName." :: <b>Mail Status-></b>Unsend";
		echo "<br/><br/>";
		$to = "bhalani.akashb@gmail.com";

		

		
		$subject = 'Action Chart Alert - Untouched('.$days.') / '.$department.' / '.$leadNum; 
		$random_hash = md5(date('r', time())); 
		
		$headers = "From:WaterMarketing Aqua <contact@watermarkmktg.com>\r\nReply-To:contact@watermarkmktg.com\r\nCc: $ccEmail";
		$headers .= "\r\nContent-type: text/html\r\n";
		
		$message.= "<html>";
		$message.= "<head>";
		$message.= "<title>WaterMarketing Aqua Action Chart : Thank you</title>";
		$message.= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>";
		$message.= "</head>";
		$message.= "<body>";
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='border:1px solid lightgray;width:100%;'>";
		$message.= "";
		
		$message.= "<tr style='background:#515B5E;'>";
		$message.= "<td colspan='2'><img src='http://watermarkmktg.com/aqua/images/logo.png' alt='Aqua Logo' style='width:154px;height:39px;padding:10px;color:white;border:none;'/></td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='padding:10px;width:100%;'>";
		$message.= "<tr>";
		$message.= "<td style='margin:10px;'><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><b>Dear $userName,</b></td>";
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td colspan='2'><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>Following are the details for your Action Chart.<br/></td>";
		
		
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Lead Number : 
		
		</td>";
		$message.= "<td>$completeLeadNumber</td>";
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
		$message.= "<td>$projectLeaderName</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>BD Name : 
		
		</td>";
		$message.= "<td>$bdName</td>";
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
		
		//$mail_sent = @mail( $to, $subject, $message, $headers );
		$newclass->SentMail($to,$subject,$message,$headers);
		$message = "";
		}
		
		else if($newStatus == "red")
		{

			echo "<b>Id-></b>".$id." :: <b>Lead-></b>".$department."/".$leadNum." :: <b>Stage-></b>".$stage." :: <b>Status-></b>".$status." :: <b>diff-></b>".$days." :: <b>New Status-></b>".$newStatus." :: <b>Email to-></b>".$mailMembers." :: <b>PL-></b>".$projectLeaderName." :: <b>BD-></b>".$bdName." :: <b>Mail Status-></b>Send";
		echo "<br/><br/>";
			
			//Sending Mail
		
		//$to = $mailMembers;
		$to = "bhalani.akashb@gmail.com";

		

		
		$subject = 'Action Chart Alert - Untouched('.$days.') / '.$department.' / '.$leadNum; 
		$random_hash = md5(date('r', time())); 
		
		$headers = "From:WaterMarketing Aqua <contact@watermarkmktg.com>\r\nReply-To:contact@watermarkmktg.com\r\nCc: $ccEmail";
		$headers .= "\r\nContent-type: text/html\r\n";
		
		$message.= "<html>";
		$message.= "<head>";
		$message.= "<title>WaterMarketing Aqua Action Chart : Thank you</title>";
		$message.= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>";
		$message.= "</head>";
		$message.= "<body>";
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='border:1px solid lightgray;width:100%;'>";
		$message.= "";
		
		$message.= "<tr style='background:#515B5E;'>";
		$message.= "<td colspan='2'><img src='http://watermarkmktg.com/aqua/images/logo.png' alt='Aqua Logo' style='width:154px;height:39px;padding:10px;color:white;border:none;'/></td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='padding:10px;width:100%;'>";
		$message.= "<tr>";
		$message.= "<td style='margin:10px;'><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><b>Dear $userName,</b></td>";
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td colspan='2'><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>Following are the details for your Action Chart.<br/></td>";
		
		
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Lead Number : 
		
		</td>";
		$message.= "<td>$completeLeadNumber</td>";
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
		$message.= "<td>$projectLeaderName</td>";
		$message.= "</tr>";
				
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>BD Name : 
		
		</td>";
		$message.= "<td>$bdName</td>";
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
		//$mail_sent = @mail( $to, $subject, $message, $headers );
		$newclass->SentMail($to,$subject,$message);
		$message = "";
		
		//Mail Ended
			
			

			
		}
		
		else{

		echo "<b>Id-></b>".$id." :: <b>Lead-></b>".$department."/".$leadNum." :: <b>Stage-></b>".$stage." :: <b>Status-></b>".$status." :: <b>diff-></b>".$days." :: <b>New Status-></b>".$newStatus." :: <b>Email to-></b>".$mailMembers." :: <b>PL-></b>".$projectLeaderName." :: <b>BD-></b>".$bdName." :: <b>Mail Status-></b>Not Found";
		echo "<br/><br/>";

		}
				
				
				}//End of While 
}
?>
</body>
</html>
