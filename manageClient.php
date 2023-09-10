<?php include_once('commonFunction.php'); ?>
<style type="text/css">

table.display span.pj_cat {
display: inline-block;
line-height: 100%;
background: #757673;
padding: 3px 5px;
font-size: 10px;
text-transform: uppercase;
color: white;
text-shadow: 0px 1px 0px #646464;
border-radius: 3px;
}
table.display span.green_highlight {
background:#060;
}
table.display span.blue_highlight {
background: #4572A7;
}

table.display span.grey_highlight {
background:#3D434B;
}

table.display span.yellow_highlight {
background: #FF0;
color:#000;
}
table.display span.red_highlight {
background: #F00;
}


</style>
<!--One_Wrap-->
 	<div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="77%"><span class="iconsweet">f</span><h5>View Organization wise Target</h5></td>
    <td width="23%"><h5>Total Number of Records : <?php echo getClientCount(); ?></h5></td>
  </tr>
</table>
</div>
            <div class="widget_body">
            	
                 
                
                
            </div>
            
          <div class="widget_body">
                <div class="demo_jui">  
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="jqtable">
                        <thead>
                            <tr>
                                <th width="59" align="left">Organization Name</th>
                              <th width="65">AD</th>
                              <th width="72">Client Name</th>
                              <th width="55">Address</th>
                              <th width="29">City</th>
                              <th width="38">Email</th>
                              <th width="80">Designation<br/>Mobile</th>
                              <th width="58">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php

$SelQuery = "SELECT * FROM oxy2_clientn ORDER BY id DESC";
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
				
				$clientId= $SelResult['id'];
				
				$companyname= $SelResult['companyname'];
				
				$contact= $SelResult['contact'];
				
				$add1= $SelResult['add1'];
				
				$ccity= $SelResult['ccity'];
				
				$email= $SelResult['email'];
				
				$mob= $SelResult['mob'];
				
				$desg= $SelResult['desg'];
					
				$ad= $SelResult['ad'];
				
				$p_m1= $SelResult['p_m1'];
				$o_m1= $SelResult['o_m1'];
				$r_m1= $SelResult['r_m1'];
				
				$p_m2= $SelResult['p_m2'];
				$o_m2= $SelResult['o_m2'];
				$r_m2= $SelResult['r_m2'];
				
				$p_m3= $SelResult['p_m3'];
				$o_m3= $SelResult['o_m3'];
				$r_m3= $SelResult['r_m3'];
				
				$p_m4= $SelResult['p_m4'];
				$o_m4= $SelResult['o_m4'];
				$r_m4= $SelResult['r_m4'];
				
				$p_m5= $SelResult['p_m5'];
				$o_m5= $SelResult['o_m5'];
				$r_m55= $SelResult['r_m5'];
				
				$p_m6= $SelResult['p_m6'];
				$o_m6= $SelResult['o_m6'];
				$r_m6= $SelResult['r_m6'];
				
				$p_m7= $SelResult['p_m7'];
				$o_m7= $SelResult['o_m7'];
				$r_m7= $SelResult['r_m7'];
				
				$p_m8= $SelResult['p_m8'];
				$o_m8= $SelResult['o_m8'];
				$r_m8= $SelResult['r_m8'];
				
				$p_m9= $SelResult['p_m9'];
				$o_m9= $SelResult['o_m9'];
				$r_m9= $SelResult['r_m9'];
				
				$p_m10= $SelResult['p_m10'];
				$o_m10= $SelResult['o_m10'];
				$r_m10= $SelResult['r_m10'];
				
				$p_m11= $SelResult['p_m11'];
				$o_m11= $SelResult['o_m11'];
				$r_m11= $SelResult['r_m11'];
				
				$p_m12= $SelResult['p_m12'];
				$o_m12= $SelResult['o_m12'];
				$r_m12= $SelResult['r_m12'];
				
?>                         
                            <tr class="<?php echo $col; ?>">
                                 <td align="left" style="background:none;"><a class="tip_north" href="#" style="color:#6C6C6C;padding:0 5px;"><b style="font-weight:bold;"><?php echo $companyname; ?></b></a></td>
                      <td align="center"><span ><?php echo getempetails($ad); ?></span></td>
                      <td align="center"><?php echo $contact;?></td>
                     <td align="center"><?php echo $add1;?></td>
                     <td align="center"><?php echo $ccity;?></td>
                     <td align="center"><?php echo $email;?></td>
                     <td align="center"><?php echo $desg."<br>".$mob;?></td>
                      <td align="center"><span class="data_actions iconsweet"><a class="tip_north" original-title="View" href="./?id=2&subId=7&clientID=<?php echo $clientId; ?> " style="color:#6C6C6C;padding:0 2px;font-size:18px;">}</a> <a class="tip_north" original-title="Edit" href="./?id=2&subId=6&clientID=<?php echo $clientId; ?> "  style="color:#6C6C6C;padding:0 2px;font-size:18px;">C</a> 					<!--	<a class="tip_north" original-title="Delete" href="#"  style="color:#6C6C6C;padding:0 2px;font-size:18px;color:#FA3A3A">X</a>--></span></td>
                            </tr>
                            
<?php } }
				else
				{
				?>   
                
                <tr>
                  <td colspan="3" align="center" style="font-size:14px; font-weight:bold;">No record Found</td>
                       
                </tr>
                <?php } ?> 
                                            
                           
                        </tbody>
                    </table>
                    
                     
              </div>
            </div>      
            
        </div>
    </div>    