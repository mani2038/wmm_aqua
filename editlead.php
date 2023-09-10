<script language="JavaScript1.2">
    function openwindow1(ldD)
    {
        window.open("uploadPnl.php?leadNumber=" + ldD, "mywindow", "menubar=1,resizable=1,width=300,height=200,top=70,left=20");
    }
</script>
<link rel="stylesheet" href="css/styleforLead.css" type="text/css" />
<link rel="stylesheet" href="css/style.grayforLead.css" type="text/css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

<script src="fivefy/jquery.uploadifive.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="fivefy/uploadifive.css"> 
<!-- Jquery Calender Script -->

<style type="text/css">
    .uploadifive-button {
        float: left;
        margin-right: 10px;
    }
    #queue {
        border: 1px solid #E5E5E5;
        height: 65px;
        overflow: auto;
        margin-bottom: 10px;
        padding: 0 3px 3px;
        width: 300px;
    }
</style>	
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

<script>
$(document).ready(function () {

    $("#datepicker").datepicker();
    $("#datepicker1").datepicker();
    $("#datepicker2").datepicker();
    $("#datepicker3").datepicker();
$("#client_po").hide();
		$("#value_po").hide();

});
</script>
<!-- <script>
$(function() {


$('#file_upload').uploadify({
'uploader'  : 'uploadify/uploadify.swf',
'script'    : 'uploadify/uploadify.php',
'cancelImg' : 'uploadify/cancel.png',    
'folder'    : 'usr_chart_op',  /*Destination Folder*/
'fileExt'   : '*.jpg;*.gif;*.png;*.pdf', /*These extenstion files*/
    //'checkExisting' : 'check.php',
'multi'     : false,   /*Multiple file upload option*/
'sizeLimit' : 200000, /*Here I have set the file size limit - 400KB*/
'displayData': 'percentage',
'scriptData' : {'event_id' : $('#event_id').val(),'section' : $('#section').val()},
onComplete: function (evt, queueID, fileObj, response, data) {
    //alert('The file ' + fileObj.name + ' was uploaded with a response of ' + response + ' : ' + data);	
 //alert(": "+response);
     if(response == "Invalid file type.")
     {
     alert("Please select coreect file type *.jpg *.gif *.png *.pdf");
     }
     else
     {
     $("#upload_con").val(response);
     }
    
 }// end onComplete function		
    
    
    }); // end of uploadify code.......

});
    
    
    
    
</script>-->
<!-- Calender Script Ended -->

<!--Pop For Invoice -->

<!-- Ended -->

<script type="text/javascript">

    function openwindow(leadId)
    {
        window.open("addInvoice.php?leadId=" + leadId, "mywindow", "menubar=1,resizable=1,width=1150,height=500,top=70,left=20");
    }

    /*function check()
     {
     
     if (document.form1.dept.value==" ")
     {
     alert("Please select a department.");
     document.form1.dept.focus();
     return false;
     }
     
     
     
     
     return true;
     }*/


    function showDropdown(status) {

        if (status == " ")
        {

            document.getElementById("contractee").style.display = "none";
            document.getElementById("invoiceee").style.display = "none";

        }

        if (status == "Prospect")
        {

            document.getElementById("contractee").style.display = "none";
            document.getElementById("invoiceee").style.display = "none";

        }

        if (status == "Proposal")
        {

            document.getElementById("contractee").style.display = "none";
            document.getElementById("invoiceee").style.display = "none";

        }

        if (status == "Lead")
        {

            document.getElementById("contractee").style.display = "none";
            document.getElementById("invoiceee").style.display = "none";

        }

        if (status == "Negotiation")
        {

            document.getElementById("contractee").style.display = "none";
            document.getElementById("invoiceee").style.display = "none";

        }



        if (status == "Contracted")
        {

            document.getElementById("contractee").style.display = "block";

            document.getElementById("invoiceee").style.display = "none";

        }

        if (status == "Invoiced")
        {
            document.getElementById("invoiceee").style.display = "block";
            document.getElementById("contractee").style.display = "none";

        }




    }
</script>

