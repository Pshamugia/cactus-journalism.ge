<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<? 
function getPagination($root_id)
	{
		global $conn;
		if ($root_id==0) return "Home";
		$nav = array();
		$current_root_id = $root_id;
		// $menu_item = $this->db->select("SELECT * FROM menu WHERE id=$root_id");
	$res = mysqli_query($conn, "SELECT * FROM menu WHERE id='$root_id'");
	
	$menu_item = mysqli_fetch_assoc($res);	
	
		$nav[] = $menu_item;
		$current_root_id = $menu_item['root_id'];
		while($current_root_id>0)
		{
			//$menu_item = $this->db->select("SELECT * FROM menu WHERE id=$current_root_id");
			$res = mysqli_query($conn,"SELECT * FROM menu WHERE id=$current_root_id");
			$menu_item = mysqli_fetch_assoc($res);
			$nav[] = $menu_item;
			$current_root_id = $menu_item['root_id'];
		}
		$nav = array_reverse($nav);
		$result = '<a href="index.php?do=menu">Home</a>';
		foreach ($nav as $item)
		{
			if($item['id'] == $root_id)
				$result = $result.' > '.$item['title_ka'];
			else
				$result = $result.' > <a href="index.php?do=menu&root_id='.$item['id'].'">'.$item['title_ka'].'</a>';
		}
		return $result;	
	}

$root_id = isset($_GET['root_id']) ? intval($_GET['root_id']) : 0;
if(isset($_POST['addmenu']))
{
	//$position = $this->db->select("SELECT MAX(position) AS pos FROM menu WHERE root_id=$root_id");
	
	$res = mysqli_query($conn, "SELECT MAX(position) AS pos FROM menu WHERE root_id=$root_id");
	$position = mysqli_fetch_assoc($res);
	$position = $position['pos']+1;
	
	mysqli_query($conn, "INSERT INTO menu (root_id, title_ka, title_en, title_ru, position, status, deleted) VALUES ('$root_id', '$_REQUEST[title_ka]', '$_REQUEST[title_en]', '$_REQUEST[title_ru]', $position, '1', '0')");

	//exit(mysqli_error($conn)); 
	
}
if (isset($_POST['edit_menu'])) // ეს არის ქვემენიუს ედიტის კოდი???
		{
	mysqli_query($conn, "UPDATE menu set title_ka='$_POST[title_ka]', title_en='$_POST[title_en]', title_ru='$_POST[title_ru]' WHERE id='$_POST[edit_id]'");
	
			/*$data = [
				'title_ka'=>$_POST['title_ka'],
				'title_en'=>$_POST['title_en'],
				'title_ru'=>$_POST['title_ru']
			];
			$this->db->update("menu", $data, "id=$_POST[edit_id]");*/
		}

if (isset($_GET['delete']))
		{
			// $this->db->query("DELETE FROM menu WHERE id=$_GET[delete]");
	mysqli_query($conn, "DELETE FROM menu WHERE id=$_GET[delete]");
		}


if (isset($_GET['up']))
		{
			//$up=$this->db->select("SELECT * FROM menu where id=$_GET[up]");
	$res=mysqli_query($conn, "SELECT * FROM menu where id=$_GET[up]");
	$up=mysqli_fetch_assoc($res);
	   
			//$upanddown=$this->db->select("SELECT * FROM menu where root_id=".$up[0]['root_id']." AND position<".$up[0]['position']." ORDER BY position DESC LIMIT 1");
	        $res=mysqli_query($conn, "SELECT * FROM menu where root_id=".$up['root_id']." AND position<".$up['position']." ORDER BY position DESC LIMIT 1");
	$upanddown=mysqli_fetch_assoc($res);
		
	
	
			if($up && $upanddown)
			{
				mysqli_query($conn, "UPDATE menu SET position=".$upanddown['position']." WHERE id=".$up['id']);
				mysqli_query($conn, "UPDATE menu SET position=".$up['position']." WHERE id=".$upanddown['id']);	 
			}
		}
		

if (isset($_GET['down']))
		{
			//$up=$this->db->select("SELECT * FROM menu where id=$_GET[down]");
	$res=mysqli_query($conn, "SELECT * FROM menu where id=$_GET[down]");
	$up=mysqli_fetch_assoc($res);
		
			//$upanddown=$this->db->select("SELECT * FROM menu where root_id=".$up[0]['root_id']." AND position>".$up[0]['position']." ORDER BY position ASC LIMIT 1");
	$res = mysqli_query($conn, "SELECT * FROM menu where root_id=".$up['root_id']." AND position>".$up['position']." ORDER BY position ASC LIMIT 1");
	$upanddown = mysqli_fetch_assoc($res);
			if($up && $upanddown)
			{
				mysqli_query($conn, "UPDATE menu SET position=".$upanddown['position']." WHERE id=".$up['id']);
				mysqli_query($conn, "UPDATE menu SET position=".$up['position']." WHERE id=".$upanddown['id']);
			}
		}


if(isset($_GET['status'])) // ეს სტატუსი რა არის?
		{
			//$status = $this->db->select("SELECT * FROM menu WHERE id=$_GET[status]");
	       $new_status = 0;			
			$res=mysqli_query($conn, "SELECT * FROM menu WHERE id=$_GET[status]");
			$status = mysqli_fetch_assoc($res);
			if($status['status']==1)
				$new_status = 0;
			else
				$new_status = 1;

			mysqli_query($conn, "UPDATE menu SET status=$new_status WHERE id=$_GET[status]");	
		}
		
 
 $res=mysqli_query($conn, "SELECT * FROM menu WHERE deleted=0 AND root_id='$root_id' ORDER BY position ASC");
