 
<i class="fa fa-user"></i> 
<?	 
	$avt=mysqli_query($conn, "select * FROM kultura_password WHERE id=$_GET[id]");
$data=mysqli_fetch_array($avt); 
	
	echo $data['user'];
if (isset($_POST['edit']))
{
$sql="update kultura_password set user='$_POST[user]', passwords='$_POST[passwords]', email='$_POST[email]' WHERE id='$_POST[id]'";
mysqli_query($conn, $sql);
}
    ?>
  	
<br><br>
<ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
<form action=" " method="post">
<input type="text" name="user" value="<? echo $data['user'];?>" style="width:200px;"> Username <br>
<input type="text" name="passwords" value="<? echo $data['passwords'];?>" style="width:200px;"> Password <br> 
<input type="text" name="email" value="<? echo $data['email'];?>" style="width:200px;"> ელფოსტა <br>
<input type="submit" name="edit" value="შეცვლა">
	 <input type="hidden" name="id" value="<? echo $data['id']; ?>">
 </form>
</li>
						</ol> 

<table>
<tr>
	<td> 
		 
		<br>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active"> <i class="fa fa-r"></i> მიეცი უფლებები</li>
						</ol>  
		 

		<ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">	<?
		if (isset($_POST['status']))
		{
			$sql="UPDATE kultura_password SET delete_status='$_REQUEST[delete_status]', hide_admins='$_REQUEST[hide_admins]'  WHERE id='$_REQUEST[id]'";
		 mysqli_query($conn, $sql);
			
			$r=mysqli_query($conn, "SELECT * FROM kultura_password WHERE id='$_REQUEST[id]'");
$data=mysqli_fetch_array($r);
		}
		?>
		
			<? if ($GET['id']='1')
{ ?> 
		
		 <form action="" method="POST">
წაშლის უფლება <input type="checkbox" name="delete_status" <?=($data['delete_status']=='1')?'checked':''?> value="1"/>
			 <? echo $data['delete_status']; ?> <br>
			 <hr>
	მენიუში ადმინების კონტროლის უფლება <input type="checkbox" name="hide_admins" <?=($data['hide_admins']=='1')?'checked':''?> value="1"/>
			 <? echo $data['hide_admins']; ?> <br>
			  <hr>
		<input type="submit" name="status"> 
		</form>   <? } ?> </li>
						</ol> 
	</td>
	</tr>
</table>