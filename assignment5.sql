-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2023 at 06:44 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment5`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `user_id`, `name`, `description`, `status`, `created_at`, `modified_at`) VALUES
(1, 1, 'Fortuner', 'This is 4x4 variant', 1, '2023-01-30 14:55:51', NULL),
(2, 1, 'Thar', 'This is 4x2 variant', 1, '2023-01-30 14:55:51', NULL),
(3, 1, 'Alto', 'This is 4x2 variant', 1, '2023-01-30 14:55:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `company` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `make` year NOT NULL,
  `color` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `company`, `brand`, `model`, `make`, `color`, `description`, `image`, `active`) VALUES
(1, 'Mahindra', 'Thar', '4x2', 2020, 'Red', 'This is 4x4 Mahindra Thar Variant.', 'red_thar.jpg', 1),
(2, 'Toyoto', 'Fortuner', '4x4', 2018, 'White', 'This is 4x4 white fortuner.', 'white_fortuner.jpeg', 1),
(4, 'Maruti', 'Alto', '4x2', 2014, 'White', 'This is maruti alto 800.', 'white_alto.jpeg', 1),
(5, 'Mahindra', 'Thar', '4x4', 2023, 'Black', 'This is 4x4 black Thar.', 'black_thar.jpeg', 1),
(6, 'Toyoto', 'Fortuner', '4x2', 2015, 'Red', 'hggfhghf hgh', 'white_fortuner.jpeg', 1),
(7, 'Mahindra', 'Thar', '4x4', 2008, 'Red', 'This is New Thar..', 'red_thar.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `car_id` int NOT NULL,
  `star` int NOT NULL,
  `review` varchar(250) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `car_id`, `star`, `review`, `user_name`, `time`) VALUES
(15, 2, 5, 5, 'One of my dream car!', 'Rahul Kumar', '2023-02-01 03:59:53'),
(16, 2, 5, 4, 'My favoure car', 'Rahul Kumar', '2023-02-01 04:00:10'),
(17, 2, 4, 3, 'Nice one', 'Rahul Kumar', '2023-02-01 04:10:07'),
(18, 2, 6, 4, 'Awesome', 'Rahul Kumar', '2023-02-01 04:22:33'),
(19, 3, 7, 2, 'not good', 'Rohit Paul', '2023-02-01 04:45:19'),
(20, 3, 4, 5, 'great!!', 'Rohit Paul', '2023-02-01 04:45:35'),
(21, 3, 1, 5, 'One of my favourite car.', 'Rohit Paul', '2023-02-01 04:45:55'),
(23, 4, 5, 2, '🙂🙂🙂', 'Ram', '2023-02-01 09:13:36'),
(24, 4, 1, 1, 'Not intrested..', 'Ram', '2023-02-01 09:21:00'),
(25, 4, 7, 5, 'hello', 'Ram', '2023-02-01 12:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` varchar(100) DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `modified_at`, `token`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$QZIgKd0pGJxIrxdOac/ib.bRmHXeIuYEIniQ4QcCHnRicn4JzPt2m', 0, '2023-01-30 14:52:11', NULL, NULL),
(2, 'Rahul Kumar', 'rahul@gmail.com', '$2y$10$d9IPFEaKanu944cEBzAeDu6hdBfCdzfexNEIkf7qrrQIyfsfbgszS', 1, '2023-01-31 06:06:50', NULL, NULL),
(3, 'Rohit Paul', 'rohit@gmail.com', '$2y$10$n.q1VmuYMUAMIhCaQdrubu8qmkMLAU.bjKj/GKDAf9C7d12bPxMa6', 1, '2023-01-31 06:07:39', NULL, NULL),
(4, 'Ram', 'ram@gmail.com', '$2y$10$sYWAPS2JyWpIBkr.A60k8e0IU08IhtFjn7QPlU8sm.z0EMjFUSB.6', 1, '2023-01-31 06:16:45', NULL, NULL),
(6, 'New One', 'new@gmail.com', '$2y$10$e2JVDqZozAW6zvPg4aSsf.G8t2egtj6e.LWsAVu2RQiQENk4Y/T0a', 1, '2023-02-01 09:06:34', NULL, NULL),
(7, 'Sahil', 'sahil@gmail.com', '$2y$10$fbmwLHs.10Vw4GmiYwZg2e5DOYWKxk6QU72MHDKEguPQKtBnIeg.6', 1, '2023-02-01 11:02:55', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
