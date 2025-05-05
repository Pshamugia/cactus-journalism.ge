 <?
error_reporting(0);

$id = (int) $_GET['id'];


mysqli_query($conn, 'UPDATE `kultura_cxrili` t SET t.`view_count` = t.`view_count` + 1 WHERE t.`id`='.$id);
 
 

$aa=mysqli_query($conn, "select * from avtorebi where id='$b[avtori]'");
	$avtori=mysqli_fetch_array($aa);




?>

<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {color: #0066CC}
-->
</style>
<style> @media only screen and (max-width: 900px) {
        .one{
            display: none;
        }
    }
	
	@media only screen and (max-device-width: 480px) {
       .ziritadi{
            max-width:330px;
			align:left;
        }

        div#header {
            background-image: url(media-queries-phone.jpg);
            height: 93px;
            position: relative;
        }

        div#header h1 {
            font-size: 140%;
        }

        #content {
            float: none;
            width: 100%;
        }

        #navigation {
            float:none;
            width: auto;
        }
    }
	
 
		#im007 {
   transition: all .2s ease-in-out;
}

.cover007 {
  width: 100%;
  object-fit: cover;

}
.cover007:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */
 opacity: 0.7;
    filter: alpha(opacity=70);
	 transition: all .7s;

}


 
	 </style>
     
     
     
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
	<!-- FontAwesome -->
  <link rel="stylesheet" href="plugins/fontawesome/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="plugins/animate.css">
	<!-- Prettyphoto -->
	<link rel="stylesheet" href="plugins/prettyPhoto.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="plugins/owl/owl.carousel.css">
	<link rel="stylesheet" href="plugins/owl/owl.theme.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="plugins/flex-slider/flexslider.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="plugins/cd-hero/cd-hero.css">
	<!-- Style Swicther -->
	<link id="style-switch" href="css/presets/preset3.css" media="screen" rel="stylesheet" type="text/css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="plugins/html5shiv.js"></script>
      <script src="plugins/respond.min.js"></script>
    <![endif]-->

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
	<link rel="icon" href="img/favicon/favicon-32x32.png" type="image/x-icon" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/favicon-144x144.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/favicon-72x72.png">
	<link rel="apple-touch-icon-precomposed" href="img/favicon/favicon-54x54.png">
 

 
	<!-- Style switcher end -->

	<div class="body-inner">

<!-- Header start -->
 
<!--/ Header end -->

<div id="banner-area">
	<img src="images/banner/banner1.jpg" alt="" />
	<div class="parallax-overlay"></div>
	<!-- Subpage title start -->
	<div class="banner-title-content">
		<div class="text-center">
			<h2><?
$aaaaa=mysqli_query($conn,"select * from kultura_cxrili where avtori='$_REQUEST[id]' and eng_geo='Geo' LIMIT 1");
while($data=mysqli_fetch_array($aaaaa))
{
	$avt=mysqli_query($conn, "select * from gallery where id='$data[avtori]'");
$f=mysqli_fetch_array($avt); ?>

  <ol class="breadcrumb justify-content-center">
 					<li style="font-size: 25px;"> <? echo $f['avtori']; }

				?></li>
				</ol>  </h2>
			<nav aria-label="breadcrumb">
			<?php /*?>	<ol class="breadcrumb justify-content-center">
					<li class="breadcrumb-item"><a href="#"><? echo $LANG['home']; ?></a></li>
					<li class="breadcrumb-item text-white" aria-current="page">
						
					<?php if ($b['kategory']=='ჩვენ შესახებ') echo $LANG['about']; 
						  if ($b['kategory']=='სიახლეები') echo $LANG['news'];
						 echo $LANG['Photo Gallery'];
					 ?>
					
					</li>
				</ol><?php */?>
			</nav>
		</div>
	</div><!-- Subpage title end -->
</div><!-- Banner area end -->

<!-- Blog details page start -->
<section id="main-container">
	<div class="container">
		<div class="row">
			 
 	
   
    <?php
	/*
		Place code to connect to your DB here.
	*/
$x=0;

	$tbl_name="kultura_cxrili";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 10;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where avtori='$_REQUEST[id]'";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=blogs"; 	//your file name  (the name of this file)
	$limit = 6; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	/* Get data. */
	$sql = "SELECT * FROM $tbl_name where avtori='$_REQUEST[id]' order by news_date desc LIMIT $start, $limit";

	
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
			$pagination.= "<a href=\"$targetpage&page=$prev\">« წინა</a>";
		else
			$pagination.= "<span class=\"disabled\">« წინა</span>";	
		
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
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
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
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
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
			$pagination.= "<a href=\"$targetpage&page=$next\">შემდეგი »</a>";
		else
			$pagination.= "<span class=\"disabled\">წინა »</span>";
		$pagination.= "</div>\n";		
	}
