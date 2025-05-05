<?
error_reporting(0);
if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  
include('../functions.php');

 
	
	$r = mysqli_query($conn, "select * from kultura_cxrili where id='$_REQUEST[id]'");
    $data = mysqli_fetch_array($r);
	
$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
$sql = "UPDATE kultura_cxrili SET editor='{$_SESSION['sesia']}' WHERE id=$id";
mysqli_query($conn, $sql);


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


	
if (isset($_REQUEST['submit'])) {
    $date = date('d.m.Y');
    $b = '';
    $b2 = '';
    $b3 = '';
    $b4 = '';
    $b5 = '';
    $b6 = '';

    // Check if the 'upload' key exists in the $_FILES array
    if (isset($_FILES['upload'])) {
        $image_name = 'images/' . md5(time()) . $_FILES['upload']['name'];

        // Check if the file exists before calling resizeImage
        if (!empty($_FILES['upload']['tmp_name']) && is_uploaded_file($_FILES['upload']['tmp_name'])) {
            if (resizeImage($_FILES['upload']['tmp_name'], '../' . $image_name)) {
                $b = $image_name;
            } else {
                // Handle the case where resizing the image failed
                echo "Error: Image resizing failed.";
                $b = $data['upload']; // Set $b to the existing value in the database or an appropriate default value
            }
        } else {
            // Handle the case where no file was uploaded
            echo "No picture uploaded.";
            $b = $data['upload']; // Set $b to the existing value in the database or an appropriate default value
        }
    } else {
        // Handle the case where the 'upload' key is not present in the form
        echo "Error: 'upload' key not found in \$_FILES array.";
        $b = $data['upload']; // Set $b to the existing value in the database or an appropriate default value
    }

    $sql = "UPDATE kultura_cxrili SET kategory='$_REQUEST[kategory]', subkat='$_REQUEST[subkat]', tags_geo='$_REQUEST[tags_geo]', tags_eng='$_REQUEST[tags_eng]', upload='$b', eng_geo='$_REQUEST[eng_geo]', img_description='$_REQUEST[img_description]', satauri_ka='$_REQUEST[satauri_ka]', satauri_en='$_REQUEST[satauri_en]', avtori='$_REQUEST[avtori]', avtori2='$_REQUEST[avtori2]', agwera_ka='$_REQUEST[agwera_ka]', agwera_en='$_REQUEST[agwera_en]', full_ka='$_REQUEST[full_ka]', full_en='$_REQUEST[full_en]', ena='$_REQUEST[ena]', menu='$_REQUEST[menu]', news_date='".strtotime($_REQUEST['news_date'])."', hour='$_REQUEST[hour]' WHERE id='$_REQUEST[id]'";
    mysqli_query($conn, $sql);

    $r = mysqli_query($conn, "SELECT * FROM kultura_cxrili WHERE id='$_REQUEST[id]'");
    $data = mysqli_fetch_array($r);
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



<table width="1000px" align="left" style="position: relative; top: 20px;">
<tr>
<td align="left" valign="top" bgcolor="#FFFFFF" style="padding-top:33px; padding-left:150px;"> 

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Georgian')" id="defaultOpen">ქართული</button>
  <button class="tablinks" onclick="openCity(event, 'English')">English</button>
  <button class="tablinks" onclick="openCity(event, 'Russian')">Russian</button>
</div>


<div id="Georgian" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
  <h3>ქართული</h3>
  <p>
  
  
  
  
  
<form action="" method="post" enctype="multipart/form-data" name="rame">
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
   

   <?php 
	if ($_REQUEST['submit'])
	{
$r=mysqli_query($conn, "select * from kultura_cxrili where id='$_REQUEST[id]'");
while($b=mysqli_fetch_array($r))
{
	
 ?>
 
 
 
 
       

 <br>
	<div style="position: relative; height: 72px; padding: 5px; border:1px solid #000000;">
 <span style="background-color:#FFFFFF;  padding-top:5px; padding-bottom:15px;">

<span style="position:relative; margin-right:20px;">
<img src="../<? echo $b['upload'];?>" width="80" height="60" align="left">  </span>
<span style="width:744px; font-size:14px; padding-bottom:5px;"> <span style="position:relative; padding-left:3px; ">
<? echo $b['satauri_ka'];?> </span> </span>

<span style="padding-top:3px;" id="gverditi">
   <input name="view" type="button"  formtarget="_new" value="შეთვალიერება" onClick="openNewTab()" style="font-size:12px;">
 <script type="text/javascript">
    function openNewTab() {
        window.open("../index.php?do=full&id=<? echo $b['id']; ?>/");
    }
</script>


<span style="position:relative; margin-left:30px; font-size:14px;  background:transparent; color:#000000;">


<?
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori_geo]'");
	 $avts_id=mysqli_fetch_array($avt);
echo $avts_id['avtori'];

 ?>  </span>

 <span style="position:relative; padding-left:30px; font-size:14px;"><? 
	$res = mysqli_query($conn, "SELECT * FROM menu where id='$b[kategory]'");
	$data = mysqli_fetch_assoc($res);
	echo $data['title_ka']; ?>  </span>

 <span style="position:relative; margin-left:30px; color:#000000; font-size:14px;"><? echo date("Y-m-d", $b['news_date']); ?> </span>

	<? } }  ?>   </form> 




 


            <form action="" method="post" enctype="multipart/form-data" name="rame" style="position:relative; margin-top:10px;">


  

      <br>

        <select  name="subkat" style="width:320px; height:35px;">
          <option value="top">გავუშვათ მთავარ გვერდზე</option>
          <option <?=($data['subkat']=='no')?'selected':''?> value="no">no</option>
          <option <?=($data['subkat']=='yes')?'selected':''?> value="yes" style="color:#FF0000">yes</option>
        </select>
        <br />
        <br />
        <select  name="kategory" style="width:320px; height:35px;">
			
			<?
	  makeMenu(0, 0, $data['kategory']);
	  ?>   </select>
       <br> <br>
       
   
  
      <div style="background-color:#EDEDED; height: 50px; width: 320px; z-index: 1000;"> <span style="font-size:14px; margin-top:15px;  padding-top:4px; width:320px; height:28px;">
        <span style="font-size:12px;"> მივაბათ კორპორაციული ლოგო? </span>
        <input type="checkbox" name="ena" <?=($data['ena']=='1')?'checked':''?> value="1"/>
        კი
       
		  </div>
        <br />
				
		 
       
        
        <div style="background-color:#EDEDED; height: 50px; width: 320px; z-index: 1000;"> <span style="font-size:14px; margin-top:15px;  padding-top:4px; width:320px; height:28px;"> <span style="font-size:12px;"> გაშლილი მასალა? </span>
        <input type="checkbox" name="menu" <?=($data['menu']=='1')?'checked':''?> value="1"/>
        კი
			</div>
				

        <input type="file" name="upload">
          <img src="../<? echo $data['upload'];?>" width="90" height="50" style="position:relative; right:-7px;"><br>
        <textarea  name="img_description" placeholder="სურათის აღწერა" style="width:320px; height:35px;" > <? echo $data['img_description']; ?> </textarea>
        <br />
        <br />

          


        <br />
