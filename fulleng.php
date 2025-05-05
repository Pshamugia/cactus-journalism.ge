<?
error_reporting(0); 

$id = (int) $_GET['id'];

$a=mysqli_query($conn,'select * from kultura_cxrili where id='.$id);
	$b=mysqli_fetch_array($a);
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
     
     
     
     
 
 <div class="container">
 <div class="row">
 
 <div class="col-md-8" style="position:relative; left:15px;"> 
 
 

 <div class="ziritadi" style="position:relative; margin-top:20px;">
<j style="background-color:#EC383B;  position:relative; padding-left:5px; padding-top:2px; padding-bottom:3px; font-size:14px; color:#FFFFFF; padding-right:5px; font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);"> <? 
 
  if ($b['kategory']=='სიძულვილის ენა')
{
	echo 'მწერლები სიძულვილის ენის წინააღმდეგ';
}
else 

{
	echo $b['kategory'];
	
	}
?> </j> 
 <h4 align="left" style="margin-left:0px; padding-bottom:10px; font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);">   <div style="line-height:26px;"> <b style="font-size:18px; font-family:bpg_mrgvlovani_caps_2010;">   <? echo $b['satauriEng'];?>   </b> </div>   </h4>
   
<? if ($b['kategory']=='ვიდეო')

{
	echo "";
}

elseif ($b['ena']=='1' && $b['kategory']!='ვიდეო')
{
?> 
        <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $b['img_description'];?>" href="<?=HTTP_HOST?>/watermark2.php?img=<? echo $b['upload'];?>">
		<img src="<?=HTTP_HOST?>/watermark2.php?img=<? echo $b['upload'];  ?>"  class="cover007" id="im007" style=""></a> 
		
		
		
		
		<? }
		
		?>
        
        <? if ($b['ena']!=='1' && $b['kategory']!='ვიდეო')

{
	 
?>
        <a class="fancybox-effects-b" data-fancybox-group="button" title="<? echo $b['img_description'];?>" href="<?=HTTP_HOST?><? echo $b['upload'];?>">
		<img src="<?=HTTP_HOST?><? echo $b['upload'];  ?>"  class="cover007" id="im007" style=""></a> 
        <?
		}
		
		 ?>
  
 </div>

<? // START FACEBOOK SHARE BUTTON      ?>

<div style="width:auto; margin-left:-15px; padding-right:30px; font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf);" align="right" class=" col-md-2">
    <div>
  <div  class="ziritadi" align="right">

 <div style="font-size:14px; font-weight:100; position:relative;  margin-top:40px; right:0;" id="linkebi" class="ziritadi">

<?php
$var = 0;

// Evaluates to true because $var is empty
if (empty($avtori)) {
    echo '';
}
?>

 

<? $avt=mysqli_query($conn, "select * from avtorebi where id='$b[avtori]'");
$avts_id=mysqli_fetch_array($avt);
echo "<a href='index.php?do=fullavtor&id=".$avts_id['id']."'>". $avts_id['avtori'].'</a>';   ?>  </div> </div>



   

 
 
<div style="position:relative; margin-top:15px; width:100px; font-size:14px;" class="one">   
 


 <?php 
  
function dateToString($date, $delimiter = '-', $type = 1) {
            if (!empty($date)) {
                $month = array(
                    '01' => 'იანვარი',
                    '02' => 'თებერვალი',
                    '03' => 'მარტი',
                    '04' => 'აპრილი',
                    '05' => 'მაისი',
                    '06' => 'ივნისი',
                    '07' => 'ივლისი',
                    '08' => 'აგვისტო',
                    '09' => 'სექტემბერი',
                    '10' => 'ოქტომბერი',
                    '11' => 'ნოემბერი',
                    '12' => 'დეკემბერი',
                );
                $arr = explode($delimiter, $date);
                if ($type == 1) {
                    
					?>
                    <img src="<?=HTTP_HOST?>IMG/hour.png" width="12px" style="position:relative; top:-2px;"> 

                    <?    return                 
                     '<kl><a style="font-size:14px; color:#000000; position:relative; top:0; left:0px;">'. $arr[2] . '&nbsp;'. $month[$arr[1]].'</a></kl>';
                     
                  
                }
            }
            return '';
        }
 
