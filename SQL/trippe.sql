-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8080
-- Generation Time: Nov 22, 2020 at 10:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trippe`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `avg_individual_budget`
-- (See below for the actual view)
--
CREATE TABLE `avg_individual_budget` (
`avg` double
,`tripid` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `objectid` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `seats` int(11) DEFAULT 1,
  `long` float DEFAULT NULL,
  `latt` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`objectid`, `location`, `seats`, `long`, `latt`) VALUES
(39, '717 Hill Dr, Hoffman Estates, IL 60169, USA', 2, -88.096, 42.046),
(40, 'paris', 5, NULL, NULL),
(43, '', 5, NULL, NULL),
(44, 'vancover', 2, NULL, NULL),
(45, '', 5, NULL, NULL),
(47, '', 2, NULL, NULL),
(49, '', 2, NULL, NULL),
(50, '717 Hill Dr, Hoffman Estates, IL 60169, USA', 2, -88.096, 42.046),
(51, '', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `custom_travels`
--

CREATE TABLE `custom_travels` (
  `objectid` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `location` varchar(100) NOT NULL,
  `member_id` int(11) NOT NULL,
  `long` float DEFAULT NULL,
  `latt` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_travels`
--

INSERT INTO `custom_travels` (`objectid`, `username`, `location`, `member_id`, `long`, `latt`) VALUES
(41, 'Mark', '717 Hill Dr, Hoffman Estates, IL 60169, USA', 1, -88.096, 42.046);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `objectid` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `arrivaltime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`objectid`, `priority`, `location`, `arrivaltime`) VALUES
(41, 1, 'toronto', '0000-00-00 00:00:00'),
(41, 2, 'oshawa', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `destinations_car`
--

CREATE TABLE `destinations_car` (
  `objectid` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `arrivaltime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinations_car`
--

INSERT INTO `destinations_car` (`objectid`, `priority`, `location`, `arrivaltime`) VALUES
(39, 1, 'toronto', '0000-00-00 00:00:00'),
(39, 2, 'oshawa', '0000-00-00 00:00:00'),
(43, 1, 'toronto', '0000-00-00 00:00:00'),
(43, 2, 'london', '0000-00-00 00:00:00'),
(44, 1, 'toronto', '0000-00-00 00:00:00'),
(44, 2, 'oshawa', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `fullcars`
-- (See below for the actual view)
--
CREATE TABLE `fullcars` (
`objectid` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `group_budget`
--

CREATE TABLE `group_budget` (
  `tripid` int(11) NOT NULL,
  `budget` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_budget`
--

INSERT INTO `group_budget` (`tripid`, `budget`) VALUES
(52, 10000),
(57, 2500),
(58, 2500);

-- --------------------------------------------------------

--
-- Stand-in structure for view `group_budget_trip`
-- (See below for the actual view)
--
CREATE TABLE `group_budget_trip` (
`tripid` int(11)
,`description` varchar(100)
,`value` double
);

-- --------------------------------------------------------

--
-- Table structure for table `group_entries`
--

