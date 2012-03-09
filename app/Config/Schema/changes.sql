# 2012-3-8 
#Adding donor role to users
ALTER TABLE  `users` CHANGE  `role`  `role` ENUM(  'admin',  'guest',  'donor' ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT  'admin';
# Adding active/inactive to user account
ALTER TABLE  `users` ADD  `active` BOOLEAN NOT NULL AFTER  `password`
UPDATE  `donate`.`users` SET  `active` =  '1' 
# Adding default guest user
INSERT INTO `donate`.`users` (`id`, `role`, `username`, `password`, `active`, `created`, `modified`) 
VALUES (UUID(), 'guest', 'guest', '', '1', NOW(), NOW());
# Adding AuthKeys
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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