?> 
		</div>

<a name="none" id="none" style="font-size:14px; color:#000000;"><div style="display:table-cell; font-size:12px; position:relative; top:-4px;"> 
<?php echo dateToString($b['news_date']); ?>

 <?php /*?> <?php 
if (!empty($b['hour']))
{
echo "&nbsp;/&nbsp;".$b['hour']; } ?> <?php */?></div></a> </div>

<div style="padding-left:px; position:relative; margin-top:10px;" id="li" class="one">   

 <div style="font-size:14px; position:relative; display:table-cell; font-size:14px;" class="one"> <img src="<?=HTTP_HOST?>IMG/view.png" width="18" style="position:relative; top:-5px; margin-right:5px;"> </div> <div style="position:relative; top:-2px; color:#535353; font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf); font-size:14px; display:table-cell; position:relative; top:-4px;">  <?php


echo $b['view_count'];

?>   </a> </div> </div>



<div style="position:relative;  width:127px; right:-9px;  top:8px; z-index:101;" align="right">
<div class="one" >

<div class="sharethis-inline-share-buttons"></div></div>
<!-- AddToAny END -->

<? // END FACEBOOK SHARE BUTTON      ?>   </div>

</div>





<div id="printDiv" style="position:relative; top:40px;" class="ziritadi col-md-9">
  
 
<style> 
@font-face { font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf'); }   j { font-family:bpg_algeti_compact, sans-serif; }    </style>
 

<span style="font-size:16px; line-height:25px; font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf); color:#000000">
 
 
 
 <style> 
 
 a { 
 
 color:#152EA3;
 
 }
 
 a:hover 
 {
color:#000000;

 }
 
 
blockquote { 
  width:auto;

    font-size:16px; 
	border-left:4px solid #555;
  text-align:left; 
  line-height: 25px;
  padding: 0.5em 25px; 
  margin: 1.5em 0px;
  
  
}

blockquote:before {  
font-family: 'Anton', sans-serif;
    content: open-quote;  
    font-size: 24pt;  
    text-align: center;  
    line-height: 42px;  
    color: #fff;  
    background: #ddd;  
    float: left;  
    position: relative;  
    border-radius: 25px;  
   margin-right: 0.5em;
   margin-left:-10px;
  vertical-align: -0.4em;
  
    /** define it as a block element **/  
    display: block;  
    height: 25px;  
    width: 25px;  
}  
blockquote:after {  
font-family: 'Anton', sans-serif;
    content: close-quote;  
    font-size: 24pt;  
    text-align: center;  
    line-height: 42px;  
    color: #fff;  
    background: #ddd;  
    float: right;  
    position: relative;  
    border-radius: 25px;
	top:-20px;  
	left:1em;
    margin-right: 0.5em;
    vertical-align: -0.5em;
  
    /** define it as a block element **/  
    display: block;  
    height: 25px;  
    width: 25px;  
}  

blockquote:hover

{
	
  background-color: #EBEBEB; 
border-left:4px solid #000000;	
 
}


blockquote:hover:after, blockquote:hover:before {  
font-family: 'Anton', sans-serif;
    background-color: #555; 
    transition: all 350ms;  
    -o-transition: all 350ms;  
    -moz-transition: all 350ms;  
    -webkit-transition: all 350ms; 
}  


form 

{
	
	background-color:#E7E7E7;
	border:1px solid #000000;
	border-radius:5px;
	padding:10px;
}

form:hover

{
	
	background-color:#FDFDFD;
	border:1px solid #000000;
	border-radius:5px;
	padding:10px;
}



 </style>
 </style>
 
 
 
 <?
 
 echo $b['fullEng']; ?> <br> </span>
 

 </div>
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

<div style="margin-left:157px; width:100%; margin-top:40px; margin-bottom:-80px;" class="col-md-8 one" >
          <? 
  $tags = explode(',', $b['tags']);
   foreach ($tags as $tag)
  { 
	  if (!empty($tag))
	  {
	  ?>
      <div id="tags" style="float:left; padding-right:7px;  ">
	 <a href="<?=HTTP_HOST?>index.php?do=search&tag=<? echo $tag; ?>" style="padding-left:5px; padding-right:5px; padding-top:3px; position:relative; font-size:12px; ">  <? echo $tag; ?> </a>
	 
      </div> 
     
      <? 
	 
  } }
  

  
  ?> </div> 
  
  
  
  </div>

 




<!--მეორე ბლოკი-->


 
 
 <!--მეორე ბლოკი1111111111111111111111111111111111111111-->
 
<div class="col-md-4" style="position:relative; left:10px;" align="left">  
   <?
		
$relatedTopQuery = mysqli_query($conn, 'SELECT * FROM `kultura_cxrili` WHERE `kategory`=\''.$b['kategory'].'\' and eng_geo="Geo" and `id`!='.$b['id'].' order by news_date desc limit 0, 1');
if($relatedTopQuery){
		while ($row = mysqli_fetch_array($relatedTopQuery)) {
 ?>
 <div style="padding-top:20px; " align="left">
 <div style="position:relative; margin-left:-2px; height:50px; background-color:#EDEDED; border-bottom:1px solid rgba(255, 255, 255, 0.3); margin-top:1px;  width:340px;" align="left"> 
 <k style="position:relative; font-size:14px; margin-left:10px; font-weight:100; top:10px; ">   ამავე კატეგორიაში </k> </a> </b> </div> </div>
   
 <? }} ?>
      <div style="color:#000000; position:relative; left:0px; padding-top:25px;">

       
  <style>
		#im5 {
  height: 50px;
  transition: all .2s ease-in-out;
}

