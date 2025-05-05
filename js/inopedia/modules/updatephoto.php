<?  

$r=mysql_query("select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysql_fetch_array($r);

if (isset($_REQUEST['submit']))
{
$date=date('d.m.Y'); 
	

	
	if (move_uploaded_file($_FILES['mp3']['tmp_name'], '../mp3/'.$_FILES['mp3']['name']))
	{$c='mp3/'.$_FILES['mp3']['name']; }
	else $c=$data['mp3'];
	
	if (move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']))
	{$b='images/'.$_FILES['upload']['name']; }
	else
	$b=$data['upload'];
		
	
	
$personId = (int) $_POST['person_id'];
$partyId = 0;

if($personId>0){
	$x=mysql_query('select t.`party_id` from hc_persons t where t.`id`='.$personId);
	if($x){
		$z=mysql_fetch_array($x);
		$partyId = $z['party_id'];		
	}
}
	
	$sql="update kultura_cxrili set kategory='$_REQUEST[kategory]', subkat='$_REQUEST[subkat]',  upload='$b', eng_geo='$_REQUEST[eng_geo]', img_description='$_REQUEST[img_description]', satauri='$_REQUEST[satauri]', avtori='$_REQUEST[avtori]', agwera='$_REQUEST[agwera]', full='$_REQUEST[full]', ena='$_REQUEST[ena]', menu='$_REQUEST[menu]', person_id=".$personId.", party_id= ".$partyId.", news_date='$_REQUEST[news_date]'  where id='$_REQUEST[id]'";
	mysql_query($sql);
	if(mysql_error()){
		echo mysql_error();	
	}




}

$r=mysql_query("select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysql_fetch_array($r);
?>
<table width="100%" align="center" cellpadding="0" cellspacing="0" style="margin:0; border-bottom:3px solid #E8BA33; margin-top:-32px; padding:0; z-index:1000000; position:fixed; background:#FFFFFF;"> 
 <tr> 
 <td valign="top">
 <table align="center" width="1000">
 <tr>
 <td valign="top" width="1000px" height="50px" style="background:#FFFFFF;">  
 
  
 <style>
 
#indexs2, #indexs2 ul{
 list-style-type:none;
list-style-position:outside;

  background-color:#E8BA33;
  width:80px;
  
  
 

}

#indexs2 a{
display:block;
 color:#000000;
 text-decoration:none;
 padding:4px;
 font-stretch:extra-expanded;
 	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 
	font-size:14px;
	  background-color:#FFFFFF;
	  


}

#indexs2 a:hover{
background-color:#E8BA33;
  padding:4px; 
  color:#FFFFFF;
 
}

#indexs2 li{
float:left;
position:relative;
 
 padding:0px;
}

#indexs2 ul {
position:absolute;
display:none;
 }

#indexs2 li ul a{
 
float:left;
 
 }

#indexs2 ul ul{
 

}	

#indexs2 li ul ul {
left:12em;
 
 }

#indexs2 li:hover ul ul, #indexs2 li:hover ul ul ul, #indexs2 li:hover ul ul ul ul{
display:none; 
 }
#indexs2 li:hover ul, #indexs2 li li:hover ul, #indexs2 li li li:hover ul, #indexs2 li li li li:hover ul{
display:block; 
 }
</style>
<div id="indexs2" style="color:#000000; position:relative; left:35px;"><li style="position:relative; margin-left:-39px;  z-index:100000; top:15px;"><a href="index.php"> &nbsp; Webster CMS</a></li>  </div>
 
<div style="position:relative; left:-122px; top:11px;" align="right">
<form action="index.php?do=search" method="post">

 
   <input type="text" onKeyPress="return makeGeo(this,event);" name="text" value="search..." 
    onblur="if(this.value=='') this.value='search...';"  onfocus="if(this.value=='search...') this.value='';" 
	style="border: 1px solid #999; height:22px; color:#585455; position:relative; top:5px;"  size="18" />
   <input name="Submit" type="submit" style="position:relative; top:5px; height:22px; left:-5px;
border: 1px solid #999;" value=">"/>   
</form> </div>

