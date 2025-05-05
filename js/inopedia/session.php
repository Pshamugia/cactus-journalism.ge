<?
include ('../config.php');
if (isset($_POST['login']))
				 {
$user = $_REQUEST['user'];
$passwords = $_REQUEST['passwords'];
$s=mysqli_query($conn, "select * from kultura_password where user='$user' and   passwords='$passwords'");
$f=mysqli_num_rows($s); 
				

if ($f)
{
	$data = mysqli_fetch_object($s);
	$_SESSION['sesia']=$data->id;
}
else 
{
	header('location:login.php');
	exit;
}
	             }			



 if (empty($_SESSION['sesia']) || $_SESSION['sesia']==0)
 {
 header('location:login.php');
		exit;
 }
	if(isset($_REQUEST["logoff"]))
	{
		$_SESSION['sesia']=0;
		header('location:login.php');
		exit;
	}
?> 


