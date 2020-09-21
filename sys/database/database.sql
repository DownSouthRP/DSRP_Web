CREATE TABLE `accountactivity` (
  `id` int(50) NOT NULL,
  `account` varchar(20) DEFAULT NULL,
  `activityDetails` varchar(500) DEFAULT NULL,
  `activityDateTime` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `appactivity` (
  `id` int(20) NOT NULL,
  `app` varchar(50) DEFAULT NULL,
  `detail` varchar(500) DEFAULT NULL,
  `dateTime` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `appUser` int(20) DEFAULT NULL,
  `appAgree` varchar(5) DEFAULT NULL,
  `appStatus` varchar(100) DEFAULT NULL,
  `appDateTime` varchar(50) DEFAULT NULL,
  `appMonth` varchar(20) DEFAULT NULL,
  `appYear` varchar(10) DEFAULT NULL,
  `appDeniedReasons` varchar(1000) DEFAULT NULL,
  `appNotes` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `dsrpinfo` (
  `id` int(20) NOT NULL,
  `appStatus` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `systemlogs` (
  `id` int(50) NOT NULL,
  `systemLogDateTime` varchar(20) DEFAULT NULL,
  `systemLogName` varchar(100) DEFAULT NULL,
  `systemLogType` varchar(100) DEFAULT NULL,
  `systemLogDetails` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tempaccounts` (
  `id` int(20) NOT NULL,
  `hash` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `displayName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `temppass` (
  `id` int(20) NOT NULL,
  `email` varchar(500) DEFAULT NULL,
  `hash` varchar(500) DEFAULT NULL,
  `r` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `accountactivity`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `appactivity`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dsrpinfo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `systemlogs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tempaccounts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `temppass`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `accountactivity`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

ALTER TABLE `accounts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

ALTER TABLE `appactivity`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `apps`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

ALTER TABLE `dsrpinfo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `systemlogs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

ALTER TABLE `tempaccounts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

ALTER TABLE `temppass`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;



-- ------------------------------------------------------------- -- 