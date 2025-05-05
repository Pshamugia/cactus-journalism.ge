<?
error_reporting(0);

$id = (int) $_GET['id'];


mysqli_query($conn, 'UPDATE `kultura_cxrili` t SET t.`view_count` = t.`view_count` + 1 WHERE t.`id`='.$id);
 
 

$aa=mysqli_query($conn, "select * from avtorebi where id='$b[avtori]'");
	$avtori=mysqli_fetch_array($aa);




?>
 
<style type="text/css">
<!--
.style1 {font-size: 14px}
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
     
     
     
   <div id="banner-area">
	<img src="images/banner/banner1.jpg" alt="" />
	<div class="parallax-overlay"></div>
	<!-- Subpage title start -->
	<div class="banner-title-content">
		<div class="text-center"> 
		<nav aria-label="breadcrumb">
				<ol class="breadcrumb justify-content-center">
					<li class="breadcrumb-item"><a href="<?=HTTP_HOST?>"><? echo $LANG['home']; ?></a> 
					/ 
					<? 
	$res = mysqli_query($conn, "SELECT * FROM menu where id='$b[kategory]'");
	$data = mysqli_fetch_assoc($res);
	echo $data["title_$_SESSION[LANG]"]; ?></li>
					 
				</ol>
			</nav>
		</div>
	</div><!-- Subpage title end -->
</div><!-- Banner area end -->
<!-- Main container start -->
<section id="main-container">
	<div class="container">
		<div class="row">
			<!-- Blog start -->
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<!-- Blog post start -->
				<div class="post-content">
					<!-- post image start -->
					<div class="post-image-wrapper">
						
						
						<? if ($b['kategory']=='ვიდეო')

{
	echo "";
}

elseif ($b['ena']=='1' && $b['kategory']!='ვიდეო')
{
?> 
       <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $b['img_description'];?>" href="<? echo $b['upload'];?>"><img src="<? echo $b['upload'];?>"  class="cover007" id="im007" style="padding-right:15px; padding-bottom:20px;"></a>
		
		
		
		
		<? }
		
		?>
        
        <? if ($b['ena']!=='1' && $b['kategory']!='ვიდეო')

{
	 
?>
          <a class="fancybox-effects-b" data-fancybox-group="button" title="<?php echo $b["img_description"];?>" href="<? echo $b['upload'];?>"><img src="<? echo $b['upload'];?>"  class="cover007" id="im007" style="padding-right:15px; padding-bottom:20px;"></a>
        <?
		}
		
		 ?> 
						<span class="blog-date"><a href="#"> 	
							<? echo date("Y-m-d", $b['news_date']); ?>
							 </a></span>
					</div><!-- post image end -->
					<div class="post-header clearfix">
						<h2 class="post-title" align="left" >
						 
							<li style="list-style: none"> 
								<a href="#" style="font-size: 25px;">
									<?php echo $b["satauri_$_SESSION[LANG]"];?>
								</a>
								</li>
						 
						</h2>
						<div class="post-meta" style="position: relative; top: 20px;">
							<span class="post-meta-author"><!-- ShareThis BEGIN -->
<div class="sharethis-inline-share-buttons"></div>
<!-- ShareThis END --></a></span>
							<span class="post-meta-cats">  <a href="#">  </a></span>
							<div class="float-right">
							 
							</div>

						</div><!-- post meta end -->
					</div><!-- post heading end -->
					<div class="entry-content">
						<p><?php echo $b["full_$_SESSION[LANG]"]; ?></p>
					</div>
					<!-- Author info start -->
					<div>
						 
				
								 <style> #tags, #tags ul{
 list-style-type:none;
list-style-position:outside;
width:auto;
height:25px;
margin:0;
font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);
}

#tags a{
display:block;
color:#5F5F5F;
background-color:#DBDBDB;
text-decoration:none;
width:auto;
height:25px;
transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 

}

#tags a:hover{
background:#e9ebee;
color:#000000;
width:auto;
height:25px;
transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 

 
}

#tags li{
float:left;
position:relative;

}

#tags ul {
position:absolute;
display:none;



}

#tags li ul a{
 
float:left;



}

#tags ul ul{
 


}	

#tags li ul ul {
left:12em;
 

}

#tags li:hover ul ul, #tags li:hover ul ul ul, #tags li:hover ul ul ul ul{
display:none; 

}
#tags li:hover ul, #tags li li:hover ul, #tags li li li:hover ul, #tags li li li li:hover ul{
display:block;

