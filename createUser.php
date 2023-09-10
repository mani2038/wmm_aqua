<!-- Jquery Calender Script -->

	
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
  
    <script>
    $(function() {
        $( "#datepicker2" ).datepicker( {
        changeMonth: true,
        changeYear: true,
        
    });
		$( "#datepicker1" ).datepicker( {
        changeMonth: true,
        changeYear: true,
        
    });
		
		});
    </script>

<!-- Calender Script Ended -->

<script language = "JavaScript">

function check()
{
	var numtest= /^[0-9]+$/;

	var emailtest=/^[a-zA-Z][\w\_\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;


	if (document.form1.dept.value=="")
	{
		alert("Please select the Department.");
		document.form1.dept.focus();
		return false;
	}
	
	if (document.form1.empId.value=="")
	{
		alert("Please enter the Employee ID.");
		document.form1.empId.focus();
		return false;
	}
	
	if (document.form1.fname.value=="")
	{
		alert("Please enter the First Name.");
		document.form1.fname.focus();
		return false;
	}
	if (document.form1.lname.value=="")
	{
		alert("Please enter the Last Name.");
		document.form1.lname.focus();
		return false;
	}
	if (document.form1.job_title.value=="")
	{
		alert("Please enter the Designation.");
		document.form1.job_title.focus();
		return false;
	}
	
	if (document.form1.phone.value=="")
	{
		alert("Please enter the Mobile Number.");
		document.form1.phone.focus();
		return false;
	}
	if(!(numtest.test(form1.phone.value)))
	{
	alert("Only Digits Required!");
	form1.phone.value = "";
	form1.phone.focus();
	return(false);
	}
	
	
	if (document.form1.address1.value=="")
	{
		alert("Please enter the Address.");
		document.form1.address1.focus();
		return false;
	}
	
	
	
	if (document.form1.dateofjoining.value=="")
	{
		alert("Please enter the Date Of Joining.");
		document.form1.dateofjoining.focus();
		return false;
	}
	
	if (document.form1.dateofbirth.value=="")
	{
		alert("Please enter the Date Of Birth.");
		document.form1.dateofbirth.focus();
		return false;
	}
	
	if (document.form1.email.value=="")
	{
		alert("Please enter the Email Id.");
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
	
	
	if (document.form1.branch.value=="")
	{
		alert("Please enter the Branch");
		document.form1.branch.focus();
		return false;
	}

	
//----------------------------------------------------------------------------------------------------

	return true;
}

</script>



<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span><h5>Create User</h5></div>
            <div class="widget_body">
				<!--Form fields-->
                <form action="actionForCreateUser.php" method="post" name="form1" id="form1" onSubmit="return check()">
                
                <ul class="form_fields_container">
                            
            		<li>
                    <label>Department : *</label> 
                    <div class="form_input"><select name="dept">
                	    <option value="">Select Department</option>
                	    <option value="Operations">Operations</option>
                        <option value="BD and CS">BD & CS</option>
                        <option value="Creative">Creative</option>
                        <option value="Digital">Digital</option>
                        <option value="Planning">Planning</option>
                         <option value="Admin & HR">Admin & HR</option>
                          <option value="Finance">Finance</option>
						  <option value="RSVP_Ops">RSVP Ops</option>
						  <option value="Event_Ops">Event Ops</option>
                         
                	</select></div>
                    </li>
                	
                    <li><label>Employee ID :*</label> <div class="form_input"><input name="empId" id="empId"  type="text" class="tip_east" title="Employee Id"></div></li>
                	<li><label>First Name :*</label> <div class="form_input"><input name="fname" id="fname"  type="text" class="tip_east" title="First Name"></div></li>
                   
                   	<li><label>Last Name :*</label> <div class="form_input"><input name="lname" id="lname"  type="text" class="tip_east" title="Last Name"></div></li> 
                   
                    <li>
                    	<label>Gender :*</label> 
                        <div class="form_input"><input name="gender" id="gender" type="radio" value="Male" checked="checked">
                        <label for="radio1">Male</label> </div>
                        <div class="form_input"><input id="gender" name="gender" type="radio" value="Female">
                        <label for="radio1">Female</label></div>
                        
                    </li>
                    
                   
                   <li><label>Designation :*</label> <div class="form_input"><input name="job_title" id="job_title"  type="text" class="tip_east" title="Job Title"></div></li> 
                  
                   <li><label>Mobile :*</label> <div class="form_input"><input name="phone" id="phone"  type="text" class="tip_east" title="Mobile Number"></div></li> 
                  
                   <li><label>Landline Number :</label> <div class="form_input"><input name="landline" id="landline"  type="text" class="tip_east" title="Landline Number"></div></li> 
                   
                  
                   <li><label>Address :*</label> <div class="form_input"><textarea class="auto" id="txtInput" name="address1" cols="30" rows="3" ></textarea></div></li> 
                   
                    <li><label>Type Of Users :*</label>  
                    <div class="form_input">
                    
                    <select name="user_type" id="user_type">
                	    <option value="">Select User Type</option>
                        <option value="1">Admin</option>
                        <!--<option value="2">HR</option>
                         <option value="3">BD Head</option>
                         <option value="4">BD Person</option> --> 
                         <option value="5">Regular</option>  
                         <!--<option value="6">Accounts</option> -->   
						
               	      </select> 
                     
                    </div>
                   </li>
                   
                   <li><label>Date Of Joining :</label> <div class="form_input"><input type="text" name="dateofjoining" id="datepicker2" class="tip_east" title="Date Of Joining"></div></li>
                   
                     <li><label>Date Of Birth :</label> <div class="form_input"><input type="text" name="dateofbirth" id="datepicker1" class="tip_east" title="Date Of Birth"></div></li>
                          
                   
                   <li><label>Email :*</label> <div class="form_input"><input name="email" id="email"  type="text" class="tip_east" title="Email">

                   </div></li> 
                   
                     <li><label>Alternate Email :</label> <div class="form_input"><input name="alternateEmail" id="alternateEmail"  type="text" class="tip_east" title="Alternate Email"></div></li> 
                  <!-- 
                   <li><label>Password :*</label> <div class="form_input"><input name="password" id="password"  type="password" class="tip_east" title="Password"></div></li> -->
                                   
                    
                  <!-- <li><label>City :*</label>  
                    <div class="form_input">
                    
                    <select name="city" id="city">
                	    <option value="">Select City</option>
						<?php
                        $que="SELECT * FROM oxy2_city";
                        $res=mysqli_query($con,$que);
                        while($row=mysqli_fetch_array($res))
                        {
                        $city_name = $row[city_name];
                        echo "<option value='$city_name'>$city_name</option>";
                        }                        
                        ?>
               	      </select> 
                     
                    </div>
                   </li> -->
                   
                   
                   <li><label>Branch :*</label>  
                    <div class="form_input">
                    
                    <select name="branch" id="branch">
                	    <option value="">Select Branch</option>
                        <option value="New Delhi">New Delhi</option>
                        <option value="Chennai">Chennai</option>
                         <option value="Mumbai">Mumbai</option>
                         <option value="Hyderabad">Hyderabad</option>
                        <option value="Bangalore">Bangalore</option>
                        <option value="Singapore">Singapore</option>    
						
               	      </select> 
                     
                    </div>
                   </li>
                                    
                    
                    <li style="text-align:center"><input type="submit" name="submit" id="submit" value="Submit" style="background: #CCC;color:#000000;text-shadow: 1px 1px #DDD; padding:6px;border-radius:5px; font-weight:bold;"/></li>
                                                       
                </ul>
                </form>
            </div>
        </div>
    </div>
                      
	
 	<br class="clear" />   