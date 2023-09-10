<?php include_once('commonFunction.php'); 
$userTypeForLooggedIn = $_COOKIE["user_type"];
$usernameforLoggedIn = $_COOKIE["username"];

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
background:#87AC51;
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
background: #800000;
}

</style>


<!--One_Wrap-->
 	<div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">f</span>
    <h5>Knowledge Bank</h5>
</div>
           
            
          <div class="widget_body">
                <div class="demo_jui">  
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="jqtable" width="80%" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th width="15%" align="center">Title</th>
                              <th width="24%">Description</th>
                              <th width="14%">Department</th>
                              <th width="10%">Industry Relevance</th>
                              <th width="25%">Type</th>
                              <th width="12%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
<?php
/*
CREATE TABLE `oxy2_knowledgebase` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(500) default NULL,
  `description` varchar(2000) default NULL,
  `department` varchar(500) default NULL,
  `industrialRelevance` varchar(1000) default NULL,
  `type` varchar(500) default NULL,
  `createdby` varchar(500) default NULL,
  `creatorId` varchar(40) default NULL,
  `createdOn` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;*/

$SelQuery = "SELECT * FROM oxy2_knowledgebase ORDER BY id DESC";
$SelExec = mysql_query($SelQuery);
$cntt = mysql_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysql_fetch_array($SelExec))
				{
				$i++;
				if($i % 2 == "0"){$col = "gradeA even";}
				else
				{$col = "gradeA odd";}
				
				//Client Information
				$title= $SelResult['title'];
				$lid= $SelResult['id'];
				
				$description= $SelResult['description'];
				$department =  $SelResult['department'];
				$industrialRelevance = $SelResult['industrialRelevance'];
				$type= $SelResult['type'];
				
				
				//if($dept == "B2B"){$eventDateee = $beventStartDate;$col11 = "red_highlight";}
				//else if($dept == "B2C"){$eventDateee = $ceventStartDate;$col11 = "green_highlight";}
				//else{$eventDateee = "No date";$col11 = "blue_highlight";}
				
			
				
?>                         
                            <tr class="<?php echo $col; ?>">
                                 <td align="center" style="background:none;word-wrap:break-word; "><a class="tip_north" href="#" style="color:#6C6C6C;padding:0 5px;text-decoration:none;"><b style="font-weight:bold;"><?php echo $title; ?></b></a></td>
                      <td align="center" style="word-wrap:break-word"><span ><?php echo $description; ?></span></td>
                      <td align="center"  style="word-wrap:break-word"><span class="<?php echo $col11; ?> pj_cat"><?php echo $department; ?></span></td>
                     <td align="center"  style="word-wrap:break-word"><?php echo $industrialRelevance;?></td>
                     <td align="center"  style="word-wrap:break-word"><?php echo $type; ?></td>
                     <td align="center"  style="word-wrap:break-word">
					 <span class="data_actions iconsweet">
					 <?php  if($userTypeForLooggedIn > 0 ){ 
					
					 
					 ?> 
                     
                    <a href="viewkbsupls.php?ldId=<?php echo $lid; ?>" id="gallery_box" style="text-decoration:none; font-size:18px; color:#333;">H</a>    
                    
                    <a class="tip_north" original-title="Edit" href="./?id=5&subId=5&editId=<?php echo $lid; ?> "  style="color:#6C6C6C;padding:0 2px;font-size:18px;">C</a>   
                    
                     <a href="confirmKBSDeletionPage.php?kbsId=<?php echo $lid; ?>" class="tip_north" id="gallery_box" original-title="Delete KBS" style="color:#F00;padding:0 1px;font-size:18px;">X</a>
                                  
                     <?php } ?>
                     </span>
                     </td>
                            </tr>
                            
<?php } }
				else
				{
				?>   
                
                <tr>
                  <td colspan="6" align="center" style="font-size:14px; font-weight:bold;">No record Found</td>
                       
                </tr>
                <?php } ?> 
                                            
                           
                        </tbody>
                    </table>
                    
                     
              </div>
            </div>      
            
        </div>
    </div>    