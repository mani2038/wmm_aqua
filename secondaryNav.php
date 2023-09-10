<nav id="secondary_nav"> 
<!--UserInfo-->
<dl class="user_info">
	<dt><a href="#">
    
<?php
$userIdforAction = $_COOKIE["user_id"];
$userTypeForLooggedIn = $_COOKIE["user_type"];
$usernameforLoggedIn = $_COOKIE["username"];

$SelQueryForProfile = "SELECT * FROM oxy2_uploadedimage WHERE usr_Id = '$userIdforAction' AND area = '1'";
$SelExecForProfile = mysqli_query($con,$SelQueryForProfile);
$cnttForProfile = mysqli_num_rows($SelExecForProfile);
if($cnttForProfile > 0){
				$i = 0;				
				$SelResultForProfile = mysqli_fetch_array($SelExecForProfile);
				$name = $SelResultForProfile['name'];
				?>
                	
	  <img src="phpThumb/phpThumb.php?src=../usr_thumb/<?php echo $name; ?>&amp;w=79&h=79&amp;zc=1&amp;fltr[]=ric|5|5&f=png&amp;hash=1967452c10c461eaf74689df4841c6dc" alt="" border="0" />
    			
                <?PHP 
				
} else { ?> 	
  <img src="phpThumb/phpThumb.php?src=../usr_thumb/default.png&amp;w=79&h=79&amp;fltr[]=ric|5|5&f=png&amp;hash=684ca904b219e28b814ffc160123e3ed" alt="" border="0" />
  <?php } ?>
				
  
    </a></dt>
    <dd>
    <?php if(isset($_COOKIE["name"])) { ?>
    <a class="welcome_user" href="#">Welcome,<strong><?php echo $_COOKIE["name"]; ?></strong></a>
	<?php } ?>
    <span class="log_data"><span>Employee Id : </span><span style="color:white;"><?php echo $_COOKIE["emp_id"]; ?></span></span>
    <a class="logout" href="logout.php">Logout</a>
    <!--<a class="user_messages" href="#"><span>12</span></a>-->
    </dd>
</dl>

<!--Responsive Nav-->
    <a class="res_icon" href="#"></a>
    <ul id="responsive_nav">
    	<li>
        	<a href="index-2.html">Dashboard</a>
        </li>
        <li>
        	<a href="charts.html">Sercon Lead</a>
            <ul>
            	<li><a href="charts.html">My Lead</a></li>
                <li><a href="charts_bar.html">View Clients</a></li>
                <li><a href="charts_pie.html">Search Leads</a></li>
            </ul>
        </li>
        <li>
        	<a href="forms.html">Forms</a>
            <ul>
            	<li><a href="forms.html">Form elements</a></li>
                <li><a href="editor_upload.html">WYSIWYG / Uploader</a></li>
            </ul>
        </li>
        <li>
       	 	<a href="typography.html">Typography</a>
            <ul>
            	<li><a href="typography.html">Typography</a></li>
                <li><a href="grid.html">Grid</a></li>
                
            </ul>            
        </li>
        <li>
        	<a href="ui_elements.html">UI Elements</a>
            <ul>
            	<li><a href="ui_elements.html">Miscellaneous</a></li>
                <li><a href="buttons_icons.html">Buttons & Icons</a></li>
                <li><a href="calendar.html">Calendar</a></li>
                <li><a href="data_table.html">Tables</a></li>
                <li><a href="modal_window.html">Modal Windows</a></li>
                <li><a href="gallery.html">Gallery</a></li>
            </ul>            
        </li>
        <li>
       		<a href="pages.html">pages</a>
            <ul>
            	<li><a href="offline.html">Site offline</a></li>
                <li><a href="404.html">404 page</a></li>
                <li><a href="405.html">405 page</a></li>
                <li><a href="500.html">500 page</a></li>
            </ul>              
        </li>
    </ul>
  