border:dashed 1px #999;
-moz-box-shadow: 5px 5px 8px #D6C89A;
-webkit-box-shadow: 5px 5px 8px #D6C89A;
box-shadow: 5px 5px 8px #D6C89A;
} </style>

           <? 
	if ($_SESSION['LANG']=='ka')
  $tags_geo = explode(',', $b['tags_geo']);
   foreach ($tags_geo as $tag)
  { 
	  if (!empty($tag))
	  {
	  ?>
      <div id="tags" style="float:left; padding-right:7px;  ">
	 <a href="<?=HTTP_HOST?>index.php?do=search&tag=<? echo $tag; ?>" style="padding-left:5px; padding-right:5px; padding-top:3px; position:relative; font-size:14px; " >  <? echo $tag; ?> </a>
	 
      </div> 
     
      <? 
	 
  } }
  

  
  ?>
						
						
				 <? 
	if ($_SESSION['LANG']=='en')
  $tags_eng = explode(',', $b['tags_eng']);
   foreach ($tags_eng as $tag)
  { 
	  if (!empty($tag))
	  {
	  ?>
      <div id="tags" style="float:left; padding-right:7px;  ">
	 <a href="<?=HTTP_HOST?>index.php?do=search&tag=<? echo $tag; ?>" style="padding-left:5px; padding-right:5px; padding-top:3px; position:relative; font-size:14px; " >  <? echo $tag; ?> </a>
	 
      </div> 
     
      <? 
	 
  } }
  

  
  ?>		
						
					</div>
					<!-- Author info end -->

					 

				  
				</div><!-- Blog post end -->
			</div>
			<!--/ Content col end -->

			<!-- sidebar start -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

				<div class="sidebar sidebar-right">

					<!-- Blog search start -->
					<div class="widget widget-search"> 
						
						
						<div id="search">
							<form autocomplete="off" action="<?=HTTP_HOST?>index.php?do=search" method="post" name="zebna">
							<input class="form-control form-control-lg"  name="text" type="search" placeholder="<?=$LANG['search']?>" required="" 
 oninvalid="this.setCustomValidity('<?=$LANG['key']?>')"
 oninput="setCustomValidity('')" style="position: relative; display: inline-block; width: 70%; height: 52px; left: 5px;">   <div class="input-group subscribe" style="position: relative; display: inline; top: -1px;  ">
 	              <button class="btn" name="email_subscribe" type="submit" style=" border-top-left-radius: 0px 0px; border-bottom-left-radius: 0px 0px;"><i class="fa fa-search"> </i></button>
	         
	          </div> 
						</div></form>
			
						
						 
						
						
					</div><!-- Blog search end -->

				<div style="position:relative; width:100%;  top:15px;"> 
					<div> <k style="font-size:18px;">  <?=$LANG['rated']?></k></div>
					<?
       
$a=mysqli_query($conn, "select * from kultura_cxrili WHERE kategory!='images' AND kategory!='ჩვენ შესახებ' AND kategory!='რეკლამა' AND news_date>='".date("Y-m-d",strtotime("-30 days"))."' order by view_count  desc limit 0,4");
while ($b=mysqli_fetch_array($a))
{
	$bra++;
 ?> 
  
  <style>
		#im6 {
  height: 125px;
  transition: all .2s ease-in-out;
}

.cover6 {
  width: 333px;
  object-fit: cover;
   
}
.cover6:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;

}
	

	</style>

 <span style="position:relative; width:50px; height:30px; background-color:rgba(0,102,51,0.73); color:#FFFFFF; font-size:18px; z-index:1; top:17px;"> &nbsp;&nbsp; <b> <? echo $bra; ?> </b>&nbsp;&nbsp; </span> 
<div align="left" style="width:80px; margin-top:-20px; padding-bottom:5px;"> 
<a href="index.php?do=full&id=<? echo $b['id'];?>"><img src="<? echo $b['upload'];?>" alt="" id="im6" class="cover6" style="position:relative; padding-right:10px; padding-top:13px; padding-bottom:8px;" align="left"  /> </a>  </div> 

<div align="left" style="width:320px;" id="linkebi"> <a href="index.php?do=full&id=<? echo $b['id'];?>" style="position:relative; font-size:14px;"> <ch> <?  
$avt=mysqli_query($conn, "select * from  avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt); ?> 
<font size="-1">
<?	// echo $avts_id['avtori']; ?>   <k>   <?php echo $b["satauri_$_SESSION[LANG]"];?> </k>  </a> </font> </div>
        
 
      
   <? }  ?>  </div>

					<!-- Blog category start -->
					<div class="widget widget-categories">
						<h3 class="widget-title">  </h3>
				 
						 				 
					</div><!-- Blog category end -->

					<!-- Blog tags start -->
					<div class="widget widget-tags">
					<h3 class="widget-title">  </h3>
									 

					</div><!-- Blog tags end -->

					<!-- Blog tags start -->
					<div class="widget">
						 
					 
					</div><!-- Text widget end -->

				</div><!-- sidebar end -->
			</div>
		</div>
		<!--/ row end -->
	 
	<!--/ container end -->
</section><!-- Blog details page end -->


<div class="gap-40"></div>
 
 

</div><!-- Body inner end -->

</div>
  </div>  
</div> </div> </div>