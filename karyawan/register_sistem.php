<?php
ob_start();
date_default_timezone_set('Asia/Jakarta');
session_start();
require '../config.php'; 

$username = $_POST['register_username'];
$password = $_POST['register_password'];
$email = $_POST['register_email'];
$datime = date('Y-m-d h:i:s');
$dt = explode(" ", $datime);
$pass = md5($password . $dt[1]);

$i = 1;

$result1 = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
if (!$result1) { die("SQL ERROR : result1"); }
if (mysqli_num_rows($result1)) { 
	$_SESSION['pesan_register_pegawai'] = $_SESSION['pesan_register_pegawai'] . $i . '. Username Sudah Terpakai';
	$i++;
	$_SESSION['username_register_pegawai'] = $username;
	$_SESSION['password_register_pegawai'] = $password;
	$_SESSION['email_register_pegawai'] = $email;
}

$result2 = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
if (!$result2) { die("SQL ERROR : result2"); }
if (mysqli_num_rows($result2)) { 
	$_SESSION['pesan_register_pegawai'] = $_SESSION['pesan_register_pegawai'] . $i . '. E-Mail Sudah Terpakai';
	$i++;
	$_SESSION['username_register_pegawai'] = $username;
	$_SESSION['password_register_pegawai'] = $password;
	$_SESSION['email_register_pegawai'] = $email;
}

if($i == 1){
	$result3 = mysqli_query($conn, "INSERT INTO user(username, password, tgl_regist, hak_akses, email) VALUES ('$username', '$pass', '$datime', 'NONAKTIF', '$email')");
	if (!$result3) { die("SQL ERROR : result3"); }
	
	$result4 = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND username = '$username'");
	if (!$result4) { die("SQL ERROR : result4"); }	
	$row4 = mysqli_fetch_array($result4);
	$id = $row4['id'];

	$result5 = mysqli_query($conn, "INSERT INTO pegawai(nama, alamat, status, noHp, User_id) VALUES ('', '', '', '', $id)");
	if (!$result5) { die("SQL ERROR : result5"); }

	$_SESSION['username_login_pegawai'] = $username;
	$_SESSION['password_login_pegawai'] = $password;
}
header("Location: login.php");
ob_end_flush(); ?>