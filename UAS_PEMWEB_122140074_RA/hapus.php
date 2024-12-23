<?php
session_start(); // Memulai session
require 'functions.php';

$controller = new SembakoController(); // Membuat instans dari SembakoController

// Validasi ID
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = intval($_GET["id"]); // Mengubah ID menjadi integer

    if ($controller->hapus($id) > 0) {
        echo "
        <script>
            alert('DATA BERHASIL DIHAPUS');
            document.location.href = 'sembako.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('DATA GAGAL DIHAPUS');
            document.location.href = 'sembako.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('ID tidak valid');
        document.location.href = 'sembako.php';
    </script>
    ";
}
?>