<script type="text/javascript">
    function check()
    {
        var numtest = /^[0-9]+$/;
        if (document.form2.dateReceived.value == "")
        {
            alert("Please enter Date Recieved.");
            document.form2.dateReceived.focus();
            return false;
        }

        if (document.form2.dateReceived1.value == "")
        {
            alert("Please enter the Event Date.");
            document.form2.dateReceived1.focus();
            return false;
        }

        if (document.form2.dateReceived2.value == "")
        {
            alert("Please enter the Event End Date.");
            document.form2.dateReceived2.focus();
            return false;
        }

        if (document.form2.bdstatus.value == " ")
        {
            alert("Please select the Status.");
            document.form2.bdstatus.focus();
            return false;
        }

        if (document.form2.bdstatus.value == "Contracted") {

            if (document.form2.contractee1.checked == false && document.form2.contractee2.checked == false) {
                alert("Please select the contracted Options.");
                return(false);
            } else
            {

                if (document.form2.upload_con.value == "" || document.form2.upload_con.value == "0")
                {
                    alert("Please upload contract or any approval Doc or E-Mail copy in either JPEG or PDF format & File Size Limit is 2 max.");
                    document.form2.upload_con.focus();
                    return false;
                }

            }
        }





        if (document.form2.profit.value == "")
        {
            alert("Please ente the Profit.");
            document.form2.profit.focus();
            return false;
        }
//        if (!(numtest.test(document.form2.profit.value)))
//        {
//            alert("Only Digits Required!");
//            document.form2.profit.value = "";
//            document.form2.profit.focus();
//            return(false);
//        }
        /*if (document.form2.final_p_l.value=="")
         {
         alert("Please ente the Fianl P & L.");
         document.form2.final_p_l.focus();
         return false;
         }
         if(!(numtest.test(document.form2.final_p_l.value)))
         {
         alert("Only Digits Required!");
         document.form2.final_p_l.value = "";
         document.form2.final_p_l.focus();
         return(false);
         }*/
        if (document.form2.expectedClosure.value == "")
        {
            alert("Please ente the Expected Closure Date.");
            document.form2.expectedClosure.focus();
            return false;
        }

        if (document.form2.reason.value == "")
        {
            alert("Please ente the Reason.");
            document.form2.reason.focus();
            return false;
        }


        return true;
    }
</script>
<?php
include('NewClass.php');
$newclass = new Newclass();
$leadId = $_REQUEST['ldId'];

function convertDateinProperFormat($nDate) {
    if ($nDate != "") {
        $der = explode("/", $nDate);
        $dd = $der['0'];
        $mm = $der['1'];
        $yy = $der['2'];
        $newDate = $yy . "-" . $dd . "-" . $mm;
        return $newDate;
    } else {
        return "0000-00-00";
    }
}

function convertDateinOriginalFormat($nDate) {
    if ($nDate != "") {
        $der = explode("-", $nDate);
        $yy = $der['0'];
        $mm = $der['1'];
        $dd = $der['2'];
        $newDate = $mm . "/" . $dd . "/" . $yy;
        return $newDate;
    } else {
        return "00/00/0000";
    }
}

