<?php
if (isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
	$b='images/'.$_FILES['upload']['name']; 

    
	
	
move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);

	
$personId = (int) $_POST['person_id'];
$partyId = 0;

if($personId>0){
	$x=mysql_query('select t.`party_id` from hc_persons t where t.`id`='.$personId);
	if($x){
		$z=mysql_fetch_array($x);
		$partyId = $z['party_id'];		
	}
}
#$sql="insert into kultura_cxrili (kategory, subkat, upload, upload2, upload3, upload4, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$b2', '$b3', '$b4', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";


$sql="insert into kultura_cxrili (kategory, subkat, upload, eng_geo, img_description, satauri, avtori, party_id, person_id, agwera, full, ena, menu, date, pos, news_date)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$_POST[eng_geo]', '$_POST[img_description]', '$_POST[satauri]', '$_POST[avtori]', '$partyId', '$personId', '$_REQUEST[agwera]', '$_REQUEST[full]', '$_REQUEST[ena]', '$_REQUEST[menu]', '$date', '0', '$_REQUEST[news_date]')";


mysql_query($sql);
  
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
 
  

 
 <table width="100%" align="center" cellpadding="0" cellspacing="0" style="margin:0; border-bottom:3px solid #E8BA33; margin-top:-32px; padding:0; z-index:1000000; position:fixed; background:#FFFFFF;"> 
 <tr> 
 <td valign="top">
 <table align="center" width="1000">
 <tr>
 <td valign="top" width="1000px" height="50px" style="background:#FFFFFF;">  
 
  
 <style>
 
#indexs2, #indexs2 ul{
 list-style-type:none;
list-style-position:outside;

  background-color:#E8BA33;
  width:80px;
  
  
 

}

#indexs2 a{
display:block;
 color:#000000;
 text-decoration:none;
 padding:4px;
 font-stretch:extra-expanded;
 	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 
	font-size:14px;
	  background-color:#FFFFFF;
	  


}

#indexs2 a:hover{
background-color:#E8BA33;
  padding:4px; 
  color:#FFFFFF;
 
}

#indexs2 li{
float:left;
position:relative;
 
 padding:0px;
}

#indexs2 ul {
position:absolute;
display:none;
 }

#indexs2 li ul a{
 
float:left;
 
 }

#indexs2 ul ul{
 

}	

#indexs2 li ul ul {
left:12em;
 
 }

#indexs2 li:hover ul ul, #indexs2 li:hover ul ul ul, #indexs2 li:hover ul ul ul ul{
display:none; 
 }
#indexs2 li:hover ul, #indexs2 li li:hover ul, #indexs2 li li li:hover ul, #indexs2 li li li li:hover ul{
display:block; 
 }
</style>
<div id="indexs2" style="color:#000000; position:relative; left:35px;"><li style="position:relative; margin-left:-39px;  z-index:100000; top:15px;"><a href="index.php"> &nbsp; Webster CMS</a></li>  </div>
 
<div style="position:relative; left:-122px; top:11px;" align="right">
<form action="index.php?do=search" method="post">

 
   <input type="text" onKeyPress="return makeGeo(this,event);" name="text" value="search..." 
    onblur="if(this.value=='') this.value='search...';"  onfocus="if(this.value=='search...') this.value='';" 
	style="border: 1px solid #999; height:22px; color:#585455; position:relative; top:5px;"  size="18" />
   <input name="Submit" type="submit" style="position:relative; top:5px; height:22px; left:-5px;
border: 1px solid #999;" value=">"/>   
</form> </div>

</td><td>  <div id="indexs1" style="color:#000000; position:relative; left:-64px;"><li style="position:relative; margin-left:-39px; width:70px; margin-top:6px;"><a href="index.php?logoff"> &nbsp; Log out</a></li>  </div>

 <style>
 
#indexs1, #indexs1 ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#E8BA33;
  width:80px;
  
  
 

}