</td><td>  <div id="indexs1" style="color:#000000; position:relative; left:-64px;"><li style="position:relative; margin-left:-39px; width:70px; margin-top:6px;"><a href="index.php?logoff"> &nbsp; Log out</a></li>  </div>

 <style>
 
#indexs1, #indexs1 ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#E8BA33;
  width:80px;
  
  
 

}

#indexs1 a{
display:block;
 color:#666262;
 text-decoration:none;
 padding:4px;
 font-stretch:extra-expanded;
 	transition: color 0.5s, background 0.5s;
	-webkit-transition: color 0.5s, background 0.5s; 
	font-size:14px;
	  background-color:#E8BA33;
	  


}

#indexs1 a:hover{
background-color:#B38D1C;
  padding:4px; 
  color:#000000;
 
}

#indexs1 li{
float:left;
position:relative;
 
 padding:0px;
}

#indexs1 ul {
position:absolute;
display:none;
 }

#indexs1 li ul a{
 
float:left;
 
 }

#indexs1 ul ul{
 

}	

#indexs1 li ul ul {
left:12em;
 
 }

#indexs1 li:hover ul ul, #indexs1 li:hover ul ul ul, #indexs1 li:hover ul ul ul ul{
display:none; 
 }
#indexs1 li:hover ul, #indexs1 li li:hover ul, #indexs1 li li li:hover ul, #indexs1 li li li li:hover ul{
display:block; 
 }
</style>

 </td> 
 </tr>
  </table>
 
  </td> 
 </tr>
 </table>
  
 <table width="744" style="position:relative; background-color:#FFFFFF;  z-index:0; top:34px;"  align="center">
<tr>
<td width="744" align="center" bgcolor="#FFFFFF" style="" id="linkebi"> 
<div id="menu" style="position:fixed; margin-left:-114px; top:65px;" align="left">
  <ul class="niveau1">
  <li style="background-color:#E8BA33; width:102px; height:25px; position:relative; margin-top:-6px; color:#FFFFFF;"> <span style="position:relative; font-size:26px; font-weight:bold; left:5px; top:-1px;"> &equiv; </span> <span style="position:relative; top:-6px; left:5px;"> Content </span>  </li>
    <li><a href="index.php">საწყისი</a></li>
    <li class="sousmenu"><a href="#">გალერეა</a>
      <ul class="niveau2">
        <li><a href="index.php?do=gallery">ფოტო</a></li>
        <li><a href="index.php?do=video">ვიდეო</a></li>
      </ul>
    </li>
    
    <li class="sousmenu"><a href="#">მენეჯერები</a>
      <ul class="niveau2">
        <li><a href="index.php?do=password">პასვორდი</a></li>
        <li><a href="index.php?do=banner">ბანერის მენეჯერი</a> </li>
        <li><a href="images.php">სურათების მენეჯერი</a> </li>
      </ul>
    </li>
    <li><a href="index.php?do=authors">ავტორები</a> </li>
      <li class="sousmenu"><a href="#">ენის შეცვლა</a>
      <ul class="niveau2">
              <li><a href="index.php?do=home">ქართული</a></li> 

        <li><a href="index.php?do=enghome">English</a></li> 
        </ul>
    </li>
             <li><a href="http://www.tbilisilitfest.ge/roundcube/" target="_blank">ელფოსტა</a></li>
<li style="height:2px; width:102px; background-color:#E8BA33;"> </li>
     
  </ul>
</div>
<style> 
#menu {
	z-index:50000;
	width: 100px;
	font-size:14px;
	border-top:3px solid #E8BA33;
	
	
}
#menu a {
	color: #000000;
}
#menu ul {
	padding: 0;
	width: 100px;
 	margin: 0px;
	background: white;
}
#menu li:hover {
	background: #F0F0F0;
}
#menu li.sousmenu:hover {
	background: #F0F0F0;
}
/* Rajout d'une petite fleche pour les sous menu */ 
#menu li.sousmenu {
 	background-repeat: no-repeat;
	background-position: 95% 50%;
	
	
}
#menu ul li {
	position: relative;
	list-style: none;
	
	
}
#menu ul ul {
	position: absolute;
	top: -1px;
	left: 100px;
	display: none;
	background-color:#F0F0F0;
	width:200px;
	
	
}
#menu li a {
	text-decoration: none;
	padding: 4px 0 4px 5px;
	display: block;
	border-left: 3px solid #E8BA33;
	border-right: 3px solid #E8BA33;
	border-bottom: 1px #CCC solid;

	width: 91px;
 }
 
 #menu ul ul li a
 {
	 	padding: 4px 0 4px 5px;
 background-color:#E8BA33;
color:#FFFFFF;
	 width:200px;
	 border-top:1px solid #FFFFFF;
	 }
	 
	 
 #menu ul ul li a:hover
 {
	 	padding: 4px 0 4px 5px;
border-right:0;
background-color:#F0F0F0;
color:#000000;
	 width:200px;
	 }
 
