-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 06:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_registration`
--

CREATE TABLE `product_registration` (
  `sku_id` int(20) NOT NULL,
  `sku_code` varchar(20) NOT NULL,
  `sku_name` varchar(20) NOT NULL,
  `mrp` varchar(20) NOT NULL,
  `distributor_price` float NOT NULL,
  `weight_vol` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_registration`
--

INSERT INTO `product_registration` (`sku_id`, `sku_code`, `sku_name`, `mrp`, `distributor_price`, `weight_vol`) VALUES
(1, '4585', 'ssss', 'asas', 100, 45120),
(2, '333', 'aa', 'asa', 102.25, 36.55),
(3, '0', 'sdsd', 'sd', 0, 0),
(5, 'ju', 'ki', 'lo', 52.1, 8.4),
(6, 'dayani', 'gt', 'rrrrrrrr', 234, 10.01);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `op_no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `enter_qty` float NOT NULL,
  `total_price` float NOT NULL,
  `zone` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL,
  `territory` varchar(20) NOT NULL,
  `distributor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`op_no`, `date`, `enter_qty`, `total_price`, `zone`, `region`, `territory`, `distributor`) VALUES
('TEP1', '2023-08-09', 1, 234, 'Select', 'Select', 'Select', '2'),
('TEP1', '2023-08-09', 2, 468, 'Select', 'Select', 'Select', 'Select'),
('TEP1', '2023-08-09', 100, 23400, '2', '2', '1', '6'),
('TEP1', '2023-08-09', 10, 2340, 'Select', 'Select', 'Select', 'Select'),
('TEP1', '2023-08-10', 2, 468, 'Select', 'Select', 'Select', 'Select');

-- --------------------------------------------------------

--
-- Table structure for table `region_registration`
--

CREATE TABLE `region_registration` (
  `zone` int(20) NOT NULL,
  `region_code` int(20) NOT NULL,
  `region_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `region_registration`
--

INSERT INTO `region_registration` (`zone`, `region_code`, `region_name`) VALUES
(2, 1, 'Region 1'),
(2, 2, 'Region 3'),
(2, 3, 'Region 6'),
(1, 4, 'Region 5');

-- --------------------------------------------------------

--
-- Table structure for table `territory_registration`
--

CREATE TABLE `territory_registration` (
  `zone` int(20) NOT NULL,
  `region` int(20) NOT NULL,
  `territory_code` int(20) NOT NULL,
  `territory_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `territory_registration`
--

INSERT INTO `territory_registration` (`zone`, `region`, `territory_code`, `territory_name`) VALUES
(1, 3, 1, 'ter1'),
(1, 2, 2, 'ter2'),
(1, 4, 3, 'ter3'),
(2, 3, 4, 'ter4'),
(2, 3, 5, 'ter5'),
(1, 2, 6, 'ter7'),
(1, 1, 7, 'kiuyy'),
(2, 3, 8, 'frewq');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `name` varchar(20) DEFAULT NULL,
  `nic` varchar(12) NOT NULL,
  `address` varchar(20) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `territory` int(20) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`name`, `nic`, `address`, `mobile`, `email`, `gender`, `territory`, `user_name`, `password`) VALUES
('nipuni', '458', 'ddddd', 0, 'd@gamail.com', 'm', 3, 'mm', '45');

-- --------------------------------------------------------

--
-- Table structure for table `zone_registration`
--

CREATE TABLE `zone_registration` (
  `zone_code` int(20) NOT NULL,
  `long_description` varchar(20) NOT NULL,
  `short_description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zone_registration`
--

INSERT INTO `zone_registration` (`zone_code`, `long_description`, `short_description`) VALUES
(1, 'ASas', 'SXAS'),
(2, 'Zone 1', 'ZO1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_registration`
--
ALTER TABLE `product_registration`
  ADD PRIMARY KEY (`sku_id`);

--
-- Indexes for table `region_registration`
--
ALTER TABLE `region_registration`
  ADD PRIMARY KEY (`region_code`);

--
-- Indexes for table `territory_registration`
--
ALTER TABLE `territory_registration`
  ADD PRIMARY KEY (`territory_code`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`nic`);

--
-- Indexes for table `zone_registration`
--
ALTER TABLE `zone_registration`
  ADD PRIMARY KEY (`zone_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_registration`
--
ALTER TABLE `product_registration`
  MODIFY `sku_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `region_registration`
--
ALTER TABLE `region_registration`
  MODIFY `region_code` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `territory_registration`
--
ALTER TABLE `territory_registration`
  MODIFY `territory_code` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `zone_registration`
--
ALTER TABLE `zone_registration`
  MODIFY `zone_code` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
