<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	           
          
          <div class="widget_title"><table width="100%" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td width="89%"><span class="iconsweet">r</span>
        	<h5>Manage Category</h5></td>
    <td width="11%" align="left"><h5><a href="addCategory.php" id="gallery_box" style="text-decoration:none; font-weight:bold;color:#9aa4a8;">Add Category</a></h5></td>
  </tr>
</table>
</div>
          
           <!-- Table Start -->
                  
                    <div class="demo_jui">  
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="display" id="jqtable">
                        <thead>
                            <tr>
                                <th width="181" align="left">Category Name</th>
                              <th width="512">Category Details</th>
                              <th width="127">Date Added</th>
                              <th width="73">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php

$SelQuery = "SELECT * FROM oxy2_category WHERE status = '0'";
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
				
				
				$categoryId= $SelResult['categoryId'];
				$categoryName= $SelResult['categoryName'];
				$categoryDetails= $SelResult['categoryDetails'];
				$dateAdded= $SelResult['dateAdded'];
				
				
			
				
?>                         
                            <tr class="<?php echo $col; ?>">
                                 <td align="left" style="background:none;"><a class="tip_north" href="#" style="color:#6C6C6C;padding:0 5px;text-decoration:none;"><b style="font-weight:bold;"><?php echo $categoryName; ?></b></a></td>
                      <td align="center" style="text-align:justify;"><?php echo $categoryDetails; ?></td>
                      <td align="center"><?php echo $dateAdded; ?></td>
                     <td align="center"><span class="data_actions iconsweet">
                    <!-- <a class="tip_north" original-title="View" href="./?id=2&subId=13&ldnumber=<?php echo $leadno; ?>&dep=<?php echo $dept;?> " style="color:#6C6C6C;padding:0 2px;font-size:18px;">}</a>--> 
                     
                                        
                     <a id="gallery_box" original-title="Edit Category" href="editCategory.php?categoryId=<?php echo $categoryId; ?>"  style="color:#6C6C6C;padding:0 2px;font-size:18px;" class="tip_north" >C</a>
                    
                     <!--<a href="viewForLeadDeletion.php?leadId=<?php echo $lid; ?>&show=<?php echo getCountForLead($leadno,$dept); ?>" class="tip_north" id="gallery_box" original-title="Request for Lead Deletion" style="color:#F00;padding:0 1px;font-size:18px;">X</a>
-->
                     </span></td>
                            </tr>
                            
<?php } }
				else
				{
				?>   
                
                <tr>
                  <td align="center" style="font-size:14px; font-weight:bold;">No record Found</td>
                       
                </tr>
                <?php } ?> 
                                            
                           
                        </tbody>
                    </table>
                    
                     
              </div>
                   
                    
                     <!--Ended -->
          
          
          
          
        </div>
    </div>
                      
	<!--One_TWO-->
 	
 	<br class="clear" />    
     
          