#menu ul.niveau1 li.sousmenu:hover ul.niveau2, #menu ul.niveau2 li.sousmenu:hover ul.niveau3 {
	display: block;
	width:200px;
	
}
#menu li a:hover {
	border-left-color: red;
}
#menu ul ul li a:hover {
	border-left-color: #00FF00;
}
#menu ul ul ul li a:hover {
	border-left-color: #0000FF;
} </style>
  
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
  width:310px;
 

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
      
      
 <select  name="eng_geo" style="width:320px; height:35px;"> 
		   <option value="Geo" style="color:#FF0000">Geo</option>
      </select>
      
      <br> <br>
      <form action="" method="post" enctype="multipart/form-data" name="rame">
        <select  name="subkat" style="width:320px; height:35px;">
          <option value="top">გავუშვათ top-ში</option>
          <option <?=($data['subkat']=='no')?'selected':''?> value="no">no</option>
          <option <?=($data['subkat']=='yes')?'selected':''?> value="yes" style="color:#FF0000">yes</option>
        </select>
        <br />
        <br />
        
        
        <select  name="kategory" style="width:320px; height:35px;">
          <option <?=($data['kategory']=='კატეგორიები')?'selected':''?> value="კატეგორიები">კატეგორიები</option>
          <option <?=($data['kategory']=='ფოტო')?'selected':''?> value="ფოტო">ფოტო</option>
          </select>
         <br>
        <br>
        
        
         <select name="avtori" style="width:320px; height:35px;">   
     <?
	 $avt=mysql_query("select * from  gallery order by id desc");
	 while($avts_id=mysql_fetch_array($avt))
	 {
		 if($data['avtori']==$avts_id['id']) $selected='selected';
	echo "<option value='".$avts_id['id']."' ".$selected.">".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select>



  <br>
  
        <br>
        
      
 <select  name="eng_geo" style="width:320px; height:35px;">
 <option value="0">Eng-Geo</option> 
<option <?=($data['eng_geo']=='Geo')?'selected':''?> value="Geo">Geo</option>
<option <?=($data['eng_geo']=='Eng')?'selected':''?> value="Eng">Eng</option>
      </select> 
      
      <br><br>
        <input type="file" name="upload">
        <img src="../<? echo $data['upload'];?>" width="100" height="50" style="position:relative; left:-22px;"><br>
   
        <br />
        <textarea  name="satauri" style="width:320px; height:35px;" > <? echo $data['satauri']; ?></textarea>
        <br />
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
</SCRIPT> <A HREF="modules/index.php?do=images" 
   onClick="return popup(this, 'notes')" id="">IMAGE MANAGER POPUP</A> </div>
        <br />
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
            <input type="text" value="<?=$data['news_date']?>" name="news_date" id="news_date" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; height:35px; width:320px;"/ >
        </div>
        <br/>
        <textarea name="agwera" id="agwera" cols="85"><? echo $data['agwera']; ?></textarea>
        <script type="text/javascript">
CKEDITOR.replace('agwera');
</script> 
        <br>
        <br>
        <textarea name="full" cols="85" rows="5" id="full"> <? echo $data['full']; ?></textarea>
        <script type="text/javascript">
CKEDITOR.replace('full');
</script> 
        <br>
        <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
        <input type="submit" style="background:#FFCC66" name="submit" value="გამოქვეყნება">
      </form></td>
  </tr>
  
    <td height="20"></td>
  </tr>
</table>
