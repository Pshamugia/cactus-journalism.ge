<? if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  

include('../functions.php');


function makeMenu($root_id, $space, $edit_ids = '')
{
	global $conn;
	$ids = explode('|', $edit_ids);
	$res=mysqli_query($conn, "SELECT * FROM menu WHERE root_id=$root_id  ORDER by position DESC");
	while($menu=mysqli_fetch_assoc($res))
	{
		$res2 = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM menu WHERE root_id = '$menu[id]' ");
		$cnt = mysqli_fetch_assoc($res2);
		if($cnt['cnt'])
		{
			echo '<option value="'.$menu['id'].'" '.(in_array($menu['id'], $ids) ? 'selected' : '').'>'.str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $space).$menu['title_ka'].'</a>';
			makeMenu($menu['id'], $space+1, $edit_ids);
		}
		else
		{
			echo '<option value="'.$menu['id'].'" '.(in_array($menu['id'], $ids) ? 'selected' : '').'>'.str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $space).$menu['title_ka'].'</a>';		
		}
	}
}



if (isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
	
//$b='images/'.$_FILES['upload']['name'];
//move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);
    $b=''; 
	$b2=''; 
	$b3='';
	$b4=''; 
	$b5='';
	$b6='';  
    $b=[]; 

		$image_name = 'images/'.md5(time()).$_FILES['upload']['name'];
	if (resizeImage($_FILES['upload']['tmp_name'], '../'.$image_name))	
		$b[]=$image_name; 
 
#$sql="insert into kultura_cxrili (kategory, subkat, upload, upload2, upload3, upload4, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$b2', '$b3', '$b4', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";


// Assuming "news_date" is a key in an associative array
$sql = "INSERT INTO kultura_cxrili 
        (kategory, subkat, upload, satauri_ka, satauri_en, avtori, avtori2, agwera_ka, agwera_en, full_ka, full_en, date, news_date, ena, menu, view_count, eng_geo, img_description, hour, tags_geo, tags_eng, hidden) 
        VALUES 
        ('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b[0]', '$_REQUEST[satauri_ka]', '$_REQUEST[satauri_en]', '$_REQUEST[avtori]', '$_REQUEST[avtori2]', '$_REQUEST[agwera_ka]', '$_REQUEST[agwera_en]', '$_REQUEST[full_ka]', '$_REQUEST[full_en]', '$date', '".strtotime($_REQUEST['news_date'])."', '$_REQUEST[ena]', '$_REQUEST[menu]',  '".intval($_REQUEST['view_count'])."', '$_REQUEST[eng_geo]', '$_REQUEST[img_description]', '$_REQUEST[hour]', '$_REQUEST[tags_geo]', '$_REQUEST[tags_eng]', '".intval($_REQUEST['hidden'])."')";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("MySQL error: " . mysqli_error($conn));
}
	
 //exit(mysqli_error($conn)); 
 }


if ($_POST['delete'])
{
$x=mysqli_query($conn,"select * FROM kultura_cxrili where id='$_REQUEST[del]'");
$z=mysqli_fetch_array($x);
if ($z['surati'])
unlink('../'.$z['surati']);
mysqli_query($conn, "DELETE FROM kultura_cxrili where id='$_REQUEST[del]'");
 
}


?>

 

 
 
<style>
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

/* Style the close button */
.topright {
  float: right;
  cursor: pointer;
  font-size: 28px;
}

.topright:hover {color: red;}
</style>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Georgian')" id="defaultOpen">ქართული</button>
  <button class="tablinks" onclick="openCity(event, 'English')">English</button>
  <button class="tablinks" onclick="openCity(event, 'Russian')">Russian</button>
</div>

<div id="Georgian" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3>ქართული</h3>
  <p><style>
 
