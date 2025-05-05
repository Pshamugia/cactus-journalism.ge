<? if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  

include('../functions.php');


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


$sql="insert into kultura_cxrili (kategory, subkat, upload, satauri, avtori, avtori2, agwera, full, date, news_date, ena, menu, view_count, eng_geo, img_description, hour, tags, hidden) VALUES('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b[0]', '$_REQUEST[satauri]', '$_REQUEST[avtori]', '$_REQUEST[avtori2]', '$_REQUEST[agwera]', '$_REQUEST[full]',  '$date', '".strtotime($_REQUEST[news_date])."', '$_REQUEST[ena]', '$_REQUEST[menu]',  '".intval($_REQUEST[view_count])."', '$_REQUEST[eng_geo]', '$_REQUEST[img_description]', '$_REQUEST[hour]', '$_REQUEST[tags]', '".intval($_REQUEST[hidden])."')";


mysqli_query($conn, $sql);
 //exit(mysqli_error($conn)); 
	echo mysqli_error();
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


  

<tr> 

 <style>
 
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
 <td bgcolor="#FFFFFF" width="744" style="position:relative; top:-4px; padding:10px; padding-bottom:0px;">

<div>
<img src="../<? echo $b['upload'];?>" width="80" height="60" align="left">  </div>
<div style="width:744px; font-size:14px; padding-bottom:5px;"> <span style="position:relative; padding-left:3px; ">
<? echo $b['satauri'];?> </span> </div> 
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
 
 <span style="position:relative; padding-left:30px; font-size:14px;"><? echo $b['kategory'] ?>  </span>
 
 <span style="position:relative; margin-left:30px; color:#000000; font-size:14px;"><? echo $b['news_date']; ?> </span>
 
<hr color="#E1E1E1" style="width:744; position:relative; margin-top:18px; padding-top:1px;"> <div id="linkebi">
  </form>
	<? } } ?> </div></td></tr>
 
	
  

   <td valign="top" style="position:relative; padding-left:10px; width:700px;">

 
   
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
mysqli_query($conn, "insert into avtorebi(avtori,mp3)values('$_POST[avtori]','$m')");

  echo mysqli_error();
 
}
if ($_REQUEST['avtor_delete'])
mysqli_query($conn, "delete from avtorebi where id='$_REQUEST[avtoris_id]'");

?>  

  <br />
  
 
<?php /*?>
 <select  name="eng_geo" style="width:320px; height:35px; background-color:#F0F0F0;">
 <option value="0">აირჩიე ენა</option> 
	<option value="Geo">Geo</option> 
		   <option value="Eng">Eng</option>
      </select>
      <?php */?>
      
      
      
      <br><br>


 <select name="subkat" style="width:320px; height:35px; background-color:#F0F0F0;">
 <option value="0" >გავუშვათ მთავარ გვერდზე </option>
	<option value="no">no</option> 
		   <option value="yes" style="color:#FF0000">yes</option>
      </select>   <br /> <br />
		   
		   

  <select  name="kategory" style="width:320px; height:35px; background-color:#F0F0F0;">
        <option value="">კატეგორიები</option>
      <option value="კარიკატურები">კარიკატურები</option>
      <option value="ფოტოკატურები">ფოტოკატურები</option>
	   <option value="მიმიკატურები">მიმიკატურები</option>
	  <option value="კუბები">კუბები</option>
      <option value="მორბენალი სტრიქონი">მორბენალი სტრიქონი</option>
	  <option value="ჩვენ შესახებ">ჩვენ შესახებ</option>
                </select>		     <br>
</p>


<input type="file"  name="upload"  style="position:relative; width:320px; height:35px; margin-top:13px; background-color:#F0F0F0;" />

<span style="position:relative; margin-left:-65px; font-size:14px;"> სურათი </span> <br> 

<textarea  name="img_description" style="width:320px; height:35px; color:#000000; background-color:#F0F0F0; text-shadow:#000000;" placeholder='სურათის აღწერა'></textarea>  
  
<br>

 
        <div style="font-size:14px; background-color:#F0F0F0; margin-top:15px; border:1px solid #BCBCBC; padding-top:4px; width:320px; height:28px;"> მივაბათ კორპორაციული ლოგო? </span>
        <input type="checkbox" name="ena" value="1"/>
    
        კი
 
 
	   <br>         <br /> </div>
	   
	   
	    <div style="font-size:14px; background-color:#F0F0F0; margin-top:15px; border:1px solid #BCBCBC; padding-top:4px; width:320px; height:28px;"> ანონიმური ავტორი </span>
        <input type="checkbox" name="menu" value="1"/>
    
        კი
 
 
