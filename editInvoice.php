<?php
$inId = $_REQUEST['inId'];
$SelQuery = "SELECT * FROM oxy2_leadinvoice WHERE id = '$inId'";
$SelExec = mysqli_query($con, $SelQuery);
$cntt = mysqli_num_rows($SelExec);
if ($cntt > 0) {
    $i = 0;
    while ($SelResult = mysqli_fetch_array($SelExec)) {
        $clientId = $SelResult['companyId'];
        $invoiceDate = $SelResult['invoiceDate'];
        $invoiceNumber = $SelResult['invoiceNumber'];
         $invoiceValue = $SelResult['invoiceValue'];
          $invoiceGp = $SelResult['invoiceGp'];
          $chequeNumber = $SelResult['chequeNumber'];
          $paymentRecieved = $SelResult['paymentRecieved'];
          $receivingDate = $SelResult['receivingDate'];
          $balance = $SelResult['balance'];
          $expiryDate = $SelResult['expiryDate'];
          $closureDate = $SelResult['closureDate'];
//        print_r($SelResult);
    }

    }
    
    if(isset($_POST['submit'])&& $_POST['submit'] !=''){
        $clientId = $_POST['companyId'];
        $invoiceDate = $_POST['invoiceDate'];
        $invoiceNumber = $_POST['invoiceNumber'];
         $invoiceValue = $_POST['invoiceValue'];
          $invoiceGp = $_POST['invoiceGp'];
          $chequeNumber = $_POST['chequeNumber'];
          $paymentRecieved = $_POST['paymentRecieved'];
          $receivingDate = $_POST['receivingDate'];
          $balance = $_POST['balance'];
          $expiryDate = $_POST['expiryDate'];
          $closureDate = $_POST['closureDate'];
          $sql1 = "UPDATE `oxy2_leadinvoice` SET


`companyId` = '$clientId',
`invoiceDate` = '$invoiceDate',
`invoiceNumber` = '$invoiceNumber',
`invoiceValue` = '$invoiceValue',
`invoiceGp` = '$invoiceGp',
`chequeNumber` = '$chequeNumber',
`paymentRecieved` = '$paymentRecieved',
`receivingDate` = '$receivingDate',
`balance` = '$balance',
`expiryDate` = '$expiryDate',
`closureDate` = '$closureDate'

WHERE `id` = '$inId';";

    $result = mysqli_query($con, $sql1);
    if ($result) {
        $actionResultRedirection = "success=true";
    } else {
        $actionResultRedirection = "success=false";
    }
    header("location:.?id=10&$actionResultRedirection");
    }
    ?>
<script type="text/javascript" src="js2/plugins/jquery-1.7.min.js"></script>
 <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

<script language = "JavaScript">
    function check()
    {

        if (document.form1.companyname.value == "")
        {
            alert("Please Enter the New Organization Name to add.");
            document.form1.companyname.focus();
            return false;
        }

        if (document.form1.contact.value == "")
        {
            alert("Please Enter the Contact Name.");
            document.form1.contact.focus();
            return false;
        }

        if (document.form1.email.value == "")
        {
            alert("Please Enter the Email.");
            document.form1.email.focus();
            return false;
        }

        if (document.form1.ccity.value == "")
        {
            alert("Please Enter the City.");
            document.form1.ccity.focus();
            return false;
        }

        if (document.form1.country.value == "")
        {
            alert("Please Enter the Country.");
            document.form1.country.focus();
            return false;
        }

        return true;
    }

</script>

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>-->
<script>
    $(function() {
    $( "#invoiceDate" ).datepicker();
		$( "#receivingDate" ).datepicker();
		$( "#expiryDate" ).datepicker();
		$( "#closureDate" ).datepicker();
		$( "#datepicker4" ).datepicker();
		$( "#datepicker5" ).datepicker();
		});
</script>


