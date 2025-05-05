<!-- Style switcher start -->
	<div class="style-switch-wrapper">
		<div class="style-switch-button">
			<i class="fa fa-sliders"></i>
		</div>
		<h3><k>Colors</k></h3>
		<button id="preset1" class="btn btn-sm btn-primary"></button>
		<button id="preset2" class="btn btn-sm btn-primary"></button>
		<button id="preset3" class="btn btn-sm btn-primary"></button>
		<button id="preset4" class="btn btn-sm btn-primary"></button>
		<button id="preset5" class="btn btn-sm btn-primary"></button>
		<button id="preset6" class="btn btn-sm btn-primary"></button>
		<br/><br/>
		<a class="btn btn-sm btn-primary close-styler float-right"><span> Close</span> X</a>
	</div>
	<!-- Style switcher end -->

	<div class="body-inner">

<!-- Header start -->
<header id="header" class="fixed-top header" role="banner">
	<a class="navbar-brand navbar-bg" href="index.php?lang=eng"><img class="img-fluid float-right" src="images/logo.png" width="250" alt="logo"></a>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark">
			<button class="navbar-toggler ml-auto border-0 rounded-0 text-white" type="button" data-toggle="collapse"
				data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span>
			</button>

			
			<style> 
@font-face { font-family: bpg_mrgvlovani_caps_2010; src:url(fonts/bpg_mrgvlovani_caps_2010.ttf); } @font-face { font-family: bpg_mrgvlovani_caps_2010; src: url('fonts/bpg_mrgvlovani_caps_2010.ttf');  }  
li { font-family:bpg_mrgvlovani_caps_2010, sans-serif; font-size:12px; }    </style>
			
			
			<div class="collapse navbar-collapse text-center" id="navigation">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							home
						</a>
						<!--<div class="dropdown-menu">
							<a class="dropdown-item" href="index.html">ვერსია 1</a>
							<a class="dropdown-item" href="index-2.html">ვერსია 2</a>
							<a class="dropdown-item" href="index-3.html">ვერსია 3</a>
							<a class="dropdown-item" href="index-4.html">ვერსია 4</a>
						</div>-->
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							organization
						</a>
						<div class="dropdown-menu" style="width: 330px;">
							<a class="dropdown-item" href="#">about us</a>
							<a class="dropdown-item" href="#">our members and friends </a>
							 
						</div>
					</li>
					
						<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							 our connections
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">რამე</a>
							<a class="dropdown-item" href="#">რამე 1 </a>
							<a class="dropdown-item" href="#">რამე 2</a>
						</div>
					</li>
					
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							our immigrants
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">რამე</a>
							<a class="dropdown-item" href="#">რამე 1 </a>
							<a class="dropdown-item" href="#">რამე 2</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							 Special fund
						</a>
						<div class="dropdown-menu" style="width: 400px">
							<a class="dropdown-item" href="#">სპეცწინადადებები ფონდის <br> და ცენტრის წევრებისა და მეგობრებისთვის</a>
						<?php /*?>	<a class="dropdown-item" href="#">კატეგორია 2</a>
							<a class="dropdown-item" href="#">კატეგორია 3</a>
							<a class="dropdown-item" href="#">კატეგორია 4</a>
							<a class="dropdown-item" href="#">კატეგორია 5 </a>
							<a class="dropdown-item" href="#">კატეგორია 5 </a><?php */?>
						</div>
					</li>
				 
					
						<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							Special events
						</a>
						<div class="dropdown-menu" style="width: 400px">
							<a class="dropdown-item" href="#">კულტურის მიმართულებით</a>
							<a class="dropdown-item" href="#">სულიერი მიმართულებით </a>
							<a class="dropdown-item" href="#">სამეცნიერო-შემეცნებითი მიმართულებით</a>
						</div>
					</li>
					
					 
					<li class="nav-item">
						<a class="nav-link" href="contact.html">contact</a></a>
					</li>
			
			<li class="nav-item">
				
				<li class="nav-item">
			 
				<?php if ($_GET['lang']=='geo')
{
	?>
	
	<a class="nav-link" href="index.php?do=full&id=<? echo $b['id'];?>"> <img src="img/geoflag.png" width="30px" ></a> 
<?
	
}  else { ?> 
	
						<a class="nav-link" href="index.php?lang=ka"> <img src="img/geoflag.png" width="30px" ></a> 
					<? } ?>
					</li>
	
				</ul>
			</div>
		</nav>
	</div>
</header>
<!--/ Header end -->