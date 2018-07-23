<?php
ob_start();
date_default_timezone_set('Asia/Jakarta');
session_start();
require '../config.php'; 

$username = $_POST['login_username'];
$password = $_POST['login_password'];
$sql = "SELECT n.id, u.password, u.tgl_regist, u.hak_akses FROM  user u JOIN nasabah n ON u.id = n.User_id WHERE u.username = '$username' OR u.email = '$username'";
$result = mysqli_query($conn, $sql);
if (!$result) { die("SQL ERROR : result"); }
if (mysqli_num_rows($result)) {
	$row = mysqli_fetch_array($result);
	$datime = $row['tgl_regist'];
	$dt = explode(" ", $datime);
	$pass = md5($password . $dt[1]);
	if ($row['password'] == $pass && $row['hak_akses'] == 'AKTIF') {
		$_SESSION['login_nasabah'] = $row['id'];
		header("Location: index.php");
	} else if ($row['hak_akses'] == 'NONAKTIF') {
		$_SESSION['username_login_nasabah'] = $username;
		$_SESSION['password_login_nasabah'] = $password;
		$_SESSION['pesan_login_nasabah'] = 'Identitas Ini statusnya Non-Aktif';
		header("Location: login.php");
	} else{
		$_SESSION['username_login_nasabah'] = $username;
		$_SESSION['password_login_nasabah'] = $password;
		$_SESSION['pesan_login_nasabah'] = 'Password anda salah';
		header("Location: login.php");
	}
} else {
	$_SESSION['username_login_nasabah'] = $username;
	$_SESSION['password_login_nasabah'] = $password;
	$_SESSION['pesan_login_nasabah'] = 'username atau email tidak ada';
	header("Location: login.php");
}
ob_end_flush(); ?>