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

<?php  
$trainId = $_REQUEST['trainingId'];
$SelQuery = "SELECT * FROM oxy2_training WHERE id = '$trainId'";
$SelExec = mysql_query($SelQuery);
while($SelResult = mysql_fetch_array($SelExec))
{
$trainingTitle= $SelResult['trainingTitle'];
$description= $SelResult['description'];
$datepicker1= $SelResult['datepicker1'];
$timepicker= $SelResult['timepicker'];
$trainingUsers= $SelResult['trainingUsers'];
$trainingUsers= $SelResult['trainingUsers'];
$dateAdded= $SelResult['dateAdded'];
}
?>     



<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span><h5>Create Training Session</h5></div>
            <div class="widget_body">
				<!--Form fields-->
                <form action="actionForTraining.php" method="post" name="form1" id="form1" onSubmit="return check()">
                
                <ul class="form_fields_container">
                            
            		
                
                	<li><label>Training Title :*</label> <div class="form_input"><input name="trainingTitle" id="trainingTitle"  type="text" class="tip_east" title="Training Title" value="<?php echo $trainingTitle; ?>"></div></li>
                    
                    <li><label>Training Description :*</label> <div class="form_input">
                    <textarea class="auto" id="trainingDescription" name="trainingDescription" cols="30" rows="3" ><?php echo $description; ?></textarea>
</div></li>
                    
                    <li><label>Training Date :*</label> <div class="form_input">
                    <input type="text" name="datepicker1"  id="datepicker1" class="tip_east" title="Training Date" value="<?php echo $datepicker1;?>">
                    </div></li>


					 <li><label>Training Time :*</label> <div class="form_input">
                    <input type="text" name="timepicker"  id="timepicker" class="tip_east" title="Training Time"  value="<?php echo $timepicker;?>">
                    </div></li>                    
                  
                   <li><label>Training Users :</label> <div class="form_input">
                   
                    <table width="100%" border="0">
                    <tr>
                    <?php	
					$cy = 0;				
					$que="SELECT * FROM oxy2_users WHERE status = '1'";
					$res=mysql_query($que);
					while($row=mysql_fetch_array($res))
					{
					
					$fname = $row[fname];
					$lname = $row[lname];
					$cNAme = $fname." ".$lname;
					$user_id = $row[user_id];
					$username = $row[username];
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