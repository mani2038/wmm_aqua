
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

<!-- UPdating the Section -->

<?php 
if(isset($_POST['vendor']) && $_POST['vendor']!='')
{
	
$vendorIdd = $_POST['vendorIdd'];
$vendor = $_POST['vendor'];
$contactPerson = $_POST['contactPerson'];
$zone = $_POST['zone'];
$city = $_POST['city'];
$address = $_POST['address'];
$status = $_POST['status'];
$category = $_POST['category'];
$phoneNumber = $_POST['phoneNumber'];
$mobileNumber = $_POST['mobileNumber'];
$fax = $_POST['fax'];
$email = $_POST['email'];
$pan = $_POST['pan'];
$vat = $_POST['vat'];
$vinfa = $_POST['vinfa'];
$currency = $_POST['currency'];
$credit = $_POST['credit'];

$sql1="UPDATE oxy2_vendor SET vendor = '$vendor',contactPerson='$contactPerson',zone='$zone',city='$city',address='$address',status='$status',category='$category',phoneNumber='$phoneNumber',mobileNumber='$mobileNumber',fax='$fax',email='$email',pan='$pan',vat='$vat',vinfa='$vinfa',currency='$currency',credit='$credit' WHERE vendorId='$vendorIdd'";
$result = mysql_query($sql1);

$resultForLog = mysql_query($sqlForLog);

header("location:.?id=6&subId=4");
}
?>


<!-- Ended -->


<!-- Editing the section -->
<?php  
include_once('inc_connection.php');
$vendorId = $_REQUEST['vendorId'];

$SelQuery = "SELECT * FROM oxy2_vendor WHERE vendorId = '$vendorId'";
$SelExec = mysql_query($SelQuery);
$cntt = mysql_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysql_fetch_array($SelExec))
				{

				$vendorId= $SelResult['vendorId'];
				$vendor= $SelResult['vendor'];
				$contactPerson= $SelResult['contactPerson'];
				$zone= $SelResult['zone'];
				$city= $SelResult['city'];
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
				
				
				
				}
}
				
				
?>  





        
<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span>
        	<h5>Edit Vendor</h5></div>
            <div class="widget_body">
				<!--Form fields-->
               
               
               
               

<div class="content">
                
                
                    
                    <!-- START OF DEFAULT WIZARD -->
                    <form class="stdform stdform2" method="post" action="#"  id="form1" name="form1" onSubmit="return check()">
                    <input type='hidden' name='vendorIdd' id='vendorIdd' class='longinput' value="<?php echo $vendorId; ?>"/>
                    <div id="wizard" class="wizard">
                    
                        <div id="wiz1step1" class="formwiz">
                        	<table style="width:100%">
                            
                             <tr>
                               <td> 
                              
<p><label>Vendor Name *</label><span class='field'><input type='text' name='vendor' id='vendor' class='longinput' value="<?php echo $vendor; ?>"/></span></p>                    	    
                                </td>
                                </tr>
                                
                                 <tr>
                               <td> 
                              
						<p><label>Contact Person *</label>
                        <span class='field'><input type='text' name='contactPerson' id='contactPerson' class='longinput' value="<?php echo $contactPerson; ?>"/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                                <td>
                                
                                <p>
                                    <label>Zone *</label>
                                    <span class="field">
                     <select name="zone" id="zone">
                                        <option value="" selected="selected">Choose Zone</option>
                                        <option value="New Delhi" <?php if($zone == "New Delhi"){echo "Selected = selected";} ?>>New Delhi</option>
                                        <option value="Chennai" <?php if($zone == "Chennai"){echo "Selected = selected";} ?>>Chennai</option>
                                        <option value="Mumbai" <?php if($zone == "Mumbai"){echo "Selected = selected";} ?>>Mumbai</option>
                                        <option value="Hyderabad" <?php if($zone == "Hyderabad"){echo "Selected = selected";} ?>>Hyderabad</option>
                                         <option value="Banglore" <?php if($zone == "Banglore"){echo "Selected = selected";} ?>>Banglore</option>
                                         <option value="Singapore" <?php if($zone == "Singapore"){echo "Selected = selected";} ?>>Singapore</option> 
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
                        $res=mysql_query($que);
                        while($row=mysql_fetch_array($res))
                        {
                        $city_name = $row[city_name];
						$city_id = $row[city_id];
                        if($city == $city_id){$city_sel = "selected = selected";}else{$city_sel = "";}
                        echo "<option value='$city_id' $city_sel>$city_name</option>";
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
                        <span class='field'><textarea class="auto" id="txtInput" name="address" cols="60" rows="4" ><?php echo $address; ?></textarea></span></p>                    	    
                                </td>
                                </tr>     
                               
                           <tr>
                                <td>
                                
                                <p>
                                    <label>Status *</label>
                                    <span class="field">
                       <select name="status" id="status">
                	    <option value="">Select Status</option>
						<option value="Contracted" <?php if($status == "Contracted"){echo "Selected = selected";} ?>>Contracted</option>
                        <option value="Adhoc" <?php if($status == "Adhoc"){echo "Selected = selected";} ?>>Adhoc</option>
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
                        $res=mysql_query($que);
                        while($row=mysql_fetch_array($res))
                        {
                        $categoryId = $row[categoryId];
						$categoryName = $row[categoryName];
                        if($category == $categoryId){$city_sel = "selected = selected";}else{$city_sel = "";}
                        echo "<option value='$categoryId' $city_sel>$categoryName</option>";
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
                        <span class='field'><input type='text' name='phoneNumber' id='phoneNumber' class='longinput' value="<?php echo $phoneNumber; ?>"/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
						<p><label>Mobile Number *</label>
                        <span class='field'><input type='text' name='mobileNumber' id='mobileNumber' class='longinput' value="<?php echo $mobileNumber; ?>"/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
						<p><label>Fax *</label>
                        <span class='field'><input type='text' name='fax' id='fax' class='longinput' value="<?php echo $fax; ?>"/></span></p>                    	    
                                </td>
                                </tr>
                                
                                
                                <tr>
                               <td> 
                              
						<p><label>Email *</label>
                        <span class='field'><input type='text' name='email' id='email' class='longinput' value="<?php echo $email; ?>"/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
						<p><label>Pancard *</label>
                        <span class='field'><input type='text' name='pan' id='pan' class='longinput' value="<?php echo $pan; ?>"/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
						<p><label>Vat/Sat </label>
                        <span class='field'><input type='text' name='vat' id='vat' class='longinput' value="<?php echo $vat; ?>"/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
						<p>
                        <label>Winfa Code</label>
                        <span class='field'><input type='text' name='vinfa' id='vinfa' class='longinput' value="<?php echo $vinfa; ?>"/></span></p>                    	    
                                </td>
                                </tr>
                                
                                 
                                
                                

                                
                                 <tr>
                                <td>
                                
                                <p>
                                    <label>Currency *</label>
                                    <span class="field">
                      <select name="currency" id="currency">
                                <option value="" selected="selected">Select Currency 
                                  </option><option value="INR" <?php if($currency == "INR"){echo "Selected = selected";} ?>>INR</option>
                                    <option value="USD" <?php if($currency == "USD"){echo "Selected = selected";} ?>>USD</option>
                                    <option value="SING Dollar" <?php if($currency == "SING Dollar"){echo "Selected = selected";} ?>>SING Dollar</option>
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
                                  
       							 <?php for($limit=1;$limit<=365;$limit++){ 
								 if($credit == $limit){$city_sel = "selected = selected";}else{$city_sel = "";}
                        echo "<option value='$limit' $city_sel>$limit</option>";
						} ?>
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
     
          
