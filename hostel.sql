-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 12:03 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `name` varchar(400) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `room_type` varchar(300) DEFAULT NULL,
  `features` longtext,
  `price_range` varchar(200) DEFAULT NULL,
  `date_uploaded` datetime DEFAULT CURRENT_TIMESTAMP,
  `description` longtext,
  `reviews_number` int(4) DEFAULT NULL,
  `wall_pic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`id`, `manager_id`, `name`, `address`, `status`, `room_type`, `features`, `price_range`, `date_uploaded`, `description`, `reviews_number`, `wall_pic`) VALUES
(1, 3, 'Ayensu Plaza', 'Plot 234, Block K, Ayensu', 'Rooms Available', 'Self-Contained Rooms', 'Air Conditioning,,CCTV Camera,Two in a Room,,,,,,One in a Room,', '1200,2000', '2019-11-21 08:17:48', 'This is the description', NULL, 'C:/xampp/htdocs/hostel/manager/hostel-img/Screenshot (4).png');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_images`
--

CREATE TABLE `hostel_images` (
  `id` int(11) NOT NULL,
  `hostel_id` int(11) DEFAULT NULL,
  `path` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel_images`
--

INSERT INTO `hostel_images` (`id`, `hostel_id`, `path`) VALUES
(1, 1, 'C:/xampp/htdocs/hostel/manager/hostel-img/Screenshot (1).png'),
(2, 1, 'C:/xampp/htdocs/hostel/manager/hostel-img/Screenshot (2).png'),
(3, 1, 'C:/xampp/htdocs/hostel/manager/hostel-img/Screenshot (3).png'),
(4, 1, 'C:/xampp/htdocs/hostel/manager/hostel-img/Screenshot (4).png');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(400) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `description` text,
  `profile_picture` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `hostels` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `full_name`, `email`, `phone`, `password`, `description`, `profile_picture`, `address`, `hostels`) VALUES
(3, 'Karikari Adade', 'juniorlecrae@gmail.com', '0548876922', 'af8616fec384adfdc60d3ac1686bcf4360eac184', 'Fill all fields before submittingFill all fields before submittingFill all fields before submittingFill all fields before submitting', 'C:/xampp/htdocs/hostel/manager/profile-img/UCC.jpg', 'Plot 234, Block K', NULL),
(4, 'Gideon Adade', 'gideon@gmail.com', '0208522053', 'af8616fec384adfdc60d3ac1686bcf4360eac184', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_images`
--
ALTER TABLE `hostel_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostel_images`
--
ALTER TABLE `hostel_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
