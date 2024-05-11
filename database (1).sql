-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 11:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bayar`
--

CREATE TABLE `tbl_bayar` (
  `id_bayar` int(100) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `id_pesanan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bayar`
--

INSERT INTO `tbl_bayar` (`id_bayar`, `profile`, `id_pesanan`) VALUES
(19, 'backgorund.jpg', 29),
(22, 'gatamala agrinaawa.jpg', 32),
(23, 'hrd2.jpg', 33),
(26, 'GDNA.jpg', 37),
(27, 'bela negara.jpg', 38);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `no` varchar(200) NOT NULL,
  `kendaraan` varchar(200) NOT NULL,
  `layanan` varchar(200) NOT NULL,
  `waktu` varchar(200) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `jumlah` int(200) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `verifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `nama`, `no`, `kendaraan`, `layanan`, `waktu`, `jam`, `jumlah`, `id_user`, `verifikasi`) VALUES
(29, 'fart', '11111', 'Motor', 'Layanan C', '2024-05-01', '', 1, '6', 'A002'),
(32, 'cole palmer', '0987876784', 'Mobil', 'Layanan A', '2024-05-25', '', 1, '8', 'A004'),
(33, 'cole lagi', '12345', 'Mobil', 'Layanan A', '2024-06-01', '10:16', 1, '8', 'A005'),
(37, 'habib asaln', '12345', 'Mobil', 'Layanan B', '2024-04-28', '17:34', 1, '6', 'A009'),
(38, 'habib tester', '1234', 'Mobil', 'Layanan C', '2024-06-01', '20:54', 1, '6', 'A010');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `rating` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ulasan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`rating`, `nama`, `ulasan`) VALUES
(5, 'habib', 'wah sangat membantu'),
(4, 'pengguna gacor', 'tambahin fitur yang keren lagi dong biar makin gacor'),
(5, 'tester user', 'keren adminnya fast resepon'),
(4, 'tester ketiga', 'naikin gaji backendnya min');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `posisi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `email`, `nama`, `password`, `posisi`) VALUES
(6, 'Habib', 'arrsyd@gmail.com', 'Habib Arrasyid', '1245', ''),
(7, 'admin1', 'admin@gmail.com', 'Admin 1', 'admin123', 'admin'),
(8, 'cole', 'cole@gmail.com', 'Cole Palmer', 'cole123', ''),
(9, 'aslanrasyid', 'aslan@gmail.com', 'aslan rasyid', 'aslan123', ''),
(10, 'admin2', 'admin22@gmail.com', 'admin 2 projek', 'admin234', 'admin'),
(11, 'user1', 'user@gmail.com', 'user tester', 'user123', ''),
(12, 'user1', 'user@gmail.com', 'user tester', 'user123', ''),
(13, 'aslan123', 'aslan123@gmail.com', 'Aslan Rasyid', 'aslan123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  MODIFY `id_bayar` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