<br>

        <span style="font-size:14px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; z-index:101;">
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
            <input type="text" value="<? echo date("Y-m-d", $data['news_date']); ?>" name="news_date" id="news_date" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; width:320px; height:35px;" size="12" / >
		 
        </span>
 
       <input type="text" value="<?php 
		if ($data['hour']>59)
		
		{
			echo "error";
			}
		
		else
		{
		echo $data['hour']; } ?>" name="hour" id="hour" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;" size="12" / >
     
        <br/>


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
	color: aliceblue;
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
 

 <br><br> <br><br> <br><br>
 
   <select name="avtori" style="width:320px; height:35px;">  ავტორი <br>
     <?
	 $avt=mysqli_query($conn, "select * from  avtorebi");
	 while($avts_id=mysqli_fetch_array($avt))
	 {
		 if($data['avtori']==$avts_id['id']){
			 $selected='selected';
		 }
		 else{
			 $selected='';
		 }
	echo "<option value='".$avts_id['id']."' ".$selected.">".$avts_id['avtori_geo']."</option>";
	 }
     ?>
</select>
 
 <br><br>
                <textarea  name="satauri_ka" style="border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border: 1px solid #999; background-color:#FFFFFF; width:100%;" > <? echo $data['satauri_ka']; ?></textarea>
<br>
        <textarea name="agwera_ka" id="agwera_ka" cols="85"><? echo $data['agwera_ka']; ?></textarea>
        <script type="text/javascript">
