 <?php

$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);


                        $SelQuery1 = "SELECT * FROM oxy2_clientn_retail ORDER BY id DESC";
                        $SelExec1 = mysqli_query($con,$SelQuery1);
                        
                        $type1=$_REQUEST["type"];
						$systemMonthInDigit1 = date("m");
						$systemYearInDigit1 = date("Y");
                        $getYTD = 0;
						$getYTD1 = 0;
						$getYTDACC = 0;
						$getYTDACC1 = 0;
						$getYTDCredit = 0;
						$getYTDPercent = 0;
						$getpnl = 0;
						$getPCD1 = 0;
						$getPerformanceGap = 0;
						$getPipelineGap = 0;
						
						
						while($SelResult1 = mysqli_fetch_array($SelExec1))
                        {
                        $clientId1= $SelResult1['id'];
						
						
						$getYTD = $getYTD + getYTD($type1,$clientId1,12); 
						$getYTD1 = $getYTD1 + getYTD($type1,$clientId1,$systemMonthInDigit1); 
						$getYTDACC = $getYTDACC + getYTDACC($clientId1,"Contracted"); 
						$getYTDACC1 = $getYTDACC1 + getYTDACC($clientId1,"Invoiced");
						$getYTDCredit = $getYTDCredit + getYTDCredit($clientId1);
						//$getYTDPercent = $getYTDPercent + getYTDPercent($clientId1,$type1,$systemMonthInDigit1);  
						$getpnl = $getpnl + getpnl($clientId1); 
						$getPCD1 = $getPCD1 + getPCD($clientId1,$systemMonthInDigit1,$systemYearInDigit1); 
						$getPerformanceGap = $getPerformanceGap + getPerformanceGap($type1,$clientId1,$systemMonthInDigit1);
						$getPipelineGap = $getPipelineGap + getPipelineGap($type,$clientId1,$systemMonthInDigit1);
						
                        }
						
						$getYTDPercent = getYTDPercentTotal($getYTDCredit,$getYTD1);
                        ?> 
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

table.display .grey_highlight {
background:#3D434B;
color:white;
}

table.display span.yellow_highlight {
background: #FF0;
color:#000;
}
table.display span.red_highlight {
background: #F00;
}

tr.odd.gradeA td.sorting_1 {
background-color: none;
}
tr.odd td.sorting_1 {
background-color: none;
}

.tipsy-inner 
{
	max-width: 100%;
	margin-left:50px;
}

.button_small {
padding: 3px 12px 4px;
}
</style>
<!--<script>
$(document).ready( function() {
  $('#jqtable').dataTable( {
    "iDisplayLength": 25
  } );
} )
</script>-->
<!--One_Wrap-->
 	<div class="one_wrap">
    
  
    
    	<div class="widget">
        	<div class="widget_title"><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="77%"><span class="iconsweet">f</span><h5>Clientwise Targets & Achievements (R)   </h5></td>
    <td width="23%"><h5>Total Number of Client : <?php echo getClientCount(); ?></h5></td>
  </tr>
</table>
</div>
            <div class="widget_body">
            	
                 
                
                
            </div>
            
          <div class="widget_body">
          
  <!--        <a style="margin:5px;" class="greyishBtn button_small" href="#">Button Grey</a>-->
<!--                            <a style="margin:5px;" class="whitishBtn button_small" href="#">Button White</a>
                            <a style="margin:5px;" class="bluishBtn button_small" href="#">Button Blue</a>
                            <a style="margin:5px;" class="redishBtn button_small" href="#">Button Red</a>
                            <a style="margin:5px;" class="greenishBtn button_small" href="#">Button Green</a> 
                            <a style="margin:5px;" class="magentaBtn button_small" href="#">Button Magenta</a> -->
                            <div align="right">
                            <a <?php if($_REQUEST['type'] == "p"){ ?>style="margin:5px; border:3px solid gray;"<?php } else {?>style="margin:5px;" <?php } ?> class="yellowBtn button_small" href="./?id=12&subId=16&type=p">Pessimistic Target</a> 
                             <a <?php if($_REQUEST['type'] == "r"){ ?>style="margin:5px; border:3px solid gray;"<?php } else {?>style="margin:5px;" <?php } ?> class="yellowBtn button_small" href="./?id=12&subId=16&type=r">Realistic Target</a>
                              <a <?php if($_REQUEST['type'] == "o"){ ?>style="margin:5px; border:3px solid gray;"<?php } else {?>style="margin:5px;" <?php } ?> class="yellowBtn button_small" href="./?id=12&subId=16&type=o">Optimistic Target</a>
                 <!--           <a style="margin:5px;" class="dblueBtn button_small" href="#">Button Dark</a> -->
                </div>
                
               
                
                
                 
                
                
                <div class="demo_jui">  
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="display" id="jqtable">
                        
                        <thead>
                        
                       <tr>
                              <th> <a style="margin:5px;" class="yellowBtn button_small"><?php echo "Total"; ?></a> </th>
                              <th><a style="margin:5px;" class="grey_highlight button_small"><?php echo $getYTD; ?></a></th>
                              <th><a style="margin:5px;" class="grey_highlight button_small"><?php echo $getYTD1; ?></a></th>
                              <th><a style="margin:5px;" class="grey_highlight button_small"><?php echo $getYTDACC; ?></a></th>
                              <th><a style="margin:5px;" class="grey_highlight button_small"><?php echo $getYTDACC1; ?></a></th>
                              <th><a style="margin:5px;" class="grey_highlight button_small"><?php echo $getYTDCredit; ?></a></th>
                              <th><a style="margin:5px;" class="grey_highlight button_small"><?php echo $getYTDPercent."%"; ?></a></th>
                              <th><a style="margin:5px;" class="grey_highlight button_small"><?php echo $getpnl; ?></a></th>
                              <th><a style="margin:5px;" class="grey_highlight button_small"><?php echo $getPCD1; ?></a></th>
                              <th><a style="margin:5px;" class="grey_highlight button_small"><?php echo $getPerformanceGap; ?></a></th>
                              <th><a style="margin:5px;" class="grey_highlight button_small"><?php echo $getPipelineGap; ?></a></th>
                            </tr>
                        
                        
                            <tr>
                              <th>Client Name</th>
                              <th>Annual GP Target</th>
                              <th>YTD Target</th>
                              <th>YTD Accural</th>
                              <th>YTD Ach</th>
                              <th>YTD Credit</th>
                              <th>YTD %</th>
                              <th>PLN Credit</th>
                              <th>PCM(<?php echo date("M"); ?>)</th>
                              <th>Performance GAP</th>
                              <th>Pipeline GAP</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php

