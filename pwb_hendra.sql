-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2025 at 07:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwb_hendra`
--

-- --------------------------------------------------------

--
-- Table structure for table `ada`
--

CREATE TABLE `ada` (
  `no_pesanan` varchar(10) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `th` int(3) NOT NULL,
  `harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(3) NOT NULL,
  `harga` int(8) NOT NULL,
  `berat` int(3) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `stok`, `harga`, `berat`, `satuan`, `keterangan`, `gambar`) VALUES
('1', 'tes', 1, 200000, 20, '10', '1', 'josh-bean-Gecsh_1GOz4-unsplash.jpg'),
('2', 'tes', 3, 250000, 3, 'kg', 'tes', 'josh-bean-Gecsh_1GOz4-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `kd_ekspedisi` varchar(10) NOT NULL,
  `nama_ekspedisi` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `ongkir` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekspedisi`
--

INSERT INTO `ekspedisi` (`kd_ekspedisi`, `nama_ekspedisi`, `tujuan`, `ongkir`) VALUES
('1', 'jne ekspedisi', 'sungailiat', 200000),
('2', 'jne kargo id', 'Toboali', 245000);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kd_obat` varchar(5) NOT NULL,
  `nm_obat` varchar(50) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `jenis_obat` varchar(25) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nm_obat`, `satuan`, `jenis_obat`, `stok`) VALUES
('1', 'tes1', 'tes1', 'tes1', 2),
('4', 'paracetamol ultra pro max', 'pack', 'obat keras', 100);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kd_pelanggan` varchar(3) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  `kota_pelanggan` varchar(50) NOT NULL,
  `telp_pelanggan` varchar(15) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kd_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `kota_pelanggan`, `telp_pelanggan`, `email_pelanggan`, `password`) VALUES
('1', 'novi yunita', 'jakarta barat, indonesia', 'jakarta', '082788271281', 'noviynita@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
('2', 'via lestari', 'jalan sisingamangaraja no 3 kudai', 'sungailiat', '087277717652', 'vialestari@gmail.com', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kd_pembayaran` varchar(10) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `no_pesanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `no_pesanan` varchar(10) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kd_ekspedisi` varchar(10) NOT NULL,
  `kd_pelanggan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ada`
--
ALTER TABLE `ada`
  ADD KEY `no_pesanan` (`no_pesanan`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`kd_ekspedisi`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kd_pembayaran`),
  ADD KEY `no_pesanan` (`no_pesanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no_pesanan`),
  ADD KEY `kd_ekspedisi` (`kd_ekspedisi`),
  ADD KEY `kd_pelanggan` (`kd_pelanggan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ada`
--
ALTER TABLE `ada`
  ADD CONSTRAINT `ada_ibfk_1` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`),
  ADD CONSTRAINT `ada_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`kd_ekspedisi`) REFERENCES `ekspedisi` (`kd_ekspedisi`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`kd_pelanggan`) REFERENCES `pelanggan` (`kd_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
