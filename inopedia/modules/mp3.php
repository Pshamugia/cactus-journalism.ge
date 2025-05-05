<? include ('config.php');  
include ('session.php'); ?>
<!--mp3-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style/style.css" type="text/css" charset="UTF-8"/>
<body bgcolor="#000000">

<table width="700" height="400"  class="pos"  align="center">
<tr><td>
<div id="navigation">
<ul>
<li><a href="index.php" title="Home">მთავარი</a></li>
<li><a href="Coment.php" title="About us">Coment</a></li>
<li><a href="mp3.php" title="Services">mp3</a></li>
<li><a href="banner.php" title="Products">Banner manager</a></li>
<li><a href="index.php?logoff">Sign out </a> </li>
</ul>
</div>
</td>

<tr>
<td>

<? 
if ($_POST['save'] && !isset($_POST['deletemp3']))
{
$j='mp3files/'.$_FILES['mp3']['name'];
move_uploaded_file($_FILES['mp3']['tmp_name'],'../mp3files/'.$_FILES['mp3']['name']);
mysql_query("insert into mp3 (mp3,title)values('$j','$_REQUEST[title]')");	
 
$header='<?xml version="1.0" encoding="UTF-8"?>
<player showDisplay="yes" showPlaylist="yes" autoStart="no">';
$foter='</player>';
$d=mysql_query("select * from mp3 order by id desc");
while($data=mysql_fetch_array($d))
{
$content.='<song path="'.$data['mp3'].'" title="'.$data['title'].'" />';	
}
$con=$header.$content.$foter;
$fop=fopen('../mp3player.xml','w');
fwrite($fop,$con);
}


if ($_POST['deletemp3'])
{
mysql_query("delete from mp3 where id='$_REQUEST[mp3id]'");
$header='<?xml version="1.0" encoding="UTF-8"?>
<player showDisplay="yes" showPlaylist="yes" autoStart="no">';
$foter='</player>';
$d=mysql_query("select * from mp3 order by id desc");
while($data=mysql_fetch_array($d))
{
$content.='<song path="'.$data['mp3'].'" title="'.$data['title'].'" />';	
}
$con=$header.$content.$foter;
$fop=fopen('../mp3player.xml','w');
fwrite($fop,$con);
}

$s=mysql_query("select * from mp3 order by id desc");
while ($d=mysql_fetch_array($s))
{
echo $d['mp3'];
?>
<form action="" method="post"><input type="hidden" name="mp3id" value="<? echo $d['id'];?>">
<input type="submit" name="deletemp3" value="delete" >
</form>
<?
}
?> 
<form action="" method="post" enctype="multipart/form-data">
<input type="text" name="title">
<input type="file" name="mp3">
<input type="submit" name="save">

</form>
</td>
</tr>
</table>
<!--end mp3-->