.cover5 {
  width: 80px;
  object-fit: cover;

}
.cover5:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */
 opacity: 0.7;
    filter: alpha(opacity=70);
	 transition: all .7s;

}


	</style>
    
    <style>
		#im5 {
  height: 50px;
  transition: all .2s ease-in-out;
}

.cover5 {
  width: 80px;
  object-fit: cover;

}
.cover5:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */
 opacity: 0.7;
    filter: alpha(opacity=70);
	 transition: all .7s;

}


	</style>
    
     <style>
 
#indexs, #indexs ul{
 list-style-type:none;
list-style-position:outside;
width:340px;
height:55px;
margin:0;
}

#indexs a{
display:block;
color:#000000;
text-decoration:none;
font-size:14px;
width:340px;

height:55px;
transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 

}

#indexs a:hover{
background:#e9ebee;
color:#4F4D4D;
height:55px;
width:340px;
transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 

 
}

#indexs li{
float:left;
position:relative;
font-size:14px;

}

#indexs ul {
position:absolute;
display:none;
 
font-size:14px;


}

#indexs li ul a{
 
float:left;
font-size:14px;


}

#indexs ul ul{
 


}	

#indexs li ul ul {
left:12em;
 

}

#indexs li:hover ul ul, #indexs li:hover ul ul ul, #indexs li:hover ul ul ul ul{
display:none; 

}
#indexs li:hover ul, #indexs li li:hover ul, #indexs li li li:hover ul, #indexs li li li li:hover ul{
display:block;

border:dashed 1px #999;
-moz-box-shadow: 5px 5px 8px #D6C89A;
-webkit-box-shadow: 5px 5px 8px #D6C89A;
box-shadow: 5px 5px 8px #D6C89A;
}

</style>
 <?
		
