<?php include_once('commonFunction.php'); 
include('NewClass.php');
$newclass = new NewClass();  

?>

<!-- Jquery Calender Script -->


<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

<script>
    $(function () {
        $("#datepicker").datepicker();
        $("#datepicker1").datepicker();
        $("#datepicker2").datepicker();
    });
</script>

<!-- Calender Script Ended -->

<script type="text/javascript">
    var max_text = 2000

    mess_remaining = max_text;
    var timerID = 0;
    save_string = new MakeArray(7);
    done = new MakeArray(6);
    var var1 = "";
    var var2 = "";
    var is_message = 0;
    save_message = "";
    var string_num = 1;
    var curr_pos = 0;
    var pos_limit = 3;
    var goodbrowser_rollover = 0;
    var goodbrowser_counter = 0;
    var is_mac = 0;
    var is_unix = 0;
    var jump_ok = 0;

    var default_short_speed = 100;
    var default_long_speed = 1000;
    var mac_short_speed = 80;
    var mac_long_speed = 700;
    var pc_ns3_short_speed_counter = 10;
    var pc_ns3_long_speed_counter = 200;
    var pc_ns4_short_speed_counter = 120;
    var pc_ns4_long_speed_counter = 1000;

    var counter_speed_short = 0;
    var counter_speed_long = 0;

//-------------------------------------------------------------
//			Testing browser for various capabilities
//-------------------------------------------------------------
    browserName = navigator.appName.substring(0, 8);
    browserVer = parseFloat(navigator.appVersion);

    if (navigator.appVersion.charAt(navigator.appVersion.indexOf("(") + 1) == "M") {
        is_mac = 1;
    } else if (navigator.appVersion.charAt(navigator.appVersion.indexOf("(") + 1) == "X") {
        is_unix = 1;
    } else if (navigator.appVersion.charAt(navigator.appVersion.indexOf("(") + 1) == "L") {
        is_unix = 1;
    } else if (navigator.appVersion.charAt(navigator.appVersion.indexOf("(") + 1) == "O") {
        is_unix = 1;
    }
    if (navigator.appVersion.charAt(navigator.appVersion.indexOf("(") + 1) == "M") {
        is_mac = 1;
    }
    if ((browserName == "Netscape" && browserVer >= 3) || (browserName == "Microsof" && browserVer >=
            3.01 && is_mac)) {
        goodbrowser_rollover = 1;
    }
    if ((browserName == "Netscape" && browserVer >= 3) || ((browserName == "Microsof" && browserVer ==
            3.01) && is_mac) || (browserName == "Microsof" && browserVer >= 4.0 && !is_mac)) {
        if (!is_unix) {
            goodbrowser_counter = 1;
        }
    }

    counter_speed_short = default_short_speed;
    counter_speed_long = default_long_speed;
    if (is_mac) {
        counter_speed_short = mac_short_speed;
        counter_speed_long = mac_long_speed;
    }
    if ((!is_mac) && (browserName == "Netscape" && browserVer >= 3 && browserVer < 4)) {
        counter_speed_short = pc_ns3_short_speed_counter;
        counter_speed_long = pc_ns3_long_speed_counter;
    }
    if ((!is_mac) && (browserName == "Netscape" && browserVer >= 4)) {
        counter_speed_short = pc_ns4_short_speed_counter;
        counter_speed_long = pc_ns4_long_speed_counter;
        jump_ok = 1;
    }
    //-------------------------------------------------------------
//			Make text variable array
//-------------------------------------------------------------
    function MakeArray(n) {
        this.length = n;
        for (var i = 1; i <= n; i++) {
            this[i] = "_";
        }
        return this
    }

//-------------------------------------------------------------
//			The actual subroutine that starts 
//			the counter.	
//-------------------------------------------------------------
    function timer_start() {
        running = true
        now = new Date()
        now = now.getTime()
        if (is_message) {
            endTime = now + (counter_speed_short * 0.1 * 1)
        } else {
            endTime = now + (autotab_speed_short * 0.1 * 1)
        }
        show_timer()
    }

//-------------------------------------------------------------
//			The actual subroutine that stops
//			the counter.	
//-------------------------------------------------------------
    function timer_stop() {
        clearTimeout(timerID)
        running = false
    }

