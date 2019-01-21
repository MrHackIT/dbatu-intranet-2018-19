-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2017 at 10:18 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `faculty`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_banking_doc`
--

CREATE TABLE IF NOT EXISTS `t_banking_doc` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `t_edu_details`
--

CREATE TABLE IF NOT EXISTS `t_edu_details` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_edu_details`
--

INSERT INTO `t_edu_details` (`t_id`, `t_emp_id`, `t_discipline`, `t_score_10`, `t_score_12`, `t_btech_marks`, `t_mtech_marks`, `t_phd_marks`, `t_passing_10`, `t_passing_12`, `t_passing_btech`, `t_passing_mtech`, `t_passing_phd`, `t_passing_university_10`, `t_passing_university_12`, `t_passing_university_btech`, `t_passing_university_mtech`, `t_passing_university_phd`, `t_fields_experties`, `t_other_activity`) VALUES
(1, '20140630', '', '3.4', '100', '5.6', '5.6', '5.6', '7.6', '7.6', '5.6', '5.6', '5.6', '', 0, 'hjhghj', 'hjhk', '5.6', 'vbnn', 'asfasf'),
(2, '', '', '45', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_personal_details`
--

CREATE TABLE IF NOT EXISTS `t_personal_details` (
`t_id` int(10) NOT NULL,
  `t_emp_id` varchar(255) NOT NULL,
  `t_full_name` varchar(255) NOT NULL,
  `t_discipline` varchar(255) NOT NULL,
  `t_designation` varchar(255) NOT NULL,
  `t_gender` text NOT NULL,
  `t_dob` varchar(255) NOT NULL,
  `t_email` varchar(255) NOT NULL,
  `t_contact` varchar(255) NOT NULL,
  `t_blood_group` varchar(255) NOT NULL,
  `t_category` varchar(255) NOT NULL,
  `t_address` varchar(255) NOT NULL,
  `t_profile_photo` mediumblob NOT NULL,
  `t_pofile_photo_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `t_personal_details`
--

INSERT INTO `t_personal_details` (`t_id`, `t_emp_id`, `t_full_name`, `t_discipline`, `t_designation`, `t_gender`, `t_dob`, `t_email`, `t_contact`, `t_blood_group`, `t_category`, `t_address`, `t_profile_photo`, `t_pofile_photo_name`) VALUES
(3, '20150782', 'Datta lahu Mudgal', 'IT', 'abc', 'male', '1972-07-20', 'dattamudgal@gmail.com', '7350076668', 'o+', 'obc', 'Shri Niwas Nagar,Ausa', '', ''),
(4, 'hbvahdh', 'jsdgf', 'EXTC', 'hah', 'female', '2017-03-18', '156616586655', 'gsfhgzgh@gmail.com', 'o-', 'vj', 'yeauygugygdhgh', '', ''),
(5, '20150774', 'Bhagyashri Dashapande', 'IT', 'and', 'female', '1997-02-06', 'Bhagyades@gamil.com', '9881299688', 'o+', 'general', 'Roha,Dist...Raigad', '', ''),
(6, '201503180', 'kirti sonwalkar', 'EXTC', 'vvv', 'female', '1997-05-25', '9503888482', 'kirtisonwalkar@gmail.com', 'b+', 'nt', '', '', ''),
(7, 'dfhgh', 'gdfghdah', 'CIVIL', 'adgh', 'female', '2015-12-20', '8055879632', 'hdshghj@gmail.com', 'o+', 'sc', 'hdfhh', 0x4172726179, 'batu222.jpg'),
(8, '20130780', 'shantanu more', 'IT', 'sms', 'male', '1995-05-21', '9885623147', 'shantanumore@gmail.com', 'a+', 'general', 'Pune...', 0x4172726179, 'batu222.jpg'),
(9, '20150772', 'pooja bhaware', 'IT', 'pc', 'female', '1996-03-28', '8692533125', 'poojabhaware@gmail.com', 'a-', 'sc', 'Nanded', 0x4172726179, 'batu222.jpg'),
(10, '20150772', 'pooja bhaware', 'IT', 'pc', 'female', '1996-03-28', '8692533125', 'poojabhaware@gmail.com', 'a-', 'sc', '', 0x4172726179, 'batu222.jpg'),
(11, '', '', 'IT', '', '', '', '', '', '', '', '', 0x4172726179, ''),
(12, '', '', 'IT', '', '', '', '', '', '', '', '', 0x4172726179, ''),
(13, '', '', 'IT', '', '', '', '', '', '', '', '', 0x4172726179, ''),
(14, '', '', 'IT', '', '', '', '', '', '', '', '', 0x4172726179, ''),
(15, 'fdh', 'fhhd', 'IT', '', '', '', '', '', '', '', '', 0x4172726179, ''),
(16, '20140779', 'sushma kure', 'IT', 'rrr', 'female', '1995-01-02', '9059623417', 'sushmakure@gmail.com', 'a+', 'general', 'latur.....', 0x4172726179, 'batulogo.png'),
(17, '20140609', 'sumedha deshpande', 'COMPUTER', 'sd', 'female', '1996-08-13', '9602458231', 'sumedhadeshpande@gmail.com', 'a+', 'general', 'Shrivardhan,Raigad', 0x4172726179, 'batulogo.png'),
(18, 'hrjjhgjes', 'ygriueu', 'ELECTRICAL', 'rhjejhjh', 'female', '1888-02-10', 'fjhdjsjf@gmail.com', '323222231356565', 'o-', 'st', 'hgfhdjs', 0x4172726179, 'index.jpg'),
(19, '1972', 'Datta Mudgal', '', 'ddd', '', '1972-07-20', 'dattamudgal@gmail.com', '', '', '', '', '', '3.jpg'),
(20, '20150774', 'Bhagyashri Dashapande', 'IT', 'and', 'female', '1997-02-06', 'Bhagyades@gamil.com', '9881299688', 'o+', 'general', 'Roha,Dist...Raigad', '', 'batulogo.png'),
(21, '2001', 'pravin datta mudgal', '', 'gdg', '', '2001-04-06', 'pravinmudgal@gmail.com', '', 'o+', 'general', '', '', 'batulogo.png'),
(22, '20150781', 'priya datta mudgal', 'IT', 'ppp', 'female', '1997-02-19', 'priyamudgal1996@gmail.com', '9503285485', 'o+', 'general', 'shri Nivas Nagar,Ausa', '', '.jpg'),
(23, '20150787', 'vaishali anant patil', 'IT', 'aa', 'female', '1992-11-26', 'vaishalipatil@gmail.com', '444545544878787', 'o+', 'st', 'Alibag', '', '20150787.jpg'),
(24, '20150784', 'teju Naphade', 'IT', 'ttt', 'female', '1996-12-13', 'tejunaphade@gmail.com', '9605886599', 'a+', 'obc', 'Buldhana', '', '20150784.jpg'),
(25, '20150776', 'gaytri tukaram jadhav', 'IT', 'vvv', 'female', '1995-05-17', 'gaytrijadhav@gmail.com', '9586732866', 'a+', 'obc', 'Ahmadnagar', '', '20150776.jpg'),
(26, '20150776', 'gaytri tukaram jadhav', 'IT', 'vvv', 'female', '1995-05-17', 'gaytrijadhav@gmail.com', '9586732866', 'a+', 'obc', 'Ahmadnagar', '', '20150776.jpg'),
(27, '20150779', 'rasika natin mahadik', 'IT', 'gfgsdhg', 'female', '1997-02-24', 'rasikamahadik@gmail.com', '9658352844', 'a+', 'obc', 'Mahad', '', '20150779.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_professional_details`
--

CREATE TABLE IF NOT EXISTS `t_professional_details` (
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
  `t_nat_phd` mediumblob NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `t_professional_details`
--

INSERT INTO `t_professional_details` (`t_id`, `t_emp_id`, `t_discipline`, `t_award_desc`, `t_award`, `t_conference_desc`, `t_conference`, `t_current_mem_desc`, `t_current_mem`, `t_past_mem_desc`, `t_past_mem`, `t_cur_project_desc`, `t_cur_project`, `t_past_project_desc`, `t_past_project`, `t_inter_research_desc`, `t_inter_research`, `t_nat_research_desc`, `t_nat_research`, `t_inter_phd_desc`, `t_inter_phd`, `t_nat_phd_desc`, `t_nat_phd`) VALUES
(21, 20150774, '', 'Shantanu', '', 'Confrereerer', '', 'tantanu', '', 'poiuytyt', '', 'lkjhgf', '', 'lkjhgf', '', 'mnbvcx', '', 'popopopo', '', 'jkhjn', '', 'gfvhgb', ''),
(34, 20150781, '', 'Priya Mudgal', '', 'nn', '', 'pp', '', 'ppp', '', 'oo', '', 'vv', '', 'ooo', '', 'ii', '', 'njnj', '', 'bb', ''),
(71, 20150786, '', 'Vaishali A Patil', '', 'Efgh', '', 'ijkl', '', 'mnop', '', 'uvwx', '', 'yzzzz', '', 'ooooo', '', 'vvvvvv', '', 'ppppppppppp', '', 'aaaaaaaa', ''),
(72, 20150789, '', 'aaaaaaaaaa', 0x6a31302e6a7067, 'bbbbbbbbbb', 0x6a31302e6a7067, 'cccccccccc', 0x6a392e6a7067, 'dddddddd', 0x6a32302e6a7067, 'dddddddddd', 0x6a31312e6a7067, 'eeeeeeeee\r\n', 0x6a31312e6a7067, 'fffff', 0x6a31312e6a7067, 'ggggggggg', 0x2e6a7067, 'hhhhhhhh', 0x6a31312e6a7067, '\r\nnnnnnn', 0x6a31312e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_banking_doc`
--
ALTER TABLE `t_banking_doc`
 ADD PRIMARY KEY (`t_id`,`t_emp_id`);

--
-- Indexes for table `t_edu_details`
--
ALTER TABLE `t_edu_details`
 ADD PRIMARY KEY (`t_id`,`t_emp_id`);

--
-- Indexes for table `t_personal_details`
--
ALTER TABLE `t_personal_details`
 ADD PRIMARY KEY (`t_id`,`t_emp_id`);

--
-- Indexes for table `t_professional_details`
--
ALTER TABLE `t_professional_details`
 ADD PRIMARY KEY (`t_id`,`t_emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_banking_doc`
--
ALTER TABLE `t_banking_doc`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `t_edu_details`
--
ALTER TABLE `t_edu_details`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_personal_details`
--
ALTER TABLE `t_personal_details`
MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `t_professional_details`
--
ALTER TABLE `t_professional_details`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
