-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 06:28 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam_medis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(5) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `jk_dokter` varchar(15) NOT NULL,
  `alamat_dokter` varchar(30) NOT NULL,
  `umur` int(10) NOT NULL,
  `stts` enum('1','0') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `jk_dokter`, `alamat_dokter`, `umur`, `stts`) VALUES
(16, 'aa', 'Laki-laki', 'aa', 22, '0'),
(25, '', '', '', 0, '0'),
(26, 'Hardyan Nurachman', 'Laki-laki', 'candi pawon, semarang', 23, '1'),
(27, 'reni indri astuti', 'Perempuan', 'dfsdj                   ', 23, '1'),
(24, 'riko herdyansyah', 'Laki-laki', '                     semarang ', 33, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(10) NOT NULL,
  `nik_pasien` varchar(25) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `umur` int(10) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_pasien` text NOT NULL,
  `tgl_daftar` date NOT NULL,
  `stts` enum('1','0') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nik_pasien`, `nama_pasien`, `umur`, `jk`, `tgl_lahir`, `alamat_pasien`, `tgl_daftar`, `stts`) VALUES
(38, '', 'ana', 50, 'Perempuan', '2018-05-09', 'bb', '2018-05-01', '0'),
(39, '', 'eva kurnia', 12, 'Perempuan', '0654-05-04', '5454', '0000-00-00', '0'),
(40, 'A11201307899', 'indra gunawan', 21, 'Laki-laki', '1997-04-21', 'semarang tengah', '2018-05-22', '1'),
(41, 'A11201307819', 'yossi rosyanti', 23, 'Perempuan', '1995-04-23', 'ngaliyan', '2018-05-22', '1'),
(42, 'A11201307811', 'EDO', 90, 'Perempuan', '2017-12-31', '352', '2017-12-30', '1'),
(43, 'A11201307810', 'danu', 9, 'Laki-laki', '2018-12-31', 'jh', '2018-12-31', '1'),
(44, 'A11201307809', 'yossi rosyanti', 31, 'Perempuan', '1995-08-25', 'boja', '0000-00-00', '1'),
(45, 'A11201307808', 'riana', 33, 'Perempuan', '1987-11-12', 'semarang cuy', '2018-05-22', '1'),
(46, 'A11201307807', 'firman', 11, 'Laki-laki', '1999-01-11', 'jhkjhjkhkjhk', '2018-05-26', '1'),
(47, 'D4687463515', 'rendi sanjaya', 25, 'Laki-laki', '1993-02-10', 'boyolali', '2018-05-29', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `no_pendaftaran` int(10) NOT NULL,
  `id_pasien` int(20) NOT NULL,
  `id_dokter` int(20) NOT NULL,
  `tgl_periksa` varchar(25) NOT NULL,
  `waktu_pendaftaran` varchar(25) NOT NULL,
  `stts` enum('1','2','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`no_pendaftaran`, `id_pasien`, `id_dokter`, `tgl_periksa`, `waktu_pendaftaran`, `stts`) VALUES
(6, 42, 26, '08:40:40 26-05-2018', '08:40:01 26-05-2018', '2'),
(7, 41, 24, '08:59:43 26-05-2018', '08:41:19 26-05-2018', '2'),
(8, 45, 26, '09:07:33 26-05-2018', '08:57:16 26-05-2018', '2'),
(9, 43, 27, '10:38:10 26-05-2018', '10:37:12 26-05-2018', '2'),
(10, 40, 26, '17:33:07 28-05-2018', '17:32:22 28-05-2018', '2'),
(11, 41, 27, '', '17:32:46 28-05-2018', '1'),
(12, 45, 27, '', '17:34:50 28-05-2018', '1'),
(13, 40, 26, '', '22:48:06 29-05-2018', '1'),
(14, 43, 26, '', '22:49:46 29-05-2018', '1'),
(15, 41, 27, '', '22:49:57 29-05-2018', '1'),
(16, 45, 24, '', '22:50:05 29-05-2018', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekam_medis`
--

CREATE TABLE `tb_rekam_medis` (
  `id` int(5) NOT NULL,
  `id_pasien` int(10) NOT NULL,
  `id_dokter` int(5) NOT NULL,
  `tgl_periksa` varchar(25) NOT NULL,
  `umur` int(5) NOT NULL,
  `terapi` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekam_medis`
--

INSERT INTO `tb_rekam_medis` (`id`, `id_pasien`, `id_dokter`, `tgl_periksa`, `umur`, `terapi`, `diagnosa`) VALUES
(11, 43, 27, '10:38:10 26-05-2018', 33, 'bodrek                     ', 'sakit jiwa'),
(10, 45, 26, '09:07:33 26-05-2018', 22, 'di ingatkan                     ', 'lupa'),
(9, 41, 24, '08:59:43 26-05-2018', 12, 'hjjh                     ', 'jjj'),
(8, 42, 26, '08:40:40 26-05-2018', 22, 'paracetamol', 'panas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_pengguna` int(5) NOT NULL,
  `id_dokter` int(5) DEFAULT NULL,
  `pengguna` varchar(50) NOT NULL,
  `sandi` varchar(50) NOT NULL,
  `hak_akses` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_pengguna`, `id_dokter`, `pengguna`, `sandi`, `hak_akses`) VALUES
(1, 16, 'adi', 'adi', '2'),
(10, 24, '69', '88', '2'),
(11, 25, '', '', '2'),
(12, 26, 'harno', 'harno123', '2'),
(13, 27, '123', '123', '2'),
(15, 0, 'admin', 'admin2', '1'),
(16, 0, 'kepala', 'kepala', '3'),
(17, 0, 'kepala123', 'kepala123', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indexes for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  MODIFY `no_pendaftaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
