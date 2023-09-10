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

 <!-- Messsage Box -->                
            <?php 
            if(isset($_REQUEST['res'])){
            $result  = $_REQUEST['res'];
            echo getError($result); 
            }
            ?>
            
            
            <!-- Ended -->   
 	<div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
    <h5>View Training Session</h5>
</div>
           
           
          
          
          <div class="widget_body">
                <div class="demo_jui">  
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="jqtable">
                        <thead>
                            <tr>
                                <th width="99" align="left">Title</th>
                              <th width="100">Training Attended By</th>
                              <th width="85">Credit Points</th>
                              <th width="96">Date Added</th>
                              <th width="101">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php
$SelQuery = "SELECT * FROM oxy2_training";
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
				$id= $SelResult['id'];
				$trainingTitle= $SelResult['trainingTitle'];
				$datepicker1= $SelResult['datepicker1'];
				$timepicker= $SelResult['timepicker'];
				
				$trainingUsers= $SelResult['trainingUsers'];
				$trainerIds = explode(",", $trainingUsers);
				$userarry = count($trainerIds);
				for($ui='0';$ui<$userarry;$ui++){
				$getUserDetailsBasedOnUserId = getUserListDetails($trainerIds[$ui]) ;
				$username = $getUserDetailsBasedOnUserId['4']." ".$getUserDetailsBasedOnUserId['5'];
				$traineeAttendee = $traineeAttendee.$username.", ";
				}
				$traineeAttendeeList = rtrim($traineeAttendee, ",");
				
				$creditPoints= $SelResult['creditPoints'];
				$dateAdded= $SelResult['dateAdded'];
					
				
?>                         
                            <tr class="<?php echo $col; ?>">
                                 <td align="left" style="background:none;"><a class="tip_north" href="#" style="color:#6C6C6C;padding:0 5px;text-decoration:none;"><b style="font-weight:bold;"><?php echo $trainingTitle; ?></b><br/><br/>
                                 <?php echo $datepicker1." ".$timepicker; ?>
                                 </a></td>
                      <td align="left"><?php echo $traineeAttendeeList;?></td>
                     <td align="center"><?php echo $creditPoints;?></td>
                     <td align="center"><?php echo $dateAdded;?></td>
                     <td align="center">
                     <span class="data_actions iconsweet">
                     <a class="tip_north" original-title="View" href="./?id=2&subId=13&ldnumber=<?php echo $leadno; ?>&dep=<?php echo $dept;?> " style="color:#6C6C6C;padding:0 2px;font-size:18px;">}</a> 
                     <a class="tip_north" original-title="Edit Training Details" href="./?id=3&subId=4&trainingId=<?php echo $id; ?>"  style="color:#6C6C6C;padding:0 2px;font-size:18px;" target="_blank">C</a>
                     <a href="viewForLeadDeletion.php?leadId=<?php echo $lid; ?>&show=<?php echo getCountForLead($leadno,$dept); ?>" class="tip_north" id="gallery_box" original-title="Request for Lead Deletion" style="color:#F00;padding:0 1px;font-size:18px;">X</a>
                     </span></td>
                            </tr>
                            
<?php } }
				else
				{
				?>   
                
                <tr>
                  <td colspan="2" align="center" style="font-size:14px; font-weight:bold;">No record Found</td>
                       
                </tr>
                <?php } ?> 
                                            
                           
                        </tbody>
                    </table>
                    
                     
              </div>
            </div>      
            
        </div>
    </div>    