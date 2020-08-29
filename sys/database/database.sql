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

-- CREATES accountActivity TABLE
CREATE TABLE `accountActivity` (
	`id` INT(50) NOT NULL AUTO_INCREMENT,
	`activityDetails` VARCHAR(500),
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
	`appSubmittion` VARCHAR(50),
	PRIMARY KEY (`id`)
);

--