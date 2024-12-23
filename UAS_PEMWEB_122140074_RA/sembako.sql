-- Membuat database 'sembako' jika belum ada
CREATE DATABASE sembako;

-- Memilih database 'sembako' untuk digunakan
USE sembako;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2024 pada 07.48
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sembako`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sembako`
--

CREATE TABLE `sembako` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,        -- Changed from `jumlah`
  `harga` int(11) NOT NULL        -- Changed from `jenis`
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sembako`
--

INSERT INTO `sembako` (`id`, `kode`, `nama`, `stok`, `harga`) VALUES
(1, 'B001', 'sembako A', 10, 10000),   -- Changed `jumlah` to `stok` and `jenis` to `harga`
(2, 'B002', 'sembako B', 20, 20000),   -- Same here for other entries
(3, 'A1P0', 'Gula', 12, 5000),
(4, 'A1P0', 'Gula', 12, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `nomor_hp`) VALUES
(1, 'user1', '$2y$10$examplehashedpassword1', 'user1@example.com', '08123456789'),
(2, 'user2', '$2y$10$examplehashedpassword2', 'user2@example.com', '08123456788'),
(3, 'admin', '$2y$10$AifchSDMMCyqKR5P6zZk9eiWdWaIbSYr4lSk8rlJ9k61rt.qyT1N2', 'muhammad.122140074@student.itera.ac.id', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `sembako`
--
ALTER TABLE `sembako`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `sembako`
--
ALTER TABLE `sembako`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