//-------------------------------------------------------------
//			This subroutine shifts the focus about
//			while the timer is active in order to keep
//			the data length information current.	Also
//			displays the total remaining characters 
//			when the message box is the center of focus. 
//-------------------------------------------------------------
//-------------------------------------------------------------
//-------------------------------------------------------------
//-------------------------------------------------------------
    function show_timer() {
        var now = new Date()
        now = now.getTime()
        if (endTime - now <= 0) {
            if ((is_message) && (browserName != "Microsof")) {
                document.form1.counter.focus()
                document.form1.test.focus();
            }
            if (!(is_message)) {
                if (pos1 == 0) {
                    if (browserName == "Microsof") {
                        document.form1.counter.focus();
                    } else {
                        document.form1.elements[pos1 + 1].focus();
                    }
                } else {
                    document.form1.elements[pos1 - 1].focus();
                }
                document.form1.elements[pos1].focus();
            }
            if (is_message) {
                count_text(document.form1.test.value)
            }
            if (!(is_message)) {
                count_it(document.form1.elements[pos1].value, pos1)
            }
        } else {
            var delta = new Date(endTime - now)
            var theMin = delta.getMinutes()
            var theSec = delta.getSeconds()
            var theTime = theMin
            theTime += ((theSec < 10) ? ":0" : ":") + theSec
            if (running) {
                if (is_message) {
                    timerID = setTimeout("show_timer()", counter_speed_long)
                } else {
                    timerID = setTimeout("show_timer()", autotab_speed_long)
                }
            }
        }
    }

//-------------------------------------------------------------
//			Starts character counter when focus is 
//			brought to the message box.	 Functions
//			slightly differently from the autotab
//			counter.
//-------------------------------------------------------------
    function count_text(data) {
        if (goodbrowser_counter) {
            is_message = 1;
            curr_pos = 6;
            if (document.form1.test.length == 0) {
                data = "";
            }
            data_length = data.length
            xcount = 0;
            ycount = 0;
            while (xcount < data_length) {
                if (data.charAt(xcount) != "\r") {
                    ycount++;
                }
                xcount++;
            }
            data_length = ycount;
            document.form1.counter.value = data_length;
            mess_remaining = document.form1.counter.value;
            if (data_length > max_text) {
                if (document.form1.test.value != save_message) {
                    document.form1.test.value = data.substring(0, max_text);
                    document.form1.counter.value = max_text;
                    document.form1.test.blur();
                    save_message = document.form1.test.value;
                    timer_stop();
                    alert("Your message cannot be more than 1500 characters, the additional characters were deleted at the end of the message.");
                }
            }
            timer_start();
        }
    }

//-------------------------------------------------------------
//			Stops character counter when focus leaves
//			the message box or the message changes. 
//			Functions slightly differently from the 
//			autotab counter.
//-------------------------------------------------------------
    function count_text2(form) {
        if (goodbrowser_counter) {
            is_message = 1;
            curr_pos = 6;
            data = form.test.value;
            if (document.form1.test.length == 0) {
                data = "";
            }
            data_length = data.length
            xcount = 0;
            ycount = 0;
            while (xcount < data_length) {
                if (data.charAt(xcount) != "\r") {
                    ycount++;
                }
                xcount++;
            }
            data_length = ycount;
            document.form1.counter.value = data_length;
            mess_remaining = document.form1.counter.value;
            if (data_length > max_text) {
                if (document.form1.test.value != save_message) {
                    document.form1.test.value = data.substring(0, max_text);
                    document.form1.counter.value = max_text;
                    document.form1.test.blur();
                    save_message = document.form1.test.value;
                    timer_stop();
                    alert("Your message cannot be more than " + max_text + " characters, the additional characters were deleted at the end of the message.");
                }
            }
            timer_stop();
        }
    }
