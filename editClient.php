<?php include_once('commonFunction.php'); ?>

<script language = "JavaScript">
function check()
{
	var numtest= /^[0-9]+$/;
	
	if (document.form1.companyname.value=="")
	{
		alert("Please Enter the New Client Name to add.");
		document.form1.companyname.focus();
		return false;
	}
	
	
	
	if (document.form1.p_m1.value=="")
	{
		alert("Please Enter the Pessimistic M1 - Target");
		document.form1.p_m1.focus();
		return false;
	}
	if(!(numtest.test(form1.p_m1.value)))
	{
	alert("Only Digits Required!");
	form1.p_m1.value = "";
	form1.p_m1.focus();
	return(false);
	}
	
	if (document.form1.p_m2.value=="")
	{
		alert("Please Enter the Pessimistic M2 - Target");
		document.form1.p_m2.focus();
		return false;
	}
	if(!(numtest.test(form1.p_m2.value)))
	{
	alert("Only Digits Required!");
	form1.p_m2.value = "";
	form1.p_m2.focus();
	return(false);
	}
	
	if (document.form1.p_m3.value=="")
	{
		alert("Please Enter the Pessimistic M3 - Target");
		document.form1.p_m3.focus();
		return false;
	}
	if(!(numtest.test(form1.p_m3.value)))
	{
	alert("Only Digits Required!");
	form1.p_m3.value = "";
	form1.p_m3.focus();
	return(false);
	}
	
	if (document.form1.p_m4.value=="")
	{
		alert("Please Enter the Pessimistic M4 - Target");
		document.form1.p_m4.focus();
		return false;
	}
	if(!(numtest.test(form1.p_m4.value)))
	{
	alert("Only Digits Required!");
	form1.p_m4.value = "";
	form1.p_m4.focus();
	return(false);
	}
	
	if (document.form1.p_m5.value=="")
	{
		alert("Please Enter the Pessimistic M5 - Target");
		document.form1.p_m5.focus();
		return false;
	}
	if(!(numtest.test(form1.p_m5.value)))
	{
	alert("Only Digits Required!");
	form1.p_m5.value = "";
	form1.p_m5.focus();
	return(false);
	}
	
	if (document.form1.p_m6.value=="")
	{
		alert("Please Enter the Pessimistic M6 - Target");
		document.form1.p_m6.focus();
		return false;
	}
	if(!(numtest.test(form1.p_m6.value)))
	{
	alert("Only Digits Required!");
	form1.p_m6.value = "";
	form1.p_m6.focus();
	return(false);
	}
	
	if (document.form1.p_m7.value=="")
	{
		alert("Please Enter the Pessimistic M7 - Target");
		document.form1.p_m7.focus();
		return false;
	}
	if(!(numtest.test(form1.p_m7.value)))
	{
	alert("Only Digits Required!");
	form1.p_m7.value = "";
	form1.p_m7.focus();
	return(false);
	}
	
	
	if (document.form1.p_m8.value=="")
	{
		alert("Please Enter the Pessimistic M8 - Target");
		document.form1.p_m8.focus();
		return false;
	}
	if(!(numtest.test(form1.p_m8.value)))
	{
	alert("Only Digits Required!");
	form1.p_m8.value = "";
	form1.p_m8.focus();
	return(false);
	}
	
	if (document.form1.p_m9.value=="")
	{
		alert("Please Enter the Pessimistic M9 - Target");
		document.form1.p_m9.focus();
		return false;
	}
	if(!(numtest.test(form1.p_m9.value)))
	{
	alert("Only Digits Required!");
	form1.p_m9.value = "";
	form1.p_m9.focus();
	return(false);
	}
	
	if (document.form1.p_m10.value=="")
	{
		alert("Please Enter the Pessimistic M10 - Target");
		document.form1.p_m10.focus();
		return false;
	}
	if(!(numtest.test(form1.p_m10.value)))
	{
	alert("Only Digits Required!");
	form1.p_m10.value = "";
	form1.p_m10.focus();
	return(false);
	}
	
	if (document.form1.p_m11.value=="")
	{
		alert("Please Enter the Pessimistic M11 - Target");
		document.form1.p_m11.focus();
		return false;
	}
	if(!(numtest.test(form1.p_m11.value)))
	{
	alert("Only Digits Required!");
	form1.p_m11.value = "";
	form1.p_m11.focus();
	return(false);
	}
	
	if (document.form1.p_m12.value=="")
	{
		alert("Please Enter the Pessimistic M12 - Target");
		document.form1.p_m12.focus();
		return false;
	}
	if(!(numtest.test(form1.p_m12.value)))
	{
	alert("Only Digits Required!");
	form1.p_m12.value = "";
	form1.p_m12.focus();
	return(false);
	}
	
	if (document.form1.r_m1.value=="")
	{
		alert("Please Enter the Realistic R1 - Target");
		document.form1.r_m1.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m1.value)))
	{
	alert("Only Digits Required!");
	form1.r_m1.value = "";
	form1.r_m1.focus();
	return(false);
	}
	
	if (document.form1.r_m2.value=="")
	{
		alert("Please Enter the Realistic R2 - Target");
		document.form1.r_m2.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m2.value)))
	{
	alert("Only Digits Required!");
	form1.r_m2.value = "";
	form1.r_m2.focus();
	return(false);
	}
	
	if (document.form1.r_m2.value=="")
	{
		alert("Please Enter the Realistic R2 - Target");
		document.form1.r_m2.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m2.value)))
	{
	alert("Only Digits Required!");
	form1.r_m2.value = "";
	form1.r_m2.focus();
	return(false);
	}
	
	if (document.form1.r_m3.value=="")
	{
		alert("Please Enter the Realistic R3 - Target");
		document.form1.r_m3.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m3.value)))
	{
	alert("Only Digits Required!");
	form1.r_m3.value = "";
	form1.r_m3.focus();
	return(false);
	}
	
	if (document.form1.r_m4.value=="")
	{
		alert("Please Enter the Realistic R4 - Target");
		document.form1.r_m4.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m4.value)))
	{
	alert("Only Digits Required!");
	form1.r_m4.value = "";
	form1.r_m4.focus();
	return(false);
	}
	
	if (document.form1.r_m5.value=="")
	{
		alert("Please Enter the Realistic R5 - Target");
		document.form1.r_m5.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m5.value)))
	{
	alert("Only Digits Required!");
	form1.r_m5.value = "";
	form1.r_m5.focus();
	return(false);
	}
	
	if (document.form1.r_m6.value=="")
	{
		alert("Please Enter the Realistic R6 - Target");
		document.form1.r_m6.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m6.value)))
	{
	alert("Only Digits Required!");
	form1.r_m6.value = "";
	form1.r_m6.focus();
	return(false);
	}
	
	if (document.form1.r_m7.value=="")
	{
		alert("Please Enter the Realistic R7 - Target");
		document.form1.r_m7.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m7.value)))
	{
	alert("Only Digits Required!");
	form1.r_m7.value = "";
	form1.r_m7.focus();
	return(false);
	}
	
	if (document.form1.r_m8.value=="")
	{
		alert("Please Enter the Realistic R8 - Target");
		document.form1.r_m8.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m8.value)))
	{
	alert("Only Digits Required!");
	form1.r_m8.value = "";
	form1.r_m8.focus();
	return(false);
	}
	
	if (document.form1.r_m9.value=="")
	{
		alert("Please Enter the Realistic R9 - Target");
		document.form1.r_m9.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m9.value)))
	{
	alert("Only Digits Required!");
	form1.r_m9.value = "";
	form1.r_m9.focus();
	return(false);
	}
	
	if (document.form1.r_m10.value=="")
	{
		alert("Please Enter the Realistic R10 - Target");
		document.form1.r_m10.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m10.value)))
	{
	alert("Only Digits Required!");
	form1.r_m10.value = "";
	form1.r_m10.focus();
	return(false);
	}
	
	if (document.form1.r_m11.value=="")
	{
		alert("Please Enter the Realistic R11 - Target");
		document.form1.r_m11.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m11.value)))
	{
	alert("Only Digits Required!");
	form1.r_m11.value = "";
	form1.r_m11.focus();
	return(false);
	}
	
	if (document.form1.r_m12.value=="")
	{
		alert("Please Enter the Realistic R12 - Target");
		document.form1.r_m12.focus();
		return false;
	}
	if(!(numtest.test(form1.r_m12.value)))
	{
	alert("Only Digits Required!");
	form1.r_m12.value = "";
	form1.r_m12.focus();
	return(false);
	}
	
	if (document.form1.o_m1.value=="")
	{
		alert("Please Enter the Optimistic O1 - Target");
		document.form1.o_m1.focus();
		return false;
	}
	if(!(numtest.test(form1.o_m1.value)))
	{
	alert("Only Digits Required!");
	form1.o_m1.value = "";
	form1.o_m1.focus();
	return(false);
	}

		if (document.form1.o_m2.value=="")
	{
		alert("Please Enter the Optimistic O2 - Target");
		document.form1.o_m2.focus();
		return false;
	}
	if(!(numtest.test(form1.o_m2.value)))
	{
	alert("Only Digits Required!");
	form1.o_m2.value = "";
	form1.o_m2.focus();
	return(false);
	}
	
		if (document.form1.o_m3.value=="")
	{
		alert("Please Enter the Optimistic O3 - Target");
		document.form1.o_m3.focus();
		return false;
	}
	if(!(numtest.test(form1.o_m3.value)))
	{
	alert("Only Digits Required!");
	form1.o_m3.value = "";
	form1.o_m3.focus();
	return(false);
	}
	
		if (document.form1.o_m4.value=="")
	{
		alert("Please Enter the Optimistic O4 - Target");
		document.form1.o_m4.focus();
		return false;
	}
	if(!(numtest.test(form1.o_m4.value)))
	{
	alert("Only Digits Required!");
	form1.o_m4.value = "";
	form1.o_m4.focus();
	return(false);
	}
	
		if (document.form1.o_m5.value=="")
	{
		alert("Please Enter the Optimistic O5 - Target");
		document.form1.o_m5.focus();
		return false;
	}
	if(!(numtest.test(form1.o_m5.value)))
	{
	alert("Only Digits Required!");
	form1.o_m5.value = "";
	form1.o_m5.focus();
	return(false);
	}
	
		if (document.form1.o_m6.value=="")
	{
		alert("Please Enter the Optimistic O6 - Target");
		document.form1.o_m6.focus();
		return false;
	}
	if(!(numtest.test(form1.o_m6.value)))
	{
	alert("Only Digits Required!");
	form1.o_m6.value = "";
	form1.o_m6.focus();
	return(false);
	}
	
		if (document.form1.o_m7.value=="")
	{
		alert("Please Enter the Optimistic O7 - Target");
		document.form1.o_m7.focus();
		return false;
	}
	if(!(numtest.test(form1.o_m7.value)))
	{
	alert("Only Digits Required!");
	form1.o_m7.value = "";
	form1.o_m7.focus();
	return(false);
	}
	
		if (document.form1.o_m8.value=="")
	{
		alert("Please Enter the Optimistic O8 - Target");
		document.form1.o_m9.focus();
		return false;
	}
	if(!(numtest.test(form1.o_m8.value)))
	{
	alert("Only Digits Required!");
	form1.o_m8.value = "";
	form1.o_m8.focus();
	return(false);
	}
	
		if (document.form1.o_m10.value=="")
	{
		alert("Please Enter the Optimistic O10 - Target");
		document.form1.o_m10.focus();
		return false;
	}
	if(!(numtest.test(form1.o_m10.value)))
	{
	alert("Only Digits Required!");
	form1.o_m10.value = "";
	form1.o_m10.focus();
	return(false);
	}
	
		if (document.form1.o_m11.value=="")
	{
		alert("Please Enter the Optimistic O11 - Target");
		document.form1.o_m11.focus();
		return false;
	}
	if(!(numtest.test(form1.o_m11.value)))
	{
	alert("Only Digits Required!");
	form1.o_m11.value = "";
	form1.o_m11.focus();
	return(false);
	}
	
		if (document.form1.o_m12.value=="")
	{
		alert("Please Enter the Optimistic O12 - Target");
		document.form1.o_m12.focus();
		return false;
	}
	if(!(numtest.test(form1.o_m12.value)))
	{
	alert("Only Digits Required!");
	form1.o_m12.value = "";
	form1.o_m12.focus();
	return(false);
	}
	
		return true;
}
</script>


