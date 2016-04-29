-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2016 at 10:34 PM
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
-- Table structure for table `jcalon`
--

CREATE TABLE IF NOT EXISTS `jcalon` (
  `id` int(5) NOT NULL,
  `id_pelajar` int(5) NOT NULL,
  `jumlah_undi` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jcalon`
--

INSERT INTO `jcalon` (`id`, `id_pelajar`, `jumlah_undi`) VALUES
(19, 22, 0),
(20, 23, 0),
(21, 24, 0),
(22, 26, 0),
(23, 27, 0),
(24, 28, 0),
(25, 29, 0),
(26, 30, 0),
(27, 31, 0),
(28, 32, 0),
(29, 33, 0),
(30, 34, 0),
(31, 35, 0),
(32, 36, 0),
(33, 37, 0),
(34, 38, 0),
(35, 39, 0),
(36, 40, 0),
(37, 41, 0),
(38, 42, 0),
(39, 43, 0),
(40, 44, 0),
(41, 25, 0),
(42, 21, 0),
(43, 708, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jflag`
--

CREATE TABLE IF NOT EXISTS `jflag` (
  `id` int(2) NOT NULL,
  `status_pengundian` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jflag`
--

INSERT INTO `jflag` (`id`, `status_pengundian`) VALUES
(0, 1);

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
(1, 'TEKNOLOGI PEMESINAN CNC', 'CNC'),
(2, 'TEKNOLOGI PLASTIK', 'PLASTIK'),
(3, 'TEKNOLOGI PEMBUATAN (PERKAKASAN-MOULD)', 'TDM'),
(4, 'TEKNOLOGI KIMPALAN ARKA DAN GAS', 'KIMP'),
(5, 'TEKNOLOGI FABRIKASI LOGAM', 'FAB'),
(6, 'TEKNOLOGI REKA BENTUK PRODUK INDUSTRI', 'IPD'),
(7, 'TEKNOLOGI MEKATRONIK', 'MEKA'),
(8, 'TEKNOLOGI KOMPUTER (RANGKAIAN)', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `jpelajar`
--

CREATE TABLE IF NOT EXISTS `jpelajar` (
  `id` int(5) NOT NULL,
  `nama_penuh` varchar(255) NOT NULL,
  `no_kp` varchar(12) NOT NULL,
  `no_matrik` varchar(8) NOT NULL,
  `kata_laluan` varchar(45) NOT NULL,
  `id_kursus` int(5) NOT NULL,
  `id_sesi` int(11) NOT NULL,
  `status_undi` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpelajar`
--

INSERT INTO `jpelajar` (`id`, `nama_penuh`, `no_kp`, `no_matrik`, `kata_laluan`, `id_kursus`, `id_sesi`, `status_undi`) VALUES
(1, 'Ruban A/L Selvarajah', '951216085565', 'AI130243', 'ee11cbb19052e40b07aac0ca060c23ee', 8, 0, 0),
(2, 'Naveen A/L Ganasan', '931213105565', 'AI130101', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 0, 0),
(3, 'Ahmad Fairul B. Onn ', '930215085565', 'AI130102', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0, 0),
(4, 'Ko Wye Sean', '930312035565', 'AI130103', 'ee11cbb19052e40b07aac0ca060c23ee', 1, 0, 0),
(5, 'Anis Bt. Halib', '921214055656', 'AI130104', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 0, 0),
(6, 'Nishanthini A/P Moses', '950512085454', 'AI130106', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0, 0),
(7, 'Suraj Chakraverthy', '921545021234', 'AI130107', 'ee11cbb19052e40b07aac0ca060c23ee', 4, 0, 0),
(8, 'Hafizul B. Abdullah', '940215085654', 'AI130108', 'ee11cbb19052e40b07aac0ca060c23ee', 4, 0, 0),
(9, 'Ellvin Delson', '921205232123', 'AI130109', 'ee11cbb19052e40b07aac0ca060c23ee', 1, 0, 0),
(10, 'Chew Yui Shen', '931210058989', 'AI130110', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 0, 0),
(11, 'Chai Chee Yike', '931012085654', 'AI130111', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0, 0),
(12, 'Mohd. Munir B. Nasir', '930215081212', 'AI130112', 'ee11cbb19052e40b07aac0ca060c23ee', 4, 0, 0),
(13, 'Kasturi A/P Ravichandran', '930825082525', 'AI130113', 'ee11cbb19052e40b07aac0ca060c23ee', 1, 0, 0),
(14, 'Nanthiine Nair A/P Ravi', '930425085623', 'AI130114', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 0, 0),
(15, 'Ju Jing Yi', '940623085707', 'AI130115', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0, 0),
(16, 'Muniandy A/L Perimal', '930410085656', 'AI130116', 'ee11cbb19052e40b07aac0ca060c23ee', 4, 0, 0),
(17, 'Siti Sarah Bt. Yunos', '920303061234', 'AI130117', 'ee11cbb19052e40b07aac0ca060c23ee', 4, 0, 0),
(18, 'Kesavan A/L Kannan', '930109035232', 'AI130118', 'ee11cbb19052e40b07aac0ca060c23ee', 1, 0, 0),
(19, 'Ron Jakri Jikim', '940203051234', 'AI130119', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 0, 0),
(20, 'Chan Shin Yee', '930403085659', 'AI130120', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jpentadbir`
--

CREATE TABLE IF NOT EXISTS `jpentadbir` (
  `id` int(5) NOT NULL,
  `no_staf` varchar(8) NOT NULL,
  `nama_penuh` varchar(255) NOT NULL,
  `no_kp` varchar(12) NOT NULL,
  `kata_laluan` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jpentadbir`
--

INSERT INTO `jpentadbir` (`id`, `no_staf`, `nama_penuh`, `no_kp`, `kata_laluan`) VALUES
(3, 'admin', 'Administrator', '930201045266', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'lecturer', 'Admin2', '940807015124', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `jsesi`
--

CREATE TABLE IF NOT EXISTS `jsesi` (
  `id` int(11) NOT NULL,
  `nama` varchar(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jsesi`
--

INSERT INTO `jsesi` (`id`, `nama`) VALUES
(1, '2013/2014'),
(2, '2014/2015'),
(3, '2015/2016'),
(4, '2016/2017');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jcalon`
--
ALTER TABLE `jcalon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jflag`
--
ALTER TABLE `jflag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_pengundian` (`status_pengundian`);

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
-- AUTO_INCREMENT for table `jcalon`
--
ALTER TABLE `jcalon`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `jpelajar`
--
ALTER TABLE `jpelajar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `jpentadbir`
--
ALTER TABLE `jpentadbir`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jsesi`
--
ALTER TABLE `jsesi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
