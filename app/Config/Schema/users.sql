SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','guest') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