<br>         <br /> </div>  <br><br>
	   
	   
     
     
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
            <input type="text"  name="news_date" id="news_date" placeholder = "კალენდარი" autocomplete="off"  required  style=" width:320px;  height:35px; padding-bottom:15px; background-color:#F0F0F0; top:12px; z-index:101;"  / >  
        </div>
        <br/> 
         <br/>
               <p style="font-size:14px; padding-top:12px;">
 საათი და წუთი <br>
        <input type="text" name="hour" id="hour" value="<?php date_default_timezone_set('UTC+04:00/Tbilisi');
		echo date( "H:i"); ?>" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;" size="12" / >
       
       
       
       
       <br> 
       
          <!--START TAGS - თეგების დასაწყისი -->
 <div style="position:relative; ">

 <script type="text/javascript"> function existingTag(text)
{
	var existing = false,
		text = text.toLowerCase();

	$(".tags").each(function(){
		if ($(this).text().toLowerCase() == text)
		{
			existing = true;
			return "";
		}
	});

	return existing;
}

$(function(){
  $(".tags-new input").focus();

  $(".tags-new input").keyup(function(){

		var tag = $(this).val().trim(),
		length = tag.length;

		if((tag.charAt(length - 1) == ',') && (tag != ","))
		{
			tag = tag.substring(0, length - 1);

			if(!existingTag(tag))
			{
				$('<li class="tags"><span>' + tag + '</span><i class="fa fa-times"></i></i></li>').insertBefore($(".tags-new"));
				$('#save_tags').val($('#save_tags').val() + "," + tag)
				$(this).val("");
			}
			else
			{
				$(this).val(tag);
			}
		}
	});

  $(document).on("click", ".tags i", function(){
	  var text = $(this).parent().text();
	  var tags_str = $('#save_tags').val();
	  tags_str = tags_str.replace(','+text, '');
	  $('#save_tags').val(tags_str);
    $(this).parent("li").remove();
 
  });

});
                                 </script>
                                 <style> @charset "utf-8";
/* CSS Document */



#wrapper
{
    position:absolute;

    width:720px;
    height:50px;
	color:#FF6063;
  }

p
{
  margin:0 0 5px 0;
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

 <div id="wrapper">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
   <ul class="tags-input">
    <li class="tags" style="background-color:#B9B8B8; color:#000000;">TAGS <i class="fa fa-times"></i></li>
	<?
		$tags = explode(',', $data['tags']);
		foreach($tags as $tag)
		{
			if(!empty($tag))
			{
	?>
	<li class="tags"><?=$tag?><i class="fa fa-times"></i></li>
	<?
			}
		}
	?>
    <li class="tags-new" style="color:#D70003;">
      <input type="text" id="tags" >
	  <input type="hidden" name="tags" id="save_tags" required value="<?=$data['tags']?>"/>
    </li>
  </ul>
</div> </div>
 <!--END OF TAGS - თეგების დასასრული -->
       
       
        
        <br>
         <!-- კარიკატურის ავტორი -->
        <select name="avtori" required style="width:320px; height:35px; margin-top:35px; background-color:#F0F0F0;">
			      <option value="" disabled selected hidden>მონიშნე კარიკატურის ავტორი </option>

     <?
	 $avt=mysqli_query($conn, "select * from  avtorebi order by id desc");
	 while($avts_id=mysqli_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select>   


     <!-- იდეის ავტორი -->

    <select name="avtori2" style="width:320px; height:35px; margin-top:35px; background-color:#F0F0F0;">
			      <option value="" disabled selected hidden>მონიშნე იდეის ავტორი </option>

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
<textarea  name="satauri" style=" background-color:#FFFFFF; width:100%; "  placeholder="სათაური"></textarea> 
 
<div> <SCRIPT TYPE="text/javascript">
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
   onClick="return popup(this, 'notes')" id="">IMAGE MANAGER POPUP</A>  </div>

<textarea  name="agwera" id="agwera" cols="70" rows="5" >&nbsp;</textarea>
<script type="text/javascript">
CKEDITOR.replace('agwera');
</script>

 <div style="position:relative; top:-140px; left: 590px">   </div>
 
 
<textarea name="full" id="full" cols="70" rows="12"></textarea>

<script type="text/javascript">
CKEDITOR.replace('full');
</script>


 


<div> <br>
	<style>
	.click  
		{
			border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; 
			background-color:#C7191C; 
			color:#FFFFFF; 
			height:35px;
		}
		
		.click:hover
		{
			border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; 
			background-color:#161010; 
			color:#FFFFFF; 
			height:35px;
			cursor: pointer;
		}
	</style>
   <input type="submit" class="click"  name="submit" style=" z-index:101;" value="გამოქვეყნება"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
</form>
 </div>
   
  </td> 
   </tr>

  </table>   
	 



  