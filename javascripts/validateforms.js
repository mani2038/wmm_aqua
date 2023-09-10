// JavaScript Document

function checkleaveapplyform(form) {
	
//var stringtest = /^[A-Za-z]+[ ]*[A-Za-z]+$/;
var stringtesta = /^([A-Za-z]+[ ]*)+[A-Za-z]$/; // it allows alphabet and space between two words only
var stringtestb = /^([A-Za-z0-9]+[ ]*)+[A-Za-z0-9]$/; // it allws alphabet,number and space between two words only

var passwordtest = /^([A-Za-z0-9]+)+[A-Za-z0-9]$/; // it allws alphabet,number and space between two words only


var numtest= /^[0-9]+$/;

var emailtest=/^[a-zA-Z][\w\_\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;

	if(form.emp_name.value=='') {
		alert("Please enter Name");
		form.emp_name.focus();
		return(false);
	}
	
	if(!(stringtesta.test(form.emp_name.value)))
	{
	alert("Only charecters are allowed for name!");
	form.emp_name.focus();
	return(false);
	}
	
	if(form.emp_dept.value=='') {
		alert("Please enter department");
		form.emp_dept.focus();
		return(false);
	}
	
	if(!(stringtestb.test(form.emp_dept.value)))
	{
	alert("Only charecters are allowed for department!");
	form.emp_dept.focus();
	return(false);
	}
	
	if(form.emp_job_title.value=='') {
		alert("Please enter job title");
		form.emp_job_title.focus();
		return(false);
	}
	
	if(form.emp_email.value=='') {
		alert("Please enter email");
		form.emp_email.focus();
		return(false);
	}
	
	if(!(emailtest.test(form.emp_email.value)))
	{
	alert("Please enter valid email!");
	form.emp_email.focus();
	return(false);
	}

	if(form.emp_phone.value=='') {
		alert("Please enter phone");
		form.emp_phone.focus();
		return(false);
	}

    if(!(numtest.test(form.emp_phone.value)))
	{
	alert("Please enter only numeric value for phone !");
	form.emp_phone.focus();
	return(false);
	}
	  
}


function checkloginform(form) {
	var stringtestb = /^([A-Za-z0-9]+[ ]*)+[A-Za-z0-9]$/; // it allws alphabet,number and space between two words only

    var passwordtest = /^([A-Za-z0-9]+)+[A-Za-z0-9]$/; // it allows alphabet,number only
	
	if(form.user_name.value=='') {
		alert("Please enter User Name");
		form.user_name.focus();
		return(false);
	}
	
	if(!(stringtestb.test(form.user_name.value)))
	{
	alert("Only charecters are allowed for User Name!");
	form.user_name.focus();
	return(false);
	}
	
	if(form.user_password.value=='') {
		alert("Please enter password");
		form.user_password.focus();
		return(false);
	}
	
	if(!(passwordtest.test(form.user_password.value)))
	{
	alert("Only alphabet and nuimbers are allowed for Password!");
	form.user_password.focus();
	return(false);
	}
	
}

function checkleaveappform(form) {
	var rad_val='';
		
	if(form.from_date.value=='') {
		alert("Please enter From Date");
		form.from_date.focus();
		return(false);
	}
	
	if(form.to_date.value=='') {
		alert("Please enter To Date");
		form.to_date.focus();
		return(false);
	}
	
	if(form.to_date.value < form.from_date.value ) {
		alert("The date range are invalid");
		form.to_date.focus();
		return(false);
	}
	
	for (var i=0; i < document.leaveform.halfday.length; i++){
		if (document.leaveform.halfday[i].checked) {
			rad_val = document.leaveform.halfday[i].value;
        }
    }
	
	if(form.to_date.value == form.from_date.value ) {
		if(rad_val==''){
			alert("Please check the option Half Day or Full Day");
			return(false);
		}
		
	}
	
	if(form.to_date.value != form.from_date.value ) {
		for (var i=0; i < form.halfday.length; i++){
			if (form.halfday[i].checked) {
				var rad_val = form.halfday[i].value;
            }
        }
			
		if(rad_val==4) {
			confirm("Do you want to take half day leave on each day. If not then do not selct the radio option.");
		}
		
	}
	
 return true;	
}

function validateAttendanceForm(form) {
	if(form.from_date.value=='') {
		alert("Please select a date for from level.");
		form.from_date.focus();
		return(false);
	}
	
	if(form.to_date.value=='') {
		alert("Please select a date for to level.");
		form.to_date.focus();
		return(false);
	}
	
	if(form.to_date.value < form.from_date.value ) {
		alert("the date range is invalid.");
		form.to_date.focus();
		return(false);
	}
	
}
