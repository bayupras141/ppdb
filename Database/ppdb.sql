-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2021 at 09:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alur`
--

CREATE TABLE `alur` (
  `alur_id` int(11) NOT NULL,
  `alur_nama` text NOT NULL,
  `alur_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `alur_update` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `dfr_no` varchar(20) NOT NULL,
  `dfr_tanggal` date DEFAULT NULL,
  `dfr_password` varchar(50) NOT NULL,
  `dft_nama` varchar(50) NOT NULL,
  `dfr_jekel` enum('1','2') DEFAULT NULL,
  `dfr_tmp_lahir` varchar(20) DEFAULT NULL,
  `dfr_tgl_lahir` date DEFAULT NULL,
  `dft_agama` enum('1','2','3','4','5') DEFAULT NULL,
  `dfr_anak_dr` enum('1','2','3','4') DEFAULT NULL,
  `dfr_nisn` varchar(50) DEFAULT NULL,
  `dfr_asal_sekolah` text DEFAULT NULL,
  `dfr_almt_sekolah` text DEFAULT NULL,
  `dfr_pas_photo` text DEFAULT NULL,
  `dfr_nilai_mm` int(11) DEFAULT NULL,
  `dfr_nilai_indo` int(11) DEFAULT NULL,
  `dfr_nilai_eng` int(11) DEFAULT NULL,
  `dfr_nilai_ipa` int(11) DEFAULT NULL,
  `dfr_nilai_ips` int(11) DEFAULT NULL,
  `dfr_ayah` varchar(20) DEFAULT NULL,
  `dfr_ibu` varchar(20) DEFAULT NULL,
  `dfr_alamat` text DEFAULT NULL,
  `dfr_hp_ortu` varchar(12) DEFAULT NULL,
  `status` enum('R','S') DEFAULT NULL,
  `filetf` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`dfr_no`, `dfr_tanggal`, `dfr_password`, `dft_nama`, `dfr_jekel`, `dfr_tmp_lahir`, `dfr_tgl_lahir`, `dft_agama`, `dfr_anak_dr`, `dfr_nisn`, `dfr_asal_sekolah`, `dfr_almt_sekolah`, `dfr_pas_photo`, `dfr_nilai_mm`, `dfr_nilai_indo`, `dfr_nilai_eng`, `dfr_nilai_ipa`, `dfr_nilai_ips`, `dfr_ayah`, `dfr_ibu`, `dfr_alamat`, `dfr_hp_ortu`, `status`, `filetf`) VALUES
('admin', '2021-08-23', '123', 'Admin', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `waktu_id` int(11) NOT NULL,
  `waktu_nama` text NOT NULL,
  `waktu_mulai` date NOT NULL,
  `waktu_akhir` date NOT NULL,
  `waktu_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alur`
--
ALTER TABLE `alur`
  ADD PRIMARY KEY (`alur_id`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`dfr_no`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`waktu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alur`
--
ALTER TABLE `alur`
  MODIFY `alur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `waktu_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
