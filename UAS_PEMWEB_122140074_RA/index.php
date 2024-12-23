<?php
session_start(); // Memulai session di file utama

// Jika belum login, arahkan ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$controller = new SembakoController(); // Membuat instans dari SembakoController

// Ambil data sembako
$sembako = $controller->query("SELECT * FROM sembako");

// Tombol cari ditekan
if (isset($_POST["cari"])) {
    $keyword = htmlspecialchars($_POST["keyword"]); // Validasi input
    $sembako = $controller->cari($keyword); // Menggunakan metode cari dari kelas
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="index.css"> <!-- Pastikan path ini benar -->

    <title>Toko Sembako</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="nav-left">
                    <!-- <img src="logo.png" alt="Logo Toko Sembako" style="height: 50px; margin-right: 10px;"> Menambahkan logo -->
                    <a class="navbar-brand" href="#">SEMBAKO JAYA ABADI</a>
                </div>
                <div class="nav-right">
                    <a href="index.php">Beranda</a>
                    <a href="sembako.php">Daftar Sembako</a>
                    <a href="logout.php">Keluar</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="centered">
        <h1>SEMBAKO JAYA ABADI</h1>
        <p>Selamat datang di halaman utama Toko Sembako kami!</p>
        <img src="sembako.jpg" alt="Toko Sembako" class="img-fluid">
    </div>

    <!-- Deskripsi Singkat -->
    <div class="description text-center my-4">
        <h2 class="text-center mb-4">Deskripsi</h2>
        <p>Toko Sembako Jaya Abadi adalah tempat terbaik untuk memenuhi kebutuhan sembako Anda. Kami menyediakan berbagai produk berkualitas dengan harga terjangkau. Dengan pelayanan yang ramah dan pengiriman yang cepat, kami berkomitmen untuk memberikan pengalaman berbelanja yang memuaskan bagi setiap pelanggan.</p>
    </div>

    <!-- Produk Unggulan -->
    <section class="produk-unggulan py-5">
        <div class="container">
            <h2 class="text-center mb-4">Produk Unggulan</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="produk1.jpg" class="card-img-top" alt="Produk 1">
                        <div class="card-body">
                            <h5 class="card-title text-center">Beras Premium</h5>
                            <p class="card-text text-center">Beras kualitas terbaik untuk kebutuhan sehari-hari. Harga terjangkau dengan kualitas yang sangat baik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="produk2.jpg" class="card-img-top" alt="Produk 2">
                        <div class="card-body">
                            <h5 class="card-title text-center">Minyak Goreng</h5>
                            <p class="card-text text-center">Minyak goreng sehat dan berkualitas, cocok untuk segala jenis masakan. Hemat dan ekonomis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="produk3.jpg" class="card-img-top" alt="Produk 3">
                        <div class="card-body">
                            <h5 class="card-title text-center">Gula Pasir</h5>
                            <p class="card-text text-center">Gula pasir dengan kualitas terbaik untuk berbagai kebutuhan dapur dan masakan Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Pelanggan -->
    <section class="testimonials py-5">
        <div class="container">
            <h2 class="text-center mb-4">Apa Kata Pelanggan</h2>
            <div class=" row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="card-text">"Produk yang saya beli di Toko Sembako Jaya Abadi selalu berkualitas tinggi dan harganya sangat terjangkau."</p>
                            <footer class="blockquote-footer">Rudi Setiawan, <cite title="Source Title">Pelanggan Setia</cite></footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="card-text">"Pelayanan yang sangat ramah dan pengiriman cepat. Saya selalu puas berbelanja di sini!"</p>
                            <footer class="blockquote-footer">Dian Sari, <cite title="Source Title">Pelanggan Tetap</cite></footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="card-text">"Toko ini selalu memiliki stok sembako yang lengkap. Terima kasih untuk pelayanannya!"</p>
                            <footer class="blockquote-footer">Budi Santoso, <cite title="Source Title">Pelanggan Reguler</cite></footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"></script>

</body>

</html>