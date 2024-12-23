<?php
ob_start(); // Mulai output buffering
session_start();
require 'functions.php';

$controller = new SembakoController(); // Membuat instans dari SembakoController

// Memanggil fungsi logout untuk menghapus sesi dan menghentikan sesi pengguna
$controller->logout(); // Memanggil metode logout dari objek

// Redirect ke halaman konfirmasi logout
header("Location: logout_confirmation.php");
exit; // Pastikan untuk menghentikan eksekusi skrip setelah redirect
ob_end_flush(); // Mengirim output buffer dan mematikan output buffering
?>