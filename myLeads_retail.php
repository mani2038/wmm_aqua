<?php include_once('commonFunction.php'); ?>
<style type="text/css">

table.display span.pj_cat {
display: inline-block;
line-height: 100%;
background: #757673;
padding: 3px 5px;
font-size: 10px;
text-transform: uppercase;
color: white;
text-shadow: 0px 1px 0px #646464;
border-radius: 3px;
}
table.display span.green_highlight {
background:#87AC51;
}
table.display span.blue_highlight {
background: #4572A7;
}

table.display span.grey_highlight {
background:#3D434B;
}

table.display span.yellow_highlight {
background: #FF0;
color:#000;
}
table.display span.red_highlight {
background: #800000;
}


</style>
<!--One_Wrap-->
 	<div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
    <h5>View Leads</h5>
</div>
           
            
          <div class="widget_body">
                <div class="demo_jui">  
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="jqtable">
                        <thead>
                            <tr>
                                <th width="67" align="left">Client Name</th>
                              <th width="72">Lead No.</th>
                              <th width="92">Department</th>
                              <th width="64">T.O.A.</th>
                              <th width="123">Event Date</th>
                              <th width="172">Lead Status</th>
                              <th width="73">Pro. Revenue</th>
                              <th width="151">Created </th>
                              <th width="133">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php
$userIdforAction = $_COOKIE["user_id"];
$yearNumber = date('Y');
$SelQuery = "SELECT * FROM oxy2_lead_retail WHERE creatorid = '$userIdforAction' AND year(reg_time) = $yearNumber";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				$i++;
				if($i % 2 == "0"){$col = "gradeA even";}
				else
				{$col = "gradeA odd";}
				
				//Client Information
				$contact= $SelResult['contact'];
				$lid= $SelResult['id'];
				
				$companyname= $SelResult['companyname'];
				$clientNamee = getClientListDetails($companyname);
				$clientName = $clientNamee['0'];
				
				$leadno= $SelResult['leadno'];
							
				$add1= $SelResult['add1'];
				$ccity= $SelResult['ccity'];
				$country= $SelResult['country'];
				$mob= $SelResult['mob'];
				$email= $SelResult['email'];
				$desg= $SelResult['desg'];
				$bdstatus= $SelResult['bdstatus'];
				
				
				
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
				
				$revnue= $SelResult['revnue'];
						
				
				$reg_time= $SelResult['reg_time'];
				
				
				
				
				
				
				
				//Department Wise Data
				//B2B
				$lgs= $SelResult['lgs'];
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
				
				if($dept == "B2B"){$eventDateee = $beventStartDate;$col11 = "red_highlight";}
				else if($dept == "B2C"){$eventDateee = $ceventStartDate;$col11 = "green_highlight";}
				else{$eventDateee = "No date";$col11 = "blue_highlight";}
				
			
				
?>                         
                            <tr class="<?php echo $col; ?>">
                                 <td align="left" style="background:none;"><a class="tip_north" href="#" style="color:#6C6C6C;padding:0 5px;text-decoration:none;"><b style="font-weight:bold;"><?php echo $clientName; ?></b></a></td>
                      <td align="center"><span ><?php echo $leadno; ?></span><span style=" color:#F00;font-size:9px; position:relative;top:-11px;">AC(<?php echo getCountForLead($leadno,$dept); ?>)</span></td>
                      <td align="center"><span class="<?php echo $col11; ?> pj_cat"><?php echo $dept;?></span></td>
                     <td align="center"><?php echo $leadname;?></td>
                     <td align="center"><?php echo $eventDateee;?></td>
                     <td align="center"><?php echo $bdstatus;?>
                     <!-- Printing the Manage Invoice list for the invoiced stage and admin, account and bd head-->
                     
                     <?php  if($userTypeForLooggedIn == "1" || $userTypeForLooggedIn == "6" || $userTypeForLooggedIn == "3"){ 
					 if($bdstatus == "Invoiced"){
					 
					 ?> 
                     
                     <a href="viewLeadInvoice.php?ldId=<?php echo $lid; ?>" id="gallery_box" style="text-decoration:none; font-weight:bold;">[<?php echo getTotalInvoiceByLeadANDCompanyId($lid,$companyname); ?>]</a>
                     <br/>
                     <span style="font-size:11px; color:#333">[<?php echo getInvoicedGPForLead($lid); ?>]</span>
                     
                     <?php }} ?>
                     <?php  if($userTypeForLooggedIn > 0 ){ 
					 if($bdstatus == "Contracted"){
					 
					 ?> 
                     
                    <a href="viewLeadCon.php?ldId=<?php echo $lid; ?>" id="gallery_box" style="text-decoration:none; font-weight:bold;"><span class="data_actions iconsweet" style="font-size:18px; color:#333">H</span></a>                   
                     <?php }} ?>
                     
                     </td>
                     <td align="center"><?php echo $revnue; ?></td>
                     <td align="center"><?php echo $creator."<br/>".$reg_time; ?></td>
                      <td align="center"><span class="data_actions iconsweet"><a class="tip_north" original-title="View" href="./?id=2&subId=13&ldnumber=<?php echo $leadno; ?>&dep=<?php echo $dept;?> " style="color:#6C6C6C;padding:0 2px;font-size:18px;">}</a> <a class="tip_north" original-title="Edit Commercial Info" href="./?id=2&subId=15&ldId=<?php echo $lid; ?>"  style="color:#6C6C6C;padding:0 2px;font-size:18px;" target="_blank">C</a>
                     <a href="viewForLeadDeletion.php?leadId=<?php echo $lid; ?>&show=<?php echo getCountForLead($leadno,$dept); ?>" class="tip_north" id="gallery_box" original-title="Request for Lead Deletion" style="color:#F00;padding:0 1px;font-size:18px;">X</a>
                      </span></td>
                            </tr>
                            
<?php } }
				else
				{
				?>   
                
                <tr>
                  <td colspan="3" align="center" style="font-size:14px; font-weight:bold;">No record Found</td>
                       
                </tr>
                <?php } ?> 
                                            
                           
                        </tbody>
                    </table>
                    
                     
              </div>
            </div>      
            
        </div>
    </div>    