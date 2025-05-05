<?
if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  
include('../functions.php');

$r=mysqli_query($conn, "select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysqli_fetch_array($r);


if (isset($_REQUEST['submit']))
{
$date=date('d.m.Y');



	$b=''; 
	$b2=''; 
	$b3='';
	$b4=''; 
	$b5='';
	$b6='';  
 

		$image_name = 'images/'.md5(time()).$_FILES['upload']['name'];
	if (resizeImage($_FILES['upload']['tmp_name'], '../'.$image_name))	
		$b=$image_name;
	else
	$b=$data['upload'];



$personId = (int) $_POST['person_id'];
$partyId = 0;

if($personId>0){
	$x=mysqli_query($conn,'select t.`party_id` from hc_persons t where t.`id`='.$personId);
	if($x){
		$z=mysqli_fetch_array($x);
		$partyId = $z['party_id'];
	}
}

	$sql="update kultura_cxrili set kategory='$_REQUEST[kategory]', subkat='$_REQUEST[subkat]', tags='$_REQUEST[tags]', upload='$b', eng_geo='$_REQUEST[eng_geo]', img_description='$_REQUEST[img_description]', satauri='$_REQUEST[satauri]', avtori='$_REQUEST[avtori]', avtori2='$_REQUEST[avtori2]', agwera='$_REQUEST[agwera]', full='$_REQUEST[full]', ena='$_REQUEST[ena]', menu='$_REQUEST[menu]', news_date='".strtotime($_REQUEST['news_date'])."', linki='$_REQUEST[linki]', hour='$_REQUEST[hour]' where id='$_REQUEST[id]'";

	mysqli_query($conn, $sql);

	if(mysqli_error($conn)){
		echo mysqli_error($conn);
	}




}

$r=mysqli_query($conn, "select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysqli_fetch_array($r);




?>
 
  
<td width="744" align="center" bgcolor="#FFFFFF" style="" id="linkebi">
 
  <div style="background-color:#F0F0F0; padding:10px; margin-bottom:10px;"> <div id="indexs" style="color:#FFFFFF;">
   <a href="index.php"> <span style="font-size:20px; position:relative; font-weight:bold; margin-right:10px;
   top:0px;"> &lt; </span> <span style="position:relative; top:-3px;"> საწყის გვერდზე დაბრუნება </span> </a> </div> </div>

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
 <div style="background-color:#FFFFFF;  padding-top:5px; padding-bottom:15px;">

<div style="position:relative; margin-right:20px;">
<img src="../<? echo $b['upload'];?>" width="80" height="60" align="left">  </div>
<div style="width:744px; font-size:14px; padding-bottom:5px;"> <span style="position:relative; padding-left:3px; ">
<? echo $b['satauri'];?> </span> </div>

<div style="padding-top:3px;" id="gverditi">
   <input name="view" type="button"  formtarget="_new" value="შეთვალიერება" onClick="openNewTab()" style="font-size:12px;">
 <script type="text/javascript">
    function openNewTab() {
        window.open("../index.php?do=full&id=<? echo $b['id']; ?>/");
    }
</script>


<span style="position:relative; margin-left:30px; font-size:14px;  background:transparent; color:#000000;">


<?
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
	 $avts_id=mysqli_fetch_array($avt);
echo $avts_id['avtori'];

 ?> 
	
	 
	
	</span>

 <span style="position:relative; padding-left:30px; font-size:14px;"><? echo $b['kategory'] ?>  </span>

 <span style="position:relative; margin-left:30px; color:#000000; font-size:14px;"><? echo date("Y-m-d", $b['news_date']); ?> </span>

	<? } } ?>  </td></form></tr>




   <td valign="top">


            <form action="" method="post" enctype="multipart/form-data" name="rame" style="position:relative; margin-top:10px;">


 <select  name="eng_geo" style="width:320px; height:35px;">
 <option value="0">აირჩიე ენა</option>
