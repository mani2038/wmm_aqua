<?php
include_once('inc_connection.php');
include_once('commonFunction.php');
$raisefor = $_REQUEST['raisefor'];
$vendorDetail = getVendorId($raisefor);
$vendorId = $vendorDetail[0];

if(!$_COOKIE["user_id"] && !isset($raisefor)){
	echo "<script type='text/javascript'>alert('Please login first')</script>";
	echo "<script type='text/javascript'>window.location = 'login.php'</script>";
	}



$counts = $_POST['counts'];
if($counts==""){$counts=1;}


?>
<html><title>Sercon Oxygen - Add Items To PO</title>
<style type="text/css">
<!--

body {
	font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
	font-size: 62.5%;
}

.but1 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
	background-color: #3a83ba;
	background-position: center center;
	display: block;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	border-top-color: #3a83ba;
	border-right-color: #3a83ba;
	border-bottom-color: #3a83ba;
	border-left-color: #3a83ba;
}
.but1 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
	background-color: #3a83ba;
	background-position: center center;
	display: block;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	border-top-color: #3a83ba;
	border-right-color: #3a83ba;
	border-bottom-color: #3a83ba;
	border-left-color: #3a83ba;
}
.style11 {font-family: Arial, Helvetica, sans-serif}
.style11 {font-family: Arial, Helvetica, sans-serif}
.style41 {font-size: 12px}
.style41 {font-size: 12px}
.style81 {font-size: 11px}
.style81 {font-size: 11px}
.style91 {	color: #FFFFFF;
	font-weight: bold;
	text-decoration: underline;
	font-family: Arial, Helvetica, sans-serif;
	background-position: center;
}
.style91 {	color: #FFFFFF;
	font-weight: bold;
	text-decoration: underline;
	font-family: Arial, Helvetica, sans-serif;
	background-position: center;
}
-->
</style>
<head>

 <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script>
    $(function() {
			   var ajaxTotalValue = 0;
			   var ajaxTotalUntoucehedValue = 0;
        
	<?php 
	for($i=1;$i<=$counts;$i++)
	{?>
		
		$( "#startdate<?php echo $i; ?>" ).datepicker();
		$( "#enddate<?php echo $i; ?>" ).datepicker();
		$( "#expDate<?php echo $i; ?>" ).datepicker();
		$( "#closureDate<?php echo $i; ?>" ).datepicker();
		
				
		$("input[name='choices']").change(function() {
			var choi;
		var paer;
		var existAmount;
		var amtDis;	
		
		document.getElementById('per').value = "1";
		
		choi = $("input:radio[name='choices']:checked").val();
		paer = $("#per").val();
		existAmount = $("#totamt").val();
		
		amtDis = (paer * existAmount)/100;
		
		if(choi == "add") {
		newAmtDis = parseInt(existAmount) + amtDis;
		} 
		else {
		newAmtDis = parseInt(existAmount) - amtDis;
		}
		
		document.getElementById('netPayable').value = newAmtDis;
												
												
												});
		
		
		$("#per").bind('keyup', function() 
		{ 
		var choi;
		var paer;
		var existAmount;
		var amtDis;		
		choi = $("input:radio[name='choices']:checked").val();
		paer = $("#per").val();
		existAmount = $("#totamt").val();
		
		amtDis = (paer * existAmount)/100;
		
		if(choi == "add") {
		newAmtDis = parseInt(existAmount) + amtDis;
		} 
		else {
		newAmtDis = parseInt(existAmount) - amtDis;
		}
		
		document.getElementById('netPayable').value = newAmtDis;
		
		});
		
		
		
		$("#qty<?php echo $i; ?>").bind('keyup', function() 
		{ 
		var TaxinRs;
		var nwewAmount;
		var amountCal;
		var totAmount;
		var itemTotal;
		
		//Varaible For Net Payable
		var choi;
		var paer;
		var existAmount;
		var amtDis;
		
		var taxtt<?php echo $i; ?> = $("#tax<?php echo $i; ?>").val();
		var rate<?php echo $i; ?> = $("#rate<?php echo $i; ?>").val();
		
		TaxinRs = (parseInt(rate<?php echo $i; ?>) * parseInt(taxtt<?php echo $i; ?>)) / 100;
		
		nwewAmount = parseInt(rate<?php echo $i; ?>) + parseInt(TaxinRs);
		
		//alert(nwewAmount);
		
		var qty<?php echo $i; ?> = $("#qty<?php echo $i; ?>").val();	
		
		//var newAmountt<?php echo $i; ?> = rate<?php echo $i; ?> * qty<?php echo $i; ?>; 
		
		var newAmountt<?php echo $i; ?> = nwewAmount * qty<?php echo $i; ?>; 
		
		//alert(newAmountt<?php echo $i; ?>);
		

		var newamountPar = "amount<?php echo $i; ?>";
		var itemTotal = $("#amount<?php echo $i; ?>").val();
		document.getElementById(newamountPar).value=newAmountt<?php echo $i; ?>;
		
		ajaxTotalValue = parseInt(ajaxTotalValue) + parseInt(newAmountt<?php echo $i; ?>);
		//document.getElementById('totamt').value=ajaxTotalValue;
		
		totAmount = document.getElementById('totamt').value;
		//alert(document.getElementById('totamt').value);
		
		//alert("Total Amount:"+totAmount);
		//alert("Rate + tax:"+nwewAmount);
		//alert("R+T * quantity:"+newAmountt<?php echo $i; ?>);
		
		amountCal = (totAmount - itemTotal) + newAmountt<?php echo $i; ?>;
		//alert("Amount Left :"+amountCal);
		document.getElementById('totamt').value = amountCal;
		
		
		
		//Managing the Net Payable Amount
		
		choi = $("input:radio[name='choices']:checked").val();
		paer = $("#per").val();
		existAmount = $("#totamt").val();
		
		amtDis = (paer * existAmount)/100;
		
		if(choi == "add") {
		newAmtDis = parseInt(existAmount) + amtDis;
		} 
		else {
		newAmtDis = parseInt(existAmount) - amtDis;
		}
		
		document.getElementById('netPayable').value = newAmtDis;
		
		
		
		
		});
		
		//var untouchedAmountValue = document.getElementById(amount<?php echo $i; ?>).value;
		//alert(untouchedAmountValue);
		//ajaxTotalUntoucehedValue = parseInt(ajaxTotalValue) + parseInt(untouchedAmountValue);
		
		
		
		
	<?php 
	}?>	
	
	//document.getElementById('totamt').value=ajaxTotalUntoucehedValue;
	
	$(".city").change(function()
		{
		var vv=$(this).val();
		var fields = vv.split(/-/);
		var city = fields[1];
		
		}); 
	
	
		
	
		
	
	
    });
    </script>

