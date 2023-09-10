<?php include_once('commonFunction.php'); ?>
<style type="text/css">
.form_fields_container li div.form_input input {
border:none;

}
.form_fields_container li {
padding:3px 0px;
}

/* CSS for Modal window */
.modal{
width:750px;
}


tr.even {
background-color: none;
}
tr.odd {
background-color: none;
}

/* Ended */

</style>
<?php  
$actionChartId = $_REQUEST['actionChartId'];                 
$SelQuery = "SELECT * FROM oxy2_action WHERE id = '$actionChartId'";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				$department= $SelResult['department'];
				$completeLeadNumber= $SelResult['completeLeadNumber'];
				$campaignName= $SelResult['campaignName'];
				$clientName= $SelResult['clientName'];
				$stage= $SelResult['stage'];
				$keyAccount= $SelResult['keyAccount'];
				$keyact= $SelResult['keyact'];
				$venue= $SelResult['venue'];
				$city= $SelResult['city'];
				$type= $SelResult['type'];
				$eventDate= $SelResult['eventDate'];
				$fromDate= $SelResult['fromDate'];
				$endDate= $SelResult['endDate'];
				$projectId= $SelResult['projectLeader'];
				$bdId= $SelResult['bdName'];
				$status= $SelResult['status'];
				
				$email= $SelResult['email'];
								
				$getUserDetailsBasedOnUserId = getUserDetailsBasedOnUserId($email);

				
								
				$campaignBrief= $SelResult['campaignBrief'];
				$progress= $SelResult['progress'];
				$criticalIssue= $SelResult['criticalIssue'];
				$taskDay= $SelResult['taskDay'];
				
				$updatedBy= $SelResult['updatedBy'];
				
				$updatedOn= $SelResult['updatedOn'];
				
				$dateAdded= $SelResult['dateAdded'];
				
				$projectLeaderName = getProjectDetails($projectId);
				
				$bdName = getBDdetails($bdId);
				
				$getClientDetails = getClientDetails($keyact);
				
				
				
				}
}
				
				
?>  


<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="82%"><span class="iconsweet">r</span><h5>View Action Chart</h5></td>
    <td width="18%"><span class="iconsweet">r</span><h5><a data-toggle="modal" href="#myModal2" style="text-decoration:none;color:#9AA4A8" >View Action History</a>
    <!--<a href="./?id=3&subId=8&actionChartId=<?php echo $actionChartId; ?>" style="text-decoration:none;color:#9AA4A8" >View Action History</a>--></h5></td>
  </tr>
</table>
</div>
            <div class="widget_body">
				<!--Form fields-->
                <ul class="form_fields_container">
 
             
                    <li><label>Department</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $department; ?>" ></div></li>
                    
                     <li><label>Lead Number</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $completeLeadNumber; ?>" ></div></li>
                     
                      <li><label>Campaign Name</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $campaignName; ?>" ></div></li>
                      
                       <li><label>Client Name</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $clientName; ?>" ></div></li>
                       
                        <li><label>Stage</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $stage; ?>" ></div></li>
                        
                         <li><label>Key Account</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $keyAccount; ?>" ></div></li>
                         
                          <li><label>Key act</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $getClientDetails; ?>" ></div></li>
                          
                           <li><label>Venue</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $venue; ?>" ></div></li>
                           
                            <li><label>City</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $city; ?>" ></div></li>
                            
                             <li><label>Type</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $type; ?>" ></div></li>
                             
                              <li><label>Event Date</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $eventDate; ?>" ></div></li>
                              
                               <li><label>From Date</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $fromDate; ?>" ></div></li>
                               
                                <li><label>End Date</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $endDate; ?>" ></div></li>
                                
                                 <li><label>Project Leader</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $projectLeaderName['0']; ?>" ></div></li>
                                 
                                  <li><label>Bd Name</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $bdName['0']; ?>" ></div></li>
                                  
                                   <li><label>Status</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $status; ?>" ></div></li>
                                   
                                   <li><label>Email</label> <div class="form_input"> <textarea class="auto" id="txtInput" name="eventbr" cols="50" rows="3" readonly="readonly"><?php echo $getUserDetailsBasedOnUserId; ?></textarea></div></li>
                                   
                                   
                                  
                                        
                                         <li><label>Campaign Brief</label> <div class="form_input">
                                         <textarea class="auto" id="txtInput" name="eventbr" cols="50" rows="3" readonly="readonly"><?php echo $campaignBrief; ?></textarea>
                                         
                                         </div></li>
                                         
                                          <li><label>Progress</label> <div class="form_input">
                                          <textarea class="auto" id="autogrow1" name="progress" cols="50" rows="3" readonly="readonly"><?php echo $progress; ?></textarea>
                                          </div></li>
                                          
                                           <li><label>Critiacl Issue</label> <div class="form_input">
                                           <textarea class="auto" id="autogrow2" name="issues" cols="50" rows="3" readonly="readonly"><?php echo $criticalIssue; ?></textarea>
                                           </div></li>
                                           
                                             <li><label>Task </label> <div class="form_input">
                                             <textarea class="auto" id="autogrow3" name="task" cols="50" rows="3" readonly="readonly"><?php echo $taskDay; ?></textarea>