//-------------------------------------------------------------
//-------------------------------------------------------------
//-------------------------------------------------------------
</script>
<script type="text/javascript">
    function check()
    {
        //form1.date1.value = form1.dateevent.value;

        //form1.date22.value = form1.datefrom.value;
        //form1.date23.value = form1.dateto.value;

        if (document.form1.dept.value == " ")
        {
            alert("Please select a department.");
            document.form1.dept.focus();
            return false;
        }


        if (document.form1.leadno.value == "")
        {
            alert("Please give a lead number of the event.");
            document.form1.leadno.focus();
            return false;
        }
        if (document.form1.leadno.value != "")
        {
            if (document.form1.leadno.value.indexOf("'") != -1) {
                alert("Please Don't use Apostrophes( ' ) in Lead No. ");
                document.form1.leadno.focus();
                return false;
            }
        }
        if (document.form1.leadno.value != "")
        {
            if (document.form1.leadno.value.indexOf("&") != -1) {
                alert("Please Don't use & sign in Lead No. ");
                document.form1.leadno.focus();
                return false;
            }
        }
        if (document.form1.leadno.value != "")
        {
            if (document.form1.leadno.value.indexOf(" ") != -1) {
                alert("Please Don't use Space in Lead No. ");
                document.form1.leadno.focus();
                return false;
            }
        }


        if (document.form1.eventname.value == "")
        {
            alert("Please give an Campaign name.");
            document.form1.eventname.focus();
            return false;
        }

        if (document.form1.eventname.value != "")
        {
            if (document.form1.eventname.value.indexOf("'") != -1) {
                alert("Please Don't use Apostrophes( ' ) in Campaign name. ");
                document.form1.eventname.focus();
                return false;
            }
        }


        if (document.form1.clientname.value == "")
        {
            alert("Please give an Client name.");
            document.form1.clientname.focus();
            return false;
        }
        if (document.form1.clientname.value != "")
        {
            if (document.form1.clientname.value.indexOf("'") != -1) {
                alert("Please Don't use Apostrophes( ' ) in Client name. ");
                document.form1.clientname.focus();
                return false;
            }
        }

        if (form1.stage[0].checked || form1.stage[1].checked || form1.stage[2].checked)
        {
        } else
        {
            alert("Please select the Stage of Action chart");
            return false;
        }

        if (form1.key[0].checked || form1.key[1].checked)
        {
        } else
        {
            alert("Please select the Key Account exist or not");
            return false;
        }
        if (document.form1.venue.value == "")
        {
            alert("Please give a Venue name.");
            document.form1.venue.focus();
            return false;
        }
        if (document.form1.city.value == "")
        {
            alert("Please give a City name.");
            document.form1.city.focus();
            return false;
        }

        if (form1.eventtype[0].checked || form1.eventtype[1].checked)
        {
        } else
        {
            alert("Please select the type of Event Single or MultiDays");
            return false;
        }



        if (document.form1.type1.value == "Single")
        {
            var text = form1.dateevent.value;
            if (text == null || text == "")
            {
                alert("Please select a Event starting date.");
                return false;
            }


        } else if (document.form1.type1.value == "Multi")
        {

            var text2 = form1.datefrom.value;
            if (text2 == null || text2 == "")
            {
                alert("Please select a Event starting date in multiple days event.");
                return false;
            }

            var text3 = form1.dateto.value;
            if (text3 == null || text3 == "")
            {
                alert("Please select a Event last date in multiple days event.");
                return false;
            }
        }
        if (document.form1.name.value == "")
        {
            alert("Please give Executive's name.");
            document.form1.name.focus();
            return false;
        }
        if (document.form1.bdname.value == "")
        {
            alert("Please give BD contact name.");
            document.form1.bdname.focus();
            return false;
        }
        if (form1.status[0].checked || form1.status[1].checked || form1.status[2].checked)
        {
        } else
        {
            alert("Please select the status of the Event.\n Green / Yellow / Red");
            return false;
        }

        if (document.form1.eventbr.value == "")
        {
            alert("Please enter Event Brief.");
            document.form1.eventbr.focus();
            return false;
        }
        if (document.form1.eventbr.value != "")
        {
            if (document.form1.eventbr.value.indexOf("'") != -1) {
                alert("Please Don't use Apostrophes( ' ) in Event Brief ");
                document.form1.eventbr.focus();
                return false;
            }
        }

        if (document.form1.progress.value == "")
        {
            alert("Please give Event Progress.");

            document.form1.progress.focus();
            return false;
        }

        if (document.form1.progress.value != "")
        {
            if (document.form1.progress.value.indexOf("'") != -1) {
                alert("Please Don't use Apostrophes( ' ) in Progress so far ");
                document.form1.progress.focus();
                return false;
            }
        }

        if (document.form1.issues.value == "")
        {
            alert("Please enter Critical Issues.");
            document.form1.issues.focus();
            return false;
        }

        if (document.form1.issues.value != "")
        {
            if (document.form1.issues.value.indexOf("'") != -1) {
                alert("Please Don't use Apostrophes( ' ) in Critical issues as on date ");
                document.form1.issues.focus();
                return false;
            }
        }

        if (document.form1.task.value == "")
        {
            alert("Please enter Task for the Next Day.");
            document.form1.task.focus();
            return false;
        }
        if (document.form1.task.value != "")
        {
            if (document.form1.task.value.indexOf("'") != -1) {
                alert("Please Don't use Apostrophes( ' ) in Task for Next Day ");
                document.form1.task.focus();
                return false;
            }
        }



        return true;
    }
