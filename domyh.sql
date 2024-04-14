-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2024 at 05:33 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domyh`
--
CREATE DATABASE IF NOT EXISTS `domyh` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci;
USE `domyh`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `username` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`) VALUES
(1, 'domyh', '870966bb50bf72e4b4d75b804dd0800739b1f714a35a8f356af9a0a1819b84c2f1059a84705089cc9e0585c9862af749bb5722a09268de8ba5f5bc160bea6fef');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int NOT NULL,
  `name` varchar(32) COLLATE utf8mb3_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Alfa Romeo'),
(2, 'Honda');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int NOT NULL,
  `name` varchar(32) COLLATE utf8mb3_hungarian_ci NOT NULL,
  `parent_brand` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`, `parent_brand`) VALUES
(1, '159 Sedan', 1),
(2, 'Civic 7 Coupe (EM2)', 2),
(4, '147', 1),
(5, '159 SW', 1),
(6, '1478', 1),
(7, '147', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int NOT NULL,
  `parent_model` int NOT NULL,
  `name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `description` text COLLATE utf8mb3_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `parent_model`, `name`, `description`) VALUES
(1, 2, 'Maszek féltengely (Bal, 895mm)', '3333444'),
(2, 2, 'Stage 1 verseny kuplung', 'Attila ajánlásával'),
(3, 2, 'Verseny féknyereg (Bal hátsó)', 'zrt'),
(4, 1, '5x110mm Tomason kerekek', ''),
(5, 1, 'Ablakemelő szerkezet (Jobb hátsó)', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
