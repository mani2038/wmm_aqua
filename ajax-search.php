
<style type="text/css">

.col1 {
width: 390px;
}
.box {
margin: 3px;
padding: 11px;
background: #ffffff;
font-size: 11px;
line-height: 1.4em;
float: left;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;


}
p{
	font-size:11px;

}

#youhack p, #nitropage p
{
	color:#333;
	font-family: Arial, Helvetica, sans-serif;
}

</style>

<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
 
  <script src="facebox/jquery.js" type="text/javascript"></script>
  <script src="facebox/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'facebox/loading.gif',
        closeImage   : 'facebox/closelabel.png'
      })
    })
  </script>

<?php



include_once ('inc_connection.php');
include_once ('commonFunction.php');

if(isset($_REQUEST['keyword'])){
//echo $_REQUEST['keyword'];	
$keyword = 	trim($_REQUEST['keyword']) ;
//$keyword = mysqli_real_escape_string($con, $keyword);


//echo "$keyword";


$query = "select * from oxy2_knowledgebase where title like '%$keyword%' or description like '%$keyword%' or department like '%$keyword%' or industrialRelevance like '%$keyword%' or type like '%$keyword%'";


$result = mysql_query($query);
$coounts = mysql_num_rows($result);
if($result){
	//echo $query;
	
    if(mysql_affected_rows()>0){
	//echo $query;
	$i = 0;
	
   while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
	   $i++;
	   
	   $eventtId = $row['id'];
	   
	   //Making conditions for the Autofit Content
	   if($i%2 == "0"){$nC = "box col4";}
	   else if($i%3 == "0"){$nC = "box col5";}
	   else if($i%4 == "0"){$nC = "box col2";}
	   else if($i%5 == "0"){$nC = "box col3";}
	   else{$nC = "box col1";}
	   //Ended
	   
	   
	   	   
	
	?>   
		<div class="<?php echo $nC; ?>">
		<h5 style="font-size:15px; font-size-adjust:inherit; font-weight:600"><?php echo $row['title']; ?></h5><br/>
		
		<p style="font-size:12px; font-size-adjust:inherit"><?php echo $row['description']; ?></p>
        <br/>
        <p><span style="color:#333; font-size:11px; font-weight:bold;">Department : </span><?php echo rtrim($row['department'], ","); ?><br />
<span style="color:#333; font-size:11px; font-weight:bold;">Industry Relevance : </span><?php echo $row['industrialRelevance']; ?><br />
<span style="color:#333; font-size:11px; font-weight:bold;">Type : </span><?php echo rtrim($row['type'], ","); ?></p>
        
      
        <p>
<?php 
$SelQuery1 = "SELECT * FROM oxy2_upload_op WHERE event_id = '$eventtId' and path='kbs' ";
$SelExec1 = mysql_query($SelQuery1);
$cntt1 = mysql_num_rows($SelExec1);

if($cntt1 > 0)
{

?>
<table width="60%" border="0" cellspacing="1" cellpadding="1" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:9px; color:#000; text-align:justify;padding:3px;">

 <tr><td colspan="4" align="center"><hr /></td></tr>
 
 <tr style="font-weight:bold; font-size:9px;">
   <td>File Name</td>
   <td>Size</td>
   <td>Type</td>
   <td>Uploaded Date</td></tr>
 <?php

$SelQuery = "SELECT * FROM oxy2_upload_op WHERE event_id = '$eventtId' and path='kbs' ";
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
 <tr><td><a href="download.php?id=<?php echo $id; ?>" target="_blank" style="font-weight:bold; font-size:10px; color: #000"><span ><?php echo $file_name; ?></span></a></td>
   <td><?php echo $size; ?></td>
   <td><?php echo $type; ?></td>
   <td><?php echo $uploaded_dt; ?></td></tr>
 <?php } 
}
else {
 ?>
  <?php } ?>
  </table>
  <?php }?>
 </p>
		
		
		
		</div>
	   
	 <?php   
	   
     //echo '<p> <b>'.$row['title'].'</b><br><br> '.$row['description'].'</p>'   ;
    }
    }else {
        echo 'No Results for :"'.$_GET['keyword'].'"';
    }
  
}
}else {
    echo 'Parameter Missing';
}




?>