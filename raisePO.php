<?php
include_once('inc_connection.php');
include_once('commonFunction.php');

?>





<style type="text/css">
.actionBar
{
display:none;
}

input[type="submit"]:hover {
background: #CCC;
color: #FFF;
}

div.selector{
	position:absolute;
	top:-15px;

}

#fancybox-outer{
border:6px solid black;
border-radius:4px;
}
</style>



<link rel="stylesheet" href="css/wizard.css" type="text/css" />


<link rel="stylesheet" href="css/main.css" />

<!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
<!--Javascript-->

<!-- Jquery Calender Script -->

	
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
  
    <script>
    $(function() {
        $( "#datepicker" ).datepicker();
		});
    </script>

<!-- Calender Script Ended -->


<script language = "JavaScript">

function check()
{
	var numtest= /^[0-9]+$/;

	var emailtest=/^[a-zA-Z][\w\_\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
	
	
	if (document.form1.leadNumber.value=="")
	{
		alert("Please enter the Lead Number.");
		document.form1.leadNumber.focus();
		return false;
	}
	
	
	if (document.form1.quotationRef.value=="")
	{
		alert("Please enter the Question Reference.");
		document.form1.quotationRef.focus();
		return false;
	}
	if (document.form1.deliveryDate.value=="")
	{
		alert("Please enter the Delivery Date.");
		document.form1.deliveryDate.focus();
		return false;
	}
	
	if (document.form1.deliveryInstruction.value=="")
	{
		alert("Please enter the Delivery Instruction.");
		document.form1.deliveryInstruction.focus();
		return false;
	}
	
	
	
	if (document.form1.remarks.value=="")
	{
		alert("Please enter the Remarks.");
		document.form1.remarks.focus();
		return false;
	}
	
	
//----------------------------------------------------------------------------------------------------

	return true;
}

</script>







        
<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span>
        	<h5>Raise PO</h5></div>
            <div class="widget_body">
				<!--Form fields-->
               
               
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
				
				$cityId= $SelResult['city'];
				$cityDetails = getCityListDetails($cityId);
				$cityName = $cityDetails['0'];
				
				$address= $SelResult['address'];
				$status= $SelResult['status'];
				
				$categoryId= $SelResult['category'];
				$getCategorygetCategoryListDetails = getCategoryListDetails($categoryId);
				$categoryName = $getCategorygetCategoryListDetails['1'];
				
				$phoneNumber= $SelResult['phoneNumber'];
				$fax= $SelResult['fax'];
				$email= $SelResult['email'];
				
				
				
				
				
				
				}
}
				
				
?>              
               

