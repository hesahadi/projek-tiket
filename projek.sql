-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2024 pada 15.46
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `konser`
--

CREATE TABLE `konser` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `b_tamu` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `festival` int(11) NOT NULL,
  `vip` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konser`
--

INSERT INTO `konser` (`id`, `nama`, `b_tamu`, `tempat`, `tanggal`, `waktu`, `jumlah_tiket`, `festival`, `vip`, `foto`) VALUES
(9, 'DEWA 19 Ft VIRZHA', 'Dewa 19 Ft Virzha', 'GOR Lembupeteng Tulungagung', '2024-07-20', '20:00:00', 4000, 30000, 40000, '../uploads/IMG_20240420_052303-1754189321.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `beli_tiket` int(11) DEFAULT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `bayar` varchar(50) DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `tanggal_pemesanan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `username`, `nama`, `beli_tiket`, `posisi`, `bayar`, `total_harga`, `tanggal_pemesanan`) VALUES
(2, 'puwa', 'KING', 2, 'Festival', 'transferbank', 20000.00, '2024-05-21 00:43:42'),
(3, 'haha', 'KING', 8, 'Festival', 'transferbank', 80000.00, '2024-05-21 06:01:44'),
(4, 'haha', 'KING', 10, 'Festival', 'transferbank', 100000.00, '2024-05-21 06:11:56'),
(5, 'Nando', 'SING WITH NAHIDA', 1, 'Festival', 'transferbank', 5000.00, '2024-05-21 11:53:06'),
(6, 'Nando', 'SING WITH NAHIDA', 5, 'VIP', 'transferbank', 35000.00, '2024-05-21 11:53:49'),
(7, 'Nando', 'DEWA 19 Ft VIRZHA', 50, 'Festival', 'transferbank', 1500000.00, '2024-05-21 14:41:18'),
(8, 'Nando', 'DEWA 19 Ft VIRZHA', 50, 'VIP', 'transferbank', 2000000.00, '2024-05-21 14:47:34'),
(9, 'Nando', 'DEWA 19 Ft VIRZHA', 100, 'Festival', 'e-wallet', 3000000.00, '2024-05-21 14:59:11'),
(10, 'Nando', 'DEWA 19 Ft VIRZHA', 300, 'Festival', 'transferbank', 9000000.00, '2024-05-21 15:03:31'),
(11, 'Nando', 'DEWA 19 Ft VIRZHA', 50, 'Festival', 'transferbank', 1500000.00, '2024-05-21 15:14:05'),
(12, 'admin', 'DEWA 19 Ft VIRZHA', 50, 'Festival', 'transferbank', 1500000.00, '2024-05-22 00:32:43'),
(13, 'puwa', 'DEWA 19 Ft VIRZHA', 400, 'Festival', 'Indomart', 12000000.00, '2024-05-22 01:14:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(2, 'kiki', 'risky@email.com', 'risky'),
(3, 'haha', 'haha@gmail.com', 'haha'),
(4, 'hehe', 'hehe@gmail.com', 'hehe'),
(5, 'puwa', 'puwa@gmail.com', 'puwa'),
(6, 'Nando', 'nando@gmail.com', 'nando');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `konser`
--
ALTER TABLE `konser`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `konser`
--
ALTER TABLE `konser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
