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
$vendorId = $_REQUEST['vendorId'];                 
$SelQuery = "SELECT * FROM oxy2_vendor WHERE vendorId = '$vendorId'";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				
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
 
             
                    <li><label>Vendor Name</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $vendor; ?>" ></div></li>
                    
                     <li><label>Contact Person</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $contactPerson; ?>" ></div></li>
                     
                      <li><label>Zone</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $zone; ?>" ></div></li>
                      
                       <li><label>City</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $cityName; ?>" ></div></li>
                       
                        <li><label>Address</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $address; ?>" ></div></li>
                        
                         <li><label>Status</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $status; ?>" ></div></li>
                         
                          <li><label>Category</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $categoryName; ?>" ></div></li>
                          
                           <li><label>Phone Number</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $phoneNumber; ?>" ></div></li>
                           
                            <li><label>Mobile </label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $mobileNumber; ?>" ></div></li>
                            
                             <li><label>Fax</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $fax; ?>" ></div></li>
                             
                              <li><label>Email</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $email; ?>" ></div></li>
                              
                               <li><label>Pan card</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $pan; ?>" ></div></li>
                               
                                <li><label>Vat</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $vat; ?>" ></div></li>
                                
                                 <li><label>Vinfa</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $vinfa; ?>" ></div></li>
                                 
                                  <li><label>Currency</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $currency; ?>" ></div></li>
                                  
                                   <li><label>Credit</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $credit; ?>" ></div></li>
                                 
                                        
                                             
                                   
                </ul>
            </div>
        </div>
    </div>
                     
 	<br class="clear" />  
 