<!-- Making Repsonsive Navigation Active On the basis of ID -->
<?php if($id == "1"){ ?>    
<!--Responsive Nav ends-->
<h2>Dashboard</h2>
<ul>
	<li <?php if($id == "1" && $subId == "8"){echo "class=active";} ?>><a href="./?id=1&subId=8"><span class="iconsweet">a</span>Edit Profile</a></li>
    <li <?php if($id == "1" && $subId == "1"){echo "class=active";} ?>><a href="./?id=1&subId=1"><span class="iconsweet">S</span>Edit Profile Picture</a></li>
    <li <?php if($id == "1" && $subId == "2"){echo "class=active";} ?>><a href="./?id=1&subId=2"><span class="iconsweet">k</span>Change Password</a></li>
    <li <?php if($id == "1" && $subId == "3"){echo "class=active";} ?>><a href="./?id=1&subId=3"><span class="iconsweet">o</span>Team Watermark</a></li>
   
    
    
 <?php if($userTypeForLooggedIn == "1"){ ?>   
  
    <li <?php if($id == "1" && $subId == "5"){echo "class=active";} ?>><a href="./?id=1&subId=5"><span class="iconsweet">S</span>Create User</a></li>
    <li <?php if($id == "1" && $subId == "6"){echo "class=active";} ?>><a href="./?id=1&subId=6"><span class="iconsweet">S</span>Manage User</a></li>
    
     <?php  } ?>

</ul>
<?php } else if($id == "2"){ ?>

<!--Responsive Nav ends--><h2>Watermark Lead</h2>
<ul>
	<li <?php if($id == "2" && $subId == "" || $id == "2" && $subId == "14"){echo "class=active";} ?>><a href="./?id=2&subId=14"><span class="iconsweet">v</span>My Leads</a></li>
    <li <?php if($id == "2" && $subId == "9"){echo "class=active";} ?>><a href="./?id=2&subId=9"><span class="iconsweet">v</span>Create New Leads</a></li>
<?php if($userTypeForLooggedIn == "1" || $userTypeForLooggedIn == "3" || $userTypeForLooggedIn == "6") { ?>   
  <li <?php if($id == "2" && $subId == "11"){echo "class=active";} ?>><a href="./?id=2&subId=11"><span class="iconsweet">&</span>Manage Leads</a></li>

   
    
    <li <?php if($id == "2" && $subId == "4"){echo "class=active";} ?>><a href="./?id=2&subId=4"><span class="iconsweet">O</span>Add New Client</a></li>
    <li <?php if($id == "2" && $subId == "3"){echo "class=active";} ?>><a href="./?id=2&subId=3"><span class="iconsweet">O</span>View Clients</a></li>
    <!--<li <?php if($id == "2" && $subId == "1"){echo "class=active";} ?>><a href="./?id=2&subId=1"><span class="iconsweet">R</span>Event Calendar</a></li> -->
    <li <?php if($id == "2" && $subId == "16"){echo "class=active";} ?>><a href="./?id=2&subId=16&type=r"><span class="iconsweet">O</span>Targets & Ach(R)</a></li> 
     <li <?php if($id == "2" && $subId == "25"){echo "class=active";} ?>><a href="./?id=2&subId=25"><span class="iconsweet">O</span>Manage PNL</a></li> 
    
        <!--<li <?php if($id == "2" && $subId == "19"){echo "class=active";} ?>><a href="./?id=2&subId=19"><span class="iconsweet">O</span>PCA Calculator</a></li> 
-->
<?php if($usernameforLoggedIn == "imanish.yadav@gmail") { ?>    

        <li <?php if($id == "2" && $subId == "20"){echo "class=active";} ?>><a href="./?id=2&subId=20"><span class="iconsweet">O</span>Lead RD</a><span style="font-weight:bold; color:#f84c61; font-size:14px; padding-left:2px;">[ <?php echo getTotalleadLD(); ?> ]</span></li> 
        
        <li <?php if($id == "2" && $subId == "21"){echo "class=active";} ?>><a href="./?id=2&subId=21"><span class="iconsweet">O</span>Deleted Lead's</a><span style="font-weight:bold; color:#f84c61; font-size:14px; padding-left:2px;">[ <?php echo getTotalleadDeleted(); ?> ]</span></li> 
        
       


<?php } ?>


<?php }
else 
	{
	
	 $getCombinedFunctionResult = getCombinedResultForLoggedInUser($userIdforAction);
	 if(!empty($getCombinedFunctionResult)){	
	?>

        <li <?php if($id == "2" && $subId == "17"){echo "class=active";} ?>><a href="./?id=2&subId=17&type=r"><span class="iconsweet">O</span>Targets & Ach(R)</a></li> 
<?php 
	}
} ?>
 <!--<li <?php if($id == "2" && $subId == "24"){echo "class=active";} ?>><a href="./?id=2&subId=24"><span class="iconsweet">&</span> Archieve 2013</a><span style="font-weight:bold; color:#f84c61; font-size:14px; padding-left:2px;">[ <?php echo getTotalArchieveLead(); ?> ]</span></li>-->
</ul>


<?php } else if($id == "12"){ ?>

<!--Responsive Nav ends--><h2>Retail Lead</h2>
<ul>
	<li <?php if($id == "12" && $subId == "" || $id == "12" && $subId == "14"){echo "class=active";} ?>><a href="./?id=12&subId=14"><span class="iconsweet">v</span>My Leads</a></li>
    <li <?php if($id == "12" && $subId == "9"){echo "class=active";} ?>><a href="./?id=12&subId=9"><span class="iconsweet">v</span>Create New Leads</a></li>
    <li <?php if($id == "12" && $subId == "11"){echo "class=active";} ?>><a href="./?id=12&subId=11"><span class="iconsweet">&</span>Manage Leads</a></li>

<?php if($userTypeForLooggedIn == "1" || $userTypeForLooggedIn == "3" || $userTypeForLooggedIn == "6") { ?>    
    
    <li <?php if($id == "12" && $subId == "4"){echo "class=active";} ?>><a href="./?id=12&subId=4"><span class="iconsweet">O</span>Add New Client</a></li>
    <li <?php if($id == "12" && $subId == "3"){echo "class=active";} ?>><a href="./?id=12&subId=3"><span class="iconsweet">O</span>View Clients</a></li>
    <li <?php if($id == "12" && $subId == "1"){echo "class=active";} ?>><a href="./?id=12&subId=1"><span class="iconsweet">R</span>Event Calendar</a></li>
    <li <?php if($id == "12" && $subId == "16"){echo "class=active";} ?>><a href="./?id=12&subId=16&type=r"><span class="iconsweet">O</span>Targets & Ach(R)</a></li> 
     <!--<li <?php if($id == "12" && $subId == "25"){echo "class=active";} ?>><a href="./?id=12&subId=25"><span class="iconsweet">O</span>Manage PNL</a></li> -->
    
        <!--<li <?php if($id == "2" && $subId == "19"){echo "class=active";} ?>><a href="./?id=2&subId=19"><span class="iconsweet">O</span>PCA Calculator</a></li> 
-->
<?php if($usernameforLoggedIn == "Amit.Kr@batessercon.com" || $usernameforLoggedIn == "rajesh.ghatge@batessercon.com") { ?>    

        <li <?php if($id == "12" && $subId == "20"){echo "class=active";} ?>><a href="./?id=12&subId=20"><span class="iconsweet">O</span>Lead RD</a><span style="font-weight:bold; color:#f84c61; font-size:14px; padding-left:2px;">[ <?php echo getTotalleadLD(); ?> ]</span></li> 
        
        <li <?php if($id == "12" && $subId == "21"){echo "class=active";} ?>><a href="./?id=12&subId=21"><span class="iconsweet">O</span>Deleted Lead's</a><span style="font-weight:bold; color:#f84c61; font-size:14px; padding-left:2px;">[ <?php echo getTotalleadDeleted(); ?> ]</span></li> 
        
       


<?php } ?>


<?php }
else 
	{
	
	 $getCombinedFunctionResult = getCombinedResultForLoggedInUser($userIdforAction);
	 if(!empty($getCombinedFunctionResult)){	
	?>

        <li <?php if($id == "2" && $subId == "17"){echo "class=active";} ?>><a href="./?id=12&subId=17&type=r"><span class="iconsweet">O</span>Targets & Ach(R)</a></li> 
<?php 
	}
} ?>
 
</ul>


<?php } else if($id == "3"){ ?>

<!--Responsive Nav ends--><h2>Actionchart</h2>
<ul>
	<li <?php if($id == "3" && $subId == "" || $id == "3" && $subId == "1"){echo "class=active";} ?>><a href="./?id=3&subId=1"><span class="iconsweet">C</span>My Actionchart</a></li>
        <li <?php if($id == "3" && $subId == "2"){echo "class=active";} ?>><a href="./?id=3&subId=2" target="_blank"><span class="iconsweet">I</span>Create an Actionchart</a></li>
    <li <?php if($id == "3" && $subId == "3"){echo "class=active";} ?>><a href="./?id=3&subId=3"><span class="iconsweet">I</span>Manage Actionchart </span></a></li>
    
    <?php if($usernameforLoggedIn == "imanish.yadav@gmail.com") { ?>    

        <li <?php if($id == "3" && $subId == "10"){echo "class=active";} ?>><a href="./?id=3&subId=10"><span class="iconsweet">O</span>Action RD</a><span style="font-weight:bold; color:#f84c61; font-size:14px; padding-left:2px;">[ <?php echo getTotalActionLD(); ?> ]</span></li> 
        
        <li <?php if($id == "3" && $subId == "11"){echo "class=active";} ?>><a href="./?id=3&subId=11"><span class="iconsweet">O</span>Deleted Action's</a><span style="font-weight:bold; color:#f84c61; font-size:14px; padding-left:2px;">[ <?php echo getTotalActionDeleted(); ?> ]</span></li> 


<?php } ?>
    
 <!--<li <?php if($id == "3" && $subId == "13"){echo "class=active";} ?>><a href="./?id=3&subId=13"><span class="iconsweet">&</span> Archieve 2013</a><span style="font-weight:bold; color:#f84c61; font-size:14px; padding-left:2px;">[ <?php echo getTotalArchieveAction(); ?> ]</span></li>
    -->
</ul>


<?php } else if($id == "13"){ ?>

<!--Responsive Nav ends--><h2>Training Module</h2>
<ul>

<li <?php if($id == "13"){echo "class=active";} ?>><a href="./?id=13"><span class="iconsweet">}</span>Create Training Session</a></li>

