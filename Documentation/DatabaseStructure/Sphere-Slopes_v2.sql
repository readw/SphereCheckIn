# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.33)
# Database: Sphere-Slopes
# Generation Time: 2017-03-29 16:51:51 +0000
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
  `memStatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`customerId`),
  KEY `userId_Users` (`userId`),
  KEY `memStatus` (`memStatus`),
  CONSTRAINT `customerId_SessionCustomer` FOREIGN KEY (`customerId`) REFERENCES `sessioncustomer` (`customerId`),
  CONSTRAINT `memStatus` FOREIGN KEY (`memStatus`) REFERENCES `MembershipTypes` (`membershipId`),
  CONSTRAINT `userId_Users` FOREIGN KEY (`userId`) REFERENCES `Users` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Customers` WRITE;
/*!40000 ALTER TABLE `Customers` DISABLE KEYS */;

INSERT INTO `Customers` (`customerId`, `userId`, `memStatus`)
VALUES
	(2,000002,1);

/*!40000 ALTER TABLE `Customers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Employee
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Employee`;

CREATE TABLE `Employee` (
  `userId` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `empRole` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `empRole_Employee` (`empRole`),
  CONSTRAINT `empRole_Employee` FOREIGN KEY (`empRole`) REFERENCES `EmployeeRoles` (`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Employee` WRITE;
/*!40000 ALTER TABLE `Employee` DISABLE KEYS */;

INSERT INTO `Employee` (`userId`, `empRole`)
VALUES
	(000002,0),
	(000000,1),
	(000001,3);

/*!40000 ALTER TABLE `Employee` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table EmployeeRoles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `EmployeeRoles`;

CREATE TABLE `EmployeeRoles` (
  `roleId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `EmployeeRoles` WRITE;
/*!40000 ALTER TABLE `EmployeeRoles` DISABLE KEYS */;

INSERT INTO `EmployeeRoles` (`roleId`, `role`)
VALUES
	(0,'Customer'),
	(1,'Instructor'),
	(2,'Slope Operator'),
	(3,'Admin');

/*!40000 ALTER TABLE `EmployeeRoles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table MembershipTypes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `MembershipTypes`;

CREATE TABLE `MembershipTypes` (
  `membershipId` int(11) NOT NULL AUTO_INCREMENT,
  `membership` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`membershipId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `MembershipTypes` WRITE;
/*!40000 ALTER TABLE `MembershipTypes` DISABLE KEYS */;

INSERT INTO `MembershipTypes` (`membershipId`, `membership`)
VALUES
	(1,'None'),
	(2,'Basic'),
	(3,'Gold');

/*!40000 ALTER TABLE `MembershipTypes` ENABLE KEYS */;
UNLOCK TABLES;


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
  `cost` float unsigned DEFAULT NULL,
  PRIMARY KEY (`sessionId`),
  KEY `type_SessionType` (`type`),
  CONSTRAINT `type_SessionType` FOREIGN KEY (`type`) REFERENCES `SessionType` (`typeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Session` WRITE;
/*!40000 ALTER TABLE `Session` DISABLE KEYS */;

INSERT INTO `Session` (`sessionId`, `type`, `sessionDate`, `startTime`, `endTime`, `assignedInstructor`, `maxUsers`, `cost`)
VALUES
	(1,1,'2017-03-07','10:00:00','11:00:00',NULL,100,10),
	(2,2,'2017-03-07','11:00:00','12:00:00',NULL,50,8),
	(3,3,'2017-03-08','10:00:00','11:00:00',000000,6,20),
	(4,1,'2017-03-08','15:00:00','17:00:00',NULL,100,10),
	(5,2,'2017-03-09','09:00:00','10:00:00',NULL,50,8),
	(6,2,'2017-03-09','11:00:00','12:00:00',NULL,50,7),
	(7,1,'2017-03-10','09:00:00','17:00:00',NULL,100,10),
	(8,1,'2017-03-11','09:00:00','14:00:00',NULL,100,10);

/*!40000 ALTER TABLE `Session` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table SessionCustomer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SessionCustomer`;

CREATE TABLE `SessionCustomer` (
  `customerId` int(11) unsigned NOT NULL,
  `sessionId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`customerId`,`sessionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `SessionCustomer` WRITE;
/*!40000 ALTER TABLE `SessionCustomer` DISABLE KEYS */;

INSERT INTO `SessionCustomer` (`customerId`, `sessionId`)
VALUES
	(2,1),
	(2,2),
	(2,3),
	(2,4);

/*!40000 ALTER TABLE `SessionCustomer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table SessionType
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SessionType`;

CREATE TABLE `SessionType` (
  `typeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`typeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `SessionType` WRITE;
/*!40000 ALTER TABLE `SessionType` DISABLE KEYS */;

INSERT INTO `SessionType` (`typeId`, `type`)
VALUES
	(1,'Standard Sessions'),
	(2,'Membership Sessions'),
	(3,'Instructor Sessions'),
	(4,'Any Sessions');

/*!40000 ALTER TABLE `SessionType` ENABLE KEYS */;
UNLOCK TABLES;


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
  `county` varchar(100) DEFAULT NULL,
  `postcode` varchar(7) NOT NULL DEFAULT '',
  `telephone` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(320) NOT NULL DEFAULT '',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;

INSERT INTO `Users` (`userId`, `firstName`, `lastName`, `dateOfBirth`, `address 1`, `address 2`, `address 3`, `townCity`, `county`, `postcode`, `telephone`, `email`)
VALUES
	(000000,'Justin','Jackman','1996-12-06','42 Warner Road',NULL,NULL,'Longfield','Kent','CP15EP','07955077663','justin@jackman.com'),
	(000001,'Hamelton','Philips','1983-04-05','1 Musket Avenue',NULL,NULL,'Wellingborough','Northamptonshire','NN297LP','07586546897','phil@ham.com'),
	(000002,'Bill','Jobs','1995-08-15','1 Summersby Way',NULL,NULL,'London',NULL,'LN958IP','07951904675','jobs@bill.com');

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
