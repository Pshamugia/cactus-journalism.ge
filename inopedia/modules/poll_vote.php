<?php
 
if (isset($_POST['submit']))
{
 
$sql="insert into kultura_cxrili (kategory, subkat, upload, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b',  '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";
mysql_query($sql);
}



if ($_POST['delete'])
{
$x=mysql_query("select * FROM kultura_cxrili where id='$_REQUEST[del]'");
$z=mysql_fetch_array($x);
unlink($z['../'.'surati']);
mysql_query("DELETE FROM kultura_cxrili where id='$_REQUEST[del]'");

}
?>



<html>
<head>
<link rel="stylesheet" href="style/style.css" type="text/css" />
 <script type="text/javascript" src="nicEdit-latest.js"></script> 
  
  
  <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>
<title>	WWW.kultura.ge/ admin </title>
 
<style type="text/css">
<!--
.style13 {font-size: 12px}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body bgcolor="#FFCC66" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">

 

<table width="" bgcolor="#CCCCCC" align="center">
<tr>
<td bgcolor="#CCCCCC" colspan="50" id="linkebi" align="center"> 
 <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a href="index.php">მთავარი</a>  </li>
  <li><a href="index.php?do=Coment">Coment</a></li>
  <li><a class="MenuBarItemSubmenu" href=" ">managers</a>
      <ul>
        <li><a  href="index.php?do=password">Pass. manager</a>        </li>
        <li><a href="index.php?do=banner">Banner manager</a></li>
        <li><a href="index.php?do=poll_vote">Poll manager</a></li>
      </ul>
  </li>
  <li><a href="index.php?logoff">Sign out</a></li>
</ul>



<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>

<form action=" search.php" method="post">

 
   <input type="text" onKeyPress="return makeGeo(this,event);" name="text" value="search..."  onblur="if(this.value=='') this.value='search...';"  onfocus="if(this.value=='search...') this.value='';" style="height:35px"  size="18" />
   <input name="Submit" type="submit" style="background:#CCCCCC; border:none" value="Go"/>   
</form> 
  <form action="" method="post" enctype="multipart/form-data" name=""> 
<tr>
<td width="95" bgcolor="#CCCCCC" id="linkebi" valign="top">      
 
 
 

<td width="541" bgcolor="#FFFFFF"> 

	<div style="background:#FFCC66">
    Description
    <br>
    <span class="style13">თუ გსურთ, განათავსოთ გამოკითხვა თქვენს ვებ-გვერდზე, მონიშნეთ შესაბამისი ენა (ENG ან GEO), ჩაწერეთ გამოკითხვის ტექსტი (მაგ: მოგწონს საიტი?)
    და დააჭირეთ "გამოქვეყნებას".</span>    </div>	  
   
 <br>



<?

$a=mysql_query("select * from kultura_cxrili where kategory='poll'  order by id desc LIMIT 2");
while ($b=mysql_fetch_array($a))
{
?>
<div>
<? 

echo $b['satauri']."<br>";  
	
?> 
<input type="checkbox"  name="del" value="<? echo $b['id'];?>" >
<input name="delete" type="submit"  value="delete">
</div> <hr>
<? } ?> 

 <br><br><br><br>
 
  
         <select  name="kategory">
         
		    <option value="poll">poll</option>
		 
        </select> <br><br>

	<br>
	 
  <select  name="subkat" style="width:340px">
	<option value="GEO">GEO</option> 
		   <option value="ENG" style="color:#FF0000">ENG</option>
		   		   </select>  მონიშნე ენა<br><br>
<input name="satauri" type="text" size="50">
    ჩაატარე გამოკითხვა
      
      </span><span class="style1">!</span><br>
      <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
      <input type="submit" style="background:#FFCC66" name="submit" value="გამოქვეყნება">
 
</form>
<tr>
	




 
 <td width="200" height="250" align="left" valign="middle" bgcolor="#CCCCCC"><p>
 
 
 
     </td>
 <td width="318" bgcolor="#CCCCCC"> 

 
<br> <br>
 
 </body>

</html>



 
