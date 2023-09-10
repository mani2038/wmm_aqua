<?php  if(isset($_REQUEST['clientId'])){$clientId  = $_REQUEST['clientId'];} else {$clientId = "";}
 if(isset($_REQUEST['departmentName'])){$departmentName  = $_REQUEST['departmentName'];} else {$departmentName = "";}
?>

<link rel="stylesheet" href="css/wizard.css" type="text/css" />

<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/ie8.css"/>
<![endif]-->

<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="css/ie7.css"/>
<![endif]-->
<script type="text/javascript" src="js2/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js2/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js2/plugins/jquery.smartWizard-2.0.min.js"></script>
<!-- Jquery Calender Script -->

	
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
  
    <script>
    $(function() {
        $( "#datepicker" ).datepicker();
		$( "#datepicker1" ).datepicker();
		$( "#datepicker2" ).datepicker();
		$( "#datepicker3" ).datepicker();
		$( "#datepicker4" ).datepicker();
		$( "#datepicker5" ).datepicker();
		});
    </script>

<!-- Calender Script Ended -->

<!-- JS For Form -->

<script type="text/javascript">

jQuery(document).ready(function () {

$("#category").change(function() {
    category = $(this).val();
window.location = "<?= './?id=2&subId=9&clientId='?>" + category;
});	


$("#department").change(function() {
    list_value = $(this).val();
	if(list_value == "B2B"){$('div.actionBar').css('margin-top', '240px');}
	if(list_value == "B2C"){$('div.actionBar').css('margin-top', '478px');}
	if(list_value == "Digital"){$('div.actionBar').css('margin-top', '250px');}
	
	//.actionBar
});	

$('.formElems--').hide();

    // listener for QR type
    $("#department----").change(function ()

    {
        var selected = $("#department option:selected").val();
		 $('.formElems').hide();
            $("." +selected).show();
    });

$('#wizard').smartWizard({onLeaveStep: leaveAStepCallback, onFinish: onFinishCallback});
      	
		
		
        function leaveAStepCallback(obj) {
            var step_num = obj.attr('rel'); // get the current step number
            return validateSteps(step_num); // return false to stay on step and true to continue navigation 
        }

        function onFinishCallback() {
            if (validateAllSteps()) {
				document.form1.submit();
                //$('form').submit();
            }
        }
		
		
		// Your Step validation logic
        function validateSteps(stepnumber) {
            var isStepValid = true;
			
            if (stepnumber == 1) {
                //var e = document.getElementById("contact");
				//var strCustomer = document.getElementById("contact").value;
				//alert(strCustomer);
				
					  if (document.form1.contact.value=="")
					  {
					  alert("Please Enter the Contact Name.");
					  document.form1.contact.focus();
					  return false;
					  }
					  
					  
					  if (document.form1.desg.value=="")
					  {
					  alert("Please Enter the Desgination");
					  document.form1.desg.focus();
					  return false;
					  }
					  
					 
					 
					  
					  if (document.form1.city.value=="")
					  {
					  alert("Please select a city.");
					  document.form1.city.focus();
					  return false;
					  }
					  
					  
					  if (document.form1.country.value=="")
					  {
					  alert("Please select a Country.");
					  document.form1.country.focus();
					  return false;
					  }
					  
				
					  if (document.form1.mobile.value=="")
					  {
					  alert("Please Enter the Mobile No.");
					  document.form1.mobile.focus();
					  return false;
					  }
					  if (document.form1.mobile.value!="")
					  {
					  text = document.form1.mobile.value;
					  for( var i=0; i<text.length; i++)
					  {	
					  if(text.charAt(i)<"0" || text.charAt(i)>"9")
					  { 
					  alert("Please enter only numeric values.")
					  document.form1.mobile.select();
					  return false;
					  }
					  }
					  }
					  
					   if (document.form1.email.value=="")
					  {
					  alert("Please Enter the  Email Address.");
					  document.form1.email.focus();
					  return false;
					  }
					  if(document.form1.email.value!="")
					  {
					  if (document.form1.email.value.indexOf('@') == -1){
					  alert("Kindly Enter Proper Email Id");
					  document.form1.email.select();			
					  return false;}
					  var dotIndex = document.form1.email.value.lastIndexOf('.');
					  if (document.form1.email.value.indexOf('@') >= dotIndex){
					  alert("Kindly Enter Proper Email Id");
					  document.form1.email.select();
					  return false;}
					  }
					  
					   if (document.form1.address1.value=="")
					  {
					  alert("Please Enter the Address.");
					  document.form1.address1.focus();
					  return false;
					  }
				
				
				
				
				return isStepValid;
            }// step1

            if (stepnumber == 2) {
				
			var isStepValid = true;
			  if (document.form1.leadname.value=="")
			  {
			  alert("Please Enter the Name of Lead.");
			  document.form1.leadname.focus();
			  return false;
			  }
			  if (document.form1.department.value=="")
			  {
			  alert("Please Select the Nature of Lead.");
			  document.form1.department.focus();
			  return false;
			  }
			  
			  //=== common fields==================
			  
			  if (document.form1.activityType.value=="none")
			  {
			  alert("Please Enter the Type of Activity.");
			  document.form1.activityType.focus();
			  return false;
			  }
			  
			  if (document.form1.activityType.value=="Others")
			  {
			  
					if (document.form1.otherActivity.value=="")
				  {
				  alert("Please Specify the Other Activity.");
				  document.form1.otherActivity.focus();
				  return false;
				  }
			  
			  }
			  
			  if (document.form1.eventbrief.value=="")
			  {
			  alert("Please Enter the Event Brief.");
			  document.form1.eventbrief.focus();
			  return false;
			  }
			  
			  if (document.form1.event_city.value=="")
			  {
			  alert("Please Select the event_city.");
			  document.form1.event_city.focus();
			  return false;
			  }
			  
			  if (document.form1.event_country.value=="")
			  {
			  alert("Please Select the event_country.");
			  document.form1.event_country.focus();
			  return false;
			  }
			  
			 /* if (document.form1.keyDeliverable.value=="")
			  {
			  alert("Please Enter the Key Deliverable.");
			  document.form1.keyDeliverable.focus();
			  return false;
			  }
			  
			  if (document.form1.specialInstruction.value=="")
			  {
			  alert("Please Select the Special Instruction.");
			  document.form1.specialInstruction.focus();
			  return false;
			  }*/
			  
			  //==========================================
			  
			  
			  //======================dept b2b===============================
			  
			  if (document.form1.department.value=="B2B")
			  {
			  
				  if (document.form1.lgs.value=="")
				  {
				  alert("Please Select the LGS.");
				  document.form1.lgs.focus();
				  return false;
				  }
				  
				  if (document.form1.beventStartDate.value=="")
				  {
				  alert("Please Select the eventStartDate.");
				  document.form1.beventStartDate.focus();
				  return false;
				  }
				  
				  if (document.form1.beventEndDate.value=="")
				  {
				  alert("Please Select the eventEndDate.");
				  document.form1.beventEndDate.focus();
				  return false;
				  }
			  
			  
			  
			  }
			  
			  
			  
			  
			  
			  //=============================================================
			  
			  
			  //======================dept b2c===============================
			  
			  if (document.form1.department.value=="B2C")
			  {
			  	  if (document.form1.coutelet_type.value=="")
				  {
				  alert("Please Select the outlet type.");
				  document.form1.coutelet_type.focus();
				  return false;
				  }
				  
				  if (document.form1.c_permission.value=="")
				  {
				  alert("Please Select the permission.");
				  document.form1.c_permission.focus();
				  return false;
				  }
				  
				  if (document.form1.cnumber_outlets.value=="")
				  {
				  alert("Please Select the outlet number.");
				  document.form1.cnumber_outlets.focus();
				  return false;
				  }
				  
				  if (document.form1.noOfDays.value=="")
				  {
				  alert("Please Select the noOfDays.");
				  document.form1.noOfDays.focus();
				  return false;
				  }
				  
				  if (document.form1.ceventStartDate.value=="")
				  {
				  alert("Please Select the eventStartDate.");
				  document.form1.ceventStartDate.focus();
				  return false;
				  }
				  
				 if (document.form1.ceventEndDate.value=="")
				  {
				  alert("Please Select the eventEndDate.");
				  document.form1.ceventEndDate.focus();
				  return false;
				  }
			  
			  
			  
			  }
			  
			  
			  
			  
			  
			  //=============================================================
			  
			  


                return isStepValid;

            }// end of step 2 valdation

        }
		
		
		function validateAllSteps(){
        var isStepValid = true;
		//alert("Please Select the ..............................Zone.");
		
		
		if (document.form1.expectedRecieverDate.value=="")
				  {
				  alert("Please Select the Date Recevied.");
				  document.form1.expectedRecieverDate.focus();
				  return false;
				  }
				  
				  
		  if (document.form1.status.value=="")
			  {
			  alert("Please Select the status.");
			  document.form1.status.focus();
			  return false;
			  }
			  
			  if (document.form1.projectRevenue.value=="")
			  {
			  alert("Please Enter the Project Revenue.");
			  document.form1.projectRevenue.focus();
			  return false;
			  }
			  
/*			   if(form1.dept2[0].checked || form1.dept2[1].checked)
			  {
			  }
			  else
			  {
			  alert("Please Specify if lead is SAP or Not");
			  return false;
			  }*/
				
			  
			  if (document.form1.projectRevenue.value!="")
			  {
			  text = document.form1.projectRevenue.value;
			  for( var i=0; i<text.length; i++)
			  {	
			  if(text.charAt(i)<"0" || text.charAt(i)>"9")
			  { 
			  alert("Please enter only numeric values at Projected Revenue")
			  document.form1.projectRevenue.select();
			  return false;
			  }
			  }
			  }
			  
			   if (document.form1.projectMargin.value=="")
			  {
			  alert("Please Enter the projectMargin.");
			  document.form1.projectMargin.focus();
			  return false;
			  }
			  if (document.form1.projectMargin.value!="")
			  {
			  text = document.form1.projectMargin.value;
			  for( var i=0; i<text.length; i++)
			  {	
			  if(text.charAt(i)<"0" || text.charAt(i)>"9")
			  { 
			  alert("Please enter only numeric values at Projected Margin")
			  document.form1.projectMargin.select();
			  return false;
			  }
			  }
			  }
	
	
	 if (document.form1.expectedClosureDate.value=="")
				  {
				  alert("Please Select the Expected Date of Closure.");
				  document.form1.expectedClosureDate.focus();
				  return false;
				  }
	
	
			  if (document.form1.zone.value=="")
			  {
			  alert("Please Select the Zone.");
			  document.form1.zone.focus();
			  return false;
			  }
			  
        // all step validation logic    
        return isStepValid;
      }      
		
		
		
});


