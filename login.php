<!DOCTYPE html>
<html>


<head>

<script language="JavaScript1.2">
function openwindow()
{
	window.open("forgotPassword.php","mywindow","menubar=1,resizable=1,width=350,height=250,top=70,left=20");
}
</script>


<?php include("include/include_files.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>Water Marketing Aqua</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<!--Stylesheets-->
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="css/typography.css" />
<link rel="stylesheet" href="css/tipsy.css" />
<link rel="stylesheet" href="js/cl_editor/jquery.cleditor.css" />
<link rel="stylesheet" href="uploadify/uploadify.css" />
<link rel="stylesheet" href="css/jquery.ui.all.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="js/jq_tables/demo_table_jui.css" />
<link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" />
<link rel="stylesheet" href="css/highlight.css" />
<!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
<!--Javascript-->
<script type="text/javascript" src="js/jquery.min.js"> </script>
<script type="text/javascript" src="js/excanvas.js"> </script>
<script type="text/javascript" src="js/jquery.flot.js"> </script>
<script type="text/javascript" src="js/jquery.flot.stack.js"> </script>
<script type="text/javascript" src="js/jquery.flot.pie.js"> </script>
<script type="text/javascript" src="js/jquery.quicksand.js"> </script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"> </script>
<script type="text/javascript" src="js/jquery.tipsy.js"> </script>
<script type="text/javascript" src="js/cl_editor/jquery.cleditor.min.js"> </script>
<script type="text/javascript" src="uploadify/swfobject.js"></script>
<script type="text/javascript" src="uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript" src="js/jquery.autogrowtextarea.js"></script>
<script type="text/javascript" src="js/form_elements.js"></script>
<script type="text/javascript" src="js/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="js/jquery.ui.slider.js"></script>
<script type="text/javascript" src="js/jquery.ui.progressbar.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="js/fullcalendar.js"></script>
<script type="text/javascript" src="js/gcal.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="js/highlight.js"></script>
<script type="text/javascript" src="js/jq_tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/main.js"> </script>

<script type="text/javascript">

function checkForm(form) {
	
var numtest= /^[0-9]+$/;

var emailtest=/^[a-zA-Z][\w\_\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;

	if(form.user_name.value=='') {
		alert("Please enter email.");
		form.user_name.focus();
		form.user_name.value="";
		return(false);
	}
	
	if(!(emailtest.test(form.user_name.value)))
	{
	alert("Please enter valid email!");
	form.user_name.focus();
	form.user_name.value="";
	return(false);
	}	
	
	if(form.user_password.value=='') {
		alert("Please enter password.");
		form.user_password.focus();
		form.user_password.value="";
		return(false);
	}
	
		
    
}
	

</script>


</head>


<body id="login_container">

<!--Oxygen Container-->
<div id="oxygen_container">


    <div id="login">
    	
<?php 
if(isset($_REQUEST['error']) && $_REQUEST['error'] !='')
{
?>
<script type="text/javascript">
document.getElementById("demo").style.top = -30 + "px";
</script>


<div class="error1" style="top:72px;">
        <div class="error_inner">

<?php 	$g_error[]	=	$_REQUEST['error'];
if(count($g_error))
echo showError($g_error);		
if(count($valid_array))	
echo show_error($valid_array);
?>
        </div>
</div>

<?php } ?>	

<div id="logo" style="font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;  color:#FFF; font-size:25px; margin-bottom:10px;"><img src="images/WM.png" height="100px" border="0" title="Logo"/></a></div>
        <form action="login-check.php" method="post" onSubmit="return checkForm(this);">
        	<div class="input_box"> <span class="iconsweet">a</span><input  placeholder="User Name" name="user_name" type="text" id="user_name" value=""></div>
            <div class="input_box"> <span class="iconsweet">y</span><input placeholder="Password" name="user_password" type="password" id="user_password" value=""></div>
            <div> <a class="forgot_password" href="javascript: openwindow()">Have you forgotten your password?</a> <input name="login" type="submit" value="login"></div>
        </form>
    </div>

</div>

</body>


</html>