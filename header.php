<!-- Style switcher start -->
	
<link rel="stylesheet" href="css/top_menu.css">
<div class="style-switch-wrapper">
		<div class="style-switch-button">
			<i class="fa fa-sliders"></i>
		</div>
		<h3><k><?=$LANG['colors']?></k></h3>

		<button id="preset2" class="btn btn-sm btn-primary"></button>
		<button id="preset3" class="btn btn-sm btn-primary"></button>
		<button id="preset1" class="btn btn-sm btn-primary"></button>

		<button id="preset4" class="btn btn-sm btn-primary"></button>
		<button id="preset5" class="btn btn-sm btn-primary"></button>
		<button id="preset6" class="btn btn-sm btn-primary"></button>
		<br/><br/>
		<a class="btn btn-sm btn-primary close-styler float-right"><span> <?=$LANG['close']?> <span> X</a>
	</div>
	<!-- Style switcher end -->

	<div class="body-inner">

<!-- Header start -->
<header id="header" class="fixed-top header" role="banner">
	<a class="navbar-brand navbar-bg" href="<?=HTTP_HOST?>"><img class="img-fluid float-right" src="<?=HTTP_HOST?>img/cactus-logo.png" width="156" alt="logo"></a>
	<div class="container">
		
		
		
		
		<?
function makeMenu($root_id)
{
	global $conn;
	
	 
	
	$res=mysqli_query($conn, "SELECT * FROM menu WHERE root_id=$root_id AND status='1' AND title_ka!='გალერეა' ORDER by position ASC");
	while($menu=mysqli_fetch_assoc($res))
	{
		$res2 = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM menu WHERE root_id = '$menu[id]' AND status='1'");
		$cnt = mysqli_fetch_assoc($res2);
		if($cnt['cnt'])
		{
			echo '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">'.$menu['title_'.$_SESSION['LANG']].'</a><ul>';
			makeMenu($menu['id']);
			echo '</ul></li>';
		}
		
			else
		{
			echo '<li class="nav-item"><a class="nav-link" href="index.php?do=content&id='.$menu['id'].'">'.$menu['title_'.$_SESSION['LANG']].'</a></li>';		
		}		
	} 
	
	
	
	// ეს არის ფოტოგალერეა ცალკე
	$res=mysqli_query($conn, "SELECT * FROM menu WHERE root_id=$root_id AND status='1' AND title_ka='გალერეა'  ORDER by position ASC");
	while($menu=mysqli_fetch_assoc($res))
	{
		$res2 = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM menu WHERE root_id = '$menu[id]' AND status='1'");
		$cnt = mysqli_fetch_assoc($res2);
		
		if($menu['title_ka']=='გალერეა')
			
		{
			echo '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">'.$menu['title_'.$_SESSION['LANG']].'</a><ul>';
			makeMenu($menu['id']);
			echo '</ul></li>';
		}
		
			else
		{
			echo '<li class="nav-item"><a class="nav-link" href="index.php?do=photo">'.$menu['title_'.$_SESSION['LANG']].'</a></li>';		
		}		
	} 	 
	
	 
}
			
?>
				

				
<div id="cssmenu">
                <div id="menu-button" onClick="if($('#cssmenu').children('ul').css('display') == 'none') $('#cssmenu').children('ul').css('display', 'block'); else $('#cssmenu').children('ul').css('display', 'none');"><i class="fa fa-bars"></i></div>
             
	
	
	<ul style="position: relative; top: -15px;">
				  
					<li class="nav-item">
						<a class="nav-link" href="<?=HTTP_HOST?>" role="button" aria-haspopup="true"
							aria-expanded="false">
							<? echo $LANG['home']; ?> 
						</a> 
					</li>
				  
				  <? makeMenu(0);?> 
		
		 <li class="nav-item">
						<a class="nav-link" href="<?=HTTP_HOST?>index.php?do=contact" role="button" aria-haspopup="true"
							aria-expanded="false">
							<? echo $LANG['contact']; ?> 
						</a> 
					</li>
		
		<li class="nav-item">
				 <?
				$query_str='';
				$query_arr = explode('&',$_SERVER['QUERY_STRING']);
				foreach($query_arr as $q)
				{
					$arr = explode('=',$q);
					if($arr[0] != 'lang')
						$query_str.=$arr[0]."=".$arr[1]."&";
				}
				if(empty($query_str))
					$query_str."?";
				else
					$query_str = "?".$query_str;

			 ?>
					</li>
				  
              
            </ul>
                </div>
		
		
		
		
		
		
	</div>
</header>
<!--/ Header end -->