<style type="text/css">
<!--
input
{
border: 1px solid #CCC;
background: #FCFCFC;
padding: 4px 0px;
width: 50px;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
-moz-box-shadow: inset 1px 1px 2px #ddd;
-webkit-box-shadow: inset 1px 1px 2px #DDD;
box-shadow: inset 1px 1px 2px #DDD;
color: #666;
text-align:center;
}

select
{
border: 1px solid #CCC;
padding: 4px 5px;
min-width: 25%;
background: #FCFCFC;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
-moz-box-shadow: inset 1px 1px 2px #ddd;
-webkit-box-shadow: inset 1px 1px 2px #DDD;
box-shadow: inset 1px 1px 2px #DDD;
color: #666;
}

label
{
padding: 5px 0px;

font-size: 13px;
}

.style1 {font-family: Arial, Helvetica, sans-serif}
.but {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
	background-color: #3a83ba;
	background-position: center center;
	display: block;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	border-top-color: #3a83ba;
	border-right-color: #3a83ba;
	border-bottom-color: #3a83ba;
	border-left-color: #3a83ba;
}
.style10 {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
-->

.select { font-family: Verdana; font-size: 10pt; color: #333333; background-color: #FFFFFF; border: 1 solid #6699CC }
submit { background-color: #000066; color: #FFFFFF; font-family: verdana; color:#000000 ; font-size: 8pt;}
.style4 {font-size: 12px}
.style8 {font-size: 11px}
.style9 {
	color: #FFFFFF;
	font-weight: bold;
	text-decoration: underline;
	font-family: Arial, Helvetica, sans-serif;
	background-position: center;
}
</style>


<script language=javascript>
/*function check()
{
	alert(document.form2.elements.length);
for (x=0; x<document.form2.elements.length; x++)
 {
  if (document.form2.elements[x].value == "") 
  {
   alert("Sorry, you forgot required fields. Please try again. : "+document.form2.elements[x].name); 
	document.form2.elements[x].focus();
   return false;
  }
 }
 document.form2.submit2.value ="Invoice is Uploading.....";
 return true;
}*/

function check(form) {
	
var numtest= /^[0-9]+$/;

var emailtest=/^[a-zA-Z][\w\_\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;

<?php 
for($i=1;$i<=$counts;$i++)
{?>

	if(form.itemName<?php echo $i; ?>.value == "") {
		alert("Please select Item Name<?php echo $i; ?>");
		form.itemName<?php echo $i; ?>.focus();
		return(false);
	}
	
	if(form.qty<?php echo $i; ?>.value == "") {
		alert("Please enter the Quantity<?php echo $i; ?>");
		form.qty<?php echo $i; ?>.focus();
		return(false);
	}
	
	if(!(numtest.test(form.qty<?php echo $i; ?>.value)))
	{
	alert("Only Digits Required!");
	form.qty<?php echo $i; ?>.focus();
	return(false);
	}
	
	if(form.rate<?php echo $i; ?>.value == "") {
		alert("Please enter the Rate<?php echo $i; ?>");
		form.rate<?php echo $i; ?>.focus();
		return(false);
	}
	if(!(numtest.test(form.rate<?php echo $i; ?>.value)))
	{
	alert("Only Digits Required!");
	form.rate<?php echo $i; ?>.focus();
	return(false);
	}
	
	
	if(form.tax<?php echo $i; ?>.value == "") {
		alert("Please enter the Tax<?php echo $i; ?>");
		form.tax<?php echo $i; ?>.focus();
		return(false);
	}
	if(!(numtest.test(form.tax<?php echo $i; ?>.value)))
	{
	alert("Only Digits Required!");
	form.tax<?php echo $i; ?>.value = "";
	form.tax<?php echo $i; ?>.focus();
	return(false);
	}
	
	if(form.amount<?php echo $i; ?>.value == "") {
		alert("Please enter the Amount<?php echo $i; ?>");
		form.amount<?php echo $i; ?>.focus();
		return(false);
	}
	if(!(numtest.test(form.amount<?php echo $i; ?>.value)))
	{
	alert("Only Digits Required!");
	form.amount<?php echo $i; ?>.value = "";
	form.amount<?php echo $i; ?>.focus();
	return(false);
	}
	
		
	
<?php  } ?>	
	
			
	   
}


function check1()
{
document.form1.submit();	
}


function calbill(itemName,vendor,id)
{
	
	
	var str = '<?php echo 1+1;?>';
	
	alert(str);
	
	var ii = "rate"+id;
	document.getElementById(ii).value = "1000";


}

</SCRIPT>




</head>




<body>
<script type="text/javascript">


function discount(cnt)
{
var sum = 0;
var ratee = 0;

for(var i=1;i<=cnt;i++)
{
var fldsel   = "amount"+i;
var ratee = document.getElementById(fldsel).value;

sum = (parseInt(sum)+parseInt(ratee));

}

return sum;
}

</script>



<?php for($p=1;$p<=$counts;$p++){ ?>

<script type="text/javascript">
function calbill<?php echo $p; ?>(itemId,vendorId,colId)
{
	
	var datas_tw  = "itemId=" + itemId + "&" +"vendorId=" + vendorId  + "&" +"colId=" + colId;
	
	
	$.ajax({
      url: "updateRateAndTax.php",
      type: "POST",
      data: datas_tw,
	  cache: false,
      success: function(server_response){
		
		
		var fields = server_response.split('-');
		var rate = fields[0];
		var tt = fields[1];
	    var taxRate;
	
		//var netAmount = rate * tax;
		taxRate = (rate * tt)/100;
		var netAmount = parseInt(rate) + parseInt(taxRate);
			
		var qq = "qty"+colId;		
		var rr = "rate"+colId;
		var tax = "tax"+colId;
		var amt = "amount"+colId;
		
		document.getElementById(qq).value="1";
		document.getElementById(rr).value=rate;
		document.getElementById(tax).value=tt;
		document.getElementById(amt).value=netAmount;
		
		//discount(colId);
		var sm = discount(colId);
		document.getElementById('totamt').value=sm;
		
		
      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
	  alert("error");
          
      }
    });
	
	
	<?php 
	
		//$que = "SELECT * FROM oxy2_itemtovendor WHERE vendor = " + itemId + " AND itemName = " + vendorId;
	
                        //$res=mysql_query($que);
                        //$row=mysql_fetch_array($res);
                        //$rate = $row[rate];
						//$tax = $row[tax];
                         
?>
//var jj = "rate" + colId;
//document.getElementById(jj).value="100";

}

</script>

<?php } ?>



<!--One_Wrap-->
 	<div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title">
            
            
            <table width="100%" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td><span class="iconsweet">f</span><h5>Raise Online Purchase Order</h5></td>
    <td>
    
    <form method="post" action="#" name="form1" >
  <div align="center" style="position:relative; top:-10px">
  <table width="50%" border="1" cellspacing="1" cellpadding="1" style=" vertical-align:middle; font-size:14px; color:white;">
  <tr>
    <td>Number of Items</td>
    <td><select name="counts" onChange="check1();" style="min-width: 5%;">
  <option>Select</option>
  <?php
for($i=1;$i<=20;$i++)
{
	if($counts == $i){$counntSele = "SELECTED = 'SELECTED'";}
	else
	{
		$counntSele = "";
	}
?>
  <option value="<?php echo $i;?>" <?php echo $counntSele; ?>><?php echo $i;?></option>
  <?php
}
?>
    </select></td>
  </tr>
</table>

  
    
  </div>
<input type="hidden" name="vendorId" value="<?php echo $vendorId; ?>">
</form>
    
    </td>
  </tr>
</table>
</div>
            <div class="widget_body">
            	
                 
                
                
            </div>
            
          <div class="widget_body">
                <div class="demo_jui"> 

<?php if(isset($_REQUEST['mess']) && $_REQUEST['mess'] == "true" ){

echo "Item Added successfully";

}


?>





<form name="form2" action="actionForvendoraddItem.php" method="post" onSubmit="return check(this);">
  <table width="100%" align="center" cellpadding="1" cellspacing="1" bgcolor="#999999">
    <tr>
      <td width="66" height="17" align="center" style="padding:5px;"><span class="style1 style8 style9">
        <label>S.No.</label>
      </span></td>
      <td width="600" align="center"  style="padding:5px;"><span class="style1 style8 style9">
        <label>Item Name</label>
      </span></td>
      <td width="89" align="center"  style="padding:5px;"><span class="style1 style8 style9">
        <label>Qty.</label>
      </span></td>
      <td width="71" align="center"  style="padding:5px;"><span class="style1 style8 style9">
        <label>Rate</label>
      </span></td>
      <td width="83" align="center"  style="padding:5px;"><span class="style1 style8 style9">
        <label>Tax</label>
      </span></td>
      <td width="125" align="center"  style="padding:5px;"><span class="style1 style8 style9">
        <label>Amount</label>
      </span></td>
      
    </tr>
    <?php
	
for($i=1;$i<=$counts;$i++)
{
?>
    <tr bgcolor="#FFFFFF">
      <td align="center" valign="middle" ><span class="style41"><?php echo $i; ?>.</span></td>
      <td align="center" valign="middle"><select style="width:100%" name="itemName<?php echo $i; ?>" id="itemName<?php echo $i; ?>"  onChange="calbill<?php echo $i; ?>(this.value,<?php echo $vendorId;?>,<?php echo $i; ?>);">
        <option value="">Select Item Name</option>
        <?php
                        //$que="SELECT * FROM oxy2_item";
						$que = "SELECT DISTINCT oxy2_item.itemId, oxy2_item.itemName FROM oxy2_item INNER JOIN oxy2_vendor ON oxy2_item.categoryId = oxy2_vendor.category INNER JOIN oxy2_raise_povendor ON oxy2_vendor.category = oxy2_raise_povendor.category WHERE oxy2_raise_povendor.id = '$raisefor'";
                        $res=mysql_query($que);
                        while($row=mysql_fetch_array($res))
                        {
                        $itemName = $row[itemName];
						$itemId = $row[itemId];
                        echo "<option value='$itemId'>$itemName</option>";
                        }                        
                        ?>
      </select></td>
      <td align="center" valign="middle"><input name="qty<?php echo $i; ?>" id="qty<?php echo $i; ?>" type="text" size="20"/></td>
      <td align="center" valign="middle"><input name="rate<?php echo $i; ?>" id="rate<?php echo $i; ?>" type="text" size="20" readonly/></td>
      <td align="center" valign="middle"><input name="tax<?php echo $i; ?>" id="tax<?php echo $i; ?>"  type="text" size="20" readonly/>
       <td align="center" valign="middle"><input name="amount<?php echo $i; ?>"  id="amount<?php echo $i; ?>"type="text" size="20" readonly/>
        </td>
      
    </tr>
    <?php
}
?>
	<tr bgcolor="#FFFFFF">
	  <td colspan="4" align="right"></td>
	  <td style="padding: 5px 0px;font-size: 16px; font-weight:bold;" align="center">&nbsp;</td>
	  <td valign="middle" align="center">&nbsp;</td>
	  </tr>
	<tr bgcolor="#FFFFFF">
      <td colspan="4" align="right"></td>
      <td style="padding: 5px 0px;font-size: 16px; font-weight:bold;" align="center"><strong>Total</strong></td>
      <td valign="middle" align="center"><input name="totamt"  id="totamt" type="text" size="20" readonly/></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="6" align="right">
      <table width="100%">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
      <td width="74%" align="right">
      (Select relevant button for any additionals or discounts &amp; mention %)</td>
      <td width="26%"><input type="radio" name="choices" id="choices" value="add" />Additional &nbsp;<input type="radio" name="choices" id="choices" value="subs" />Discount</td>
      </tr>
      </table>
      
      </td>
    </tr>
   <tr bgcolor="#FFFFFF">
      <td colspan="6" align="right">
      
      <table>
      <tr>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
      <td width="287">(Put 0 in the text field if not applicable)</td>
      <td width="154" align="center">&nbsp;&nbsp;Percentage <input type="textbox" name="per" id="per" style="width:40px;" />&nbsp;%</td>
      </tr>
      </table>
      
      </td>
    </tr>
    
    <tr bgcolor="#FFFFFF">
      <td colspan="6" align="right">
      
      <table width="100%">
      <tr>
        <td align="right" style="padding: 5px 0px;font-size: 16px; font-weight:bold;">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
      <td width="920" align="right" style="padding: 5px 0px;font-size: 16px; font-weight:bold;"><strong>Net Payable</strong></td>
      <td width="117" align="center" valign="middle"><input name="netPayable"  id="netPayable" type="text" size="20" readonly/></td>
      </tr>
      </table>
      
      </td>
      
    </tr>
    
    <tr bgcolor="#FFFFFF">
      <td colspan="6" align="center">&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td colspan="6" align="center"><input style="width:15%"   name="submit2" type="submit" class="but1" value="            Submit               "></td>
    </tr>
  </table>
  <input type="hidden" name="count" value="<?php echo $counts; ?>">
<input type="hidden" name="vendorIdd" value="<?php echo $vendorId; ?>">
<input type="hidden" name="raisefor" value="<?php echo $_REQUEST['raisefor']; ?>">
</form>



 </div>
            </div>      
            
        </div>
    </div>    

</body>


 