<?php
ob_start();
date_default_timezone_set('Asia/Jakarta');
session_start();
require '../config.php'; 

$noKtp = $_POST['noKtp'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$namaPekerjaan = $_POST['namaPekerjaan'];
$alamatPekerjaan = $_POST['alamatPekerjaan'];
$password = $_POST['password'];
$hakAkses = $_POST['hakAkses'];

$email = $_POST['email'];
$telp = $_POST['telp'];
$noHp = $_POST['noHp'];

$idUser = $_POST['idUser'];
$idNasabah = $_POST['idNasabah'];
$datime = $_POST['datime'];

$dt = explode(" ", $datime);
$pass = md5($password . $dt[1]);

$i = 1;

$result1 = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND id != $idUser");
if (!$result1) { die("SQL ERROR : result1"); }
if (mysqli_num_rows($result1)) { 
	$_SESSION['pesan_profil_nasabah'] = $_SESSION['pesan_profil_nasabah'] . $i . '. Username Sudah Terpakai';
	$i++;
}

$result2 = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND id != $idUser");
if (!$result2) { die("SQL ERROR : result2"); }
if (mysqli_num_rows($result2)) { 
	$_SESSION['pesan_profil_nasabah'] = $_SESSION['pesan_profil_nasabah'] . $i . '. E-Mail Sudah Terpakai';
}

if (mysqli_num_rows($result1) || mysqli_num_rows($result2)) { 
	header("Location: profil_nasabah.php?idUser=" . $idUser);
} else {
	$sql3 = "UPDATE nasabah SET nama = '$nama', alamat = '$alamat', telp = '$telp', noHp = '$noHp', noKtp = '$noKtp', namaPekerjaan = '$namaPekerjaan', alamatPekerjaan = '$alamatPekerjaan' WHERE id = $idNasabah";
	$result3 = mysqli_query($conn, $sql3);
	if (!$result3) { die("SQL ERROR : result3"); }

	$sql4 = "UPDATE user SET username = '$username', email = '$email', hak_akses = '$hakAkses'";
	if($password != '' || $password != null){
		echo $password;
		$sql4 = $sql4 . ", password = '$pass'";
	}

	$sql4 = $sql4 . " WHERE id = $idUser";
	$result4 = mysqli_query($conn, $sql4);
	if (!$result4) { die("SQL ERROR : result4"); }
	header("Location: nasabah.php");
}
ob_end_flush(); ?>