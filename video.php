
					
		<div class="container">
		<div class="row" style="width: 900px;">	
		<div style="position: relative; margin-left: 20px;" class="col-md-4">
	<table width="900px" style="position:relative; margin-left:2px;">
            <tr>
            
             
              <?
$x==0;

if ($_REQUEST['kategory']='kategory')
{  
$a=mysqli_query($conn, "SELECT * FROM `kultura_cxrili` where kategory='ფოტო' and Eng_Geo='Geo' ORDER BY id DESC");
while ($b=mysqli_fetch_array($a))


{

?> 





<td valign="top" width="900px">

<style>
		#im {
  height: 300px;
  
  -moz-transition: all 1.3s;
  -webkit-transition: all 1.3s;
  transition: all 1.3s;
}

.cover {
  width: 550px;
	height:300px;
  object-fit: cover;
  
  
}
.cover:hover  { -moz-transform: scale(1.4);
  -webkit-transform: scale(1.4);
  transform: scale(1.4);
	  }
	  

	</style> 
     
	 <div style=" margin-top:-17px; position: relative; margin-left: 50px;">
<a href="index.php?do=full&id=<? echo $b['id'];?>"> <img src="<?=HTTP_HOST?><? echo $b['upload'];?>" id="im" class="cover" style="position:relative; margin-left: -50px; right: 50px;"> <span style="position:relative; top:-180px; left:338px; z-index:140; color:#FFFFFF;"> <? echo $b['news_date']; ?> </span>
</div>
    
      <img src="img/youtube11.png" width="70" style="position:relative; top:-80px; left:15px;">
</div>

 <div style="position:relative; height:50px; width:440px; margin-top:-65px; padding-bottom:50px; z-index:1001; font-size:14px;"> <b><? echo $b['satauri']; ?> 
 </b></div></a>
    
   <style>
  
.transparent_class {
	filter:alpha(opacity=60);
	-moz-opacity:0.5;
	-khtml-opacity: 0.5;
	opacity: 0.5;
	position:relative;
}
#content{
	 filter:alpha(opacity=50);
  /* CSS3 standard */
  opacity:0.6;
   
    height:58;
	left:0px; 
	
 
 
 
}
 </style>
   
<style>
		#im1 {
  height: 15px;
  transition: all .2s ease-in-out;
}

.cover1 {
  width: 25px;
  object-fit: cover;
  
  
}
.cover1:hover  { transform: scale(1.3) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s;
	  }
	

	</style>
        <style>  
@font-face { font-family: bpg_nino_mtavruli_book; src:url(FONTS/bpg_nino_mtavruli_book.ttf); } @font-face { font-family: bpg_nino_mtavruli_book; font-weight: 100; src: url('FONTS/bpg_nino_mtavruli_book.ttf'); }  b { font-family:bpg_nino_mtavruli_book, sans-serif; }  </style> 
    
 
  </td>
   <? 
$x++;
 
if ($x==2) 
{
echo '</tr>';
$x=0;
}
 } }  ?>
 </tr>
</table> </div>
		</div>  

  </div>
					
			</div></div></div></div></div></div>
		
		
		
		