<?php
include 'koneksi.php';

class SembakoController extends Koneksi {
    public function query($query) {
        $result = mysqli_query($this->conn, $query);

        // Cek apakah query berhasil
        if (!$result) {
            // Menampilkan error jika query gagal
            die("Query gagal dijalankan: " . mysqli_error($this->conn));
        }

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    } 

    public function tambah($data) {
        // Ambil data dari tiap elemen
        $kode = htmlspecialchars($data["kode"]);
        $nama = htmlspecialchars($data["nama"]);
        $stok = htmlspecialchars($data["stok"]);
        $harga = htmlspecialchars($data["harga"]);
        $satuan = htmlspecialchars($data["satuan"]);
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $ip_address = $_SERVER['REMOTE_ADDR'];

        // Validasi input
        if (empty($kode) || empty($nama) || empty($stok) || empty($harga) || empty($satuan)) {
            return false; // Validasi gagal
        }

        // Query insert data
        $query = "INSERT INTO sembako (kode, nama, stok, harga, satuan, browser, ip_address) 
        VALUES ('$kode', '$nama', '$stok', '$harga', '$satuan', '$browser', '$ip_address')";
        
        if ($this->conn->query($query) === TRUE) {
            return $this->conn->affected_rows;
        } else {
            echo "Error: " . $this->conn->error; // Tampilkan pesan kesalahan
            return false; // Gagal menambahkan data
        }
    }

    public function hapus($id) {
        // Validasi ID agar aman dari SQL injection
        $id = intval($id);

        // Query untuk menghapus data berdasarkan ID
        $query = "DELETE FROM sembako WHERE id = $id";
        
        if ($this->conn->query($query) === TRUE) {
            return $this->conn->affected_rows;
        } else {
            return false; // Gagal menghapus data
        }
    }

    public function ubah($data) {
        // Ambil data dari tiap elemen
        $id = $data["id"];
        $kode = htmlspecialchars($data["kode"]);
        $nama = htmlspecialchars($data["nama"]);
        $stok = htmlspecialchars($data["stok"]);
        $harga = htmlspecialchars($data["harga"]);
        $satuan = htmlspecialchars($data["satuan"]);

        // Validasi input
        if (empty($kode) || empty($nama) || empty($stok) || empty($harga) || empty($satuan)) {
            return false; // Validasi gagal
        }

        // Query update data
        $query = "UPDATE sembako SET
                    kode = '$kode',
                    nama = '$nama',
                    stok = '$stok',
                    harga = '$harga',
                    satuan = '$satuan'
                WHERE id = $id";

        if ($this->conn->query($query) === TRUE) {
            return $this->conn->affected_rows;
        } else {
            return false; // Gagal mengubah data
        }
    }

    public function cari($keyword) {
        $query = "SELECT * FROM sembako
                    WHERE
                kode LIKE '%$keyword%' OR
                nama LIKE '%$keyword%' OR
                stok LIKE '%$keyword%' OR
                harga LIKE '%$keyword%' OR
                satuan LIKE '%$keyword%'";
        return $this->query($query);
    }

    // Fungsi untuk menambah user (registrasi)
    public function register($data) {
        // Ambil data dari tiap elemen
        $username = htmlspecialchars($data["username"]);
        $email = htmlspecialchars($data["email"]);
        $nomor_hp = htmlspecialchars($data["nomor_hp"]);
        $password = mysqli_real_escape_string($this->conn, $data["password"]);
        $confirm_password = mysqli_real_escape_string($this->conn, $data["confirm_password"]);

        // Validasi password
        if ($password !== $confirm_password) {
            return false;
        }

        // Enkripsi password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk mengecek apakah username sudah ada
        $result = $this->conn->query("SELECT * FROM login WHERE username = '$username'");

if ($result->num_rows > 0) {
            return false; // Username sudah ada
        }

        // Query untuk menambah data user ke dalam database
        $query = "INSERT INTO login (username, password, email, nomor_hp) 
                VALUES ('$username', '$password_hash', '$email', '$nomor_hp')";
        
        if ($this->conn->query($query) === TRUE) {
            return $this->conn->affected_rows;
        } else {
            return false; // Gagal menambahkan user
        }
    }

    // Fungsi untuk login
    public function login($username, $password) {
        // Query untuk mengambil data berdasarkan username
        $result = $this->conn->query("SELECT * FROM login WHERE username = '$username'");

        // Cek apakah username ditemukan
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $row["password"])) {
                $_SESSION['username'] = $username; // Simpan username ke session
                return $row; // Login berhasil
            }
        }

        return false; // Login gagal
    }

    // Fungsi untuk menangani proses logout
    public function logout() {
        // Menghapus semua data sesi
        $_SESSION = [];
        
        // Menghapus sesi yang tersimpan
        session_unset();
        session_destroy();
    }

    // Fungsi untuk mengatur cookie
    public function setCookieValue($name, $value, $expire) {
        setcookie($name, $value, time() + $expire);
    }

    public function getCookieValue($name) {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
    }

    public function deleteCookie($name) {
        setcookie($name, '', time() - 3600);
    }
}
    ?>
