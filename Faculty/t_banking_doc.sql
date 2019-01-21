-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2017 at 08:04 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

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
-- Table structure for table `t_banking_doc`
--

CREATE TABLE `t_banking_doc` (
  `t_id` int(11) NOT NULL,
  `t_emp_id` varchar(255) NOT NULL,
  `t_discipline` varchar(255) NOT NULL,
  `t_bank_name` varchar(255) NOT NULL,
  `t_acc_no` varchar(255) NOT NULL,
  `t_branch_ifsc` varchar(255) NOT NULL,
  `t_branch_name` varchar(255) NOT NULL,
  `t_adhar_no` varchar(255) NOT NULL,
  `t_pan_card_no` varchar(255) NOT NULL,
  `t_voter_id_no` varchar(255) NOT NULL,
  `t_gen_income_certi` varchar(255) NOT NULL,
  `t_gen_domi_certi` mediumblob NOT NULL,
  `t_oth_income_certi` mediumblob NOT NULL,
  `t_oth_domi_certi` mediumblob NOT NULL,
  `t_oth_caste_certi` mediumblob NOT NULL,
  `t_oth_caste_vali` mediumblob NOT NULL,
  `t_oth_non_creamy` mediumblob NOT NULL,
  `t_gen_income_name` varchar(255) NOT NULL,
  `t_gen_domi_name` varchar(255) NOT NULL,
  `t_other_income_name` varchar(255) NOT NULL,
  `t_oth_domi_name` varchar(255) NOT NULL,
  `t_oth_cast_name` varchar(255) NOT NULL,
  `t_oth_vali_name` varchar(255) NOT NULL,
  `t_gen_non_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_banking_doc`
--

INSERT INTO `t_banking_doc` (`t_id`, `t_emp_id`, `t_discipline`, `t_bank_name`, `t_acc_no`, `t_branch_ifsc`, `t_branch_name`, `t_adhar_no`, `t_pan_card_no`, `t_voter_id_no`, `t_gen_income_certi`, `t_gen_domi_certi`, `t_oth_income_certi`, `t_oth_domi_certi`, `t_oth_caste_certi`, `t_oth_caste_vali`, `t_oth_non_creamy`, `t_gen_income_name`, `t_gen_domi_name`, `t_other_income_name`, `t_oth_domi_name`, `t_oth_cast_name`, `t_oth_vali_name`, `t_gen_non_name`) VALUES
(1, '', '', 'Andhra Bank', '213', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '', '', 'Development Credit Bank', '5132', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '132', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '', '', '', '132', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '', '', '', '132', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '20150642', '', 'Bank of Maharashtra', '123654895235', '444422', '4444522', '444452', '44445456465', '4444123', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, '', '', 'Bank of Maharashtra', '12365489523', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, '', '', 'Bank of Maharashtra', '12365489523', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, '', '', 'Central Bank of India', '213', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, '', '', 'Federal Bank', '123456', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, '', '', 'Deutsche Bank', '12345678', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, '', '', 'Deutsche Bank', '12345678', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '', '', 'Indian Overseas Bank', '321', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, '', '', 'Indian Overseas Bank', '321', '657', 'dshbhbs', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '', '', 'City Union Bank', '963', '963', 'asdfghjkl', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, '', '', 'City Union Bank', '963', '963', 'asdfghjkl', '963', '963', '963', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, '', '', 'Bank of Maharashtra', '12345678910', '12345678910', 'shantanu', '122345678910', '12345678910', '12345678910', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, '', '', 'Federal Bank', '765656', '756477', 'jlbnfvkjbjvdb', '7464876', '74677467', '7654899', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, '', '', 'Bank of Maharashtra', '4566', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, '', '', 'Bank of India', '5351', '5416', 'bibik', '54135', '955', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, '', '', 'Bank of Maharashtra', '0987', '0987', 'hjvjhv', '0987', '0987', '0987', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_banking_doc`
--
ALTER TABLE `t_banking_doc`
  ADD PRIMARY KEY (`t_id`,`t_emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_banking_doc`
--
ALTER TABLE `t_banking_doc`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
