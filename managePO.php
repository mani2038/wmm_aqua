


<script type="text/javascript">

function openwindow(vendorId)
{
	window.open("addItemsToVendor.php?vendorId="+vendorId,"mywindow","menubar=1,resizable=1,width=700,height=300,top=70,left=20");
}
</script>

<style type="text/css">


.button_sm {
cursor: pointer;
font-family: Arial,Helvetica,sans-serif;
font-size: 11px;
font-weight: bold;
line-height: 7px;
padding: 5px 0px 5px;
text-transform: uppercase;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
margin-left: 5px;
text-decoration: none;
font-size: 11px;
display: inline-block;
}

td{
	font-size:11px;
}
</style>
<?php include_once('commonFunction.php');
include_once('inc_connection.php');
?>

<!--One_Wrap-->
 	<div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span><h5>Manage Vendor</h5></div>
            <div class="widget_body">
            	
                 
                
                
            </div>
            
          <div class="widget_body">
                <div class="demo_jui">  
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="jqtable">
                        <thead>
                            <tr>
                                <th width="75" align="left">PurchaseId</th>
                              <th width="81">Vendor Id</th>
                              <th width="96">Vendor Name</th>
                                <th width="88">Lead No.</th>
                                <th width="117">Delivery Date</th>
                                <th width="106">Raised By</th>
                                <th width="112">Raise On</th>
                                <th width="170">Status</th>
                                <th width="55">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php
$SelQuery = "SELECT * FROM oxy2_raise_povendor ";
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
				
				$id= $SelResult['id'];
				$vendorId= $SelResult['vendorId'];
				$leadNumber= $SelResult['leadNumber'];
				$category= $SelResult['category'];
				$vendor= $SelResult['vendor'];
				$contactPerson= $SelResult['contactPerson'];
				$city= $SelResult['city'];
				$telephone= $SelResult['telephone'];
				$fax= $SelResult['fax'];
				$email= $SelResult['email'];
				$quotationRef= $SelResult['quotationRef'];
				$deliveryDate= $SelResult['deliveryDate'];
				$deliveryInstruction= $SelResult['deliveryInstruction'];
				$remarks= $SelResult['remarks'];
				$year= $SelResult['year'];
				$month= $SelResult['month'];
				$raisePoId= $SelResult['raisePoId'];
				$dateAdded= $SelResult['dateAdded'];
				$orderBy= $SelResult['orderBy'];
				
				$status= $SelResult['status1'];
				
				$getPOAprovalcount = getPOAprovalcount($raisePoId);
				
				$getPODisapprovalcount = getPODisapprovalcount($raisePoId);
				
				
				/*if($status == "0"){$st = "Pending";}
				else if($status == "1"){$st = "Approved";}
				else{$st = "Disapproved";}*/
				
				$approvedBy= $SelResult['approvedBy'];
				if(empty($approvedBy)){$ap = "Hold";}
				else {$ap = $approvedBy;}
				
				$getVendorDetails = getVendorDetails($vendorId);
				$vendorName = $getVendorDetails['1'];
				
				
?>                         
                            <tr class="<?php echo $col; ?>">
                                 <td align="left" style="background:none;">
                                 <a href="./?id=6&subId=10&raisePoId=<?php echo base64_encode($raisePoId); ?>" style=" color:#F00;"><?php echo "SERCON/DEL/".$month."/".$year."/".$id; ?></a>
								 
                                 </td>
                                 
                      <td align="center"><?php echo "VD".$vendorId; ?></td>
                      
                      <td align="center"><?php echo $vendorName; ?></td>
                      
                      <td align="center"><?php echo $leadNumber; ?></td>
                      
                      <td align="center"><span><?php echo $deliveryDate; ?></span></td>
                      
                      <td align="center"><?php echo $orderBy; ?></span></td>
                      <td align="center"><?php echo $dateAdded; ?></td>
                      
                     <td align="center"><?php 
					 if($getPOAprovalcount !='0' || $getPODisapprovalcount !='0'){?>
						
                        Approved <a href="viewApprovedPeople.php?raisePoId=<?php echo $raisePoId; ?>" id="gallery_box" style="text-decoration:none; font-weight:bold; color:#666;"> [<?php echo $getPOAprovalcount;?>]</a>
                        
                        Disapproved  <a href="viewDisapprovedPeople.php?raisePoId=<?php echo $raisePoId; ?>" id="gallery_box" style="text-decoration:none; font-weight:bold; color:#666;">[<?php echo $getPODisapprovalcount;?>]</a>
                        
						
						<?php }
						else
						{
							echo "Hold";
						}
					 
					 
					 ?></td>
                    <td align="center">
                    <span class="data_actions iconsweet">
                    <a href="viewForPoDeletion.php?raisePoId=<?php echo base64_encode($raisePoId); ?>" class="tip_north" id="gallery_box" original-title="Approval or Disapprove PO" style="color:#F00;padding:0 1px;font-size:18px;">k</a></span>
                    </td>
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