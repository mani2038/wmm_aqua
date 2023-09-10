<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
 

  <script src="facebox/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'facebox/loading.gif',
        closeImage   : 'facebox/closelabel.png'
      })
    })
  </script>
  <style>
  #facebox .content {
      width:700px;
    }
  </style>

<!--One_Wrap-->
            <div class="one_wrap">
            	<!--Gallery Sortable--> 
                <div class="widget">
                    <div class="widget_title"><span class="iconsweet">3</span><h5>Team Watermark</h5></div>
                    <div class="widget_body">
                    <ul class="filter_project">
                    	<li class="segment  selected"><a class="all" href="#">All <span class="count"><?php echo getbranchcountall(); ?></span></a></li>
                        <li class="segment"><a class="Bangalore" href="#">Bangalore<span class="count"><?php echo getbranchcount('Bangalore'); ?></span></a></li>
						
						<li class="segment"><a class="delhi" href="#">Delhi<span class="count"><?php echo getbranchcount('New Delhi'); ?></span></a></li>
                        <li class="segment"><a class="mumbai" href="#">Mumbai<span class="count"><?php echo getbranchcount('Mumbai'); ?></span></a></li>
                         <li class="segment"><a class="Hyderabad" href="#">Hyderabad<span class="count"><?php echo getbranchcount('Hyderabad'); ?></span></a></li>
                          
                           <li class="segment"><a class="Singapore" href="#">Singapore<span class="count"><?php echo getbranchcount('Singapore'); ?></span></a></li>
                     </ul>
						<div class="gallery_container">
                        	<ul class="project_list">
							
							
<?php


$SelQuery = "SELECT * FROM `oxy2_uploadedimage` WHERE usr_id in (SELECT user_id FROM `oxy2_users` WHERE branch='Bangalore' and status='1') ORDER BY usr_Id asc";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				
				$fname= $SelResult['usr_Id'];
					
				$name= $SelResult['name'];		
				
				$userIdValue= $SelResult['usr_Id'];	
?>                
<li data-id="id-<?php echo rand(100, 2000); ?>" data-type="Bangalore">
                                  <a id="gallery_box" href="usr_thumb/<?php echo $name; ?>" title="<?php echo getempetails($fname); ?>">
                                  <img src="phpThumb/phpThumb.php?src=../usr_thumb/<?php echo $name; ?>&amp;w=134&h=104&f=png&amp;zc=1&amp;fltr[]=ric|2|2&amp;hash=c7631108aff3a3f9ee8fff71f88ba506" alt="" />
                                  </a>
                                  <span class="name"><?php echo generateString(14,getempetails($fname)); ?></span>
                                  <div class="modify_image"><a href="userFeature.php?userId=<?php echo $userIdValue; ?>" id="gallery_box" class="iconsweet">a</a>
                                  <a href="#" class="iconsweet tip_north" title="Delete"></a></div>                                   
                              </li>         

                      
<?php $k++; } }
				else
				{
				?>   
                <?php } ?>   
							

<?php
$k = 1;

$SelQuery = "SELECT * FROM `oxy2_uploadedimage` WHERE usr_id in (SELECT user_id FROM `oxy2_users` WHERE branch='New Delhi' and status='1') ORDER BY usr_Id asc";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				
				$fname= $SelResult['usr_Id'];
					
				$name= $SelResult['name'];	
				
				$userIdValue= $SelResult['usr_Id'];	
				
				
				
?>                
<li data-id="id-<?php echo rand(100, 2000); ?>" data-type="delhi">
                                  <a id="gallery_box" href="usr_thumb/<?php echo $name; ?>" title="<?php echo getempetails($fname); ?>">
                                  <img src="phpThumb/phpThumb.php?src=../usr_thumb/<?php echo $name; ?>&amp;w=134&h=104&f=png&amp;zc=1&amp;fltr[]=ric|2|2&amp;hash=c7631108aff3a3f9ee8fff71f88ba506" alt="" />
                                  </a>
                                  <span class="name"><a href="userFeature.php?userId=<?php echo $userIdValue; ?>" id="gallery_box"><?php echo generateString(14,getempetails($fname)); ?></a></span>
                                  <div class="modify_image"><a href="userFeature.php?userId=<?php echo $userIdValue; ?>" id="gallery_box" class="iconsweet">a</a> 
                                  <a href="#" class="iconsweet tip_north" title="Delete"></a></div>                                   
                              </li>         

                      
