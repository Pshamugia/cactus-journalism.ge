<?php
error_reporting(0);
include ('config.php');
include ('functions.php');

//$id = isset($_GET['id']) ? $_GET['id'] : 0;

//exit(mysqli_error($conn)); 
 
 



function Geo2Eng($text)
    	{
			$alphabet = array (
        'ა' => 'a',
        'ბ' => 'b',
        'გ' => 'g',
        'დ' => 'd',
        'ე' => 'e',
        'ვ' => 'v',
        'ზ' => 'z',
        'თ' => 't',
        'ი' => 'i',
        'კ' => 'k',
        'ლ' => 'l',
        'მ' => 'm',
        'ნ' => 'n',
        'ო' => 'o',
        'პ' => 'p',
        'ჟ' => 'zh',
        'რ' => 'r',
        'ს' => 's',
        'ტ' => 't',
        'უ' => 'u',
        'ფ' => 'f',
        'ქ' => 'q',
        'ღ' => 'gh',
        'ყ' => 'y',
        'შ' => 'sh',
        'ჩ' => 'ch',
        'ც' => 'ts',
        'ძ' => 'dz',
        'წ' => 'w',
        'ჭ' => 'cw',
        'ხ' => 'kh',
        'ჯ' => 'j',
        'ჰ' => 'h',
    );
        	return str_replace(
            array_keys($alphabet),
            array_values($alphabet),
            preg_replace_callback(
                // make capital from first chars of sentences
                '/(^|[\.\?\!]\s*)([a-z])/s',
                function ($m) {
                    return $m[1] . strtolower($m[2]);
                },
				
                $text)
				
        	);
    	}

function url($title, $category, $id=0)
{
	$title=Geo2Eng($title);
	$url=str_replace(" ","_",strip_tags(trim($title.'/'.$category)));
		$url=str_replace("\"","",$url);
		$url=str_replace("'","",$url);
		$url=str_replace(":","x",$url);
		$url=str_replace("?","",$url);
		$url=str_replace("&quot;","",$url);
		$url=HTTP_HOST.str_replace(" ","_",$url);
		if($id) $url.=$id;
		if($return) return $url;
		else echo $url;
}

