-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 05:29 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuelup`
--

-- --------------------------------------------------------

--
-- Table structure for table `org_admin`
--

CREATE TABLE `org_admin` (
  `id` int(11) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `BRN` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MobileNo` int(12) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_admin`
--

INSERT INTO `org_admin` (`id`, `CompanyName`, `BRN`, `Email`, `MobileNo`, `password_hash`) VALUES
(7, 'Test1', 454, 'tango@gmail.com', 716436771, '$2y$10$f3X1vHjN7KbP/s2qIO3mfuWOf3A1oHCwe6.jZgq63MBgtPeFG3eBm'),
(8, 'hellow', 17, '4@hmail.com', 7854, '$2y$10$fks/1PjzAAUBXyi9OvxS4Ousz463wd667tbVY2EVoDSIUCHcC9TPq'),
(9, 'CompanyDimBong', 145, 'tango@gmail.com', 789654115, '$2y$10$KaAb9Uv4abDxdaxx3GI7N.dt6TMZnW1rKCzjaEfJJ7sTwJrZzv1HW'),
(10, 'Admin1', 123456789, 'test1@gmail.com', 716436589, '$2y$10$x0GbMxN79pUMaKDtkSccOuKc1x51INbjv8xRMJ4Mb5QkmXueYkjsi'),
(11, 'PereraSons', 2778, 'PSons@email.com', 714589552, '$2y$10$dbqB/RenhpuInduwj57QR.5vJl5E/HXb96oETAxKjIhHcQe8Fsx2.');

-- --------------------------------------------------------

--
-- Table structure for table `org_driver`
--

CREATE TABLE `org_driver` (
  `id` int(11) NOT NULL,
  `NIC` varchar(128) NOT NULL,
  `PhoneNo` int(128) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `BRN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_driver`
--

INSERT INTO `org_driver` (`id`, `NIC`, `PhoneNo`, `password_hash`, `username`, `email`, `BRN`) VALUES
(1, '5000', 5000, '5000', 'driver1', 'driver1@email.com', 123456789),
(3, '50505050', 756434321, '$2y$10$/AMVH9.sQQBoWrdFFPUiBewBOkUWz/anWzfbZindmV1ifH2EwpCwK', 'Driver2', 'Driver2@email.com', 123456789),
(4, '454587', 457896547, '$2y$10$1qIZoLmVGxkkn3v3USo7wOekLKhoIGdaERK1updx0GX7z3ubZ3XfK', 'Driver3', 'Driver3@email.com', 123456789),
(6, '5050859', 715899885, '$2y$10$SRWFBC8om/1iKKQJ9NHtzOUVDVZ58ufAgrz41ci/96FU1uN9GNkqy', 'TestDriver', 'TestDriver1@email.com', 2778),
(7, '505005', 714589656, '$2y$10$aGwV.CFhoQGElrW8vEFaFuoIY6vljFDWRcCdd5SO.fpA.M29TQYja', 'Driver10', 'driver10@email.com', 0),
(8, '5050859', 745789665, '$2y$10$HwzLfYprPDUg5QLwHr4NE.LtTqiWKw7/0jB4vFLbbKBxqfDE6Th1.', 'TestDriver1', 'DriverP@email.com', 2778),
(9, '505050', 741589665, '$2y$10$SDh4NEYzluUtkVoohUoyv.80UE2T2QuXiWq7COxYFzUEUE6qfNe02', 'Driver3', 'lk@email.com', 2778),
(11, '1', 74589654, '$2y$10$tpBjWWiqG.3bjRGyN4s6.eKvrX.eqdp0VgtdszaMKl0TtRlZYado6', 'candy', 'MegasdeniyaTravels@aiesec.lk', 2778),
(12, '200045787965', 715489557, '$2y$10$yk6tnUDM9RHG2n3aOprpjOURjNxwohrOpx4Htnwczq7Q9A.02bZte', 'thirani', 'thirani@yahoo.com', 2778);

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
('1231231231', '017777953', 'lol', 'ravindu.w23@gmail.com', '123'),
('123456789', '0714587441', 'Name2', 'Name2@email.com', 'Password'),
('2778', '0714589887', 'Name1', 'Name1@email.com', 'Name1');

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
(4, '1231231231', 'cag', '2342', 'Bike', 'petrol', '543425', 10, 10),
(5, '2778', 'CAB', '1578', 'Van', 'Petrol', 'SV30-0169266', NULL, NULL),
(7, '123456789', 'CAD', '1108', 'Bus', 'Diesel', 'XZ30-0169266', NULL, NULL),
(8, '123456789', 'KV', '5050', 'Car', 'Diesel', 'UIO7-0168586', NULL, NULL),
(14, '2778', 'JK', '4578', 'Bike', 'Petrol', 'CK90-859685', NULL, NULL),
(15, '2778', 'TY', '8095', 'Bike', 'Petrol', 'Po30-0169266', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `org_admin`
--
ALTER TABLE `org_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `BRN` (`BRN`),
  ADD UNIQUE KEY `MobileNo` (`MobileNo`);

--
-- Indexes for table `org_driver`
--
ALTER TABLE `org_driver`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `chassis` (`chassis`),
  ADD KEY `nic` (`nic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `org_admin`
--
ALTER TABLE `org_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `org_driver`
--
ALTER TABLE `org_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
