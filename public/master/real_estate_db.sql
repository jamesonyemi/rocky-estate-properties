-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 01:21 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbranches`
--

CREATE TABLE `tblbranches` (
  `bid` int(70) UNSIGNED NOT NULL,
  `bname` varchar(255) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblclients`
--

CREATE TABLE `tblclients` (
  `clientid` int(70) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `oname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `nationality` int(70) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone1` varchar(70) NOT NULL,
  `phone2` varchar(70) NOT NULL,
  `nok` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `nokphone` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblnationality`
--

CREATE TABLE `tblnationality` (
  `nid` int(70) UNSIGNED NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `id` int(70) UNSIGNED NOT NULL,
  `amt` decimal(18,2) NOT NULL,
  `receivedby` int(70) NOT NULL,
  `receivedfrom` varchar(255) NOT NULL,
  `paymentdate` date NOT NULL,
  `projectid` int(70) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `bankbranch` varchar(255) NOT NULL,
  `chequeno` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblproject`
--

CREATE TABLE `tblproject` (
  `pid` int(70) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `region` int(70) NOT NULL,
  `town` int(70) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `stage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblprojectdocs`
--

CREATE TABLE `tblprojectdocs` (
  `id` int(70) NOT NULL,
  `pid` int(70) NOT NULL,
  `docname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblprojectimage`
--

CREATE TABLE `tblprojectimage` (
  `id` int(70) UNSIGNED NOT NULL,
  `pid` int(70) NOT NULL,
  `img` varchar(255) NOT NULL,
  `vid` int(70) NOT NULL,
  `stage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblregion`
--

CREATE TABLE `tblregion` (
  `rid` int(70) UNSIGNED NOT NULL,
  `region` varchar(255) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblstage`
--

CREATE TABLE `tblstage` (
  `id` int(70) UNSIGNED NOT NULL,
  `amtspent` decimal(18,2) NOT NULL,
  `amtdetails` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbltitle`
--

CREATE TABLE `tbltitle` (
  `tid` int(70) UNSIGNED NOT NULL,
  `salutation` varchar(255) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbltown`
--

CREATE TABLE `tbltown` (
  `tid` int(70) UNSIGNED NOT NULL,
  `region` int(70) NOT NULL,
  `town` varchar(255) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(70) UNSIGNED NOT NULL,
  `branch` int(70) NOT NULL,
  `usertype` int(70) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblvisit`
--

CREATE TABLE `tblvisit` (
  `vid` int(70) UNSIGNED NOT NULL,
  `vdate` date NOT NULL,
  `vtime` varchar(255) NOT NULL,
  `vnumber` int(70) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbranches`
--
ALTER TABLE `tblbranches`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `tblclients`
--
ALTER TABLE `tblclients`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `tblnationality`
--
ALTER TABLE `tblnationality`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproject`
--
ALTER TABLE `tblproject`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tblprojectimage`
--
ALTER TABLE `tblprojectimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblregion`
--
ALTER TABLE `tblregion`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tblstage`
--
ALTER TABLE `tblstage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltitle`
--
ALTER TABLE `tbltitle`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `tbltown`
--
ALTER TABLE `tbltown`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvisit`
--
ALTER TABLE `tblvisit`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbranches`
--
ALTER TABLE `tblbranches`
  MODIFY `bid` int(70) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblclients`
--
ALTER TABLE `tblclients`
  MODIFY `clientid` int(70) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblnationality`
--
ALTER TABLE `tblnationality`
  MODIFY `nid` int(70) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `id` int(70) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproject`
--
ALTER TABLE `tblproject`
  MODIFY `pid` int(70) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblprojectimage`
--
ALTER TABLE `tblprojectimage`
  MODIFY `id` int(70) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblregion`
--
ALTER TABLE `tblregion`
  MODIFY `rid` int(70) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstage`
--
ALTER TABLE `tblstage`
  MODIFY `id` int(70) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbltitle`
--
ALTER TABLE `tbltitle`
  MODIFY `tid` int(70) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbltown`
--
ALTER TABLE `tbltown`
  MODIFY `tid` int(70) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(70) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblvisit`
--
ALTER TABLE `tblvisit`
  MODIFY `vid` int(70) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
