<?php
if (isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
	$b='images/'.$_FILES['upload']['name']; 

    
	
	
move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);

	
$personId = (int) $_POST['person_id'];
$partyId = 0;

if($personId>0){
	$x=mysqli_query($conn, 'select t.`party_id` from hc_persons t where t.`id`='.$personId);
	if($x){
		$z=mysqli_fetch_array($x);
		$partyId = $z['party_id'];		
	}
}
#$sql="insert into kultura_cxrili (kategory, subkat, upload, upload2, upload3, upload4, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$b2', '$b3', '$b4', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";


$sql="insert into kultura_cxrili (kategory, subkat, upload, eng_geo, img_description, satauri, avtori, party_id, person_id, agwera, full, ena, menu, date, pos, news_date)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$_POST[eng_geo]', '$_POST[img_description]', '$_POST[satauri]', '$_POST[avtori]', '$partyId', '$personId', '$_REQUEST[agwera]', '$_REQUEST[full]', '$_REQUEST[ena]', '$_REQUEST[menu]', '$date', '0', '$_REQUEST[news_date]')";


mysqli_query($conn, $sql);
 
	echo mysqli_error();
}


if ($_POST['delete'])
{
$x=mysqli_query($conn,  "select * FROM kultura_cxrili where id='$_REQUEST[del]'");
$z=mysqli_fetch_array($x);
if ($z['surati'])
unlink('../'.$z['surati']);
mysqli_query($conn,  "DELETE FROM kultura_cxrili where id='$_REQUEST[del]'");
 
}


?>



  <script src="js/geo.js" mce_src="geo.js" type="text/javascript"></script>
  <link href="logo.css" rel="stylesheet" type="text/css" />
  

  

 <table width="100%" align="center" cellpadding="0" cellspacing="0" style="margin:0; border-bottom:3px solid #E8BA33; margin-top:-15px; padding:0; z-index:1000000; position:fixed; background:#F0F0F0;"> 
 <tr> 
 <td valign="top">
 <table align="center" width="1000">
 <tr>
 <td valign="top" width="1000px" style="background:#F0F0F0; border-radius:5px;">  
 
  

 <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<ul id="MenuBar1" class="MenuBarHorizontal" style="position:relative; margin-top:10px; font-size:14px;">
 <li style="width:200px;"> <a href="index.php"> WEBSTER CMS </a></li>
  <li style="position:relative; margin-left:-46px; width:70px;"><a href="index.php?logoff">Sign out</a></li>
</ul>

<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>

<form action="index.php?do=search" method="post">

 
   <input type="text" onKeyPress="return makeGeo(this,event);" name="text" value="search..." 
    onblur="if(this.value=='') this.value='search...';"  onfocus="if(this.value=='search...') this.value='';" 
	style=" border: 1px solid #999; height:22px; position:relative; top:5px;"  size="18" />
   <input name="Submit" type="submit" style="position:relative; top:5px; height:22px; left:-5px;
border: 1px solid #999;" value=">"/>   
</form>

</td><td> </td> 
 </tr>
  </table>
 
  </td> 
 </tr>
 </table>
  
 <table width="744" style="position:relative;  z-index:0; top:-132px; border:1px solid #CCC;"  align="center">
<tr>
<td width="744" align="center" bgcolor="#FFFFFF" style="" id="linkebi"> 
<div id="menu" style="position:relative; margin-left:-870px; top:170px;">
  <ul class="niveau1">
    <li><a href="index.php">საწყისი</a></li>
    <li class="sousmenu"><a href="#">გალერეა</a>
      <ul class="niveau2">
        <li><a href="index.php?do=gallery">ფოტო</a></li>
        <li><a href="index.php?do=video">ვიდეო</a></li>
      </ul>
    </li>
    
    <li class="sousmenu"><a href="#">მენეჯერები</a>
      <ul class="niveau2">
        <li><a href="index.php?do=password">პასვორდი</a></li>
        <li><a href="index.php?do=banner">ბანერის მენეჯერი</a> </li>
        <li><a href="modules/images.php">სურათების მენეჯერი</a> </li>
      </ul>
    </li>
    <li><a href="index.php?do=authors">ავტორები</a> </li>
      <li class="sousmenu"><a href="#">ენის შეცვლა</a>
      <ul class="niveau2">
              <li><a href="index.php?do=home">ქართული</a></li> 

        <li><a href="index.php?do=enghome">English</a></li> 
        </ul>
    </li>
             <li><a href="http://www.tbilisilitfest.ge/roundcube/" target="_blank">ელფოსტა</a></li>

     
  </ul>