$userName = $_COOKIE["name"];
if (isset($_POST['dateReceived']) && $_POST['dateReceived'] != '') {
    $profitability = addslashes(trim($_POST['profitability']));
    $leadno = addslashes(trim($_POST['leadno']));
    $contact = addslashes(trim($_POST['contact']));
    $companyname = addslashes(trim($_POST['companyname']));
    $dept = addslashes(trim($_POST['dept']));
    $upload_po = addslashes(trim($_POST['upload_po']));
    $upload_con = addslashes(trim($_POST['upload_con']));


    $dateRec = addslashes(trim($_POST['dateReceived']));
    $dateReceived = convertDateinProperFormat($dateRec);

    $dateRec1 = addslashes(trim($_POST['dateReceived1']));
    $dateReceived1 = convertDateinProperFormat($dateRec1);

    $dateRec2 = addslashes(trim($_POST['dateReceived2']));
    $dateReceived2 = convertDateinProperFormat($dateRec2);

    $bdstatus = addslashes(trim($_POST['bdstatus']));

    if ($bdstatus == "Contracted") {

        $contractee1 = addslashes(trim($_POST['contractee1']));
        $contractee2 = addslashes(trim($_POST['contractee2']));
        $contractee3 = addslashes(trim($_POST['contractee3']));
        $contractee4 = addslashes(trim($_POST['contractee4']));
    } else {
        $contractee1 = "";
        $contractee2 = "";
        $contractee3 = "";
        $contractee4 = "";
    }

    $curr = addslashes(trim($_POST['curr']));

    $revnue = addslashes(trim($_POST['revnue']));
//$final_p_l  = addslashes(trim($_POST['final_p_l']));
    $profit = addslashes(trim($_POST['profit']));

    $expectedClo = addslashes(trim($_POST['expectedClosure']));
    $expectedClosure = convertDateinProperFormat($expectedClo);

    $reason = addslashes(trim($_POST['reason']));

    $updatedBy = $userName;
	$client_po_number = addslashes(trim($_POST['client_po_number']));
$po_value = addslashes(trim($_POST['po_value']));
$po_type = addslashes(trim($_POST['po_type']));
    $updationdate = "date_add(now(), interval 630 minute)";
	

 

    $sql1 = "UPDATE oxy2_lead SET bdstatus='$bdstatus',client_po_number='$client_po_number',po_value='$po_value',po_type='$po_type',curr='$curr',profitability='$profitability',profit='$profit',revnue='$revnue',beventStartDate='$dateReceived1',beventEndDate='$dateReceived2',ceventStartDate='$dateReceived1',ceventEndDate='$dateReceived2',updatedby='$updatedBy',updationdate='$updationdate',paydaterece='$dateReceived',exppaydate='$expectedClosure',contractee1='$contractee1',contractee2='$contractee2',contractee3='$contractee3',contractee4='$contractee4',reason='$reason' WHERE id='$leadId'";

    $result = mysqli_query($con, $sql1);
	if($bdstatus=="Invoiced"){
		$to = "atul.gupta@watermarkexperience.com , praveen.r@watermarkexperience.com,imanish.yadav@gmail.com";
		//$to = "bhalani.akashb@gmail.com ,akash.bhalani88@gmail.com";
		$message = "Lead No : $leadno <br>
		Lead status changed from lead to invoiced";
		$subject = "Change Lead Status" ; 
		$newclass->SentMail($to,$subject,$message);
		//$newclass->SentMail('akash.bhalani88@gmail.com',$message);
	}
    if($_POST['bdstatus']=='Invoiced'){
       $to = "atul.gupta@watermarkexperience.com , praveen.r@watermarkexperience.com,imanish.yadav@gmail.com";
             $subject = "Change Lead Status" ; 
             $headers = "From:Sercon Oxygen<sercon.oxygen@batessercon.com>\r\nReply-To:sercon.oxygen@batessercon.com";
            $headers .= "\r\nContent-type: text/html\r\n";
            $message = "Lead status changed from lead to invoiced";
            $mail_sent = @mail( $to, $subject, $message, $headers );
    }
//echo "$sql1";
//echo "<br>";

    $sql = "INSERT INTO oxy2_leadlog (`leadno`,`leadId`,`contact`,`companyname`,`dept`,`bdstatus`,`curr`,`profit`,`revnue`,`beventStartDate`,`beventEndDate`,`ceventStartDate`,`ceventEndDate`,`updatedby`,`updationdate`,`paydaterece`,`exppaydate`,`contractee1`,`contractee2`,`contractee3`,`contractee4`,`reason`)

VALUES

('$leadno','$leadId','$contact','$companyname','$dept','$bdstatus','$curr','$profit','$revnue','$dateReceived1','$dateReceived2','$dateReceived1','$dateReceived2','$updatedby','$updationdate','$dateReceived','$expectedClosure','$contractee1','$contractee2','$contractee3','$contractee4','$reason')";


    $resultForLog = mysqli_query($con, $sql);

    if ($result) {
        $actionResultRedirection = "success=true";
    } else {
        $actionResultRedirection = "success=false";
    }
    header("location:.?id=10&$actionResultRedirection");
}
?>


