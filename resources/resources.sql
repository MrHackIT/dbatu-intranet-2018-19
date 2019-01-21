-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 23, 2017 at 03:51 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resources`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `a_id` int(225) NOT NULL,
  `album_name` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`) VALUES
(1, 'Chemical Engineering'),
(2, 'Computer Engineering'),
(3, 'Information Technology'),
(4, 'Electronics & Telecommunications Engineering'),
(5, 'Petrochemical Engineering'),
(6, 'Mechanical Engineering'),
(7, 'Electrical Engineering'),
(8, 'Civil Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `pdf_files_list`
--

CREATE TABLE `pdf_files_list` (
  `pdf_id` int(11) NOT NULL,
  `pdf_name` varchar(255) NOT NULL,
  `pdf_url` varchar(255) NOT NULL,
  `pdf_album` int(11) NOT NULL,
  `pdf_uploaded_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppt_files_list`
--

CREATE TABLE `ppt_files_list` (
  `ppt_id` int(11) NOT NULL,
  `ppt_name` varchar(255) NOT NULL,
  `ppt_url` varchar(255) NOT NULL,
  `ppt_album_name` int(255) NOT NULL,
  `ppt_uploaded_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `v_playlist`
--

CREATE TABLE `v_playlist` (
  `v_id` int(225) NOT NULL,
  `v_name` varchar(225) NOT NULL,
  `v_url` varchar(225) NOT NULL,
  `v_thumb` varchar(255) NOT NULL,
  `album_name` int(225) NOT NULL,
  `uploaded_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zip_files_list`
--

CREATE TABLE `zip_files_list` (
  `z_id` int(11) NOT NULL,
  `z_name` varchar(255) NOT NULL,
  `z_url` varchar(255) NOT NULL,
  `z_album` int(11) NOT NULL,
  `z_uploaded_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `pdf_files_list`
--
ALTER TABLE `pdf_files_list`
  ADD PRIMARY KEY (`pdf_id`);

--
-- Indexes for table `ppt_files_list`
--
ALTER TABLE `ppt_files_list`
  ADD PRIMARY KEY (`ppt_id`);

--
-- Indexes for table `v_playlist`
--
ALTER TABLE `v_playlist`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `zip_files_list`
--
ALTER TABLE `zip_files_list`
  ADD PRIMARY KEY (`z_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `a_id` int(225) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pdf_files_list`
--
ALTER TABLE `pdf_files_list`
  MODIFY `pdf_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ppt_files_list`
--
ALTER TABLE `ppt_files_list`
  MODIFY `ppt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `v_playlist`
--
ALTER TABLE `v_playlist`
  MODIFY `v_id` int(225) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `zip_files_list`
--
ALTER TABLE `zip_files_list`
  MODIFY `z_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
