-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2025 at 06:27 PM
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
  `verification_code` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `otp` int(11) DEFAULT NULL,
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
(1, 'Ana', 'Ana', 'anaaa@gmail.com', '$2y$10$NTQf.1i7f9CJdI1yCIKhhuSNuQcLxh8oPqHzXjTx46DN8eLKfGCZy', NULL, 0, NULL, NULL, 0, NULL, NULL, 0),
(48, 'Adior', 'Laçi', 'adior1adior@gmail.com', '$2y$10$NTQf.1i7f9CJdI1yCIKhhuSNuQcLxh8oPqHzXjTx46DN8eLKfGCZy', '865452', 1, NULL, NULL, 0, NULL, NULL, 0),
(57, 'Test', 'Test', 'test1234@gmail.com', '$2y$10$NTQf.1i7f9CJdI1yCIKhhuSNuQcLxh8oPqHzXjTx46DN8eLKfGCZy', '106989', 0, NULL, NULL, 0, NULL, NULL, 0),
(69, 'admin', 'admin', 'admin@gmail.com', '$2y$10$9.m9KIzOYYXbazmKvsCHMeXKJtm1lAAYCS48RE24wcahIxGQQrqwy', NULL, 1, NULL, NULL, 0, NULL, 'admin', 0),
(70, 'user1', 'user1', 'user1@gmail.com', '$2y$10$fOaP/4ryBfm9WqcVvaQNwuW6p1h5SXpqiHPqG4rmanNCZyWTy.sRC', NULL, 1, NULL, NULL, 0, NULL, 'user', 0),
(71, 'xgfcvhgj', 'dfrtgh', 'sdfg@gmail.com', '$2y$10$2E7Vo4gvZULIIYfV8jtFYeNGJUsmqa1YXAQPpLSiGhhVR2eSXdF5S', NULL, 1, NULL, NULL, 0, NULL, 'user', 0),
(74, 'Anisa', 'Berdhashi', 'aberdhashi@gmail.com', '$2y$10$XROfPBZsXfphHBMZS6mSsedHCGh4AR125VP.bLYuQKR648cUY4oQC', '465744', 1, 897476, '285332904a2f111b733c231f022b5c2a', 0, NULL, NULL, 0),
(75, 'joana', 'cullhaj', 'joanacullhaj@gmail.com', '$2y$10$mG/KV.BJ7qSsb11zrm9L1ej.TQmbmGOx74dr4fL8ii..9BFeLCTEm', '385543', 0, NULL, NULL, 0, NULL, 'admin', 0),
(76, 'Username', 'Username', 'username@gmail.com', '$2y$10$HlwcQu/GlgZUlaTJURdXqO6O04SP.ulIT1S5KxFROrJ3UahysVuHa', NULL, 0, NULL, NULL, 0, NULL, 'user', 0),
(82, 'Dea', 'Laçi', 'deaa.laci@gmail.com', '$2y$10$tS1fIFmfn.yD68QHxFHuguSrrGI4ZcVseDzOLve1QY7E0rUN41Kq2', '233649', 1, NULL, NULL, 0, NULL, 'admin', 0),
(87, 'Dea', 'Dea', 'deadea0404@gmail.com', '$2y$10$fAXbS/zpQZwZ1VgbS//e9.iU9VG12ZRD7HmTXIJ7PnmJqYDKqns62', '204295', 1, NULL, NULL, 0, NULL, 'admin', 0);

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
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