<?php
$SelQuery = "SELECT * FROM oxy2_lead WHERE id = '$leadId'";
$SelExec = mysqli_query($con, $SelQuery);
$cntt = mysqli_num_rows($SelExec);
if ($cntt > 0) {
    $i = 0;
    while ($SelResult = mysqli_fetch_array($SelExec)) {
//        print_r($SelResult);
        $leadno = $SelResult['leadno'];
        $contact = $SelResult['contact'];
        $companyname = $SelResult['companyname'];
        $dept = $SelResult['dept'];
        $add1 = $SelResult['add1'];
        $ccity = $SelResult['ccity'];
        $country = $SelResult['country'];
        $mob = $SelResult['mob'];
        $email = $SelResult['email'];
        $desg = $SelResult['desg'];
        $othersact = $SelResult['othersact'];
        $event_city = $SelResult['event_city'];
        $event_country = $SelResult['event_country'];
        $keydel = $SelResult['keydel'];
        $specinst = $SelResult['specinst'];
        $eventbrief = $SelResult['eventbrief'];
        $bdstatus = $SelResult['bdstatus'];
        $curr = $SelResult['curr'];
        $profit = $SelResult['profit'];
        $revnue = $SelResult['revnue'];
        $lgs = $SelResult['lgs'];

        $beventStartDate = $SelResult['beventStartDate'];
        $beventEndDate = $SelResult['beventEndDate'];

        $coutelet_type = $SelResult['coutelet_type'];
        $c_permission = $SelResult['c_permission'];
        $cnumber_outlets = $SelResult['cnumber_outlets'];
        $cnumberOfdays = $SelResult['cnumberOfdays'];

        $ceventStartDate = $SelResult['ceventStartDate'];
        $ceventEndDate = $SelResult['ceventEndDate'];
        $project_pl_amount = $SelResult['project_pl_amount'];
        $final_p_l = $SelResult['final_p_l'];
        $pl_percentage = $SelResult['pl_percentage'];
        $total_esti_amount = $SelResult['total_esti_amount'];
        $profitability = $SelResult['profitability'];
        $project_fee_amount = $SelResult['project_fee_amount'];
        $sub_total = $SelResult['sub_total'];
        $gst_amount = $SelResult['gst_amount'];
        $grand_amount_total = $SelResult['grand_amount_total'];
        $expenses = $SelResult['expenses'];
		$client_po_number = $SelResult['client_po_number'];
		$po_value = $SelResult['po_value'];
		$po_type = $SelResult['po_type'];
        if ($dept == "B2B") {
            $fromDate_o = $beventStartDate;
            $endDate_o = $beventEndDate;
        }

        if ($dept == "B2C") {
            $fromDate_o = $ceventStartDate;
            $endDate_o = $ceventEndDate;
        }
        $fromDate = convertDateinOriginalFormat($fromDate_o);
        $endDate = convertDateinOriginalFormat($endDate_o);

        $creator = $SelResult['creator'];
        $updatedby = $SelResult['updatedby'];
        $updationdate = $SelResult['updationdate'];
        $leadname = $SelResult['leadname'];
        $reg_time = $SelResult['reg_time'];
        $creatorid = $SelResult['creatorid'];
        $invdate = $SelResult['invdate'];
        $invno = $SelResult['invno'];
        $invamount = $SelResult['invamount'];
        $paychnn = $SelResult['paychnn'];

        $paydat = $SelResult['paydaterece'];
        $paydaterece = convertDateinOriginalFormat($paydat);

        $paybal = $SelResult['paybal'];

        $exppay = $SelResult['exppaydate'];
        $exppaydate = convertDateinOriginalFormat($exppay);

        $othclient = $SelResult['othclient'];
        $invgp = $SelResult['invgp'];
        $digital_work = $SelResult['digital_work'];
        $otherDigitalWork = $SelResult['otherDigitalWork'];
        $retail = $SelResult['retail'];
        $zone = $SelResult['zone'];
        $leadtype = $SelResult['leadtype'];
        $fdate = $SelResult['fdate'];
        $tdate = $SelResult['tdate'];

        $contractee1 = $SelResult['contractee1'];
        $contractee2 = $SelResult['contractee2'];
        $contractee3 = $SelResult['contractee3'];
        $contractee4 = $SelResult['contractee4'];
        $reason = $SelResult['reason'];
    }
}
?>  

