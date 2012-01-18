-- phpMyAdmin SQL Dump
-- version 3.3.7deb6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2012 at 01:27 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-7+squeeze3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `actionaidindia_donate`
--

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` char(36) NOT NULL,
  `name` varchar(64) NOT NULL,
  `code` char(5) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `code`, `created`, `modified`) VALUES
('c4bc2834-40e0-11e1-b25e-0016d4537e6c', 'Andhra Pradesh', 'IN-AP', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc2b18-40e0-11e1-b25e-0016d4537e6c', 'Arunachal Pradesh', 'IN-AR', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc2c08-40e0-11e1-b25e-0016d4537e6c', 'Assam', 'IN-AS', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc2cd0-40e0-11e1-b25e-0016d4537e6c', 'Bihar', 'IN-BR', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc2d98-40e0-11e1-b25e-0016d4537e6c', 'Chhattisgarh', 'IN-CT', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc2e60-40e0-11e1-b25e-0016d4537e6c', 'Goa', 'IN-GA', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc2f1e-40e0-11e1-b25e-0016d4537e6c', 'Gujarat', 'IN-GJ', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc2fdc-40e0-11e1-b25e-0016d4537e6c', 'Haryana', 'IN-HR', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc31c6-40e0-11e1-b25e-0016d4537e6c', 'Himachal Pradesh', 'IN-HP', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc32a2-40e0-11e1-b25e-0016d4537e6c', 'Jammu and Kashmir', 'IN-JK', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc336a-40e0-11e1-b25e-0016d4537e6c', 'Jharkhand', 'IN-JH', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc3432-40e0-11e1-b25e-0016d4537e6c', 'Karnataka', 'IN-KA', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc3504-40e0-11e1-b25e-0016d4537e6c', 'Kerala', 'IN-KL', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc35cc-40e0-11e1-b25e-0016d4537e6c', 'Madhya Pradesh', 'IN-MP', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc3694-40e0-11e1-b25e-0016d4537e6c', 'Maharashtra', 'IN-MH', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc375c-40e0-11e1-b25e-0016d4537e6c', 'Manipur', 'IN-MN', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc3838-40e0-11e1-b25e-0016d4537e6c', 'Meghalaya', 'IN-ML', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc38f6-40e0-11e1-b25e-0016d4537e6c', 'Mizoram', 'IN-MZ', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc39c8-40e0-11e1-b25e-0016d4537e6c', 'Nagaland', 'IN-NL', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc3f2c-40e0-11e1-b25e-0016d4537e6c', 'Orissa', 'IN-OR', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc3ffe-40e0-11e1-b25e-0016d4537e6c', 'Punjab', 'IN-PB', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc40d0-40e0-11e1-b25e-0016d4537e6c', 'Rajasthan', 'IN-RJ', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc4198-40e0-11e1-b25e-0016d4537e6c', 'Sikkim', 'IN-SK', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc424c-40e0-11e1-b25e-0016d4537e6c', 'Tamil Nadu', 'IN-TN', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc430a-40e0-11e1-b25e-0016d4537e6c', 'Tripura', 'IN-TR', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc43be-40e0-11e1-b25e-0016d4537e6c', 'Uttarakhand', 'IN-UT', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc4472-40e0-11e1-b25e-0016d4537e6c', 'Uttar Pradesh', 'IN-UP', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc4544-40e0-11e1-b25e-0016d4537e6c', 'West Bengal', 'IN-WB', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc4684-40e0-11e1-b25e-0016d4537e6c', 'Andaman and Nicobar Islands', 'IN-AN', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc4742-40e0-11e1-b25e-0016d4537e6c', 'Chandigarh', 'IN-CH', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc4800-40e0-11e1-b25e-0016d4537e6c', 'Dadra and Nagar Haveli', 'IN-DN', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc48c8-40e0-11e1-b25e-0016d4537e6c', 'Daman and Diu', 'IN-DD', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc4990-40e0-11e1-b25e-0016d4537e6c', 'Delhi', 'IN-DL', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc4a58-40e0-11e1-b25e-0016d4537e6c', 'Lakshadweep', 'IN-LD', '2012-01-17 13:26:31', '2012-01-17 13:26:31'),
('c4bc4b16-40e0-11e1-b25e-0016d4537e6c', 'Pondicherry (Puducherry)', 'IN-PY', '2012-01-17 13:26:31', '2012-01-17 13:26:31');
