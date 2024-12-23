<?php
session_start();
require 'koneksi.php';

// Membuat instans dari Koneksi
$koneksi = new Koneksi();
$conn = $koneksi->getConnection(); // Mendapatkan koneksi

$error = '';

// Menangani proses login
if (isset($_POST["login"])) {
    // Ambil data dari form
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Panggil fungsi login untuk validasi user
    $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

    // Periksa apakah username ditemukan
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            // Jika login berhasil, set session dan arahkan ke halaman index
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit();
        } else {
            $error = 'Password salah!';
        }
    } else {
        $error = 'Username tidak ditemukan!';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sembako Jaya Abadi</title>
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

        input[type="text"], input[type="password"] {
            border: 2px solid #0047ab;
            border-radius: 10px;
            padding: 0.8rem;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #ffcc00;
            box-shadow: 0 0 8px #ffcc00;
        }

        .form-check-label {
            color: #333;
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

        /* Animasi untuk teks bergerak */
        @keyframes slideIn {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }
            50% {
                transform: translateX(10%);
                opacity: 0.5;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .moving-text {
            animation: slideIn 2s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
        <div class="card-header text-center">
            <h3 class="moving-text">Selamat Datang di Sembako Jaya Abadi!</h3>
            <p class="moving-text mb-0">Temukan kemudahan dalam mengelola kebutuhan sembako Anda. Silakan login untuk memulai!</p>
        </div>

        <div class="card-body">
            <?php if ($error): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="post" id="loginForm">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username Anda" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Remember me</label>
                </div>
                <div class="d-grid">
                    <button type="submit" name="login" class="btn btn-success">Login</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <p>Belum punya akun? <a href="registrasi.php" class="text-success">Daftar di sini</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
