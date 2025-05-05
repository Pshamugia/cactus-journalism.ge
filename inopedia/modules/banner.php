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
