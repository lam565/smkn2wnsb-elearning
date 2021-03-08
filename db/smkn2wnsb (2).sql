-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Feb 2021 pada 03.07
-- Versi Server: 5.6.21-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smkn2wnsb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
`kd_absensi` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `tgl_absensi` datetime NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`kd_absensi`, `nis`, `tgl_absensi`, `kd_kelas`, `kd_mapel`) VALUES
(2, '8170', '2021-01-13 04:23:02', 'xakl1', 'bind'),
(3, '8170', '2021-01-13 11:38:47', 'xakl1', 'bing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_soal`
--

CREATE TABLE IF NOT EXISTS `detail_soal` (
  `kd_detail_soal` varchar(100) NOT NULL,
  `kd_soal` varchar(30) NOT NULL,
  `soal` text NOT NULL,
  `pil_A` varchar(100) NOT NULL,
  `pil_B` varchar(100) NOT NULL,
  `pil_C` varchar(100) NOT NULL,
  `pil_D` varchar(100) NOT NULL,
  `pil_E` varchar(100) NOT NULL,
  `kunci` varchar(5) NOT NULL,
  `keterangan` text,
  `gambar` varchar(100) NOT NULL DEFAULT 'T',
  `C` varchar(30) NOT NULL DEFAULT '-',
  `P` varchar(30) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_soal`
--

INSERT INTO `detail_soal` (`kd_detail_soal`, `kd_soal`, `soal`, `pil_A`, `pil_B`, `pil_C`, `pil_D`, `pil_E`, `kunci`, `keterangan`, `gambar`, `C`, `P`) VALUES
('442020GR089001', '142020GR089001', 'Pertanyaan 1', 'Pilihan A', 'Pilihan B', 'Pilihan C', 'Pilihan D', 'Pilihan E', 'a', NULL, '442020GR089001_87390136.jpg', '-', '-'),
('442020GR089002', '142020GR089001', 'Pertanyaan 2', 'Pilihan A', 'Pilihan B', 'Pilihan C', 'Pilihan D', 'Pilihan E', 'a', NULL, 'T', '-', '-'),
('442020GR089003', '142020GR089001', 'Pertanyaan 3', 'Pilihan A', 'Pilihan B', 'Pilihan C', 'Pilihan D', 'Pilihan E', 'a', NULL, 'T', '-', '-'),
('442020GR089004', '142020GR089001', 'Pertanyaan 4', 'Pilihan A', 'Pilihan B', 'Pilihan C', 'Pilihan D', 'Pilihan E', 'a', NULL, 'T', '-', '-'),
('442020GR089005', '142020GR089001', 'Pertanyaan 5', 'Pilihan A', 'Pilihan B', 'Pilihan C', 'Pilihan D', 'Pilihan E', 'a', NULL, 'T', '-', '-'),
('442020GR089006', '142020GR089001', 'Pertanyaan 6', 'Pilihan A', 'Pilihan B', 'Pilihan C', 'Pilihan D', 'Pilihan E', 'a', NULL, '442020GR089006_51773071.jpg', '-', '-'),
('442020GR089007', '142020GR089001', 'Pertanyaan 7', 'Pilihan A', 'Pilihan B', 'Pilihan C', 'Pilihan D', 'Pilihan E', 'a', NULL, 'T', '-', '-'),
('442020GR089008', '142020GR089001', 'Pertanyaan 8', 'Pilihan A', 'Pilihan B', 'Pilihan C', 'Pilihan D', 'Pilihan E', 'a', NULL, 'T', '-', '-'),
('442020GR089009', '142020GR089001', 'Pertanyaan 9', 'Pilihan A', 'Pilihan B', 'Pilihan C', 'Pilihan D', 'Pilihan E', 'a', NULL, 'T', '-', '-'),
('442020GR089010', '142020GR089001', 'Pertanyaan 10', 'Pilihan A', 'Pilihan B', 'Pilihan C', 'Pilihan D', 'Pilihan E', 'a', NULL, 'T', '-', '-'),
('442021GR090001', '142021GR090001', 'abcd', 'a', 'b', 'c', 'd', 'e', 'a', NULL, 'T', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `kd_guru` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL DEFAULT '-',
  `nama` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL DEFAULT '-',
  `email` varchar(30) NOT NULL DEFAULT '-',
  `foto` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `status` varchar(10) NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`kd_guru`, `username`, `nip`, `nama`, `telp`, `email`, `foto`, `status`) VALUES
('GR001', 'smkwsb1', '-', 'Ainur Rojik,S.Pd., M.Eng', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR002', 'smkwsb2', '-', 'Drs. Supramono', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR003', 'smkwsb3', '-', 'Dra. Sri Lestari', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR004', 'smkwsb4', '-', 'Riswaryanti, S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR005', 'smkwsb5', '-', 'Sri Karyani, S.Pd ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR006', 'smkwsb6', '-', 'Jahrotun Nisa, S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR007', 'smkwsb7', '-', 'Siti Istinganah, S.Pd, M.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR008', 'smkwsb8', '-', 'Much Arihni, S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR009', 'smkwsb9', '-', 'Puji Iswati,S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR010', 'smkwsb10', '-', 'M.Yustiningrum,S.Pd, M.Pd ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR011', 'smkwsb11', '-', 'Subaryanto,S.Pd, M.M', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR012', 'smkwsb12', '-', 'Rita Herawati,S.Pd ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR013', 'smkwsb13', '-', 'Wiwik Setyowati,S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR014', 'smkwsb14', '-', 'Totok Subiyoto,S.Pd,M.M  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR015', 'smkwsb15', '-', 'Fatchurohman,S.Pd, M.M', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR016', 'smkwsb16', '-', 'Wening Handayani, S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR017', 'smkwsb17', '-', 'Nanik Sri Rahmini,S.Pd ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR018', 'smkwsb18', '-', 'Aniek Endrawati, S.Pd ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR019', 'smkwsb19', '-', 'Rahayu Ratnaningsih, S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR020', 'smkwsb20', '-', 'Wahyu Widowati,S.Pd.', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR021', 'smkwsb21', '-', 'Eko Susanto,S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR022', 'smkwsb22', '-', 'Dewi Natalia Purnaningsih, S.Si, M.M', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR023', 'smkwsb23', '-', 'Diah Sulistiani, S.Kom, M.M ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR024', 'smkwsb24', '-', 'Wahyono,S.Pd, M.M   ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR025', 'smkwsb25', '-', 'Rakhmat Sutrisno,S.Pd,M.Eng', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR026', 'smkwsb26', '-', 'Herni Kurniawati, S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR027', 'smkwsb27', '-', 'Drs.Setyo Budi. M.Eng.', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR028', 'smkwsb28', '-', 'Drs.Sudarman   ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR029', 'smkwsb29', '-', 'Drs.Yekti Toto Raharjo   ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR030', 'smkwsb30', '-', 'Drs.Zaenal Arifin ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR031', 'smkwsb31', '-', 'Dwi Setyowati Hilga,S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR032', 'smkwsb33', '-', 'Kuspartana,S.Pd   ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR033', 'smkwsb34', '-', 'Dra.Sri Sulistyaningsih, M.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR034', 'smkwsb35', '-', 'Munarno Ahmad,S.Pd, M.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR035', 'smkwsb36', '-', 'Udhie Umaroh Z,S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR036', 'smkwsb37', '-', 'Agus Triyono, S.Pd.I  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR037', 'smkwsb38', '-', 'Drs.Dwi Rusdiyanto  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR038', 'smkwsb39', '-', 'Drs.Santoso Budi.S  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR039', 'smkwsb40', '-', 'Heni Yosida,S.Pd ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR040', 'smkwsb41', '-', 'Teguh Nur Rohman,MT  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR041', 'smkwsb42', '-', 'Anjar Dwi Suryani, S.Pd.T ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR042', 'smkwsb43', '-', 'Yaser Arofat,ST  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR043', 'smkwsb44', '-', 'Indah Purwanti,S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR044', 'smkwsb45', '-', 'Yuli Marhendra Kristianing, S.Si', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR045', 'smkwsb46', '-', 'Drs. Purnama, MT ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR046', 'smkwsb47', '-', 'Drs.Sutiyorono  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR047', 'smkwsb48', '-', 'Drs.Casnoto  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR048', 'smkwsb49', '-', 'Abdul Faqih,S.Pd.M.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR049', 'smkwsb50', '-', 'Sutrisno Kuncoro,S.Pd,M.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR050', 'smkwsb51', '-', 'A.Rusdiatson,S.Pd   ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR051', 'smkwsb52', '-', 'Drs.Dwi Joko Suprapto  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR052', 'smkwsb53', '-', 'Syamsudin Hidayat,S.Pd,M.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR053', 'smkwsb54', '-', 'Sutrisno,S.Pd, M.M  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR054', 'smkwsb55', '-', 'Wahju Budi Utojo,S.Pd, M.Pd ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR055', 'smkwsb56', '-', 'Hendra Suprayogi, S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR056', 'smkwsb57', '-', 'Slamet Suhardi, S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR057', 'smkwsb58', '-', 'Tri Auliya Retno Ridha,SE. M.Pd 24', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR058', 'smkwsb59', '-', 'Nur Afida,S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR059', 'smkwsb60', '-', 'Nurul Hayati,SE ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR060', 'smkwsb61', '-', 'Siti Rohayah,S.Pd  ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR061', 'smkwsb62', '-', 'Iwan  Aji, S.Pd ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR062', 'smkwsb63', '-', 'Salis Suciati, S.Pd ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR063', 'smkwsb64', '-', 'Setiyaningsih, S.Pd ', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR064', 'smkwsb65', '-', 'Arif Hidayat, S.Pd. I.', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR065', 'smkwsb66', '-', 'Mujab, S.Pd.I', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR066', 'smkwsb67', '-', 'Anita Karlina Dewi, S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR067', 'smkwsb68', '-', 'Dwi Sutanto, S.S.', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR068', 'smkwsb69', '-', 'Septiana Aslamiah, S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR069', 'smkwsb70', '-', 'Angga Puspita Sari, S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR070', 'smkwsb71', '-', 'Riyadi,S.Pd.', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR071', 'smkwsb72', '-', 'Tri Setyaningsih,S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR072', 'smkwsb73', '-', 'Ediyanto, S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR073', 'smkwsb74', '-', 'Esti Nugrahani,S.Pd. Si.', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR074', 'smkwsb75', '-', 'Irani, S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR075', 'smkwsb76', '-', 'Bambang Budiharjo,S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR076', 'smkwsb77', '-', 'Purwo Dhiyantoko,S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR077', 'smkwsb78', '-', 'Nilam Risdayanti, S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR078', 'smkwsb79', '-', 'Purwo Damayastuti,S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR079', 'smkwsb80', '-', 'Ahmad Hidayat, S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR080', 'smkwsb81', '-', 'M. Nurhajiyanto,S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR081', 'smkwsb82', '-', 'Krisdiantoro,ST', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR082', 'smkwsb83', '-', 'Nugroho Widyastomo,ST', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR083', 'smkwsb84', '-', 'Purbha Aji Kuncara,S.Kom.', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR084', 'smkwsb85', '-', 'Ermanu Sapto Purnomo, S.Sn', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR085', 'smkwsb86', '-', 'Fitria Yuniyanti,S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR086', 'smkwsb87', '-', 'Lutfi Ariani,S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR087', 'smkwsb88', '-', 'Ika Ujiwati,SE', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR088', 'smkwsb89', '-', 'Catur Herlina Artati,S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR089', 'smkwsb90', '-', 'Rudy Hermawanto,S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR090', 'smkwsb91', '-', 'Atik Faoziah,S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR091', 'smkwsb92', '-', 'Santi Arofah,S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR092', 'smkwsb93', '-', 'Puji Laksono,S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR093', 'smkwsb94', '-', 'Ulung Giri Sutikno, S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR094', 'smkwsb95', '-', 'Ayu Andriyani, S.Pd', '-', 'user@gmail.com', 'default.jpg', 'Aktif'),
('GR095', 'test', '-', 'test', '08574322002', 'Elethaveronica@gmail.com', 'default.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE IF NOT EXISTS `jurnal` (
`id_jurnal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_ke` int(11) NOT NULL,
  `kd_guru` varchar(20) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `judul_materi` varchar(100) NOT NULL,
  `jml_siswa` int(11) NOT NULL,
  `nm_siswa_tdhdr` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `tanggal`, `jam_ke`, `kd_guru`, `kd_mapel`, `kd_kelas`, `judul_materi`, `jml_siswa`, `nm_siswa_tdhdr`) VALUES
(9, '2021-01-13', 1, 'GR090', 'bing', 'xakl1', 'testing', 20, '					test						');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `kd_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kd_jurusan`, `nama_jurusan`) VALUES
('akl', 'Akuntansi dan Keuangan Lembaga'),
('an', 'Animasi'),
('av', 'Teknik Audio Video'),
('dpib', 'Desain Permodelan dan Informasi Bangunan'),
('intel', 'Teknik Instalasi Tenaga Listrik'),
('tkro', 'Teknik Kendaraan Ringan Otomotif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `kd_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `tingkat` varchar(5) NOT NULL,
  `kd_jurusan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `nama_kelas`, `tingkat`, `kd_jurusan`) VALUES
('xakl1', 'X AKL 1', 'X', 'akl'),
('xan1', 'X AN 1', 'X', 'an'),
('xav1', 'X AV 1', 'X', 'av'),
('xdpib1', 'X DPIB 1', 'X', 'dpib'),
('xiakl1', 'XI AKL 1', 'XI', 'akl'),
('xiiakl1', 'XII AKL 1', 'XII', 'akl'),
('xiiav1', 'XI AV 1', 'XI', 'av'),
('xintel1', 'X INTEL 1', 'X', 'intel'),
('xtkro1', 'X TKRO 1', 'X', 'tkro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerja_tugas`
--

CREATE TABLE IF NOT EXISTS `kerja_tugas` (
  `kd_kerja` varchar(30) NOT NULL,
  `kd_tugas` varchar(30) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `file_kerja` varchar(100) NOT NULL DEFAULT 'T',
  `nilai` int(11) NOT NULL DEFAULT '0',
  `status_kerja` varchar(20) NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kerja_tugas`
--

INSERT INTO `kerja_tugas` (`kd_kerja`, `kd_tugas`, `nis`, `file_kerja`, `nilai`, `status_kerja`) VALUES
('1220208168001', '022020GR090001', '8168', '1220208168001.png', 90, 'N'),
('1220208168002', '022020GR090002', '8168', 'T', 0, 'T'),
('1220208168003', '022020GR090003', '8168', 'T', 0, 'T'),
('1220208170001', '022020GR090001', '8170', 'T', 0, 'T'),
('1220208170002', '022020GR090002', '8170', 'T', 0, 'T'),
('1220208170003', '022020GR090003', '8170', '1220208170003.jpg', 80, 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(200) NOT NULL,
  `penulis_komentar` varchar(100) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` varchar(100) NOT NULL,
  `id_post` int(100) NOT NULL,
  `pp_penulis` text NOT NULL,
  `penulis_post` varchar(100) NOT NULL,
  `lihat_komentar` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `penulis_komentar`, `isi_komentar`, `tanggal_komentar`, `id_post`, `pp_penulis`, `penulis_post`, `lihat_komentar`) VALUES
(0, 'smkwsb91', 'test', '2:49 17/12/2020', 0, '', 'smkwsb91', 1),
(0, 'smkwsb91', 't', '2:50 17/12/2020', 0, '', 'smkwsb91', 1),
(0, 'smkwsb91', 'tu', '2:50 17/12/2020', 0, '', 'smkwsb91', 1),
(0, 'smkwsb91', 'tuk', '2:50 17/12/2020', 0, '', 'smkwsb91', 1),
(0, 'smkwsb91', 'ddd', '3:01 17/12/2020', 0, '', 'smkwsb91', 1),
(0, '8170', 'gg', '3:51 17/12/2020', 2, '', '8170', 1),
(0, '8170', 'ggk', '3:51 17/12/2020', 2, '', '8170', 1),
(0, '8170', 'ggkp', '3:51 17/12/2020', 2, '', '8170', 1),
(0, '8170', 'ggkpi', '3:51 17/12/2020', 2, '', '8170', 1),
(0, '8170', 'hai', '20:55 17/12/2020', 2, '', '8170', 1),
(0, 'smkwsb91', 'ok 1', '11:21 18/12/2020', 4, '', 'smkwsb91', 1),
(0, 'smkwsb91', 'ok 2', '11:22 18/12/2020', 4, '', 'smkwsb91', 1),
(0, 'smkwsb91', 'ok 3', '11:22 18/12/2020', 4, '', 'smkwsb91', 1),
(0, 'smkwsb91', 'ok 4', '11:22 18/12/2020', 4, '', 'smkwsb91', 1),
(0, '8170', 'baik pak ibu guru', '11:23 18/12/2020', 4, '', 'smkwsb91', 1),
(0, 'smkwsb91', 'hai', '17:49 29/12/2020', 4, '', 'smkwsb91', 1),
(0, 'smkwsb91', 'hai', '12:05 12/01/2021', 5, '', 'smkwsb91', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lihat`
--

CREATE TABLE IF NOT EXISTS `lihat` (
  `user_lihat` varchar(100) NOT NULL,
  `lihat` int(5) NOT NULL,
  `apa_lihat` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` varchar(10) NOT NULL,
  `last` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`, `level`, `last`, `status`) VALUES
('8168', '0c9e63b6cec0627182663ae8feb204cb', 'siswa', '2020-12-14 02:48:53', 'aktif'),
('8169', '1a32df83ac6be75b6907fe885465b7a9', 'siswa', '2020-12-14 02:48:53', 'aktif'),
('8170', 'c37f9e1283cbd4a6edfd778fc8b1c652', 'siswa', '2020-12-14 02:48:53', 'aktif'),
('8171', '594ca7adb3277c51a998252e2d4c906e', 'siswa', '2020-12-14 02:48:53', 'aktif'),
('8172', '86f2fbb60fb7b50c94009182fb4edcdd', 'siswa', '2020-12-14 02:48:53', 'aktif'),
('8173', '00a2aa5c43a94f625ebf713cb5bfb091', 'siswa', '2020-12-14 02:48:53', 'aktif'),
('8174', 'fc5a29b5d423c94cdfacb0f706eecdb7', 'siswa', '2020-12-14 02:48:53', 'aktif'),
('8175', 'f2fb9d75af8f3f2eb322ff968e62a324', 'siswa', '2020-12-14 02:48:53', 'aktif'),
('8176', 'a894b83c9b7a00dba6c52cecf7a31fbb', 'siswa', '2020-12-14 02:48:54', 'aktif'),
('8177', '74e1ed8b55ea44fd7dbb685c412568a4', 'siswa', '2020-12-14 02:48:54', 'aktif'),
('8178', '6967a5fb05106806a40c6917a18023df', 'siswa', '2020-12-14 02:48:54', 'aktif'),
('8179', 'b45232282ea62bfccffbd5350317e7e2', 'siswa', '2020-12-14 02:48:54', 'aktif'),
('8180', '6e187996e9cc9d93c5f4452695768290', 'siswa', '2020-12-14 02:48:54', 'aktif'),
('8181', '299dc35e747eb77177d9cea10a802da2', 'siswa', '2020-12-14 02:48:54', 'aktif'),
('8182', '427357dfbc5cc1967afeef00b8e6ec80', 'siswa', '2020-12-14 02:48:54', 'aktif'),
('8183', '83462e22a65e7e34975bbf2b639333ec', 'siswa', '2020-12-14 02:48:54', 'aktif'),
('8184', '451ae86722d26a608c2e174b2b2773f1', 'siswa', '2020-12-14 02:48:54', 'aktif'),
('8185', '45ab12afa05e563bb484781693dffc87', 'siswa', '2020-12-14 02:48:54', 'aktif'),
('8186', '2051bd70fc110a2208bdbd4a743e7f79', 'siswa', '2020-12-14 02:48:54', 'aktif'),
('8187', 'cecd845e3577efdaaf24eea03af4c033', 'siswa', '2020-12-14 02:48:54', 'aktif'),
('8188', '62161512d8b1b5db826778917e974b21', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8189', '65184321c340b4d56581ee59b58d9d56', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8190', '16bb35ba24bac33d95ee9f1f65a41b53', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8191', '4b2944dfea61be814911110c21ddd974', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8192', '774412967f19ea61d448977ad9749078', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8193', '800103a4d112ae28491b249670a071ec', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8194', '90b8e8eca90756905bf80c293ae6a50a', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8195', '3c88c1db16b9523b4dcdcd572aa1e16a', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8196', 'cc02d42b8939768b8a4f1e4d826faa79', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8197', '35285aa740b37f0b1933da97bf4ca4b9', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8198', '28f248e9279ac845995c4e9f8af35c2b', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8199', '653cd6f9efefe6d273e2c116d2a6b765', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8200', '486c0401c56bf7ec2daa9eba58907da9', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('8201', 'c61aed648da48aa3893fb3eaadd88a7f', 'siswa', '2020-12-14 02:48:55', 'aktif'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2020-12-14 09:45:15', 'Aktif'),
('smkwsb1', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:24', 'aktif'),
('smkwsb10', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:25', 'aktif'),
('smkwsb11', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:25', 'aktif'),
('smkwsb12', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:25', 'aktif'),
('smkwsb13', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:25', 'aktif'),
('smkwsb14', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:25', 'aktif'),
('smkwsb15', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:25', 'aktif'),
('smkwsb16', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:25', 'aktif'),
('smkwsb17', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:25', 'aktif'),
('smkwsb18', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:26', 'aktif'),
('smkwsb19', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:26', 'aktif'),
('smkwsb2', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:24', 'aktif'),
('smkwsb20', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:26', 'aktif'),
('smkwsb21', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:26', 'aktif'),
('smkwsb22', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:26', 'aktif'),
('smkwsb23', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:26', 'aktif'),
('smkwsb24', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:26', 'aktif'),
('smkwsb25', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:26', 'aktif'),
('smkwsb26', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:26', 'aktif'),
('smkwsb27', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:26', 'aktif'),
('smkwsb28', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:26', 'aktif'),
('smkwsb29', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:27', 'aktif'),
('smkwsb3', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:24', 'aktif'),
('smkwsb30', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:27', 'aktif'),
('smkwsb31', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:27', 'aktif'),
('smkwsb32', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:27', 'aktif'),
('smkwsb33', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:27', 'aktif'),
('smkwsb34', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:27', 'aktif'),
('smkwsb35', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:27', 'aktif'),
('smkwsb36', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:27', 'aktif'),
('smkwsb37', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb38', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb39', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb4', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:24', 'aktif'),
('smkwsb40', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb41', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb42', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb43', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb44', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb45', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb46', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb47', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb48', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb49', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb5', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:24', 'aktif'),
('smkwsb50', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:28', 'aktif'),
('smkwsb51', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:29', 'aktif'),
('smkwsb52', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:29', 'aktif'),
('smkwsb53', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:29', 'aktif'),
('smkwsb54', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:29', 'aktif'),
('smkwsb55', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:29', 'aktif'),
('smkwsb56', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:29', 'aktif'),
('smkwsb57', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:29', 'aktif'),
('smkwsb58', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:29', 'aktif'),
('smkwsb59', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:29', 'aktif'),
('smkwsb6', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:24', 'aktif'),
('smkwsb60', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:29', 'aktif'),
('smkwsb61', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:29', 'aktif'),
('smkwsb62', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:29', 'aktif'),
('smkwsb63', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:30', 'aktif'),
('smkwsb64', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:30', 'aktif'),
('smkwsb65', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:30', 'aktif'),
('smkwsb66', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:30', 'aktif'),
('smkwsb67', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:30', 'aktif'),
('smkwsb68', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:30', 'aktif'),
('smkwsb69', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:30', 'aktif'),
('smkwsb7', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:24', 'aktif'),
('smkwsb70', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:30', 'aktif'),
('smkwsb71', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:30', 'aktif'),
('smkwsb72', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:30', 'aktif'),
('smkwsb73', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:30', 'aktif'),
('smkwsb74', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:30', 'aktif'),
('smkwsb75', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:31', 'aktif'),
('smkwsb76', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:31', 'aktif'),
('smkwsb77', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:31', 'aktif'),
('smkwsb78', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:31', 'aktif'),
('smkwsb79', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:31', 'aktif'),
('smkwsb8', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:25', 'aktif'),
('smkwsb80', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:31', 'aktif'),
('smkwsb81', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:31', 'aktif'),
('smkwsb82', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:31', 'aktif'),
('smkwsb83', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:31', 'aktif'),
('smkwsb84', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:31', 'aktif'),
('smkwsb85', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:32', 'aktif'),
('smkwsb86', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:32', 'aktif'),
('smkwsb87', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:32', 'aktif'),
('smkwsb88', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:32', 'aktif'),
('smkwsb89', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:32', 'aktif'),
('smkwsb9', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:25', 'aktif'),
('smkwsb90', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:32', 'aktif'),
('smkwsb91', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:32', 'aktif'),
('smkwsb92', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:32', 'aktif'),
('smkwsb93', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:32', 'aktif'),
('smkwsb94', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:32', 'aktif'),
('smkwsb95', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-14 02:49:32', 'aktif'),
('test', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-17 11:37:19', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `kd_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`kd_mapel`, `nama_mapel`) VALUES
('bind', 'Bahasa Indonesia'),
('bing', 'Bahasa Inggris'),
('bk', 'Bimbingan dan Konseling(BK)'),
('mtk', 'Matematika'),
('pabp', 'Pendidikan Agama dan Budi Pekerti'),
('ppkn', 'Pendidikan Pancasila dan Kewarganegaraan'),
('sjr', 'Sejarah Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `kd_materi` varchar(30) NOT NULL,
  `nama_materi` varchar(300) NOT NULL,
  `deskripsi` text NOT NULL,
  `ForL` varchar(5) NOT NULL DEFAULT 'file',
  `file` varchar(50) NOT NULL,
  `tgl_up` datetime NOT NULL,
  `pertemuan` varchar(10) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_guru` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`kd_materi`, `nama_materi`, `deskripsi`, `ForL`, `file`, `tgl_up`, `pertemuan`, `kd_mapel`, `kd_kelas`, `kd_guru`) VALUES
('012021GR079001', 'BIND 1', 'BIND 1', 'link', 'www.smkwsb.com', '2021-01-19 21:17:09', '1', 'bind', 'xakl1', 'GR079'),
('012021GR089001', 'lutfi ganteng', 'ganteng ed', 'file', 'lutfi ganteng_57940673.jpg', '2021-01-19 22:32:52', '1', 'bk', 'xan1', 'GR089'),
('012021GR090001', 'BIND 2', 'BIND 2', 'link', 'www.smkwsb.com', '2021-01-19 21:36:56', '2', 'bind', 'xakl1', 'GR090'),
('012021GR090002', 'reading', 'abc', 'link', 'www.smkwsb.com', '2021-01-19 21:37:28', '1', 'bing', 'xakl1', 'GR090'),
('012021GR090003', 'ok boskue', 'lutfi aziz mustafa ahmad jaelani', 'file', 'ok boskue_66668701.jpg', '2021-01-19 22:30:02', '3', 'bind', 'xakl1', 'GR090');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_ujian`
--

CREATE TABLE IF NOT EXISTS `nilai_ujian` (
  `kd_nilai_ujian` varchar(30) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `kd_ujian` varchar(50) NOT NULL,
  `tgl_mengerjakan` datetime NOT NULL,
  `nilai` int(11) NOT NULL,
  `salah` int(11) NOT NULL,
  `benar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_ujian`
--

INSERT INTO `nilai_ujian` (`kd_nilai_ujian`, `nis`, `kd_ujian`, `tgl_mengerjakan`, `nilai`, `salah`, `benar`) VALUES
('0820208168001', '8168', '072020GR090001', '2020-12-16 09:48:50', 33, 2, 1),
('0820208168002', '8168', '072020GR089001', '2020-12-29 19:07:48', 100, 0, 10),
('0820208170001', '8170', '072020GR090002', '2020-12-18 07:01:06', 50, 1, 1),
('0820208170002', '8170', '072020GR090003', '2020-12-18 11:14:45', 100, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajaran`
--

CREATE TABLE IF NOT EXISTS `pengajaran` (
`kd_pengajaran` int(11) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_guru` varchar(20) NOT NULL,
  `kd_silabus` varchar(30) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajaran`
--

INSERT INTO `pengajaran` (`kd_pengajaran`, `kd_mapel`, `kd_kelas`, `kd_guru`, `kd_silabus`) VALUES
(11, 'bing', 'xakl1', 'GR090', '1'),
(12, 'bind', 'xakl1', 'GR090,GR079', '042021GR090001'),
(13, 'bk', 'xan1', 'GR089', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id_post` int(200) NOT NULL,
  `kd_pengajaran` int(11) NOT NULL,
  `judul_post` varchar(200) NOT NULL,
  `isi_post` text NOT NULL,
  `penulis_post` varchar(100) NOT NULL,
  `tanggal_post` varchar(100) NOT NULL,
  `gambar_post` text NOT NULL,
  `suka_post` int(10) NOT NULL,
  `laporkan` varchar(20) NOT NULL,
  `tgl_lapor` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id_post`, `kd_pengajaran`, `judul_post`, `isi_post`, `penulis_post`, `tanggal_post`, `gambar_post`, `suka_post`, `laporkan`, `tgl_lapor`) VALUES
(1, 2, 'j', '<p>k</p>\r\n', '8170', '3:50 17/12/2020', '', 0, '0', '0000-00-00 00:00:00'),
(2, 2, 'o', '<p>p</p>\r\n', '8170', '3:51 17/12/2020', '', 0, '0', '0000-00-00 00:00:00'),
(3, 2, 'test', '<p>test</p>\r\n', '8170', '20:59 17/12/2020', '', 1, '0', '0000-00-00 00:00:00'),
(4, 7, 'selamat pagi siswa', '<p>coba 1</p>\r\n', 'smkwsb91', '11:20 18/12/2020', '20201218_112051daftar_soal.JPG', 1, '0', '0000-00-00 00:00:00'),
(5, 9, 'test', '<p>s</p>\r\n', 'smkwsb91', '12:05 12/01/2021', '', 0, '0', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombel`
--

CREATE TABLE IF NOT EXISTS `rombel` (
  `nis` varchar(10) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_tajar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rombel`
--

INSERT INTO `rombel` (`nis`, `kd_kelas`, `kd_tajar`) VALUES
('8170', 'xakl1', '2020-2021-ganjil'),
('8168', 'xakl1', '2020-2021-ganjil'),
('8169', 'xakl1', '2020-2021-ganjil'),
('8171', 'xakl1', '2020-2021-ganjil'),
('8172', 'xakl1', ''),
('8172', 'xakl1', ''),
('8172', 'xakl1', '2020-2021-ganjil'),
('8173', 'xakl1', '2020-2021-ganjil'),
('8174', 'xakl1', '2020-2021-ganjil'),
('8168', 'xav1', '2022-2023-ganjil'),
('8169', 'xav1', '2022-2023-ganjil'),
('8170', 'xav1', '2022-2023-ganjil'),
('--Pilih Si', 'xiiakl1', '2021-2022-ganjil'),
('8169', 'xiakl1', '2021-2022-genap'),
('--Pilih Si', 'xiakl1', '2021-2022-ganjil'),
('8168', 'xav1', '2021-2022-ganjil'),
('8169', 'xav1', '2021-2022-ganjil'),
('8168', 'xav1', '2021-2022-genap'),
('8169', 'xav1', '2021-2022-genap'),
('8168', 'xiiav1', '2022-2023-ganjil'),
('8169', 'xiiav1', '2022-2023-ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `silabus`
--

CREATE TABLE IF NOT EXISTS `silabus` (
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
('042021GR090001', 'bind', 'akl', 'X', 'test', 'bind_X_akl.pdf', '2021-02-17 07:47:52'),
('1', 'default', 'default', 'defaut', 'Belum Upload Silabus', 'silabus-default.pdf', '2020-12-14 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(10) NOT NULL DEFAULT '-',
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '-',
  `foto` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `telp` varchar(20) NOT NULL DEFAULT '-',
  `status` varchar(10) NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nisn`, `nama`, `username`, `kelamin`, `email`, `foto`, `telp`, `status`) VALUES
('8168', '-', 'AGIL PRASETYO', '8168', 'L', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8169', '-', 'AMANDA SEPTIA TEJANINGRUM', '8169', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8170', '-', 'APRILIA HANDAYANI', '8170', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8171', '-', 'ASYIFA BINTANG MAHARDHIKA', '8171', 'L', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8172', '-', 'AULIA EKI FITRIYANI', '8172', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8173', '-', 'CANDRIYA MELKA RANI', '8173', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8174', '-', 'DESI AYU SENO', '8174', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8175', '-', 'DEVINA PUTRI APRILIA', '8175', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8176', '-', 'DWI EKA DAMAYANTI', '8176', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8177', '-', 'ESTI WULANDARI', '8177', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8178', '-', 'GALIH ANDRIYANO', '8178', 'L', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8179', '-', 'HELFI AGUSTINA', '8179', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8180', '-', 'INDAH PRASTITI', '8180', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8181', '-', 'IRFANI ZUYYINATUL JANAH', '8181', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8182', '-', 'IRMA NUR AENI', '8182', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8183', '-', 'JAZILAH NAVISATUN HIKMAH', '8183', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8184', '-', 'KUNIK MASRUROH', '8184', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8185', '-', 'LENA ANGGRAINI AGUSTIN', '8185', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8186', '-', 'LISTYA WIJAYANTI', '8186', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8187', '-', 'LUSI SEPTIANI', '8187', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8188', '-', 'NUR AKSI OCTAVIA', '8188', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8189', '-', 'NUR DAHLIA', '8189', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8190', '-', 'RAISA SAFA NABILA', '8190', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8191', '-', 'REYNANDA ISHAQ VALENTINO', '8191', 'L', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8192', '-', 'REZA FAHLAFI', '8192', 'L', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8193', '-', 'RIHAB AINUR SAFITRI', '8193', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8194', '-', 'RIZZA UMALA', '8194', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8195', '-', 'RUMIYATI', '8195', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8196', '-', 'SAFIYA LESTARI', '8196', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8197', '-', 'SANDI ARKANA MAULANA', '8197', 'L', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8198', '-', 'SELLA AMILIA PUTRI', '8198', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8199', '-', 'SRI ANTIKA', '8199', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8200', '-', 'WANDA FITRIANA', '8200', 'P', 'email@mail.com', 'default.jpg', '-', 'Aktif'),
('8201', '-', 'WISNU PRATAMA', '8201', 'L', 'email@mail.com', 'default.jpg', '-', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `kd_soal` varchar(30) NOT NULL,
  `nama_soal` varchar(100) NOT NULL,
  `acak` varchar(5) NOT NULL DEFAULT 'T',
  `kd_mapel` varchar(10) NOT NULL,
  `kd_guru` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`kd_soal`, `nama_soal`, `acak`, `kd_mapel`, `kd_guru`) VALUES
('142020GR089001', 'Soal Bhs Ing', 'T', 'bing', 'GR089'),
('142021GR090001', 'ppkn1', 'T', 'ppkn', 'GR090');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suka_post`
--

CREATE TABLE IF NOT EXISTS `suka_post` (
  `id_suka` bigint(20) unsigned NOT NULL,
  `user_suka` varchar(100) NOT NULL,
  `id_post` int(200) NOT NULL,
  `post_suka` int(5) NOT NULL,
  `penulis_post` varchar(100) NOT NULL,
  `tanggal_suka` varchar(100) NOT NULL,
  `lihat_suka` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suka_post`
--

INSERT INTO `suka_post` (`id_suka`, `user_suka`, `id_post`, `post_suka`, `penulis_post`, `tanggal_suka`, `lihat_suka`) VALUES
(0, 'smkwsb91', 0, 0, 'smkwsb91', '2:45 17/12/2020', 1),
(0, 'smkwsb91', 3, 1, '8170', '7:07 18/12/2020', 1),
(0, 'smkwsb91', 4, 1, 'smkwsb91', '11:21 18/12/2020', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajar`
--

CREATE TABLE IF NOT EXISTS `tahun_ajar` (
  `kd_tajar` varchar(20) NOT NULL,
  `tahun_ajar` varchar(15) NOT NULL,
  `kd_semester` int(11) NOT NULL,
  `aktif` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_ajar`
--

INSERT INTO `tahun_ajar` (`kd_tajar`, `tahun_ajar`, `kd_semester`, `aktif`) VALUES
('2021-2022-ganjil', '2021-2022', 1, 'N'),
('2021-2022-genap', '2021-2022', 2, 'N'),
('2022-2023-ganjil', '2022-2023', 1, 'Y'),
('2022-2023-genap', '2022-2023', 2, 'N'),
('2023-2024-ganjil', '2023-2024', 1, 'N'),
('2023-2024-genap', '2023-2024', 2, 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `timeline`
--

CREATE TABLE IF NOT EXISTS `timeline` (
`id_timeline` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `id_jenis` varchar(30) NOT NULL,
  `waktu` datetime NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_guru` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `timeline`
--

INSERT INTO `timeline` (`id_timeline`, `jenis`, `id_jenis`, `waktu`, `kd_kelas`, `kd_mapel`, `kd_guru`) VALUES
(2, 'materi', '012020GR090002', '2020-12-16 05:35:51', 'xakl1', 'bing', 'GR090'),
(3, 'tugas', '022020GR090001', '2020-12-16 06:07:49', 'xakl1', 'bing', 'GR090'),
(5, 'ujian', '072020GR090001', '2020-12-16 08:03:52', 'xakl1', 'bing', 'GR090'),
(6, 'materi', '012020GR090003', '2020-12-16 08:45:49', 'xakl1', 'bing', 'GR090'),
(7, 'materi', '012020GR090004', '2020-12-18 06:46:34', 'xakl1', 'bing', 'GR090'),
(8, 'tugas', '022020GR090002', '2020-12-18 06:48:46', 'xakl1', 'bing', 'GR090'),
(9, 'tugas', '022020GR090003', '2020-12-18 06:51:35', 'xakl1', 'bing', 'GR090'),
(10, 'ujian', '072020GR090002', '2020-12-18 07:00:00', 'xakl1', 'bing', 'GR090'),
(13, 'ujian', '072020GR090003', '2020-12-18 11:11:51', 'xakl1', 'ppkn', 'GR090'),
(14, 'materi', '012020GR089001', '2020-12-29 18:59:54', 'xakl1', 'bing', 'GR089'),
(15, 'ujian', '072020GR089001', '2020-12-29 19:06:18', 'xakl1', 'bing', 'GR089'),
(16, 'tugas', '022021GR090001', '2021-01-12 11:46:14', 'xdpib1', 'mtk', 'GR090'),
(17, 'materi', '012021GR090001', '2021-01-12 11:51:32', 'xdpib1', 'mtk', 'GR090'),
(18, 'ujian', '072021GR090001', '2021-01-13 03:23:45', 'xakl1', 'ppkn', 'GR090'),
(19, 'materi', '012021GR079001', '2021-01-19 21:17:09', 'xakl1', 'bind', 'GR079'),
(20, 'materi', '012021GR090001', '2021-01-19 21:36:56', 'xakl1', 'bind', 'GR090'),
(21, 'materi', '012021GR090002', '2021-01-19 21:37:28', 'xakl1', 'bing', 'GR090'),
(22, 'materi', '012021GR090003', '2021-01-19 22:30:02', 'xakl1', 'bind', 'GR090'),
(23, 'materi', '012021GR089001', '2021-01-19 22:32:52', 'xan1', 'bk', 'GR089');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE IF NOT EXISTS `tugas` (
  `kd_tugas` varchar(30) NOT NULL,
  `nama_tugas` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `batas_awal` datetime NOT NULL,
  `batas_ahir` datetime NOT NULL,
  `file` varchar(50) NOT NULL,
  `tgl_up` datetime NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_guru` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`kd_tugas`, `nama_tugas`, `deskripsi`, `batas_awal`, `batas_ahir`, `file`, `tgl_up`, `kd_kelas`, `kd_mapel`, `kd_guru`) VALUES
('022020GR090001', 'Tugas 1', 'Integer ultrices lobortis eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin semper, ante vitae sollicitudin posuere, metus quam iaculis nibh, vitae scelerisque nunc massa eget pede. Sed velit urna, interdum vel, ultricies vel, faucibus at, quam. Donec elit est, consectetuer eget, consequat quis, tempus quis, wisi.', '2020-12-16 08:00:00', '2020-12-17 23:59:00', 'Tugas 1_83469434.pdf', '2020-12-16 06:07:49', 'xakl1', 'bing', 'GR090'),
('022020GR090002', 'Tugas 2', 'silahkan dikerjakan', '2020-12-18 06:48:00', '2020-12-18 06:48:00', 'Tugas 2_38766479.pdf', '2020-12-18 06:48:46', 'xakl1', 'bing', 'GR090'),
('022020GR090003', 'Tugas 3', 'dikerjakan', '2020-12-18 06:51:00', '2020-12-18 07:51:00', 'Tugas 3_77841186.pdf', '2020-12-18 06:51:35', 'xakl1', 'bing', 'GR090'),
('022021GR090001', 'tugas1', 'ok', '2021-01-12 05:45:00', '2021-01-14 11:46:00', 'tugas1_90667724.png', '2021-01-12 11:46:14', 'xdpib1', 'mtk', 'GR090');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE IF NOT EXISTS `ujian` (
  `kd_ujian` varchar(50) NOT NULL,
  `nama_ujian` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_ujian` datetime NOT NULL,
  `tgl_ahir` datetime NOT NULL,
  `jam` int(11) NOT NULL,
  `menit` int(11) NOT NULL,
  `detik` int(11) NOT NULL,
  `kd_soal` varchar(50) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_guru` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`kd_ujian`, `nama_ujian`, `deskripsi`, `tgl_ujian`, `tgl_ahir`, `jam`, `menit`, `detik`, `kd_soal`, `kd_kelas`, `kd_mapel`, `kd_guru`) VALUES
('072020GR090001', 'Ujian Matematika', 'Ujian MTK', '2020-12-28 22:10:00', '2020-12-28 23:10:00', 1, 0, 0, '142020GR090001', 'xakl1', 'mtk', 'GR090'),
('072020GR089001', 'Ujian Bahasa Inggris 1', 'aksdalksjdaladasdjladsad', '2020-12-29 07:05:00', '2020-12-29 22:06:00', 1, 0, 0, '142020GR089001', 'xakl1', 'bing', 'GR089'),
('072021GR090001', 'uj_ppkn', 'semangat', '2021-01-13 04:23:00', '2021-01-14 04:23:00', 1, 10, 0, '142021GR090001', 'xakl1', 'ppkn', 'GR090');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_kelas`
--

CREATE TABLE IF NOT EXISTS `wali_kelas` (
  `kd_guru` varchar(20) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
 ADD PRIMARY KEY (`kd_absensi`);

--
-- Indexes for table `detail_soal`
--
ALTER TABLE `detail_soal`
 ADD PRIMARY KEY (`kd_detail_soal`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`kd_guru`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
 ADD PRIMARY KEY (`id_jurnal`), ADD KEY `kd_guru` (`kd_guru`,`kd_mapel`), ADD KEY `kd_kelas` (`kd_kelas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
 ADD PRIMARY KEY (`kd_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `kerja_tugas`
--
ALTER TABLE `kerja_tugas`
 ADD PRIMARY KEY (`kd_kerja`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
 ADD PRIMARY KEY (`kd_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
 ADD PRIMARY KEY (`kd_materi`);

--
-- Indexes for table `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
 ADD PRIMARY KEY (`kd_nilai_ujian`);

--
-- Indexes for table `pengajaran`
--
ALTER TABLE `pengajaran`
 ADD PRIMARY KEY (`kd_pengajaran`), ADD KEY `kd_silabus` (`kd_silabus`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `silabus`
--
ALTER TABLE `silabus`
 ADD PRIMARY KEY (`kd_silabus`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
 ADD PRIMARY KEY (`kd_soal`);

--
-- Indexes for table `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
 ADD PRIMARY KEY (`kd_tajar`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
 ADD PRIMARY KEY (`id_timeline`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
MODIFY `kd_absensi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pengajaran`
--
ALTER TABLE `pengajaran`
MODIFY `kd_pengajaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id_post` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
MODIFY `id_timeline` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
