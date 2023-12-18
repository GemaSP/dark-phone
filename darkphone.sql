-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 06:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darkphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id_alamat` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id_alamat`, `id`, `nama`, `alamat`, `no_telp`, `state`) VALUES
(9, 1, 'Gema Santosa Putra', 'Jalan CIherang hegar sari, No.4, RT.05, RW.08, Ciherang, Dramaga, Bogor, 16680', '085811000360', 0),
(12, 2, 'Gema Santosa Putra', 'Jalan Ciherang Hegar Sari, No.9, RT.05, RW.08, Dramaga, Bogor, Jabar, 16680', '085811000360', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gadget`
--

CREATE TABLE `gadget` (
  `id_gadget` int(11) NOT NULL,
  `nama_gadget` varchar(128) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `tahun_rilis` year(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(25) NOT NULL,
  `img` varchar(256) DEFAULT 'book-default-cover.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gadget`
--

INSERT INTO `gadget` (`id_gadget`, `nama_gadget`, `id_merek`, `tahun_rilis`, `stok`, `harga`, `img`) VALUES
(1, 'Galaxy S20', 1, '2020', 10, 12, 'img1701519935.jpg'),
(2, 'Galaxy A22', 1, '2021', 5, 3000000, 'img1701569248.jpg'),
(3, 'Galaxy A04', 1, '2022', -2, 1500000, 'img1701569269.jpg'),
(4, 'Iphone 13 Pro Max', 5, '2023', 10, 10000000, 'img1701569373.jpg'),
(5, 'Iphone 20 Pro Max', 5, '2023', 1, 100000000, 'img1701521881.jpg'),
(6, 'Iphone 100 Pro Max', 5, '2023', 4, 25000000, 'img1701521899.jpg'),
(7, 'Redmi Note 12 Pro', 2, '2023', 5, 35000000, 'img1701569681.jpg'),
(8, 'Mi 13T', 2, '2023', 0, 5500000, 'img1701569829.jpg'),
(9, 'Poco F5', 2, '2023', 8, 5500000, 'img1701524813.jpg'),
(10, 'aadad', 7, '2023', 0, 20000000, 'img1701524834.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `id_gadget` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_pemesanan` char(5) NOT NULL,
  `komentar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` int(5) NOT NULL,
  `nama_merek` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `nama_merek`) VALUES
(1, 'Samsung'),
(2, 'Xiaomi'),
(3, 'Vivo'),
(4, 'Oppo'),
(5, 'Apple'),
(6, 'Realme'),
(7, 'Infinix');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `notifikasi` varchar(256) NOT NULL,
  `waktu` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` char(5) NOT NULL,
  `id` int(11) NOT NULL,
  `id_gadget` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `tanggal_pesan` int(11) NOT NULL,
  `tanggal_kirim` int(11) NOT NULL,
  `tanggal_diterima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id`, `id_gadget`, `qty`, `total_harga`, `status`, `id_alamat`, `tanggal_pesan`, `tanggal_kirim`, `tanggal_diterima`) VALUES
('PE001', 1, 3, 1, 1500000, 4, 9, 1702817498, 1702817960, 1702817988),
('PE002', 1, 9, 1, 5500000, 2, 9, 1702817498, 0, 1702817988),
('PE003', 1, 5, 1, 100000000, 2, 9, 1702817499, 0, 1702817988),
('PE004', 1, 6, 1, 25000000, 5, 9, 1702817499, 0, 1702817988),
('PE005', 1, 3, 1, 1500000, 2, 9, 1702821106, 0, 0),
('PE006', 1, 6, 1, 25000000, 2, 9, 1702861958, 0, 0),
('PE007', 1, 5, 1, 100000000, 2, 9, 1702861958, 0, 0),
('PE008', 1, 2, 2, 6000000, 2, 9, 1702861958, 0, 0),
('PE009', 2, 5, 1, 100000000, 2, 11, 1702875559, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pemesanan` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pemesanan`) VALUES
(1, 'PE001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`) VALUES
(1, 'Gema Santosa Put', 'gesap02@gmail.com', 'pro1702870012.jpg', '$2y$10$m9Q6aWhAgnm/egOBq045UeOGYzxj27AijdoTF6X7doLgKiKUHBFxG', 1, 1, 1702778178),
(2, 'ge', 'gema@gmail.com', 'pro1702870386.jpg', '$2y$10$4dYj/RNKt5TNJ1I8MlToB.FPRUpPzcr4ho5S3emwXQF9GDxekFkle', 2, 1, 1702868525);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` int(128) NOT NULL,
  `token` int(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(2, 0, 0, 1702868525);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `gadget`
--
ALTER TABLE `gadget`
  ADD PRIMARY KEY (`id_gadget`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gadget`
--
ALTER TABLE `gadget`
  MODIFY `id_gadget` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
