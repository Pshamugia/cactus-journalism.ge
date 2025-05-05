  <?php
  
include('session.php'); 
 if(function_exists("session_register"))
						{
			session_register("user");
						}
$r=mysqli_query($conn, "select * from kultura_cxrili where id='$_REQUEST[id]'");
$data=mysqli_fetch_array($r);

	
	?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="dist/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	 

<script type="text/javascript" src="modules/Ckeditor/ckeditor.js"></script>


<script type="text/javascript" src="modules/Ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../js/jquery.1.7.2.min.js"></script>
<link rel="stylesheet" href="../src/calendar/calendar.css">
<script src="../src/calendar/calendar.js"></script>
 <style type="text/css">
<!--
.style4 {color: #FFFFFF}
.style6 {color: #FFFFFF; font-weight: bold; }
-->
</style>
	<link rel="stylesheet" type="text/css" href="../fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
 
  <link href="logo.css" rel="stylesheet" type="text/css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">სამართავი პანელი</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="POST" action="index.php?do=search">
                <div class="input-group">
                    <input class="form-control" type="text" name="text" value="  ძიება..." 
    onblur="if(this.value=='') this.value='  ძიება...';"  onfocus="if(this.value=='  ძიება...') this.value='';"    aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?logoff">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav" style="min-height:1700px;">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
							
							
							  <a class="nav-link" href="index.php"><div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                საწყისი</a>
							<a class="nav-link" href="index.php?do=menu"><div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                მენიუს მართვა</a>
							
							<a class="nav-link" href="#"><div class="sb-nav-link-icon"><i class="fas fa-battery-half"></i></div>
                                ქვიზები</a>
							<? 
	 
	 if ($_SESSION['hide_admins']!='1') 
 {
		 
	 echo "";
 }
		 else { ?>
							<a class="nav-link" href="index.php?do=users"><div class="sb-nav-link-icon"><i class="fas fa-user-times"></i></div>
                                ადმინები </a> <? } ?>
							
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
								
								<div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                            გალერეა
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
							
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link" href="index.php?do=gallery">ფოტო</a>
									<a class="nav-link" href="index.php?do=video">ვიდეო</a></nav>
                            </div>
                            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>  
                                მენეჯერები
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="index.php?do=password"   aria-expanded="false" aria-controls="pagesCollapseAuth">
										პასვორდი
                                        <div class="sb-sidenav-collapse-arrow"></div></a>
                                   <a class="nav-link" href="index.php?do=banner"   aria-expanded="false" aria-controls="pagesCollapseError"> ბანერი
                                        <div class="sb-sidenav-collapse-arrow"></div></a>
									
									
									 <a class="nav-link" href="index.php?do=images"  aria-expanded="false" aria-controls="pagesCollapseError"> სურათების მენეჯერი
                                        <div class="sb-sidenav-collapse-arrow"></div></a>
                                     
                                </nav>
                            </div> 
							
							<a class="nav-link" href="index.php?do=authors"><div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                               ავტორები </a>
							
							
							<a class="nav-link" href="https://geonova.ge/roundcube" target="_blank"><div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                               ელფოსტა</a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="#"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts</a
                            ><a class="nav-link" href="#"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
						
                       <? echo $_SESSION['user']; ?>
						
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid" style="height:auto">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
						</ol>
                       
                        <?php
    mysqli_query($conn, "UPDATE kultura_cxrili SET editor='0' WHERE editor=$_SESSION[sesia]");
 
    if (isset($_REQUEST["do"])) {
        include("modules/$_REQUEST[do].php");
    } else {
        include("modules/home.php");
    }
?>
                           
                        
                         </div>
                     
                </main><footer class="py-4 bg-dark mt-auto" style="display: inline-block; background-color:#000000">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sunstudio</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/chart-area-demo.js"></script>
        <script src="dist/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="dist/assets/demo/datatables-demo.js"></script>
    </body>
</html>








 
 
<link rel="stylesheet" href="../src/calendar/calendar.css">
<script src="../src/calendar/calendar.js"></script>
 
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>