<?php  
         
$clientID = $_REQUEST['clientID'];


if(isset($_POST['p_m1']) && $_POST['p_m1']!='')
{

$companyname = addslashes(trim($_POST['companyname']));

$contact = addslashes(trim($_POST['contact']));

$desg = addslashes(trim($_POST['desg']));

$email = addslashes(trim($_POST['email']));

$add1 = addslashes(trim($_POST['add1']));

$email2 = addslashes(trim($_POST['email2']));

$add2 = addslashes(trim($_POST['add2']));


$ph1_ext = addslashes(trim($_POST['ph1_ext']));
$ph2_ext = addslashes(trim($_POST['ph2_ext']));
$phone1 = addslashes(trim($_POST['phone1']));

$ccity = addslashes(trim($_POST['ccity']));

$ph1_ext2 = addslashes(trim($_POST['ph1_ext2']));
$ph2_ext2 = addslashes(trim($_POST['ph2_ext2']));
$phone2 = addslashes(trim($_POST['phone2']));

$country = addslashes(trim($_POST['country']));

$ph1_ext3 = addslashes(trim($_POST['ph1_ext3']));
$ph2_ext3 = addslashes(trim($_POST['ph2_ext3']));
$phone3 = addslashes(trim($_POST['phone3']));

$pin = addslashes(trim($_POST['pin']));

$mob = addslashes(trim($_POST['mob']));

$url = addslashes(trim($_POST['url']));

$p_m1 = addslashes(trim($_POST['p_m1']));
$p_m2 = addslashes(trim($_POST['p_m2']));
$p_m3 = addslashes(trim($_POST['p_m3']));
$p_m4 = addslashes(trim($_POST['p_m4']));
$p_m5 = addslashes(trim($_POST['p_m5']));
$p_m6 = addslashes(trim($_POST['p_m6']));
$p_m7 = addslashes(trim($_POST['p_m7']));
$p_m8 = addslashes(trim($_POST['p_m8']));
$p_m9 = addslashes(trim($_POST['p_m9']));
$p_m10 = addslashes(trim($_POST['p_m10']));
$p_m11 = addslashes(trim($_POST['p_m11']));
$p_m12 = addslashes(trim($_POST['p_m12']));

$o_m1 = addslashes(trim($_POST['o_m1']));
$o_m2 = addslashes(trim($_POST['o_m2']));
$o_m3 = addslashes(trim($_POST['o_m3']));
$o_m4 = addslashes(trim($_POST['o_m4']));
$o_m5 = addslashes(trim($_POST['o_m5']));
$o_m6 = addslashes(trim($_POST['o_m6']));
$o_m7 = addslashes(trim($_POST['o_m7']));
$o_m8 = addslashes(trim($_POST['o_m8']));
$o_m9 = addslashes(trim($_POST['o_m9']));
$o_m10 = addslashes(trim($_POST['o_m10']));

$o_m11 = addslashes(trim($_POST['o_m11']));
$o_m12 = addslashes(trim($_POST['o_m12']));

$r_m1 = addslashes(trim($_POST['r_m1']));
$r_m2 = addslashes(trim($_POST['r_m2']));
$r_m3 = addslashes(trim($_POST['r_m3']));
$r_m4 = addslashes(trim($_POST['r_m4']));
$r_m5 = addslashes(trim($_POST['r_m5']));
$r_m6 = addslashes(trim($_POST['r_m6']));
$r_m7 = addslashes(trim($_POST['r_m7']));
$r_m8 = addslashes(trim($_POST['r_m8']));
$r_m9 = addslashes(trim($_POST['r_m9']));
$r_m10 = addslashes(trim($_POST['r_m10']));
$r_m11 = addslashes(trim($_POST['r_m11']));
$r_m12 = addslashes(trim($_POST['r_m12']));

$zone = addslashes(trim($_POST['zone']));

$ad = addslashes(trim($_POST['ad']));


$sql1="UPDATE oxy2_clientn SET companyname = '$companyname',p_m1='$p_m1',o_m1='$o_m1',r_m1='$r_m1',p_m2='$p_m2',o_m2='$o_m2',r_m2='$r_m2',p_m3='$p_m3',o_m3='$o_m3',r_m3='$r_m3',p_m4='$p_m4',o_m4='$o_m4',r_m4='$r_m4',p_m5='$p_m5',o_m5='$o_m5',r_m5='$r_m5',p_m6='$p_m6',o_m6='$o_m6',r_m6='$r_m6',p_m7='$p_m7',o_m7='$o_m7',r_m7='$r_m7',p_m8='$p_m8',o_m8='$o_m8',r_m8='$r_m8',p_m9='$p_m9',o_m9='$o_m9',r_m9='$r_m9',r_m10='$r_m10',p_m10='$p_m10',o_m10='$o_m10',r_m11='$r_m11',p_m11='$p_m11',o_m11='$o_m11',r_m12='$r_m12',p_m12='$p_m12',o_m12='$o_m12',contact='$contact',lname='',add1='$add1',add2='$add2',ccity='$ccity',country='$country',pin='$pin',ph1_ext='$ph1_ext',ph2_ext='$ph2_ext',phone1='$phone1',ph1_ext2='$ph1_ext2',ph2_ext2='$ph2_ext2',phone2='$phone2',ph1_ext3='$ph1_ext3',ph2_ext3='$ph2_ext3',phone3='$phone3',mob='$mob',email='$email',email2='$email2',desg='$desg',url='$url',zone='$zone',ad='$ad',dateAdded=date_add(now(), interval 630 minute) WHERE id='$clientID'";
$result = mysqli_query($con,$sql1);


header("location:.?id=2&subId=8");


}

