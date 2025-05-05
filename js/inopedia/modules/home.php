<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
function sendEmail($email, $subject, $message)
{
	require '../phpmailer/Exception.php';
	require '../phpmailer/PHPMailer.php';
	require '../phpmailer/SMTP.php';	
	$mail = new PHPMailer(true);
	$mail->From = "info@laughtivism.ge";
	$mail->FromName = "Laughtivism - კარიკატურები";
	$mail->addAddress($email);
	$mail->isHTML(true);

	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AltBody = "This is the plain text version of the email content";
	try
	{
		$mail->send();
	}
	catch(Exception $ex)
	{
		exit($ex->getMessage() . " - $email");
		
	}
}
if(isset($_GET['send_email']) && intval($_GET['send_email']))
{
	$link = "https://laughtivism.ge/index.php?do=full&id=".intval($_GET['send_email']);
	$res = mysqli_query($conn, "SELECT * FROM emails WHERE status != 0");
	while($email = mysqli_fetch_assoc($res))
	{
		$unsubscribe_link = "https://laughtivism.ge/index.php?unsubscribe=".$email['id'];
		sendEmail($email['email'], "დღის კარიკატურა", "მოგესალმებათ Laughtivism-ის შემოქმედებითი ჯგუფი. იხილეთ ახალი მასალა. <br> <br> $link 
		<br><br><br> თუ გსურთ, რომ აღარ მიიღოთ შეტყობინებები, დააჭირეთ ამ ლინკს:<br> $unsubscribe_link");
	}
}



// view count IP ის მიხედვით

function getUserIp()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP']))
    	$ip = $_SERVER['HTTP_CLIENT_IP'];
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else
		$ip = $_SERVER['REMOTE_ADDR'];
	return $ip;
} 
$next_date = strtotime("+1 day");
$res = mysqli_query($conn, "SELECT * FROM view_counts WHERE ip='".getUserIp()."' AND id_article=$id");
$view_data = mysqli_fetch_assoc($res);
if($view_data)
{
	if(time()>$view_data['view_date'])
	{
		$update_view_count = true;
		mysqli_query($conn, "UPDATE view_counts SET view_date='".$next_date."' WHERE ip='".getUserIp()."' AND id_article=$id");
	}
	else
		$update_view_count = false;
}
else
{
	$update_view_count = true;
	mysqli_query($conn, "INSERT INTO view_counts (id_article,ip,view_date) VALUES($id, '".getUserIp()."', '".$next_date."')");
}
if($update_view_count)
	mysqli_query($conn, 'UPDATE `kultura_cxrili` t SET t.`view_count` = t.`view_count` + 1 WHERE t.`id`='.$id);

// END OF VIEW COUNT


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


$sql="insert into kultura_cxrili (kategory, subkat, upload, eng_geo, img_description, satauri, avtori, party_id, person_id, agwera, full, ena, menu, date, pos, news_date, linki, hour, tags, hidden)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$_POST[eng_geo]', '$_POST[img_description]', '$_POST[satauri]', '$_POST[avtori]', '$partyId', '$personId', '$_REQUEST[agwera]', '$_REQUEST[full]', '$_REQUEST[ena]', '$_REQUEST[menu]', '$date', '0', '".strtotime($_REQUEST['news_date'])."', '$_REQUEST[linki]', '$_REQUEST[hour]', '$_REQUEST[tags]', '$_REQUEST[hidden]')";


mysqli_query($sql);
 
	echo mysqli_error();
}


if (isset($_GET['delete']))
{
$x=mysqli_query($conn, "select * FROM kultura_cxrili where id='$_REQUEST[delete]'");
$z=mysqli_fetch_array($x);
if (isset($_GET['delete']))
unlink('../'.$z['surati']);
mysqli_query($conn, "DELETE FROM kultura_cxrili where id='$_REQUEST[delete]'");





}


if (isset($_GET['hide']))
{
	mysqli_query($conn, "update kultura_cxrili SET hidden=1 where id='$_GET[hide]'");
}


if (isset($_GET['show']))
{
	mysqli_query($conn, "update kultura_cxrili SET hidden=0 where id='$_GET[show]'"); 
}



