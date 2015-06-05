-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2015 at 11:19 AM
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

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `addCompany`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addCompany`(IN `sid_i` INT(11), IN `cname_i` VARCHAR(200), IN `cabout_i` VARCHAR(1000), IN `primarypocuname_i` VARCHAR(200), IN `primarypocfname_i` VARCHAR(200), IN `primarypoclname_i` VARCHAR(200), IN `primarypocemail_i` VARCHAR(200), IN `primarypocpwd_i` VARCHAR(200), IN `primarypoccontact_i` VARCHAR(200))
    NO SQL
BEGIN
Declare primarypocuid_d int;
 DECLARE rid_d  INT;
 
 	
SET rid_d=1;

 
 insert into users(rid,uname,ufname,ulname,uemail,upwd,ucontact) values(rid_d,primarypocuname_i,primarypocfname_i,primarypoclname_i,primarypocemail_i,primarypocpwd_i,primarypoccontact_i);

SET primarypocuid_d=LAST_INSERT_ID();
 

insert into companies(sid,cname,cabout,primarypocuid,primarypocuname,primarypocfname,primarypoclname,primarypocemail,primarypocpwd,primarypoccontact) values(sid_i,cname_i,cabout_i,primarypocuid_d,primarypocuname_i,primarypocfname_i,primarypoclname_i,primarypocemail_i,primarypocpwd_i,primarypoccontact_i);


END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ciduidlist`
--

DROP TABLE IF EXISTS `ciduidlist`;
CREATE TABLE IF NOT EXISTS `ciduidlist` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
`cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `cabout` varchar(1000) NOT NULL,
  `primarypocuid` int(11) NOT NULL,
  `primarypocuname` varchar(200) NOT NULL,
  `primarypocfname` varchar(200) NOT NULL,
  `primarypoclname` varchar(200) NOT NULL,
  `primarypocemail` varchar(200) NOT NULL,
  `primarypocpwd` varchar(200) NOT NULL,
  `primarypoccontact` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`cid`, `sid`, `cname`, `cabout`, `primarypocuid`, `primarypocuname`, `primarypocfname`, `primarypoclname`, `primarypocemail`, `primarypocpwd`, `primarypoccontact`) VALUES
(1, 2, 'Google Inc.', 'about rigoogle', 23, 'dilip', 'Dilip', 'Bhasme', 'dilip@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', '9813013201');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

DROP TABLE IF EXISTS `docs`;
CREATE TABLE IF NOT EXISTS `docs` (
`docid` int(20) NOT NULL,
  `pidlist` varchar(1000) NOT NULL COMMENT 'list of product ids to which this doc belongs to',
  `cidlist` varchar(1000) NOT NULL COMMENT 'list of company ids which have this doc',
  `docname` varchar(100) NOT NULL,
  `docvalue` varchar(2000) NOT NULL COMMENT 'folder/url/text'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

DROP TABLE IF EXISTS `domains`;
CREATE TABLE IF NOT EXISTS `domains` (
  `did` int(3) NOT NULL,
  `dname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`did`, `dname`) VALUES
(214, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
`imgid` int(20) NOT NULL,
  `pidlist` varchar(1000) NOT NULL COMMENT 'list of product ids to which this image belongs to',
  `cidlist` varchar(1000) NOT NULL COMMENT 'list of company ids which have this image',
  `imgname` varchar(100) NOT NULL,
  `imgvalue` varchar(2000) NOT NULL COMMENT 'folder/url/text'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
`pid` int(11) NOT NULL,
  `psetid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `pdesc` varchar(2000) NOT NULL,
  `ptagslist` varchar(1000) NOT NULL,
  `pdocslist` varchar(1000) NOT NULL,
  `pimglist` varchar(1000) NOT NULL,
  `pvidlist` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subdomains`
--

DROP TABLE IF EXISTS `subdomains`;
CREATE TABLE IF NOT EXISTS `subdomains` (
  `sid` int(11) NOT NULL,
  `did` int(3) NOT NULL,
  `sname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subdomains`
--

INSERT INTO `subdomains` (`sid`, `did`, `sname`) VALUES
(1, 214, 'subdomain1'),
(2, 214, 'subdomain2'),
(3, 214, 'sd3'),
(4, 214, 'sd4');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
`tid` int(20) NOT NULL,
  `pidlist` varchar(1000) NOT NULL COMMENT 'list of product ids to which this tag belongs to',
  `cidlist` varchar(1000) NOT NULL COMMENT 'list of company ids which have this tag',
  `tname` varchar(100) NOT NULL,
  `tvalue` varchar(2000) NOT NULL COMMENT 'folder/url/text'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

DROP TABLE IF EXISTS `userroles`;
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

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`uid` int(11) NOT NULL,
  `rid` int(3) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `uemail` varchar(200) NOT NULL,
  `upwd` varchar(500) NOT NULL,
  `ufname` varchar(200) NOT NULL,
  `ulname` varchar(200) NOT NULL,
  `ucontact` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `rid`, `uname`, `uemail`, `upwd`, `ufname`, `ulname`, `ucontact`) VALUES
(15, 4, 'tk26', 'tejas.kumthekar26@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 'Tejas', 'Kumthekar', '1111111111'),
(16, 3, 'hitu', 'hitu404@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 'Hitesh', 'Mirchandani', '22222222'),
(17, 3, 'seog', 'seo@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 'Seo', 'Gregory', '98123071112'),
(19, 3, 'sbs', 'bhushan@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 'Bhushan', 'Sasmal', '9801291313'),
(21, 3, 'chota', 'sushant@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 'Sushant', 'Gaikwad', '98013700123'),
(22, 3, 'eden', 'eden@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 'Eden', 'Hazard', '978971329'),
(23, 1, 'dilip', 'dilip@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', 'Dilip', 'Bhasme', '9813013201');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
`vidid` int(20) NOT NULL,
  `pidlist` varchar(1000) NOT NULL COMMENT 'list of product ids to which this video belongs to',
  `cidlist` varchar(1000) NOT NULL COMMENT 'list of company ids which have this video',
  `vidname` varchar(100) NOT NULL,
  `vidvalue` varchar(2000) NOT NULL COMMENT 'folder/url/text'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
 ADD PRIMARY KEY (`cid`), ADD KEY `sid` (`sid`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
 ADD PRIMARY KEY (`docid`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
 ADD PRIMARY KEY (`did`), ADD KEY `did` (`did`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`imgid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`pid`), ADD KEY `cid` (`cid`);

--
-- Indexes for table `subdomains`
--
ALTER TABLE `subdomains`
 ADD PRIMARY KEY (`sid`), ADD KEY `did` (`did`), ADD KEY `did_2` (`did`), ADD KEY `did_3` (`did`), ADD KEY `did_4` (`did`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
 ADD PRIMARY KEY (`rid`), ADD KEY `rid` (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `uemail` (`uemail`), ADD KEY `rid` (`rid`), ADD KEY `rid_2` (`rid`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
 ADD PRIMARY KEY (`vidid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
MODIFY `docid` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `imgid` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `tid` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
MODIFY `vidid` int(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `subdomains` (`sid`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `companies` (`cid`);

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
