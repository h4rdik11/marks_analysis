-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2017 at 09:45 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mgmt_system`
--
CREATE DATABASE IF NOT EXISTS `mgmt_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mgmt_system`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `emailid` varchar(90) NOT NULL,
  `pwd` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`firstname`, `lastname`, `emp_id`, `phone`, `emailid`, `pwd`) VALUES
('Lalit', 'Litt', 'emp1', '9999999999', 'lalit@cdac.in', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `duration` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `course_name`, `duration`) VALUES
('MCA', 'MCA', 3),
('MTECH-CS', 'M.Tech (CS)', 2),
('MTECH-VLSI', 'M.Tech(VLSI)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `sno` int(10) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `teacher_id` varchar(150) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  `internal_10` int(10) NOT NULL,
  `internal_15` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `final` int(1) NOT NULL DEFAULT '0',
  `sem` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`sno`, `student_id`, `teacher_id`, `sub_id`, `internal_10`, `internal_15`, `total`, `final`, `sem`) VALUES
(1, '0211', 'emp2', 'MCA204', 10, 10, 20, 0, 4),
(2, '0258', 'emp2', 'MCA204', 10, 10, 20, 0, 4),
(3, '02611804415', 'emp2', 'MCA204', 10, 10, 20, 0, 4),
(4, '03011804415', 'emp2', 'MCA204', 10, 10, 20, 0, 4),
(5, '03111804415', 'emp2', 'MCA204', 10, 10, 20, 0, 4),
(6, '0211', 'emp2', 'MCA206', 0, 0, 0, 0, 4),
(7, '0258', 'emp2', 'MCA206', 0, 0, 0, 0, 4),
(8, '02611804415', 'emp2', 'MCA206', 0, 0, 0, 0, 4),
(9, '03011804415', 'emp2', 'MCA206', 0, 0, 0, 0, 4),
(10, '03111804415', 'emp2', 'MCA206', 0, 0, 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sno` int(10) NOT NULL,
  `id` varchar(15) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `sem` int(1) NOT NULL,
  `course` varchar(10) NOT NULL,
  `batch` varchar(15) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(90) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_login` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sno`, `id`, `fname`, `lname`, `sem`, `course`, `batch`, `contact`, `gender`, `email`, `address`, `password`, `first_login`) VALUES
(1, '0211', 'Hardik', 'Chauhan', 4, 'MCA', '2015-2017', '9971871781', 'male', 'hardik11.chauhan@gmail.com', '15/24 Sector : 15, Vasundhara\nVasundhara', 'Hardik@1781', 0),
(9, '0258', 'Vaibhav', '', 4, 'MCA', '2015-2018', '9971871781', 'male', 'hardik11.chauhan@gmail.com', '15/24 Sector : 15, Vasundhara\nVasundhara', 'Vaibhav1781', 1),
(10, '02611804415', 'Ishaan', 'Po', 4, 'MCA', '2015-2018', '9971871782', 'male', 'hardik11.chauhan@gmail.com', '15/24 Sector : 15, Vasundhara\nVasundhara', 'Ishaan1781', 1),
(2, '03011804415', 'Manish', 'Yadav', 4, 'MCA', '2015-2018', '9971871781', 'male', 'hardik11.chauhan@gmail.com', '15/24 Sector : 15, Vasundhara\nVasundhara', 'Manish1781', 1),
(5, '03111804415', 'Mukesh', 'Negi', 4, 'MCA', '2015-2018', '9971871781', 'male', 'hardik11.chauhan@gmail.com', '15/24 Sector : 15, Vasundhara\nVasundhara', 'Mukesh1781', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` varchar(30) NOT NULL,
  `sub_name` varchar(150) NOT NULL,
  `course` varchar(10) NOT NULL,
  `sem` int(2) NOT NULL,
  `empid` varchar(30) DEFAULT NULL,
  `sub_credit` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `course`, `sem`, `empid`, `sub_credit`) VALUES
('MCA101', 'Programming In C', 'MTECH-CS', 1, 'emp2', 4),
('MCA102', 'Programming in Java', 'MTECH-CS', 1, 'emp2', 4),
('MCA201', 'ACN', 'MTECH-VLSI', 4, 'emp1', 4),
('MCA202', 'DWDM', 'MCA', 4, 'emp1', 4),
('MCA204', 'Design and Analysis of Algorithms', 'MCA', 4, 'emp2', 4),
('MCA206', 'Software Engineering', 'MCA', 4, 'emp2', 4),
('MTEACH201', 'Chip Design', 'MTECH-VLSI', 1, 'emp2', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `sno` int(10) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `emailid` varchar(90) NOT NULL,
  `pwd` varchar(90) NOT NULL,
  `yearjoin` date NOT NULL,
  `designation` varchar(30) NOT NULL,
  `first_login` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`sno`, `firstname`, `lastname`, `emp_id`, `dept`, `phone`, `emailid`, `pwd`, `yearjoin`, `designation`, `first_login`) VALUES
(3, 'Lalit', 'Litt', 'emp1', 'Admin', '9999999990', 'litt@cdac.com', 'Lalit9999', '0000-00-00', 'Admin', 1),
(2, 'Vinod', 'Kumar', 'emp2', 'IT', '9999999999', 'vk@demo.com', 'Vinod9999', '0000-00-00', 'Professor', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `sno` (`sno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sno` (`sno`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `empid` (`empid`),
  ADD KEY `course` (`course`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