</div></li>
                                             <li><label>Updated By </label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $updatedBy; ?>" ></div></li>
                                              <li><label>Updated On </label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $updatedOn; ?>" ></div></li>
                                             
                                             <li style="text-align:left"><a href="./?id=3&subId=6&actionChartId=<?php echo $_REQUEST['actionChartId']; ?>"><span style="background: #CCC;color:#000000;text-shadow: 1px 1px #DDD; padding:6px;border-radius:5px; font-weight:bold;">Edit ActionChart</span></a></li>
                                             
                                             
                                   
                </ul>
            </div>
        </div>
    </div>
                     
 	<br class="clear" />  
 <?php
$userIdforAction = $_COOKIE["user_id"];
$SelQuery = "SELECT * FROM oxy2_actionlog WHERE userId	= '$userIdforAction' AND actionId = '$actionChartId'";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);

while($SelResult = mysqli_fetch_array($SelExec))
{
$completeLeadNumber	= $SelResult['completeLeadNumber'];
$campaignName= $SelResult['campaignName'];
$clientName	= $SelResult['clientName'];
}
?>
    
    <!--Modal Table Start-->
    <div class="modal hide" id="myModal2" >
    <div class="modal-header">
    <!--<a class="close" data-dismiss="modal">*</a>-->
    <h3>Lead Number : <span style="font-size:13px;"><?php echo $completeLeadNumber; ?></span> </h3><br/>
    <h3>Client Name : <span style="font-size:13px;"><?php echo $campaignName."/".$clientName; ?></span> </h3>
    
    </div>
    <div class="modal-body">
            <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                               <tr>
                                <th width="23%" align="left">Progress So far</th>
                              <th width="23%">Critical Issue's</th>
                                <th width="23%">Task for the next day</th>
                                <th width="6%">Stage</th>
                                <th width="6%">Status</th>
                                <th width="19%">Updated By</th>
                              
                            </tr>
<?php
$SelQueryForModal = "SELECT * FROM oxy2_actionlog WHERE userId	= '$userIdforAction' AND actionId = '$actionChartId'";
$SelExecForModal = mysqli_query($con,$SelQueryForModal);
if($cntt > 0){
				$i = 0;
				while($SelResultForModal = mysqli_fetch_array($SelExecForModal))
				{
				$i++;
				if($i % 2 == "0"){$col = "gradeA even";}
				else
				{$col = "gradeA odd";}
				
				$stage= $SelResultForModal['stage'];
					
				$status= $SelResultForModal['status'];
				
				if($status == "red"){$col1 = "red_highlight";}
				elseif($status == "yellow"){$col1 = "yellow_highlight";}
				else{$col1 = "green_highlight";}
				
				$actionId= $SelResultForModal['id'];
				
				$progress= $SelResultForModal['progress'];
				
				$criticalIssue= $SelResultForModal['criticalIssue'];
				
				$taskDay= $SelResultForModal['taskDay'];
				
				$keyactId= $SelResultForModal['keyact'];
				$getClientName = getClientDetails($keyactId);
				
				$updatedBy= $SelResultForModal['updatedBy'];
				
				$updatedOn= $SelResultForModal['updatedOn'];
				
				
					
				
				
?>                         
                            <tr>
                      <td align="left"  style="text-align:justify"><b style="font-weight:bold;"><?php echo $progress; ?></b></td>
                      <td align="center" style="text-align:justify"><span><?php echo $criticalIssue; ?></span></td>
                      <td align="center" style="text-align:justify"><?php echo $taskDay; ?></td>
                      <td align="center"><span class="grey_highlight pj_cat"><?php echo $stage; ?></span></td>
                      <td align="center"><span class="<?php echo $col1; ?> pj_cat"><?php echo $status; ?></span></td>
                      <td align="center"><?php echo $updatedBy."<br/>(".$updatedOn.")"; ?></td>
                      
                            </tr>
                            
<?php } }
				else
				{
				?>   
                
                <tr>
                  <td colspan="8">No record Found</td>
                       
                </tr>
                <?php } ?> 

                            </table>    </div>
    <div class="modal-footer">
    <a data-dismiss="modal" class="greyishBtn button_small" href="#">Close</a>
   <!-- <a href="#" class="bluishBtn button_small">Save changes</a>-->
    </div>
    </div>
    <!--Modal Table End--> 