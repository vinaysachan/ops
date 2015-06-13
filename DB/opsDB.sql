-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.24-0ubuntu2 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for opsDB
CREATE DATABASE IF NOT EXISTS `opsDB` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `opsDB`;


-- Dumping structure for table opsDB.blot_category
CREATE TABLE IF NOT EXISTS `blot_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table opsDB.blot_category: ~1 rows (approximately)
/*!40000 ALTER TABLE `blot_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `blot_category` ENABLE KEYS */;


-- Dumping structure for table opsDB.page_content
CREATE TABLE IF NOT EXISTS `page_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_path` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `page_heading` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_page` (`site_path`,`parent`),
  KEY `FK_page_content_page_content_parent` (`parent`),
  FULLTEXT KEY `content` (`content`),
  CONSTRAINT `FK_page_content_page_content_parent` FOREIGN KEY (`parent`) REFERENCES `page_content_parent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='Here we save the content of the pages.';

-- Dumping data for table opsDB.page_content: ~13 rows (approximately)
/*!40000 ALTER TABLE `page_content` DISABLE KEYS */;
INSERT INTO `page_content` (`id`, `site_path`, `parent`, `page_heading`, `content`, `active`, `date_created`, `date_updated`) VALUES
	(1, 'front_page', 2, 'PHP1', '<p>Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP&nbsp; <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP 1<br /> Basic PHP</p>', 'Y', '0000-00-00 00:00:00', '2015-06-11 21:11:09'),
	(2, 'installing_of_php_window', 2, 'INSTALLING OF PHP in window', 'This is where we learn about installtion of PHP  in Window Enviourment <br/>\r\nThis is where we learn about installtion of PHP  in Window Enviourment <br/>\r\nThis is where we learn about installtion of PHP  in Window Enviourment <br/>\r\nThis is where we learn about installtion of PHP  in Window Enviourment <br/>\r\nThis is where we learn about installtion of PHP  in Window Enviourment <br/>\r\nThis is where we learn about installtion of PHP  in Window Enviourment <br/>\r\nThis is where we learn about installtion of PHP  in Window Enviourment <br/>', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'installing_of_php_linux', 2, 'INSTALLING OF PHP in Linux', 'This is where we learn about installtion of PHP  in Linux Enviourment ', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'front_page', 3, 'Advance PHP List', '<h5><strong>zxvzxvz<br /><br />sasfasfasf<br />sadsad</strong></h5>\r\n<h1><strong><br /></strong>sadas\'dasdasd</h1>', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'installing_of_php_mac', 2, 'Apple', 'Installation on Mac OS X', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'php_arithmetic_operator', 2, 'Arithmatic Operator', 'Arithmatic Operator', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'php_comparison_operator', 2, 'Comparison Operator', 'Comparison Operator', 'Y', '0000-00-00 00:00:00', '2015-05-09 18:20:43'),
	(8, 'php_syntax', 2, 'PHP Syntax', 'PHP Syntax', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'good_code', 3, 'Characteristics of Good PHP Code', 'Characteristics of Good PHP Code', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 'file_manage', 3, 'File Manage of Server time', 'file_manage', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, 'short_tags', 3, 'Enable short tag', 'short_tags  Enable short tag', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, 'test_page1', 3, 'test page2', '<p>Tets page1</p>\r\n<p>Test Page1</p>\r\n<p>Test Page</p>\r\n<p>Test page</p>\r\n<p style="text-align: right;">&nbsp;</p>\r\n<p style="text-align: right;">Vinay Sachan</p>\r\n<p style="text-align: right;">Founder Online PHP Study</p>', 'Y', '0000-00-00 00:00:00', '2015-06-10 23:14:42'),
	(14, 'test_page_new', 3, 'test page New', '<p>Tets page New</p>\r\n<p>Test Page New</p>\r\n<p>Test Page New</p>\r\n<p>Test page New</p>\r\n<p style="text-align: right;">&nbsp;</p>\r\n<p style="text-align: right;">Vinay Sigh Sachan</p>\r\n<p style="text-align: right;">Founder Online PHP Study</p>', 'Y', '2015-06-10 23:07:09', '2015-06-10 23:19:41');
/*!40000 ALTER TABLE `page_content` ENABLE KEYS */;


-- Dumping structure for table opsDB.page_content_parent
CREATE TABLE IF NOT EXISTS `page_content_parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT '0' COMMENT '0 mean this is on top .',
  `url` varchar(100) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Uniqe URL` (`url`),
  UNIQUE KEY `Uniqe Name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table opsDB.page_content_parent: ~3 rows (approximately)
/*!40000 ALTER TABLE `page_content_parent` DISABLE KEYS */;
INSERT INTO `page_content_parent` (`id`, `parent`, `url`, `name`) VALUES
	(1, 0, 'php', 'PHP'),
	(2, 1, 'basic_php', 'Basic PHP'),
	(3, 1, 'advance_php', 'Advance PHP');
/*!40000 ALTER TABLE `page_content_parent` ENABLE KEYS */;


-- Dumping structure for table opsDB.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` text,
  `role` enum('ADMIN','BLOGUSER','JOBUSER') NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `Unique Name` (`name`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table opsDB.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `name`, `img`, `role`, `active`) VALUES
	(1, 'vnyscn', '1ba12fe09bca323b5eae753fa63bdcb8c5bec96ad00d92a2357c7f58940df21c', 'Vinay Singh Sachan', 'https://pbs.twimg.com/profile_images/3215159954/78c24061158d7e211215d504aff45a47_normal.jpeg', 'ADMIN', 'Y');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
