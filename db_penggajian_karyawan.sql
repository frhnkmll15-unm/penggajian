-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2019 at 01:22 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penggajian_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `kd_absen` int(11) NOT NULL,
  `bulan` varchar(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `izin` varchar(15) NOT NULL,
  `hadir` varchar(15) NOT NULL,
  `tdk_hadir` varchar(15) NOT NULL,
  `nik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`kd_absen`, `bulan`, `tahun`, `izin`, `hadir`, `tdk_hadir`, `nik`) VALUES
(2, '07', 2019, '33', '33', '33', '98745968745986'),
(4, '12', 2019, '12', '123', '12', '98745968745986');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `kd_gaji` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `per_jam` varchar(25) NOT NULL,
  `jml_jam_ngajar` int(11) NOT NULL,
  `jml_gaji` varchar(15) NOT NULL,
  `piket` varchar(12) NOT NULL,
  `non_sertikasi` varchar(15) NOT NULL,
  `bpjs` varchar(15) NOT NULL,
  `potongan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`kd_gaji`, `nik`, `bulan`, `tahun`, `per_jam`, `jml_jam_ngajar`, `jml_gaji`, `piket`, `non_sertikasi`, `bpjs`, `potongan`) VALUES
(1, '98745968745986', 4, 2019, '60000', 30, '1800000', '400000', '200000', '3000000', '5000'),
(5, '98745968745986', 4, 2019, '60000', 2, '120000', '60000', '700000', '70000', '8000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `kd_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(35) NOT NULL,
  `honor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`kd_jabatan`, `nm_jabatan`, `honor`) VALUES
(2, 'Kepala sekolah', '43534534'),
(3, 'Kepala Labor', '400000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `nik` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `nm_karyawan` varchar(35) NOT NULL,
  `kd_jabatan` int(15) NOT NULL,
  `stt_perkawinan` enum('Single','Menikah') NOT NULL,
  `stt_karyawan` varchar(35) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `th_masuk` year(4) NOT NULL,
  `rekening` varchar(30) NOT NULL,
  `nm_bank` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`nik`, `foto`, `nm_karyawan`, `kd_jabatan`, `stt_perkawinan`, `stt_karyawan`, `jekel`, `telp`, `alamat`, `email`, `th_masuk`, `rekening`, `nm_bank`) VALUES
('65456456', 'file_1554677806.jpg', 'junaidi', 3, 'Menikah', 'Kontrak', 'Laki-laki', '085235587687', 'sdfsdfsd', 'fsdfsd@gmail.com', 2019, '4534534', 'BANK BNI'),
('98745968745986', 'file_1554677892.jpg', 'Jono', 3, 'Menikah', 'Tetap', 'Laki-laki', '086475656565', 'asdasdasda', 'jono@gmail.com', 2019, '67567567657', 'BANK BCA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `kd_pinjam` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `pinjaman` varchar(25) NOT NULL,
  `dikembalikan` varchar(25) NOT NULL,
  `sisa` varchar(35) NOT NULL,
  `stt_pinjaman` enum('Pinjam','Lunas') NOT NULL,
  `tgl_peminjaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pinjaman`
--

INSERT INTO `tb_pinjaman` (`kd_pinjam`, `nik`, `pinjaman`, `dikembalikan`, `sisa`, `stt_pinjaman`, `tgl_peminjaman`) VALUES
(3424237, '98745968745986', '5000000', '0', '5000000', 'Pinjam', '2019-04-08'),
(3424238, '65456456', '700000', '700000', '0', 'Lunas', '2019-04-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`kd_absen`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`kd_gaji`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`kd_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `kd_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `kd_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `kd_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `kd_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3424239;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
