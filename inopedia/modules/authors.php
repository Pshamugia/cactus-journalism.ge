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

// მეორე ავტორის ბლოკი

if (isset($_POST['edit_id_new']) && intval($_POST['edit_id_new']) > 0)
{
$sql="update avtori_new set `avtori2`='$_REQUEST[avtori2]' WHERE id='$_POST[edit_id_new]'";

}
 
	 

if (isset($_GET['edit2']))
 {

	 $edit_data=mysqli_fetch_array (mysqli_query($conn, "SELECT * from avtori_new where id='$_GET[edit2]'"));
	 $edit_avtori_new=$edit_data['avtori2'];
	 $edit_id_new=$edit_data['id'];
	 
	 
 }




 
?>



   

  
   <table width="1000px" align="center" style="min-height: 500px">

 <tr>
	   
	 <td valign="top" style="background-color: #ECECEC">  
      <div style="position: relative; padding: 15px;">
	<b> ავტორი</b>  
		   
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
<input type="submit" name="addavtor" value="დაამატე" style="height:35px; width:85px;">
		 <input type="hidden" name="edit_id" value="<? echo $edit_id; ?>">
<br /> <br>
<select name="avtoris_id" id="avtoris_id" style="width:320px; height:35px;">
<option value="0" disabled selected hidden>მონიშნე ავტორი </option>

    <?
	 $avt=mysqli_query($conn, "select * from  avtorebi order by id desc");
	 while($avts_id=mysqli_fetch_array($avt))
	 {
	echo "<option value='".$avts_id['id']."'>".$avts_id['avtori']."</option>";			 
	 }
     ?>
</select> 
<input type="submit" name="avtor_delete" value="წაშლა" style="height:35px; width:85px;" /> 
		 
		 <input type="button" value="EDIT" style="height:35px; width:75px;" name="avtoris_id" onClick="document.location='index.php?do=authors&edit='+document.getElementById('avtoris_id').value"/> 
		 
 
		 
</form><br>  
 
 </td>
	 
	 <tr>
		 
		 
		 
		 
		 
		 
		 
		 
	   <td valign="top" style="background-color:#212529">
		   <div style="position: relative; padding: 15px; color: #FFFFFF">
	<b> Author</b>  
		<? 
if ($_REQUEST['add_new2'])
{	
	$edit2 = $_GET['edit2'];
	if(intval($edit2))
	{
		mysqli_query($conn, "UPDATE avtori_new SET avtori2='$_POST[avtori2]' WHERE id='$edit2'");
		exit("<script>document.location.href='index.php?do=authors';</script>");
		
	}
	else
			mysqli_query($conn, "insert into avtori_new(avtori2)values('$_POST[avtori2]')");

  echo mysqli_error();

}
	 
if ($_REQUEST['avtor_delete_new'])
mysqli_query($conn, "delete from avtori_new where id='$_REQUEST[avtoris_id_new]'");

?>
		   
		   
		   
		  <form action="" method="post" enctype="multipart/form-data" style="position:relative; ">

 
<input type="text" name="avtori2" placeholder="Add author" value="<? echo $edit_avtori_new; ?>" style="width:320px; height:35px;"/>
<input type="submit" name="add_new2" value="Add" style="height:35px; width:75px;">
		 <input type="hidden" name="edit_id_new" value="<? echo $edit_id_new; ?>">
<br /> <br>
<select name="avtoris_id_new" id="avtoris_id_new" style="width:320px; height:35px;">
<option value="0" disabled selected hidden>Select the author </option>

    <?
	 $avt=mysqli_query($conn, "select * from  avtori_new order by id desc");
	 while($avts_id2=mysqli_fetch_array($avt))
	 {
	echo "<option value='".$avts_id2['id']."'>".$avts_id2['avtori2']."</option>";			 
	 }
     ?>
</select> 
<input type="submit" name="avtor_delete_new" value="Delete" style="height:35px; width:75px;" /> 
		 
		 <input type="button" value="EDIT" style="height:35px; width:75px;" name="avtoris_id_new" onClick="document.location='index.php?do=authors&edit2='+document.getElementById('avtoris_id_new').value"/> 
		 
 
		 
</form>
		 </td>
	   </tr>
	   </tr></table>