$relatedTopQuery = mysqli_query($conn, 'SELECT * FROM `kultura_cxrili` WHERE `kategory`=\''.$b['kategory'].'\' and eng_geo="Geo" and `id`!='.$b['id'].' order by news_date desc limit 0, 5');
if($relatedTopQuery){
		while ($row = mysqli_fetch_array($relatedTopQuery)) {
 ?>
<ul id="indexs"> <div align="left" style="position:relative; left:-40px;">  
 <li id="indexs" style="position:relative; border-bottom:0px solid #FFFFFF;">
 
<a href="<?=url($b['satauriEng'],'b', $row['id'])?>"><img src="<?=HTTP_HOST?><? echo $row['upload'];?>" alt="" id="im5" class="cover5" style="position:relative; padding-right:10px;  padding-bottom:0px;" align="left"  />  
<j style="position:relative; top:-2px; font-size:14px; "><?  
$avt=mysqli_query($conn, "select * from  avtorebi where id='$row[avtori]'");
$avts_id=mysqli_fetch_array($avt); ?> 
 
<?	echo $avts_id['avtori']; ?>  -   <? echo $row['satauriEng']; ?>  </j> </a>     </div>  </li></ul>
        
       
    <hr style="border: 0;
    height: 0;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid rgba(255, 255, 255, 0.3); width:320px;">
    
     


   <?  }}  ?>  </div>

   

   <!--banner place-->
   
   <div style="position:relative; margin-left:-2px;   height:50px; background-color:#EDEDED; border-bottom:1px solid rgba(255, 255, 255, 0.3); margin-top:25px; width:340px;"> <k style="position:relative; font-size:16px; margin-left:10px; font-weight:100; top:10px;">   პარტნიორები </k> </a> </b> </div>
 
 

 

 <?  $x==0;
$counter=0;
 

for ($start=1; $start<2;$start++ ) /*for-ი იწერება ასე: ფრჩხილების შიგნით იწერება ჯერ საწყისი პირობა, მერე დამამთავრებელი პირობა და მესამე სიაშია არის ის, რაც განახლების სახით უნდა შეასრულოს */

{
	$counter = $counter+1;
	
if ($counter==3 )
{	
	echo "<br><br>";
}{
$lk=mysqli_query($conn, "select * from banner where kategory='banner1' OR kategory='banner2' OR kategory='banner3' OR kategory='banner4' OR kategory='banner5' order by id desc ");
while ($kl=mysqli_fetch_array($lk))
{
 ?>

 

 <a href="<? echo 'https://'.$kl['linki']; ?>" target="_blank"> <img src="<?=HTTP_HOST?><? echo $kl['upload'];?>" alt="" class="cover12" id="im12" style="position:relative; margin-bottom:18px; margin-right:15px; padding-bottom:15px; margin-top:15px;"   align="left" > </a>
 
 
 <? if ($kategory=='banner5')
 
 { ?>

 <a href="<? echo 'http://'.$kl['linki']; ?>" target="_blank"> <img src="<?=HTTP_HOST?><? echo $kl['upload'];?>" alt="" class="cover12" id="im12" style="position:relative; margin-bottom:18px; margin-right:15px; padding-bottom:15px; margin-top:15px;"   align="left" > </a>
 
 <? } ?>
  <style>
		#im12 {
  height: 100px;
  transition: all .2s ease-in-out;
}

.cover12 {
  width: 160px;
  object-fit: cover;

}
.cover5:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */
 opacity: 0.7;
    filter: alpha(opacity=70);
	 transition: all .7s;

}


	</style>


 <?


echo '';
$x=0;
}
 }
} 

	?>


</div>

 </div>

        

</div>

</div>



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
					href : '<?=HTTP_HOST?>iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '<?=HTTP_HOST?><? echo $data['upload'];?>',
						title : '<? echo $data['img_description'];?>'
					}, {
						href : '<?=HTTP_HOST?>2_b.jpg',
						title : '<?=HTTP_HOST?>2nd title'
					}, {
						href : '<?=HTTP_HOST?>3_b.jpg'
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

  
  </div>  




</div> </div> </div>