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
	<title>ARTA MULIA</title>
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">	
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/todc-bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../img/flags/flags.css">
	<link rel="stylesheet" href="../css/retina.css">
	<link rel="stylesheet" href="../js/lib/bootstrap-switch/stylesheets/bootstrap-switch.css">
	<link rel="stylesheet" href="../js/lib/bootstrap-switch/stylesheets/ebro_bootstrapSwitch.css">	
	<link rel="stylesheet" href="../js/lib/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="../js/lib/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="../js/lib/magnific-popup/magnific-popup.css">
	<link rel="stylesheet" href="../css/linecons/style.css">
	<link rel="stylesheet" href="../js/lib/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/theme/color_1.css" id="theme">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body class="sidebar_hidden">
	<div id="wrapper_all">
		<header id="top_header">
			<div class="container">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand" href="dashboard.html">ARTA MULIA</a>
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
					<li class="active">             
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
				<!--ul>
					<li><a href="#">Ebro Admin</a></li>
					<li><span>Dashboard</span></li>						
				</ul-->
			</div>
		</section>
		<section class="container clearfix main_section">
			<div id="main_content_outer" class="clearfix">
				<div id="main_content">

					<!-- main content -->
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">Basic</h4>
							</div>
							<div id="dt_basic_wrapper" class="dataTables_wrapper form-inline" role="grid">
								<div class="dt-top-row">
									<div class="dt-wrapper">
										<table id="dt_basic" class="table table-striped dataTable" aria-describedby="dt_basic_info">
											<thead>
												<tr role="row">
													<th>No</th>
													<th>Username</th>
													<th>Nama Lengkap</th>
													<th>Alamat Rumah</th>
													<th>Status</th>
													<th>Kontak</th>
													<?php if ($_SESSION['status_pegawai'] == 'ADMIN') { ?>
														<th>Alat</th>
													<?php } ?>
												</tr>
											</thead>
											<tbody role="alert" aria-live="polite" aria-relevant="all">
												<?php 
												$no = 0;
												$result1 = mysqli_query($conn, "SELECT * FROM user u JOIN pegawai p ON u.id = p.User_id");
										    	if (!$result1) { die("SQL Error Result1 "); }
										    	while ($allRow1 = mysqli_fetch_array($result1)) {
												$no++;
												?>
												<tr class="odd">
													<td><?php echo $no; ?></td>
													<td><?php echo $allRow1['username']; ?></td>
													<td><?php echo $allRow1['nama']; ?></td>
													<td><?php echo $allRow1['alamat']; ?></td>
													<td><?php echo $allRow1['status']; ?></td>
													<td><?php echo 'E-Mail : ' . $allRow1['email'] . '<br>No Hp : ' . $allRow1['noHp']; ?></td>
													<?php if ($_SESSION['status_pegawai'] == 'ADMIN') { ?>
													<td>
														<a class="btn btn-info" href="profil_pegawai.php?idUser=<?php echo $allRow1['User_id']; ?>">
															<span class="glyphicon glyphicon-eye-open"></span>
														</a>
													</td>
													<?php } ?>
												</tr>
												<?php } ?>
											</tbody>
									</table>
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
	<script src="../js/lib/peity/jquery.peity.min.js"></script>
	<script src="../js/lib/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="../js/lib/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
	<script src="../js/lib/easy-pie-chart/jquery.easy-pie-chart.js"></script>
	<script src="../js/lib/flot/jquery.flot.min.js"></script>
	<script src="../js/lib/flot/jquery.flot.pie.min.js"></script>
	<script src="../js/lib/flot/jquery.flot.time.min.js"></script>
	<script src="../js/lib/flot/jquery.flot.tooltip.min.js"></script>
	<script src="../js/lib/flot/jquery.flot.resize.js"></script>
	<script src="../js/lib/FitVids/jquery.fitvids.js"></script>
	<script src="../js/lib/owl-carousel/owl.carousel.min.js"></script>
	<script src="../js/lib/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="../js/lib/jquery_ui/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="../js/lib/fullcalendar/fullcalendar.js"></script>
	<script src="../js/pages/ebro_dashboard.js"></script>
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