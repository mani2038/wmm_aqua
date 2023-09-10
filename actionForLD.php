<?php

  if(isset($_POST['reasonType']) && $_POST['reasonType']!='')
{
include_once('commonFunction.php');
include_once('inc_connection.php');
		$type = addslashes(trim($_POST['reasonType']));
		$reason = addslashes(trim($_POST['reason']));
		$leadIda = addslashes(trim($_POST['leadId']));
		
  	  
	
	  $getLeadListDetails = getLeadListDetails($leadIda);
	  $leadno = $getLeadListDetails['0'];
	  $contact = $getLeadListDetails['1'];
	  $companyname = $getLeadListDetails['2'];
	  $dept = $getLeadListDetails['3'];
	  $add1 = $getLeadListDetails['4'];
	  $ccity = $getLeadListDetails['5'];
	  $country = $getLeadListDetails['6'];
	  $mob = $getLeadListDetails['7'];
	  $email = $getLeadListDetails['8'];
	  $desg = $getLeadListDetails['9'];
	  $othersact = $getLeadListDetails['10'];
	  $event_city = $getLeadListDetails['11'];
	  $event_country = $getLeadListDetails['12'];
	  $keydel = $getLeadListDetails['13'];
	  $specinst = $getLeadListDetails['14'];
	  $eventbrief = $getLeadListDetails['15'];
	  $bdstatus = $getLeadListDetails['16'];
	  $curr = $getLeadListDetails['17'];
	  $profit = $getLeadListDetails['18'];
	  $revnue = $getLeadListDetails['19'];
  	  $lgs = $getLeadListDetails['20'];
	  $beventStartDate = $getLeadListDetails['21'];
 	  $beventEndDate = $getLeadListDetails['22'];
	  $coutelet_type = $getLeadListDetails['23'];
	  $c_permission = $getLeadListDetails['24'];
	  $cnumber_outlets = $getLeadListDetails['25'];
	  $cnumberOfdays = $getLeadListDetails['26'];
	  $creator = $getLeadListDetails['27'];
	  $creatorid = $getLeadListDetails['28'];
	  $updatedby = $getLeadListDetails['29'];
	  $updationdate = $getLeadListDetails['30'];
	  $leadname = $getLeadListDetails['31'];
	  $reg_time = $getLeadListDetails['32'];
	  $invdate = $getLeadListDetails['33'];
	  $invno = $getLeadListDetails['34'];
	  $invamount = $getLeadListDetails['35'];
	  $paychnn = $getLeadListDetails['36'];
	  $paymentcoll = $getLeadListDetails['36'];
	  $paydaterece = $getLeadListDetails['37'];
	  $paybal = $getLeadListDetails['38'];
	  $exppaydate = $getLeadListDetails['39'];
	  $othclient = $getLeadListDetails['40'];
	  $invgp = $getLeadListDetails['41'];
	  $digital_work = $getLeadListDetails['42'];
	  $otherDigitalWork = $getLeadListDetails['43'];
	  $retail = $getLeadListDetails['44'];
	  $zone = $getLeadListDetails['45'];
	  $leadtype = $getLeadListDetails['46'];
	  $fdate = $getLeadListDetails['47'];
	  $tdate = $getLeadListDetails['48'];
	  $contractee1 = $getLeadListDetails['49'];
	  $contractee2 = $getLeadListDetails['50'];
	  $contractee3 = $getLeadListDetails['51'];
	  $contractee4 = $getLeadListDetails['52'];
	  $reasonType = $getLeadListDetails['53'];
	  $leadDeletionReason = $getLeadListDetails['54'];
	  $reason = $reason;//$getLeadListDetails['55'];
	  $leadStatus = $getLeadListDetails['56'];
	  $id = $getLeadListDetails['57'];
	  
	  
	  $getUserListDetails = getUserListDetails($creatorId);
	  $userEmail = $getUserListDetails['1'];

	  $getCompleteClientListDetails = getCompleteClientListDetails($companyname);
	  $adId = $getCompleteClientListDetails['1'];

	  $ClientWithName = $getCompleteClientListDetails['0'];

	  
	  $getUserListDetailsForAd = getUserListDetails($adId);
	  $userEmailForAd = $getUserListDetailsForAd['1'];
	  
	  $sql1="UPDATE oxy2_lead SET reasonType = '$type',leadDeletionReason = '$reason',leadStatus='4' WHERE id='$leadIda'";

	$result = mysqli_query($con,$sql1);
	  
	  //Sending Mail
				  
				  
				$to = "imanish.yadav@gmail.com";
				//$to = "Amit.Kr@batessercon.com";
				
				$ccEmail = $userEmail.",".$userEmailForAd;
				//$ccEmail = "manish.yadav@1010-asia.co.in";
				  
				  $subject = 'Request for Lead Deletion('.$type.') : AQUA / '.$dept.' / '.$leadno ; 
				  $random_hash = md5(date('r', time())); 
				  
				  $$headers = "From:WaterMarketing Aqua <contact@watermarkmktg.com>\r\nReply-To:contact@watermarkmktg.com\r\nCc: $ccEmail";
				  $headers .= "\r\nContent-type: text/html\r\n";
				  
				  $message.= "<html>";
				  $message.= "<head>";
				  $message.= "<title>AQUA Request for Lead Deletion : Thank you</title>";
				  $message.= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>";
				  $message.= "</head>";
				  $message.= "<body>";
				  $message.= "<table align='center' cellpadding='0' cellspacing='0' style='border:1px solid lightgray;width:100%;'>";
				  $message.= "";
				  
				  $message.= "<tr style='background:#515B5E;'>";
				  $message.= "<td colspan='2'><img src='http://watermarkmktg.com/aqua/images/logo.png' alt='Aqua Logo' style='width:154px;height:39px;padding:10px;color:white;border:none;'/></td>";
				  $message.= "</tr>";
				  $message.= "<br />";
				  
				  $message.= "<tr>";
				  $message.= "<td colspan='2'>";
				  $message.= "<table width='100%' border='0' cellspacing='1' cellpadding='1'><tr><td><h2>AQUA / $dept / $leadno</h2></td><td align='right'><img src='http://www.watermarkmktg.com/aqua/barcode.php?code=AQUA/$dept/$leadno' /></td></tr></table>";
				  
				  $message.= "</td>";
				  $message.= "</tr>";
				  
				  
				  $message.= "<tr>";
				  $message.= "<td colspan='2'>";
				  
				 
				  
				  $message.= "<table width='100%' border='0' cellspacing='5' cellpadding='5'>";
				  $message.="<tr><td colspan='2' valign='top'><h3>Client Information</h3><hr/></td></tr>";
				  
				  $message.="<tr> <td width='34%'>Reason Type</td> <td width='66%'>$type</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Reason</td> <td width='66%'>$reason</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Client Name</td> <td width='66%'>$ClientWithName</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Contact Name</td> <td width='66%'>$contact</td></tr>";
				 	
				  $message.="<tr> <td width='34%'>Designation</td> <td width='66%'>$desg</td></tr>";
				  
				  $message.="<tr> <td width='34%'>City</td> <td width='66%'>$ccity</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Country</td> <td width='66%'>$country</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Mobile Number</td> <td width='66%'>$mob</td></tr>";	
				  
				  $message.="<tr> <td width='34%'>Email</td> <td width='66%'>$email</td></tr>";	
				  
				  $message.="<tr> <td width='34%'>Address</td> <td width='66%'>$add1</td></tr>";	
				  
					 
				  $message.= "<table>";
				  
				  $message.= "</td>";
				  $message.= "</tr>";
				  
				   $message.= "<tr>";
				  $message.= "<td colspan='2'>";
				  
				 
				  
				  $message.= "<table width='100%' border='0' cellspacing='5' cellpadding='5'>";
				  $message.="<tr><td colspan='2' valign='top'><h3>Account Information</h3><hr/></td></tr>";
				  
				  $message.="<tr> <td width='34%'>Lead Name</td> <td width='66%'>$leadname</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Nature of Lead</td> <td width='66%'>$dept</td></tr>";
				 	
				  $message.="<tr> <td width='34%'>Type of Activity</td> <td width='66%'>$leadtype</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Other' specificationOther' specification</td> <td width='66%'>$othersact</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Event Brief</td> <td width='66%'>$eventbrief</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Event Country</td> <td width='66%'>$event_country</td></tr>";	
				  
				  $message.="<tr> <td width='34%'>Event City</td> <td width='66%'>$event_city</td></tr>";	
				  
				  $message.="<tr> <td width='34%'>Key Deliverable</td> <td width='66%'>$keydel</td></tr>";	
				  
				  $message.="<tr> <td width='34%'>Special Instruction</td> <td width='66%'>$specinst</td></tr>";	
				  
					 
				  $message.= "<table>";
				  
				  $message.= "</td>";
				  $message.= "</tr>";
				  
				  if($department1 == "B2B"){
				  
				  $message.= "<tr>";
				  $message.= "<td colspan='2'>";
				  
				  $message.= "<table width='100%' border='0' cellspacing='5' cellpadding='5'>";
				
				  $message.="<tr> <td width='34%'>LGS</td> <td width='66%'>$lgs</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Event Start Date</td> <td width='66%'>$beventStartDate</td></tr>";
				 	
				  $message.="<tr> <td width='34%'>Event End Date</td> <td width='66%'>$beventEndDate</td></tr>";	
				  
					 
				  $message.= "<table>";
				  
				  $message.= "</td>";
				  $message.= "</tr>";
				  
				  }
				  
				  else if($department1 == "B2C"){
				  
				  $message.= "<tr>";
				  $message.= "<td colspan='2'>";
				  
				  $message.= "<table width='100%' border='0' cellspacing='5' cellpadding='5'>";
				
				  $message.="<tr> <td width='34%'>Outlet Type</td> <td width='66%'>$coutelet_type</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Permission</td> <td width='66%'>$c_permission</td></tr>";
				 	
				  $message.="<tr> <td width='34%'>Number of Outlet</td> <td width='66%'>$cnumber_outlets</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Number of Days</td> <td width='66%'>$cnumberOfdays</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Event Start Date</td> <td width='66%'>$ceventStartDate</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Event End Date</td> <td width='66%'>$ceventEndDate</td></tr>";	
				  
					 
				  $message.= "<table>";
				  
				  $message.= "</td>";
				  $message.= "</tr>";
				  
				  }
				  
				  else if($department1 == "Digital"){
				  
				  $message.= "<tr>";
				  $message.= "<td colspan='2'>";
				  
				  $message.= "<table width='100%' border='0' cellspacing='5' cellpadding='5'>";
				
				  $message.="<tr> <td width='34%'>Service Required</td> <td width='66%'>$digital_work</td></tr>";
				  
				  $message.="<tr> <td width='34%'>other's</td> <td width='66%'>$otherDigitalWork</td></tr>";
				  
				  $message.= "<table>";
				  
				  $message.= "</td>";
				  $message.= "</tr>";
				  
				  }
				  
				   else { }
				  
				 
				  $message.= "</table>";
				  $message.= "</body>";
				  $message.= "</html>";
				  
				  
				  $mail_sent = @mail( $to, $subject, $message, $headers );
				  
				  //Mail Ended
	  
	 header("location:./?id=10");
}
  
  ?>