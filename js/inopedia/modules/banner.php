<?php
 if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  
if (isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
	$b='images/'.$_FILES['upload']['name']; 
	move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);
mysqli_query($conn, "insert	into banner (upload, kategory, linki)values ('$b','$_POST[kategory]', '$_POST[linki]')");

echo mysqli_error();
}



if ($_POST['delete'])
{
$x=mysqli_query($conn,"select * FROM banner where id='$_REQUEST[del]'");
$z=mysqli_fetch_array($x);
unlink($z['../'.'surati']);
mysqli_query($conn, "DELETE FROM banner where id='$_REQUEST[del]'");

}
?>




 <table width="100%" align="center" cellpadding="0" cellspacing="0" style="margin:0; border-bottom:3px solid #E8BA33; margin-top:-5px; padding:0; z-index:1000000; position:fixed; background:#FFFFFF;"> 
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
  
 <table width="744" style="position:relative;  z-index:0; top:40px;"  align="center">
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
             <li><a href="http://www.demo.ge/roundcube//" target="_blank">ელფოსტა</a></li>
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
 <td bgcolor="#FFFFFF" width="744" style="position:relative; top:5px; padding:10px;">
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
  <div style="background-color:#F0F0F0; padding:10px; margin-bottom:15px;"> <div id="indexs" style="color:#FFFFFF;">
   <a href="index.php?do=create"> <span style="font-size:24px; position:relative; font-weight:bold; margin-right:10px; 
   top:3px;"> +</span> <span style="position:relative; top:-3px;"> ახალი მასალის დამატება </span> </a> </div> </div>
<table width="" bgcolor="#CCCCCC" align="center" style="position:relative; top:px;">
<tr>
 
<td width="95" id="linkebi" valign="top">  
 

<td width="541" bgcolor="#000000"> 

		  
 




<?

$a=mysqli_query($conn, "select * from banner order by id desc");
while ($b=mysqli_fetch_array($a))


{	
?>
<table cellpadding="0" cellspacing="0">
<tr>
<td width="700" bgcolor="#FFFFFF" align="left"> 
<style>
		#im4 {
  height: 100px;
  transition: all .2s ease-in-out;
}

.cover4 {
  width: 300px;
  object-fit: cover;
  
  
}
.cover4:hover  { transform: scale(1.0) ;  /* rotate(2.1deg) */ 
 opacity: 0.7;
    filter: alpha(opacity=70); 
	 transition: all .7s; }
	

	</style>
<div align="left"> <img src="<? echo '../'. $b['upload'];?>" class="cover4" id="im4"  align="left">  
<br>
 
<input type="checkbox"  name="del" value="<? echo $b['id'];?>" >
<input name="delete" type="submit"  value="delete">
<hr> </td>
    </table>	
	
	<? }?>

<tr>
	




 
 <td width="200" height="250" align="left" valign="middle" bgcolor="#CCCCCC"><p>
 <br> <br>
  <p>MENU <br>
         <select  name="kategory" >
         
		    <option value="banner">TOP HEADER banner</option>
			<option value="banner1">გვერდითა ბანერი 1</option> 
            <option value="banner2">გვერდითა ბანერი 2</option> 
             <option value="banner3">გვერდითა ბანერი 3</option> 
              <option value="banner4">გვერდითა ბანერი 4</option> 
              <option value="banner5">გვერდითა ბანერი 5</option> 
               <option value="banner6">შიდა გვერდის ბანერი</option> 




            
        </select>
    </p>


       <br> 
     </p>
   <div></div>
     </td>
 <td width="318" bgcolor="#CCCCCC"> 

 
<br> <br>
<table>
<tr>
<td bgcolor="#FFFFFF"> 

<div>
  <strong>Description  </strong><span class="style13"><br>
ატვირთეთ ბანერი, ქვედა ველში კი ჩასვით იმ საიტის URL, რომელზეც უნდა გადავიდეს ბანერზე დაკლიკვის შემდეგ, მაგ: www.weber.ge</span> </div>
<hr>

<input type="file" name="upload">
image
<br>
 
http://<input type="text" name="linki"> ლინკი<br> <br>
<textarea name="agwera" cols="50" rows="12" class="style7"></textarea>
 <br>
 
   <input type="submit" name="submit" value="გამოქვეყნება"></td>
<tr>

<td  colspan="2"  > </td>
</tr>
  </table>
	
	
	
	</form>
	
	
</body>

</html>



</form>
