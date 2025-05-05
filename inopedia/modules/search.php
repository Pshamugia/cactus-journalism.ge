<?php
error_reporting(0);
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
  

<form action="" method="post" enctype="multipart/form-data" name="rame">  
 
 
 <style>
 
#indexs, #indexs ul{
 list-style-type:none;
list-style-position:outside;
 padding:0px;
  background-color:#343a40;
  width:260px;
 

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
background-color:#676767;
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
	
	
	<div style="background-color:#F0F0F0; border:1px solid #DCDCDC; padding-left:13px; padding-top:11px; padding-bottom:5px;  margin-bottom:15px;"> 
  <div id="indexs" style="color:#FFFFFF; display:inline-block; margin-top:2px;">
   <a href="index.php?do=create"> <span style="font-size:24px; position:relative; font-weight:bold; margin-right:10px; 
   top:0px;"><i class="fas fa-search"></i>  </span>  <span style="position:relative; top:-3px;"> ძიების შედეგი</span> </a>  </div> 
	
	
  <div style="position:relative; display:inline-block; margin-left:50px;"> <form action="index.php?do=search" method="post">
    <input type="hidden" name="calendar" value="zieba" />
    
     
      <p>
        <input value="<?=$fromDate?>" type="text" name="from_date" id="from_date" readonly size="6" />
        -დან  &nbsp;
        <input value="<?=$toDate?>" type="text" name="to_date" readonly id="to_date" size="6"/>
        -მდე  
        &nbsp; &nbsp;
        <input type="submit" id="rame" name="type" value="თარიღით ძიება">
    </div>
    <script>
 $( function() {
	$("#from_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy/mm/dd",
      dateFormat: "yy/mm/dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#from_date").datepicker("option","maxDate", selected)
        }
    });
	$("#to_date").datepicker({ 
      changeMonth: true, 
      changeYear: true,
      altFormat: "yyyy/mm/dd",
      dateFormat: "yy/mm/dd",
      maxDate: "+0Y",
        onSelect: function(selected) {
           $("#to_date").datepicker("option","maxDate", selected)
        }
    });
  } );
  </script>
  </form> <? if(!empty($fromDate) or !empty($toDate)){
		if(!empty($fromDate)){
			$where .=  ' AND ".strtotime($_REQUEST[`news_date`]).">=STR_TO_DATE(\''.$fromDate.'\', \'%Y-%m-%d\') ';
		}
		if(!empty($toDate)){
			$where .=  ' AND ".strtotime($_REQUEST[`news_date`])."<=STR_TO_DATE(\''.$toDate.'\', \'%Y-%m-%d\') ';
		}
	} ?> </div> 




<form action="" method="post" enctype="multipart/form-data" name="rame">  
<table class="table table-hover" style="">
  <thead style="background-color: #F0F0F0; border-left:1px solid #DCDCDC; border-right:1px solid #DCDCDC">
    <tr>
      <th scope="col">ფოტო</th>
      <th scope="col">თარიღი</th>
      <th scope="col">ID</th>
      <th scope="col">სათაური</th>
		  <th scope="col">დაგზავნა</th>
      <th scope="col">კატეგორია</th>
		<th scope="col">სტატუსი</th>
      <th scope="col">გადახედვა</th>
		 <th scope="col">ედიტ</th>
      
		<th scope="col"><? 
	 
	 if ($_SESSION['delete_status']!='1') 
 {
		 
	 echo "";
 }
		 else { ?>წაშლა<?} ?></th> 
		
    </tr>
  </thead>
  <tbody style="border:1px solid #DCDCDC">   <?
 




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
	$where=$tmp_where." agwera_ka LIKE '%$_REQUEST[text]%' OR agwera_en LIKE '%$_REQUEST[text]%' OR satauri_ka  LIKE  '%$_REQUEST[text]%' OR satauri_en  LIKE  '%$_REQUEST[text]%' OR full_ka  LIKE '%$_REQUEST[text]%'";
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
background-color:#F0F0F0; 
  width:100%;
cursor:default;  
 
}
	</style>	
	
	

    <tr>
      <td scope="row"><img src="../<? echo $b['upload'];?>" width="80" height="60" class="cover4" id="im4" align="left"></td>
      <td><? echo date("Y/m/d", $b['news_date']); ?>
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
  </script></td>
      <td><? echo $b['id'];?> </td>
      <td><? echo $b['satauri_ka'];?></td>
		 <td> 
			 
			 
			 <a href="index.php&page=<?=$_GET['page']?>&send_email=<? echo $b['id'];?>"><i class="fa fa-envelope-open-text"></i> </a>
			 
		 </td>
		
      <td><? echo $b['kategory']; ?> </td>
      <td><?
	if($b['hidden'])
	{
?>            
 <a href="index.php&page=<?=$_GET['page']?>&show=<? echo $b['id'];?>"> <img src="../img/hide.png" width="30" style="position:relative; vertical-align: top;"> </a>
 
<?  
	}
	else
	{
?>
 <a href="index.php&page=<?=$_GET['page']?>&hide=<? echo $b['id'];?>"> <img src="../img/show.png" width="30" style="position:relative; vertical-align: top;"> </a>
 <?
	}
 ?></td>
		<td><a   onclick="window.open('../index.php?do=full&id=<? echo $b['id']; ?>')"  style="cursor:pointer;" > <img src="../img/view1.png" width="18" style="position:relative; vertical-align: top;">  </a></td>
		 <td>
 <a  onclick="window.location.href='index.php?do=update&id=<? echo $b['id']; ?>';" style="cursor:pointer;" > <img src="../img/edit.png" width="18" style="position:relative; vertical-align: top;"> </a></td>
      <td>
		  <? 
	$r=mysqli_query($conn, "SELECT * FROM kultura_password");
$data=mysqli_fetch_array($r); 
	 if ($_SESSION['delete_status']!='1') 
 {
		 
	 echo "";
 }
		 else
			 
		 { ?>
		  
		  <a href="index.php&page=<?=$_GET['page']?>&delete=<? echo $b['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')"> <img src="../img/delete.png" width="18" style="position:relative; vertical-align: top;"> </a> <? } ?></td>
 
    </tr>
     
       
	  
	  
 




 
	<? $x++;  } ?> </tbody>
</table></form>
   
    <?
	echo $pagination;?>  
 
<br> 