<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
function ajaxCall2(t,status,upd){
   
	var datas_tw  = "twittId=" + t + "&" +"stat=" + status + "&" +"upda=" + upd;
	
	$.ajax({
      url: "recipientStatusUpdate.php",
      type: "POST",
      data: datas_tw,
	  cache: false,
      success: function(server_response){
	 
	   	if(server_response == "2"){
		$("#bg"+t).attr('src',"icons/disapprove.png");
		
		}
		else{
		$("#bg"+t).attr('src',"icons/approve.png");
		
		}
		
      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
	  alert("error");
          
      }
    });
		
}

</script> 

<?php include_once('commonFunction.php'); 
$userIdforAction = $_COOKIE["user_id"];
?>
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
    <h5>Manage PNL</h5>
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
                              <th width="166">Event Date</th>
                              <th width="131">PNL Status</th>
                              <th width="105">PNL Activity</th>
                              <th width="120">Updated By</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php

$SelQuery = "SELECT * FROM oxy_pnl_retail ORDER BY id DESC";
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
				$leadno= $SelResult['leadId'];
				$getTableDetails = getTableDetails('oxy2_lead','leadno',$leadno);
				
				$companyname= $getTableDetails['2'];
				$clientNamee = getClientListDetails($companyname);
				$clientName = $clientNamee['0'];
				
				$dept= $getTableDetails['3'];
				$leadname= $getTableDetails['32'];
				
				//Department Wise Data
				//B2B
				$lgs= $getTableDetails['20'];
				$beventStartDate= $getTableDetails['21'];
				$beventEndDate= $getTableDetails['22'];
				
				//B2C
				$ceventStartDate= $getTableDetails['27'];
				$ceventEndDate= $getTableDetails['28'];
												
				
				if($dept == "B2B"){$eventDateee = $beventStartDate;$col11 = "red_highlight";}
				else if($dept == "B2C"){$eventDateee = $ceventStartDate;$col11 = "green_highlight";}
				else{$eventDateee = "No date";$col11 = "blue_highlight";}
				
				
				$status= $SelResult['status'];
				$leadStatus= $SelResult['leadStatus'];
				$leadApprovedBy= $SelResult['leadApprovedBy'];
				$leadApprovedOn= $SelResult['leadApprovedOn'];
				$dateAdded= $SelResult['dateAdded'];
				$getTableDetails1 = getTableDetails('oxy2_users','user_id',$leadApprovedBy);				
				$uname= $getTableDetails1['6']." ".$getTableDetails1['7'];
				
				$pnlFileName= $SelResult['pnlFileName'];
				
				if($leadStatus == "0"){

					$img1 = "pending.png";

					$textName1 = "Pending Review";

					}

					elseif($leadStatus == "2"){

					$img1 = "disapprove.png";

					$textName1 = "Disapproved";

					}

					elseif($leadStatus == "1"){

					$img1 = "approve.png";

					$textName1 = "Approved";

					}

					else{

					$img1 = "pending.png";

					$textName1 = "Pending Review";

					}
				
?>                         
                            <tr class="<?php echo $col; ?>"><input type="hidden" id="uu<?php echo $id; ?>" value="<?php echo $id; ?>" />
                                 <td align="left" style="background:none;"><a class="tip_north" href="#" style="color:#6C6C6C;padding:0 5px;text-decoration:none;"><b style="font-weight:bold;"><?php echo $clientName; ?></b></a></td>
                      <td align="center"><span ><?php echo $leadno; ?></span><span style=" color:#F00;font-size:9px; position:relative;top:-11px;">AC(<?php echo getCountForLead($leadno,$dept); ?>)</span></td>
                      <td align="center"><span class="<?php echo $col11; ?> pj_cat"><?php echo $dept;?></span></td>
                     <td align="center"><?php echo $leadname;?></td>
                     <td align="center"><?php echo $eventDateee;?></td>
                     <td align="center">
                     	
                        <img src="icons/<?php echo $img1; ?>" id="bg<?php echo $id; ?>" alt="<?php echo $idd; ?>" width="20" height="20"/> <a href="uploadpnl/<?php echo $pnlFileName; ?>">
                        <img src="icons/1359994522_pdf.png" title="Download PNL File" width="20" height="20"/></a> 
                        <br/>
                        <?php echo $textName1; ?>
                                                         
                     </td>
                     <td align="center">
                      
                     <a style="text-decoration:none;" href="#" id="t" title="Click to make paid user" class="Rlink<?php echo $id; ?>" onclick="ajaxCall2(document.getElementById('uu<?php echo $id; ?>').value,1,<?php echo $userIdforAction; ?>); return false;" >
                     <img src="icons/Approve-256.png" alt="Approve" width="20" height="20" border="0" class="sprittt" /></a>
                     
                    <a style="text-decoration:none;" href="#" id="t" title="Click to make unpaid user" class="Rlink<?php echo $id; ?>" onclick="ajaxCall2(document.getElementById('uu<?php echo $id; ?>').value,2,<?php echo $userIdforAction; ?>); return false;" >
                    <img src="icons/Disapprove-256.png" alt="Disapprove" width="20" height="20" border="0"  class="sprittt"/>
                    </a>
                     
                     </td>
                     <td align="center"><?php echo $uname."<br/>".$leadApprovedOn; ?></td>
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