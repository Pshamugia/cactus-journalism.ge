<?php
if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  
include('../functions.php');


if(isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
	
//$b='images/'.$_FILES['upload']['name'];
//move_uploaded_file($_FILES['upload']['tmp_name'], '../images/'.$_FILES['upload']['name']);
    $b=''; 
	$b2=''; 
	$b3='';
	$b4=''; 
	$b5='';
	$b6='';  
    $b=[]; 

		$image_name = 'images/'.md5(time()).$_FILES['upload']['name'];
	if (resizeImage($_FILES['upload']['tmp_name'], '../'.$image_name))	
		$b[]=$image_name;
	
	
	
	$sql="INSERT INTO quizz(cover, question, first, second, third, firstcheck, secondcheck, thirdcheck, axsna1, axsna2, axsna3, upload)VALUES('$_REQUEST[cover]', '$_REQUEST[question]', '$_REQUEST[first]', '$_REQUEST[second]', '$_REQUEST[third]', '$_REQUEST[firstcheck]', '$_REQUEST[secondcheck]', '$_REQUEST[thirdcheck]', '$_REQUEST[axsna1]', '$_REQUEST[axsna2]', '$_REQUEST[axsna3]', '$b[0]')";
  mysqli_query($conn, $sql); 
	
	
	 
}
if (isset($_GET['delete'])) 
mysqli_query($conn, "DELETE FROM quizz where id='$_REQUEST[delete]'");
 

 
?>



 <?php
   
$a=mysqli_query($conn, "SELECT * FROM quizz");
$b=mysqli_fetch_assoc($a);
 
 ?> 
 <form action="" method="post" enctype="multipart/form-data" style="position:relative; ">
 <table width="1000" align="center" style="min-height: 300; padding-top: 150">
	 <tr>
		 <td valign="top">  
			 
<input type="file"  name="upload"  style="position:relative; width:320px; height:35px; margin-top:13px; background-color:#F0F0F0;" />

<span style="position:relative; margin-left:-65px; font-size:14px;"> სურათი </span> <br> 
		 </td>
	 </tr>
		<td valign="top"> 
		
			<input type="text" name="question" placeholder="ჩაწერე კითხვა"  style="width: 300; height: 50px; background-color: antiquewhite" />
				 
	</td>
	
	<tr>
	 
<tr>
	<td valign="top"> 
	 <input name="first" placeholder='პირველი ვერსია' style="width: 300; height: 30px;">
		<br>
		<textarea name="first" placeholder='ახსნა' style="width: 300; height: 30px;"> ახსნა 1</textarea> <input type="checkbox" name="firstcheck" value="1"/>
	</td>
	
	<tr>
	 <td valign="top"> 
		 <input name="second" placeholder='მეორე ვერსია' style="width: 300; height: 30px;">
		<br>
		<textarea name="second" placeholder='ახსნა' style="width: 300; height: 30px;"> ახსნა 2</textarea> <input type="checkbox" name="firstcheck" value="2"/>
		</td>
	 </tr>
	 
	 <tr>
	 <td valign="top"> 
 <input name="third" placeholder='მესამე ვერსია' style="width: 300; height: 30px;">
		<br>
		<textarea name="third" placeholder='ახსნა' style="width: 300; height: 30px;"> ახსნა 3</textarea> <input type="checkbox" name="firstcheck" value="2"/>
		 <br>
		
		<input type="submit" name="submit" style=" z-index:101;" value="გამოქვეყნება">
		 
		 <a href="index.php?do=quizz?delete=<? echo $b['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')"> <img src="../IMG/delete.png" width="18" style="position:relative; vertical-align: top;"> </a>
		 <br><br>
	 
	 </form>
	 </tr>
	 
	 
	 
	 <td>
 <!--რეფრეშის გარეშე ჩამოშლა-->	 	  
		 <script> $('a').on('click', function(){
        $('#changeingDiv').html('Changed Content');
    }
    );</script>
		    <div>
				            <i class="fas fa-plus-circle"></i> 
				<a href="#">ახალი კითხვის დამატება</a> 
       </div>
       
       <div id="changeingDiv">
             <!--წესით, აქ უნდა ჩნდებოდეს კონტენტი Changed content--> 
       </div>
			 
			 
	 </div>
		</td>
	 </tr>

	 <tr><td valign="top">  <? //echo $pagination;?> </td>
	 </tr>
</table>