<?
if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }

if(isset($_POST['email_subscribe']) && !empty(trim($_POST['email'])))
{
	$res = mysqli_query($conn, "SELECT COUNT(*) as cnt FROM emails WHERE email='".trim($_POST['email'])."' AND status=1");
	$data = mysqli_fetch_assoc($res);
	if(!$data)
	{
		mysqli_query($conn, "INSERT INTO emails (email, status) VALUES('".trim($_POST['email'])."', 1)");
		echo "<script>alert('თქვენ მიიღებთ სიახლეებს მითითებულ ელფოსტაზე')</script>";
	}
	else if(!$data['status'])
	{
		mysqli_query($conn, "UPDATE emails SET status = 1 WHERE email='".trim($_POST['email'])."'");
		echo "<script>alert('თქვენ მიიღებთ სიახლეებს მითითებულ ელფოსტაზე')</script>";
	}
	else
		echo "<script>alert('ელფოსტა უკვე დარეგისტრირებულია')</script>";
}
if(isset($_GET['unsubscribe']) && intval($_GET['unsubscribe']))
{
	mysqli_query($conn, "UPDATE emails SET status = 0 WHERE id='".intval($_GET['unsubscribe'])."'");
	echo "<script>alert('თქვენ აღარ მიიღებთ შეტყობინებებს')</script>";
}

?>


<!-- Slider start -->
<style> 
@font-face { font-family: bpg_mrgvlovani_caps_2010; src:url(fonts/bpg_mrgvlovani_caps_2010.ttf); } @font-face { font-family: bpg_mrgvlovani_caps_2010; src: url('fonts/bpg_mrgvlovani_caps_2010.ttf');  }  
k { font-family:bpg_mrgvlovani_caps_2010, sans-serif; font-size:12px; }    </style>
	
	<style> 
