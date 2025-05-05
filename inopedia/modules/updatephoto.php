<?php  
error_reporting(0);

include ('../functions.php');

$r=mysqli_query($conn, "select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysqli_fetch_array($r); 




if(isset($_GET['del']))
{
	$n = $_GET['del'] == 1 ? "" : $_GET['del'];
	mysqli_query($conn, "UPDATE kultura_cxrili set upload$n='' WHERE id='$_REQUEST[id]'");
}


$hash=md5(time().$_SESSION['USER_ID']);
	$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id='$_SESSION[USER_ID]'"));


$redirect = false;





if (isset($_REQUEST['submit']))
{
$date=date('d.m.Y'); 
$res=mysqli_query($conn, "SELECT * FROM tmp_uploads WHERE hash='$_POST[hash]'");
while ($image=mysqli_fetch_assoc($res))
{
 
	if (resizeImage('../'.$image['path'], '../images/'.str_replace("tmp_uploads/","", $image['path'])))	
	{
		
		

		$b='images/'.str_replace("tmp_uploads/","", $image['path']);
		
		
		
		if(empty($data['upload']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload='$b' WHERE id='$_REQUEST[id]'");
			$data['upload'] = $b;
		}
		elseif(empty($data['upload2']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload2='$b' WHERE id='$_REQUEST[id]'");
			$data['upload2'] = $b;
		}
		
		
		elseif(empty($data['upload3']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload3='$b' WHERE id='$_REQUEST[id]'");
			$data['upload3'] = $b;
		}
		
		elseif(empty($data['upload4']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload4='$b' WHERE id='$_REQUEST[id]'");
			$data['upload4'] = $b;
		}
		
		elseif(empty($data['upload5']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload5='$b' WHERE id='$_REQUEST[id]'");
			$data['upload5'] = $b;
		}
		
		
		elseif(empty($data['upload6']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload6='$b' WHERE id='$_REQUEST[id]'");
			$data['upload6'] = $b;
		}
		 
		
		elseif(empty($data['upload7']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload7='$b' WHERE id='$_REQUEST[id]'");
			$data['upload7'] = $b;
		}
		
		elseif(empty($data['upload8']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload8='$b' WHERE id='$_REQUEST[id]'");
			$data['upload8'] = $b;
		}
		
		
		elseif(empty($data['upload9']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload9='$b' WHERE id='$_REQUEST[id]'");
			$data['upload9'] = $b;
		}
		
		
		elseif(empty($data['upload10']))
		{
			mysqli_query($conn, "UPDATE kultura_cxrili SET upload10='$b' WHERE id='$_REQUEST[id]'");
			$data['upload10'] = $b;
		}
		
	 }
}	
 
	


$sql="update kultura_cxrili set kategory='$_REQUEST[kategory]', subkat='$_REQUEST[subkat]', tags='$_REQUEST[tags]', upload='$data[upload]', upload2='$data[upload2]', upload3='$data[upload3]', upload4='$data[upload4]', upload5='$data[upload5]', upload6='$data[upload6]', upload7='$data[upload7]', upload8='$data[upload8]', upload9='$data[upload9]', upload9='$data[upload109]', eng_geo='$_REQUEST[eng_geo]', img_description='$_REQUEST[img_description]', satauri='$_REQUEST[satauri]', avtori='$_REQUEST[avtori]', agwera='$_REQUEST[agwera]', full='$_REQUEST[full]', ena='$_REQUEST[ena]', menu='$_REQUEST[menu]', news_date='$_REQUEST[news_date]', hour='$_REQUEST[hour]'  where id='$_REQUEST[id]'";

	mysqli_query($conn, $sql);
	
	 
	
	if(mysqli_error()){
		echo mysqli_error();
	}



}
 




?>
<style type="text/css">
<!--
.style12 {
	font-size: 24px;
	color: #000000;
}
.style7 {
	font-size: 16px;
	font-weight: bold;
	color: #857A6A;
}
-->
</style> 

  
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
 



   <td valign="top" style="position:relative; padding-left:15px;">


            <form action="" method="post" enctype="multipart/form-data" name="rame" style="position:relative; margin-top:10px;">
 

      <br>

     <select  name="subkat" style="width:320px; height:35px;">
          <option value="top">გავუშვათ მთავარ გვერდზე</option>
          <option <?=($data['subkat']=='no')?'selected':''?> value="no">no</option>
          <option <?=($data['subkat']=='yes')?'selected':''?> value="yes" style="color:#FF0000">yes</option>
        </select>
        <br />
        <br />
        
         <select  name="eng_geo" style="width:320px; height:35px;">
 <option value="0">აირჩიე ენა</option> 
<option <?=($data['eng_geo']=='Geo')?'selected':''?> value="Geo">Geo</option>
<option <?=($data['eng_geo']=='Eng')?'selected':''?> value="Eng">Eng</option>
      </select> </p>
      
      <br><br>
        
        
        <select  name="kategory" style="width:320px; height:35px;">
        <option <?=($data['kategory']=='კატეგორიები')?'selected':''?> value="კატეგორიები">კატეგორიები</option>
         <option <?=($data['kategory']=='ფოტო')?'selected':''?> value="ფოტო">ფოტო</option>       

           
           </select>
       <br> <br>
       
   
  
     
        <span style="font-size:12px;"> მივაბათ FACEBOOK კომენტარი? </span>
        <input type="checkbox" name="ena" <?=($data['ena']=='1')?'checked':''?> value="1" />
        კი
     
        <br />
        <br />

      
    <div style="100%">
 <p>
  <? 
  $max_files=4;
 
  if (!empty($data['upload'])) { $max_files--;?>
 1 სურათი <img src="<?=HTTP_HOST?><?=$data['upload']?>" width="100"/> <a href="index.php?do=updatephoto&id=<?=$_GET["id"]?>&del=1"> წაშლა </a> <br><br> <? } ?>
  
    <? if (!empty($data['upload2'])) { $max_files--;?>
 2 სურათი	<img src="<?=HTTP_HOST?><?=$data['upload2']?>" width="100"/> <a href="index.php?do=updatephoto&id=<?=$_GET["id"]?>&del=2"> წაშლა </a><br><br> <? } ?>

  <? if (!empty($data['upload3'])) { $max_files--;?>
  3 სურათი <img src="<?=HTTP_HOST?><?=$data['upload3']?>" width="100"/> <a href="index.php?do=updatephoto&id=<?=$_GET["id"]?>&del=3"> წაშლა </a><br> <br><? } ?>


  <? if (!empty($data['upload4'])) { $max_files--;?>
  4 სურათი <img src="<?=HTTP_HOST?><?=$data['upload4']?>" width="100"/> <a href="index.php?do=updatephoto&id=<?=$_GET["id"]?>&del=4"> წაშლა </a><br> <br><? } ?>
	 
	  <? if (!empty($data['upload5'])) { $max_files--;?>
  5 სურათი <img src="<?=HTTP_HOST?><?=$data['upload5']?>" width="100"/> <a href="index.php?do=updatephoto&id=<?=$_GET["id"]?>&del=5"> წაშლა </a><br> <br><? } ?>
 
	 
	  <? if (!empty($data['upload6'])) { $max_files--;?>
  6 სურათი <img src="<?=HTTP_HOST?><?=$data['upload6']?>" width="100"/> <a href="index.php?do=updatephoto&id=<?=$_GET["id"]?>&del=6"> წაშლა </a><br> <br><? } ?>
  
	  <? if (!empty($data['upload7'])) { $max_files--;?>
  7 სურათი <img src="<?=HTTP_HOST?><?=$data['upload7']?>" width="100"/> <a href="index.php?do=updatephoto&id=<?=$_GET["id"]?>&del=7"> წაშლა </a><br> <br><? } ?>
	 
	  <? if (!empty($data['upload8'])) { $max_files--;?>
  8 სურათი <img src="<?=HTTP_HOST?><?=$data['upload8']?>" width="100"/> <a href="index.php?do=updatephoto&id=<?=$_GET["id"]?>&del=8"> წაშლა </a><br> <br><? } ?>
	 
	 
	  <? if (!empty($data['upload9'])) { $max_files--;?>
  9 სურათი <img src="<?=HTTP_HOST?><?=$data['upload9']?>" width="100"/> <a href="index.php?do=updatephoto&id=<?=$_GET["id"]?>&del=9"> წაშლა </a><br> <br><? } ?>
	 
	 <? if (!empty($data['upload10'])) { $max_files--;?>
  10 სურათი <img src="<?=HTTP_HOST?><?=$data['upload10']?>" width="100"/> <a href="index.php?do=updatephoto&id=<?=$_GET["id"]?>&del=10"> წაშლა </a><br> <br><? } ?> 
	 
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
        <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here" style="position:relative; margin-left:20px">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="buttons" >
                <div class="qq-upload-button-selector qq-upload-button" style="width:200px;">
                    <div >მონიშნე სურათები</div>
                </div>
           <?php /*?> <button type="button" id="trigger-upload" class="btn btn-primary">
                    <i class="icon-upload icon-white"></i> ატვირთე
                </button> <?php */?>
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
            padding: 7px 20px;
            background-image: none;
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
				itemLimit: <? echo $max_files;?>
            },
            debug: true
        });

        qq(document.getElementById("trigger-upload")).attach("click", function() {
            manualUploader.uploadStoredFiles();
        });
    </script>
 
 
 <!--END of Image Uploader Jquery-->   
      
</p></div>


        <textarea  name="img_description" placeholder="სურათის აღწერა" style="width:320px; height:35px;" > <? echo $data['img_description']; ?> </textarea>
        <br />
        <br />

        <select name="avtori" style="width:320px; height:35px;">  ავტორი <br>
     <?
	 $avt=mysqli_query($conn, "select * from  avtorebi");
	 while($avts_id=mysqli_fetch_array($avt))
	 {
		 if($data['avtori']==$avts_id['id']){
			 $selected='selected';
		 }
		 else{
			 $selected='';
		 }
	echo "<option value='".$avts_id['id']."' ".$selected.">".$avts_id['avtori']."</option>";
	 }
     ?>
</select>


        <br />
<br>

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
            <input type="text" value="<?=$data['news_date']?>" name="news_date" id="news_date" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; width:320px; height:35px;" size="12" / >
        </div>
<p>
        <input type="text" value="<?php 
		if ($data['hour']>59)
		
		{
			echo "error";
			}
		
		else
		{
		echo $data['hour']; } ?>" name="hour" id="hour" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;" size="12" / >
        </p>
        <br/>


    
 
        <!--START TAGS - თეგების დასაწყისი -->
 <div style="position:relative; ">

 <script type="text/javascript"> function existingTag(text)
{
	var existing = false,
		text = text.toLowerCase();

	$(".tags").each(function(){
		if ($(this).text().toLowerCase() == text)
		{
			existing = true;
			return "";
		}
	});

	return existing;
}

$(function(){
  $(".tags-new input").focus();

  $(".tags-new input").keyup(function(){

		var tag = $(this).val().trim(),
		length = tag.length;

		if((tag.charAt(length - 1) == ',') && (tag != ","))
		{
			tag = tag.substring(0, length - 1);

			if(!existingTag(tag))
			{
				$('<li class="tags"><span>' + tag + '</span><i class="fa fa-times"></i></i></li>').insertBefore($(".tags-new"));
				$('#save_tags').val($('#save_tags').val() + "," + tag)
				$(this).val("");
			}
			else
			{
				$(this).val(tag);
			}
		}
	});

  $(document).on("click", ".tags i", function(){
	  var text = $(this).parent().text();
	  var tags_str = $('#save_tags').val();
	  tags_str = tags_str.replace(','+text, '');
	  $('#save_tags').val(tags_str);
    $(this).parent("li").remove();
 
  });

});
                                 </script>
                                 <style> @charset "utf-8";
/* CSS Document */



#wrapper
{
    position:absolute;

    width:720px;
    height:50px;
	color:#FF6063;
  }

p
{
  margin:0 0 5px 0;
}

.tags-input
{
  	list-style : none;
  	border:1px solid #ccc;
  	display:inline-block;
  	padding:5px;
  	height: 26px;
    font-size:14px;
    background:#f3f3f3;
    width:720px;
    border-radius:2px;
    overflow:hidden;
}

.tags-input li
{
  	float:left;
}

.tags
{
  	background:#28343d;
  	padding:5px 20px 5px 8px;
  	border-radius:2px;
  	margin-right: 5px;
  	position: relative;
}

.tags i
{
	position: absolute;
	right:6px;
	top:3px;
	width: 8px;
	height: 8px;
	content:'';
	cursor:pointer;
	opacity: .7;
  font-size:12px;
}

.tags i:hover
{
	opacity: 1;
}

.tags-new input[type="text"]
{
  border:0;
	margin: 0;
	padding: 0 0 0 3px;
	font-size: 14px;
	margin-top: 5px;
  background:transparent;
}

.tags-new input[type="text"]:focus
{
  	outline:none;
} </style>

 <div id="wrapper">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
   <ul class="tags-input">
    <li class="tags" style="background-color:#B9B8B8; color:#000000;">TAGS <i class="fa fa-times"></i></li>
	<?
		$tags = explode(',', $data['tags']);
		foreach($tags as $tag)
		{
			if(!empty($tag))
			{
	?>
	<li class="tags"><?=$tag?><i class="fa fa-times"></i></li>
	<?
			}
		}
	?>
    <li class="tags-new" style="color:#D70003;">
      <input type="text" id="tags"/>
	  <input type="hidden" name="tags" id="save_tags" value="<?=$data['tags']?>"/>
    </li>
  </ul>
</div> </div>
 <!--END OF TAGS - თეგების დასასრული -->
 

 <br><br><br><br>
                <textarea  name="satauri" style="border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border: 1px solid #999; background-color:#FFFFFF; width:100%;" > <? echo $data['satauri']; ?></textarea>
<br>
        <textarea name="agwera" id="agwera" cols="85"><? echo $data['agwera']; ?></textarea>
        <script type="text/javascript">
CKEDITOR.replace('agwera');
</script>
        <br>
        <br>
        <div> <SCRIPT TYPE="text/javascript">
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=650,height=600,scrollbars=yes');
return false;
}
//-->
</SCRIPT> <A HREF="index.php?do=images"
   onClick="return popup(this, 'notes')" id="">IMAGE MANAGER POPUP</A> </div>

        <textarea name="full" cols="85" rows="5" id="full"> <? echo $data['full']; ?></textarea>
        <script type="text/javascript">
CKEDITOR.replace('full');
</script>
        <br>
        <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
         <input type="hidden" name="hash" value="<?=$hash?>">
        <input type="submit" style="border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border: 1px solid #999; background-color:#C7191C; color:#FFFFFF; height:35px; z-index:101;" name="submit" value="გამოქვეყნება">
      </form></td>
  </tr>

    <td height="20"></td>
  </tr>
</table>
