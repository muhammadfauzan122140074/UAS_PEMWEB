<?php
session_start();
require 'functions.php';

$error = '';

// Membuat instans dari SembakoController
$controller = new SembakoController();

// Menangani proses registrasi
if (isset($_POST["register"])) {
    // Ambil data dari form dan validasi input
    $username = htmlspecialchars(trim($_POST["username"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $confirm_password = htmlspecialchars(trim($_POST["confirm_password"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $nomor_hp = htmlspecialchars(trim($_POST["nomor_hp"]));

    // Validasi form
    if (empty($username) || empty($password) || empty($confirm_password) || empty($email) || empty($nomor_hp)) {
        $error = 'Semua field harus diisi!';
    } elseif ($password !== $confirm_password) {
        $error = 'Password dan konfirmasi password tidak cocok!';
    } else {
        // Panggil fungsi registrasi
        $data = [
            'username' => $username,
            'email' => $email,
            'nomor_hp' => $nomor_hp,
            'password' => $password,
            'confirm_password' => $confirm_password
        ];
        
        // Lakukan registrasi
        if ($controller->register($data) > 0) {
            // Redirect ke halaman login setelah registrasi berhasil
            header("Location: login.php");
            exit();
        } else {
            $error = 'Username sudah terdaftar!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - MowMart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* GENERAL STYLING */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0047ab, #ffcc00);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            color: #333;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #ff0000, #ffcc00);
            color: #fff;
            padding: 1.5rem;
            border-bottom: 2px solid #0047ab;
        }

        h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-body {
            padding: 2rem;
            background-color: #ffffff;
        }

        .form-label {
            color: #0047ab;
            font-weight: bold;
        }

        input[type="text"], input[type="email"], input[type="tel"], input[type="password"] {
            border: 2px solid #0047ab;
            border-radius: 10px;
            padding: 0.8rem;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, input[type="password"]:focus {
            border-color: #ffcc00;
            box-shadow: 0 0 8px #ffcc00;
        }

        .btn-success {
            background: linear-gradient(135deg, #0047ab, #ffcc00);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            font-weight: bold;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #ffcc00, #ff0000);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .card-footer {
            background-color: #f9f9f9;
            border-top: 2px solid #0047ab;
            padding: 1rem;
        }

        .text-success {
            color: #ff0000 !important;
            font-weight: bold;
        }

        a.text-success:hover {
            text-decoration: underline;
            color: #ffcc00 !important;
        }
    </style>
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-success text-white">
                        <h3>Daftar Akun Baru</h3>
                        <p class="mb-0">Selamat datang di Sembako Jaya Abadi! Isi formulir di bawah ini untuk bergabung dan nikmati kemudahan dalam mengelola produk sembako Anda.</p>
                    </div>
                    <div class="card-body">
                        <?php if ($error): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form action="registrasi.php" method="post" id="registrationForm">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_hp" class="form-label">Nomor HP</label>
                                <input type="tel" name="nomor_hp" id="nomor_hp" class="form-control" placeholder="Masukkan nomor HP Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Ulangi password Anda" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="register" class="btn btn-success">Daftar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Sudah punya akun? <a href="login.php" class="text-success">Login di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
