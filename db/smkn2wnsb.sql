-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2020 pada 09.41
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
  `kd_silabus` varchar(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_kurikulum`
--

INSERT INTO `detail_kurikulum` (`id_detail`, `kd_kurikulum`, `kd_mapel`, `kd_kelas`, `kd_guru`, `kd_silabus`) VALUES
(1, 1, 'bind', 'xa1', 'GR001', '0'),
(2, 1, 'mtk', 'xa1', 'GR002', '0'),
(3, 1, 'bind', 'xa2', 'GR003', '0'),
(4, 1, 'mtk', 'xa2', 'GR002', '0');

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
  `gambar` varchar(100) NOT NULL DEFAULT 'T'
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
  `gelpend` varchar(10) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`kd_guru`, `username`, `nip`, `nama`, `gelpend`, `tmp_lahir`, `tgl_lahir`, `alamat`, `telp`, `email`, `foto`, `status`) VALUES
('GR001', 'ari', '020481902470147', 'Ari', 'S. Kom.', 'Wonosobo', '1994-01-07', 'kadklajsdlajsldajsd', '080808097', 'emaeai@sndakd.com', 'foto.jpg', 'aktif'),
('GR002', 'surtini', '1819165161681651681', 'Surtini', 'S. Pd.', 'Wonosobo', '1984-12-23', 'Wonosobo', '2161909190', 'email@email.com', 'surtini.jpg', 'aktif'),
('GR003', 'Sarjiah', '4188684454668455', 'Sarjiah', 'S. Pd.', 'Magelang', '1980-11-16', 'Wonosobo', '08215616165', 'email@mail.com', 'sarjiah.jpg', 'aktif');

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
  `kd_materi` varchar(10) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_silabus` varchar(11) NOT NULL,
  `nama_materi` varchar(300) NOT NULL,
  `tgl_up` date NOT NULL,
  `kd_semester` int(11) NOT NULL,
  `pertemuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `ortu`
--

CREATE TABLE `ortu` (
  `kd_ortu` int(11) NOT NULL,
  `ayah` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(32) NOT NULL,
  `ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ortu`
--

INSERT INTO `ortu` (`kd_ortu`, `ayah`, `pekerjaan_ayah`, `ibu`, `pekerjaan_ibu`, `alamat`, `telp`) VALUES
(1, 'Ayah Siswa 1', 'Petani', 'Ibu Siswa 1', 'Ibu Rumah Tangga', 'Wonosobo', '0987757989');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombel`
--

CREATE TABLE `rombel` (
  `nis` varchar(10) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_tajar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `kd_semester` int(11) NOT NULL,
  `semester` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `silabus`
--

CREATE TABLE `silabus` (
  `kd_silabus` varchar(11) NOT NULL,
  `judul` varchar(32) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `tanggal_upload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `silabus`
--

INSERT INTO `silabus` (`kd_silabus`, `judul`, `nama_file`, `tanggal_upload`) VALUES
('0', 'Belum Ada', 'silabus-default.pdf', '2020-11-27 00:00:00');

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
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kd_ortu` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nisn`, `nama`, `username`, `kelamin`, `tmp_lahir`, `tgl_lahir`, `kd_ortu`, `alamat`, `email`, `foto`, `telp`, `status`) VALUES
('3123', '-', 'Siswa Dummy', 'siswa1', 'L', 'Wonosobo', '1993-10-10', 1, 'Wonosobo', 'email@gmail.com', 'foto.jpg', '0857432211', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_quis`
--

CREATE TABLE `soal_quis` (
  `kd_soal` varchar(10) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_materi` varchar(10) NOT NULL,
  `nama_quiz` varchar(100) NOT NULL,
  `tgl_quiz` date NOT NULL,
  `jam` int(11) NOT NULL,
  `menit` int(11) NOT NULL,
  `detik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `kd_mapel` (`kd_mapel`),
  ADD KEY `kd_silabus` (`kd_silabus`);

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
  ADD PRIMARY KEY (`kd_materi`),
  ADD KEY `kd_kelas` (`kd_kelas`),
  ADD KEY `kd_mapel` (`kd_mapel`),
  ADD KEY `kd_silabus` (`kd_silabus`),
  ADD KEY `kd_semester` (`kd_semester`);

--
-- Indeks untuk tabel `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  ADD PRIMARY KEY (`kd_nilai_ujian`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`kd_ortu`);

--
-- Indeks untuk tabel `rombel`
--
ALTER TABLE `rombel`
  ADD KEY `ang-siswa` (`nis`),
  ADD KEY `ang-kelas` (`kd_kelas`),
  ADD KEY `ang-tajar` (`kd_tajar`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`kd_semester`);

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
  ADD KEY `username` (`username`),
  ADD KEY `kd_ortu` (`kd_ortu`);

--
-- Indeks untuk tabel `soal_quis`
--
ALTER TABLE `soal_quis`
  ADD PRIMARY KEY (`kd_soal`),
  ADD KEY `kd_kelas` (`kd_kelas`),
  ADD KEY `kd_materi` (`kd_materi`);

--
-- Indeks untuk tabel `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  ADD PRIMARY KEY (`kd_tajar`),
  ADD KEY `kd_semester` (`kd_semester`);

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
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_soal`
--
ALTER TABLE `detail_soal`
  MODIFY `kd_detail_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `kd_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ortu`
--
ALTER TABLE `ortu`
  MODIFY `kd_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `kd_semester` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `detail_kurikulum_ibfk_4` FOREIGN KEY (`kd_mapel`) REFERENCES `mapel` (`kd_mapel`),
  ADD CONSTRAINT `detail_kurikulum_ibfk_5` FOREIGN KEY (`kd_silabus`) REFERENCES `silabus` (`kd_silabus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_soal`
--
ALTER TABLE `detail_soal`
  ADD CONSTRAINT `detail_soal_ibfk_1` FOREIGN KEY (`kd_soal`) REFERENCES `soal_quis` (`kd_soal`);

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
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`),
  ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`kd_mapel`) REFERENCES `mapel` (`kd_mapel`),
  ADD CONSTRAINT `materi_ibfk_3` FOREIGN KEY (`kd_silabus`) REFERENCES `silabus` (`kd_silabus`),
  ADD CONSTRAINT `materi_ibfk_4` FOREIGN KEY (`kd_semester`) REFERENCES `semester` (`kd_semester`);

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
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`kd_ortu`) REFERENCES `ortu` (`kd_ortu`);

--
-- Ketidakleluasaan untuk tabel `soal_quis`
--
ALTER TABLE `soal_quis`
  ADD CONSTRAINT `soal_quis_ibfk_1` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`),
  ADD CONSTRAINT `soal_quis_ibfk_2` FOREIGN KEY (`kd_materi`) REFERENCES `materi` (`kd_materi`);

--
-- Ketidakleluasaan untuk tabel `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  ADD CONSTRAINT `tahun_ajar_ibfk_1` FOREIGN KEY (`kd_semester`) REFERENCES `semester` (`kd_semester`);

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
