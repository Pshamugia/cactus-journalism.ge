
<?

if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }


?>


<!-- Slider start -->
	
	
	<style> 
@font-face { font-family: bpg_algeti_compact; src:url(fonts/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('fonts/bpg_algeti_compact.ttf');  }  
span { font-family:bpg_algeti_compact, sans-serif; font-size:12px; }    </style>
	
<section id="home" class="p-0">
	<div id="main-slide" class="cd-hero">
		<ul class="cd-hero-slider">
			
								   <? 
		
		
$a=mysqli_query($conn,"select * from kultura_cxrili WHERE subkat='yes' AND hidden='0' order by news_date desc limit 0,4");
while ($b=mysqli_fetch_array($a))
	
 
{ ?>
			<li class="selected">
				<div class="overlay2">
					<img class="" src="<?=HTTP_HOST?><?php echo $b['upload'];?>" alt="slider">
				</div>
				<div class="cd-full-width">
			 

		 

					<h2 style=""><k style="font-size: calc(14px + (26 - 14) * ((100vw - 300px) / (1600 - 300)));">
					<a href="index.php?do=full&id=<? echo $b['id'];?>"> <b style="color:white"><?php echo $b["satauri_$_SESSION[LANG]"];?>   </b> </a> </k></h2>
				<?php /*?>	<h3><span style="font-size: 22px"> <?php echo $b['satauri'];?></span> </h3><?php */?>
					<a href="index.php?do=full&id=<? echo $b['id'];?>" class="btn btn-primary white cd-btn"><? echo $LANG['more']; ?></a>
				</div> <!-- .cd-full-width -->
			</li>
			
			
			<? } ?>
			 
		 
		</ul>
		<!--/ cd-hero-slider -->
  <style>	
			  
			  #im12 {
  height: 50px;
  
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
}

.cover12 {
  width: 50px;
  object-fit: cover;
  
  
}  
	  </style>
		<div class="cd-slider-nav">
			<nav>
				<span class="cd-marker item-1"></span>
				<ul>
					
					<li class="selected"> <? $a=mysqli_query($conn,"select * from kultura_cxrili WHERE subkat='yes' AND hidden='0' order by news_date desc limit 0,1");
while($b=mysqli_fetch_array($a)) { ?> <a href="#0"><img src="<?=HTTP_HOST?><?php echo $b['upload'];?>" class="cover12" id="im12"> </a> <? }  ?></li>
					
                    <li> <? $a=mysqli_query($conn,"select * from kultura_cxrili WHERE subkat='yes' AND hidden='0' order by news_date desc limit 1,1");
while($b=mysqli_fetch_array($a)) { ?> <a href="#0"><img src="<?=HTTP_HOST?><?php echo $b['upload'];?>" class="cover12" id="im12"> </a> <? }  ?></li>
					
					<li> <? $a=mysqli_query($conn,"select * from kultura_cxrili WHERE subkat='yes' AND hidden='0' order by news_date desc limit 2,1");
while($b=mysqli_fetch_array($a)) { ?> <a href="#0"><img src="<?=HTTP_HOST?><?php echo $b['upload'];?>" class="cover12" id="im12"> </a> <? }  ?></li>
					
					<li> <? $a=mysqli_query($conn,"select * from kultura_cxrili WHERE  subkat='yes' AND hidden='0' order by news_date desc limit 3,1");
while($b=mysqli_fetch_array($a)) { ?> <a href="#0"><img src="<?=HTTP_HOST?><?php echo $b['upload'];?>" class="cover12" id="im12"> </a> <? }  ?></li>
					 
				</ul>
			</nav>
		</div> <!-- .cd-slider-nav -->

	</div>
	<!--/ Main slider end -->
</section>
<!--/ Slider end -->


<!-- Service box start -->
<section id="service" class="service angle">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading">
				<span class="title-icon float-left"><i class="fa fa-cogs"></i></span>
				<h2 class="title" ><k style="font-size: 22px"> 
					
					
					<? echo $LANG['news']; ?></k> <span class="title-desc"><?=$LANG['materials']; ?></span></h2>
			</div>
		</div><!-- Title row end -->

		
		
		 <style>	
			  
			  #im {
  height: 230px;
  
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
}

.cover {
  width: 300px;
  object-fit: cover;
  
  
}  
	  </style>
		
		<div class="row">
			
							   <?
 $a=mysqli_query($conn,"select * from menu WHERE title_ka='სიახლეები'");
$b=mysqli_fetch_array($a);
$a=mysqli_query($conn,"select * from kultura_cxrili WHERE hidden='0' AND kategory!='images' AND id!='2072' order by id desc limit 0,6");
while ($data=mysqli_fetch_array($a))

