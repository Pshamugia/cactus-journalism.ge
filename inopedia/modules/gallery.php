<?php 
include ('../functions.php');
error_reporting(0);
$hash=md5(time().$_SESSION['USER_ID']);
 
$redirect = false;

if (isset($_POST['submit']))
{
	$date=date('d.m.Y');  
	
	$b=''; 
	$b2=''; 
	$b3='';
	$b4='';   
	$b5='';
	$b6='';
	$b7='';
	$b8='';
	$b9='';
	$b10='';
    $b=array(); 
echo $_POST['hash']; 
$res=mysqli_query($conn, "SELECT * FROM tmp_uploads WHERE hash='$_POST[hash]'");
	echo mysqli_error($conn);
while ($image=mysqli_fetch_assoc($res))
	
	
	{ 
	
	if (resizeImage('../'.$image['path'], '../images/'.str_replace("tmp_uploads/","", $image['path'])))	
	{
		$b[]='images/'.str_replace("tmp_uploads/","", $image['path']);
	 }
}

 



$sql = "INSERT INTO kultura_cxrili 
        (kategory, subkat, upload, satauri_ka, satauri_en, avtori, avtori2, agwera_ka, agwera_en, full_ka, full_en, date, news_date, ena, menu, view_count, eng_geo, img_description, hour, tags_geo, tags_eng, hidden) 
        VALUES 
        ('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b[0]', '$_REQUEST[satauri_ka]', '$_REQUEST[satauri_en]', '$_REQUEST[avtori]', '$_REQUEST[avtori2]', '$_REQUEST[agwera_ka]', '$_REQUEST[agwera_en]', '$_REQUEST[full_ka]', '$_REQUEST[full_en]', '$date', '".strtotime($_REQUEST['news_date'])."', '$_REQUEST[ena]', '$_REQUEST[menu]',  '".intval($_REQUEST['view_count'])."', '$_REQUEST[eng_geo]', '$_REQUEST[img_description]', '$_REQUEST[hour]', '$_REQUEST[tags_geo]', '$_REQUEST[tags_eng]', '".intval($_REQUEST['hidden'])."')";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("MySQL error: " . mysqli_error($conn));
}

 //exit(mysqli_error($conn)); 
 }

 

if ($_REQUEST['delete'])
{ 
$x=mysqli_query($conn,"select * FROM kultura_cxrili where id='$_REQUEST[delete]'");
$z=mysqli_fetch_array($x);
if ($z['surati'])
unlink('../'.$z['surati']);
mysqli_query($conn, "DELETE FROM kultura_cxrili where id='$_REQUEST[delete]'");
 
}


 
  

 

if (isset($_GET['hide']))
{
	mysqli_query($conn, "update kultura_cxrili SET hidden=1 where id='$_GET[hide]'");
}


if (isset($_GET['show']))
{
	mysqli_query($conn, "update kultura_cxrili SET hidden=0 where id='$_GET[show]'"); 
}



?>
 

<style> 
@font-face { font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf');  }  
input{ font-family:bpg_algeti_compact, sans-serif;  }    </style>

<style> 
@font-face { font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf');  }  
div { font-family:bpg_algeti_compact, sans-serif;  }    </style>

 
 

 <table width="1000px" style="position:relative;  z-index:101; top:45px; min-height: 500px;"  align="center" bgcolor="#FFFFFF">
<tr>
<td width="100%" align="center" style="" id="linkebi"> 




 

  
</td>   

<tr> 

<form action="" method="post" enctype="multipart/form-data" name="rame">  
 <td bgcolor="#FFFFFF" width="744" style="position:relative; top:-4px; padding:10px; padding-bottom:0px;">
	 
 <style> 
#indexs, #indexs ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#E8BA33;
  width:230px;
 

}

#indexs a{
display:block;
 color:#FFFFFF;
 text-decoration:none;
 padding:10px;
 font-stretch:extra-expanded;
 	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 
	font-size:14px;

}

