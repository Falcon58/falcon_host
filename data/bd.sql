CREATE TABLE `users` (
	`user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`nickname` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`immunity_level` INT UNSIGNED NOT NULL,
	`registerdate` DATETIME NOT NULL,
	`registerip` CHAR(45) NOT NULL,
	`lastlogindate` DATETIME NULL,
	`lastloginip` CHAR(45) NULL,
	PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `title_posts` (
	`post_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`post_name` TEXT NOT NULL,
	`post_main` LONGTEXT NULL,
	`author_id` INT UNSIGNED NOT NULL,
	`post_date` DATETIME NOT NULL,
	PRIMARY KEY (`post_id`),
	FOREIGN KEY (`author_id`) REFERENCES `users`(`user_id`),
	FULLTEXT KEY `PT_i1` (`post_name`),
	FULLTEXT KEY `PT_i2` (`post_main`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `users_all` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`ip` CHAR(45) NOT NULL,
	`reg_date` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	KEY `ip_k1` (`ip`),
	KEY `d_k1` (`reg_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `users_today` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`ip` CHAR(45) NOT NULL,
	`reg_date` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	KEY `d_k2` (`reg_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;