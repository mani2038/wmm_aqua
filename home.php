<!--One_TWO-->
<script type="text/javascript">

        function drawcharts() {

            var data1 = google.visualization.arrayToDataTable(
                    [
                        ['Department', 'Lead', 'Execution', 'Invoice'],
          ['B2C',  1000,      400,100],
          ['B2B',  1170,      460,100],
          ['Digital',  660,       1120,100],
                    ]);

            var options1 = {
                title:'Stagewise Achionchart',
                hAxis:{title:'Department', titleTextStyle:{color:'black'}},
                vAxis:{title:'Stage', titleTextStyle:{color:'black'}}
            };

            var data2 = google.visualization.arrayToDataTable(
                    [
                        ['Department', 'Green', 'Yellow', 'Red'],
          ['B2C',  1000,      400,100],
          ['B2B',  1170,      460,100],
          ['Digital',  660,       1120,100],
                    ]);

            var options2 = {
                title:'Statuswise Actionchart',
				colors: ['Green', 'Yellow', 'Red'],
                hAxis:{title:'Department', titleTextStyle:{color:'black'}},
                vAxis:{title:'Status', titleTextStyle:{color:'black'}}
            };

            var chartA = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chartA.draw(data1, options1);

            var chartB = new google.visualization.ColumnChart(document.getElementById('chart_divs'));
            chartB.draw(data2, options2);
        }

        google.setOnLoadCallback(drawcharts);
        google.load("visualization", "1", {packages:["corechart"]});

    </script>
 <script type="text/javascript" src="jwplayer/jwplayer.js"></script>   
    <div class="one_wrap fl_left">
                <!--<div class="widget">
                    <div class="widget_title"><span class="iconsweet">8</span>
                        <h5></h5>
                    </div>
                    <div class="widget_body">
                        <div class="content_pad">
                        	
                             <div style="width: 100%; height: 330px;" align="center">
                            <h3>Water Mark</h3>
                           <div id="container" >Loading the player ...</div><br />

                           <a href="http://www.pulsesuite.com/oxygen/demo2.php" target="_blank">Click here</a> to view Slide Show
<script type="text/javascript">
    jwplayer("container").setup({
        file: "bateschi_sercon_creds_lite_1.mp4",
        height: 270,
        autostart: false,
		title: "Bates CHI & Sercon Creds",
		primary: "flash",
		stretching: "exactfit",
        width: 480
    });
</script>
</div>                            
                        </div>
                    </div>
                </div> -->
            </div>
 	
	<!--One_TWO-->
 	   
	<!--One_Wrap-->
 	<div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">)</span>
        	<h5>Projects</h5></div>
            <div class="widget_body">
            	<div class="project_sort">
                	<ul class="filter_project">
                    	<li class="segment  selected"><a class="all" href="#">All <span class="count"><?php echo get2leadall(); ?></span></a></li>
                        <li class="segment"><a class="B2B" href="#">B2B<span class="count"><?php echo get2lead("B2B"); ?></span></a></li>
                        <li class="segment"><a class="B2C" href="#">B2C<span class="count"><?php echo get2lead("B2C"); ?></span></a></li>
                        <li class="segment"><a class="Digital" href="#">Digital<span class="count"><?php echo get2lead("Digital"); ?></span></a></li>
                     </ul>
                     <ul class="project_list">
                     
                     
                       <?php

$k = 1;

$SelQuery = "SELECT * FROM `oxy2_lead` WHERE dept='B2C' ORDER BY leadno desc";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				
				$fname= $SelResult['creatorid'];
					
				$name= $SelResult['companyname'];
				$leadno= $SelResult['leadno'];
				$dept= $SelResult['dept'];