{ ?>
			<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=full&id=<? echo $data['id'];?>';">
				<div class="service-content text-center" style="cursor: pointer;">
						<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="<?=HTTP_HOST?><?php echo $data['upload'];?>" id="im" class="cover" alt="">
						<figcaption>
							<h3><span> <? echo $LANG['more']; ?></span> </h3>
 							<a class="link icon-pentagon" href="index.php?do=full&id=<? echo $data['id'];?>"  style="position: relative; top: -11px;"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
									 
						</figcaption>
					</figure>
				</div>
					<div class="blog-date" align="left" style="position: relative; float: left; min-width: 50px; max-width: 100px; height: 25px;  border-radius: 0; top: -10px; "><span style="position: relative; top: -5px; "> 
						
						<!--კატეგორიის სახელი-->
						<?php 
 $res = mysqli_query($conn, "SELECT * FROM menu where id='$data[kategory]'");
	$b = mysqli_fetch_assoc($res);
	 
 echo $b["title_$_SESSION[LANG]"];?>  </span> </div><div align="left" style="font-size: 12px; position: relative; top: -5px; left: 10px;"> 
					<?php 
 if($_SESSION['LANG']=='ka')
 {
 echo dateToString(date("Y-m-d", $data['news_date'])); echo ', '.date('Y'); }
 
  if($_SESSION['LANG']=='en')
 {
 echo dateToStringEN(date("Y-m-d", $data['news_date'])); echo ', '.date('Y'); }
					?> </div>
					<div align="left" style=" clear: both">   <span style="line-height:15px;"><span style="font-size: 16px; "> 
					<k style="font-size: 18px"> <?php echo $data["satauri_$_SESSION[LANG]"];?> </k> </span> <br>
					  </div>
				</div>
			</div>
			<? } ?>
			<!--/ End first service --> 
			 
			  
		</div><!-- Content row end -->
	</div>
	<!--/ Container end -->
</section>
<!--/ Service box end -->

<!-- Portfolio start -->
 

<!-- Counter Strat -->

<!--/ Counter end -->

	<hr>
	 <style>	
			  
			  #im5 {
  height: 230px;
  
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
}

.cover5 {
  width: 300px;
  object-fit: cover;
  
  
}  
	  </style>
	
<!-- Feature box start -->
<section id="feature" class="feature">
	<div class="container">
		
				
		
		
		
		<div class="row">
			<div class="col-md-12 heading">
				<span class="title-icon float-left"><i class="fa fa-cogs"></i></span>
				<h2 class="title" ><k style="font-size: 22px"> <? echo $LANG['science']; ?> </k> <span class="title-desc"><?=$LANG['last_science']?></span></h2>
			</div>
			
			
			  <?
 
 $a=mysqli_query($conn,"select * from menu WHERE title_ka='მეცნიერება'");
$b=mysqli_fetch_array($a);
$a=mysqli_query($conn,"select * from kultura_cxrili WHERE hidden='0' AND kategory='$b[id]' order by id desc limit 0,6");
while ($data=mysqli_fetch_array($a))

{ ?>
		<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=full&id=<? echo $data['id'];?>';">
				<div class="service-content text-center" style="cursor: pointer;">
					
				<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="<?=HTTP_HOST?><?php echo $data['upload'];?>"  class="cover5" id="im5">
						<figcaption>
							<h3><span> ვრცლად</span> </h3>
							<a class="link icon-pentagon" href="index.php?do=full&id=<? echo $data['id'];?>"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
							 
						</figcaption>
					</figure>
				</div> <div align="left">  <span style="font-size: 15px"><k style="font-size: 18px">  <?php echo $data["satauri_$_SESSION[LANG]"];?> </k> </span> <br>
					 <span style="font-size: 15px"> <?php echo $data["date"];?> </span> </div>
				</div>
			</div>
			<? } ?>
			<!--/ End first featurebox -->
 
		</div><!-- Content row end --> 
  
</section>
<!--/ Feature box end -->


 
<!--/ Image block end -->


<!-- Team start -->

<!--/ Team end -->
 
 


