-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 10:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `station`
--

-- --------------------------------------------------------

--
-- Table structure for table `pump_operator`
--

CREATE TABLE `pump_operator` (
  `id` int(11) NOT NULL,
  `station_id` varchar(10) NOT NULL,
  `operator_id` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pump_operator`
--

INSERT INTO `pump_operator` (`id`, `station_id`, `operator_id`, `name`, `mobile`, `password`) VALUES
(6, '7891', '7777', 'triny', '0701563213', '7777'),
(9, '1234', '1233', 'tharindi', '0701563210', '1233'),
(11, '4444', '5555', 'tharindi', '0701566745', '5555'),
(12, '4444', '6666', 'tharindi', '0701563230', '6666'),
(14, '1234', '4655', 'triny', '0701563214', '4646'),
(15, '1234', '6743', 'razzy', '0701563230', '6743');

-- --------------------------------------------------------

--
-- Table structure for table `stationreg`
--

CREATE TABLE `stationreg` (
  `id` int(5) NOT NULL,
  `station_id` varchar(6) NOT NULL,
  `location` varchar(100) NOT NULL,
  `company` varchar(10) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `petrol92` int(5) NOT NULL,
  `petrol95` int(5) NOT NULL,
  `diesel` int(5) NOT NULL,
  `superdiesel` int(5) NOT NULL,
  `kerosene` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stationreg`
--

INSERT INTO `stationreg` (`id`, `station_id`, `location`, `company`, `mobile`, `password_hash`, `petrol92`, `petrol95`, `diesel`, `superdiesel`, `kerosene`) VALUES
(20, '7891', 'Nugegoda', 'IOC', '0701563245', '$2y$10$.s1C5dydPoqF6WcV.nESeeJMq/4Fefd3elF5OWUwJ5Wllyov3gqae', 0, 0, 0, 0, 0),
(22, '4650', 'Nugegoda', 'IOC', '0701563245', '$2y$10$CLync9y2LzgZYbT/qYxCbOTu8KD2hxAvuiv4gOuWo38mNqLA66Wue', 0, 0, 0, 0, 0),
(24, '9087', 'Nugegoda', 'IOC', '0701563213', '$2y$10$BCZMfh5wLQOta.z7xLUBuO9u3tj33VF0CkPpaMqrUdX07emkTDQdO', 0, 0, 0, 0, 0),
(26, '9080', 'Nugegoda', 'IOC', '0701563213', '$2y$10$mbZ7QoP0U10X4yj4/SRCcOflYwrYjL5aaiiCgnGvmvLxUKfR2cMay', 0, 0, 0, 0, 0),
(28, '4567', 'Nugegoda', 'IOC', '0701563213', '$2y$10$taqERYHSJ.qI8GC6RXpk9.70zT6W80D91Ly9NlXAUZ1FnDCKJIUta', 0, 0, 0, 0, 0),
(29, '4566', 'Nugegoda', 'IOC', '0701563213', '$2y$10$iPZY7WZGoSlybTUoCRawc.pXfvseutozi3YvcghinzBX08En.1m0W', 10, 10, 10, 10, 12),
(30, '5640', 'Colombo', 'CEPETCO', '0701563213', '$2y$10$sia4MAi5d1emwemuZ1fbGu12dGCap0oEz5qx6eVLqiELbPGuTgE5y', 10, 10, 10, 10, 10),
(31, '6789', 'Colombo', 'IOC', '0701563213', '$2y$10$Zq3EsdJL3xOvilzMhZ52q.qAZTk8A2WDXKBAAXukyCqLP4mnI76j2', 10, 3, 5, 7, 1),
(32, '7803', 'meegoda', 'CEPETCO', '0701563213', '$2y$10$MgmVTjveQGJFD..TSY5eY.Aph0/YzjRoGkPgeaRNYDZJVHnaJ0X8a', 4, 1, 6, 3, 2),
(33, '6574', 'Nugegoda', 'CEPETCO', '0701563213', '$2y$10$sBm6wuwRz4lmLjGTWPPGTu8uUre8.vwMC4AI6EzJc5KW4/xvcdPAG', 2, 5, 6, 0, 9),
(34, '4444', 'Nugegoda', 'CEPETCO', '0701563213', '$2y$10$ejFxFi12zAZrpNucj0YMMe3TDxdPwZ4zO6Uzv57rzvXKgCwdVjcya', 89, 67, 3, 2, 10),
(35, '2398', 'Nugegoda', 'IOC', '0701563213', '$2y$10$JAknnp7vN4WBhL5V6Ok7A.uO30IgZorfMNLD0PiA9V0Ut7zFF3fj6', 10, 10, 10, 10, 10),
(37, '4449', 'Homagama', 'CEPETCO', '0701563213', '$2y$10$yO/pRWF3JrmTsNd/bjb9iOCvDRBynxE0FsMcniloVP2OGQQ8zcFQm', 1, 1, 1, 1, 1),
(38, '1234', 'Nugegoda', 'IOC', '0701563213', '$2y$10$RLMr/O04qamYIqDoeZfWhePRnIk05O2Sc3/9fN7uizYj91SIinRZ2', 12, 12, 12, 12, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pump_operator`
--
ALTER TABLE `pump_operator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `station_id` (`station_id`);

--
-- Indexes for table `stationreg`
--
ALTER TABLE `stationreg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `station_id` (`station_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pump_operator`
--
ALTER TABLE `pump_operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stationreg`
--
ALTER TABLE `stationreg`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pump_operator`
--
ALTER TABLE `pump_operator`
  ADD CONSTRAINT `pump_operator_ibfk_1` FOREIGN KEY (`station_id`) REFERENCES `stationreg` (`station_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
