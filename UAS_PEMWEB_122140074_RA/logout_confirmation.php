<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="refresh" content="5;url=login.php">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Sembako Jaya Abadi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* GENERAL STYLING */
        body {
            background: linear-gradient(135deg, #0047ab, #ffcc00, #ff0000);
            color: #333;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .text-center {
            background: #ffffff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #0047ab;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        p {
            color: #555;
            font-size: 1rem;
        }

        .btn {
            background: linear-gradient(135deg, #ffcc00, #ff0000);
            color: #fff;
            border: none;
            font-weight: bold;
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn:hover {
            background: linear-gradient(135deg, #ff0000, #0047ab);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        /* ANIMATION */
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
</head>

<body>
    <div class="text-center">
    <h1 class="text-success">Anda Telah Berhasil Logout!</h1>
    <p class="text-muted">Terima kasih atas kerja keras Anda! Silakan login kembali untuk melanjutkan pengelolaan data produk sembako.</p>
        <a href="login.php" class="btn">Login Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
