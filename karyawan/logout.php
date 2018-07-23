<?php
ob_start();
session_start();
unset($_SESSION['login_pegawai']);
unset($_SESSION['status_pegawai']);
header("Location: login.php"); 
ob_end_flush();
?>