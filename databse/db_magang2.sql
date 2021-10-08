-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2021 at 10:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_magang2`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `absen_id` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `waktu_masuk` time NOT NULL,
  `waktu_keluar` time NOT NULL,
  `nim` varchar(21) NOT NULL,
  `lat_masuk` varchar(255) NOT NULL,
  `lat_keluar` varchar(255) NOT NULL,
  `long_masuk` varchar(255) NOT NULL,
  `long_keluar` varchar(255) NOT NULL,
  `keterangan_kerja` enum('wfh','wfo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`absen_id`, `tgl_absen`, `waktu_masuk`, `waktu_keluar`, `nim`, `lat_masuk`, `lat_keluar`, `long_masuk`, `long_keluar`, `keterangan_kerja`) VALUES
(1, '2021-07-27', '07:59:00', '00:00:00', 'M2103026', '-6.1632178', '', '106.7505846', '', 'wfh'),
(33, '2021-08-02', '07:00:00', '15:00:00', '2212', '', '', '', '', 'wfh'),
(34, '2021-08-01', '07:00:00', '15:00:00', '2212', '', '', '', '', 'wfo'),
(35, '2021-08-03', '07:00:00', '15:00:00', '2212', '', '', '', '', 'wfo'),
(36, '2021-08-04', '07:00:00', '15:00:00', '2212', '', '', '', '', 'wfh');

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `aktivitas_id` int(11) NOT NULL,
  `nim` varchar(21) NOT NULL,
  `tgl_aktivitas` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `isi_aktivitas` text NOT NULL,
  `waktu_input` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`aktivitas_id`, `nim`, `tgl_aktivitas`, `jam_mulai`, `jam_selesai`, `isi_aktivitas`, `waktu_input`) VALUES
(27, 'M2103002', '2021-08-13', '01:00:00', '01:00:00', 'M2103002', '15:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `detailizin`
--

CREATE TABLE `detailizin` (
  `id_detail` int(11) NOT NULL,
  `izin_id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailizin`
--

INSERT INTO `detailizin` (`id_detail`, `izin_id`, `tanggal`) VALUES
(1, 1, '2021-01-15'),
(2, 1, '2021-01-16'),
(3, 2, '2021-05-29'),
(4, 2, '2021-05-30'),
(5, 3, '2021-05-22'),
(6, 3, '2021-05-23'),
(7, 3, '2021-05-24'),
(8, 3, '2021-05-25'),
(9, 3, '2021-05-26'),
(10, 3, '2021-05-27'),
(11, 3, '2021-05-28'),
(12, 3, '2021-05-29'),
(13, 3, '2021-05-30'),
(14, 3, '2021-05-31'),
(15, 3, '2021-06-01'),
(16, 3, '2021-06-02'),
(17, 3, '2021-06-03'),
(18, 3, '2021-06-04'),
(19, 4, '2021-05-29'),
(20, 4, '2021-05-30'),
(21, 4, '2021-05-31'),
(22, 4, '2021-06-01'),
(23, 4, '2021-06-02'),
(24, 5, '2021-05-29'),
(25, 6, '2021-05-21'),
(26, 6, '2021-05-22'),
(27, 6, '2021-05-23'),
(28, 6, '2021-05-24'),
(29, 6, '2021-05-25'),
(30, 6, '2021-05-26'),
(31, 6, '2021-05-27'),
(32, 6, '2021-05-28'),
(33, 6, '2021-05-29'),
(34, 6, '2021-05-30'),
(35, 6, '2021-05-31'),
(36, 6, '2021-06-01'),
(37, 6, '2021-06-02'),
(38, 7, '2021-06-29'),
(39, 8, '2021-06-16'),
(40, 11, '2021-07-22'),
(41, 11, '2021-07-23'),
(42, 11, '2021-07-24'),
(43, 11, '2021-07-25'),
(44, 11, '2021-07-26'),
(45, 11, '2021-07-27'),
(46, 11, '2021-07-28'),
(47, 11, '2021-07-29'),
(48, 12, '2021-07-02'),
(49, 12, '2021-07-03'),
(50, 12, '2021-07-04'),
(51, 12, '2021-07-05'),
(52, 12, '2021-07-06'),
(53, 12, '2021-07-07'),
(54, 12, '2021-07-08'),
(55, 12, '2021-07-09'),
(56, 12, '2021-07-10'),
(57, 12, '2021-07-11'),
(58, 12, '2021-07-12'),
(59, 12, '2021-07-13'),
(60, 12, '2021-07-14'),
(61, 12, '2021-07-15'),
(62, 12, '2021-07-16'),
(63, 12, '2021-07-17'),
(64, 12, '2021-07-18'),
(65, 12, '2021-07-19'),
(66, 12, '2021-07-20'),
(67, 12, '2021-07-21'),
(68, 12, '2021-07-22'),
(69, 12, '2021-07-23'),
(70, 12, '2021-07-24'),
(71, 12, '2021-07-25'),
(72, 12, '2021-07-26'),
(73, 12, '2021-07-27'),
(74, 13, '2021-07-08'),
(75, 13, '2021-07-09'),
(76, 13, '2021-07-10'),
(77, 13, '2021-07-11'),
(78, 13, '2021-07-12'),
(79, 13, '2021-07-13'),
(80, 13, '2021-07-14'),
(81, 13, '2021-07-15'),
(82, 13, '2021-07-16'),
(83, 13, '2021-07-17'),
(84, 14, '2021-07-30'),
(85, 14, '2021-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `izin_id` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `jenis_izin` enum('cuti','izin','sakit') NOT NULL,
  `bukti` varchar(254) DEFAULT NULL,
  `alasan` text NOT NULL,
  `status` enum('diajukan','diterima','ditolak') NOT NULL,
  `waktu_pengajuan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`izin_id`, `nim`, `jenis_izin`, `bukti`, `alasan`, `status`, `waktu_pengajuan`) VALUES
