-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 04:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toys_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `toys`
--

CREATE TABLE `toys` (
  `id` int(10) NOT NULL,
  `id_cat` int(10) NOT NULL,
  `toy_name` text NOT NULL,
  `toy_image` text NOT NULL,
  `toy_quantity` int(10) NOT NULL,
  `toy_price` decimal(10,0) NOT NULL,
  `toy_desc` text NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toys`
--

INSERT INTO `toys` (`id`, `id_cat`, `toy_name`, `toy_image`, `toy_quantity`, `toy_price`, `toy_desc`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(17, 10, 'Hotwheels', 'Kj3HaAVlnBkzXCZl8seSYUgL7P7xNo4ARGzn9kwXBtDNqThFVMMi9165OHLvEUfC.jpg', 5, '25000', 'Hotwheels', '2020-11-18 01:28:52', 'kangbahar@gmail.com', '2020-11-18 01:29:59', 'lumba.lumbadrt@gmail.com'),
(18, 10, 'Kuda-kudaan', 'C8MxYYHbnvfxP5o1tKkHbIAXC8yRBd2n1KpDihFgjWu0Ww3OfJ5SPcZRF9mOJkvz.jpg', 12, '200000', 'Kuda-kudaan', '2020-11-18 16:30:30', 'kangbahar@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `toys_category`
--

CREATE TABLE `toys_category` (
  `id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_image` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toys_category`
--

INSERT INTO `toys_category` (`id`, `cat_name`, `cat_desc`, `cat_image`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(10, 'Mainan Balita', 'Mainan Balita / Anak-anak', NULL, '2020-11-18 01:25:35', 'lumba.lumbadrt@gmail.com', '2020-11-18 01:54:23', 'lumba.lumbadrt@gmail.com'),
(11, 'Mainan Anak-anak', 'Mainan Anak-anak', NULL, '2020-11-18 16:38:45', 'kangbahar@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `user_role` varchar(3) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `sex` varchar(2) NOT NULL,
  `birthday` date NOT NULL,
  `address` text NOT NULL,
  `photo_profile` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `user_role`, `name`, `email`, `password`, `sex`, `birthday`, `address`, `photo_profile`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(85, 'ADM', 'Arif Rizki Hidayat', 'lumba.lumbadrt@gmail.com', '$2y$10$KiRMOmUMiCD09J9ZG8r40u3X3yK4a8d6KoG.MdZuA/tJWch91DNLy', 'L', '1993-04-17', 'Jl. Kemuning Dalam 6 Utan Kayu', 'vZ3YylsS8sDiaciL6EUoXW19qRvVNMcpqnNYeABjw0tR2u2Qrf1TIg7VJWBp4uDL.jpg', '2020-11-16 21:38:32', 'Admin', NULL, NULL),
(86, 'ADO', 'Kang Bahar Aja', 'kangbahar@gmail.com', '$2y$10$Bk3Le5hFTpGPAoFdcW6Oe.KIvpmmrk8l0naX7iURW/6qAYKsi2h3q', 'L', '1974-01-20', 'Jalan Kahuripan 11 Bandung Selatan', '2iRgr3Wpf7XsmP4OYoBhdybHtIcpd8QUbvEZ1fxlJukLCATZr65xJ0lwkOK9s24H.jpg', '2020-11-16 21:39:38', 'Admin', '2020-11-18 01:35:10', 'lumba.lumbadrt@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_code` varchar(3) NOT NULL,
  `role_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_code`, `role_name`) VALUES
('ADM', 'Admin Master'),
('ADO', 'Admin Operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `toys`
--
ALTER TABLE `toys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `toy_image` (`toy_image`(768)),
  ADD KEY `id_cat` (`id_cat`) USING BTREE;

--
-- Indexes for table `toys_category`
--
ALTER TABLE `toys_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_role` (`user_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `toys`
--
ALTER TABLE `toys`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `toys_category`
--
ALTER TABLE `toys_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `toys`
--
ALTER TABLE `toys`
  ADD CONSTRAINT `toys_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `toys_category` (`id`);

--
-- Constraints for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD CONSTRAINT `user_admin_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`role_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
