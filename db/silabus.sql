-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2020 pada 07.18
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkn2wnsb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `silabus`
--

CREATE TABLE `silabus` (
  `kd_silabus` varchar(30) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_jurusan` varchar(10) NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `judul` varchar(32) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `tanggal_upload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `silabus`
--

INSERT INTO `silabus` (`kd_silabus`, `kd_mapel`, `kd_jurusan`, `tingkat`, `judul`, `nama_file`, `tanggal_upload`) VALUES
('1', 'default', 'default', 'defaut', 'Belum Upload Silabus', 'silabus-default.pdf', '2020-12-14 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `silabus`
--
ALTER TABLE `silabus`
  ADD PRIMARY KEY (`kd_silabus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
