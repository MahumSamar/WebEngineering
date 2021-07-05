-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 05:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--
DROP SCHEMA IF EXISTS library;
CREATE SCHEMA library;
USE library;
-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS  `book` (
  `bookID` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `isbn` BIGINT UNSIGNED NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `language` varchar(5) NOT NULL,
  `pages` smallint(5) UNSIGNED NOT NULL,
  `status` varchar(10)  DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `title`, `author`, `isbn`, `image`, `description`, `language`, `pages`,`status`) VALUES
(0, 'Introduction to Computer Science', 'Gilbert Brands', 9781492827849, '51Uvm67LJuL._SX331_BO1,204,203,200_.jpg', 'This textbook is addressed to students of computer science in their first terms, and covers the content of a general introductory lecture in computer science held at a German University. The basic stuff for most special courses - circuit technology, programming, operating system, networking, security, and more - is presented along with some further background information not necessarily covered by other lectures, but helping to understand relationships and reasons why certain techniques are done in just that way. The learning process is supported by numerous exercises.', 'eng', 194,'pending'),
(1, 'Security Engineering: A Guide to Building Dependable Distributed Systems 3rd Edition', 'Ross Anderson', 9781119642787, '515rJ6inZDL._SX397_BO1,204,203,200_.jpg', 'In Security Engineering: A Guide to Building Dependable Distributed Systems, Third Edition Cambridge University professor Ross Anderson updates his classic textbook and teaches readers how to design, implement, and test systems to withstand both error and attack.', 'eng', 1232,'pending'),
(2, 'The Self-Taught Programmer: The Definitive Guide to Programming Professionally', 'Cory Althoff', 9780999685907, '31YJmObNTnL._SX404_BO1,204,203,200_.jpg', 'I am a self-taught programmer. After a year of self-study, I learned to program well enough to land a job as a software engineer II at eBay. Once I got there, I realized I was severely under-prepared. I was overwhelmed by the amount of things I needed to know but had not learned yet. My journey learning to program, and my experience at my first job as a software engineer were the inspiration for this book.', 'eng', 299,'issued'),
(3, 'Pakistan kahani', 'Abdal Bela', 9789690014054, '31MWHJ4YxkL._BO1,204,203,200_.jpg', 'The story of Pakistan.', 'urdu', 338,'available');

-- --------------------------------------------------------

--
-- Table structure for table `personinfo`
--

CREATE TABLE IF NOT EXISTS `personinfo` (
  `personID` smallint(5) UNSIGNED NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `title` varchar(2) NOT NULL CHECK (`title` in ('S','F','BS','A'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table 'personinfo'
--

INSERT INTO `personinfo` (`personID`, `email`, `password`, `firstName`, `lastName`, `title`) VALUES
(0, 'msamar@gmail.com', 'admin', 'Mahum', 'Samar', 'A'),
(1, 'mraza@gmail.com', 'raazi', 'Muhammad', 'Raz', 'BS'),
(2, 'seemajahan@gmail.com', 'seema', 'Seema', 'Jahan', 'F'),
(3, 'fatimam@gmail.com', 'fati', 'Fatima', 'Malik', 'BS'),
(4, 'maryamfatima@gmail.com', 'mayyan', 'Maryam', 'Fatima', 'S'),
(5, 'seemab@gmail.com', 'seema', 'Fatima', 'Seemab', 'F');

-- ----------------------------------------------------------

--
-- Table structure for table 'issuancerequest'
--

CREATE TABLE `issuancerequest` (
  `personID` smallint(5) UNSIGNED NOT NULL,
  `bookID` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplyrequest`
--

INSERT INTO `issuancerequest` (`personID`, `bookID`) VALUES
(2,0),
(4,1);
-- ----------------------------------------------------------

--
-- Table structure for table 'issue'
--

CREATE TABLE `issue` (
  `personID` smallint(5) UNSIGNED NOT NULL,
  `bookID` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplyrequest`
--

INSERT INTO `issue` (`personID`, `bookID`) VALUES
(4,2);
-- ----------------------------------------------------------

--
-- Table structure for table 'supplyrequest'
--

CREATE TABLE `supplyrequest` (
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `supplierID` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplyrequest`
--

INSERT INTO `supplyrequest` (`title`, `author`, `supplierID`) VALUES
('Power System', 'J B Gupta', 3),
('Dynamics', 'J B Gupta', 1),
('HTML & CSS: Design and Build Web Sites', 'Jon Duckett', 3),
('Aaqa', 'Abdal Bela', 3),
('Harry Potter and the Chamber of Secrets (Harry Potter #2)', 'J.K. Rowling', 1),
('Harry Potter and the Chamber of Secrets (Harry Potter #)3', 'J.K. Rowling', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `issuancerequest`
--
ALTER TABLE `issuancerequest`
  ADD PRIMARY KEY (`bookID`,`personID`);

--
-- Indexes for table `issue`
--

ALTER TABLE `issue`
  ADD PRIMARY KEY (`bookID`,`personID`);

--
-- Indexes for table `personinfo`
--
ALTER TABLE `personinfo`
  ADD PRIMARY KEY (`personID`),
  ADD UNIQUE KEY `unk_personID` (`personID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personinfo`
--
ALTER TABLE `personinfo`
  MODIFY `personID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `book`
  MODIFY `bookID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `issuancerequest`
--
ALTER TABLE `issuancerequest`
  ADD CONSTRAINT `issuancerequest_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`),
  ADD CONSTRAINT `issuancerequest_ibfk_2` FOREIGN KEY (`personID`) REFERENCES `personinfo` (`personID`);
COMMIT;


--
-- Constraints for table `issuancerequest`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`),
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`personID`) REFERENCES `personinfo` (`personID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