</script>
<?php
$actionChartId = $_REQUEST['actionChartId'];

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

if (isset($_POST['dept']) && $_POST['dept'] != '') {

    $userId = $_COOKIE["user_id"];
    $userName = $_COOKIE["name"];

    $department = addslashes(trim($_POST['dept']));
    $leadnumber = addslashes(trim($_POST['leadno']));
    $completeLeadNumber = "WMM/" . $department . "/" . $leadnumber;


    $eventname = addslashes(trim($_POST['eventname']));

    $clientname = addslashes(trim($_POST['clientname']));

    $stage = addslashes(trim($_POST['stage']));

    $key = addslashes(trim($_POST['key']));
    $keyact = addslashes(trim($_POST['keyact']));

    $venue = addslashes(trim($_POST['venue']));

    $city = addslashes(trim($_POST['city']));

    $eventtype = addslashes(trim($_POST['eventtype']));

    $dateevent = addslashes(trim($_POST['dateevent']));
    $convertedDateEvent = convertDateinProperFormat($dateevent);


    $datefrom = addslashes(trim($_POST['datefrom']));
    $convertedDateFrom = convertDateinProperFormat($datefrom);


    $dateto = addslashes(trim($_POST['dateto']));
    $convertedDateTo = convertDateinProperFormat($dateto);

    $name = addslashes(trim($_POST['name']));

    $bdname = addslashes(trim($_POST['bdname']));

    $status = addslashes(trim($_POST['status']));

    $email = addslashes(trim($_POST['email']));

    $eventbr = addslashes(trim($_POST['eventbr']));

    $progress = addslashes(trim($_POST['progress']));

    $issues = addslashes(trim($_POST['issues']));

    $task = addslashes(trim($_POST['task']));

    $dateaddd = addslashes(trim($_POST['dateaddd']));

	if($status=="red"){
		$getleadDetailsbased_lead_0 = getleadDetailsbased($leadnumber,$department);
		$getleadDetailsbased_lead = $getleadDetailsbased_lead_0[0];
		
		$to = "rajesh.o@watermarkexperience.com,imanish.yadav@gmail.com";
		//$to = "bhalani.akashb@gmail.com ,akash.bhalani88@gmail.com";
		$message.= "<html>";
		$message.= "<head>";
		$message.= "<title>Aqua Action chart Creation : Thank you</title>";
		$message.= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>";
		$message.= "</head>";
		$message.= "<body>";
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='border:1px solid lightgray;width:100%;'>";
		$message.= "";
		
		$message.= "<tr style='background:#00ABEB;'>";
		 $message.= "<td colspan='2'><img src='http://watermarkmktg.com/aqua/images/WM1.png' alt='Aqua Logo' style='padding:10px;color:white;border:none;'/></td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='padding:10px;width:100%;'>";
		$message.= "<tr>";
		$message.= "<td style='margin:10px;'><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'></td>";
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		$message.= "<br />";
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>Attention Required</td>";
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		$message.= "<br />";
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>The status of Action chart of lead No <b>$leadnumber</b> with campaign name <b>$getleadDetailsbased_lead</b> has turned to Red. Please Update.</td>";
		$message.= "<td>&nbsp;</td>";
		$message.= "</tr>";
		$message.= "</table>";
		$message.= "</body>";
		$message.= "</html>";
		$subject = "Action chart status changed to Red" ; 
		$newclass->SentMail($to,$subject,$message);
		$emailData = getUserDetailsBasedOnUserId($email);		
		$newclass->SentMail($emailData,$subject,$message);
	}

    $sql1 = "UPDATE oxy2_action SET userId = '$userId',department='$department',leadNum='$leadnumber',completeLeadNumber='$completeLeadNumber',campaignName='$eventname',clientName='$clientname',stage='$stage',keyAccount='$key',keyact='$keyact',venue='$venue',city='$city',type='$eventtype',eventDate='$convertedDateEvent',fromDate='$convertedDateFrom',endDate='$convertedDateTo',projectLeader='$name',bdName='$bdname',status='$status',email='$email',campaignBrief='$eventbr',progress='$progress',criticalIssue='$issues',taskDay='$task',updatedBy='$userName',updatedOn=date_add(now(), interval 630 minute),dateAdded='$dateaddd' WHERE id='$actionChartId'";
    $result = mysqli_query($con, $sql1);

    $sqlForLog = "INSERT INTO oxy2_actionlog 
(`userId`,`actionId`,`department`,`leadNum`,`completeLeadNumber`,`campaignName`,`clientName`, `stage`, `keyAccount`,`keyact`, `venue`,`city`, `type`, `eventDate`, `fromDate`, `endDate`,`projectLeader`,`bdName`,`status`,`email`,`campaignBrief` ,`progress` ,`criticalIssue`,`taskDay`,`updatedBy`,`updatedOn`,`dateAdded`)
VALUES('$userId','$actionChartId','$department','$leadnumber','$completeLeadNumber','$eventname','$clientname','$stage','$key','$keyact','$venue','$city','$eventtype','$convertedDateEvent','$convertedDateFrom','$convertedDateTo','$name','$bdname','$status','$email','$eventbr','$progress','$issues','$task','$userName',date_add(now(), interval 630 minute),date_add(now(), interval 630 minute))";
    $resultForLog = mysqli_query($con, $sqlForLog);

    header("location:.?id=3&subId=7");
}
?>