</script>







        
<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span><h5>Create new lead</h5></div>
            <div class="widget_body">
				<!--Form fields-->
               
               
               
               

<div class="content">
                
                
                    
                    <!-- START OF DEFAULT WIZARD -->
                    <form class="stdform stdform2" method="post" action="actionForLeads_retail.php"  id="form1" name="form1">
                    <div id="wizard" class="wizard">
                    	
                        <ul class="hormenu">
                            <li>
                            	<a href="#wiz1step1">
                                	<span class="h2">STEP 1</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Client Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step2">
                                	<span class="h2">STEP 2</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Project Brief</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step3">
                                	<span class="h2">STEP 3</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Commercial Information</span>
                                </a>
                            </li>
                        </ul>
                        
                        <br clear="all" /><br /><br />
                        	
                        <div id="wiz1step1" class="formwiz">
                        	<h2>Step 1: Client Information</h2> <br />
                        	
                                <table style="width:100%">
                                <tr>
                                <td>
                                       
                                
                              
                                
                                <p>
                                    <label>Our Key Client</label>
                                    <span class="field">
                        <select name="category" id="category" >
                          <option value="">Select Client</option>
                          <?php
						 
                        $que="SELECT * FROM oxy2_clientn_retail";
                        $res=mysqli_query($con,$que);
                        while($row=mysqli_fetch_array($res))
                        {
						$companyname = $row['companyname'];
						$companyId = $row['id'];
                        if($clientId == $companyId){ $clientSel =  "selected = selected ";} 
						else{$clientSel = "";}
                        echo "<option value='$companyId' $clientSel>$companyname</option>";
                        }                        
                        ?>

                           </select>
                           </span>
                                </p>
                               </td>
                               </tr>
                               
                               <tr>
                               <td> 
                               <?php
                               if(isset($clientId))//If a username has been submitted 
{
$result2 = mysqli_query($con,"SELECT * FROM oxy2_clientn_retail WHERE id='$clientId'");
//Query to check if username is available or not 

if(mysqli_num_rows($result2))
{
$id = mysql_result($result2,0,"id");
$companyname = mysql_result($result2,0,"companyname");
$contact = mysql_result($result2,0,"contact");
$add1 = mysql_result($result2,0,"add1");

$ccity = mysql_result($result2,0,"ccity");
$country = mysql_result($result2,0,"country");
$pin = mysql_result($result2,0,"pin");
$mob = mysql_result($result2,0,"mob");
$email = mysql_result($result2,0,"email");

$desg = mysql_result($result2,0,"desg");



echo "<p><label>Contact Name </label><span class='field'><input type='text' name='contact' id='contact' class='longinput' value='$contact'/></span></p>";

echo "<p><label>Desgination</label><span class='field'><input type='text' name='desg' id='desg' class='longinput' value='$desg'/></span></p>";

echo "<p><label>City</label><span class='field'><input type='text' name='city' id='city' class='longinput' value='$ccity'/></span></p>";


echo "<p><label>Country</label><span class='field'><input type='text' name='country' id='country' class='longinput' value='$country'/></span></p>";


echo "<p><label>Mobile Number</label><span class='field'><input type='text' name='mobile' id='mobile' class='longinput' value='$mob'/></span></p>";


echo "<p><label>Email </label><span class='field'><input type='text' name='email' id='email' class='longinput' value='$email'/></span></p>";


echo "<p><label>Address</label><span class='field'><input type='text' name='address1' id='address1' class='longinput' value='$add1'/></span></p>";
                   
}
else
{
echo "<p>Plese Select the client name to get the details</p>";
}

}
 ?>                               
                         	    
                                </td>
                                </tr>
                                </table>
                                
                              
                                
                        	
                            
                        </div><!--#wiz1step1-->
                        
                        <div id="wiz1step2" class="formwiz">
                        	<h2>Step 2: Project Brief</h2> <br />
                            
                               <!-- <p>
                                    <label>Account No</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                <p>
                                    <label>Address</label>
                                    <span class="field"><textarea cols="58" rows="5" name="location"></textarea></span>
                                </p>-->
                                
                                
                                <table style="width:100%">
                                <tr>
                                <td>
                                       
                                <p>
                                    <label>Name of Lead</label>
                                    <span class="field"><input type="text" name="leadname" id="leadname" class="longinput" /></span>
                                </p>
                              
                                
                                <p>
                                    <label>Nature of Lead</label>
                                    <span class="field">
                                    
                                    <select name="department" id="department" onChange="showDropdown(this.selectedIndex)">
