<?php
include_once('inc_connection.php');
include_once('commonFunction.php');
$Dep = $_REQUEST['dep'];
$ldNum = $_REQUEST['ldnumber'];

$SelQuery = "SELECT * FROM oxy2_lead WHERE leadno = '$ldNum' AND dept = '$Dep'";
$SelExec = mysql_query($SelQuery);
$cntt = mysql_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysql_fetch_array($SelExec))
				{
				$i++;
				if($i % 2 == "0"){$col = "gradeA even";}
				else
				{$col = "gradeA odd";}
				
				//Client Information
				$contact= $SelResult['contact'];
				
				$companyname= $SelResult['companyname'];
				$clientNamee = getClientListDetails($companyname);
				$clientName = $clientNamee['0'];
							
				$add1= $SelResult['add1'];
				$ccity= $SelResult['ccity'];
				$country= $SelResult['country'];
				$mob= $SelResult['mob'];
				$email= $SelResult['email'];
				$desg= $SelResult['desg'];
				
				
				//Account Information
				$leadname= $SelResult['leadname'];
				$dept= $SelResult['dept'];
				$leadtype= $SelResult['leadtype'];
				$othersact= $SelResult['othersact'];
				$eventbrief= $SelResult['eventbrief'];
				$event_country= $SelResult['event_country'];
				$event_city= $SelResult['event_city'];
				$keydel= $SelResult['keydel'];
				$specinst= $SelResult['specinst'];
				
				
				
				//Department Wise Data
				//B2B
				$leadtype= $SelResult['leadtype'];
				$beventStartDate= $SelResult['beventStartDate'];
				$beventEndDate= $SelResult['beventEndDate'];
				
				//B2C
				$coutelet_type= $SelResult['coutelet_type'];
				$c_permission= $SelResult['c_permission'];
				$cnumber_outlets= $SelResult['cnumber_outlets'];
				$cnumberOfdays= $SelResult['cnumberOfdays'];
				$ceventStartDate= $SelResult['ceventStartDate'];
				$ceventEndDate= $SelResult['ceventEndDate'];
				
				
				//Digital
				$digital_work= $SelResult['digital_work'];
				$otherDigitalWork= $SelResult['otherDigitalWork'];
				
				$creator= $SelResult['creator'];
				
				}
}
				
			
				
?> 
<style type="text/css">

td{padding:5px; font-size:12px; font-weight:bold;}


</style>
<!--One_Wrap-->
            <div class="one_wrap fl_left">
                <div class="widget">
                    <div class="widget_title"><span class="iconsweet">8</span>
                        <h5>Lead Details</h5>
                    </div>
                    <div class="widget_body">
                      <div class="content_pad">
                      
                      <?php
					  
					   //Sending Mail
				  
				  //$to = $emailLoggedIn;
				$to = "myselfamit2k5@gmail.com,imanish.yadav@gmail.com";
				  
				  $subject = 'New Lead : SERCON / '.$Dep.' / '.$ldNum ; 
				  $random_hash = md5(date('r', time())); 
				  
				  $headers = "From:Sercon Oxygen<sercon.oxygen@batessercon.com>\r\nReply-To:sercon.oxygen@batessercon.com";
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
				  $message.= "<table width='100%' border='0' cellspacing='1' cellpadding='1'><tr><td><h2>SERCON / $Dep / $ldNum</h2></td><td align='right'><img src='http://www.pulsesuite.com/oxygen/barcode.php?code=SERCON/$Dep/$ldNum' /></td></tr></table>";
				  
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
				  
				  if($dept == "B2B"){
				  
				  $message.= "<tr>";
				  $message.= "<td colspan='2'>";
				  
				  $message.= "<table width='100%' border='0' cellspacing='5' cellpadding='5'>";
				
				  $message.="<tr> <td width='34%'>LGS</td> <td width='66%'>$leadtype</td></tr>";
				  
				  $message.="<tr> <td width='34%'>Event Start Date</td> <td width='66%'>$beventStartDate</td></tr>";
				 	
				  $message.="<tr> <td width='34%'>Event End Date</td> <td width='66%'>$beventEndDate</td></tr>";	
				  
					 
				  $message.= "<table>";
				  
				  $message.= "</td>";
				  $message.= "</tr>";
				  
				  }
				  
				  else if($dept == "B2C"){
				  
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
				  
				  else if($dept == "Digital"){
				  
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
				  
				  echo $message;
				  $mail_sent = @mail( $to, $subject, $message, $headers );
				  
				  //Mail Ended
		 
					  
					  ?>
                        	
                        
                        
                          
  
 


                          
                            
                            
                                                       
                            
                        </div>
                    </div>
                </div>
            </div>
          
            
        
         <br class="clear" />
         
         
       