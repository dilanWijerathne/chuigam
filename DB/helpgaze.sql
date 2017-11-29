-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2017 at 04:46 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpgaze`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `district_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `district_id`) VALUES
(1, 'Wellawatte', 1),
(2, 'Dehiwala', 1),
(3, 'Rajagiriya', 1),
(4, 'Nallur', 2);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(255) NOT NULL,
  `district` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district`) VALUES
(1, 'Colombo'),
(2, 'Jaffna');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `getter_id` int(11) DEFAULT NULL,
  `giver_id` int(11) DEFAULT NULL,
  `feedback` varchar(100) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `getter_id`, `giver_id`, `feedback`, `date`) VALUES
(1, 1, 1, 'm,ff', 'Wed, Sep 6, 2017 1:27 AM'),
(2, 1, 1, 'asjdbkas', 'Wed, Sep 27, 2017 5:39 AM'),
(3, 1, 1, 'msdams\r\nd;asmda', 'Mon, Oct 2, 2017 1:42 AM'),
(4, 1, 1, 'najsna', 'Fri, Oct 27, 2017 5:15 AM');

-- --------------------------------------------------------

--
-- Table structure for table `help_requests`
--

CREATE TABLE `help_requests` (
  `help_id` int(11) NOT NULL,
  `seeker_id` int(11) DEFAULT NULL,
  `helper_id` int(11) DEFAULT NULL,
  `help` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'requested'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `help_requests`
--

INSERT INTO `help_requests` (`help_id`, `seeker_id`, `helper_id`, `help`, `created_at`, `status`) VALUES
(1, 1, 1, 'blahhh', '2017-09-29 01:43:21', 'requested'),
(2, 2, 1, 'sjdnfjsd', '2017-09-28 04:43:38', 'accepted'),
(3, 1, 2, 'ajsndjknaskdnkas', '2017-09-27 12:37:32', 'requested'),
(4, 1, 2, 'new ideation', '2017-09-27 12:37:37', 'requested'),
(5, 1, 2, 'aaa', '2017-09-27 12:37:42', 'requested'),
(6, 2, 1, 'i need you to fix my mortor', '2017-11-02 14:34:03', 'requested');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(255) NOT NULL,
  `job` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job`) VALUES
(1, 'electrician'),
(2, 'carpenter');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `skills` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `username`, `skills`) VALUES
(1, 'vikkids', 'Welding,electric works,Mortor repairs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT 'Seeker',
  `location` varchar(45) DEFAULT 'N/A',
  `district_id` int(255) NOT NULL,
  `city_id` int(255) NOT NULL,
  `working_location` varchar(30) DEFAULT 'N/A',
  `working_hours` varchar(30) DEFAULT 'N/A',
  `about` varchar(100) DEFAULT 'N/A ',
  `occupation` varchar(30) DEFAULT 'N/A',
  `job_id` int(255) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `profile_image` varchar(45) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `type`, `location`, `district_id`, `city_id`, `working_location`, `working_hours`, `about`, `occupation`, `job_id`, `mobile_no`, `profile_image`) VALUES
(1, 'Vigneshan', 'Seshamany', 'vikkids', 'vikkids4@gmail.com', '123', 'Seeker', 'Colombo', 1, 1, 'N/A', 'N/A', 'Im a web developer', 'Web developer', 1, '0776373610', 'default.png'),
(2, 'Dilan', 'Wijeratne', 'dilan', 'dilan@gmail.com', '123', 'Seeker', 'Colombo', 1, 2, 'N/A', 'N/A', 'Im an innovationist', 'Innovationist', 2, NULL, 'default.png'),
(3, 'dnasn', 'nkjn', 'nkjn', 'vikkdi@gmail.com', 'kjdn`kjn', '028304', 'N/A', 1, 3, 'N/A', 'N/A', 'N/A ', 'Teacher', NULL, NULL, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `help_requests`
--
ALTER TABLE `help_requests`
  ADD PRIMARY KEY (`help_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `help_requests`
--
ALTER TABLE `help_requests`
  MODIFY `help_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
