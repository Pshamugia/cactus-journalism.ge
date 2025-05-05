<?
	include("config.php");
	
	if(isset($_GET["w"]) && intval($_GET["w"])) $width=intval($_GET["w"]); else $width=112;
	if(isset($_GET["h"]) && intval($_GET["h"])) $height=intval($_GET["h"]); else $height=25;
	if(isset($_GET["l"]) && intval($_GET["l"])) $length=intval($_GET["l"]); else $length=5;
	
	$font     = __DIR__.'/fonts/Lato/Lato-Bold.ttf';

	$font_size   = 14;
	$bg_color = array(240, 240, 240);
	$chars    = 'ABCDEFGHKMNPQRSTUVWXYZ23456789';
	putenv('GDFONTPATH=' . realpath('.'));
	if (extension_loaded('gd') == false)
	{
		die("The GD extension is required for CAPTCHA!");
	}
	if (function_exists('imagettftext') == false)
	{
		die("The function 'imagettftext' is required for CAPTCHA!");
	}
	$img = imagecreatetruecolor($width, $height);
	$bkgr = imagecolorallocate($img,255, 255, 255);
	imagefilledrectangle($img, 0, 0, $width, $height, $bkgr);

	$right = rand(10, 30);
	$left = 0;
	
	$c_min = rand(120, 185);
	$c_max = rand(195, 280);
	$left = 0;
	
	$top = 0;
	
	$code = '';
	for($i = 0; $i < $length; $i++)
	{
		$code .= $chr = $chars[mt_rand(0, strlen($chars)-1)];
		$r = rand(0, 192);
		$g = rand(0, 192);
		$b = rand(0, 192);
		$color = imagecolorallocate($img, $r, $g, $b);
		$rotation = rand(-35, 35);
		$x = 5+$i*(4/3*$font_size+1);
		$y = rand(4/3*$font_size, $height-(4/3*$font_size)/2);
		imagettftext($img, $font_size, $rotation, $x, $y, $color, $font, $chr);
	}

	$_SESSION['captcha_text'] = md5($code);
	

	header("Content-type: image/png");
	header("Expires: Mon, 01 Jul 1998 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	imagepng($img);
	imagedestroy($img);	
?>