
<style type="text/css">
.actionBar
{
display:none;
}

input[type="submit"]:hover {
background: #CCC;
color: #FFF;
}

</style>
<link rel="stylesheet" href="css/wizard.css" type="text/css" />


<link rel="stylesheet" href="css/main.css" />

<!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
<!--Javascript-->
<script type="text/javascript" src="js/jquery.min.js"> </script>


<script type="text/javascript" src="js/jquery.tipsy.js"> </script>

<script type="text/javascript" src="js/jquery.autogrowtextarea.js"></script>
<script type="text/javascript" src="js/jquery.ui.tabs.js"></script>

<script type="text/javascript" src="js/gcal.js"></script>

<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>



<script type="text/javascript" src="js/main.js"> </script>


<script language = "JavaScript">

function check()
{
	var numtest= /^[0-9]+$/;

	var emailtest=/^[a-zA-Z][\w\_\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
	
	
	if (document.form1.vendor.value=="")
	{
		alert("Please enter the Vendor.");
		document.form1.vendor.focus();
		return false;
	}
	
	if (document.form1.contactPerson.value=="")
	{
		alert("Please enter the Contact Person.");
		document.form1.contactPerson.focus();
		return false;
	}
	
	if (document.form1.zone.value=="")
	{
		alert("Please enter the Zone.");
		document.form1.zone.focus();
		return false;
	}
	if (document.form1.city.value=="")
	{
		alert("Please select the City.");
		document.form1.city.focus();
		return false;
	}
	
	if (document.form1.address.value=="")
	{
		alert("Please enter the Address.");
		document.form1.address.focus();
		return false;
	}
	
	
	
	if (document.form1.status.value=="")
	{
		alert("Please select the Status.");
		document.form1.status.focus();
		return false;
	}
	
	
	
	
	if (document.form1.category.value=="")
	{
		alert("Please select the Category.");
		document.form1.category.focus();
		return false;
	}
	
	if (document.form1.phoneNumber.value=="")
	{
		alert("Please enter the Phone Number.");
		document.form1.phoneNumber.focus();
		return false;
	}
	
	if(!(numtest.test(form1.phoneNumber.value)))
	{
	alert("Only Digits Required!");
	form1.phoneNumber.value = "";
	form1.phoneNumber.focus();
	return(false);
	}
	
	if (document.form1.mobileNumber.value=="")
	{
		alert("Please enter the Mobile Number.");
		document.form1.mobileNumber.focus();
		return false;
	}
	
	if(!(numtest.test(form1.mobileNumber.value)))
	{
	alert("Only Digits Required!");
	form1.mobileNumber.value = "";
	form1.mobileNumber.focus();
	return(false);
	}
	
	if (document.form1.email.value=="")
	{
		alert("Please enter the Email.");
		document.form1.email.focus();
		return false;
	}
	
	if(!(emailtest.test(form1.email.value)))
	{
	alert("Please enter valid email!");
	form1.email.value = "";
	form1.email.focus();
	return(false);
	}
	
	if (document.form1.pan.value=="")
	{
		alert("Please enter the Pan Card Detail.");
		document.form1.pan.focus();
		return false;
	}
	
	if (document.form1.currency.value=="")
	{
		alert("Please enter the Currency.");
		document.form1.currency.focus();
		return false;
	}
	
	if (document.form1.credit.value=="")
	{
		alert("Please select the Credit Days.");
		document.form1.credit.focus();
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
        	<h5>Add Vendor</h5></div>
            <div class="widget_body">
				<!--Form fields-->
               
               
               
               

<div class="content">
                
                
                    
                    <!-- START OF DEFAULT WIZARD -->
                    <form class="stdform stdform2" method="post" action="actionForVendor.php"  id="form1" name="form1" onSubmit="return check()">
                    <div id="wizard" class="wizard">
                    
                        <div id="wiz1step1" class="formwiz">
                        	<table style="width:100%">
                            
                             <tr>
                               <td> 
                              
<p><label>Vendor Name *</label><span class='field'><input type='text' name='vendor' id='vendor' class='longinput'/></span></p>                    	    
                                </td>
                                </tr>
                                
                                 <tr>
                               <td> 
                              
						<p><label>Contact Person *</label>
                        <span class='field'><input type='text' name='contactPerson' id='contactPerson' class='longinput'/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                                <td>
                                
                                <p>
                                    <label>Zone *</label>
                                    <span class="field">
                     <select name="zone" id="zone">
                                        <option value="" selected="selected">Choose Zone</option>
                                        <option value="New Delhi">New Delhi</option>
                                        <option value="Chennai">Chennai</option>
                                        <option value="Mumbai">Mumbai</option>
                                        <option value="Hyderabad">Hyderabad</option>
                                         <option value="Banglore">Banglore</option>
                                         <option value="Singapore">Singapore</option> 
                                        </select>
                           </span>
                                </p>
                               </td>
                               </tr> 
                             
                             
                             <tr>
                                <td>
                                
                                <p>
                                    <label>City *</label>
                                    <span class="field">
                       <select name="city" id="city">
                	    <option value="">Select City</option>
						<?php
                        $que="SELECT * FROM oxy2_city";
                        $res=mysqli_query($con,$que);
                        while($row=mysqli_fetch_array($res))
                        {
                        $city_name = $row['city_name'];
						$city_id = $row['city_id'];
                        echo "<option value='$city_id'>$city_name</option>";
                        }                        
                        ?>
               	      </select> 
                           </span>
                                </p>
                               </td>
                               </tr>
                               
                          <tr>
                               <td> 
                              
						<p><label>Address *</label>
                        <span class='field'><textarea class="auto" id="txtInput" name="address" cols="60" rows="4" ></textarea></span></p>                    	    
                                </td>
                                </tr>     
                               
                           <tr>
                                <td>
                                
                                <p>
                                    <label>Status *</label>
                                    <span class="field">
                       <select name="status" id="status">
                	    <option value="">Select Status</option>
						<option value="Contracted">Contracted</option>
                        <option value="Adhoc">Adhoc</option>
               	      </select> 
                           </span>
                                </p>
                               </td>
                               </tr>     
                            
                           
                            
                            
                                
                               
                                
                               <tr><td>                      
                                <p>
                                    <label>Category *</label>
                                    <span class="field">
                       <select name="category" id="category">
                	    <option value="">Select Category</option>
						<?php
                        $que="SELECT * FROM oxy2_category ";
                        $res=mysqli_query($con,$que);
                        while($row=mysqli_fetch_array($res))
                        {
                        $categoryId = $row['categoryId'];
						$categoryName = $row['categoryName'];
                        echo "<option value='$categoryId'>$categoryName</option>";
                        }                        
                        ?>
               	      </select> 
                           </span>
                                </p>
                               </td>
                               </tr>
                               
                               <tr>
                               <td> 
                              
						<p><label>Phone Number *</label>
                        <span class='field'><input type='text' name='phoneNumber' id='phoneNumber' class='longinput'/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
						<p><label>Mobile Number *</label>
                        <span class='field'><input type='text' name='mobileNumber' id='mobileNumber' class='longinput'/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
						<p><label>Fax *</label>
                        <span class='field'><input type='text' name='fax' id='fax' class='longinput'/></span></p>                    	    
                                </td>
                                </tr>
                                
                                
                                <tr>
                               <td> 
                              
						<p><label>Email *</label>
                        <span class='field'><input type='text' name='email' id='email' class='longinput'/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
						<p><label>Pancard *</label>
                        <span class='field'><input type='text' name='pan' id='pan' class='longinput'/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
						<p><label>Vat/Sat </label>
                        <span class='field'><input type='text' name='vat' id='vat' class='longinput'/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
						<p>
                        <label>Winfa Code</label>
                        <span class='field'><input type='text' name='vinfa' id='vinfa' class='longinput'/></span></p>                    	    
                                </td>
                                </tr>
                                
                                 
                                
                                

                                
                                 <tr>
                                <td>
                                
                                <p>
                                    <label>Currency *</label>
                                    <span class="field">
                      <select name="currency" id="currency">
                                <option value="" selected="selected">Select Currency 
                                  </option><option value="INR">INR</option>
                                    <option value="USD">USD</option>
                                    <option value="SING Dollar">SING Dollar</option>
                                                            </select>
                           </span>
                                </p>
                               </td>
                               </tr> 
                               
                               
                                <tr>
                                <td>
                                
                                <p>
                                    <label>Credit Limit*</label>
                                    <span class="field">
                      <select name="credit" id="credit">
                                  <option value="" selected="selected">Select Credit Limit</option>
                                  
       							 <?php for($limit=1;$limit<=365;$limit++){ ?>
                                 <option value="<?php echo $limit; ?>"><?php echo $limit; ?></option>
                                 <?php } ?>
                                </select> 
                           </span>
                                </p>
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
     
          
