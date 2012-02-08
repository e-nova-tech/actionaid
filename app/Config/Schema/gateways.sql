
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `actionaidindia_donate`
--

-- --------------------------------------------------------

--
-- Table structure for table `gateway`
--

CREATE TABLE IF NOT EXISTS `gateways` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `name`, `description`, `created`) VALUES
('da8426ee-5260-11e1-8d3b-0016d4537e6c', 'Billdesk', 'Billdesk Payment Gateway', '2012-02-08 19:56:13'),
('da8429dc-5260-11e1-8d3b-0016d4537e6c', 'Billdesk (Debug)', 'A test version of Billdesk', '2012-02-08 19:56:13');
