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
        	<div class="widget_title"><span class="iconsweet">3</span>
    <h5>Media Gallery</h5>
</div>
 <div class="widget_body">
                <div class="demo_jui">  
                <?php
include_once('inc_connection.php');

$uploadId = $_REQUEST['pid'];


$getUploadeddDetails = getUploadeddDetails($uploadId);

$eventId = $getUploadeddDetails['1'];

$getKnowledgeBaseDetails = getKnowledgeBaseDetails($eventId);




?>  
                
                
            <br />
  <script type='text/javascript' src='jwplayer.js'></script>

<table width="100%" border="0" cellspacing="1" cellpadding="1" style="vertical-align:top;">
  <tr>
    <td>
    
    <table width="80%" border="0" align="center" cellpadding="4" cellspacing="4">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="94%"><div id='mediaplayer'></div></td>
    <td width="2%">&nbsp;</td>
  </tr>
</table>
    
    </td>
    <td valign="top">
    
    
    <table border="0" cellspacing="2" cellpadding="2" style="font-family: 'CorbelRegular';">
   <tr>
    <td width="25%" valign="top"><span style="color:#333;font-size:13px;font-wight:bold;">Title : </span><br/>
    <span style="color:#666;"><?php echo $getKnowledgeBaseDetails['1']; ?></span> 
    </td>
  </tr>
  
  <tr>
    <td><br/> 
    </td>
  </tr>

  <tr>
    <td width="25%" valign="top"><span style="color:#333;font-size:13px;font-wight:bold;">Description : </span><br/>
    <span style="color:#666;"><?php echo $getKnowledgeBaseDetails['2']; ?></span> 
    </td>
  </tr>
    
  
</table>

    </td>

  </tr>
</table>
    
    
   
    
    </td>
  </tr>
</table>




<script type="text/javascript">
    jwplayer("mediaplayer").setup({
		controlbar: { enable:true, position: 'bottom'},						  
        file: "usr_chart_op/<?php echo $getUploadeddDetails['2']; ?>",
        image: "images/black_BCHI_SERCON.png"
    });
</script>           
<br />
<br />
<br />
<br />

                    
                     
              </div>
            </div>      
            
        </div>
    </div>    