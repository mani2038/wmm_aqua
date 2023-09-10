<?php
include('inc_connection.php');
//Include The Database Connection File 

if(isset($_POST['category']))//If a username has been submitted 
{
$category = mysql_real_escape_string($_POST['category']);//Some clean up :)


$result2 = mysql_query("SELECT * FROM oxy2_clientn WHERE companyname='$category'");
//Query to check if username is available or not 

if(mysql_num_rows($result2))
{
$id = mysql_result($result2,0,"id");
$companyname = mysql_result($result2,0,"companyname");
$contact = mysql_result($result2,0,"contact");
$add1 = mysql_result($result2,0,"add1");
$add2 = mysql_result($result2,0,"add2");
$ccity = mysql_result($result2,0,"ccity");
$country = mysql_result($result2,0,"country");
$pin = mysql_result($result2,0,"pin");
$ph1_ext = mysql_result($result2,0,"ph1_ext");
$ph2_ext = mysql_result($result2,0,"ph2_ext");
$phone1 = mysql_result($result2,0,"phone1");
$ph1_ext2 = mysql_result($result2,0,"ph1_ext2");
$ph2_ext2 = mysql_result($result2,0,"ph2_ext2");
$phone2 = mysql_result($result2,0,"phone2");
$ph1_ext3 = mysql_result($result2,0,"ph1_ext3");
$ph2_ext3 = mysql_result($result2,0,"ph2_ext3");
$phone3 = mysql_result($result2,0,"phone3");
$mob = mysql_result($result2,0,"mob");
$email = mysql_result($result2,0,"email");
$email2 = mysql_result($result2,0,"email2");
$desg = mysql_result($result2,0,"desg");
$url = mysql_result($result2,0,"url");

/*
echo "<table width='100%' border='0' cellspacing='1' cellpadding='5'>";
echo "<input name='id' type='hidden' class='txtlbl2' id='id'  value='$id'/>";
echo "<input name='country' type='hidden' class='txtlbl2' id='country'  value='$contact'/>";
echo "<tr>";
echo "<td width='30%' height='25' align='right'>Address :</td>";
echo "<td width='70%' height='25'>$add1</td>";
echo "</tr>";
echo "<tr>";
echo "<td width='30%' height='25' align='right'>Country :</td>";
echo "<td width='70%' height='25'>$country</td>";
echo "</tr>";

echo "</table>";
*/



echo "<table width='90%' border='0' cellspacing='2' cellpadding='2'>";
                                           
                      echo "<tr>";
                        echo "<td colspan='4'>&nbsp;</td>";
                      echo "</tr>";

 
                      echo "<tr>"; 
                        echo "<td width='15%' height='24' valign='middle'>Contact Name *</td>";
                        echo "<td>";
                        echo "<div class='form_input'><input name='contact' id='contact' type='text' class='tip_east' title='Contact Name' value='$contact'></div>
                        </td>";
                        echo "<td colspan='2'></td>";
                      echo "</tr>";
                      
                      echo "<tr>";
                        echo "<td colspan='4'>&nbsp;</td>
                      </tr>";

                      
                      echo "<tr>"; 
                        echo "<td valign='middle'>Desgination</td>";
                        echo "<td>";
                        echo "<div class='form_input'><input name='desg' id='desg' type='text' class='tip_east' title='Designation' value='$desg'></div>
                        </td>";
                        echo "<td colspan='-1'>Email 
                          Id *</td>";
                        echo "<td>";
                        echo "<div class='form_input'><input name='email' id='email' type='text' class='tip_east' title='Email' value='$email'></div>";
                          
                        echo "</td>
                      </tr>";
                      
                      echo "<tr>";
                        echo "<td colspan='4'>&nbsp;</td>
                      </tr>";
                      
                      echo "<tr>"; 
                        echo "<td valign='middle'>Address 
                          1</td>";
                        echo "<td valign='top'>
                        <div class='form_input'><input name='add1' id='add1' type='text' class='tip_east' title='Address' value='$add1'></div>";
                        
                        echo "<td colspan='-1'>Alternate 
                          Email Id</td>";
                        echo "<td>";
                         echo "<div class='form_input'><input name='email2' id='email2' type='text' class='tip_east' title='Alternate Email Id' value='$email2'></div>
                         
                        </td>
                      </tr>";
                      
                      echo "<tr>";
                        echo "<td colspan='4'>&nbsp;</td>
                      </tr>";
                      
                      echo "<tr>"; 
                        echo "<td valign='middle'>Address 
                          2</td>";
                        echo "<td><div align='left'>  
                             <div class='form_input'><input name='add2' id='add2' type='text' class='tip_east' title='Address 2' value='$add2'></div>
                            
                            </div></td>";
                        echo "<td colspan='-1'>Telephone 1</td>";
                        echo "<td>"; 
                        echo "<div class='form_input'>";
                            echo "<table width='86%' border='0' cellspacing='1' cellpadding='1'>";
                            echo "<tr>";
                            echo "<td><input name='ph1_ext' id='ph1_ext' type='text' class='tip_east' title='Phone Extension' value='$ph1_ext'></td>";
                            echo "<td><input name='ph2_ext' id='ph2_ext' type='text' class='tip_east' title='Phone Extension2' value='$ph2_ext'></td>";
                            echo "<td><input name='phone1' id='phone1' type='text' class='tip_east' title='Phone Number' value='$phone1'></td>";
                            echo "</tr>";
                            echo "</table>";
		                echo "</div>
                        </td>
                      </tr>";
                      
                      echo "<tr>";
                        echo "<td colspan='4'>&nbsp;</td>
                      </tr>";
                      
                      echo "<tr>"; 
                        echo "<td valign='middle'>City *</td>";
                        echo "<td>";
                        echo "<div class='form_input'><input name='ccity' id='ccity' type='text' class='tip_east' title='City' value='$ccity'></div>
                        </td>";
                        echo "<td colspan='-1'>Telephone 2 </td>";
                        echo "<td>";
                        
                         echo "<div class='form_input'>";
                            echo "<table width='86%' border='0' cellspacing='1' cellpadding='1'>";
                            echo "<tr>";
                            echo "<td><input name='ph1_ext2' id='ph1_ext2' type='text' class='tip_east' title='Extension1' value='$ph1_ext2'></td>";
                            echo "<td><input name='ph2_ext2' id='ph2_ext2' type='text' class='tip_east' title='Extension2' value='$ph2_ext2'></td>";
                            echo "<td><input name='phone2' id='phone2' type='text' class='tip_east' title='Landline Number' value='$phone2'></td>
                            </tr>
                            </table>
		                </div>
                          </td>
                      </tr>";
                      
                      echo "<tr>";
                        echo "<td colspan='4'>&nbsp;</td>
                      </tr>";
                      
                      echo "<tr>"; 
                        echo "<td height='26' valign='middle'>Country *</td>";
                        echo "<td>
                         <div class='form_input'><input name='country' id='country' type='text' class='tip_east' title='Contry' value='$country'></div>
                        </td>";
                        echo "<td colspan='-1'>Fax </td>";
                        echo "<td>";
                        
                        echo "<div class='form_input'>";
                            echo "<table width='86%' border='0' cellspacing='1' cellpadding='1'>";
                            echo "<tr>";
                             echo "<td><input name='ph1_ext3' id='ph1_ext3' type='text' class='tip_east' title='Extension' value='$ph1_ext3'></td>";
                            echo "<td><input name='ph2_ext3' id='ph2_ext3' type='text' class='tip_east' title='Extension' value='$ph2_ext3'></td>";
                            echo "<td><input name='phone3' id='phone3' type='text' class='tip_east' title='Fax Number' value='$phone3'></td>";
                            echo "</tr>";
                            echo "</table>
		                </div>
                                         
                        </td>
                      </tr>";
                      
                      echo "<tr>";
                        echo "<td colspan='4'>&nbsp;</td>";
                      echo "</tr>";
                      
                      
                      echo "<tr>"; 
                        echo "<td valign='middle'>Zip 
                          Code</td>";
                        echo "<td>
                          <div class='form_input'><input name='pin' id='pin' type='text' class='tip_east' title='Zip' value='$pin'></div>
                          
                          </td>";
                        echo "<td colspan='-1'>&nbsp;</td>";
                        echo "<td>&nbsp;</td>";
                      echo "</tr>";
                      
                      echo "<tr>";
                        echo "<td colspan='4'>&nbsp;</td>";
                      echo "</tr>";
                      
                      echo "<tr>"; 
                        echo "<td valign='middle'>Mobile 
                          Number</td>";
                        echo "<td>";
                         echo "<div class='form_input'><input name='mob' id='mob' type='text' class='tip_east' title='Mobile Number' value='$mob'>
                         <br/>&nbsp;(Ex : 1234567890) 
                         </div>
                        </td>";
                        echo "<td colspan='-1' align='left' valign='middle' bgcolor='#FFFFFF'>URL</td>";
                        echo "<td align='left' valign='middle' bgcolor='#FFFFFF'>";
                        echo "<div class='form_input'><input name='url' id='url' type='text' class='tip_east' title='URL' value='$url'></div>
                        </td>
                      </tr>";
                      
                      echo "<tr>";
                        echo "<td colspan='4'>&nbsp;</td>
                      </tr>
                      
                      </table>";




}
else
{
echo '0';//No Record Found - Username is available 
}

}

?>