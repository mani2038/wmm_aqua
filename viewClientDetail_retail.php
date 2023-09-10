<?php include_once('commonFunction.php'); ?>
<style type="text/css">
div.form_input input, div.form_input textarea {
width: 80%;
border: solid 1px #CCC;
padding: 8px;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
background: #F8F8F8;
border-radius: 3px;
color: #666;
box-shadow: inset 0 1px 0 0px white;
-webkit-box-shadow: inset 0 1px 0 0px white;
}

</style>

<?php  
$clientID = $_REQUEST['clientID'];
             
$SelQuery = "SELECT * FROM oxy2_clientn_retail WHERE id = '$clientID'";
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
        	<h5>View Client Detail</h5></div>
            <div class="widget_body">
				<!--Form fields-->
                      
                    <table width="879" border="0" align="center" cellpadding="0" cellspacing="0"  style="color: #818386;margin: 5px 0px 5px 25px;">
                      <tr> 
                        <td colspan="4" align="right">&nbsp;</td>
                      </tr>
                     
 
                      <tr>
                        <td height="24" colspan="4" valign="middle"></td>
                      </tr>
                      <tr>
                        <td height="24" valign="middle">Client Name</td>
                        <td>
                        <div class="form_input"><input name="companyname1" id="companyname1"  type="text" class="tip_east" title="Client Name" value="<?php echo $companyname1; ?>"  disabled="disabled"></div>
                       </td>
                       <td colspan="2"></td>
                      </tr>
                      <tr> 
                        <td width="15%" height="24" valign="middle">Contact Name</td>
                        <td>
                        <div class="form_input"><input name="contact" id="contact"  type="text" class="tip_east" title="Contact Name" value="<?php echo $contact1; ?>"  disabled="disabled"></div>
                       </td>
                       <td colspan="2"></td>
                      </tr>
                      <tr> 
                        <td valign="middle">Desgination</td>
                        <td>
                        <div class="form_input"><input name="desg" id="desg"  type="text" class="tip_east" title="Designation" value="<?php echo $desg1; ?>"  disabled="disabled"></div>
                       
                        <td colspan="-1">&nbsp;</td>
                        <td>&nbsp; 
                          </td>
                      </tr>
                      
                      <tr> 
                        <td valign="middle">Address 
                          1</td>
                        <td valign="top">
                         <div class="form_input"><input name="add1" id="add1"  type="text" class="tip_east" title="Address 1" value="<?php echo $add11; ?>"  disabled="disabled"></div>
                       </td>
                        <td colspan="-1" valign="top">&nbsp;</td>
                        <td valign="top">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td valign="middle">Address 
                          2</td>
                        <td> <div align="left"> <div class="form_input"><input name="add2" id="add2"  type="text" class="tip_east" title="Address 1" value="<?php echo $add21; ?>"  disabled="disabled"></div>
                            
                            </div></td>
                        <td colspan="-1">Email 
                          Id</td>
                        <td><div class="form_input"><input name="email" id="email"  type="text" class="tip_east" title="Address 1" value="<?php echo $email1; ?>"  disabled="disabled"></div>

                         
                          </td>
                      </tr>
                      <tr> 
                        <td valign="middle">City</td>
                        <td>
                        <div class="form_input"><input name="ccity" id="ccity"  type="text" class="tip_east" title="Address 1" value="<?php echo $ccity1; ?>"  disabled="disabled"></div>

                        </td>
                        <td colspan="-1">Alternate 
                          Email Id</td>
                        <td><div class="form_input"><input name="email2" id="email2"  type="text" class="tip_east" title="Address 1" value="<?php echo $email21; ?>"  disabled="disabled"></div>

                        
                          </td>
                      </tr>
                      <tr> 
                        <td height="26" valign="middle">Country</td>
                        <td>
                        <div class="form_input"><input name="country" id="country"  type="text" class="tip_east" title="Address 1" value="<?php echo $country1; ?>"  disabled="disabled"></div>

                       </td>
                        <td colspan="-1">Telephone</td>
                        <td width="32%">
                        <div class="form_input">
                        <table width="86%" border="0" cellspacing="1" cellpadding="1">
                            <tr>
                            <td>
                        <input name="ph1_ext" id="ph1_ext"  type="text" class="tip_east" title="Address 1" value="<?php echo $ph1_ext1; ?>"  disabled="disabled"></td>
                            <td> <input name="ph2_ext" id="ph2_ext"  type="text" class="tip_east" title="Address 1" value="<?php echo $ph2_ext1; ?>"  disabled="disabled"></td>
                            <td> <input name="phone1" id="phone1"  type="text" class="tip_east" title="Address 1" value="<?php echo $phone11; ?>"  disabled="disabled"></td>
                            </tr>
                            </table>   
                       
                        
                        </div>

                       </td>
                      </tr>
                      <tr> 
                        <td valign="middle">Zip 
                          Code</td>
                        <td><div class="form_input"><input name="pin" id="pin"  type="text" class="tip_east" title="Address 1" value="<?php echo $pin1; ?>"  disabled="disabled"></div>
                         
                          </td>
                        <td colspan="-1">Telephone 
                          </td>
                        <td><div class="form_input">
                        
                         <table width="86%" border="0" cellspacing="1" cellpadding="1">
                            <tr>
                            <td>
                       				<input name="ph1_ext2" id="ph1_ext2"  type="text" class="tip_east" title="Address 1" value="<?php echo $ph1_ext21; ?>"  disabled="disabled"></td>
                            <td> <input name="ph2_ext2" id="ph2_ext2"  type="text" class="tip_east" title="Address 1" value="<?php echo $ph2_ext21; ?>"  disabled="disabled"></td>
                            <td>  <input name="phone2" id="phone2"  type="text" class="tip_east" title="Address 1" value="<?php echo $phone21; ?>"  disabled="disabled"></td>
                            </tr>
                            </table>
                        
                        
                        
                       
                       
                        
                        </div>
                         
                          
                          </td>
                      </tr>
                      <tr> 
                        <td valign="middle">Mobile 
                          Number</td>
                        <td><div class="form_input"><input name="mob" id="mob"  type="text" class="tip_east" title="Address 1" value="<?php echo $mob1; ?>"  disabled="disabled"></div>
                         
                          &nbsp;(Ex : 1234567890) </td>
                        <td colspan="-1">Fax 
                          </td>
                        <td><div class="form_input">
                        
                        <table width="86%" border="0" cellspacing="1" cellpadding="1">
                            <tr>
                            <td>
                       				<input name="ph1_ext3" id="ph1_ext3"  type="text" class="tip_east" title="Address 1" value="<?php echo $ph1_ext31; ?>"  disabled="disabled"></td>
                            <td>   <input name="ph2_ext3" id="ph2_ext3"  type="text" class="tip_east" title="Address 1" value="<?php echo $ph2_ext31; ?>"  disabled="disabled"></td>
                            <td>    <input name="phone3" id="phone3"  type="text" class="tip_east" title="Address 1" value="<?php echo $phone31; ?>"  disabled="disabled"></td>
                            </tr>
                            </table>
                        
                        
                        
                      
                      
                        
                        </div>
                          
                         
                        </td>
                      </tr>
                      <tr align="left" bgcolor="#FFFFFF"> 
                        <td valign="middle">&nbsp;</td>
                        <td valign="middle">&nbsp; 
                          </td>
                        <td width="14%" colspan="-1" valign="middle">URL</td>
                        <td valign="middle">
                         <div class="form_input"><input name="url" id="url"  type="text" class="tip_east" title="URL" value="<?php echo $url1; ?>"  disabled="disabled"></div>
                       </td>
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
                            <td width="21%">&nbsp;</td>
                            <td width="27%">&nbsp;</td>
                            <td width="4%">&nbsp;</td>
                            <td width="16%">&nbsp;</td>
                            <td width="29%">&nbsp;</td>
                            <td width="3%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">Jan - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m1" id="p_m1"  type="text" class="tip_east"  value="<?php echo $p_m11; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">July - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m2" id="p_m2"  type="text" class="tip_east" value="<?php echo $p_m21; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">Feb - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m3" id="p_m3"  type="text" class="tip_east"  value="<?php echo $p_m31; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">August - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m4" id="p_m4"  type="text" class="tip_east"  value="<?php echo $p_m41; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">March - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m5" id="p_m5"  type="text" class="tip_east"  value="<?php echo $p_m51; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">September - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m6" id="p_m6"  type="text" class="tip_east"  value="<?php echo $p_m61; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">April - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m7" id="p_m7"  type="text" class="tip_east"  value="<?php echo $p_m71; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">October - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m8" id="p_m8"  type="text" class="tip_east"  value="<?php echo $p_m81; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">May - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                            <div class="form_input"><input name="p_m9" id="p_m9"  type="text" class="tip_east"  value="<?php echo $p_m91; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">November - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m10" id="p_m10"  type="text" class="tip_east"  value="<?php echo $p_m101; ?>"  disabled="disabled"></div>
                           </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">June - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m11" id="p_m11"  type="text" class="tip_east"  value="<?php echo $p_m111; ?>"  disabled="disabled"></div>
                            </td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">December - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="p_m12" id="p_m12"  type="text" class="tip_east"  value="<?php echo $p_m121; ?>"  disabled="disabled"></div>
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
                      
                      
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle">&nbsp;</td>
                      </tr>
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle"><fieldset>
                        <legend><span class="style2">Client Montly Realistic Target</span>                        </legend>
                        <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1">
                          <tr>
                            <td width="21%">&nbsp;</td>
                            <td width="27%">&nbsp;</td>
                            <td width="4%">&nbsp;</td>
                            <td width="16%">&nbsp;</td>
                            <td width="29%">&nbsp;</td>
                            <td width="3%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">Jan - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m1" id="r_m1"  type="text" class="tip_east"  value="<?php echo $r_m11; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">July - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m2" id="r_m2"  type="text" class="tip_east"  value="<?php echo $r_m21; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">Feb - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m3" id="r_m3"  type="text" class="tip_east"  value="<?php echo $r_m31; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">August - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m4" id="r_m4"  type="text" class="tip_east"  value="<?php echo $r_m41; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">March - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m5" id="r_m5"  type="text" class="tip_east"  value="<?php echo $r_m51; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">September - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m6" id="r_m6"  type="text" class="tip_east"  value="<?php echo $r_m61; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">April - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m7" id="r_m7"  type="text" class="tip_east"  value="<?php echo $r_m71; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">October - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m8" id="r_m8"  type="text" class="tip_east"  value="<?php echo $r_m81; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">May - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                            <div class="form_input"><input name="r_m9" id="r_m9"  type="text" class="tip_east"  value="<?php echo $r_m91; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">November - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m10" id="r_m10"  type="text" class="tip_east"  value="<?php echo $r_m101; ?>"  disabled="disabled"></div>
                           </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">June - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m11" id="r_m11"  type="text" class="tip_east"  value="<?php echo $r_m111; ?>"  disabled="disabled"></div>
                            </td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">December - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="r_m12" id="r_m12"  type="text" class="tip_east"  value="<?php echo $r_m121; ?>"  disabled="disabled"></div>
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
                      
                      
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle">&nbsp;</td>
                      </tr>
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle"><fieldset>
                        <legend><span class="style2">Client Montly Optimistic Target</span>                        </legend>
                        <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1">
                          <tr>
                            <td width="21%">&nbsp;</td>
                            <td width="27%">&nbsp;</td>
                            <td width="4%">&nbsp;</td>
                            <td width="16%">&nbsp;</td>
                            <td width="29%">&nbsp;</td>
                            <td width="3%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">Jan - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m1" id="o_m1"  type="text" class="tip_east"  value="<?php echo $o_m11; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">July - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m2" id="o_m2"  type="text" class="tip_east"  value="<?php echo $o_m21; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">Feb - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m3" id="o_m3"  type="text" class="tip_east"  value="<?php echo $o_m31; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">August - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m4" id="o_m4"  type="text" class="tip_east"  value="<?php echo $o_m41; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">March - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m5" id="o_m5"  type="text" class="tip_east"  value="<?php echo $o_m51; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">September - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m6" id="o_m6"  type="text" class="tip_east"  value="<?php echo $o_m61; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">April - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m7" id="o_m7"  type="text" class="tip_east"  value="<?php echo $o_m71; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">October - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m8" id="o_m8"  type="text" class="tip_east"  value="<?php echo $o_m81; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">May - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                            <div class="form_input"><input name="o_m9" id="o_m9"  type="text" class="tip_east"  value="<?php echo $o_m91; ?>"  disabled="disabled"></div></td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">November - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m10" id="o_m10"  type="text" class="tip_east"  value="<?php echo $o_m101; ?>"  disabled="disabled"></div>
                           </td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">June - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m11" id="o_m11"  type="text" class="tip_east"  value="<?php echo $o_m111; ?>"  disabled="disabled"></div>
                            </td>
                            <td>&nbsp;</td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="style1">December - GP Target </span></td>
                            <td align="left" valign="middle" bgcolor="#FFFFFF">
                             <div class="form_input"><input name="o_m12" id="o_m12"  type="text" class="tip_east"  value="<?php echo $o_m121; ?>"  disabled="disabled"></div>
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
                      
                      
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle">&nbsp;</td>
                      </tr>
                      <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle"><fieldset>
                        <legend><span class="style2">Account Specification</span></legend>
                        
                        <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1">
                          <tr>
                            <td width="21%"><span class="style1">Zone </span></td>
                            <td width="31%"><select name="zone" id="zone">
                              <option value="">Select Zone</option>
                        <option value="North" <?php if($zone1 == "North"){echo "selected = selected";} ?>>North</option>
                        <option value="South" <?php if($zone1 == "South"){echo "selected = selected";} ?>>South</option>
                         <option value="East" <?php if($zone1 == "East"){echo "selected = selected";} ?>>East</option>
                         <option value="West" <?php if($zone1 == "West"){echo "selected = selected";} ?>>West</option>
                        <option value="Singapore" <?php if($zone1 == "Singapore"){echo "selected = selected";} ?>>Singapore</option> 
						
               	      </select> 
                            </select></td>
                            <td width="16%"><span class="style1">Account Director </span></td>
                            <td width="32%"><SELECT NAME="ad" class="select" id="ad">
                              <option>Select Account Director</option>
                	    <?php
                        $que="SELECT * FROM oxy2_users ";
                        $res=mysqli_query($con,$que);
                        while($row=mysqli_fetch_array($res))
                        {
                        $fname = $row['fname'];
						$lname = $row['lname'];
						$cNAme = $fname." ".$lname;
						$user_id = $row['user_id'];
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
                      
                       <tr align="left" bgcolor="#FFFFFF">
                        <td colspan="4" valign="middle">&nbsp;</td>
                      </tr>
                      
                     
                    </table>
               
                
                
                <!--  Ended-->
            </div>
        </div>
    </div>
                     
 	<br class="clear" />  
 