<?php
$SelQuery = "SELECT * FROM oxy2_action WHERE id = '$actionChartId'";
$SelExec = mysqli_query($con, $SelQuery);
$cntt = mysqli_num_rows($SelExec);
if ($cntt > 0) {
    $i = 0;
    while ($SelResult = mysqli_fetch_array($SelExec)) {
        $department = $SelResult['department'];
        $leadNum = $SelResult['leadNum'];
        $completeLeadNumber = $SelResult['completeLeadNumber'];
        $campaignName = $SelResult['campaignName'];
        $clientName = $SelResult['clientName'];
        $stage = $SelResult['stage'];
        $keyAccount = $SelResult['keyAccount'];
        $keyact = $SelResult['keyact'];
        $venue = $SelResult['venue'];
        $city = $SelResult['city'];
        $type = $SelResult['type'];

        $eventDate_o = $SelResult['eventDate'];
        $eventDate = convertDateinOriginalFormat($eventDate_o);

        $fromDate_o = $SelResult['fromDate'];
        $fromDate = convertDateinOriginalFormat($fromDate_o);

        $endDate_o = $SelResult['endDate'];
        $endDate = convertDateinOriginalFormat($endDate_o);

        $projectLeader = $SelResult['projectLeader'];

        $bdId = $SelResult['bdName'];

        $status = $SelResult['status'];
        $email = $SelResult['email'];

        $campaignBrief = $SelResult['campaignBrief'];
        $progress = $SelResult['progress'];
        $criticalIssue = $SelResult['criticalIssue'];
        $taskDay = $SelResult['taskDay'];
        $dateAdded = $SelResult['dateAdded'];
    }
}
?>  


