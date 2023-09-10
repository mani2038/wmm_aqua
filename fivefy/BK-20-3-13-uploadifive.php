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