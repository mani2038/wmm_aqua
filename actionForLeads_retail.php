<?php
include_once('inc_connection.php');
include_once('commonFunction.php');

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
$department1 = addslashes(trim($_POST['department']));

$selQuery     = "select * from oxy2_lead_gen_retail where dept='$department1' and year_gen='2014';";
$result    = mysql_query($selQuery);
$leadno= mysql_result($result,0,leadno)+1;

$sel2Query    = "select * from oxy2_lead_retail where leadno='$leadno' and dept='$department1';";
$result2   = mysql_query($sel2Query);
$cnt       = mysql_num_rows($result2);
if($cnt >= 1)
{

}

else
{
$upQuery = "update oxy2_lead_gen_retail set leadno='$leadno',reg_on=date_add(now(), interval 630 minute) where dept='$department1' and year_gen='2014'";
$reUQuery= mysql_query($upQuery);
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
$revnue = addslashes(trim($_POST['projectRevenue']));
$profit = addslashes(trim($_POST['projectMargin']));
$expdate = addslashes(trim($_POST['expectedClosureDate']));
$convertedexpdate = convertDateinProperFormat($expdate);
$zone = addslashes(trim($_POST['zone']));


		
$sql="INSERT INTO oxy2_lead_retail (`leadno`,`contact`,`companyname`,`dept`,`add1`, `ccity`, `country`,`mob`, `email`,`desg`, `othersact`, `event_city`, `event_country`,`keydel`,`specinst`,`eventbrief`,`bdstatus`,`curr`,`profit`,`revnue`,`lgs`,`beventStartDate`,`beventEndDate`,`coutelet_type`,`c_permission`,`cnumber_outlets`,`cnumberOfdays`,`ceventStartDate`,`ceventEndDate`,`creator`,`updatedby`,`updationdate`,`leadname`,`reg_time`,`creatorid`,`invdate`,`invno`,`invamount`,`paychnn`,`paymentcoll`,`paydaterece`,`paybal`,`exppaydate`,`othclient`,`invgp`,`digital_work`,`otherDigitalWork`,`retail`,`zone`,`leadtype`,`fdate`,`tdate`)

VALUES

('$leadno','$contact','$companyName','$department1','$add1', '$ccity', '$country','$mob', '$email','$desg', '$othersact', '$event_city', '$event_country','$keydel','$specinst','$eventbrief','$status','$curr','$profit','$revnue','$lgs','$bconvertedeventStartDate','$bconvertedeventEndDate','$coutelet_type','$c_permission','$cnumber_outlets','$cnumberOfdays','$cconvertedeventStartDate','$cconvertedeventEndDate','$updatedby','$updatedby','','$leadname',date_add(now(), interval 630 minute),'$creator','$invdate','','','','','$converteddaterece','','$convertedexpdate','','','$digital_work','$digital_others ','','$zone','$leadType',date_add(now(), interval 630 minute),date_add(now(), interval 630 minute))";


//echo $sql;

$result = mysql_query($sql);




		  if($result == 1)
		  {
			  
			 
			 
			   
					//Sending Mail
				  
				  //$to = $emailLoggedIn;
				$to = $emailLoggedIn;
				if($userEmail != ""){
				$ccEmail = "sercon.oxygen@batessercon.com".",".$userEmail;
				}
				else
				{
					$ccEmail = "sercon.oxygen@batessercon.com";
				}
				  
				  $subject = 'New Lead : SERCON / '.$department1.' / '.$leadno ; 
				  $random_hash = md5(date('r', time())); 
				  
				  $headers = "From:Sercon Oxygen<sercon.oxygen@batessercon.com>\r\nReply-To:sercon.oxygen@batessercon.com\r\nCc: $ccEmail";
				  $headers .= "\r\nContent-type: text/html\r\n";
				  
				  $message.= "<html>";
				  $message.= "<head>";
				  $message.= "<title>Oxygen Lead Creation : Thank you</title>";
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
				  $message.= "<table width='100%' border='0' cellspacing='1' cellpadding='1'><tr><td><h2>SERCON / $department1 / $leadno</h2></td><td align='right'><img src='http://www.pulsesuite.com/oxygen/barcode.php?code=SERCON/$department1/$leadno' /></td></tr></table>";
				  
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
				  
				  
				  $mail_sent = @mail( $to, $subject, $message, $headers );
				  
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





