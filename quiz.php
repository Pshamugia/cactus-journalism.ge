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
						
					<?php echo $LANG['viqtorina'];
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

	 

		<div class="row" style="position: relative; top: -150px;">
			<div class="col-md-9">       
			 <?
$a=mysqli_query($conn,"select * from kultura_cxrili WHERE kategory='ვიქტორინა' AND hidden='0' order by id desc limit 2");
while ($b=mysqli_fetch_array($a))

{ ?>
				
				<style> 
			  
			  #im {
  height: 100%;
  
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
}

.cover {
  width: 500px;
  object-fit: cover;
  
  
}  
	  </style>
			<div class="" data-wow-delay=".5s">
				<div class="service-content text-center" style="cursor: pointer;">
						<div class="grid">
					<figure class="m-0 effect-oscar">
						<img src="<?=HTTP_HOST?><?php echo $b['upload'];?>" id="im" class="cover" alt="">
						<figcaption>
							<h3><span>  </span> </h3>
 					 
									 
						</figcaption>
					</figure>
				</div>
					<p><span style="font-size: 15px"> <?php echo $b["full_$_SESSION[LANG]"];?> </span></p>
				</div>
			</div>
				
				<? } ?>
		
					 
				 
			</div>
			<div class="col-md-5">
				  
			</div>
		</div>
	</div>
	<!--/ container end -->
</section>
<!--/ Main container end -->

	 