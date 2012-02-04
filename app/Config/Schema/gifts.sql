SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Table structure for table `gifts`
--

CREATE TABLE IF NOT EXISTS `gifts` (
  `id` char(36) NOT NULL,
  `serial` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(10) unsigned NOT NULL,
  `currency` char(3) NOT NULL DEFAULT 'INR' COMMENT 'ISO 4217',
  `status` enum('pending','success','failure') NOT NULL DEFAULT 'pending',
  `statuscode` varchar(16) DEFAULT NULL,
  `person_id` char(36) NOT NULL,
  `appeal_id` char(36) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`serial`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