@font-face { font-family: bpg_algeti_compact; src:url(fonts/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('fonts/bpg_algeti_compact.ttf');  }  
span { font-family:bpg_algeti_compact, sans-serif; font-size:12px; }    </style>
	
<section id="home" class="p-0">
	<div id="main-slide" class="cd-hero">
		<ul class="cd-hero-slider">
			
								   <?
 
$a=mysqli_query($conn,"select * from kultura_cxrili WHERE kategory in ('კარიკატურები','ფოტოკატურები', 'მიმიკატურები') AND subkat='yes' AND hidden='0' order by id desc limit 0,4");
while ($b=mysqli_fetch_array($a))

{ ?>
			<li class="selected">
				<div class="overlay2">
					<img class="" src="<?=HTTP_HOST?><?php echo $b['upload'];?>" alt="slider">
				</div>
				<div class="cd-full-width">
					<br><br>
					<h2 ><k style="font-size: 33px"><b><?php echo $b['satauri'];?> </b></k></h2>
				<?php /*?>	<h3><span style="font-size: 22px"><?php echo $b['satauri'];?></span> </h3><?php */?>
					<a href="#0" class="btn btn-primary white cd-btn">more</a>
				</div> <!-- .cd-full-width -->
			</li>
			
			
			<? } ?>
			 
		 
		</ul>
		<!--/ cd-hero-slider -->

		<div class="cd-slider-nav">
			<nav>
				<span class="cd-marker item-1"></span>
				<ul>
					<li class="selected"><a href="#0"><i class="fa fa-book"></i> IDEA</a></li>
					<li><a href="#0"><i class="fa fa-barcode"></i> აზრი</a></li>
					<li><a href="#0"><i class="fa fa-android"></i> ტექ</a></li>
					<li class="video"><a href="#0"><i class="fa fa-video-camera"></i> ვიდეო</a></li>
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
				<h2 class="title" ><k style="font-size: 22px"> NEWS</k> <span class="title-desc">News from Geonova</span></h2>
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
 
$a=mysqli_query($conn,"select * from kultura_cxrili WHERE kategory='სიახლეები' AND hidden='0' order by id desc limit 0,6");
while ($b=mysqli_fetch_array($a))

{ ?>
			<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=fulleng&id=<? echo $b['id'];?>';">
				<div class="service-content text-center" style="cursor: pointer;">
						<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="<?=HTTP_HOST?><?php echo $b['upload'];?>" id="im" class="cover" alt="">
						<figcaption>
							<h3><span> more</span> </h3>
 							<a class="link icon-pentagon" href="index.php?do=fulleng&id=<? echo $b['id'];?>"  style="position: relative; top: -11px;"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
									 
						</figcaption>
					</figure>
				</div>
					<p><span style="font-size: 15px"> <?php echo $b['satauriEng'];?> </span></p>
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
<section id="portfolio" class="portfolio">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading">
				<span class="title-icon float-left"><i class="fa fa-cogs"></i></span>
				<h2 class="title" ><k style="font-size: 22px"> Photo Gallery</k> 
				<span class="title-desc">See full gallery here</span></h2>
			</div>
		</div> <!-- Title row end -->

		<!--Isotope filter start -->
	 <!-- Isotope filter end -->
	</div>
	
	
	
	
	 <style>	
			  
			  #im3 {
  height: 430px;
  
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
}

.cover3 {
  width: 100%;
  object-fit: cover;
  
  
}  
	  </style>

	<div class="container-fluid">
		<div class="row isotope" id="isotope">
			
			  <?
 
$a=mysqli_query($conn,"select * from kultura_cxrili WHERE kategory in ('კარიკატურები','ფოტოკატურები', 'მიმიკატურები') AND subkat='yes' AND hidden='0' order by id desc limit 1,4");
while ($b=mysqli_fetch_array($a))

{ ?>
			
			<div class="col-sm-3 web-design isotope-item">
				<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="<?=HTTP_HOST?><?php echo $b['upload'];?>" id="im3" class="cover3" alt="">
						<figcaption>
							<h3><?php echo $b['satauri'];?></h3>
							<a class="link icon-pentagon" href="#"><i class="fa fa-link"></i></a>
							<a class="view icon-pentagon" data-rel="prettyPhoto" href="images/reklama2.jpg"><i
									class="fa fa-search"></i></a>
						</figcaption>
					</figure>
				</div>
			</div> <? } ?><!-- Isotope item end -->

	 
 
 
 

			 
  
		</div><!-- Content row end -->
	</div><!-- Container end -->
</section><!-- Portfolio end -->

<!-- Counter Strat -->

<!--/ Counter end -->

	
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
				<h2 class="title" ><k style="font-size: 22px"> ჩვენი ემიგრანტები </k> <span class="title-desc">ჩვენ ვართ ესა და ეს და შეგვიძლია ესა და ეს</span></h2>
			</div>
			
			
			  <?
 
$a=mysqli_query($conn,"select * from kultura_cxrili WHERE kategory in ('კარიკატურები','ფოტოკატურები', 'მიმიკატურები') AND subkat='yes' AND hidden='0' order by id desc limit 0,6");
while ($b=mysqli_fetch_array($a))

{ ?>
		<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=cartoons';">
				<div class="service-content text-center" style="cursor: pointer;">
					
				<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="<?=HTTP_HOST?><?php echo $b['upload'];?>"  class="cover5" id="im5">
						<figcaption>
							<h3><span> ვრცლად</span> </h3>
							<a class="link icon-pentagon" href="#"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
							 
						</figcaption>
					</figure>
				</div> <p><span style="font-size: 15px"><?php echo $b['satauri'];?> </span></p>
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
 

<!-- Pricing table start -->

<!--/ Pricing table end -->


<!-- Testimonial start-->
 <section class="testimonial parallax parallax2">
	<div class="parallax-overlay"></div>
	<div class="container">
		<div class="row">
			<div id="testimonial-carousel" class="owl-carousel owl-theme text-center testimonial-slide">
				<div class="item">
					<div class="testimonial-thumb">
						<img src="images/80122c45878ab0b88b5ac0540ddc9293_1123321.jpg" alt="testimonial">
					</div>
					<div class="testimonial-content">
						<p class="testimonial-text"><span style="font-size: 16px;">
							 
ყოველი ჩვენთგანი შეიძლება შეცდეს, მაგრამ მხოლოდ სულელი შეიძლება შეცდეს და შეუპოვარი დარჩეს.
</span>

						</p>
						<h3 class="name"><k>ციცერონი</k><span>ორატორი</span></h3>
					</div>
				</div>
				<div class="item">
					<div class="testimonial-thumb">
						<img src="images/maia.jpg" alt="testimonial">
					</div>
					<div class="testimonial-content">
						<p class="testimonial-text"> <span style="font-size: 16px;">
							საცდელი ტექსტი ციტატისთვის საცდელი ტექსტი ციტატისთვის საცდელი ტექსტი ციტატისთვის საცდელი ტექსტი ციტატისთვის საცდელი ტექსტი ციტატისთვის საცდელი ტექსტი ციტატისთვის საცდელი ტექსტი ციტატისთვის </span>
						</p>
						<h3 class="name"><k> მაია ბენია </k><span>პროფესორი</span></h3>
					</div>
				</div>
				<div class="item">
					<div class="testimonial-thumb">
						<img src="images/Anna Kordzaia-Samadashvili.jpg" alt="testimonial">
					</div>
					<div class="testimonial-content">
						<p class="testimonial-text"><span style="font-size: 16px;">
							საცდელი ტექსტი ციტატისთვის საცდელი ტექსტი ციტატისთვის საცდელი ტექსტი ციტატისთვის საცდელი ტექსტი ციტატისთვის საცდელი ტექსტი ციტატისთვის საცდელი ტექსტი ციტატისთვის საცდელი ტექსტი ციტატისთვის </span>
						</p>
						<h3 class="name"><k> სახელი გვარი </k><span>რეგალია</span></h3>
					</div>
				</div>
			</div>
			<!--/ Testimonial carousel end-->
		</div>
		<!--/ Row end-->
	</div>
	<!--/  Container end-->
</section> 
<!--/ Testimonial end-->


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
				<h2 class="title" ><k style="font-size: 22px"> საიტის სასურველი სტუმარი </k> <span class="title-desc">ისტორიები, მოსაზრებები, წინადადებები</span></h2>
			</div>
		<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=cartoons';">
				<div class="service-content text-center" style="cursor: pointer;">
					
				<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="images/IMG_7359.JPG"  class="cover5" id="im5">
						<figcaption>
							<h3><span> ვრცლად</span> </h3>
							<a class="link icon-pentagon" href="#"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
							 
						</figcaption>
					</figure>
				</div> <p><span style="font-size: 15px"> რამე შთამაგონებელი და დეტალური, ინფორმაციული ტექსტი შეიძლება იყოს აქ </span></p>
				</div>
			</div>
			<!--/ End first featurebox -->

		<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=cartoons';">
				<div class="service-content text-center" style="cursor: pointer;">
					
				<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="images/download.jpg" width="250" class="cover5" id="im5">
						<figcaption>
							<h3><span> ვრცლად</span> </h3>
							<a class="link icon-pentagon" href="#"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
							 
						</figcaption>
					</figure>
				</div> <p><span style="font-size: 15px"> რამე შთამაგონებელი და დეტალური, ინფორმაციული ტექსტი შეიძლება იყოს აქ </span></p>
				</div>
			</div>
			<!--/ End 2nd featurebox -->

			<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=cartoons';">
				<div class="service-content text-center" style="cursor: pointer;">
					
				<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="images/maia.jpg" width="250" class="cover5" id="im5">
						<figcaption>
							<h3><span> ვრცლად</span> </h3>
							<a class="link icon-pentagon" href="#"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
							 
						</figcaption>
					</figure>
				</div> <p><span style="font-size: 15px"> რამე შთამაგონებელი და დეტალური, ინფორმაციული ტექსტი შეიძლება იყოს აქ </span></p>
				</div>
			</div>
			<!--/ End 3rd featurebox -->
		</div><!-- Content row end -->

		<div class="gap-40"></div>

		<div class="row">
			<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=cartoons';">
				<div class="service-content text-center" style="cursor: pointer;">
					
				<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="images/Anna Kordzaia-Samadashvili.jpg" width="250" class="cover5" id="im5">
						<figcaption>
							<h3><span> ვრცლად</span> </h3>
							<a class="link icon-pentagon" href="#"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
							 
						</figcaption>
					</figure>
				</div> <p><span style="font-size: 15px"> რამე შთამაგონებელი და დეტალური, ინფორმაციული ტექსტი შეიძლება იყოს აქ </span></p>
				</div>
			</div>
			<!--/ End 1st featurebox -->

			<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=cartoons';">
				<div class="service-content text-center" style="cursor: pointer;">
					
				<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="images/80122c45878ab0b88b5ac0540ddc9293_1123321.jpg" width="250" class="cover5" id="im5">
						<figcaption>
							<h3><span> ვრცლად</span> </h3>
							<a class="link icon-pentagon" href="#"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
							 
						</figcaption>
					</figure>
				</div> <p><span style="font-size: 15px"> რამე შთამაგონებელი და დეტალური, ინფორმაციული ტექსტი შეიძლება იყოს აქ </span></p>
				</div>
			</div>
			<!--/ End 2nd featurebox -->

			<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=cartoons';">
				<div class="service-content text-center" style="cursor: pointer;">
					
				<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="images/jrrawling.jpg" width="250" class="cover5" id="im5">
						<figcaption>
							<h3><span> ვრცლად</span> </h3>
							<a class="link icon-pentagon" href="#"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
							 
						</figcaption>
					</figure>
				</div> <p><span style="font-size: 15px"> რამე შთამაგონებელი და დეტალური, ინფორმაციული ტექსტი შეიძლება იყოს აქ </span></p>
				</div>
			</div>
			<!--/ End 3rd featurebox -->

		</div><!-- Content row end -->

	 

 <!-- Content row end -->

 
	<!--/ Container end -->
</section>