$SelQuery = "SELECT * FROM oxy2_clientn WHERE id = '$clientID'";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				$companyname1= $SelResult['companyname'];
					
				$ad1= $SelResult['ad'];
				
				$p_m11= $SelResult['p_m1'];
				$o_m11= $SelResult['o_m1'];
				$r_m11= $SelResult['r_m1'];
				
				$p_m21= $SelResult['p_m2'];
				$o_m21= $SelResult['o_m2'];
				$r_m21= $SelResult['r_m2'];
				
				$p_m31= $SelResult['p_m3'];
				$o_m31= $SelResult['o_m3'];
				$r_m31= $SelResult['r_m3'];
				
				$p_m41= $SelResult['p_m4'];
				$o_m41= $SelResult['o_m4'];
				$r_m41= $SelResult['r_m4'];
				
				$p_m51= $SelResult['p_m5'];
				$o_m51= $SelResult['o_m5'];
				$r_m51= $SelResult['r_m5'];
				
				$p_m61= $SelResult['p_m6'];
				$o_m61= $SelResult['o_m6'];
				$r_m61= $SelResult['r_m6'];
				
				$p_m71= $SelResult['p_m7'];
				$o_m71= $SelResult['o_m7'];
				$r_m71= $SelResult['r_m7'];
				
				$p_m81= $SelResult['p_m8'];
				$o_m81= $SelResult['o_m8'];
				$r_m81= $SelResult['r_m8'];
				
				$p_m91= $SelResult['p_m9'];
				$o_m91= $SelResult['o_m9'];
				$r_m91= $SelResult['r_m9'];
				
				$p_m101= $SelResult['p_m10'];
				$o_m101= $SelResult['o_m10'];
				$r_m101= $SelResult['r_m10'];
				
				$p_m111= $SelResult['p_m11'];
				$o_m111= $SelResult['o_m11'];
				$r_m111= $SelResult['r_m11'];
				
				$p_m121= $SelResult['p_m12'];
				$o_m121= $SelResult['o_m12'];
				$r_m121= $SelResult['r_m12'];
				
				$contact1= $SelResult['contact'];
				
				$lname1= $SelResult['lname'];
				
				$add11= $SelResult['add1'];
				
				$add21= $SelResult['add2'];
				
				$ccity1= $SelResult['ccity'];
				
				$country1= $SelResult['country'];
				
				$pin1= $SelResult['pin'];
				
				$ph1_ext1= $SelResult['ph1_ext'];
				
				$ph2_ext1= $SelResult['ph2_ext'];
				
				$phone11= $SelResult['phone1'];
				
				$ph1_ext21= $SelResult['ph1_ext2'];
				
				$ph2_ext21= $SelResult['ph2_ext2'];
				
				$phone21= $SelResult['phone2'];
				
				$ph1_ext31= $SelResult['ph1_ext3'];
				
				$ph2_ext31= $SelResult['ph2_ext3'];
				
				$phone31= $SelResult['phone3'];
				
				$mob1= $SelResult['mob'];
				
				$email1= $SelResult['email'];
				
				$email21= $SelResult['email2'];
				
				$desg1= $SelResult['desg'];
				
				$url1= $SelResult['url'];
				
				$zone1= $SelResult['zone'];
				
				$ad1= $SelResult['ad'];
				
								
				}
}
				
				
?>  