#indexs1 a{
display:block;
 color:#666262;
 text-decoration:none;
 padding:4px;
 font-stretch:extra-expanded;
 	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 
	font-size:14px;
	  background-color:#E8BA33;
	  


}

#indexs1 a:hover{
background-color:#B38D1C;
  padding:4px; 
  color:#000000;
 
}

#indexs1 li{
float:left;
position:relative;
 
 padding:0px;
}

#indexs1 ul {
position:absolute;
display:none;
 }

#indexs1 li ul a{
 
float:left;
 
 }

#indexs1 ul ul{
 

}	

#indexs1 li ul ul {
left:12em;
 
 }

#indexs1 li:hover ul ul, #indexs1 li:hover ul ul ul, #indexs1 li:hover ul ul ul ul{
display:none; 
 }
#indexs1 li:hover ul, #indexs1 li li:hover ul, #indexs1 li li li:hover ul, #indexs1 li li li li:hover ul{
display:block; 
 }
</style>

 </td> 
 </tr>
  </table>
 
  </td> 
 </tr>
 </table>
  
 <table width="744px" style="position:relative; z-index:0; top:34px;"  align="center">
<tr>
<td width="744px" align="center" bgcolor="#FFFFFF" style="" id="linkebi"> 
<div id="menu" style="position:fixed; margin-left:-114px; top:65px;" align="left">
  <ul class="niveau1">
  <li style="background-color:#E8BA33; width:102px; height:25px; position:relative; margin-top:-6px; color:#FFFFFF;"> <span style="position:relative; font-size:26px; font-weight:bold; left:5px; top:-1px;"> &equiv; </span> <span style="position:relative; top:-6px; left:5px;"> Content </span>  </li>
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
        <li><a href="images.php">სურათების მენეჯერი</a> </li>
      </ul>
    </li>
    <li><a href="index.php?do=authors">ავტორები</a> </li>
      <li class="sousmenu"><a href="#">ენის შეცვლა</a>
      <ul class="niveau2">
              <li><a href="index.php?do=home">ქართული</a></li> 

        <li><a href="index.php?do=enghome">English</a></li> 
        </ul>
    </li>
             <li><a href="http://www.demo.ge/roundcube/" target="_blank">ელფოსტა</a></li>
<li style="height:2px; width:102px; background-color:#E8BA33;"> </li>
     
  </ul>
</div>
<style> 
#menu {
	z-index:50000;
	width: 100px;
	font-size:14px;
	border-top:3px solid #E8BA33;
	
	
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
	background: #F0F0F0;
}
#menu li.sousmenu:hover {
	background: #F0F0F0;
}
/* Rajout d'une petite fleche pour les sous menu */ 
#menu li.sousmenu {
 	background-repeat: no-repeat;
	background-position: 95% 50%;
	
	
}
#menu ul li {
	position: relative;
	list-style: none;
	
	
}
#menu ul ul {
	position: absolute;
	top: -1px;
	left: 100px;
	display: none;
	background-color:#F0F0F0;
	width:200px;
	
	
}
#menu li a {
	text-decoration: none;
	padding: 4px 0 4px 5px;
	display: block;
	border-left: 3px solid #E8BA33;
	border-right: 3px solid #E8BA33;
	border-bottom: 1px #CCC solid;

	width: 91px;
 }
 
 #menu ul ul li a
 {
	 	padding: 4px 0 4px 5px;
 background-color:#E8BA33;
color:#FFFFFF;
	 width:200px;
	 border-top:1px solid #FFFFFF;
	 }
	 
	 
 #menu ul ul li a:hover
 {
	 	padding: 4px 0 4px 5px;
border-right:0;
background-color:#F0F0F0;
color:#000000;
	 width:200px;
	 }
 
