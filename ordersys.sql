-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2018 at 03:12 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordersys`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuID` varchar(64) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Type` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuID`, `Name`, `Type`) VALUES
('anwrtbeer', 'A&W\'s Root Beer', 'drinks'),
('bbqjgrblts', 'BBQ Jenga Riblets', 'food'),
('bfprs', 'Beef Pares', 'food'),
('blurspbry', 'Blue Raspberry', 'drinks'),
('bnbexprs', 'B&B Express', 'drinks'),
('ckchoco', 'Cookie Choco', 'desserts'),
('crmcpsta', 'Creamy Chic Pasta', 'food'),
('crml', 'Caramel', 'desserts'),
('csmflfrs', 'Catch-some-falling-Fries', 'food'),
('cthludgs', 'Cthulhu Dogs', 'food'),
('drppr', 'Dr. Pepper Cherry Soda', 'drinks'),
('dysggrale', 'Day\'s Ginger Ale', 'drinks'),
('grnapl', 'Green Apple', 'drinks'),
('jvachp', 'Java Chip', 'drinks'),
('kbkckn', 'Kabuki Chicken', 'food'),
('lgnspsta', 'Longanisa Pasta', 'food'),
('mint', 'Mint', 'drinks'),
('mngo', 'Mango', 'drinks'),
('nchos', 'Nachos', 'food'),
('peach', 'Peach', 'drinks'),
('ppcrnxplsn', 'Popcorn Explosion', 'food'),
('prknshrmp', 'Pork & Shrimp', 'food'),
('prmprkssg', 'Premium Pork Sisig', 'food'),
('psonfrt', 'Passion Fruit', 'drinks'),
('rspbry', 'Raspberry', 'drinks'),
('smshdgs', 'Smash Dogs!', 'food'),
('spmchgrntea', 'Special Matcha Green Tea', 'drinks'),
('srpops', 'Sour Pops!', 'food'),
('stwbrygrhm', 'Strawberry Graham', 'desserts'),
('whtchoclt', 'White Chocolate', 'drinks');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `TableID` int(11) NOT NULL,
  `Status` enum('pending','served','paid','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tables_menu`
--

CREATE TABLE `tables_menu` (
  `OrderID` int(11) NOT NULL,
  `TableID` int(11) NOT NULL,
  `MenuID` varchar(64) NOT NULL,
  `Status` enum('pending','received','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `Type` varchar(64) NOT NULL,
  `Name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`Type`, `Name`) VALUES
('desserts', 'Desserts'),
('drinks', 'Drinks'),
('food', 'Food');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuID`),
  ADD KEY `Type` (`Type`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`TableID`);

--
-- Indexes for table `tables_menu`
--
ALTER TABLE `tables_menu`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `TableID` (`TableID`),
  ADD KEY `MenuID` (`MenuID`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tables_menu`
--
ALTER TABLE `tables_menu`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `types` (`Type`);

--
-- Constraints for table `tables_menu`
--
ALTER TABLE `tables_menu`
  ADD CONSTRAINT `tables_menu_ibfk_1` FOREIGN KEY (`TableID`) REFERENCES `tables` (`TableID`),
  ADD CONSTRAINT `tables_menu_ibfk_2` FOREIGN KEY (`MenuID`) REFERENCES `menu` (`MenuID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