<div class="one_wrap fl_left">
    <div class="widget">
        <div class="widget_title"><span class="iconsweet">r</span>
            <h5>Update Commercial Information</h5></div>
        <div class="widget_body">

            <div class="content">

                <!--contenttitle-->



                <h5><?php echo "Lead Name : " . $leadname; ?></h5>
                <h5><?php echo $dept . " : " . $leadno; ?></h5>



                <form id="form2" name="form2" class="stdform stdform2" method="post" action="#" onSubmit="return check()">


                    <p>
                        <label>Date Recieved :*</label>
                        <span class="field"><input name="dateReceived" type="text" class="smallinput" id="datepicker" value="<?php echo $paydaterece; ?>" readonly="readonly"/></span>
                    </p>

                    <p>
                        <label>Event Date :*</label>
                        <span class="field"><input name="dateReceived1" type="text" class="smallinput" id="datepicker1" value="<?php echo convertDateinOriginalFormat($beventStartDate); ?>" readonly="readonly" /></span>
                    </p>  

                    <p>
                        <label>Event End Date :*</label>
                        <span class="field"><input name="dateReceived2" type="text" class="smallinput" id="datepicker2" value="<?php echo convertDateinOriginalFormat($beventEndDate); ?>" readonly="readonly"/></span>                        </p>

                    <p>
                        <label>Status<?php echo checkForPnl1($leadno, '1'); ?>
                            <br/>
                            <span style="font-size:11px;">
<?php if (checkForPnl($leadno) == "0") { ?>
                                    <a class="tip_north" original-title="Upload PNL or ESTIMATE for approval" href="javascript: openwindow1(<?php echo $leadno; ?>)"  style="color:#6C6C6C;padding:0 1px;font-size:11px;">
                                        Upload PNL or Estimate</a>
<?php
} 
?>

                            </span>

                        </label>                            
                    <div style="border-left:1px solid #ddd;border-right:1px solid #ddd;"><span class="field">

                            <select name="bdstatus" id="bdstatus" onChange="showDropdown(this.value),checkStatus(this.value)" style="margin-bottom:10px;">
                                <option value=" ">Select Status</option>

                                <?php if ($bdstatus == "Invoiced") { ?>

                                    <option value="Invoiced" <?php if ($bdstatus == "Invoiced") {
                                    echo "selected = selected";
                                } ?>>Invoiced</option>


                                <?php } else if ($bdstatus == "Contracted") { ?>
                                    <option value="Contracted" <?php if ($bdstatus == "Contracted") {
                                    echo "selected = selected";
                                } ?>>Contracted</option>
                                    <option value="Invoiced" <?php if ($bdstatus == "Invoiced") {
                                    echo "selected = selected";
                                } ?>>Invoiced</option>
<?php } else { ?>




                                    <option value="Prospect" <?php if ($bdstatus == "Prospect") {
        echo "selected = selected";
    } ?>>Prospect</option>
                                    <option value="Proposal" <?php if ($bdstatus == "Proposal") {
        echo "selected = selected";
    } ?>>Proposal</option>
                                    <option value="Lead" <?php if ($bdstatus == "Lead") {
        echo "selected = selected";
    } ?>>Lead</option>
                                    <option value="Negotiation" <?php if ($bdstatus == "Negotiation") {
        echo "selected = selected";
    } ?>>Negotiation</option>
    <?php if (checkForPnl1($leadno, '1') != "0") { ?>
                                        <option value="Contracted" <?php if ($bdstatus == "Contracted") {
            echo "selected = selected";
        } ?>>Contracted</option>			
    <?php } ?>

                                    <option value="Invoiced" <?php if ($bdstatus == "Invoiced") {
        echo "selected = selected";
    } ?>>Invoiced</option>
<?php } ?>

                            </select>


                            <div  <?php if ($bdstatus == "Contracted") {
    echo "style='display:block;'";
} else {
    echo "style='display:none;'";
} ?> id="contractee">
                                <span><input name="contractee1" id="contractee1" type="checkbox" value="Client Signed Master Contract" <?php if ($contractee1 != "") {
    echo "checked = checked";
} ?> /></span>
                                Client Signed Master Contract
                                <br/>
                                <input name="contractee2" id="contractee2" type="checkbox" value="Client Signed Project Contract" <?php if ($contractee2 != "") {
    echo "checked = checked";
} ?>/>
                                Client Signed Project Contract
                                <br/>
                                <input name="contractee3" id="contractee3" type="checkbox" value="Client Approved Costings" <?php if ($contractee3 != "") {
    echo "checked = checked";
} ?>/>
                                Client Approved Costings
                                <br/>
                                <input name="contractee4" id="contractee4" type="checkbox" value="PO(hard copy or scanned copy)" <?php if ($contractee4 != "") {
    echo "checked = checked";
} ?> />
                                PO(hard copy or scanned copy)<br />
                                <br />

                                <div id="queue"></div>
                                <input id="file_upload" name="file_upload" type="file" multiple="true" >
                                <a style="position: relative; top: 5px;" href="javascript:$('#file_upload').uploadifive('upload')" class="bluishBtn button_small">Upload Files</a><br />
                                <br />

                                Note : Please upload contract or any mail copy in either JPEG or PDF format & File Size Limit is 2 max.
                                <script type="text/javascript">
