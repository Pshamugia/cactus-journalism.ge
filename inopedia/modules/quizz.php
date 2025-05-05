<?php

 
if (isset($_POST['submit']))
{
	
$date=date('d.m.Y'); 
	$b='images/'.$_FILES['upload']['name']; 

    
	
	
move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);

     
	 
	$b='images/'.$_FILES['upload']['name']; 

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
	
	
move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);
 

$sql="INSERT INTO quizz(cover, question, first, second, third, firstcheck, secondcheck, thirdcheck, axsna1, axsna2, axsna3, upload)VALUES('$_REQUEST[cover]', '$_REQUEST[question]', '$_REQUEST[first]', '$_REQUEST[second]', '$_REQUEST[third]', '$_REQUEST[firstcheck]', '$_REQUEST[secondcheck]', '$_REQUEST[thirdcheck]', '$_REQUEST[axsna1]', '$_REQUEST[axsna2]', '$_REQUEST[axsna3]', '$b[0]')";
  mysqli_query($conn, $sql); 
	
	
	 
}


 
	
	
if (isset($_GET['delete']))
unlink('../'.$z['surati']);
mysqli_query($conn, "DELETE FROM quizz where id='$_REQUEST[delete]'");

 
 


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
   <a href="index.php?do=createquizz"> <span style="font-size:24px; position:relative; font-weight:bold; margin-right:10px; 
   top:0px;"> +</span> <span style="position:relative; top:-3px;"> ახალი ქვიზის შექმნა </span> </a>  </div> 
   
   
 
  </div> 
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
<?php /*?><div style="width:170px; display:table-cell;   vertical-align: top; position:relative; left:75px;"> ელფოსტაზე გაგზავნა </div><?php */?>
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
	 

	$tbl_name="quizz";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 6;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=quizz"; 	//your file name  (the name of this file)
	$limit = 6; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name order by id desc LIMIT $start, $limit";
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
//$sql="select * from quizz  order by id desc limit $lim";
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
<div style="min-width:250px; max-width:250px; display:table-cell; vertical-align: middle; position:relative; left:0"> <? echo $b['question'];?> </div> 
   <div style="padding-top:3px; width:60px; display:table-cell;">
 <?php /*?><input name="view" type="button" formtarget="_new" value="sendemail"  onclick="document.location.href='index.php?send_email=<? echo $b['id']; ?>';" style="font-size:12px; position: relative; top: -20px;">  </div><div style="width:100px; position:relative; left:52px; display:table-cell;   vertical-align: middle; "><?php */?>
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
 <a href="index.php?do=quizz&delete=<? echo $b['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')"> <img src="../IMG/delete.png" width="18" style="position:relative; vertical-align: top;"> </a>
 </div>
 </div>








 
 
 
 
   

 


 

 
  </div> </div> </div>  <div id="linkebi">
	<? $x++;  } ?>
    <br> 
    <?
	echo $pagination;?> </div></td></form></tr>
 
	
  

  </table>   

 