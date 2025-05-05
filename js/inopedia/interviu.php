
<div class="title">
				
			  <ul class="tabNavigation">
				   <li><a class="" href=""><span><span><b>ინტერვიუ</b></span></span></a></li>
				  
		      </ul>
				 
</div> 

<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
  
	
	<script src="js/prototype.js" type="text/javascript"></script> 
	<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script> 
	<script src="js/lightbox.js" type="text/javascript"></script> 		 
				<table width="600px">
<tr> <?php
	/*
		Place code to connect to your DB here.
	*/


	$tbl_name="kultura_cxrili";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 10;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory='ინტერვიუ'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=interviu"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where kategory='ინტერვიუ' order by id desc LIMIT $start, $limit";

	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage&page=$prev\">« previous</a>";
		else
			$pagination.= "<span class=\"disabled\">« previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage&page=$next\">next »</a>";
		else
			$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";		
	}
?>




  
<?

$a=mysql_query($sql);
while ($b=mysql_fetch_array($a))
{
 ?> 
 
 
 <? //  START ROUNDED CORNERS ?> 
  <div class="post-1 post hentry category-aenean-nonummy-hen category-fusce-suscipit-varius-micum-so category-natoque-penatibus-et category-praesent-vestibulum-molest tag-accusan tag-aperiam tag-doloremque tag-eaque tag-eor tag-inventore tag-ipsa tag-iste tag-laudantium tag-natus tag-omnis tag-perspiciatis tag-rem tag-sed tag-sit tag-totam tag-unde tag-veritat tag-voluptatem" id="post-1">
					
					<div class="indent">
						<div class="border-top"><div class="border-bot"><div class="border-left"><div class="border-right">
							<div class="corner-left-top"><div class="corner-right-top"><div class="corner-left-bot"><div class="corner-right-bot">
								
		 <? //  END AND START ROUNDED CORNERS amis daxurvaa sachiro ?> 	
		 					 
 <div style="background:#CCCCCC; width:130px; margin-left:-12px;"><font size="-1" class="front_text"><b> <? echo $b['kategory']; ?> </b> </font></div> 
 
 
<a href="<? echo $b['upload'];?>" rel="lightbox" title="demo.ge" onClick="return hs.expand(this)">  <img src="<? echo $b['upload'];?>" width="130"  height="130" align="left" style="margin-right:6px; margin-left:-12px; background:#CCCCCC" rel="lightbox" title="დააკლიკე">  </a>
  
  <div align="left"  style="margin-left:6px" id="linkebi">
 
     <style> 
@font-face { font-family: bpg_extrasquare_mtavruli_2009; src: url('bpg_extrasquare_mtavruli_2009.ttf'); } @font-face { font-family: bpg_extrasquare_mtavruli_2009; font-weight:400; src: url('bpg_extrasquare_mtavruli_2009.ttf'); }  h3 { font-family: bpg_extrasquare_mtavruli_2009, sans-serif; }  </style>
  <h3>
  <a href="index.php?do=full&id=<? echo $b['id'];?>"> <? echo $b['satauri'] ; ?>    </a> </h3> </div>
 
   
  
  <div align="left"  style="margin:6px" id="linkebi">  
  <?  

$avt=mysql_query("select * from  avtorebi where id='$b[avtori]'");
$avts_id=mysql_fetch_array($avt); ?>    <style> 
@font-face { font-family: bpg_extrasquare_mtavruli_2009; src: url('bpg_extrasquare_mtavruli_2009.ttf'); } @font-face { font-family: bpg_extrasquare_mtavruli_2009; font-weight:400; src: url('bpg_extrasquare_mtavruli_2009.ttf'); } b { font-family: bpg_extrasquare_mtavruli_2009, sans-serif; }  </style>

<div style="margin:4px; margin-left:6; font-size:14px; color:#000;"> <b> <?	echo $avts_id['avtori']; ?> 
	
	

  || <? echo $b['date']; ?>    </b> <br /></div>
  <div align="justify" style="width:auto; margin-left:-15px;">
 <font size="-1"  id="linkebi" color="#000000"> 
<? echo $b['agwera']; ?>     


 
 
 

 

<div style="background:url(images/block-to.gif); background-repeat:no-repeat; width:50px">
  <? 
  
  // კომენტარების რაოდენობა რო გამოჩნდეს მთავარ გვერდზე
$da=mysql_query("select * from coment where stat_id='$b[id]' order by id desc");
$com=0;
while($be=mysql_fetch_array($da))
{$com++;}
?>
 <div style="width:550px; height:10px; margin-top:8px" align="right">       <font color="#000000; margin-bottom:10px">
<a href="index.php?do=full&id=<? echo $b['id'];?>" id="gverditi"> <span class="style1"> </span>      <img src="button_g.gif" width="50" style="margin-right:-22px;" />    </a> &nbsp;&nbsp;     </font>   </div> 
 <? 


echo '</tr><tr>';
$x=0;
}


 




echo 
$pagination ?>

 
 



<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
 </script>
<script type="text/javascript">
var TabbedPanels2 = new Spry.Widget.TabbedPanels("TabbedPanels2");
</script>
 