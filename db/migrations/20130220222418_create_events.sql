DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `active` binary(1) NOT NULL DEFAULT '0',
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `title` text NOT NULL,
  `location` text NOT NULL,
  `description` text,
  `address` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