<option <?=($data['eng_geo']=='Geo')?'selected':''?> value="Geo">Geo</option>
<option <?=($data['eng_geo']=='Eng')?'selected':''?> value="Eng">Eng</option>
      </select> </p>

      <br>

        <select  name="subkat" style="width:320px; height:35px;">
          <option value="top">გავუშვათ მთავარ გვერდზე</option>
          <option <?=($data['subkat']=='no')?'selected':''?> value="no">no</option>
          <option <?=($data['subkat']=='yes')?'selected':''?> value="yes" style="color:#FF0000">yes</option>
        </select>
        <br />
        <br />
        			<select  name="kategory" style="width:320px; height:35px;">
        <option <?=($data['kategory']=='კატეგორიები')?'selected':''?> value="">კატეგორიები</option>
        <option <?=($data['kategory']=='კარიკატურები')?'selected':''?> value="კარიკატურები">კარიკატურები</option>
        <option <?=($data['kategory']=='ფოტოკატურები')?'selected':''?> value="ფოტოკატურები">ფოტოკატურები</option>
			<option <?=($data['kategory']=='მიმიკატურები')?'selected':''?> value="მიმიკატურები">მიმიკატურები</option>
        <option <?=($data['kategory']=='კუბები')?'selected':''?> value="კუბები">კუბები</option>
        <option <?=($data['kategory']=='მორბენალი სტრიქონი')?'selected':''?> value="მორბენალი სტრიქონი">მორბენალი სტრიქონი</option>
        <option <?=($data['kategory']=='ჩვენ შესახებ')?'selected':''?> value="ჩვენ შესახებ">ჩვენ შესახებ</option>       
    				</select>
       <br> <br>
       
   
  
     
        <span style="font-size:12px;"> მივაბათ კორპორაციული ლოგო? </span>
        <input type="checkbox" name="ena" <?=($data['ena']=='1')?'checked':''?> value="1"/>
        კი
       
        <br />
        <br />
	   
	   <span style="font-size:12px;"> ანონიმური ავტორი </span>
        <input type="checkbox" name="menu" <?=($data['menu']=='1')?'checked':''?> value="1"/>
        კი
       
        <br />
        <br />

        <input type="file" name="upload">
          <img src="../<? echo $data['upload'];?>" width="70" height="50" style="position:relative; right:-7px;"><br>
        <textarea  name="img_description" placeholder="სურათის აღწერა" style="width:320px; height:35px;" > <? echo $data['img_description']; ?> </textarea>
        <br />
        <br />

         <select name="avtori" style="width:320px; height:35px;">  კარიკატურის ავტორი <br>
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
	echo "<option value='".$avts_id['id']."' ".$selected.">".$avts_id['avtori']."</option>";
	 }
     ?>
</select>
	   
	   
	   <br><br><br>
	   
	   <select name="avtori2" style="width:320px; height:35px;">  იდეის ავტორი <br>
		   <option value="" disabled selected hidden>მონიშნე იდეის ავტორი </option>
     <?
	 $avst=mysqli_query($conn, "select * from  avtori_new");
	 while($ress=mysqli_fetch_array($avst))
	 {
		 if($data['avtori2']==$ress['id']){
			 $selected='selected';
		 }
		 else{
			 $selected='';
		 }
	echo "<option value='".$ress['id']."' ".$selected.">".$ress['avtori2']."</option>";
	 }
     ?>
</select>


        <br />
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
            <input type="text" value="<? echo date("Y-m-d", $data['news_date']); ?>" name="news_date" id="news_date" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; width:320px; height:35px;" size="12" / >
        </div>
<p>
        <input type="text" value="<?php 
		if ($data['hour']>59)
		
		{
			echo "error";
			}
		
		else
		{
		echo $data['hour']; } ?>" name="hour" id="hour" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;" size="12" / >
        </p>
        <br/>


    
 
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
   <ul class="tags-input"  style="height:auto; width:750px;">
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
      <input type="text" id="tags">
	  <input type="hidden" name="tags" id="save_tags" value="<?=$data['tags']?>"/>
    </li>
  </ul>
</div> </div>
 <!--END OF TAGS - თეგების დასასრული -->
 

 <br><br><br><br>
                <textarea  name="satauri" style="border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border: 1px solid #999; background-color:#FFFFFF; width:100%;" > <? echo $data['satauri']; ?></textarea>
<br>
        <textarea name="agwera" id="agwera" cols="85"><? echo $data['agwera']; ?></textarea>
        <script type="text/javascript">
CKEDITOR.replace('agwera');
</script>
        <br>
        <br>
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
</SCRIPT> <A HREF="index.php?do=images"
   onClick="return popup(this, 'notes')" id="">IMAGE MANAGER POPUP</A> </div>

        <textarea name="full" cols="85" rows="5" id="full"> <? echo $data['full']; ?></textarea>
        <script type="text/javascript">
CKEDITOR.replace('full');
</script>
        <br>
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
        <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
        <input type="submit" class="click" style="z-index:101;" name="submit" value="გამოქვეყნება">
      </form></td>
  </tr>

    <td height="20"></td>
  </tr>
</table>