$SelQuery = "SELECT * FROM oxy2_clientn_retail ORDER BY id DESC";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				$type=$_REQUEST["type"];
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
				$systemMonthInDigit = date("m");
				$systemYearInDigit = date("Y");
				
				
				$col1 = "grey_highlight";
				
				//Fetching the target for the view according the taget type
				$targetType = $_REQUEST['type'];
				if($targetType == "p"){				
				$targetView = "Jan:".$p_m1." , Feb:".$p_m2." , Mar:".$p_m3." , Apr:".$p_m4." , May:".$p_m5." , June:".$p_m6." , July:".$p_m7." , Aug:".$p_m8." , Sep:".$p_m9." , Oct:".$p_m10." , Nov:".$p_m11." , Dec:".$p_m12;
				}
				else if($targetType == "r"){
				$targetView = "Jan:".$r_m1." , Feb:".$r_m2." , Mar:".$r_m3." , Arr:".$r_m4." , May:".$r_m5." , June:".$r_m6." , July:".$r_m7." , Aug:".$r_m8." , Ser:".$r_m9." , Oct:".$r_m10." , Nov:".$r_m11." , Dec:".$r_m12;
				}
				else {
				$targetView = "Jan:".$o_m1." , Feb:".$o_m2." , Mar:".$o_m3." , Aor:".$o_m4." , May:".$o_m5." , June:".$o_m6." , July:".$o_m7." , Aug:".$o_m8." , Seo:".$o_m9." , Oct:".$o_m10." , Nov:".$o_m11." , Dec:".$o_m12;
				}
?>                         
                            <tr class="<?php echo $col; ?>">
                                 <td align="left"><a class="tip_north" original-title="<?php echo "Click here to view all leads";//$targetView; ?>" href="./?id=2&subId=18&ClientId=<?php echo $clientId; ?>" style="color:#6C6C6C;padding:0 5px;" target="_blank"><b style="font-weight:bold;"><?php echo $companyname; ?></b></a><span style="font-size:10px; color:#060;">[<?php echo get2leadallForClient($clientId); ?>]</span></td>
                      <td align="center"><span ><a class="tip_north" original-title="View" href="./?id=2&subId=7&clientID=<?php echo $clientId; ?> " style="color:#6C6C6C;" target="_blank"><?php echo getYTD($type,$clientId,12); ?></a>	</span></td>
                      <td align="center"><?php echo getYTD($type,$clientId,$systemMonthInDigit); ?></td>
                     <td align="center"><?php echo getYTDACC($clientId,"Contracted"); ?></td>
                     <td align="center"><?php echo getYTDACC($clientId,"Invoiced");?></td>
                     <td align="center"><?php echo getYTDCredit($clientId);?></td>
                     <td align="center"><?php echo getYTDPercent($clientId,$type,$systemMonthInDigit); ?> %</td>
                     <td align="center"><?php //echo getYTDACC($clientId,"Lead"); ?><?php //echo getYTDACC($clientId,"Proposal"); ?><?php echo getpnl($clientId); ?></td>
                     <td align="center"><?php echo getPCD($clientId,$systemMonthInDigit,$systemYearInDigit); ?></td>
                     <td align="center"><?php echo getPerformanceGap($type,$clientId,$systemMonthInDigit);?></td>
                     <td align="center"><?php echo getPipelineGap($type,$clientId,$systemMonthInDigit);?></td>
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