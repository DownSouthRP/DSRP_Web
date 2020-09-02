-- DownSouthRP DataBase SQL--

-- CREATES DATABASE
CREATE DATABASE `downsouthrp_main`;

-- CREATES accounts TABLE
CREATE TABLE `accounts` (
	`id` INT(20) NOT NULL AUTO_INCREMENT,
	`displayName` VARCHAR(50),
	`email` VARCHAR(100),
	`password` VARCHAR(100),
	-- PROFILE INFORMATION
	`profileBanner` VARCHAR(500),
	-- COMMUNITY INFORMATION
	`communityTitle` VARCHAR(50),
	`communityRank` VARCHAR(50),
	`recruitmentRank` VARCHAR(50),
	`whitelisted` VARCHAR(5),
	-- IDENTIFIERS
	`discordID` VARCHAR(50), 
	`steamID` VARCHAR(50), 
	`teamspeakID` VARCHAR(50),
	-- LATER USAGE
	-- 
	PRIMARY KEY (`id`)
);

-- CREATES accountActivity TABLE
CREATE TABLE `accountActivity` (
	`id` INT(50) NOT NULL AUTO_INCREMENT,
	`account` VARCHAR(20),
	`activityDetails` VARCHAR(500),
	`activityDateTime` VARCHAR(500),
	PRIMARY KEY (`id`)
);

-- CREATES systemLogs TABLE
CREATE TABLE `systemLogs` (
	`id` INT(50) NOT NULL AUTO_INCREMENT,
	`systemLogTime` VARCHAR(20),
	`systemLogDate` VARCHAR(20),
	`systemLogName` VARCHAR(100),
	`systemLogType` VARCHAR(100),
	`systemLogDetails` VARCHAR(500),
	PRIMARY KEY (`id`)
);

-- CREATES dsrpInfo TABLE
CREATE TABLE `dsrpInfo` (
	`id` INT(20) NOT NULL AUTO_INCREMENT,
	`appStatus` VARCHAR(5),
	PRIMARY KEY (`id`)
);

-- CREATE apps TABLE
CREATE TABLE `apps` (
	`id` INT(20) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50),
	`dob` VARCHAR(20),
	`age` VARCHAR(10),
	`email` VARCHAR(100),
	`department` VARCHAR(100),
	`appQ1` VARCHAR(1000),
	`appQ3` VARCHAR(1000),
	`appQ2` VARCHAR(1000),
	`appQ4` VARCHAR(1000),
	`appQ5` VARCHAR(1000),
	`appAgree` VARCHAR(5),
	`appUser` VARCHAR(20),
	`appStatus` VARCHAR(50),
	`appDateTime` VARCHAR(50),
	`appMonth` VARCHAR(10),
	`appYear` VARCHAR(10),
	`appDeniedReasons` VARCHAR(500),
	PRIMARY KEY (`id`)
);

-- CREATE appActivity TABLE
CREATE TABLE `appActivity` (
	`id` INT(20) NOT NULL AUTO_INCREMENT,
	`app` VARCHAR(50),
	`detail` VARCHAR(500),
	`dateTime` VARCHAR(50),
	PRIMARY KEY (`id`)
);

--