SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Table structure for table `auth_keys`
--

CREATE TABLE IF NOT EXISTS `auth_keys` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('cookie','reset') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'reset',
  `created` datetime NOT NULL,
  `expire` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `one_key_per_type` (`user_id`,`type`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

