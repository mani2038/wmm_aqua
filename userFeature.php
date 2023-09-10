<?php
include_once('commonFunction.php');
include_once('inc_connection.php');

$user = $_REQUEST['userId'];
$userDetails = getUserListDetails($user);



?><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}


#fancybox-outer {
position: relative;
width: 100%;
height: 100%;
background:#000000;
border: 11px solid #000000;
border-radius: 13px;

}
#fancybox-content {
border:none;
}
-->
</style>
    
  <div style="width:600px; height:400px;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#fff; text-align:justify;padding:3px;">  
    
<table width="600" border="0" cellspacing="4" cellpadding="4" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#fff; text-align:justify;padding:3px;">

 
  <tr>
    <td width="104" align="center" valign="top"> <img src="phpThumb/phpThumb.php?src=../usr_thumb/<?php echo getprofilepic($user); ?>&amp;w=160&h=144&f=png&amp;zc=1&amp;fltr[]=ric|5|5&amp;hash=c7631108aff3a3f9ee8fff71f88ba506" alt="" hspace="15" vspace="10" style="vertical-align:top;" /></td>
    <td width="22" align="center" valign="top">&nbsp;</td>
    <td width="434" valign="top">
    
    <table width="100%" border="0" cellspacing="3" cellpadding="4">
  <tr>
    <td><span style="font-size:14px; font-weight:bold;">Name :</span> <?php echo $userDetails['4']." ".$userDetails['5'];?></td>
    </tr>
    <tr><td><br/></td></tr>
    
  <tr>
    <td><span style="font-size:14px; font-weight:bold;">Title :</span> <?php echo $userDetails['9']; ?></td>
    </tr>
    <tr><td><br/></td></tr>
  <tr>
    <td><span style="font-size:14px; font-weight:bold;">Office :</span> <?php echo $userDetails['21']; ?></td>
    </tr>
    <tr><td><br/></td></tr>
  <tr>
    <td><span style="font-size:14px; font-weight:bold;">Joined :</span> <?php echo $userDetails['7']; ?></td>
    </tr>
    <tr><td><br/></td></tr>
    
    <tr>
    <td><span style="font-size:14px; font-weight:bold;">Client Experience :</span> <?php echo $userDetails['22']; ?></td>
    </tr>

 
</table>

    
    
    </td>
  </tr>
</table>
<br/>

<div style="color:white;"><span style="font-size:14px; font-weight:bold;">Category Expertise : </span><?php echo $userDetails['23']; ?></div>
  <br/>
  <?php if($userDetails['24'] == "N/A" || $userDetails['24'] == ""){ }
  else 
  {
  ?>
<div style="color:white;"><span style="font-size:14px; font-weight:bold;">Best Work :</span> <?php echo $userDetails['24']; ?></div>
<?php } ?>

<br/>
<div style="color:white;"><span style="font-size:14px; font-weight:bold;">Bio : </span><?php echo $userDetails['25']; ?></div>

<br/>
<div style="color:white;"><span style="font-size:14px; font-weight:bold;">Personal Statement : </span><?php echo $userDetails['26']; ?></div>
  
  </div>

 <!-- <tr>
    <td colspan="3"><span style="font-size:14px; font-weight:bold;">Category Expertise : </span><?php echo $userDetails['23']; ?></td>
  </tr>
  <tr>
    <td colspan="3"><span style="font-size:14px; font-weight:bold;">Best Work :</span> <?php echo $userDetails['24']; ?></td>
  </tr>
  <tr>
    <td colspan="3"><span style="font-size:14px; font-weight:bold;">Bio : </span><?php echo $userDetails['25']; ?></td>
  </tr>
  <tr>
    <td colspan="3"><span style="font-size:14px; font-weight:bold;">Personal Statement : </span><?php echo $userDetails['26']; ?></td>
  </tr>
  -->




        

        


        

        

  