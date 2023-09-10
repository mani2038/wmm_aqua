<?php 
Class NewClass{
	function SentMail($to,$subject,$Message){
		//recipient

//sender
$from = 'sender@watermarkmktg.com';
$fromName = 'Aqua';

//header for sender info
$headers = "From: $fromName"." <".$from.">";

//boundary 
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//headers for attachment 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//multipart boundary 
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $Message . "\n\n"; 
	$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//send email
$mail = @mail($to, $subject, $message, $headers, $returnpath); 

//email sending status
//echo $mail?"<h1>Mail sent.</h1>":"<h1>Mail sending failed.</h1>";	
//die();
	}
	
	
	function SentMail1($to,$subject,$Message,$heade){
		//recipient

//sender
$from = 'sender@watermarkmktg.com';
$fromName = 'Aqua';

//header for sender info
$headers = "From: $fromName"." <".$from.">";

//boundary 
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//headers for attachment 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

//multipart boundary 
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $Message . "\n\n"; 
	$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//send email
$mail = @mail($to, $subject, $message, $heade, $returnpath); 

//email sending status
//echo $mail?"<h1>Mail sent.</h1>":"<h1>Mail sending failed.</h1>";	
//die();
	}
}

?>