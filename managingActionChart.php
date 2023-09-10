<?php include_once('commonFunction.php'); 
$userTypeForLooggedIn = $_COOKIE["user_type"];
$usernameforLoggedIn = $_COOKIE["username"];
if($userTypeForLooggedIn =='1'){
	
?>
<script language="JavaScript1.2">
function openwindow(aci,ldD)
{
	window.open("addDateLine.php?actionChartId="+aci+"&leadNumber="+ldD,"mywindow","menubar=1,resizable=1,width=1150,height=500,top=70,left=20");
}
</script>


<style type="text/css">

.dataTables_wrapper .dataTable tbody td {
padding-left: 6px;

</style>


<!--One_Wrap-->
 	<div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span><h5>Manage Actionchart</h5></div>
            <div class="widget_body">
            	
                 
                
                
            </div>
            
          <div class="widget_body">
                <div class="demo_jui">  
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="jqtable">
                        <thead>
                            <tr>
                                <th width="49" align="left">Lead's </th>
                              <th width="162">Campaign <br/>(Client)</th>
                              <th width="112">Event Date</th>
                                <th width="93">Venue/City</th>
                                <th width="58">Stage</th>
                                <th width="107">Status/<br/>Dateline</th>
                                <th width="129">Updated By</th>
                                <th width="159">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php
$userIdforAction = $_COOKIE["user_id"];
$userTypeForLooggedIn = $_COOKIE["user_type"];
$usernameforLoggedIn = $_COOKIE["username"];

$SelQuery = "SELECT * FROM oxy2_action ORDER BY id DESC";
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
				
				$stage= $SelResult['stage'];
					
				$status= $SelResult['status'];
				
				if($status == "red"){$col1 = "red_highlight";}
				elseif($status == "yellow"){$col1 = "yellow_highlight";}
				else{$col1 = "green_highlight";}
				
				$actionChartId= $SelResult['id'];
				
				$leadNum= $SelResult['leadNum'];
				$department= $SelResult['department'];
				
				$completeLeadNumber= $department."/".$leadNum;
				
				$campaignName= $SelResult['campaignName'];
				$clientName= $SelResult['clientName'];
							
				$venue= $SelResult['venue'];
				$city= $SelResult['city'];
				
				$keyactId= $SelResult['keyact'];
				$getClientName = getClientDetails($keyactId);
				
				
				$eventDate= $SelResult['eventDate'];
				
				$progress= $SelResult['progress'];
				
				$updatedBy= $SelResult['updatedBy'];
				
				$updatedOn= $SelResult['updatedOn'];
				
				
					
				
				
?>                         
                            <tr class="<?php echo $col; ?>">
                                 <td align="left" style="background:none;"><a class="tip_north" original-title="<?php echo $progress; ?>" href="#" style="color:#6C6C6C;padding:0 5px;"><b style="font-weight:bold;"><?php echo $completeLeadNumber; ?></b></a></td>
                      <td align="center" style="text-align:center"><span ><?php echo $campaignName."<br/>(".$clientName.")"; ?></span></td>
                      <td align="center"><?php echo $eventDate; ?></td>
                      <td align="center"><?php echo $venue."/".$city; ?></td>
                      <td align="center"><span class="grey_highlight pj_cat"><?php echo $stage; ?></span></td>
                      <td align="center">
                      <span class="<?php echo $col1; ?> pj_cat">
					  <?php echo $status; ?>
                      </span>
                      <a href="viewActionChartDateLine.php?actionId=<?php echo $actionChartId; ?>&leadNumber=<?php echo $leadNum; ?>" id="gallery_box" style="text-decoration:none; font-weight:bold; color:#666;">[<?php echo getTotalDateline($actionChartId,$leadNum);?>]</a>
                      </td>
                        <td align="center"><?php echo $updatedBy."<br/>(".$updatedOn.")"; ?></td>
                        <td align="center"><span class="data_actions iconsweet"><a class="tip_north" original-title="View" href="./?id=3&subId=5&actionChartId=<?php echo $actionChartId; ?> " style="color:#6C6C6C;padding:0 1px;font-size:18px;">}</a> <a class="tip_north" original-title="Edit" href="./?id=3&subId=6&actionChartId=<?php echo $actionChartId; ?> "  style="color:#6C6C6C;padding:0 1px;font-size:18px;">C</a>
                         <a class="tip_north" original-title="Create DateLine - <?php echo getTotalDateline($actionChartId,$leadNum);?>" href="javascript: openwindow(<?php echo $actionChartId; ?>,<?php echo $leadNum;?>)"  style="color:#6C6C6C;padding:0 1px;font-size:18px;">R</a>

<?php if(getTotalop($actionChartId) > 0)
{?>                         
<a href="viewop.php?ldId=<?php echo $actionChartId; ?>" class="tip_north" id="gallery_box" original-title="Upload Operational Plan" style="color:#6C6C6C;padding:0 1px;font-size:18px;"><i class="fa fa-upload" aria-hidden="true"></i></a>
<?php }
else
{
?>
<a href="viewop.php?ldId=<?php echo $actionChartId; ?>" class="tip_north" id="gallery_box" original-title="Upload Operational Plan" style="color:#F00;padding:0 1px;font-size:18px;"><i class="fa fa-upload" aria-hidden="true"></i></a>
<?php } ?>  

<?php if($userTypeForLooggedIn == "1" && $usernameforLoggedIn == "Amit.Kr@batessercon.com"){ ?>
                      <a href="viewForActionDeletion.php?actionId=<?php echo $actionChartId; ?>" class="tip_north" id="gallery_box" original-title="Request for Action Chart Deletion" style="color:#F00;padding:0 1px;font-size:18px;">X</a>
                      <?php } ?>
                 </span></td>
                            </tr>
                            
<?php } }
				else
				{
				?>   
                
                <tr>
                  <td colspan="8" align="center" style="font-size:14px; font-weight:bold;">No record Found</td>
                       
                </tr>
                <?php } ?> 
                                            
                           
                        </tbody>
                    </table>
                    
                     
              </div>
            </div>      
            
        </div>
    </div>    
	
	<?php }else{
	
	echo "Access Not Allowed";
} ?>