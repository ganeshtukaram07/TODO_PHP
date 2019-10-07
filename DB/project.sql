-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2019 at 11:19 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `a_id` int(11) NOT NULL,
  `su_id` int(11) NOT NULL,
  `du_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `a_status` enum('0','1','2') NOT NULL DEFAULT '0',
  `a_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`a_id`, `su_id`, `du_id`, `t_id`, `a_status`, `a_createdate`) VALUES
(1, 3, 1, 6, '1', '2019-09-20 15:39:31'),
(2, 1, 3, 3, '0', '2019-09-23 03:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `l_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `l_name` varchar(150) NOT NULL,
  `l_description` text NOT NULL,
  `l_status` enum('0','1','2') NOT NULL DEFAULT '1',
  `l_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`l_id`, `t_id`, `l_name`, `l_description`, `l_status`, `l_createdate`) VALUES
(1, 1, 'test one', 'test one', '1', '2019-09-20 15:39:09'),
(4, 3, 'sdfdsf', 'sdfsf', '1', '2019-09-20 15:39:09'),
(5, 5, 'test list', 'test list', '1', '2019-09-20 15:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_description` varchar(200) NOT NULL,
  `u_id` int(11) NOT NULL,
  `t_status` enum('0','1','2') NOT NULL DEFAULT '1',
  `t_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`t_id`, `t_name`, `t_description`, `u_id`, `t_status`, `t_createdate`) VALUES
(3, 'validate', 'careate js valicdation for home page form', 1, '1', '2019-09-20 13:22:51'),
(4, 'srinivas', 'srinivas', 1, '2', '2019-09-20 13:51:20'),
(6, 'teja one', 'one', 3, '2', '2019-09-20 14:45:59'),
(7, 'teja live tracks', 'Bootstrap (currently v3.4.1) has a few easy ways to quickly get started, each one appealing to a different skill level and use case. Read through to see what suits your particular needs.', 3, '1', '2019-09-20 14:50:51'),
(8, 'test task one', 'test task one description', 4, '1', '2019-09-20 14:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(25) NOT NULL,
  `u_lname` varchar(25) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_mobile` varchar(17) NOT NULL,
  `u_status` enum('0','1','2') NOT NULL DEFAULT '1',
  `ip` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `u_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fname`, `u_lname`, `u_email`, `u_password`, `u_mobile`, `u_status`, `ip`, `token`, `u_createdate`) VALUES
(1, 'viswath', 'suresh', 'suresh@gmail.com', '$2y$10$uv6TCSK1Jb5bAAvF9V767ukdRnokVcbxevelahf7LXEwBKbid4m.2', '9876543211', '1', '::1', '86f850543598e8a0b42bf4d7d259f063', '2019-09-20 12:35:29'),
(2, 'mahesh', 'babu', 'mahesh@gmail.com', '$2y$10$.976YzKVmJMst88rVIVSLe1SamA4sRzN07ZP4IuZjOuuOK.p9gfn.', '9876543212', '1', '::1', 'e78e8257f3dbe44d521d8ef8c7745e31', '2019-09-20 14:07:08'),
(3, 'srinivas', 's', 'srinivas@gmail.com', '$2y$10$ZDgBdSPBn1j5kguLbDdza.P2P4XK0sa92q4nEnnVoREQGBxREcSIW', '9876543212', '1', '::1', '0517e3afe713302ccbfc59dadb106822', '2019-09-20 14:42:26'),
(4, 'user', 'name', 'user@gmail.com', '$2y$10$lpQV8rOeGmtOyGG/9njoSe6XsZkeKOEimHOODrAPJid3HmzDOr0Yi', '9876543212', '1', '::1', '8448c933d2966d63efbccb904175db1f', '2019-09-20 14:53:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