?>             
                        <li data-id="id-<?php echo rand(100, 2000); ?>" data-type="B2C">
                        	<span class="project_badge grey iconsweet">
                            6
                            </span>
                          <!--  <a href="./?id=2&subId=13&ldnumber=<?php echo $leadno; ?>&dep=<?php echo $dept;?>" class="project_title" target="_blank"> -->
                            	<?php echo generateString(14,getClientDetails($name)); ?><br><span style=" font-size:12px"><?php echo $leadno; ?>/<?php echo $dept;?></span>
                            <!-- </a> -->
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span><?php echo getempfname($fname); ?>
                            </a>                        
                        </li>
                        <?php $k++; } }
				else
				{
				?>   
                <?php } ?> 
                     
                     
                     
                     <?php


$SelQuery = "SELECT * FROM `oxy2_lead` WHERE dept='B2B' ORDER BY leadno desc";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				
				$fname= $SelResult['creatorid'];
					
				$name= $SelResult['companyname'];
				$leadno= $SelResult['leadno'];
				$dept= $SelResult['dept'];
?>             
                        <li data-id="id-<?php echo rand(100, 2000); ?>" data-type="B2B">
                        	<span class="project_badge red iconsweet">
                            Q
                            </span>
                            <!-- <a href="./?id=2&subId=13&ldnumber=<?php echo $leadno; ?>&dep=<?php echo $dept;?>" class="project_title" target="_blank"> -->
                            	<?php echo generateString(14,getClientDetails($name)); ?><br><span style=" font-size:12px"><?php echo $leadno; ?>/<?php echo $dept;?></span>
                           <!--  </a> -->
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span><?php echo getempfname($fname); ?>
                            </a>                        
                        </li>
                        <?php $k++; } }
				else
				{
				?>   
                <?php } ?> 
              
                
                <?php


$SelQuery = "SELECT * FROM `oxy2_lead` WHERE dept='Digital' ORDER BY leadno desc";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				
				$fname= $SelResult['creatorid'];
					
				$name= $SelResult['companyname'];
				$leadno= $SelResult['leadno'];
				$dept= $SelResult['dept'];
