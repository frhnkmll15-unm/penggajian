-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2022 pada 08.26
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensi`
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
-- Dumping data untuk tabel `tb_absensi`
--

INSERT INTO `tb_absensi` (`kd_absen`, `bulan`, `tahun`, `izin`, `hadir`, `tdk_hadir`, `nik`) VALUES
(5, '01', 2022, '0', '20', '0', '161921'),
(6, '01', 2022, '0', '20', '0', '161922');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensi_karyawan`
--

CREATE TABLE `tb_absensi_karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status_absen` varchar(50) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_absensi_karyawan`
--

INSERT INTO `tb_absensi_karyawan` (`id`, `nik`, `tanggal`, `jam`, `status_absen`, `status`) VALUES
(7, '65456456', '2022-01-23', '13:22:13', 'masuk', 1),
(12, '98745968745986', '2022-01-24', '13:49:24', 'masuk', 1),
(13, '98745968745986', '2022-01-23', '13:49:25', 'keluar', 1),
(14, '161921', '2022-02-09', '13:05:00', 'masuk', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gaji`
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
-- Dumping data untuk tabel `tb_gaji`
--

INSERT INTO `tb_gaji` (`kd_gaji`, `nik`, `bulan`, `tahun`, `per_jam`, `jml_jam_ngajar`, `jml_gaji`, `piket`, `non_sertikasi`, `bpjs`, `potongan`) VALUES
(1, '98745968745986', 4, 2019, '60000', 30, '1800000', '400000', '200000', '3000000', '5000'),
(5, '98745968745986', 4, 2019, '', 0, '0', '60000', '700000', '70000', '8000'),
(8, '161921', 1, 2022, '', 0, '2400000', '50000', '50000', '100000', '0'),
(9, '161922', 1, 2022, '', 0, '', '50000', '50000', '100000', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `kd_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(35) NOT NULL,
  `honor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`kd_jabatan`, `nm_jabatan`, `honor`) VALUES
(4, 'Admin', '2400000'),
(5, 'Guru Paud', '2400000'),
(6, 'Guru SD', '2500000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
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
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `th_masuk` year(4) NOT NULL,
  `rekening` varchar(30) NOT NULL,
  `nm_bank` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`nik`, `foto`, `nm_karyawan`, `kd_jabatan`, `stt_perkawinan`, `stt_karyawan`, `jekel`, `telp`, `alamat`, `email`, `username`, `password`, `th_masuk`, `rekening`, `nm_bank`) VALUES
('161921', 'file_1644346364.jpg', 'Noni', 4, 'Menikah', 'Kontrak', 'Perempuan', '085155436816', 'Jl Hajih Najih, Petukangan Utara, Pesanggrahan', 'noniandani@gmail.com', 'noni', '21232f297a57a5a743894a0e4a801fc3', 2018, '1270009906693', 'BANK MANDIRI'),
('161922', 'file_1644346534.jpg', 'Hafifah Aini', 6, '', 'Kontrak', 'Perempuan', '087822408751', 'Jl Karyawan 1, Karang Tengah, Ciledug', 'hafifaaini11@gmail.com', 'hafifa', '21232f297a57a5a743894a0e4a801fc3', 2020, '6800226753', 'BANK BCA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_owner`
--

CREATE TABLE `tb_owner` (
  `id_owner` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_owner`
--

INSERT INTO `tb_owner` (`id_owner`, `username`, `password`, `nama`) VALUES
(1, 'owner', '21232f297a57a5a743894a0e4a801fc3', 'owner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjaman`
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
-- Dumping data untuk tabel `tb_pinjaman`
--

INSERT INTO `tb_pinjaman` (`kd_pinjam`, `nik`, `pinjaman`, `dikembalikan`, `sisa`, `stt_pinjaman`, `tgl_peminjaman`) VALUES
(3424237, '98745968745986', '5000000', '0', '5000000', 'Pinjam', '2019-04-08'),
(3424238, '65456456', '700000', '700000', '0', 'Lunas', '2019-04-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_absen`
--

CREATE TABLE `tb_status_absen` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status_absen`
--

INSERT INTO `tb_status_absen` (`id`, `status`) VALUES
(1, 'Accept'),
(2, 'Reject');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`kd_absen`);

--
-- Indeks untuk tabel `tb_absensi_karyawan`
--
ALTER TABLE `tb_absensi_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`kd_gaji`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tb_owner`
--
ALTER TABLE `tb_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indeks untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`kd_pinjam`);

--
-- Indeks untuk tabel `tb_status_absen`
--
ALTER TABLE `tb_status_absen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `kd_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_absensi_karyawan`
--
ALTER TABLE `tb_absensi_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `kd_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `kd_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_owner`
--
ALTER TABLE `tb_owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `kd_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3424239;

--
-- AUTO_INCREMENT untuk tabel `tb_status_absen`
--
ALTER TABLE `tb_status_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