function ParseURL()
	{
		global $conn;
		$DO_ID = 0;
		$list=explode("/",$_SERVER['REQUEST_URI']);
		if(strlen($list[count($list)-1])) $urlData=$list[count($list)-1];
		else if(strlen($list[count($list)-2])) $urlData=$list[count($list)-2];
		if(!strlen($urlData))
		{
			$_GET['do']="";
			$DO_ID=0;
		}
		else
		{
			preg_match("/([^\d]+)(\d+)?/",mysqli_real_escape_string($conn, $urlData),$matches);
			$DO_ID=$matches[2];
			switch($matches[1])
			{
				case "b" : 
				{
					$_GET['do']="full";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "coub" : 
				{
					$_GET['do']="coub";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "search" : 
				{
					$_GET['do']="search";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
						case "news" : 
				{
					$_GET['do']="news";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
					case "events" : 
				{
					$_GET['do']="events";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "past" : 
				{
					$_GET['do']="past";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "structure" : 
				{
					$_GET['do']="structure";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
				
					case "mission" : 
				{
					$_GET['do']="mission";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "membership" : 
				{
					$_GET['do']="membership";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "assembly" : 
				{
					$_GET['do']="assembly";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
						case "council" : 
				{
					$_GET['do']="council";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
				
						case "prize" : 
				{
					$_GET['do']="prize";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "blogs" : 
				{
					$_GET['do']="blogs";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
				case "statements" : 
				{
					$_GET['do']="statements";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
					case "writers_politics" : 
				{
					$_GET['do']="writers_politics";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
					
					
					
							case "penvironment" : 
				{
					$_GET['do']="penvironment";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
				
					case "hatespeech" : 
				{
					$_GET['do']="hatespeech";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
				case "partners" : 
				{
					$_GET['do']="partners";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
					case "contact" : 
				{
					$_GET['do']="contact";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
				
						case "video" : 
				{
					$_GET['do']="video";	
					$_REQUEST['do'] = $_GET['do'];
					$_GET["id"]=$DO_ID;
				}
				break;
				
				
			}
		}
	}

ParseURL();  
if(isset($_GET['id']))
	$id = intval($_GET['id']);
else
	$id = 0;

?>

<!DOCTYPE html>
<html lang="en"><head>
	 <style> html {
  scroll-behavior: smooth;
} </style>
	<?php
$title = 'CACTUS Journalism';
$shareImage = '';


if (isset($_GET['do']) && $_GET['do']=='full' && isset($_GET['id'])){
	$id = (int) $_GET['id'];
	$a=mysqli_query($conn,'select * from kultura_cxrili where id='.$id);
	$b=mysqli_fetch_array($a);
	if($b){
		$aa=mysqli_query($conn,"select * from avtorebi where `id`=".$b['avtori']);
		$avtori=mysqli_fetch_array($aa);
		
		$title = '';
		$shareImage = 'https://cactus-journalism.ge/'.$b['upload'];
	
		//if($avtori){
//			$title = $avtori['avtori'].' | ';
//		}
		
		$title .= $b["title_$_SESSION[LANG]"];
}
	
}

function currentPageURL() {
    $curpageURL = 'http';
    if (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') {
        $curpageURL .= 's';
    }
    $curpageURL .= '://';
    $requestUrl = htmlspecialchars(urldecode($_SERVER['REQUEST_URI']));
    if ($_SERVER['SERVER_PORT'] != '80') {
        $curpageURL .= $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . $requestUrl;
    } else {
        $curpageURL .= $_SERVER['SERVER_NAME'] . $requestUrl;
    }
    return $curpageURL;
}

	
	
	// email_subscribe 
	if(isset($_POST['email_subscribe']) && !empty(trim($_POST['email'])))
{
		
	$res = mysqli_query($conn, "SELECT * FROM emails WHERE email='".trim($_POST['email'])."' AND status=1");
	$data = mysqli_fetch_assoc($res);
		 // exit(mysqli_error($data));
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

<? if (isset($_REQUEST['do']))  
  {?>
<meta property="og:title" content="<? echo $b["satauri_$_SESSION[LANG]"]; ?>" />  
  
  <? 
  }
  else
  {
  ?>
  <meta property="og:title" content="Cactus journalism!!!!">

 
 <? } ?>
 <? if ($_REQUEST['do'])  
  {?>
  <meta content="<? echo strip_tags($b["agwera_$_SESSION[LANG]"]); ?>" name="description">
  
  
  <? 
  }
  else
  {
  ?>
  
    <meta content="CACTUS-JOURNALISM.GE" name="description">
  <? } ?>
	
	  <? if ($_REQUEST['do'])  
  {?>
	 <meta property="og:image" content="<?=$shareImage ?>" />
 <? 
  }
  else
  {
  ?>
	<meta property="og:image" content="<?=HTTP_HOST?>img/user.png" />
	
	<? } ?>
	
 <meta property='og:url' content='<?=currentPageURL() ?>'/>
 <? if ($_REQUEST['do'])  
  {?>
  <meta property="og:description" content="<? echo strip_tags($b["agwera_$_SESSION[LANG]"]); ?>" name="description">
  
  
  <? 
  }
  else
  {
  ?>
 <meta property="og:description" content="კაქტუსი არის სამედიცინო საიტი" />
 <? } ?>
 <meta property="og:type" content="website" />
	<meta property="fb:app_id"          content="2864739830448667" /> 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<meta name="keywords" content="მედიცინა, მეცნიერება, ჯანდაცვა">
  <title><? echo $b["title_$_SESSION[LANG]"]; ?></title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?=HTTP_HOST?>plugins/bootstrap/bootstrap.min.css">
	<!-- FontAwesome -->
  <link rel="stylesheet" href="<?=HTTP_HOST?>plugins/fontawesome/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="<?=HTTP_HOST?>plugins/animate.css">
	<!-- Prettyphoto -->
	<link rel="stylesheet" href="<?=HTTP_HOST?>plugins/prettyPhoto.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?=HTTP_HOST?>plugins/owl/owl.carousel.css">
	<link rel="stylesheet" href="<?=HTTP_HOST?>plugins/owl/owl.theme.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="<?=HTTP_HOST?>plugins/flex-slider/flexslider.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="<?=HTTP_HOST?>plugins/cd-hero/cd-hero.css">
	<!-- Style Swicther -->
	 <?
	 	$current_style=HTTP_HOST.'css/presets/preset3.css';
		if(isset($_COOKIE['active_style']) && !empty($_COOKIE['active_style']))
			$current_style=HTTP_HOST.$_COOKIE['active_style'];
	 ?>
	<link id="style-switch" href="<?=$current_style?>" media="screen" rel="stylesheet" type="text/css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="plugins/html5shiv.js"></script>
      <script src="plugins/respond.min.js"></script>
    <![endif]-->

  <!-- Main Stylesheet -->
  <link href="<?=HTTP_HOST?>css/style.css" rel="stylesheet">
  
  <!--Favicon-->
	<link rel="icon" href="<?=HTTP_HOST?>img/favicon.png" type="image/x-icon" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=HTTP_HOST?>img/favicon.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=HTTP_HOST?>img/favicon.png">
	<link rel="apple-touch-icon-precomposed" href="<?=HTTP_HOST?>img/favicon.png">
	 
	 <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=60283d59a0a5fc001153a61e&product=sop' async='async'></script>
<!-- jQuery -->
<script src="<?=HTTP_HOST?>plugins/jQuery/jquery.min.js"></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FT4RXWVVBQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FT4RXWVVBQ');
</script>
</head>
	
	<body>   
		<style> 
@font-face { font-family: bpg_extrasquare_mtavruli_2009; src:url("fonts/bpg_extrasquare_mtavruli_2009.ttf"); } @font-face { font-family: bpg_extrasquare_mtavruli_2009; src: url('fonts/bpg_extrasquare_mtavruli_2009.ttf');  }  
li { font-family:bpg_extrasquare_mtavruli_2009, sans-serif; font-size:14px; font-weight: bold }    </style>
		
	<? 	
	include ('header.php'); ?>


 <? 
	 
		if ($_REQUEST['do']) include ($_REQUEST['do'].'.php'); else include ('home.php');	
	
	
?>  
   


<style> 
@font-face { font-family: bpg_mrgvlovani_caps_2010; src:url("fonts/bpg_extrasquare_mtavruli_2009.ttf"); } @font-face { font-family: bpg_extrasquare_mtavruli_2009; src: url('<?=HTTP_HOST?>fonts/bpg_extrasquare_mtavruli_2009.ttf');  }    
k { font-family:bpg_extrasquare_mtavruli_2009, sans-serif; font-size:16px; }    </style>


	
	

	<!-- Footer start -->
	<footer id="footer" class="footer">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-4 col-sm-12 footer-widget">
	        <h3 class="widget-title"><k style="font-size:22px"><? echo $LANG['about']; ?> </k></h3>
	        <div class="latest-post-items media">
	          <div class="latest-post-content media-body">
				  <?
$a=mysqli_query($conn,"select * from menu WHERE title_ka='ჩვენ შესახებ'");
$b=mysqli_fetch_array($a);
	$res = mysqli_query($conn, "SELECT * FROM kultura_cxrili where kategory='$b[id]'");
	while($data = mysqli_fetch_assoc($res))

{ ?>
		
				  
	            <h4><a href="index.php?do=content&id=<?=$b['id']?>"><span style="font-size: 16px"><?php echo strip_tags($data["agwera_$_SESSION[LANG]"]);?> </span></a></h4> <? } ?>
	             
	          </div>
	        </div><!-- 3rd Latest Post end -->

	      </div>
	      <!--/ End Recent Posts-->


			 <style>	
			  
			  #im4 {
  height: 80px;
  
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
}

.cover4 {
  width: 100%;
  object-fit: cover;
  
  
}  
	  </style>
			
			
	      <?php /*?><div class="col-md-4 col-sm-12 footer-widget">
	        <h3 class="widget-title"><k style="font-size:22px"><? echo $LANG['Photo Gallery']; ?></k></h3>

	        <div class="img-gallery">
				<div class="img-container">
				<?
 
$aaaaa=mysqli_query($conn, "select * from kultura_cxrili limit 6");
while($data=mysqli_fetch_array($aaaaa))
{
	$avt=mysqli_query($conn, "select * from gallery where id='$data[avtori]' ");
$f=mysqli_fetch_array($avt); ?>
				
	          
	            <a class="thumb-holder" data-rel="prettyPhoto" href="<?=HTTP_HOST?><? echo $data['upload'];?>">
	              <img src="<? echo $data['upload'];?>" id="im4" class="cover4" alt="">
	            </a> 
	           
	            </a>
	          
			  <? } ?></div>
	        </div>
	      </div><?php */?>
	      <!--/ end flickr -->

	      <div class="col-md-3 col-sm-12 footer-widget footer-about-us">
	        <h3 class="widget-title"><k style="font-size:22px"><? echo $LANG['contact']; ?> </k></h3>
 
  	        <div class="row">
	          <div class="col-md-6">
				  <h4><span style="font-size:16px">  <?=$LANG['email']?> </span></h4>
	            <p>cactusjournalism@gmail.com</p>
	          </div>
	         
	        </div>
			  
			 
			  
	        <form action="" role="form" method="post">
				
	          <div class="input-group subscribe">
	            <input type="email" name="email" class="form-control" placeholder="<?=$LANG['newsletter']?>" required="">
	            <span class="input-group-addon">
	              <button class="btn" name="email_subscribe" type="submit"><i class="fa fa-envelope-o"> </i></button>
	            </span>
	          </div> 
	        </form>
	      </div>
	      <!--/ end about us -->

	    </div><!-- Row end -->
	  </div><!-- Container end -->
	</footer><!-- Footer end -->


	<!-- Copyright start -->
	<section id="copyright" class="copyright angle">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12 text-center">
	        <ul class="footer-social unstyled">
	          <li>
	            
	            <a title="Facebook" href="#">
	              <span class="icon-pentagon wow bounceIn"><i class="fa fa-facebook"></i></span>
	            </a>
				  
	         	   <a title="Twitter" href="#">
	              <span class="icon-pentagon wow bounceIn"><i class="fa fa-twitter"></i></span>
	            </a>         
				  
				  <a title="linkedin" href="#">
	              <span class="icon-pentagon wow bounceIn"><i class="fa fa-linkedin"></i></span>
	            </a>
	           
	            <a title="Skype" href="#">
	              <span class="icon-pentagon wow bounceIn"><i class="fa fa-skype"></i></span>
	            </a>
	           
	          </li>
	        </ul>
	      </div>
	    </div>
	    <!--/ Row end -->
	    <div class="row">
	      <div class="col-md-12 text-center">
	        <div class="copyright-info">
	       <?php echo date('Y'); ?> &copy; cactus-journalism.ge</span>
	        </div>
	      </div>
	    </div>
	    <!--/ Row end -->
	    <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix position-fixed" >
	      <button class="btn btn-primary" title="Back to Top" onclick="window.location.href='#';"><i class="fa fa-angle-double-up"></i></button>
	    </div>
	  </div>
	  <!--/ Container end -->
	</section>
	<!--/ Copyright end -->

</div><!-- Body inner end -->


<!-- Bootstrap JS -->
<script src="<?=HTTP_HOST?>plugins/bootstrap/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script
><!-- Style Switcher -->
<script type="text/javascript" src="<?=HTTP_HOST?>plugins/style-switcher.js"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="<?=HTTP_HOST?>plugins/owl/owl.carousel.js"></script>
<!-- PrettyPhoto -->
<script type="text/javascript" src="<?=HTTP_HOST?>plugins/jquery.prettyPhoto.js"></script>
<!-- Bxslider -->
<script type="text/javascript" src="<?=HTTP_HOST?>plugins/flex-slider/jquery.flexslider.js"></script>
<!-- CD Hero slider -->
<script type="text/javascript" src="<?=HTTP_HOST?>plugins/cd-hero/cd-hero.js"></script>
<!-- Isotope -->
<script type="text/javascript" src="<?=HTTP_HOST?>plugins/isotope.js"></script>
<script type="text/javascript" src="<?=HTTP_HOST?>plugins/ini.isotope.js"></script>
<!-- Wow Animation -->
<script type="text/javascript" src="<?=HTTP_HOST?>plugins/wow.min.js"></script>
<!-- Eeasing -->
<script type="text/javascript" src="<?=HTTP_HOST?>plugins/jquery.easing.1.3.js"></script>
<!-- Counter -->
<script type="text/javascript" src="<?=HTTP_HOST?>plugins/jquery.counterup.min.js"></script>
<!-- Waypoints -->
<script type="text/javascript" src="<?=HTTP_HOST?>plugins/waypoints.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

<script type="text/javascript" src="<?=HTTP_HOST?>FANCY-GALLERY/lib/jquery-1.10.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?=HTTP_HOST?>FANCY-GALLERY/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?=HTTP_HOST?>FANCY-GALLERY/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?=HTTP_HOST?>FANCY-GALLERY/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?=HTTP_HOST?>v/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?=HTTP_HOST?>FANCY-GALLERY/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?=HTTP_HOST?>FANCY-GALLERY/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="<?=HTTP_HOST?>FANCY-GALLERY/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?=HTTP_HOST?>FANCY-GALLERY/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '<? echo $data['upload'];?>',
						title : '<? echo $data['title_ka'];?>'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
  	</style>
    

</body>

</html>