#indexs a:hover{
background-color:#B38D1C;
  padding:10px; 
  color:#FFFFFF;
 
}

#indexs li{
float:left;
position:relative;
 
 padding:0px;
}

#indexs ul {
position:absolute;
display:none;
 }

#indexs li ul a{
 
float:left;
 
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
 }
</style>
  <div style="background-color:#F0F0F0; padding:10px; margin-bottom:10px;"> <div id="indexs" style="color:#FFFFFF;">
   <a href="index.php"> <span style="font-size:20px; position:relative; font-weight:bold; margin-right:10px; 
   top:0px;"> &lt; </span> <span style="position:relative; top:-3px;"> საწყის გვერდზე დაბრუნება </span> </a> </div> </div>
 
<?php 
	
	/*
		Place code to connect to your DB here.
	*/


	$tbl_name="kultura_cxrili";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 6;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where kategory='ფოტო'";
	$total_pages = mysqli_fetch_array(mysqli_query($conn, $query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "index.php?do=gallery"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
 	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	/* Get data. */
	
	$sql = "SELECT * FROM $tbl_name where kategory='ფოტო' order by id desc LIMIT $start, $limit";
	$result = mysqli_query($conn, $sql);

	
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
 <? $x==0;
if($_REQUEST['dey'])
$where=" and date='$_REQUEST[dey]'";
else $where='';
//$sql="select * from kultura_cxrili  order by id desc limit $lim";
// echo $sql.mysql_error();
$a=mysqli_query($conn, $sql);
while ($b=mysqli_fetch_array($a))

{
 ?> 

 
 <style>
		#im4 {
  height: 60px;
  transition: all .2s ease-in-out;
}

.cover4 {
  width: 80px;
  object-fit: cover;
  
  
}
.cover4:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s; }
	
 .tabl 
 {
background-color:#FFFFFF; 

cursor:pointer; 
padding-left:3px;
padding-right:3px;
}


 .tabl:hover
 {
background-color:#F0F0F0; 
  width:100%;
cursor:default;  
 
}
	</style>

<div class="tabl" style="padding-top:3px;   vertical-align: top; border-bottom:1px solid #D7D7D7; "> 





   <div style=" display:table; font-size:12px; ">
    <div style="display: table-row;">

<div style="display:table-cell;"><img src="../<? echo $b['upload'];?>" width="80" height="60" class="cover4" id="im4" align="left">  </div>
  
<div style="width:70px; display:table-cell; font-size:12px; position:relative;   vertical-align: middle;"> <? echo $b['news_date']; ?>
<br> <? echo $b['hour']; ?>
      <script>
  $( function() {
	$("#news_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy/mm/dd",
      dateFormat: "yy/mm/dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#news_date").datepicker("option","maxDate", selected)
        }
    });
  } );
  </script></div> 
<div style="width:50px; position:relative; left:0px; display:table-cell;   vertical-align: middle;"> <? echo $b['id'];?>  </div> 
<div style="min-width:250px; max-width:250px; display:table-cell; vertical-align: middle; position:relative; left:0"> 
	<?
	 $avt=mysqli_query($conn, "select * from  gallery where id='$b[avtori]' order by id desc");
	 while($rame=mysqli_fetch_array($avt))
	 {
		 
		 ?> 
	<? echo $rame['avtori']; }  ?></div> 
<div style="display:table-cell;   vertical-align: middle; min-width:70px; max-width:70px; position:relative; left:18px;"> <? echo $b['kategory'];?> </div> 
<div style="width:100px; position:relative; left:52px; display:table-cell;   vertical-align: middle; ">
<? $aa=mysqli_query($conn, "select * from avtorebi where id='$b[avtori]'");
$qq=mysqli_fetch_array($aa); ?>    
 
<div style="font-size:14px; width:170px; display:table-cell;   vertical-align: middle; font-size:12px;">
<? echo $qq['avtori']; ?>  </div></div>

  <style>
 .register 
 {
  
 
}


 .register:hover
 {
opacity: 0.5;
 
}


 
 </style>  

