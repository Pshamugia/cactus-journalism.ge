<?
include ('../config.php');
 $a=mysqli_query($conn,'select * from kultura_cxrili where id='.$_GET['id']);
$b=mysqli_fetch_array($a);
$aa=mysqli_query($conn,"select * from avtorebi where `id`=".$b['avtori']);
	$avtori=mysqli_fetch_array($aa);

?><!DOCTYPE html PUBLIC "hatecontrol.ge">
<HTML> 
<HEAD> 
<title> 404 Error Page</title> 
</HEAD> 
<BODY> 
<p align="center"> 

<h1>Error 404</h1><br>Page Not Found 

<p>
<?php 

$ip = getenv ("REMOTE_ADDR"); 

$requri = getenv ("REQUEST_URI"); 
$servname = getenv ("SERVER_NAME"); 
$combine = $ip . " tried to load " . $servname . $requri ; 

$httpref = getenv ("HTTP_REFERER"); 
$httpagent = getenv ("HTTP_USER_AGENT");

$today = date("D M j Y g:i:s a T"); 

$note = "Yes you have been bagged and tagged for a making an illegal move" ; 

$message = "$today \n 
<br> 
$combine <br> \n 
User Agent = $httpagent \n 
<h2> $note </h2>\n 
<br> $httpref "; 

$message2 = "$today \n 
$combine \n 
User Agent = $httpagent \n 
$note \n 
$httpref "; 

$to = "error@yourdomain.com"; 
$subject = "yourdomain Error Page"; 
$from = "From: fake@yourdomain.com\r\n"; 

mail($to, $subject, $message2, $from); 

echo $message; 
?> 

</BODY></HTML>