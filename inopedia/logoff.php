<?php
include ('config.php');
include ('session.php'); 

if (isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
	$b='images/'.$_FILES['upload']['name']; 
     
	move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);
$sql="insert into kultura_cxrili (kategory, upload, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$b',  '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";
mysql_query($sql);
echo $sql;
echo mysql_error();
 
 
}


if ($_POST['delete'])
{
$x=mysql_query("select * FROM kultura_cxrili where id='$_REQUEST[del]'");
$z=mysql_fetch_array($x);
if ($z['surati'])
unlink('../'.$z['surati']);
mysql_query("DELETE FROM kultura_cxrili where id='$_REQUEST[del]'");
 
}


?>

<script type="text/javascript" src="fckeditor.js"></script>
<script type="text/javascript">
<!--
function ReplaceAllTextareas() 
{
	var allTextAreas = document.getElementsByTagName('textarea');
	for (var i=0; i < allTextAreas.length; i++) 
	{
		if(allTextAreas[i].id=='fckeditor')
		{
			var oFCKeditor = new FCKeditor( allTextAreas[i].name ) ;
			oFCKeditor.BasePath = '' ;
			oFCKeditor.ReplaceTextarea() ;
		}
	}
}
// -->
</script>
  <script src="js/geo.js" mce_src="geo.js" type="text/javascript"></script>
 
  
  <script type="text/javascript" src="nicEdit-latest.js"></script> 
  
  
  <script type="text/javascript"> 
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script> 
  
