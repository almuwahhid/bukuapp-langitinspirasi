-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2020 at 09:09 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `nama_admin`, `password_admin`) VALUES
(1, 'admin', '', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(3) NOT NULL,
  `id_penulis` int(3) NOT NULL,
  `nama_buku` varchar(225) NOT NULL,
  `harga` int(12) NOT NULL,
  `tahun_terbit` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_penulis`, `nama_buku`, `harga`, `tahun_terbit`) VALUES
(6, 1, 'Buku Money', 50000, 2000),
(7, 1, 'Bukuku Kamu', 32000, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `buku_penulis`
--

CREATE TABLE `buku_penulis` (
  `id_bukupenulis` int(3) NOT NULL,
  `id_penulis` int(3) NOT NULL,
  `id_buku` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_penulis`
--

INSERT INTO `buku_penulis` (`id_bukupenulis`, `id_penulis`, `id_buku`) VALUES
(2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `nama_pemilik` varchar(150) NOT NULL,
  `jk_pemilik` enum('L','P') NOT NULL DEFAULT 'L',
  `username_pemilik` varchar(225) NOT NULL,
  `password_pemilik` varchar(225) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama_pemilik`, `jk_pemilik`, `username_pemilik`, `password_pemilik`, `date_registered`) VALUES
(1, 'Pandu Sula ', 'L', 'pandu', '202cb962ac59075b964b07152d234b70', '2020-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_buku`
--

CREATE TABLE `penjualan_buku` (
  `id_penjualan_buku` int(4) NOT NULL,
  `id_buku` int(4) NOT NULL,
  `jumlah_penjualan` int(3) NOT NULL,
  `tanggal_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_buku`
--

INSERT INTO `penjualan_buku` (`id_penjualan_buku`, `id_buku`, `jumlah_penjualan`, `tanggal_penjualan`) VALUES
(1, 7, 25, '2020-05-01'),
(2, 6, 34, '2020-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(225) NOT NULL,
  `email_penulis` varchar(225) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `jk_penulis` enum('L','P') NOT NULL DEFAULT 'L',
  `username_penulis` varchar(225) NOT NULL,
  `password_penulis` varchar(225) NOT NULL,
  `penulis_date_registered` date NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`, `email_penulis`, `active`, `jk_penulis`, `username_penulis`, `password_penulis`, `penulis_date_registered`, `hash`) VALUES
(1, 'Dexter', 'dexter@gmail.com', 1, 'L', 'dexters', '81dc9bdb52d04dc20036dbd8313ed055', '2020-04-22', ''),
(23, 'Muhammad Abdullah Al Muwahhd', 'muh.almuwahhid@gmail.com', 1, 'L', 'bangbang', '202cb962ac59075b964b07152d234b70', '2020-05-03', '5d3c97b3d0a0b9e6e72fea73b5e19578'),
(28, 'Panduuu', 'gueone.akakom@gmail.com', 1, 'L', 'pandu', '202cb962ac59075b964b07152d234b70', '2020-06-01', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `buku_penulis`
--
ALTER TABLE `buku_penulis`
  ADD PRIMARY KEY (`id_bukupenulis`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indexes for table `penjualan_buku`
--
ALTER TABLE `penjualan_buku`
  ADD PRIMARY KEY (`id_penjualan_buku`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `buku_penulis`
--
ALTER TABLE `buku_penulis`
  MODIFY `id_bukupenulis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan_buku`
--
ALTER TABLE `penjualan_buku`
  MODIFY `id_penjualan_buku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