?>



   <link href="logo.css" rel="stylesheet" type="text/css" />
  

  

 
 <td bgcolor="#FFFFFF" width="100%" style="position:relative; top:-2px; padding:10px;">
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

  <div style="background-color:#F0F0F0; padding-left:13px; padding-top:11px; padding-bottom:5px;  margin-bottom:15px;"> 
  <div id="indexs" style="color:#FFFFFF; display:inline-block; margin-top:2px;">
   <a href="index.php?do=create"> <span style="font-size:24px; position:relative; font-weight:bold; margin-right:10px; 
   top:0px;"> +</span> <span style="position:relative; top:-3px;"> ახალი მასალის დამატება </span> </a>  </div> 
   
   
   
   <div style="position:relative; display:inline-block; margin-left:50px;"> <form action="index.php?do=search" method="post">
    <input type="hidden" name="calendar" value="zieba" />
    
     
      <p>
        <input value="<?=$fromDate?>" type="text" name="from_date" id="from_date" readonly size="6" />
        -დან  &nbsp;
        <input value="<?=$toDate?>" type="text" name="to_date" readonly id="to_date" size="6"/>
        -მდე  
        &nbsp; &nbsp;
        <input type="submit" id="rame" name="type" value="search">
    </div>
    <script>
 $( function() {
	$("#from_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy/mm/dd",
      dateFormat: "yy/mm/dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#from_date").datepicker("option","maxDate", selected)
        }
    });
	$("#to_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy/mm/dd",
      dateFormat: "yy/mm/dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#to_date").datepicker("option","maxDate", selected)
        }
    });
  } );
  </script>
  </form> <? if(!empty($fromDate) or !empty($toDate)){
		if(!empty($fromDate)){
			$where .=  ' AND ".strtotime($_REQUEST[`news_date`]).">=STR_TO_DATE(\''.$fromDate.'\', \'%Y-%m-%d\') ';
		}
		if(!empty($toDate)){
			$where .=  ' AND ".strtotime($_REQUEST[`news_date`])."<=STR_TO_DATE(\''.$toDate.'\', \'%Y-%m-%d\') ';
		}
	} ?> </div> 
   <form action="" method="post" enctype="multipart/form-data" name="rame">  
   <div style="width:1006px; font-size:14px; display:table; background-color:#F0F0F0; margin-bottom:10px; margin-left:1px;">
    <div style="display: table-row;">


<style> 
@font-face { font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf');  }  
div { font-family:bpg_algeti_compact, sans-serif;  }    </style>



<div style="padding-top:3px; width:80px; display:table-cell;"> <span style="position:relative; left:5px;"> ფოტო </span></div> 
<div style="width:50px; display:table-cell; vertical-align: top; position:relative; left:25px;">  თარიღი</div> 
<div style="width:50px;  position:relative; left:40px; display:table-cell;   vertical-align: top;">ID </div> 
<div style="min-width:250px; max-width:250px; display:table-cell;   vertical-align: top; position:relative; left:55px;"> სათაური</div> 
<div style="width:170px; display:table-cell;   vertical-align: top; position:relative; left:75px;"> ელფოსტაზე გაგზავნა </div>
<div style="width:170px; display:table-cell;   vertical-align: top; position:relative; left:55px;">ავტორი </div>
<div style="width:100px; display:table-cell;   vertical-align: top; position:relative; position:relative; left:62px;">სტატუსი </div>
<div style="width:150px; display:table-cell;   vertical-align: top; position:relative; position:relative; left:60px; ">გადახედვა </div>  
<div style="padding-top:3px; width:100px; display:table-cell; position:relative; left:35px;">ედიტ </div>
<div style="padding-top:3px; width:100px; display:table-cell; position:relative; left:25px;">წაშლა </div>

</div></div>

<?php
	/*
		Place code to connect to your DB here.
	*/
	$W='';
	
	if(isset($_GET['user_id'])) $W="AND user_id=$_GET[user_id]";

	$tbl_name="kultura_cxrili";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 6;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory!='images' and kategory!='ფოტო' and kategory!='ვიდეო' $W";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php"; 	//your file name  (the name of this file)
	$limit = 15; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where kategory!='images' and kategory!='ფოტო' and kategory!='ვიდეო' $W order by id desc LIMIT $start, $limit";
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
	
 .tabl 
 {
background-color:#FFFFFF; 

cursor:pointer; 
padding-left:3px;
padding-right:3px;
}


 .tabl:hover
 {
background-color:#F0F0F0; 
  width:100%;
cursor:default;  
 
}
	</style>

<div class="tabl" style="padding-top:3px;   vertical-align: top; border-bottom:1px solid #D7D7D7; "> 





   <div style=" display:table; font-size:12px; ">
    <div style="display: table-row;">

<div style="display:table-cell;"><img src="../<? echo $b['upload'];?>" width="80" height="60" class="cover4" id="im4" align="left">  </div>
  
<div style="width:70px; display:table-cell; font-size:12px; position:relative;   vertical-align: middle;"> <? echo date("Y/m/d", $b['news_date']); ?>
<br> <? echo $b['hour']; ?>
      <script>
  $( function() {
	$("#news_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy/mm/dd",
      dateFormat: "yy/mm/dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#news_date").datepicker("option","maxDate", selected)
        }
    });
  } );
  </script></div> 
