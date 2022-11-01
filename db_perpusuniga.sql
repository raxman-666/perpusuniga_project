-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 01, 2022 at 05:27 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpusuniga`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_dosen`
--

DROP TABLE IF EXISTS `t_dosen`;
CREATE TABLE IF NOT EXISTS `t_dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(14) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_dosen`
--

INSERT INTO `t_dosen` (`id_dosen`, `nama_dosen`, `alamat`, `telepon`) VALUES
(1, 'Pak David', 'Malang', '081398765177'),
(2, 'Bu Resti', 'Malang', '087625772556'),
(6, 'Dimas Rovi', 'Lamongan', '085706123869');

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwalkuliah`
--

DROP TABLE IF EXISTS `t_jadwalkuliah`;
CREATE TABLE IF NOT EXISTS `t_jadwalkuliah` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam` time NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `id_matkul` (`id_matkul`),
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jadwalkuliah`
--

INSERT INTO `t_jadwalkuliah` (`id_jadwal`, `hari`, `jam`, `id_matkul`, `id_dosen`) VALUES
(1, 'Senin', '10:00:00', 2, 2),
(2, 'Selasa', '09:00:00', 1, 1),
(4, 'Rabu', '08:15:00', 2, 1),
(5, 'Kamis', '09:30:00', 1, 2),
(6, 'Jumat', '13:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_jurusan`
--

DROP TABLE IF EXISTS `t_jurusan`;
CREATE TABLE IF NOT EXISTS `t_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jurusan` varchar(30) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jurusan`
--

INSERT INTO `t_jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`) VALUES
(1, 'A001', 'Sistem Informasi'),
(2, 'A002', 'Teknik Informatika'),
(3, 'A003', 'Teknik Elektro'),
(6, 'A004', 'Teknik Mesin'),
(7, 'A005', 'Teknik Sipil');

-- --------------------------------------------------------

--
-- Table structure for table `t_mahasiswa`
--

DROP TABLE IF EXISTS `t_mahasiswa`;
CREATE TABLE IF NOT EXISTS `t_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(30) DEFAULT NULL,
  `nim` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `username` char(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_mahasiswa`),
  KEY `id_jurusan` (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_mahasiswa`
--

INSERT INTO `t_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `id_jurusan`, `alamat`, `username`, `password`) VALUES
(39, 'yoza', 21510015, 2, 'Gresik', 'civilioz', 'inipassword'),
(44, 'prasta', 21510020, 3, 'Malang', 'raxmans', 'inipassword'),
(45, 'Dimas', 21510001, 2, 'Lamongan', 'dhymm', 'inipassword'),
(79, 'Tegar', 131231, 1, 'Malang', 'Xate', 'inipassword');

-- --------------------------------------------------------

--
-- Table structure for table `t_matakuliah`
--

DROP TABLE IF EXISTS `t_matakuliah`;
CREATE TABLE IF NOT EXISTS `t_matakuliah` (
  `id_matkul` int(11) NOT NULL AUTO_INCREMENT,
  `nama_matkul` varchar(30) NOT NULL,
  `kode_matkul` varchar(30) NOT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_matakuliah`
--

INSERT INTO `t_matakuliah` (`id_matkul`, `nama_matkul`, `kode_matkul`) VALUES
(1, 'Pemrograman Internet', 'M001'),
(2, 'Pemrograman Berbasis Objek', 'M002'),
(4, 'Tugas Pengembangan Solusi I', 'M003');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_jadwalkuliah`
--
ALTER TABLE `t_jadwalkuliah`
  ADD CONSTRAINT `t_jadwalkuliah_ibfk_1` FOREIGN KEY (`id_matkul`) REFERENCES `t_matakuliah` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_jadwalkuliah_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `t_dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_mahasiswa`
--
ALTER TABLE `t_mahasiswa`
  ADD CONSTRAINT `t_mahasiswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `t_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
