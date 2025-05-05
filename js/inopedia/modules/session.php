<?
@session_start();
@session_register('sesia');


if (isset($_POST['login']))
				 {
$s=mysql_query("select * from kultura_password where user='$_REQUEST[user]' and   passwords='$_REQUEST[passwords]'");
$f=mysql_num_rows($s); 
				

if ($f) 
$_SESSION['sesia']=1;
else 
echo "<script>document.location='login.php';</script>";

	 }			

 if ($_SESSION['sesia']!==1)
 echo "<script>document.location='login.php';</script>";
	if(isset($_REQUEST["logoff"]))
	$_SESSION['sesia']=0;
?> 