<div style="width:50px; position:relative; left:0px; display:table-cell;   vertical-align: middle;"> <? echo $b['id'];?>  </div> 
<div style="min-width:250px; max-width:250px; display:table-cell; vertical-align: middle; position:relative; left:0"> <? echo $b['satauri'];?> </div> 
   <div style="padding-top:3px; width:60px; display:table-cell;">
 <input name="view" type="button" formtarget="_new" value="sendemail"  onclick="document.location.href='index.php?send_email=<? echo $b['id']; ?>';" style="font-size:12px; position: relative; top: -20px;">  </div><div style="width:100px; position:relative; left:52px; display:table-cell;   vertical-align: middle; ">
<? $aa=mysqli_query($conn, "select * from avtorebi where id='$b[avtori]'");
$qq=mysqli_fetch_array($aa); ?>    
 
<div style="font-size:14px; width:170px; display:table-cell;   vertical-align: middle; font-size:12px;">
<? echo $qq['avtori']; ?>  </div></div>

  <style>
 .register 
 {
  
 
}


 .register:hover
 {
opacity: 0.5;
 
}


 
 </style>  

<div style="width:100px; display:table-cell;   vertical-align: middle; position:relative; left:90px;">
<div class="register" style="padding-top:0px; position:relative; left:5px; width:100px; display:table-cell;">
<?
	if($b['hidden'])
	{
?>
 <a href="index.php?show=<? echo $b['id'];?>"> <img src="../IMG/hide.png" width="30" style="position:relative; vertical-align: top;"> </a>
 
<?  
	}
	else
	{
?>
 <a href="index.php?hide=<? echo $b['id'];?>"> <img src="../IMG/show.png" width="30" style="position:relative; vertical-align: top;"> </a>
 <?
	}
 ?>
  </div>   </div>
   


   
<div class="register" style="width:60px; display:table-cell;  vertical-align: middle; position:relative; left:85px;">
 
 
 <a   onclick="window.open('../index.php?do=full&id=<? echo $b['id']; ?>')"  style="cursor:pointer;" > <img src="../IMG/view1.png" width="18" style="position:relative; vertical-align: top;">  </a>
   </div>
   
 
<div class="register" style="width:100px; display:table-cell;   vertical-align: middle; position:relative; left:105px;">

 <a  onclick="window.location.href='index.php?do=update&id=<? echo $b['id']; ?>';" style="cursor:pointer;" > <img src="../IMG/edit.png" width="18" style="position:relative; vertical-align: top;"> </a>
 </div>






<div class="register" style="width:100px; display:table-cell;   vertical-align: middle; position:relative; left:67px;">
 <a href="index.php?delete=<? echo $b['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')"> <img src="../IMG/delete.png" width="18" style="position:relative; vertical-align: top;"> </a>
 </div>
 </div>








 
 
 
 
   

 


 

 
  </div> </div> </div>  <div id="linkebi">
	<? $x++;  } ?>
    <br> 
    <?
	echo $pagination;?> </div></td></form></tr>
 
	
  

  </table>   

 