-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2019 pada 11.22
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `apps`
--

CREATE TABLE `apps` (
  `app_id` int(11) NOT NULL,
  `appname` varchar(255) NOT NULL,
  `by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `apps`
--

INSERT INTO `apps` (`app_id`, `appname`, `by`, `created_at`) VALUES
(1, 'Apotek Rahani Husada', 'Kelompok 6 FTIk Jurusan TI Universitas Semarang', '2019-11-18 05:39:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `kategori_id` int(11) NOT NULL,
  `kategoriname` varchar(255) NOT NULL,
  `cobat` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`kategori_id`, `kategoriname`, `cobat`, `created_at`) VALUES
(1, 'Obat Sakit Demam', 2, '2019-11-20 12:31:17'),
(2, 'Obat Kuat', 1, '2019-11-20 12:32:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obats`
--

CREATE TABLE `obats` (
  `obat_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `obatname` varchar(255) NOT NULL,
  `desc` text,
  `biji` varchar(255) DEFAULT NULL,
  `kaplet` varchar(255) DEFAULT NULL,
  `box` varchar(255) DEFAULT NULL,
  `botol` varchar(255) DEFAULT NULL,
  `dus` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obats`
--

INSERT INTO `obats` (`obat_id`, `kategori_id`, `obatname`, `desc`, `biji`, `kaplet`, `box`, `botol`, `dus`, `created_at`) VALUES
(4, 1, 'Obh Kombi Plus', 'Obat batuk berdahak', '', '', '', '10000', '98000', '2019-11-21 07:16:33'),
(5, 1, 'Inzana', 'Penurun panas', '500', '5500', '50000', '', '200000', '2019-11-21 07:17:27'),
(6, 2, 'Pegelinu Air Mancur', 'Nyeri badan', '7000', '55000', '', '', '300000', '2019-11-21 07:18:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `pengeluaran_id` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `keperluan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `process`
--

CREATE TABLE `process` (
  `process_id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `saldo_id` int(11) NOT NULL,
  `saldos` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saldo`
--

INSERT INTO `saldo` (`saldo_id`, `saldos`, `created_at`) VALUES
(1, '206600', '2019-11-25 07:04:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `solds`
--

CREATE TABLE `solds` (
  `sold_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaction_id` varchar(15) NOT NULL,
  `nota` varchar(255) NOT NULL,
  `money` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaction_id`, `nota`, `money`, `tanggal`, `created_at`) VALUES
('2511190001', 'ARH/2511190001/KSR/ANDIKA WAHYU S', '21500', '2019-11-25 07:13:25', '2019-11-25'),
('2511190002', 'ARH/2511190002/KSR/ANDIKA WAHYU S', '93100', '2019-11-25 07:15:54', '2019-11-25'),
('2611190001', 'ARH/2611190001/KSR/ANDIKA WAHYU S', '10000', '2019-11-26 03:57:04', '2019-11-26'),
('2611190002', 'ARH/2611190002/KSR/OKTA', '12000', '2019-11-26 09:36:57', '2019-11-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `address` text,
  `phone` varchar(15) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `address`, `phone`, `avatar`, `created_at`) VALUES
(1, 'Andika Wahyu S', 'emailadmin@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Admin', 'Purwodadi JawaTengah', '087999444888', 'yutaka-sepatu-kets-sneakers-1491822408-95213471-45d071a5607243691c5ae116dc03c93c.jpg', '2019-11-20 07:38:22'),
(2, 'Okta', 'emailpegawai@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Pegawai', NULL, NULL, NULL, '2019-11-20 07:38:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`app_id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`obat_id`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`pengeluaran_id`);

--
-- Indeks untuk tabel `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`process_id`);

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`saldo_id`);

--
-- Indeks untuk tabel `solds`
--
ALTER TABLE `solds`
  ADD PRIMARY KEY (`sold_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `apps`
--
ALTER TABLE `apps`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `obats`
--
ALTER TABLE `obats`
  MODIFY `obat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `pengeluaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `process`
--
ALTER TABLE `process`
  MODIFY `process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `saldo`
--
ALTER TABLE `saldo`
  MODIFY `saldo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `solds`
--
ALTER TABLE `solds`
  MODIFY `sold_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
