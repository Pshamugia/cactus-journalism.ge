<?php
 

if (isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
	mysql_query("insert	into coment (id, stat_id, momxmarebeli, elfosta, text, dada)
	values ('$_POST[id]', '$_POST[stat_id]',  '$_POST[momxmarebeli]', '$_POST[elfosta]', '$_POST[text]', '$_POST[dada]')");
	
}


if (isset($_POST['dada']))
{
$dada=mysql_query('UPDATE  `coment` SET  `vs` =  \'1\' WHERE  `id` ='.$_POST['comment_id'].' LIMIT 1 ;');
}
 
 

if ($_POST['delete'])
{
$x=mysql_query("select * FROM coment where id='$_REQUEST[del]'");
$z=mysql_fetch_array($x);
if ($z['surati'])
unlink('../'.$z['surati']);
mysql_query("DELETE from coment where id='$_REQUEST[del]'");

}
?>



<html>
<head>
 <script type="text/javascript" src="nicEdit-latest.js"></script> 
  
  
  <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>
    <link href="logo.css" rel="stylesheet" type="text/css">
<title>	WWW.kultura.ge/ admin </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="style/style.css" type="text/css; charset=UTF-8"/>
<style type="text/css">
<!--
.style6 {font-size: 24px; color: #FF0000;}
.style7 {font-size: 16px; font-weight: bold; color: #857A6A;}
.style9 {color: #000000}
.style12 {font-size: 24px; color: #000000; }
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#FFCC66">
<table width="744" style="-moz-box-shadow: 0 0 15px #888; -webkit-box-shadow: 0 0 15px #888; box-shadow: 0 0 15px #888; border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999;  border:1px solid #CCC;"  align="center">
<tr>
<td width="744" align="center" bgcolor="#F0F0F0" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 2px solid #CCC;" id="linkebi"> 
 
 
 
 <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a href="index.php">მთავარი</a>  </li>
  <li><a href="index.php?do=Coment">Coment</a></li>
  <li><a class="MenuBarItemSubmenu" href=" ">managers</a>
      <ul>
        <li><a  href="index.php?do=password">Pass. manager</a>        </li>
        <li><a href="index.php?do=banner">Banner manager</a></li>
        <li><a href="index.php?do=images">Image manager</a></li>
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

<form action="index.php?do=search" method="post">

 
   <input type="text" onKeyPress="return makeGeo(this,event);" name="text" value="search..." 
    onblur="if(this.value=='') this.value='search...';"  onfocus="if(this.value=='search...') this.value='';" 
	style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; height:22px; position:relative; top:8px;"  size="18" />
   <input name="Submit" type="submit" style="position:relative; top:7px; border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999;" value="Go"/>   
</form></td>   

<form action="" method="post" enctype="multipart/form-data" name="rame"> </td>
  </tr>
  </table>
 
 

 
 
 <?php
	/*
		Place code to connect to your DB here.
	*/


	$tbl_name="kultura_cxrili";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 6;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?=Coment"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name order by id desc LIMIT $start, $limit";
	$result = mysql_query($sql);

	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">« previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
?>
 <? $x==0;
if($_REQUEST['dey'])
$where=" and date='$_REQUEST[dey]'";
else $where='';
//$sql="select * from kultura_cxrili  order by id desc limit $lim";
// echo $sql.mysql_error();
$a=mysql_query($sql);
while ($b=mysql_fetch_array($a))
 
 ?> 

 

 

<? 
 $w=mysql_query("select * from users ");
while ($userdata=mysql_fetch_array($w));
{

echo "HY&nbsp;&nbsp;".$userdata['elfosta'];

}

$a=mysql_query("select * from coment order by id desc limit $limit");
while ($b=mysql_fetch_array($a))
 {

$bum=mysql_query("select * from kultura_cxrili where id='$b[stat_id]'");
$res=mysql_fetch_array($bum);
	
?>
<br>
 <table align="center" bgcolor="#666666">
<tr>
<td width="700px" bgcolor="#FFFFFF">
 
 <? echo $res['satauri']; ?>
 
 
 
<div style="background-color:#CCCCCC; font-size:14px; "> <b><? echo $b['momxmarebeli'];?> |<? echo $b['elfosta']; ?></b></div>

<? echo $b['text'];?>    </div>  <br>
 <form action="" method="post" name="text">
<input type="checkbox"  name="del" value="<? echo $b['id'];?>">
<input type="hidden"  name="comment_id" value="<? echo $b['id'];?>" >
<input name="delete" type="submit"  value="delete">   

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
 <input type="checkbox"  name="dada" value="<? echo $b['id'];?>"   <?php if ($b['vs']=='1') echo 'checked';?> >
<input name="dada" type="submit"  value="publish"> 
</form>  
 </td>
    </table>	
	
	<? } ?>
  
 

 
  
<?  echo mysql_error();	 ?>
 
 <table align="center">
 <tr><td bgcolor="#FFFFFF"> 
 <div style="background-color:#FFFFFF" align="center"> 
<? echo $pagination ?> </div>
  
  
  </td>
  </tr>
  </table>
</tr>
  </table>
	 
	
	
	
	
	
</body>

</html>




