
<? include ('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="js/geo.js" mce_src="geo.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>www.kultura.ge</title>
<link href="logo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div style="margin:12px">
<div align="left" id="qve" style="width:415px">


 <?php

if (isset($_POST['submit']))

	
mysql_query("INSERT INTO coment (

stat_id,
momxmarebeli,
elfosta,
text 
)
VALUES (
'$_REQUEST[id]', '$_POST[momxmarebeli]', '$_POST[elfosta]', '$_POST[text]'
)");
	




?>


<br /><br />
<b style="margin:12px"> 	| დატოვე კომენტარი | </b> <br /> <br />

<table width="" bgcolor="#FFFFFF" align="center">

<tr>
<td width="95" bgcolor="#FFFFFF" id="linkebi" valign="top"> 
<td width="541" bgcolor="#FFFFFF"> 

 
 

<?
if($_REQUEST['dey'])
$where=" and date='$_REQUEST[dey]'";
else $where='';
$a=mysql_query("select * from coment where stat_id='$_REQUEST[id]' ".$where." order by id desc");
while ($b=mysql_fetch_array($a))

{

?>
<table cellpadding="0" cellspacing="0">
<tr>
<td width="440" bgcolor="#FFFFFF" align="left"> 
 



 
<b><div style="background-color:#CCCCCC" style="font-size:14px"> <? echo $b['momxmarebeli'];?> <? echo $b['date']; ?></b></div>
<div style="font-size:14px">  <img src="images/avatar.gif" width="40" /> 
<? echo $b['text'];?>  <hr />  </div>    
  </td>
  </tr>
  </table>	
	
	<? }?>
  
	</div> 

	 
  <br> 
  <br>
<?  echo mysql_error();	 ?>
 
<span class="style1">
<form action="" method="post" enctype="multipart/form-data">
<input type="text" name="momxmarebeli">
  სახელი <br> 


  <input type="text" name="elfosta" /> 
 ელ.ფოსტა (არ გამოჩნდება) 
<textarea name="text" onkeypress="return makeGeo(this,event);" rows="10" cols="50"> </textarea>
 <br />
 <input type="submit" name="submit" value="გამოაქვეყნე" /> <br /> <br />
 <input checked="checked" id="geoKeys" type="checkbox" /> <b>ქართული კლავიატურა ( ჩართვა/გამორთვა ბეჭდვის დროს კლავიშით "~" )</b>
 <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>" />
 
</form>


 






</body>
</html>