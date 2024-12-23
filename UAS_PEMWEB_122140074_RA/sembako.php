<?php
session_start(); // Memulai session di file utama

// Jika pengguna belum login, arahkan ke halaman login
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
    $keyword = htmlspecialchars(trim($_POST["keyword"])); // Validasi input
    $sembako = $controller->cari($keyword); // Menggunakan metode cari dari kelas
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="sembako.css">

    <title>Daftar Sembako Toko</title>
</head>

<body>
<header>
        <nav class="navbar">
            <div class="container">
                <div class="nav-left">
                    <a class="navbar-brand" href="#">DAFTAR SEMBAKO TOKO</a>
                </div>
                <div class="nav-right">
                    <a href="index.php">Beranda</a>
                    <a href="sembako.php">Sembako</a>
                    <a href="logout.php">Keluar</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container p-4">
        <div class="row">
            <div class="col mt-3">
                <form action="" method="post" class="d-flex " role="search">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Cari Sembako..." aria-label="Search" autocomplete="off" style="border: 3px solid #d87093;">
                    <button class="btn btn-outline-primary" name="cari" type="submit">Cari</button>
                </form>
            </div>

            <div class="col text-end mt-3">
                <a href="tambah.php">
                    <button type="button" class="btn btn-outline-success">Tambah Sembako</button>
                </a>
            </div>

            <table class="table table-striped table-hover mt-3">
                <tr>
                    <th>No.</th>
                    <th>Kode Sembako</th>
                    <th>Nama Sembako</th>
                    <th>Stok Sembako</th>
                    <th>Harga Sembako</th>
                    <th>Satuan</th>
                    <th>Aksi</th>
                </tr>

                <?php $i = 1; ?>
                <?php foreach ($sembako as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["kode"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["stok"]; ?></td> 
                        <td><?= $row["harga"]; ?></td> 
                        <td><?= $row["satuan"]; ?></td>
                        <td>
                            <a class="text-decoration-none" href="ubah.php?id=<?= $row["id"]; ?>">
                                <button type="button" class="btn btn-outline-warning">Perbarui</button>
                            </a>
                            <a class="text-decoration-none" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
                                <button type="button" class="btn btn-outline-danger">Hapus</button>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>