SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','guest') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `created`, `modified`) VALUES
('4f251b92-7f10-4d1b-a395-4a5a7f000101', 'guest', 'guest', NULL, '2012-01-29 15:42:34', '2012-01-29 15:42:34');

