
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

-->
input[type="submit"] {
width: auto;
margin: 0;
font-weight: bold;
color: #eee;
background: #333;
border: 0;
padding: 7px 10px;
-moz-box-shadow: none;
-webkit-box-shadow: none;
box-shadow: none;
cursor: pointer;
}

input[type="text"] {
border: 1px solid #ccc;
background: #fcfcfc;
padding: 8px 5px;
width: 300px;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
-moz-box-shadow: inset 1px 1px 2px #ddd;
-webkit-box-shadow: inset 1px 1px 2px #ddd;
box-shadow: inset 1px 1px 2px #ddd;
color: #666;
}
textarea{
border: 1px solid #ccc;
background: #fcfcfc;
padding: 8px 5px;
width: 300px;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
-moz-box-shadow: inset 1px 1px 2px #ddd;
-webkit-box-shadow: inset 1px 1px 2px #ddd;
box-shadow: inset 1px 1px 2px #ddd;
color: #666;
}


select {
border: 1px solid #ccc;
padding: 7px 5px;
min-width: 40%;
background: #fcfcfc;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
-moz-box-shadow: inset 1px 1px 2px #ddd;
-webkit-box-shadow: inset 1px 1px 2px #ddd;
box-shadow: inset 1px 1px 2px #ddd;
color: #666;
}


</style>


<script language = "JavaScript">

function check()
{
	if (document.form1.category.value=="")
	{
		alert("Please enter the Category Name.");
		document.form1.category.focus();
		return false;
	}
	
	if (document.form1.details.value=="")
	{
		alert("Please enter the Description.");
		document.form1.details.focus();
		return false;
	}
	
//----------------------------------------------------------------------------------------------------

	return true;
}

</script>


<div style="width:500px; height:200px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;"> 

    
<form class="stdform stdform2" method="post" action="actionForCategory.php"  id="form1" name="form1" onSubmit="return check()">
                   
                        	
    <table width="100%" border="1" cellspacing="1" cellpadding="1">
   <tr>
    <td colspan="2" align="center" style="font-size: 17px;font-weight: bold;">Add Category</td>
  </tr>
  
  <tr>
    <td colspan="2"><br/></td>
  </tr>
  
  <tr>
    <td valign="middle">Category Name *</td>
    <td><input type='text' name='category' id='category' class='longinput'/></td>
  </tr>
  <tr>
    <td valign="middle">Category Details *</td>
    <td><textarea class="auto" id="txtInput" name="details" cols="60" rows="4" ></textarea></td>
  </tr>
  <tr>
    <td valign="middle"></td>
    <td align="left"><input type='submit' name='submit' id='submit' value="Submit"/></td>
    
  </tr>
</table>
                    
  </form>

 
</div>
