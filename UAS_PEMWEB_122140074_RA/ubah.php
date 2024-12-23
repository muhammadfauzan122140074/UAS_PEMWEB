<?php
session_start(); // Memulai session

require 'functions.php';

// Membuat instans dari SembakoController
$controller = new SembakoController();

// Ambil data di URL
$id = intval($_GET["id"]); // Validasi ID

// Query data sembako berdasarkan id
$sembako = $controller->query("SELECT * FROM sembako WHERE id = $id")[0];

// Cek apakah tombol sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // Validasi input
    $data = [
        'id' => $id,
        'kode' => htmlspecialchars(trim($_POST["kode"])),
        'nama' => htmlspecialchars(trim($_POST["nama"])),
        'stok' => htmlspecialchars(trim($_POST["stok"])),
        'harga' => htmlspecialchars(trim($_POST["harga"])),
        'satuan' => htmlspecialchars(trim($_POST["satuan"]))
    ];

    // Cek apakah data berhasil diubah atau tidak
    if ($controller->ubah($data) > 0) {
        echo "
            <script>
                alert('DATA BERHASIL DIUBAH');
                document.location.href = 'sembako.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('DATA GAGAL DIUBAH');
                document.location.href = 'sembako.php';
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
    <title>Ubah Data Sembako</title>

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

        h1 {
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

            <h1 class="mb-3 text-center">Update Data Sembako</h1>

            <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $sembako['id']; ?>">

                <div class="mb-3">
                    <label class="form-label" for="kode">Kode Sembako:</label>
                    <input class="form-control" type="text" name="kode" id="kode" value="<?php echo $sembako['kode']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama Sembako:</label>
                    <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $sembako['nama']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="stok">Stok Sembako:</label>
                    <input class="form-control" type="number" name="stok" id="stok" value="<?php echo $sembako['stok']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="harga">Harga Sembako:</label>
                    <input class="form-control" type="number" name="harga" id="harga" value="<?php echo $sembako['harga']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="satuan_produk" class="form-label">Satuan Produk</label>
                    <select class="form-select" id="satuan" name="satuan"  value="<?php echo $sembako['harga']; ?>" required>
                        <option value="kg" <?= $sembako['satuan'] == 'Kg' ? 'selected' : ''; ?> >Kilogram (kg)</option>
                        <option value="pcs" <?= $sembako['satuan'] == 'Pcs' ? 'selected' : ''; ?> >Pcs</option>
                        <option value="batang" <?= $sembako['satuan'] == 'Batang' ? 'selected' : ''; ?> >Batang</option>
                        <option value="pack" <?= $sembako['satuan'] == 'Pack' ? 'selected' : ''; ?> >Pack</option>
                        <option value="liter" <?= $sembako['satuan'] == 'Liter' ? 'selected' : ''; ?> >Liter</option>
                        <option value="botol" <?= $sembako['satuan'] == 'Botol' ? 'selected' : ''; ?> >Botol</option>
                        <option value="ekor" <?= $sembako['satuan'] == 'Ekor' ? 'selected' : ''; ?> >Ekor</option>
                        <option value="butir" <?= $sembako['satuan'] == 'Butir' ? 'selected' : ''; ?> >Butir</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" name="submit" class="btn btn-primary">Perbarui</button>
                    <a href="sembako.php" class="btn btn-secondary">Kembali</a>
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