<div class="content">
                
                
                    
                    <!-- START OF DEFAULT WIZARD -->
                    <form class="stdform stdform2" method="post" action="actionForRaisePo.php"  id="form1" name="form1" onSubmit="return check()">
                    
                    <input type='hidden' name='vendorId' id='vendorId' class='longinput' value="<?php echo $vendorId; ?>" readonly="readonly"/>
                     <input type='hidden' name='categoryId' id='categoryId' class='longinput' value="<?php echo $categoryId; ?>" readonly="readonly"/>
                    
                    <div id="wizard" class="wizard">
                    
                        <div id="wiz1step1" class="formwiz">
                        	<table style="width:100%">
                            
                            
                                
                                <tr>
                                <td>
                                
                                <p>
                                    <label>Lead Number *</label>
                                    <span class="field">
                    <select name="leadNumber">
                	    <option value="">Select Lead Number</option>
                	    <?php
                        $que="SELECT * FROM oxy2_lead";
                        $res=mysqli_query($con,$que);
                        while($row=mysqli_fetch_array($res))
                        {
							$deptOfLead = $row['dept'];
							$leadnoOfLead = $row['leadno'];
							$com = "Sercon/".$deptOfLead."/".$leadnoOfLead;
                        echo "<option value='$com'>$com</option>";
                        }                        
                        ?>
                                             
                	</select>
                           </span>
                                </p>
                               </td>
                               </tr> 
                               
                                  <tr>
                               <td> 
                              
						<p><label>Category *</label>
                        <span class='field'><input type='text' name='category' id='category' class='longinput' value="<?php echo $categoryName; ?>" readonly="readonly"/></span></p>                    	    
                                </td>
                                </tr>  
                                
                                
                          <tr>
                               <td> 
                              
						<p><label>Vendor</label>
                        <span class='field'><input type='text' name='vendor' id='vendor' class='longinput' value="<?php echo $vendor; ?>" readonly="readonly"/></span></p>                    	    
                                </td>
                                </tr>
                                
                          <tr>
                               <td> 
                              
						<p><label>Contact Person</label>
                        <span class='field'><input type='text' name='contactPerson' id='contactPerson' class='longinput' value="<?php echo $contactPerson; ?>" readonly="readonly"/></span></p>                    	    
                                </td>
                                </tr> 
                                
                                
                           <tr>
                               <td> 
                              
						<p><label>City</label>
                        <span class='field'><input type='text' name='city' id='city' class='longinput' value="<?php echo $cityName; ?>" readonly="readonly"/></span></p>                    	    
                                </td>
                                </tr>    
                                
                            <tr>
                               <td> 
                              
						<p><label>Telephone</label>
                        <span class='field'><input type='text' name='telephone' id='telephone' class='longinput' value="<?php echo $phoneNumber; ?>" readonly="readonly"/></span></p>                    	    
                                </td>
                                </tr>    
                                
                                
                           <tr>
                               <td> 
                              
						<p><label>Fax</label>
                        <span class='field'><input type='text' name='fax' id='fax' class='longinput' value="<?php echo $fax; ?>" readonly="readonly"/></span></p>                    	    
                                </td>
                                </tr>    
                                
                                
                            <tr>
                               <td> 
                              
						<p><label>Email</label>
                        <span class='field'><input type='text' name='email' id='email' class='longinput' value="<?php echo $email; ?>" readonly="readonly"/></span></p>                    	    
                                </td>
                                </tr>   
                                
                             <tr>
                               <td> 
                              
						<p><label>Quotation Ref *</label>
                        <span class='field'><input type='text' name='quotationRef' id='quotationRef' class='longinput' /></span></p>                    	    
                                </td>
                                </tr> 
                                
                                
                             <tr>
                               <td> 
                              
						<p><label>Delivery Date *</label>
                        <span class='field'><input type='text' name='deliveryDate' id='datepicker' class='smallinput'>&nbsp;(MM/DD/YYYY)</span></p>                    	    
                                </td>
                                </tr>         
                                                              
                               
                          <tr>
                               <td> 
                              
						<p><label>Delivery Instruction *</label>
                        <span class='field'><textarea class="auto" id="txtInput" name="deliveryInstruction" cols="60" rows="4" ></textarea></span></p>                    	    
                                </td>
                                </tr>  
                                
                                
                            <tr>
                               <td> 
                              
						<p><label>Remarks *</label>
                        <span class='field'><input type='text' name='remarks' id='remarks' class='longinput' /></span></p>                    	    
                                </td>
                                </tr>         
                               
                                
                                <tr>
                               <td> 
                              


<p>

<span class='field'><input type='submit' name='submit' id='submit' value="Submit"/></span></p>                    	    
                                </td>
                                </tr>
                                </table>
                                
                              
                                
                        	
                            
                        </div><!--#wiz1step1-->
                        
                       
                        
                    </div><!--#wizard-->
                    </form>
                    <!-- END OF DEFAULT WIZARD -->
                    
                    
                    <br clear="all" /><br /><br />
                    
                  
                    
                   
                    
                    
                   
                    
                </div>
               
               
               
               
               
            </div>
        </div>
    </div>
                      
	<!--One_TWO-->
 	
 	<br class="clear" />    
    

     
          
