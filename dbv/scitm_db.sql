-- phpMyAdmin SQL Dump
-- version 4.2.10.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2014 at 03:27 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sob`
--
CREATE DATABASE IF NOT EXISTS `sob` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sob`;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `othernames` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `firstname`, `lastname`, `othernames`, `photo`, `user_id`) VALUES
(1, 'SCHOOL', 'BUSINESS', 'OF', 'http://localhost/sob/users/enjoyyourheineken-604008.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

DROP TABLE IF EXISTS `hostels`;
CREATE TABLE IF NOT EXISTS `hostels` (
`id` int(11) NOT NULL,
  `hostel_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='This is a table that has all the hostels';

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`id`, `hostel_name`, `location`) VALUES
(1, 'KILIMAMBOGO', 'Western Zone'),
(2, 'Nyayo 1', 'Nyayo Zone'),
(3, 'Nyayo 2', 'Nyayo Zone'),
(4, 'Nyayo 3', 'Nyayo Zone');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_applications`
--

DROP TABLE IF EXISTS `hostel_applications`;
CREATE TABLE IF NOT EXISTS `hostel_applications` (
`application_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date_applied` timestamp NULL DEFAULT NULL,
  `action` int(11) DEFAULT '0',
  `reason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_images`
--

DROP TABLE IF EXISTS `hostel_images`;
CREATE TABLE IF NOT EXISTS `hostel_images` (
`id` int(11) NOT NULL,
  `hostel_id` int(11) DEFAULT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_rooms`
--

DROP TABLE IF EXISTS `hostel_rooms`;
CREATE TABLE IF NOT EXISTS `hostel_rooms` (
`id` int(11) NOT NULL,
  `hostel_id` int(11) DEFAULT NULL,
  `room_no` varchar(45) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel_rooms`
--

INSERT INTO `hostel_rooms` (`id`, `hostel_id`, `room_no`, `capacity`) VALUES
(1, 1, 'Rm 001', 2),
(2, 1, 'Rm 002', 2),
(3, 1, 'Rm 003', 2),
(4, 2, '001', 6),
(5, 2, '002', 2),
(6, 2, '003', 4);

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

DROP TABLE IF EXISTS `lecturers`;
CREATE TABLE IF NOT EXISTS `lecturers` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `othernames` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `phonenumber` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `firstname`, `lastname`, `othernames`, `photo`, `phonenumber`) VALUES
(1000, 'CHRISPINE', 'OTAALO', 'JOHN', 'NULL', '0725160399'),
(1001, 'VALENTINE ', 'KIZITO', 'OWIYE', 'NULL', '0711226325');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `othernames` varchar(255) DEFAULT NULL,
  `image` text,
  `phonenumber` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `othernames`, `image`, `phonenumber`) VALUES
(10000, 'MATHIEU', 'DEBUCHY', 'JOHN', 'http://localhost/sob/upload/alexis.jpg', '0707070906'),
(10001, 'DAVIES', 'ODHIAMBO', 'OKELLO', 'http://localhost/sob/upload/sanogo.png', '0708007648'),
(10002, 'LORNA', 'CHEROTICH', 'CHEBARBAR', 'http://localhost/sob/upload/Colorful-five-feathers-1920x1200.jpg', '0726325874'),
(10003, 'ODIRA', 'RICHARD', 'KAMOLLO', 'http://localhost/sob/upload/7DAgKSTM.png', '0752362547');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

DROP TABLE IF EXISTS `student_course`;
CREATE TABLE IF NOT EXISTS `student_course` (
`id` int(11) NOT NULL,
  `student_no` int(11) DEFAULT NULL,
  `course_no` int(11) DEFAULT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`id`, `student_no`, `course_no`, `date_registered`) VALUES
(1, 10000, 2, '2014-11-16 09:38:13'),
(2, 10001, 2, '2014-11-16 09:41:49'),
(3, 10002, 2, '2014-11-16 09:44:56'),
(4, 10003, 2, '2014-11-16 11:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `student_room`
--

DROP TABLE IF EXISTS `student_room`;
CREATE TABLE IF NOT EXISTS `student_room` (
`id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_room`
--

INSERT INTO `student_room` (`id`, `student_id`, `room_id`, `date`, `active`) VALUES
(1, 10000, 1, '2014-11-16 13:52:38', 1),
(2, 10001, 1, '2014-11-16 14:10:03', 1),
(3, 10002, 3, '2014-11-16 14:14:20', 0),
(4, 10003, 4, '2014-11-16 14:14:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `first_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_type`, `first_time`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1),
(9, '10000', 'e10adc3949ba59abbe56e057f20f883e', 'student', 0),
(10, '10001', 'e10adc3949ba59abbe56e057f20f883e', 'student', 0),
(11, '10002', 'e10adc3949ba59abbe56e057f20f883e', 'student', 0),
(12, '1000', 'e10adc3949ba59abbe56e057f20f883e', 'lecturer', 0),
(13, '1001', 'e10adc3949ba59abbe56e057f20f883e', 'lecturer', 0),
(14, '10003', 'e10adc3949ba59abbe56e057f20f883e', 'student', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

DROP TABLE IF EXISTS `user_sessions`;
CREATE TABLE IF NOT EXISTS `user_sessions` (
`session_id` int(11) NOT NULL,
  `session_code` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`session_id`, `session_code`, `user_id`, `date_time`) VALUES
(1, '67edd90aec1215e2c582699fae357f03', 1, NULL),
(2, '10b71d3f8e4a5d95364783a7d218b534', 1, NULL),
(3, '7903908ef68d72d868a3547dd8a1c24c', 1, NULL),
(4, '19ea64b86fc9e83a09c71965181a2530', 1, NULL),
(5, 'd3da251488f6bf083938a9f0aef9d545', 1, NULL),
(6, 'd3da251488f6bf083938a9f0aef9d545', 1, NULL),
(7, 'ec01523eec850686297ea473cae9688a', 1, NULL),
(8, '38bd968abd7603a7b1b9f4f9af17fad4', 1, NULL),
(9, '28643778f57db8667eae59b9268136e5', 1, NULL),
(10, '421e5e5d5d6eff22a3a41bc60496b042', 1, NULL),
(11, '39b100bd04b73bfd918dc6695d321e85', 1, NULL),
(12, '1035ed4e81e902aeadaf8f0c92686e51', 1, NULL),
(13, 'df31ded95499d223ff256f99bc7d5ef8', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `hostel_name_UNIQUE` (`hostel_name`);

--
-- Indexes for table `hostel_applications`
--
ALTER TABLE `hostel_applications`
 ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `hostel_images`
--
ALTER TABLE `hostel_images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_room`
--
ALTER TABLE `student_room`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
 ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hostel_applications`
--
ALTER TABLE `hostel_applications`
MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hostel_images`
--
ALTER TABLE `hostel_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1002;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10004;
--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_room`
--
ALTER TABLE `student_room`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
