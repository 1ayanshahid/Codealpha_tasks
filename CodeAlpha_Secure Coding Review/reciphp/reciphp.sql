-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2011 at 02:31 PM
-- Server version: 5.1.56
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reciphp_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `date` date NOT NULL,
  `poster` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `recipeid` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`commentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `date` date NOT NULL,
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `article` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`date`, `title`, `article`) VALUES
('2011-05-28', 'Welcome', 'Welcome to the demo!');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
  `recipeid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `catergory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `poster` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `shortdesc` text COLLATE utf8_unicode_ci NOT NULL,
  `ingredients` text COLLATE utf8_unicode_ci NOT NULL,
  `directions` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`recipeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipeid`, `title`, `catergory`, `poster`, `shortdesc`, `ingredients`, `directions`) VALUES
(3, '		 Creamy Asparagus Pasta with Sun-Dried Tomatoes', '', 'r0ck', 'A simple shortcut gives this pasta its delectable creaminess: a package of garlic-and-herb-flavored spreadable cheese. It melts into the pasta, generously coating each piece. You can substitute any seasonal vegetables for the asparagus.', '8 oz. farfalle (bow-tie pasta)\r\n2 cups diagonally sliced thin asparagus (1 inch)\r\n1 (5.2- to 6.5-oz.) pkg. garlic and herb spreadable cheese, such as Boursin\r\n3/4 cup drained sliced oil-packed sun-dried tomatoes\r\n1/2 cup grated Parmesan cheese\r\n1/2 cup white wine or lower-sodium chicken or vegetable broth\r\n1 teaspoon chopped fresh thyme\r\n1/2 teaspoon pepper', '1. Cook pasta according to package directions, adding asparagus during last minute of cooking; drain. Return pasta and asparagus to pot.\r\n\r\n2. Stir in spreadable cheese until melted and smooth. Stir in all remaining ingredients.\r\n\r\n4 (1 1/2-cup) servings\r\n\r\nPER SERVING: 480 calories, 18.5 g total fat (9.5 g saturated fat), 19.5 g protein, 59 g carbohydrate, 45 mg cholesterol, 930 mg sodium, 5.5 g fiber');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` char(8) COLLATE utf8_unicode_ci NOT NULL COMMENT 'primary key',
  `password` char(41) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

