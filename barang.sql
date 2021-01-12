-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2019 at 06:11 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang2`
--

CREATE TABLE `barang2` (
  `id` int(30) NOT NULL,
  `nama` text NOT NULL,
  `stock` text NOT NULL,
  `harga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang2`
--

INSERT INTO `barang2` (`id`, `nama`, `stock`, `harga`) VALUES
(1, 'Oreo', '100', '1500'),
(2, 'ira', '4', '30000'),
(3, 'LASIDO', '4', '100000'),
(4, 'LASIDO', '4', '100000'),
(5, 'DOSILA', '4', '10000'),
(6, 'doremi', '4', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `details_penjualan`
--

CREATE TABLE `details_penjualan` (
  `no_transaksi` int(10) NOT NULL,
  `kode_minuman` int(10) DEFAULT NULL,
  `nama_minuman` varchar(20) DEFAULT NULL,
  `toping` varchar(20) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details_penjualan`
--

INSERT INTO `details_penjualan` (`no_transaksi`, `kode_minuman`, `nama_minuman`, `toping`, `harga`, `quantity`) VALUES
(51, 1, NULL, NULL, 7000, 1),
(52, 4, NULL, NULL, 8000, 1),
(53, 3, NULL, NULL, 8000, 1),
(54, 2, NULL, NULL, 7000, 1),
(55, 2, NULL, NULL, 7000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualann`
--

CREATE TABLE `detail_penjualann` (
  `no_transaksi` int(10) NOT NULL,
  `kode_minuman` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga_satuan` int(5) NOT NULL,
  `sub_total` int(5) NOT NULL,
  `level_gula` int(5) NOT NULL,
  `level_es` int(5) NOT NULL,
  `toping` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `no_faktur` int(5) NOT NULL,
  `no_transaksi` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `pembeli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`no_faktur`, `no_transaksi`, `tanggal`, `pembeli`) VALUES
(7, 0, '2018-12-06', 'sagong'),
(8, 0, '2018-12-07', 'sagong'),
(9, 0, '2018-12-07', 'sagong'),
(10, 0, '2018-12-05', 'sagong'),
(11, 0, '2018-12-05', 'sagong'),
(12, 0, '2018-12-05', 'sagong'),
(13, 0, '2018-12-05', 'sagong'),
(14, 0, '2018-12-05', 'sagong'),
(15, 0, '2018-12-05', 'sagong'),
(16, 0, '2018-12-05', 'sagong'),
(17, 0, '2018-12-05', 'sagong'),
(18, 0, '2018-12-05', 'sagong'),
(19, 0, '2018-12-28', 'sagong'),
(20, 0, '2018-12-31', 'juminten'),
(21, 0, '2018-12-03', 'sagong');

-- --------------------------------------------------------

--
-- Table structure for table `header_penjualan`
--

CREATE TABLE `header_penjualan` (
  `no_transaksi` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `pembeli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_penjualan`
--

INSERT INTO `header_penjualan` (`no_transaksi`, `tanggal`, `pembeli`) VALUES
(51, '2019-01-31', '2019-01-31'),
(52, '2019-01-31', '2019-01-31'),
(53, '2019-01-31', '2019-01-31'),
(54, '2019-01-31', '2019-01-31'),
(55, '2019-01-31', '2019-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(10) NOT NULL,
  `kode_minuman` int(10) NOT NULL,
  `nama_minuman` varchar(20) NOT NULL,
  `toping` varchar(20) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Kasir','Manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `password`, `level`) VALUES
(1, 'funny', '12345', 'Kasir'),
(3, 'ira', 'qwerty', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `kode_minuman` int(5) NOT NULL,
  `nama_minuman` varchar(20) NOT NULL,
  `toping` varchar(20) NOT NULL,
  `harga` int(5) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`kode_minuman`, `nama_minuman`, `toping`, `harga`, `quantity`) VALUES
(1, 'Doremi', 'Candy', 7000, 5),
(2, 'Remifa', 'Oreo', 7000, 5),
(3, 'Mifasol', 'Jelly', 8000, 5),
(4, 'Lafare', 'Crispy Ball', 8000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hobi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `password`, `hobi`) VALUES
(3, 'ira', '123456', 'membaca'),
(4, 'funny', '123qa', 'bernyanyi'),
(5, 'ira', '12345', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_input`
--

CREATE TABLE `t_input` (
  `tanggal` date NOT NULL,
  `pembeli` varchar(20) NOT NULL,
  `no_faktur` varchar(5) NOT NULL,
  `no_transaksi` varchar(5) NOT NULL,
  `kode_minuman` varchar(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga_satuan` int(5) NOT NULL,
  `sub_total` int(5) NOT NULL,
  `level_gula` int(5) NOT NULL,
  `level_es` int(5) NOT NULL,
  `toping` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_input`
--

INSERT INTO `t_input` (`tanggal`, `pembeli`, `no_faktur`, `no_transaksi`, `kode_minuman`, `jumlah`, `harga_satuan`, `sub_total`, `level_gula`, `level_es`, `toping`) VALUES
('2018-12-11', 'sagong', '111', '111', '55', 2, 5000, 10000, 3, 5, 'oreo'),
('2018-12-19', 'dwi', '1111', '1111', '44', 8, 5000, 40000, 9, 10, 'ciki'),
('2018-12-04', 'wqd', '12ea', '12ea', '124ea', 24, 0, 23, 32, 324, '32tra'),
('2018-12-19', 'ajhs', '2142', '2142', '1423d', 0, 0, 0, 0, 0, 'afda'),
('2018-12-12', 'juminten', '44', '44', '666', 2, 5000, 10000, 4, 3, 'bubble'),
('2018-12-06', 'loxo', '55', '55', 'do', 2, 5000, 10000, 4, 3, 'guli'),
('2018-12-05', 'gogo', '66', '66', '55', 6, 5000, 30000, 6, 7, 'yuhu'),
('2018-12-10', 'sugeng', '88', '88', '11', 4, 5000, 20000, 3, 5, 'guli'),
('2018-12-10', 'cici', '99', '99', 'do', 2, 5000, 10000, 6, 8, 'guli'),
('2018-12-11', 'sakJCkA', 'i2u3i', 'i2u3i', '32uye', 0, 0, 721, 0, 0, '28372'),
('2018-12-18', 'gideon', 'k00', 'k00', 'mi', 10, 5000, 50000, 7, 8, 'keju'),
('2018-12-12', 'juminten', 'k111', 'k111', 'k234', 4, 5000, 20000, 5, 5, 'candy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang2`
--
ALTER TABLE `barang2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details_penjualan`
--
ALTER TABLE `details_penjualan`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `detail_penjualann`
--
ALTER TABLE `detail_penjualann`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `header_penjualan`
--
ALTER TABLE `header_penjualan`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`kode_minuman`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_input`
--
ALTER TABLE `t_input`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang2`
--
ALTER TABLE `barang2`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `details_penjualan`
--
ALTER TABLE `details_penjualan`
  MODIFY `no_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `detail_penjualann`
--
ALTER TABLE `detail_penjualann`
  MODIFY `no_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `no_faktur` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `header_penjualan`
--
ALTER TABLE `header_penjualan`
  MODIFY `no_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `minuman`
--
ALTER TABLE `minuman`
  MODIFY `kode_minuman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
