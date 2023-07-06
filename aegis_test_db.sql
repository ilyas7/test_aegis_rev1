-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jul 2023 pada 16.55
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aegis_test_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `ID` int(11) NOT NULL,
  `INPUTBY` varchar(11) NOT NULL,
  `INPUTTIME` datetime NOT NULL,
  `UPDATEBY` varchar(11) NOT NULL,
  `UPDATETIME` datetime NOT NULL,
  `ITEM_CODE` varchar(11) NOT NULL,
  `ITEM_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID`, `INPUTBY`, `INPUTTIME`, `UPDATEBY`, `UPDATETIME`, `ITEM_CODE`, `ITEM_NAME`) VALUES
(1, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '123', 'celana'),
(2, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '456', 'baju');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `ID` int(11) NOT NULL,
  `INPUTBY` varchar(11) NOT NULL,
  `INPUTTIME` datetime NOT NULL,
  `ITEM_CODE` varchar(11) NOT NULL,
  `FINAL_QTY` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`ID`, `INPUTBY`, `INPUTTIME`, `ITEM_CODE`, `FINAL_QTY`) VALUES
(1, '123', '2023-07-06 21:19:56', '123', 17),
(2, '123', '2023-07-06 21:43:32', '456', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `ID` int(11) NOT NULL,
  `INPUTBY` varchar(11) NOT NULL,
  `INPUTTIME` datetime NOT NULL,
  `ITEM_CODE` varchar(11) NOT NULL,
  `QTY_IN` int(10) NOT NULL,
  `QTY_OUT` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID`, `INPUTBY`, `INPUTTIME`, `ITEM_CODE`, `QTY_IN`, `QTY_OUT`) VALUES
(3, '123', '2023-07-06 14:33:47', '123', 0, 1),
(4, '123', '2023-07-06 14:37:35', '456', 0, 1),
(18, '123', '2023-07-06 21:19:56', '123', 0, 1),
(19, '123', '2023-07-06 21:43:32', '456', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL,
  `NIK` varchar(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `LEVEL` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID`, `NIK`, `NAME`, `PASSWORD`, `LEVEL`) VALUES
(1, '123', 'ILYAS', '202cb962ac59075b964b07152d234b70', 'ADMIN'),
(2, '456', 'EKA', '250cf8b51c773f3f8dc8b4be867a9a02', 'KASIR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
