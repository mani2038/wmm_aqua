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
    


<script type="text/javascript">
function check()
{
	if (document.form1.dept.value==" ")
	{
		alert("Please select a lead number.");
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
        	<div class="widget_title"><span class="iconsweet">r</span><h5>Create Training Session</h5></div>
            <div class="widget_body">
				<!--Form fields-->
                <form action="actionForTraining.php" method="post" name="form1" id="form1" onSubmit="return check()">
                
                <ul class="form_fields_container">
                            
            		
                
                	<li><label>Training Title :*</label> <div class="form_input"><input name="trainingTitle" id="trainingTitle"  type="text" class="tip_east" title="Training Title"></div></li>
                    
                    <li><label>Training Description :*</label> <div class="form_input">
                    <textarea class="auto" id="trainingDescription" name="trainingDescription" cols="30" rows="3" ></textarea>
</div></li>
                    
                    <li><label>Training Date :*</label> <div class="form_input">
                    <input type="text" name="datepicker1"  id="datepicker1" class="tip_east" title="Training Date">
                    </div></li>


					 <li><label>Training Time :*</label> <div class="form_input">
                    <input type="text" name="timepicker"  id="timepicker" class="tip_east" title="Training Time">
                    </div></li>                    
                  
                   <li><label>Training Users :</label> <div class="form_input">
                   
                    <table width="100%" border="0">
                    <tr>
                    <?php	
					$cy = 0;				
					$que="SELECT * FROM oxy2_users WHERE status = '1'";
					$res=mysqli_query($con,$que);
					while($row=mysqli_fetch_array($res))
					{
					
					$fname = $row['fname'];
					$lname = $row['lname'];
					$cNAme = $fname." ".$lname;
					$user_id = $row['user_id'];
					$username = $row['username'];
					if($cy % 3 == "0"){echo "</tr>";}
					$cy++;	
					?>
                    <td>
                      <table width="100%" border="0">
                        <tr>
                        <td width="13%" align="left"><input type="checkbox" name="trainingUsers[]" value="<?php echo $user_id; ?>"/></td>
                        <td width="87%" align="left"><?php echo $fname." ".$lname; ?></td>
                        </tr>
                        </table>

                    </td>
                     <?php } ?>
                    </tr>
                    </table>

                   
                   
                  
                    
                    </div></li>
                    
                    <li><label>Credit Points :*</label> <div class="form_input"><input name="creditPoints" id="creditPoints"  type="text" class="tip_east" title="Credit Points"></div></li>
                    
                    
                    
                    <li style="text-align:center"><input type="submit" name="submit" id="submit" value="Submit" style="background: #CCC;color:#000000;text-shadow: 1px 1px #DDD; padding:6px;border-radius:5px; font-weight:bold;"/></li>
                                                       
                </ul>
                </form>
            </div>
        </div>
    </div>
                      
	
 	<br class="clear" />   