<option value=" ">Select one</option>
                          <option value="B2B">B2B</option>
                          <option value="B2C">B2C</option>
                          <option value="Digital">Digital</option>
</select>
                                              
                       <!-- <select name="department" id="department" onchange="showDropdown22(this.selectedIndex);" >
                          <option value=" ">Select one</option>
                          <option value="B2B">B2B</option>
                          <option value="B2C">B2C</option>
                          <option value="Digital">Digital</option>
                          
                           </select>-->
                           </span>
                                </p>
                                
                                <p>
                                    <label>Type of Activity</label>
                                    <span class="field">
                                        
                                        <select name="activityType" id="activityType" >
                                        <option value="none">Select department first</option>
</select>
<!--<select name="activityType" id="activityType" size="4" style="width: 150px">
                                        
                                        </select>
-->                                                                   
                                       
                           </span>
                                </p>
                                
                                
                                 <p>
                                    <label>Others Please Specify</label>
                                    <span class="field"><input type="text" name="otherActivity" id="otherActivity" class="longinput" /></span>
                                </p>
                                
                                <p>
                                    <label>Event Brief</label>
                                    <span class="field"><textarea name='eventbrief'  cols='60' rows='4' id='eventbrief' class='longinput'></textarea></span>
                                </p>
                                
                                <p>
                                    <label>Country</label>
                                    <span class="field">
                                        <select name="event_country" id="event_country">
                                        <option value=""  selected="selected" >Choose Country</option>
                                        <option value="India">India</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Others">Others</option>
                                        </select>
                           </span>
                                </p>
                                
                                <p>
                                    <label>City</label>
                                    <span class="field">
                                        <select name="event_city" id="event_city">
                                         <option value="" selected="selected">Select City</option>
						<?php
                        $que="SELECT * FROM oxy2_city";
                        $res=mysql_query($que);
                        while($row=mysql_fetch_array($res))
                        {
                        $city_name = $row[city_name];
                        echo "<option value='$city_name'>$city_name</option>";
                        }                        
                        ?>
                                        </select>
                           </span>
                                </p>
                                
                                 <p>
                                    <label>Key Deliverable</label>
                                    <span class="field"><textarea name='keyDeliverable'  cols='60' rows='4' id='keyDeliverable' class='longinput'></textarea></span>
                                </p>

                                <p>
                                    <label>Special Instruction</label>
                                    <span class="field"><textarea name='specialInstruction'  cols='60' rows='4' id='specialInstruction' class='longinput'></textarea></span>
                                </p>

                                
                               </td>
                               </tr>
                               
                               <tr>
                               <td> 
                              								
                            
                            <div style="display:none;" id="Digital">
								<?php
								
								 
                   
                     echo "<p><label>Service Required</label><span class='field'>
					 <input type='checkbox' name='digi[]' value='Website' >
                  	 Website &nbsp;&nbsp;&nbsp; 
					               
                    <input type='checkbox' name='digi[]' value='Payment Gateway' >
                  	Payment Gateway &nbsp;&nbsp;&nbsp; 
					
                    <input type='checkbox' name='digi[]' value='Client Interfaces'>
                    Client Interfaces &nbsp;&nbsp;&nbsp; 
                  
                    <input type='checkbox' name='digi[]' value='Media Planning/Buying'>
                    Media Planning/Buying &nbsp;&nbsp;&nbsp; 
					
					<br/><br/>
                     
                   <input type='checkbox' name='digi[]' value='Microsite' >
                  	Microsite &nbsp;&nbsp;&nbsp; 
                   
                    <input type='checkbox' name='digi[]' value='SEO' >
                    SEO &nbsp;&nbsp;&nbsp; 
					
                    <input type='checkbox' name='digi[]' value='Reporting Panel'>
                    Reporting Panel &nbsp;&nbsp;&nbsp; 
                  
                    <input type='checkbox' name='digi[]' value='eCommerce Portal'>
                    eCommerce Portal &nbsp;&nbsp;&nbsp;      
					
					<br/><br/>
                               
                    <input type='checkbox' name='digi[]' value='Domain Name' >
                    Domain Name &nbsp;&nbsp;&nbsp;                     
                   
                    <input type='checkbox' name='digi[]' value='SEM/ Online Branding' >
                    SEM/ Online Branding &nbsp;&nbsp;&nbsp; 
					
                    <input type='checkbox' name='digi[]' value='Demand Generation'>
                  Demand Generation &nbsp;&nbsp;&nbsp; 
				  <input type='checkbox' name='digi[]' value='CRM'>
                  CRM  &nbsp;&nbsp;&nbsp;
                  
                    
				  
				  <br/><br/>
                            
                   <input type='checkbox' name='digi[]' value='Registration Form' >
                   Registration Form &nbsp;&nbsp;&nbsp; 
                   
                    <input type='checkbox' name='digi[]' value='Email Marketing' >
                    Email Marketing &nbsp;&nbsp;&nbsp; 
					
                    <input type='checkbox' name='digi[]' value='Loyalty Program'>
                  Loyalty Program &nbsp;&nbsp;&nbsp; 
				  
				   
				  <input type='checkbox' name='digi[]' value='Registration Engine' >
                      Registration Engine &nbsp;&nbsp;&nbsp; 
                  
				   <br/><br/>
				   
				  
                   <input type='checkbox' name='digi[]' value='Analytics'>
                  Analytics &nbsp;&nbsp;&nbsp; 
                  
                     <input type='checkbox' name='digi[]' value='Others'>
                  Others, Please Mention &nbsp;&nbsp;&nbsp; 
				  <input name='digital_others' type='text' id='digital_others' size='40'>
				  <br/><br/>
				  
				  </span></p>";					
								
								
															
							?>
                            
                            <br clear="all" /><br /><br />                            
                            </div>
                            
                            
                            
                            <div style="display:none;" id="B2B">
								<p><label>LGS</label><span class='field'>
								
								 <select name='lgs' id='lgs'>
                                        <option value=''  selected="selected">Choose LGS</option>
                                        <option value='Single Day'>Single Day</option>
                                        <option value='Multi Day'>Multi Day</option>
										<option value='Single City'>Single City</option>
										<option value='Multi City'>Multi City</option>
                                        </select>
								</span></p>
								
								<p><label>Event Start Date</label><span class='field'><input type='text' name='beventStartDate' id='datepicker' class='shortinput' />&nbsp;(MM/DD/YYYY)</span></p>
								
								<p><label>Event End Date</label><span class='field'><input type='text' name='beventEndDate' id='datepicker1' class='shortinput'>&nbsp;(MM/DD/YYYY)</span></p>
						                     
                            
                            </div>
                        
                        
                            
                            <div style="display:none;" id="B2C">
                            
                            <p><label>Outlet Type</label><span class='field'><input type='text' name='coutelet_type' id='coutelet_type' class='smallinput'/></span></p>
                            <p><label>Permission</label><span class='field'>
                            <select name='c_permission' id='c_permission'>
                                        <option value=''  selected="selected">Permission Required</option>
                                        <option value='Yes'>Yes</option>
                                        <option value='No'>No</option>
										
                                        </select>
                           </span></p>
                            <p><label>Number of Outlet</label><span class='field'><input type='text' name='cnumber_outlets' id='cnumber_outlets' class='smallinput'/> &nbsp;(Numeric only)</span></p>
								
								<p><label>Number of Days</label><span class='field'><input type='text' name='noOfDays' id='noOfDays' class='smallinput'/> &nbsp;(Numeric only)</span></p>								
						<p><label>Event Start Date</label><span class='field'><input type='text' name='ceventStartDate' id='datepicker4' class='smallinput' >&nbsp;(MM/DD/YYYY)</span></p>
								
								<p><label>Event End Date</label><span class='field'><input type='text' name='ceventEndDate' id='datepicker5' class='smallinput' >&nbsp;(MM/DD/YYYY)</span></p>
                                
                          
                            
                            </div>
								
							
							     
                         	    
                                </td>
                                </tr>
                                </table>
                                
                                                                                               
                        </div><!--#wiz1step2-->
                        
                        <div id="wiz1step3" class="formwiz">
                        	<h2>Step 3: Commercial Information</h2>
                           
                               
                               <p>
                                    <label>Date Received</label>
                                    <span class="field"><input type='text' name='expectedRecieverDate' id='datepicker2' class='smallinput' title='Date Received'>&nbsp;(MM/DD/YYYY)</span>
                                </p>
                                
                                <p>
                                    <label>Status</label>
                                    <span class="field"><select name="status" id="status">
                                        <option value="">Choose Status</option>
                                        <option value="Prospect">Prospect</option>
                                        <option value="Proposal">Proposal</option>
                                        <option value="Lead">Lead</option>
                                        </select></span>
                                </p>
                                
                                <p>
                                    <label>Currency</label>
                                    <span class="field"><input type='radio' name='currency' value='INR' class='longinput' checked="checked" >
								INR <!--&nbsp;&nbsp;&nbsp; <input type='radio' name='currency' value='Dollars' class='longinput'>
								Dollars &nbsp;&nbsp;&nbsp; --></span>
                                </p>
                                
                                <p>
                                    <label>Project Revenue GP</label>
                                    <span class="field"><input type='text' name='projectRevenue' id='projectRevenue' class='smallinput'>
                                    &nbsp;(Numeric only)</span><small class="desc" style="color:#F00">Note: Please don't enter Total Billing or Invoiced Amount. Only you have to enter GP Value.</small>
                                </p>
                                
                                <p>
                                    <label>Project Margin GP %</label>
                                    <span class="field"><input type='text' name='projectMargin' id='projectMargin' class='smallinput'> 
                                    % (only Numeric)</span>
                                </p>
                                
                                <p>
                                    <label>Project Closure Date</label>
                                    <span class="field"><input type='text' name='expectedClosureDate' id='datepicker3' class='smallinput'>&nbsp;(MM/DD/YYYY)</span>
                                </p>
                                
                                <p>
                                    <label>Zone</label>
                                    <span class="field"><select name="zone" id="zone">
                                        <option value="" selected="selected">Choose Zone</option>
                                        <option value="New Delhi">New Delhi</option>
                                        <option value="Chennai">Chennai</option>
                                        <option value="Mumbai">Mumbai</option>
                                        <option value="Hyderabad">Hyderabad</option>
                                         <option value="Banglore">Banglore</option>
                                         <option value="Singapore">Singapore</option> 
                                        </select></span>
                                </p>
                                
                              
                           
                        </div><!--#wiz1step3-->
                        
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
     
          
<script type="text/javascript">

