-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2018 at 02:01 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medigen`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_drugs`
--

CREATE TABLE `brand_drugs` (
  `id` int(11) NOT NULL,
  `generic_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'anesthetics', '');

-- --------------------------------------------------------

--
-- Table structure for table `compoonents`
--

CREATE TABLE `compoonents` (
  `id` int(11) NOT NULL,
  `generic_id` int(11) NOT NULL,
  `component` varchar(100) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generic_drugs`
--

CREATE TABLE `generic_drugs` (
  `id` int(11) NOT NULL,
  `generic_name` varchar(100) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `list_medicines`
--

CREATE TABLE `list_medicines` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `brandA` tinyint(1) NOT NULL,
  `brandB` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `contact`, `address`, `longitude`, `latitude`) VALUES
(1, '$name', '$email', '$enc_password', '$contact', '$address', 0, 0),
(2, 'Hitesh', 'hiteshnayak305@gmail.com', '839762a1902c932bf6c6d0f0fdd92525', '8435263635', 'sdgzmdkltmhb', 81.8733, 25.5001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_drugs`
--
ALTER TABLE `brand_drugs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `map` (`generic_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compoonents`
--
ALTER TABLE `compoonents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `generic_id` (`generic_id`);

--
-- Indexes for table `generic_drugs`
--
ALTER TABLE `generic_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_medicines`
--
ALTER TABLE `list_medicines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_drugs`
--
ALTER TABLE `brand_drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `compoonents`
--
ALTER TABLE `compoonents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generic_drugs`
--
ALTER TABLE `generic_drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `list_medicines`
--
ALTER TABLE `list_medicines`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand_drugs`
--
ALTER TABLE `brand_drugs`
  ADD CONSTRAINT `map` FOREIGN KEY (`generic_id`) REFERENCES `generic_drugs` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `compoonents`
--
ALTER TABLE `compoonents`
  ADD CONSTRAINT `compoonents_ibfk_1` FOREIGN KEY (`generic_id`) REFERENCES `generic_drugs` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `list_medicines`
--
ALTER TABLE `list_medicines`
  ADD CONSTRAINT `list_medicines_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
