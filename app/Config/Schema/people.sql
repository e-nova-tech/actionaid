SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` char(36) NOT NULL,
  `title` enum('Ms','Mrs','Mr','Dr','Prof') NOT NULL,
  `dob` date NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `address1` varchar(128) NOT NULL,
  `address2` varchar(128) DEFAULT NULL,
  `city` varchar(128) NOT NULL,
  `pincode` char(6) NOT NULL,
  `state` char(5) NOT NULL COMMENT 'ISO 3266-2',
  `country` char(2) NOT NULL DEFAULT 'IN' COMMENT '3166-1 alpha-2',
  `email` varchar(128) NOT NULL,
  `pan` char(10) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

