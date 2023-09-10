

<script language = "JavaScript">
function check()
{
	
	if (document.form1.companyname.value=="")
	{
		alert("Please Enter the New Organization Name to add.");
		document.form1.companyname.focus();
		return false;
	}
	
	if (document.form1.contact.value=="")
	{
		alert("Please Enter the Contact Name.");
		document.form1.contact.focus();
		return false;
	}
	
	if (document.form1.email.value=="")
	{
		alert("Please Enter the Email.");
		document.form1.email.focus();
		return false;
	}
	
	if (document.form1.ccity.value=="")
	{
		alert("Please Enter the City.");
		document.form1.ccity.focus();
		return false;
	}
	
	if (document.form1.country.value=="")
	{
		alert("Please Enter the Country.");
		document.form1.country.focus();
		return false;
	}
			
	return true;
}

</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function()
{

<!-- Ajax for Deal ID Validation -->



$("#other_company_name").bind('keyup change', function() 
{ //if theres a change in the username textbox

var companyname = $("#other_company_name").val();//Get the value in the username textbox

	var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	var valid = pattern.test(companyname);
  	
		$("#availability_status").html('<img src="icons/loader.gif" align="absmiddle">');
		//Add a loading image in the span id="availability_status"
		
		$.ajax({  //Make the Ajax Request
			type: "POST",  
			url: "ajax_check_clientName.php",  //file name
			data: "companyname="+ companyname,  //data
			cache: false,
			success: function(server_response){ 
		   $("#availability_status").ajaxComplete(function(event, request){ 
		
			if(server_response == '0')//if ajax_check_username.php return value "0"
			{ 
			$("#availability_status").html('<img src="icons/available.png" align="absmiddle">');
			//add this image to the span with id "availability_status"
			$('#submit').removeAttr('disabled');
			$("#submit_status").html('');
			}  
			else  if(server_response == '1')//if it returns "1"
			{  
			 $("#availability_status").html('<img src="icons/not_available.png" align="absmiddle">');
			$('#submit').attr('disabled', 'disabled');
			$("#submit_status").html('<font color="red">Organization already exist , please try with different name. </font>');
			}  
		   
		   });
		   } 
		   
		  }); 
	return false;
});



<!-- Ended -->






});

</script>


