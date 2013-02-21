DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `active` binary(1) NOT NULL DEFAULT '0',
  `board` binary(1) NOT NULL DEFAULT '0',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `company` text,
  `city` varchar(50) DEFAULT NULL,
  `address` text,
  `state` varchar(2) NOT NULL DEFAULT 'IN',
  `zip` varchar(10) DEFAULT NULL,
  `office_phone` varchar(20) DEFAULT NULL,
  `cell_phone` varchar(20) DEFAULT NULL,
  `email` text,
  `officer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
