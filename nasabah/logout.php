<?php
ob_start();
session_start();
unset($_SESSION['login_nasabah']);
header("Location: login.php"); 
ob_end_flush();
?>