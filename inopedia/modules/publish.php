<?  
if (isset($_REQUEST['dada']))
{
$LOMI="insert into kultura_cxrili (kategory, subkat, upload, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b',  '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";
mysql_query($LOMI);

$r=mysql_query("select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysql_fetch_array($r);

$a=mysql_query("select * from coment where id='$_REQUEST[id]'   order by id asc");
$b=mysql_fetch_array($a);


$date=date('d.m.Y'); 
	

$sql="update kultura_cxrili set kategory='$_REQUEST[kategory]', subkat='$_REQUEST[subkat]', upload='$b', mp3='$c',  satauri='$_REQUEST[satauri]', avtori='$_REQUEST[avtori]', agwera='$_REQUEST[agwera]', full='$_REQUEST[full]', mp3='$_REQUEST[mp3]' where id='$_REQUEST[id]'";
mysql_query($sql);

$jana="update coment set text='$_REQUEST[text]' and stat_id='$_REQUEST[stat_id]',
 where id='$_REQUEST[id]'";
mysql_query($jana);



}

$r=mysql_query("select * from kultura_cxrili where kategory='comment'");
$data=mysql_fetch_array($r);

$a=mysql_query("select * from coment where id='$_REQUEST[id]'   order by id asc");
$b=mysql_fetch_array($a);


if ($_POST['dada'])
{
$x=mysql_query("select * FROM coment where id='$_REQUEST[del]'");
$z=mysql_fetch_array($x);

 
}

?>



 <script type="text/javascript" src="nicEdit-latest.js"></script> 
  
  
  <script type="text/javascript"> 
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script> 



<style type="text/css">
<!--
.style12 {font-size: 24px; color: #000000; }
.style7 {font-size: 16px; font-weight: bold; color: #857A6A;}
-->
</style>
      <form action="" method="post" name="dada">
<table align="center" width="700" bgcolor="#CCCCCC">
<tr><td>
 <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a href="index.php">???????</a>  </li>
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

 
 

  <tr>
    <td bgcolor="#FFFFFF" width="700"><p><br>
	    <br /> 
	    <br />
		
        <select  name="kategory" style="width:320px">
          <option value="comment">comment</option> 
	     
			   
			 
        </select>  
        MENU <br>
        </p>
        </p>
        <br>
        <br />  
	  
	  
        <textarea  name="satauri" cols="85" rows="2" >  <? echo $b['text'];?> </textarea>
        <br>
    
    
    
        <div style="width:300">        </div>
      <br>
      <br>
      <br>
      <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
      <input type="submit" style="background:#FFCC66" name="dada" value="გამოქვეყნება">
	  </form></td>
  </tr>
   
   <td height="20"> 

  
 


	</td></tr></table>