<!--One_Wrap-->
<div class="one_wrap fl_left">
    <div class="widget">
        <div class="widget_title"><span class="iconsweet">r</span>
            <h5>Edit Invoice</h5></div>
        <div class="widget_body">
            <form  action="" method="post" name="form1"  style="color: #818386;margin: 5px 0px 5px 25px;">

                <table width="879" border="0" align="center" cellpadding="0" cellspacing="0" id="applyCss">

                    <tr>
                        <td height="24" valign="middle"> Company</td>
                        <td colspan="3" valign="middle">
                            <div class="selector" id="uniform-category"><span>[Select One]</span>
                                <select name="companyId" id="companyId" >
                          <option value="">Select Client</option>
                            <?php
                            $que1="SELECT * FROM oxy2_clientn";
                            $res1=mysqli_query($con,$que1);
                            while($row1=mysqli_fetch_array($res1))
                            {
                                $companyname = $row1['companyname'];
                                $companyId = $row1['id'];
                                if($clientId == $companyId){ $clientSel =  "selected = selected ";} 
                                else{$clientSel = "";}
                                echo "<option value='$companyId' $clientSel>$companyname</option>";
                            }                      
                            ?>

                           </select>
                        
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td valign="middle">&nbsp;</td>
                        
                    </tr>
                    <tr>
                        <td valign="middle">Invoiced Date</td>
                        <td valign="top"><div class="form_input"><input name="invoiceDate" id="invoiceDate"  type="text" value="<?= $invoiceDate;?>" >
                                <span id="availability_status"></span>

                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>


                    <tr> 
                        <td width="15%" height="24" valign="middle">Invoice No *</td>
                        <td>
                            <div class="form_input"><input name="invoiceNumber" id="invoiceNumber"  type="text" class="tip_east" value="<?= $invoiceNumber?>"></div>
                        </td>
                        <td colspan="2"></td>
                    </tr>

                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>


                    <tr> 
                        <td valign="middle">Invoice Value</td>
                        <td>
                            <div class="form_input"><input name="invoiceValue" id="invoiceValue"  type="text" class="tip_east" value="<?= $invoiceValue?>"></div>
                        </td>
                        
                    </tr>

                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>

                    <tr> 
                        <td valign="middle">invoice GP 
                            1</td>
                        <td valign="top">
                            <div class="form_input"><input name="invoiceGp" id="invoiceGp"  type="text" class="tip_east" value="<?= $invoiceGp?>"></div>

                        
                    </tr>

                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>

                   

                    <tr> 
                        <td valign="middle">Cheque No.  *</td>
                        <td>
                            <div class="form_input"><input name="chequeNumber" id="chequeNumber"  type="text" class="tip_east" value="<?= $chequeNumber?>"></div>
                        </td>
                        
                    </tr>

                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>

                    <tr> 
                        <td height="26" valign="middle">Payment received *</td>
                        <td>
                            <div class="form_input"><input name="paymentRecieved" id="paymentRecieved"  type="text" class="tip_east" value="<?= $paymentRecieved?>" ></div>
                        </td>
                        
                    </tr>

                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                     <tr> 
                        <td valign="middle">Receiving Date 
                            </td>
                        <td> <div align="left">  
                                <div class="form_input"><input name="receivingDate" id="receivingDate"  type="text" class="tip_east" value="<?= $receivingDate?>"></div>

                            </div></td>
                        
                    </tr>

                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>

                    <tr> 
                        <td valign="middle">Balance 
                            Code</td>
                        <td>
                            <div class="form_input"><input name="balance" id="balance"  type="text" class="tip_east" value="<?= $balance?>"></div>

                        </td>
                        <td colspan="-1">&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>

                    <tr> 
                        <td valign="middle">Expiry Date</td>
                        <td>
                            <div class="form_input"><input name="expiryDate" id="expiryDate"  type="text" class="tip_east" value="<?= $expiryDate;?>">
                                <br/>&nbsp;
                            </div>
                        </td>
                        
                    </tr>

                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr> 
                        <td valign="middle">Closure Date
</td>
                        <td>
                            <div class="form_input"><input name="closureDate" id="closureDate"  type="text" class="tip_east" value="<?= $closureDate?>">
                                <br/>&nbsp;
                            </div>
                        </td>
                        
                    </tr>

                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr> 
                        <td colspan="4" align="center">  
                            <div align="left">
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


