-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Okt 2020 pada 04.27
-- Versi Server: 5.6.21-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpusut_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `broadcast`
--

CREATE TABLE IF NOT EXISTS `broadcast` (
`id_broadcast` int(10) NOT NULL,
  `id_buku` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `broadcast`
--

INSERT INTO `broadcast` (`id_broadcast`, `id_buku`) VALUES
(9, 2),
(10, 3),
(11, 4),
(12, 5),
(13, 6),
(14, 7),
(15, 8),
(16, 9),
(17, 10),
(18, 11),
(19, 12),
(20, 13),
(21, 14),
(22, 15),
(23, 16),
(24, 17),
(25, 18),
(26, 19),
(27, 20),
(28, 21),
(29, 22),
(30, 23),
(31, 24),
(32, 25),
(33, 26),
(34, 27),
(35, 28),
(36, 29),
(37, 30),
(38, 31),
(39, 32),
(40, 33),
(41, 34),
(42, 35),
(43, 36),
(44, 37),
(45, 38),
(46, 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
`id_buku` int(10) NOT NULL,
  `gambar` varchar(200) NOT NULL COMMENT 'link gambar',
  `kode_buku` varchar(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `ket` text NOT NULL,
  `tahun_terbit` varchar(10) DEFAULT NULL,
  `nama_penerbit` varchar(50) DEFAULT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `gambar`, `kode_buku`, `judul`, `penulis`, `id_kategori`, `ket`, `tahun_terbit`, `nama_penerbit`, `stok`) VALUES
(2, '758-14.jpg', '001.5 Mut E c.', 'Ejaan Bahasa Indonesia', 'Darul Mutakin', 1, 'Keterangan', '2018', 'Media Intuisi', 11),
(3, '642-Computer Vision.jpg', '003.5 Put C c.', 'Computer Vision dan Aplikasinya Menggunakan C# & E', 'Budiman Putra AR', 3, 'Buku Computer Vision ini memberikan panduan, penjelasan, dan pemahaman tentang cara membuat aplikasi computer vision dengan menggunakan library EmguCV yang merupakan C sharp (C#) wrapper dari library populer OpenCV.', '2017', 'Andi Publisher', 8),
(4, '277-Membuat Web E-Commerce.jpg', '003.1 Kom M c.', 'Membuat Web E-Commerce dengan Adobe Dreamweaver CS', 'Wahana Komputer', 3, 'Adobe Dreamweaver CS5.5 Adalah salah satu perangkat lunak yang banyak dipergunakan oleh para web master dunia guna membuat, mengedit sebuah website, mempunyai  sistem manajemen konten yang telah diuji secara akurat .', '2012', 'Andi Publisher', 3),
(5, '555-JQuery & Ajax untuk Web Designer.jpg', '003.9 Sia J c.', 'JQuery & Ajax untuk Web Designer', 'R.H Sianipar', 3, 'jax singkatan dari “Asynchronous JavaScript and XML“, merupakan metode suatu laman web menggunakan JavaScript untuk mengirim dan menerima data dari server tanpa harus menyegarkan (refresh) laman itu. Jquery adalah sebuah library yang dibangun dengan menggunakan JavaScript untuk mengautomasi dan menyederhanakan perintah-perintah umum. ', '2016', 'Andi Publisher', 6),
(6, '614-Responsive Web Design With Bootstrap.jpg', '003.7 Kom R c.', 'Responsive Web Design With Bootstrap', 'Wahana Komputer', 3, 'Bootstrap adalah framework yang digunakan untuk mempermudah dan mempercepat pembuatan halaman website.', '2016', 'Andi Publisher', 4),
(7, '155-Mobile Web Adobe Dreamweaver CS6.jpg', '003.4 Kom M c.', 'Mobile Web Development with Adobe Dreamweaver CS6', 'Wahana Komputer', 3, 'Buku ini membahas : Pengenalan Dreamweaver CS6, Membuat Mobile Website, Kustomisasi Mobile Web dengan Dreamweaver CS6, Merancang Tema dengan ThemeRoller, Menggunakan JQuery Mobile, Gradient dengan CSS3, Transisi dengan CSS3', '2016', 'Andi Publisher', 5),
(8, '533-Pemrograman Database Menggunakan MySQL.jpg', '003.4 Sia P c.', 'Pemrograman Database Menggunakan MySQL', 'R.H Sianipar', 3, 'Buku ini membahas :  Pengantar MySQL Bab , Dasar Teknik Pemilihan Rekaman, Bekerja Dengan String, Bekerja Dengan Tanggal dan Waktu, Pengurutan Hasil Query, Menghasilkan Kesimpulan, Menghasilkan dan Menggunakan Runtun, Menggunakan Multi Tabel', '2016', 'Andi Publisher', 7),
(9, '147-Kumpulan Utility.jpg', '003.9 Mad K c.', 'Kumpulan Utility Dahsyat untuk OS Windows dan Jari', 'Madcoms', 3, 'Buku ini akan fokus membahas tema diantaranya adalah : Pengenalan aplikasi utility, Kumpulan utility untuk sistem operasi Windows, Kumpulan utility pendukung driver Windows, Kumpulan utility pendukung Microsoft office, Kumpulan Add-ins serta utility internet, Kumpulan utility multimedia, Kumpulan utility untuk troubleshoot komputer, Kumpulan utility pemulihan data (recovery), Kumpulan utility jaringan komputer.', '2013', 'Andi Publisher', 13),
(10, '543-Belajar Cepat Pemrograman Query dengan MySQL.jpg', '003.9 Sia B c.', 'Belajar Cepat Pemrograman Query dengan MySQL', 'R.H Sianipar', 3, 'Tidak semua fitur MySQL sungguh-sungguh digunakan, yang berarti bahwa produk yang dihasilkan tidak dibangun dengan cara terbaik. Hasilnya adalah bahwa masih banyak statement- statement kompleks yang seharusnya tidak diperlukan lagi. Karena itulah mengapa buku ini juga memuat deskripsi lengkap dari dialek SQL yang diimplementasikan dalam MySQL versi 5.6.17. setelah membaca buku ini, anda diharapkan menjadi familiar dengan semua statement dan fitur sehingga anda bisa menggunakannya secara efektif dan efesien.', '2017', 'Andi Publisher', 6),
(11, '544-Konsep Grafika komputer.jpg', '003.2 Pul K c.', 'Konsep Grafika Komputer', 'Dr. Pulung Nurtantio Andono, S.T., M.Kom. Dan T.Sutojo, S.Si., M.kom', 3, 'Buku ini disusun dengan urut-urutan berikut: Pendahuluan yang memberikan pengetahuan tentang beberapa aplikasi Grafika Komputer. Output primitive menjelaskan bahwa elemen dasar pembentuk gambar adalah titik, garis dan polygon. Atribut Output Primitif berisi tentang pemberian warna dan ukuran besar kecilnya output primitive yang terbentuk. Transformasi geometri 2D dan 3D menjelaskan bahwa dengan rekayasa tertentu dimensi setiap objek bisa diubah-ubah baik bentuk ataupun posisinya.', '2016', 'Andi Publisher', 5),
(12, '442-METODE NUMERIK.jpg', '003.7 Uni M c.', 'Metode Numerik', 'Rinaldi Unir', 3, 'Metode numerik adalah teknik yang digunakan untuk memformulasikan persoalan matematika sehingga dapat dipecahkan dengan operasi perhitungan/aritmetika biasa (tambah, kurang, kali, dan bagi).', '2016', 'Informatika Bandung', 11),
(13, '63-Manajemen Proyek Sistem Informasi.jpg', '003.5 Tan M c.', 'Manajemen Proyek Sistem Informasi', 'Rudy Tantra', 3, 'Manajemen proyek sistem informasi adalah langkah-langkah yang diperlukan dalam sebuah pembuatan proyek sistem informasi untuk mencapai suatu tujuan.', '2012', 'Andi Publisher', 15),
(14, '856-PHP Dan MYSQL Langkah Demi Langkah.jpg', '003.1 Sia P c.', 'PHP Dan MYSQL Langkah Demi Langkah', 'R.H. Sianipar', 3, 'Pengguna Web sekarang ini berharap bahwa halaman web selalu kontinyu diperbarui dan memberikan pengalaman tersendiri ketika membacanya. Bagi mereka, situs Web lebih seperti komunitas, yang menjadi tempat bertemu dan berjumpa kembali. Pada saat yang sama, administrator Web menginginkan situs yang lebih mudah diperbarui dan dikelola, memahami bahwa ini merupakan satu-satunya cara untuk memenuhi ekspektasi pengunjung situs. Karena alasan inilah PHP/MySQL menjadi standar de facto untuk menciptakan situs Web berbasis database yang dinamis. ', '2015', 'Andi Publisher', 7),
(15, '737-Manajemen Sistem dengan Mikrotik RouterOS.jpg', '003.4 Mad M c.', 'Manajemen Sistem Jaringan Komputer dengan Mikrotik', 'Madcoms', 3, 'Buku ini membahas antara lain : Pengenalan MikroTik RouterOS, Pengenalan seluk beluk Jaringan Komputer, Instalasi MikroTik RouterOS, Konfigurasi awal MikroTik RouterOS ke Internet.', '2017', 'Andi Publisher', 2),
(16, '598-Cathedral and the Bazaar.jpg', '003.4 Ray C c.', 'Cathedral and the Bazaar: Musings on Linux and Ope', 'Eric Raymond', 3, 'Model revolusioner untuk pengembangan perangkat lunak kolaboratif ini dianut dan dipelajari oleh banyak pemain terbesar di industri teknologi tinggi, dari Sun Microsystems hingga IBM hingga Intel. Cathedral & the Bazaar adalah suatu keharusan bagi siapa pun yang peduli tentang masa depan industri komputer atau dinamika ekonomi informasi.', '2001', 'OReilly', 2),
(17, '292-Pengenalan Hardware Komputer.jpg', '003.8 Kom P c.', 'Pengenalan, Permasalahan, dan Penanganan Hardware ', 'Wahana Komputer', 3, 'Hardware adalah segala piranti atau komponen dari sebuah komputer yang sifatnya bisa dilihat secara kasat mata dan bisa diraba secara langsung. Dengann kata lain hardware merupakan komponen yang memiliki bentuk nyata.', '2014', 'Andi Publisher', 7),
(18, '928-Manajemen Risiko.jpg', '002.3 Bam M c.', 'Manajemen Risiko: Prinsip, Penerapan, dan Peneliti', 'Dr. Bambang Rianto Rustam, S.E., Ak., M.M.', 2, 'Manajemen risiko adalah suatu pendekatan terstruktur/metodologi dalam mengelola ketidakpastian yang berkaitan dengan ancaman; suatu rangkaian aktivitas manusia termasuk: Penilaian risiko, pengembangan strategi untuk mengelolanya dan mitigasi risiko dengan menggunakan pemberdayaan/pengelolaan sumberdaya.', '2017', 'Salemba Empat', 9),
(19, '559-Analisis dan Desain SISTEM INFORMASI.jpg', '003.5 bin A c.', 'Analisis dan Desain Sistem Informasi', 'Al-Bahra bin Ladjamudin', 3, 'Analisa dan Perancangan Sistem Informasi merupakan bagian ilmu komputer yang selalu membahas konsep ilmu komputer secara teoritis, dan teori tersebut harus bisa diimplementasikan pada pemanfaatan software dan hardware teknologi informasi berupa program-program aplikasi dan teknologi jaringan komunikasi.', '2005', 'Graha Ilmu', 12),
(20, '83-Ekonomi Manajerial.jpg', '002.6 R.B E c.', 'Ekonomi Manajerial dan Strategi Bisnis ', 'Michael R.Baye', 2, 'Buku ini memberikan materi-materi ekonomi manajerial yang meliputi alat-alat analisis serta berbagai strategi bisnis untuk bersaing.', '2016', 'Salemba Empat', 8),
(21, '41-Buku Pintar Pemograman WEB.jpg', '003.8 Pra B c.', 'Buku Pintar Pemrograman WEB', 'Adhi Prasetio', 3, 'Buku untuk mempelajari pembuatan web dinamis. Mulai dari beljar HTML, PHP & MySQL, desain , komposisi warna, CSS, JavaScript dan jQuery. Bukan hanya teori, buku ini juga disertai penjelasan bagaimana membuat web dinamis seperti blog dan shopping cart. ', '2011', 'Mediakita', 9),
(22, '142-Membangun Sistem Basis Data Oracle XE.jpg', '003.7 Sus M c.', 'Membangun Sistem Basis Data dengan Oracle XE', 'Budi Susanto', 3, 'Buku ini secara garis besar membahas tentang sebagian besar fungsi yang dapat dilakukan dengan bahasa SQL (Structure Query Language) di OracleXE 10g. Bahasa SQL merupakan sebuah bahasa baku untuk berinteraksi dengan sistem manajemen basis data (DBMS). Pemilihan Oracle10gXE sebagai pokok bahasan adalah karena OracleXe10g masih mencukupi untuk kebutuhan pembelajaran tentang database oracle, serta lebih ringan untuk digunakan.', '2012', 'Andi Publisher', 2),
(23, '447-Kupas Tuntas Microsoft Windows 10.jpg', '003.3 Mad K c.', 'Kupas Tuntas Microsoft Windows 10', 'Madcoms', 3, 'Buku ini membahas : Mengenal Microsoft Windows 10, Mengelola Start Menu, Mengelola tampilan desktop dari Windows, Mengatur tampilan Taskbar, Mengatur tatanan file dan folder, Mengelola user, Mengelola sistem, Cara installasi Windows 10 pada sebuah komputer.', '2017', 'Andi Publisher', 5),
(24, '781-Petunjuk Praktis Metode Penelitian Teknologi Informasi.jpg', '003.6 Wah P c.', 'Petunjuk Praktis Metode Penelitian Teknologi Infor', 'Andi Wahju Rahardjo Emanuel', 3, 'Salah satu bidang penelitian yang masih sangat terbuka peluangnya bagi peneliti-peneliti di Indonesia adalah penelitian terapan, khususnya bidang Teknologi Informasi. Melalui penelitian di bidang ini diharapkan dapat menyentuh aspek-aspek kehidupan manusia yang bersinggungan dengan pemanfaatan jaringan internet, perangkat komputer, perangkat alat komunikasi genggam dan lain sebagainya.', '2017', 'Andi Publisher', 3),
(25, '748-manajemen-pemasaran.jpg', '002.3 Kot M c.', 'Manajemen Pemasaran', 'Philip Kotler', 2, 'Buku ini membahas : Memahami Manajemen Pemasaran, Menangkap Pemahaman Pemasaran, Berhubungan dengan Pelanggan, Membangun Merek yang Kuat.', '2009', 'Erlangga', 9),
(26, '107-Sistem Informasi Manajeme.jpg', '002.5 Sut S c.', 'Sistem Informasi Manajemen', 'Tata Sutabri, S.Kom., MM', 2, 'Penerapan Sistem Informasi Manajemen yang berbasis kompetensi menjadi kebutuhan yang mutlak dan dapat memberikan keunggulan kompetitif sehingga mendapat prioritas yang tinggi.\r\nSistem informasi Manajemen adalah sebuah sistem informasi yang melakukan semua pengolahan transaksi dan memeberikan dukungan informasi untuk fungsi manajemen serta proes pengambilan keputusan.', '2001', 'Andi Publisher', 7),
(27, '401-The Definitive Guide to MySQL 5.jpg', '003.3 Kof T c.', 'The Definitive Guide to MySQL 5', 'Michael Kofler', 3, 'Buku pertama yang menawarkan instruksi mendalam tentang fitur-fitur baru dari server database open source paling populer di dunia. Diperbarui untuk mencerminkan perubahan dalam versi MySQL 5, buku ini akan memaparkan Anda pada berbagai fitur baru MySQL: tampilan, prosedur tersimpan, pemicu, dan tipe data spasial', '2004', 'Apress', 7),
(28, '501-Analisa Kebutuhan Dalam Rekayasa Perangkat Lunak (2).jpg', '003.3 Sia A c.', 'Analisa Kebutuhan Dalam Rekayasa Perangkat Lunak', 'Daniel Siahaan', 3, 'Analisis kebutuhan merupakan langkah awal untuk menentukan gambaran perangkat yang akan dihasilkan ketika pengembang melaksanakan sebuah proyek pembuatan perangkat lunak. Perangkat lunak yang baik dan sesuai dengan kebutuhan pengguna sangat tergantung pada keberhasilan dalam melakukan analisis kebutuhan.', '2012', 'Andi Publisher', 11),
(29, '585-Basis Data dalam Tinjauan Konseptual.jpg', '003.8 Sut B c.', 'Basis Data dalam Tinjauan Konseptual', 'Edhy Sutanta, S.E', 3, 'Basis data sebagai sebuah bagian penting dalam sebuah sistem informasi, memiliki berbagai peran penting mulai dari penyusunan sistem informasi hingga menjadi sebuah sumber informasi. Dalam buku ini, akan dibahas secara lengkap seluk beluk basis data dalam sebuah tinjauan konseptual yang menarik.', '2011', 'Andi Publisher', 10),
(30, '180-Java for Mobile Programming.jpg', '003.4 Kom J c.', 'Java for Mobile Programming', 'Wahana Komputer', 3, 'Salah satu bahasa yang dapat digunakan untuk mengembangkan aplikasi mobile adalah bahasa Java dengan paket Java Micro Edition (Java ME). Kelebihan dari bahasa Java adalah lintas platform, yaitu dapat dijalankan pada semua perangkat mobile yang mendukung Java. Selain itu juga didukung oleh teknologi yang canggih dan mudah didapatkan secara free.', '2012', 'Andi Publisher', 10),
(31, '219-Membangun Aplikasi Database Client-Server new.jpg', '003.6 Mif M c.', 'Membangun Aplikasi Database Client-Server', 'Muhammad Miftakhul Amin', 3, 'Database Client Server adalah teknologi terkini dari perkembangan aplikasi berbasis data yang sering juga disebut database SQL', '2007', 'Graha Ilmu', 6),
(32, '5-Pengantar Sistem Informasi.jpg', '003.5 Jam P c.', 'Pengantar Sistem Informasi', 'James', 3, 'Sistem informasi adalah suatu sistem di dalam suatu organisasi yang mempertemukan kebutuhan pengolahan data transaksi harian, mendukung operasi, bersifat manajerial, dan kegiatan strategi dari suatu organisasi', '2017', 'Salemba Empat', 12),
(33, '634-English for academic Purposes.jpg', '001.9 Sar E c.', 'English for academic Purposes', 'Jonathan Sarwono Dan Yudhy Purwanto', 1, '\r\nBuku ini terdiri dari tiga bagian: membaca, menulis dan kosakata.', '2014', 'Andi Publisher', 5),
(34, '144-ALGORITMA DAN PEMROGRAMAN.jpeg', '003.8 Mun A c.', 'Algoritma Dan Pemograman Dalam Bahasa Pascal, C Da', 'Rinaldi Munir Leony Lidya', 3, 'Materi yang dibahas di dalam Buku ini meliputi: Konsep dasar algoritma dan pemrograman, Tipe data, operator, dan Ekspresi, Konstruksi dasar pembangun algoritma: runtunan, pemilihan, pengulangan, Pemrograman modular: fungsi dan prosedur, Larik (array) dan matriks, Algoritma pencarian (searching) dan algoritma pengurutan (sorting), Arsip beruntun (sequential file), Algoritma rekursif, Pengantar pemrograman dengan bahasa Java', '2016', 'Informatika Bandung', 15),
(35, '435-Linux In a Nutshell.gif', '003.9 Fig L c.', 'Linux In a Nutshell', 'Stephen Figgins, Ellen Siever, Robert Love, dan Arnold Robbins', 3, 'Linux adalah nama yang diberikan kepada sistem operasi komputer bertipe Unix.', '2009', 'OReilly', 10),
(36, '983-PHP 5 for dummies.jpg', '003.2 Val P c.', 'PHP 5 for dummies', 'Janet Valade', 3, 'Menjelaskan cara memperoleh dan menginstal PHP, bagaimana fitur-fitur PHP menjadikannya bahasa scripting yang berguna, dan bagaimana menggunakan PHP untuk tiga aplikasi yang paling umum: situs web interaktif, penyimpanan basis data, dan tugas sistem operasi umum', '2016', 'Wiley Publishing', 13),
(37, '447-bahasa indonesia perguruan tinggi.jpg', '001.7 Nur B c.', 'Bahasa Indonesia Untuk Perguruan Tinggi', 'Sukirman Nurdjan, S.S., M.Pd. , Firman, S.Pd., M.Pd, Mirnawati, S.Pd., M.Pd.', 1, 'Bahasa Indonesia masuk ke dalam kelompok mata kuliah pengembangan kepribadian mahasiswa, yang kelak sebagai insan terpelajar akan terjun ke dalam kancah kehidupan berbangsa dan bernegara sebagai pemimpin dalam lingkungannya masing-masing.', '2016', 'Aksara Timur', 3),
(38, '962-Aljabar Linear Jilid 1.jpg', '003.4 Ant A c.', 'Aljabar Linear', 'Howard Anton', 3, 'Aljabar linear adalah bidang studi matematika yang mempelajari sistem persamaan linear dan solusinya, vektor, serta transformasi linear. Matriks dan operasinya juga merupakan hal yang berkaitan erat dengan bidang aljabar linear.', '2004', 'Erlangga', 13),
(39, '910-Dasar Pemograman Delphi.jpg', '003.4 Kad D c.', 'Dasar Pemograman Delphi', 'Abdul Kadir, Ir', 3, 'Delphi adalah sebuah Lingkungan pengembangan terpadu (IDE) untuk mengembangkan aplikasi konsol, desktop, web, ataupun perangkat mobile. ', '2009', 'Andi Publisher', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `config`
--

CREATE TABLE IF NOT EXISTS `config` (
`id_config` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `config`
--

INSERT INTO `config` (`id_config`, `nama`, `nilai`) VALUES
(1, 'Denda Perhari (Rp)', 1000),
(2, 'Maksimal Peminjaman (Hari)', 5),
(3, 'Maksimal Buku Dipinjam ', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
`id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(3, 'FTIE'),
(4, 'FTIB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(10) NOT NULL,
  `kode_kat` char(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kode_kat`, `nama_kategori`) VALUES
(1, '001', 'Bahasa'),
(2, '002', 'Ekonomi'),
(3, '003', 'Komputer'),
(4, '004', 'Novel'),
(5, '005', 'Psikologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_buku`
--

CREATE TABLE IF NOT EXISTS `kode_buku` (
`id_kode` int(10) NOT NULL,
  `kode_buku` int(10) NOT NULL,
  `id_buku` int(10) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=318 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kode_buku`
--

INSERT INTO `kode_buku` (`id_kode`, `kode_buku`, `id_buku`, `status`) VALUES
(1, 1, 1, '1'),
(2, 2, 1, '1'),
(3, 3, 1, '1'),
(4, 4, 1, '1'),
(5, 5, 1, '1'),
(6, 6, 1, '1'),
(7, 7, 1, '1'),
(8, 8, 1, '1'),
(9, 9, 1, '1'),
(10, 10, 1, '1'),
(11, 1, 2, '1'),
(12, 2, 2, '1'),
(13, 3, 2, '1'),
(14, 4, 2, '1'),
(15, 5, 2, '1'),
(16, 6, 2, '1'),
(17, 7, 2, '1'),
(18, 8, 2, '1'),
(19, 9, 2, '1'),
(20, 10, 2, '1'),
(21, 11, 2, '1'),
(22, 12, 2, '1'),
(23, 1, 3, '1'),
(24, 2, 3, '1'),
(25, 3, 3, '1'),
(26, 4, 3, '1'),
(27, 5, 3, '1'),
(28, 6, 3, '1'),
(29, 7, 3, '1'),
(30, 8, 3, '1'),
(31, 1, 4, '1'),
(32, 2, 4, '1'),
(33, 3, 4, '1'),
(34, 1, 5, '1'),
(35, 2, 5, '1'),
(36, 3, 5, '1'),
(37, 4, 5, '1'),
(38, 5, 5, '1'),
(39, 6, 5, '1'),
(40, 1, 6, '1'),
(41, 2, 6, '1'),
(42, 3, 6, '1'),
(43, 4, 6, '1'),
(44, 1, 7, '1'),
(45, 2, 7, '1'),
(46, 3, 7, '1'),
(47, 4, 7, '1'),
(48, 5, 7, '1'),
(49, 1, 8, '1'),
(50, 2, 8, '1'),
(51, 3, 8, '1'),
(52, 4, 8, '1'),
(53, 5, 8, '1'),
(54, 6, 8, '1'),
(55, 7, 8, '1'),
(56, 1, 9, '1'),
(57, 2, 9, '1'),
(58, 3, 9, '1'),
(59, 4, 9, '1'),
(60, 5, 9, '1'),
(61, 6, 9, '1'),
(62, 7, 9, '1'),
(63, 8, 9, '1'),
(64, 9, 9, '1'),
(65, 10, 9, '1'),
(66, 11, 9, '1'),
(67, 12, 9, '1'),
(68, 13, 9, '1'),
(69, 1, 10, '1'),
(70, 2, 10, '1'),
(71, 3, 10, '1'),
(72, 4, 10, '1'),
(73, 5, 10, '1'),
(74, 6, 10, '1'),
(75, 1, 11, '1'),
(76, 2, 11, '1'),
(77, 3, 11, '1'),
(78, 4, 11, '1'),
(79, 5, 11, '1'),
(80, 1, 12, '1'),
(81, 2, 12, '1'),
(82, 3, 12, '1'),
(83, 4, 12, '1'),
(84, 5, 12, '1'),
(85, 6, 12, '1'),
(86, 7, 12, '1'),
(87, 8, 12, '1'),
(88, 9, 12, '1'),
(89, 10, 12, '1'),
(90, 11, 12, '1'),
(91, 1, 13, '1'),
(92, 2, 13, '1'),
(93, 3, 13, '1'),
(94, 4, 13, '1'),
(95, 5, 13, '1'),
(96, 6, 13, '1'),
(97, 7, 13, '1'),
(98, 8, 13, '1'),
(99, 9, 13, '1'),
(100, 10, 13, '1'),
(101, 11, 13, '1'),
(102, 12, 13, '1'),
(103, 13, 13, '1'),
(104, 14, 13, '1'),
(105, 15, 13, '1'),
(106, 1, 14, '1'),
(107, 2, 14, '1'),
(108, 3, 14, '1'),
(109, 4, 14, '1'),
(110, 5, 14, '1'),
(111, 6, 14, '1'),
(112, 7, 14, '1'),
(113, 1, 15, '1'),
(114, 2, 15, '1'),
(115, 1, 16, '1'),
(116, 2, 16, '1'),
(117, 1, 17, '1'),
(118, 2, 17, '1'),
(119, 3, 17, '1'),
(120, 4, 17, '1'),
(121, 5, 17, '1'),
(122, 6, 17, '1'),
(123, 7, 17, '1'),
(124, 1, 18, '1'),
(125, 2, 18, '1'),
(126, 3, 18, '1'),
(127, 4, 18, '1'),
(128, 5, 18, '1'),
(129, 6, 18, '1'),
(130, 7, 18, '1'),
(131, 8, 18, '1'),
(132, 9, 18, '1'),
(133, 1, 19, '1'),
(134, 2, 19, '1'),
(135, 3, 19, '1'),
(136, 4, 19, '1'),
(137, 5, 19, '1'),
(138, 6, 19, '1'),
(139, 7, 19, '1'),
(140, 8, 19, '1'),
(141, 9, 19, '1'),
(142, 10, 19, '1'),
(143, 11, 19, '1'),
(144, 12, 19, '1'),
(145, 1, 20, '1'),
(146, 2, 20, '1'),
(147, 3, 20, '1'),
(148, 4, 20, '1'),
(149, 5, 20, '1'),
(150, 6, 20, '1'),
(151, 7, 20, '1'),
(152, 8, 20, '1'),
(153, 1, 21, '1'),
(154, 2, 21, '1'),
(155, 3, 21, '1'),
(156, 4, 21, '1'),
(157, 5, 21, '1'),
(158, 6, 21, '1'),
(159, 7, 21, '1'),
(160, 8, 21, '1'),
(161, 9, 21, '1'),
(162, 1, 22, '1'),
(163, 2, 22, '1'),
(164, 1, 23, '1'),
(165, 2, 23, '1'),
(166, 3, 23, '1'),
(167, 4, 23, '1'),
(168, 5, 23, '1'),
(169, 1, 24, '1'),
(170, 2, 24, '1'),
(171, 3, 24, '1'),
(172, 1, 25, '1'),
(173, 2, 25, '1'),
(174, 3, 25, '1'),
(175, 4, 25, '1'),
(176, 5, 25, '1'),
(177, 6, 25, '1'),
(178, 7, 25, '1'),
(179, 8, 25, '1'),
(180, 9, 25, '1'),
(181, 1, 26, '1'),
(182, 2, 26, '1'),
(183, 3, 26, '1'),
(184, 4, 26, '1'),
(185, 5, 26, '1'),
(186, 6, 26, '1'),
(187, 7, 26, '1'),
(188, 1, 27, '1'),
(189, 2, 27, '1'),
(190, 3, 27, '1'),
(191, 4, 27, '1'),
(192, 5, 27, '1'),
(193, 6, 27, '1'),
(194, 7, 27, '1'),
(195, 1, 28, '1'),
(196, 2, 28, '1'),
(197, 3, 28, '1'),
(198, 4, 28, '1'),
(199, 5, 28, '1'),
(200, 6, 28, '1'),
(201, 7, 28, '1'),
(202, 8, 28, '1'),
(203, 9, 28, '1'),
(204, 10, 28, '1'),
(205, 11, 28, '1'),
(206, 1, 29, '1'),
(207, 2, 29, '1'),
(208, 3, 29, '1'),
(209, 4, 29, '1'),
(210, 5, 29, '1'),
(211, 6, 29, '1'),
(212, 7, 29, '1'),
(213, 8, 29, '1'),
(214, 9, 29, '1'),
(215, 10, 29, '1'),
(216, 1, 30, '1'),
(217, 2, 30, '1'),
(218, 3, 30, '1'),
(219, 4, 30, '1'),
(220, 5, 30, '1'),
(221, 6, 30, '1'),
(222, 7, 30, '1'),
(223, 8, 30, '1'),
(224, 9, 30, '1'),
(225, 10, 30, '1'),
(226, 1, 31, '1'),
(227, 2, 31, '1'),
(228, 3, 31, '1'),
(229, 4, 31, '1'),
(230, 5, 31, '1'),
(231, 6, 31, '1'),
(232, 1, 32, '1'),
(233, 2, 32, '1'),
(234, 3, 32, '1'),
(235, 4, 32, '1'),
(236, 5, 32, '1'),
(237, 6, 32, '1'),
(238, 7, 32, '1'),
(239, 8, 32, '1'),
(240, 9, 32, '1'),
(241, 10, 32, '1'),
(242, 11, 32, '1'),
(243, 12, 32, '1'),
(244, 1, 33, '1'),
(245, 2, 33, '1'),
(246, 3, 33, '1'),
(247, 4, 33, '1'),
(248, 5, 33, '1'),
(249, 1, 34, '1'),
(250, 2, 34, '1'),
(251, 3, 34, '1'),
(252, 4, 34, '1'),
(253, 5, 34, '1'),
(254, 6, 34, '1'),
(255, 7, 34, '1'),
(256, 8, 34, '1'),
(257, 9, 34, '1'),
(258, 10, 34, '1'),
(259, 11, 34, '1'),
(260, 12, 34, '1'),
(261, 13, 34, '1'),
(262, 14, 34, '1'),
(263, 15, 34, '1'),
(264, 1, 35, '1'),
(265, 2, 35, '1'),
(266, 3, 35, '1'),
(267, 4, 35, '1'),
(268, 5, 35, '1'),
(269, 6, 35, '1'),
(270, 7, 35, '1'),
(271, 8, 35, '1'),
(272, 9, 35, '1'),
(273, 10, 35, '1'),
(274, 1, 36, '1'),
(275, 2, 36, '1'),
(276, 3, 36, '1'),
(277, 4, 36, '1'),
(278, 5, 36, '1'),
(279, 6, 36, '1'),
(280, 7, 36, '1'),
(281, 8, 36, '1'),
(282, 9, 36, '1'),
(283, 10, 36, '1'),
(284, 11, 36, '1'),
(285, 12, 36, '1'),
(286, 13, 36, '1'),
(287, 1, 37, '1'),
(288, 2, 37, '1'),
(289, 3, 37, '1'),
(290, 1, 38, '1'),
(291, 2, 38, '1'),
(292, 3, 38, '0'),
(293, 4, 38, '1'),
(294, 5, 38, '1'),
(295, 6, 38, '1'),
(296, 7, 38, '1'),
(297, 8, 38, '1'),
(298, 9, 38, '1'),
(299, 10, 38, '1'),
(300, 11, 38, '1'),
(301, 12, 38, '1'),
(302, 13, 38, '1'),
(303, 14, 38, '1'),
(304, 1, 39, '0'),
(305, 2, 39, '0'),
(306, 3, 39, '0'),
(307, 4, 39, '0'),
(308, 5, 39, '1'),
(309, 6, 39, '0'),
(310, 7, 39, '1'),
(311, 8, 39, '1'),
(312, 9, 39, '1'),
(313, 10, 39, '1'),
(314, 11, 39, '1'),
(315, 12, 39, '1'),
(316, 13, 39, '1'),
(317, 14, 39, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` char(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `id_prodi` int(10) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_tlp` char(12) NOT NULL,
  `status` enum('0','1','','') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `password`, `nama`, `id_prodi`, `jk`, `alamat`, `tempat_lahir`, `tgl_lahir`, `no_tlp`, `status`) VALUES
('3', '3', 'henim', 3, 'L', 'kkk', 'p', '2020-09-08', '0875555', '1'),
('3095111135', '3095111135', 'Lestari Wulandari', 3, 'P', 'Kendal', 'Kendal', '1995-01-03', '08783354411', '1'),
('3095111153', '3095111153', 'Adam Khasani', 3, 'L', 'Bandung', 'Bandung', '1994-03-08', '085915515433', '1'),
('3095111161', '3095111161', 'Rizqi Nugroho', 3, 'L', 'Sleman', 'Sleman', '1994-08-10', '85706611938', '1'),
('3095111163', '3095111163', 'Angga Agustiana P', 3, 'L', 'Sragen', 'Sragen', '1994-11-15', '085641706484', '1'),
('3095111335', '3095111335', 'sapto aji', 3, 'L', 'jogja', 'jogja', '2020-09-07', '098765432', '1'),
('3105111011', '3105111011', 'Ade Nugraha', 3, 'L', 'Bantul', 'Bantul', '1995-05-02', '082296550899', '1'),
('3105111092', '3105111092', 'Deni Iswara Artalata', 3, 'L', 'Kebumen', 'Kebumen', '1994-10-21', '082111331118', '1'),
('3105111417', '3105111417', 'Robby Syihabillah', 3, 'L', 'Banyumas', 'Banyumas', '1994-01-19', '0816288805', '1'),
('3115111149', '3115111149', 'Nilna Choiruroh', 3, 'P', 'Bantul', 'Bantul', '1995-04-06', '087738114557', '1'),
('3125111075', '3125111075', 'Salamun Ghoiro', 3, 'L', 'Temanggung', 'Temanggung', '2009-01-01', '087765678678', '1'),
('5130411411', '5130411411', 'Indrayana', 4, 'L', 'Majalengka', 'Majalengka', '1994-06-07', '081327685999', '1'),
('5130411414', '5130411414', 'Agin Supriyatna', 4, 'L', 'Yogyakarta', 'Cilacap', '1994-09-01', '08983216628', '1'),
('5130411418', '5130411418', 'Dimas pratama', 4, 'L', 'yogyakartaa', 'Tegal', '1994-09-05', '081325783726', '1'),
('5130411888', '5130411888', 'Niam', 4, 'L', 'Yogyakarta', 'Yogyakarta', '1994-08-17', '089831666837', '1'),
('5130411999', '5130411999', 'edi sudio', 4, 'L', 'yogyakarta', 'sleman ondongcaur', '1995-03-08', '08133242649', '1'),
('5131311015', '5131311015', 'Agus Triyono', 4, 'L', 'Gunungkidul', 'Gunungkidul', '1994-07-11', '0817262113', '1'),
('5131411006', '5131411006', 'Nila Shofiya', 4, 'P', 'Kalasan', 'Kalasan', '1995-12-15', '085729671819', '1'),
('5131411008', '5131411008', 'Umi Yatuzuhroh ', 4, 'P', 'Purwokerto', 'Purwokerto', '1995-08-26', '081804152925', '1'),
('5140111004', '5140111004', 'Aris Kurniawan', 4, 'L', 'Indramayu', 'Indramayu', '1993-10-20', '081384526660', '1'),
('5140111009', '5140111009', 'Hanif Safitri', 4, 'P', 'Tempel', 'Tempel', '1995-06-12', '085229110190', '1'),
('5140111018', '5140111018', 'Desi Puspitasari', 4, 'P', 'Temanggung', 'Temanggung', '1995-02-01', '08985161662', '1'),
('5140111021', '5140111021', 'Wahyu Saputra', 4, 'L', 'Yogyakarta', 'Tangerang', '1994-09-14', '085728516516', '1'),
('5140111046', '5140111046', 'Saiful Insan', 4, 'L', 'Yogyakarta', 'Kalimantan', '1994-12-21', '085870631152', '1'),
('5140111051', '5140111051', 'Resita Dewi Rahmadan', 4, 'P', 'Jakarta', 'Jakarta', '1995-03-11', '081328117575', '1'),
('5140111062', '5140111062', 'Puput Hartanti', 4, 'P', 'Purworejo', 'Purworejo', '1994-05-03', '082223818112', '1'),
('5140611052', '5140611052', 'Rizky Kurniawan', 4, 'L', 'Tempel', 'Tempel', '1995-01-04', '081227002777', '1'),
('5140611066', '5140611066', 'Agnes Budiarti', 4, 'P', 'Godean', 'Sleman', '1995-11-25', '081335313045', '1'),
('5140711006', '5140711006', 'Andhika Budi S', 4, 'L', 'Gunungkidul', 'Gununggkidul', '1993-06-11', '081335313045', '1'),
('5140711018', '5140711018', 'Satria Panji Mukti', 4, 'L', 'Seyegan', 'Seyegan', '1994-10-17', '082230577009', '1'),
('5140711087', '5140711087', 'Ririn Rianti', 4, 'P', 'Turi', 'Turi', '1994-08-24', '083861190644', '1'),
('5140911135', '5140911135', 'Ratri Ramadyani', 4, 'P', 'Wonosobo', 'Wonosobo', '1995-04-11', '085700350039', '1'),
('5140911139', '5140911139', 'Heru Wibowo', 4, 'L', 'Kulon Progo', 'Kulon Progo', '1995-05-23', '085848924483', '1'),
('5140911154', '5140911154', 'Bayu Fahriza Dwi N', 4, 'L', 'Klaten', 'Klaten', '1994-02-13', '087786073225', '1'),
('5140911207', '5140911207', 'Sari Rahmawati', 4, 'P', 'Magelang', 'Magelang', '1995-01-05', '089629870209', '1'),
('5140911209', '5140911209', 'Dyah Ayu Pamekas', 4, 'P', 'Temanggung', 'Temanggung', '1995-12-22', '08986216941', '1'),
('5140911217', '5140911217', 'Vandy Raif Tri W', 4, 'L', 'Condongcatur', 'Condongcatur', '1994-07-07', '089534242074', '1'),
('5140911219', '5140911219', 'Dimas Ajie Prasetya', 4, 'L', 'Jetis', 'Kalimantan', '1994-11-02', '08886539426', '1'),
('5140911225', '5140911225', 'Novan Antofani', 4, 'L', 'Pekalongan ', 'Pekalongan ', '1994-06-21', '088215547318', '1'),
('57899999', '57899999', 'erlangga', 3, 'L', 'jjjjjjjjjjjjjjjjjj', 'p', '2020-09-02', '0875555', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
`id_prodi` int(10) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_prodi` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`) VALUES
(3, 3, 'Teknik Elektro'),
(4, 3, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(10) NOT NULL,
  `nim` char(20) NOT NULL,
  `id_buku` int(10) DEFAULT NULL,
  `kode_buku` int(10) NOT NULL,
  `jml_buku` int(11) DEFAULT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `hari_pinjam` int(2) NOT NULL,
  `hari_denda` varchar(2) DEFAULT '0',
  `denda` int(10) NOT NULL DEFAULT '0',
  `status` varchar(100) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `status_transaksi` varchar(50) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nim`, `id_buku`, `kode_buku`, `jml_buku`, `tgl_pinjam`, `tgl_kembali`, `hari_pinjam`, `hari_denda`, `denda`, `status`, `kondisi`, `status_transaksi`, `kode_transaksi`) VALUES
(1, '3095111135', 39, 5, 1, '2020-09-10', '2020-09-17', 7, '18', 18000, 'Sudah Diperbaiki', 'Rusak/Sobek (Ringan)', 'offline', '20-0910-21-5546'),
(2, '5130411888', 2, 3, 1, '2020-09-10', '2020-09-15', 5, '', 0, 'dikembalikan', '', 'online', '20-0910-21-5330'),
(3, '5130411888', 38, 3, 1, '2020-09-10', '2020-09-17', 7, '0', 0, 'dipinjam', '', 'offline', '20-0910-22-3469'),
(4, '3095111135', 39, 6, 1, '2020-09-10', '2020-09-17', 7, '', 0, 'dikembalikan', '', 'offline', '20-0910-22-7079'),
(5, '3095111135', 39, 8, 1, '2020-09-10', '2020-09-15', 0, '', 0, 'dikembalikan', '', 'offline', '20-0910-23-5387'),
(6, '5130411888', 2, 0, NULL, '2020-09-11', '2020-09-16', 5, '0', 0, 'batal', '', 'online', '20-0911-01-7957'),
(7, '5130411888', 3, 0, NULL, '2020-09-11', '2020-09-16', 5, '0', 0, 'batal', '', 'online', '20-0911-01-2036'),
(8, '5130411888', 4, 0, NULL, '2020-09-11', '2020-09-16', 5, '0', 0, 'batal', '', 'online', '20-0911-01-9483'),
(9, '5130411888', 7, 0, NULL, '2020-09-11', '2020-09-16', 5, '0', 0, 'batal', '', 'online', '20-0911-01-2428'),
(10, '5130411888', 39, 6, 1, '2020-09-11', '2020-09-16', 5, '0', 0, 'dipinjam', '', 'offline', '20-0911-08-2904'),
(11, '5130411888', 39, 6, 1, '2020-09-11', '2020-09-16', 5, '0', 0, 'dipinjam', '', 'offline', '20-0911-08-2807'),
(12, '5130411888', 35, 1, 1, '2020-09-11', '2020-09-16', 5, '17', 17000, 'dikembalikan', 'Hilang', 'offline', '20-0911-08-3467'),
(13, '5130411414', 2, 0, NULL, '2020-09-11', '2020-09-16', 5, '0', 0, 'menunggu', '', 'online', '20-0911-12-8065');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `broadcast`
--
ALTER TABLE `broadcast`
 ADD PRIMARY KEY (`id_broadcast`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
 ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
 ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kode_buku`
--
ALTER TABLE `kode_buku`
 ADD PRIMARY KEY (`id_kode`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
 ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `broadcast`
--
ALTER TABLE `broadcast`
MODIFY `id_broadcast` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
MODIFY `id_buku` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
MODIFY `id_config` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kode_buku`
--
ALTER TABLE `kode_buku`
MODIFY `id_kode` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=318;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
MODIFY `id_prodi` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
