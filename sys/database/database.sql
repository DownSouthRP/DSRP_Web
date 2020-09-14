-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 06:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `downsouthrp_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountactivity`
--

CREATE TABLE `accountactivity` (
  `id` int(50) NOT NULL,
  `account` varchar(20) DEFAULT NULL,
  `activityDetails` varchar(500) DEFAULT NULL,
  `activityDateTime` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------- 

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(20) NOT NULL,
  `displayName` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `communityRank` varchar(100) DEFAULT NULL,
  `profileBanner` varchar(500) DEFAULT NULL,
  `recruitmentRank` varchar(50) DEFAULT NULL,
  `permissionRank` varchar(50) DEFAULT NULL,
  `discordID` varchar(50) DEFAULT NULL,
  `steamID` varchar(50) DEFAULT NULL,
  `teamspeakID` varchar(50) DEFAULT NULL,
  `communityTitle` varchar(50) DEFAULT NULL,
  `whitelisted` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `displayName`, `email`, `password`, `communityRank`, `profileBanner`, `recruitmentRank`, `permissionRank`, `discordID`, `steamID`, `teamspeakID`, `communityTitle`, `whitelisted`) VALUES
(1, 'Anderson B.', 'andersonbrown833@gmail.com', '$2y$10$y2sEAp6Zm2fu80Abd7iN3.8JS5z5mzhe3FkPj931ayWnUw74xbhYG', 'Development Coordinator', 'https://cdn.discordapp.com/attachments/712047946438541385/712048036809015396/anderson_blue.png', 'Department Director', 'Core Administration', '595362070153658369', 'steam:11000013c786c7e', 'jIitoR9lBdPnbJR+DzJmgUnn65E=', NULL, 'FALSE'),
(6, 'AndyBrown833', 'andersonbrown83@gmail.com', '$2y$10$rV2Ula6fvpIDXimqVLEFKeFKms8Ykn0NDYeADUh/5q5h5w1CZYteW', 'DSRP Developer', NULL, NULL, NULL, '', '', '', '', NULL),
(7, 'Braden B. 1A-2', 'Bradenbe11@yahoo.com', '$2y$10$kUimhjTY5EdW5x2U.EmLzOQ7dL.luQPCExBB5pyegckzS0J1THFMS', NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(8, 'Ryan D. 1A-3', 'duffinryan117@gmail.com', '$2y$10$xBCObtLFsdg7anBAQRrnEe4HucuaobFtTPDNrDZhNxSaBYz/LepXm', NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(9, 'Jay L. 1A-1', 'kokorocks37@gmail.com', '$2y$10$Kj19ZIS82yu8SA6wZxN.ZuhM4KRipFf3Df71JUQahHGcvnb9jnd06', 'Applicant', NULL, NULL, 'Applicant', NULL, NULL, NULL, NULL, NULL),
(10, 'Gavin R.', 'Spraqo@gmail.com', '$2y$10$KUSVG7i84sUHHHvjYkq23ucX.C0t4GJOwG5kK2FynGxmlIJrQRRvu', 'Development Supervisor', NULL, NULL, 'Staff', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appactivity`
--

CREATE TABLE `appactivity` (
  `id` int(20) NOT NULL,
  `app` varchar(50) DEFAULT NULL,
  `detail` varchar(500) DEFAULT NULL,
  `dateTime` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appactivity`
--

INSERT INTO `appactivity` (`id`, `app`, `detail`, `dateTime`) VALUES
(1, '', 'Application Created & Submitted', NULL),
(2, '', 'Application Created & Submitted', NULL),
(3, '10', 'Application Created & Submitted', NULL),
(4, '11', 'Application Created & Submitted', '2020-08-29 @ 00:00:00'),
(5, '13', 'Application Created & Submitted', '2020-08-30 @ 01:18:1515');

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `appDept` varchar(100) DEFAULT NULL,
  `appQ1` varchar(1000) DEFAULT NULL,
  `appQ3` varchar(1000) DEFAULT NULL,
  `appQ2` varchar(1000) DEFAULT NULL,
  `appQ4` varchar(1000) DEFAULT NULL,
  `appQ5` varchar(1000) DEFAULT NULL,
  `appUser` varchar(20) DEFAULT NULL,
  `appAgree` varchar(5) DEFAULT NULL,
  `appStatus` varchar(50) DEFAULT NULL,
  `appDateTime` varchar(20) DEFAULT NULL,
  `appMonth` varchar(20) DEFAULT NULL,
  `appYear` varchar(10) DEFAULT NULL,
  `appDeniedReasons` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `name`, `dob`, `age`, `email`, `appDept`, `appQ1`, `appQ3`, `appQ2`, `appQ4`, `appQ5`, `appUser`, `appAgree`, `appStatus`, `appDateTime`, `appMonth`, `appYear`, `appDeniedReasons`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', NULL, 'on', NULL, NULL, NULL, NULL, NULL),
(2, '', '', '', '', '', '', '', '', '', '', NULL, 'on', NULL, NULL, NULL, NULL, NULL),
(3, '', '', '', '', '', '', '', '', '', '', NULL, 'on', NULL, NULL, NULL, NULL, NULL),
(4, '', '', '', '', '', '', '', '', '', '', NULL, 'on', NULL, NULL, NULL, NULL, NULL),
(5, '', '', '', '', '', '', '', '', '', '', NULL, 'on', NULL, NULL, NULL, NULL, NULL),
(6, 'Anderson B.', '2020-08-07', '19', 'andersonbrown833@gmail.com', 'San Andreas Fire Department', 'What interests you about DownSouthRP?', 'Have you ever been a part of any FiveM communities before? If so, which ones?', 'Have you had any roleplay experience? If so, what?', 'In your own words, what is the definition of “true” roleplay?', 'Please give an example of a basic scenario. Either as a Civilian, LEO, or Firefighter.', NULL, 'on', 'Application Accepted', NULL, NULL, NULL, NULL),
(7, 'Anderson B.', '2020-08-05', '19', 'andersonbrown833@gmail.com', 'Civilian Operations', '-', '-', '-', '-', '-', NULL, 'on', 'Application Denied', '2020-08-29 @ 00:55', NULL, NULL, '- Incomplete Answers<br>\r\n- Lack of Effort<br>\r\n- Lack of Detail'),
(8, 'Anderson B.', '2020-07-30', '19', 'andersonbrown833@gmail.com', 'Civilian Operations', 'What interests you about DownSouthRP?', 'Have you ever been a part of any FiveM communities before? If so, which ones?', 'Have you had any roleplay experience? If so, what?', 'In your own words, what is the definition of “true” roleplay?', 'Please give an example of a basic scenario. Either as a Civilian, LEO, or Firefighter.', NULL, 'on', 'Application Submitted - Pending Review', '2020-08-30 @ 00:38:0', NULL, NULL, NULL),
(9, 'Anderson B.', '2020-07-30', '19', 'andersonbrown833@gmail.com', 'Civilian Operations', 'What interests you about DownSouthRP?', 'Have you ever been a part of any FiveM communities before? If so, which ones?', '\r\nHave you had any roleplay experience? If so, what?', 'In your own words, what is the definition of “true” roleplay?', 'Please give an example of a basic scenario. Either as a Civilian, LEO, or Firefighter.', NULL, 'on', 'Application Submitted - Pending Review', '2020-08-30 @ 00:41:4', NULL, NULL, NULL),
(10, 'Anderson B.', '2020-07-30', '19', 'andersonbrown833@gmail.com', 'Civilian Operations', 'What interests you about DownSouthRP?', 'Have you ever been a part of any FiveM communities before? If so, which ones?', '\r\nHave you had any roleplay experience? If so, what?', 'In your own words, what is the definition of “true” roleplay?', 'Please give an example of a basic scenario. Either as a Civilian, LEO, or Firefighter.', NULL, 'on', 'Application Submitted - Pending Review', '2020-08-30 @ 00:42:2', NULL, NULL, NULL),
(11, 'Anderson B.', '2020-08-13', '19', 'andersonbrown833@gmail.com', 'Los Santos Police Departemnt', '-', '-', '-', '-', '-', NULL, 'on', 'Application Submitted - Pending Review', '2020-08-30 @ 00:50:2', NULL, NULL, NULL),
(12, 'Anderson B.', '2020-08-06', '19', 'andersonbrown833@gmail.com', 'San Andreas Fire Department', '-', '-', '-', '-', '-', NULL, 'on', 'Application Submitted - Pending Review', '2020-08-30 @ 01:17:4', '0808', NULL, NULL),
(13, 'Anderson B.', '2020-08-06', '19', 'andersonbrown833@gmail.com', 'San Andreas Fire Department', '-', '-', '-', '-', '-', NULL, 'on', 'Application Submitted - Pending Review', '2020-08-30 @ 01:18:1', '08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dsrpinfo`
--

CREATE TABLE `dsrpinfo` (
  `id` int(20) NOT NULL,
  `appStatus` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsrpinfo`
--

INSERT INTO `dsrpinfo` (`id`, `appStatus`) VALUES
(1, 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `systemlogs`
--

CREATE TABLE `systemlogs` (
  `id` int(50) NOT NULL,
  `systemLogDateTime` varchar(20) DEFAULT NULL,
  `systemLogName` varchar(100) DEFAULT NULL,
  `systemLogType` varchar(100) DEFAULT NULL,
  `systemLogDetails` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `systemlogs`
--

INSERT INTO `systemlogs` (`id`, `systemLogDateTime`, `systemLogName`, `systemLogType`, `systemLogDetails`) VALUES
(1, '1598514550', 'Email Address Changed', 'settingUpdate', 'Anderson B. has updated their email address to andersonbrown833@gmail.com'),
(2, '1598514552', 'Email Address Changed', 'settingUpdate', 'Anderson B. has updated their email address to andy@gmail.com'),
(3, '1598514656', 'Email Address Changed', 'settingUpdate', 'Anderson B. has updated their email address to andersonbrown833@gmail.com'),
(4, '09:55:02', 'Email Address Changed', 'settingUpdate', 'Anderson B. has updated their email address to andy@gmail.com'),
(5, '09:55:05', 'Email Address Changed', 'settingUpdate', 'Anderson B. has updated their email address to andersonbrown833@gmail.com'),
(6, '09:55:07', 'Email Address Changed', 'settingUpdate', 'Anderson B. has updated their email address to andy@gmail.com'),
(7, '09:58:14', 'Display Name Changed', 'settingUpdate', 'Anderson B. has changed their account password.'),
(8, '09:58:16', 'Display Name Changed', 'settingUpdate', 'Andy has changed their account password.'),
(9, '10:57:42', 'Email Address Changed', 'settingUpdate', 'Anderson B. has updated their email address to andersonbrown833@gmail.com'),
(10, '10:57:50', 'Account Password Changed', 'settingUpdate', 'Anderson B. has changed their account password.'),
(11, '11:28:22', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(12, '11:29:15', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(13, '11:56:14', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(14, '11:57:53', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(15, '11:58:24', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(16, '12:00:25', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(17, '00:55:14', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(18, '20:00:12', 'Account Password Changed', 'settingUpdate', 'Anderson B. has changed their account password.'),
(19, '00:38:05', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(20, '00:41:43', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(21, '00:42:21', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(22, '00:50:28', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(23, '01:17:45', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(24, '01:18:15', 'Application Submitted', 'appSubmittion', 'Anderson B. sent in an application'),
(25, '05:32:43', 'Display Name Changed', 'settingUpdate', 'Anderson B. has changed their account password.'),
(26, '05:33:00', 'Display Name Changed', 'settingUpdate', 'Andy has changed their account password.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountactivity`
--
ALTER TABLE `accountactivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appactivity`
--
ALTER TABLE `appactivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsrpinfo`
--
ALTER TABLE `dsrpinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemlogs`
--
ALTER TABLE `systemlogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountactivity`
--
ALTER TABLE `accountactivity`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `appactivity`
--
ALTER TABLE `appactivity`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dsrpinfo`
--
ALTER TABLE `dsrpinfo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `systemlogs`
--
ALTER TABLE `systemlogs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




-- 
-- 
-- 
-- 
-- 


CREATE TABLE `tempAccounts` (
	`id` INT(20) NOT NULL AUTO_INCREMENT,
	`hash` INT(100),
	`email` INT,
	`password` INT,
	`displayName` INT,
	PRIMARY KEY (`id`)
);


CREATE TABLE `temppass` (
	`id` INT(20) NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(100),
	`hash` VARCHAR(100),
	`return` VARCHAR(100),
	PRIMARY KEY (`id`)
);