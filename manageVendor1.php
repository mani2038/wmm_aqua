
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

<!-- Including the City change on Region Select -->

<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script language = "JavaScript" src="onCityChangeGetVendor.js"></script>

<!-- Including the City change on Region Select -->



<script language = "JavaScript">

function check()
{
	var numtest= /^[0-9]+$/;

	var emailtest=/^[a-zA-Z][\w\_\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
	
	
	if (document.form1.city.value=="")
	{
		alert("Please select the City.");
		document.form1.city.focus();
		return false;
	}
	
	if (document.form1.vendor.value=="")
	{
		alert("Please select the Vendor.");
		document.form1.vendor.focus();
		return false;
	}
	
	if (document.form1.noi.value=="")
	{
		alert("Please select the Number of Items.");
		document.form1.noi.focus();
		return false;
	}
	
	if (document.form1.itemName.value=="")
	{
		alert("Please select the Name of Item.");
		document.form1.itemName.focus();
		return false;
	}
	
	if (document.form1.rate.value=="")
	{
		alert("Please enter the Rate.");
		document.form1.rate.focus();
		return false;
	}
	
	if (document.form1.tax.value=="")
	{
		alert("Please enter the Tax.");
		document.form1.tax.focus();
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
        	<h5>Assign Item to Vendor</h5></div>
            <div class="widget_body">
				<!--Form fields-->
               
               
               
               

<div class="content">
                
                
                    
                    <!-- START OF DEFAULT WIZARD -->
                    <form class="stdform stdform2" method="post" action="actionForAddItemToVendor.php"  id="form1" name="form1" onSubmit="return check()">
                    <div id="wizard" class="wizard">
                    
                        <div id="wiz1step1" class="formwiz">
                        	<table style="width:100%">
                               
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
                                
                                <p>
                                    <label>Vendor *</label>
                                    <span class="field">
                       <select name="vendor" class="vendor" id="vendor">
                       <option value="">Select Vendor</option>
                	   </select>
                        
                           </span>
                                </p>
                               </td>
                               </tr> 
                               
                               
                               
                               <tr>
                                <td>
                                
                                <p>
                                    <label>No. Of Items *</label>
                                    <span class="field">
                       <select name="noi" id="noi">
                	    <option value="">Select Number of Itmes</option>
						<?php
                       for($i = 1; $i <= 10 ; $i++ )
                        {
                          echo "<option value='$i'>$i</option>";
                        }                        
                        ?>
               	      </select> 
                           </span>
                                </p>
                               </td>
                               </tr>
                               
                            
                             <tr>
                                <td>
                                
                                <p>
                                    <label>Item Name *</label>
                                    <span class="field">
                       <select name="itemName" id="itemName">
                	    <option value="">Select Item Name</option>
						<?php
                        $que="SELECT * FROM oxy2_item";
                        $res=mysql_query($que);
                        while($row=mysql_fetch_array($res))
                        {
                        $itemName = $row[itemName];
						$itemId = $row[itemId];
                        echo "<option value='$itemId'>$itemName</option>";
                        }                        
                        ?>
               	      </select> 
                           </span>
                                </p>
                               </td>
                              </tr>   
                                
                               
                        <tr>
                               <td> 
                              
						<p><label>Rate *</label>
                        <span class='field'><input type='text' name='rate' id='rate' class='longinput'/></span></p>                    	    
                                </td>
                                </tr>
                                
                           <tr>
                               <td> 
                              
						<p><label>Tax *</label>
                        <span class='field'><input type='text' name='tax' id='tax' class='longinput'/></span></p>                    	    
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
     
          
