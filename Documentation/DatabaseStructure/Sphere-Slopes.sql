# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.33)
# Database: Sphere-Slopes
# Generation Time: 2017-03-06 12:37:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Customers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Customers`;

CREATE TABLE `Customers` (
  `customerId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(6) unsigned zerofill NOT NULL,
  `memStatus` int(11) NOT NULL,
  `sessionNo` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`customerId`),
  KEY `userId_Users` (`userId`),
  KEY `memStatus` (`memStatus`),
  KEY `sessionNo_Session` (`sessionNo`),
  CONSTRAINT `customerId_SessionCustomer` FOREIGN KEY (`customerId`) REFERENCES `Session-Customer` (`customerId`),
  CONSTRAINT `memStatus` FOREIGN KEY (`memStatus`) REFERENCES `MembershipTypes` (`membershipId`),
  CONSTRAINT `sessionNo_Session` FOREIGN KEY (`sessionNo`) REFERENCES `Session` (`sessionId`),
  CONSTRAINT `userId_Users` FOREIGN KEY (`userId`) REFERENCES `Users` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Employee
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Employee`;

CREATE TABLE `Employee` (
  `userId` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `empRole` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `empRole_Employee` (`empRole`),
  CONSTRAINT `empRole_Employee` FOREIGN KEY (`empRole`) REFERENCES `EmployeeRoles` (`roleId`),
  CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `Users` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table EmployeeRoles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `EmployeeRoles`;

CREATE TABLE `EmployeeRoles` (
  `roleId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table MembershipTypes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `MembershipTypes`;

CREATE TABLE `MembershipTypes` (
  `membershipId` int(11) NOT NULL AUTO_INCREMENT,
  `membership` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`membershipId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Session
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Session`;

CREATE TABLE `Session` (
  `sessionId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) unsigned NOT NULL DEFAULT '1',
  `sessionDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `assignedInstructor` int(6) unsigned zerofill DEFAULT NULL,
  `maxUsers` tinyint(3) NOT NULL DEFAULT '100',
  PRIMARY KEY (`sessionId`),
  KEY `type_SessionType` (`type`),
  CONSTRAINT `type_SessionType` FOREIGN KEY (`type`) REFERENCES `SessionType` (`typeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Session-Customer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Session-Customer`;

CREATE TABLE `Session-Customer` (
  `customerId` int(11) unsigned zerofill NOT NULL,
  `sessionId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`customerId`,`sessionId`),
  KEY `sessionId_Session` (`sessionId`),
  CONSTRAINT `sessionId_Session` FOREIGN KEY (`sessionId`) REFERENCES `Session` (`sessionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table SessionType
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SessionType`;

CREATE TABLE `SessionType` (
  `typeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`typeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `userId` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL DEFAULT '',
  `lastName` varchar(30) NOT NULL DEFAULT '',
  `dateOfBirth` date NOT NULL DEFAULT '1970-01-01',
  `address 1` varchar(100) NOT NULL DEFAULT '',
  `address 2` varchar(100) DEFAULT NULL,
  `address 3` varchar(100) DEFAULT NULL,
  `townCity` varchar(100) NOT NULL DEFAULT '',
  `county` varchar(100) NOT NULL DEFAULT '',
  `postcode` varchar(7) NOT NULL DEFAULT '',
  `telephone` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(320) NOT NULL DEFAULT '',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
