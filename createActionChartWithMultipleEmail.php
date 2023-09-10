<style type="text/css">
.form_fields_container li div.form_input input, .form_fields_container li div.form_input textarea{
width:30%;
}
div.form_input textarea {
width: 70%!important;
}
label .color{
padding: 3px 5px;display: inline-block;line-height: 100%;background: #757673;padding: 3px 5px;font-size: 10px;text-transform: uppercase;color: white;text-shadow: 0px 1px 0px #646464;border-radius: 3px;
}
</style>

<!-- Jquery Calender Script -->

	
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
  
    <script>
    $(function() {
        $( "#datepicker" ).datepicker();
		$( "#datepicker1" ).datepicker();
		$( "#datepicker2" ).datepicker();
    });
    </script>
    

<!-- Calender Script Ended -->


<!-- Scripts For Email -->


    <script type="text/javascript" src="src/jquery.tokeninput.js"></script>
     <link rel="stylesheet" href="styles/token-input.css" type="text/css" />
    <link rel="stylesheet" href="styles/token-input-facebook.css" type="text/css" />

    <script type="text/javascript">
    $(document).ready(function() {
        $("#submit").click(function () {
												
        var u2 = $("#demo-input-local-custom-formatters").val();
		document.getElementById('ref').value=u2;
	
		    
			
        });
		
		$("#demo-input-local-custom-formatters").tokenInput("./php-profile.php", {
              propertyToSearch: "first_name",
			  preventDuplicates: true,
              resultsFormatter: function(item){ return "<li>" + "<img src='phpThumb/phpThumb.php?src=../usr_thumb/" + item.url + "&amp;w=25&h=25&amp;zc=1&amp;fltr[]=ric|5|5&f=png&amp;hash=1967452c10c461eaf74689df4841c6dc' title='" + item.first_name + " " + item.last_name + "' height='25px' width='25px' />" + "<div style='display: inline-block; padding-left: 10px;'><div class='full_name'>" + item.first_name + " " + item.last_name + "</div><div class='email'>" + item.email + "</div></div></li>" },
              tokenFormatter: function(item) { return "<li><p>" + item.first_name + " " + item.last_name + "</p></li>" },
          });
		
 });
    </script>

<!-- Ended -->




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
browserName = navigator.appName.substring(0,8);
browserVer = parseFloat(navigator.appVersion);

if (navigator.appVersion.charAt(navigator.appVersion.indexOf("(")+1) == "M"){
	is_mac = 1;
	}
else if (navigator.appVersion.charAt(navigator.appVersion.indexOf("(")+1) == "X"){
	is_unix = 1;
	}
else if (navigator.appVersion.charAt(navigator.appVersion.indexOf("(")+1) == "L"){
	is_unix = 1;
	}
else if (navigator.appVersion.charAt(navigator.appVersion.indexOf("(")+1) == "O"){
	is_unix = 1;
	}
if (navigator.appVersion.charAt(navigator.appVersion.indexOf("(")+1) == "M"){
	is_mac = 1;
	}
if ((browserName == "Netscape" && browserVer >= 3)||(browserName == "Microsof" && browserVer >= 

3.01 && is_mac)){
	goodbrowser_rollover = 1;
	}
if ((browserName == "Netscape" && browserVer >= 3)||((browserName == "Microsof" && browserVer == 

3.01) && is_mac)||(browserName == "Microsof" && browserVer >= 4.0 && !is_mac)){
 if (!is_unix){
 goodbrowser_counter = 1;
 }
	}

counter_speed_short = default_short_speed;
counter_speed_long = default_long_speed;
 if (is_mac){
	counter_speed_short = mac_short_speed;
	counter_speed_long = mac_long_speed;
	}
if ((!is_mac)&&(browserName == "Netscape" && browserVer >= 3 && browserVer < 4)){
	counter_speed_short = pc_ns3_short_speed_counter;
	counter_speed_long = pc_ns3_long_speed_counter;
	}
if ((!is_mac)&&(browserName == "Netscape" && browserVer >= 4)){
	counter_speed_short = pc_ns4_short_speed_counter;
	counter_speed_long = pc_ns4_long_speed_counter;
	jump_ok = 1;
	}
 //-------------------------------------------------------------
