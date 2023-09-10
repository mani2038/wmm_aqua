
<link rel="stylesheet" href="css/wizard.css" type="text/css" />


<!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
<!--Javascript-->
<script type="text/javascript" src="js/jquery.min.js"> </script>


<script type="text/javascript" src="js/jquery.tipsy.js"> </script>



<script language = "JavaScript">

function check()
{
	var numtest= /^[0-9]+$/;

	var emailtest=/^[a-zA-Z][\w\_\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;


	if (document.form1.title.value=="")
	{
		alert("Please select the Title.");
		document.form1.title.focus();
		return false;
	}
	
	if (document.form1.description.value=="")
	{
		alert("Please select the Description.");
		document.form1.description.focus();
		return false;
	}
	
	if (document.form1.type.value=="")
	{
		alert("Please select the Type.");
		document.form1.type.focus();
		return false;
	}
	
	
	
	var chks = document.getElementsByName('digi[]');
	var hasChecked = false;
	for (var i = 0; i < chks.length; i++)
	{
	if (chks[i].checked)
	{
	hasChecked = true;
	break;
	}
	}
	if (hasChecked == false)
	{
	alert("Please select at least one Department Revenue.");
	return false;
	}
	
	
	
	if (document.form1.industry.value=="")
	{
		alert("Please select the Industrial Relevance.");
		document.form1.industry.focus();
		return false;
	}


</script>


<?php 
include_once('inc_connection.php');

$editId = $_REQUEST['editId']; 



if(isset($_POST['submit']) && $_POST['submit']!='')
{


$title = addslashes(trim($_POST['title']));
$description = addslashes(trim($_POST['description']));

$checkbox1 = $_POST['digi'];
$digital_work = "";

if($checkbox1){
foreach( $checkbox1 as $key => $value){
     $digital_work = $value.','.$digital_work;
}
}

$industry = addslashes(trim($_POST['industry']));

$type_work = "";
if($_POST['type']){
foreach ($_POST['type'] as $type)
{
        $type_work = $type.','.$type_work;
}
}




$sql1="UPDATE oxy2_knowledgebase SET title = '$title',description='$description',industrialRelevance='$industry',type='$type_work',department='$digital_work' WHERE id='$editId'";
$result = mysql_query($sql1);

header("location:.?id=5&subId=3");


}


?>


<?php  


$SelQuery = "SELECT * FROM oxy2_knowledgebase WHERE id = '$editId'";
$SelExec = mysql_query($SelQuery);
$cntt = mysql_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysql_fetch_array($SelExec))
				{

$title = $SelResult['title'];

$description = $SelResult['description'];

$department = $SelResult['department'];

$dept = explode(",",$department);

if($dept['0'] == "Digital" || $dept['1'] == "Digital" || $dept['2'] == "Digital")
{
	$digital = "Digital";
	
}

if($dept['0'] == "B2B" || $dept['1'] == "B2B" || $dept['2'] == "B2B")
{
	$B2B = "B2B";
	
}

if($dept['0'] == "B2C" || $dept['1'] == "B2C" || $dept['2'] == "B2C")
{
	$B2C = "B2C";
	
}


$industrialRelevance = $SelResult['industrialRelevance'];

$type = $SelResult['type'];

$typeii = explode(",",$type);

/*if($typeii['0'] == "Brand Marketing Consultancy" || $typeii['1'] == "Brand Marketing Consultancy" || $typeii['2'] == "Brand Marketing Consultancy" || $typeii['2'] == "Activations" || $typeii['2'] == "Roadshows" || $typeii['2'] == "Promotions" || $typeii['2'] == "Events" || $typeii['2'] == "Merchandising" || $typeii['2'] == "Headcount" || $typeii['2'] == "CRM" || $typeii['2'] == "Loyalty" || $typeii['2'] == "Incentives" || $typeii['2'] == "Channel Programs" || $typeii['2'] == "Direct Marketing" || $typeii['2'] == "Digital campaigns" || $typeii['2'] == "Lead Generation Events" || $typeii['2'] == "Exhibitions" || $typeii['2'] == "Marketing Collateral Design and Production" || $typeii['2'] == "Database Marketing" || $typeii['2'] == "Integrated B2B campaign" || $typeii['2'] == "Integrated B2C campaign" || $typeii['2'] == "Retail" || $typeii['2'] == "Tools" || $typeii['2'] == "Social Media" || $typeii['2'] == "Others")
{
	t1 = "Brand Marketing Consultancy";
	
}
*/

if($typeii['0'] == "Brand Marketing Consultancy" || $typeii['1'] == "Brand Marketing Consultancy" || $typeii['2'] == "Brand Marketing Consultancy" || $typeii['3'] == "Brand Marketing Consultancy" || $typeii['4'] == "Brand Marketing Consultancy" || $typeii['5'] == "Brand Marketing Consultancy" || $typeii['6'] == "Brand Marketing Consultancy" || $typeii['7'] == "Brand Marketing Consultancy" || $typeii['8'] == "Brand Marketing Consultancy" || $typeii['9'] == "Brand Marketing Consultancy" || $typeii['10'] == "Brand Marketing Consultancy" || $typeii['11'] == "Brand Marketing Consultancy" || $typeii['12'] == "Brand Marketing Consultancy" || $typeii['13'] == "Brand Marketing Consultancy" || $typeii['14'] == "Brand Marketing Consultancy" || $typeii['15'] == "Brand Marketing Consultancy" || $typeii['16'] == "Brand Marketing Consultancy" || $typeii['17'] == "Brand Marketing Consultancy" || $typeii['18'] == "Brand Marketing Consultancy" || $typeii['19'] == "Brand Marketing Consultancy" || $typeii['20'] == "Brand Marketing Consultancy" || $typeii['21'] == "Brand Marketing Consultancy" || $typeii['22'] == "Brand Marketing Consultancy" || $typeii['23'] == "Brand Marketing Consultancy" || $typeii['24'] == "Brand Marketing Consultancy")
{
	$t1 = "Brand Marketing Consultancy";
	
}

if($typeii['0'] == "Creative Services" || $typeii['1'] == "Creative Services" || $typeii['2'] == "Creative Services" || $typeii['3'] == "Creative Services" || $typeii['4'] == "Creative Services" || $typeii['5'] == "Creative Services" || $typeii['6'] == "Creative Services" || $typeii['7'] == "Creative Services" || $typeii['8'] == "Creative Services" || $typeii['9'] == "Creative Services" || $typeii['10'] == "Creative Services" || $typeii['11'] == "Creative Services" || $typeii['12'] == "Creative Services" || $typeii['13'] == "Creative Services" || $typeii['14'] == "Creative Services" || $typeii['15'] == "Creative Services" || $typeii['16'] == "Creative Services" || $typeii['17'] == "Creative Services" || $typeii['18'] == "Creative Services" || $typeii['19'] == "Creative Services" || $typeii['20'] == "Creative Services" || $typeii['21'] == "Creative Services" || $typeii['22'] == "Creative Services" || $typeii['23'] == "Creative Services" || $typeii['24'] == "Creative Services")
{
	$t2 = "Creative Services";
	
}

if($typeii['0'] == "Activations" || $typeii['1'] == "Activations" || $typeii['2'] == "Activations" || $typeii['3'] == "Activations" || $typeii['4'] == "Activations" || $typeii['5'] == "Activations" || $typeii['6'] == "Activations" || $typeii['7'] == "Activations" || $typeii['8'] == "Activations" || $typeii['9'] == "Activations" || $typeii['10'] == "Activations" || $typeii['11'] == "Activations" || $typeii['12'] == "Activations" || $typeii['13'] == "Activations" || $typeii['14'] == "Activations" || $typeii['15'] == "Activations" || $typeii['16'] == "Activations" || $typeii['17'] == "Activations" || $typeii['18'] == "Activations" || $typeii['19'] == "Activations" || $typeii['20'] == "Activations" || $typeii['21'] == "Activations" || $typeii['22'] == "Activations" || $typeii['23'] == "Activations" || $typeii['24'] == "Activations")
{
	$t3 = "Activations";
	
}

if($typeii['0'] == "Roadshows" || $typeii['1'] == "Roadshows" || $typeii['2'] == "Roadshows" || $typeii['3'] == "Roadshows" || $typeii['4'] == "Roadshows" || $typeii['5'] == "Roadshows" || $typeii['6'] == "Roadshows" || $typeii['7'] == "Roadshows" || $typeii['8'] == "Roadshows" || $typeii['9'] == "Roadshows" || $typeii['10'] == "Roadshows" || $typeii['11'] == "Roadshows" || $typeii['12'] == "Roadshows" || $typeii['13'] == "Roadshows" || $typeii['14'] == "Roadshows" || $typeii['15'] == "Roadshows" || $typeii['16'] == "Roadshows" || $typeii['17'] == "Roadshows" || $typeii['18'] == "Roadshows" || $typeii['19'] == "Roadshows" || $typeii['20'] == "Roadshows" || $typeii['21'] == "Roadshows" || $typeii['22'] == "Roadshows" || $typeii['23'] == "Roadshows" || $typeii['24'] == "Roadshows")
{
	$t4 = "Roadshows";
	
}

if($typeii['0'] == "Promotions" || $typeii['1'] == "Promotions" || $typeii['2'] == "Promotions" || $typeii['3'] == "Promotions" || $typeii['4'] == "Promotions" || $typeii['5'] == "Promotions" || $typeii['6'] == "Promotions" || $typeii['7'] == "Promotions" || $typeii['8'] == "Promotions" || $typeii['9'] == "Promotions" || $typeii['10'] == "Promotions" || $typeii['11'] == "Promotions" || $typeii['12'] == "Promotions" || $typeii['13'] == "Promotions" || $typeii['14'] == "Promotions" || $typeii['15'] == "Promotions" || $typeii['16'] == "Promotions" || $typeii['17'] == "Promotions" || $typeii['18'] == "Promotions" || $typeii['19'] == "Promotions" || $typeii['20'] == "Promotions" || $typeii['21'] == "Promotions" || $typeii['22'] == "Promotions" || $typeii['23'] == "Promotions" || $typeii['24'] == "Promotions")
{
	$t5 = "Promotions";
	
}

if($typeii['0'] == "Events" || $typeii['1'] == "Events" || $typeii['2'] == "Events" || $typeii['3'] == "Events" || $typeii['4'] == "Events" || $typeii['5'] == "Events" || $typeii['6'] == "Events" || $typeii['7'] == "Events" || $typeii['8'] == "Events" || $typeii['9'] == "Events" || $typeii['10'] == "Events" || $typeii['11'] == "Events" || $typeii['12'] == "Events" || $typeii['13'] == "Events" || $typeii['14'] == "Events" || $typeii['15'] == "Events" || $typeii['16'] == "Events" || $typeii['17'] == "Events" || $typeii['18'] == "Events" || $typeii['19'] == "Events" || $typeii['20'] == "Events" || $typeii['21'] == "Events" || $typeii['22'] == "Events" || $typeii['23'] == "Events" || $typeii['24'] == "Events")
{
	$t6 = "Events";
	
}

if($typeii['0'] == "Merchandising" || $typeii['1'] == "Merchandising" || $typeii['2'] == "Merchandising" || $typeii['3'] == "Merchandising" || $typeii['4'] == "Merchandising" || $typeii['5'] == "Merchandising" || $typeii['6'] == "Merchandising" || $typeii['7'] == "Merchandising" || $typeii['8'] == "Merchandising" || $typeii['9'] == "Merchandising" || $typeii['10'] == "Merchandising" || $typeii['11'] == "Merchandising" || $typeii['12'] == "Merchandising" || $typeii['13'] == "Merchandising" || $typeii['14'] == "Merchandising" || $typeii['15'] == "Merchandising" || $typeii['16'] == "Merchandising" || $typeii['17'] == "Merchandising" || $typeii['18'] == "Merchandising" || $typeii['19'] == "Merchandising" || $typeii['20'] == "Merchandising" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Merchandising" || $typeii['23'] == "Merchandising" || $typeii['24'] == "Merchandising")
{
	$t7 = "Merchandising";
	
}

if($typeii['0'] == "Headcount" || $typeii['1'] == "Headcount" || $typeii['2'] == "Headcount" || $typeii['3'] == "Headcount" || $typeii['4'] == "Headcount" || $typeii['5'] == "Headcount" || $typeii['6'] == "Headcount" || $typeii['7'] == "Headcount" || $typeii['8'] == "Headcount" || $typeii['9'] == "Headcount" || $typeii['10'] == "Headcount" || $typeii['11'] == "Headcount" || $typeii['12'] == "Headcount" || $typeii['13'] == "Headcount" || $typeii['14'] == "Headcount" || $typeii['15'] == "Headcount" || $typeii['16'] == "Headcount" || $typeii['17'] == "Headcount" || $typeii['18'] == "Headcount" || $typeii['19'] == "Headcount" || $typeii['20'] == "Headcount" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Headcount" || $typeii['23'] == "Headcount" || $typeii['24'] == "Headcount")
{
	$t8 = "Headcount";
	
}

if($typeii['0'] == "CRM" || $typeii['1'] == "CRM" || $typeii['2'] == "CRM" || $typeii['3'] == "CRM" || $typeii['4'] == "CRM" || $typeii['5'] == "CRM" || $typeii['6'] == "CRM" || $typeii['7'] == "CRM" || $typeii['8'] == "CRM" || $typeii['9'] == "CRM" || $typeii['10'] == "CRM" || $typeii['11'] == "CRM" || $typeii['12'] == "CRM" || $typeii['13'] == "CRM" || $typeii['14'] == "CRM" || $typeii['15'] == "CRM" || $typeii['16'] == "CRM" || $typeii['17'] == "CRM" || $typeii['18'] == "CRM" || $typeii['19'] == "CRM" || $typeii['20'] == "CRM" || $typeii['21'] == "Merchandising" || $typeii['22'] == "CRM" || $typeii['23'] == "CRM" || $typeii['24'] == "CRM")
{
	$t9 = "CRM";
	
}

if($typeii['0'] == "Loyalty" || $typeii['1'] == "Loyalty" || $typeii['2'] == "Loyalty" || $typeii['3'] == "Loyalty" || $typeii['4'] == "Loyalty" || $typeii['5'] == "Loyalty" || $typeii['6'] == "Loyalty" || $typeii['7'] == "Loyalty" || $typeii['8'] == "Loyalty" || $typeii['9'] == "Loyalty" || $typeii['10'] == "Loyalty" || $typeii['11'] == "Loyalty" || $typeii['12'] == "Loyalty" || $typeii['13'] == "Loyalty" || $typeii['14'] == "Loyalty" || $typeii['15'] == "Loyalty" || $typeii['16'] == "Loyalty" || $typeii['17'] == "Loyalty" || $typeii['18'] == "Loyalty" || $typeii['19'] == "Loyalty" || $typeii['20'] == "Loyalty" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Loyalty" || $typeii['23'] == "Loyalty" || $typeii['24'] == "Loyalty")
{
	$t10 = "Loyalty";
	
}

if($typeii['0'] == "Incentives" || $typeii['1'] == "Incentives" || $typeii['2'] == "Incentives" || $typeii['3'] == "Incentives" || $typeii['4'] == "Incentives" || $typeii['5'] == "Incentives" || $typeii['6'] == "Incentives" || $typeii['7'] == "Incentives" || $typeii['8'] == "Incentives" || $typeii['9'] == "Incentives" || $typeii['10'] == "Incentives" || $typeii['11'] == "Incentives" || $typeii['12'] == "Incentives" || $typeii['13'] == "Incentives" || $typeii['14'] == "Incentives" || $typeii['15'] == "Incentives" || $typeii['16'] == "Incentives" || $typeii['17'] == "Incentives" || $typeii['18'] == "Incentives" || $typeii['19'] == "Incentives" || $typeii['20'] == "Incentives" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Incentives" || $typeii['23'] == "Incentives" || $typeii['24'] == "Incentives")
{
	$t11 = "Incentives";
	
}


if($typeii['0'] == "Direct Marketing" || $typeii['1'] == "Direct Marketing" || $typeii['2'] == "Direct Marketing" || $typeii['3'] == "Direct Marketing" || $typeii['4'] == "Direct Marketing" || $typeii['5'] == "Direct Marketing" || $typeii['6'] == "Direct Marketing" || $typeii['7'] == "Direct Marketing" || $typeii['8'] == "Direct Marketing" || $typeii['9'] == "Direct Marketing" || $typeii['10'] == "Direct Marketing" || $typeii['11'] == "Direct Marketing" || $typeii['12'] == "Direct Marketing" || $typeii['13'] == "Direct Marketing" || $typeii['14'] == "Direct Marketing" || $typeii['15'] == "Direct Marketing" || $typeii['16'] == "Direct Marketing" || $typeii['17'] == "Direct Marketing" || $typeii['18'] == "Direct Marketing" || $typeii['19'] == "Direct Marketing" || $typeii['20'] == "Direct Marketing" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Direct Marketing" || $typeii['23'] == "Direct Marketing" || $typeii['24'] == "Direct Marketing")
{
	$t12 = "Direct Marketing";
	
}

if($typeii['0'] == "Digital campaigns" || $typeii['1'] == "Digital campaigns" || $typeii['2'] == "Digital campaigns" || $typeii['3'] == "Digital campaigns" || $typeii['4'] == "Digital campaigns" || $typeii['5'] == "Digital campaigns" || $typeii['6'] == "Digital campaigns" || $typeii['7'] == "Digital campaigns" || $typeii['8'] == "Digital campaigns" || $typeii['9'] == "Digital campaigns" || $typeii['10'] == "Digital campaigns" || $typeii['11'] == "Digital campaigns" || $typeii['12'] == "Digital campaigns" || $typeii['13'] == "Digital campaigns" || $typeii['14'] == "Digital campaigns" || $typeii['15'] == "Digital campaigns" || $typeii['16'] == "Digital campaigns" || $typeii['17'] == "Digital campaigns" || $typeii['18'] == "Digital campaigns" || $typeii['19'] == "Digital campaigns" || $typeii['20'] == "Digital campaigns" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Digital campaigns" || $typeii['23'] == "Digital campaigns" || $typeii['24'] == "Digital campaigns")
{
	$t13 = "Digital campaigns";
	
}

if($typeii['0'] == "Lead Generation Events" || $typeii['1'] == "Lead Generation Events" || $typeii['2'] == "Lead Generation Events" || $typeii['3'] == "Lead Generation Events" || $typeii['4'] == "Lead Generation Events" || $typeii['5'] == "Lead Generation Events" || $typeii['6'] == "Lead Generation Events" || $typeii['7'] == "Lead Generation Events" || $typeii['8'] == "Lead Generation Events" || $typeii['9'] == "Lead Generation Events" || $typeii['10'] == "Lead Generation Events" || $typeii['11'] == "Lead Generation Events" || $typeii['12'] == "Lead Generation Events" || $typeii['13'] == "Lead Generation Events" || $typeii['14'] == "Lead Generation Events" || $typeii['15'] == "Lead Generation Events" || $typeii['16'] == "Lead Generation Events" || $typeii['17'] == "Lead Generation Events" || $typeii['18'] == "Lead Generation Events" || $typeii['19'] == "Lead Generation Events" || $typeii['20'] == "Lead Generation Events" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Lead Generation Events" || $typeii['23'] == "Lead Generation Events" || $typeii['24'] == "Lead Generation Events")
{
	$t14 = "Lead Generation Events";
	
}

if($typeii['0'] == "Database Marketing" || $typeii['1'] == "Database Marketing" || $typeii['2'] == "Database Marketing" || $typeii['3'] == "Database Marketing" || $typeii['4'] == "Database Marketing" || $typeii['5'] == "Database Marketing" || $typeii['6'] == "Database Marketing" || $typeii['7'] == "Database Marketing" || $typeii['8'] == "Database Marketing" || $typeii['9'] == "Database Marketing" || $typeii['10'] == "Database Marketing" || $typeii['11'] == "Database Marketing" || $typeii['12'] == "Database Marketing" || $typeii['13'] == "Database Marketing" || $typeii['14'] == "Database Marketing" || $typeii['15'] == "Database Marketing" || $typeii['16'] == "Database Marketing" || $typeii['17'] == "Database Marketing" || $typeii['18'] == "Database Marketing" || $typeii['19'] == "Database Marketing" || $typeii['20'] == "Database Marketing" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Database Marketing" || $typeii['23'] == "Database Marketing" || $typeii['24'] == "Database Marketing")
{
	$t15 = "Database Marketing";
	
}


if($typeii['0'] == "Digital campaigns" || $typeii['1'] == "Digital campaigns" || $typeii['2'] == "Digital campaigns" || $typeii['3'] == "Digital campaigns" || $typeii['4'] == "Digital campaigns" || $typeii['5'] == "Digital campaigns" || $typeii['6'] == "Digital campaigns" || $typeii['7'] == "Digital campaigns" || $typeii['8'] == "Digital campaigns" || $typeii['9'] == "Digital campaigns" || $typeii['10'] == "Digital campaigns" || $typeii['11'] == "Digital campaigns" || $typeii['12'] == "Digital campaigns" || $typeii['13'] == "Digital campaigns" || $typeii['14'] == "Digital campaigns" || $typeii['15'] == "Digital campaigns" || $typeii['16'] == "Digital campaigns" || $typeii['17'] == "Digital campaigns" || $typeii['18'] == "Digital campaigns" || $typeii['19'] == "Digital campaigns" || $typeii['20'] == "Digital campaigns" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Digital campaigns" || $typeii['23'] == "Digital campaigns" || $typeii['24'] == "Digital campaigns")
{
	$t16 = "Digital campaigns";
	
}

if($typeii['0'] == "Exhibitions" || $typeii['1'] == "Exhibitions" || $typeii['2'] == "Exhibitions" || $typeii['3'] == "Exhibitions" || $typeii['4'] == "Exhibitions" || $typeii['5'] == "Exhibitions" || $typeii['6'] == "Exhibitions" || $typeii['7'] == "Exhibitions" || $typeii['8'] == "Exhibitions" || $typeii['9'] == "Exhibitions" || $typeii['10'] == "Exhibitions" || $typeii['11'] == "Exhibitions" || $typeii['12'] == "Exhibitions" || $typeii['13'] == "Exhibitions" || $typeii['14'] == "Exhibitions" || $typeii['15'] == "Exhibitions" || $typeii['16'] == "Exhibitions" || $typeii['17'] == "Exhibitions" || $typeii['18'] == "Exhibitions" || $typeii['19'] == "Exhibitions" || $typeii['20'] == "Exhibitions" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Exhibitions" || $typeii['23'] == "Exhibitions" || $typeii['24'] == "Exhibitions")
{
	$t17 = "Exhibitions";
	
}


if($typeii['0'] == "Marketing Collateral Design and Production" || $typeii['1'] == "Marketing Collateral Design and Production" || $typeii['2'] == "Marketing Collateral Design and Production" || $typeii['3'] == "Marketing Collateral Design and Production" || $typeii['4'] == "Marketing Collateral Design and Production" || $typeii['5'] == "Marketing Collateral Design and Production" || $typeii['6'] == "Marketing Collateral Design and Production" || $typeii['7'] == "Marketing Collateral Design and Production" || $typeii['8'] == "Marketing Collateral Design and Production" || $typeii['9'] == "Marketing Collateral Design and Production" || $typeii['10'] == "Marketing Collateral Design and Production" || $typeii['11'] == "Marketing Collateral Design and Production" || $typeii['12'] == "Marketing Collateral Design and Production" || $typeii['13'] == "Marketing Collateral Design and Production" || $typeii['14'] == "Marketing Collateral Design and Production" || $typeii['15'] == "Marketing Collateral Design and Production" || $typeii['16'] == "Marketing Collateral Design and Production" || $typeii['17'] == "Marketing Collateral Design and Production" || $typeii['18'] == "Marketing Collateral Design and Production" || $typeii['19'] == "Marketing Collateral Design and Production" || $typeii['20'] == "Marketing Collateral Design and Production" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Marketing Collateral Design and Production" || $typeii['23'] == "Marketing Collateral Design and Production" || $typeii['24'] == "Marketing Collateral Design and Production")
{
	$t18 = "Marketing Collateral Design and Production";
	
}

if($typeii['0'] == "Integrated B2B campaign" || $typeii['1'] == "Integrated B2B campaign" || $typeii['2'] == "Integrated B2B campaign" || $typeii['3'] == "Integrated B2B campaign" || $typeii['4'] == "Integrated B2B campaign" || $typeii['5'] == "Integrated B2B campaign" || $typeii['6'] == "Integrated B2B campaign" || $typeii['7'] == "Integrated B2B campaign" || $typeii['8'] == "Integrated B2B campaign" || $typeii['9'] == "Integrated B2B campaign" || $typeii['10'] == "Integrated B2B campaign" || $typeii['11'] == "Integrated B2B campaign" || $typeii['12'] == "Integrated B2B campaign" || $typeii['13'] == "Integrated B2B campaign" || $typeii['14'] == "Integrated B2B campaign" || $typeii['15'] == "Integrated B2B campaign" || $typeii['16'] == "Integrated B2B campaign" || $typeii['17'] == "Integrated B2B campaign" || $typeii['18'] == "Integrated B2B campaign" || $typeii['19'] == "Integrated B2B campaign" || $typeii['20'] == "Integrated B2B campaign" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Integrated B2B campaign" || $typeii['23'] == "Integrated B2B campaign" || $typeii['24'] == "Integrated B2B campaign")
{
	$t19 = "Integrated B2B campaign";
	
}

if($typeii['0'] == "Integrated B2C campaign" || $typeii['1'] == "Integrated B2C campaign" || $typeii['2'] == "Integrated B2C campaign" || $typeii['3'] == "Integrated B2C campaign" || $typeii['4'] == "Integrated B2C campaign" || $typeii['5'] == "Integrated B2C campaign" || $typeii['6'] == "Integrated B2C campaign" || $typeii['7'] == "Integrated B2C campaign" || $typeii['8'] == "Integrated B2C campaign" || $typeii['9'] == "Integrated B2C campaign" || $typeii['10'] == "Integrated B2C campaign" || $typeii['11'] == "Integrated B2C campaign" || $typeii['12'] == "Integrated B2C campaign" || $typeii['13'] == "Integrated B2C campaign" || $typeii['14'] == "Integrated B2C campaign" || $typeii['15'] == "Integrated B2C campaign" || $typeii['16'] == "Integrated B2C campaign" || $typeii['17'] == "Integrated B2C campaign" || $typeii['18'] == "Integrated B2C campaign" || $typeii['19'] == "Integrated B2C campaign" || $typeii['20'] == "Integrated B2C campaign" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Integrated B2C campaign" || $typeii['23'] == "Integrated B2C campaign" || $typeii['24'] == "Integrated B2C campaign")
{
	$t20 = "Integrated B2C campaign";
	
}

if($typeii['0'] == "Retail" || $typeii['1'] == "Retail" || $typeii['2'] == "Retail" || $typeii['3'] == "Retail" || $typeii['4'] == "Retail" || $typeii['5'] == "Retail" || $typeii['6'] == "Retail" || $typeii['7'] == "Retail" || $typeii['8'] == "Retail" || $typeii['9'] == "Retail" || $typeii['10'] == "Retail" || $typeii['11'] == "Retail" || $typeii['12'] == "Retail" || $typeii['13'] == "Retail" || $typeii['14'] == "Retail" || $typeii['15'] == "Retail" || $typeii['16'] == "Retail" || $typeii['17'] == "Retail" || $typeii['18'] == "Retail" || $typeii['19'] == "Retail" || $typeii['20'] == "Retail" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Retail" || $typeii['23'] == "Retail" || $typeii['24'] == "Retail")
{
	$t21 = "Retail";
	
}

if($typeii['0'] == "Tools" || $typeii['1'] == "Tools" || $typeii['2'] == "Tools" || $typeii['3'] == "Tools" || $typeii['4'] == "Tools" || $typeii['5'] == "Tools" || $typeii['6'] == "Tools" || $typeii['7'] == "Tools" || $typeii['8'] == "Tools" || $typeii['9'] == "Tools" || $typeii['10'] == "Tools" || $typeii['11'] == "Tools" || $typeii['12'] == "Tools" || $typeii['13'] == "Tools" || $typeii['14'] == "Tools" || $typeii['15'] == "Tools" || $typeii['16'] == "Tools" || $typeii['17'] == "Tools" || $typeii['18'] == "Tools" || $typeii['19'] == "Tools" || $typeii['20'] == "Tools" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Tools" || $typeii['23'] == "Tools" || $typeii['24'] == "Tools")
{
	$t22 = "Tools";
	
}

if($typeii['0'] == "Social Media" || $typeii['1'] == "Social Media" || $typeii['2'] == "Social Media" || $typeii['3'] == "Social Media" || $typeii['4'] == "Social Media" || $typeii['5'] == "Social Media" || $typeii['6'] == "Social Media" || $typeii['7'] == "Social Media" || $typeii['8'] == "Social Media" || $typeii['9'] == "Social Media" || $typeii['10'] == "Social Media" || $typeii['11'] == "Social Media" || $typeii['12'] == "Social Media" || $typeii['13'] == "Social Media" || $typeii['14'] == "Social Media" || $typeii['15'] == "Social Media" || $typeii['16'] == "Social Media" || $typeii['17'] == "Social Media" || $typeii['18'] == "Social Media" || $typeii['19'] == "Social Media" || $typeii['20'] == "Social Media" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Social Media" || $typeii['23'] == "Social Media" || $typeii['24'] == "Social Media")
{
	$t23 = "Social Media";
	
}

if($typeii['0'] == "Others" || $typeii['1'] == "Others" || $typeii['2'] == "Others" || $typeii['3'] == "Others" || $typeii['4'] == "Others" || $typeii['5'] == "Others" || $typeii['6'] == "Others" || $typeii['7'] == "Others" || $typeii['8'] == "Others" || $typeii['9'] == "Others" || $typeii['10'] == "Others" || $typeii['11'] == "Others" || $typeii['12'] == "Others" || $typeii['13'] == "Others" || $typeii['14'] == "Others" || $typeii['15'] == "Others" || $typeii['16'] == "Others" || $typeii['17'] == "Others" || $typeii['18'] == "Others" || $typeii['19'] == "Others" || $typeii['20'] == "Others" || $typeii['21'] == "Merchandising" || $typeii['22'] == "Others" || $typeii['23'] == "Others" || $typeii['24'] == "Others")
{
	$t24 = "Others";
	
}







							
				}
}
				
				
?>  

        
<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span>
        	<h5>Create Knowledge Base</h5></div>
            <div class="widget_body">
				<!--Form fields-->
               
               
               
               

<div class="content">
                
                
                    
                    <!-- START OF DEFAULT WIZARD -->
                    <form class="stdform stdform2" method="post" action=""  id="form1" name="form1" onSubmit="return check()">
                    <div id="wizard" class="wizard">
                    
                        <div id="wiz1step1" class="formwiz">
      <table style="width:100%">
                            
                           
                            
                            <tr>
                               <td> 
                              
<p><label>Title *</label><span class='field'><input type='text' name='title' id='title' class='longinput' value="<?php echo $title; ?>"/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
<p><label>Description *</label><span class="field form_input"><textarea class="auto" id="txtInput" name="description" cols="61" rows="4" ><?php echo $description; ?></textarea></span></p>                    	    
                                </td>
                                </tr>
                                
                                 
                                
                                <tr>
                               <td> 
                              
<p>
  <label>Department Relevance *</label><span class='field'>
					 <input type='checkbox' name='digi[]' value='Digital' <?php if($digital == "Digital"){echo 'checked = "checked"';} ?> >
                  	 Digital &nbsp;&nbsp;&nbsp; 
					               
                    <input type='checkbox' name='digi[]' value='B2B' <?php if($B2B == "B2B"){echo 'checked = "checked"';} ?>>
                  	B2B &nbsp;&nbsp;&nbsp; 
					
                    <input type='checkbox' name='digi[]' value='B2C' <?php if($B2C == "B2C"){echo 'checked = "checked"';} ?>>
                    B2C &nbsp;&nbsp;&nbsp; 
                  
                    </span></p>                    	    
                                </td>
                                </tr>
                                
                                
                               <tr>
                               <td> 
                              
<p>
  <label>Type *</label><span class='field'>
  
  
					 <input type='checkbox' name='type[]' value='Brand Marketing Consultancy' <?php if($t1 == "Brand Marketing Consultancy"){echo 'checked = "checked"';} ?> >
                  	 Brand Marketing Consultancy &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
					               
                    <input type='checkbox' name='type[]' value='Creative Services' <?php if($t2 == "Creative Services"){echo 'checked = "checked"';} ?>>
                  	Creative Services 
                    
                    <br/>
					
                    <input type='checkbox' name='type[]' value='Activations' <?php if($t3 == "Activations"){echo 'checked = "checked"';} ?>>
                    Activations &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                   
                    <input type='checkbox' name='type[]' value='Roadshows' <?php if($t4 == "Roadshows"){echo 'checked = "checked"';} ?>>
                    Roadshows 
                    
                  <br/>
					
                    <input type='checkbox' name='type[]' value='Promotions' <?php if($t5 == "Promotions"){echo 'checked = "checked"';} ?>>
                    Promotions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                   
					
                    <input type='checkbox' name='type[]' value='Events' <?php if($t6 == "Events"){echo 'checked = "checked"';} ?>>
                    Events 
                    
                    <br/>
                  
					
                    <input type='checkbox' name='type[]' value='Merchandising' <?php if($t7 == "Merchandising"){echo 'checked = "checked"';} ?>>
                    Merchandising &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                     <input type='checkbox' name='type[]' value='Headcount' <?php if($t8 == "Headcount"){echo 'checked = "checked"';} ?>>
                    Headcount 
                    
                    <br/>
                    
                     <input type='checkbox' name='type[]' value='CRM' <?php if($t9 == "CRM"){echo 'checked = "checked"';} ?>>
                    CRM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                     <input type='checkbox' name='type[]' value='Loyalty' <?php if($t10 == "Loyalty"){echo 'checked = "checked"';} ?>>
                    Loyalty
                    
                    <br/>
                    
                   
                    
                     <input type='checkbox' name='type[]' value='Incentives' <?php if($t11 == "Incentives"){echo 'checked = "checked"';} ?>>
                    Incentives &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <input type='checkbox' name='type[]' value='Direct Marketing' <?php if($t12 == "Direct Marketing"){echo 'checked = "checked"';} ?>>
                    Direct Marketing
                    
                    <br/>
                    
                    <input type='checkbox' name='type[]' value='InDigital campaignsentives' <?php if($t13 == "Digital campaigns"){echo 'checked = "checked"';} ?>>
                    Digital campaigns &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <input type='checkbox' name='type[]' value='Lead Generation Events' <?php if($t14 == "Lead Generation Events"){echo 'checked = "checked"';} ?>>
                    Lead Generation Events
                    
                    <br/>
                    
                    <input type='checkbox' name='type[]' value='Database Marketing' <?php if($t15 == "Database Marketing"){echo 'checked = "checked"';} ?>>
                    Database Marketing &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                
                    <input type='checkbox' name='type[]' value='Digital campaigns' <?php if($t16 == "Digital campaigns"){echo 'checked = "checked"';} ?>>
                    Digital campaigns
                    
                    <br/>
                    
                     <input type='checkbox' name='type[]' value='Exhibitions' <?php if($t17 == "Exhibitions"){echo 'checked = "checked"';} ?>>
                    Exhibitions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                     <input type='checkbox' name='type[]' value='Marketing Collateral Design and Production' <?php if($t18 == "Marketing Collateral Design and Production"){echo 'checked = "checked"';} ?>>
                    Marketing Collateral Design and Production &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <br/>
                    
                     <input type='checkbox' name='type[]' value='Integrated B2B campaign' <?php if($t19 == "Integrated B2B campaign"){echo 'checked = "checked"';} ?>>
                    Integrated B2B campaign &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                     <input type='checkbox' name='type[]' value='Integrated B2C campaign' <?php if($t20 == "Integrated B2C campaign"){echo 'checked = "checked"';} ?>>
                    Integrated B2C campaign
                    
                    <br/>
                    
                     <input type='checkbox' name='type[]' value='Retail' <?php if($t21 == "Retail"){echo 'checked = "checked"';} ?>>
                    Retail &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                     <input type='checkbox' name='type[]' value='Tools' <?php if($t22 == "Tools"){echo 'checked = "checked"';} ?>>
                    Tools  
                    
                    <br/>
                    
                    <input type='checkbox' name='type[]' value='Social Media' <?php if($t23 == "Social Media"){echo 'checked = "checked"';} ?>>
                    Social Media &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <input type='checkbox' name='type[]' value='Others' <?php if($t24 == "Others"){echo 'checked = "checked"';} ?>>
                    Others
                    
                    <br/>
                  
                    </span></p>                    	    
                                </td>
                                </tr> 
                                
                                <tr>
                               <td> 
                              
<p><label>Industrial Relevance *</label><span class='field'><input type='text' name='industry' id='industry' class='longinput' value="<?php echo $industrialRelevance; ?>"/></span></p>                    	    
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