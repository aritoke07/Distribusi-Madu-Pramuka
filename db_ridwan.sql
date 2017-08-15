-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2017 at 08:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ridwan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daftarhargaitem`
--

CREATE TABLE `tbl_daftarhargaitem` (
  `id_daftarhargaitem` int(4) NOT NULL,
  `harga` int(5) NOT NULL,
  `id_madu` int(4) NOT NULL,
  `id_kemasan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daftarhargaitem`
--

INSERT INTO `tbl_daftarhargaitem` (`id_daftarhargaitem`, `harga`, `id_madu`, `id_kemasan`) VALUES
(1, 430000, 4, 1),
(4, 155000, 4, 1),
(5, 9000, 4, 3),
(6, 85000, 4, 3),
(7, 110000, 4, 5),
(8, 290000, 4, 1),
(9, 115000, 5, 2),
(10, 67500, 5, 3),
(11, 190000, 3, 2),
(12, 105000, 3, 3),
(13, 70000, 3, 8),
(14, 435000, 2, 1),
(15, 160000, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gudang`
--

CREATE TABLE `tbl_gudang` (
  `id_gudang` int(4) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `telp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gudang`
--

INSERT INTO `tbl_gudang` (`id_gudang`, `nama`, `alamat`, `telp`) VALUES
(1, 'Gudang Jakarta', 'Jakarta', 211234567),
(2, 'Gudang Bandung', 'Bandung', 211234568),
(3, 'Gudang Cirebon', 'Cirebon', 211234569);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kedai`
--

CREATE TABLE `tbl_kedai` (
  `id_kedai` int(4) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `telp` int(12) NOT NULL,
  `id_kota` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kedai`
--

INSERT INTO `tbl_kedai` (`id_kedai`, `nama`, `alamat`, `telp`, `id_kota`) VALUES
(1, 'Kedai Jakarta', 'Jakarta', 211234567, 1),
(2, 'Kedai Bandung', 'Bandung', 211234568, 2),
(3, 'Kedai Cirebon', 'Cirebon', 211234569, 4),
(4, 'Kedai Yogyakarta', 'Jl. Kedaon', 2147483647, 5),
(5, 'Kedai Surabaya', 'Jl. Pahlawan', 311782123, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kemasan`
--

CREATE TABLE `tbl_kemasan` (
  `id_kemasan` int(4) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kemasan`
--

INSERT INTO `tbl_kemasan` (`id_kemasan`, `nama`) VALUES
(1, '2000 ml'),
(2, '650 ml'),
(3, '350 ml'),
(4, '300 gr'),
(5, '400 gr'),
(6, 'Curah'),
(7, '350 ml'),
(8, '200 gr'),
(9, '/Kg'),
(10, '100 gr'),
(11, '50 Btr'),
(12, '1/2 kg'),
(13, '1/4 kg'),
(14, '25 gr'),
(15, '60 btr'),
(16, '10 ml');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota`
--

CREATE TABLE `tbl_kota` (
  `id_kota` int(4) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kota`
--

INSERT INTO `tbl_kota` (`id_kota`, `nama`) VALUES
(1, 'Jakarta'),
(2, 'Bandung'),
(3, 'Surabaya'),
(4, 'Cirebon'),
(5, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_madu`
--

CREATE TABLE `tbl_madu` (
  `id_madu` int(4) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_madu`
--

INSERT INTO `tbl_madu` (`id_madu`, `nama`, `gambar`, `keterangan`) VALUES
(2, 'Madu Rambutan', 'rambutan (2).jpg', '<p>Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Memperlancar buang air kecil<br>3    Memperlancar fungsi ginjal<br>4    Bermanfaat untuk balita<br>5    Meningkatkan fungsi otak</p>'),
(3, 'Madu Klengkeng Sonokelin', 'KLENGKENG (2).jpg', '<p>    Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Memperlancar fungsi ginjal<br>3    Kecerdasan otak<br>4    Penderita luka bakar<br>5    Memperlancar buang air kecil<br>6    Membantu penyembuhan luka operasi</p>'),
(4, 'Madu Kapuk', 'kapuk (1).jpg', '<p>    Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Membantu mengobati sakit maag<br>3    Penambah nafsu makan<br>4    Menyehatkan liver<br>5    Menghilangkan bau mulut</p>'),
(5, 'Madu Karet', 'karet (1).jpg', '<p>    Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Meningkatkan fungsi otak<br>3    Mengobati luka bakar<br>4    Mengatasi keputihan<br>5    Meningkatkan vitalitas pria</p>'),
(6, 'Madu Apel', 'apel.jpg', '<p>    Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Mengobati rasa mual<br>3    Memperlancar sirkulasi darah<br>4    Memperkuat kandungan ibu hamil<br>5    Mengatasi susah tidur</p>'),
(7, 'Madu Cengkeh', 'cengkeh.jpg', '<p>    Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Membantu mencegah timbulnya<br>3    Membantu mempercepat penyembuhan luka bakar<br>4    Mengobati rasa mual<br>5    Memperkuat kandungan ibu hamil</p>'),
(8, 'Madu Propolis', 'propolis (1).JPG', '<p>    Bermanfaat untuk :<br>1    Dapat mencegah penuaan dini<br>2    Sebagai anti bakteri dan anti virus<br>3    Dapat menyembuhkan peradangan<br>4    Dapat meningkatkan imunitas tubuh<br>5    Memberikan perlindungan dari paparan radiasi</p>'),
(9, 'Madu Jambu Mete', 'mete.jpg', '<p>    Bermanfaat untuk :<br>1     Meningkatkan daya tahan tubuh<br>2    Penderita darah tinggi<br>3    Mengatasi susah tidur<br>4    Penderita reumatik<br>5    Kecerdasan otak<br>6    Penderita luka bakar</p>'),
(10, 'Madu Mahoni', 'mahoni (1).jpg', '<p>    Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Penderita malaria<br>3    Mengurangi keputihan<br>4    Kecerdasan otak<br>5    Penderita luka bakar<br>6    Penderita asam urat</p>'),
(11, 'Madu Durian', 'durian.jpg', '<p>    Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Menghilangkan rasa mual<br>3    Kecerdasan otak<br>4    Mengatasi susah tidur</p>'),
(12, 'Madu Kopi', 'kopi.jpg', '<p>    Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Mengatasi susah tidur<br>3    Kecerdasan otak<br>4    Penderita luka bakar</p>'),
(13, 'Madu Mangga', 'mangga (1).jpg', '<p>    Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Menghilangkan rasa mual<br>3    Kecerdasan otak<br>4    Penderita luka bakar<br>5    Memperkuat kandungan ibu hamil</p>'),
(14, 'Madu Kaliandra', 'kaliandra (1).jpg', '<p>    Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Meningkatkan hormon<br>3    Membantu saluran pencernaan<br>4    Penderita darah tinggi<br>5    Memperbaiki metabolisme tubuh<br>6    Mengatasi susah tidur<br>7    Penderita luka bakar</p>'),
(15, 'Royal Jelly', 'royal jelly (1).jpg', '<p>    Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Meningkatkan hormon<br>3    Menyuburkan peranakan<br>4    Penderita darah tinggi dan darah rendah<br>5    Memperlancar buang air kecil<br>6    Memperlancar fungsi ginjal<br>7    Penderita sakit pinggang<br>8    Membantu penyembuhan luka pasca operasi<br>9    Mengendurkan sel syaraf yang tegang<br>10    Memperbaiki sel tubuh yang rusak<br>11    Menghilangkan rasa letih<br>12    Penderita diabetes<br>13    Membantu menurunkan kadar kolesterol dalam tubuh</p>'),
(16, 'Bee Pollen (Tepung Sari B', 'bee polen (3).jpg', '<p>    Bermanfaat untuk :<br>1    Meningkatkan daya tahan tubuh<br>2    Memperlambat proses penuaan<br>3    Menghaluskan kulit<br>4    Membantu menurunkan kadar kolesterol dalam tubuh<br>5    Memperlancar saluran pencernaan<br>6    Penderita asma<br>7    Penderita diabetes</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `kode_order` varchar(15) NOT NULL,
  `total_pembayaran` int(8) NOT NULL,
  `tanggal_order` date NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `id_pelanggan` int(4) NOT NULL,
  `id_kedai` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`kode_order`, `total_pembayaran`, `tanggal_order`, `tanggal_penerimaan`, `status`, `bukti_transfer`, `id_pelanggan`, `id_kedai`) VALUES
('ODR/MAD/1', 260000, '2017-07-31', '2017-07-31', 3, 'Produk-Madu-Murni-Original (6).jpg', 6, 1),
('ODR/MAD/2', 730000, '2017-07-31', '2017-07-31', 3, 'images (3).png', 6, 2),
('ODR/MAD/3', 670000, '2017-07-31', '2017-07-31', 3, 'Produk-Madu-Murni-Original (7).jpg', 7, 1),
('ODR/MAD/4', 640000, '2017-07-31', '2017-07-31', 3, '5-Cara-Menggunakan-Madu-untuk-Perawatan-Wajah-Beauty-Journal (1).jpg', 7, 2),
('ODR/MAD/5', 510000, '2017-08-06', '2017-08-09', 3, 'Desert.jpg', 7, 1),
('ODR/MAD/6', 350000, '2017-08-09', '2017-08-09', 3, 'Chrysanthemum.jpg', 6, 2),
('ODR/MAD/7', 2175000, '2017-08-09', '2017-08-09', 3, 'Koala.jpg', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `id_orderitem` int(4) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `kode_order` varchar(15) NOT NULL,
  `id_stok` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`id_orderitem`, `jumlah`, `kode_order`, `id_stok`) VALUES
(18, 1, 'ODR/MAD/1', 3),
(19, 1, 'ODR/MAD/1', 5),
(20, 3, 'ODR/MAD/2', 3),
(21, 1, 'ODR/MAD/2', 2),
(22, 1, 'ODR/MAD/3', 3),
(23, 3, 'ODR/MAD/3', 2),
(24, 4, 'ODR/MAD/4', 2),
(25, 1, 'ODR/MAD/5', 3),
(26, 2, 'ODR/MAD/5', 2),
(27, 1, 'ODR/MAD/6', 3),
(28, 1, 'ODR/MAD/6', 2),
(29, 5, 'ODR/MAD/7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text,
  `telp` int(12) DEFAULT NULL,
  `handphone` int(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `tanggal_bergabung` date NOT NULL,
  `tanggal_keluar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `username`, `password`, `nama`, `alamat`, `telp`, `handphone`, `email`, `status`, `tanggal_bergabung`, `tanggal_keluar`) VALUES
(1, 'khalid', '46f94c8de14fb36680850768ff1b7f2a', 'khalid', 'Condet', 2113234234, 0, 'khalid@gmail.com', '1', '2017-07-27', '2017-07-28'),
(2, 'syakur', '4297f44b13955235245b2497399d7a93', 'abdul syakur', NULL, NULL, 0, 'syakur@gmail.com', '1', '2017-07-28', NULL),
(6, 'hamid', '4297f44b13955235245b2497399d7a93', 'Hamid Sobari', NULL, NULL, 0, 'hamid@gmail.com', '1', '2017-07-29', NULL),
(7, 'anggi', '4297f44b13955235245b2497399d7a93', 'Anggi Mulyadi', NULL, NULL, 0, 'anggi@gmail.com', '1', '2017-07-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penerimaan`
--

CREATE TABLE `tbl_penerimaan` (
  `kode_penerimaan` varchar(15) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `kode_pengiriman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `kode_pengembalian` varchar(15) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `tanggal_resend` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `catatan` text,
  `kode_order` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`kode_pengembalian`, `tanggal_pengembalian`, `tanggal_resend`, `status`, `catatan`, `kode_order`) VALUES
('RTR/MAD/1', '2017-08-07', '2017-08-07', 3, 'ada dua madu rambutan yang rusak', 'ODR/MAD/5'),
('RTR/MAD/2', '2017-08-09', '2017-08-09', 3, 'madu klengke sonokeling pecah', 'ODR/MAD/6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengembalian_item`
--

CREATE TABLE `tbl_pengembalian_item` (
  `id_pengembalianitem` int(4) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `id_pengirimanitem` int(4) NOT NULL,
  `kode_pengembalian` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengembalian_item`
--

INSERT INTO `tbl_pengembalian_item` (`id_pengembalianitem`, `jumlah`, `id_pengirimanitem`, `kode_pengembalian`) VALUES
(1, 2, 13, 'RTR/MAD/1'),
(2, 1, 14, 'RTR/MAD/2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tingkat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`username`, `password`, `nama`, `tingkat`) VALUES
('admin', '4297f44b13955235245b2497399d7a93', 'super administrator', 14),
('dyah', '4297f44b13955235245b2497399d7a93', 'dyah mardiana', 3),
('ridwan', '4297f44b13955235245b2497399d7a93', 'ridwan wahyu', 1),
('syakur', '4297f44b13955235245b2497399d7a93', 'abdul syakur', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna_kedai`
--

CREATE TABLE `tbl_pengguna_kedai` (
  `id_penggunakedai` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `id_kedai` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna_kedai`
--

INSERT INTO `tbl_pengguna_kedai` (`id_penggunakedai`, `username`, `id_kedai`) VALUES
(2, 'syakur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiriman`
--

CREATE TABLE `tbl_pengiriman` (
  `kode_pengiriman` varchar(15) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `catatan` text,
  `id_gudang` int(4) NOT NULL,
  `kode_order` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengiriman`
--

INSERT INTO `tbl_pengiriman` (`kode_pengiriman`, `tanggal_pengiriman`, `status`, `catatan`, `id_gudang`, `kode_order`) VALUES
('PGN/MAD/1', '2017-07-31', 2, NULL, 1, 'ODR/MAD/1'),
('PGN/MAD/2', '2017-07-31', 2, 'ada yang rusak', 2, 'ODR/MAD/2'),
('PGN/MAD/3', '2017-07-31', 2, '', 1, 'ODR/MAD/3'),
('PGN/MAD/4', '2017-07-31', 2, 'ada yang rusak', 2, 'ODR/MAD/4'),
('PGN/MAD/5', '2017-08-06', 2, 'ada dua madu rambutan yang rusak', 1, 'ODR/MAD/5'),
('PGN/MAD/6', '2017-08-09', 2, 'madu klengke sonokeling pecah', 1, 'ODR/MAD/6'),
('PGN/MAD/7', '2017-08-10', 2, '', 1, 'ODR/MAD/7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiriman_item`
--

CREATE TABLE `tbl_pengiriman_item` (
  `id_pengirimanitem` int(4) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `kode_pengiriman` varchar(15) NOT NULL,
  `id_stok` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengiriman_item`
--

INSERT INTO `tbl_pengiriman_item` (`id_pengirimanitem`, `jumlah`, `kode_pengiriman`, `id_stok`) VALUES
(4, 1, 'PGN/MAD/1', 2),
(5, 1, 'PGN/MAD/1', 5),
(6, 3, 'PGN/MAD/2', 3),
(7, 1, 'PGN/MAD/2', 2),
(8, 1, 'PGN/MAD/3', 3),
(9, 3, 'PGN/MAD/3', 2),
(10, 4, 'PGN/MAD/4', 2),
(12, 1, 'PGN/MAD/5', 3),
(13, 2, 'PGN/MAD/5', 2),
(14, 1, 'PGN/MAD/6', 3),
(15, 1, 'PGN/MAD/6', 2),
(16, 5, 'PGN/MAD/7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok`
--

CREATE TABLE `tbl_stok` (
  `id_stok` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `id_daftarhargaitem` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stok`
--

INSERT INTO `tbl_stok` (`id_stok`, `status`, `jumlah`, `id_daftarhargaitem`) VALUES
(1, 1, 195, 14),
(2, 1, 999997, 15),
(3, 1, 99998, 11),
(4, 1, 2000000, 12),
(5, 1, 100000, 13),
(6, 1, 100000, 8),
(7, 1, 1000000, 6),
(8, 1, 2000000, 7),
(9, 1, 100000, 9),
(10, 1, 100000, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_daftarhargaitem`
--
ALTER TABLE `tbl_daftarhargaitem`
  ADD PRIMARY KEY (`id_daftarhargaitem`),
  ADD KEY `id_madu` (`id_madu`),
  ADD KEY `id_kemasan` (`id_kemasan`);

--
-- Indexes for table `tbl_gudang`
--
ALTER TABLE `tbl_gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `tbl_kedai`
--
ALTER TABLE `tbl_kedai`
  ADD PRIMARY KEY (`id_kedai`),
  ADD UNIQUE KEY `id_kota` (`id_kota`);

--
-- Indexes for table `tbl_kemasan`
--
ALTER TABLE `tbl_kemasan`
  ADD PRIMARY KEY (`id_kemasan`);

--
-- Indexes for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `tbl_madu`
--
ALTER TABLE `tbl_madu`
  ADD PRIMARY KEY (`id_madu`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`kode_order`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_kedai` (`id_kedai`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`id_orderitem`),
  ADD KEY `kode_order` (`kode_order`),
  ADD KEY `id_madu` (`id_stok`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_penerimaan`
--
ALTER TABLE `tbl_penerimaan`
  ADD PRIMARY KEY (`kode_penerimaan`),
  ADD UNIQUE KEY `kode_pengiriman` (`kode_pengiriman`);

--
-- Indexes for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`kode_pengembalian`),
  ADD KEY `kode_order` (`kode_order`);

--
-- Indexes for table `tbl_pengembalian_item`
--
ALTER TABLE `tbl_pengembalian_item`
  ADD PRIMARY KEY (`id_pengembalianitem`),
  ADD KEY `id_pengirimanitem` (`id_pengirimanitem`),
  ADD KEY `kode_pengembalian` (`kode_pengembalian`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_pengguna_kedai`
--
ALTER TABLE `tbl_pengguna_kedai`
  ADD PRIMARY KEY (`id_penggunakedai`),
  ADD UNIQUE KEY `username` (`username`,`id_kedai`),
  ADD KEY `id_kedai` (`id_kedai`);

--
-- Indexes for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD PRIMARY KEY (`kode_pengiriman`),
  ADD KEY `id_gudang` (`id_gudang`),
  ADD KEY `kode_order` (`kode_order`);

--
-- Indexes for table `tbl_pengiriman_item`
--
ALTER TABLE `tbl_pengiriman_item`
  ADD PRIMARY KEY (`id_pengirimanitem`),
  ADD KEY `kode_pengiriman` (`kode_pengiriman`),
  ADD KEY `id_stok` (`id_stok`);

--
-- Indexes for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD UNIQUE KEY `id_daftarhargaitem` (`id_daftarhargaitem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_daftarhargaitem`
--
ALTER TABLE `tbl_daftarhargaitem`
  MODIFY `id_daftarhargaitem` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_gudang`
--
ALTER TABLE `tbl_gudang`
  MODIFY `id_gudang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_kedai`
--
ALTER TABLE `tbl_kedai`
  MODIFY `id_kedai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_kemasan`
--
ALTER TABLE `tbl_kemasan`
  MODIFY `id_kemasan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_kota`
--
ALTER TABLE `tbl_kota`
  MODIFY `id_kota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_madu`
--
ALTER TABLE `tbl_madu`
  MODIFY `id_madu` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `id_orderitem` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_pengembalian_item`
--
ALTER TABLE `tbl_pengembalian_item`
  MODIFY `id_pengembalianitem` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pengguna_kedai`
--
ALTER TABLE `tbl_pengguna_kedai`
  MODIFY `id_penggunakedai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pengiriman_item`
--
ALTER TABLE `tbl_pengiriman_item`
  MODIFY `id_pengirimanitem` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  MODIFY `id_stok` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
