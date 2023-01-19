-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2023 at 11:35 PM
-- Server version: 10.9.4-MariaDB
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `park`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `sex` int(1) NOT NULL,
  `birthday` date NOT NULL,
  `species_id` int(11) NOT NULL,
  `park_id` int(11) NOT NULL,
  `health` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `sex`, `birthday`, `species_id`, `park_id`, `health`) VALUES
(1, 0, '2023-01-18', 1, 1, 'good'),
(2, 0, '2020-12-25', 2, 2, 'perfect'),
(3, 1, '2021-06-01', 2, 2, 'perfect'),
(4, 0, '2023-01-01', 2, 2, 'good'),
(5, 0, '2020-10-10', 4, 2, 'good'),
(6, 0, '2015-02-01', 8, 1, 'fine');

-- --------------------------------------------------------

--
-- Table structure for table `animals_orders`
--

CREATE TABLE `animals_orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals_orders`
--

INSERT INTO `animals_orders` (`id`, `name`) VALUES
(1, 'Mammal'),
(2, 'Bird'),
(3, 'Reptile'),
(4, 'Amphibian');

-- --------------------------------------------------------

--
-- Table structure for table `animals_species`
--

CREATE TABLE `animals_species` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals_species`
--

INSERT INTO `animals_species` (`id`, `name`, `order_id`) VALUES
(1, 'Squirrel', 1),
(2, 'Eagle', 2),
(3, 'Crocodile', 3),
(4, 'Hawk', 2),
(5, 'Raven', 2),
(6, 'Bison', 1),
(8, 'Wolf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parks`
--

CREATE TABLE `parks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parks`
--

INSERT INTO `parks` (`id`, `name`) VALUES
(1, 'YellowStone Park'),
(2, 'Yosemite National Park');

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(4) NOT NULL,
  `species_id` int(11) NOT NULL,
  `park_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plants_orders`
--

CREATE TABLE `plants_orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plants_orders`
--

INSERT INTO `plants_orders` (`id`, `name`) VALUES
(1, 'Tree'),
(2, 'Shrub'),
(3, 'Herbaceus');

-- --------------------------------------------------------

--
-- Table structure for table `plants_species`
--

CREATE TABLE `plants_species` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `flowering_season` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plants_species`
--

INSERT INTO `plants_species` (`id`, `name`, `order_id`, `flowering_season`) VALUES
(1, 'oak', 1, 'Summer'),
(2, 'lavender', 2, 'Spring'),
(3, 'daisy', 3, 'Spring');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `species_id` (`species_id`),
  ADD KEY `park_id` (`park_id`);

--
-- Indexes for table `animals_orders`
--
ALTER TABLE `animals_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animals_species`
--
ALTER TABLE `animals_species`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `parks`
--
ALTER TABLE `parks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `species` (`species_id`),
  ADD KEY `park_id` (`park_id`);

--
-- Indexes for table `plants_orders`
--
ALTER TABLE `plants_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plants_species`
--
ALTER TABLE `plants_species`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `animals_orders`
--
ALTER TABLE `animals_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `animals_species`
--
ALTER TABLE `animals_species`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parks`
--
ALTER TABLE `parks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plants_orders`
--
ALTER TABLE `plants_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plants_species`
--
ALTER TABLE `plants_species`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `animals_species` (`id`),
  ADD CONSTRAINT `animals_ibfk_2` FOREIGN KEY (`park_id`) REFERENCES `parks` (`id`);

--
-- Constraints for table `animals_species`
--
ALTER TABLE `animals_species`
  ADD CONSTRAINT `animals_species_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `animals_orders` (`id`);

--
-- Constraints for table `plants`
--
ALTER TABLE `plants`
  ADD CONSTRAINT `plants_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `plants_species` (`id`),
  ADD CONSTRAINT `plants_ibfk_2` FOREIGN KEY (`park_id`) REFERENCES `parks` (`id`);

--
-- Constraints for table `plants_species`
--
ALTER TABLE `plants_species`
  ADD CONSTRAINT `plants_species_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `plants_orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