<li <?php if($id == "13"){echo "class=active";} ?>><a href="./?id=13&subId=3"><span class="iconsweet">}</span>Manage Training Session</a></li>


</ul>


<?php } else if($id == "4"){ ?>

<!--Responsive Nav ends--><h2>HR Zone</h2>
<ul>

<li <?php if($id == "4"){echo "class=active";} ?>><a href="./?id=4"><span class="iconsweet">}</span>Holiday List</a></li>
<!--<li <?php if($id == "4" && $subId == "2"){echo "class=active";} ?>><a href="./?id=4&subId=2"><span class="iconsweet">I</span>Sercon Policy</a></li>-->
</ul>

<?php } else if($id == "5"){ ?>

<!--Responsive Nav ends--><h2>Knowledge Bank</h2>
<ul>
     <li <?php if($id == "5" && $subId == "" || $id == "5" && $subId == "1"){echo "class=active";} ?>><a href="./?id=5&subId=1"><span class="iconsweet">\</span>Search KB</a></li>
     
     <li <?php if($id == "5" && $subId == "2"){echo "class=active";} ?>><a href="./?id=5&subId=2"><span class="iconsweet">\</span>Add KB</a></li>
     <?php if($userTypeForLooggedIn == "1" || $userTypeForLooggedIn == "3" || $usernameforLoggedIn == "neha.kawatra@batessercon.com") { ?> 
     
     <li <?php if($id == "5" && $subId == "3"){echo "class=active";} ?>><a href="./?id=5&subId=3"><span class="iconsweet">\</span>Manage KB</a></li>            
     
     <?php } ?>
</ul>

<?php } else { ?>

<!--Responsive Nav ends--><h2>Help</h2>
            <ul>
                 <li <?php if($id == "6" && $subId == "" || $id == "6" && $subId == "5"){echo "class=active";} ?>><a href="./?id=6&subId=4"><span class="iconsweet">o</span>Demo</a></li>
				<?php if($userTypeForLooggedIn == "1" || $userTypeForLooggedIn == "3" || $userTypeForLooggedIn == "15") { ?> 
                
                <li <?php if($id == "6" && $subId == "1"){echo "class=active";} ?>><a href="./?id=6&subId=1"><span class="iconsweet">\</span>Manage Category</a></li>
                <li <?php if($id == "6" && $subId == "2"){echo "class=active";} ?>><a href="./?id=6&subId=2"><span class="iconsweet">D</span>Manage Item</a></li>
                <li <?php if($id == "6" && $subId == "3"){echo "class=active";} ?>><a href="./?id=6&subId=3"><span class="iconsweet">n</span>Add Vendor</a></li>
                <li <?php if($id == "6" && $subId == "4"){echo "class=active";} ?>><a href="./?id=6&subId=4"><span class="iconsweet">o</span>Manage Vendor</a></li>
                <li <?php if($id == "6" && $subId == "9"){echo "class=active";} ?>><a href="./?id=6&subId=9"><span class="iconsweet">o</span>Manage PO</a></li>
                <?php } ?>
               
            </ul>

<?php } ?>

</nav>