//			Make text variable array
//-------------------------------------------------------------
function MakeArray(n){
	this.length = n;
	for (var i = 1; i<=n; i++) {
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
	if (is_message){ 
 endTime = now + (counter_speed_short * 0.1 * 1) 
 }
	else{
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
 if ((is_message)&&(browserName != "Microsof")){
 document.form1.counter.focus() 
 document.form1.test.focus(); 
 }
 if (!(is_message)){
 if (pos1 == 0){ 
 if (browserName == "Microsof"){ 
 document.form1.counter.focus();	
 }
 else{
 document.form1.elements[pos1+1].focus(); 
 }
 }
 else{
 document.form1.elements[pos1-1].focus(); 
 }
 document.form1.elements[pos1].focus(); 
 }
 if (is_message){ 
 count_text(document.form1.test.value) 
 }
 if (!(is_message)){ 
 count_it(document.form1.elements[pos1].value,pos1) 
 }
	} 
	else { 
 var delta = new Date(endTime - now) 
 var theMin = delta.getMinutes() 
 var theSec = delta.getSeconds() 
 var theTime = theMin 
 theTime += ((theSec < 10) ? ":0" : ":") + theSec 
 if (running) { 
 if (is_message){ 
 timerID = setTimeout("show_timer()",counter_speed_long) 
 }
 else{
 timerID = setTimeout("show_timer()",autotab_speed_long) 
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
function count_text(data){
if (goodbrowser_counter){
	is_message = 1;
	curr_pos = 6;
	if (document.form1.test.length == 0){
 data = "";
 }
	data_length= data.length
	xcount = 0;
	ycount = 0;
	while (xcount < data_length){
 if (data.charAt(xcount) != "\r"){
 ycount++;
 }
 xcount++;
 } 
 data_length = ycount;
	document.form1.counter.value = data_length;
	mess_remaining = document.form1.counter.value;
	if (data_length > max_text){
 if (document.form1.test.value != save_message){
 document.form1.test.value=data.substring(0,max_text);
 document.form1.counter.value=max_text;
 document.form1.test.blur();
 save_message = document.form1.test.value;
 timer_stop();
 alert ("Your message cannot be more than 1500 characters, the additional characters were deleted at the end of the message.");
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
function count_text2(form){
if (goodbrowser_counter){
	is_message = 1;
	curr_pos = 6;
	data = form.test.value;
	if (document.form1.test.length == 0){
 data = "";
 }
	data_length= data.length 
	xcount = 0;
	ycount = 0;
	while (xcount < data_length){
 if (data.charAt(xcount) != "\r"){
 ycount++;
 }
 xcount++;
 } 
	data_length = ycount;
	document.form1.counter.value = data_length;
	mess_remaining = document.form1.counter.value;
	if (data_length > max_text ) { 
 if (document.form1.test.value != save_message){
 document.form1.test.value=data.substring(0,max_text);
 document.form1.counter.value=max_text;
 document.form1.test.blur();
 save_message = document.form1.test.value;
 timer_stop();
 alert ("Your message cannot be more than "+max_text+" characters, the additional characters were deleted at the end of the message.");
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
		
	if (document.form1.dept.value==" ")
	{
		alert("Please select a department.");
		document.form1.dept.focus();
		return false;
	}
	
	
	if (document.form1.leadno.value=="")
	{
		alert("Please give a lead number of the event.");
		document.form1.leadno.focus();
		return false;
	}
	if(document.form1.leadno.value!="")
	{
		if (document.form1.leadno.value.indexOf("'") != -1){
			alert("Please Don't use Apostrophes( ' ) in Lead No. ");
			document.form1.leadno.focus();			
			return false;}
	}
	if(document.form1.leadno.value!="")
	{
		if (document.form1.leadno.value.indexOf("&") != -1){
			alert("Please Don't use & sign in Lead No. ");
			document.form1.leadno.focus();			
			return false;}
	}
	if(document.form1.leadno.value!="")
	{
		if (document.form1.leadno.value.indexOf(" ") != -1){
			alert("Please Don't use Space in Lead No. ");
			document.form1.leadno.focus();			
			return false;}
	}
	
	
	if (document.form1.eventname.value=="")
	{
		alert("Please give an Campaign name.");
		document.form1.eventname.focus();
		return false;
	}
	
	if(document.form1.eventname.value!="")
	{
		if (document.form1.eventname.value.indexOf("'") != -1){
			alert("Please Don't use Apostrophes( ' ) in Campaign name. ");
			document.form1.eventname.focus();			
			return false;}
	}
	
	
	if (document.form1.clientname.value=="")
	{
		alert("Please give an Client name.");
		document.form1.clientname.focus();
		return false;
	}
	if(document.form1.clientname.value!="")
	{
		if (document.form1.clientname.value.indexOf("'") != -1){
			alert("Please Don't use Apostrophes( ' ) in Client name. ");
			document.form1.clientname.focus();			
			return false;}
	}
	
	if(form1.stage[0].checked || form1.stage[1].checked || form1.stage[2].checked)
	{
	}
	else
	{
		alert("Please select the Stage of Action chart");
		return false;
	}
	
	if(form1.key[0].checked || form1.key[1].checked)
	{
	}
	else
	{
		alert("Please select the Key Account exist or not");
		return false;
	}
	if (document.form1.venue.value=="")
	{
		alert("Please give a Venue name.");
		document.form1.venue.focus();
		return false;
	}
	if (document.form1.city.value=="")
	{
		alert("Please give a City name.");
		document.form1.city.focus();
		return false;
	}
	
	if(form1.eventtype[0].checked || form1.eventtype[1].checked)
	{
	}
	else
	{
		alert("Please select the type of Event Single or MultiDays");
		return false;
	}
	
	
		
	if (document.form1.type1.value =="Single")
	{
	var text = form1.dateevent.value;
	if (text== null || text == "")
		{alert("Please select a Event starting date.");return false;}
	
	
	}
	else if (document.form1.type1.value=="Multi")
	{	
	
	var text2 = form1.datefrom.value;
	if (text2== null || text2 == "")
		{alert("Please select a Event starting date in multiple days event.");return false;}
		
		var text3 = form1.dateto.value;
	if (text3== null || text3 == "")
		{alert("Please select a Event last date in multiple days event.");return false;}	
	}
	if (document.form1.name.value=="")
	{
		alert("Please give Executive's name.");
		document.form1.name.focus();
		return false;
	}
	if (document.form1.bdname.value=="")
	{
		alert("Please give BD contact name.");
		document.form1.bdname.focus();
		return false;
	}
	if(form1.status[0].checked || form1.status[1].checked || form1.status[2].checked)
	{
	}
	else
	{
		alert("Please select the status of the Event.\n Green / Yellow / Red");
		return false;
	}
	
	if (document.form1.eventbr.value=="")
	{
		alert("Please enter Event Brief.");
		document.form1.eventbr.focus();
		return false;
	}
	if(document.form1.eventbr.value!="")
	{
		if (document.form1.eventbr.value.indexOf("'") != -1){
			alert("Please Don't use Apostrophes( ' ) in Event Brief ");
			document.form1.eventbr.focus();			
			return false;}
	}
	
	if (document.form1.progress.value=="")
	{
		alert("Please give Event Progress.");
		document.form1.progress.focus();
		return false;
	}
	
	if(document.form1.progress.value!="")
	{
		if (document.form1.progress.value.indexOf("'") != -1){
			alert("Please Don't use Apostrophes( ' ) in Progress so far ");
			document.form1.progress.focus();			
			return false;}
	}
	
	if (document.form1.issues.value=="")
	{
		alert("Please enter Critical Issues.");
		document.form1.issues.focus();
		return false;
	}
	
	if(document.form1.issues.value!="")
	{
		if (document.form1.issues.value.indexOf("'") != -1){
			alert("Please Don't use Apostrophes( ' ) in Critical issues as on date ");
			document.form1.issues.focus();			
			return false;}
	}
	
	if (document.form1.task.value=="")
	{
		alert("Please enter Task for the Next Day.");
		document.form1.task.focus();
		return false;
	}
	if(document.form1.task.value!="")
	{
		if (document.form1.task.value.indexOf("'") != -1){
			alert("Please Don't use Apostrophes( ' ) in Task for Next Day ");
			document.form1.task.focus();			
			return false;}
	}
	
	
	
	return true;
}
</script>

<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span><h5>Create Action Chart</h5></div>
            <div class="widget_body">
				<!--Form fields-->
                <form action="actionForActionChartWithMutlipleEmail.php" method="post" name="form1" id="form1" onSubmit="return check()">
                
                <ul class="form_fields_container">
                            
            		<li>
                    <label>Sercon Lead number : *</label> 
                    <div class="form_input"><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="7%">Sercon </td>
    <td width="9%"><div style="position:relative; top:9px;margin-left:2px;margin-right:8px;"><select name="dept">
                	    <option value=" ">Select Department</option>
                	    <option value="B2C">B2C</option>
                	    <option value="B2B">B2B</option>
                	    <option value="Digital">Digital</option>
                	</select></div> </td>
    <td width="84%"><input name="leadno" type="text" class="tip_east" title="Number"></td>
  </tr>
</table>

                    
                    </div>
                    </li>
                
                	<li><label>Campaign Name :*</label> <div class="form_input"><input name="eventname" id="eventname"  type="text" class="tip_east" title="Campaign Name"></div></li>
                    
                    <li><label>Client Name :*</label> <div class="form_input"><input name="clientname" id="clientname" type="text" class="tip_east" title="Client Name"></div></li>
<script type="text/javascript">
function selectkey1()
{
document.form1.keyact.disabled=false;
alert("Please Enter the Key Account.");
document.form1.keyact.focus();
return true;
}
function selectkey2()
{
document.form1.keyact.disabled=true;
form1.keyact.value = "";
return true;
}
 </script>                   
                    
                    <li>
                    	<label>Select Stage :*</label> 
                        <div class="form_input"><input name="stage" id="stage" type="radio" value="Lead" checked="checked">
                        <label for="radio1">Lead</label> </div>
                        <div class="form_input"><input id="stage" name="stage" type="radio" value="Execution">
                        <label for="radio1">Execution</label></div>
                         <div class="form_input"><input id="stage" name="stage" type="radio" value="Invoice">
                        <label for="radio1">Invoice</label></div>
                    </li>
                    
                    <li>
                    	<label>Key Account :</label> 
                        <div class="form_input"><input name="key" type="radio" id="key3" value="Yes" onClick="selectkey1()" checked="checked">
                        <label for="radio1">Yes</label> </div>
                        <div class="form_input"><input name="key" type="radio" id="key" value="No" onClick="selectkey2()">
                        <label for="radio1">No</label></div>
                         <div class="form_input"><select name="keyactt" id="keyactt">
                	    <option value="" selected="selected">Select Key Account</option>
                	    <?php
                        $que="SELECT * FROM oxy2_clientn";
                        $res=mysql_query($que);
                        while($row=mysql_fetch_array($res))
                        {
							$companyname = $row[companyname];
                        $id = $row[id];
                        echo "<option value='$id'>$companyname</option>";
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
                    <td width="97%"><input type="text" name="venue" id="venue" class="tip_east" title="Venue">
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
                        $que="SELECT * FROM oxy2_city";
                        $res=mysql_query($que);
                        while($row=mysql_fetch_array($res))
                        {
                        $city_name = $row[city_name];
                        echo "<option value='$city_name'>$city_name</option>";
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
document.form1.type1.value="Single";
return true;
}
function select5()
{
alert("Please Enter Dates in Multi days");
document.form1.type1.value="Multi";
return true;
}
 </script>
                    
                     <li>
                    	<label>Type :*</label> 
                        <div class="form_input"><input id="radio1" name="eventtype" type="radio" value="Single" onClick="select4()" checked="checked">
                        <label for="radio1">Single Day</label> </div>
                        <div class="form_input"><input id="radio1" type="radio" name="eventtype" value="Multi" onClick="select5()">
                        <label for="radio1">Multi-Day</label></div>
                    </li>
                    
                    <li><label>Date :<br/><span style="font-size:9px;">(Data required by : <br/>Database & Creatives)</span></label> <div class="form_input"><input type="text" name="dateevent" id="datepicker" class="tip_east" title="Date"><span style="font-size:9px;">(Click 
                          to select Start date of Event)</span></div></li>
                                        
                    <li><span style="font-size:14px; font-weight:bold;padding: 15px 27px;">For long drawn Multiple 
                    Day Activity (Example : LGTC/ACT/DB/ISD etc)</span></li>
                    
                    <li><label>From :<br/><span style="font-size:9px;">(Start date of Event)</span></label> <div class="form_input"><input type="text" name="datefrom"  id="datepicker1" class="tip_east" title="From Date"></div></li>
                    <li><label>To :<br/><span style="font-size:9px;">(End date of Event)</span></label> <div class="form_input"><input type="text" name="dateto"  id="datepicker2" class="tip_east" title="To Date"></div></li>
                    
                    <li><label>Project Leader :</label> <div class="form_input"><select name="name" id="name">
                	    <option>Select Project Leader</option>
                	    <?php
                        $que="SELECT * FROM oxy2_users WHERE user_type = '2'";
                        $res=mysql_query($que);
                        while($row=mysql_fetch_array($res))
                        {
                        $fname = $row[fname];
						$lname = $row[lname];
						$cNAme = $fname." ".$lname;
						$user_id = $row[user_id];
                        echo "<option value='$user_id'>$cNAme</option>";
                        }                        
                        ?>
                	</select></div></li>
                    
<script type="text/javascript">
function selectid(dd)
{
var ind = dd.selectedIndex; 
if (ind == 0) { return; }
var url = "" ;
url=dd.options[ind].value 
document.form1.bdname.value=url;
return true;
}
function selectidno(dd)
{
var ind = dd.selectedIndex; 
if (ind == 0) { return; }
var url = "" ;
url=dd.options[ind].value 
document.form1.bdno.value=url;
return true;
}
 </script>    
 
        
<SCRIPT LANGUAGE="JavaScript">

function textCounter(field,cntfield,maxlimit) {	
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
                        $que="SELECT * FROM oxy2_users WHERE user_type = '3'";
                        $res=mysql_query($que);
                        while($row=mysql_fetch_array($res))
                        {
                        $fname = $row[fname];
						$lname = $row[lname];
						$cNAme = $fname." ".$lname;
						$user_id = $row[user_id];
                        echo "<option value='$user_id'>$cNAme</option>";
                        }                        
                        ?>
                	</select>

                    
                    </div>
                    </li>
                    
                    <li>
                    	<label>Status :*</label> 
                        <div class="form_input"><input id="radio1" name="status" value="green" type="radio" checked="checked">
                        <label for="radio1"><span class="color" style="background:#060;">Green</span></label> </div>
                        <div class="form_input"><input id="radio1" name="status" value="yellow" type="radio">
                        <label for="radio1"><span class="color" style="background:#FF0; color:#000">Yellow</span></label></div>
                         <div class="form_input"><input id="radio1" type="radio" name="status" value="red">
                        <label for="radio1"><span class="color" style="background:#F00;">Red</span></label></div>
                    </li>
                    
                     <li><span style="font-size:14px; font-weight:bold;padding: 15px 27px;">Reference Internal Email id's ( select id's where event updates need to be sent )</span></li>
                    
                  
                    
                  
                                   <li><label>Email :</label> <div class="form_input">
                    <input  id="demo-input-local-custom-formatters"  type="text" title="Enter the comma separated email.">
                    
                   <!-- <input type="text" id="demo-input-local-custom-formatters" />-->
        <input type="hidden"  name="email" id="ref"  value=""/>
                    
                    </div></li>
                    
                    <li><label>Campaign Brief :*</label> <div class="form_input"><textarea class="auto" id="txtInput" name="eventbr" cols="30" rows="3" onKeyDown="textCounter(document.form1.eventbr,document.form1.remLen3,1999)"
onKeyUp="textCounter(document.form1.eventbr,document.form1.remLen3,1999)" ></textarea>
                    
                    <input style="width:4%"  name="remLen3" type="text" value="2000" size="3" readonly="readonly" />
						  <span style="font-size:9px;">character's left &nbsp;
                          <strong>(2000max)</strong></span>
                    
                    </div></li>
                    
                    <li><label>Progress so far :*<br/><em><font color="#FF0000" size="1">( Mention date for each 
                    updation )</font></em> </label> <div class="form_input"><textarea class="auto" id="autogrow1" name="progress" cols="" rows="3" onKeyDown="textCounter(document.form1.progress,document.form1.remLen4,1999)"
onKeyUp="textCounter(document.form1.progress,document.form1.remLen4,1999)" ></textarea>

<input style="width:4%"  name="remLen4" type="text" value="2000" size="3" readonly="readonly" />
						  <span style="font-size:9px;">character's left &nbsp;
                          <strong>(2000max)</strong></span>

</div></li>
                    
                    <li><label>Critical issues as on date :*</label> <div class="form_input"><textarea class="auto" id="autogrow2" name="issues" cols="" rows="3" onKeyDown="textCounter(document.form1.issues,document.form1.remLen5,1999)"
onKeyUp="textCounter(document.form1.issues,document.form1.remLen5,1999)" ></textarea>

<input style="width:4%"  name="remLen5" type="text" value="2000" size="3" readonly="readonly" />
						  <span style="font-size:9px;">character's left &nbsp;
                          <strong>(2000max)</strong></span>

</div></li>
                    
                    <li><label>Task for next day :*<br/><em><font color="#FF0000" size="1">( Mention date for each 
                    updation )</font></em> </label> <div class="form_input"><textarea class="auto" id="autogrow3" name="task" cols="" rows="3" onKeyDown="textCounter(document.form1.task,document.form1.remLen6,1999)"
onKeyUp="textCounter(document.form1.task,document.form1.remLen6,1999)" ></textarea>

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
                      
	
 	<br class="clear" />   