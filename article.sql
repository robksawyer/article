-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2012 at 09:03 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `article`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `state` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `zip` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `employer` varchar(255) DEFAULT NULL,
  `employment_status` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` VALUES(1, 'Minh Uong', '', 'minhu123@gmail.com', 'http://www.minhsart.com/', 'http://www.linkedin.com/pub/minh-uong/7/159/112', '', '(845) 480-0987', '', '', '', '', 'New York Times', '', 'Art Director', '2012-05-15 08:00:30', '2012-05-15 08:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `media_types`
--

CREATE TABLE `media_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `media_types`
--

INSERT INTO `media_types` VALUES(1, 'Chalk', '2012-05-15 06:01:58', '2012-05-15 06:01:58');
INSERT INTO `media_types` VALUES(2, 'Charcoal (soft)', '2012-05-15 06:02:16', '2012-05-15 06:02:16');
INSERT INTO `media_types` VALUES(3, 'Charcoal (hard)', '2012-05-15 06:02:40', '2012-05-15 06:02:40');
INSERT INTO `media_types` VALUES(4, 'ContÃ©', '2012-05-15 06:08:18', '2012-05-15 06:08:18');
INSERT INTO `media_types` VALUES(5, 'Crayon', '2012-05-15 06:08:24', '2012-05-15 06:08:24');
INSERT INTO `media_types` VALUES(6, 'Graphite', '2012-05-15 06:08:32', '2012-05-15 06:08:32');
INSERT INTO `media_types` VALUES(7, 'Digital', '2012-05-15 06:08:36', '2012-05-15 06:08:36');
INSERT INTO `media_types` VALUES(8, 'Human finger', '2012-05-15 06:08:44', '2012-05-15 06:08:44');
INSERT INTO `media_types` VALUES(9, 'Marker', '2012-05-15 06:08:50', '2012-05-15 06:08:50');
INSERT INTO `media_types` VALUES(10, 'Pastel', '2012-05-15 06:08:52', '2012-05-15 06:08:52');
INSERT INTO `media_types` VALUES(11, 'Pen and ink', '2012-05-15 06:08:59', '2012-05-15 06:08:59');
INSERT INTO `media_types` VALUES(12, 'Watercolour', '2012-05-15 06:09:03', '2012-05-15 06:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `state` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` VALUES(1, 'New York Times', 'http://www.nytimes.com/', '', 'nytnews@nytimes.com', 'New York', 'NY', 'US', '', '2012-05-15 07:24:35', '2012-05-15 07:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `filesize` varchar(255) NOT NULL,
  `ext` varchar(10) NOT NULL,
  `group` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` VALUES(30, 'Moscow-03.jpg', '/files/uploads/works/Moscow-03.jpg', '', 'image/jpeg', 0, '83 KB', 'jpg', 'image', 'moscow-03_jpg', 1, '2012-05-15 09:50:03', '2012-05-15 09:50:03');
INSERT INTO `uploads` VALUES(31, 'Moscow-03.jpg', '/files/uploads/works/Moscow-03-1.jpg', '', 'image/jpeg', 0, '83 KB', 'jpg', 'image', 'moscow-03_jpg_1', 1, '2012-05-15 09:50:15', '2012-05-15 09:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `artist_id` int(11) NOT NULL,
  `media_type` varchar(255) DEFAULT NULL,
  `media_base` varchar(255) DEFAULT NULL,
  `publication_id` int(11) DEFAULT NULL,
  `media_type_id` int(11) DEFAULT NULL,
  `upload_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `works`
--

INSERT INTO `works` VALUES(1, 'Test ', 1, 'Something', '', 1, NULL, 30, '2012-05-15 09:50:03', '2012-05-15 09:50:03');
INSERT INTO `works` VALUES(2, 'Test ', 1, 'Something', '', 1, NULL, 31, '2012-05-15 09:50:15', '2012-05-15 09:50:15');
