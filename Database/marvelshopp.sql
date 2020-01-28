-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Mei 2017 pada 15.42
-- Versi Server: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marvelshopp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_produk`, `qty`, `subtotal`) VALUES
(303, 67, 1, 190000),
(304, 74, 1, 175000),
(304, 71, 1, 180000),
(304, 78, 1, 195000),
(305, 86, 1, 195000),
(306, 67, 1, 190000),
(307, 67, 2, 380000),
(308, 68, 1, 195000),
(309, 80, 1, 185000),
(310, 82, 5, 900000),
(314, 78, 1, 195000),
(314, 86, 1, 195000),
(314, 83, 1, 190000),
(315, 78, 2, 390000),
(316, 83, 1, 190000),
(316, 86, 1, 195000),
(317, 80, 1, 185000),
(317, 81, 1, 195000),
(317, 67, 2, 380000),
(318, 68, 1, 195000),
(319, 79, 1, 180000),
(320, 81, 1, 195000),
(320, 79, 1, 180000),
(320, 78, 2, 390000),
(321, 86, 1, 195000),
(322, 80, 1, 185000),
(322, 79, 2, 360000),
(323, 80, 1, 185000),
(323, 79, 1, 180000),
(324, 75, 1, 180000),
(324, 77, 1, 195000),
(324, 69, 1, 200000),
(335, 78, 1, 195000),
(335, 80, 1, 185000),
(335, 82, 1, 180000),
(336, 79, 1, 180000),
(337, 72, 1, 175000),
(338, 83, 1, 190000),
(339, 76, 1, 185000),
(340, 73, 1, 175000),
(340, 78, 1, 195000),
(341, 76, 1, 185000),
(341, 84, 2, 340000),
(342, 82, 1, 180000),
(343, 72, 1, 175000),
(344, 80, 1, 185000),
(344, 79, 2, 360000),
(345, 67, 1, 190000),
(346, 67, 1, 190000),
(347, 67, 1, 190000),
(348, 67, 3, 570000),
(349, 82, 1, 180000),
(349, 67, 2, 380000),
(350, 83, 1, 190000),
(351, 82, 1, 180000),
(303, 67, 1, 190000),
(304, 74, 1, 175000),
(304, 71, 1, 180000),
(304, 78, 1, 195000),
(305, 86, 1, 195000),
(306, 67, 1, 190000),
(307, 67, 2, 380000),
(308, 68, 1, 195000),
(309, 80, 1, 185000),
(310, 82, 5, 900000),
(314, 78, 1, 195000),
(314, 86, 1, 195000),
(314, 83, 1, 190000),
(315, 78, 2, 390000),
(316, 83, 1, 190000),
(316, 86, 1, 195000),
(317, 80, 1, 185000),
(317, 81, 1, 195000),
(317, 67, 2, 380000),
(318, 68, 1, 195000),
(319, 79, 1, 180000),
(320, 81, 1, 195000),
(320, 79, 1, 180000),
(320, 78, 2, 390000),
(321, 86, 1, 195000),
(322, 80, 1, 185000),
(322, 79, 2, 360000),
(323, 80, 1, 185000),
(323, 79, 1, 180000),
(324, 75, 1, 180000),
(324, 77, 1, 195000),
(324, 69, 1, 200000),
(335, 78, 1, 195000),
(335, 80, 1, 185000),
(335, 82, 1, 180000),
(336, 79, 1, 180000),
(337, 72, 1, 175000),
(338, 83, 1, 190000),
(339, 76, 1, 185000),
(340, 73, 1, 175000),
(340, 78, 1, 195000),
(341, 76, 1, 185000),
(341, 84, 2, 340000),
(342, 82, 1, 180000),
(343, 72, 1, 175000),
(344, 80, 1, 185000),
(344, 79, 2, 360000),
(345, 67, 1, 190000),
(346, 67, 1, 190000),
(347, 67, 1, 190000),
(348, 67, 3, 570000),
(349, 82, 1, 180000),
(349, 67, 2, 380000),
(350, 83, 1, 190000),
(351, 82, 1, 180000),
(1, 86, 3, 585000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(40) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_transaksi`, `tanggal`, `nama`, `no_rekening`, `bank`, `jumlah`) VALUES
(1, '2017-05-01', 'Dane', '1', 'MARVEL SYARIAH', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `telepon`, `email`) VALUES
(1, 'dane', 'dipo', '0812', 'dane@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `harga` double NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `ukuran`, `harga`, `gambar`, `id_merk`, `keterangan`, `stok`) VALUES
(86, 'Spiderman Bag', '38,39,40,41,42,43', 195000, 'asr.jpg', 1, 'bahan kanvas, warna dasar biru merah bercorak putih', 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `e_mail` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`e_mail`, `nama`, `kota`, `pesan`) VALUES
('ical@gmail.com', 'Ical', 'Medan', 'MANTAP JOS GANDOS\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `detail` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `pengiriman` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `id_pelanggan`, `total`, `detail`, `status`, `pengiriman`) VALUES
(1, '2017-05-11', 1, 585000, '45', 'SUDAH BAYAR', 'Belum dikirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `fk_item_penjualan_penjualan1_idx` (`id_transaksi`),
  ADD KEY `fk_item_pembelian_product1_idx` (`id_produk`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`no_rekening`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`e_mail`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_penjualan_pelanggan1_idx` (`id_pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1252;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
