SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Table structure for table `gifts`
--


CREATE TABLE IF NOT EXISTS `gifts` (
  `id` char(36) CHARACTER SET utf8 NOT NULL,
  `serial` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(10) unsigned NOT NULL,
  `currency` char(3) CHARACTER SET utf8 NOT NULL DEFAULT 'INR' COMMENT 'ISO 4217',
  `status` enum('pending','success','failure') CHARACTER SET utf8 NOT NULL DEFAULT 'pending',
  `person_id` char(36) CHARACTER SET utf8 NOT NULL,
  `appeal_id` char(36) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` char(36) CHARACTER SET utf8 DEFAULT NULL,
  `modified` datetime NOT NULL,
  `modified_by` char(36) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`serial`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;