<?php $timestamp = time(); ?>
                                    $(function () {
                                        $('#file_upload').uploadifive({
                                            'auto': false,
                                            'multi': false,
                                            'checkScript': 'fivefy/check-exists.php',
                                            'formData': {
                                                'timestamp': '<?php echo $timestamp; ?>',
                                                'event_id': '<?php echo $leadId; ?>',
                                                'section': 'contracted',
                                                'token': '<?php echo md5('unique_salt' . $timestamp); ?>'
                                            },
                                            'queueID': 'queue',
                                            'fileSizeLimit': 2000,
                                            'uploadScript': 'fivefy/uploadifive.php',
                                            'onUploadComplete': function (file, data) {
                                                console.log(data);

                                                //alert(": "+response);
                                                if (data == "Invalid file type.")
                                                {
                                                    alert("Please select coreect file type *.jpg *.gif *.png *.pdf");
                                                } else
                                                {
                                                    alert("File Uploaded Successfully !");
                                                    $("#upload_con").val(data);
                                                }

                                            }//end of onupload
                                        });
                                    });
                                </script>        
                                <br />
                                <br />

                                <input type="text" hname="upload_con" id="upload_con" class="smallinput" value="<?php echo getTotalcon($leadId); ?>" readonly="readonly"/>
                            </div>

                            <div  <?php if ($bdstatus == "Invoiced") {
    echo "style='display:block'";
} else {
    echo "style='display:none'";
} ?> id="invoiceee">
                                <a href="javascript: openwindow(<?php echo $leadId; ?>)" class="magentaBtn button_small" style="margin:5px;">Add Invoice</a><span>[<?php echo getTotalInvoice($leadId); ?>]</span>
                            </div>


                        </span></div>

                    </p>

                    <p>
                        <label>Select Currency</label>
                        <span class="field"><input type='radio' name='curr' value='INR' class='longinput' checked="checked" >
                            INR &nbsp;&nbsp;&nbsp; <input type='radio' name='curr' value='Dollars' class='longinput'>
                            Dollars &nbsp;&nbsp;&nbsp; </span>
                    </p>
                    <br>
                    <h3>INITIAL ESTIMATE AND PRE_EVENT P&L ENTERED BY YOU</h3>
                    <p>
                        <label>Total Estimate Amount<br/></label>
                        <span class="field"><input type='text' name='' id='' class='smallinput' value="<?php echo $total_esti_amount; ?>" readonly><br/>
                            <!--<small class="desc" style="color:#F00; margin:0px;">Note: Please don't enter Total Billing or Invoiced Amount. Only you have to enter GP Value.</small>-->
                        </span>
                    </p>
                    <p>
                        <label>Agency Project Fee Amount<br/></label>
                        <span class="field"><input type='text' name='' id='' class='smallinput' value="<?php echo $project_fee_amount; ?>" readonly><br/>
                            <!--<small class="desc" style="color:#F00; margin:0px;">Note: Please don't enter Total Billing or Invoiced Amount. Only you have to enter GP Value.</small>-->
                        </span>
                    </p>
