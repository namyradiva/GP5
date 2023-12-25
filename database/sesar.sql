-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 03:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sesar`
--

-- --------------------------------------------------------

--
-- Table structure for table `peta`
--

CREATE TABLE `peta` (
  `id_file` int(11) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `gambar` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peta`
--

INSERT INTO `peta` (`id_file`, `desa`, `gambar`) VALUES
(12, 'Karangpakis', 0x363536623438643233636437332e6a7067),
(13, 'Banjarsari', 0x363536653034646363303435322e6a7067),
(14, 'Jetis', 0x363536653064336632306566652e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `titik` varchar(255) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id`, `nama`, `alamat`, `titik`, `keterangan`) VALUES
(13, 'Masjid Baiturrohim', 'Karangpakis, Nusawungu', 'https://maps.app.goo.gl/DWZbJSFdHUL2bq5r8', 'Tempat Evakuasi Sementara'),
(14, 'SD Negeri Karangpakis 04', 'Karangpakis, Nusawungu', 'https://maps.app.goo.gl/7VbBwxeJFWbRJ1Dc8', 'Tempat Evakuasi Sementara'),
(15, 'Masjid Miftakhul Ulum', 'Karangpakis, Nusawungu', 'https://maps.app.goo.gl/cfqvcSZxAbL686er5', 'Tempat Evakuasi Sementara'),
(16, 'SD Negeri Banjarsari 03', 'Banjarsari, Nusawungu', 'https://maps.app.goo.gl/GnKoMcJHjWK2mfFx6', 'Tempat Evakuasi Sementara'),
(17, 'MI Ma&#039;arif NU 03 Karangsembung', 'Karangsembung, Nusawungu', 'https://maps.app.goo.gl/tm9nxoarYRLxfiY4A', 'Tempat Evakuasi Sementara'),
(18, 'SD Negeri Karangsembung 01', 'Karangsembung, Nusawungu', 'https://maps.app.goo.gl/NBHrthRy3vg8DTFt5', 'Tempat Evakuasi Akhir'),
(19, 'MI Ma&#039;arif NU 04 Banjareja', 'Banjareja, Nusawungu', 'https://maps.app.goo.gl/Q6MWo4LCSdLbRysJ6', 'Tempat Evakuasi Akhir'),
(20, 'Balai Desa Banjareja', 'Banjareja, Nusawungu', 'https://maps.app.goo.gl/NgHvxVyjonoQv6y98', 'Tempat Evakuasi Akhir'),
(21, 'Mushola Jami&#039; Salam', 'Banjareja, Nusawungu', 'https://maps.app.goo.gl/QCUUw9w99P13Ndy26', 'Tempat Evakuasi Sementara'),
(22, 'Masjid Nurul Iman', 'Banjareja, Nusawungu', 'https://maps.app.goo.gl/AUrEvYXGYFQGZqUw5', 'Tempat Evakuasi Sementara'),
(23, 'Kantor Kecamatan Nusawungu', 'Nusawungu', 'https://maps.app.goo.gl/i9t3jSDq1NXM6fPt9', 'Tempat Evakuasi Akhir');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`) VALUES
(4, 'Admin', 'admin', '$2y$10$mzTmt65Bc3q3vC/Znao2puCy15KDKyk8mwAKKI5U9HzpcB/zw2Yri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peta`
--
ALTER TABLE `peta`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peta`
--
ALTER TABLE `peta`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
