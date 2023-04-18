-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2023 at 06:26 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_tem`
--
CREATE DATABASE IF NOT EXISTS `php_tem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `php_tem`;

-- --------------------------------------------------------

--
-- Table structure for table `bars`
--

CREATE TABLE `bars` (
  `ID` int NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bars`
--

INSERT INTO `bars` (`ID`, `Title`, `Description`, `user_id`) VALUES
(4, 'Ben gewoon Boef man, Ik steel die snacks, soms heb ik trek vandaar deze track', 'HEEE gewoon boef man en ik heb honger', 3),
(5, 'ik spit die bars, want die snicker was over de datum', 'snickers', 3),
(6, 'ze zegt ik heb brains, ik ben smartie', 'Smartie', 3),
(7, 'ik koop geen tony\'s, want ik let op mn moneys', 'Tony chocolonely is duur', 3),
(8, 'ze zegt hoe gaat het, moy buenooooo', 'kinder bueno jwz', 3);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `ID` int NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Img_URL` varchar(255) DEFAULT NULL,
  `Price` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`ID`, `Title`, `Description`, `Img_URL`, `Price`) VALUES
(1, 'Shirtje', 'Machtig mooi shirtje om diabetes er van te krijgen', 'img/Shirtje.png', 50),
(2, 'Test', 'Hoi Dit is een heel mooi logo! Fcking vet man', 'img/logo.png', 40),
(3, 'Stickertje', 'Mooi man, plakt harder dan de autostoel in de zomer', 'img/logo.png', 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Active` char(1) DEFAULT NULL,
  `Create_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Last_Update` timestamp NULL DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `First_Name`, `Last_Name`, `Email`, `Active`, `Create_Date`, `Last_Update`, `Password`, `username`) VALUES
(3, 'Daan', NULL, '123@gmail.com', '1', '2023-04-13 11:14:15', NULL, '$2y$12$vCwFh0hAYy07fJxDZ/uIlucuS5Ka5AFbepEopCKotGflSnf0DkZn.', 'Admin'),
(4, NULL, NULL, 'lux@gmail.com', '1', '2023-04-16 10:22:33', NULL, '$2y$12$YHl0k6U4NtN9DVcXACgqMuCjgNpeQHtdsXgQj3ReD0dVsYy/Q348.', NULL),
(5, NULL, NULL, 'daanwesselberg@gmail.com', '1', '2023-04-16 10:32:26', NULL, '$2y$12$6dz1tAMItCu/dVRTrIOTHuCgXhjKOKa9GtSoQDAqJWhONxidi4Dmi', 'Fakka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bars`
--
ALTER TABLE `bars`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bars`
--
ALTER TABLE `bars`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bars`
--
ALTER TABLE `bars`
  ADD CONSTRAINT `bars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
