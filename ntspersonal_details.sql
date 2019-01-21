-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 12:02 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

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
-- Table structure for table `t_personal_details`
--

CREATE TABLE `ntspersonal_details` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_personal_details`
--

INSERT INTO `ntspersonal_details` (`t_id`, `t_emp_id`, `t_full_name`, `t_discipline`, `t_designation`, `t_gender`, `t_dob`, `t_email`, `t_contact`, `t_blood_group`, `t_category`, `t_address`, `t_profile_photo`, `t_pofile_photo_name`) VALUES
(3, '20150782', 'Datta lahu Mudgal', 'IT', 'abc', 'male', '1972-07-20', 'dattamudgal@gmail.com', '7350076668', 'o+', 'obc', 'Shri Niwas Nagar,Ausa', '', ''),
(4, 'hbvahdh', 'jsdgf', 'EXTC', 'hah', 'female', '2017-03-18', '156616586655', 'gsfhgzgh@gmail.com', 'o-', 'vj', 'yeauygugygdhgh', '', ''),
(5, '20150774', 'Bhagyashri Dashapande', 'IT', 'and', 'female', '1997-02-06', 'Bhagyades@gamil.com', '9881299688', 'o+', 'general', 'Roha,Dist...Raigad', '', ''),
(6, '201503180', 'kirti sonwalkar', 'EXTC', 'vvv', 'female', '1997-05-25', '9503888482', 'kirtisonwalkar@gmail.com', 'b+', 'nt', '', '', ''),
(7, 'dfhgh', 'gdfghdah', 'CIVIL', 'adgh', 'female', '2015-12-20', '8055879632', 'hdshghj@gmail.com', 'o+', 'sc', 'hdfhh', 0x4172726179, 'batu222.jpg'),
(8, '123', 'shantanu more', 'IT', 'sms', 'male', '1995-05-21', '9885623147', 'shantanumore@gmail.com', 'a+', 'general', 'Pune...', 0x4172726179, 'batu222.jpg'),
(9, '20150772', 'pooja bhaware', 'IT', 'pc', 'female', '1996-03-28', '8692533125', 'poojabhaware@gmail.com', 'a-', 'sc', 'Nanded', 0x4172726179, 'batu222.jpg'),
(10, '20150772', 'pooja bhaware', 'IT', 'pc', 'female', '1996-03-28', '8692533125', 'poojabhaware@gmail.com', 'a-', 'sc', '', 0x4172726179, 'batu222.jpg'),
(11, '', 'Vice Ci5ty', '', 'Ad Hoc Assistant Professor', 'male', '1990-02-02', 'a@asdadsf.in', '55555555555', 'o+', 'sc', 'adsfasdfasdfasdf', '', ''),
(12, '', 'Vice Ci5ty', '', 'Ad Hoc Assistant Professor', 'male', '1990-02-02', 'a@asdadsf.in', '55555555555', 'o+', 'sc', 'adsfasdfasdfasdf', '', ''),
(13, '', 'Vice Ci5ty', '', 'Ad Hoc Assistant Professor', 'male', '1990-02-02', 'a@asdadsf.in', '55555555555', 'o+', 'sc', 'adsfasdfasdfasdf', '', ''),
(14, '', 'Vice Ci5ty', '', 'Ad Hoc Assistant Professor', 'male', '1990-02-02', 'a@asdadsf.in', '55555555555', 'o+', 'sc', 'adsfasdfasdfasdf', '', ''),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_personal_details`
--
ALTER TABLE `ntspersonal_details`
  ADD PRIMARY KEY (`t_id`,`t_emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_personal_details`
--
ALTER TABLE `ntspersonal_details`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
