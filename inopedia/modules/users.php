<?$root_id = isset($_GET['root_id']) ? intval($_GET['root_id']) : 0;

	

if(isset($_POST['add_user']) && !empty($_POST['add_user'])) 
{
	$res=mysqli_query($conn, "SELECT * FROM kultura_password WHERE user='$_POST[user]'");
	///$data=mysqli_fetch_array($res);
	if (mysqli_num_rows($res) > 0) 
		 {
?>
<script> alert('ეს მომხმარებელი უკვე არსებობს'); </script>
<?
		 }
	else 
   	{
	$sql=mysqli_query($conn, "INSERT INTO kultura_password (user, passwords, email, delete_status, hide_admins, hide_email)VALUES('$_REQUEST[user]', '$_REQUEST[passwords]', '$_REQUEST[email]', '0', '$_REQUEST[hide_admins]', '$_REQUEST[hide_email]')");
	$rame=mysqli_query($conn, $sql);
	
	} 
}

 

if ($_REQUEST['delete'])
mysqli_query($conn, "delete from kultura_password where id='$_REQUEST[delete]'");

?>

 <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"> <i class="fas fa-user"></i> სუპერ ადმინისტრატორი</th>      
    </tr>
  </thead>
  <tbody>
<?
$res=mysqli_query($conn, "SELECT * FROM kultura_password WHERE id=1 ORDER BY ID DESC");
while($data=mysqli_fetch_array($res))
{
 
 
	?> 
 



    <tr>
      <th scope="row">
		
			
		  
		  
<a href="index.php?do=userpage&id=<? echo $data['id']; ?> "> <? echo $data['user'];  ?> </a> 
		  
		<?php /*?><a href="index.php?do=users&delete=<? echo $data['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')"> <i class="fas fa-minus-circle"></i> </a>  <?php */?>
		</th>
     
    </tr> <? }  ?>
	 <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"><i class="fas fa-user"></i> ადმინისტრატორი</th>
      
    </tr>
  </thead>
  <tbody>
	  
	 <?
 
$x;

		$res=mysqli_query($conn, "SELECT * FROM kultura_password WHERE id!=1 ORDER BY ID DESC");
	while($data=mysqli_fetch_array($res))
	{
		
  	  
	$x++;
	?> 
 



    <tr>
      <th scope="row">
		
			
		  
		  
<a href="index.php?do=userpage&id=<? echo $data['id']; ?> "> <? echo $x.') '; echo $data['user'];  ?> </a> 
		  
		<a href="index.php?do=users&delete=<? echo $data['id'];?>" onclick="return confirm('ნამდვილად გსურთ წაშლა?')"> <i class="fas fa-minus-circle"></i> </a>  
		</th>
     
    </tr> <? }     ?>
    <tr>
       
    </tr>
  </tbody>
</table>




 

<table>
<tr>
	<td> 
		<? 
	   
	 if ($_SESSION['hide_admins']!='1')
 {
		 
	 echo "NO";
 }
		 else { ?>
		<br>
		
		<ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">შექმენი ახალი ადმინი 
								<hr>
		<form action="" method="POST">
		<input type="text" required name="user"> სახელი და გვარი <br>
		<input type="password" required id="myInput" name="passwords"> 		
		<input type="checkbox" onclick="myFunction()">  
<script type="text/javascript"> function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} </script>	   პაროლი
		
		<br>
		<input type="email" required name="email"> ელფოსტა <br> 
			
		<input type="submit" name="add_user"> 
		</form> <? }  ?></li>
						</ol> 
	</td>
	</tr>
</table>