#indexs, #indexs ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#E8BA33;
  width:310px;
 

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
   
   <?php
   if ($_REQUEST['submit'])
   {

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
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory!='images' and kategory!='ფოტო' and kategory!='ვიდეო' order by id DESC";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php"; 	//your file name  (the name of this file)
	$limit = 1; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where kategory!='images' and kategory!='ფოტო' and kategory!='ვიდეო' order by id desc LIMIT $start, $limit";
	$result = mysqli_query($conn, $sql);

	
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
$a=mysqli_query($conn, $sql);
while ($b=mysqli_fetch_array($a))

{
 ?> 
 
<div>
<img src="../<? echo $b['upload'];?>" width="80" height="60" align="left">  </div>
<div style="width:744px; font-size:14px; padding-bottom:5px;"> <span style="position:relative; padding-left:3px; ">
<? echo $b['satauri_ka'];?> </span> </div> 
 <form action="" method="post" enctype="multipart/form-data" name="rame">  

  <input name="view" type="button"  formtarget="_new" value="შეთვალიერება" onClick="openNewTab()" style="font-size:12px;"> </a> 
 <script type="text/javascript">
    function openNewTab() {
        window.open("../../index.php?do=full&id=<? echo $b['id']; ?>/");
    }
</script> 
  <input name="ra" type="button" value="ჩასწორება"   onclick="window.location.href='index.php?do=update&id=<? echo $b['id']; ?>';"  style="font-size:12px;"> 

    <span style="padding-left:30px;"> <? echo $b['id'];?> </span>

<span style="position:relative; margin-left:30px; font-size:14px;  background:transparent; color:#000000;">

 
<?
$avt=mysqli_query($conn, "select * from avtorebi where id='$b[avtori]'");
	 $avts_id=mysqli_fetch_array($avt);
echo $avts_id['avtori']; 

 ?>  </span>
 
 <span style="position:relative; padding-left:30px; font-size:14px;"><? echo $b['kategory'] ?>  </span>
 
 <span style="position:relative; margin-left:30px; color:#000000; font-size:14px;"><? echo date("Y-m-d", $b['news_date']); ?> </span>
 
<hr color="#E1E1E1" style="width:744; position:relative; margin-top:18px; padding-top:1px;"> <span id="linkebi">
  </form>
	<? } } ?> </span> 
 
	
  

 
 
   
   <?
   
