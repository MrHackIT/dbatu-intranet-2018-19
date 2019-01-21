-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 10:55 AM
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
-- Table structure for table `t_professional_details`
--

CREATE TABLE `t_professional_details` (
  `t_id` int(11) NOT NULL,
  `t_emp_id` int(11) NOT NULL,
  `t_discipline` varchar(255) NOT NULL,
  `t_award_desc` varchar(255) NOT NULL,
  `t_award` mediumblob NOT NULL,
  `t_conference_desc` varchar(255) NOT NULL,
  `t_conference` mediumblob NOT NULL,
  `t_current_mem_desc` varchar(255) NOT NULL,
  `t_current_mem` mediumblob NOT NULL,
  `t_past_mem_desc` varchar(255) NOT NULL,
  `t_past_mem` mediumblob NOT NULL,
  `t_cur_project_desc` varchar(255) NOT NULL,
  `t_cur_project` mediumblob NOT NULL,
  `t_past_project_desc` varchar(255) NOT NULL,
  `t_past_project` mediumblob NOT NULL,
  `t_inter_research_desc` varchar(255) NOT NULL,
  `t_inter_research` mediumblob NOT NULL,
  `t_nat_research_desc` varchar(255) NOT NULL,
  `t_nat_research` mediumblob NOT NULL,
  `t_inter_phd_desc` varchar(255) NOT NULL,
  `t_inter_phd` mediumblob NOT NULL,
  `t_nat_phd_desc` varchar(255) NOT NULL,
  `t_nat_phd` mediumblob NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `student` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_professional_details`
--

INSERT INTO `t_professional_details` (`t_id`, `t_emp_id`, `t_discipline`, `t_award_desc`, `t_award`, `t_conference_desc`, `t_conference`, `t_current_mem_desc`, `t_current_mem`, `t_past_mem_desc`, `t_past_mem`, `t_cur_project_desc`, `t_cur_project`, `t_past_project_desc`, `t_past_project`, `t_inter_research_desc`, `t_inter_research`, `t_nat_research_desc`, `t_nat_research`, `t_inter_phd_desc`, `t_inter_phd`, `t_nat_phd_desc`, `t_nat_phd`, `end_date`, `start`, `project`, `student`) VALUES
(21, 20150642, 'ijmiom', 'uyggg', '', 'gvg', '', 'jgvghv', '', 'iuhn', '', '', '', '', '', 'ljhcj', '', 'khbjh', '', 'jhbjh', '', '', '', '~2017-01-02~3-7-2017', '~2016-08-08~02-07-2015', '~ ubnu~hbjhb', '~uhb~hbjh'),
(34, 20150781, '', 'Priya Mudgal', '', 'nn', '', 'pp', '', 'ppp', '', '', '', '', '', 'ooo', '', 'ii', '', 'njnj', '', 'bb', '', '', 'ii', 'ooo', '9'),
(71, 20150786, '', 'Vaishali A Patil', '', 'Efgh', '', 'ijkl', '', 'mnop', '', 'uvwx', '', 'yzzzz', '', 'ooooo', '', 'vvvvvv', '', 'ppppppppppp', '', 'aaaaaaaa', '', '', '', '', ''),
(72, 20150789, '', 'aaaaaaaaaa', 0x6a31302e6a7067, 'bbbbbbbbbb', 0x6a31302e6a7067, 'cccccccccc', 0x6a392e6a7067, 'dddddddd', 0x6a32302e6a7067, 'dddddddddd', 0x6a31312e6a7067, 'eeeeeeeee\r\n', 0x6a31312e6a7067, 'fffff', 0x6a31312e6a7067, 'ggggggggg', 0x2e6a7067, 'hhhhhhhh', 0x6a31312e6a7067, '\r\nnnnnnn', 0x6a31312e6a7067, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_professional_details`
--
ALTER TABLE `t_professional_details`
  ADD PRIMARY KEY (`t_id`,`t_emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_professional_details`
--
ALTER TABLE `t_professional_details`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
