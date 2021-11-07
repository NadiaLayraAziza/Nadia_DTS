-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 10:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nm_admin` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nm_admin`, `username`, `password`) VALUES
(1, 'Admin', 'jwd', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbanggota`
--

CREATE TABLE `tbanggota` (
  `idanggota` varchar(5) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 NOT NULL,
  `jeniskelamin` varchar(10) CHARACTER SET latin1 NOT NULL,
  `alamat` varchar(40) CHARACTER SET latin1 NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbanggota`
--

INSERT INTO `tbanggota` (`idanggota`, `nama`, `jeniskelamin`, `alamat`, `status`, `foto`) VALUES
('AG001', 'Ji Chang Wook', 'Pria', 'Korea Selatan', 'Meminjam', 'AG001.jpg'),
('AG002', 'Rosabela Izzah', 'Wanita', 'Pasuruan   ', 'Tidak Meminjam', 'AG002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbbuku`
--

CREATE TABLE `tbbuku` (
  `idbuku` varchar(5) CHARACTER SET latin1 NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pengarang` varchar(100) CHARACTER SET latin1 NOT NULL,
  `penerbit` varchar(100) CHARACTER SET latin1 NOT NULL,
  `jmlbuku` int(11) NOT NULL,
  `isbn` varchar(20) CHARACTER SET latin1 NOT NULL,
  `thnterbit` int(11) NOT NULL,
  `lokasi` varchar(30) CHARACTER SET latin1 NOT NULL,
  `cover` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbbuku`
--

INSERT INTO `tbbuku` (`idbuku`, `judul`, `pengarang`, `penerbit`, `jmlbuku`, `isbn`, `thnterbit`, `lokasi`, `cover`) VALUES
('BK001', 'Dunia Bunga', 'Pak Kolonel', 'PT. Sinar Ilmu', 19, 'AI98PA201121000', 2015, 'rak2', 'BK001.jpg'),
('BK002', 'Matematika', 'My Wall', 'Chocomedia', 27, 'PW001298XM', 2020, 'rak1', 'BK002.jpg'),
('BK003', 'Belajar Pemrograman Java', 'Abdul Kadir', 'PT. Restu Ibu', 31, 'KUIC093EJ2', 2014, 'rak3', 'BK003.jpg'),
('BK004', 'Pemrograman Android', 'Cinderella', 'Mediamurah', 20, '52BGJ091DG', 2019, 'rak1', 'BK004.jpg'),
('BK005', 'Seputar Investasi', 'Hasanuddin', 'Chocomedia', 40, '5RT12OKNHT', 2010, 'rak1', 'BK005.jpg'),
('BK006', 'Jaringan Komputer', 'Amanda', 'Kompasmedia', 64, 'U7CV34CK12', 2016, 'rak3', 'BK006.jpg'),
('BK007', 'Bahasa Indoenesia XII', 'Prof. Muhammad', 'FunMedia', 14, '8UMN456VSD', 2019, 'rak2', 'BK007.png'),
('BK008', 'Money Grow', 'Nadia Layra', 'Mediamurah', 49, '4BNU78D461', 2015, 'rak1', 'BK008.jpg'),
('BK009', 'Arsitektur', 'Natasya Wilona', 'Kompasmedia', 35, '7IMN12GBN5', 2020, 'rak3', 'BK009.jpg'),
('BK010', 'Ruang Modern', 'Xavier', 'FunMedia', 17, 'FMN45TB128', 2017, 'rak1', 'BK010.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `idtransaksi` varchar(5) NOT NULL,
  `idanggota` varchar(5) NOT NULL,
  `idbuku` varchar(5) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglkembali` date NOT NULL,
  `status_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`idtransaksi`, `idanggota`, `idbuku`, `tglpinjam`, `tglkembali`, `status_transaksi`) VALUES
('TR001', 'AG003', 'BK002', '2021-08-23', '2021-09-02', 'Kembali'),
('TR002', 'AG005', 'BK001', '2021-08-23', '2021-09-02', 'Kembali'),
('TR003', 'AG001', 'BK003', '2021-08-24', '2021-08-31', 'Pinjam'),
('TR004', 'AG002', 'BK004', '2021-08-24', '2021-09-02', 'Kembali'),
('TR005', 'AG004', 'BK005', '2021-08-25', '2021-09-02', 'Kembali'),
('TR006', 'AG006', 'BK006', '2021-08-25', '2021-09-02', 'Kembali'),
('TR007', 'AG007', 'BK001', '2021-08-26', '2021-09-02', 'Pinjam'),
('TR008', 'AG008', 'BK007', '2021-08-26', '2021-09-02', 'Pinjam'),
('TR009', 'AG009', 'BK008', '2021-08-27', '2021-09-10', 'Pinjam'),
('TR010', 'AG011', 'BK009', '2021-08-27', '2021-09-03', 'Pinjam'),
('TR011', 'AG010', 'BK010', '2021-08-30', '2021-09-06', 'Pinjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`idanggota`);

--
-- Indexes for table `tbbuku`
--
ALTER TABLE `tbbuku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
