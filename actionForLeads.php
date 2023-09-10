<?php
include_once('inc_connection.php');
include_once('commonFunction.php');
include('NewClass.php');
$newclass = new NewClass(); 
$userName = $_COOKIE["name"];
$user_id = $_COOKIE["user_id"];
$emailLoggedIn = $_COOKIE["email"];

function convertDateinProperFormat($nDate)
{
$der = explode("/",$nDate);
$dd = $der['0'];
$mm = $der['1'];
$yy = $der['2'];
$newDate = $yy."-".$dd."-".$mm;
return $newDate;
}





if(isset($_POST['category']) && $_POST['category']!='' && isset($_POST['department']) && $_POST['department']!='')
{
	//Generating Auto Lead Number

$status_proposal = addslashes(trim($_POST['status']));
if($status_proposal == "Proposal"){
	$department1 = "Pitch";
}else{
	$department1 = addslashes(trim($_POST['department']));
}
$selQuery     = "select * from oxy2_lead_gen where dept='$department1' and year_gen='2014';";
$result    = mysqli_query($con,$selQuery);
$result_data = mysqli_fetch_array($result);
$leadno= $result_data['leadno']+1;//mysql_result($result,0,leadno)+1;

$sel2Query    = "select * from oxy2_lead where leadno='$leadno' and dept='$department1';";
$result2   = mysqli_query($con,$sel2Query);
$cnt       = mysqli_num_rows($result2);
if($cnt >= 1)
{

}

else
{
$upQuery = "update oxy2_lead_gen set leadno='$leadno',reg_on=date_add(now(), interval 630 minute) where year_gen='2014'";
$reUQuery= mysqli_query($con,$upQuery);
}

//Ended
	
	
	
	
	
	
$creator = $user_id;
$updatedby = $userName;

$companyName = addslashes(trim($_POST['category']));

$getclientDetaile = getClientListDetails($companyName);
$clientName = $getclientDetaile['0'];

$adId = $getclientDetaile['1'];

$getUserDetaile = getUserListDetails($adId);
$userEmail = $getUserDetaile['1'];


$contact = addslashes(trim($_POST['contact']));
$desg = addslashes(trim($_POST['desg']));
$ccity = addslashes(trim($_POST['city']));
$country = addslashes(trim($_POST['country']));
$mob = addslashes(trim($_POST['mobile']));
$email = addslashes(trim($_POST['email']));
$add1 = addslashes(trim($_POST['address1']));

$leadname = addslashes(trim($_POST['leadname']));

$leadType = addslashes(trim($_POST['activityType']));



$othersact = addslashes(trim($_POST['otherActivity']));
$eventbrief = addslashes(trim($_POST['eventbrief']));
$event_country = addslashes(trim($_POST['event_country']));
$event_city = addslashes(trim($_POST['event_city']));
$keydel = addslashes(trim($_POST['keyDeliverable']));
$specinst = addslashes(trim($_POST['specialInstruction']));

//Digital

if($department1 == "Digital")
{
$checkbox1 = $_POST['digi'];
$digital_work = "";

foreach( $checkbox1 as $key => $value){

       $digital_work = $value.','.$digital_work;

}

$digital_others = addslashes(trim($_POST['digital_others']));
}



//B2B
$lgs = addslashes(trim($_POST['lgs']));
$single_multiple_city = addslashes(trim($_POST['single_multiple_city']));
if($department1 == "B2B"){
$beventStartDate = addslashes(trim($_POST['beventStartDate']));
$beventEndDate = addslashes(trim($_POST['beventEndDate']));
$ceventStartDate = $beventStartDate; 
$ceventEndDate = $beventEndDate;

$cconvertedeventStartDate = convertDateinProperFormat($ceventStartDate);
$cconvertedeventEndDate = convertDateinProperFormat($ceventEndDate);
$bconvertedeventStartDate = convertDateinProperFormat($beventStartDate);
$bconvertedeventEndDate = convertDateinProperFormat($beventEndDate);
}

if($department1 == "B2C"){
$ceventStartDate = addslashes(trim($_POST['ceventStartDate']));
$ceventEndDate = addslashes(trim($_POST['ceventEndDate']));
$beventStartDate = $ceventStartDate;
$beventEndDate = $ceventEndDate;

$cconvertedeventStartDate = convertDateinProperFormat($ceventStartDate);
$cconvertedeventEndDate = convertDateinProperFormat($ceventEndDate);
$bconvertedeventStartDate = convertDateinProperFormat($beventStartDate);
$bconvertedeventEndDate = convertDateinProperFormat($beventEndDate);
}


//B2C
$coutelet_type = addslashes(trim($_POST['coutelet_type']));
$c_permission = addslashes(trim($_POST['c_permission']));
$cnumber_outlets = addslashes(trim($_POST['cnumber_outlets']));
$cnumberOfdays = addslashes(trim($_POST['noOfDays']));


//Step3
$daterece = addslashes(trim($_POST['expectedRecieverDate']));
$converteddaterece = convertDateinProperFormat($daterece);
$status = addslashes(trim($_POST['status']));
$curr = addslashes(trim($_POST['currency']));
//$revnue = addslashes(trim($_POST['projectRevenue']));
//$profit = addslashes(trim($_POST['projectMargin']));
$expdate = addslashes(trim($_POST['expectedClosureDate']));
$convertedexpdate = convertDateinProperFormat($expdate);
$zone = addslashes(trim($_POST['zone']));
//new added
$project_esti_number = addslashes(trim($_POST['project_esti_number']));
$agency_pro_fee_per = addslashes(trim($_POST['agency_pro_fee_per']));
$total_esti_amount = addslashes(trim($_POST['total_esti_amount']));
$project_fee_amount = addslashes(trim($_POST['project_fee_amount']));
$sub_total = addslashes(trim($_POST['sub_total']));
$gst_percentage = addslashes(trim($_POST['gst_percentage']));
$gst_amount = addslashes(trim($_POST['gst_amount']));
$grand_amount_total = addslashes(trim($_POST['grand_amount_total']));
//step 4
$expenses = addslashes(trim($_POST['expenses']));
$project_pl_amount = addslashes(trim($_POST['project_pl_amount']));
$pl_percentage = addslashes(trim($_POST['pl_percentage']));
$client_po_number = addslashes(trim($_POST['client_po_number']));
$po_value = addslashes(trim($_POST['po_value']));
$po_type = addslashes(trim($_POST['po_type']));

$agency_fee_amount = addslashes(trim($_POST['agency_fee_amount']));
$hotel_fee_amount = addslashes(trim($_POST['hotel_fee_amount']));
$giveaway_fee_amount = addslashes(trim($_POST['giveaway_fee_amount']));
$estimation_number = addslashes(trim($_POST['estimation_number']));



/*		
$sql="INSERT INTO oxy2_lead (`leadno`,`contact`,`companyname`,`dept`,`add1`, `ccity`, `country`,`mob`, `email`,`desg`, `othersact`, `event_city`, `event_country`,`keydel`,`specinst`,`eventbrief`,`bdstatus`,`curr`,`profit`,`revnue`,`lgs`,`beventStartDate`,`beventEndDate`,`coutelet_type`,`c_permission`,`cnumber_outlets`,`cnumberOfdays`,`ceventStartDate`,`ceventEndDate`,`creator`,`updatedby`,`updationdate`,`leadname`,`reg_time`,`creatorid`,`invdate`,`invno`,`invamount`,`paychnn`,`paymentcoll`,`paydaterece`,`paybal`,`exppaydate`,`othclient`,`invgp`,`digital_work`,`otherDigitalWork`,`retail`,`zone`,`leadtype`,`fdate`,`tdate`)

VALUES

('$leadno','$contact','$companyName','$department1','$add1', '$ccity', '$country','$mob', '$email','$desg', '$othersact', '$event_city', '$event_country','$keydel','$specinst','$eventbrief','$status','$curr','$profit','$revnue','$lgs','$bconvertedeventStartDate','$bconvertedeventEndDate','$coutelet_type','$c_permission','$cnumber_outlets','$cnumberOfdays','$cconvertedeventStartDate','$cconvertedeventEndDate','$updatedby','$updatedby','','$leadname',date_add(now(), interval 630 minute),'$creator','$invdate','','','','','$converteddaterece','','$convertedexpdate','','','$digital_work','$digital_others ','','$zone','$leadType',date_add(now(), interval 630 minute),date_add(now(), interval 630 minute))";
*/
		
$sql="INSERT INTO oxy2_lead (`leadno`,`contact`,`companyname`,`dept`,`add1`,`lgs`,`single_multiple_city`, `ccity`, `country`,`mob`, `email`,`desg`, `othersact`, `event_city`, `event_country`,`keydel`,`specinst`,`eventbrief`,`bdstatus`,`curr`,`project_esti_number`,`total_esti_amount`,`agency_pro_fee_per`,`project_fee_amount`,`sub_total`,`gst_per`,`gst_amount`,`grand_amount_total`,`expenses`,`project_pl_amount`,`pl_percentage`,`client_po_number`,`po_value`,`po_type`,`beventStartDate`,`beventEndDate`,`coutelet_type`,`c_permission`,`cnumber_outlets`,`cnumberOfdays`,`ceventStartDate`,`ceventEndDate`,`creator`,`updatedby`,`updationdate`,`leadname`,`reg_time`,`creatorid`,`invdate`,`invno`,`invamount`,`paychnn`,`paymentcoll`,`paydaterece`,`paybal`,`exppaydate`,`othclient`,`invgp`,`digital_work`,`otherDigitalWork`,`retail`,`zone`,`leadtype`,`fdate`,`tdate`,`agency_fee_amount`,`hotel_fee_amount`,`giveaway_fee_amount`,`estimation_number`)

VALUES

('$leadno','$contact','$companyName','$department1','$add1','$lgs','$single_multiple_city', '$ccity', '$country','$mob', '$email','$desg', '$othersact', '$event_city', '$event_country','$keydel','$specinst','$eventbrief','$status','$curr','$project_esti_number','$total_esti_amount','$agency_pro_fee_per','$project_fee_amount','$sub_total','$gst_percentage','$gst_amount','$grand_amount_total','$expenses','$project_pl_amount','$pl_percentage','$client_po_number','$po_value','$po_type','$bconvertedeventStartDate','$bconvertedeventEndDate','$coutelet_type','$c_permission','$cnumber_outlets','$cnumberOfdays','$cconvertedeventStartDate','$cconvertedeventEndDate','$updatedby','$updatedby','','$leadname',date_add(now(), interval 630 minute),'$creator','$invdate','','','','','$converteddaterece','','$convertedexpdate','','','$digital_work','$digital_others ','','$zone','$leadType',date_add(now(), interval 630 minute),date_add(now(), interval 630 minute),'$agency_fee_amount','$hotel_fee_amount','$giveaway_fee_amount','$estimation_number')";



//echo $sql;
//die();
$result = mysqli_query($con,$sql);




		  if($result == 1)
		  {
			  if(isset($_FILES["po_document"]["name"]) && $_FILES["po_document"]["name"]!=''){
				  $allowedExts = array("pdf",'xlsx','xls');
				$temp = explode(".", $_FILES["po_document"]["name"]);
				$extension = end($temp);
				if (($_FILES["po_document"]["size"] < 2000000)&& in_array($extension, $allowedExts))
				{
					$radomNum = gen_md5_password('8');
					$fileName11 = $_FILES["po_document"]["name"];
					$uploadedFileName = $radomNum.$fileName11;
				move_uploaded_file($_FILES["po_document"]["tmp_name"],
				"uploadpnl/" . $uploadedFileName);
	  
	  $query = "INSERT INTO oxy_pnl(leadId, status, leadStatus,dateAdded, pnlFileName) ".
			 "VALUES ('$leadno','0', '0', date_add(now(),INTERVAL 630 MINUTE), '$uploadedFileName')";

    $result1= mysqli_query($con,$query);
	
			  }
			  }
			 
			 
			   
					//Sending Mail
				  
				  //$to = $emailLoggedIn;
				$to = $emailLoggedIn;
				/*if($userEmail != ""){
				$ccEmail = "sercon.oxygen@batessercon.com".",".$userEmail;
				}
				else
				{
					$ccEmail = "sercon.oxygen@batessercon.com";
				}
				 Commented by Manish */
				 
				  $subject = 'New Lead : WMM / '.$department1.' / '.$leadno ; 
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
				  $message.= "<td colspan='2'><img src='http://watermarkmktg.com/aqua/images/WM1.png' alt='Aqua Logo' style='width:154px;height:39px;padding:10px;color:white;border:none;'/></td>";
				  $message.= "</tr>";
				  $message.= "<br />";
				  
				  $message.= "<tr>";
				  $message.= "<td colspan='2'>";
				  $message.= "<table width='100%' border='0' cellspacing='1' cellpadding='1'><tr><td><h2>WMM / $department1 / $leadno</h2></td><td align='right'><img src='http://www.watermarkmktg.com/aqua/barcode.php?code=WMM/$department1/$leadno' /></td></tr></table>";
				  
				  $message.= "</td>";
				  $message.= "</tr>";
				  
				  
				  $message.= "<tr>";
				  $message.= "<td colspan='2'>";
				  
				 
				  
				  $message.= "<table width='100%' border='0' cellspacing='5' cellpadding='5'>";
				  $message.="<tr><td colspan='2' valign='top'><h3>Client Information</h3><hr/></td></tr>";
				  
				  $message.="<tr> <td width='34%'>Client Name</td> <td width='66%'>$clientName</td></tr>";
				  
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
				  
				  $message.="<tr> <td width='34%'>Nature of Lead</td> <td width='66%'>$department1</td></tr>";
				 	
				  $message.="<tr> <td width='34%'>Type of Activity</td> <td width='66%'>$leadType</td></tr>";
				  
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
				  
				  
				//  $mail_sent = @mail( $to, $subject, $message, $headers );
				  $newclass->SentMail($to,$subject,$message);
				  //Mail Ended
		 
		  
		 
			  
		  
		  
		  
		  }

}//End of Form action Values

?>
<html>
<head>
<script language="JavaScript" type="text/javascript"> 
var t = setTimeout("document.myform.submit();",1000); //2 seconds measured in miliseconds
</script>
</head>

<body>
<form action = "./?id=2&subId=12" method="post" name="myform">
<input type="hidden" name="ldnumber" value="<?php echo $leadno; ?>"/>
<input type="hidden" name="dep" value="<?php echo $department1; ?>"/>
<input type="hidden" name="category" value=""/>
<input type="hidden" name="department" value=""/>
</form>
</body>

</html>





