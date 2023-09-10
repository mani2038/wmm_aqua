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
                                <th width="94" align="left">Vendor Name</th>
                              <th width="86">Contact Name</th>
                              <th width="94">Category Name</th>
                                <th width="121">Mobile<br/>Email</th>
                                <th width="102">City<br/>Zone</th>
                                <th width="117">Pan<br/>Vinfa<br/>Vat</th>
                                <th width="67">Raise PO</th>
                                <th width="95">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php
$SelQuery = "SELECT * FROM oxy2_vendor";
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
				
				$vendorId= $SelResult['vendorId'];
				$vendor= $SelResult['vendor'];
				$contactPerson= $SelResult['contactPerson'];
				$zone= $SelResult['zone'];
				
				$city= $SelResult['city'];
				$cityDetails = getCityListDetails($city);
				$cityName = $cityDetails['0'];
				
				$address= $SelResult['address'];
				$status= $SelResult['status'];
				$category= $SelResult['category'];
				$phoneNumber= $SelResult['phoneNumber'];
				$mobileNumber= $SelResult['mobileNumber'];
				$fax= $SelResult['fax'];
				$email= $SelResult['email'];
				$pan= $SelResult['pan'];
				$vat= $SelResult['vat'];
				$vinfa= $SelResult['vinfa'];
				$currency= $SelResult['currency'];
				$credit= $SelResult['credit'];
				$getCategorygetCategoryListDetails = getCategoryListDetails($category);
				$categoryName = $getCategorygetCategoryListDetails['1'];
				
?>                         
                            <tr class="<?php echo $col; ?>">
                                 <td align="left" style="background:none;">
                                 <?php echo $vendor; ?>&nbsp;
								 
                                 </td>
                                 
                      <td align="center"><?php echo $contactPerson; ?></td>
                      
                      <td align="center"><?php echo $categoryName; ?></td>
                      
                      <td align="center"><?php echo $mobileNumber."<br/>".$email; ?></td>
                      
                      <td align="center"><span><?php echo $cityName."<br/>".$zone; ?></span></td>
                      
                      <td align="center"><?php echo $pan."<br/>".$vinfa."<br/>".$vat; ?></span></td>
                      <td align="center"><span class="data_actions iconsweet">
                     
                     <?php 
					 if(getCountForItem($vendorId) > 0){
					 $sts = "style='color:#6C6C6C;padding:0 2px;font-size:18px;'";
					 $link = "href='./?id=6&subId=7&vendorId=$vendorId'";
					 $t = "Raise PO";
					 }
					 else
					 {
						 $sts = "style='color:red;padding:0 2px;font-size:18px;'";
						 $link = "";
						 $t = "No Item assigned";
					 }
					 
					 ?>
                     
                     
                        <a class="tip_north" original-title="<?php echo $t; ?>" <?php echo $link; ?> <?php echo $sts; ?> >E</a>
                   
                      </span></td>
                      <td align="center"><span class="data_actions iconsweet">
                      <a class="tip_north" original-title="View Vendor Detail" href="./?id=6&subId=5&vendorId=<?php echo $vendorId;?>" style="color:#6C6C6C;padding:0 2px;font-size:18px;">}</a> 
                      <a class="tip_north" original-title="Edit Vendor Detail" href="./?id=6&subId=6&vendorId=<?php echo $vendorId;?>" style="color:#6C6C6C;padding:0 2px;font-size:18px;">C</a>
                       <a class="tip_north" original-title="Assign Item" href="javascript: openwindow(<?php echo $vendorId; ?>)" style="color:#6C6C6C;padding:0 2px;font-size:18px;">P</a>
                                          
                      <!--<div id="invoiceee">
<a href="javascript: openwindow(<?php echo $vendorId; ?>)" class="magentaBtn button_sm" style="margin:5px;">Add Item</a>
</div>-->
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