(5, 'M2103015', 'sakit', 'w.png', 'sdad', 'diterima', '2021-05-28 15:07:42'),
(6, 'M2103015', 'sakit', 'w.png', 'sakit', 'diterima', '2021-05-28 15:08:20'),
(7, 'M2103015', 'sakit', 'Resume.jpg', 'latitude=-6.2087634&longitude=106.84559899999999', 'ditolak', '2021-06-06 19:52:39'),
(8, 'M2103015', 'sakit', '955301.jpg', 'Sakit', 'ditolak', '2021-06-16 04:07:53'),
(14, 'M2103003', 'izin', NULL, 'acara keluarga', 'diajukan', '2021-07-30 03:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE `kontrak` (
  `kontrak_id` int(11) NOT NULL,
  `no_kontrak` int(11) NOT NULL,
  `tanggal_kontrak` date NOT NULL,
  `perihal` varchar(90) NOT NULL,
  `upah` varchar(90) NOT NULL,
  `kontrak` varchar(90) NOT NULL,
  `nim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontrak`
--

INSERT INTO `kontrak` (`kontrak_id`, `no_kontrak`, `tanggal_kontrak`, `perihal`, `upah`, `kontrak`, `nim`) VALUES
(5, 3123123, '2021-07-30', 'Perihal', '1500000', 'img20210720_14023995.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(80) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nik` varchar(90) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(80) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `perguruan_tinggi` varchar(60) DEFAULT NULL,
  `jurusan` varchar(60) DEFAULT NULL,
  `akun_ig` varchar(60) DEFAULT NULL,
  `akun_fb` varchar(40) DEFAULT NULL,
  `nama_keluarga` varchar(40) DEFAULT NULL,
  `hubungan` varchar(40) DEFAULT NULL,
  `telepon_kel` varchar(20) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `bank` varchar(90) DEFAULT NULL,
  `nomor_rek` int(11) DEFAULT NULL,
  `nama_pemilik` varchar(70) DEFAULT NULL,
  `photo` varchar(90) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `waktu_masuk` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `batch` int(11) NOT NULL,
  `divre` varchar(80) NOT NULL,
  `jobdesk` text NOT NULL,
  `bagian_unit` varchar(80) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `username`, `password`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `perguruan_tinggi`, `jurusan`, `akun_ig`, `akun_fb`, `nama_keluarga`, `hubungan`, `telepon_kel`, `telepon`, `bank`, `nomor_rek`, `nama_pemilik`, `photo`, `role_id`, `waktu_masuk`, `tahun`, `batch`, `divre`, `jobdesk`, `bagian_unit`, `status`) VALUES
('1', 'Administrator', 'admin', '$2y$10$VqvV0UfbaEhwfR0v1nQUOOz0SY461B3Q41cwaHiqocwfN5uG9lUge', '&lt;?= $this->session->flashdata(\'pesan\') ?&gt;', 'laki-laki', 'dsdsfsd', '2021-08-03', '&lt;?= $this->session->flashdata(\'pesan\') ?&gt;', '   $this->session->set_flashdata(\'pesan\', \'&lt;div class=', 'index.png', 'index.png', '&lt;div class=', 'index.png', 'index.png', '085850518483', 'index.png', 23423423, 'index.png', 'index.png', 1, '2021-07-25', 2021, 1, '$2y$10$VqvV0UfbaEhwfR0v1nQUOOz0SY461B3Q41cwaHiqocwfN5uG9lUge', 'asdasdasdasdasdasdasdasd', 'index.png', 0),
('12312', 'SRI CHYINTHIA WATI ', 'Chyinthia', '$2y$10$HPe9S7dNb9SPbJ7GLIjb1OGLVoQilAngs5QOvEUR/uWR4kif8hlLi', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 0000, 0, '', '', '', 1),
('2212', 'ANGGA IRYANTO', 'M2103001', '$2y$10$2omXHTZ5SUjUbQzmgoQW0eHgTu.J0iRHhS7uLJ.mMhdMuGaYf8KcK', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103002', 'AYU FATIKA OKTAFIA', 'M2103002', '$2y$10$1WnuyTJuHJP8mxOByMcFXuX/7Mhf8L2IGgH4yAlSzs2Rm8.e52bR.', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103003', 'FANIA JONANDA MUHARRAMI', 'M2103003', '$2y$10$v8fZzwawRSG6PLIoTzu8T.W0a/LUlEckCktrzHnd5jIpm2WQc4QeK', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103004', 'FATIMAH AZZAHRA ', 'M2103004', '$2y$10$pTG6qPzbNMqICTA.rLUQDOlqfvCYvK3xzoygvhWfTMLf58dKkp4Sa', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103005', 'INTAN PERMATA SARI', 'M2103005', '$2y$10$D8z4K7yIpsZfeuu8yIhFbOAaQx55olPvNWOP3TF8G1k885XjW3T1.', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103006', 'LERRY MANTRO MANULLANG', 'M2103006', '$2y$10$YaekjNUfrFs095Yqm6cbM.JTOo8UXObEO59.cMmAeRuaz7GAQqz/2', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103007', 'MASAYU RIFDAH FAKHIRAH NOVIANAWATI', 'M2103007', '$2y$10$tnUH3JJSI9DpeXBUXEOStutbMybpB9U1HBwxwQ/aVZ0kqfeP/SnLG', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103008', 'MUCHAMMAD BUKHORI', 'M2103008', '$2y$10$kTRrpRKdjdNZOz6fLYwcF.C3tEXEYjM1rU01vG69CjQ58wwDyCtd2', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103009', 'MUHAMAD ICHSAN FADILLAH', 'M2103009', '$2y$10$Mcr1ppzSlENOfPBScmSosOFo3.I50tZlACdHhbuVsWFkO9KDevfoW', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103010', 'MUHAMAD ATTALA ANDRIANSYAH', 'M2103010', '$2y$10$MPeHcKcbk.QbwbvUePAKi.74UlYQ0UMgELVBbMxJB0KW.zJjQKPAC', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103011', 'MUHAMMAD RIZQI RAMADHAN', 'M2103011', '$2y$10$PbQgrLVJ7cYsDtaVWGRXduhSXqnO0Mid6KdU5vzpYcCvfFLxCgdAi', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103012', 'MUHAMMAD SATYA NUGRAHA', 'M2103012', '$2y$10$pd3YdPZPoIGn.nj0E2IesOeLhSACfJiA6970oBuDJ1qidrRAEeReC', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103013', 'NABILA AULIA MAHARANI', 'M2103013', '$2y$10$eitH5C8ai1l3zTETQqrjiOPhsbx138CHTd7UatLqHHikJOi2f.tF.', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103014', 'NUR AINI SUSANTI', 'M2103014', '$2y$10$.i1R2yr/wFVLKq48ZpW9weMPjTqR7DbFI819temCONG16aYj66LZS', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103015', 'NUR HAMIDAH LAILA', 'M2103015', '$2y$10$NOpNTbC11CL1BYUobZPLFeqrHooqrn1EYZSka2seCac0TYRTrNyvO', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 0000, 0, '', '', '', 0),
('M2103016', 'PIETER YEHEZKIEL', 'M2103016', '$2y$10$XddnV2u1qM7bz8geZHZNJ.kH4AkkfImiHy7jzbg.FUPRZKLndwl2W', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 0000, 0, '', '', '', 0),
('M2103017', 'RANI DWI DAMAYANTI', 'M2103017', '$2y$10$WiOWOqcsJ4RJv0U.xlMXWeyhBk7V2Usai4pZik3TX3VdX0uEjKLD6', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 0000, 0, '', '', '', 0),
('M2103018', 'RAVITA GESIT NAVARI', 'M2103018', '$2y$10$kRr4DJt/xvuxIv4r8M4KRuVqdqui683Er/fT0MAyF09PgnKAP82AG', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 0000, 0, '', '', '', 0),
('M2103019', 'RISMA MAULIDIA', 'M2103019', '$2y$10$2B.AFIoeKMVgE2I3aEyOaewMFOkRg8sUoi0Ahm1Ef4xSEgOsDD99e', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 0000, 0, '', '', '', 0),
('M2103020', 'RIZKY DARMAWAN', 'M2103020', '$2y$10$f9ORf7tWkAKMvsVMfwuBjeVx1f.IGxGIUeBkT.KhJ7J4ZGCsSlRKa', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 0000, 0, '', '', '', 0),
('M2103021', 'SHIVA FAUZIAH', 'M2103021', '$2y$10$zlSMhonTXRC/arXTVJBuoe4InzYPtQWILSL.ANmGL6xjBZs//2sLm', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 0000, 0, '', '', '', 0),
('M2103023', 'TEZAR PUTRA NUGRAHA', 'M2103023', '$2y$10$P7aWTz6lfpzq1fK6eRR3YeC0WPLSJyoyyt2SfOsIpR7OQGNyLjkUS', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 0000, 0, '', '', '', 0),
('M2103024', 'TITI KURNIA PALUPI', 'M2103024', '$2y$10$xvIF7DoUPatn.hRcrKd6oOVm8kzy4AVhVuP02jjMQSchvsECCbZZ6', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 0000, 0, '', '', '', 0),
('M2103025', 'VICO TRISNA WIDYANTARA', 'M2103025', '$2y$10$iD0djtkZlOkmQgKoGKlZve5jN4.Vq4DYTg6Yx5lPNCyZDEH8xqqIy', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 2021, 0, '', '', '', 0),
('M2103026', 'VIRGIAN AKBAR', 'M2103026', '$2y$10$YLeeY4pr5VaF4RekbL/cyuk6u8duDMV648e5QPe/EhkJEVNWOJrKK', '', 'laki-laki', 'Magetan', '2001-01-02', 'Universitas Bina Sarana Informatika', 'Sistem Informasi', 'vakbarrr', 'Virgian Akbar', 'Saiful', 'Ayah', '', '085850518483', 'BRI', 0, '', 'index.png', 2, '2021-07-06', 2021, 1, '', '', '', 0),
('M2103027', 'HANAN HAURA HAZIMAH', 'M2103027', '$2y$10$0f82df7aUn8rrPA1cFBYQu.PNFHET.XzWz4AJRCUL.xjEZ/oYQ8Tq', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 2021, 0, '', '', '', 0),
('M2103028', 'NADIRA REGITA PUTRI', 'M2103028', '$2y$10$qlzHx3rOsBmDrIR3lNLYiuSUXrYcS53zpX2ndJUL.Qtg.ojyOOOYG', '', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-02', 2021, 0, '', '', '', 0),
('M2103029', 'SYAHLA YULFIANTIE HARTONO', 'M2103029', '$2y$10$3i2fVJQj3qX4M2Uv4dMbxeLX7NtIGRZJ.TuOnOUNhvv7OSeYOc8a2', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 0000, 0, '', '', '', 0),
('M2103030', 'SALSABILA DARA AULIA', 'M2103030', '$2y$10$BDFQv9eq5BKdx2bvZk/k2OIhAMF7Us1mc/wDFPJ8oYKbxBnkdMdVi', 'M2103030', 'perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 0000, 0, '', '', '', 0),
('M2104001', 'RYAN FACHRIANSYAH', 'M2104001', '$2y$10$dixbDH/LdVM3PEyv3.p4S.B.7j.XsVMEGWfE/9kCmLUfhRaafD.IW', '', 'laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', 'index.png', 2, '2021-07-06', 0000, 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL,
  `nilai_a` int(11) NOT NULL,
  `nilai_b` int(11) NOT NULL,
  `nilai_c` int(11) NOT NULL,
  `nilai_d` int(11) NOT NULL,
  `nilai_e` int(11) NOT NULL,
  `nilai_f` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `nim` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `nilai_a`, `nilai_b`, `nilai_c`, `nilai_d`, `nilai_e`, `nilai_f`, `total`, `ket`, `nim`) VALUES
(1, 80, 90, 90, 90, 100, 100, 550, NULL, 'M2103002'),
(4, 90, 90, 40, 30, 80, 90, 420, NULL, '2212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`absen_id`);

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`aktivitas_id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `detailizin`
--
ALTER TABLE `detailizin`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`izin_id`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`kontrak_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `absen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `aktivitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `detailizin`
--
ALTER TABLE `detailizin`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `izin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `kontrak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
