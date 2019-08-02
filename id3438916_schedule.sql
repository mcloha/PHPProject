-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2018 at 06:08 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
-- Michael Useless Comment
--
-- Database: `id3438916_schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE `hours` (
  `shiftId` int(6) NOT NULL,
  `shiftHours` varchar(255) DEFAULT NULL,
  `shiftNum` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hours`
--

INSERT INTO `hours` (`shiftId`, `shiftHours`, `shiftNum`) VALUES
(45, 'חופש', 0),
(46, '7:00-15:00', 3),
(47, '14:00-22:00', 3),
(48, '23:00-7:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `weekMessage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`weekMessage`) VALUES
('שבוע הבא יש פורים'),
('שבוע הבא יש פורים');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `shiftId` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `sunday` varchar(255) DEFAULT NULL,
  `monday` varchar(255) DEFAULT NULL,
  `tuesday` varchar(255) DEFAULT NULL,
  `wednesday` varchar(255) DEFAULT NULL,
  `thursday` varchar(255) DEFAULT NULL,
  `friday` varchar(255) DEFAULT NULL,
  `saturday` varchar(255) DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`shiftId`, `userName`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `comment`) VALUES
(15, 'tima', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', NULL),
(16, 'user', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', NULL),
(17, 'anna', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', NULL),
(18, 'shlomo', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', '7:00-15:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siduration`
--

CREATE TABLE `siduration` (
  `hours` varchar(255) DEFAULT NULL,
  `sunday` varchar(255) DEFAULT NULL,
  `monday` varchar(255) DEFAULT NULL,
  `tuesday` varchar(255) DEFAULT NULL,
  `wednesday` varchar(255) DEFAULT NULL,
  `thursday` varchar(255) DEFAULT NULL,
  `friday` varchar(255) DEFAULT NULL,
  `saturday` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siduration`
--

INSERT INTO `siduration` (`hours`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`) VALUES
('7:00-15:00', 'tima', 'tima', 'tima', 'tima', 'tima', 'tima', 'tima'),
('7:00-15:00', 'user', 'user', 'user', 'user', 'user', 'user', 'user'),
('7:00-15:00', 'anna', 'anna', 'anna', 'anna', 'anna', 'anna', 'anna'),
('14:00-22:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('14:00-22:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('14:00-22:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('23:00-7:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('23:00-7:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('23:00-7:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `passwordHash` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `passwordHash`, `created`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2018-01-30 17:18:55'),
(12, 'user', '81dc9bdb52d04dc20036dbd8313ed055', '2018-02-20 19:06:47'),
(13, 'tima', '81dc9bdb52d04dc20036dbd8313ed055', '2018-02-20 22:33:59'),
(14, 'vika', '81dc9bdb52d04dc20036dbd8313ed055', '2018-02-21 10:31:33'),
(15, 'anna', '81dc9bdb52d04dc20036dbd8313ed055', '2018-02-21 11:56:25'),
(16, 'avishai', '81dc9bdb52d04dc20036dbd8313ed055', '2018-02-22 10:39:31'),
(17, 'gavriel', '81dc9bdb52d04dc20036dbd8313ed055', '2018-02-23 09:41:41'),
(18, 'adam', '81dc9bdb52d04dc20036dbd8313ed055', '2018-02-25 06:41:17'),
(19, 'shlomo', '81dc9bdb52d04dc20036dbd8313ed055', '2018-03-06 17:55:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`shiftId`),
  ADD UNIQUE KEY `shiftHours` (`shiftHours`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`shiftId`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hours`
--
ALTER TABLE `hours`
  MODIFY `shiftId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `shiftId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shifts`
--
ALTER TABLE `shifts`
  ADD CONSTRAINT `shifts_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `users` (`userName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
