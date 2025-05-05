<?php

if (isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
	$b='images/'.$_FILES['upload']['name']; 
	$b2='images/'.$_FILES['upload2']['name']; 
	$b3='images/'.$_FILES['upload3']['name']; 
	$b4='images/'.$_FILES['upload4']['name']; 
    
	
	
move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);
move_uploaded_file($_FILES['upload2']['tmp_name'], '../images/'.$_FILES['upload2']['name']);
move_uploaded_file($_FILES['upload3']['tmp_name'], '../images/'.$_FILES['upload3']['name']);
move_uploaded_file($_FILES['upload4']['tmp_name'], '../images/'.$_FILES['upload4']['name']);
	
#$sql="insert into kultura_cxrili (kategory, subkat, upload, upload2, upload3, upload4, satauri, avtori, agwera, full, date, pos)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$b2', '$b3', '$b4', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0')";

$sql="insert into kultura_cxrili (kategory, subkat, upload, satauri, avtori, agwera, full, date, pos, news_date)values('$_REQUEST[kategory]', '$_REQUEST[subkat]', '$b', '$_POST[satauri]', '$_POST[avtori]', '$_REQUEST[agwera]', '$_REQUEST[full]', '$date','0', '".strtotime($_REQUEST['news_date'])."')";


mysqli_query($conn, $sql);
 
 
 
}


if ($_POST['delete'])
{
$x=mysqli_query($conn, "select * FROM kultura_cxrili where id='$_REQUEST[del]'");
$z=mysqli_fetch_array($x);
if ($z['surati'])
unlink('../'.$z['surati']);
mysqli_query($conn, "DELETE FROM kultura_cxrili where id='$_REQUEST[del]'");
 
}


?>

   <link href="logo.css" rel="stylesheet" type="text/css" />
  

<form action="" method="post" enctype="multipart/form-data" name="rame">  
 <td bgcolor="#FFFFFF" width="744" style="position:relative; top:-2px; padding:10px;">
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
   <a href="#"> <span style="font-size:24px; position:relative; font-weight:bold; margin-right:10px; 
   top:3px;"> </span> <span style="position:relative; top:px;"> Search result </span> </a> </div> </div>
 
    <div style="width:1000px; font-size:14px; display:table; background-color:#F0F0F0">
    <div style="display: table-row;">

<div style="padding-top:3px; width:80px; display:table-cell;">ფოტო </div> 
<div style="width:50px; display:table-cell; vertical-align: top; padding-left:40px;">  თარიღი</div> 
<div style="width:50px; padding-left:18px; display:table-cell;   vertical-align: top;">ID </div> 
<div style="min-width:250px; max-width:250px; padding-left:15px; display:table-cell;   vertical-align: top;"> სათაური</div> 
<div style="padding-left:12px; font-size:14px; width:170px; display:table-cell;   vertical-align: top;">კატეგორია </div>
<div style="padding-left:0px; font-size:14px; width:170px; display:table-cell;   vertical-align: top; position:relative; left:-15px;">მომხმარებელი </div>
<div style="width:100px; display:table-cell;   vertical-align: top; position:relative; position:relative; left:-25px;">სტატუსი </div>
<div style="width:150px; display:table-cell;   vertical-align: top; position:relative; position:relative; left:-15px; ">გადახედვა </div>  
<div style="padding-top:3px; width:100px; display:table-cell; position:relative; left:-15px;">Edit </div>
<div style="padding-top:3px; width:100px; display:table-cell; position:relative; left:-5px;">წაშლა </div>

</div></div>
<table id="gverditi" width="744" style=""  align="center">
<tr>
<td width="744" align="center" bgcolor="#F0F0F0" style="" id="dama"> 
 
  </td>   

