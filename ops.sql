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

-- Dumping database structure for opsDBOLD
CREATE DATABASE IF NOT EXISTS `opsDBOLD` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `opsDBOLD`;


-- Dumping structure for table opsDBOLD.page_content
CREATE TABLE IF NOT EXISTS `page_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_path` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `page_heading` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_page_content_page_content_parent` (`parent`),
  CONSTRAINT `FK_page_content_page_content_parent` FOREIGN KEY (`parent`) REFERENCES `page_content_parent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='Here we save the content of the pages.';

-- Dumping data for table opsDBOLD.page_content: ~9 rows (approximately)
/*!40000 ALTER TABLE `page_content` DISABLE KEYS */;
INSERT INTO `page_content` (`id`, `site_path`, `parent`, `page_heading`, `content`, `active`, `date_created`, `date_updated`) VALUES
	(1, 'front_page', 2, 'PHP1', '<p>Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP <br /> Basic PHP 1<br /> Basic PHP</p>', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'installing_of_php_window', 1, 'INSTALLING OF PHP in window', 'This is where we learn about installtion of PHP  in Window Enviourment <br/>\r\nThis is where we learn about installtion of PHP  in Window Enviourment <br/>\r\nThis is where we learn about installtion of PHP  in Window Enviourment <br/>\r\nThis is where we learn about installtion of PHP  in Window Enviourment <br/>\r\nThis is where we learn about installtion of PHP  in Window Enviourment <br/>\r\nThis is where we learn about installtion of PHP  in Window Enviourment <br/>\r\nThis is where we learn about installtion of PHP  in Window Enviourment <br/>', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'installing_of_php_linux', 1, 'INSTALLING OF PHP in Linux', 'This is where we learn about installtion of PHP  in Linux Enviourment ', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'front_page', 1, 'Intro of PHP', '<h5><strong>zxvzxvz<br /><br />sasfasfasf<br />sadsad</strong></h5>\r\n<h1><strong><br /></strong>sadas\'dasdasd</h1>', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, '4124124', 2, '4124', '<p>214124124\'222</p>', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'sdssdsdf', 2, 'Ad2', '<p>dsfsdfds dfsghdh h hjhgj</p>', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'b1675223', 1, 'B1', '<p>sdgss dsgfsdfsdf sgd sdgsdgsd g</p>', 'N', '0000-00-00 00:00:00', '2015-05-09 18:20:43'),
	(8, 'sdfdsfdsf', 1, 'new pgftrbfhfy', '<p>dfdsfdsf df sdffdfs dsf</p>', 'N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'tesrpage', 1, 'test page', '<h2><strong>Test PAGE</strong></h2>\r\n<p>gh sdgasysrayiwer sd dfsdg sdgsd gsdg sd gsdg dsjy gfsdg</p>\r\n<p>sdg sdhg&nbsp; dgs hdgskj hs gsdg</p>\r\n<p>sd gdsgdskjhsd,g&nbsp; gsdg dgs dgs</p>\r\n<p>d gsdg dsg dgs</p>\r\n<p>dsg</p>\r\n<p>sdg dsg</p>\r\n<p>dsg</p>\r\n<p>sdg</p>\r\n<h1>&nbsp;</h1>', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `page_content` ENABLE KEYS */;


-- Dumping structure for table opsDBOLD.page_content_parent
CREATE TABLE IF NOT EXISTS `page_content_parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT '0' COMMENT '0 mean this is on top .',
  `url` varchar(100) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Uniqe URL` (`url`),
  UNIQUE KEY `Uniqe Name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table opsDBOLD.page_content_parent: ~3 rows (approximately)
/*!40000 ALTER TABLE `page_content_parent` DISABLE KEYS */;
INSERT INTO `page_content_parent` (`id`, `parent`, `url`, `name`) VALUES
	(1, 0, 'basic_php', 'Basic PHP'),
	(2, 0, 'advance_php', 'Advance PHP'),
	(3, 0, 'php', 'PHP');
/*!40000 ALTER TABLE `page_content_parent` ENABLE KEYS */;


-- Dumping structure for table opsDBOLD.page_leftmenu
CREATE TABLE IF NOT EXISTS `page_leftmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `parent_menu` int(11) DEFAULT '0',
  `order` int(11) NOT NULL,
  `is_external` enum('I','E') NOT NULL DEFAULT 'I' COMMENT '{''I'' : ''internal link''; ''E'': ''external link''}',
  `path` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '{''Y'' : ''Active''; ''N'': ''Inactive''}',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_page_leftmenu_page_content_parent` (`parent`),
  CONSTRAINT `FK_page_leftmenu_page_content_parent` FOREIGN KEY (`parent`) REFERENCES `page_content_parent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Current we not use this table';

-- Dumping data for table opsDBOLD.page_leftmenu: ~7 rows (approximately)
/*!40000 ALTER TABLE `page_leftmenu` DISABLE KEYS */;
INSERT INTO `page_leftmenu` (`id`, `parent`, `parent_menu`, `order`, `is_external`, `path`, `label`, `is_active`, `date_created`, `date_updated`) VALUES
	(1, 1, 0, 1, 'I', 'php/basic_php/intrtoduction_of_php', 'intrtoduction of PHP', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 1, 0, 2, 'I', 'javascript:void(0)', 'INSTALLING OF PHP', 'Y', '2015-05-19 23:58:03', '2015-05-19 23:58:04'),
	(3, 1, 2, 3, 'I', 'php/basic_php/installing_of_php_window', 'INSTALLING OF PHP in window', 'Y', '2015-05-19 23:58:03', '2015-05-19 23:58:04'),
	(4, 1, 0, 5, 'I', 'php/php_syntax', 'PHP Syntax', 'Y', '2015-05-19 23:58:03', '2015-05-19 23:58:04'),
	(5, 1, 2, 4, 'I', 'php/basic_php/installing_of_php_linux', 'INSTALLING OF PHP in linux', 'Y', '2015-05-19 23:58:03', '2015-05-19 23:58:04'),
	(6, 1, 0, 0, 'I', 'test', 'test', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 1, 0, 0, 'I', 'test1', 'test1', 'Y', '2015-05-21 00:05:59', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `page_leftmenu` ENABLE KEYS */;


-- Dumping structure for table opsDBOLD.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` enum('ADMIN','BLOGUSER','JOBUSER') NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `Unique Name` (`name`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table opsDBOLD.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `active`) VALUES
	(1, 'vnyscn', 'a852efe7feb8ad53085304b6f45de3228e997e8702cb0ac2cf4759483ef37ba7', 'Vinay Sachan', 'ADMIN', 'Y');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
