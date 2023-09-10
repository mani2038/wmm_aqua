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
background:#060;
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
background: #F00;
}

tr.odd.gradeA td.sorting_1 {
background-color: none;
}
tr.odd td.sorting_1 {
background-color: none;
}
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
                              <th width="85">Campaign <br/>(Client)</th>
                              <th width="95">Event Date</th>
                                <th width="77">Venue/City</th>
                                <th width="65">Key account</th>
                                <th width="42">Stage</th>
                                <th width="47">Status</th>
                                <th width="108">Updated By</th>
                                <th width="100">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php
$userIdforAction = $_COOKIE["user_id"];
$SelQuery = "SELECT * FROM oxy2_action ORDER BY id DESC";
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
                                 <td align="left"><a class="tip_north" original-title="<?php echo $progress; ?>" href="#" style="color:#6C6C6C;padding:0 5px;"><b style="font-weight:bold;"><?php echo $completeLeadNumber; ?></b></a></td>
                      <td align="center"><span ><?php echo $campaignName."<br/>(".$clientName.")"; ?></span></td>
                      <td align="center"><?php echo $eventDate; ?></td>
                      <td align="center"><?php echo $venue."/".$city; ?></td>
                      <td align="center"><span><?php echo $getClientName['0']; ?></span></td>
                      <td align="center"><span class="grey_highlight pj_cat"><?php echo $stage; ?></span></td>
                      <td align="center"><span class="<?php echo $col1; ?> pj_cat"><?php echo $status; ?></span></td>
                        <td align="center"><?php echo $updatedBy."<br/>(".$updatedOn.")"; ?></td>
                        <td align="center"><span class="data_actions iconsweet"><a class="tip_north" original-title="View" href="./?id=3&subId=5&actionChartId=<?php echo $actionChartId; ?> " style="color:#6C6C6C;padding:0 2px;font-size:18px;">}</a> <a class="tip_north" original-title="Edit" href="./?id=3&subId=6&actionChartId=<?php echo $actionChartId; ?> "  style="color:#6C6C6C;padding:0 2px;font-size:18px;">C</a> 						<a class="tip_north" original-title="Delete" href="#"  style="color:#6C6C6C;padding:0 2px;font-size:18px;color:#FA3A3A">X</a></span></td>
                            </tr>
                            
<?php } }
				else
				{
				?>   
                
                <tr>
                  <td colspan="9" align="center" style="font-size:14px; font-weight:bold;">No record Found</td>
                       
                </tr>
                <?php } ?> 
                                            
                           
                        </tbody>
                    </table>
                    
                     
              </div>
            </div>      
            
        </div>
    </div>    