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
width:850px;
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
$userId = $_REQUEST['userId'];                 
$SelQuery = "SELECT * FROM oxy2_users WHERE user_id = '$userId'";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				$emp_id= $SelResult['emp_id'];
				$user_type= $SelResult['user_type'];
				$userTypeName = getUserTypeName($user_type);
				
				$fname= $SelResult['fname'];
				$lname= $SelResult['lname'];
				$name = $fname." ".$lname;
				
				$gender= $SelResult['gender'];
				$doj= $SelResult['doj'];
				$dob= $SelResult['dob'];
				$job_title= $SelResult['job_title'];
				$emailid= $SelResult['emailid'];
				$alternateEmail= $SelResult['alternateEmail'];
				$branch= $SelResult['branch'];
				$address1= $SelResult['address1'];
				$phone= $SelResult['phone'];
				$landlineNumber= $SelResult['landlineNumber'];
				$city= $SelResult['city'];
				$created_on= $SelResult['created_on'];
				$modified_on= $SelResult['modified_on'];
				$modified_by= $SelResult['modified_by'];
				$dept= $SelResult['dept'];
				}
}
				
				
?>  


<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="82%"><span class="iconsweet">r</span><h5>View Manage User</h5></td>
    <td width="18%"><span class="iconsweet">r</span><h5><a data-toggle="modal" href="#myModal2" style="text-decoration:none;color:#9AA4A8" >View Action History</a>
    <!--<a href="./?id=3&subId=8&actionChartId=<?php echo $actionChartId; ?>" style="text-decoration:none;color:#9AA4A8" >View Action History</a>--></h5></td>
  </tr>
</table>
</div>
            <div class="widget_body">
				<!--Form fields-->
                <ul class="form_fields_container">
 
             
                    <li><label>Employee Id</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $emp_id; ?>" ></div></li>
                    
                     <li><label>User Type</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $userTypeName; ?>" ></div></li>
                     
                      <li><label>Department</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $dept; ?>" ></div></li>
                     
                      <li><label>Name</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $name; ?>" ></div></li>
                      
                       <li><label>Gender</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $gender; ?>" ></div></li>
                       
                        <li><label>Date Of Joining</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $doj; ?>" ></div></li>
                        
                         <li><label>Date Of Birth</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $dob; ?>" ></div></li>
                         
                          <li><label>Designation</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $job_title; ?>" ></div></li>
                          
                           <li><label>Email</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $emailid; ?>" ></div></li>
                           
                            <li><label>Alternate Email</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $alternateEmail; ?>" ></div></li>
                            
                             <li><label>Branch</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $branch; ?>" ></div></li>
                             
                              <li><label>Address</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $address1; ?>" ></div></li>
                              
                               <li><label>Mobile Number</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $phone; ?>" ></div></li>
                               
                                <li><label>Landline Number</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $landlineNumber; ?>" ></div></li>
                                
                                 <li><label>City</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $city; ?>" ></div></li>
                                 
                                  <li><label>Created On</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $created_on; ?>" ></div></li>
                                  
                                   <li><label>Modified On</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $modified_on; ?>" ></div></li>
                                   
                                   <li><label>Modified By</label> <div class="form_input"><input type="text" readonly="readonly" value="<?php echo $modified_by; ?>" ></div></li>
                                                                     
                                             
                                   
                </ul>
            </div>
        </div>
    </div>
                     
 	<br class="clear" />  
 <?php
$SelQuery = "SELECT * FROM oxy2_userslogs WHERE user_id = '$userId'";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);

while($SelResult = mysqli_fetch_array($SelExec))
{
$emp_id1	= $SelResult['emp_id'];
$fname1= $SelResult['fname'];
$lname1	= $SelResult['lname'];
$cName = $fname1." ".$lname1;
$gender1	= $SelResult['gender'];
}
?>
    
    <!--Modal Table Start-->
    <div class="modal hide" id="myModal2" >
    <div class="modal-header">
    <!--<a class="close" data-dismiss="modal">*</a>-->
    <h3>Employee name : <span style="font-size:13px;"><?php echo $cName." - ".$gender1; ?></span> </h3><br/>
    <h3>Employee Id : <span style="font-size:13px;"><?php echo $emp_id1; ?></span> </h3>
    
    </div>
    <div class="modal-body">
            <table class="activity_datatable" width="100%" border="0" cellspacing="0" cellpadding="8">
                               <tr>
                                <th width="12%" align="left">D.O.J</th>
                              <th width="12%">City</th>
                                <th width="14%">Mobile </th>
                                <th width="24%">Address</th>
                                <th width="22%">Department - Branch</th>
                                <th width="16%">Updated By</th>
                              
                            </tr>
<?php
$SelQueryForModal = "SELECT * FROM oxy2_userslogs WHERE user_id = '$userId'";
$SelExecForModal = mysqli_query($con,$SelQueryForModal);
if($cntt > 0){
				$i = 0;
				while($SelResultForModal = mysqli_fetch_array($SelExecForModal))
				{
				$i++;
				if($i % 2 == "0"){$col = "gradeA even";}
				else
				{$col = "gradeA odd";}
				
				$doj1= $SelResultForModal['doj'];
					
				$dept1= $SelResultForModal['dept'];
				
				if($dept1 == "B2B"){$col1 = "red_highlight";}
				elseif($dept1 == "B2C"){$col1 = "yellow_highlight";}
				else{$col1 = "green_highlight";}
				
				$city1= $SelResultForModal['city'];	
				$address1= $SelResultForModal['address1'];	
				$branch1= $SelResultForModal['branch'];	
				
				$phone1= $SelResultForModal['phone'];				
								
				$modified_by1= $SelResultForModal['modified_by'];
				
				$modified_on1= $SelResultForModal['modified_on'];
				
				
					
				
				
?>                         
                            <tr>
                      <td align="left"  style="text-align:justify"><b style="font-weight:bold;"><?php echo $doj1; ?></b></td>
                      <td align="center" style="text-align:justify"><span><?php echo $city1; ?></span></td>
                      <td align="center" style="text-align:justify"><?php echo $phone1; ?></td>
                      <td align="center" style="text-align:justify"><?php echo $address1; ?></td>
                      <td align="center"><span class="<?php echo $col1; ?> pj_cat"><?php echo $dept1." - ".$branch1; ?></span></td>
                      <td align="center"><?php echo $modified_by1."<br/>(".$modified_on1.")"; ?></td>
                      
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