<!--                     <p>
                        <label>Agency Project Fee Amount<br/></label>
                        <span class="field"><input type='text' name='' id='' class='smallinput' value="<?php echo $project_fee_amount; ?>" readonly><br/>
                            <small class="desc" style="color:#F00; margin:0px;">Note: Please don't enter Total Billing or Invoiced Amount. Only you have to enter GP Value.</small>
                        </span>
                    </p>-->
                     <p>
                        <label>Sub Total <br/></label>
                        <span class="field"><input type='text' name='' id='' class='smallinput' value="<?php echo $sub_total; ?>" readonly><br/>
                            <!--<small class="desc" style="color:#F00; margin:0px;">Note: Please don't enter Total Billing or Invoiced Amount. Only you have to enter GP Value.</small>-->
                        </span>
                    </p>
                     <p>
                        <label>GST Amount<br/></label>
                        <span class="field"><input type='text' name='' id='' class='smallinput' value="<?php echo $gst_amount; ?>" readonly><br/>
                            <!--<small class="desc" style="color:#F00; margin:0px;">Note: Please don't enter Total Billing or Invoiced Amount. Only you have to enter GP Value.</small>-->
                        </span>
                    </p>
                     <p>
                        <label>Grand Total Amount<br/></label>
                        <span class="field"><input type='text' name='' id='' class='smallinput' value="<?php echo $grand_amount_total; ?>" readonly><br/>
                            <!--<small class="desc" style="color:#F00; margin:0px;">Note: Please don't enter Total Billing or Invoiced Amount. Only you have to enter GP Value.</small>-->
                        </span>
                    </p>
                    <p>
                        <label>Expenses<br/></label>
                        <span class="field"><input type='text' name='' id='' class='smallinput' value="<?php echo $expenses; ?>" readonly><br/>
                            <!--<small class="desc" style="color:#F00; margin:0px;">Note: Please don't enter Total Billing or Invoiced Amount. Only you have to enter GP Value.</small>-->
                        </span>
                    </p>
                    <p>
                        <label>Projected P& L Amount<br/></label>
                        <span class="field"><input type='text' name='' id='' class='smallinput' value="<?php echo $project_pl_amount; ?>" readonly><br/>
                            <!--<small class="desc" style="color:#F00; margin:0px;">Note: Please don't enter Total Billing or Invoiced Amount. Only you have to enter GP Value.</small>-->
                        </span>
                    </p>
                    <p>
                        <label> P& L (%)<br/></label>
                        <span class="field"><input type='text' name='' id='' class='smallinput' value="<?php echo $pl_percentage; ?>" readonly><br/>
                            <!--<small class="desc" style="color:#F00; margin:0px;">Note: Please don't enter Total Billing or Invoiced Amount. Only you have to enter GP Value.</small>-->
                        </span>
                    </p>
                    <br>
                    <h3>FINAL P&L DETAILS</h3>
					<p id="client_po">
                                <label>Client PO Number</label>
                                <span class="field"><input type='text' name='client_po_number' value="<?= $client_po_number;?>" id='client_po_number' class='smallinput'> 
                                    (alpha Numeric)</span>
                            </p>
                            <p id="value_po">
                                <label>PO Value</label>
                                <span class="field"><input type='text' name='po_value' id='po_value' value="<?= $po_value;?>"class='smallinput'> 
                                </span>
							<label>PO Type</label>
                                <span class="field"><select name="po_type" id="po_type">
                                        <option value="" selected="selected">Choose PO Type</option>
                                        <option value="PO Inclusive GST" <?php if($po_type == "PO Inclusive GST"){echo "selected";} ?>>PO Inclusive GST</option>
                                        <option value="PO Excluding GST" <?php if($po_type == "PO Excluding GST"){echo "selected";} ?>>PO Excluding GST</option>

                                    </select></span>
                            </p>
                    <p>
                        <label>Project Revenue GP<br/>(Final P & L Excl. tax)</label>
                        <span class="field"><input type='text' name='revnue' id='revnue' class='smallinput' value="<?php echo $revnue; ?>">&nbsp;(Numeric only)<br/>
                            <small class="desc" style="color:#F00; margin:0px;">Note: Please don't enter Total Billing or Invoiced Amount. Only you have to enter GP Value.</small>
                        </span>
                    </p>
                    <p>
                        <label>Profit Margin GP% <br/>(Final Profitability % Excl. tax)</label>
                        <span class="field"><input type='text' name='profit' id='profit' class='smallinput' value="<?php echo $profit; ?>" readonly> %(only Numeric)
                            <small class="desc" id="message" style="color:#F00; margin:0px; display: none">Your estimated P&L percentage is less than the recommended figure of 30%. Please try your best to keep it over 30% in future</small>
                        </span>
                    </p>
                    <p> 
                        <label>% change in profitability from the initial Estimated P&L</label>
                        <span class="field"><input type='text' name='profitability' id='profitability' class='smallinput' value="<?= $profitability;?>" readonly>&nbsp;<br/>
                        </span>
                    </p>
                    <p>
                        <label>Project Closure Date:*</label>
                        <span class="field"><input type="text" name="expectedClosure" id="datepicker3" class="smallinput" value="<?php echo $exppaydate; ?>" /></span>
                    </p>

                    <p>
                        <label>Please give the Reason to Update this Lead</label>
                        <span class="field"><input type="text" name="reason" id="reason" class="longinput" value="<?= $reason?>" /></span>
                    </p>



                    <p class="stdformbutton">
                        <button class="submit radius2">Update</button>
                    <!--<input type="reset" class="reset radius2" value="Reset Button" />-->
                    </p>


                    <input type="hidden" name="leadId" id="leadId" class="smallinput" value="<?php echo $id; ?>"/>
                    <input type="hidden" name="leadno" id="leadno" class="smallinput" value="<?php echo $leadno; ?>"/>
                    <input type="hidden" name="contact" id="contact" class="smallinput" value="<?php echo $contact; ?>"/>
                    <input type="hidden" name="companyname" id="companyname" class="smallinput" value="<?php echo $companyname; ?>"/>
                    <input type="hidden" name="dept" id="dept" class="smallinput" value="<?php echo $dept; ?>"/>
                    <input type="hidden" name="upload_po" id="upload_po" class="smallinput" value="0"/>
                   <!-- <input type="idden" hname="upload_con" id="upload_con" class="smallinput" value=""/>-->


                </form>

                <br clear="all" />

            </div>

        </div>
    </div>
