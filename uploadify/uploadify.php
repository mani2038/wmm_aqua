<?php
/*
Uploadify v2.1.4
Release Date: November 8, 2010

Copyright (c) 2010 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
	
	 $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	 $fileTypes  = str_replace(';','|',$fileTypes);
	 $typesArray = split('\|',$fileTypes);
	 $fileParts  = pathinfo($_FILES['Filedata']['name']);
	 

	$event_id    = trim($_REQUEST['event_id']);
	$path    = trim($_REQUEST['section']);
	

    // get the file extension first
	$ext      = substr(strrchr($tempFile, "."), 1); 
	
	// generate the random file name
	$randName = md5(rand() * time());
	$filePath1 = $randName . '.' . $fileParts['extension'];
	// and now we have the unique file name for the upload file
    $filePath = $targetPath .  $randName . '.' . $fileParts['extension'];
    
	
	//echo"$filePath";
    // move the files to the specified directory
	// if the upload directory is not writable or
	// something else went wrong $result will be false
    //$result    = move_uploaded_file($tmpName, $filePath)
	 
	 
 if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		
		move_uploaded_file($tempFile,$filePath);
		echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
		
		
			
include '../inc_connection.php';
//mssql_select_db ("sercon", $conn);

    if(!get_magic_quotes_gpc())
    {
        $fileName  = addslashes($tempFile);
        $filePath  = addslashes($filePath);
    }  

	$query = "INSERT INTO oxy2_upload_op (name, size, type, path, event_Id, dt) ".
			 "VALUES ('$filePath1', '$fileSize', '$fileType', '$path', '$event_id', date_add(now(),INTERVAL 630 MINUTE))";

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
?>