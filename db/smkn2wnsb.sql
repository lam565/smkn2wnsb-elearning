-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2020 pada 09.20
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

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
(1, 1, 'bind', 'xa1', 'GR001', '042020GR001001'),
(2, 1, 'mtk', 'xa1', 'GR002', '1'),
(3, 1, 'bind', 'xa2', 'GR003', '1'),
(4, 1, 'mtk', 'xa2', 'GR002', '1'),
(5, 1, 'mtk', 'xs1', 'GR001', '1');

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
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`kd_guru`, `username`, `nip`, `nama`, `telp`, `email`, `foto`, `status`) VALUES
('GR001', 'ari', '020481902470147', 'Ari', '080808097', 'emaeai@sndakd.com', 'foto.jpg', 'aktif'),
('GR002', 'surtini', '1819165161681651681', 'Surtini', '2161909190', 'email@email.com', 'surtini.jpg', 'aktif'),
('GR003', 'Sarjiah', '4188684454668455', 'Sarjiah', '08215616165', 'email@mail.com', 'sarjiah.jpg', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kd_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kd_jurusan`, `nama_jurusan`) VALUES
('1', 'IPA'),
('2', 'IPS');

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
('xa1', 'X IPA 1', '10', '1'),
('xa2', 'X IPA 2', '10', '1'),
('xs1', 'X IPS 1', '10', '2'),
('xs2', 'X IPS 2', '10', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerja_tugas`
--

CREATE TABLE `kerja_tugas` (
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
('1220203123001', '022020GR001001', '3123', '1220203123001.jpg', 90, 'N'),
('1220203123002', '022020GR001002', '3123', 'T', 0, 'T');

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
(1, 'Kurikulum 2020', 'Y');

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
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2020-11-25 19:08:22', 'Aktif'),
('ari', 'fc292bd7df071858c2d0f955545673c1', 'guru', '2020-11-14 17:38:35', 'aktif'),
('Sarjiah', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-11-27 08:04:04', 'Aktif'),
('siswa1', '013f0f67779f3b1686c604db150d12ea', 'siswa', '2020-11-14 18:26:22', 'Aktif'),
('superadmin', '63e0c1f48ef9e06cd96ca43a24d01a21', 'superadmin', '0000-00-00 00:00:00', ''),
('surtini', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-11-27 08:04:04', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `kd_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`kd_mapel`, `nama_mapel`) VALUES
('bind', 'Bahasa Indonesia'),
('mtk', 'Matematika');

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
('012020GR001001', 'Pertemuan awal', 'Pantun dan Peribahasa', 'file', 'pantun dan peribahasa_53913634.pdf', '2020-12-03 09:12:30', '1 dan 2', 'bind', 'xa1', 'GR001'),
('012020GR002001', 'Materi 1', 'Deskripsi saja', 'file', 'Permohonan_33836816.pdf', '2020-12-06 09:50:23', '1 dan 2', 'mtk', 'xa1', 'GR002'),
('012020GR002002', 'Materi 1', 'Deskripsi saja', 'file', 'Permohonan_33836816.pdf', '2020-12-06 09:50:23', '1 dan 2', 'mtk', 'xa2', 'GR002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_ujian`
--

CREATE TABLE `nilai_ujian` (
  `kd_nilai_ujian` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL
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
('3123', 'xa1', '2020-2021-ganjil');

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
('042020GR001001', 'Silabus 2020', '042020GR001001.pdf', '2020-12-03 02:34:56'),
('1', 'Belum Ada', 'silabus-default.pdf', '2020-11-27 00:00:00');

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
  `email` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `telp` varchar(20) NOT NULL DEFAULT '-',
  `status` varchar(10) NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nisn`, `nama`, `username`, `kelamin`, `email`, `foto`, `telp`, `status`) VALUES
('3123', '-', 'Siswa Dummy', 'siswa1', 'L', 'email@gmail.com', 'foto.jpg', '0857432211', 'Aktif');

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
('142020GR001001', 'Soal Bahasa Indonesia I', 'T', 'bind', 'GR001'),
('142020GR001002', 'Soal Matematika', 'T', 'mtk', 'GR001');

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
(1, 'materi', '012020GR001001', '2020-12-03 09:12:30', 'xa1', 'bind', 'GR001'),
(18, 'materi', '012020GR002001', '2020-12-06 09:50:23', 'xa1', 'mtk', 'GR002'),
(19, 'materi', '012020GR002002', '2020-12-06 09:50:23', 'xa2', 'mtk', 'GR002'),
(42, 'tugas', '022020GR001001', '2020-12-06 18:28:52', 'xa1', 'bind', 'GR001'),
(43, 'tugas', '022020GR001002', '2020-12-06 18:29:37', 'xa1', 'bind', 'GR001'),
(44, 'tugas', '022020GR001003', '2020-12-06 20:00:59', 'xs1', 'mtk', 'GR001');

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
('022020GR001001', 'Tugas 1', 'sfasfaegaggagasg', '2020-12-06 19:00:00', '2020-12-07 12:00:00', 'PROPOSAL STIMULUS COVID 19_70755774.pdf', '2020-12-06 18:28:52', 'xa1', 'bind', 'GR001'),
('022020GR001002', 'Tugas 2', 'dasfasfasdasdas', '2020-12-06 12:59:00', '2020-12-07 13:00:00', 'ijazah (1)_55496699.pdf', '2020-12-06 18:29:37', 'xa1', 'bind', 'GR001'),
('022020GR001003', 'Tugas Matematika', 'Deskripsi tugas matematika', '2020-12-06 19:00:00', '2020-12-07 18:00:00', 'Tugas Matematika_25978827.pdf', '2020-12-06 20:00:59', 'xs1', 'mtk', 'GR001');

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
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_soal`
--
ALTER TABLE `detail_soal`
  MODIFY `kd_detail_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `kd_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id_timeline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
