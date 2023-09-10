<?php

$Dep = $_REQUEST['dep'];
$ldNum = $_REQUEST['ldnumber'];

$SelQuery = "SELECT * FROM oxy2_leaddeleted WHERE leadno = '$ldNum' AND dept = '$Dep'";
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
				$clientName = getClientListDetails($companyname);
							
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
                      <div class="content_pad" id="printd2" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px">
                        	<a href="javascript:void(0);" onclick="printPage();" class="button_small whitishBtn"><span class="iconsweet">v</span>Print</a>
                            <br />


                        <table width="100%" border="0" cellspacing="3" cellpadding="3" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px" >
  <tr>
    <td><h2>SERCON / <?php echo $Dep; ?> / <?php echo $ldNum; ?></h2></td>
    <td align="right">
    
      <img src="barcode.php?code=SERCON/<?php echo $Dep; ?>/<?php echo $ldNum; ?>" /></td>
  </tr>
</table>

                          <table width="100%" border="0">
  <tr>
    <td>  <table width="100%" border="0" cellspacing="3" cellpadding="3" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px">
                                  <tr>
                                    <td colspan="2" valign="top"><h3>Client Information</h3>
                                    <hr/>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="34%">Client Name: </td>
                                    <td width="66%"><?php echo $clientName['0']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Contact Name: </td>
                                    <td><?php echo $contact; ?></td>
                                  </tr> 
                                  <tr>
                                    <td>Designation: </td>
                                    <td><?php echo $desg; ?></td>
                                  </tr>
                                  <tr>
                                    <td>City: </td>
                                    <td><?php echo $ccity; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Country: </td>
                                    <td><?php echo $country; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Mobile Number: </td>
                                    <td><?php echo $mob; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Email: </td>
                                    <td><?php echo $email; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Address: </td>
                                    <td><?php echo $add1; ?></td>
                                  </tr>
							</table>
                            <br/>
                            </td>
    </tr>
  <tr>
    <td>   <table width="100%" border="0" cellspacing="3" cellpadding="3" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px">
                                  <tr>
                                    <td colspan="2"><h3>Account Information</h3>
                                    <hr/>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="34%">Lead Name: </td>
                                    <td width="66%"><?php echo $leadname; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Nature of Lead: </td>
                                    <td><?php echo $dept; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Type of Activity: </td>
                                    <td><?php echo $leadtype; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Other' specification: </td>
                                    <td><?php echo $othersact; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Event Brief: </td>
                                    <td><?php echo $eventbrief; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Event Country: </td>
                                    <td><?php echo $event_country; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Event City: </td>
                                    <td><?php echo $event_city; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Key Deliverable: </td>
                                    <td><?php echo $keydel; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Special Instruction: </td>
                                    <td><?php echo $specinst; ?></td>
                                  </tr>
							</table>
                            
                            <br/>
                            
							<?php 
							if($dept == "B2B"){
							?>
                            <table width="100%" border="0" cellspacing="3" cellpadding="3" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px">
                                  
                                  <tr>
                                    <td width="34%">LGS: </td>
                                    <td width="66%"><?php echo $leadtype; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Event Start Date: </td>
                                    <td><?php echo $beventStartDate; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Event End Date: </td>
                                    <td><?php echo $beventEndDate; ?></td>
                                  </tr>
                                                                  
							</table>
 							
                            <?php 
							} else if($dept == "B2C"){
							?>
                             <table width="100%" border="0" cellspacing="3" cellpadding="3" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px">
                                  
                                  <tr>
                                    <td width="34%">Outlet Type: </td>
                                    <td width="66%"><?php echo $coutelet_type; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Permission: </td>
                                    <td><?php echo $c_permission; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Number of Outlet: </td>
                                    <td><?php echo $cnumber_outlets; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Number of Days: </td>
                                    <td><?php echo $cnumberOfdays; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Event Start Date: </td>
                                    <td><?php echo $ceventStartDate; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Event End Date: </td>
                                    <td><?php echo $ceventEndDate; ?></td>
                                  </tr>
                                                                  
							</table>
                            
                            <?php } else if($dept == "Digital") { ?>
                            
                             <table width="100%" border="0" cellspacing="5" cellpadding="5">
                                  
                                  <tr>
                                    <td width="34%">Service Required: </td>
                                    <td width="66%"><?php echo $digital_work; ?></td>
                                  </tr>
                                  <tr>
                                    <td>other's: </td>
                                    <td><?php echo $otherDigitalWork; ?></td>
                                  </tr>
                                                                                                  
							</table>
                            
                            <?php } else { } ?>
                            
                            <br/>
                             <table width="100%" border="0" cellspacing="3" cellpadding="3" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px" >
                                  
                                  <tr>
                                    <td width="34%">Lead Created By: </td>
                                    <td width="66%"><?php echo $creator; ?></td>
                                  </tr>
                                                                                                
							</table>

                         </td>
    </tr>
</table>

<script type="text/javascript">
     function printPage(){
            var tableData = '<table border="1">'+document.getElementById('printd2').innerHTML+'</table>';
            var data = '<button onclick="window.print()">Print this page</button>'+tableData;       
            myWindow=window.open('','','width=800,height=600');
            myWindow.innerWidth = screen.width;
            myWindow.innerHeight = screen.height;
            myWindow.screenX = 0;
            myWindow.screenY = 0;
            myWindow.document.write(data);
            myWindow.focus();
        };
     </script>
                          
                            
                            
                                                       
                            
                        </div>
                    </div>
                </div>
            </div>
          
            
        
         <br class="clear" />
         
