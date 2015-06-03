-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2015 at 05:10 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exhibition`
--
CREATE DATABASE IF NOT EXISTS `exhibition` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `exhibition`;

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
  `did` int(3) NOT NULL,
  `dname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subdomains`
--

CREATE TABLE IF NOT EXISTS `subdomains` (
  `sid` int(11) NOT NULL,
  `did` int(3) NOT NULL,
  `sname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE IF NOT EXISTS `userroles` (
  `rid` int(3) NOT NULL,
  `rolename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`rid`, `rolename`) VALUES
(1, 'companyPOC'),
(2, 'companyExecutive'),
(3, 'users'),
(4, 'superusers');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL,
  `rid` int(3) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `upwd` varchar(500) NOT NULL,
  `uemail` varchar(200) NOT NULL,
  `ucontact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
 ADD PRIMARY KEY (`did`), ADD KEY `did` (`did`);

--
-- Indexes for table `subdomains`
--
ALTER TABLE `subdomains`
 ADD PRIMARY KEY (`sid`), ADD KEY `did` (`did`), ADD KEY `did_2` (`did`), ADD KEY `did_3` (`did`), ADD KEY `did_4` (`did`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
 ADD PRIMARY KEY (`rid`), ADD KEY `rid` (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`uid`), ADD KEY `rid` (`rid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subdomains`
--
ALTER TABLE `subdomains`
ADD CONSTRAINT `subdomains_ibfk_1` FOREIGN KEY (`did`) REFERENCES `domains` (`did`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `userroles` (`rid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