<link rel="stylesheet" href="style/style.css" type="text/css" charset="UTF-8" />
<style type="text/css">
<!--
.style4 {color: #FFFFFF}
.style6 {color: #FFFFFF; font-weight: bold; }
-->
</style>
<body bgcolor="#CCCCCC">
<table width="700" bgcolor="#CCCCCC" align="center">
<tr>
<td bgcolor="#CCCCCC" colspan="50" id="linkebi" align="center"> 
 <script>
function showdiv(name){
	var obj = (document.getElementById)? document.getElementById(name) : eval("document.all[name]");
	obj.style.display="";
}
function hidediv(name){
	var obj = (document.getElementById)? document.getElementById(name) : eval("document.all[name]");
	obj.style.display="none";
}
 </script>  
<div id="navigation">
<ul>
<li><a href="index.php" title="Home">მთავარი</a></li>
<li><a href="Coment.php" title="About us">Coment</a></li>
<li><a href="mp3.php" title="Services">mp3</a></li>
<li><a href="banner.php" title="Products">Banner manager</a></li>
<li><a href="logoff.php">Sign out </a> </li> 

<form action=" search.php" method="post">
<input checked="checked" id="geoKeys" type="checkbox" />
 
   <input type="text" onKeyPress="return makeGeo(this,event);" name="text" value="search..."  onblur="if(this.value=='') this.value='search...';"  onfocus="if(this.value=='search...') this.value='';"  size="20" />
   <input name="Submit" type="submit" style="background:#CCCCCC; border:none" value="ძიება"/>   
</form> 
</ul>
</div>
</td></tr>  

<form action="" method="post" enctype="multipart/form-data" name="rame"> 
<tr><td>
<hr>
<?php
 $r=0;
 $w=0;
$a=mysql_query("select * from cxrili order by id desc");
while ($b=mysql_fetch_array($a))

{
$r++; //echo $r;
}
$div=$r/10;

for($i=1;$i<=$div;$i++)
{
echo '<a href="index.php?limit='.$i.'0">'.$i.'</a>';	

}


$sublim=$_REQUEST['limit']-10;
if($_REQUEST['limit'])
$lim='limit '.$sublim.','.$_REQUEST['limit'];
else
$lim='';
$a=mysql_query("select * from kultura_cxrili order by pos");
while($b=mysql_fetch_array($a))

{
	
?>


 <table cellpadding="0" cellspacing="0" align="center">
<tr>
<td width="700" bgcolor="#FFFFFF" align="left"> 

<div style="background-color:#FCF8C2"><? echo "<B>".$b['satauri']."</B>";?>&nbsp;&nbsp;&nbsp;<? echo $b['date'] ?> </div>
<a href="index.php?do=update&id=<? echo $b['id']; ?>">edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href=""><img src="images/down.gif" width="11" height="14" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href=""><img src="images/up.gif" width="11" height="14" border="0"  /></a>
<input type="checkbox"  name="del"  value="<? echo $b['id'];?>"  />
<input name="delete" type="submit"  value="delete">
<hr> </td></tr>
    </table>	
	
	<? $w++; }echo $w;?>
</td></tr>
</form>

<tr>
<td>
<? 
if ($_REQUEST['addavtor'])
{	
if(move_uploaded_file($_FILES['mp3']['tmp_name'], '../mp3/'.$_FILES['mp3']['name']))
$m='mp3/'.$_FILES['mp3']['name'];
else $m='';
mysql_query("insert into avtorebi(avtori,mp3)values('$_POST[avtori]','$m')");
}
if ($_REQUEST['avtor_delete'])
mysql_query("delete from avtorebi where id='$_REQUEST[avtoris_id]'");

?> <form action="" method="post" enctype="multipart/form-data" >

  <br />
<input type="text" name="avtori" />
<input type="submit" name="addavtor">
<br />
<select name="avtoris_id">
     <?
	 $avt=mysql_query("select * from  avtorebi order by id desc");
	 while($avts_id=mysql_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select><br />
<input type="submit" name="avtor_delete" value="delete" /> 
</form><br> </td>
</tr></table>
<form action="" method="post" enctype="multipart/form-data" name="rame"> 
<table align="center">
<tr>
<td bgcolor="#FFFFFF"> 
<p>MENU <br>
         <select  name="kategory" style="width:320px">
           <option value="mtavari">მთავარი</option> 
		   <option value="procontra">პრო და კონტრა</option>
		   <option value="news">news</option>
           <option value="პოეზია">ლექსები</option>
           <option value="პროზა">პროზა </option>
		   <option value="რომანი">რომანი </option> 
		   <option value="mp3">MP3-POETRY</option>
		   <option value="ფილოსოფია">ფილოსოფია </option>
		   <option value="visual-art"> VISUAL_ART</option>
		  <option value="კრიტიკა/ესსე"> კრიტიკა </option>
           <option value="ინტერვიუ"> ინტერვიუ </option>
           <option value="რეცენზია"> რეცენზია </option>
           <option value="მუსიკა">მუსიკა</option>
		   <option value="მედია"> მედია </option>
           
		   <option value="qveda_menu"> =================== </option>
		    <option value="afisha"> აფიშა  </option>
			 <option value="linkebi"> ლინკები </option>
			 <option value="wignebi"> წიგნები </option>
			 <option value="konkursi"> კონკურსები</option>
			 <option value="persona"> პერსონა </option>
			 <option value="punqti">პუნქტი </option>
			 <option value="diskusia"> დისკუსია </option>
			 <option value="online"> online-ჟურნალები</option>
			 <option value="artefact"> artefact </option>
        </select>
    </p>


<input type="file" name="upload" />

image <br>
<input type="file" name="mp3"> MP3 <br />
<input name="satauri" type="text" size="50"> სათაური  

<br>
<select name="avtori">
     <?
	 $avt=mysql_query("select * from  avtorebi order by id desc");
	 while($avts_id=mysql_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select> ავტორი
<textarea  name="agwera" cols="85" rows="5" >&nbsp;</textarea>
აღწერა
<textarea name="full"  cols="85" rows="12"></textarea>
 
   <input type="submit" name="submit" value="გამოქვეყნება"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
</form>
   
    <a href="#" id="navigation"> ზევით ასვლა</a></td>
   </tr>

  </table>   
	 



	