<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span>
        	<h5>Edit Client Detail</h5></div>
            <div class="widget_body">
				<!--Form fields-->
                
              <form action="#" method="post" name="form1" id="form1" onSubmit="return check()" style="color: #818386;margin: 5px 0px 5px 25px;">
              <input name="companyname" id="companyname"  type="hidden" class="tip_east" value="<?php echo $companyname1; ?>">
                    <table width="879" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="24" valign="middle">Organization Name</td>
                        <td>
                        <div class="form_input"><input name="companyname1" id="companyname1"  type="text" class="tip_east" title="Organization Name" value="<?php echo $companyname1; ?>"  disabled="disabled"></div>
                       </td>
                       <td colspan="2"></td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td width="15%" height="24" valign="middle">Client Name</td>
                        <td>
                        <div class="form_input"><input name="contact" id="contact"  type="text" class="tip_east" title="Client Name" value="<?php echo $contact1; ?>"></div>
                       </td>
                       <td colspan="2"></td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td valign="middle">Desgination</td>
                        <td>
                        <div class="form_input"><input name="desg" id="desg"  type="text" class="tip_east" title="Designation" value="<?php echo $desg1; ?>"></div>
                       
                        <td colspan="-1">&nbsp;</td>
                        <td>&nbsp; 
                          </td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td valign="middle">Address 
                          1</td>
                        <td valign="top">
                         <div class="form_input"><input name="add1" id="add1"  type="text" class="tip_east" title="Address 1" value="<?php echo $add11; ?>"></div>
                       </td>
                        <td colspan="-1" valign="top">&nbsp;</td>
                        <td valign="top">&nbsp;</td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td valign="middle">Address 
                          2</td>
                        <td> <div align="left"> <div class="form_input"><input name="add2" id="add2"  type="text" class="tip_east" title="Address 1" value="<?php echo $add21; ?>"></div>
                            
                            </div></td>
                        <td colspan="-1">Email 
                          Id</td>
                        <td><div class="form_input"><input name="email" id="email"  type="text" class="tip_east" title="Address 1" value="<?php echo $email1; ?>"></div>

                         
                          </td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td valign="middle">City</td>
                        <td>
                        <div class="form_input"><input name="ccity" id="ccity"  type="text" class="tip_east" title="Address 1" value="<?php echo $ccity1; ?>"></div>

                        </td>
                        <td colspan="-1">Alternate 
                          Email Id</td>
                        <td><div class="form_input"><input name="email2" id="email2"  type="text" class="tip_east" title="Address 1" value="<?php echo $email21; ?>"></div>

                        
                          </td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td height="26" valign="middle">Country</td>
                        <td>
                        <div class="form_input"><input name="country" id="country"  type="text" class="tip_east" title="Address 1" value="<?php echo $country1; ?>"></div>

                       </td>
                        <td colspan="-1">Telephone</td>
                        <td width="32%">
                        <div class="form_input">
                        <table width="86%" border="0" cellspacing="1" cellpadding="1">
                            <tr>
                            <td>
                        <input name="ph1_ext" id="ph1_ext"  type="text" class="tip_east" title="Address 1" value="<?php echo $ph1_ext1; ?>"></td>
                            <td> <input name="ph2_ext" id="ph2_ext"  type="text" class="tip_east" title="Address 1" value="<?php echo $ph2_ext1; ?>"></td>
                            <td> <input name="phone1" id="phone1"  type="text" class="tip_east" title="Address 1" value="<?php echo $phone11; ?>"></td>
                            </tr>
                            </table>   
                       
                        
                        </div>

                       </td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td valign="middle">Zip 
                          Code</td>
                        <td><div class="form_input"><input name="pin" id="pin"  type="text" class="tip_east" title="Address 1" value="<?php echo $pin1; ?>"></div>
                         
                          </td>
                        <td colspan="-1">Telephone 
                          </td>
                        <td><div class="form_input">
                        
                         <table width="86%" border="0" cellspacing="1" cellpadding="1">
                            <tr>
                            <td>
                       				<input name="ph1_ext2" id="ph1_ext2"  type="text" class="tip_east" title="Address 1" value="<?php echo $ph1_ext21; ?>"></td>
                            <td> <input name="ph2_ext2" id="ph2_ext2"  type="text" class="tip_east" title="Address 1" value="<?php echo $ph2_ext21; ?>"></td>
                            <td>  <input name="phone2" id="phone2"  type="text" class="tip_east" title="Address 1" value="<?php echo $phone21; ?>"></td>
                            </tr>
                            </table>
                         </div>
                        </td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td valign="middle">Mobile 
                          Number</td>
                        <td><div class="form_input"><input name="mob" id="mob"  type="text" class="tip_east" title="Address 1" value="<?php echo $mob1; ?>"></div>
                         
                          &nbsp;(Ex : 1234567890) </td>
                        <td colspan="-1">Fax 
                          </td>
                        <td><div class="form_input">
                        
                        <table width="86%" border="0" cellspacing="1" cellpadding="1">
                            <tr>
                            <td>
                       				<input name="ph1_ext3" id="ph1_ext3"  type="text" class="tip_east" title="Address 1" value="<?php echo $ph1_ext31; ?>"></td>
                            <td>   <input name="ph2_ext3" id="ph2_ext3"  type="text" class="tip_east" title="Address 1" value="<?php echo $ph2_ext31; ?>"></td>
                            <td>    <input name="phone3" id="phone3"  type="text" class="tip_east" title="Address 1" value="<?php echo $phone31; ?>"></td>
                            </tr>
                            </table>
                        
                        
                        
                      
                      
                        
                        </div>
                          
                         
                        </td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr align="left" bgcolor="#FFFFFF"> 
                        <td valign="middle">&nbsp;</td>
                        <td valign="middle">&nbsp; 
                          </td>
                        <td width="14%" colspan="-1" valign="middle">URL</td>
                        <td valign="middle">
                         <div class="form_input"><input name="url" id="url"  type="text" class="tip_east" title="URL" value="<?php echo $url1; ?>"></div>
                       </td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr align="left" bgcolor="#FFFFFF">
                        <td valign="middle">&nbsp;</td>
                        <td valign="middle">&nbsp;</td>
                        <td valign="middle">&nbsp;</td>
                        <td valign="middle">&nbsp;</td>
                      </tr>
                      
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle"><fieldset>
                        <legend><span class="style2">Client Monthly Pessimistic Target</span></legend>
                        
                        <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1">
                          <tr>
                            <td width="16%">&nbsp;</td>
                            <td width="27%">&nbsp;</td>
                            <td width="2%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="34%">&nbsp;</td>
                            <td width="3%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">Jan - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m1" id="p_m1"  type="text" class="tip_east"  value="<?php echo $p_m11; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">July - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m2" id="p_m2"  type="text" class="tip_east" value="<?php echo $p_m21; ?>"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">Feb - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m3" id="p_m3"  type="text" class="tip_east"  value="<?php echo $p_m31; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">August - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m4" id="p_m4"  type="text" class="tip_east"  value="<?php echo $p_m41; ?>"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">March - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m5" id="p_m5"  type="text" class="tip_east"  value="<?php echo $p_m51; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">September - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m6" id="p_m6"  type="text" class="tip_east"  value="<?php echo $p_m61; ?>"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">April - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m7" id="p_m7"  type="text" class="tip_east"  value="<?php echo $p_m71; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">October - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m8" id="p_m8"  type="text" class="tip_east"  value="<?php echo $p_m81; ?>"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">May - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                            <div class="form_input"><input name="p_m9" id="p_m9"  type="text" class="tip_east"  value="<?php echo $p_m91; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">November - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m10" id="p_m10"  type="text" class="tip_east"  value="<?php echo $p_m101; ?>"></div>
                           </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">June - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m11" id="p_m11"  type="text" class="tip_east"  value="<?php echo $p_m111; ?>"></div>
                            </td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">December - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m12" id="p_m12"  type="text" class="tip_east"  value="<?php echo $p_m121; ?>"></div>
                            </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
                        </fieldset>                        </td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle">&nbsp;</td>
                      </tr>
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle"><fieldset>
                        <legend><span class="style2">Client Montly Realistic Target</span>                        </legend>
                        <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1">
                          <tr>
                            <td width="16%">&nbsp;</td>
                            <td width="27%">&nbsp;</td>
                            <td width="3%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="33%">&nbsp;</td>
                            <td width="3%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">Jan - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m1" id="r_m1"  type="text" class="tip_east"  value="<?php echo $r_m11; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">July - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m2" id="r_m2"  type="text" class="tip_east"  value="<?php echo $r_m21; ?>"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">Feb - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m3" id="r_m3"  type="text" class="tip_east"  value="<?php echo $r_m31; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">August - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m4" id="r_m4"  type="text" class="tip_east"  value="<?php echo $r_m41; ?>"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">March - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m5" id="r_m5"  type="text" class="tip_east"  value="<?php echo $r_m51; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">September - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m6" id="r_m6"  type="text" class="tip_east"  value="<?php echo $r_m61; ?>"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">April - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m7" id="r_m7"  type="text" class="tip_east"  value="<?php echo $r_m71; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">October - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m8" id="r_m8"  type="text" class="tip_east"  value="<?php echo $r_m81; ?>"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">May - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                            <div class="form_input"><input name="r_m9" id="r_m9"  type="text" class="tip_east"  value="<?php echo $r_m91; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">November - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m10" id="r_m10"  type="text" class="tip_east"  value="<?php echo $r_m101; ?>"></div>
                           </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">June - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m11" id="r_m11"  type="text" class="tip_east"  value="<?php echo $r_m111; ?>"></div>
                            </td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">December - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m12" id="r_m12"  type="text" class="tip_east"  value="<?php echo $r_m121; ?>"></div>
                            </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
                        </fieldset>                        </td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle">&nbsp;</td>
                      </tr>
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle"><fieldset>
                        <legend><span class="style2">Client Montly Optimistic Target</span>                        </legend>
                        <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1">
                          <tr>
                            <td width="16%">&nbsp;</td>
                            <td width="27%">&nbsp;</td>
                            <td width="4%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="32%">&nbsp;</td>
                            <td width="3%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">Jan - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m1" id="o_m1"  type="text" class="tip_east"  value="<?php echo $o_m11; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">July - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m2" id="o_m2"  type="text" class="tip_east"  value="<?php echo $o_m21; ?>"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">Feb - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m3" id="o_m3"  type="text" class="tip_east"  value="<?php echo $o_m31; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">August - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m4" id="o_m4"  type="text" class="tip_east"  value="<?php echo $o_m41; ?>"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">March - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m5" id="o_m5"  type="text" class="tip_east"  value="<?php echo $o_m51; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">September - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m6" id="o_m6"  type="text" class="tip_east"  value="<?php echo $o_m61; ?>"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">April - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m7" id="o_m7"  type="text" class="tip_east"  value="<?php echo $o_m71; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">October - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m8" id="o_m8"  type="text" class="tip_east"  value="<?php echo $o_m81; ?>"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">May - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                            <div class="form_input"><input name="o_m9" id="o_m9"  type="text" class="tip_east"  value="<?php echo $o_m91; ?>"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">November - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m10" id="o_m10"  type="text" class="tip_east"  value="<?php echo $o_m101; ?>"></div>
                           </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">June - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m11" id="o_m11"  type="text" class="tip_east"  value="<?php echo $o_m111; ?>"></div>
                            </td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">December - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m12" id="o_m12"  type="text" class="tip_east"  value="<?php echo $o_m121; ?>"></div>
                            </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
                        </fieldset>                        </td>
                      </tr>
                      
                       <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle">&nbsp;</td>
                      </tr>
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle"><fieldset>
                        <legend><span class="style2">Account Specification</span></legend>
                        
                        <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1">
                          <tr>
                            <td width="16%"><span class="style1">Zone </span></td>
                            <td width="32%"><select name="zone" id="zone">
                              <option value="">Select Zone</option>
                                                          
                       <option value="North" <?php if($zone1 == "North"){echo "selected = selected";} ?>>North</option>
                        <option value="South" <?php if($zone1 == "South"){echo "selected = selected";} ?>>South</option>
                         <option value="East" <?php if($zone1 == "East"){echo "selected = selected";} ?>>East</option>
                         <option value="West" <?php if($zone1 == "West"){echo "selected = selected";} ?>>West</option>
                        <option value="Singapore" <?php if($zone1 == "Singapore"){echo "selected = selected";} ?>>Singapore</option>
                        						
               	      </select> 
                            </select></td>
                            <td width="18%"><span class="style1">Account Director </span></td>
                            <td width="34%"><SELECT NAME="ad" class="select" id="ad">
                              <option>Select Account Director</option>
                	    <?php
                        $que="SELECT * FROM oxy2_users ";
                        $res=mysqli_query($con,$que);
                        while($row=mysqli_fetch_array($res))
                        {
                        $fname = $row[fname];
						$lname = $row[lname];
						$cNAme = $fname." ".$lname;
						$user_id = $row[user_id];
						if($user_id == $ad1){$ad_sel="Selected = selected";}
						else{$ad_sel = "";}
                        echo "<option value='$user_id' $ad_sel>$cNAme</option>";
                        }                        
                        ?></SELECT></td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
                        </fieldset></td>
                      </tr>
                      
                      <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td colspan="4" align="center"> <div align="right"> 
						
                            <input name="Submit" type="submit" id="Submit" value="Update" style="background: #CCC;color:#000000;text-shadow: 1px 1px #DDD; padding:6px;border-radius:5px; font-weight:bold;">
                            &nbsp; </div></td>
                      </tr>
                      <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                    </table>
                  </form>
                
                
                <!--  Ended-->
            </div>
        </div>
    </div>
                     
 	<br class="clear" />   