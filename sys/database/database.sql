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
	-- SYSTEM PERMISSIONS
	`headAdmimistration` VARCHAR(5),
	`communityManager` VARCHAR(5),
	`seniorAdministration` VARCHAR(5),
	`adminitration` VARCHAR(5),
	`jrAdministration` VARCHAR(5),
	`seniorStaff` VARCHAR(5),
	`staff` VARCHAR(5),
	`jrStaff` VARCHAR(5),
	`member` VARCHAR(5),
	-- FTO PREMISSIONS
	`ftoDirector` VARCHAR(5),
	`ftoSupervisor` VARCHAR(5),
	`ftoLead` VARCHAR(5),
	`ftoEvaluator` VARCHAR(5),
	`fto` VARCHAR(5),
	`fta` VARCHAR(5),
	`retiredFTO` VARCHAR(5),
	-- 
	PRIMARY KEY (`id`)
);

-- 