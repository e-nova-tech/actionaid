SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` char(36) CHARACTER SET utf8 NOT NULL,
  `parent_id` char(36) CHARACTER SET utf8 NOT NULL,
  `gift_id` char(36) CHARACTER SET utf8 NOT NULL,
  `gateway_id` char(36) CHARACTER SET utf8 NOT NULL,
  `batch_id` char(36) CHARACTER SET utf8 DEFAULT NULL,
  `serial` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('request','response') CHARACTER SET utf8 NOT NULL,
  `status` enum('success','error') CHARACTER SET utf8 NOT NULL,
  `status_code` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_by` char(36) CHARACTER SET utf8 DEFAULT NULL,
  `modified` datetime NOT NULL,
  `modified_by` char(36) CHARACTER SET utf8 DEFAULT NULL,
  `IP` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`serial`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

