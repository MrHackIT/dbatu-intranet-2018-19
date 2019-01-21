-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 01:33 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intranet`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_edu_details`
--

CREATE TABLE `t_edu_details` (
  `t_id` int(11) NOT NULL,
  `t_emp_id` varchar(255) NOT NULL,
  `t_discipline` varchar(255) NOT NULL,
  `t_score_10` varchar(255) NOT NULL,
  `t_score_12` varchar(255) NOT NULL,
  `t_btech_marks` varchar(255) NOT NULL,
  `t_mtech_marks` varchar(255) NOT NULL,
  `t_phd_marks` varchar(255) NOT NULL,
  `t_passing_10` varchar(255) NOT NULL,
  `t_passing_12` varchar(255) NOT NULL,
  `t_passing_btech` varchar(255) NOT NULL,
  `t_passing_mtech` varchar(255) NOT NULL,
  `t_passing_phd` varchar(255) NOT NULL,
  `t_passing_university_10` varchar(255) NOT NULL,
  `t_passing_university_12` mediumint(255) NOT NULL,
  `t_passing_university_btech` varchar(255) NOT NULL,
  `t_passing_university_mtech` varchar(255) NOT NULL,
  `t_passing_university_phd` varchar(255) NOT NULL,
  `t_fields_experties` varchar(255) NOT NULL,
  `t_other_activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_edu_details`
--

INSERT INTO `t_edu_details` (`t_id`, `t_emp_id`, `t_discipline`, `t_score_10`, `t_score_12`, `t_btech_marks`, `t_mtech_marks`, `t_phd_marks`, `t_passing_10`, `t_passing_12`, `t_passing_btech`, `t_passing_mtech`, `t_passing_phd`, `t_passing_university_10`, `t_passing_university_12`, `t_passing_university_btech`, `t_passing_university_mtech`, `t_passing_university_phd`, `t_fields_experties`, `t_other_activity`) VALUES
(1, '20140630', '', '3.4', '100', '5.6', '5.6', '5.6', '7.6', '7.6', '5.6', '5.6', '5.6', '', 0, 'hjhghj', 'hjhk', '5.6', 'vbnn', 'asfasf'),
(2, '', '', '45', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_edu_details`
--
ALTER TABLE `t_edu_details`
  ADD PRIMARY KEY (`t_id`,`t_emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_edu_details`
--
ALTER TABLE `t_edu_details`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
