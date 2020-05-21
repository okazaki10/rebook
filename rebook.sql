-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 05:16 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `transaction_log`
--

CREATE TABLE `transaction_log` (
  `id` int(255) NOT NULL,
  `id_status_konfirmasi` int(255) NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `detail_buku`
--
ALTER TABLE `detail_buku`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `keranjang_sewa`
--
ALTER TABLE `keranjang_sewa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `list_buku`
--
ALTER TABLE `list_buku`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `status_konfirmasi`
--
ALTER TABLE `status_konfirmasi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaction_log`
--
ALTER TABLE `transaction_log`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi_saldo`
--
ALTER TABLE `transaksi_saldo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
