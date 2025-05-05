<?
if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  
$r=mysqli_query($conn, "select * from kultura_password where user='admin' and   passwords='$_REQUEST[passwords]'");
$data=mysqli_fetch_array($r);

if (isset($_REQUEST['submit']))
{
 		$da="update kultura_password set passwords='$_REQUEST[passwords]' where user='admin'";
mysqli_query($conn, $da);
	 



 

}
 
?>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style> 

  

  
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

 
    

<form action="" method="post" enctype="multipart/form-data" name="rame"> </td>
  <tr>
    <td bgcolor="#FFFFFF" width="700"><br><p><span class="style15">Description</span><br>
<div> 

თუ გნებავთ password-ის შეცვლა, ამისათვის ჩაწერეთ თქვენი სასურველი სიტყვა ან ციფრი ქვემოთ მოცემულ ველში და ის ავტომატურად შეიცვლება. 
<br>
 
<em>username უცვლელია და მისი default მნიშვნელობაა admin</em></div>
	
	<form action="" method="post" enctype="multipart/form-data">
	<br>
	<br />
	<br>
	 <input  name="passwords" type="password" size="50">  
	 change your <span class="style13 style1">password
      
      </span><span class="style1">!</span><br>
      <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
      <input type="submit" name="submit" value="შეცვლა">
	  </form></td>
  </tr>
   
   <td height="20"> 

  
 


	</td></tr></table>