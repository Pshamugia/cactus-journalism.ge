<?php
error_reporting(0);
if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  

require '../phpmailer/Exception.php';
	require '../phpmailer/PHPMailer.php';
	require '../phpmailer/SMTP.php';	


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use PHPMailer\PHPMailer\SMTP;
function sendEmail($email, $subject, $message)
{
	$mail = new PHPMailer(true);
	$mail->From = "info@cactus-journalism.ge";
	$mail->FromName = "Cactus Journalism";
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
	$link = "https://cactus-journalism.ge/index.php?do=full&id=".intval($_GET['send_email']);
	$res = mysqli_query($conn, "SELECT * FROM emails WHERE status != 0 ORDER BY id ASC");
	while($email = mysqli_fetch_assoc($res))
	{
	 
		$unsubscribe_link = "https://cactus-journalism.ge/index.php?unsubscribe=".$email['id'];
		sendEmail($email['email'], "დღის მასალა", "მოგესალმებათ cactus-journalism-ის შემოქმედებითი ჯგუფი. იხილეთ ახალი მასალა. <br> <br> $link 
		<br><br><br> თუ გსურთ, რომ აღარ მიიღოთ შეტყობინებები, დააჭირეთ ამ ლინკს:<br> $unsubscribe_link");
		  

	}
	echo "<script>document.location.href='index.php';</script>";
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

$query = "SELECT * FROM view_counts WHERE ip = ? AND id_article = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "si", getUserIp(), $id);
}

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

 
 
#$sql="insert into kultura_cxrili (kategory, subkat, upload, upload2, upload3, upload4, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$b2', '$b3', '$b4', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";





mysqli_query($sql);
 
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

 
  
 
 <style>
 
#indexs, #indexs ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#343a40;
  width:260px;
 

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
background-color:#676767;
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

  <div style="background-color:#F0F0F0; border:1px solid #DCDCDC; padding-left:13px; padding-top:11px; padding-bottom:5px;  margin-bottom:15px;"> 
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
        <input type="submit" id="rame" name="type" value="თარიღით ძიება" style="width: 165px; text-align: left"><i class="fa fa-arrow-right" style="position: relative; left: -22px;"></i>
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
<table class="table table-hover" style="">
  <thead style="background-color: #F0F0F0; border-left:1px solid #DCDCDC; border-right:1px solid #DCDCDC">
    <tr>
      <th scope="col">ფოტო</th>
      <th scope="col">თარიღი</th>
      <th scope="col">ID</th>
      <th scope="col">სათაური</th>
		  <th scope="col">დაგზავნა</th>
      <th scope="col">კატეგორია</th>
		<th scope="col">სტატუსი</th>
      <th scope="col">გადახედვა</th>
		 <th scope="col">ედიტ</th>
      
		<th scope="col"><? 
	 
	 if ($_SESSION['delete_status']!='1') 
 {
		 
	 echo "";
 }
		 else { ?>წაშლა<?} ?></th> 
		
    </tr>
  </thead>
  <tbody style="border:1px solid #DCDCDC">
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
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE kategory!='images' AND kategory!='ვიდეო' $W";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=home"; 	//your file name  (the name of this file)
	$limit = 15; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name WHERE kategory!='images' AND kategory!='ვიდეო'  $W order by id desc LIMIT $start, $limit";
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
					$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
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
						$pagination.= "<a href=\"$targetpage$page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage&page=$next\">next »</a>";
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
	
	

    <tr>
      <td scope="row"><img src="../<? echo $b['upload'];?>" width="80" height="60" class="cover4" id="im4" align="left"></td>
      <td><? echo date("Y/m/d", $b['news_date']); ?>
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
  </script></td>
      <td><? echo $b['id'];?> </td>
      <td><? echo $b['satauri_ka'];?> 
		</td>
		 <td> 
			 
			 
			 <a href="index.php&page=<?=$_GET['page']?>&send_email=<? echo $b['id'];?>"><i class="fa fa-envelope-open-text"></i> </a>
			 
		 </td>
		
      <td><? 
	$res = mysqli_query($conn, "SELECT * FROM menu where id='$b[kategory]'");
	$data = mysqli_fetch_assoc($res);
	echo $data['title_ka']; ?> </td>
      <td><?
	if($b['hidden'])
	{
?>
 <a href="index.php&page=<?=$_GET['page']?>&show=<? echo $b['id'];?>"> <img src="../img/hide.png" width="30" style="position:relative; vertical-align: top;"> </a>
 
<?  
	}
	else
	{
?>
 <a href="index.php&page=<?=$_GET['page']?>&hide=<? echo $b['id'];?>"> <img src="../img/show.png" width="30" style="position:relative; vertical-align: top;"> </a>
 <?
	}
 ?></td>
		<td><a   onclick="window.open('../index.php?do=full&id=<? echo $b['id']; ?>')"  style="cursor:pointer;" > <img src="../img/view1.png" width="18" style="position:relative; vertical-align: top;">  </a></td>
		 <td>
  <div style="color:#FF1D21"> 		  
		  <? $res=mysqli_query($conn, "SELECT * FROM kultura_password WHERE id='$b[editor]'");
			 if ($user=mysqli_fetch_array($res))
			 { ?>
			<a  onclick="window.location.href='#';" style="cursor:pointer;" > <img src="../img/edit.png" width="18" style="position:relative; vertical-align: top;"> </a> <i class="fas fa-spinner fa-pulse"></i> 
			<?
				 echo "არედაქტირებს"."<br>".$user['user']; 
			 }else
			 { 
	
			?> <a  onclick="window.location.href='index.php?do=update&id=<? echo $b['id']; ?>';" style="cursor:pointer;" > <img src="../img/edit.png" width="18" style="position:relative; vertical-align: top;"> </a>
		  </div> <? } ?></td>
      <td>
		  <? 
	$r=mysqli_query($conn, "SELECT * FROM kultura_password");
$data=mysqli_fetch_array($r); 
	 if ($_SESSION['delete_status']!='1') 
 {
		 
	 echo "";
 }
		 else
			 
		 { ?>
		  
		  <a href="index.php&page=<?=$_GET['page']?>&delete=<? echo $b['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')"> <img src="../img/delete.png" width="18" style="position:relative; vertical-align: top;"> </a> <? } ?></td>
 
    </tr>
     
       
	  
	  
 




 
	<? $x++;  } ?> </tbody>
</table></form>
   
    <?
	echo $pagination;?>  
 
<br> 
