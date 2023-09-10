<?php


$actionChartId = $_REQUEST['actionChartId'];



?>

<!-- Jquery Calender Script -->

<style type="text/css">
#queue {
	border: 1px solid #E5E5E5;
	height: 65px;
	overflow: auto;
	margin-bottom: 10px;
	padding: 0 3px 3px;
	width: 300px;
}
</style>	

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

#fancybox-outer{
border:6px solid black;
border-radius:4px;
}

input 
{
padding: 5px 15px;
background: #333;
color: #eee;
margin-left: 5px;
font-weight: bold;
text-shadow: 1px 1px #111;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
width:100px;
}

-->
</style>
    

    
    
  <div style="width:400px; height:80px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">
  
  
  
    
 <form method="post" name="form1" action="actionForActionRestoration.php" onSubmit="return check()">
	<input type="hidden" name="actionChartId" id="actionChartId" class="smallinput" value="<?php echo $actionChartId; ?>" readonly="readonly"/>
    

    
<table width="400" border="0" cellspacing="4" cellpadding="4" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">

 
 
 <tr>
   <td colspan="3" align="center"><span style="font-size:17px; font-weight:bold;">Are You sure you want to restore the Action Chart?</span></td></tr>
 <tr><td colspan="3" align="center"><hr /></td></tr>
    
  
  <tr><td align="center" valign="top"><input type="submit" name="yes" id="yes" class="smallinput" value="Yes" /></td><td colspan="2" align="center">
  <input type="submit" name="no" id="no" class="smallinput" value="No" />
  </td></tr>  
  
</table>

</form>
</div>





        

        


        

        

  