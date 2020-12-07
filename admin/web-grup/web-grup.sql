-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2017 at 02:20 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web-grup`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
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
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `penulis_komentar`, `isi_komentar`, `tanggal_komentar`, `id_post`, `pp_penulis`, `penulis_post`, `lihat_komentar`) VALUES
(43, 'hiqmal', 'test', '18:48 28/07/2016', 17, '20160728_184137267530237_682365.gif', 'hiqmal', 1),
(57, 'tegar', 'test(2)', '19:00 28/07/2016', 0, '20160728_18300225.jpg', '', 1),
(55, 'tegar', 'test', '18:55 28/07/2016', 10, '20160728_18300225.jpg', 'tegar', 0),
(56, 'tegar', 'test(2)', '18:57 28/07/2016', 0, '20160728_18300225.jpg', '', 1),
(49, 'tegar', 'bibirnya ngapa itu woy', '18:53 28/07/2016', 17, '20160728_18300225.jpg', 'hiqmal', 1),
(58, 'hiqmal', 'bengep', '19:01 28/07/2016', 17, '20160728_184137267530237_682365.gif', 'hiqmal', 1),
(53, 'tegar', 'wkwkwk', '18:53 28/07/2016', 17, '20160728_18300225.jpg', 'hiqmal', 1),
(64, 'tegar', 'wow', '12:54 14/08/2016', 0, '20160728_18300225.jpg', '', 1),
(82, 'hiqmal', 'pakul', '13:24 14/08/2016', 20, '20160728_184137267530237_682365.gif', 'tegar', 0),
(83, 'tegar', 'wkwkw', '13:24 14/08/2016', 20, '20160728_18300225.jpg', 'tegar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lihat`
--

CREATE TABLE IF NOT EXISTS `lihat` (
  `user_lihat` varchar(100) NOT NULL,
  `lihat` int(5) NOT NULL,
  `apa_lihat` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lihat`
--

INSERT INTO `lihat` (`user_lihat`, `lihat`, `apa_lihat`) VALUES
('tegar', 0, 'komentar'),
('tegar', 0, 'like'),
('hiqmal', 0, 'komentar'),
('hiqmal', 0, 'like'),
('Rizki', 0, 'komentar'),
('mario', 0, 'komentar'),
('mario', 0, 'like'),
('Rizki', 0, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id_post` int(200) NOT NULL,
  `judul_post` varchar(200) NOT NULL,
  `isi_post` text NOT NULL,
  `penulis_post` varchar(100) NOT NULL,
  `tanggal_post` varchar(100) NOT NULL,
  `gambar_post` text NOT NULL,
  `suka_post` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `judul_post`, `isi_post`, `penulis_post`, `tanggal_post`, `gambar_post`, `suka_post`) VALUES
