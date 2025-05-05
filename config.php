<?php 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


if ((!isset($_GET['do']) || $_GET['do'] != 'result') && (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off")) 
{
    //$location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    //header('HTTP/1.1 301 Moved Permanently');
    //header('Location: ' . $location);
    //exit;

}

session_start(); 
define('PAATA_WEB', true);
if(function_exists("session_register"))
{
	session_register("captcha_text");
	session_register('sesia');
	session_register('LANG');
 }

$conn = mysqli_connect("localhost", 
                            "root",
                            "");
mysqli_select_db($conn, "cactusjo_tsira");

mysqli_query($conn, 'SET CHARACTER SET utf8'); mysqli_query($conn, 'SET NAMES utf8');

define('HTTP_HOST', 'http://localhost/cactus-journalism/');
include('firewall/firewall.php');
 

 



if (isset($_GET['lang']))
{
	$_SESSION['LANG'] = $_GET['lang'];
}	

if ($_SESSION['LANG']!='ka' && $_SESSION['LANG']!='en')
{
	$_SESSION['LANG'] = 'ka';
}
include ("lang/$_SESSION[LANG].php"); 
 ?>