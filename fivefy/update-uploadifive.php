<?php


// Set the uplaod directory
$uploadDir = '/oxygen/usr_chart_op/';

// auto directory path is showing till www....

// Set the allowed file extensions
$fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'pdf', 'ppt', 'pptx', 'mp4'); // Allowed file extensions

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

$event_id    = trim($_POST['event_id']);


$path    = trim($_POST['section']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile   = $_FILES['Filedata']['tmp_name'];
	$uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
	$targetFile = $uploadDir . $_FILES['Filedata']['name'];
	
	$fileSize1 = $_FILES['Filedata']['size'];
	$fileType1 = $_FILES['Filedata']['type'];



	
	
	// Validate the filetype
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	$filename1 = $_FILES['Filedata']['name'];
	$fileext1 = $fileParts['extension'];
	
	
	$randName = md5(rand() * time());
	$filePath1 = $randName . '.' . $fileParts['extension'];
	
	 $filePath = $uploadDir .  $randName . '.' . $fileParts['extension'];
	 
	 
	if (in_array(strtolower($fileParts['extension']), $fileTypes)) {

		// Save the file
		move_uploaded_file($tempFile, $filePath);
		chmod($filePath, 0777);

include '../inc_connection.php';

$sql9 = "SELECT * FROM oxy2_knowledgebase WHERE id = '$event_id'";
$res9 = mysql_query($sql9);
$resultt = mysql_fetch_array($res9);
$teetal11 = $resultt['title'];
$description11 = $resultt['description'];
$department11 = $resultt['department'];
$industrialRelevance11 = $resultt['industrialRelevance'];
$type11 = $resultt['type'];

//mssql_select_db ("sercon", $conn);

    if(!get_magic_quotes_gpc())
    {
        $fileName  = addslashes($tempFile);
        $filePath  = addslashes($filePath);
    }  

	$query = "INSERT INTO oxy2_upload_op (name, size, type,extension, area, path, event_Id, dt) ".
			 "VALUES ('$filePath1', '$fileSize1', '$fileType1','$fileext1','$filename1', '$path', '$event_id', date_add(now(),INTERVAL 630 MINUTE))";

	//echo "$query";
    $result= mysql_query($query);
	
	if($path == "kbs")
	{
		//Getting the User's 
		$totalU = "";
		$que_u="SELECT * FROM oxy2_users WHERE status = '1'";
		$res_u=mysql_query($que_u);
		while($row_u=mysql_fetch_array($res_u))
		{
		$totalU = $totalU . $row_u['username'] . ",";	
		
		} 
		
		$totalUsers = rtrim($totalU, ",");
		
		
		//Sending Mail
		
		$to = $totalUsers;
		//$to = "imanish.yadav@gmail.com,manish.yadav@1010-asia.co.in,amit.kr@bateschisercon.com";
		
		$subject = 'New Upload in Knowledge Base'; 
		$random_hash = md5(date('r', time())); 
		
		$headers = "From:Sercon Oxygen <sercon.oxygen@batessercon.com>\r\nReply-To:sercon.oxygen@batessercon.com";
		$headers .= "\r\nContent-type: text/html\r\n";
		
		
		$message.= "<html>";
		$message.= "<head>";
		$message.= "<title>New Upload in Knowledge Base</title>";
		$message.= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>";
		$message.= "</head>";
		$message.= "<body>";
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='border:1px solid lightgray;width:100%;'>";
		$message.= "";
		
		$message.= "<tr style='background:#515B5E;'>";
		$message.= "<td colspan='2'><img src='http://www.pulsesuite.com/oxygen/images/logo.png' alt='Oxygen Logo' style='width:154px;height:39px;padding:10px;color:white;border:none;'/></td>";
		$message.= "</tr>";
		$message.= "<br />";
		
		$message.= "<table align='center' cellpadding='0' cellspacing='0' style='padding:10px;width:100%;'>";
				
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td colspan='2'><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>New Upload has been done in knowledge base.<br/><br/></td>";
		
		
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Title : 
		
		</td>";
		$message.= "<td>$teetal11</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Description : 
		
		</td>";
		$message.= "<td>$description11</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Department : 
		
		</td>";
		$message.= "<td>$department11</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Industrial Relevance : 
		
		</td>";
		$message.= "<td>$industrialRelevance11</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>Type : 
		
		</td>";
		$message.= "<td>$type11</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
		$message.= "<tr style='margin:10px;'>";
		$message.= "<td>File Name : 
		
		</td>";
		$message.= "<td>$filename1</td>";
		$message.= "</tr>";
		
		$message.= "<br />";
		
				
		
		$message.= "</table>";
		$message.= "</body>";
		$message.= "</html>";
		$mail_sent = @mail( $to, $subject, $message, $headers );
		
		//Mail Ended
		
		
		
		
		
		
		
		
	}
	
	if ($filePath1)
	echo $filePath1;
	else // Required to trigger onComplete function on Mac OSX
	echo '1';
	
	 } else {
	 	echo 'Invalid file type.';
	 }
}



/*
// Set the allowed file extensions
$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // Allowed file extensions

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile   = $_FILES['Filedata']['tmp_name'];
	$uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
	$targetFile = $uploadDir . $_FILES['Filedata']['name'];

	// Validate the filetype
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	if (in_array(strtolower($fileParts['extension']), $fileTypes)) {

		// Save the file
		move_uploaded_file($tempFile, $targetFile);
		echo 1;

	} else {

		// The file type wasn't allowed
		echo 'Invalid file type.';

	}
}*/
?>