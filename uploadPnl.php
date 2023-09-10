<?php
include_once('commonFunction.php');
include_once('inc_connection.php');
$ldId = $_REQUEST['leadNumber'];

if(isset($_POST['submit'])){
$allowedExts = array("pdf",'xlsx','xls');
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "application/pdf" || $_FILES["file"]["type"] == "application/octet-stream"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts))
  {
    //print_r($_FILES);
   //die();
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
       if (file_exists("uploadpnl/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
		 $radomNum = gen_md5_password('8');
		 $fileName11 = $_FILES["file"]["name"];
		 $uploadedFileName = $radomNum.$fileName11;
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "uploadpnl/" . $uploadedFileName);
	  
	  $query = "INSERT INTO oxy_pnl(leadId, status, leadStatus,dateAdded, pnlFileName) ".
			 "VALUES ('$ldId','0', '0', date_add(now(),INTERVAL 630 MINUTE), '$uploadedFileName')";

    $result= mysqli_query($con,$query);
	  echo "File Uploaded Successfully";
      }
    }
  }
else
  {
  echo "Invalid file";
  }
} else {
?>
<form action="#" method="post"
enctype="multipart/form-data">
<label for="file">Upload PNL or Estimate:</label>
<input type="hidden" name="leadNumber" value="<?php echo $ldId; ?>"/>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php } ?>