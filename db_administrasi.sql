-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 02:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_administrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

 CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `jenis_banner` varchar(255) DEFAULT NULL,
  `ukuran` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal_lunas` date DEFAULT NULL,
  `tanggal_pengambilan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `tanggal`, `nama_customer`, `jenis_banner`, `ukuran`, `jumlah`, `keterangan`, `tanggal_lunas`, `tanggal_pengambilan`) VALUES
(3, '2024-07-11', 'nama update', 'jenis 2', 'ukuran 2', 2, 'keterangan 2', '2024-07-12', '2024-07-11'),
(5, '2024-07-23', 'wwwwwww', 'jeniswwwwwwwww', 'wwwwwwwwww', 2222222, 'wwwwwwww', '2024-07-11', '2024-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `saldo` decimal(15,2) NOT NULL,
  `uang_keluar` decimal(15,2) NOT NULL,
  `uang_masuk` decimal(15,2) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id`, `tanggal`, `saldo`, `uang_keluar`, `uang_masuk`, `keterangan`) VALUES
(1, '2024-07-12', '12000.00', '14000.00', '9000.00', 'keterangan');

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `jenis_merchandise` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal_lunas` date DEFAULT NULL,
  `tanggal_pengambilan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`id`, `tanggal`, `nama_customer`, `jenis_merchandise`, `ukuran`, `jumlah`, `keterangan`, `tanggal_lunas`, `tanggal_pengambilan`) VALUES
(3, '0000-00-00', 'mnmnm', 'sasaccc', 'xl', 2, '0.9', '0000-00-00', '1212-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'user', '$2y$10$dI..bx/kfmETsT9.K9ZJmORGQpAQ75JJF858K9QKDVRXSUY9M6q6e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
