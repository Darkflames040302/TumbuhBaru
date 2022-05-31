-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 03:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` int(255) NOT NULL,
  `departemen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `departemen`) VALUES
(6, 'IT'),
(7, 'Akuntansi'),
(8, 'Manajemen'),
(9, 'Arsitektur'),
(10, 'Tumbuh Baru'),
(11, 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `table`
--

CREATE TABLE `table` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal_Cuti` date NOT NULL,
  `lama_Cuti` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table`
--

INSERT INTO `table` (`id`, `description`, `status`, `tanggal_Cuti`, `lama_Cuti`, `userId`) VALUES
(22, 'cuti liburan', 'approved', '2022-06-01', '2 hari', 222),
(23, 'lebaran', 'declined', '2023-01-01', '1 minggu', 745402820),
(24, 'sembahyang', 'approved', '2022-06-02', '2 hari', 6015),
(25, 'liburan', 'approved', '2022-06-06', '3 hari', 2147483647),
(26, 'ada kendala rumah', 'approved', '2022-06-01', '1 hari', 46054),
(27, 'cuti liburan', 'declined', '2022-06-03', '1 minggu', 1925868);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userId` int(60) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(64) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `departemen` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userId`, `name`, `email`, `password`, `rank`, `departemen`, `picture`) VALUES
(2, 222, 'Karyawan', 'karyawan@gmail.com', 'karyawan123', 'karyawan', '', ''),
(30, 924, 'admin', 'admin@gmail.com', 'admin123', 'pemimpin', 'IT', ''),
(31, 376378863, 'nicky nicholas', 'nicky@gmail.com', 'nicky123', 'pemimpin', 'IT', ''),
(32, 745402820, 'Didi Santoso', 'didi@gmail.com', 'didi123', 'karyawan', 'IT', ''),
(33, 6015, 'teguh', 'teguh@gmail.com', 'teguh123', 'karyawan', 'Manajemen', ''),
(34, 2147483647, 'Devi', 'devi@gmail.com', 'devi123', 'karyawan', 'Manajemen', ''),
(35, 46054, 'Edward', 'edward@gmail.com', 'edward123', 'karyawan', 'Arsitektur', ''),
(36, 1925868, 'dedi', 'dedi@gmail.com', 'dedi123', 'karyawan', 'IT', ''),
(37, 395, 'nicky nicholas', 'nickynicholas@gmail.com', 'nickynicholas123', 'pemimpin', 'Manajemen', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `rank` (`rank`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table`
--
ALTER TABLE `table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table`
--
ALTER TABLE `table`
  ADD CONSTRAINT `table_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