</div>

<!--content-->
<script>
function checkStatus(val){
	if(val == "Invoiced"){
		$("#client_po").show();
		$("#value_po").show();
	}else{
		$("#client_po").hide();
		$("#value_po").hide();
	}
	
}
    $('#revnue').keyup(function () {
        total_esti_amount = <?= $total_esti_amount?>;
        sub_total = <?= $sub_total;?>;
        revnue = parseFloat($("#revnue").val());

        if (isNaN(revnue) == false && isNaN(sub_total) == false)
        {
            profit = (revnue / sub_total) * 100;
            $('#profit').val(parseFloat(profit).toFixed(2));
           
        if (profit < 30) {
            $('#message').show();
        } else {
            $('#message').hide();
        }

        project_pl_amount = parseFloat(<?php echo $pl_percentage; ?>);

        // alert(project_pl_amount);
        if (isNaN(profit) == false && isNaN(project_pl_amount) == false)
        {
            total = (profit-project_pl_amount);

            $('#profitability').val(parseFloat(total).toFixed(2));
        } else {
            $('#profitability').val(0);
            ;
        }

        } else {
            $('#profit').val(0);

        }
        
    });


    $('#profit').keyup(function () {
        profit = parseFloat($(this).val());
        project_pl_amount = parseFloat(<?php echo $pl_percentage; ?>);

        // alert(project_pl_amount);
        if (isNaN(profit) == false && isNaN(project_pl_amount) == false)
        {
            total = (project_pl_amount - profit);

            $('#profitability').val(parseFloat(total).toFixed(2));
        } else {
            $('#profitability').val(0);
            ;
        }

    });


</script>
<br class="clear" />   