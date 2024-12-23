<?php
session_start();

require 'functions.php';

// Jika pengguna belum login, arahkan ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Membuat instans dari SembakoController
$controller = new SembakoController(); 

// Cek apakah tombol sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // Validasi input
    $data = [
        'kode' => htmlspecialchars(trim($_POST["kode"])),
        'nama' => htmlspecialchars(trim($_POST["nama"])),
        'stok' => htmlspecialchars(trim($_POST["stok"])),
        'harga' => htmlspecialchars(trim($_POST["harga"])),
        'satuan' => htmlspecialchars(trim($_POST["satuan"]))
    ];

    // Cek apakah data berhasil ditambahkan atau tidak
    if ($controller->tambah($data) > 0) {
        echo "
            <script>
                alert('DATA BERHASIL DITAMBAH');
                document.location.href = 'sembako.php'; // Ganti ke sembako.php
            </script>
        ";
    } else {
        echo "
            <script>
                alert('DATA GAGAL DITAMBAH');
                document.location.href = 'sembako.php'; // Ganti ke sembako.php
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Sembako</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <style>
        /* GENERAL STYLING */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0047ab, #ffcc00);
            color: #333;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            position: relative;
        }

        h2 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ffcc00;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* FORM INPUT STYLING */
        .form-label {
            color: #0047ab;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label::before {
            content: '🛒'; /* Emoji keranjang belanja */
            font-size: 1.2rem;
            color: #ff5733;
        }

        input[type="text"], input[type="number"] {
            border: 2px solid #0047ab;
            border-radius: 10px;
            padding: 0.8rem;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #ffcc00;
            box-shadow: 0 0 8px #ffcc00;
        }

        /* BUTTON STYLING */
        button {
            background: linear-gradient(135deg, #ffcc00, #ff5733);
            color: #ffffff;
            font-weight: bold;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background: linear-gradient(135deg, #ff5733, #0047ab);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        /* ANIMATION */
        .container {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>

    <script>
        function validateForm() {
            const kode = document.getElementById('kode').value;
            const nama = document.getElementById('nama').value;
            const stok = document.getElementById('stok').value;
            const harga = document.getElementById('harga').value;

            if (!kode || !nama || stok <= 0 || harga <= 0) {
                alert("Semua field harus diisi dengan benar!");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="row border rounded-3 p-3 shadow box-area">
        <h2 class="text-center align-item-center mb-3">Tambah Data Sembako</h2>
        <form action="" method="post" enctype="multipart/form-data" class="mb-3">

            <div class="mb-3 ps-3">
                <label class="form-label" for="kode">Kode Sembako:</label>
                <input class="form-control" type="text" name="kode" id="kode" required>
            </div>

            <div class="mb-3 ps-3">
                <label class="form-label" for="nama">Nama Sembako:</label>
                <input class="form-control" type="text" name="nama" id="nama" required>
            </div>

            <div class="mb-3 ps-3">
                <label class="form-label" for="stok">Stok Sembako:</label>
                <input class="form-control" type="number" name="stok" id="stok" required>
            </div>

            <div class="mb-3 ps-3">
                <label class="form-label" for="harga">Harga Sembako:</label>
                <input class="form-control" type="number" name="harga" id="harga" required>
            </div>

            <div class="mb-3 ps-3">
                <label for="satuan_produk" class="form-label">Satuan Produk</label>
                <select class="form-select" id="satuan" name="satuan" required>
                    <option value="kg">Kilogram (kg)</option>
                    <option value="pcs">Pcs</option>
                    <option value="batang">Batang</option>
                    <option value="pack">Pack</option>
                    <option value="liter">Liter</option>
                    <option value="botol">Botol</option>
                    <option value="ekor">Ekor</option>
                    <option value="butir">Butir</option>
                </select>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-light" type="submit" name="submit">Tambahkan Data</button>
                <a href="sembako.php" class="btn btn-secondary text-white">Kembali</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