#menu ul.niveau1 li.sousmenu:hover ul.niveau2, #menu ul.niveau2 li.sousmenu:hover ul.niveau3 {
	display: block;
	width:200px;
	
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
 <td bgcolor="#FFFFFF" width="" style="position:relative; top:-4px; padding:10px; padding-bottom:0px;">
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
  <div style="background-color:#F0F0F0; padding:10px; margin-bottom:10px;"> <div id="indexs" style="color:#FFFFFF;">
   <a href="index.php"> <span style="font-size:20px; position:relative; font-weight:bold; margin-right:10px; 
   top:0px;"> &lt; </span> <span style="position:relative; top:-3px;"> საწყის გვერდზე დაბრუნება </span> </a> </div> </div>
 
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
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory='ვიდეო' AND eng_geo='Geo'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where kategory='ვიდეო' AND eng_geo='Geo' order by id desc LIMIT $start, $limit";
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
{
 ?> 

 <style>
		#im4 {
  height: 60px;
  transition: all .2s ease-in-out;
}

.cover4 {
  width: 80px;
  object-fit: cover;
  
  
}
.cover4:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s; }
	

	</style>

<div style="width:500px;">
<img src="../<? echo $b['upload'];?>" width="80" height="60" class="cover4" id="im4" align="left">  </div>

<? echo $b['satauri'];?>&nbsp;&nbsp;&nbsp;<div style="color:#FFF; border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background:#999; font-size:12px; width:190px;"><? echo $b['kategory'] ?> </div>
<a href="index.php?do=updatevideo&id=<? echo $b['id']; ?>"><img src="images/edit-icon.png" width="20" 
style="margin-top:3px; border:0px;"/> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href=""></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href=""> </a>  
<input type="checkbox"  name="del"  value="<? echo $b['id'];?>"  />
<input name="delete" type="submit"    value="delete" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background:transparent;">
<hr color="#E1E1E1"> <div id="linkebi">
	<? $w++;  }echo $pagination;?> </div> </form> <? 
if ($_REQUEST['addavt'])
{	

mysql_query("insert into gallery(avtori)values('$_POST[avtori]')");

  echo mysql_error();
 
}
if ($_REQUEST['avt_delete'])
mysql_query("delete from gallery where id='$_REQUEST[avt_id]'");

?> <form action="" method="post" enctype="multipart/form-data" >



  <br />
<input type="text" name="avtori" style="width:320px;" />
<input type="submit" name="addavt" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:transparent; ">
<br />
<select name="avt_id" style="width:320px;">
    <?
	 $avt=mysql_query("select * from  gallery order by id desc");
	 while($avts_id=mysql_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select> 
<input type="submit" name="avt_delete" value="delete" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:transparent;" /> 
</form><br>  
 
<form action="" method="post" enctype="multipart/form-data" name="rame"> 
 
 
  
		   
		   <hr>
           <br>

      <select  name="kategory" style="width:320px">
 
    <option value="ვიდეო">ვიდეო</option>
      </select>		   
  <br>
</p>

 <select  name="eng_geo" style="width:320px"> 
		   <option value="Geo" style="color:#FF0000">Geo</option>
      </select>

<br><br>
<input type="file"  name="upload" />
  <br>  
  

  

 
<textarea  name="satauri" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; width:320px; " ></textarea> <div style="position:relative; top:-90px; left: 590px">  </div> 
  
  <br>
  
     <div style="font-size:14px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; z-index:101;">  
          <script>
  $( function() {
	$("#news_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy-mm-dd",
      dateFormat: "yy-mm-dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#news_date").datepicker("option","maxDate", selected)
        }
    });
  } );
  </script>
          <p>
            <input type="text" name="news_date" id="news_date" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;" size="20" / > კალენდარი
        </div>
  <br><br>
 
<textarea  name="agwera" id="agwera" cols="70" rows="5" >&nbsp;</textarea>
<script type="text/javascript">
CKEDITOR.replace('agwera');
</script>
<br> <br> 
<textarea name="full" id="full" cols="70" rows="12"></textarea>

<script type="text/javascript">
CKEDITOR.replace('full');
</script>

<br><br>
 
   <input type="submit"   name="submit" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:transparent;" value="გამოქვეყნება"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
</form>
   <br>
   
  </td> 
   </tr>

  </table>   
	 



  