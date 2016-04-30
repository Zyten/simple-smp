-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2016 at 01:31 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uthm_smp`
--

-- --------------------------------------------------------

--
-- Table structure for table `jkursus`
--

CREATE TABLE IF NOT EXISTS `jkursus` (
  `id` int(5) NOT NULL,
  `nama_penuh` varchar(255) NOT NULL,
  `singkatan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jkursus`
--

INSERT INTO `jkursus` (`id`, `nama_penuh`, `singkatan`) VALUES
(1, 'KEJURUTERAAN PERISIAN', 'BIP'),
(2, 'TEKNOLOGI WEB', 'BIW'),
(3, 'KEJURUTERAAN ELEKTRIK KUASA', 'BEV'),
(4, 'KEJURUTERAAN ELEKTRONIK KOMPUTER', 'BEJ'),
(5, 'KEJURUTERAAN MEKANIKAL', 'BMA'),
(6, 'KEJURUTERAAN AWAM DAN ALAM SEKITAR', 'BAS'),
(7, 'PENGURUSAN TEKNOLOGI', 'BPA'),
(8, 'TEKNIKAL DAN VOKASIONAL PENDIDIKAN', 'BVA');

-- --------------------------------------------------------

--
-- Table structure for table `jpelajar`
--

CREATE TABLE IF NOT EXISTS `jpelajar` (
  `id` int(5) NOT NULL,
  `nama_penuh` varchar(255) NOT NULL,
  `no_kp` varchar(12) NOT NULL,
  `no_matrik` varchar(8) NOT NULL,
  `kata_laluan` varchar(60) CHARACTER SET utf8 NOT NULL,
  `id_kursus` int(5) NOT NULL,
  `id_sesi` int(11) NOT NULL,
  `status_undi` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpelajar`
--

INSERT INTO `jpelajar` (`id`, `nama_penuh`, `no_kp`, `no_matrik`, `kata_laluan`, `id_kursus`, `id_sesi`, `status_undi`) VALUES
(1, 'Ruban A/L Selvarajah', '951216085565', 'AI130243', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 1, 1, 1),
(2, 'Naveen A/L Ganasan', '931213105565', 'AI130101', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 2, 2, 0),
(3, 'Ahmad Fairul B. Onn ', '930215085565', 'AI130102', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 3, 1, 0),
(4, 'Ko Wye Sean', '930312035565', 'AI130103', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 1, 1, 0),
(5, 'Anis Bt. Halib', '921214055656', 'AI130104', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 2, 2, 0),
(6, 'Nishanthini A/P Moses', '950512085454', 'AI130106', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 5, 1, 0),
(7, 'Suraj Chakraverthy', '921545021234', 'AI130107', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 4, 1, 0),
(8, 'Hafizul B. Abdullah', '940215085654', 'AI130108', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 4, 1, 0),
(9, 'Ellvin Delson', '921205232123', 'AI130109', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 1, 1, 0),
(10, 'Chew Yui Shen', '931210058989', 'AI130110', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 2, 1, 0),
(11, 'Chai Chee Yike', '931012085654', 'AI130111', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 3, 1, 0),
(12, 'Mohd. Munir B. Nasir', '930215081212', 'AI130112', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 1, 1, 0),
(13, 'Kasturi A/P Ravichandran', '930825082525', 'AI130113', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 1, 1, 0),
(14, 'Nanthiine Nair A/P Ravi', '930425085623', 'AI130114', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 2, 1, 0),
(15, 'Ju Jing Yi', '940623085707', 'AI130115', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 3, 1, 0),
(16, 'Muniandy A/L Perimal', '930410085656', 'AI130116', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 4, 1, 0),
(17, 'Siti Sarah Bt. Yunos', '920303061234', 'AI130117', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 4, 1, 0),
(18, 'Kesavan A/L Kannan', '930109035232', 'AI130118', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 1, 1, 0),
(19, 'Ron Jakri Jikim', '940203051234', 'AI130119', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 2, 1, 0),
(20, 'Chan Shin Yee', '930403085659', 'AI130120', '$2y$10$k7OsIwUSEvq72d/BVoke9eVsk3JEez530lSLQ3MF7nLDh55Eu9riu', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jpentadbir`
--

CREATE TABLE IF NOT EXISTS `jpentadbir` (
  `id` int(5) NOT NULL,
  `no_staf` varchar(8) NOT NULL,
  `nama_penuh` varchar(255) NOT NULL,
  `no_kp` varchar(12) NOT NULL,
  `kata_laluan` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpentadbir`
--

INSERT INTO `jpentadbir` (`id`, `no_staf`, `nama_penuh`, `no_kp`, `kata_laluan`) VALUES
(3, 'admin', 'Administrator', '930201045266', '$2y$10$6Ny1rB5T1rIblBsMn7328O/QDKc2d6qxSdA8wqb7FweRhdw3etx46'),
(4, 'lecturer', 'Admin2', '940807015124', '$2y$10$6Ny1rB5T1rIblBsMn7328O/QDKc2d6qxSdA8wqb7FweRhdw3etx46');

-- --------------------------------------------------------

--
-- Table structure for table `jsesi`
--

CREATE TABLE IF NOT EXISTS `jsesi` (
  `id` int(11) NOT NULL,
  `nama` varchar(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jsesi`
--

INSERT INTO `jsesi` (`id`, `nama`) VALUES
(1, '2013/2014'),
(2, '2014/2015'),
(3, '2015/2016');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jkursus`
--
ALTER TABLE `jkursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jpelajar`
--
ALTER TABLE `jpelajar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_kp` (`no_kp`),
  ADD UNIQUE KEY `no_matrik` (`no_matrik`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `jpentadbir`
--
ALTER TABLE `jpentadbir`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `no_staf` (`no_staf`),
  ADD UNIQUE KEY `no_kp` (`no_kp`);

--
-- Indexes for table `jsesi`
--
ALTER TABLE `jsesi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jpelajar`
--
ALTER TABLE `jpelajar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `jpentadbir`
--
ALTER TABLE `jpentadbir`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jsesi`
--
ALTER TABLE `jsesi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
