<?php
ob_start();
session_start();
if (!isset($_SESSION['login_pegawai'])) {
	header("Location: login.php");
}
require '../config.php'; 
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ebro Admin Template v1.3</title>

	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/todc-bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../img/flags/flags.css">
	<link rel="stylesheet" href="../css/retina.css">
	<link rel="stylesheet" href="../js/lib/bootstrap-switch/stylesheets/bootstrap-switch.css">
	<link rel="stylesheet" href="../js/lib/bootstrap-switch/stylesheets/ebro_bootstrapSwitch.css">	
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/theme/color_1.css" id="theme">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body class="sidebar_hidden">
	<?php
	$pesan_profil_nasabah = ''; 
	if (isset($_SESSION['pesan_profil_nasabah'])) {
		$pesan_profil_nasabah = $_SESSION['pesan_profil_nasabah'];
		unset($_SESSION['pesan_profil_nasabah']);
		echo '<script>alert("'.$pesan_profil_nasabah.'")</script>';
	}

	$idUser = $_GET['idUser'];
	$sql1 = "SELECT n.id, n.User_id, n.noKtp, u.username, n.nama, n.alamat, n.namaPekerjaan, n.alamatPekerjaan, u.hak_akses,  u.email, n.telp, n.noHp, u.tgl_regist FROM  user u JOIN nasabah n ON u.id = n.User_id WHERE u.id = $idUser";
	$result1 = mysqli_query($conn, $sql1);
	if (!$result1) { die("SQL ERROR : result1"); }
	if (!mysqli_num_rows($result1)) {
		header("Location: profil_pegawai.php?idUser=" . $idUser);
	}
	?>
	<div id="wrapper_all">
		<header id="top_header">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-2">
						<a href="dashboard1.html" class="logo_main" title="Ebro Admin Template:"><img src="img/logo_main.png" alt=""></a>
					</div>
					<div class="col-sm-push-4 col-sm-3 text-right hidden-xs">
						<div class="notification_dropdown dropdown">
							<a href="#" class="notification_icon dropdown-toggle" data-toggle="dropdown">
								<span class="label label-danger">8</span>
								<i class="icon-comment-alt icon-2x"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<div class="dropdown_heading">Comments</div>
									<div class="dropdown_content">
										<ul class="dropdown_items">
											<li>
												<h3><span class="small_info">12:43</span><a href="#">Lorem ipsum dolor&hellip;</a></h3>
												<p>Lorem ipsum dolor sit amet&hellip;</p>
											</li>
											<li>
												<h3><span class="small_info">Today</span><a href="#">Lorem ipsum dolor&hellip;</a></h3>
												<p>Lorem ipsum dolor sit amet&hellip;</p>
											</li>
											<li>
												<h3><span class="small_info">14 Aug</span><a href="#">Lorem ipsum dolor&hellip;</a></h3>
												<p>Lorem ipsum dolor sit amet&hellip;</p>
											</li>
										</ul>
									</div>
									<div class="dropdown_footer"><a href="#" class="btn btn-sm btn-default">Show all</a></div>
								</li>
							</ul>
						</div>
						<div class="notification_separator"></div>
						<div class="notification_dropdown dropdown">
							<a href="#" class="notification_icon dropdown-toggle" data-toggle="dropdown">
								<span class="label label-danger">12</span>
								<i class="icon-envelope-alt icon-2x"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-wide">
								<li>
									<div class="dropdown_heading">Messages</div>
									<div class="dropdown_content">
										<ul class="dropdown_items">
											<li>
												<h3><a href="#">Lorem ipsum dolor sit amet</a></h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
												<p class="large_info">Sean Walter, 24.05.2014</p>
												<i class="icon-exclamation-sign indicator"></i>
											</li>
											<li>
												<h3><a href="#">Lorem ipsum dolor&hellip;</a></h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aliquam assumenda&hellip;</p>
												<p class="large_info">Sean Walter, 24.05.2014</p>
											</li>
											<li>
												<h3><a href="#">Lorem ipsum dolor&hellip;</a></h3>
												<p>Lorem ipsum dolor sit amet, consectetur&hellip;</p>
												<p class="large_info">Sean Walter, 24.05.2014</p>
												<i class="icon-exclamation-sign indicator"></i>
											</li>
										</ul>
									</div>
									<div class="dropdown_footer">
										<a href="#" class="btn btn-sm btn-default">Show all</a>
										<div class="pull-right dropdown_actions">
											<a href="#"><i class="icon-refresh"></i></a>
											<a href="#"><i class="icon-cog"></i></a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xs-6 col-sm-push-4 col-sm-3">
						<div class="pull-right dropdown">
							<a href="#" class="user_info dropdown-toggle" title="Jonathan Hay" data-toggle="dropdown">
								<img src="../gallery/smile.png" alt="">
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="profil_user.php">Profile</a></li>
								<li><a href="javascript:void(0)">Another action</a></li>
								<li><a href="logout.php">Log Out</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xs-12 col-sm-pull-6 col-sm-4">
						<form class="main_search">
							<input type="text" id="search_query" name="search_query" class="typeahead form-control">
							<button type="submit" class="btn btn-primary btn-xs"><i class="icon-search icon-white"></i></button>
						</form> 
					</div>
				</div>
			</div>
		</header>						
		<nav id="top_navigation">
			<div class="container">
				<ul id="icon_nav_h" class="top_ico_nav clearfix">
					<li>
						<a href="index.php">
							<i class="icon-home icon-2x"></i>
							<span class="menu_label">Home</span>
						</a>
					</li>
					<li>             
						<a href="nasabah.php">
							<i class="icon-male icon-2x"></i>
							<span class="menu_label">Nasabah</span>
						</a>
					</li>
					<li>             
						<a href="pegawai.php">
							<i class="icon-group icon-2x"></i>
							<span class="menu_label">Karyawan</span>
						</a>
					</li>
					<li>             
						<a href="#">
							<span class="label label-danger">12</span>
							<i class="icon-tasks icon-2x"></i>
							<span class="menu_label">Pendataan</span>
						</a>
					</li>
					<li>             
						<a href="#">
							<i class="icon-beaker icon-2x"></i>
							<span class="menu_label">Bunga</span>
						</a>
					</li>
					<li>             
						<a href="#">
							<i class="icon-book icon-2x"></i>
							<span class="menu_label">Help</span>
						</a>
					</li>
					<li>             
						<a href="#">
							<span class="label label-success">$2 347</span>
							<i class="icon-tags icon-2x"></i>
							<span class="menu_label">E-Commerce</span>
						</a>
					</li>
					<li>             
						<a href="#">
							<i class="icon-wrench icon-2x"></i>
							<span class="menu_label">Settings</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- mobile navigation -->
		<nav id="mobile_navigation"></nav>

		<section id="breadcrumbs">
			<div class="container">
				<ul>
					<li><a href="nasabah.php">Nasabah</a></li>
					<li><span>Profil Nasabah</span></li>						
				</ul>
			</div>
		</section>
		<section class="container clearfix main_section">
			<div id="main_content_outer" class="clearfix">
				<div id="main_content">

					<!-- main content -->
					<div class="row">
						<div class="col-sm-12">
						<?php $row1 = mysqli_fetch_array($result1); ?>
							<div class="user_heading">
								<div class="row">
									<div class="col-sm-2 hidden-xs">
										<img src="../gallery/smile.png" style="width: 80%; height: 80%;" class="img-thumbnail user_avatar">
									</div>
									<div class="col-sm-10">
										<div class="user_heading_info">
											<div class="user_actions pull-right">
												<a href="#" class="edit_form" data-toggle="tooltip" data-placement="top auto" title="Edit profile"><span class="icon-edit"></span></a>
												<a href="#" class="remove_user" data-toggle="tooltip" data-placement="top auto" title="Remove User"><span class="icon-remove"></span></a>
											</div>
											<h1><?php echo $row1['nama']; ?></h1>
											<h2>NASABAH</h2>
										</div>
									</div>
								</div>
							</div>
							<div class="user_content">
								<div class="row">
									<div class="col-sm-10 col-sm-offset-2">
										<form class="form-horizontal user_form" action="profil_nasabah_sistem.php" method="POST" enctype="multipart/form-data">
											<h3 class="heading_a">General</h3>
											<div class="form-group">
												<label class="col-sm-2 control-label">NIK</label>
												<div class="col-sm-10 editable">
													<p class="form-control-static"><?php echo $row1['noKtp']; ?></p>
													<div class="hidden_control">
														<input type="text" class="form-control" name="noKtp" value="<?php echo $row1['noKtp']; ?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Username</label>
												<div class="col-sm-10 editable">
													<p class="form-control-static"><?php echo $row1['username']; ?></p>
													<div class="hidden_control">
														<input type="text" class="form-control" name="username" value="<?php echo $row1['username']; ?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Name</label>
												<div class="col-sm-10 editable">
													<p class="form-control-static"><?php echo $row1['nama']; ?></p>
													<div class="hidden_control">
														<input type="text" class="form-control" name="nama" value="<?php echo $row1['nama']; ?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Alamat</label>
												<div class="col-sm-10 editable">
													<p class="form-control-static"><?php echo $row1['alamat']; ?></p>
													<div class="hidden_control">
														<input type="text" class="form-control" name="alamat" value="<?php echo $row1['alamat']; ?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Pekerjaan</label>
												<div class="col-sm-10 editable">
													<p class="form-control-static"><?php echo $row1['namaPekerjaan']; ?></p>
													<div class="hidden_control">
														<input type="text" class="form-control" name="namaPekerjaan" value="<?php echo $row1['namaPekerjaan']; ?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Alamat Kerja</label>
												<div class="col-sm-10 editable">
													<p class="form-control-static"><?php echo $row1['alamatPekerjaan']; ?></p>
													<div class="hidden_control">
														<input type="text" class="form-control" name="alamatPekerjaan" value="<?php echo $row1['alamatPekerjaan']; ?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Password</label>
												<div class="col-sm-10 editable">
													<p class="form-control-static">*****</p>
													<div class="hidden_control">
														<input id="p" type="password" class="form-control" name="password" disabled="" style="float: left; width: 80%;"><a onclick="BukaPassword()" class="btn btn-default" style="float: right; width: 20%;" title="ubah kata sandi"><span class="glyphicon glyphicon-pencil"></span></a>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Hak Akses</label>
												<div class="col-sm-10 editable">
													<p class="form-control-static"><?php echo $row1['hak_akses']; ?></p>
													<div class="hidden_control">
														<select name="hakAkses" class="form-control">
														<?php if($row1['hak_akses'] == 'AKTIF'){ ?>
															<option value="AKTIF" selected="">AKTIF</option>
															<option value="NONAKTIF">NONAKTIF</option>
														<?php } else { ?>
															<option value="AKTIF">AKTIF</option>
															<option value="NONAKTIF" selected="">NONAKTIF</option>
														<?php } ?>
														</select>
													</div>
												</div>
											</div>
											<h3 class="heading_a">Contact info</h3>
											<div class="form-group">
												<label class="col-sm-2 control-label">Email</label>
												<div class="col-sm-10 editable">
													<p class="form-control-static"><?php echo $row1['email']; ?></p>
													<div class="hidden_control">
														<input type="text" class="form-control" name="email" value="<?php echo $row1['email']; ?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Phone</label>
												<div class="col-sm-10 editable">
													<p class="form-control-static"><?php echo $row1['telp']; ?></p>
													<div class="hidden_control">
														<input type="text" class="form-control" name="telp" value="<?php echo $row1['telp']; ?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">SmartPhone</label>
												<div class="col-sm-10 editable">
													<p class="form-control-static"><?php echo $row1['noHp']; ?></p>
													<div class="hidden_control">
														<input type="text" class="form-control" name="noHp" value="<?php echo $row1['noHp']; ?>">
													</div>
												</div>
											</div>
											<div class="form_submit clearfix" style="display:none">
												<div class="row">
													<div class="col-sm-10 col-sm-offset-2">
														<input type="hidden" class="form-control" name="idUser" value="<?php echo $row1['User_id']; ?>">
														<input type="hidden" class="form-control" name="idNasabah" value="<?php echo $row1['id']; ?>">
														<input type="hidden" class="form-control" name="datime" value="<?php echo $row1['tgl_regist']; ?>">
														<button type="submit" class="btn btn-primary btn-lg">Save all data</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<div id="footer_space"></div>
	</div>

	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">&copy; 2013 Your Company</div>
				<div class="col-sm-8"></div>
				<div class="col-sm-1 text-right"><small class="text-muted">v1.3</small></div>
			</div>
		</div>
	</footer>

	<script src="../js/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/jquery.ba-resize.min.js"></script>
	<script src="../js/jquery_cookie.min.js"></script>
	<script src="../js/retina.min.js"></script>
	<script src="../js/lib/typeahead.js/typeahead.min.js"></script>
	<script src="../js/lib/typeahead.js/hogan-2.0.0.js"></script>
	<script src="../js/tinynav.js"></script>
	<script src="../js/lib/jQuery-slimScroll/jquery.slimscroll.min.js"></script>
	<script src="../js/lib/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<script src="../js/lib/TouchSwipe/jquery.touchSwipe.min.js"></script>
	<script src="../js/lib/navgoco/jquery.navgoco.min.js"></script>
	<script src="../js/ebro_common.js"></script>
	<script src="../js/lib/bootbox/bootbox.min.js"></script>
	<script src="../js/pages/ebro_user_profile.js"></script>
	<div id="style_switcher" class="switcher_open">
		<a href="#" class="switcher_toggle"><i class="icon-cog"></i></a>
		<div class="style_items">
			<p class="style_title">Theme</p>
			<ul class="clearfix" id="theme_switch">
				<li class="style_active" style="background:#48ac2e" title="color_1">Color 1</li>
				<li style="background:#993399" title="color_2">Color 2</li>
				<li style="background:#168cbe" title="color_3">Color 3</li>
				<li style="background:#d61110" title="color_4">Color 4</li>
				<li style="background:#e96710" title="color_5">Color 5</li>
				<li style="background:#262626" title="color_6">Color 6</li>
				<li style="background:#01aaad" title="color_7">Color 7</li>
				<li style="background:#9c5100" title="color_8">Color 8</li>
				<li style="background:#e31a8f" title="color_9">Color 9</li>
				<li style="background:#ffbb0e" title="color_10">Color 10</li>
				<li style="background:#79be0b" title="color_11">Color 11</li>
				<li style="background:#887171" title="color_12">Color 12</li>
				<li style="background:#28abe2" title="color_13">Color 13</li>
				<li style="background:#2f7138" title="color_14">Color 14</li>
				<li style="background:#ce4627" title="color_15">Color 15</li>
				<li style="background:#693986" title="color_16">Color 16</li>
				<li style="background:#7f8c8d" title="color_17">Color 17</li>
				<li style="background:#2c3e50" title="color_18">Color 18</li>
				<li style="background:#34495e" title="color_19">Color 19</li>
				<li style="background:#1abc9c" title="color_20">Color 20</li>
			</ul>
		</div>
		<div class="style_items" id="sidebar_switch">
			<p class="style_title">Sidebar position</p>
			<label class="radio-inline">
				<input type="radio" name="sidebar_position" id="sidebar_left" value="left" checked> Left
			</label>
			<label class="radio-inline">
				<input type="radio" name="sidebar_position" id="sidebar_right" value="right"> Right
			</label>
		</div>
		<div class="style_items" id="layout_switch">
			<p class="style_title">Layout</p>
			<select name="layout_style" id="layout_style" class="form-control">
				<option value="fixed">Fixed</option>
				<option value="full_width" class="hidden-sm hidden-md">Full Width</option>
				<option value="boxed" class="hidden-sm hidden-md">Boxed</option>
			</select>
		</div>
		<div class="style_items" id="style_pattern">
			<p class="style_title">Pattern (boxed layout)</p>
			<ul class="clearfix">
				<li class="pattern_active" style="background:url(img/patterns/pattern_1.png) no-repeat 0 0" title="pattern_1">Pattern 1</li>
				<li style="background:url(img/patterns/pattern_2.png) no-repeat 0 0" title="pattern_2">Pattern 2</li>
				<li style="background:url(img/patterns/pattern_3.png) no-repeat 0 0" title="pattern_3">Pattern 3</li>
				<li style="background:url(img/patterns/pattern_4.png) no-repeat 0 0" title="pattern_4">Pattern 4</li>
				<li style="background:url(img/patterns/pattern_5.png) no-repeat 0 0" title="pattern_5">Pattern 5</li>
				<li style="background:url(img/patterns/pattern_6.png) no-repeat 0 0" title="pattern_6">Pattern 6</li>
				<li style="background:url(img/patterns/pattern_7.png) no-repeat 0 0" title="pattern_7">Pattern 7</li>
				<li style="background:url(img/patterns/pattern_8.png) no-repeat 0 0" title="pattern_8">Pattern 8</li>
				<li style="background:url(img/patterns/pattern_9.png) no-repeat 0 0" title="pattern_9">Pattern 9</li>
				<li style="background:url(img/patterns/pattern_10.png) no-repeat 0 0" title="pattern_10">Pattern 10</li>
			</ul>
		</div>
		<div class="text-center">
			<button class="btn btn-default" id="style_reset">Reset</button>
		</div>
	</div>
</body>
</html>
<?php ob_end_flush(); ?>