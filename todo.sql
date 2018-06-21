-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 01:31 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_user_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `task_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_due_date` date NOT NULL,
  `task_completed_date` date DEFAULT NULL,
  `is_complete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_user_id`, `task_name`, `task_description`, `task_created`, `task_due_date`, `task_completed_date`, `is_complete`) VALUES
(1, 1, 'Learn AJAX', 'You have to learn this cool technique.', '2018-06-19 15:45:23', '2018-06-30', NULL, 1),
(2, 1, 'Implement CodeIgniter', 'That\'s really important.', '2018-06-19 15:46:58', '2018-06-24', NULL, 0),
(4, 2, 'Do something', 'DOOOOO', '2018-06-20 05:10:52', '2018-09-28', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password_hash`) VALUES
(1, 'a', 'a', 'a@gmail.com', '$2y$10$PN3t6IRtTyM5FLoEDLvARuvDkyDVNiCg1znzg5AfKpizmMTQFpxZS'),
(2, 'b', 'b', 'b@gmail.com', '$2y$10$XrJwhQC72wxyBWX/SmkH5e82hLilZMu0ZtunVURBk0S6VX/xXRkCa'),
(3, 'c', 'c', 'c@gmail.com', '$2y$10$qyXOYCZyLS5mg8ISJWyvNuiindrya5daB/FPekn7PPDxrnCiTCjk.'),
(4, 'Tony', 'Stark', 'iamironman@gmail.com', '$2y$10$2bC8gB2hPvnqdxS3Iu3rz.su1X3Jeutxyv0KnlhAKi58XCm8UHYXG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
