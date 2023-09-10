<style type="text/css">
.error{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-align: center;
	font-size:12px;
	color:#FF0000;
}
</style>
<?php
// Get error message
function getError($n)
{
	global $config;
	switch($n)
	{
	## Start Error Messages
	//case 0:
	//	return '<div class="error">Please fill all mandatory fields.</div>';
	## Password/Login
	case 1:
		return '<div class="error">Invalid Username/Password.</div>';
	## MySQL connection
	case 2:
		return '<div class="error">A problem occured with your MySQL connection.</div>';
	## Access denied
	case 3:
		return '<div class="error">A problem occured with your MySQL connection.</div>';
		
	case 4:
		return '<div class="error">User added successfully.</div>';
	case 4141:
		return '<div class="error">This is duplicate entry!</div>';
	case 4242:
		return '<div class="error">Your system error , Please try again!</div>';	
			
	case 49:
		return '<div class="error">Image extension invalid.</div>';
			
	case 5:
		return '<div class="error">User already exists.</div>';	
	case 6:
		return '<div class="error">Record updated successfully.</div>';	
	case 7:
		return '<div class="error">Record deleted successfully.</div>';	
	case 8:
		return '<div class="error">Please select at least one checkbox to perform the action.</div>';	
		
		
	case 9:
		return '<div class="error">New field analyst added successfully.</div>';	
	case 10:
		return '<div class="error">Field analyst updated successfully.</div>';	
	case 11:
		return '<div class="error">Field analyst deleted successfully.</div>';	
	case 12:
		return '<div class="error">Please remove space form username.</div>';	
	case 13:
		return '<div class="error">Please remove space form password.</div>';	
	case 14:
		return '<div class="error">New company added successfully.</div>';	
	case 15:
		return '<div class="error">Company updated successfully.</div>';	
	case 16:
		return '<div class="error">Activity deleted successfully.</div>';							
	

	case 22:
		return '<div class="error">Invalid UserName Or Password.<br><br></div>';	
	
	case 31:
		return '<div class="error">Duplicate category.</div>';	
	case 32:
		return '<div class="error">New category added successfully.</div>';	
	case 33:
		return '<div class="error">Thank you for Verifying your Account.<br><br>To Login <a href="./">Click here</a></div>';	

	case 41:
		return '<div class="error">Quantity and selected IMEI number are not equal!</div>';	
	
	
		
	
	
	
		
	case 95:
		return '<div class="error">Your Password has been Changed Successfully.</div>';
	case 96:
		return '<div class="error">Old Password Not Matching.</div>';
	case 97:
		return '<div class="error">Question Successfully Added.</div>';	
	case 98:
		return '<div class="error">Total Question Credit Exceeding From Criteria Credit.</div>';
	case 99:
		return '<div class="error">Question Option Credit Exceeding From Question Credit.</div>';
	case 100:
		return '<div class="error">Admin Account Updated Successfully.</div>';	
	case 101:
		return '<div class="error">Mail Sent Successfully.</div>';	
	case 102:
		return '<div class="error">Email-Id Does Not Exist.</div>';	
	case 103:
		return '<div class="error">Question Successfully Updated.</div>';	
		
	case 104:
		return '<div class="error">This gift already selected! </div>';	
	case 105:
		return '<div class="error">You have not sufficient points to claim this gift!</div>';	
	case 106:
		return '<div class="error">Your request has been sent . </div>';	
		
	case 300:
		return '<div class="error">Image Remove Successfully. </div>';		
	
	case 500:
		return '<div class="error">Project Saved Successfully.</div>';	
	case 501:
		return '<div class="error">Project Saved Successfully.</div>';
	case 502:
		return '<div class="error">Field Analyst Saved Successfully.</div>';	
	case 503:
		return '<div class="error">Company Saved Successfully.</div>';	
	case 504:
		return '<div class="error">Brand Saved Successfully.</div>';
	case 505:
		return '<div class="error">Filter Saved Successfully.</div>';
	case 506:
		return '<div class="error">Criteria Saved Successfully.</div>';
	case 507:
		return '<div class="error">Criteria deleted Successfully.</div>';	
	case 508:
		return '<div class="error">Logo Remove Successfully.</div>';	
	case 600:
		return '<div class="error">Country Saved Successfully.</div>';	
	case 601:
		return '<div class="error">Duplicate Country Name.</div>';	
	case 602:
		return '<div class="error">Country Updated Successfully.</div>';
	case 603:
		return '<div class="error">Country Deleted Successfully.</div>';
		
	case 604:
		return '<div class="error">Gift Category Saved Successfully.</div>';	
	case 605:
		return '<div class="error">Duplicate Gift Category Name.</div>';	
	case 606:
		return '<div class="error">Gift Category Updated Successfully.</div>';
	case 607:
		return '<div class="error">Gift Category Deleted Successfully.</div>';		
		
	case 610:
		return '<div class="error">Region Saved Successfully.</div>';	
	case 611:
		return '<div class="error">Duplicate Region Name.</div>';	
	case 612:
		return '<div class="error">Region Updated Successfully.</div>';
	case 613:
		return '<div class="error">Region Deleted Successfully.</div>';	
		
	case 614:
		return '<div class="error">Product is not available in stock.</div>';	
	case 615:
		return '<div class="error">Contact Added Successfully.</div>';	
	case 616:
		return '<div class="error">Contact Added Successfully...</div>';
	case 617:
		return '<div class="error">Gift Deleted Successfully.</div>';			
	
	//-- ZONE ERROR'S LIST -------------------------------------------------------//
	case 620:
		return '<div class="error">Zone Saved Successfully.</div>';	
	case 621:
		return '<div class="error">Duplicate Zone Name.</div>';	
	case 622:
		return '<div class="error">Zone Updated Successfully.</div>';
	case 623:
		return '<div class="error">Zone Deleted Successfully.</div>';	
	case 6231:
		return '<div class="error">Duplicate Outlet Name for This Zone! </div>';	
		
	//---------------------------------------------------------------------------//
	case 624:
		return '<div class="error">News Saved Successfully.</div>';	
	case 625:
		return '<div class="error">Duplicate Outlet Name.</div>';	
	case 626:
		return '<div class="error">News Updated Successfully.</div>';
	case 627:
		return '<div class="error">News Deleted Successfully.</div>';
		
	case 628:
		return '<div class="error">Model Number Saved Successfully.</div>';	
	case 629:
		return '<div class="error">Duplicate Model Number.</div>';	
	case 630:
		return '<div class="error">Stock Master Updated Successfully.</div>';
	case 631:
		return '<div class="error">Model Number Deleted Successfully.</div>';	
		
	case 632:
		return '<div class="error">Campaign Created Successfully.</div>';	
	case 633:
		return '<div class="error">Campaign Updated Successfully.</div>';	
	case 634:
		return '<div class="error">Error Found! Pls try again </div>';
	case 635:
		return '<div class="error">Sorry! Slot not available on given Activity Date.</div>';	
	case 636:
		return '<div class="error">Status Changed Successfully !</div>';		
		
	case 640:
		return '<div class="error">Nominee added Successfully.</div>';
	case 641:
		return '<div class="error">Category Name added Successfully.</div>';
	case 642:
		return '<div class="error">This Category Name already exist in system</div>';		
	case 802:
		return '<div class="error">Sub Category Name added Successfully.</div>';																		
	
	case 901:
		return '<div class="error">This Sub Category Name already exist in system</div>'; 
	
	case 221:
		return '<div class="error">Duplicate User Name.</div>'; 
	case 222:
		return '<div class="error">Super Admin Created Successfully.</div>'; 
	case 223:
		return '<div class="error">Updated Successfully.</div>'; 
	case 17:
		return '<div class="error">Product is not available in stock.</div>'; 	
	 case 18:
		return '<div class="error">Mail sent to all user successfully!</div>'; 	
	case 19:
		return '<div class="error">Records Saved successfully From CSV!</div>';
		
	case 1000:
		return '<div class="error">Product Added Successfully</div>';	
	
	case 1001:
		return '<div class="error">Hospital Added Successfully</div>';	
	case 1002:
		return '<div class="error">Nurse Added Successfully</div>';	
	case 1003:
		return '<div class="error">Record updated successfully</div>';	
	case 1004:
		return '<div class="error">City Added Successfully</div>';
	case 1005:
		return '<div class="error">City Updated Successfully</div>';	
		
	case 1006:
		return '<div class="error">Data Added Successfully</div>';	
		
	case 1007:
		return '<div class="error">Data Updated Successfully</div>';		
		
	 
	default:
		return '<div class="error">UNKNOWN ERROR.</div>';
	}
}

// display error
//		array error codes
function showError($error)
{
	$error = array_unique($error);
	foreach($error as $v)
		return getError($v);
		##echo getError($v);
}
function showErrorMessage($error)
{
	echo getError($error);
}

function show_error($valid)
{
	$message="<div class='error' style='padding-bottom:4px;'><br><b>You need to fill the following fields</b><br></div>";
	foreach ($valid as $k => $v) {
		## if ($v[0][1] == false) {
			if ($v[1] === false) {
			// Checking for empty label field.
			## if (empty($v[0][2])) {
			if (empty($v[2])) {
				// then echo the form name of a field.
				$message .= $k.", ";
			}
			else {
				## $message .= "<span class='error'>".$v[0][2].", </span>";
				$message .=$v[2].", ";
			}
		}
	}

	return ("<span class='error'>".rtrim(trim($message), ",")."<br><br></span>"); ## Removing comma from the last.
}
?>