-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 06:57 PM
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
-- Database: `railway_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins_info`
--

CREATE TABLE `admins_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(180) NOT NULL,
  `last_name` varchar(180) NOT NULL,
  `designation` varchar(180) NOT NULL,
  `shift` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins_info`
--

INSERT INTO `admins_info` (`id`, `first_name`, `last_name`, `designation`, `shift`) VALUES
(1, 'Md. Ekhtiar', 'Hossain', 'Senior Officer', 'Day'),
(2, 'John', 'Wick', 'Officer', 'Day'),
(3, 'David', 'Silva', 'Deputi Officer', 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(150) DEFAULT NULL,
  `gender` varchar(150) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`p_id`, `p_name`, `gender`, `age`) VALUES
(100, 'Mr. Hasan', 'male', 23),
(101, 'Jorina', 'female', 30),
(102, 'Dr. Rahman', 'male', 55),
(103, 'Mr. Jaman', 'male', 32),
(105, 'Cristiano', 'male', 39);

-- --------------------------------------------------------

--
-- Table structure for table `rail_info`
--

CREATE TABLE `rail_info` (
  `train_name` varchar(150) NOT NULL,
  `arrival` varchar(180) NOT NULL,
  `halt` varchar(180) NOT NULL,
  `departure` varchar(180) NOT NULL,
  `duration` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rail_info`
--

INSERT INTO `rail_info` (`train_name`, `arrival`, `halt`, `departure`, `duration`) VALUES
('edrtged', 'dctrhdrh', 'dsrghdsr', 'dsrhdsrf', 'hed5ryh45'),
('Panchagar Express(794)', 'B Sirajul Islam', '00min', '12:20pm BST', '00:38h'),
('Rangpur Express (771)', 'Dhaka', '00min', '09:10am BST', '00h'),
('Rangpur Express (772)', 'fdntmn', 'drthdrh', 'j5uhyer5y', 'nftmgt'),
('Rangpur Express (773)', 'dctrhdrh', 'dsrghdsr', 'j5uhyer5y', 'drhdrh');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `t_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `a_id` int(11) DEFAULT NULL,
  `train_name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`t_id`, `p_id`, `a_id`, `train_name`) VALUES
(125, 102, 2, 'Rangpur Express (771)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins_info`
--
ALTER TABLE `admins_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `rail_info`
--
ALTER TABLE `rail_info`
  ADD PRIMARY KEY (`train_name`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `a_id` (`a_id`),
  ADD KEY `train_name` (`train_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `passenger` (`p_id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `admins_info` (`id`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`train_name`) REFERENCES `rail_info` (`train_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
