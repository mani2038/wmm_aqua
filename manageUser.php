
<script type="text/javascript">
function ajaxCall2(t,status){
    
	var datas_tw  = "twittId=" + t + "&" +"stat=" + status;
	$.ajax({
      url: "userStatusUpdate.php",
      type: "POST",
      data: datas_tw,
	  cache: false,
      success: function(server_response){
		alert("User Is Disabled"); 
		location.reload();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
	  alert("error");
          
      }
    });
		
}

</script> 

<?php include_once('commonFunction.php'); ?>

<!--One_Wrap-->
 	<div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span><h5>Manage User's</h5></div>
            <div class="widget_body">
            	
                 
                
                
            </div>
            
          <div class="widget_body">
                <div class="demo_jui">  
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="jqtable">
                        <thead>
                            <tr>
                                <th width="75" align="left">Employee Details </th>
                              <th width="80">Department</th>
                              <th width="55">Email</th>
                                <th width="61">Mobile</th>
                                <th width="58">Branch</th>
                                <th width="117">D.O.J</th>
                                <th width="107">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php
$userIdforAction = $_COOKIE["user_id"];
$SelQuery = "SELECT * FROM oxy2_users ORDER BY user_id DESC";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				$i++;
				if($i % 2 == "0"){$col = "gradeA even";}
				else
				{$col = "gradeA odd";}
				
				$user_id= $SelResult['user_id'];
				$emp_id= $SelResult['emp_id'];
					
				$dept= $SelResult['dept'];
				
				$col1 = "grey_highlight";
				
				$fname= $SelResult['fname'];
				$lname= $SelResult['lname'];
				$name = $fname." ".$lname;
				
				$phone= $SelResult['phone'];
							
				$emailid= $SelResult['emailid'];
				
				$job_title= $SelResult['job_title'];
				
				$doj= $SelResult['doj'];
				$branch= $SelResult['branch'];
				
				$modified_on = $SelResult['modified_on'];
				
				$modified_by= $SelResult['modified_by'];
				
				//$company= $SelResult['company'];
						
				
				
?>                         
                            <tr class="<?php echo $col; ?>">
                                 <td align="left" style="background:none;">
                                 <a class="tip_north" original-title="<?php //echo $progress; ?>" href="#" style="color:#6C6C6C;padding:0 5px;text-decoration:none;">
                                 <span><b style="font-weight:bold;"><?php echo $name; ?>
                                 </b>
                                 <br/>
                                 (<?php echo $emp_id; ?>)</span></a>
                                 </td>
                                 
                      <td align="center"><span class="<?php echo $col1; ?> pj_cat"><?php echo $dept; ?></span></td>
                      
                      <td align="center"><?php echo $emailid; ?></td>
                      
                      <td align="center"><?php echo $phone; ?></td>
                      
                      <td align="center"><span><?php echo $branch; ?></span></td>
                      
                      <td align="center"><?php echo $doj; ?></span></td>
                      
                      <td align="center"><span class="data_actions iconsweet"><a class="tip_north" original-title="View" href="./?id=1&subId=9&userId=<?php echo $user_id; ?> " style="color:#6C6C6C;padding:0 2px;font-size:18px;">}</a> <a class="tip_north" original-title="Edit" href="./?id=1&subId=12&editId=<?php echo $user_id; ?> "  style="color:#6C6C6C;padding:0 2px;font-size:18px;">C</a> 						<!--<a class="tip_north" original-title="Delete" href="#"  style="color:#6C6C6C;padding:0 2px;font-size:18px;color:#FA3A3A">X</a>-->
                      <input type="hidden" id="uu<?php echo $user_id; ?>" value="<?php echo $user_id; ?>" />
                      <a original-title="Disable" href="#" style="color:#6C6C6C;padding:0 2px;font-size:18px;" id="t" title="Click to Disable" class="tip_north Rlink<?php echo $user_id; ?>" onclick="ajaxCall2(document.getElementById('uu<?php echo $user_id; ?>').value,0); return false;" >X</a>
                      
                      </span></td>
                            </tr>
                            
<?php } }
				else
				{
				?>   
                
                <tr>
                  <td colspan="7" align="center" style="font-size:14px; font-weight:bold;">No record Found</td>
                       
                </tr>
                <?php } ?> 
                                            
                           
                        </tbody>
                    </table>
                    
                     
              </div>
            </div>      
            
        </div>
    </div>    