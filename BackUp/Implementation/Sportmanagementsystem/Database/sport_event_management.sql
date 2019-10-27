-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 01:37 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport_event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` enum('Feedback','Report','Request','') NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(4, 'Jack Smith', 'js@gmail.com', 'Feedback', 'Best Website keep up your good work'),
(5, 'Brian Lara', 'bl@gmail.com', 'Feedback', 'Good website. Hope to see more like this.'),
(6, 'ABC ', 'abc@gmail.com', 'Report', 'Map not working properly.');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` enum('Single','Double','Team','') NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `type`, `description`, `date`, `venue`, `image`) VALUES
(1, 'Cricket tournament event', 'Team', 'This is a state level sport event which is going to be held in following date.', '2019-09-21', 'Old trafford', 'Event_20190913135115_cricket.jpg'),
(2, 'Football event', 'Team', 'This is a national level sport event & will be organised on following date.', '2019-09-12', 'Etihad Stadium', 'Event_20190913172224_soccer.jpg'),
(4, 'Golf tournament', 'Single', 'National level sport event.', '2019-09-21', 'Gokarna Golf Ground', 'Event_20190913180519_golf.jpg'),
(5, 'Table Tennis ', 'Single', 'Single TT  national championship qualifying event.', '2019-09-14', 'United Indoor Stadium', 'Event_20190916101611_tt.jpg'),
(6, 'Swimming', 'Single', 'National level swimming competition.', '2019-09-07', 'England National Swimming Course', 'Event_20190916151442_swim.jpg'),
(7, 'Hockey', 'Team', 'International Hockey Championship.', '2019-09-06', 'India, Bengaluru', 'Event_20190916152002_hockey.jpg'),
(8, 'Lawn Tennis', 'Single', 'US OPEN', '2019-09-18', 'Manchester', 'Event_20190916152226_lawn.jpg'),
(9, 'Boxing', 'Single', 'State level competition.', '2019-09-28', 'Leicester', 'Event_20190916152644_boxing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registerin_event`
--

CREATE TABLE `registerin_event` (
  `reginevent_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registerin_event`
--

INSERT INTO `registerin_event` (`reginevent_id`, `username`, `event_id`) VALUES
(28, 'b@gmail.com', 2),
(33, 'js@hotmail.com', 4),
(36, 'gb@gmail.com', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'kb', 'kb@hotmail.com', 'kb', 'Admin'),
(15, 'Brian Lara', 'bl@gmail.com', 'bl', 'User'),
(16, 'Boker T', 'b@gmail.com', 'b', 'User'),
(17, 'Jack Smith', 'js@hotmail.com', 'js', 'User'),
(18, 'Chuk Norris', 'cn@gmail.com', 'cn', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registerin_event`
--
ALTER TABLE `registerin_event`
  ADD PRIMARY KEY (`reginevent_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registerin_event`
--
ALTER TABLE `registerin_event`
  MODIFY `reginevent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
