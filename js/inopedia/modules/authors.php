<?php
if(!defined('PAATA_WEB')) { header('HTTP/1.0 404 Not Found'); exit(); }  
if (isset($_POST['submit']))
{
	$date=date('d.m.Y'); 
 
   
}


 

if (isset($_POST['edit_id']) && intval($_POST['edit_id']) > 0)
{
$sql="update avtorebi set `avtori`='$_REQUEST[avtori]' WHERE id='$_POST[edit_id]'";

}
 
	 

if (isset($_GET['edit']))
 {

	 $edit_data=mysqli_fetch_array (mysqli_query($conn, "SELECT * from avtorebi where id='$_GET[edit]'"));
	 $edit_avtori=$edit_data['avtori'];
	 $edit_id=$edit_data['id'];
	 
	 
 }
 
?>



   

  
   <table width="1000px" align="center" style="min-height: 500px">

 <tr>
	   
	 <td valign="top" style="background-color: #F90004"> 
  <div style="background-color:#F0F0F0; padding:10px; margin-bottom:10px;"> <div id="indexs" style="color:#FFFFFF;">
   <a href="index.php"> <span style="font-size:20px; position:relative; font-weight:bold; margin-right:10px; 
   top:0px;"> &lt; </span> <span style="position:relative; top:-3px;"> საწყის გვერდზე დაბრუნება </span> </a> </div> </div>
      <div>
	<b> კარიკატურის ავტორი</b>  
		   </div>
 <? 
if ($_REQUEST['addavtor'])
{	
	$edit = $_GET['edit'];
	if(intval($edit))
	{
		mysqli_query($conn, "UPDATE avtorebi SET avtori='$_POST[avtori]' WHERE id='$edit'");
		exit("<script>document.location.href='index.php?do=authors';</script>");
	}
	else
			mysqli_query($conn, "insert into avtorebi(avtori)values('$_POST[avtori]')");

  echo mysqli_error();

}
	 
if ($_REQUEST['avtor_delete'])
mysqli_query($conn, "delete from avtorebi where id='$_REQUEST[avtoris_id]'");

?> <form action="" method="post" enctype="multipart/form-data" style="position:relative; ">

 
<input type="text" name="avtori" placeholder="ავტორის დამატება" value="<? echo $edit_avtori; ?>" style="width:320px; height:35px;"/>
<input type="submit" name="addavtor" value="დაამატე" style="height:35px; width:75px;">
		 <input type="hidden" name="edit_id" value="<? echo $edit_id; ?>">
<br /> <br>
<select name="avtoris_id" id="avtoris_id" style="width:320px; height:35px;">
<option value="0" disabled selected hidden>მონიშნე კარიკატურის ავტორი </option>

    <?
	 $avt=mysqli_query($conn, "select * from  avtorebi order by id desc");
	 while($avts_id=mysqli_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select> 
<input type="submit" name="avtor_delete" value="წაშლა" style="height:35px; width:75px;" /> 
		 
		 <input type="button" value="EDIT" style="height:35px; width:75px;" name="avtoris_id" onClick="document.location='index.php?do=authors&edit='+document.getElementById('avtoris_id').value"/> 
		 
 
		 
</form><br>  
 
 </td>
	 
	 <tr>
		 
		 
		 
		 
		 
	   <td valign="top" style="background-color: antiquewhite">
		   <div>
	<b> იდეის ავტორი</b>  
		   </div>
		 <? 
if ($_REQUEST['add_new'])
{	
	
mysqli_query($conn, "insert into avtori_new(avtori2)values('$_POST[avtori2]')");

  echo mysqli_error();

}
	 
if ($_REQUEST['avtor_delete_new'])
mysqli_query($conn, "delete from avtori_new where id='$_REQUEST[avtoris_id_new]'");

?> <form action="" method="post" enctype="multipart/form-data" style="position:relative;  ">

 
<input type="text" name="avtori" placeholder="ავტორის დამატება" style="width:320px; height:35px;"/>
<input type="submit" name="add_new" value="დაამატე" style="height:35px; width:75px;">

<br /> 
<br>
		   
<select name="avtoris_id_new" style="width:320px; height:35px;">
<option value="0" disabled selected hidden>მონიშნე ავტორი </option>

    <?
	 $avt=mysqli_query($conn, "select * from  avtori_new order by id desc");
	 while($res=mysqli_fetch_array($avt))
	 {
	echo "<option value='".$res['id']."'>".$res['avtori']."</option>";			 
	 }
     ?>
</select> 
<input type="submit" name="avtor_delete_new" value="წაშლა" style="height:35px; width:75px;" /> 
</form>
		 </td>
	   </tr>
	   </tr>