?>




  
<?

$a=mysqli_query($conn,$sql);
while ($data=mysqli_fetch_array($a))
 
 
{ 
	$avt=mysqli_query($conn, "select * from gallery where id='$data[avtori]' ");
$f=mysqli_fetch_array($avt);
?>

			 
			 <style>
		#im {
  height: 260px;
  transition: all .2s ease-in-out;
}

.cover {
  width: 370px;
  object-fit: cover;
  
  
}
.cover:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s; }
	

	</style>
		
	   
	   
	   
  <div class="row">
    <div class="col-sm">
     
			<? if (empty($data['upload']))
		 {?>
         
         
         <? }
		 else 
		 { ?>
         
       <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $data['satauri'];?>" href="<? echo $data['upload'];?>"><img src="<? echo $data['upload'];?>"  class="cover" id="im" style="padding-right:15px; padding-bottom:20px;"></a>
	
        <? } ?>
	
	
	
	
		<? if (empty($data['upload2']))
		 {?>
         
         
         <? }
		 else 
		 { ?>
         
       <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $data['satauri'];?>" href="<? echo $data['upload2'];?>"><img src="<? echo $data['upload2'];?>"  class="cover" id="im" style="padding-right:15px; padding-bottom:20px;"></a>
	
        <? } ?>
	
	
		<? if (empty($data['upload3']))
		 {?>
         
         
         <? }
		 else 
		 { ?>
         
       <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $data['satauri'];?>" href="<? echo $data['upload3'];?>"><img src="<? echo $data['upload3'];?>"  class="cover" id="im" style="padding-right:15px; padding-bottom:20px;"></a>
	
        <? } ?>
	
	
		<? if (empty($data['upload4']))
		 {?>
         
         
         <? }
		 else 
		 { ?>
         
       <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $data['satauri'];?>" href="<? echo $data['upload4'];?>"><img src="<? echo $data['upload4'];?>"  class="cover" id="im" style="padding-right:15px; padding-bottom:20px;"></a>
	
        <? } ?>
	
	
	
			<? if (empty($data['upload5']))
		 {?>
         
         
         <? }
		 else 
		 { ?>
         
       <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $data['satauri'];?>" href="<? echo $data['upload5'];?>"><img src="<? echo $data['upload5'];?>"  class="cover" id="im" style="padding-right:15px; padding-bottom:20px;"></a>
	
        <? } ?>
	
	
	
			<? if (empty($data['upload6']))
		 {?>
         
         
         <? }
		 else 
		 { ?>
         
       <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $data['satauri'];?>" href="<? echo $data['upload6'];?>"><img src="<? echo $data['upload6'];?>"  class="cover" id="im" style="padding-right:15px; padding-bottom:20px;"></a>
	
        <? } ?>
	
	
	
			<? if (empty($data['upload7']))
		 {?>
         
         
         <? }
		 else 
		 { ?>
         
       <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $data['satauri'];?>" href="<? echo $data['upload7'];?>"><img src="<? echo $data['upload7'];?>"  class="cover" id="im" style="padding-right:15px; padding-bottom:20px;"></a>
	
        <? } ?>
	
	
	
	
			<? if (empty($data['upload8']))
		 {?>
         
         
         <? }
		 else 
		 { ?>
         
       <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $data['satauri'];?>" href="<? echo $data['upload8'];?>"><img src="<? echo $data['upload8'];?>"  class="cover" id="im" style="padding-right:15px; padding-bottom:20px;"></a>
	
        <? } ?>
	
	
	
			<? if (empty($data['upload9']))
		 {?>
         
         
         <? }
		 else 
		 { ?>
         
       <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $data['satauri'];?>" href="<? echo $data['upload9'];?>"><img src="<? echo $data['upload9'];?>"  class="cover" id="im" style="padding-right:15px; padding-bottom:20px;"></a>
	
        <? } ?>
	
	
	
			<? if (empty($data['upload10']))
		 {?>
         
         
         <? }
		 else 
		 { ?>
         
       <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $data['satauri'];?>" href="<? echo $data['upload10'];?>"><img src="<? echo $data['upload10'];?>"  class="cover" id="im" style="padding-right:15px; padding-bottom:20px;"></a>
	
        <? } ?>
		
						 
    
  </div>
				  
	            
   <? 
 }
 
echo $pagination;

  
    ?>
    
 
<div style="position:relative; left:66px; font-size:14px; padding-top:40px; padding-bottom:30px;">
	
  
	
	  </div></div>
		</div>  

  </div>
					
			</div></div></div></div></div></div>
		
		
		
		