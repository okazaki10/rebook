-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 02:05 AM
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
-- Database: `rebook_test`
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
(87, 18, 17, 'apakah buku final fantasy sudah ready', '2020-05-21 23:51:49'),
(88, 17, 18, 'ready gan', '2020-05-21 23:52:13'),
(89, 18, 17, 'ok', '2020-05-21 23:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `detail_buku`
--

CREATE TABLE `detail_buku` (
  `id` int(255) NOT NULL,
  `id_penjual` int(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
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

INSERT INTO `detail_buku` (`id`, `id_penjual`, `judul`, `deskripsi`, `kategori`, `tanggal_terbit`, `penulis`, `harga`, `bisa_disewa`, `gambar`, `pdf_preview`) VALUES
(29, 17, 'final fantasy', 'cerita tentang fantasissssss', 'fantasy', '2020-05-19', 'zheng purnama', 50000, 1, 'storage/detail_buku/5KBUolRtAF8cHcTxEv4MvWNqFimf9lIaTZh1L3Pf.bmp', 'storage/pdf_preview/sGiR8omPblJUL1NoSjPbrWZP9hwh0fpfKLTfUsCg.pdf'),
(30, 17, 'harry potter', 'cerita tentang harry di hogwarts', 'horror', '2020-05-20', 'jk rowling', 100000, 0, 'storage/detail_buku/MKvgcfRAVXzWCtR1GJCAgDeQ1aDSouPZqFAjDGp7.png', 'storage/pdf_preview/Dp0zfRMWN2UKCWNzGI9I1EB21b4umZJXmujVhrIL.pptx'),
(31, 17, 'asdfasd', 'sadasda', 'asda', '0012-03-21', '123123', 123213, 1, 'storage/detail_buku/cJjrV2oqcVr2EgN5kaDMUOaZzwF2ZToEq5ojLQ5n', '');

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
(32, 18, 17, 17, 2, 200000, 22),
(33, 18, 17, 16, 1, 50000, 22),
(35, 18, 17, 16, 5, 250000, 25);

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
(14, 18, 17, 16, 3, 150000, 23),
(15, 18, 17, 16, 1, 50000, 24);

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
(16, 17, 29, 99),
(17, 17, 30, 48);

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
(22, 17, 18, '2020-05-21', '2020-05-21', 2, 0),
(23, 17, 18, '2020-05-21', '2020-05-21', 4, 1),
(24, 17, 18, '2020-05-21', '2020-05-21', 4, 1),
(25, 17, 18, '2020-05-21', '2020-05-21', 3, 0);

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
(13, 22, '2020-05-21'),
(14, 23, '2020-05-21'),
(15, 24, '2020-05-21');

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
(6, 18, 500000, '2020-05-21', 1, 'storage/transaksi/dO9mRLAKrCWdi87xNiRnHizWn7fQgy3mgfLygYoX.jpeg'),
(7, 18, 100000, '2020-05-21', 2, 'storage/transaksi/zf5B9cMeqwIWKXLPbynCTjPi7wekizcwYCpwsVqR.jpeg');

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
(17, 'penjual', 'coegs', 'penjual_test', 'jl raya tapos', '2020-05-20', '0827983323', 250000, 'storage/profil/a4vVjTmxklWI4oJ7EAtDqzmDXzhKHO4cJcxGM48c.jpeg', 2),
(18, 'pembeli', 'coeg', 'pembeli', 'jl keputih tegal timur', '2020-05-12', '08721324332', 250000, 'storage/profil/fi9Bn1DGnBZb2rk54CyrO5Jh3pNTtZhb6VIY00uB.jpeg', 1),
(19, 'admin', 'admin', 'admin', 'sadasdasdsadsas', '2020-05-14', '213414324532132', 0, 'storage/profil/Tk9W7L9tcbRcJWBBk9phCTpNhlDGwReFPrBjBw7m.jpeg', 3);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `detail_buku`
--
ALTER TABLE `detail_buku`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `keranjang_sewa`
--
ALTER TABLE `keranjang_sewa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `list_buku`
--
ALTER TABLE `list_buku`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `status_konfirmasi`
--
ALTER TABLE `status_konfirmasi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaction_log`
--
ALTER TABLE `transaction_log`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi_saldo`
--
ALTER TABLE `transaksi_saldo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  ADD CONSTRAINT `transaction_log_ibfk_1` FOREIGN KEY (`id_status_konfirmasi`) REFERENCES `status_konfirmasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_saldo`
--
ALTER TABLE `transaksi_saldo`
  ADD CONSTRAINT `transaksi_saldo_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
