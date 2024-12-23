# UAS PEMROGRAMAN WEBSITE - RA
---

# UAS-Pemweb-Fauzan-122140074
- Nama: Muhammad Fauzan As Shabierin
- NIM: 122140074
- Kelas: RA
---

# Penilaian UAS Pemrograman Web
- Client-side Programming: 30%
- Server-side Programming: 30%
- Database Management: 20%
- State Management: 20%
- Hosting Aplikasi Web: 20%
---

# Bagian 1: Pemrograman Client-side
Berikut adalah tampilan antarmuka untuk proses registrasi bagi pengguna baru:
![Screenshot 2024-12-24 000918](https://github.com/user-attachments/assets/efc5058b-26d8-4967-adfa-f63fa4a1ddcb)

Form login pengguna tersedia dengan desain berikut:
![Screenshot 2024-12-24 001023](https://github.com/user-attachments/assets/dbffd173-2ffe-48a4-9398-84f4acc268f3)

Jika terjadi kesalahan pada username atau password, pengguna akan menerima notifikasi berikut:
- Username tidak ditemukan!
  ![Screenshot 2024-12-24 001955](https://github.com/user-attachments/assets/eec965b1-3468-4c3d-acd4-344dec19c606)

- Password salah!
  ![Screenshot 2024-12-24 002148](https://github.com/user-attachments/assets/2f0ca8af-f756-4a73-9162-f877aee0e324)

Pengguna juga dapat mengakses halaman untuk menambahkan data produk Sembako:
![Screenshot 2024-12-24 003553](https://github.com/user-attachments/assets/a3ebf14d-66ef-45bc-b3bf-207297d997fb)

Jika pengguna berhasil menambahkan data produk Sembako maka akan menampilkan event seperti ini:
![Screenshot 2024-12-24 015707](https://github.com/user-attachments/assets/e2c7acac-97db-48ea-98a3-4851d54e45d9)

Pengguna juga dapat mengakses halaman untuk meng-update (mengedit) data produk Sembako:
![Screenshot 2024-12-24 003846](https://github.com/user-attachments/assets/05f96613-9716-4905-8f05-730771a2d5d6)

Jika pengguna berhasil meng-update (mengedit) data produk Sembako maka akan menampilkan event seperti ini:
![Screenshot 2024-12-24 020233](https://github.com/user-attachments/assets/c1a1263d-ee21-4c80-94eb-d644a64f898d)

Dan sebaliknta, jika pengguna gagal meng-update (mengedit) data produk Sembako maka akan menampilkan event seperti ini:
![Screenshot 2024-12-24 020249](https://github.com/user-attachments/assets/ce529de2-5948-4553-90cb-0e71a159d489)

Jika pengguna ingin menghapus data produk Sembako maka akan muncul event konfirmasi seperti ini:
![Screenshot 2024-12-24 020415](https://github.com/user-attachments/assets/f2ee4320-1c44-4911-901f-9922a38ea9dc)
![Screenshot 2024-12-24 020423](https://github.com/user-attachments/assets/27247b84-7516-49ab-8fcf-caf1bb23bd01)

---

# Bagian 2: Pemrograman Server-side
Daftar sembako yang tersedia di toko disajikan dalam tampilan berikut. Pengguna dapat mencari sembako, menambahkan data baru melalui tombol "Tambah Sembako", serta mengedit atau menghapus data dengan konfirmasi sebelum penghapusan. Akses ke halaman ini hanya tersedia bagi pengguna yang telah login untuk memastikan keamanan dan efisiensi pengelolaan data.
Tampilan berikut diperuntukkan bagi admin, di mana admin dapat menyetujui atau menolak pengajuan peminjaman buku. Admin juga dapat menyampaikan pesan kepada pengguna:
![image](https://github.com/user-attachments/assets/4cd81f29-22bc-4beb-825b-8f7d50d31c21)

---

# Bagian 3: Manajemen Basis Data
Struktur basis data terdiri dari dua tabel utama, yaitu tabel login dan tabel sembako:
![Screenshot 2024-12-24 010355](https://github.com/user-attachments/assets/17dd9879-11d8-4cab-8600-11ec98952293)

- Tabel Sembako
  ![Screenshot 2024-12-24 010527](https://github.com/user-attachments/assets/e862dd33-6a03-4b32-b92c-77ec53c0465a)

- Tabel Login
  ![Screenshot 2024-12-24 010536](https://github.com/user-attachments/assets/3ae15ad3-ca5e-46f1-874e-264f5ac052dd)

Selanjutnya, dilakukan proses koneksi untuk mengintegrasikan database dengan script PHP:
![image](https://github.com/user-attachments/assets/9dee0a3f-afd7-435d-91ac-7999ae596153)

Selanjutnya, data dimanipulasi menggunakan operasi CRUD (Create, Read, Update, Delete):
![image](https://github.com/user-attachments/assets/efe95526-e49f-4562-b9e2-a5d6bfaa2ef8)

---

# Bagian 4: Manajemen State
Pengelolaan state dilakukan dengan menggunakan session, seperti yang ditunjukkan pada contoh berikut, di mana saya memanfaatkan **session_start** untuk menyimpan informasi pengguna.
![Screenshot 2024-12-24 011633](https://github.com/user-attachments/assets/edd1c40a-1b0d-4f1d-9f6d-22239ed5b137)

Pengelolaan state dilakukan menggunakan cookie, yang memungkinkan penyimpanan informasi pengguna di sisi klien untuk keperluan pelacakan dan pengelolaan data antar sesi:
![Screenshot 2024-12-24 011933](https://github.com/user-attachments/assets/66705cf0-faf3-40b4-8e8a-d29c4479eed6)
![Screenshot 2024-12-24 012001](https://github.com/user-attachments/assets/c008ca73-465b-4f3c-8878-49071bb7197d)

---

# Bagian Bonus: Hosting Aplikasi Web
Hosting dilakukan menggunakan layanan gratis dari InfinityFree:
![image](https://github.com/user-attachments/assets/25b90ebe-2470-467b-964c-0633d5540c4a)

**Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda? (5%)**
Langkah-langkah untuk Meng-host Aplikasi Web:
1. **Persiapkan File Aplikasi Web:** Pastikan semua file telah diuji secara lokal dan, jika perlu, kompres menjadi satu folder.
2. **Mendaftar di InfinityFree:** Daftarkan akun di www.infinityfree.com dengan menggunakan alamat email yang valid.
3. **Pengaturan Domain/Subdomain:** Pilih domain gratis yang disediakan atau sambungkan dengan domain yang sudah dimiliki.
4. **Unggah File:** Gunakan file manager atau aplikasi FTP seperti FileZilla untuk mengunggah file ke folder htdocs.
5. **Konfigurasi Database:** Buat database melalui cPanel InfinityFree dan sesuaikan pengaturan pada aplikasi.
6. **Pengujian dan Verifikasi:** Uji aplikasi dengan mengakses URL yang diberikan oleh InfinityFree untuk memastikan aplikasi berjalan dengan baik.

**Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda. (5%)**
Alasan saya memilih InfinityFree karena:
- **Gratis**: Ideal untuk proyek kecil, tugas akademik, atau portofolio pribadi yang tidak memerlukan biaya tambahan.
- **Fitur Memadai**: Menawarkan bandwidth tak terbatas dan ruang penyimpanan yang cukup besar untuk mendukung aplikasi.
- **User-Friendly**: Antarmuka cPanel yang sederhana membuatnya mudah digunakan, bahkan untuk pemula.
- **Dukungan PHP dan MySQL**: Mendukung pengembangan aplikasi web dinamis yang memerlukan basis data, seperti yang dibutuhkan oleh aplikasi saya.

**Bagaimana Anda memastikan keamanan aplikasi web yang Anda host: (5%)**
Cara Memastikan Keamanan Aplikasi Web yang Dihost:
- Memastikan setiap formulir di website perpustakaan, seperti formulir login atau pendaftaran, dilengkapi dengan validasi input di sisi klien (menggunakan JavaScript) dan di sisi server (menggunakan PHP).
- Menggunakan fungsi sanitasi, seperti `htmlspecialchars()` di PHP, untuk mencegah serangan XSS (Cross-Site Scripting), terutama saat menampilkan input pengguna di halaman web.

**Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda. (5%)**
Konfigurasi Server:
- Saya menggunakan InfinityFree sebagai penyedia hosting gratis dengan beberapa fitur utama yang saya manfaatkan, seperti: subdomain gratis (http://sembakojayaabadi.wuaze.com/), database MySQL dengan hostname server spesifik, dan dukungan untuk PHP versi terbaru.
- Database MySQL dibuat melalui cPanel InfinityFree, yang sebelumnya telah saya persiapkan di localhost. Konfigurasi koneksi database dilakukan pada setiap file dengan mencantumkan detail hostname, username, password, dan nama database.
- Untuk meningkatkan performa, saya juga mengaktifkan caching guna mempercepat waktu pemuatan aplikasi.

