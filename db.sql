-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table test_kct.applicant
DROP TABLE IF EXISTS `applicant`;
CREATE TABLE IF NOT EXISTS `applicant` (
  `id_applicant` int(11) NOT NULL AUTO_INCREMENT,
  `id_job` int(11) NOT NULL,
  `judul_job` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `sts_nikah` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `pend_akhir` varchar(50) NOT NULL,
  `thn_daftar` varchar(10) NOT NULL,
  `thn_lulus` varchar(10) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `thn_masuk` varchar(10) NOT NULL,
  `thn_keluar` varchar(10) NOT NULL,
  `alasan` varchar(1000) NOT NULL,
  `path_cv` varchar(255) NOT NULL,
  PRIMARY KEY (`id_applicant`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table test_kct.applicant: ~5 rows (approximately)
/*!40000 ALTER TABLE `applicant` DISABLE KEYS */;
INSERT INTO `applicant` (`id_applicant`, `id_job`, `judul_job`, `nama`, `gender`, `umur`, `sts_nikah`, `alamat`, `jurusan`, `no_tlp`, `email`, `sekolah`, `pend_akhir`, `thn_daftar`, `thn_lulus`, `instansi`, `jabatan`, `thn_masuk`, `thn_keluar`, `alasan`, `path_cv`) VALUES
	(3, 2, 'Creative AI', 'Billbo', 0, '17', 0, '									wertyu\r\n								', 'Design', '0865435789', 'aaarr@mail.com', 'LP3I', 'SMA', '1997', '2014', '', '', '1990', '1990', '										\r\n									', 'applicant_1490840395.pdf'),
	(4, 2, 'Creative AI', 'Billbo', 0, '20', 0, '									aaaaa\r\n								', 'Design', '0865435789', 'aaarr@mail.com', 'LP3I', 'SMA', '1990', '1990', '', '', '1990', '1990', '										\r\n									', 'applicant_1490840464.pdf'),
	(5, 2, 'Creative AI', 'aaaa', 0, '17', 0, '									\r\n		aaaa					', 'aaa', 'aa', 'a@mail.com', 'aaa', 'SMA', '1990', '1990', '', '', '1990', '1990', '										\r\n									', ''),
	(6, 2, 'Creative AI', 'aaaa', 0, '17', 0, '									\r\n								', '', '', '', '', 'SMA', '1990', '1990', '', '', '1990', '1990', '										\r\n									', ''),
	(7, 2, 'Creative AI', 'aaa', 0, '17', 0, '	aaaa								\r\n								', 'aaaa', '1111', 'a@mail.com', 'aaa', 'SMA', '1991', '1993', '', '', '1990', '1990', '										\r\n									', '');
/*!40000 ALTER TABLE `applicant` ENABLE KEYS */;

-- Dumping structure for table test_kct.clients
DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table test_kct.clients: ~5 rows (approximately)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id_client`, `nama`, `keterangan`, `path`) VALUES
	(3, 'bbbb', '<p>aaaa</p>', 'img_1491292621.jpg'),
	(4, 'maxx coffee', '<p>maxx coffee</p>', 'img_1491443880.jpg'),
	(5, 'bali tower', '<p>bali tower</p>', 'img_1491443923.jpg'),
	(6, 'gading murni', '<p>gading murni</p>', 'img_1491443997.jpg'),
	(7, 'ahm', '<p>ahm honda</p>\r\n<p>&nbsp;</p>', 'img_1491444019.jpg'),
	(8, 'abadi metal', '<p>abadi metal utama</p>\r\n<p>&nbsp;</p>', 'img_1491444091.jpg');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table test_kct.jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id_job` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tgl_post` date NOT NULL,
  `tgl_end` date NOT NULL,
  `jobdesc` varchar(10000) NOT NULL,
  `info` varchar(10000) NOT NULL,
  PRIMARY KEY (`id_job`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table test_kct.jobs: ~2 rows (approximately)
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` (`id_job`, `judul`, `lokasi`, `tgl_post`, `tgl_end`, `jobdesc`, `info`) VALUES
	(1, 'Marketing', 'Surabaya', '2017-03-22', '2017-03-31', '<p>Isi dengan job description</p>', '<p>Isi dengan info tambahan</p>'),
	(2, 'Creative AI', 'Surabaya', '2017-03-22', '2017-03-31', '<p>Isi adalah</p>', '<p>Isi</p>');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

-- Dumping structure for table test_kct.meta_tag
DROP TABLE IF EXISTS `meta_tag`;
CREATE TABLE IF NOT EXISTS `meta_tag` (
  `meta_id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_title` text,
  `meta_keyword` text,
  `meta_desc` text,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table test_kct.meta_tag: ~0 rows (approximately)
/*!40000 ALTER TABLE `meta_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `meta_tag` ENABLE KEYS */;

-- Dumping structure for table test_kct.news
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `kutipan` varchar(255) NOT NULL,
  `isi` varchar(10000) NOT NULL,
  `tanggal` date NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table test_kct.news: ~1 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id_news`, `judul`, `kutipan`, `isi`, `tanggal`, `path`) VALUES
	(1, 'Testing Artikel', '<p>Kutipan artikel</p>', '<p>Isi dari artikel lorem ipsum dolor amet disit guins</p>', '2017-03-21', 'img_1490088497.jpg');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table test_kct.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `caption` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table test_kct.products: ~12 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id_product`, `kategori`, `nama`, `caption`, `tanggal`, `path`) VALUES
	(2, 'Canopy', 'Canopy', '<p>Canopy lorem ipsum dolor</p>', '2017-03-21', 'img_1489993116.jpg'),
	(3, 'Billboard', 'Billbo', '<p>Bilbo lorem ipsum</p>', '2017-03-21', 'img_1490077965.jpg'),
	(4, 'Exterior-Fascia', 'Extfascia', '<p>Eksterior</p>', '2017-03-22', 'img_1490167624.jpg'),
	(5, 'Interior-Fascia', 'Intfascia', '<p>Interior fascia</p>', '2017-03-22', 'img_1490167720.jpg'),
	(6, 'LetterSign', 'Letsign', '<p>Letter sign</p>', '2017-03-22', 'img_1490167778.jpg'),
	(7, 'Mural', 'Mural', '<p>Mural</p>', '2017-03-22', 'img_1490167822.jpg'),
	(8, 'Neonbox', 'Neonbox', '<p>neon box</p>', '2017-03-22', 'img_1490167870.jpg'),
	(9, 'Pylon', 'Pylon', '<p>Pylon</p>', '2017-03-22', 'img_1490169921.jpg'),
	(10, 'Tower-BTS', 'Tower', '<p>Tower bts</p>', '2017-03-22', 'img_1490170018.jpg'),
	(11, 'Billboard', 'Billbo 2', '<p>Billboooo2</p>', '2017-03-23', 'img_1490244425.jpg'),
	(12, 'Billboard', 'Bilbo 3', '<p>Bilbooooo 3</p>', '2017-03-23', 'img_1490244442.jpg'),
	(13, 'Billboard', 'Bilbo 4', '<p>Bilbo 4</p>', '2017-03-23', 'img_1490244459.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table test_kct.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `contact_mail` varchar(255) NOT NULL,
  `contact_pass` varchar(255) NOT NULL,
  `hc_mail` varchar(255) NOT NULL,
  `hc_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table test_kct.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `username`, `password`, `contact_mail`, `contact_pass`, `hc_mail`, `hc_pass`) VALUES
	(1, 'admin', 'admin', 'kaisha@wiperindonesia.coma', 'rahasia2012', 'kaisha@wiperindonesia.com', 'rahasia2012');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table test_kct.web_banner
DROP TABLE IF EXISTS `web_banner`;
CREATE TABLE IF NOT EXISTS `web_banner` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `judul_banner` varchar(255) NOT NULL,
  `caption_banner` varchar(510) NOT NULL,
  `path_banner` varchar(255) NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table test_kct.web_banner: ~3 rows (approximately)
/*!40000 ALTER TABLE `web_banner` DISABLE KEYS */;
INSERT INTO `web_banner` (`id_banner`, `judul_banner`, `caption_banner`, `path_banner`) VALUES
	(1, 'Banner BTS', '<p>Percobaan banner</p>', 'img_1489562274.jpg'),
	(6, 'aaa', '<p>aaa</p>', 'img_1513068879.jpg'),
	(7, 'ssss', '<p>ssss</p>', 'img_1513068886.jpg'),
	(8, 'aaaz', '<p>zzz</p>', 'img_1513669670.gif');
/*!40000 ALTER TABLE `web_banner` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
