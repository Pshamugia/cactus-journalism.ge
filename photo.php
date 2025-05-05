
					
					
					<table align="center" style="position:relative; margin-left:90px;">
            <tr>
            
             
 

 <?  
 $a=mysqli_query($conn, "SELECT * 
FROM gallery
WHERE id IN (SELECT avtori FROM  `kultura_cxrili` where kategory='ფოტო' GROUP BY avtori) ORDER BY id desc");
while ($b=mysqli_fetch_array($a))

{
 ?> 
 
<td valign="top" align="center" style="height:200px; position: relative; top: -150px; padding-bottom:35px;"> 

 
 

 
 <img src="img/border.png" style="width:320px; height: 300px; position: relative; top: 150px; padding-right: 25px;">
<div align="center" style="width:260px; position: relative; vertical-align: middle;  margin-right: 50px; top: -20px; font-size: 25px;  " id='linkebi'>  
<? 
echo "<div style='width:180px; position:relative;  '> <a href='index.php?do=fullimage&id=".$b['id']."'>". $b['avtori'].'</a></div></div>'; 
?> 
</td>


<? 
$x++;
if ($x==3) 
{
echo '<tr>';
$x=0;
} }  
 
 ?> 
						
						
<? 
				
				if ($_SESSION['LANG']=='en')
				{ 
				
				$x==0;
if($_REQUEST['dey'])
$where=" and date='$_REQUEST[dey]'";
else $where='';
//$sql="select * from kultura_cxrili  order by id desc limit $lim";
// echo $sql.mysql_error();
 $a=mysqli_query($conn, "SELECT * 
FROM gallery
WHERE id IN (SELECT avtori FROM  `kultura_cxrili` where kategory='ფოტო' and eng_geo='Eng' GROUP BY avtori) ORDER BY id desc");
while ($b=mysqli_fetch_array($a))

{
 ?> 
 
<td valign="top" align="center" style="height:200px; position: relative; top: -150px; padding-bottom:35px;"> 


<style> 
@font-face { font-family: bpg_nino_mtavruli_book; src:url(<?=HTTP_HOST?>FONTS/bpg_nino_mtavruli_book.ttf); } 
@font-face { font-family: bpg_nino_mtavruli_book; font-weight: 100; src: url('<?=HTTP_HOST?>FONTS/bpg_nino_mtavruli_book.ttf'); }  a { font-family:bpg_nino_mtavruli_book, sans-serif; }  </style> 
 

 
 <img src="img/border.png" style="width:320px; height: 300px; position: relative; top: 150px; padding-right: 25px;">
<div align="center" style="width:260px; position: relative; vertical-align: middle;  margin-right: 50px; top: -20px; font-size: 25px;  " id='linkebi'>  
<? 
echo "<div style='width:180px; position:relative;  '> <a href='index.php?do=fullimage&id=".$b['id']."'>". $b['avtori'].'</a></div></div>'; 
?> 
</td>


<? 
$x++;
if ($x==3) 
{
echo '<tr>';
$x=0;
} } }
 
 ?>						
						
						
						</tr>
</table>
					
			</div></div></div></div></div></div>		