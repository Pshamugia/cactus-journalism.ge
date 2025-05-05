<? 
$main_img = $_GET['img']; // main big photo / picture
$watermark_img = "images/success.gif"; // use GIF or PNG, JPEG has no tranparency support
$padding = 15; // distance to border in pixels for watermark image
$opacity = 100; // image opacity for transparent watermark
 
$watermark = imagecreatefromgif($watermark_img); // create watermark
$image = imagecreatefromjpeg($main_img); // create main graphic

if(!$image || !$watermark) die("Error: main image or watermark could not be loaded!");

$watermark_size = getimagesize($watermark_img);
$watermark_width = $watermark_size[0];
$watermark_height = $watermark_size[1];
 

$image_size = getimagesize($main_img);
$dest_x = $image_size[0] - $watermark_width - $padding;
// ამით აქეთ იქით გასწევ $dest_x = $image_size[0] - $watermark_width - $padding - 200;
$dest_y = $image_size[1] - $watermark_height - $padding;

/* ეს არის ვოთერმარკის გამაცენტრებელი $dest_x = ($image_size[0] / 2) - ($watermark_width / 2);
$dest_y = ($image_size[1] / 2) - ($watermark_height / 2);*/

// copy watermark on main image
imagecopymerge($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $opacity);

// print image to screen
header("content-type: image/jpeg");
imagejpeg($image);
imagedestroy($image);
imagedestroy($watermark); 
?>