<!--One_Wrap-->
<div class="one_wrap fl_left">
    <div class="widget">
        <div class="widget_title"><span class="iconsweet">r</span><h5>Edit Action Chart</h5></div>
        <div class="widget_body">
            <!--Form fields-->
            <form action="#" method="post" name="form1" id="form1" onSubmit="return check()">

                <input name="dateaddd" type="hidden" value="<?php echo $dateAdded; ?>" >

                <input name="dept" type="hidden" value="<?php echo $department; ?>" >

                <input name="leadno" type="hidden" value="<?php echo $leadNum; ?>" >

                <ul class="form_fields_container">

                    <li><label>Aqua Lead number : *</label> <div class="form_input"><input type="text" readonly="readonly"  value="<?php echo $completeLeadNumber; ?>" ></div></li>


                    <li><label>Campaign Name :*</label> <div class="form_input"><input readonly="readonly" name="eventname" id="eventname"  type="text" class="tip_east" title="Campaign Name" value="<?php echo $campaignName; ?>" ></div></li>

                    <li><label>Client Name :*</label> <div class="form_input"><input readonly="readonly" name="clientname" id="clientname" type="text" class="tip_east" title="Client Name" value="<?php echo $clientName; ?>"></div></li>
                    <script type="text/javascript">
                        function selectkey1()
                        {
                            document.form1.keyact.disabled = false;
                            alert("Please Enter the Key Account.");
                            document.form1.keyact.focus();
                            return true;
                        }
                        function selectkey2()
                        {
                            document.form1.keyact.disabled = true;
                            form1.keyact.value = "";
                            return true;
                        }
                    </script>                   

                    <li>
                        <label>Select Stage :*</label> 
                        <div class="form_input"><input name="stage" id="stage" type="radio" value="Lead" <?php if ($stage == "Lead") {
    echo "checked=checked";
} ?>>
                            <label for="radio1">Lead</label> </div>
                        <div class="form_input"><input id="stage" name="stage" type="radio" value="Execution" <?php if ($stage == "Execution") {
    echo "checked=checked";
} ?>>
                            <label for="radio1">Execution</label></div>
                        <div class="form_input"><input id="stage" name="stage" type="radio" value="Invoice" <?php if ($stage == "Invoice") {
    echo "checked=checked";
} ?>>
                            <label for="radio1">Invoice</label></div>
                    </li>

                    <li>
                        <label>Key Account :</label> 
                        <div class="form_input"><input name="key" type="radio" id="key3" value="Yes" onClick="selectkey1()" <?php if ($keyAccount == "Yes") {
    echo "checked=checked";
} ?>>
                            <label for="radio1">Yes</label> </div>
                        <div class="form_input"><input name="key" type="radio" id="key" value="No" onClick="selectkey2()" <?php if ($keyAccount == "No") {
    echo "checked=checked";
} ?>>
                            <label for="radio1">No</label></div>
                        <div class="form_input">

                            <select name="keyact" id="keyact">
                                <option>Select Key Account</option>
<?php
$que = "SELECT * FROM oxy2_clientn";
$res = mysqli_query($con, $que);
while ($row = mysqli_fetch_array($res)) {
    $companyname = $row['companyname'];
    $id = $row[id];

    if ($keyact == $id) {
        $che = "Selected = Selected";
    } else {
        $che = "";
    }

    echo "<option value='$id' $che>$companyname</option>";
}
?>
                            </select> 


                        </div>
                    </li>

                    <li><label>Location :*</label>  
                        <div class="form_input">
                            <table width="100%" border="0" cellspacing="1" cellpadding="1"  style="margin-left:-10px;">
                                <tr>
                                    <td width="3%"><label for="radio1">Venue</label> </td>
                                    <td width="97%"><input type="text" name="venue" id="venue" class="tip_east" title="Venue" value="<?php echo $venue; ?>">
                                    </td>
                                </tr>
                            </table>     




                            <table width="100%" border="0" cellspacing="1" cellpadding="1" style="margin-left:-10px;">
                                <tr>
                                    <td width="4%" valign="middle"><div style="position:relative;top:14px;"><label for="radio1">City &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label></div> </td>
                                    <td width="96%" valign="top">
                                        <select name="city" id="city">
                                            <option value="">Select City</option>
