<?php
session_start();
//include ('../functions.php');
?>
<html>
<head>
<title>Admin-Panel </title>
<link rel="stylesheet" href="style/style.css" type="text/css" charset="UTF-8" /> 

<script type="text/javascript" src="modules/Ckeditor/ckeditor.js"></script>


<script type="text/javascript" src="modules/Ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../js/jquery.1.7.2.min.js"></script>
<link rel="stylesheet" href="../src/calendar/calendar.css">
<script src="../src/calendar/calendar.js"></script>
 <style type="text/css">
<!--
.style4 {color: #FFFFFF}
.style6 {color: #FFFFFF; font-weight: bold; }
-->
</style>
	<link rel="stylesheet" type="text/css" href="../fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
<link href="style.css" rel="stylesheet" type="text/css">
  <link href="logo.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#F0F0F0" style="margin:0; padding:0;">
 <? 
include('session.php'); 

$r=mysqli_query($conn, "select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysqli_fetch_array($r);

	
	?>
 

<style> 
@font-face { font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf');  }  
input{ font-family:bpg_algeti_compact, sans-serif;  }    </style>

<style> 
@font-face { font-family: bpg_algeti_compact; src:url(<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf); } @font-face { font-family: bpg_algeti_compact; src: url('<?=HTTP_HOST?>FONTS/bpg_algeti_compact.ttf');  }  
div { font-family:bpg_algeti_compact, sans-serif;  }    </style>

 <table width="100%" align="center" cellpadding="0" cellspacing="0" style="margin:0;   z-index:1000000; position:fixed; background:#FFFFFF;"> 
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
<div id="indexs2" style="color:#000000; position:relative; "><li style="position:relative; margin-left:-180px;  z-index:100000; top:15px;"><a href="index.php"> &nbsp; <span style="color:E8BA33;"> <b> Sunstudio </b> </span> CMS</a></li>  </div>
 
<div style="position:relative; left:-5px; top:11px;" align="left">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
* {
  box-sizing: border-box;
}

/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 14px;
  border: 1px solid #F0F0F0;
  float: left;
    height:35px;
	color:#949494;
  width: 209px;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 34px; 
  padding: 5px;
  background: #E8BA33;
  height:35px;
  color: white;
  font-size: 14px;
  border: 1px solid #F0F0F0;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
<form action="index.php?do=search" method="post" class="example"  >
 
  <input type="text" onKeyPress="return makeGeo(this,event);" name="text" value="  ძიება..." 
    onblur="if(this.value=='') this.value='  ძიება...';"  onfocus="if(this.value=='  ძიება...') this.value='';"  name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>


</div>

</td><td>  
<div style="position:relative; left:5px;">
<div id="indexs1" style="color:#000000; position:relative;"><li style="position:relative;">
<a href="index.php?logoff"> <span style="position:relative; top:5px; right:3px;"> &nbsp; Log out </span></a></li>  </div> </div>

 <style>
 
#indexs1, #indexs1 ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#E8BA33;
  width:80px;
  height:35px;
  
  
 

}

#indexs1 a{
display:block;
 color:#666262;
  width:80px;
   height:35px;
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
    height:35px;
	 width:80px;
 
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
  
 <table width="1000px" style="position:relative;  z-index:0; top:45px;"  align="center" bgcolor="#FFFFFF">
<tr>
<td width="100%" align="center" style="" id="linkebi"> 


<div id="menu"  style="position:fixed; margin-left:-163px; top:73px; width:150px;" align="left">
  <ul class="niveau1">
 <li style="background-color:#E8BA33; height:25px; position:relative; margin-top:-6px; color:#FFFFFF;"> <span style="position:relative; font-size:26px; font-weight:bold; left:5px; top:-1px;"> &equiv; </span> <span style="position:relative; top:-6px; left:5px;"> Content </span>  </li>
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
             <li><a href="http://www.laughtivism.ge/roundcube/" target="_blank">ელფოსტა</a></li>
<li style="height:2px;  background-color:#E8BA33;"> </li>
     
  </ul>
</div>

 
<style> 
#menu {
	z-index:50000;
 
	font-size:14px;
	border-top:3px solid #E8BA33;
	
	
}
#menu a {
	color: #000000;
}
#menu ul {
	padding: 0;
	width: 150px;
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
	left: 150px;
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
	 width:203px;
	 }
 
#menu ul.niveau1 li.sousmenu:hover ul.niveau2, #menu ul.niveau2 li.sousmenu:hover ul.niveau3 {
	display: block;
	width:200px;
	
}
#menu li a:hover {
 
}
#menu ul ul li a:hover {
 
}
#menu ul ul ul li a:hover {
	border-left-color: #0000FF;
} </style>
  
</td>   

<tr> 

<? if(isset($_REQUEST["do"])) include("modules/$_REQUEST[do].php");
else include("modules/home.php"); 
	?>
	
	 
	
	
	
<table width="100%" height="40px" align="center" cellpadding="0" cellspacing="0" style="margin-top:55px; border-top:3px solid #E8BA33; background-color:#FFFFFF; "> 
 <tr>
 <td valign="top" height="50px" align="center">
 <table width="744px">
 <tr>
 <td valign="top">
 <div style="position:relative; padding-top:15px; margin-left:-140px;">
 Sunstudio CMS </div> </td></tr></table> </td>
 </tr></table>
  
</body>

</html>
 

