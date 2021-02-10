-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2016 at 07:33 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resultprocessingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursedetail`
--

CREATE TABLE `coursedetail` (
  `CourseDetail_Id` bigint(20) NOT NULL,
  `CourseDetail_courseName` varchar(100) NOT NULL,
  `CourseDetail_courseCode` varchar(30) NOT NULL,
  `CourseDetail_courseCredit` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursedetail`
--

INSERT INTO `coursedetail` (`CourseDetail_Id`, `CourseDetail_courseName`, `CourseDetail_courseCode`, `CourseDetail_courseCredit`) VALUES
(1, 'Database Management System', 'CSE311', 3),
(2, 'Computer Network', 'CSE312', 3),
(3, 'Numerical Method', 'CSE313', 3),
(4, 'Database Management System Lab', 'CSE311L', 1),
(5, 'Computer Network Lab', 'CSE312L', 1),
(6, 'Computer Architecture', 'CSE332', 3);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `Marks_id` bigint(20) NOT NULL,
  `Marks_attandence` float DEFAULT NULL,
  `Marks_ClassTestAvg` float DEFAULT NULL,
  `Marks_presentation` float DEFAULT NULL,
  `Marks_assignment` float DEFAULT NULL,
  `Marks_midExam` float DEFAULT NULL,
  `Marks_finalExam` float DEFAULT NULL,
  `Marks_total` float DEFAULT NULL,
  `Marks_grade` varchar(20) DEFAULT NULL,
  `Marks_GPA` float DEFAULT NULL,
  `Marks_courseSemester` int(20) NOT NULL,
  `CourseDetail_courseCode` varchar(30) NOT NULL,
  `StudentDetail_studentId` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`Marks_id`, `Marks_attandence`, `Marks_ClassTestAvg`, `Marks_presentation`, `Marks_assignment`, `Marks_midExam`, `Marks_finalExam`, `Marks_total`, `Marks_grade`, `Marks_GPA`, `Marks_courseSemester`, `CourseDetail_courseCode`, `StudentDetail_studentId`) VALUES
(1, 5, 13, 5, 4, 23, 35, 85, 'A+', 4, 5, 'CSE311', '152-15-5892'),
(14, 5, 10, 4, 5, 22, 38, 84, 'A+', 4, 5, 'CSE312', '152-15-5892'),
(15, 6, 8, 3, 3, 15, 30, 65, 'B+', 3.25, 5, 'CSE313', '152-15-5892'),
(16, 5, 2, 4, 5, 8, 25, 49, 'C', 2.25, 5, 'CSE311L', '152-15-5892'),
(17, 5, 5, 5, 5, 17, 35, 72, 'A-', 3.5, 5, 'CSE312L', '152-15-5892'),
(18, 5, 5, 5, 2, 5, 30, 52, 'C+', 2.5, 5, 'CSE332', '152-15-5892');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetail`
--

CREATE TABLE `studentdetail` (
  `StudentDetail_id` bigint(20) NOT NULL,
  `StudentDetail_studentId` varchar(50) NOT NULL,
  `StudentDetail_name` varchar(200) NOT NULL,
  `StudentDetail_address` varchar(200) NOT NULL,
  `StudentDetail_DOB` date NOT NULL,
  `StudentDetail_mobileNo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdetail`
--

INSERT INTO `studentdetail` (`StudentDetail_id`, `StudentDetail_studentId`, `StudentDetail_name`, `StudentDetail_address`, `StudentDetail_DOB`, `StudentDetail_mobileNo`) VALUES
(1, '152-15-5892', 'Hossain', 'Comilla', '1992-10-24', '01800000000');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `User_id` bigint(20) NOT NULL,
  `User_userName` varchar(30) NOT NULL,
  `User_fullName` varchar(50) NOT NULL,
  `User_stuffID` int(11) NOT NULL,
  `User_password` varchar(30) NOT NULL,
  `User_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`User_id`, `User_userName`, `User_fullName`, `User_stuffID`, `User_password`, `User_role`) VALUES
(1, 'Admin', 'Admin User', 101, 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursedetail`
--
ALTER TABLE `coursedetail`
  ADD PRIMARY KEY (`CourseDetail_Id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`Marks_id`);

--
-- Indexes for table `studentdetail`
--
ALTER TABLE `studentdetail`
  ADD PRIMARY KEY (`StudentDetail_id`,`StudentDetail_studentId`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coursedetail`
--
ALTER TABLE `coursedetail`
  MODIFY `CourseDetail_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `Marks_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `studentdetail`
--
ALTER TABLE `studentdetail`
  MODIFY `StudentDetail_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `User_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