CKEDITOR.replace('agwera_ka');
</script>
        <br>
        <br>
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
</SCRIPT> <A HREF="index.php?do=images"
   onClick="return popup(this, 'notes')" id="">IMAGE MANAGER POPUP</A> </span>

        <textarea name="full_ka" cols="85" rows="5" id="full_ka"> <? echo $data['full_ka']; ?></textarea>
        <script type="text/javascript">
CKEDITOR.replace('full_ka');
</script>
        <br>
        
    
  
  
  
  
  
 
  </p>  </div></div>


<div id="English" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
  <h3>English</h3>
  <p>
    
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
	$query = "SELECT COUNT(*) as num FROM $tbl_name where id='$_request[id]'";
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

	$sql = "SELECT * FROM $tbl_name where id='$_REQUEST[id]' order by id desc LIMIT $start, $limit";
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
 
 
 
       

 <br>
 <span style="background-color:#FFFFFF;  padding-top:5px; padding-bottom:15px;">

<span style="position:relative; margin-right:20px;">
<img src="../<? echo $b['upload'];?>" width="80" height="60" align="left">  </span>
<span style="width:744px; font-size:14px; padding-bottom:5px;"> <span style="position:relative; padding-left:3px; ">
<? echo $b['satauri_en'];?> </span> </span>

<span style="padding-top:3px;" id="gverditi">
   <input name="view" type="button"  formtarget="_new" value="შეთვალიერება" onClick="openNewTab()" style="font-size:12px;">
 <script type="text/javascript">
    function openNewTab() {
        window.open("../index.php?do=full&id=<? echo $b['id']; ?>/");
    }
</script>


<span style="position:relative; margin-left:30px; font-size:14px;  background:transparent; color:#000000;">


<?
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori_eng]'");
	 $avts_id=mysqli_fetch_array($avt);
echo $avts_id['avtori_eng'];

 ?>  </span>

 <span style="position:relative; padding-left:30px; font-size:14px;"><? echo $b['kategory'] ?>  </span>

 <span style="position:relative; margin-left:30px; color:#000000; font-size:14px;"><? echo date("Y-m-d", $b['news_date']); ?> </span>

	<? } } ?>   




 


 
 

      <br>

    
        
         
    
       <br> <br>
       
   
  
 

      

  


    
 
      
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
				$('<li class="tags" id="tags_eng"><span>' + tag + '</span><i class="fa fa-times"></i></i></li>').insertBefore($("#tags-new_eng"));
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
 

 <br><br> <br><br> <br><br>
 
   <select name="avtori" style="width:320px; height:35px;">  ავტორი <br>
     <?
	 $avt=mysqli_query($conn, "select * from  avtorebi");
	 while($avts_id=mysqli_fetch_array($avt))
	 {
		 if($data['avtori']==$avts_id['id']){
			 $selected='selected';
		 }
		 else{
			 $selected='';
		 }
	echo "<option value='".$avts_id['id']."' ".$selected.">".$avts_id['avtori_eng']."</option>";
	 }
     ?>
</select>
 
 <br><br>
                <textarea  name="satauri_en" style="border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border: 1px solid #999; background-color:#FFFFFF; width:100%;" > <? echo $data['satauri_en']; ?></textarea>
<br>
        <textarea name="agwera_en" id="agwera_en" cols="85"><? echo $data['agwera_en']; ?></textarea>
        <script type="text/javascript">
CKEDITOR.replace('agwera_en');
</script>
        <br>
        <br>
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
</SCRIPT> <A HREF="index.php?do=images"
   onClick="return popup(this, 'notes')" id="">IMAGE MANAGER POPUP</A> </span>

        <textarea name="full_en" cols="85" rows="5" id="full_en"> <? echo $data['full_en']; ?></textarea>
        <script type="text/javascript">
CKEDITOR.replace('full_en');
</script>
        <br>
        
        
  
  
  
  
  
  </p> </div>

<div id="Russian" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3>Russian</h3>
  <p>Russian content goes here</p></span>
</div>

        <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
        <input type="submit" style="border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border: 1px solid #999; background-color:#C7191C; color:#FFFFFF; height:35px; z-index:101;" name="submit" value="გამოქვეყნება">
       
      </form> 
  










 
</td> </tr></table>





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
