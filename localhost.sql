-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2019 at 08:01 AM
-- Server version: 5.7.17-log
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `-shop-`
--
CREATE DATABASE IF NOT EXISTS `-shop-` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `-shop-`;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `BillID` int(11) NOT NULL,
  `OrdID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`BillID`, `OrdID`) VALUES
(1, 3),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `CardID` int(11) NOT NULL,
  `CardNum` varchar(255) NOT NULL,
  `CardName` varchar(255) NOT NULL,
  `CardDate` date NOT NULL,
  `CardCVV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`CardID`, `CardNum`, `CardName`, `CardDate`, `CardCVV`) VALUES
(1, '5310', 'name', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MsgID` int(11) NOT NULL,
  `SenderName` varchar(200) NOT NULL,
  `SenderEmail` varchar(200) NOT NULL,
  `MsgSubject` varchar(50) NOT NULL,
  `MsgContent` text NOT NULL,
  `MsgStatus` int(11) NOT NULL DEFAULT '1' COMMENT '1=unread/0=read'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MsgID`, `SenderName`, `SenderEmail`, `MsgSubject`, `MsgContent`, `MsgStatus`) VALUES
(1, 'Name Sender Msg', 'Email@gmail.com', 'Sample Msg', 'Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content ', 0),
(2, 'Name Sender Msg', 'Email@gmail.com', 'Sample Msg', 'Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content ', 0),
(3, 'Name Sender Msg', 'Email@gmail.com', 'Sample Msg', 'Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content ', 1),
(4, 'Name Sender Msg', 'Email@gmail.com', 'Sample Msg', 'Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content ', 1),
(5, 'Name Sender Msg', 'Email@gmail.com', 'Sample Msg', 'Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content Sample Content ', 1),
(6, 'name', 'email', 'sub', 'msg\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrdID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProID` int(11) NOT NULL,
  `OrdStatus` int(11) NOT NULL DEFAULT '0' COMMENT '2=done/1=cancel/0=process/'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrdID`, `UserID`, `ProID`, `OrdStatus`) VALUES
(1, 1, 1, 0),
(2, 1, 3, 1),
(3, 1, 4, 2),
(4, 2, 1, 0),
(5, 3, 1, 2),
(6, 5, 5, 0),
(7, 5, 5, 0),
(8, 5, 5, 0),
(9, 5, 5, 0),
(10, 5, 5, 0),
(11, 5, 5, 0),
(12, 5, 5, 0),
(13, 5, 5, 0),
(14, 5, 5, 0),
(15, 5, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProID` int(11) NOT NULL,
  `ProImg` varchar(255) NOT NULL,
  `ProTitle` varchar(100) NOT NULL,
  `ProDesc` text NOT NULL,
  `ProPrice` int(11) NOT NULL,
  `ProQuantity` int(11) NOT NULL,
  `ProOffers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProID`, `ProImg`, `ProTitle`, `ProDesc`, `ProPrice`, `ProQuantity`, `ProOffers`) VALUES
(1, 'pro1.jpg', 'Sample Product', 'Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content ', 100, 100, 64),
(3, 'pro3.jpg', 'Sample Product', 'Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content ', 100, 50, 55455),
(4, 'pro44.png', 'Sample Product', 'Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content ', 25, 10, NULL),
(5, 'pro5.png', 'Sample Product', 'Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content Description content ', 200, 50, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `SubID` int(11) NOT NULL,
  `SubNum` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`SubID`, `SubNum`) VALUES
(1, 2121982918),
(2, 2121982918),
(3, 2121982918),
(4, 2121982918),
(5, 2121982918);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Avatar` varchar(255) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Activation` int(11) NOT NULL DEFAULT '1' COMMENT '1=not verfied/0=verfied',
  `GroupID` int(11) NOT NULL DEFAULT '1' COMMENT '2=Admin/1=custmer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Avatar`, `Username`, `Email`, `Password`, `Activation`, `GroupID`) VALUES
(1, 'imgs.jpg', 'Nawaf Ali Saleh', 'Nawaf@gmail.com', 'NawafPass', 0, 1),
(2, 'avatar2.png', 'Admin', 'admin@me.com', 'Admin123', 0, 2),
(3, 'avatar3.png', 'Saleh Sameh Ali', 'Saleh@gmail.com', 'SalehPass', 1, 1),
(4, 'avatar4.png', 'Mahmoud Salem Sayed', 'Mah@gmail.com', 'MahPass', 1, 1),
(5, 'img.jpeg', 'Mosa Salem Saed', 'Mosa@gmail.com', 'MosaPass', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`BillID`),
  ADD KEY `OrdID` (`OrdID`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`CardID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MsgID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrdID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProID` (`ProID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProID`),
  ADD UNIQUE KEY `ProImg` (`ProImg`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`SubID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Avatar` (`Avatar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `BillID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `CardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MsgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `SubID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `Bill_Order` FOREIGN KEY (`OrdID`) REFERENCES `orders` (`OrdID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Products_Orders` FOREIGN KEY (`ProID`) REFERENCES `products` (`ProID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_Orders` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