<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span>
        	<h5>Add New Organization</h5></div>
            <div class="widget_body">
				<form  action="actionForClient.php" method="post" name="form1"  onSubmit= "return check()" style="color: #818386;margin: 5px 0px 5px 25px;">

            <table width="879" border="0" align="center" cellpadding="0" cellspacing="0" id="applyCss">
                     
                      <tr>
                        <td height="24" valign="middle"> Organization Listed </td>
                        <td colspan="3" valign="middle">
						<div class="selector" id="uniform-category"><span>[Select One]</span>
                        <select name="companyname" id="companyname" onchange="displayOtherfield()" class="tip_east" title="Organization Name" >
						<option value="">Select Organization</option>
						<?php
                        $que="SELECT * FROM oxy2_clientn group by companyname";
                        $res=mysqli_query($con,$que);
                        while($row=mysqli_fetch_array($res))
                        {
							$companyname = $row['companyname'];
                        $att_id = $row['id'];
                        echo "<option value='$companyname'>$companyname</option>";
                        }                        
						
                        ?>
						<option value="Other">Other</option>
						</select>
                           </div>

                           </td>
                      </tr>
                      <tr>
                        <td valign="middle">&nbsp;</td>
                        <td width="34%" valign="top">&nbsp;</td>
                        <td colspan="-1" valign="top">&nbsp;</td>
                        <td width="43%" valign="top">&nbsp;</td>
                      </tr>
                      <tr id="other_field" style="display:none">
                        <td valign="middle">New Organization Name *</td>
                        <td valign="top"><div class="form_input">
						<input class="form-control" id="other_company_name" type="text" name="other_company_name">
					
						
                        <span id="availability_status"></span>
                        
                        </div>
                        
                        </td>
                        <td colspan="-1" valign="top">&nbsp;</td>
                        <td valign="top"><span id="submit_status"></span></td>
                      </tr>
					  
                      
                      <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>

 
                      <tr> 
                        <td width="15%" height="24" valign="middle">Client Name *</td>
                        <td>
                        <div class="form_input"><input name="contact" id="contact"  type="text" class="tip_east" title="Client Name"></div>
                        </td>
                        <td colspan="2"></td>
                      </tr>
                      
                      <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>

                      
                      <tr> 
                        <td valign="middle">Desgination</td>
                        <td>
                        <div class="form_input"><input name="desg" id="desg"  type="text" class="tip_east" title="Designation"></div>
                        </td>
                        <td colspan="-1">Email 
                          Id *</td>
                        <td>
                        <div class="form_input"><input name="email" id="email"  type="text" class="tip_east" title="Email"></div>
                          
                        </td>
                      </tr>
                      
                      <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td valign="middle">Address 
                          1</td>
                        <td valign="top">
                        <div class="form_input"><input name="add1" id="add1"  type="text" class="tip_east" title="Address"></div>
                        
                        <td colspan="-1">Alternate 
                          Email Id</td>
                        <td>
                         <div class="form_input"><input name="email2" id="email2"  type="text" class="tip_east" title="Alternate Email Id"></div>
                         
                        </td>
                      </tr>
                      
                      <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td valign="middle">Address 
                          2</td>
                        <td> <div align="left">  
                             <div class="form_input"><input name="add2" id="add2"  type="text" class="tip_east" title="Address 2"></div>
                            
                            </div></td>
                        <td colspan="-1">Telephone 1</td>
                        <td>
                        <div class="form_input">
                            <table width="86%" border="0" cellspacing="1" cellpadding="1">
                            <tr>
                            <td><input name="ph1_ext" id="ph1_ext"  type="text" class="tip_east" title="Phone Extension"></td>
                            <td><input name="ph2_ext" id="ph2_ext"  type="text" class="tip_east" title="Phone Extension2"></td>
                            <td><input name="phone1" id="phone1"  type="text" class="tip_east" title="Phone Number"></td>
                            </tr>
                            </table>
		                </div>
                        </td>
                      </tr>
                      
                      <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td valign="middle">City *</td>
                        <td>
                        <div class="form_input"><input name="ccity" id="ccity"  type="text" class="tip_east" title="City"></div>
                        </td>
                        <td colspan="-1">Telephone 2 </td>
                        <td>
                        
                         <div class="form_input">
                            <table width="86%" border="0" cellspacing="1" cellpadding="1">
                            <tr>
                            <td><input name="ph1_ext2" id="ph1_ext2"  type="text" class="tip_east" title="Extension1"></td>
                            <td><input name="ph2_ext2" id="ph2_ext2"  type="text" class="tip_east" title="Extension2"></td>
                            <td><input name="phone2" id="phone2"  type="text" class="tip_east" title="Landline Number"></td>
                            </tr>
                            </table>
		                </div>
                          </td>
                      </tr>
                      
                      <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td height="26" valign="middle">Country *</td>
                        <td>
                         <div class="form_input"><input name="country" id="country"  type="text" class="tip_east" title="Contry"></div>
                        </td>
                        <td colspan="-1">Fax </td>
                        <td>
                        
                        <div class="form_input">
                            <table width="86%" border="0" cellspacing="1" cellpadding="1">
                            <tr>
                             <td><input name="ph1_ext3" id="ph1_ext3"  type="text" class="tip_east" title="Extension"></td>
                            <td><input name="ph2_ext3" id="ph2_ext3"  type="text" class="tip_east" title="Extension"></td>
                            <td><input name="phone3" id="phone3"  type="text" class="tip_east" title="Fax Number"></td>
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
                        <td>
                          <div class="form_input"><input name="pin" id="pin"  type="text" class="tip_east" title="Zip"></div>
                          
                          </td>
                        <td colspan="-1">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td valign="middle">Mobile 
                          Number</td>
                        <td>
                         <div class="form_input"><input name="mob" id="mob"  type="text" class="tip_east" title="Mobile Number">
                         <br/>&nbsp;(Ex : 1234567890) 
                         </div>
                        </td>
                        <td colspan="-1" align="left" valign="middle" bgcolor="#FFFFFF">URL</td>
                        <td align="left" valign="middle" bgcolor="#FFFFFF">
                        <div class="form_input"><input name="url" id="url"  type="text" class="tip_east" title="URL"></div>
                        </td>
                      </tr>
                      
                      <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td colspan="4" align="center">  
						  <div align="right">
                          <input type="submit" name="submit" id="submit" value="Submit" style="background: #CCC;color:#000000;text-shadow: 1px 1px #DDD; padding:6px;border-radius:5px; font-weight:bold;"/>
                         
						 
						    &nbsp; </div></td>
                      </tr>
                      
                      <tr>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      
                    </table>
              </form>
  </div>
        </div>
    </div>
          <script>
		  function displayOtherfield(){
			  var companyname = $("#companyname option:selected").val();
			  if(companyname == 'Other'){
				  $("#other_field").show();
			  }else{
				   $("#other_field").hide();
			  }
		  }
		  </script>