<?php /*?><!-- Clients start -->
 <section id="clients" class="clients">
	<div class="container">
		<div class="row wow fadeInLeft">
			<div id="client-carousel" class="col-sm-12 owl-carousel owl-theme text-center client-carousel">
				<figure class="m-0 item client_logo">
					<a href="#">
						<img src="images/clients/client1.png" alt="client">
					</a>
				</figure>
				<figure class="m-0 item client_logo">
					<a href="#">
						<img src="images/clients/client2.png" alt="client">
					</a>
				</figure>
				<figure class="m-0 item client_logo">
					<a href="#">
						<img src="images/clients/client3.png" alt="client">
					</a>
				</figure>
				<figure class="m-0 item client_logo">
					<a href="#">
						<img src="images/clients/client4.png" alt="client">
					</a>
				</figure>
				<figure class="m-0 item client_logo">
					<a href="#">
						<img src="images/clients/client5.png" alt="client">
					</a>
				</figure>
				<figure class="m-0 item client_logo">
					<a href="#">
						<img src="images/clients/client6.png" alt="client">
					</a>
				</figure>
				<figure class="m-0 item client_logo">
					<a href="#">
						<img src="images/clients/client7.png" alt="client">
					</a>
				</figure>
				<figure class="m-0 item client_logo">
					<a href="#">
						<img src="images/clients/client8.png" alt="client">
					</a>
				</figure>
			</div><!-- Owl carousel end -->
		</div><!-- Main row end -->
	</div>
	<!--/ Container end -->
</section> <?php */?>
<!--/ Clients end -->
	
	
	
	<section id="feature" class="feature">
	<div class="container">
		
				
		
		
		
		<div class="row">
			<div class="col-md-12 heading">
				<span class="title-icon float-left"><i class="fa fa-cogs"></i></span>
				<h2 class="title" ><k style="font-size: 22px"> <? echo $LANG['environment']; ?> </k> <span class="title-desc"><?=$LANG['stories']?></span></h2>
			</div>
			
			
			<?
 
$a=mysqli_query($conn,"select * from menu WHERE title_ka='გარემო'");
$b=mysqli_fetch_array($a);
	$res = mysqli_query($conn, "SELECT * FROM kultura_cxrili where hidden='0' AND kategory='$b[id]' OR kategory='45' OR kategory='42' OR kategory='50' order by news_date LIMIT 0,6");
	while($data = mysqli_fetch_assoc($res))
{ ?>
			
		<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=full&id=<? echo $data['id'];?>';">
				<div class="service-content text-center" style="cursor: pointer;">
					
				<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="<?php echo $data['upload'];?>"  class="cover5" id="im5">
						<figcaption>
							<h3><span> <? echo $LANG['more']; ?></span> </h3>
							<a class="link icon-pentagon" href="index.php?do=full&id=<? echo $data['id'];?>"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
							 
						</figcaption>
					</figure>
				</div> <div align="left">  <span style="font-size: 15px"><k style="font-size: 18px">  <?php echo $data["satauri_$_SESSION[LANG]"];?> </k> </span> <br>
					 <span style="font-size: 15px"> <?php echo $data["date"];?> </span> </div>
				</div>
			</div>
			<? } ?>
			<!--/ End first featurebox -->

		 
			 
			<!--/ End 3rd featurebox -->
		</div><!-- Content row end -->

 

		 

	 

 <!-- Content row end -->

 
	<!--/ Container end -->
</section>
		
		
		
		
		<section id="feature" class="feature" style="position: relative; margin-top: -30px; border: 2px solid #e7e7e7;">
	<div class="container">
		
				
		
		
		
		<div class="row" style="position: relative; margin-top: -40px;">
			<div class="col-md-12 heading">
				<span class="title-icon float-left"><i class="fa fa-cogs"></i></span>
				<h2 class="title" ><k style="font-size: 22px"> <? echo $LANG['medicine']; ?> </k> <span class="title-desc"><?=$LANG['stories']?></span></h2>
			</div>
			
			
			<?
 
$a=mysqli_query($conn,"select * from menu WHERE title_ka='ჯანდაცვა'");
$b=mysqli_fetch_array($a);
	$res = mysqli_query($conn, "SELECT * FROM kultura_cxrili where kategory='$b[id]' OR kategory='43' OR kategory='44' OR kategory='52' order by news_date desc limit 0,6");
	while($data = mysqli_fetch_assoc($res))
{ ?>
			
		<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=full&id=<? echo $data['id'];?>';">
				<div class="service-content text-center" style="cursor: pointer;">
					
				<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="<?php echo $data['upload'];?>"  class="cover5" id="im5">
						<figcaption>
							<h3><span> <? echo $LANG['more']; ?></span> </h3>
							<a class="link icon-pentagon" href="index.php?do=full&id=<? echo $data['id'];?>"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
							 
						</figcaption>
					</figure>
				</div> <div align="left">  <span style="font-size: 15px"><k style="font-size: 18px">  <?php echo $data["satauri_$_SESSION[LANG]"];?> </k> </span> <br>
					 <span style="font-size: 15px"> <?php echo $data["date"];?> </span> </div>
				</div>
			</div>
			<? } ?>
			<!--/ End first featurebox -->

		 
			 
			<!--/ End 3rd featurebox -->
		</div><!-- Content row end -->

 

		 

	 

 <!-- Content row end -->

 
	<!--/ Container end -->
</section>