<?php
$que = "SELECT * FROM oxy2_city";
$res = mysqli_query($con, $que);
while ($row = mysqli_fetch_array($res)) {
    $city_name = $row['city_name'];

    if ($city == $city_name) {
        $che_city = "Selected = Selected";
    } else {
        $che_city = "";
    }

    echo "<option value='$city_name' $che_city>$city_name</option>";
}
?>
                                        </select> 
                                    </td>
                                </tr>
                            </table>         
                        </div>




                    </li>
                    <script type="text/javascript">
                        function select4()
                        {
//document.form1.keyact.disabled=false;
                            alert("Please Enter Dates in single days");
                            document.form1.type1.value = "Single";
                            return true;
                        }
                        function select5()
                        {
                            alert("Please Enter Dates in Multi days");
                            document.form1.type1.value = "Multi";
                            return true;
                        }
                    </script>

                    <li>
                        <label>Type :*</label> 
                        <div class="form_input"><input id="radio1" name="eventtype" type="radio" value="Single" onClick="select4()" <?php if ($type == "Single") {
                                                echo "checked = checked";
                                            } ?> >
                            <label for="radio1">Single Day</label> </div>
                        <div class="form_input"><input id="radio1" type="radio" name="eventtype" value="Multi" onClick="select5()" <?php if ($type == "Multi") {
                                                echo "checked = checked";
                                            } ?>>
                            <label for="radio1">Multi-Day</label></div>
                    </li>

                    <li><label>Event Date :<br/></label> <div class="form_input"><input type="text" name="dateevent" id="datepicker" class="tip_east" title="Date" value="<?php echo $eventDate; ?>"><span style="font-size:9px;">(Click 
                                to select Start date of Event)</span></div></li>

                    <li><span style="font-size:14px; font-weight:bold;padding: 15px 27px;">For long drawn Multiple 
                            Day Activity </span></li>

                    <li><label>From :<br/><span style="font-size:9px;">(Start date of Event)</span></label> <div class="form_input"><input type="text" name="datefrom"  id="datepicker1" class="tip_east" title="From Date" value="<?php echo $fromDate; ?>"></div></li>
                    <li><label>To :<br/><span style="font-size:9px;">(End date of Event)</span></label> <div class="form_input"><input type="text" name="dateto"  id="datepicker2" class="tip_east" title="To Date" value="<?php echo $endDate; ?>"></div></li>

                    <li><label>Project Leader :</label> <div class="form_input">

                            <select name="name" id="name">
                                <option>Select Project Leader</option>
<?php
$que = "SELECT * FROM oxy2_users";
$res = mysqli_query($con, $que);
while ($row = mysqli_fetch_array($res)) {
    $fname = $row['fname'];
    $lname = $row['lname'];
    $cNAme = $fname . " " . $lname;
    $user_id = $row['user_id'];

    if ($projectLeader == $user_id) {
        $che_pro = "Selected = Selected";
    } else {
        $che_pro = "";
    }

    echo "<option value='$user_id' $che_pro>$cNAme</option>";
}
?>
                            </select>


                        </div></li>

                    <script type="text/javascript">
                        function selectid(dd)
                        {
                            var ind = dd.selectedIndex;
                            if (ind == 0) {
                                return;
                            }
                            var url = "";
                            url = dd.options[ind].value
                            document.form1.bdname.value = url;
                            return true;
                        }
                        function selectidno(dd)
                        {
                            var ind = dd.selectedIndex;
                            if (ind == 0) {
                                return;
                            }
                            var url = "";
                            url = dd.options[ind].value
                            document.form1.bdno.value = url;
                            return true;
                        }
                    </script>    


                    <SCRIPT LANGUAGE="JavaScript">

                        function textCounter(field, cntfield, maxlimit) {
                            if (field.value.length > maxlimit) // if too long...trim it!
                                field.value = field.value.substring(0, maxlimit);

                            else
                                cntfield.value = maxlimit - field.value.length;
                        }

                    </script>             

                    <li><label>BD Contact :*</label> 
                        <div class="form_input"><select name="bdname" class="select" id="select4" onChange="selectid(this)">
                                <option>Select BD Name</option>
                                <?php
                                $que = "SELECT * FROM oxy2_users";
                                $res = mysqli_query($con, $que);
                                while ($row = mysql_fetch_array($res)) {
                                    $fname = $row['fname'];
                                    $lname = $row['lname'];
                                    $cNAme = $fname . " " . $lname;
                                    $user_id = $row['user_id'];


                                    if ($bdId == $user_id) {
                                        $che_bd = "Selected = selected";
                                    } else {
                                        $che_bd = "";
                                    }


                                    echo "<option value='$user_id' $che_bd>$cNAme</option>";
                                }
                                ?>
                            </select>


                        </div>
                    </li> 


                    <li>
                        <label>Status :*</label> 
                        <div class="form_input"><input id="radio1" name="status" value="green" type="radio" <?php if ($status == "green") {
                                    echo "checked = checked";
                                } ?>>
                            <label for="radio1"><span class="color" style="background:#060;">Green</span></label> </div>
                        <div class="form_input"><input id="radio1" name="status" value="yellow" type="radio" <?php if ($status == "yellow") {
                                    echo "checked = checked";
                                } ?>>
                            <label for="radio1"><span class="color" style="background:#FF0; color:#000">Yellow</span></label></div>
                        <div class="form_input"><input id="radio1" type="radio" name="status" value="red" <?php if ($status == "red") {
                                    echo "checked = checked";
                                } ?>>
                            <label for="radio1"><span class="color" style="background:#F00;">Red</span></label></div>
                    </li>



                    <li><span style="font-size:14px; font-weight:bold;padding: 15px 27px;">Reference Internal Email id's ( select id's where event updates need to be sent )</span></li>

                    <input name="email" id="email"  type="hidden" style="width:70%" class="tip_east" title="Enter the comma separated email." value="<?php echo $email; ?>">
                    <!-- <li><label>Email :</label> <div class="form_input"><input name="email" id="email"  type="text" style="width:70%" class="tip_east" title="Enter the comma separated email." value="<?php echo $email; ?>"></div></li>-->



                    <li><label>Campaign Brief :*</label> <div class="form_input"><textarea class="auto" id="txtInput" name="eventbr" cols="50" rows="3" onKeyDown="textCounter(document.form1.eventbr, document.form1.remLen3, 1999)"
                                                                                           onKeyUp="textCounter(document.form1.eventbr, document.form1.remLen3, 1999)" ><?php echo $campaignBrief; ?></textarea>

                            <input style="width:4%"  name="remLen3" type="text" value="2000" size="3" readonly="readonly" />
                            <span style="font-size:9px;">character's left &nbsp;
                                <strong>(2000max)</strong></span>

                        </div></li>

                    <li><label>Progress so far :*<br/><em><font color="#FF0000" size="1">( Mention date for each 
                                updation )</font></em> </label> <div class="form_input">

                            <textarea class="auto" id="autogrow1" name="progress" cols="50" rows="3" onKeyDown="textCounter(document.form1.progress, document.form1.remLen4, 1999)"
                                      onKeyUp="textCounter(document.form1.progress, document.form1.remLen4, 1999)" ><?php echo $progress; ?></textarea>