$data=mysqli_fetch_array($res);
echo getPagination($root_id);
?> 
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
<table width="100%" align="left"> 
<tr>
  <td bgcolor="#FFFFFF" style="position:relative; top:-2px; padding:10px;">
  <div style="background-color:#212529; position: relative; float: left; padding:10px; width: 100%; height: 70px; margin-bottom:15px; display: inline-block"> <div id="indexs" style="color:#FFFFFF; width: 250px">
   <a href="#"  data-toggle="modal" data-target="#addMenuModal"> <span style="font-size:28px; position:relative; font-weight:bold; margin-right:10px; 
   top:0px;"><i class="fa fa-list"></i></span> <span style="position:relative; top:-3px;" > კატეგორიის დამატება </span> </a> </div>  
	  <div style="position: relative; top: 15px;"> 
		  
		   <? echo $root_menu_title; ?>
		  
		 </div>
	  
		  <div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-hidden="true">
  <form action="" method="post">
			  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">კატეგორიის დამატება</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		  სათაური KA <input type="text" name="title_ka"/>  <br>
		  სათაური EN <input type="text" name="title_en"/><br>
		  სათაური RU <input type="text" name="title_ru"/>
		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">დახურვა</button>
        <button type="submit" name="addmenu" class="btn btn-primary">შენახვა</button>
      </div>
    </div>
</form>
  </div>
</div>
	  
	 
 
	  </div>
 <table class="table">
		<tr>
			<th>სათაური <img src="<?=HTTP_HOST?>img/flag_geo.png" style="width: 30px; border: 1px solid #CCCCCC;"></th>
			<th>სათაური <img src="<?=HTTP_HOST?>img/flag_eng.png" style="width: 30px; border: 1px solid #CCCCCC;"> </th>
			<th>სათაური <img src="<?=HTTP_HOST?>img/flag_russ.png" style="width: 30px; border: 1px solid #CCCCCC;"></th>
			<th>პოზიცია</th> 
			<th>რედაქტირება</th>	 	
			</tr>
	  <?  
		$index = 0;   
		$res=mysqli_query($conn, "SELECT * FROM menu WHERE deleted=0 AND root_id='$root_id' ORDER BY position ASC");
		$menu = [];
		while($data=mysqli_fetch_assoc($res))
			$menu[] = $data;
?>
	 <? $index = 0; foreach($menu as $data) { ?>
	 <style> 
	 <style>
 .contact 
 { 
height:auto; 
width:100%; 
top:20px; 
position:relative;  
}


 .contact:hover
 {  
height:auto; 
width:100%; 
top:20px; 
position:relative;
	 background-color:#e9ecef;
	 color: aliceblue
	 
}


 
 </style>
	 </style>
			<tr class="contact">
			<td><a href="index.php?do=menu&root_id=<?=$data['id']?>">   <?=$data['title_ka'];?> </a></td>
			<td><a href="index.php?do=menu&root_id=<?=$data['id']?>">   <?=$data['title_en'];?> </a></td>
			<td><a href="index.php?do=menu&?root_id=<?=$data['id']?>">   <?=$data['title_ru'];?> </a></td>
			<td>  
			 <? if ($index!=0) { ?>
				<a href="index.php?do=menu&up=<?=$data['id'];?>&root_id=<?=isset($_GET['root_id']) ? $_GET['root_id'] : 0 ?>"><i class="fa fa-arrow-up"></i> </a>
			 <? } $index++; ?>
			<? if($index < count($menu)) {?>
				<a href="index.php?do=menu&down=<?=$data['id'];?>&root_id=<?=isset($_GET['root_id']) ? $_GET['root_id'] : 0 ?>"> <i class="fa fa-arrow-down"></i> </a>   
			 <? } ?>
				</td> 
			<td>   
				<a href="index.php?do=menu&status=<?=$data['id'];?>&root_id=<?=isset($_GET['root_id']) ? $_GET['root_id'] : 0 ?>" style="position: relative; padding-left: 15px; padding-right: 15px;">  <? if($data['status']==1) echo "<i class='fa fa-eye' aria-hidden='true'></i>"; else echo "<i class='fas fa-eye-slash'></i>"; ?> </a>
				
				
				
				 <div class="modal fade" id="editMenu_<?=$data['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
  <form action="" method="post">
			  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">მენიუს რედაქტირება</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		  სათაური KA <input type="text" name="title_ka" value="<?=$data['title_ka'];?>"/> <br>
		  სათაური EN <input type="text" name="title_en" value="<?=$data['title_en'];?>"/><br>
		  სათაური RU<input type="text" name="title_ru" value="<?=$data['title_ru'];?>"/>
		  <input type="hidden" name="edit_id" value="<?=$data['id'];?>"/>
		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">დახურვა</button>
        <button type="submit" name="edit_menu" class="btn btn-primary">შენახვა</button>
      </div>
    </div>
	</div>
</form>
  </div>
					 <a href="#" style="position: relative; padding-left: 5px; padding-right: 5px;"  data-toggle="modal" data-target="#editMenu_<?=$data['id'];?>"><i class="far fa-edit"></i> </a> <!--edit-->	
				
				
			 
				<a href="index.php?do=menu&delete=<?=$data['id'];?>&root_id=<?=$_GET['root_id']?>" onClick="return confirm('ნამდვილად გსურთ წაშლა?')" style="position: relative; padding-left: 15px; padding-right: 5px;"> <i class="far fa-trash-alt"></i> </a> <!--delete-->  </td>			 			
			</tr>
 <? } ?>
		</table>
	 
    </div> 
	</td>
 </tr>
	
  

  </table>   