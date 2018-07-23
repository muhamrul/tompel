<?php
ob_start();
date_default_timezone_set('Asia/Jakarta');
session_start();
require '../config.php'; 

$username = $_POST['username'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];

$email = $_POST['email'];
$noHp = $_POST['noHp'];

$idUser = $_POST['idUser'];
$idPegawai = $_POST['idPegawai'];
$datime = $_POST['datime'];

$dt = explode(" ", $datime);
$pass = md5($password . $dt[1]);

$i = 1;

$result1 = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND id != $idUser");
if (!$result1) { die("SQL ERROR : result1"); }
if (mysqli_num_rows($result1)) { 
	$_SESSION['pesan_profil_user'] = $_SESSION['pesan_profil_user'] . $i . '. Username Sudah Terpakai';
	$i++;
}

$result2 = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND id != $idUser");
if (!$result2) { die("SQL ERROR : result2"); }
if (mysqli_num_rows($result2)) { 
	$_SESSION['pesan_profil_user'] = $_SESSION['pesan_profil_user'] . $i . '. E-Mail Sudah Terpakai';
}

if (mysqli_num_rows($result1) || mysqli_num_rows($result2)) { 
	header("Location: profil_user.php");
} else {
	$sql3 = "UPDATE pegawai SET nama = '$nama', alamat = '$alamat', noHp = '$noHp' WHERE id = $idPegawai";
	$result3 = mysqli_query($conn, $sql3);
	if (!$result3) { die("SQL ERROR : result3"); }

	$sql4 = "UPDATE user SET username = '$username', email = '$email'";
	if($password != '' || $password != null){
		echo $password;
		$sql4 = $sql4 . ", password = '$pass'";
	}

	$sql4 = $sql4 . " WHERE id = $idUser";
	$result4 = mysqli_query($conn, $sql4);
	if (!$result4) { die("SQL ERROR : result4"); }
	header("Location: profil_user.php");
}
ob_end_flush(); ?>