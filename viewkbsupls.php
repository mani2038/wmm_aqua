<?php
include("include/include_sessions.php");
include_once('commonFunction.php');
include_once('inc_connection.php');

$ldId = $_REQUEST['ldId'];
$LeadListDetails = getLeadListDetails($ldId);
$leadNumber = $LeadListDetails['0'];

?>
<script src="jquery.min.js" type="text/javascript"></script>
<script src="fivefy/jquery.uploadifive.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="fivefy/uploadifive.css"> 
<!-- Jquery Calender Script -->

<style type="text/css">
.uploadifive-button {
	float: left;
	margin-right: 10px;
}
#queue {
	border: 1px solid #E5E5E5;
	height: 65px;
	overflow: auto;
	margin-bottom: 10px;
	padding: 0 3px 3px;
	width: 450px;
}
</style>	
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

#fancybox-outer{
border:6px solid black;
border-radius:4px;
}

-->
</style>
    
  <div style="width:500px; height:100%;font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">  
    
<table width="500" border="0" cellspacing="4" cellpadding="4" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:13px; color:#000; text-align:justify;padding:3px;">

 <tr>
   <td colspan="5" align="center"><span style="font-size:17px; font-weight:bold;">Attached files</span></td></tr>
 <tr><td colspan="5" align="center"><hr /></td></tr>
 
 <tr style="font-weight:bold; font-size:14px;"><td align="center">S.No.</td>
   <td align="center">File Name</td>
   <td align="center">Size</td>
   <td align="center">Type</td>
   <td align="center">Uploaded Date</td></tr>
 <tr><td colspan="5" align="center"><br/></td></tr>
 
 
 <?php

$SelQuery = "SELECT * FROM oxy2_upload_op WHERE event_id = '$ldId' and path='kbs' ";
$SelExec = mysql_query($SelQuery);
$cntt = mysql_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysql_fetch_array($SelExec))
				{
				$i++;
				$id= $SelResult['id'];
				
				$filename= $SelResult['name'];
				$size= $SelResult['size'];
				$file_name= $SelResult['area'];
				$type= $SelResult['extension'];
				$lead= $SelResult['event_id'];
				$uploaded_dt= $SelResult['dt'];
							
?>  
 <tr><td align="center"><?php echo $i; ?></td><td align="center"><a href="download.php?id=<?php echo $id; ?>" target="_blank"><?php echo $file_name; ?></a></td>
   <td align="center"><?php echo $size; ?></td>
   <td align="center"><?php echo $type; ?></td>
   <td align="center"><?php echo $uploaded_dt; ?></td></tr>
 <tr><td colspan="5" align="center"><br/></td></tr>
 
 <?php } 
}
else {
 ?>
  <tr><td colspan="5" align="center"><br/></td></tr>
  
  <?php } ?>
  </table>
  <br />
  
  <hr /><br />

Please upload PDF,PPT,JPG,PNG,GIF,MP4 format & File Size Limit is 5MB max :   <br /><br />


<form action="#" method="post" name="form1">
<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true" >
		<a style="position: relative; top: 5px;" href="javascript:$('#file_upload').uploadifive('upload')" class="bluishBtn button_small">Upload Files</a><br />
<br />


<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadifive({
				'auto'             : false,
				'multi'        : false,
				'checkScript'      : 'fivefy/check-exists.php',
				'formData'         : {
									   'timestamp' : '<?php echo $timestamp;?>',
									   'event_id' : '<?php echo $ldId; ?>',
									   'section' : 'kbs',
									   'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				                     },
				'queueID'          : 'queue',
				'fileSizeLimit' : 50000,
				'uploadScript'     : 'fivefy/uploadifive.php',
				'onUploadComplete' : function(file, data) { console.log(data); 
				
				 //alert(": "+response);
				 if(data == "Invalid file type.")
				 {
				 alert("Please select coreect file type *.jpg *.gif *.png *.pdf *.mp4 *.pptx *.ppt");
				 }
				 else
				 {
				 alert("File Uploaded Successfully !"); 
				 $("#upload_con").val(data);
				 }
				
				}//end of onupload
			});
		});
	</script>        
<br />
<br />

<input type="hidden" hname="upload_con" id="upload_con" class="smallinput" value="<?php echo getTotalop($ldId); ?>" readonly="readonly"/>
</form>
  </div>



        

        


        

        

  