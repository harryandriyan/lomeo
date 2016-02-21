-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2011 at 04:39 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gisapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(4) NOT NULL AUTO_INCREMENT,
  `uname` varchar(25) NOT NULL,
  `pass` varchar(200) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `uname`, `pass`) VALUES
(4, 'Harry', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int(30) NOT NULL AUTO_INCREMENT,
  `id_user` int(9) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` varchar(150) NOT NULL,
  PRIMARY KEY (`id_chat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `jen_wis`
--

CREATE TABLE IF NOT EXISTS `jen_wis` (
  `id_jen_wis` int(5) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_jen_wis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jen_wis`
--

INSERT INTO `jen_wis` (`id_jen_wis`, `jenis`, `icon`, `keterangan`) VALUES
(1, 'Pantai', 'glyphicon glyphicon-road', 'Wisata alam pantai'),
(2, 'Goa', 'glyphicon glyphicon-inbox', 'Wisata Goa Alam'),
(3, 'Desa Wisata', 'glyphicon glyphicon-globe', 'Berwisata di desa Wisata alam asri'),
(4, 'Gunung Api', 'glyphicon glyphicon-fire', 'Wisata ke Gunung Berapi');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE IF NOT EXISTS `kabupaten` (
  `id_kab` int(5) NOT NULL AUTO_INCREMENT,
  `id_prov` int(5) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `lat` double NOT NULL,
  `lang` double NOT NULL,
  PRIMARY KEY (`id_kab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kab`, `id_prov`, `kabupaten`, `lat`, `lang`) VALUES
(1, 15, 'Gunungkidul', -7.965567371788615, 110.6050039277344),
(2, 13, 'Subang', -6.563830746284374, 107.76366481640628),
(3, 1, 'Sabang', 5.535174338367304, 95.31340846875003),
(5, 14, 'Sukoharjo', -7.676457898816627, 110.8412099824219),
(6, 1, 'Solo', -7.5587165785494355, 110.82335719921878),
(7, 15, 'Sleman', -7.714903949975898, 110.33721217968753),
(8, 15, 'Bantul', -7.884296893742476, 110.33412227490237),
(9, 14, 'Magelang', -7.498812686395685, 110.22460231640628),
(10, 14, 'Wonogiri', -7.932925091986747, 110.5720449433594),
(12, 17, 'Bangli', -8.382204107042382, 115.41426906445315),
(13, 17, 'Buleleng', -8.113105054900819, 115.12381801464846),
(14, 17, 'Kota Denpasar', -8.64636519489055, 115.20140895703128),
(15, 16, 'Pacitan', -8.191271341013385, 111.11449489453128),
(16, 14, 'Cilacap', -7.717965874825874, 109.0064931855469);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komen` int(11) NOT NULL AUTO_INCREMENT,
  `id_pw` int(8) NOT NULL,
  `id_user` int(9) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  PRIMARY KEY (`id_komen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komen`, `id_pw`, `id_user`, `komentar`, `tanggal`) VALUES
(1, 6, 1, 'apa kabar baron ?', '05-08-2011 03:04:12'),
(2, 1, 1, 'apa kabar goa pindul ?', '05-08-2011 03:04:35'),
(3, 4, 1, 'apa kabar tepus beach ?', '05-08-2011 03:05:21'),
(4, 6, 1, 'haha', '05-08-2011 03:05:34'),
(5, 6, 1, 'gfgfdhg', '05-08-2011 03:10:50'),
(6, 1, 1, 'haha', '05-08-2011 03:29:45'),
(7, 8, 1, 'klayar pacitan gan ? (y)', '05-08-2011 03:31:27'),
(8, 7, 1, 'kuta bali gan', '05-08-2011 03:32:05'),
(9, 7, 1, 'yosh, internasional :D', '05-08-2011 03:46:27'),
(10, 4, 1, 'putih bener pasirnya ', '05-08-2011 04:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `id_kontak` int(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `pesan`, `tanggal`, `status`) VALUES
(10, 'Harry', 'harry@gmail.com', 'pesan terbaru', 'Friday, 05-08-2011 04:33:10', 1),
(11, 'Maulana', 'maulana@harry.com', 'pesan editan', 'Friday, 05-08-2011 04:33:35', 1),
(12, 'Aisyiyah', 'ais@harry.com', 'Pesan saya ', 'Friday, 05-08-2011 03:13:34', 1),
(13, 'Harry', 'harrykjsemin@gmail.com', 'diperbarui biar simpel aja', 'Friday, 05-08-2011 04:35:51', 1),
(14, 'Harry', 'harrykjsemin@gmail.com', 'Pesan setelah dilakukan editing', 'Friday, 05-08-2011 02:58:56', 1),
(15, 'danang', 'danang@danang.com', 'apa har', 'Saturday, 08-02-2014 04:27:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(35) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `prov` int(4) DEFAULT NULL,
  `alamat` text,
  `tentang` text,
  `pass` varchar(200) NOT NULL,
  `kelamin` varchar(30) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `tanggal` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;


--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_prov` int(4) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `lat` double NOT NULL,
  `lang` double NOT NULL,
  PRIMARY KEY (`id_prov`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_prov`, `provinsi`, `kota`, `lat`, `lang`) VALUES
(1, 'Aceh', 'Banda Aceh', 5.566611915599806, 95.31340846875003),
(2, 'Sematra Utara', 'Medan', -6.798078526353428, -4.348078526353428),
(3, 'Sumatra Barat', 'Padang', -7.798078526354301, -7.798078526354301),
(4, 'Riau', 'Pekanbaru', -7.798078526354301, -7.798078526354301),
(5, 'Jambi', 'Jambi', -7.798078526354301, -7.798078526354301),
(6, 'Sumatra Selatan', 'Palembang', -7.798078526354301, -7.798078526354301),
(7, 'Bengkulu', 'Bengkulu', -7.798078526354301, -7.798078526354301),
(8, 'Lampung', 'Bandar Lampung', -7.798078526354301, -7.798078526354301),
(9, 'Kepulauan Bangka Belitung', 'Pangkal Pinang', -7.798078526354301, -7.798078526354301),
(10, 'Kepulauan Riau', 'Tanjung Pinang', -7.798078526354301, -7.798078526354301),
(11, 'DKI Jakarta', 'Jakarta ', -6.798078526354301, -3.798078526354301),
(12, 'Banten', 'Tangerang', -7.798078526354301, -7.798078526354301),
(13, 'Jawa Barat', 'Bandung', -7.798078526354301, -7.798078526354301),
(14, 'Jawa Tengah', 'Semarang', -7.7980785, -5.4980777),
(15, 'DI Yogyakarta', 'Yogyakarta', -7.7980785, -3.4980781),
(16, 'Jawa Timur', 'Surabaya', -7.798078526354301, -7.798078526354301),
(17, 'Bali', 'Denpasar', -7.798078526354301, -7.798078526354301),
(18, 'Nusa Tenggara Barat', 'Mataram', -7.798078526354301, -7.798078526354301),
(19, 'Nusa Tenggara Timur', 'Kupang', -7.798078526354301, -7.798078526354301),
(20, 'Kalimantan Barat', 'Pontianak', -7.798078526354301, -7.798078526354301),
(21, 'Kalimantan Tengah', 'Palangkaraya', -7.798078526354301, -7.798078526354301),
(22, 'Kalimantan Selatan', 'Banjarmasin', -7.798078526354301, -7.798078526354301),
(23, 'Kalimantan Timur', 'Samarinda', -7.798078526354301, -7.798078526354301),
(24, 'Sulawesi Utara', 'Manado', -7.798078526354301, -7.798078526354301),
(25, 'Sulawesi Tengah', 'Palu', -7.798078526354301, -7.798078526354301),
(26, 'Sulawesi Selatan', 'Makassar', -7.798078526354301, -7.798078526354301),
(27, 'Sulawesi Tenggara', 'Kendari', -7.798078526354301, -7.798078526354301),
(28, 'Gorontalo', 'Gorontalo', -7.798078526354301, -7.798078526354301),
(29, 'Sulawesi Barat', 'Mamuju', -7.798078526354301, -7.798078526354301),
(30, 'Maluku', 'Ambon', -7.798078526354301, -7.798078526354301),
(33, 'Papua Barat', 'Manokwari', -1.798078526354301, -1.898078526354301),
(36, 'Maluku Utara', 'Danbo Dono', -1.798078526354301, -2.198078526354301);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(15) NOT NULL AUTO_INCREMENT,
  `status` text NOT NULL,
  `id_user` int(7) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `tanggal` varchar(150) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`, `id_user`, `id_kab`, `tanggal`) VALUES
(8, 'ternyata cukup aman ', 5, 1, '07-08-2011 08:02:39'),
(11, 'naruto shipuden 664 telah hadir', 1, 2, '05-08-2011 02:16:27'),
(15, 'gunung kelud njedot', 1, 5, '05-08-2011 02:09:28'),
(16, 'akhirnya jadi juga', 1, 1, '05-08-2011 03:53:48'),
(17, 'oyahoooyy', 1, 15, '05-08-2011 04:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE IF NOT EXISTS `wisata` (
  `id_pw` int(7) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `alamat` text NOT NULL,
  `lat` double NOT NULL,
  `lang` double NOT NULL,
  `prov` int(7) NOT NULL,
  `id_kab` int(5) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `stat` int(2) NOT NULL,
  PRIMARY KEY (`id_pw`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_pw`, `nama`, `id_jenis`, `alamat`, `lat`, `lang`, `prov`, `id_kab`, `foto`, `stat`) VALUES
(1, 'Goa Pindul', 3, 'Bejiharjo, Karangmojo, Gunungkidul', -7.9502666264787125, 110.63126811840823, 15, 1, 'turki.jpg', 1),
(4, 'Pantai Putih', 1, 'Tepus, Gunungkidul', -6.798078451, -4.568078529, 15, 1, '800px-Naruto_Map.png', 1),
(6, 'Pantai Baron', 1, 'Tanjungsari, Gunungkidul', -8.128739533071451, 110.54732570507815, 15, 1, 'bron.jpg', 1),
(7, 'Pantai Kuta', 1, 'Kuta, Bangli, Bali', -8.758357376199742, 115.18355617382815, 17, 10, 'kuta.jpg', 1),
(8, 'Pantai Klayar', 1, 'Klayar, Pacitan, Jawa Timur', -8.21437844034209, 111.08153591015628, 16, 15, 'klayar.jpg', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
