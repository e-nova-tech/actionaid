
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `appeals`
--

CREATE TABLE IF NOT EXISTS `appeals` (
  `id` char(36) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(128) NOT NULL,
  `slug` varchar(64) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Default data for table `appeals`
--

INSERT INTO `appeals` (`id`, `name`, `description`, `slug`, `created`, `modified`) VALUES
('45a4a3bc-40fb-11e1-b25e-0016d4537e6c', 'Default', 'Default / generic form, suitable for any purpose', 'default', '2012-01-17 16:36:14', '2012-01-17 16:36:14')
;