<?php $k++; } }
				else
				{
				?>   
                <?php } ?> 



 <?php


$SelQuery = "SELECT * FROM `oxy2_uploadedimage` WHERE usr_id in (SELECT user_id FROM `oxy2_users` WHERE branch='Mumbai' and status='1') ORDER BY usr_Id asc";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				
				$fname= $SelResult['usr_Id'];
					
				$name= $SelResult['name'];		
				
				$userIdValue= $SelResult['usr_Id'];	
?>                
<li data-id="id-<?php echo rand(100, 2000); ?>" data-type="mumbai">
                                  <a id="gallery_box" href="usr_thumb/<?php echo $name; ?>" title="<?php echo getempetails($fname); ?>">
                                  <img src="phpThumb/phpThumb.php?src=../usr_thumb/<?php echo $name; ?>&amp;w=134&h=104&f=png&amp;zc=1&amp;fltr[]=ric|2|2&amp;hash=c7631108aff3a3f9ee8fff71f88ba506" alt="" />
                                  </a>
                                  <span class="name"><?php echo generateString(14,getempetails($fname)); ?></span>
                                  <div class="modify_image"><a href="userFeature.php?userId=<?php echo $userIdValue; ?>" id="gallery_box" class="iconsweet">a</a>
                                  <a href="#" class="iconsweet tip_north" title="Delete"></a></div>                                   
                              </li>         

                      
<?php $k++; } }
				else
				{
				?>   
                <?php } ?>   
      
      
       <?php


$SelQuery = "SELECT * FROM `oxy2_uploadedimage` WHERE usr_id in (SELECT user_id FROM `oxy2_users` WHERE branch='Hyderabad' and status='1') ORDER BY usr_Id asc";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				
				$fname= $SelResult['usr_Id'];
					
				$name= $SelResult['name'];	
				
				$userIdValue= $SelResult['usr_Id'];	
?>                
<li data-id="id-<?php echo rand(100, 2000); ?>" data-type="Hyderabad">
                                  <a id="gallery_box" href="usr_thumb/<?php echo $name; ?>" title="<?php echo getempetails($fname); ?>">
                                  <img src="phpThumb/phpThumb.php?src=../usr_thumb/<?php echo $name; ?>&amp;w=134&h=104&f=png&amp;zc=1&amp;fltr[]=ric|2|2&amp;hash=c7631108aff3a3f9ee8fff71f88ba506" alt="" />
                                  </a>
                                  <span class="name"><?php echo generateString(14,getempetails($fname)); ?></span>
                                  <div class="modify_image"><a href="userFeature.php?userId=<?php echo $userIdValue; ?>" id="gallery_box" class="iconsweet">a</a>
                                  <a href="#" class="iconsweet tip_north" title="Delete"></a></div>                                   
                              </li>         

                      
<?php $k++; } }
				else
				{
				?>   
                <?php } ?>                                                                     



 



<?php


$SelQuery = "SELECT * FROM `oxy2_uploadedimage` WHERE usr_id in (SELECT user_id FROM `oxy2_users` WHERE branch='Singapore' and status='1') ORDER BY usr_Id asc";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				
				$fname= $SelResult['usr_Id'];
					
				$name= $SelResult['name'];	
				
				$userIdValue= $SelResult['usr_Id'];	
?>                
<li data-id="id-<?php echo rand(100, 2000); ?>" data-type="Singapore">
                                  <a id="gallery_box" href="usr_thumb/<?php echo $name; ?>" title="<?php echo getempetails($fname); ?>">
                                  <img src="phpThumb/phpThumb.php?src=../usr_thumb/<?php echo $name; ?>&amp;w=134&h=104&f=png&amp;zc=1&amp;fltr[]=ric|2|2&amp;hash=c7631108aff3a3f9ee8fff71f88ba506" alt="" />
                                  </a>
                                  <span class="name"><?php echo generateString(14,getempetails($fname)); ?></span>
                                  <div class="modify_image"><a href="userFeature.php?userId=<?php echo $userIdValue; ?>" id="gallery_box" class="iconsweet">a</a>
                                  <a href="#" class="iconsweet tip_north" title="Delete"></a></div>                                   
                              </li>         

                      
<?php $k++; } }
				else
				{
				?>   
                <?php } ?>   








                            </ul>


                        </div>
               		</div>
            	</div>                         
                                     
            </div>                  
            <br class="clear" />