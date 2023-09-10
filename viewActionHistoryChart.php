<?php include_once('commonFunction.php'); ?>
<style type="text/css">
.form_fields_container li div.form_input input {
border:none;

}
.form_fields_container li {
padding:3px 0px;
}

</style>
<?php  
$userIdforAction = $_COOKIE["user_id"];
$actionChartId = $_REQUEST['actionChartId'];

$SelQuery = "SELECT * FROM oxy2_actionlog WHERE userId	= '$userIdforAction' AND actionId = '$actionChartId'";
$SelExec = mysql_query($SelQuery);
$cntt = mysql_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysql_fetch_array($SelExec))
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
				$email1= $SelResult['email1'];
				$email2= $SelResult['email2'];
				$email3= $SelResult['email3'];
				$email4= $SelResult['email4'];
				$email5= $SelResult['email5'];
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
    <td width="82%"><span class="iconsweet">r</span>
    <h5>View Action</h5></td>
    <td width="18%"><span class="iconsweet">r</span><h5><a href="./?id=3&subId=8&actionChartId=<?php echo $actionChartId; ?>" style="text-decoration:none;color:#9AA4A8" >View Action History</a></h5></td>
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
                         
                          <li><label>Key act</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $getClientDetails['0']; ?>" ></div></li>
                          
                           <li><label>Venue</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $venue; ?>" ></div></li>
                           
                            <li><label>City</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $city; ?>" ></div></li>
                            
                             <li><label>Type</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $type; ?>" ></div></li>
                             
                              <li><label>Event Date</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $eventDate; ?>" ></div></li>
                              
                               <li><label>From Date</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $fromDate; ?>" ></div></li>
                               
                                <li><label>End Date</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $endDate; ?>" ></div></li>
                                
                                 <li><label>Project Leader</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $projectLeaderName['0']; ?>" ></div></li>
                                 
                                  <li><label>Bd Name</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $bdName['0']; ?>" ></div></li>
                                  
                                   <li><label>Status</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $status; ?>" ></div></li>
                                   
                                   
                                    <!--<li><label>Email1</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $email1; ?>" ></div></li>
                                    
                                     <li><label>Email2</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $email2; ?>" ></div></li>
                                     
                                      <li><label>Department</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $email3; ?>" ></div></li>
                                      
                                      
                                       <li><label>Department</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $email4; ?>" ></div></li>
                                       
                                        <li><label>Department</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $email5; ?>" ></div></li>-->
                                        
                                         <li><label>Campaign Brief</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $campaignBrief; ?>" ></div></li>
                                         
                                          <li><label>Progress</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $progress; ?>" ></div></li>
                                          
                                           <li><label>Critiacl Issue</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $criticalIssue; ?>" ></div></li>
                                           
                                             <li><label>Task </label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $taskDay; ?>" ></div></li>
                                             <li><label>Updated By </label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $updatedBy; ?>" ></div></li>
                                              <li><label>Updated On </label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $updatedOn; ?>" ></div></li>
                                             
                                            <!-- <li style="text-align:left"><a href="./?id=3&subId=6&actionChartId=<?php echo $_REQUEST['actionChartId']; ?>"><span style="background: #CCC;color:#000000;text-shadow: 1px 1px #DDD; padding:6px;border-radius:5px; font-weight:bold;">Edit ActionChart</span></a></li>
                                              -->
                                             
                                   
                </ul>
            </div>
        </div>
    </div>
                     
 	<br class="clear" />   