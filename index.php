<?php 
include'../koneksi.php';

session_start();

// if(!isset($_SESSION['petugas'])) {
// 	echo "<script>alert('Anda belum login! Mohon login terlebih dahulu');</script>";
// 	echo "<script>window.location.href = 'login.php';</script>";
// }

if(!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda belum login! Mohon login terlebih dahulu');</script>";
    echo "<script>window.location.href = 'login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Dashboard - Admin</title>
	<!--favicon-->
	<link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="../assets/css/pace.min.css" rel="stylesheet" />
	<script src="../assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="../assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="../assets/css/app.css" />
	<link rel="stylesheet" href="../assets/css/dark-sidebar.css" />
	<link rel="stylesheet" href="../assets/css/dark-theme.css" />
	<!-- DataTables -->
	<link href="../assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!--sidebar-wrapper-->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div class="">
					<img src="../assets/images/logo-icon.png" class="logo-icon-2" alt="" />
				</div>
				<div>
					<h4 class="logo-text">Admin</h4>
				</div>
				<a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
				</a>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="index.php">
						<div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
			
				</li>

				<li>
					<a href="?halaman=petugas">
						<div class="parent-icon icon-color-5"><i class="bx bx-group"></i>
						</div>
						<div class="menu-title">Petugas</div>
					</a>
				</li>

				<li>
					<a href="?halaman=masyarakat">
						<div class="parent-icon icon-color-3"><i class="bx bx-user"></i>
						</div>
						<div class="menu-title">Masyarakat</div>
					</a>
				</li>


			
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-12"> <i class="bx bx-receipt"></i>
						</div>
						<div class="menu-title">Pengaduan</div>
					</a>
					<ul>
						<li> <a href="?halaman=pengaduanmasuk"><i class="bx bx-right-arrow-alt"></i>Pengaduan Masuk</a>
						</li>
						<li> <a href="?halaman=pengaduanproses"><i class="bx bx-right-arrow-alt"></i>Pengaduan Proses</a>
						</li>
						<li> <a href="?halaman=pengaduanselesai"><i class="bx bx-right-arrow-alt"></i>Pengaduan Selesai</a>
						</li>
						<li> <a href="?halaman=pengaduanbatal"><i class="bx bx-right-arrow-alt"></i>Pengaduan Batal</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="?halaman=laporan">
						<div class="parent-icon icon-color-5"><i class="bx bx-file-blank"></i>
						</div>
						<div class="menu-title">Laporan</div>
					</a>
				</li>

			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar-wrapper-->
		<!--header-->
		<header class="top-header">
			<nav class="navbar navbar-expand">
				<div class="left-topbar d-flex align-items-center">
					<a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
					</a>
				</div>
		
				<div class="right-topbar ml-auto">
					<ul class="navbar-nav">
						<li class="nav-item search-btn-mobile">
							<a class="nav-link position-relative" href="javascript:;">	<i class="bx bx-search vertical-align-middle"></i>
							</a>
						</li>
				
				
						<li class="nav-item dropdown dropdown-user-profile">
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
								<div class="media user-box align-items-center">
									<div class="media-body user-info">
										<p class="user-name mb-0"><?php echo $_SESSION['admin']['nama_petugas']; ?></p>
										<p class="designattion mb-0">Available</p>
									</div>
									<img src="https://via.placeholder.com/110x110" class="user-img" alt="">
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right">	
								<div class="dropdown-divider mb-0"></div>	<a class="dropdown-item" href="javascript:;"><i
										class="bx bx-power-off"></i><span>Logout</span></a>
							</div>
						</li>
						
					</ul>
				</div>
			</nav>
		</header>
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					
				    <?php 
					  
					if (isset($_GET['halaman'])) {

						if($_GET['halaman']=="petugas"){
							include 'petugas/petugas.php';
						} elseif($_GET['halaman']=="tambahpetugas"){
							include 'petugas/tambahpetugas.php';
						} elseif($_GET['halaman']=="editpetugas"){
							include 'petugas/editpetugas.php';
						} elseif($_GET['halaman']=="hapuspetugas"){
							include 'petugas/hapuspetugas.php';
						} elseif($_GET['halaman']=="pengaduanmasuk"){
							include 'pengaduan/pengaduanmasuk.php';
						} elseif($_GET['halaman']=="pengaduanproses"){
							include 'pengaduan/pengaduanproses.php';
						} elseif($_GET['halaman']=="pengaduanselesai"){
							include 'pengaduan/pengaduanselesai.php';
						} elseif($_GET['halaman']=="pengaduandetail"){
							include 'pengaduan/pengaduandetail.php';
						} elseif($_GET['halaman']=="laporan"){
							include 'laporan.php';
						} elseif($_GET['halaman']=="masyarakat"){
							include 'masyarakat.php';
						} elseif($_GET['halaman']=="pengaduanbatal"){
							include 'pengaduan/pengaduanbatal.php';
						}
						
					} else {
						include 'dashboard.php';
					}
					 
					?>
					
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
		<div class="footer">
			<p class="mb-0">APPEM @2020 | Developed By : <a href="https://themeforest.net/user/codervent" target="_blank">APPM</a>
			</p>
		</div>
		<!-- end footer -->
	</div>
	<!-- end wrapper -->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="custom-control custom-radio">
					<input type="radio" id="darkmode" name="customRadio" class="custom-control-input">
					<label class="custom-control-label" for="darkmode">Dark Mode</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="lightmode" name="customRadio" checked class="custom-control-input">
					<label class="custom-control-label" for="lightmode">Light Mode</label>
				</div>
			</div>
			<hr/>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="DarkSidebar">
				<label class="custom-control-label" for="DarkSidebar">Dark Sidebar</label>
			</div>
			<hr/>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="ColorLessIcons">
				<label class="custom-control-label" for="ColorLessIcons">Color Less Icons</label>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<!--plugins-->
	<script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!-- App JS -->
	<script src="../assets/js/app.js"></script>
	<!-- DataTables -->
	<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
			var table = $('#example2').DataTable({
				lengthChange: false,
				buttons: ["copy", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
		});
	</script>
</body>

</html>