<div style="width:100px; display:table-cell;   vertical-align: middle; position:relative; left:90px;">
<div class="register" style="padding-top:0px; position:relative; left:5px; width:100px; display:table-cell;">
<?
	if($b['hidden'])
	{
?>
 <a href="index.php?do=gallery&show=<? echo $b['id'];?>"> <img src="../img/hide.png" width="30" style="position:relative; vertical-align: top;"> </a>
 
<?  
	}
	else
	{
?>
 <a href="index.php?do=gallery&hide=<? echo $b['id'];?>"> <img src="../img/show.png" width="30" style="position:relative; vertical-align: top;"> </a>
 <?
	}
 ?>
  </div>   </div>
   
   

   
<div class="register" style="width:60px; display:table-cell;  vertical-align: middle; position:relative; left:85px;">
 
 
 <a   onclick="window.open('../index.php?do=full&id=<? echo $b['id']; ?>')"  style="cursor:pointer;" > <img src="../img/view1.png" width="18" style="position:relative; vertical-align: top;">  </a>
   </div>
   
 
<div class="register" style="width:100px; display:table-cell;   vertical-align: middle; position:relative; left:105px;">

 <a  onclick="window.location.href='index.php?do=updatephoto&id=<? echo $b['id']; ?>';" style="cursor:pointer;" > <img src="../img/edit.png" width="18" style="position:relative; vertical-align: top;"> </a>
 </div>






<div class="register" style="width:100px; display:table-cell;   vertical-align: middle; position:relative; left:67px;">
 <a href="index.php?do=gallery&page=<?=$_GET['page']?>&delete=<? echo $b['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')"> <img src="../img/delete.png" width="18" style="position:relative; vertical-align: top;"> </a>
 </div>
 </div>








 
 
 
 
   
 


 

 
  </div> </div> </div>  <div id="linkebi">
	<? $w++;  }echo $pagination;?> </div></td></form></tr>
 
	
 

 
<td style="background-color: #F0F0F0; position:relative; top:40px;" width="744">
<? 
if ($_REQUEST['addavt'])
{	

mysqli_query($conn, "insert into gallery(avtori)values('$_POST[avtori]')");

  
}
if ($_REQUEST['avt_delete'])
mysqli_query($conn, "delete from gallery where id='$_REQUEST[avt_id]'");

?> <form action="" method="post" enctype="multipart/form-data" >

  <br />
<input type="text" name="avtori" placeholder="გალერეის შექმნა" style="width:320;"/>
<input type="submit" name="addavt" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:transparent;">
<br />
<select name="avt_id" style="width:320px;">
    <?
	 $avt=mysqli_query($conn, "select * from  gallery order by id desc");
	 while($avts_id=mysqli_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select> 
<input type="submit" name="avt_delete" value="delete" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:transparent;" /> 
</form>

		   
		   <hr>
<br>  
 
<form action="" method="post" enctype="multipart/form-data" name="rame"> 
 
 
  
 <select  name="eng_geo" style="width:320px"> 
		   <option value="Geo" style="color:#FF0000">Geo</option>
	 <option value="Eng" style="color:#FF0000">Eng</option>
      </select>
           <br>

      <select  name="kategory" style="width:320px">
 
    <option value="ფოტო">ფოტო</option>
      </select>		   
  <br>
 


<br><br>
   
   <div style="font-size:14px; background-color:#F0F0F0; margin-top:15px; border:1px solid #BCBCBC; padding-top:4px; width:320px; height:28px;"> ვაქციოთ THUBNAIL-ად </span>
        <input type="checkbox" name="ena" value="1">
        კი
        </input> <br><Br>
 
<br><select name="avtori" style="width:320px;">
     <?
	 $avt=mysqli_query($conn, "select * from  gallery order by id desc");
	 while($avts_id=mysqli_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['avtori']."</option>";			 
	 }
	 
     ?>
</select> აირჩიე გალერეა <br>

 
 
     <div style="font-size:14px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; z-index:101;">  
          <script>
  $( function() {
	$("#news_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy-mm-dd",
      dateFormat: "yy-mm-dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#news_date").datepicker("option","maxDate", selected)
        }
    });
  } );
  </script>
          <p>
            <input type="text" name="news_date" id="news_date" placeholder = "კალენდარი" required autocomplete="off" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; width:320px;" / >  
        </div>
        
       <div class="col-md-8">
