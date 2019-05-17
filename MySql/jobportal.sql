-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2019 at 04:45 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kdsosgvp_jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_secure`
--

CREATE TABLE `admin_secure` (
  `id` int(6) UNSIGNED NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_phone` varchar(10) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_secure`
--

INSERT INTO `admin_secure` (`id`, `admin_name`, `admin_phone`, `admin_email`, `admin_password`) VALUES
(26, 'Pratishtha Sahu', '8545931082', 'admin@hotmail.com', 'kuchbhi123');

-- --------------------------------------------------------

--
-- Table structure for table `new_jobs`
--

CREATE TABLE `new_jobs` (
  `id` int(6) UNSIGNED NOT NULL,
  `companyname` text NOT NULL,
  `position` text NOT NULL,
  `job_type` text NOT NULL,
  `location` text NOT NULL,
  `salary` text NOT NULL,
  `education` text NOT NULL,
  `experience` text NOT NULL,
  `contact` text NOT NULL,
  `additionaldetails` text NOT NULL,
  `emp_email` text NOT NULL,
  `flag` int(11) NOT NULL,
  `applicants_id` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_jobs`
--

INSERT INTO `new_jobs` (`id`, `companyname`, `position`, `job_type`, `location`, `salary`, `education`, `experience`, `contact`, `additionaldetails`, `emp_email`, `flag`, `applicants_id`, `reg_date`) VALUES
(27, 'Tutorial class', 'Teacher', 'parttime', 'KANPUR', '20k', 'highschool', 'none', '6386871736', 'Aliquam ut ex ut augue consectetur interdum. Donec amet imperdiet eleifend\r\nfringilla tincidunt.', 'pratishthasahu1@gmail.com', 1, ' 13', '2019-04-29 11:30:16'),
(31, 'Behtar Services', 'Chief financial officer', 'fulltime', 'Allahabad', '20000', 'Graduate', '2', '8574743046', 'A dedicated team of Affiliate specialists are available to assist you with our affiliate program. There is absolutely no cost to you to be a HostGator Affiliate, and the earning potential is substantial!', 'rajnish@gmail.com', 1, ' 14', '2019-04-29 11:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `register_employer`
--

CREATE TABLE `register_employer` (
  `id` int(6) UNSIGNED NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `phone` char(10) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(30) NOT NULL,
  `compName` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '0',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register_employer`
--

INSERT INTO `register_employer` (`id`, `Fname`, `Lname`, `phone`, `email`, `password`, `compName`, `designation`, `address`, `flag`, `reg_date`) VALUES
(6, 'Pratishtha', 'sahu', '8545931082', 'pratishthasahu1@gmail.com', '1234567', 'something', 'cdcd', 'Hathgaon, Hathgaon', 0, '2019-02-17 20:43:56'),
(7, 'Rajnish', 'kumar', '8545931082', 'rajnish@gmail.com', '123456789', 'webrine', 'manager', 'Allahabad', 0, '2019-02-20 19:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `register_jobseeker`
--

CREATE TABLE `register_jobseeker` (
  `id` int(6) UNSIGNED NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `FatherName` text NOT NULL,
  `gender` text NOT NULL,
  `dob` text,
  `phone` char(10) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `resume_file` text NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '0',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register_jobseeker`
--

INSERT INTO `register_jobseeker` (`id`, `Fname`, `Lname`, `FatherName`, `gender`, `dob`, `phone`, `email`, `password`, `address`, `resume_file`, `flag`, `reg_date`) VALUES
(13, 'Pratishtha', 'sahu', 'Sarvesh Sahu', 'female', '1997-01-27', '8545931082', 'pratishthasahu1@gmail.com', '098765', 'Hathgaon, Hathgaon', '_TET 2018._.pdf', 0, '2019-02-17 20:43:38'),
(14, 'Anita', 'Hemarajani', 'Mr. Ghanshyam', 'female', '1995-08-17', '8318359860', 'anita@gmail.com', 'anita12345', 'Lucknow', 'last1.sql', 0, '2019-04-29 11:21:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_secure`
--
ALTER TABLE `admin_secure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_jobs`
--
ALTER TABLE `new_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_employer`
--
ALTER TABLE `register_employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_jobseeker`
--
ALTER TABLE `register_jobseeker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_secure`
--
ALTER TABLE `admin_secure`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `new_jobs`
--
ALTER TABLE `new_jobs`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `register_employer`
--
ALTER TABLE `register_employer`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register_jobseeker`
--
ALTER TABLE `register_jobseeker`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
