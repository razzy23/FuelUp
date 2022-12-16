-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 06, 2022 at 05:36 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FuelUp`
--

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `station_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `company` varchar(8) NOT NULL,
  `petrol_balance` int(4) NOT NULL,
  `diesel_balance` int(4) NOT NULL,
  `stockupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `station_user`
--

CREATE TABLE `station_user` (
  `operator` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_time` time NOT NULL,
  `amount` float(6,2) NOT NULL,
  `station_id` int(11) NOT NULL,
  `operator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nic` char(12) NOT NULL,
  `phone` char(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nic`, `phone`, `name`, `email`, `password`) VALUES
('1231231231', '017777953', 'lol', 'ravindu.w23@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `v_id` int(11) NOT NULL,
  `nic` char(12) NOT NULL,
  `vletter` varchar(3) DEFAULT NULL,
  `vnumber` varchar(4) DEFAULT NULL,
  `vtype` varchar(6) NOT NULL,
  `vfuel` varchar(6) NOT NULL,
  `chassis` varchar(17) NOT NULL,
  `alloc_quota` int(2) DEFAULT NULL,
  `bal_quota` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`v_id`, `nic`, `vletter`, `vnumber`, `vtype`, `vfuel`, `chassis`, `alloc_quota`, `bal_quota`) VALUES
(4, '1231231231', 'cag', '2342', 'Bike', 'petrol', '543425', 10, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `station_user`
--
ALTER TABLE `station_user`
  ADD PRIMARY KEY (`operator`,`station_id`),
  ADD KEY `station_id` (`station_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `station_id` (`station_id`),
  ADD KEY `operator` (`operator`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `nic` (`nic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `station_user`
--
ALTER TABLE `station_user`
  MODIFY `operator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `station_user`
--
ALTER TABLE `station_user`
  ADD CONSTRAINT `station_user_ibfk_1` FOREIGN KEY (`station_id`) REFERENCES `stations` (`station_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `vehicles` (`v_id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`station_id`) REFERENCES `stations` (`station_id`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`operator`) REFERENCES `station_user` (`operator`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`nic`) REFERENCES `users` (`nic`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