(10, '8.5 Web Grup Q Launched!', '8.5 For Spansa Metro &#039;64 Web Grup(q) <b>Launched</b> On Friday, 2016 July 15. Made By Love And Homework..', 'tegar', '15:46 15/07/2016', '20160715_154637user.jpg', 1),
(20, 'Mas Gagah', '?? Pak Ul', 'tegar', '9:55 01/08/2016', '20160801_9554920160801_095151.jpg', 0),
(18, 'Ganti Baju (1) :v', 'wkwkwk...', 'tegar', '18:51 28/07/2016', '20160728_185110IMG_20160728_183027.jpg', 0),
(17, 'Mareoo', '', 'hiqmal', '18:47 28/07/2016', '20160728_184748IMG_20160726_142550.jpg', 2),
(19, 'Ganti Baju (2)', '', 'tegar', '18:51 28/07/2016', '20160728_185158IMG_20160728_183030.jpg', 1),
(21, 'COOL', 'thekulandekumel', 'tegar', '17:50 22/01/2017', '20170122_17505220161208_171642.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `suka_post`
--

CREATE TABLE IF NOT EXISTS `suka_post` (
`id_suka` bigint(20) unsigned NOT NULL,
  `user_suka` varchar(100) NOT NULL,
  `id_post` int(200) NOT NULL,
  `post_suka` int(5) NOT NULL,
  `penulis_post` varchar(100) NOT NULL,
  `tanggal_suka` varchar(100) NOT NULL,
  `lihat_suka` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suka_post`
--

INSERT INTO `suka_post` (`id_suka`, `user_suka`, `id_post`, `post_suka`, `penulis_post`, `tanggal_suka`, `lihat_suka`) VALUES
(48, 'tegar', 10, 1, 'tegar', '7:02 16/07/2016', 0),
(59, 'tegar', 17, 1, 'hiqmal', '19:02 28/07/2016', 0),
(57, 'hiqmal', 17, 1, 'hiqmal', '18:48 28/07/2016', 0),
(58, 'tegar', 19, 1, 'tegar', '18:52 28/07/2016', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tegar`
--

CREATE TABLE IF NOT EXISTS `tegar` (
  `pengumuman_tegar` text NOT NULL,
  `izin_reg_tegar` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tegar`
--

INSERT INTO `tegar` (`pengumuman_tegar`, `izin_reg_tegar`) VALUES
('Jangan Lupa Kelas 8.5 Nanti Kita Bersih Bersih Kelas...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_user` varchar(100) NOT NULL,
  `pass_user` varchar(100) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `jk_user` varchar(50) NOT NULL,
  `tanggal_lahir_user` varchar(2) NOT NULL,
  `bulan_lahir_user` varchar(50) NOT NULL,
  `tahun_lahir_user` varchar(4) NOT NULL,
  `status_user` varchar(50) NOT NULL,
  `pp_user` text NOT NULL,
  `tanggal_login_user` varchar(100) NOT NULL,
  `bio_user` text NOT NULL,
  `hp_user` varchar(50) NOT NULL,
  `alamat_user` text NOT NULL,
  `level_user` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_user`, `pass_user`, `nama_user`, `jk_user`, `tanggal_lahir_user`, `bulan_lahir_user`, `tahun_lahir_user`, `status_user`, `pp_user`, `tanggal_login_user`, `bio_user`, `hp_user`, `alamat_user`, `level_user`) VALUES
('tegar', 'tegar', 'Tegar Santosa', 'Pria', '1', 'April', '2002', 'Online', '20160728_18300225.jpg', '20:45 27/02/2017', '<b>Muhammad Tegar Santosaputra</b>, <i style="font-family:Comic SANS MS;font-size:30px;"> Spansa ''64</i> Always For U beybeh...', '08971158242', 'Jl Palapa 3, No. 45, Kel. Iringmulyo, Kec. Metro Timur, Kota Metro, Lampung', 1),
('hiqmal', 'jancok', 'Hiqmal Aditya', 'Pria', '8', 'Agustus', '2003', 'Offline', '20160728_184137267530237_682365.gif', '13:23 14/08/2016', '', '08978746879', '', 0),
('mario', 'karateinkai123', 'Mario Marcellino', 'Pria', '18', 'Mei', '2003', 'Offline', '', '9:15 27/07/2016', '', '', '', 0),
('Rizki', 'Es171170', 'M Rizki Darmawan', 'Pria', '20', 'Juni', '2003', 'Online', '', '9:05 25/07/2016', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`idu` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `first_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(128) NOT NULL,
  `bio` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `facebook` varchar(256) NOT NULL,
  `twitter` varchar(128) NOT NULL,
  `gplus` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `private` int(11) NOT NULL,
  `salted` varchar(256) NOT NULL,
  `background` varchar(256) NOT NULL,
  `cover` varchar(128) NOT NULL,
  `verified` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '1',
  `gender` tinyint(4) NOT NULL,
  `online` int(11) NOT NULL,
  `offline` tinyint(4) NOT NULL,
  `notificationl` tinyint(4) NOT NULL,
  `notificationc` tinyint(4) NOT NULL,
  `notificationm` tinyint(4) NOT NULL,
  `notificationd` tinyint(4) NOT NULL,
  `email_comment` tinyint(4) NOT NULL,
  `email_like` int(11) NOT NULL,
  `born` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idu`, `username`, `password`, `email`, `first_name`, `last_name`, `location`, `website`, `bio`, `date`, `facebook`, `twitter`, `gplus`, `image`, `private`, `salted`, `background`, `cover`, `verified`, `privacy`, `gender`, `online`, `offline`, `notificationl`, `notificationc`, `notificationm`, `notificationd`, `email_comment`, `email_like`, `born`) VALUES
(7, 'ananda', 'b5a988f396410a883ae03e5bfa4f6ad8', 'taufiqyondaime@gmail.com', 'Santri', 'Temboro', 'magetan', '', '', '2016-08-18', '', '', '', '2106712817_1605769508_198993884.jpg', 0, '', '', '1096556603_1756663977_2089279863.jpg', 0, 1, 0, 1472126152, 0, 1, 1, 1, 1, 1, 1, '2016-12-31'),
(8, 'kangjoen', '4bd3c6541e3290f109e0d7d054aa5e07', 'kangjiun67@gmail.com', 'Ahmad', 'Al Junaedi', 'cepu', '', '', '2016-08-18', '', '', '', '266034187_1763114158_946471219.jpg', 0, '', '', 'pria.png', 0, 1, 1, 1472111805, 0, 1, 1, 1, 1, 1, 1, '1990-01-01'),
(9, 'ifa', '96ec30569095300ce9f7a41ea486ef03', 'ifainiitu@gmail.com', 'ifa', 'azzarh', 'magetan', '', '', '2016-08-18', '', '', '', '366304997_1266823516_1354781968.png', 0, '', '', 'wanita.png', 0, 1, 2, 1471581829, 0, 1, 1, 1, 1, 1, 1, '1992-12-30'),
(10, 'taufiq', '4eb7c7e896e91e53b72c48a0b02fd3aa', 'thetemboro1@gmail.com', '', '', '', '', '', '2016-08-18', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471534818, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(11, 'princess', '355f54d83dcba9573975e8c673d9dab7', 'princess321@gmail.com', 'Princess', 'Akatsuki Part II', 'Magetan', '', 'Ilmu adalah cahaya', '2016-08-19', 'Princess Akatsuki Part ll', '', '', '369828399_255255663_1018957939.jpg', 0, '', '', '240436357_1706492209_1199070119.jpg', 0, 1, 0, 1471961670, 0, 1, 1, 1, 1, 1, 1, '1997-09-29'),
(12, 'dodi12', '3b9a2adf17d0010d3f219cc8f41ac832', 'Bskdkd@gmail.com', '', '', '', '', '', '2016-08-19', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471615205, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(13, 'irinnizza', '88eaaee5809fd297b8ae59fd1d234fc9', 'iyus991@ymail.com', '', '', '', '', '', '2016-08-19', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1471644775, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(14, 'taufiqyodaime', '5da8c4ac8bc0fa58020dfa278065b175', 'taufiqyondaime@yahoo.com', 'Taufiq', 'Yondaime', 'magetan', '', '', '2016-08-20', '', '', '', '609943584_541286325_2008323062.jpg', 0, '', '', 'pria.png', 0, 1, 1, 1472117342, 0, 1, 1, 1, 1, 1, 1, '1990-10-19'),
(15, 'tifha', 'b5a988f396410a883ae03e5bfa4f6ad8', 'fadyasalsabila@gmail.com', '', '', '', '', '', '2016-08-20', '', '', '', '532359184_1623463582_936279996.jpg', 0, '', '', '1099713531_711090027_1706801491.jpg', 0, 1, 0, 1472049954, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(19, 'tifha21', 'b5a988f396410a883ae03e5bfa4f6ad8', 'tifha@yahoo.co.id', '', '', '', '', '', '2016-08-20', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1471690815, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(20, 'liya', '3eeda7190df4b20c7c55571a8abff0fc', 'amaliyah.hasanah@blacberry.co.id', '', '', '', '', '', '2016-08-20', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1471691339, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(22, 'lia', 'b5a988f396410a883ae03e5bfa4f6ad8', 'lia212@yahoo.co.id', '', '', '', '', '', '2016-08-20', '', '', '', '1377554280_620504015_319024162.jpg', 0, '', '', '418140494_1541126403_1989511012.jpg', 0, 1, 0, 1472101504, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(23, 'dodi7', 'f1c500492cf1e5de58c0a098bdd3b9ff', 'dodisusanto230@gmail.com', '', '', '', '', '', '2016-08-20', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471695891, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(24, 'rohmah', 'b5a988f396410a883ae03e5bfa4f6ad8', 'rohmah32@yahoo.com', 'siti ', 'rahmah', 'serang banten', '', 'Be your self ', '2016-08-20', 'rrohmae@yahoo.com', '', '', '128288294_667436874_482733139.jpg', 0, '', '', '953052103_368832714_321439948.png', 0, 1, 2, 1472127720, 0, 1, 1, 1, 1, 1, 1, '1995-02-05'),
(25, 'iiesisntay', 'a3ec4218df52951140986e5e3b1db881', 'iranovial@yahoo.co.id', 'iies', 'isntay', 'ketapang', '', '', '2016-08-20', 'iies isntay', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1471708064, 0, 1, 1, 1, 1, 1, 1, '1996-11-25'),
(27, 'ayu', 'bfbe725ccb19e18849ba475326e82de1', 'ayu_andgod@yahoo.com', '', '', '', '', '', '2016-08-21', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1471756590, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(28, 'chalisa', 'b5a988f396410a883ae03e5bfa4f6ad8', 'chalisa90@gmail.com', 'Ayu Chalisa', 'Fikratuha', 'Ponorogo', '', '', '2016-08-21', 'ayu_andgod@yahoo.com', '', '', '1857274724_2025490193_653543415.jpg', 0, '', '', 'wanita.png', 0, 1, 2, 1471838497, 0, 1, 1, 1, 1, 1, 1, '1997-02-13'),
(30, 'tegar', '714440abdc2359b0533fd3cbbe29382c', '08971158242', 'Tegar', 'Santosa', 'Metro, Lampung', 'http://http://teziger.blogspot.com', 'Editor', '2016-08-22', 'mtegarsp', 'tegarsantosa_p', '+TegarSantosaP', '1805422046_549028107_132432099.jpg', 0, '', '', '717741620_706237106_530786799.jpg', 1, 1, 1, 1472126837, 0, 1, 1, 1, 1, 1, 1, '2002-04-01'),
(31, 'ahlan', '963e962d210a6bd067f1a47c6fb3ebbb', '082398854426', 'ahlan', 'astri', '', '', '', '2016-08-22', '', '', '', '1730187117_2060241810_457184944.jpg', 0, '', '', 'pria.png', 0, 1, 1, 1472112071, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(32, 'roni70', 'd78b154c99fe7f06ebc02ebd63d1c87c', '+6285870432736', 'Roni', 'r', 'semarang ', '', '', '2016-08-22', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472122250, 0, 1, 1, 1, 1, 1, 1, '1970-12-31'),
(33, 'iranovial17', 'b5a988f396410a883ae03e5bfa4f6ad8', '085999000079', 'iies', 'isntay', 'ketapang', '', '', '2016-08-23', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1472001325, 0, 1, 1, 1, 1, 1, 1, '1996-11-25'),
(34, 'ahmad96', '6eea9b7ef19179a06954edd0f6c05ceb', '085735219385', 'Ahmad', 'Al zaky', '', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471922024, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(35, 'imron86', '6d67dcdf85b98f258b6a2d1979aef3fe', '081389883037', 'imron', 'rosyadi', 'cililitan jak-tim', '', 'Kejayaan ada dalam mengamalkan agama sempurna', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471925181, 0, 1, 1, 1, 1, 1, 1, '2016-12-31'),
(36, 'darsono388', '60aaedc3b451f855d133a235dd66e75d', '', 'Darsono', 'Fisabilillah', '', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471928978, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(37, 'okaalfaridzi', '7f1a65908b05238c21c134c764c89e28', '083876631251', 'oka', 'alfaridzi', '', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471930625, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(38, 'ramadhani80', '098e14d469f1809ed7dec6fbce4547dc', 'padienk_aja@yahoo.co.id', 'm.ramadhani', 'dani', '', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471934147, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(39, 'syakirhan20', 'dc086fc58f1b96cdc848792bc5bff691', '05061559017', 'Ahmad', 'Syakirhan', '', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471937131, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(40, 'darsono25', '60aaedc3b451f855d133a235dd66e75d', '085781121440', 'Darsono', 'Sajah', 'Karawang', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472002153, 0, 1, 1, 1, 1, 1, 1, '1995-05-25'),
(41, 'aburasyid03', '122be21840e03efac76f12cd74023a2e', 'abahranggarasyid@yahoo.com', 'abu', 'rasyid', 'Rokan Hulu Riau', '', 'Beljar menjadi hamba Allah yg sesuai keiinginan Allah dan Rasullnya..', '2016-08-23', 'Muhammad Nizhamudin', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471944810, 0, 1, 1, 1, 1, 1, 1, '2016-12-31'),
(42, 'zul01', '384e739a4375a29eb87b9be6d53d8e3c', 'zulfadiah@rocketmail.com', 'zul', 'karnain', '', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471956608, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(43, 'dewi16', 'c40354c0bb85ab7bc97c62a504bd53d7', '081380000570', 'dewi', '16', '', '', '', '2016-08-23', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1471959104, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(44, 'ndewi16', '1f815db83927a71ed1d094ea62fc973c', 'dnurhananugraha@yahoo.co.id', 'n', 'dewi', 'bogor', '', '', '2016-08-23', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1471959515, 0, 1, 1, 1, 1, 1, 1, '1973-11-16'),
(45, 'abuhasan1408', '7dbca859934499187b8177314eeb7b2d', '+6281212023223', 'Abu hasan', 'Almuhsin', 'Jakarta', '', '', '2016-08-23', 'Abu Hasan almuhsin', '', '', 'pria.png', 2, '', '', 'pria.png', 0, 1, 1, 1471960484, 0, 1, 1, 1, 1, 1, 1, '1994-08-10'),
(46, 'arief1991', '523bca6d9baa50376af23de7a1841aad', 'aae84574@gmail.com', 'arief', 'nganjuk', '', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471960949, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(47, 'arief19', 'd9a9cc821fdab7f733bc37abfc077e1b', '085649089279arief', 'arief', 'nganjuk19', 'nganjuk', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471961148, 0, 1, 1, 1, 1, 1, 1, '1991-07-28'),
(48, 'nasir82', '52c69e3a57331081823331c4e69d3f2e', '0813491982', 'ahmad', 'nasir', '', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471968143, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(49, 'zuhur1976', 'b2bcd3ea24d210c0e15d88c5bc3d5517', 'abizuhurruslany@yahoo.com', 'zuhur', 'ruslany', '', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471995427, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(50, 'junidil85', '4f8501d498299ceca81df4896243ee6a', 'junidil85@gmail.com', 'Junidil', 'Pitrah', '', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471979089, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(51, 'pitrah85', '4f8501d498299ceca81df4896243ee6a', '081271402375', 'Junidil', 'Pitrah', 'Lampung', '', 'Nama Junidil Pitrah\r\nUsia 31 Th\r\nAlamat Bandar Lampung', '2016-08-23', 'Junidil Pitrah', '', 'junidil85@gmail.com', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471982578, 0, 1, 1, 1, 1, 1, 1, '1985-06-14'),
(52, 'prizly29', '2e80ee15a9ea08602950e425f1d70b43', 'wowamazing290696@gmail.com', 'prizly', 'zizi', '', '', '', '2016-08-23', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1472117568, 0, 1, 1, 1, 1, 1, 1, '1996-06-29'),
(53, 'rosyidridhomumet', 'c885ca2eec46ae6a93f3f3c784dbd9c7', '085235109567', 'Rosyid', 'Ridhomumet', '', '', '', '2016-08-23', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471987631, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(54, 'mocisuki81', '5730eed318d64d6f338216875b05ca1d', 'mocisuki@yahoo.co.id', 'moci', 'suki', '', '', '', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471998426, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(55, 'muhammadbilal81', '81ec87620c97e748bbb4c8dba85adaf2', 'muhammadbilal81@gmail.com', 'muhammad', 'bilal', '', '', 'Tidak ada kejayaan ato kebahagiaan,selain mengikuti apa yg di contohkan baginda nabi agung yg mulia nabi muhammad saw.', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1471999065, 0, 1, 1, 1, 1, 1, 1, '2016-12-31'),
(56, 'hasna25', '21354e8963e77408fc26159b1da750e1', 'adzqiyasetiawan21 @gmail.com', 'amatullah ', 'hasna', '', '', '', '2016-08-24', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1471999952, 0, 1, 1, 1, 1, 1, 1, '1994-06-25'),
(57, 'alfy1999', '0082a816c9331932be4db2ea742e3cde', '085319283103', 'alfy', 'amier', '', '', '', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472002620, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(58, 'mizan313', '1d10215d5ebea639ce8edc7ccfbc62c3', 'mizansaiful@ymail.com', 'saiful', 'mizan', '', '', '', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472001919, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(59, 'zahra98', 'a661c96b48c1e1cb5ae25de299def19e', '087782375846', 'alyfa', 'husna', '', '', '', '2016-08-24', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1472007971, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(60, 'nurulhidayati08', '02b4ab2f41072a37f0144016d01a1408', '085789982242', 'nurul', 'hidayati', '', '', '', '2016-08-24', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1472015525, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(61, 'ihsan36', '3b3da8f39cbb3563e830c233000a38ea', '085345180170', 'muhammad ihsan', 'ihsan', '', '', '', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472018090, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(62, 'jsunardi', '88579ca8804e0a69085dee29cf134be2', '085368463666', 'Jusuf', 'Sunardi', '', '', '', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472022854, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(63, 'jsunardi999999', '88579ca8804e0a69085dee29cf134be2', 'jtg_sunardi@yahoo.com', 'Jusuf', 'Sunardi', 'Lampung', '', 'Dakwah', '2016-08-24', 'J Sunardi', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472023311, 0, 1, 1, 1, 1, 1, 1, '1975-07-12'),
(64, 'junadisofyam', '84170b34c1d230b7087dddce36cc0cd5', 'sofyanjunadi@gmail.com', 'Junadi', 'sofyan', '', '', '', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472029678, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(65, 'junadi90', '84170b34c1d230b7087dddce36cc0cd5', '081548785797', 'junadi', 'sofyan', 'karanganyar', '', '', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472047639, 0, 1, 1, 1, 1, 1, 1, '1990-06-27'),
(66, 'ujoe', 'd257da493ac288e00179732a2e9e4f95', 'Ujoefuad43@gmail.com', 'Ahmad Fuadi bin Abdurrahman', 'Fuadi', 'Palembang', '', 'Santri', '2016-08-24', '08877381200', '', 'Ujoefuad@gmail.com', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472030830, 0, 1, 1, 1, 1, 1, 1, '1979-07-03'),
(67, 'djokobali', '3dcd9aaa052a2d969b10b4b67757ca4a', 'jokohendrarahmadi@rocketmail.com', 'djoko', 'hendra', '', '', '', '2016-08-24', 'djoko hendra', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472031858, 0, 1, 1, 1, 1, 1, 1, '2016-12-31'),
(68, 'alel', 'b5a988f396410a883ae03e5bfa4f6ad8', '085888882221', 'al', 'el', 'magetan', '', '', '2016-08-24', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1472032066, 0, 1, 1, 1, 1, 1, 1, '2016-12-31'),
(69, 'dodisuanto7', '3f6bb53466b8e228a4760937e986d47c', '087722275202', 'Dodi', 'Susanto', '', '', '', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472033239, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(70, 'doddisusanto', '96255d6a90c2aebf355a6208cfd9c79b', '0877722299302', 'Dodi', 'Sussanto', 'Bandung', '', '', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472034392, 0, 1, 1, 1, 1, 1, 1, '2016-12-31'),
(71, 'cococcky', '4efffac0bc3883c381619ecf830bd506', 'salman_alfarisi19@hotmail.com', 'Salman', 'Alfarisi', '', '', '', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472034771, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(72, 'alyfa98', '39efcbc7706bd5c97e1bb6b2700a4236', '087784375846', 'fariha', 'sharma', '', '', '', '2016-08-24', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1472036964, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(73, 'crytall7', 'b5a988f396410a883ae03e5bfa4f6ad8', '085138465533', 'crytall', 'zealova', '', '', '', '2016-08-24', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1472044427, 0, 1, 1, 1, 1, 1, 1, '2016-12-31'),
(75, 'habibah12', '74ee55083a714aa3791f8d594fea00c9', '081314723220', 'Habibah', 'Jkt', '', '', '', '2016-08-24', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1472048350, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(76, 'nurma45', 'd09b22bb210916012a613079b17160b7', '0895368984011', 'nurma', 'salsabila', '', '', '', '2016-08-24', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1472051544, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(77, 'mawa53', 'd09b22bb210916012a613079b17160b7', '085366983889', 'nurma', 'salsabila', 'kalianda', 'http://http://http://http://mylove.mywapblog.com', 'Senantiasa dan selalu berusaha untuk menjadi pribadi yg lbih baik', '2016-08-24', 'qu aas aja', 'mawa53', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1472098076, 0, 1, 1, 1, 1, 1, 1, '1990-11-09'),
(78, 'arifsaputra', 'b5a988f396410a883ae03e5bfa4f6ad8', '085689365517', 'arif', 'saputra', '', '', '', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472053593, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(79, 'ariepsaputra', 'b5a988f396410a883ae03e5bfa4f6ad8', 'Sandaljepit123@.gmail xom', 'arip', 'a', '', '', '', '2016-08-24', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472054130, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(80, 'jinan', '4053411fc7d8e88ea46d4cb426330554', 'novhitafahmi80@gmail.com', 'Roihatul jinan', 'firdhausiah', '', '', '', '2016-08-24', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1472058272, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(81, 'fhirdea', '324c64c93fb22895162c88a0b3a9f9e1', 'novhitafahmi80@yahoo.com', 'Roihah Al jinan', 'firdhausiah', '', '', '', '2016-08-24', '', '', '', 'wanita.png', 0, '', '', 'wanita.png', 0, 1, 2, 1472095681, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(82, 'achmad190888', '45b3d3c193e53c5f656aec676dc145e0', 'rastachmad@gmail.com', 'achmad', '190888', '', '', '', '2016-08-25', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472098619, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(83, 'abugibran23', '1f41ed9bf786db2fef4fb835ee3b128f', 'eerikogeoadv@yahoo.com', 'ABU', 'GIBRAN', '', '', '', '2016-08-25', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472104159, 0, 1, 1, 1, 1, 1, 1, '0000-00-00'),
(84, 'kanghar', 'aea1f6fc146b57979f044023b3848358', '085315027286', 'Kang', 'Har', '', '', '', '2016-08-25', '', '', '', 'pria.png', 0, '', '', 'pria.png', 0, 1, 1, 1472116319, 0, 1, 1, 1, 1, 1, 1, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `suka_post`
--
ALTER TABLE `suka_post`
 ADD PRIMARY KEY (`id_suka`), ADD UNIQUE KEY `id_suka` (`id_suka`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD UNIQUE KEY `id` (`idu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id_komentar` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id_post` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `suka_post`
--
ALTER TABLE `suka_post`
MODIFY `id_suka` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
