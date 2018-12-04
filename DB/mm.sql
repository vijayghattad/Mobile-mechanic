-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2018 at 02:11 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aemail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aemail`, `password`) VALUES
('admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
('admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `customer_reg`
--

DROP TABLE IF EXISTS `customer_reg`;
CREATE TABLE IF NOT EXISTS `customer_reg` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `cemail` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL,
  `cphone` varchar(15) NOT NULL,
  `ccity` varchar(50) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `emergencycontact` varchar(15) NOT NULL,
  PRIMARY KEY (`cemail`),
  KEY `id` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_reg`
--

INSERT INTO `customer_reg` (`cid`, `cname`, `gender`, `cemail`, `cpassword`, `cphone`, `ccity`, `pincode`, `emergencycontact`) VALUES
(2, 'Akshaykumar chavan', 'Male', 'akshayc656@gmail.com', '3c0d0c79d44d027e0c74704930b760dd', '8746880431', 'Hubballi', '580030', '8746880431'),
(4, 'anish', 'Female', 'anish@gmail.com', '7f266025dc45f2e14b2415f475cce468', '9876543210', 'Hubballi', '580021', '7891234560');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic_reg`
--

DROP TABLE IF EXISTS `mechanic_reg`;
CREATE TABLE IF NOT EXISTS `mechanic_reg` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `mname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mphone` varchar(15) NOT NULL,
  `memail` varchar(50) NOT NULL,
  `mpassword` varchar(50) NOT NULL,
  `shopaddress` varchar(50) NOT NULL,
  `maadhar` varchar(20) NOT NULL,
  `mpan` varchar(10) NOT NULL,
  `drivinglicence` varchar(20) NOT NULL,
  PRIMARY KEY (`memail`),
  KEY `mid` (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mechanic_reg`
--

INSERT INTO `mechanic_reg` (`mid`, `mname`, `gender`, `mphone`, `memail`, `mpassword`, `shopaddress`, `maadhar`, `mpan`, `drivinglicence`) VALUES
(10, 'ashwin', 'Male', '9886555843', 'ashwin@gmail.com', '7cb6fa91c124913f7a75e3153339234f', '2nd main, basaveshwar nagar bagalkot', '456789031254', '15cyepl34', 'ka2520174587'),
(11, 'vijay', 'Male', '8976988003', 'vbg@gmail.com', 'dea172e4fc1b463ae0f9e457fcbaab06', '2nd main 3rd cross kuvempu nagar, Bangalore', '897623456778', '15cyepl12', '15ke1456');

-- --------------------------------------------------------

--
-- Table structure for table `servicerequest`
--

DROP TABLE IF EXISTS `servicerequest`;
CREATE TABLE IF NOT EXISTS `servicerequest` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `vcategory` varchar(20) NOT NULL,
  `vname` varchar(15) NOT NULL,
  `vnumber` varchar(10) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `mid` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `rdate` date NOT NULL,
  `rtime` time NOT NULL,
  `rcompletedate` varchar(20) NOT NULL,
  `servicecode` varchar(10) NOT NULL,
  `srating` int(2) NOT NULL,
  KEY `sid` (`sid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicerequest`
--

INSERT INTO `servicerequest` (`sid`, `cid`, `vcategory`, `vname`, `vnumber`, `problem`, `mid`, `status`, `rdate`, `rtime`, `rcompletedate`, `servicecode`, `srating`) VALUES
(1, 1, 'two wheeler', 'aciva', 'ka25m8242', 'Sudden Engine of and not starting since two hours', 9, 'pending', '2018-10-08', '12:38:15', '0000-00-00 00:00:00', '120', 0),
(11, 2, 'two wheeler', 'honda', 'ka25ew1368', 'hjk', 9, 'complete', '2018-11-24', '11:42:22', '2018-10-31T10:23', '182', 2),
(12, 2, 'two wheeler', 'honda', 'ka22f543', 'sudden breakdown of service', 9, 'pending', '2018-11-25', '09:40:12', '0000-00-00 00:00:00', '107', 3),
(14, 4, 'two wheeler', 'honda', 'ka25f2340', 'oil leakage and starting problem', 11, 'completed', '2018-11-27', '10:38:16', '2018-11-06T01:02', '153', 5),
(15, 2, 'four wheeler', 'innova', '1236', 'service', 10, 'pending', '2018-12-01', '06:31:18', '0000-00-00 00:00:00', '200', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicledescription`
--

DROP TABLE IF EXISTS `vehicledescription`;
CREATE TABLE IF NOT EXISTS `vehicledescription` (
  `spid` int(11) NOT NULL AUTO_INCREMENT,
  `vcategory` varchar(50) NOT NULL,
  `vtype` varchar(50) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `mid` int(11) NOT NULL,
  KEY `spid` (`spid`),
  KEY `mid` (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicledescription`
--

INSERT INTO `vehicledescription` (`spid`, `vcategory`, `vtype`, `vname`, `mid`) VALUES
(1, 'two wheeler', 'activa', 'honda', 11),
(3, 'two wheeler', 'honda', 'dio', 11),
(7, 'four wheeler', 'suv', 'innova', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
