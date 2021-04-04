-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2020 pada 09.12
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok_barang` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `kategori_id`, `nama_barang`, `harga`, `stok_barang`) VALUES
(1, 1, 'mie sedap kari ayam', 2000, 72),
(4, 1, 'mie sedap goreng', 1500, 70),
(5, 1, 'mie soto ayam', 2300, 80),
(6, 2, 'minuman ringan', 3000, 77),
(7, 1, 'mie g enak', 4000, 80),
(8, 6, 'nokia x400', 1300, 80),
(9, 9, 'tas kulit', 400000, 69),
(10, 9, 'tas kertas', 300000, 69),
(12, 13, 'Kecap Manis', 2000, 80),
(14, 17, 'SEMEN TIGA RODA', 5000000, 40),
(15, 20, 'TIGA RODA', 150000, 82),
(16, 20, 'HOLCIM', 200000, 70),
(17, 20, 'PADANG', 180000, 57),
(18, 19, 'MAHONI', 400000, 17),
(19, 19, 'JATI', 1000000, 41),
(20, 19, 'MERBAU', 700000, 30),
(21, 18, 'SIKU', 500000, 40),
(22, 18, 'PLAT', 700000, 10),
(23, 18, 'BETON', 1000000, 5),
(24, 16, 'DULUX CATYLAC', 150000, 150),
(25, 16, 'NIPPON PAINT', 200000, 177),
(26, 16, 'AVITEX', 75000, 120);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`kategori_id`, `nama_kategori`) VALUES
(19, 'KAYU'),
(18, 'BESI'),
(20, 'SEMEN'),
(16, 'CAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `operator_id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login` date NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`operator_id`, `nama_lengkap`, `username`, `password`, `last_login`, `level`) VALUES
(4, 'Ali Akbar', 'akbar', '4f033a0a2bf2fe0b68800a3079545cd1', '2016-05-23', 0),
(5, 'Siti Komariyah', 'sitikom', '202cb962ac59075b964b07152d234b70', '2016-05-23', 0),
(6, 'okriiza', 'okriiza', 'd4991725ef1475936fca32d91beea249', '2020-01-22', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `operator_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `tanggal_transaksi`, `operator_id`, `user_id`) VALUES
(64, '2020-02-03', 0, 2),
(63, '2020-02-03', 0, 1),
(62, '2020-02-03', 0, 2),
(61, '2020-02-03', 0, 1),
(60, '2020-02-03', 0, 1),
(59, '2020-01-30', 0, 2),
(58, '2020-01-30', 0, 1),
(57, '2020-01-30', 0, 1),
(56, '2020-01-30', 0, 1),
(53, '2020-01-24', 0, 1),
(54, '2020-01-24', 0, 2),
(55, '2020-01-25', 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `t_detail_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '1= sudah diproses , 0 belum diproses'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`t_detail_id`, `barang_id`, `qty`, `transaksi_id`, `harga`, `status`) VALUES
(96, 25, 8, 58, 200000, '1'),
(95, 19, 5, 58, 1000000, '1'),
(91, 1, 2, 56, 2000, '1'),
(94, 16, 7, 58, 200000, '1'),
(93, 15, 4, 58, 150000, '1'),
(97, 19, 3, 59, 1000000, '1'),
(98, 15, 10, 59, 150000, '1'),
(99, 23, 20, 59, 1000000, '1'),
(100, 25, 15, 59, 200000, '1'),
(102, 19, 1, 60, 1000000, '1'),
(105, 15, 1, 62, 150000, '1'),
(106, 15, 3, 63, 150000, '1'),
(107, 16, 3, 63, 200000, '1'),
(109, 17, 3, 64, 180000, '1'),
(108, 18, 3, 64, 400000, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(11) NOT NULL COMMENT '1.admin 2.kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Rendi Okriza Putra', 'Bandung', 1),
(2, 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'bambang', 'jakarta', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`operator_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`t_detail_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `operator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `t_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
