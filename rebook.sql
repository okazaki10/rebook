-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 04:04 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_penjual` int(255) NOT NULL,
  `chat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `id_user`, `id_penjual`, `chat`, `tanggal`) VALUES
(5, 15, 12, 'sadfasdasdasdsad', '2020-05-26'),
(6, 15, 12, 'sadasdasd', '2020-05-18'),
(7, 14, 13, 'sadasdsdaasd', '2020-05-13'),
(8, 14, 13, 'dsafadsdsad', '2020-05-06'),
(9, 12, 15, 'sdasdasdsdasdasdasdsd', '2020-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `detail_buku`
--

CREATE TABLE `detail_buku` (
  `id` int(255) NOT NULL,
  `id_penjual` int(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_buku`
--

INSERT INTO `detail_buku` (`id`, `id_penjual`, `judul`, `tanggal_terbit`, `penulis`, `harga`, `gambar`) VALUES
(15, 13, 'final fantasy', '2112-12-21', '21312321', 10000, 'storage/detail_buku/L1Z6nPEks2uCsvNzlxsJsYxhVajNKM15jewIgmYg.png'),
(18, 12, 'sagiri lonte', '1231-03-12', '21312', 50000, 'storage/detail_buku/S6BIZiooPqhIacnxIhKiJvKUtNmHBl0u0VYSkkJV.bmp'),
(19, 12, 'sword art online', '2322-03-21', '213122', 10000, 'storage/detail_buku/nTVQcOufuzqmwfq34LLh2iTnjdw9sPpVmGZQxUlv.bmp');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_belanja`
--

CREATE TABLE `keranjang_belanja` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_penjual` int(255) NOT NULL,
  `id_list_buku` int(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `id_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang_belanja`
--

INSERT INTO `keranjang_belanja` (`id`, `id_user`, `id_penjual`, `id_list_buku`, `jumlah`, `harga`, `id_status`) VALUES
(8, 14, 12, 9, 5, 250000, 5),
(9, 14, 12, 10, 3, 30000, 5),
(10, 14, 12, 10, 3, 30000, 6),
(11, 14, 12, 10, 10, 100000, 7),
(12, 14, 12, 10, 5, 50000, 8),
(13, 14, 13, 5, 1, 10000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `list_buku`
--

CREATE TABLE `list_buku` (
  `id` int(255) NOT NULL,
  `id_penjual` int(255) NOT NULL,
  `id_buku` int(255) NOT NULL,
  `stok` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_buku`
--

INSERT INTO `list_buku` (`id`, `id_penjual`, `id_buku`, `stok`) VALUES
(5, 13, 15, 99),
(9, 12, 18, 100),
(10, 12, 19, 45);

-- --------------------------------------------------------

--
-- Table structure for table `status_konfirmasi`
--

CREATE TABLE `status_konfirmasi` (
  `id` int(255) NOT NULL,
  `id_penjual` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_konfirmasi`
--

INSERT INTO `status_konfirmasi` (`id`, `id_penjual`, `id_user`, `tanggal_mulai`, `tanggal_selesai`, `status`) VALUES
(5, 12, 14, '2020-05-14', '2020-05-14', 3),
(6, 12, 14, '2020-05-14', '2020-05-14', 3),
(7, 12, 14, '2020-05-14', '2020-05-14', 3),
(8, 12, 14, '2020-05-14', '2020-05-14', 1),
(9, 13, 14, '2020-05-14', '2020-05-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_log`
--

CREATE TABLE `transaction_log` (
  `id` int(255) NOT NULL,
  `id_status_konfirmasi` int(255) NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_log`
--

INSERT INTO `transaction_log` (`id`, `id_status_konfirmasi`, `tanggal_selesai`) VALUES
(1, 8, '2020-05-14'),
(2, 9, '2020-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_saldo`
--

CREATE TABLE `transaksi_saldo` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `saldo` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(1) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_saldo`
--

INSERT INTO `transaksi_saldo` (`id`, `id_user`, `saldo`, `tanggal`, `status`, `gambar`) VALUES
(2, 14, 100000, '2020-05-15', 1, 'storage/transaksi/hY51GWl2L4HqqQDtq3NxWfJTV25l08uO5Yz4QLxI.bmp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `saldo` int(255) NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `nama_lengkap`, `alamat`, `tanggal_lahir`, `no_hp`, `saldo`, `foto_profil`, `status`) VALUES
(12, 'admin', 'admin', 'admin', 'asdafsaasd', '1212-03-12', '1234122', 12312212, 'storage/profil/IYtm3cFS950T4p6wqKwcKfekEc1Jx69qpMgW3F5b.png', 3),
(13, 'coeg', 'jancokkkkkk', 'jancok', 'asdasdasas', '1221-03-12', '2131212', 12312123, 'storage/profil/6EpjL1zBPtFDlevuDu898GPR05XeHKZpixUpMu3d.png', 2),
(14, 'coeg', 'raka', 'raka', 'adasdsaas', '1212-03-21', '12312', 10040000, 'storage/profil/M01I9I7qhRZoS7gzFmcF2efiaKTQUfb5Ao803iHQ.bmp', 1),
(15, 'coeg', 'udingambut', 'udin gambut', 'asdafasdasdas', '1222-03-12', '21312', 12312, 'storage/profil/Adz7w8tW0EHjoFBOde7p15zQJu3LiqL1vAACIQwn.bmp', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_penjual` (`id_penjual`);

--
-- Indexes for table `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penjual` (`id_penjual`);

--
-- Indexes for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `id_list_buku` (`id_list_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `list_buku`
--
ALTER TABLE `list_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `list_buku_ibfk_2` (`stok`);

--
-- Indexes for table `status_konfirmasi`
--
ALTER TABLE `status_konfirmasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaction_log`
--
ALTER TABLE `transaction_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status_konfirmasi` (`id_status_konfirmasi`);

--
-- Indexes for table `transaksi_saldo`
--
ALTER TABLE `transaksi_saldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_buku`
--
ALTER TABLE `detail_buku`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `list_buku`
--
ALTER TABLE `list_buku`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status_konfirmasi`
--
ALTER TABLE `status_konfirmasi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction_log`
--
ALTER TABLE `transaction_log`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_saldo`
--
ALTER TABLE `transaksi_saldo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD CONSTRAINT `detail_buku_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  ADD CONSTRAINT `keranjang_belanja_ibfk_2` FOREIGN KEY (`id_penjual`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_belanja_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_belanja_ibfk_4` FOREIGN KEY (`id_list_buku`) REFERENCES `list_buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `list_buku`
--
ALTER TABLE `list_buku`
  ADD CONSTRAINT `list_buku_ibfk_2` FOREIGN KEY (`id_penjual`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_buku_ibfk_3` FOREIGN KEY (`id_buku`) REFERENCES `detail_buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status_konfirmasi`
--
ALTER TABLE `status_konfirmasi`
  ADD CONSTRAINT `status_konfirmasi_ibfk_2` FOREIGN KEY (`id_penjual`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_konfirmasi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_log`
--
ALTER TABLE `transaction_log`
  ADD CONSTRAINT `transaction_log_ibfk_1` FOREIGN KEY (`id_status_konfirmasi`) REFERENCES `status_konfirmasi` (`id`);

--
-- Constraints for table `transaksi_saldo`
--
ALTER TABLE `transaksi_saldo`
  ADD CONSTRAINT `transaksi_saldo_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