CREATE TABLE `group_entries` (
  `entryid` int(11) NOT NULL,
  `tripid` int(11) NOT NULL,
  `value` double NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_entries`
--

INSERT INTO `group_entries` (`entryid`, `tripid`, `value`, `description`) VALUES
(9, 52, 500, 'air bnb'),
(10, 52, 1500, 'rental cars'),
(11, 52, 10000, 'starbucks'),
(12, 57, 5, 'starbucks'),
(13, 57, 1000, 'air bnb'),
(14, 57, 250, 'rental cars'),
(15, 57, 4000, 'arcade');

-- --------------------------------------------------------

--
-- Table structure for table `individual_budget`
--

CREATE TABLE `individual_budget` (
  `tripid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `budget` double DEFAULT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individual_budget`
--

INSERT INTO `individual_budget` (`tripid`, `username`, `budget`, `member_id`) VALUES
(52, 'Mark', 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `individual_entries`
--

CREATE TABLE `individual_entries` (
  `entryid` int(11) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `tripid` int(11) NOT NULL,
  `value` double NOT NULL,
  `username` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individual_entries`
--

INSERT INTO `individual_entries` (`entryid`, `description`, `tripid`, `value`, `username`, `member_id`) VALUES
(11, 'starbucks', 52, 1000, 'Mark', 1),
(12, 'air bnb', 52, 500, 'Mark', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `location_display`
-- (See below for the actual view)
--
CREATE TABLE `location_display` (
`objectid` int(11)
,`tripid` int(11)
,`location` varchar(100)
,`long` float
,`latt` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `max_poll`
-- (See below for the actual view)
--
CREATE TABLE `max_poll` (
`max` varchar(45)
,`pollid` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `username` varchar(50) NOT NULL,
  `tripid` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `tripid`, `member_id`) VALUES
('Mark', 52, 1),
('Preet1234', 57, 13),
('Mark', 52, 25),
('mitz123', 52, 26),
('Preet1234', 52, 27),
('tilah', 62, 28),
('mitz123', 62, 33);

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `objectid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `seatnumber` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`objectid`, `username`, `location`, `seatnumber`, `member_id`) VALUES
(39, 'Mark', '', 10, 1),
(39, 'mitz123', '', 20, 26),
(50, 'Mark', '', 10, 1),
(50, 'mitz123', '', 20, 26);

-- --------------------------------------------------------

--
-- Stand-in structure for view `passenger_occupancy`
-- (See below for the actual view)
--
CREATE TABLE `passenger_occupancy` (
`username` varchar(50)
,`seatnumber` int(11)
,`objectid` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `people_on_each_trip`
-- (See below for the actual view)
--
CREATE TABLE `people_on_each_trip` (
`tripid` int(11)
,`tripname` varchar(50)
,`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `pollid` int(11) NOT NULL,
  `tripid` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`pollid`, `tripid`, `question`, `description`) VALUES
(15, 57, 'when do we leave', '');

-- --------------------------------------------------------

--
-- Table structure for table `poll_answers`
--

CREATE TABLE `poll_answers` (
  `pollid` int(11) NOT NULL,
  `options` varchar(100) NOT NULL,
  `votes` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poll_answers`
--

INSERT INTO `poll_answers` (`pollid`, `options`, `votes`) VALUES
(15, '10', '0'),
(15, ' 11', '1'),
(15, ' 12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `tripid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`tripid`, `time`, `description`, `name`) VALUES
(52, '2020-11-25 19:14:00', 'dsfsdfs', 'trip time '),
(52, '2020-11-26 17:14:00', 'something ', 'eat time'),
(57, '2020-11-26 01:38:00', 'something ', 'trip time ');

-- --------------------------------------------------------

--
-- Stand-in structure for view `reminders_trip`
-- (See below for the actual view)
--
CREATE TABLE `reminders_trip` (
`tripid` int(11)
,`time` datetime
,`description` varchar(100)
,`name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `travel_options`
--

CREATE TABLE `travel_options` (
  `objectid` int(11) NOT NULL,
  `tripid` int(11) NOT NULL,
  `objectname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `travel_options`
--

INSERT INTO `travel_options` (`objectid`, `tripid`, `objectname`) VALUES
(39, 52, 'farari'),
(40, 52, 'Bus'),
(41, 52, 'Walk'),
(43, 56, 'Bus'),
(44, 59, 'ferrari'),
(45, 59, 'honda'),
(46, 59, 'Bus'),
(47, 60, 'zonda'),
(49, 60, 'lambo'),
(50, 52, 'toyota'),
(51, 62, 'farari');

-- --------------------------------------------------------

--
-- Stand-in structure for view `travel_options_display`
-- (See below for the actual view)
--
CREATE TABLE `travel_options_display` (
`objectid` int(11)
,`location` varchar(100)
,`arrivaltime` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `tripid` int(11) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `tripname` varchar(50) NOT NULL,
  `datecreated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`tripid`, `owner`, `tripname`, `datecreated`) VALUES
(52, 'Mark', 'Niagara', '2020-11-19 11:10:03'),
(54, 'Mark', 'vancover', '2020-11-20 02:27:29'),
(55, 'Mark', 'calgary', '2020-11-20 02:29:30'),
(56, 'Mark', 'chicago', '2020-11-20 02:31:12'),
(57, 'Mark', 'vancover', '2020-11-20 04:35:03'),
(58, 'Mark', 'Bancroft', '2020-11-20 04:35:17'),
(59, 'Mark', 'vancover', '2020-11-20 04:46:48'),
(60, 'Mark', 'alabma', '2020-11-20 04:53:17'),
(61, 'Mark', 'alabma', '2020-11-21 04:35:32'),
(62, 'tilah', 'Niagara', '2020-11-21 05:38:33'),
(63, 'Mark', 'vancover', '2020-11-21 07:32:20');

-- --------------------------------------------------------

--
-- Stand-in structure for view `trip_nickname`
-- (See below for the actual view)
--
CREATE TABLE `trip_nickname` (
`tripid` int(11)
,`username` varchar(50)
,`nickname` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `dateofbirth` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `firstname`, `lastname`, `nickname`, `dateofbirth`, `email`, `avatar`, `password`) VALUES
('Mark', 'Mark', 'Green', 'Mtiz', '02/29/2013', 'mark@mark.com', 'me.jpg', 'Mark'),
('mitz123', 'Mitul', 'Patel', 'bob', '01/01/2000', 'asd@dfs', 'me.jpg', '12345'),
('newuser', 'testUser', 'Patel', NULL, NULL, 'asd@dfs', NULL, 'newuser'),
('Preet1234', 'Preet', 'Patel', 'preee', '01/01/2000', 'adsf@sfds', '', '12345'),
('tilah', 'tilak', 'patel', NULL, NULL, 'asd@dfs', 'earth.jpg', 'tilah');

-- --------------------------------------------------------

--
-- Structure for view `avg_individual_budget`
--
DROP TABLE IF EXISTS `avg_individual_budget`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `avg_individual_budget`  AS SELECT avg(`group_entries`.`value`) AS `avg`, `group_entries`.`tripid` AS `tripid` FROM `group_entries` GROUP BY `group_entries`.`tripid` ;

-- --------------------------------------------------------

--
-- Structure for view `fullcars`
--
DROP TABLE IF EXISTS `fullcars`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fullcars`  AS SELECT `cars`.`objectid` AS `objectid` FROM (`cars` left join (select `passengers`.`objectid` AS `objectid`,count(`passengers`.`seatnumber`) AS `count` from `passengers` group by `passengers`.`objectid`) `passengercount` on(`cars`.`objectid` = `passengercount`.`objectid`)) WHERE `cars`.`seats` = `passengercount`.`count` ;

-- --------------------------------------------------------

--
-- Structure for view `group_budget_trip`
--
DROP TABLE IF EXISTS `group_budget_trip`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `group_budget_trip`  AS SELECT `group_entries`.`tripid` AS `tripid`, `group_entries`.`description` AS `description`, `group_entries`.`value` AS `value` FROM ((`group_entries` left join `group_budget` on(`group_entries`.`tripid` = `group_budget`.`tripid`)) left join `trips` on(`trips`.`tripid` = `group_budget`.`tripid`)) ORDER BY `group_entries`.`tripid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `location_display`
--
DROP TABLE IF EXISTS `location_display`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `location_display`  AS SELECT `travel_options`.`objectid` AS `objectid`, `travel_options`.`tripid` AS `tripid`, `travel_object`.`location` AS `location`, `travel_object`.`long` AS `long`, `travel_object`.`latt` AS `latt` FROM (`travel_options` left join (select `cars`.`objectid` AS `objectid`,`cars`.`location` AS `location`,`cars`.`long` AS `long`,`cars`.`latt` AS `latt` from `cars` union select `custom_travels`.`objectid` AS `objectid`,`custom_travels`.`location` AS `location`,`custom_travels`.`long` AS `long`,`custom_travels`.`latt` AS `latt` from `custom_travels`) `travel_object` on(`travel_options`.`objectid` = `travel_object`.`objectid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `max_poll`
--
DROP TABLE IF EXISTS `max_poll`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `max_poll`  AS SELECT max(`poll_answers`.`votes`) AS `max`, `poll_answers`.`pollid` AS `pollid` FROM `poll_answers` GROUP BY `poll_answers`.`pollid` ;

-- --------------------------------------------------------

--
-- Structure for view `passenger_occupancy`
--
DROP TABLE IF EXISTS `passenger_occupancy`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `passenger_occupancy`  AS SELECT `passengers`.`username` AS `username`, `passengers`.`seatnumber` AS `seatnumber`, `cars`.`objectid` AS `objectid` FROM (`passengers` left join `cars` on(`passengers`.`objectid` = `cars`.`objectid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `people_on_each_trip`
--
DROP TABLE IF EXISTS `people_on_each_trip`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `people_on_each_trip`  AS SELECT `tripmembers`.`tripid` AS `tripid`, `tripmembers`.`tripname` AS `tripname`, count(`tripmembers`.`username`) AS `count` FROM (select `members`.`username` AS `username`,`trips`.`tripid` AS `tripid`,`trips`.`tripname` AS `tripname` from (`members` left join `trips` on(`members`.`tripid` = `trips`.`tripid`)) order by `trips`.`tripid`) AS `tripmembers` GROUP BY `tripmembers`.`tripid` ;

-- --------------------------------------------------------

--
-- Structure for view `reminders_trip`
--
DROP TABLE IF EXISTS `reminders_trip`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reminders_trip`  AS SELECT `reminders`.`tripid` AS `tripid`, `reminders`.`time` AS `time`, `reminders`.`description` AS `description`, `reminders`.`name` AS `name` FROM `reminders` ORDER BY `reminders`.`tripid` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `travel_options_display`
--
DROP TABLE IF EXISTS `travel_options_display`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `travel_options_display`  AS SELECT `travel_options`.`objectid` AS `objectid`, `destinations_car`.`location` AS `location`, `destinations_car`.`arrivaltime` AS `arrivaltime` FROM ((`travel_options` left join `cars` on(`travel_options`.`objectid` = `cars`.`objectid`)) left join `destinations_car` on(`cars`.`objectid` = `destinations_car`.`objectid`)) WHERE `destinations_car`.`priority` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `trip_nickname`
--
DROP TABLE IF EXISTS `trip_nickname`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trip_nickname`  AS SELECT `trips`.`tripid` AS `tripid`, `users`.`username` AS `username`, `users`.`nickname` AS `nickname` FROM ((`users` left join `members` on(`users`.`username` = `members`.`username`)) left join `trips` on(`members`.`tripid` = `trips`.`tripid`)) ORDER BY `trips`.`tripid` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`objectid`);

--
-- Indexes for table `custom_travels`
--
ALTER TABLE `custom_travels`
  ADD PRIMARY KEY (`objectid`),
  ADD KEY `custom_travel_username` (`username`),
  ADD KEY `custom_travels_member_id` (`member_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`objectid`,`priority`);

--
-- Indexes for table `destinations_car`
--
ALTER TABLE `destinations_car`
  ADD PRIMARY KEY (`objectid`,`priority`);

--
-- Indexes for table `group_budget`
--
ALTER TABLE `group_budget`
  ADD PRIMARY KEY (`tripid`);

--
-- Indexes for table `group_entries`
--
ALTER TABLE `group_entries`
  ADD PRIMARY KEY (`entryid`),
  ADD KEY `group_entries_trip` (`tripid`);

--
-- Indexes for table `individual_budget`
--
ALTER TABLE `individual_budget`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `individual_entries`
--
ALTER TABLE `individual_entries`
  ADD PRIMARY KEY (`entryid`),
  ADD KEY `individual_entry_trip` (`username`),
  ADD KEY `individual_entry_tripid` (`tripid`),
  ADD KEY `individual_entry_member_id` (`member_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `member_trips` (`tripid`),
  ADD KEY `member_username` (`username`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`objectid`,`member_id`),
  ADD KEY `passengers_username` (`username`),
  ADD KEY `passengers_member_id` (`member_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`pollid`),
  ADD KEY `polls_trip` (`tripid`);

--
-- Indexes for table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD KEY `poll_entries_poll` (`pollid`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD KEY `reminders_trip` (`tripid`);

--
-- Indexes for table `travel_options`
--
ALTER TABLE `travel_options`
  ADD PRIMARY KEY (`objectid`),
  ADD KEY `travel_options_trip` (`tripid`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`tripid`),
  ADD KEY `trip_owner` (`owner`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_entries`
--
ALTER TABLE `group_entries`
  MODIFY `entryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `individual_entries`
--
ALTER TABLE `individual_entries`
  MODIFY `entryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `pollid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `travel_options`
--
ALTER TABLE `travel_options`
  MODIFY `objectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `tripid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `car_object` FOREIGN KEY (`objectid`) REFERENCES `travel_options` (`objectid`);

--
-- Constraints for table `custom_travels`
--
ALTER TABLE `custom_travels`
  ADD CONSTRAINT `custom_travel_object` FOREIGN KEY (`objectid`) REFERENCES `travel_options` (`objectid`),
  ADD CONSTRAINT `custom_travels_member_id` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_custom_object` FOREIGN KEY (`objectid`) REFERENCES `custom_travels` (`objectid`);

--
-- Constraints for table `destinations_car`
--
ALTER TABLE `destinations_car`
  ADD CONSTRAINT `destinations_car_object_id` FOREIGN KEY (`objectid`) REFERENCES `cars` (`objectid`);

--
-- Constraints for table `group_budget`
--
ALTER TABLE `group_budget`
  ADD CONSTRAINT `group_budget_trip` FOREIGN KEY (`tripid`) REFERENCES `trips` (`tripid`);

--
-- Constraints for table `group_entries`
--
ALTER TABLE `group_entries`
  ADD CONSTRAINT `group_entries_trip` FOREIGN KEY (`tripid`) REFERENCES `group_budget` (`tripid`);

--
-- Constraints for table `individual_budget`
--
ALTER TABLE `individual_budget`
  ADD CONSTRAINT `individual_budget_member_id` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `individual_entries`
--
ALTER TABLE `individual_entries`
  ADD CONSTRAINT `individual_entry_member_id` FOREIGN KEY (`member_id`) REFERENCES `individual_budget` (`member_id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `member_trips` FOREIGN KEY (`tripid`) REFERENCES `trips` (`tripid`),
  ADD CONSTRAINT `member_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_member_id` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`),
  ADD CONSTRAINT `passengers_object` FOREIGN KEY (`objectid`) REFERENCES `cars` (`objectid`);

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_trip` FOREIGN KEY (`tripid`) REFERENCES `trips` (`tripid`);

--
-- Constraints for table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD CONSTRAINT `poll_entries_poll` FOREIGN KEY (`pollid`) REFERENCES `polls` (`pollid`);

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_trip` FOREIGN KEY (`tripid`) REFERENCES `trips` (`tripid`);

--
-- Constraints for table `travel_options`
--
ALTER TABLE `travel_options`
  ADD CONSTRAINT `travel_options_trip` FOREIGN KEY (`tripid`) REFERENCES `trips` (`tripid`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trip_owner` FOREIGN KEY (`owner`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
