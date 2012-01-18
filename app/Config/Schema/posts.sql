-- phpMyAdmin SQL Dump
-- version 3.3.7deb6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2012 at 08:04 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-7+squeeze3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `actionaidindia_donate`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `serial` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`serial`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `serial`, `title`, `body`, `slug`, `created`, `modified`) VALUES
('7e3ba126-41e1-11e1-aaed-0016d4537e6c', 1, 'The title', 'This is the post body.', 'the-title', '2012-01-03 14:00:34', '2012-01-17 18:34:45'),
('7e4eb586-41e1-11e1-aaed-0016d4537e6c', 2, 'A title once again', 'And the post body follows.', 'a-title-once-again', '2012-01-03 14:00:34', '2012-01-18 20:01:49'),
('7e503974-41e1-11e1-aaed-0016d4537e6c', 3, 'Title strikes back', 'This is really exciting! Not.', 'title-strike-back', '2012-01-03 14:00:34', '2012-01-18 20:01:49');

