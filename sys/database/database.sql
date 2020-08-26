-- DownSouthRP DataBase SQL--

-- CREATES DATABASE
CREATE DATABASE `downsouthrp_main`;

-- CREATES accounts TABLE
CREATE TABLE `accounts` (
	`id` INT(20) NOT NULL AUTO_INCREMENT,
	`displayName` VARCHAR(50),
	`email` VARCHAR(100),
	`password` VARCHAR(100),
	-- COMMUNITY INFORMATION
	`communityRank` VARCHAR(100),
	-- PROFILE INFORMATION
	`profileBanner` VARCHAR(500),
	PRIMARY KEY (`id`)
);

-- 