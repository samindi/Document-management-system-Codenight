-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2019 at 08:41 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codenight`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details`
--

DROP TABLE IF EXISTS `attendance_details`;
CREATE TABLE IF NOT EXISTS `attendance_details` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `att_name` varchar(225) NOT NULL,
  `att_reg_no` varchar(225) NOT NULL,
  `att_batch` varchar(100) NOT NULL,
  `att_form` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_details`
--

INSERT INTO `attendance_details` (`id`, `att_name`, `att_reg_no`, `att_batch`, `att_form`) VALUES
(1, 'John Doe', '15APC2351', '3', 'attendance.png'),
(2, 'Emiley Cooper', '16APC2399', '3', 'attendance.png'),
(3, 'Jonathon', '15APC2388', '3', '15APC2388.png'),
(4, 'Megan Fox', '15APC2333', '3', '15APC2333.png');

-- --------------------------------------------------------

--
-- Table structure for table `medical_details`
--

DROP TABLE IF EXISTS `medical_details`;
CREATE TABLE IF NOT EXISTS `medical_details` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `medical_name` varchar(225) NOT NULL,
  `medical_reg_no` varchar(225) NOT NULL,
  `medical_batch` varchar(100) NOT NULL,
  `medical_form` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_details`
--

INSERT INTO `medical_details` (`id`, `medical_name`, `medical_reg_no`, `medical_batch`, `medical_form`) VALUES
(1, 'John Doe', '15APC2351', '3', 'medical.jpg'),
(2, 'David', '15APC2301', '3', '15APC2301.jpg'),
(3, 'john David', '15APC2303', '3', '15APC2303.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

DROP TABLE IF EXISTS `student_details`;
CREATE TABLE IF NOT EXISTS `student_details` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `std_name` varchar(225) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `academic_year` varchar(100) NOT NULL,
  `contact_no` int(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `std_address` varchar(225) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `profile_image` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `std_name`, `reg_no`, `batch`, `academic_year`, `contact_no`, `email`, `std_address`, `birthday`, `profile_image`) VALUES
(3, 'Bhathiya Kariyawasam', '15APC2351', '3', '2015/2016', 772651098, 'bhathiyakariyawasam94@gmail.com', '01/01/2019', '111/A, 1st Cross Lane, Colombo.', '15APC2351.jpg'),
(1, 'Kathrina', '15APC2355', '3', '2015/2016', 772651098, 'kathrina@gmail.com', '02/02/1994', '123/A, 1st Lane, Balangoda.', '15APC2355.jpg'),
(4, 'Melina Mcgrath', '15APC2344', '3', '2015/2016', 772651098, 'jesson@gmail.com', '123/A, 1st Lane, Ratnapura.', '04/02/2019', '15APC2344.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `re_password` varchar(255) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `user_image` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `first_name`, `second_name`, `email`, `username`, `password`, `re_password`, `user_type`, `user_image`) VALUES
(3, 'Mr', 'Admin', 'Tech', 'userone@gmail.com', 'admin', '$2y$10$N594PiwuijeqYKMTAeKSDemL60uI3dYG1aA82PITCa2gNqEIyS3TG', '$2y$10$N594PiwuijeqYKMTAeKSDemL60uI3dYG1aA82PITCa2gNqEIyS3TG', 'admin', 'user_profile.png'),
(4, 'Mr', 'SuperAdmin', 'Admin', 'super.admin@gmail.com', 'cis@appsc', '$2y$10$3vcQ7dphU6095FRB9MRNdu0RfrV.bhRs/.5eIUVt2dYmJhVle4hBu', '$2y$10$3vcQ7dphU6095FRB9MRNdu0RfrV.bhRs/.5eIUVt2dYmJhVle4hBu', 'super_admin', 'user_profile.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
