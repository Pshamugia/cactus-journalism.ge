 <div id="banner-area">
	<img src="images/banner/banner1.jpg" alt="" />
	<div class="parallax-overlay"></div>
	<!-- Subpage title start -->
	<div class="banner-title-content">
		<div class="text-center"> 
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb justify-content-center">
					<li class="breadcrumb-item"><a href="#"><? echo $LANG['home']; ?></a></li>
					<li class="breadcrumb-item text-white" aria-current="page">
						
					<?php echo $LANG['about'];
					 ?>
					
					</li>
				</ol>
			</nav>
		</div>
	</div><!-- Subpage title end -->
</div><!-- Banner area end -->
<!-- Main container start -->
<section id="main-container">
	<div class="container">
		<!-- Map start here -->
	 
		<!--/ Map end here -->

		<div class="gap-40"></div>

		<div class="row">
			<div class="col-md-7">       
			 <?
$a=mysqli_query($conn,"select * from kultura_cxrili WHERE kategory='სიახლეები' AND hidden='0' order by id desc limit 0,6");
while ($b=mysqli_fetch_array($a))

{ ?>
			<div class="col-md-4 col-sm-4 wow fadeInDown" data-wow-delay=".5s" onclick="javascript:location.href='index.php?do=full&id=<? echo $b['id'];?>';">
				<div class="service-content text-center" style="cursor: pointer;">
						<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="<?=HTTP_HOST?><?php echo $b['upload'];?>" id="im" class="cover" alt="">
						<figcaption>
							<h3><span> <? echo $LANG['more']; ?></span> </h3>
 							<a class="link icon-pentagon" href="index.php?do=full&id=<? echo $b['id'];?>"  style="position: relative; top: -11px;"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
									 
						</figcaption>
					</figure>
				</div>
					<p><span style="font-size: 15px"> <?php echo $b["full_$_SESSION[LANG]"];?> </span></p>
				</div>
			</div>
				
				<? } ?>
		
					 
				 
			</div>
			<div class="col-md-5">
				 dffffff
			</div>
		</div>
	</div>
	<!--/ container end -->
</section>
<!--/ Main container end -->

	 