<!-- <textarea class="auto" id="autogrow1" name="progress" cols="" rows="3" onKeyDown="textCounter(document.form1.progress,document.form1.remLen4,1999)"
onKeyUp="textCounter(document.form1.progress,document.form1.remLen4,1999)" ><?php echo $progress; ?></textarea>-->

                            <input style="width:4%"  name="remLen4" type="text" value="2000" size="3" readonly="readonly" />
                            <span style="font-size:9px;">character's left &nbsp;
                                <strong>(2000max)</strong></span>

                        </div></li>

                    <li><label>Critical issues as on date :*</label> <div class="form_input"><textarea class="auto" id="autogrow2" name="issues" cols="50" rows="3" onKeyDown="textCounter(document.form1.issues, document.form1.remLen5, 1999)"
                                                                                                       onKeyUp="textCounter(document.form1.issues, document.form1.remLen5, 1999)" ><?php echo $criticalIssue; ?></textarea>

                            <input style="width:4%"  name="remLen5" type="text" value="2000" size="3" readonly="readonly" />
                            <span style="font-size:9px;">character's left &nbsp;
                                <strong>(2000max)</strong></span>

                        </div></li>

                    <li><label>Task for next day :*<br/><em><font color="#FF0000" size="1">( Mention date for each 
                                updation )</font></em> </label> <div class="form_input"><textarea class="auto" id="autogrow3" name="task" cols="50" rows="3" onKeyDown="textCounter(document.form1.task, document.form1.remLen6, 1999)"
                                                                                          onKeyUp="textCounter(document.form1.task, document.form1.remLen6, 1999)" ><?php echo $taskDay; ?></textarea>

                            <input style="width:4%"  name="remLen6" type="text" value="2000" size="3" readonly="readonly" />
                            <span style="font-size:9px;">character's left &nbsp;
                                <strong>(2000max)</strong></span>
                        </div></li>

                    <li style="text-align:center"><input type="submit" name="submit" id="submit" value="Submit" style="background: #CCC;color:#000000;text-shadow: 1px 1px #DDD; padding:6px;border-radius:5px; font-weight:bold;"/></li>

                </ul>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
    $('input[type=radio][name=eventtype]').change(function() {
        if (this.value == 'Single') {
            $("#event_date").hide();
            $("#event_date1").hide();
            $("#event_date2").hide();
        }
        else if (this.value == 'Multi') {
            $("#event_date").show();
            $("#event_date1").show();
            $("#event_date2").show();
        }
    });
    });
    </script>
<br class="clear" />   