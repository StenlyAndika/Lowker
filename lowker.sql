-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 02:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lowker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `pass` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jaminansosial`
--

CREATE TABLE `jaminansosial` (
  `idj` int(11) NOT NULL,
  `idl` varchar(10) NOT NULL,
  `jaminan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jaminansosial`
--

INSERT INTO `jaminansosial` (`idj`, `idl`, `jaminan`) VALUES
(4, '2', 'Lembur'),
(5, '2', 'Pakaian Kerja'),
(6, '2', 'Kecelakaan');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `idl` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `namajabatan` text NOT NULL,
  `jumlahformasi` int(11) NOT NULL,
  `laki` int(11) NOT NULL,
  `perempuan` int(11) NOT NULL,
  `pendidikanminimal` text NOT NULL,
  `persyaratan` text NOT NULL,
  `sistempengupahan` text NOT NULL,
  `gajiperbulan` double NOT NULL,
  `statushubungan` text NOT NULL,
  `jumlahjamkerja` text NOT NULL,
  `uraiansingkat` text NOT NULL,
  `uraiantugas` text NOT NULL,
  `bataswaktu` varchar(20) NOT NULL,
  `namakontak` text NOT NULL,
  `nomorkontak` text NOT NULL,
  `jabatankontak` text NOT NULL,
  `tglposting` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `dokumen` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`idl`, `idp`, `namajabatan`, `jumlahformasi`, `laki`, `perempuan`, `pendidikanminimal`, `persyaratan`, `sistempengupahan`, `gajiperbulan`, `statushubungan`, `jumlahjamkerja`, `uraiansingkat`, `uraiantugas`, `bataswaktu`, `namakontak`, `nomorkontak`, `jabatankontak`, `tglposting`, `status`, `dokumen`) VALUES
(2, 1, 'ODGJ', 1, 1, 0, 'S3', '<p>Ketik REG spasi ODGJ kirim ke 6969</p>\r\n', 'Borongan', 15000, 'Waktu Tidak Tentu', '23', '<p>Mendalami Peran Sebagai ODGJ Ternama</p>\r\n', '<p>- Tidak Mandi</p>\r\n\r\n<p>- Always Happy</p>\r\n', '22-06-2022', 'Budi', '081828382828', 'Rentenir', '21-06-2022', 1, 'Proposal181.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idm` int(11) NOT NULL,
  `email` text NOT NULL,
  `nama` text NOT NULL,
  `nohp` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idm`, `email`, `nama`, `nohp`, `password`) VALUES
(1, 'budi@gmail.com', 'budi', '081232328376', 'budi');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `idp` int(11) NOT NULL,
  `namaperusahaan` text NOT NULL,
  `idm` int(11) NOT NULL,
  `npwp` text NOT NULL,
  `lapangan` text NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `kelurahan` text NOT NULL,
  `kecamatan` text NOT NULL,
  `kabupaten` text NOT NULL,
  `provinsi` text NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` text NOT NULL,
  `status` int(11) NOT NULL,
  `dokumen` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`idp`, `namaperusahaan`, `idm`, `npwp`, `lapangan`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kodepos`, `telp`, `email`, `status`, `dokumen`) VALUES
(1, 'Mancing', 1, '123', 'Ngepet', '<p>Marineford</p>\r\n', 1, 2, 'Mariejoa', 'East Blue', 'Wano', 'Skypiea', '12092', '081727382727', 'contact@mancing.com', 1, 'shoe.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `jaminansosial`
--
ALTER TABLE `jaminansosial`
  ADD PRIMARY KEY (`idj`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`idl`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idm`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`idp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jaminansosial`
--
ALTER TABLE `jaminansosial`
  MODIFY `idj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `idl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
