

 

<?

function makeMenu($root_id)
{
	global $conn;
	$res=mysqli_query($conn, "SELECT * FROM menu WHERE root_id=$root_id AND status='1' ORDER by position DESC");
	while($menu=mysqli_fetch_assoc($res))
	{
		$res2 = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM menu WHERE root_id = '$menu[id]' AND status='1'");
		$cnt = mysqli_fetch_assoc($res2);
		if($cnt['cnt'])
		{
			echo '<li><a href="#">'.$menu['title_'.$_SESSION['LANG']].'</a><ul>';
			makeMenu($menu['id']);
			echo '</ul></li>';
		}
		else
		{
			echo '<li><a href="#">'.$menu['title_'.$_SESSION['LANG']].'</a></li>';		}
	}
}
?>