<!--Image Uploader Jquery-->

    <!-- Fine Uploader New/Modern CSS file
    ====================================================================== -->
    <link href="<?=HTTP_HOST?>fine-uploader/fine-uploader-new.css" rel="stylesheet">

    <!-- Fine Uploader JS file
    ====================================================================== -->
    <script src="<?=HTTP_HOST?>fine-uploader/fine-uploader.js"></script>

    <!-- Fine Uploader Thumbnails template w/ customization
    ====================================================================== -->
    <script type="text/template" id="qq-template-manual-trigger">
        <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here" style="position:relative; width:500px; margin-left:20px">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="buttons">
                <div class="qq-upload-button-selector qq-upload-button">
                    <div> მონიშნე&nbsp;სურათები</div>
                </div>
          
		  
<?php /*?>	  <button type="button" id="trigger-upload" class="btn btn-primary" style="position:relative; clear:both; top
		  -20px;">
                    <i class="icon-upload icon-white"></i> ატვირთე
                </button>   <?php */?>
            </div>
			
			
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <div class="qq-progress-bar-container-selector">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                    <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>

    <style>
        #trigger-upload {
            color: white;
            background-color: #00ABC7;
            font-size: 14px;
            padding: 10px 20px;
            background-image: none;
			border:0px;
        }

        #fine-uploader-manual-trigger .qq-upload-button {
            margin-right: 15px;
        }

        #fine-uploader-manual-trigger .buttons {
            width: 36%;
        }

        #fine-uploader-manual-trigger .qq-uploader .qq-total-progress-bar-container {
            width: 60%;
        }
    </style>
    
 
  <!-- Fine Uploader DOM Element
    ====================================================================== -->
    <div id="fine-uploader-manual-trigger"></div>

    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
    ====================================================================== -->
    <script>
        var manualUploader = new qq.FineUploader({
            element: document.getElementById('fine-uploader-manual-trigger'),
            template: 'qq-template-manual-trigger',
            request: {
                endpoint: '<?=HTTP_HOST?>uploader.php?hash=<?=$hash?>'
            },
            thumbnails: {
                placeholders: {
                    waitingPath: '<?=HTTP_HOST?>fine-uploader/placeholders/waiting-generic.png',
                    notAvailablePath: '<?=HTTP_HOST?>fine-uploader/placeholders/not_available-generic.png'
                }
            },
            autoUpload: true,
			validation: {
                allowedExtensions: ['jpeg', 'JPEG', 'jpg', 'JPG', 'gif', 'GIF', 'PNG', 'png'],
				itemLimit: 10
            },
            debug: true
        });

        qq(document.getElementById("trigger-upload")).attach("click", function() {
            manualUploader.uploadStoredFiles();
        });
    </script>
 
 
 <!--END of Image Uploader Jquery-->   
    
    
 </p>   
   </div>

<textarea  name="satauri"  cols="70" rows="2" placeholder="სურათის აღწერა" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:transparent; width:320px;" ><? echo $b['satauri'];?></textarea>
  
  <br><br>
 
 <input type="hidden" name="hash" value="<?=$hash?>">
   <input type="submit" name="submit" style="border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #999; background-color:#C7191C; color:#FFFFFF; height:35px; z-index:101;" value="გამოქვეყნება">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
</form>
   <br>
   
  </td> 
   </tr>

  </table>   
	 



  