$r=mysqli_query($conn, "select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysqli_fetch_array($r); ?>


 <form action="" method="post" enctype="multipart/form-data" name="rame"> 

<? 
if ($_REQUEST['addavtor'])
{	
if(move_uploaded_file($_FILES['mp3']['tmp_name'], '../mp3/'.$_FILES['mp3']['name']))
$m='mp3/'.$_FILES['mp3']['name'];
else $m='';
mysqli_query($conn, "insert into avtorebi(avtori)values('$_POST[avtori]')");

  echo mysqli_error();
 
}
if ($_REQUEST['avtor_delete'])
mysqli_query($conn, "delete from avtorebi where id='$_REQUEST[avtoris_id]'");

?>  

  <br />
  
 

 
      
      
      
      
      <br><br>



  <select name="subkat" required style="width:320px; height:35px; margin-top:35px; background-color:#F0F0F0;">
			      <option value="" disabled selected hidden>გავუშვათ მთავარ გვერდზე </option>
	<option value="no">no</option> 
		   <option value="yes" style="color:#FF0000">yes</option>
      </select>   <br /> <br />
		   
		
	 
	 
	 
  <select name="kategory" required style="width:320px; height:35px; background-color:#F0F0F0;">
			      <option value="" disabled selected hidden> კატეგორიები </option> 
	  <?
	  makeMenu(0, 0);
	  ?>
                </select>		     <br>
</p>


<input type="file"  name="upload"  style="position:relative; width:320px; height:35px; margin-top:13px; background-color:#F0F0F0;" />

<span style="position:relative; margin-left:-65px; font-size:14px;"> სურათი </span> <br> 

<textarea  name="img_description" style="width:320px; height:35px; color:#000000; background-color:#F0F0F0; text-shadow:#000000;" placeholder='სურათის აღწერა'></textarea>  
  
<br>

 
     <div style="background-color:#EDEDED; height: 50px; width: 320px; z-index: 1000;"> <span style="font-size:14px; margin-top:15px;  padding-top:4px; width:320px; height:28px;">    მივაბათ კორპორაციული ლოგო? </span>
        <input type="checkbox" name="ena" value="1"/>
    
        კი
 
		 </div>
<br>
 
       <div style="background-color:#EDEDED; height: 50px; width: 320px; z-index: 1000;"> <span style="font-size:14px; margin-top:15px;  padding-top:4px; width:320px; height:28px;"> ერთიანი მასალა გაშლილად? </span>
        <input type="checkbox" name="menu" value="1" style="transform: scale(1.5); top:8px; width:15px;" />
    
        კი </div>

 
        <br>         <br />
     
     
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
            <input type="text" name="news_date" value="კალენდარი" id="news_date" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; width:320px; height:35px; padding-bottom:15px; background-color:#F0F0F0; top:12px; z-index:101;"  / >  
        </span>
        <br/> 
         <br/>
                
 საათი და წუთი <br>
        <input type="text" name="hour" id="hour" value="<?php date_default_timezone_set('UTC+04:00/Tbilisi');
		echo date( "H:i"); ?>" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;" size="12" / >
       
       
       
       
       <br> 
 <style>
	 #tags_geo svg{cursor: pointer}
	  #tags_eng svg{cursor: pointer}
</style>
        <!--START TAGS - თეგების დასაწყისი -->
 <span style="position:relative; ">

 <script type="text/javascript"> function existingTagGeo(text)
{
	var existing = false,
		text = text.toLowerCase();

	$("#tags_geo").each(function(){
		if ($(this).text().toLowerCase() == text)
		{
			existing = true;
			return "";
		}
	});

	return existing;
}

$(function(){
  $("#tags-new_geo input").focus();

  $("#tags-new_geo input").keyup(function(){

		var tag = $(this).val().trim(),
		length = tag.length;

		if((tag.charAt(length - 1) == ',') && (tag != ","))
		{
			tag = tag.substring(0, length - 1);

			if(!existingTagGeo(tag))
			{
				$('<li class="tags" id="tags_geo"><span>' + tag + '</span><i class="fa fa-times"></i></li>').insertBefore($("#tags-new_geo"));
				$('#save_tags_geo').val($('#save_tags_geo').val() + "," + tag)
				$(this).val("");
			}
			else
			{
				$(this).val(tag);
			}
		}
	});

  $(document).on("click", "#tags_geo svg", function(){
	  var text = $(this).parent().text();
	  var tags_str = $('#save_tags_geo').val();
	  tags_str = tags_str.replace(','+text, '');
	  $('#save_tags_geo').val(tags_str);
    $(this).parent("li").remove();
 
  });

});
                                 </script>
                                 <style> @charset "utf-8";
/* CSS Document */



#wrapper
{
    position:relative;

    width:720px;
    height:50px;
	color:#FF6063;
  }

 

.tags-input
{
  	list-style : none;
  	border:1px solid #ccc;
  	display:inline-block;
  	padding:5px;
  	height: 26px;
    font-size:14px;
    background:#f3f3f3;
    width:720px;
    border-radius:2px;
    overflow:hidden;
}

.tags-input li
{
  	float:left;
}

.tags
{
  	background:#28343d;
  	padding:5px 20px 5px 8px;
  	border-radius:2px;
  	margin-right: 5px;
  	position: relative;
	color: #FFFFFF
}

.tags i
{
	position: absolute;
	right:6px;
	top:3px;
	width: 8px;
	height: 8px;
	content:'';
	cursor:pointer;
	opacity: .7;
  font-size:12px;
}

.tags i:hover
{
	opacity: 1;
}

.tags-new input[type="text"]
{
  border:0;
	margin: 0;
	padding: 0 0 0 3px;
	font-size: 14px;
	margin-top: 5px;
  background:transparent;
}

.tags-new input[type="text"]:focus
{
  	outline:none;
} </style>

 <span id="wrapper">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
   <ul class="tags-input" id="tags-input_geo" style="height:auto; width:750px;">
    <li class="tags" id="tags_geo" style="background-color:#B9B8B8; color:#000000;">TAGS <i class="fa fa-times"></i></li>
	<?
		$tags = explode(',', $data['tags_geo']);
		foreach($tags as $tag)
		{
			if(!empty($tag))
			{
	?>
	<li class="tags" id="tags_geo"><?=$tag?><i class="fa fa-times"></i></li>
	<?
			}
		}
	?>
    <li class="tags-new" id="tags-new_geo" style="color:#D70003;">
      <input type="text" id="tags_geo">
	  <input type="hidden" name="tags_geo" id="save_tags_geo" value="<?=$data['tags_geo']?>"/>
    </li>
  </ul>
</span> </soan>
 <!--END OF TAGS - თეგების დასასრული -->
       
       
        
        <br>
        
        <select name="avtori" style="width:320px; height:35px; margin-top:35px; background-color:#F0F0F0;">
<option value="0" name='მონიშნე ავტორი'> მონიშნე ავტორი </option>
     <?
	 $avt=mysqli_query($conn, "select * from  avtorebi order by id desc");
	 while($avts_id=mysqli_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select>   


 

<br>
 <br>  
<textarea  name="satauri_ka" style=" background-color:#FFFFFF; width:100%; "  placeholder="სათაური"></textarea> 
 
<span> <SCRIPT TYPE="text/javascript">
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=650,height=600,scrollbars=yes');
return false;
}
//-->
</SCRIPT>    <A HREF="index.php?do=images" 
   onClick="return popup(this, 'notes')" id="">IMAGE MANAGER POPUP</A>  </span>
 
<textarea name="agwera_ka" id="agwera_ka" cols="70" rows="5" placeholder="აღწერა" > </textarea>
 
<script type="text/javascript">
CKEDITOR.replace('agwera_ka');
</script> 

<textarea name="full_ka" id="full_ka" cols="70" rows="12"> სრული </textarea>

<script type="text/javascript">
CKEDITOR.replace('full_ka');
</script> 



 
 
 

 


<span> <br>
   <input type="submit"   name="submit" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:#C7191C; color:#FFFFFF; height:35px; z-index:101;" value="გამოქვეყნება"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   

 </span>
   
 

	 </p>
</div>

<div id="English" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3>English</h3>
  <p><style>
 
#indexs, #indexs ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#E8BA33;
  width:310px;
 

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
   
   <?php
   if ($_REQUEST['submit'])
   {

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
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory!='images' and kategory!='ფოტო' and kategory!='ვიდეო' order by id DESC";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php"; 	//your file name  (the name of this file)
	$limit = 1; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where kategory!='images' and kategory!='ფოტო' and kategory!='ვიდეო' order by id desc LIMIT $start, $limit";
	$result = mysqli_query($conn, $sql);

	
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
$a=mysqli_query($conn, $sql);
while ($b=mysqli_fetch_array($a))

{
 ?> 
 
<div>
<img src="../<? echo $b['upload'];?>" width="80" height="60" align="left">  </div>
<div style="width:744px; font-size:14px; padding-bottom:5px;"> <span style="position:relative; padding-left:3px; ">
<? echo $b['satauri_en'];?> </span> </div> 
 <form action="" method="post" enctype="multipart/form-data" name="rame">  

  <input name="view" type="button"  formtarget="_new" value="შეთვალიერება" onClick="openNewTab()" style="font-size:12px;"> </a> 
 <script type="text/javascript">
    function openNewTab() {
        window.open("../../index.php?do=full&id=<? echo $b['id']; ?>/");
    }
</script> 
  <input name="ra" type="button" value="ჩასწორება"   onclick="window.location.href='index.php?do=update&id=<? echo $b['id']; ?>';"  style="font-size:12px;"> 

    <span style="padding-left:30px;"> <? echo $b['id'];?> </span>

<span style="position:relative; margin-left:30px; font-size:14px;  background:transparent; color:#000000;">

 
<?
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
	 $avts_id=mysqli_fetch_array($avt);
echo $avts_id['avtori']; 

 ?>  </span>
 
 <span style="position:relative; padding-left:30px; font-size:14px;"><? 
	$res = mysqli_query($conn, "SELECT * FROM menu where id='$b[kategory]'");
	$data = mysqli_fetch_assoc($res);
	echo $data['title_ka']; ?>  </span>
 
 <span style="position:relative; margin-left:30px; color:#000000; font-size:14px;"><? echo date("Y-m-d", $b['news_date']); ?> </span>
 
<hr color="#E1E1E1" style="width:744; position:relative; margin-top:18px; padding-top:1px;"> <span id="linkebi">
  </form>
	<? } } ?> </span> 
 
	
  

 
 
   
   <?
   
$r=mysqli_query($conn, "select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysqli_fetch_array($r); ?>


 
<? 
if ($_REQUEST['addavtor'])
{	

mysqli_query($conn, "insert into avtorebi(avtori)values('$_POST[avtori]')");

  echo mysqli_error();
 
}
if ($_REQUEST['avtor_delete'])
mysqli_query($conn, "delete from avtorebi where id='$_REQUEST[avtori]'");

?>  

  <br />
  
  
      
    
		   
</p>

  
     

          <p>
            <input type="text" name="news_dateEng" value="კალენდარი" id="news_dateEng" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; width:320px; height:35px; padding-bottom:15px; background-color:#F0F0F0; top:12px; z-index:101;"  / >  
        </span>
        <br/> 
         <br/>           <script>
  $( function() {
	$("#news_dateEng").datepicker({ 
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
                
 საათი და წუთი <br>
        <input type="text" name="hourEng" id="hourEng" value="<?php date_default_timezone_set('UTC+04:00/Tbilisi');
		echo date( "H:i"); ?>" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;" size="12" / >
       
       
       
       
       <br> 
      
        <!--START TAGS - თეგების დასაწყისი -->
 <span style="position:relative; ">

 <script type="text/javascript"> function existingTagEng(text)
{
	var existing = false,
		text = text.toLowerCase();

	$("#tags_eng").each(function(){
		if ($(this).text().toLowerCase() == text)
		{
			existing = true;
			return "";
		}
	});

	return existing;
}

$(function(){
  $("#tags-new_eng input").focus();

  $("#tags-new_eng input").keyup(function(){

		var tag = $(this).val().trim(),
		length = tag.length;

		if((tag.charAt(length - 1) == ',') && (tag != ","))
		{
			tag = tag.substring(0, length - 1);

			if(!existingTagEng(tag))
			{
				$('<li class="tags" id="tags_eng"><span>' + tag + '</span><i class="fa fa-times"></i> </li>').insertBefore($("#tags-new_eng"));
				$('#save_tags_eng').val($('#save_tags_eng').val() + "," + tag)
				$(this).val("");
			}
			else
			{
				$(this).val(tag);
			}
		}
	});

  $(document).on("click", "#tags_eng svg", function(){
	  var text = $(this).parent().text();
	  var tags_str = $('#save_tags_eng').val();
	  tags_str = tags_str.replace(','+text, '');
	  $('#save_tags_eng').val(tags_str);
    $(this).parent("li").remove();
 
  });

});
                                 </script>
                           

 <span id="wrapper">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
   <ul class="tags-input" id="tags-input_eng"  style="height:auto; width:750px;">
    <li class="tags" id="tags_eng" style="background-color:#B9B8B8; color:#000000;">TAGS <i class="fa fa-times"></i></li>
	<?
		$tags = explode(',', $data['tags_eng']);
		foreach($tags as $tag)
		{
			if(!empty($tag))
			{
	?>
	<li class="tags" id="tags_eng"><?=$tag?><i class="fa fa-times"></i></li>
	<?
			}
		}
	?>
    <li class="tags-new" id="tags-new_eng" style="color:#D70003;">
      <input type="text" id="tags_eng">
	  <input type="hidden" name="tags_eng" id="save_tags_eng" value="<?=$data['tags_eng']?>"/>
    </li>
  </ul>
</span> </soan>
 <!--END OF TAGS - თეგების დასასრული -->
       
       
        
        <br>
        
        <select name="avtori2" style="width:320px; height:35px; margin-top:35px; background-color:#F0F0F0;">
			      <option value="" disabled selected hidden> Select the author </option>

     <?
	 $avt=mysqli_query($conn, "select * from  avtori_new order by id desc");
	 while($res=mysqli_fetch_array($avt))
	 {
	echo "<option value='".$res['id']."'>".$res['avtori2']."</option>";			 
	 }
     ?>
</select>  


 

<br>
 <br>  
<textarea  name="satauri_en" style=" background-color:#FFFFFF; width:100%; "  placeholder="სათაური"></textarea> 
 
<span> <SCRIPT TYPE="text/javascript">
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=650,height=600,scrollbars=yes');
return false;
}
//-->
</SCRIPT>    <A HREF="index.php?do=images" 
   onClick="return popup(this, 'notes')" id="">IMAGE MANAGER POPUP</A>  </span>

<textarea  name="agwera_en" id="agweraEng" cols="70" rows="5" >&nbsp;</textarea>
 <script type="text/javascript">
CKEDITOR.replace('agwera_en');
</script> 

<textarea name="full_en" id="full_en" cols="70" rows="12"> სრული </textarea>

<script type="text/javascript">
CKEDITOR.replace('full_en');
</script> 

 
 
 
 

 


<span> <br>
    
   
</form>
 </span>
   
 </p> 
</div>

<div id="Russian" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3>Russian</h3>
  <p>Russian content goes here</p></span>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>



<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/chart-area-demo.js"></script>
        <script src="dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/datatables-demo.js"></script>






  