var countrieslist=document.form1.department
var citieslist=document.form1.activityType

var cities=new Array()
cities[0]=["Select Department First|none"]
cities[1]=["Select One|none","LGS|LGS", "LGTS|LGTS", "DBM|DBM", "Others|Others"]
cities[2]=["Select One|none","Promotion|Promotion", "Events|Events", "MICE|MICE", "Activation|Activation", "Others|Others"]
cities[3]=["Select One|none","Online Marketing|Online Marketing", "SEO|SEO", "SMM|SMM", "Others|Others"]

function showDropdown(selectedcitygroup){
citieslist.options.length=0
if (selectedcitygroup>=0){
for (i=0; i<cities[selectedcitygroup].length; i++)
citieslist.options[citieslist.options.length]=new Option(cities[selectedcitygroup][i].split("|")[0], cities[selectedcitygroup][i].split("|")[1])
}

	 var v = document.getElementById("department").value;
	
	if(v == " ")
	{	
		
		document.getElementById("Digital").style.display="none";
		document.getElementById("B2B").style.display="none";
		document.getElementById("B2C").style.display="none";
		
		
		
						
	}
	
	
	if(v == "Digital")
	{
		document.getElementById("Digital").style.display="block";
		document.getElementById("B2B").style.display="none";
		document.getElementById("B2C").style.display="none";
		
		document.getElementById("wizard").style.height="1420px";
		
		
		
		
				
	}
	
	if(v == "B2B")
	{
		document.getElementById("B2B").style.display="block";
		
		
		document.getElementById("Digital").style.display="none";
		document.getElementById("B2C").style.display="none";
		
		
				
	}
	
	if(v == "B2C")
	{
		document.getElementById("B2C").style.display="block";
			
		document.getElementById("Digital").style.display="none";
		document.getElementById("B2B").style.display="none";
		
		

				
	}
	


}

</script>