<form action="" method="post" enctype="multipart/form-data" name="rame"> </td>
<tr>
  
 
<td  bgcolor="#CCCCCC" id="linkebi" valign="top" id="dama" style="position:relative; top:30px;">     <?
 




	$res=mysqli_query($conn, "select * from  avtorebi where avtori  LIKE  '%$_REQUEST[text]%'");
			while($data=mysqli_fetch_assoc($res))
			{
				$tmp_where.=" avtori='$data[id]' OR";
			}
			
 
 if ($_REQUEST['calendar'])
{
	$fromDate = (isset($_POST['from_date']) && !empty($_POST['from_date']))?mysqli_real_escape_string($conn, $_POST['from_date']):'';
	$toDate = (isset($_POST['to_date']) && !empty($_POST['to_date']))?mysqli_real_escape_string($conn, $_POST['to_date']):'';
   $where = '';

	if(!empty($fromDate) or !empty($toDate))
	{
		$fromDate = str_replace("/","-",$fromDate);
		$toDate = str_replace("/","-",$toDate);
		$fromDate = strtotime($fromDate);
$toDate = strtotime($toDate);
		if(!empty($fromDate))
		{
			$where .=  "`news_date`>='$fromDate'";
		}
		if(!empty($toDate))
		{
			if(!empty($fromDate))
				$where .= ' AND ';
			$where .=  "`news_date`<='$toDate'";
		}
	}
	
}
else if ($_POST['text'])			
	$where=$tmp_where." agwera LIKE '%$_REQUEST[text]%' OR satauri  LIKE  '%$_REQUEST[text]%' OR full  LIKE '%$_REQUEST[text]%'";
$where=" where ".$where;
 $a=mysqli_query($conn, "SELECT * FROM kultura_cxrili ".$where);
while ($b=mysqli_fetch_array($a))
{
$avt=mysqli_query($conn, "select * from avtorebi where id='$b[avtori]'");
$f=mysqli_fetch_array($avt);
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
background-color:#EDEDED; 
 
cursor:default;  
 
}
	</style>

<div class="tabl" style="padding-top:3px;   vertical-align: top; border-bottom:1px solid #D7D7D7; width:1000px"> 





   <div style=" display:table; font-size:12px; ">
    <div style="display: table-row;">

<div style="display:table-cell;"><img src="../<? echo $b['upload'];?>" width="80" height="60" class="cover4" id="im4" align="left">  </div>
  
<div style="width:50px; display:table-cell; font-size:12px;   vertical-align: middle;">  </div> 
<div style="width:50px; padding-left:15px; display:table-cell;   vertical-align: middle;"> <? echo $b['id'];?>  </div> 
<div style="min-width:250px; max-width:250px; padding-left:0px; display:table-cell;   vertical-align: middle;"> <? echo $b['satauri'];?> </div> 
<div style="padding-left:10px; display:table-cell;   vertical-align: middle; min-width:70px; max-width:70px;"> <? echo $b['kategory'];?> </div> 
<div style="width:100px; padding-left:5px; display:table-cell;   vertical-align: middle;"><?
$user=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id=".intval($b['user_id'])));

 
  
 ?>     
 
<div style="padding-left:15px; font-size:14px; width:170px; display:table-cell;   vertical-align: middle;">
<? echo $user['username']; ?>  </div></div>



<div style="width:100px; display:table-cell;   vertical-align: middle; padding-left:30px;"><div style="padding-top:0px; position:relative; left:5px; width:100px; display:table-cell;">
<?
	if($b['hidden'])
	{
?>
 <a href="index.php?show=<? echo $b['id'];?>"> <img src="../IMG/hide.png" width="30" style="position:relative; vertical-align: top;"> </a>
 
<?  
	}
	else
	{
?>
 <a href="index.php?hide=<? echo $b['id'];?>"> <img src="../IMG/show.png" width="30" style="position:relative; vertical-align: top;"> </a>
 <?
	}
 ?>
  </div>   </div>
   
   
<div style="width:60px; display:table-cell;  vertical-align: middle; position:relative; left:5px;">
 <input name="view" type="button" formtarget="_new" value="View"  onclick="window.open('../index.php?do=full&id=<? echo $b['id']; ?>')" style="font-size:12px; cursor:pointer;">  </div>
   
 
<div style="width:100px; display:table-cell;   vertical-align: middle; position:relative; left:43px;"><input name="ra" type="button" value="Edit" onclick="window.location.href='index.php?do=update&id=<? echo $b['id']; ?>';"  style="font-size:12px; margin-right:10px; margin-left:3px; cursor:pointer;">  </div>
<div style="width:100px; display:table-cell;   vertical-align: middle; position:relative; left:16px;"><input type="checkbox"  name="del"  value="<? echo $b['id'];?>"  />
<input name="delete" type="submit"    value="delete" style="font-size:12px; cursor:pointer;"></div>
 </div>








 
 
 
 
   
 


 

 
<div style="padding-top:3px; font-size:14px; width:100px; display:table-cell;">
<? echo date("Y/m/d", $b['news_date']); ?> 
 </div> </div> </div> </div>  <div id="linkebi">
	<? $x++;  }   echo $pagination;?> </div></td></form></tr>
 
	
  

  </table>   
	
 
</tr></table>


 
