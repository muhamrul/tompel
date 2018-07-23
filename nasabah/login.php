<?php
ob_start();
session_start();
require '../config.php'; 
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name=viewport content="initial-scale=1, minimum-scale=1, width=device-width">
	<title>ARTA MULIA</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/todc-bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/theme/color_1.css" id="theme">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
	<style>
		body {padding:80px 0 0}
		textarea, input[type="password"], input[type="text"], input[type="submit"] {-webkit-appearance: none}
		.navbar-brand {font:300 15px/18px 'Roboto', sans-serif}
		.login_wrapper {position:relative;width:380px;margin:0 auto}
		.login_panel {background:#f8f8f8;padding:20px;-webkit-box-shadow: 0 0 0 4px #ededed;-moz-box-shadow: 0 0 0 4px #ededed;box-shadow: 0 0 0 4px #ededed;border:1px solid #ddd;position:relative}
		.login_head {margin-bottom:20px}
		.login_head h1 {margin:0;font:300 20px/24px 'Roboto', sans-serif}
		.login_submit {padding:10px 0}
		.login_panel label a {font-size:11px;margin-right:4px}
		
		@media (max-width: 767px) {
			body {padding-top:40px}
			.navbar {display:none}
			.login_wrapper {width:100%;padding:0 20px}
		}
	</style>
</head>
<body>
	<?php
	//unset($_SESSION['login_nasabah']);
	$pesan_register = ''; 
	if (isset($_SESSION['pesan_register_nasabah'])) {
		$pesan_register = $_SESSION['pesan_register_nasabah'];
		unset($_SESSION['pesan_register_nasabah']);
		echo '<script>alert("'.$pesan_register.'")</script>';
	}
	$pesan_login = ''; 
	if (isset($_SESSION['pesan_login_nasabah'])) {
		$pesan_login = $_SESSION['pesan_login_nasabah'];
		unset($_SESSION['pesan_login_nasabah']);
		echo '<script>alert("'.$pesan_login.'")</script>';
	}
	$username_register = ''; 
	if (isset($_SESSION['username_register_nasabah'])) {
		$username_register = $_SESSION['username_register_nasabah'];
		unset($_SESSION['username_register_nasabah']);
	}
	$password_register = ''; 
	if (isset($_SESSION['password_register_nasabah'])) {
		$password_register = $_SESSION['password_register_nasabah'];
		unset($_SESSION['password_register_nasabah']);
	}
	$email_register = ''; 
	if (isset($_SESSION['email_register_nasabah'])) {
		$email_register = $_SESSION['email_register_nasabah'];
		unset($_SESSION['email_register_nasabah']);
	}

	$username_login = ''; 
	if (isset($_SESSION['username_login_nasabah'])) {
		$username_login = $_SESSION['username_login_nasabah'];
		unset($_SESSION['username_login_nasabah']);
	}
	$password_login = ''; 
	if (isset($_SESSION['password_login_nasabah'])) {
		$password_login = $_SESSION['password_login_nasabah'];
		unset($_SESSION['password_login_nasabah']);
	}
	?>
	<header class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="dashboard.html">ARTA MULIA</a>
			</div>
			<div class="pull-right">
				<ul class="nav navbar-nav">
					<?php if($pesan_login != '' || $pesan_register == ''){ ?>
					<li class="active"><a href="#" class="login_toggle">Log In</a></li>
					<?php } else { ?>
					<li><a href="#" class="login_toggle">Log In</a></li>
					<?php } ?>
					
					<?php if($pesan_register != ''){ ?>
					<li class="active"><a href="#" class="register_toggle">Sign Up</a></li>
					<?php } else { ?>
					<li><a href="#" class="register_toggle">Sign Up</a></li>
					<?php } ?>
					
					<li><a href="#">Help</a></li>
				</ul>
			</div>
		</div>
	</header>

	<div class="login_wrapper">
		<?php if($pesan_login != '' || $pesan_register == ''){ ?>
		<div class="login_panel log_section">
		<?php } else { ?>
		<div class="login_panel log_section" style="display:none">
		<?php } ?>
			<div class="login_head">
				<h1>Log In Nasabah</h1>
			</div>
			<form action="login_sistem.php" method="POST" id="login_form">
				<div class="form-group">
					<label for="login_username">Username</label>
					<input type="text" id="login_username" name="login_username" class="form-control input-lg" 
					data-required="true" data-minlength="2" data-required-message="Please enter a valid Username" 
					value="<?php echo $username_login; ?>">
				</div>
				<div class="form-group">
					<label for="login_password">Password <a href="#" class="pull-right">Forgot password?</a></label>
					<input type="password" id="login_password" name="login_password" class="form-control input-lg" 
					data-required="true" data-minlength="6" 
					data-minlength-message="Password should have at least 6 characters." 
					data-required-message="Please enter a valid Password" value="<?php echo $password_login; ?>">
					<label class="checkbox"><input type="checkbox" name="login_remember" id="login_remember"> Remember me</label>
				</div>
				<div class="login_submit">
					<input type="hidden" name="login" class="form-control input-lg" value="">
					<button class="btn btn-primary btn-block btn-lg">Log In</button>
				</div>
				<div class="text-center">
					<small>Not registered? <a class="form_toggle" href="#reg_form"> Sign up here</a></small>
				</div>
			</form>
		</div>
		<?php if($pesan_register != ''){ ?>
		<div class="login_panel reg_section">
		<?php } else { ?>
		<div class="login_panel reg_section" style="display:none">
		<?php } ?>
			<div class="login_head">
				<h1>Sign Up Nasabah</h1>
			</div>
			<form action="register_sistem.php" method="POST" id="register_form">
				<div class="form-group">
					<label for="register_username">Username</label>
					<input type="text" id="register_username" name="register_username" 
					class="form-control input-lg" value="<?php echo $username_register; ?>" >
				</div>
				<div class="form-group">
					<label for="register_password">Password</label>
					<input type="password" id="register_password" name="register_password" 
					class="form-control input-lg" value="<?php echo $password_register; ?>" >
				</div>
				<div class="form-group">
					<label for="register_email">Email</label>
					<input type="text" id="register_email" name="register_email" 
					class="form-control input-lg" value="<?php echo $email_register; ?>" >
				</div>
				<div class="login_submit">
					<input type="hidden" name="register" class="form-control input-lg" value="">
					<button class="btn btn-primary btn-block btn-lg">Sign Up</button>
				</div>
				<div class="text-center">
					<small>Never mind, <a class="form_toggle" href="#login_form">send me back to the sign-in screen</a></small>
				</div>
			</form>
		</div>
	</div>
	
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery_cookie.min.js"></script>
	<script src="../js/lib/parsley/parsley.min.js"></script>
	<script>
		$(function() {
			
			//* validation
			$('#login_form').parsley({
				errors: {
					classHandler: function ( elem, isRadioOrCheckbox ) {
						if(isRadioOrCheckbox) {
							return $(elem).closest('.form_sep');
						}
					},
					container: function (element, isRadioOrCheckbox) {
						if(isRadioOrCheckbox) {
							return element.closest('.form_sep');
						}
					}
				}
			});
			
			//* change form
			$('.form_toggle').on('click',function(e){
				$('.login_panel').slideToggle(function() {
					if($('.log_section').is(':visible')) {
						$('.login_toggle').closest('li').addClass('active').siblings('li').removeClass('active');
					} else {
						$('.register_toggle').closest('li').addClass('active').siblings('li').removeClass('active');
					}
				});
				e.preventDefault();
			});
			
			$('.login_toggle').on('click',function(e){
				if($('.log_section').is(':hidden')) {
					$('.reg_section').slideUp();
					$('.log_section').slideDown();
					$(this).closest('li').addClass('active').siblings('li').removeClass('active');
				}
				e.preventDefault();
			});
			$('.register_toggle').on('click',function(e){
				if($('.reg_section').is(':hidden')) {
					$('.log_section').slideUp();
					$('.reg_section').slideDown();
					$(this).closest('li').addClass('active').siblings('li').removeClass('active');
				}
				e.preventDefault();
			});
			
			// set theme from cookie
			if($.cookie('ebro_color') != undefined) {
				$('#theme').attr('href','css/theme/'+$.cookie('ebro_color')+'.css');
			}
			
		});
	</script>
</body>
</html>
<?php ob_end_flush(); ?>