</div>
<style> 
#menu {
	z-index:50000;
	width: 100px;
	font-size:14px;
}
#menu a {
	color: #000000;
}
#menu ul {
	padding: 0;
	width: 100px;
 	margin: 0px;
	background: white;
}
#menu li:hover {
	background: #EDD;
}
#menu li.sousmenu:hover {
	background: #EBB;
}
/* Rajout d'une petite fleche pour les sous menu */ 
#menu li.sousmenu {
 	background-repeat: no-repeat;
	background-position: 95% 50%;
}
#menu ul li {
	position: relative;
	list-style: none;
	border-bottom: 1px #B7B3B3 solid;
}
#menu ul ul {
	position: absolute;
	top: -1px;
	left: 100px;
	display: none
}
#menu li a {
	text-decoration: none;
	padding: 4px 0 4px 8px;
	display: block;
	border-left: 8px solid #E8BA33;
	width: 84px
}
#menu ul.niveau1 li.sousmenu:hover ul.niveau2, #menu ul.niveau2 li.sousmenu:hover ul.niveau3 {
	display: block;
}
#menu li a:hover {
	border-left-color: red;
}
#menu ul ul li a:hover {
	border-left-color: #00FF00;
}
#menu ul ul ul li a:hover {
	border-left-color: #0000FF;
} </style>
  
</td>   

<tr> 

<form action="" method="post" enctype="multipart/form-data" name="rame">  
 <td bgcolor="#FFFFFF" width="744" style="position:relative; top:5px; padding:10px;">
 <style>
 
#indexs, #indexs ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#E8BA33;
  width:230px;
 

}

#indexs a{
display:block;
 color:#FFFFFF;
 text-decoration:none;
 padding:10px;
 font-stretch:extra-expanded;
 	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 
	font-size:14px;

}

#indexs a:hover{
background-color:#B38D1C;
  padding:10px; 
  color:#FFFFFF;
 
}

#indexs li{
float:left;
position:relative;
 
 padding:0px;
}

#indexs ul {
position:absolute;
display:none;
 }

#indexs li ul a{
 
float:left;
 
 }

#indexs ul ul{
 

}	

#indexs li ul ul {
left:12em;
 
 }

#indexs li:hover ul ul, #indexs li:hover ul ul ul, #indexs li:hover ul ul ul ul{
display:none; 
 }
#indexs li:hover ul, #indexs li li:hover ul, #indexs li li li:hover ul, #indexs li li li li:hover ul{
display:block; 
 }
</style>
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
<tr><td bgcolor="#F0F0F0" width="800">
<table width="">
<tr> 
 
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
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory='images'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=images"; 	//your file name  (the name of this file)
	$limit = 24; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where kategory='images' order by id desc LIMIT $start, $limit";
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
 <? $x=0;
if($_REQUEST['dey'])
$where=" and date='$_REQUEST[dey]'";
else $where='';
//$sql="select * from kultura_cxrili  order by id desc limit $lim";
// echo $sql.mysql_error();
$a=mysqli_query($conn, $sql);
while ($b=mysqli_fetch_array($a))


{
 ?> 
 
<td valign="top" style="width:170px; padding-right:15px;">
 <img src="../<? echo $b['upload']; ?>" width="170" height="107" align="left">  
<? echo "<B>".$b['satauri']."</B>"; ?>&nbsp;&nbsp;&nbsp;<? echo $b['upload']; ?> 
<a href="index.php?do=update&id=<? echo $b['id']; ?>">  </a> 
 
<input type="checkbox"  name="del"  value="<? echo $b['id'];?>"  />
<input name="delete" type="submit"    value="delete" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background:transparent;"></div>
<hr color="#E1E1E1">  </td>	  	<? 
$x++;
if ($x==3) 
{
echo '<tr>';
$x=0;
} }
 ?> </tr>

</form>
 </table> <td>
    <tr>
     
 <? $w++;  echo $pagination;?> 

 
<td style="background-color: #F0F0F0;" width="744">
  
<form action="" method="post" enctype="multipart/form-data" name="rame">
<select  name="kategory" style="width:320px">
   <option value="images">images</option>
</select>		   
 
</p>


<input type="file"  name="upload" />

ატვირთე სურათი <br>  
 
 



<input type="file" name="mp3"> MP3 ფაილი <br />

<br>
<br>
<script type="text/javascript">
CKEDITOR.replace('agwera');
</script><script type="text/javascript">
CKEDITOR.replace('full');
</script>
<input type="submit"   name="submit" value="გამოქვეყნება"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
</form>
   <br>
   
  </td> 
   </tr>

  </table>   
	 



  