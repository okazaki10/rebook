-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 11:19 AM
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
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `id_user`, `id_penjual`, `chat`, `tanggal`) VALUES
(5, 15, 12, 'sadfasdasdasdsad', '2020-05-26 00:00:00'),
(6, 15, 12, 'sadasdasd', '2020-05-18 00:00:00'),
(7, 14, 13, 'sadasdsdaasd', '2020-05-13 00:00:00'),
(8, 14, 13, 'dsafadsdsad', '2020-05-06 00:00:00'),
(9, 12, 15, 'sdasdasdsdasdasdasdsd', '2020-05-06 00:00:00'),
(10, 14, 13, 'asdas', '2020-05-16 00:00:00'),
(11, 14, 13, 'sadas', '2020-05-16 00:00:00'),
(12, 14, 13, 'sadass', '2020-05-16 00:00:00'),
(13, 14, 13, 'sadass', '2020-05-16 00:00:00'),
(14, 14, 13, 'sadassd', '2020-05-16 00:00:00'),
(15, 14, 13, 'asa', '2020-05-16 00:00:00'),
(16, 14, 13, 'kontol', '2020-05-16 00:00:00'),
(17, 14, 13, 'ds', '2020-05-16 00:00:00'),
(18, 15, 12, 'sadas', '2020-05-16 00:00:00'),
(19, 15, 12, 'sadasd', '2020-05-16 00:00:00'),
(20, 15, 12, 'sadasdd', '2020-05-16 00:00:00'),
(21, 15, 12, 'sadasdd', '2020-05-16 00:00:00'),
(22, 15, 12, 'sd', '2020-05-16 00:00:00'),
(23, 15, 12, 'sds', '2020-05-16 00:00:00'),
(24, 15, 12, 'dss', '2020-05-16 00:00:00'),
(25, 15, 12, 'dssasdas', '2020-05-16 00:00:00'),
(27, 15, 12, 'dds', '2020-05-16 00:00:00'),
(28, 15, 13, 'asd', '2020-05-16 00:00:00'),
(29, 15, 12, 'sdas', '2020-05-16 00:00:00'),
(30, 15, 13, 'bulet ae kontol', '2020-05-16 00:00:00'),
(31, 15, 12, 'JANCOK WKWKWKWKW', '2020-05-16 00:00:00'),
(32, 15, 13, 'KONTOL', '2020-05-16 00:00:00'),
(33, 15, 12, 'BETUL BETUL BETUL', '2020-05-16 18:29:39'),
(34, 15, 12, 'JANCOK TENAN', '2020-05-16 18:29:44'),
(35, 15, 13, 'WKWKKWKWW', '2020-05-16 18:30:00'),
(36, 15, 12, 'wwkkwwkwkkww', '2020-05-16 18:31:37'),
(37, 12, 15, 'ngentot lu nya bangsat', '2020-05-16 19:05:08'),
(38, 15, 12, 'santai bos', '2020-05-16 19:06:14'),
(39, 12, 15, 'ya lu yang ngga selow bangsat', '2020-05-16 19:06:22'),
(40, 12, 15, 'asdsa', '2020-05-16 20:19:23'),
(41, 12, 15, 'asds', '2020-05-16 20:20:23'),
(42, 12, 15, 'buku kontol kini sudah tersedia wkwkwkk', '2020-05-16 20:20:41'),
(43, 12, 15, 'asdas', '2020-05-16 20:21:13'),
(44, 12, 15, 'konotl', '2020-05-16 20:21:49'),
(45, 12, 15, 'bosss', '2020-05-16 20:22:00'),
(46, 12, 15, 'kontoru desu ne', '2020-05-16 20:22:07'),
(47, 12, 15, 'NGENTOT', '2020-05-16 20:22:12'),
(48, 12, 15, 'wkwkwkwkw', '2020-05-16 20:22:15'),
(49, 12, 15, 'sadasdssa', '2020-05-16 20:22:17'),
(50, 12, 15, 'asds', '2020-05-16 20:22:53'),
(51, 12, 15, 'asade kontol', '2020-05-16 20:22:57'),
(52, 12, 15, 'asdas', '2020-05-16 20:22:59'),
(53, 12, 15, 'sama lu semua', '2020-05-16 20:23:03'),
(54, 12, 15, 'ngentot ngentot', '2020-05-16 20:23:07'),
(55, 12, 15, 'wkwkwkwkwk', '2020-05-16 20:23:09'),
(56, 15, 12, 'ngapa lu', '2020-05-16 20:24:22'),
(57, 15, 12, 'anda kafir', '2020-05-17 02:59:17'),
(58, 14, 13, 'kontol', '2020-05-17 03:42:25'),
(59, 14, 13, 'asdasdas', '2020-05-17 03:42:27'),
(60, 14, 13, 'asdasdasda', '2020-05-17 03:42:30'),
(61, 14, 13, 'asade kontol', '2020-05-17 03:42:39'),
(62, 14, 13, 'kontoru desu ne', '2020-05-17 03:42:43'),
(63, 12, 15, 'asa', '2020-05-18 02:58:14'),
(64, 14, 12, 'lol', '2020-05-18 03:52:15'),
(65, 14, 12, 'wkwkwkwk', '2020-05-18 03:52:21'),
(66, 14, 12, 'ini bisa dibeli bukunya', '2020-05-18 03:52:27'),
(67, 14, 12, 'kontol', '2020-05-18 03:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `detail_buku`
--

CREATE TABLE `detail_buku` (
  `id` int(255) NOT NULL,
  `id_penjual` int(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `bisa_disewa` int(1) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `pdf_preview` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_buku`
--

INSERT INTO `detail_buku` (`id`, `id_penjual`, `judul`, `kategori`, `tanggal_terbit`, `penulis`, `harga`, `bisa_disewa`, `gambar`, `pdf_preview`) VALUES
(15, 13, 'final fantasy', 'fantasy', '2112-12-21', '21312321', 10000, 0, 'storage/detail_buku/L1Z6nPEks2uCsvNzlxsJsYxhVajNKM15jewIgmYg.png', ''),
(18, 12, 'sagiri lonte', 'incest', '1231-03-12', '21312', 50000, 0, 'storage/detail_buku/0oHAUjMMPatCStfwBhl0NxclavQWhI3sJvoHiSxp.bmp', ''),
(19, 12, 'sword art online', 'fantasy', '2322-03-21', '213122', 10000, 0, 'storage/detail_buku/nTVQcOufuzqmwfq34LLh2iTnjdw9sPpVmGZQxUlv.bmp', ''),
(20, 12, 'KONTOL', 'KONTOL', '1221-03-12', 'KONTOL', 31222, 0, 'storage/detail_buku/kmlOxZJ0DKuA7fNufPPJVfDNVhiGkNCDSEcSnuYS.jpeg', ''),
(24, 12, 'filosofi', 'filosofi', '3212-02-12', 'alex mahan', 10000, 1, 'storage/detail_buku/ZwD6P4BxAdVIDque24GbXmjTuSuN9LI672e2jvfB.jpeg', 'storage/pdf_preview/goAIjfXq9HeiAKqqihONWT64YGfnygvazh7P4B1P.pdf'),
(25, 12, 'asd', 's', '1221-03-21', '121', 1231, 1, 'storage/detail_buku/Vlh95eAW07nAkN4ORzmK8D1ejSBurzk03c38EbcQ.bmp', 'storage/pdf_preview/VA4gkPIh9Cnk0DzEaV2LTQDfA5fZQAIXn09hHPZX.pdf');

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
(13, 14, 13, 5, 1, 10000, 9),
(14, 14, 13, 5, 10, 100000, 10),
(16, 14, 12, 13, 1, 10000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_sewa`
--

CREATE TABLE `keranjang_sewa` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_penjual` int(255) NOT NULL,
  `id_list_buku` int(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `id_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang_sewa`
--

INSERT INTO `keranjang_sewa` (`id`, `id_user`, `id_penjual`, `id_list_buku`, `jumlah`, `harga`, `id_status`) VALUES
(2, 14, 12, 13, 12, 120000, 12),
(3, 14, 12, 14, 10, 12310, 12);

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
(5, 13, 15, 89),
(9, 12, 18, 90),
(10, 12, 19, 45),
(11, 12, 20, 100),
(13, 12, 24, 138),
(14, 12, 25, 140);

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
  `status` int(1) NOT NULL,
  `bisa_disewa` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_konfirmasi`
--

INSERT INTO `status_konfirmasi` (`id`, `id_penjual`, `id_user`, `tanggal_mulai`, `tanggal_selesai`, `status`, `bisa_disewa`) VALUES
(5, 12, 14, '2020-05-14', '2020-05-14', 3, 0),
(6, 12, 14, '2020-05-14', '2020-05-14', 3, 0),
(7, 12, 14, '2020-05-14', '2020-05-14', 3, 0),
(8, 12, 14, '2020-05-14', '2020-05-18', 2, 0),
(9, 13, 14, '2020-05-14', '2020-05-18', 2, 0),
(10, 13, 14, '2020-05-18', '2001-01-01', 0, 0),
(11, 12, 14, '2020-05-18', '2020-05-18', 2, 0),
(12, 12, 14, '2020-05-18', '2020-05-18', 4, 1);

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
(2, 9, '2020-05-14'),
(3, 8, '2020-05-18'),
(4, 9, '2020-05-18'),
(5, 8, '2020-05-18'),
(6, 11, '2020-05-18'),
(7, 12, '2020-05-18');

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
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
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

INSERT INTO `user` (`id`, `email`, `password`, `nama_lengkap`, `alamat`, `tanggal_lahir`, `no_hp`, `saldo`, `foto_profil`, `status`) VALUES
(12, 'admin', 'admin', 'admin', 'asdafsaasd', '1212-03-12', '1234122', 12312212, 'storage/profil/syWaucCVEAilcfBcVW1rujVrmq6DCu6tQjKkok2p.jpeg', 3),
(13, 'jancok', 'coeg', 'jancok', 'asdasdasas', '1221-03-12', '2131212', 12312123, 'storage/profil/6EpjL1zBPtFDlevuDu898GPR05XeHKZpixUpMu3d.png', 2),
(14, 'raka', 'coeg', 'raka', 'adasdsaas', '1212-03-21', '12312', 9969240, 'storage/profil/LmKpg784vD51C67M30rCjX1BYvyoN7ZP8fXbGTfV.jpeg', 1),
(15, 'udin', 'coeg', 'udin gambut', 'asdafasdasdas', '1222-03-12', '21312', 12312, 'storage/profil/Adz7w8tW0EHjoFBOde7p15zQJu3LiqL1vAACIQwn.bmp', 1),
(16, 'boy', 'coeg', 'boyyyyyyyyy', 'boyyyyyyyyy', '1232-12-12', '2131232222', 0, 'storage/profil/nW8Ijw7PiSlPwKyGNdwMQANaFS37Grqh65fMjGHf.jpeg', 1);

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
-- Indexes for table `keranjang_sewa`
--
ALTER TABLE `keranjang_sewa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjang_sewa_ibfk_1` (`id_list_buku`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `keranjang_sewa_ibfk_3` (`id_user`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `detail_buku`
--
ALTER TABLE `detail_buku`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `keranjang_sewa`
--
ALTER TABLE `keranjang_sewa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `list_buku`
--
ALTER TABLE `list_buku`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `status_konfirmasi`
--
ALTER TABLE `status_konfirmasi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction_log`
--
ALTER TABLE `transaction_log`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi_saldo`
--
ALTER TABLE `transaksi_saldo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- Constraints for table `keranjang_sewa`
--
ALTER TABLE `keranjang_sewa`
  ADD CONSTRAINT `keranjang_sewa_ibfk_1` FOREIGN KEY (`id_list_buku`) REFERENCES `list_buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_sewa_ibfk_2` FOREIGN KEY (`id_penjual`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_sewa_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