?>             
                        <li data-id="id-<?php echo rand(100, 2000); ?>" data-type="Digital">
                        	<span class="project_badge blue iconsweet">"</span>
                            <!-- <a href="./?id=2&subId=13&ldnumber=<?php echo $leadno; ?>&dep=<?php echo $dept;?>" class="project_title" target="_blank"> --><?php echo generateString(14,getClientDetails($name)); ?><br><span style=" font-size:12px"><?php echo $leadno; ?>/<?php echo $dept;?></span>
                            <!-- </a> -->
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span><?php echo getempfname($fname); ?>
                            </a>                        
                        </li>
                        <?php $k++; } }
				else
				{
				?>   
                <?php } ?> 
                
                        <!--<li data-id="id-2" data-type="incomplete">
                        	<span class="project_badge red iconsweet">
                            4
                            </span>
                            <a href="#" class="project_title">
                            	NIKE <br />
                                Freeworld
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Paul
                            </a>                        
                        </li>
                        <li data-id="id-3" data-type="Resolved">
                        	<span class="project_badge blue iconsweet">
                            (
                            </span>
                            <a href="#" class="project_title">
                            	Wacom <br />
                                BBC
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Omar [SA]
                            </a>                        
                        </li>  
                        <li data-id="id-4" data-type="incomplete">
                        	<span class="project_badge grey iconsweet">
                            8
                            </span>
                            <a href="#" class="project_title">
                            	j&D <br />
                                Appstorm
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Carla
                            </a>                        
                        </li>        
                        <li data-id="id-5" data-type="incomplete">
                        	<span class="project_badge red iconsweet">
                            4
                            </span>
                            <a href="#" class="project_title">
                            	NIKE <br />
                                Freeworld
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Paul
                            </a>                        
                        </li>
                        <li data-id="id-6" data-type="incomplete">
                        	<span class="project_badge red iconsweet">
                            4
                            </span>
                            <a href="#" class="project_title">
                            	NIKE <br />
                                Freeworld
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Paul
                            </a>                        
                        </li>
                        <li data-id="id-7" data-type="Resolved">
                        	<span class="project_badge blue iconsweet">
                            (
                            </span>
                            <a href="#" class="project_title">
                            	Wacom <br />
                                Raje
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Omar [SA]
                            </a>                        
                        </li>  
                        <li data-id="id-8" data-type="Resolved">
                        	<span class="project_badge blue iconsweet">
                            (
                            </span>
                            <a href="#" class="project_title">
                            	Wacom <br />
                                iCAN
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Omar [SA]
                            </a>                        
                        </li> 
                        <li data-id="id-7" data-type="incomplete">
                        	<span class="project_badge blue iconsweet">
                            (
                            </span>
                            <a href="#" class="project_title">
                            	Wacom <br />
                                BBC
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Omar [SA]
                            </a>                        
                        </li>  
                        <li data-id="id-8" data-type="Resolved">
                        	<span class="project_badge blue iconsweet">
                            (
                            </span>
                            <a href="#" class="project_title">
                            	Wacom <br />
                                MAZE
                            </a>
                            <a href="#" class="assigned_user">
                            	<span class="iconsweet">a</span>Omar [SA]
                            </a>                        
                        </li>                                                                 
                                                                                     -->   
                     </ul>
                </div>
            </div>
        </div>
    </div>     
	<!--One_Wrap-->
 
    
    <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span><h5>View Action Chart</h5></div>
            <div class="widget_body">
            	
                 
                
                
            </div>
            
          <div class="widget_body">
                <div class="demo_jui">  
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="jqtable">
                        <thead>
                            <tr>
                                <th width="49" align="left">Lead's </th>
                              <th width="85">Campaign <br/>(Client)</th>
                              <th width="95">Event Date</th>
                                <th width="77">Venue/City</th>
                                <th width="50">Stage</th>
                                <th width="49">Status</th>
                                <th width="98">Updated By</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php
$userIdforAction = $_COOKIE["user_id"];
$SelQuery = "SELECT * FROM oxy2_action ORDER BY id DESC";
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
				
				$stage= $SelResult['stage'];
					
				$status= $SelResult['status'];
				
				if($status == "red"){$col1 = "red_highlight";}
				elseif($status == "yellow"){$col1 = "yellow_highlight";}
				else{$col1 = "green_highlight";}
				
				$actionChartId= $SelResult['id'];
				
				$leadNum= $SelResult['leadNum'];
				$department= $SelResult['department'];
				
				$completeLeadNumber= $department."/".$leadNum;
				
				$campaignName= $SelResult['campaignName'];
				$clientName= $SelResult['clientName'];
							
				$venue= $SelResult['venue'];
				$city= $SelResult['city'];
				
				$keyactId= $SelResult['keyact'];
				$getClientName = getClientDetails($keyactId);
				
				$eventDate= $SelResult['eventDate'];
				
				$progress= $SelResult['progress'];
				
				$updatedBy= $SelResult['updatedBy'];
				
				$updatedOn= $SelResult['updatedOn'];
				
				
					
				
				
?>                         
                            <tr class="<?php echo $col; ?>">
                                 <td align="left" style="background:none;"><a class="tip_north" original-title="<?php echo $progress; ?>" href="#" style="color:#6C6C6C;padding:0 5px;"><b style="font-weight:bold;"><?php echo $completeLeadNumber; ?></b></a></td>
                      <td align="center"><span ><?php echo $campaignName."<br/>(".$clientName.")"; ?></span></td>
                      <td align="center"><?php echo $eventDate; ?></td>
                      <td align="center"><?php echo $venue."/".$city; ?></td>
                      <td align="center"><span class="grey_highlight pj_cat"><?php echo $stage; ?></span></td>
                      <td align="center"><span class="<?php echo $col1; ?> pj_cat"><?php echo $status; ?></span></td>
                        <td align="center"><?php echo $updatedBy."<br/>(".$updatedOn.")"; ?></td>
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
    
  