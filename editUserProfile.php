<?php include_once('commonFunction.php'); ?>

<!-- Jquery Calender Script -->

	
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
  
    <script>
    $(function() {
        $( "#datepicker" ).datepicker( {
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
		alert("Please enter the Job Title.");
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
	
	if (document.form1.user_type.value=="")
	{
		alert("Please select the User Type.");
		document.form1.user_type.focus();
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
	
		
	if (document.form1.city.value=="")
	{
		alert("Please select the city");
		document.form1.city.focus();
		return false;
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


<?php 

$userName = $_COOKIE["name"]; 
$userTypeForLooggedIn = $_COOKIE["user_type"];               


function convertDateinProperFormat($nDate)
{
$der = explode("/",$nDate);
$dd = $der['0'];
$mm = $der['1'];
$yy = $der['2'];
$newDate = $yy."-".$dd."-".$mm;
return $newDate;
}

function convertDateinOriginalFormat($nDate)
{
$der = explode("-",$nDate);
$yy = $der['0'];
$mm = $der['1'];
$dd = $der['2'];
$newDate = $mm."/".$dd."/".$yy;
return $newDate;
}

if(isset($_REQUEST['editId']))
{
$employeeUserId = $_REQUEST['editId']; 
	
}
else
{
$employeeUserId = $_COOKIE["user_id"];
}
$editId = $employeeUserId;


if(isset($_POST['dept']) && $_POST['dept']!='')
{
$password1 = addslashes(trim($_POST['password']));
$password_temp1 = addslashes(trim($_POST['password_temp']));
	
$userName1 = $_COOKIE["name"];

$department1 = addslashes(trim($_POST['dept']));

$empId1 = addslashes(trim($_POST['empId']));

$fname1 = addslashes(trim($_POST['fname']));

$lname1 = addslashes(trim($_POST['lname']));

$gender1 = addslashes(trim($_POST['gender']));

$job_title1 = addslashes(trim($_POST['job_title']));

$phone1 = addslashes(trim($_POST['phone']));

$landlineNumber1 = addslashes(trim($_POST['landline']));


$address1 = addslashes(trim($_POST['address1']));

$user_type1 = addslashes(trim($_POST['user_type']));
$userTypeName1 = getUserTypeName($user_type);


$dateofjoining1 = addslashes(trim($_POST['dateofjoining']));
$converteddateofjoining1 = convertDateinProperFormat($dateofjoining1);


$dateofbirth1 = addslashes(trim($_POST['dateofbirth']));
$converteddateofbirth1 = convertDateinProperFormat($dateofbirth1);


$email1 = addslashes(trim($_POST['email']));
$alternateEmail1 = addslashes(trim($_POST['alternateEmail']));





$city1 = addslashes(trim($_POST['city']));

$branch1 = addslashes(trim($_POST['branch']));
$createdOn = addslashes(trim($_POST['createdOn']));


$sql1="UPDATE oxy2_users SET emp_id = '$empId1',username='$email1',password='$password1',user_type='$user_type1',status='1',fname='$fname1',lname='$lname1',gender='$gender1',doj='$converteddateofjoining1',dob='$converteddateofbirth1',job_title='$job_title1',emailid='$email1',alternateEmail='$alternateEmail1',branch='$branch1',address1='$address1',phone='$phone1',landlineNumber='$landlineNumber1',city='$city1',created_on='$createdOn',modified_on=date_add(now(), interval 630 minute),modified_by='$userName1',deleted_on='',deleted_by='',password_temp='$password_temp',dept='$department1' WHERE user_id='$editId'";
$result = mysqli_query($con,$sql1);

$sqlForLog="INSERT INTO oxy2_userslogs 
(`emp_id`,`username`,`password`,`user_type`,`status`,`fname`, `lname`, `gender`,`doj`, `dob`,`job_title`, `emailid`, `alternateEmail`, `branch`, `address1`, `phone`, `landlineNumber`,`city`,`created_on`,`modified_on`,`modified_by`,`deleted_on`,`deleted_by`,`password_temp`,`dept`)

VALUES

('$empId1','$email1','$password1','$user_type1','1','$fname1','$lname1','$gender1','$converteddateofjoining1','$converteddateofbirth1','$job_title1','$email1','$alternateEmail1','$branch1','$address1','$phone1','$landlineNumber1','$city1',date_add(now(), interval 630 minute),date_add(now(), interval 630 minute),'$userName1','','','$password_temp1','$department1')";


$resultForLog = mysqli_query($con,$sqlForLog);




	header("location:.?id=1&subId=10");


}


?>


<?php  


$SelQuery = "SELECT * FROM oxy2_users WHERE user_id = '$editId'";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
						


$department = $SelResult['dept'];

$empId = $SelResult['emp_id'];

$fname = $SelResult['fname'];

$lname = $SelResult['lname'];

$gender = $SelResult['gender'];

$job_title = $SelResult['job_title'];

$phone = $SelResult['phone'];

$landlineNumber = $SelResult['landlineNumber'];


$address1 = $SelResult['address1'];

$user_type = $SelResult['user_type'];
$userTypeName = getUserTypeName($user_type);


$dateofjoining = $SelResult['doj'];

$converteddateofjoining1 = convertDateinOriginalFormat($dateofjoining);

$dateofbirth = $SelResult['dob'];

$converteddateofbirth1 = convertDateinOriginalFormat($dateofbirth);

$email = $SelResult['emailid'];
$alternateEmail = $SelResult['alternateEmail'];


$password =$SelResult['password'];
$password_temp =$SelResult['password_temp'];



$city = $SelResult['city'];

$branch = $SelResult['branch'];

$created_on = $SelResult['created_on'];
				
								
				}
}
				
				
?>  


<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span>
        	<h5>Edit User Profile</h5></div>
            <div class="widget_body">
				<!--Form fields-->
                <form action="#" method="post" name="form1" id="form1" onSubmit="return check()">
               
                 <input name="password" type="hidden" value="<?php echo $password; ?>" >
                 <input name="password_temp" type="hidden" value="<?php echo $password_temp; ?>" >
                  <input name="createdOn" type="hidden" value="<?php echo $created_on; ?>" >      
                   
               
               <ul class="form_fields_container">
                            
            		<li>
                    <label>Department : *</label> 
                    <div class="form_input"><select name="dept">
                	    <option value="">Select Department</option>
                	    <option value="Operation" <?php if($department == "Operation"){echo "Selected = selected";} ?>>Operation</option>
                	    <option value="Accounts"  <?php if($department == "Accounts"){echo "Selected = selected";} ?>>Accounts</option>
                	    <option value="Digital"  <?php if($department == "Digital"){echo "Selected = selected";} ?>>Digital</option>
                        <option value="B2B"  <?php if($department == "B2B"){echo "Selected = selected";} ?>>B2B</option>
                        <option value="B2C"  <?php if($department == "B2C"){echo "Selected = selected";} ?>>B2C</option>
                        <option value="Creative"  <?php if($department == "Creative"){echo "Selected = selected";} ?>>Creative</option>
                         <option value="Database"<?php if($department == "Database"){echo "Selected = selected";} ?>>Database</option>
                         <option value="HR"  <?php if($department == "HR"){echo "Selected = selected";} ?>>HR and Admin</option>	
                          <option value="Business Development"  <?php if($department == "Business Development"){echo "Selected = selected";} ?>>Business Development</option>
                          <option value="Account Planner"  <?php if($department == "Account Planner"){echo "Selected = selected";} ?>>Account Planner</option>
                           <option value="Client Servicing"  <?php if($department == "Client Servicing"){echo "Selected = selected";} ?>>Client Servicing</option>
                	</select></div>
                    </li>
                	
                    <li><label>Employee ID :*</label> <div class="form_input"><input name="empId" id="empId"  type="text" class="tip_east" title="Employee Id" readonly="readonly" value="<?php echo $empId; ?>"></div></li>
                    
                	<li><label>First Name :*</label> <div class="form_input"><input name="fname" id="fname"  type="text" class="tip_east" title="First Name" value="<?php echo $fname; ?>"></div></li>
                   
                   	<li><label>Last Name :*</label> <div class="form_input"><input name="lname" id="lname"  type="text" class="tip_east" title="Last Name" value="<?php echo $lname; ?>"></div></li> 
                   
                    
                   
                   <li><label>Designation :*</label> <div class="form_input"><input name="job_title" id="job_title"  type="text" class="tip_east" title="Job Title" value="<?php echo $job_title; ?>"></div></li> 
                  
                   <li><label>Mobile :*</label> <div class="form_input"><input name="phone" id="phone"  type="text" class="tip_east" title="Mobile Number" value="<?php echo $phone; ?>"></div></li> 
                  
                   <li><label>Landline Number :</label> <div class="form_input"><input name="landline" id="landline"  type="text" class="tip_east" title="Landline Number" value="<?php echo $landlineNumber; ?>"></div></li> 
                   
                  
                   <li><label>Address :*</label> <div class="form_input"><textarea class="auto" id="txtInput" name="address1" cols="30" rows="3" ><?php echo $address1; ?></textarea></div></li> 
                              
                    
                    <input name="gender" type="hidden" value="<?php echo $gender; ?>" >  
                    <input name="user_type" type="hidden" value="<?php echo $user_type; ?>" >
                    <input name="dateofjoining" type="hidden" value="<?php echo $converteddateofjoining1; ?>" >
                    <input name="email" type="hidden" value="<?php echo $email; ?>" >     
                  
                                             
                                
                     <li><label>Date Of Birth :</label> <div class="form_input"><input type="text" name="dateofbirth" id="datepicker1" class="tip_east" title="Date Of Birth" value="<?php echo $converteddateofbirth1; ?>"></div></li>
                          
                   
                  
                   
                     <li><label>Alternate Email :</label> <div class="form_input"><input name="alternateEmail" id="alternateEmail"  type="text" class="tip_east" title="Alternate Email" value="<?php echo $alternateEmail; ?>"></div></li> 
                
                                   
                    
                   <li><label>City :*</label>  
                    <div class="form_input">
                    
                    <select name="city" id="city">
                	    <option value="">Select City</option>
						<?php
                        $que="SELECT * FROM oxy2_city";
                        $res=mysqli_query($con,$que);
                        while($row=mysqli_fetch_array($res))
                        {
							
                        $city_name = $row[city_name];
						if($city == $city_name){$city_sel = "selected = selected";}else{$city_sel = "";}
                        echo "<option value='$city_name' $city_sel>$city_name</option>";
                        }                        
                        ?>
               	      </select> 
                    </div>
                   </li>
                   
                   
                   <li><label>Branch :*</label>  
                    <div class="form_input">
                    
                    <select name="branch" id="branch">
                	    <option value="">Select Branch</option>
                        <option value="New Delhi" <?php if($branch == "New Delhi"){echo "Selected = selected";} ?>>New Delhi</option>
                        <option value="Chennai" <?php if($branch == "Chennai"){echo "Selected = selected";} ?>>Chennai</option>
                         <option value="Mumbai" <?php if($branch == "Mumbai"){echo "Selected = selected";} ?>>Mumbai</option>
                         <option value="Hyderabad" <?php if($branch == "Hyderabad"){echo "Selected = selected";} ?>>Hyderabad</option>
                        <option value="Bangalore" <?php if($branch == "Bangalore"){echo "Selected = selected";} ?>>Bangalore</option>
                        <option value="Singapore" <?php if($branch == "Singapore"){echo "Selected = selected";} ?>>Singapore</option>    
						
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