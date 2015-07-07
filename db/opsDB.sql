-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 28, 2015 at 03:18 AM
-- Server version: 5.5.32-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `opsDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `alexa_rank`
--

CREATE TABLE IF NOT EXISTS `alexa_rank` (
  `date` date DEFAULT NULL,
  `rank` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alexa_rank`
--

INSERT INTO `alexa_rank` (`date`, `rank`) VALUES
('2015-06-21', 14005302),
('2015-06-22', 13998173),
('2015-06-25', 13978451),
('2015-06-26', 13996780),
('2015-06-28', 13944673);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `url` varchar(100) NOT NULL,
  `blog_cat` tinyint(2) NOT NULL,
  `blog_intro` text NOT NULL,
  `content` longtext NOT NULL,
  `images` text,
  `writer` smallint(4) NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_popular` enum('Y','N') NOT NULL DEFAULT 'N',
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `name`, `url`, `blog_cat`, `blog_intro`, `content`, `images`, `writer`, `active`, `is_popular`, `date_created`, `date_updated`) VALUES
(1, 'Types of SQL Statements : DDL, DML, DCL and TCL commands', 'types_of_sql_statements_ddl_dml_dcl_tcl_commands', 1, '<h2>DDL</h2>\r\n<p><br /><strong>Data Definition Language</strong>&nbsp;(DDL) statements are used to define the database structure or schema. Some examples:</p>\r\n<ul>\r\n<li>\r\n<p>CREATE - to create objects in the database</p>\r\n</li>\r\n<li>\r\n<p>ALTER - alters the structure of the database</p>\r\n</li>\r\n<li>\r\n<p>DROP - delete objects from the database</p>\r\n</li>\r\n<li>\r\n<p>TRUNCATE - remove all records from a table, including all spaces allocated for the records are removed</p>\r\n</li>\r\n<li>\r\n<p>COMMENT - add comments to the data dictionary</p>\r\n</li>\r\n<li>\r\n<p>RENAME - rename an object</p>\r\n</li>\r\n</ul>', '<h2>DDL</h2>\r\n<p><br /><strong>Data Definition Language</strong>&nbsp;(DDL) statements are used to define the database structure or schema. Some examples:</p>\r\n<ul>\r\n<li>\r\n<p>CREATE - to create objects in the database</p>\r\n</li>\r\n<li>\r\n<p>ALTER - alters the structure of the database</p>\r\n</li>\r\n<li>\r\n<p>DROP - delete objects from the database</p>\r\n</li>\r\n<li>\r\n<p>TRUNCATE - remove all records from a table, including all spaces allocated for the records are removed</p>\r\n</li>\r\n<li>\r\n<p>COMMENT - add comments to the data dictionary</p>\r\n</li>\r\n<li>\r\n<p>RENAME - rename an object</p>\r\n</li>\r\n</ul>\r\n<h2>&nbsp;</h2>\r\n<h2>DML</h2>\r\n<p><strong>Data Manipulation Language</strong>&nbsp;(DML) statements are used for managing data within schema objects. Some examples:</p>\r\n<ul>\r\n<li>\r\n<p>SELECT - retrieve data from the a database</p>\r\n</li>\r\n<li>\r\n<p>INSERT - insert data into a table</p>\r\n</li>\r\n<li>\r\n<p>UPDATE - updates existing data within a table</p>\r\n</li>\r\n<li>\r\n<p>DELETE - deletes all records from a table, the space for the records remain</p>\r\n</li>\r\n<li>\r\n<p>MERGE - UPSERT operation (insert or update)</p>\r\n</li>\r\n<li>\r\n<p>CALL - call a PL/SQL or Java subprogram</p>\r\n</li>\r\n<li>\r\n<p>EXPLAIN PLAN - explain access path to data</p>\r\n</li>\r\n<li>\r\n<p>LOCK TABLE - control concurrency</p>\r\n</li>\r\n</ul>\r\n<h2>&nbsp;</h2>\r\n<h2>DCL</h2>\r\n<p><strong>Data Control Language</strong>&nbsp;(DCL) statements. Some examples:</p>\r\n<ul>\r\n<li>\r\n<p>GRANT - gives user''s access privileges to database</p>\r\n</li>\r\n<li>\r\n<p>REVOKE - withdraw access privileges given with the GRANT command</p>\r\n</li>\r\n</ul>\r\n<h2>&nbsp;</h2>\r\n<h2>TCL</h2>\r\n<p><strong>Transaction Control</strong>&nbsp;(TCL) statements are used to manage the changes made by DML statements. It allows statements to be grouped together into logical transactions.</p>\r\n<ul>\r\n<li>\r\n<p>COMMIT - save work done</p>\r\n</li>\r\n<li>\r\n<p>SAVEPOINT - identify a point in a transaction to which you can later roll back</p>\r\n</li>\r\n<li>\r\n<p>ROLLBACK - restore database to original since the last COMMIT</p>\r\n</li>\r\n<li>\r\n<p>SET TRANSACTION - Change transaction options like isolation level and what rollback segment to use</p>\r\n</li>\r\n</ul>', 'types_of_sql_statements_ddl_dml_dcl_tcl_commands_Sql_lang.jpg', 2, 'Y', 'Y', '2015-06-24 05:27:58', '2015-06-24 05:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE IF NOT EXISTS `blog_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `link` (`link`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `name`, `link`, `date_created`, `date_updated`) VALUES
(1, 'Database, MySQL & NoSQL', 'dbms_mysql_nosql', '2015-06-24 05:10:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) unsigned NOT NULL,
  `comment` text NOT NULL,
  `comment_by` int(11) NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog_users_data`
--

CREATE TABLE IF NOT EXISTS `blog_users_data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_id` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `path_full_img` varchar(500) NOT NULL,
  `path_min_img` varchar(500) NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`path_full_img`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `path_full_img`, `path_min_img`, `active`, `date_created`, `date_updated`) VALUES
(1, 'http://onlinephpstudy.com/uploads/content_images/how_php_works.jpg', '', 'Y', '2015-06-25 05:44:08', NULL),
(2, 'http://onlinephpstudy.com/uploads/content_images/mamp_program.png', '', 'Y', '2015-06-25 10:12:58', NULL),
(3, 'http://onlinephpstudy.com/uploads/content_images/mamp_ports.png', '', 'Y', '2015-06-25 10:17:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_registration`
--

CREATE TABLE IF NOT EXISTS `newsletter_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL DEFAULT '0',
  `active` enum('E','Y','N') NOT NULL DEFAULT 'N' COMMENT 'N = only entry InActive ;  E = email; Y= accepted',
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_content`
--

CREATE TABLE IF NOT EXISTS `page_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_path` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `page_heading` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_page` (`site_path`,`parent`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED COMMENT='Here we save the content of the pages.' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`id`, `site_path`, `parent`, `page_heading`, `content`, `active`, `date_created`, `date_updated`) VALUES
(1, 'front_page', 2, 'INTRODUCTION OF PHP', '<h2>How PHP Works ?</h2>\r\n<div><img style="float: left;" src="../../uploads/content_images/how_php_works.jpg" alt="" width="395" height="287" /><br />When a user navigates in her browser to a page that ends with a .php extension, the request is sent to a web server, which directs&nbsp; the request to the PHP interpreter. As shown in the diagram above, the PHP interpreter processes the page, communicating with file systems, databases, and email servers as necessary, and then delivers a web page to the web server to return to the browser.</div>\r\n<div class="clearfix">&nbsp;</div>\r\n<h2>Characteristics of PHP</h2>\r\n<ul>\r\n<li>Familiarity</li>\r\n<li>Simplicity</li>\r\n<li>Efficiency</li>\r\n<li>Security</li>\r\n<li>Flexibility</li>\r\n<li>HTML-Embedded</li>\r\n</ul>\r\n<h2>Who is using PHP?</h2>\r\n<div class="col-md-6 pull-left">\r\n<ul class="nav">\r\n<li><a title="Facebook is using PHP" href="http://w3techs.com/sites/info/facebook.com" target="_blank"> Facebook.com</a></li>\r\n<li><a title="Wikipedia is also use PHP" href="http://w3techs.com/sites/info/wikipedia.org" target="_blank">Wikipedia.org</a></li>\r\n<li><a title="Wordpress is based on PHP" href="http://w3techs.com/sites/info/wordpress.com" target="_blank"> Wordpress.com</a></li>\r\n<li><a title="Weibo is using PHP" href="http://w3techs.com/sites/info/weibo.com" target="blank"> Weibo.com</a></li>\r\n<li><a title="Babylon is using PHP" href="http://w3techs.com/sites/info/babylon.com" target="blank"> Babylon.com</a></li>\r\n</ul>\r\n</div>\r\n<div class="col-md-6 pull-left">\r\n<ul class="nav">\r\n<li><a title="Baidu is using PHP" href="http://w3techs.com/sites/info/baidu.com" target="blank"> Baidu.com</a></li>\r\n<li><a title="Qq is using PHP" href="http://w3techs.com/sites/info/qq.com" target="blank"> Qq.com</a></li>\r\n<li><a title="Mail.ru is using PHP" href="http://w3techs.com/sites/info/mail.ru" target="blank"> Mail.ru</a></li>\r\n<li><a title="Sony is using PHP" href="http://w3techs.com/sites/info/sony.com" target="blank"> Sony.com</a></li>\r\n<li><a title="OLX is using PHP" href="http://w3techs.com/sites/info/olx.com" target="blank"> Olx.com</a></li>\r\n</ul>\r\n</div>\r\n<div class="clear-fix">&nbsp;</div>\r\n<h2>World Wide Web (www)</h2>\r\n<p>The Internet is a global system of interconnected computer networks that use the standard Internet protocol suite (TCP/IP) to serve billions of users worldwide. It is a network of networks that consists of millions of private, public, academic, business, and government networks, of local to global scope, that are linked by a broad array of electronic, wireless and optical networking technologies. <br />The World Wide Web (www) is a collective name for all the web pages on the Internet.</p>\r\n<h2>Web Page</h2>\r\n<div>Web page is a text document that uses commands in a special language called HTML to add formatting, graphics and other media, and links to other pages. There are two types of web pages :-<br /> <span class="text-danger">Static Web page</span> is a page whose contents can not change automatically each time the page is viewed.<br /> <span class="text-danger">Dynamic Web page</span> is a page whose contents can change automatically each time the page is viewed.</div>', 'Y', '2015-06-25 05:44:52', '2015-06-25 06:23:24'),
(2, 'installing_of_php_window', 2, 'INSTALLING of PHP', '<p>Many web developers want to run Apache and PHP on their own computer. Here we study step by step how to install and configure PHP in Window Operating Systems, Linux Operating System and in Mac OSX and also in Cloud Computing Platforms.<br /> To create and run PHP Scripts, you first need to have a few things in place :-</p>\r\n<ol>\r\n<li><span class="text-danger bolder">Web Server Software</span>( Apache or Internet Information Server (IIS)</li>\r\n<li><span class="text-danger bolder">PHP engine</span> that actually does the work of running your PHP scripts</li>\r\n<li>If you want to build database - driven Web applications - you also need a <span class="text-danger bolder">database server</span> installed. <br /> Options include MySQL, PostgreSQL, and SQL Server. Here we refer to using MySQL, so that''s the database server that you will install here.</li>\r\n</ol>\r\n<h2>Installation of PHP on windows</h2>\r\n<p>PHP on Windows can work with Apache or IIS. For the sake of simplicity, this tutorial looks at a very easy way to install Apache and PHP: <span class="text-danger bolder">WampServer</span>. This handy piece of software gives you Apache, MySQL, and PHP all in one handy, easy - to - install package. <br /> <span class="text-danger bolder">WampServer </span>comes from the acronym WAMP - <span class="text-danger bolder">Windows, Apache, MySQL, and PHP </span>- which is used to describe any Windows - based Web server setup that uses these three open - source technologies. <br /><br /> To install WampServer, follow these steps:-</p>\r\n<ol>\r\n<li class="line25">Download the latest version of WampServer from <a href="http://www.wampserver.com/en/" target="_blank">http://www.wampserver.com/en/</a>. At the time of writing, the latest version was PHP 5.4.16 .</li>\r\n<li class="line25">Open the <span class="text-danger bolder">WampServer.exe</span> file that you downloaded, and follow the instructions steps or just watch video to install the WampServer.</li>\r\n<li class="line25">Unblock Apache. As you run the installer, you may be asked if you want to allow Apache through the Windows Firewall. If you want to allow other computers on your network to access the Web server, click Unblock. If you are only going to access the Web server from a browser on the same computer, you can click Keep Blocking to improve security.</li>\r\n<li class="line25">Enter default mail settings. During the configuration process you will also be asked to enter a default mail server and email address for PHP to use; you can accept the defaults .</li>\r\n<li class="line25">Once the setup wizard has completed, you should see a WampServer icon in your taskbar; click this icon to display the WampServer menu . Choose the Start All Services option to fire up the Apache and MySQL servers.</li>\r\n<li class="line25">To test that the Web server is running correctly, choose the Localhost option from the WampServer menu. if all is going to the plan you see the server localhost page.</li>\r\n</ol>\r\n<p><iframe src="https://www.youtube.com/embed/puz76fdMfKk" width="100%" height="400px" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>\r\n<p>&nbsp;</p>\r\n<p class="dblue mb10">Learn how to install WampServer on your computer if 80 port is used by skype :-</p>\r\n<p><iframe src="https://www.youtube.com/embed/w9VLZ-eTZqs" width="100%" height="400px" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>', 'Y', '2015-06-25 06:28:42', '2015-06-25 06:47:02'),
(3, 'installing_of_php_linux', 2, 'Installation of PHP on UBUNTU', '<p>Ubuntu ( www.ubuntu.com) is a popular Linux distribution that is easy to install. You can download it from www.ubuntu.com/getubuntu/download; the Desktop Edition is fine for developing PHP applications.</p>\r\n<h2>How To Install Linux, Apache, MySQL, PHP (LAMP) stack on Ubuntu 14.04</h2>\r\n<p>A "<strong>LAMP</strong>" stack is a group of open source software that is typically installed together to enable a server to host dynamic websites and web apps. This term is actually an acronym which represents the <strong>L</strong>inux operating system, with the <strong>A</strong>pache web server. The site data is stored in a <strong>M</strong>ySQL database, and dynamic content is processed by <strong>P</strong>HP. In this tutorial, we''ll get a <strong>LAMP</strong> stack installed on an Ubuntu 14.04. Ubuntu will fulfill our first requirement: a Linux operating system.</p>\r\n<p>Below you find video and text-tutorial to install PHP in ubuntu, follow these steps:-</p>\r\n<h3><span style="text-decoration: underline;">STEP 1 : Install Apache</span></h3>\r\n<blockquote>\r\n<p><code>sudo apt-get update </code><br /><code>sudo apt-get install apache2</code></p>\r\n</blockquote>\r\n<h3><span style="text-decoration: underline;">Step 2 : Install MySQL</span></h3>\r\n<blockquote>\r\n<p><code>sudo apt-get install mysql-server php5-mysql</code></p>\r\n</blockquote>\r\n<h3>Step 3 - Install PHP</h3>\r\n<blockquote>\r\n<p style="text-align: left;"><code>sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt</code></p>\r\n</blockquote>', 'Y', '2015-06-25 09:29:23', '2015-06-25 09:47:45'),
(4, 'installing_of_php_mac', 2, 'Install and Enable PHP in Mac OS X', '<h2>Installing MAMP : My Apache - MySQL - PHP</h2>\r\n<p>MAMP installs a local server environment in a matter of seconds on your Mac OS X computer, be it MacBook or iMac. Like similar packages from the Windows- and Linux-world, MAMP comes free of charge, and is easily installed. MAMP will not compromise any existing Apache installation already running on your system. You can install Apache, PHP and MySQL without starting a script or having to change any configuration files! Furthermore, if MAMP is no longer needed, just delete the MAMP folder and everything returns to its original state (i.e. MAMP does not modify any of the "normal" system).</p>\r\n<ol>\r\n<li>Download the software at: http://mamp.info/en/Click Download Now button. It&rsquo;s a big download, so it takes a while to complete. (MAMP is free, but the download also includes the commercial product, MAMP Pro, which makes administering MAMP easier. You don&rsquo;t need MAMP Pro for this tutorial, and you don&rsquo;t have to install it either.)\r\n<p>Installing MAMP is just a matter of downloading a DMG (disk image) file, unzipping it, and dragging the MAMP folder into your Applications folder.</p>\r\n</li>\r\n<li><img src="../../uploads/content_images/mamp_program.png" alt="" width="423" height="344" />In Applications&ndash;&gt;MAMP, start the MAMP program, and then click the Start Servers button if a red light appears to the left of either Apache or MySQL</li>\r\n<li><img src="../../uploads/content_images/mamp_ports.png" alt="" />In the MAMP program, click the Preferences button, and then click the Ports tab (see in figure). Ports are virtual entryways that manage how other computers access different server programs on your Mac. For example, you can assign a Web server to a particular port number, and then all requests for Web pages are directed to that port. By convention, port 80 is reserved for Web servers; Web browsers therefore normally request Web pages over that port.</li>\r\n<li>Next, click on the &ldquo;<strong>Apache</strong>&rdquo; tab and choose the location where you will install WordPress. The default location is Macintosh HD/Applications/MAMP/htdocs. This is similar to the public_html folder on your web hosting server.</li>\r\n</ol>', 'Y', '2015-06-25 10:11:24', '2015-06-25 10:24:05'),
(5, 'installation_on_cloud', 2, 'Installation on Cloud Computing platforms', '<h2>Installation on Cloud Computing platforms</h2>\r\n<p><iframe style="border: 1px solid #CCC; border-width: 1px; margin-bottom: 5px; max-width: 100%;" src="http://www.slideshare.net/slideshow/embed_code/10534391" width="100%" height="700" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" allowfullscreen="allowfullscreen"> </iframe></p>', 'Y', '2015-06-25 10:26:16', '2015-06-25 10:32:33'),
(7, 'php_syntax', 2, 'PHP SYNTAX', '<div title="PHP Syntax"><span class="text-danger bolder">Syntax :- </span> Syntax are the rules that must be followed to write properly structured code. PHP''s Syntax are similar to most other programming languages (C,Java,PERL) .<br /> Some basic syntax are - .</div>\r\n<div title="PHP tags">\r\n<h2>PHP tags</h2>\r\nWhen PHP parses a file trough PHP interpreter, it looks for opening and closing tags, which are<!--?php </span--> and <span class="ared"><span class="ared">?&gt; which tell PHP to start and stop interpreting the code between them. <br />Here are few more valid ways to open and end PHP tags -</span></span>\r\n<div id="standard_tag" title="Standard tags">\r\n<h3 class="ablue">1 - Standard tags :-</h3>\r\n<div class="col-lg-6 col-sm-6 code">&nbsp;</div>\r\n<div class="col-lg-5 col-sm-5 col-md-offset-1 code_result">This is the most commonly used (and recommended) form</div>\r\n<div class="clearfix">&nbsp;</div>\r\n</div>\r\n<div id="short_tag" title="Short tags">\r\n<h3 class="ablue">2 - Short tags :-</h3>\r\n<div class="col-lg-6 col-sm-6 code"><span class="ared">&lt;? </span>\r\n<div class="ml20 comment">/* PHP Code goes here */</div>\r\n<span class="ared">?&gt;</span></div>\r\n<div class="col-lg-5 col-sm-5 col-md-offset-1 code_result">"Short" tags. Must be On via the <code>short_open_tag</code> php.ini configuration file directive.</div>\r\n<div class="clearfix">&nbsp;</div>\r\n</div>\r\n<div id="asp_tag" title="ASP tags">\r\n<h3 class="ablue">3 - ASP tags :-</h3>\r\n<div class="col-lg-6 col-sm-6 code"><span class="ared">&lt;% </span>\r\n<div class="ml20 comment">/* PHP Code goes here */</div>\r\n<span class="ared">%&gt;</span></div>\r\n<div class="col-lg-5 col-sm-5 col-md-offset-1 code_result">ASP-style tags. Must be On via the <code>asp_tags</code> php.ini configuration file directive.<br /> <code>asp_tags = On</code></div>\r\n</div>\r\n<div class="clearfix">&nbsp;</div>\r\n<div title="HTML script tags">\r\n<h3 class="ablue">4 - HTML script tags :-</h3>\r\n<div class="col-lg-6 col-sm-6 code"><span class="ared">\r\n<script language="php">// <![CDATA[\r\n</span>\r\n<div class="ml20 comment">/* PHP Code goes here */</div>\r\n<span class="ared">\r\n// ]]></script>\r\n</span></div>\r\n<div class="col-lg-5 col-sm-5 col-md-offset-1 code_result">HTML or Script style tags are case insensitive.</div>\r\n<div class="clearfix">&nbsp;</div>\r\n</div>\r\n<div class="mt10"><span class="text-danger bolder">PSR-1 coding standards </span> suggest to only use<!--?php </span--> <span class="ared">?&gt; or<!--?= </span--><span class="ared">?&gt; (echo short tags) - and no other variations.</span></span></div>\r\n<div id="echo_short_tags" title="echo short tags">\r\n<h3 class="ablue">5 - echo short tags :-</h3>\r\n<div>Both code produce the result same.</div>\r\n<div class="col-lg-6 col-sm-6 code">&nbsp;</div>\r\n<div class="col-lg-5 col-sm-5 col-md-offset-1 code">&nbsp;</div>\r\n<div class="clearfix">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class="para_box" title="Commenting PHP Code">\r\n<h2 class="dblue">Commenting PHP Code </h2>\r\n<p>A comment is simply the portion of a program that is ignored by the PHP engine. This is very useful for the programmers. There are three commenting formats in PHP -</p>\r\n<p>Single-line comments begin with a double slash (<code>//</code>) or slash (<code>#</code>).</p>\r\n<p>Multi-line comments begin with <code>/*</code> and end with <code>*/</code>.</p>\r\n<div class=" code"><span class="ared"><span class="ared"><!--?php </span--></span></span>\r\n<div class="ml20">echo "This is a example of php comment."; <br /> <span class="comment">// This is a one-line c++ style comment</span><br /> <span class="comment">/* This is a multi line comment<br /> yet another line of comment */</span><br /> echo ''This is yet another Comment type'';<br /> echo ''One Final Comments''; <br /> <span class="comment"># This is a one-line shell-style comment</span></div>\r\n<span class="ared"><span class="ared">?&gt;</span></span></div>\r\n<div class="para_box" title="White space in PHP Coding">\r\n<h2 class="dblue">White space in PHP Coding</h2>\r\n<div class="line">&nbsp;</div>\r\n<p>Whitespace is the stuff you type that is typically invisible on the screen, including spaces, tabs, and carriage returns (end-of-line characters).</p>\r\n<p>As with HTML, whitespace is ignored between PHP statements. This means it is OK to have one line of PHP code, then 20 lines of blank space before the next line of PHP code. You can also press tab to indent your code and the PHP interpreter will ignore those spaces as well.</p>\r\n<div class="col-lg-6 col-sm-6 code"><br />My First PHP Page<br /><br /> <!--?php </span-->\r\n<div class="ml20">echo "Hello Online PHP Study";<br /><br /><br /><br /> <span class="ml30">echo "Hello PHP World!";</span></div>\r\n?&gt; <br /> <br /> </div>\r\n<div class="col-lg-5 col-sm-5 col-md-offset-1">\r\n<h5 class="text-center">Display Result :-</h5>\r\n<hr />Hello Online PHP StudyHello PHP World!</div>\r\n<div class="clearfix">&nbsp;</div>\r\n</div>\r\n</div>', 'Y', '2015-06-25 10:39:55', '2015-06-25 10:43:18'),
(8, 'php_function', 2, 'PHP Function', '<p>A function is just a segment of code, separate from the rest of your code. You separate it because it''s nice and handy, and you want to use it not once but over and over. It''s a chunk of code that you think is useful, and want to use again. Functions save you from writing the code over and over. Here''s an example.</p>\r\n<p>A function in PHP can be built-in or user defined; However, they are both called the same way.PHP has more than 700 built-in functions that a PHP coder can use.</p>\r\n<h2>Why Functions Are Useful</h2>\r\n<ol>\r\n<li>They avoid duplicating code</li>\r\n<li>They make it easier to eliminate errors</li>\r\n<li>Functions can be reused in other scripts</li>\r\n<li>Functions help you break down a big project</li>\r\n</ol>\r\n<h2>Calling Functions:</h2>\r\n<p>To call a function, you write the function name, followed by an opening and a closing parenthesis:</p>\r\n<blockquote><code>functionName()</code></blockquote>\r\n<p>If you need to pass arguments, or parameters to the function, place them between the parentheses, separating each argument by commas:</p>\r\n<blockquote><code>functionName( argument ) </code><br /><code>functionName( argument1, argument2 )</code></blockquote>', 'Y', '2015-06-25 11:36:07', '2015-06-27 04:13:53'),
(9, 'your_own_function', 2, 'Writing Your Own Functions', '<p>We have learned that functions are useful parts that let is encapsulate and reuse code, and we have explored how to call functions in PHP.</p>\r\n<p>Here''s where the fun really begins, as you get to create your own functions. <br />Defining a function is really easy - just use the following syntax:</p>\r\n<blockquote><code>function myFunc() {</code><br /><code>&nbsp;&nbsp;&nbsp; // (do stuff here)</code><br /><code>}</code></blockquote>\r\n<p>In other words, you write the word function, followed by the name of the function you want to create, followed by parentheses. Next, put your function''s code between curly brackets ( { } ).<br /><strong>Example :-</strong></p>\r\n<blockquote>\r\n<p><code>fnction hellophp(){</code><br /><code>&nbsp;&nbsp;&nbsp; echo "Hello PHP!";</code><br /><code>}</code></p>\r\n</blockquote>\r\n<p><strong>//Now call the function </strong>hellophp();<br />//Displays Hello PHP</p>\r\n<h2>Defining Parameters</h2>\r\n<p>an argument is a value that you pass to a function, and a parameter is the variable within the function that receives the argument. In practice, programmers often use the two terms interchangeably.</p>\r\n<p>To specify parameters for your function, insert one or more variable names between the parentheses, as follows:</p>\r\n<blockquote>\r\n<p><code>function myFunc($oneParameter, $anotherParameter ) {</code><br /><code>&nbsp;&nbsp;&nbsp; // (do stuff here) </code><br /><code>}</code></p>\r\n</blockquote>\r\n<p>You can include as many parameter variables as you like. For each parameter you specify, a corresponding argument needs to be passed to the function when it''s called. The arguments passed to the function are then placed in these parameter variables. Here''s an example:</p>\r\n<blockquote>\r\n<p><code>helloWithName($name) {</code><br /><code>&nbsp;&nbsp;&nbsp; echo "Hello $name";</code><br /><code>}</code><br /><code>helloWithName("Vinay");&nbsp; //&nbsp; </code><code>Hello Vinay</code><br /><code>helloWithName("Adnam");&nbsp; //&nbsp; Hello Adnam<br /></code></p>\r\n</blockquote>\r\n<h2>PHP Default Argument Value</h2>\r\n<p>A function may define C++-style default values for scalar arguments as follows:</p>\r\n<blockquote>\r\n<p><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">function&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">makecoffee</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">(</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">$type&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">=&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #dd0000; background-color: #ffffff;">"cappuccino"</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">) {<br />&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #dd0000; background-color: #ffffff;">"Making&nbsp;a&nbsp;cup&nbsp;of&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">$type</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #dd0000; background-color: #ffffff;">.\\n"</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">;<br />}<br />echo&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">makecoffee</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">();<br />echo&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">makecoffee</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">(</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">null</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">);<br />echo&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">makecoffee</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">(</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #dd0000; background-color: #ffffff;">"espresso"</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">);</span></p>\r\n</blockquote>\r\n<h2>Returning Values from Your Functions</h2>\r\n<p>All functions in PHP return a value, even if you don''t explicitly cause them to. Thus, the concept of "void" functions does not really apply to PHP. You can specify the return value of your function by using the <strong>return</strong> keyword:</p>\r\n<blockquote>\r\n<p><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">function&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">square</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">(</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">$num</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">) {<br />&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">$num&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">*&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">$num</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">;<br />}<br />echo&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">square</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">(</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #0000bb; background-color: #ffffff;">4</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #007700; background-color: #ffffff;">);&nbsp;&nbsp;&nbsp;</span><span style="font-family: ''Fira Mono'', ''Source Code Pro'', monospace; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: #ff8000; background-color: #ffffff;">//&nbsp;outputs&nbsp;''16''</span></p>\r\n</blockquote>', 'Y', '2015-06-25 11:55:56', '2015-06-27 13:01:13'),
(10, 'function_scope', 2, 'Function Scope', '<p><a title="Function Scope" href="../php/basic_php/function_scope">Function Scope</a></p>', 'Y', '2015-06-27 13:24:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_content_parent`
--

CREATE TABLE IF NOT EXISTS `page_content_parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT '0' COMMENT '0 mean this is on top .',
  `url` varchar(100) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Uniqe URL` (`url`),
  UNIQUE KEY `Uniqe Name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=4 ;

--
-- Dumping data for table `page_content_parent`
--

INSERT INTO `page_content_parent` (`id`, `parent`, `url`, `name`) VALUES
(1, 0, 'php', 'PHP'),
(2, 1, 'basic_php', 'Basic PHP'),
(3, 1, 'advance_php', 'Advance PHP');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `question_category_id` int(11) NOT NULL,
  `level` enum('E','M','H') NOT NULL DEFAULT 'M' COMMENT '{ E : Easy, M : Medium, H : Hard',
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=10 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `question_category_id`, `level`, `active`, `date_created`, `date_updated`) VALUES
(1, 'Why Should I Hire You?', 3, 'E', 'Y', '2015-06-23 16:00:46', NULL),
(2, 'Tell Me About Yourself ?', 3, 'H', 'Y', '2015-06-23 16:09:23', '2015-06-23 16:27:17'),
(3, 'What is PHP ?', 1, 'E', 'Y', '2015-06-23 16:28:21', NULL),
(4, 'Is multiple inheritance supported in PHP?', 1, 'M', 'Y', '2015-06-23 17:01:37', NULL),
(5, 'What is the difference between primary key, unique key and foreign key in mysql table ?', 2, 'E', 'Y', '2015-06-24 02:04:47', '2015-06-24 02:11:43'),
(6, 'How can I change column `gender` value male to female and female to male in my database table `user` using single query?', 2, 'M', 'Y', '2015-06-24 02:36:47', '2015-06-24 02:43:28'),
(7, 'Difference between TRUNCATE, DELETE and DROP commands ?', 2, 'M', 'Y', '2015-06-24 06:01:14', NULL),
(8, 'What is difference between array_combine and array_merge in PHP?', 1, 'E', 'Y', '2015-06-24 09:44:34', '2015-06-24 09:45:18'),
(9, 'what is the use of array_count_values() ?>', 1, 'E', 'Y', '2015-06-24 10:01:46', '2015-06-24 10:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `questions_answer`
--

CREATE TABLE IF NOT EXISTS `questions_answer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `questions_id` int(10) unsigned NOT NULL,
  `answer` text NOT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'N',
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=10 ;

--
-- Dumping data for table `questions_answer`
--

INSERT INTO `questions_answer` (`id`, `questions_id`, `answer`, `active`, `date_created`, `date_updated`) VALUES
(1, 1, '<p>The most overlooked question is also the one most candidates are unprepared to answer. This is often because job applicants don''t do their homework on the position. Your job is to illustrate why you are the most qualified candidate. Review the job description and qualifications very closely to identify the skills and knowledge that are critical to the position, then identify experiences from your past that demonstrate those skills and knowledge.</p>', 'Y', '2015-06-23 16:01:08', NULL),
(2, 2, '<p>People tend to meander through their whole resumes and mention personal or irrelevant information in answering--a serious no-no. Keep your answer to a minute or two at most. Cover four topics: early years, education, work history, and recent career experience. Emphasize this last subject. Remember that this is likely to be a warm-up question. Don''t waste your best points on it. And keep it clean--??no weekend activities should be mentioned.</p>', 'Y', '2015-06-23 16:10:23', NULL),
(3, 3, '<p><strong>PHP</strong> is a programming language for building dynamic website. <br />PHP stand for : <strong>HyperText PreProcessor</strong>. <br />The core purpose of it &ldquo;to Process information and produce hypertext(HTML) as a result&rdquo;.</p>', 'Y', '2015-06-23 16:35:36', NULL),
(4, 4, '<p>PHP includes only single inheritance, it means that a class can be extended from only one single class using the keyword &lsquo;extended&rsquo;.</p>', 'Y', '2015-06-23 17:02:23', NULL),
(5, 5, '<p><strong>Primary Key</strong> :</p>\r\n<ul>\r\n<li>Primary key uniquely identify a row or record in the table.</li>\r\n<li>Primary Key can''t accept null values.</li>\r\n<li>A table can have only one PRIMARY KEY Column[s]</li>\r\n</ul>\r\n<p><strong>Unique Key</strong> :</p>\r\n<ul>\r\n<li>Unique key uniquely identify each row in the table.</li>\r\n<li>Unique key can accept only one null value</li>\r\n<li>we can have more than one unique key.</li>\r\n</ul>\r\n<p><strong>Foreign Key</strong> :</p>\r\n<ul>\r\n<li>A foreign Key is an attribute or combination of attributes in relation whose value matches a primary key in another relation.</li>\r\n<li>Foreign key can accept multiple null value</li>\r\n<li>We can have more than one foreign key in a table.</li>\r\n</ul>', 'Y', '2015-06-24 02:27:32', NULL),
(6, 6, '<p><span style="color: #0000ff;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><strong>UPDATE</strong></span></span></span> <span style="color: #000080;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><strong>user</strong></span></span></span> <span style="color: #0000ff;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><strong>SET</strong></span></span></span> <span style="color: #808000;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><span style="font-weight: normal;">gender</span></span></span></span> <span style="color: #0000ff;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><span style="font-weight: normal;">=</span></span></span></span> <span style="color: #0000ff;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><span style="font-weight: normal;">(</span></span></span></span><span style="color: #000080;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><strong>CASE</strong></span></span></span> <span style="color: #808000;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><span style="font-weight: normal;">gender</span></span></span></span> <span style="color: #000080;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><strong>WHEN</strong></span></span></span> <span style="color: #008000;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><span style="font-weight: normal;">''male''</span></span></span></span> <span style="color: #0000ff;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><strong>THEN</strong></span></span></span> <span style="color: #008000;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><span style="font-weight: normal;">''female''</span></span></span></span> <span style="color: #000080;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><strong>WHEN</strong></span></span></span> <span style="color: #008000;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><span style="font-weight: normal;">''female''</span></span></span></span> <span style="color: #0000ff;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><strong>THEN</strong></span></span></span> <span style="color: #008000;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><span style="font-weight: normal;">''male''</span></span></span></span> <span style="color: #0000ff;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><strong>ELSE</strong></span></span></span> <span style="color: #808000;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><span style="font-weight: normal;">gender</span></span></span></span> <span style="color: #0000ff;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><strong>END</strong></span></span></span><span style="color: #0000ff;"><span style="font-family: Courier New,serif;"><span style="font-size: small;"><span style="font-weight: normal;">);</span></span></span></span></p>', 'Y', '2015-06-24 02:41:36', '2015-06-24 04:34:03'),
(7, 7, '<h3>Delete</h3>\r\n<p>The DELETE command is used to remove rows from a table. A WHERE clause can be used to only remove some rows. If no WHERE condition is specified, all rows will be removed. After performing a DELETE operation you need to COMMIT or ROLLBACK the transaction to make the change permanent or to undo it. Note that this operation will cause all DELETE triggers on the table to fire.</p>\r\n<h3>TRUNCATE</h3>\r\n<p>TRUNCATE removes all rows from a table. The operation cannot be rolled back and no triggers will be fired. As such, TRUCATE is faster and doesn''t use as much undo space as a DELETE.</p>\r\n<h3>DROP</h3>\r\n<p>The DROP command removes a table from the database. All the tables'' rows, indexes and privileges will also be removed. No DML triggers will be fired. The operation cannot be rolled back.</p>\r\n<p><code><em>DROP and TRUNCATE are DDL commands, whereas DELETE is a DML command. Therefore DELETE operations can be rolled back (undone), while DROP and TRUNCATE operations cannot be rolled back.</em></code></p>', 'Y', '2015-06-24 06:23:43', '2015-06-24 06:35:50'),
(8, 8, '<p><strong>array_combine()</strong> :- Creates an array by using one array for keys and another for its values<br /><code>array <span style="color: #0000ff;">array_combine</span> ( array $keys , array $values )</code></p>\r\n<p><strong>array_merge</strong>() :- Merge one or more arrays<br /><code>array <span style="color: #0000ff;">array_merge</span> ( array $array1 , array $array2, array[.... ] )</code></p>', 'Y', '2015-06-24 09:52:02', '2015-06-24 10:08:05'),
(9, 9, '<p><em><code>array <span style="color: #0000ff;">array_count_values</span> ( array $array )</code> </em><br /><strong>array_count_values()</strong> :- returns an array using the values of array as keys and their frequency in array as values.</p>', 'Y', '2015-06-24 10:03:35', '2015-06-24 10:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `question_category`
--

CREATE TABLE IF NOT EXISTS `question_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `link` (`link`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=8 ;

--
-- Dumping data for table `question_category`
--

INSERT INTO `question_category` (`id`, `name`, `link`, `date_created`, `date_updated`) VALUES
(1, 'PHP Interview', 'php_interview', '2015-06-23 14:32:46', NULL),
(2, 'DBMS, MySQL Interview', 'dbms_mysql_Interview', '2015-06-23 14:33:07', NULL),
(3, 'HR Interview', 'hr_interview', '2015-06-23 14:33:22', NULL),
(4, 'HTML, CSS Interview', 'html_css_Interview', '2015-06-23 14:33:39', NULL),
(5, 'JS, AngularJS, JQuery Interview', 'js_angularJS_jQuery_interview', '2015-06-23 14:33:55', '2015-06-23 14:35:39'),
(6, 'NoSQL, MongoDB Interview', 'nosql_mongodb_interview', '2015-06-23 14:34:38', NULL),
(7, 'Quantitative & Reasoning', 'quantitative_and_reasoning', '2015-06-23 14:35:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `img`, `role`, `active`) VALUES
(1, 'vnyscn', '1ba12fe09bca323b5eae753fa63bdcb8c5bec96ad00d92a2357c7f58940df21c', 'Vinay Singh Sachan', 'https://pbs.twimg.com/profile_images/3215159954/78c24061158d7e211215d504aff45a47_normal.jpeg', 'ADMIN', 'Y'),
(2, 'vinay', '1ba12fe09bca323b5eae753fa63bdcb8c5bec96ad00d92a2357c7f58940df21c', 'Admin', 'https://pbs.twimg.com/profile_images/3215159954/78c24061158d7e211215d504aff45a47_normal.jpeg', 'BLOGUSER', 'Y'),
(3, 'mukesh', '1ba12fe09bca323b5eae753fa63bdcb8c5bec96ad00d92a2357c7f58940df21c', 'Mukesh', 'https://pbs.twimg.com/profile_images/3215159954/78c24061158d7e211215d504aff45a47_normal.jpeg', 'BLOGUSER', 'Y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
