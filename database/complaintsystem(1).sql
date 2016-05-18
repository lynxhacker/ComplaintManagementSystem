-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2016 at 02:00 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaintsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `complaintid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `user`, `comment`, `complaintid`) VALUES
(3, 'asdf@gmail.com', 'this is true, especially in H7', 1),
(4, 'asdf@gmail.com', 'and the sockets too', 3),
(5, 'asdf@gmail.com', 'yeah. so pissed', 1),
(6, 'asdf@gmail.com', 'and the windiws', 3),
(7, 'llkk@gmail.com', 'dfghjkghnm', 5),
(8, 'dean@jkuat.ac.ke', 'Thank you for pointing out the issue. The estate department has been notified', 1),
(9, 'dvc@jkuat.ac.ke', 'Thanks, the security department is working on a strategy to address that/', 4);

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `cmplainid` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `forwaded` tinyint(1) NOT NULL DEFAULT '0',
  `addressed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`cmplainid`, `title`, `message`, `userid`, `forwaded`, `addressed`) VALUES
(1, 'Poor management of university toilets', 'I would like to point out a sanitary issue that has been affecting us and our community here in the university', 1, 1, 1),
(3, 'Lightening issues in NSC', 'This is to inform of the issues related to lightening', 1, 1, 1),
(4, 'Soldiers wana ujinga', 'this is an issue at the gate, especially gate c', 1, 1, 0),
(5, 'swimo', 'wertyuiosdfghjkl dfghjk rtyjk ertyui', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE `dean` (
  `deanid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`deanid`, `fname`, `lname`, `email`, `password`) VALUES
(2, 'kim', 'momo', 'dean@jkuat.ac.ke', 'fbc74a9e1a278687388486ed857c7c8243cd86ae');

-- --------------------------------------------------------

--
-- Table structure for table `dvc`
--

CREATE TABLE `dvc` (
  `dvcid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dvc`
--

INSERT INTO `dvc` (`dvcid`, `fname`, `lname`, `email`, `password`) VALUES
(2, 'pat', 'nah', 'dvc@jkuat.ac.ke', 'bf1be9fafa51ea154503f0a80e706d12e1ab9712');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `fname`, `lname`, `regno`, `email`, `password`) VALUES
(1, 'kim', 'momo', 'abc-001-6345/2013', 'asdf@gmail.com', '77add44f8f13cf5b3298a7833613aca42430386d'),
(2, 'lolo', 'ole', 'dit-002-3433/2014', 'ole@gmail.com', 'fc7bf8e3c68c2c1f8da9b53bfa62e7ff9ffb10f3'),
(3, 'kkk', 'lll', 'dit-334/2014', 'llkk@gmail.com', 'b8d09b4d8580aacbd9efc4540a9b88d2feb9d7e5');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `adminid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`adminid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`cmplainid`);

--
-- Indexes for table `dean`
--
ALTER TABLE `dean`
  ADD PRIMARY KEY (`deanid`);

--
-- Indexes for table `dvc`
--
ALTER TABLE `dvc`
  ADD PRIMARY KEY (`dvcid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`adminid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `cmplainid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dean`
--
ALTER TABLE `dean`
  MODIFY `deanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dvc`
--
ALTER TABLE `dvc`
  MODIFY `dvcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `adminid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
