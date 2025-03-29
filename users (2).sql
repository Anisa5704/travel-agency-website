-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2025 at 05:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` varchar(6) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `otp` int(6) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `failed_attempts` int(11) DEFAULT 0,
  `last_failed_attempt` datetime DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `is_banned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `firstName`, `lastName`, `email`, `password`, `verification_code`, `is_verified`, `otp`, `remember_token`, `failed_attempts`, `last_failed_attempt`, `role`, `is_banned`) VALUES
(1, 'Ana', 'Ana', 'anaaa@gmail.com', '$2y$10$tnpMQvwc4RIHdFVB7YiR9uuF0vbipwZYD57KL3IFErv', NULL, 0, 0, NULL, 0, NULL, NULL, 0),
(34, 'pamela', 'gjergji', 'pamelagjergji919@gmail.com', '669ffc150d1f875819183addfc842cab', '353716', 0, 0, NULL, 0, NULL, NULL, 0),
(41, 'Amina', 'Sokoli', 'amina.sokoli@fti.edu.al', '', '751211', 1, 0, NULL, 0, NULL, NULL, 0),
(48, 'Adior', 'Laçi', 'adior1adior@gmail.com', '$2y$10$bUoPhTX890yfKd12sRjkVOr5.6N9tzy4andQXDvKGLU', '865452', 1, 0, NULL, 0, NULL, NULL, 0),
(53, 'Dea', 'Laçi', 'deaa.laci@gmail.com', '$2y$10$w40/k78fqNRbUmyXZUctKOJQMwHVlFB/ejwzo6Omu6G1Ot7COavnC', '219889', 1, 0, 'c9d74cd344657244b8c47ac74aaf995a', 0, NULL, NULL, 0),
(54, 'Test', 'Test', 'test123@gmail.com', '$2y$10$joA1YroXc7FCftFPw4ohwewtGygG5L1gksV8IzVajp1jx6vmLwqHi', '246249', 0, 0, NULL, 0, NULL, NULL, 0),
(57, 'Test', 'Test', 'test1234@gmail.com', '$2y$10$9XAUtPaZPZD/BjDHamRoVOu3YqeYmu.3/ewmjTbxjFidkTwBz9weG', '106989', 0, 0, NULL, 0, NULL, NULL, 0),
(60, 'Dea', 'Dea', 'deadea0404@gmail.com', '$2y$10$/Oyof1HgV3wujhT5eKG.SefpGSAkTP6BRt4boa2.RAM.YTbmvdty2', '313546', 1, 366915, '906b6bb6667595fbdf823e0a15b390c7', 0, NULL, 'admin', 0),
(61, '', '', '', '', NULL, 0, 0, NULL, 0, NULL, '', 0),
(62, '', '', '', '', NULL, 0, 0, NULL, 0, NULL, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
