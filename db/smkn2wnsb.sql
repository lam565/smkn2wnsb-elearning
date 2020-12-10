-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Des 2020 pada 01.24
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
-- Struktur dari tabel `detail_kurikulum`
--

CREATE TABLE IF NOT EXISTS `detail_kurikulum` (
`id_detail` int(11) NOT NULL,
  `kd_kurikulum` int(11) NOT NULL,
  `kd_mapel` varchar(10) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_guru` varchar(20) NOT NULL,
  `kd_silabus` varchar(30) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE IF NOT EXISTS `detail_soal` (
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
('GR001', 'ainurr001', '02301012742128', 'Ainur Rojik, S.Pd., M.Eng.', '0857813817', 'email@mail.com', 'default.jpg', 'aktif'),
('GR007', 'sitii007', '-', 'Siti Istinganah, S.Pd, M.Pd', '-', '-', 'default.jpg', 'aktif'),
('GR009', 'pujii009', '-', 'Puji Iswati,S.Pd  ', '-', '-', 'default.jpg', 'aktif'),
('GR022', 'dewinp022', '182392189213298', 'Dewi Natalia Purnaningsih, S.Si, M.M', '1274912801302', 'email@mail.com', 'default.jpg', 'aktif');

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
('xakl2', 'X AKL 2', 'x', 'akl'),
('xakl3', 'X AKL 3', 'x', 'akl'),
('xan1', 'X AN 1', 'X', 'an'),
('xan2', 'X AN 2', 'X', 'an'),
('xav1', 'X AV 1', 'X', 'av'),
('xav2', 'X AV 2', 'X', 'av'),
('xdpib1', 'X DPIB 1', 'X', 'dpib'),
('xdpib2', 'X DPIB 2', 'X', 'dpib'),
('xiakl1', 'XI AKL 1', 'XI', 'akl'),
('xiakl2', 'XI AKL 2', 'XI', 'akl'),
('xiakl3', 'XI AKL 3', 'XI', 'akl'),
('xian', 'XI AN ', 'XI', 'an'),
('xiav2', 'XI AV 2', 'XI', 'av'),
('xidpib1', 'XI DPIB 1', 'XI', 'dpib'),
('xidpib2', 'XI DPIB 2', 'XI', 'dpib'),
('xidpib3', 'XI DPIB 3', 'XI', 'dpib'),
('xiiakl1', 'XII AKL 1', 'XII', 'akl'),
('xiiakl2', 'XII AKL 2', 'XII', 'akl'),
('xiiakl3', 'XII AKL 3', 'XII', 'akl'),
('xiian', 'XII AN', 'XII', 'an'),
('xiiav1', 'XI AV 1', 'XI', 'av'),
('xiiav2', 'XII AV 2', 'XII', 'av'),
('xiidpib1', 'XII DPIB 1', 'XII', 'dpib'),
('xiidpib2', 'XII DPIB 2', 'XII', 'dpib'),
('xiidpib3', 'XII DPIB 3', 'XII', 'dpib'),
('xiiintel1', 'XII INTEL ', 'XII', 'intel'),
('xiintel1', 'XI INTEL 1', 'XI', 'intel'),
('xiintel2', 'XI INTEL 2', 'XI', 'intel'),
('xiitkro1', 'XII TKRO 1', 'XII', 'tkro'),
('xiitkro2', 'XII TKRO 2', 'XII', 'tkro'),
('xiitkro3', 'XII TKRO 3', 'XII', 'tkro'),
('xiitkro4', 'XII TKRO 4', 'XII', 'tkro'),
('xintel1', 'X INTEL 1', 'X', 'intel'),
('xintel2', 'X INTEL 2', 'X', 'intel'),
('xitkro1', 'XI TKRO 1', 'XI', 'tkro'),
('xitkro2', 'XI TKRO 2', 'XI', 'tkro'),
('xitkro3', 'XI TKRO 3', 'XI', 'tkro'),
('xitkro4', 'XI TKRO 4', 'XI', 'tkro'),
('xtkro1', 'X TKRO 1', 'X', 'tkro'),
('xtkro2', 'X TKRO 2', 'X', 'tkro'),
('xtkro3', 'X TKRO 3', 'X', 'tkro'),
('xtkro4', 'X TKRO 4', 'X', 'tkro');

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
('1220207768001', '022020GR009002', '7768', '1220207768001.JPG', 90, 'N'),
('1220207770001', '022020GR009002', '7770', 'T', 0, 'T'),
('1220207801001', '022020GR009001', '7801', 'T', 0, 'T'),
('1220207805001', '022020GR009002', '7805', 'T', 0, 'T');

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
  `penulis_post` varchar(100) NOT NULL,
  `lihat_komentar` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `penulis_komentar`, `isi_komentar`, `tanggal_komentar`, `id_post`, `penulis_post`, `lihat_komentar`) VALUES
(1, 'ainurr001', 'abc', '18:34 09/12/2020', 2, 'ainurr001', 1),
(2, 'ainurr001', 'aku', '18:39 09/12/2020', 2, 'ainurr001', 1),
(3, 'ainurr001', 'akuu', '18:39 09/12/2020', 2, 'ainurr001', 1),
(4, 'ainurr001', 'akuuu', '18:39 09/12/2020', 2, 'ainurr001', 1),
(5, 'ainurr001', 'ana', '18:39 09/12/2020', 2, 'ainurr001', 1),
(6, 'ainurr001', 'anai', '18:39 09/12/2020', 2, 'ainurr001', 1),
(7, 'ainurr001', 'anaii', '18:39 09/12/2020', 2, 'ainurr001', 1),
(8, 'ainurr001', 'anaiik', '18:39 09/12/2020', 2, 'ainurr001', 1),
(9, 'ainurr001', 'anaiikk', '18:39 09/12/2020', 2, 'ainurr001', 1),
(10, 'ainurr001', 'anaiikkk', '18:39 09/12/2020', 2, 'ainurr001', 1),
(11, 'ainurr001', 'anaiikkkk', '18:39 09/12/2020', 2, 'ainurr001', 1),
(12, 'ainurr001', 'baik', '18:50 09/12/2020', 2, 'ainurr001', 1),
(13, 'ainurr001', 'pp', '18:57 09/12/2020', 2, 'ainurr001', 1),
(14, 'ainurr001', 'yang', '19:00 09/12/2020', 2, 'ainurr001', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE IF NOT EXISTS `kurikulum` (
`kd_kurikulum` int(11) NOT NULL,
  `nama_kurikulum` varchar(30) NOT NULL,
  `aktif` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kurikulum`
--

INSERT INTO `kurikulum` (`kd_kurikulum`, `nama_kurikulum`, `aktif`) VALUES
(1, 'abc', 'Y'),
(2, 'Kurikulm 2010', 'N'),
(3, 'Kurikulum 2020', 'Y');

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
('abdullahpl001', '202cb962ac59075b964b07152d234b70', 'siswa', '2020-12-08 07:07:55', 'aktif'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2020-11-25 19:08:22', 'Aktif'),
('aguspk001', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa', '2020-12-08 07:04:35', 'aktif'),
('ainurr001', '9e01ff1ce03e47fab6dfee4e7ae75d0c', 'guru', '2020-12-08 07:01:45', 'aktif'),
('ajengs003', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa', '2020-12-08 07:07:27', 'aktif'),
('azimans005', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa', '2020-12-08 07:07:55', 'aktif'),
('dewinp022', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-08 07:01:45', 'aktif'),
('pujii009', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-08 06:59:28', 'aktif'),
('sitii007', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', '2020-12-08 06:59:28', 'aktif');

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
('ad', 'Akuntansi Dasar'),
('admp', 'Administrasi Pajak'),
('ak', 'Akuntansi Keuangan'),
('an2d', 'Animasi 2D'),
('an3d', 'Animasi 3D'),
('apa', 'Aplikasi Pengolah Angka / Speadsheet'),
('apl', 'Aplikasi Perangkat Lunak dan Perancang Interior Gedung'),
('bind', 'Bahasa Indonesia'),
('bing', 'Bahasa Inggris'),
('bjw', 'Bahasa Jawa'),
('bk', 'Bimbingan dan Konseling(BK)'),
('dkbtpt', 'Dasar-dasar Konstruksi Bangunan dan Teknik Pengukuran Tanah'),
('dle', 'Dasar Listrik dan Elektronika'),
('dp', 'Digital Processing'),
('dsr', 'Dasar-dasar Seni Rupa'),
('ebk', 'Estimasi Biaya Konstruksi'),
('ep', 'Etika Profesi'),
('fsk', 'Fisika'),
('ga', 'Gambar Animasi'),
('gt', 'Gambar Teknik '),
('gto', 'Gambar Teknik Otomotif'),
('iml', 'Instalasi Motor Listrik'),
('ipa', 'Ilmu Pengetahuan Alam'),
('ipl', 'Instalasi Penerangan Listrik'),
('itl', 'Instalasi Tenaga Listrik'),
('ka', 'Komputer Akuntansi'),
('kbgt', 'Kerja Bengkel dan Gambar Teknik '),
('kjj', 'Konstruksi Jalan dan Jembatan'),
('kmi', 'Kimia'),
('kug', 'Konstruksi dan Utilitas Gedung'),
('mm', 'Mikroprosesor dan Mikrocontroler'),
('mt', 'Mekanika Teknik'),
('mtk', 'Matematika'),
('pabp', 'Pendidikan Agama dan Budi Pekerti'),
('palip', 'Praktikum Akuntansi Lembaga, Instansi Pemerintah'),
('papjdm', 'Praktikum Akuntansi Perusahaan Jasa, Dagang dan Manufaktur'),
('pd', 'Perbankan Dasar'),
('pde', 'Pekerjaan Dasar Elektromekanik'),
('pdto', 'Pekerjaan Dasar Teknik Otomtoif'),
('pisav', 'Perencanaan dan Instalasi Sistem Audio Video'),
('pjok', 'Pendidikan Jasmanai Olahraga dan Kesehatan'),
('pkk', 'Produk Kreatif dan Kewirausahaan'),
('pkkr', 'Pemeliharaan Kelistrikan  Kendaraan Ringan'),
('pkw', 'Produk Kreatif dan Kewirausahaan'),
('pmkr', 'Pemeliharaan Mesin Kendaraan Ringan'),
('ppkn', 'Pendidikan Pancasila dan Kewarganegaraan'),
('ppl', 'Perbaikan Peralatan Listrik'),
('pppav', 'Perawatan dan Perbaikan Peralatan Audio dan Video'),
('pre', 'Penerapan Rangkaian Elektronika'),
('psptkr', 'Pemeliharaan Mesin Kendaraan Ringan'),
('psrt', 'Penerapan Sistem Radio dan Televisi'),
('sb', 'Seni Budaya'),
('sjr', 'Sejarah Indonesia'),
('skd', 'Simulasi dan Komunikasi Digital'),
('skt', 'Sketsa'),
('tdo', 'Teknologi Dasar otomotif'),
('tpmm', 'Teknik Pemrograman, Mikroprosesor dan Mikrocontroler'),
('vdg', 'Videografi');

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
('012020GR009001', 'Materi Pertemuan 1', 'Pengenalan tentang matematika', 'link', 'https://www.youtube.com/', '2020-12-08 11:48:43', '1', 'mtk', 'xav1', 'GR009'),
('012020GR009002', 'Materi Pertemuan 1', 'Pengenalan tentang matematika', 'link', 'https://www.youtube.com/', '2020-12-08 11:48:43', '1', 'mtk', 'xintel1', 'GR009'),
('012020GR009003', 'Logika Matematika', 'Membahas mengenai logika matematika', 'file', 'logika matematika_27380819.pdf', '2020-12-08 11:51:23', '2 dan 3', 'mtk', 'xav1', 'GR009'),
('012020GR009004', 'Logika Matematika', 'Membahas mengenai logika matematika', 'file', 'logika matematika_27380819.pdf', '2020-12-08 11:51:23', '2 dan 3', 'mtk', 'xintel1', 'GR009'),
('012020GR009005', 'Ideologi Bangsa', 'Membahas ideologi bangsa indonesia', 'file', 'ideologi bangsa_94444777.pdf', '2020-12-08 11:54:00', '1', 'ppkn', 'xintel1', 'GR009');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_ujian`
--

CREATE TABLE IF NOT EXISTS `nilai_ujian` (
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
-- Struktur dari tabel `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id_post` int(200) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `judul_post` varchar(200) NOT NULL,
  `isi_post` text NOT NULL,
  `penulis_post` varchar(100) NOT NULL,
  `tanggal_post` varchar(100) NOT NULL,
  `gambar_post` text NOT NULL,
  `suka_post` int(10) NOT NULL,
  `laporkan` varchar(20) NOT NULL,
  `tgl_lapor` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id_post`, `id_detail`, `judul_post`, `isi_post`, `penulis_post`, `tanggal_post`, `gambar_post`, `suka_post`, `laporkan`, `tgl_lapor`) VALUES
(1, 5, 'a', 'a', 'ainurr001', '5:53 09/12/2020', '', 0, '0', '0000-00-00 00:00:00'),
(2, 12, 'abc', 'aaaa', 'ainurr001', '18:26 09/12/2020', '', 1, '', '0000-00-00 00:00:00'),
(3, 12, 'bbb', 'aaa', 'ainurr001', '19:40 09/12/2020', '', 0, '1', '2020-12-10 04:49:50'),
(4, 12, 'hij', 'klm', 'ainurr001', '19:48 09/12/2020', '', 0, '0', '0000-00-00 00:00:00'),
(5, 12, 'k', 'l', 'ainurr001', '19:50 09/12/2020', '', 0, '0', '0000-00-00 00:00:00'),
(6, 12, 'yy', 'yul', 'ainurr001', '20:00 09/12/2020', '', 2, '0', '0000-00-00 00:00:00'),
(7, 12, 'l', 'pop', 'ainurr001', '20:04 09/12/2020', '', 0, '0', '0000-00-00 00:00:00'),
(8, 12, 'jj', 'jk', 'ainurr001', '20:11 09/12/2020', '20201209_201155biola.jpg', 0, '0', '0000-00-00 00:00:00'),
(9, 12, 'test', 'test', 'aguspk001', '4:48 10/12/2020', '', 0, '1', '2020-12-10 04:49:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombel`
--

CREATE TABLE IF NOT EXISTS `rombel` (
`id` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `kd_tajar` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rombel`
--

INSERT INTO `rombel` (`id`, `nis`, `kd_kelas`, `kd_tajar`) VALUES
(1, '7768', 'xintel1', '2020-2021-ganjil'),
(2, '7770', 'xintel1', '2020-2021-ganjil'),
(3, '7801', 'xav1', '2020-2021-ganjil'),
(4, '7805', 'xintel1', '2020-2021-ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `silabus`
--

CREATE TABLE IF NOT EXISTS `silabus` (
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
('7768', '-', 'AGUS PUTRA KURNIAWAN', 'aguspk001', 'L', '-', 'default.jpg', '-', 'Aktif'),
('7770', '-', 'AJENG SITIANINGRUM', 'ajengs003', 'P', '-', 'default.jpg', '-', 'Aktif'),
('7801', '-', 'ABDULLAH PARVEST LATIEF', 'abdullahpl001', 'L', '-', 'default.jpg', '-', 'Aktif'),
('7805', '-', 'AZIMA NUR SYALIMA', 'azimans005', 'P', '-', 'default.jpg', '-', 'Aktif');

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
('142020GR009001', 'Ujian Logika Matematika', 'T', 'mtk', 'GR009');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suka_post`
--

INSERT INTO `suka_post` (`id_suka`, `user_suka`, `id_post`, `post_suka`, `penulis_post`, `tanggal_suka`, `lihat_suka`) VALUES
(1, 'ainurr001', 2, 1, 'ainurr001', '18:34 09/12/2020', 1),
(2, 'ainurr001', 2, 1, 'ainurr001', '19:44 09/12/2020', 1),
(3, 'ainurr001', 6, 1, 'ainurr001', '20:03 09/12/2020', 1),
(4, 'aguspk001', 6, 1, 'ainurr001', '4:39 10/12/2020', 1);

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
('2020-2021-ganjil', '2020-2021', 1, 'Y');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE IF NOT EXISTS `ujian` (
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

CREATE TABLE IF NOT EXISTS `wali_kelas` (
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
-- Indexes for table `detail_kurikulum`
--
ALTER TABLE `detail_kurikulum`
 ADD PRIMARY KEY (`id_detail`), ADD KEY `kd_guru` (`kd_guru`), ADD KEY `kd_kelas` (`kd_kelas`), ADD KEY `kd_kurikulum` (`kd_kurikulum`), ADD KEY `kd_mapel` (`kd_mapel`);

--
-- Indexes for table `detail_soal`
--
ALTER TABLE `detail_soal`
 ADD PRIMARY KEY (`kd_detail_soal`), ADD KEY `kd_soal` (`kd_soal`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`kd_guru`), ADD KEY `username` (`username`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
 ADD PRIMARY KEY (`kd_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`kd_kelas`), ADD KEY `kd_jurusan` (`kd_jurusan`);

--
-- Indexes for table `kerja_tugas`
--
ALTER TABLE `kerja_tugas`
 ADD PRIMARY KEY (`kd_kerja`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `kurikulum`
--
ALTER TABLE `kurikulum`
 ADD PRIMARY KEY (`kd_kurikulum`);

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
 ADD PRIMARY KEY (`kd_nilai_ujian`), ADD KEY `nis` (`nis`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id_post`), ADD KEY `id_detail` (`id_detail`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
 ADD PRIMARY KEY (`id`), ADD KEY `ang-siswa` (`nis`), ADD KEY `ang-kelas` (`kd_kelas`), ADD KEY `ang-tajar` (`kd_tajar`);

--
-- Indexes for table `silabus`
--
ALTER TABLE `silabus`
 ADD PRIMARY KEY (`kd_silabus`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`nis`), ADD KEY `username` (`username`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
 ADD PRIMARY KEY (`kd_soal`);

--
-- Indexes for table `suka_post`
--
ALTER TABLE `suka_post`
 ADD PRIMARY KEY (`id_suka`), ADD UNIQUE KEY `id_suka` (`id_suka`);

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
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
 ADD PRIMARY KEY (`kd_tugas`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
 ADD PRIMARY KEY (`kd_ujian`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
 ADD KEY `kd_guru` (`kd_guru`), ADD KEY `kd_kelas` (`kd_kelas`), ADD KEY `kd_tajar` (`kd_tajar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kurikulum`
--
ALTER TABLE `detail_kurikulum`
MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `detail_soal`
--
ALTER TABLE `detail_soal`
MODIFY `kd_detail_soal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id_komentar` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kurikulum`
--
ALTER TABLE `kurikulum`
MODIFY `kd_kurikulum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id_post` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suka_post`
--
ALTER TABLE `suka_post`
MODIFY `id_suka` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
MODIFY `id_timeline` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
