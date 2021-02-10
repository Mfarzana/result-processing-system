-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2016 at 10:03 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

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
(2, 'Networking', 'CSE312', 3),
(3, 'Numerical Method', 'CSE313', 3);

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
(1, 5, 12, 5, 5, 22, 35, 70, 'A-', 3.5, 4, 'CSE311', '152-15-5892'),
(2, 5, 12, 5, 5, 22, 40, NULL, NULL, NULL, 5, 'CSE312', '152-15-5892'),
(3, 5, 12, 5, 5, 18, 35, NULL, NULL, NULL, 4, 'CSE313', '152-15-5892'),
(4, 4, 5, 5, 3, 24, 38, NULL, NULL, NULL, 6, 'CSE333', '152-15-5892'),
(5, 4, 5, 5, 5, 24, 30, 73, 'A-', NULL, 6, 'CSE333', '152-15-5896'),
(6, 3, 14, 2, 5, 13, 38, 75, 'A', NULL, 4, 'CSE111', '152-15-5959'),
(7, 3, 5, 6, 5, 43, 4, 66, 'B+', NULL, 4, 'volvo', '34126'),
(8, 5, 15, 5, 5, 23, 39, 92, 'A+', NULL, 4, 'CSE335', '152-15-5896'),
(9, 5, 15, 5, 5, 23, 39, 92, 'A+', NULL, 4, 'CSE335', '152-15-5896'),
(10, 12, 21, 2, 2, 21, 32, 90, 'A+', NULL, 2, '', '321'),
(11, 5, 12, 4, 5, 19, 40, 85, 'A+', NULL, 4, 'CSE311', '152-15-5892'),
(12, 2, 2, 2, 2, 12, 40, 60, 'B', NULL, 1, 'CSE312', '152-15-5892');

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
  `User_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `CourseDetail_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `Marks_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `studentdetail`
--
ALTER TABLE `studentdetail`
  MODIFY `StudentDetail_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `User_id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
