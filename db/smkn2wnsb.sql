-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2020 pada 06.06
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
-- Struktur dari tabel `detail_kurikulum`
--

CREATE TABLE `detail_kurikulum` (
  `id_detail` int(11) NOT NULL,
  `kd_kurikulum` int(11) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_guru` varchar(20) NOT NULL,
  `kd_silabus` varchar(30) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_kurikulum`
--

INSERT INTO `detail_kurikulum` (`id_detail`, `kd_kurikulum`, `kd_mapel`, `kd_kelas`, `kd_guru`, `kd_silabus`) VALUES
(6, 3, 'bind', 'xav1', 'GR007', '1'),
(7, 3, 'mtk', 'xav1', 'GR009', '042020GR009001'),
(8, 3, 'bing', 'xav1', 'GR001', '1'),
(9, 3, 'ppkn', 'xav1', 'GR022', '1'),
(10, 3, 'bind', 'xintel1', 'GR007', '1'),
(11, 3, 'mtk', 'xintel1', 'GR009', '042020GR009001'),
(12, 3, 'bing', 'xintel1', 'GR001', '1'),
(13, 3, 'ppkn', 'xintel1', 'GR009', '042020GR009002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_soal`
--

CREATE TABLE `detail_soal` (
  `kd_detail_soal` int(11) NOT NULL,
  `kd_soal` varchar(10) NOT NULL,
  `soal` text NOT NULL,
  `pil_A` varchar(50) NOT NULL,
  `pil_B` varchar(50) NOT NULL,
  `pil_C` varchar(50) NOT NULL,
  `pil_D` varchar(50) NOT NULL,
  `pil_E` varchar(50) NOT NULL,
  `kunci` varchar(5) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(100) NOT NULL DEFAULT 'T',
  `C` varchar(10) NOT NULL DEFAULT '-',
  `P` varchar(10) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
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
('GR001', 'ainurr001', '02301012742128', 'Ainur Rojik, S.Pd., M.Eng.', '0857813817', 'email@mail.com', 'default.jpg', 'aktif'),
('GR007', 'sitii007', '-', 'Siti Istinganah, S.Pd, M.Pd', '-', '-', 'default.jpg', 'aktif'),
('GR009', 'pujii009', '-', 'Puji Iswati,S.Pd  ', '-', '-', 'default.jpg', 'aktif'),
('GR022', 'dewinp022', '182392189213298', 'Dewi Natalia Purnaningsih, S.Si, M.M', '1274912801302', 'email@mail.com', 'default.jpg', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
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

CREATE TABLE `kelas` (
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
('xintel1', 'X INTEL 1', 'X', 'intel'),
('xtkro1', 'X TKRO 1', 'X', 'tkro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerja_tugas`
--

CREATE TABLE `kerja_tugas` (
  `kd_kerja` varchar(30) NOT NULL,
  `kd_tugas` varchar(30) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `file_kerja` varchar(100) NOT NULL DEFAULT 'T',
  `nilai` int(11) NOT NULL DEFAULT 0,
  `status_kerja` varchar(20) NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kerja_tugas`
--

INSERT INTO `kerja_tugas` (`kd_kerja`, `kd_tugas`, `nis`, `file_kerja`, `nilai`, `status_kerja`) VALUES
('1220207768001', '022020GR009002', '7768', '1220207768001.JPG', 90, 'N'),
('1220207770001', '022020GR009002', '7770', 'T', 0, 'T'),
('1220207801001', '022020GR009001', '7801', 'T', 0, 'T'),
('1220207805001', '022020GR009002', '7805', 'T', 0, 'T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE `kurikulum` (
  `kd_kurikulum` int(11) NOT NULL,
  `nama_kurikulum` varchar(30) NOT NULL,
  `aktif` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kurikulum`
--

INSERT INTO `kurikulum` (`kd_kurikulum`, `nama_kurikulum`, `aktif`) VALUES
(2, 'Kurikulm 2010', 'N'),
(3, 'Kurikulum 2020', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
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
('abdullahpl001', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa', '2020-12-08 07:07:55', 'aktif'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2020-11-25 19:08:22', 'Aktif'),
('aguspk001', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa', '2020-12-08 07:04:35', 'aktif'),
('ainurr001', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-08 07:01:45', 'aktif'),
('ajengs003', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa', '2020-12-08 07:07:27', 'aktif'),
('azimans005', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa', '2020-12-08 07:07:55', 'aktif'),
('dewinp022', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-08 07:01:45', 'aktif'),
('pujii009', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-08 06:59:28', 'aktif'),
('sitii007', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-08 06:59:28', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
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

CREATE TABLE `materi` (
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
('012020GR009001', 'Materi Pertemuan 1', 'Pengenalan tentang matematika', 'link', 'https://www.youtube.com/', '2020-12-08 11:48:43', '1', 'mtk', 'xav1', 'GR009'),
('012020GR009002', 'Materi Pertemuan 1', 'Pengenalan tentang matematika', 'link', 'https://www.youtube.com/', '2020-12-08 11:48:43', '1', 'mtk', 'xintel1', 'GR009'),
('012020GR009003', 'Logika Matematika', 'Membahas mengenai logika matematika', 'file', 'logika matematika_27380819.pdf', '2020-12-08 11:51:23', '2 dan 3', 'mtk', 'xav1', 'GR009'),
('012020GR009004', 'Logika Matematika', 'Membahas mengenai logika matematika', 'file', 'logika matematika_27380819.pdf', '2020-12-08 11:51:23', '2 dan 3', 'mtk', 'xintel1', 'GR009'),
('012020GR009005', 'Ideologi Bangsa', 'Membahas ideologi bangsa indonesia', 'file', 'ideologi bangsa_94444777.pdf', '2020-12-08 11:54:00', '1', 'ppkn', 'xintel1', 'GR009');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_ujian`
--

CREATE TABLE `nilai_ujian` (
  `kd_nilai_ujian` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `kd_ujian` varchar(50) NOT NULL,
  `tgl_mengerjakan` datetime NOT NULL,
  `nilai` int(11) NOT NULL,
  `salah` int(11) NOT NULL,
  `benar` int(11) NOT NULL,
  `kosong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombel`
--

CREATE TABLE `rombel` (
  `nis` varchar(10) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_tajar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rombel`
--

INSERT INTO `rombel` (`nis`, `kd_kelas`, `kd_tajar`) VALUES
('7768', 'xintel1', '2020-2021-ganjil'),
('7770', 'xintel1', '2020-2021-ganjil'),
('7801', 'xav1', '2020-2021-ganjil'),
('7805', 'xintel1', '2020-2021-ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `silabus`
--

CREATE TABLE `silabus` (
  `kd_silabus` varchar(30) NOT NULL,
  `judul` varchar(32) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `tanggal_upload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `silabus`
--

INSERT INTO `silabus` (`kd_silabus`, `judul`, `nama_file`, `tanggal_upload`) VALUES
('042020GR009001', 'Silabus Matematika', '042020GR009001.pdf', '2020-12-08 11:42:20'),
('042020GR009002', 'Silabus PPKN', '042020GR009002.pdf', '2020-12-08 11:43:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
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
('7768', '-', 'AGUS PUTRA KURNIAWAN', 'aguspk001', 'L', '-', 'default.jpg', '-', 'Aktif'),
('7770', '-', 'AJENG SITIANINGRUM', 'ajengs003', 'P', '-', 'default.jpg', '-', 'Aktif'),
('7801', '-', 'ABDULLAH PARVEST LATIEF', 'abdullahpl001', 'L', '-', 'default.jpg', '-', 'Aktif'),
('7805', '-', 'AZIMA NUR SYALIMA', 'azimans005', 'P', '-', 'default.jpg', '-', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
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
('142020GR009001', 'Ujian Logika Matematika', 'T', 'mtk', 'GR009');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajar`
--

CREATE TABLE `tahun_ajar` (
  `kd_tajar` varchar(20) NOT NULL,
  `tahun_ajar` varchar(15) NOT NULL,
  `kd_semester` int(11) NOT NULL,
  `aktif` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_ajar`
--

INSERT INTO `tahun_ajar` (`kd_tajar`, `tahun_ajar`, `kd_semester`, `aktif`) VALUES
('2020-2021-ganjil', '2020-2021', 1, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `timeline`
--

CREATE TABLE `timeline` (
  `id_timeline` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `id_jenis` varchar(30) NOT NULL,
  `waktu` datetime NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_guru` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `timeline`
--

INSERT INTO `timeline` (`id_timeline`, `jenis`, `id_jenis`, `waktu`, `kd_kelas`, `kd_mapel`, `kd_guru`) VALUES
(2, 'materi', '012020GR009001', '2020-12-08 11:48:43', 'xav1', 'mtk', 'GR009'),
(3, 'materi', '012020GR009002', '2020-12-08 11:48:43', 'xintel1', 'mtk', 'GR009'),
(4, 'materi', '012020GR009003', '2020-12-08 11:51:23', 'xav1', 'mtk', 'GR009'),
(5, 'materi', '012020GR009004', '2020-12-08 11:51:23', 'xintel1', 'mtk', 'GR009'),
(6, 'materi', '012020GR009005', '2020-12-08 11:54:00', 'xintel1', 'ppkn', 'GR009'),
(7, 'tugas', '022020GR009001', '2020-12-08 11:56:44', 'xav1', 'mtk', 'GR009'),
(8, 'tugas', '022020GR009002', '2020-12-08 11:56:44', 'xintel1', 'mtk', 'GR009');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `kd_tugas` varchar(30) NOT NULL,
  `nama_tugas` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `batas_awal` datetime NOT NULL,
  `batas_ahir` datetime NOT NULL,
  `file` varchar(50) NOT NULL,
  `tgl_up` datetime NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_guru` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`kd_tugas`, `nama_tugas`, `deskripsi`, `batas_awal`, `batas_ahir`, `file`, `tgl_up`, `kd_kelas`, `kd_mapel`, `kd_guru`) VALUES
('022020GR009001', 'Tugas 1', 'Selesaikan soal soal berikut', '2020-12-08 12:00:00', '2020-12-08 17:00:00', 'Tugas 1_33949461.pdf', '2020-12-08 11:56:44', 'xav1', 'mtk', 'GR009'),
('022020GR009002', 'Tugas 1', 'Selesaikan soal soal berikut', '2020-12-08 12:00:00', '2020-12-08 17:00:00', 'Tugas 1_33949461.pdf', '2020-12-08 11:56:44', 'xintel1', 'mtk', 'GR009');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `kd_ujian` varchar(50) NOT NULL,
  `nama_ujian` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_ujian` datetime NOT NULL,
  `jam` int(11) NOT NULL,
  `menit` int(11) NOT NULL,
  `detik` int(11) NOT NULL,
  `kd_soal` varchar(50) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_guru` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `kd_guru` varchar(20) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_tajar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wali_kelas`
--

INSERT INTO `wali_kelas` (`kd_guru`, `kd_kelas`, `kd_tajar`) VALUES
('GR001', 'xav1', '2020-2021-ganjil'),
('GR007', 'xintel1', '2020-2021-ganjil');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_kurikulum`
--
ALTER TABLE `detail_kurikulum`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `kd_guru` (`kd_guru`),
  ADD KEY `kd_kelas` (`kd_kelas`),
  ADD KEY `kd_kurikulum` (`kd_kurikulum`),
  ADD KEY `kd_mapel` (`kd_mapel`);

--
-- Indeks untuk tabel `detail_soal`
--
ALTER TABLE `detail_soal`
  ADD PRIMARY KEY (`kd_detail_soal`),
  ADD KEY `kd_soal` (`kd_soal`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kd_guru`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kd_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`),
  ADD KEY `kd_jurusan` (`kd_jurusan`);

--
-- Indeks untuk tabel `kerja_tugas`
--
ALTER TABLE `kerja_tugas`
  ADD PRIMARY KEY (`kd_kerja`);

--
-- Indeks untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`kd_kurikulum`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kd_mapel`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kd_materi`);

--
-- Indeks untuk tabel `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  ADD PRIMARY KEY (`kd_nilai_ujian`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `rombel`
--
ALTER TABLE `rombel`
  ADD KEY `ang-siswa` (`nis`),
  ADD KEY `ang-kelas` (`kd_kelas`),
  ADD KEY `ang-tajar` (`kd_tajar`);

--
-- Indeks untuk tabel `silabus`
--
ALTER TABLE `silabus`
  ADD PRIMARY KEY (`kd_silabus`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`kd_soal`);

--
-- Indeks untuk tabel `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  ADD PRIMARY KEY (`kd_tajar`);

--
-- Indeks untuk tabel `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id_timeline`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`kd_tugas`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`kd_ujian`);

--
-- Indeks untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD KEY `kd_guru` (`kd_guru`),
  ADD KEY `kd_kelas` (`kd_kelas`),
  ADD KEY `kd_tajar` (`kd_tajar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_kurikulum`
--
ALTER TABLE `detail_kurikulum`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `detail_soal`
--
ALTER TABLE `detail_soal`
  MODIFY `kd_detail_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `kd_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id_timeline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_kurikulum`
--
ALTER TABLE `detail_kurikulum`
  ADD CONSTRAINT `detail_kurikulum_ibfk_1` FOREIGN KEY (`kd_guru`) REFERENCES `guru` (`kd_guru`),
  ADD CONSTRAINT `detail_kurikulum_ibfk_2` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`),
  ADD CONSTRAINT `detail_kurikulum_ibfk_3` FOREIGN KEY (`kd_kurikulum`) REFERENCES `kurikulum` (`kd_kurikulum`),
  ADD CONSTRAINT `detail_kurikulum_ibfk_4` FOREIGN KEY (`kd_mapel`) REFERENCES `mapel` (`kd_mapel`);

--
-- Ketidakleluasaan untuk tabel `detail_soal`
--
ALTER TABLE `detail_soal`
  ADD CONSTRAINT `detail_soal_ibfk_1` FOREIGN KEY (`kd_soal`) REFERENCES `soal` (`kd_soal`);

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`);

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`);

--
-- Ketidakleluasaan untuk tabel `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  ADD CONSTRAINT `nilai_ujian_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Ketidakleluasaan untuk tabel `rombel`
--
ALTER TABLE `rombel`
  ADD CONSTRAINT `ang-kelas` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`),
  ADD CONSTRAINT `ang-siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `ang-tajar` FOREIGN KEY (`kd_tajar`) REFERENCES `tahun_ajar` (`kd_tajar`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`);

--
-- Ketidakleluasaan untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `wali_kelas_ibfk_1` FOREIGN KEY (`kd_guru`) REFERENCES `guru` (`kd_guru`),
  ADD CONSTRAINT `wali_kelas_ibfk_2` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`),
  ADD CONSTRAINT `wali_kelas_ibfk_3` FOREIGN KEY (`kd_tajar`) REFERENCES `tahun_ajar` (`kd_tajar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
