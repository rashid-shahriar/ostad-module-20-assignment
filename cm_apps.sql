-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2024 at 11:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cm_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cm_apps`
--

CREATE TABLE `cm_apps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cm_apps`
--

INSERT INTO `cm_apps` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Rashid Shahriar', 'rashid@name.com', '017', 'motsiret, 123.Dhk', '2024-08-03 14:57:25', '2024-08-11 02:50:01'),
(2, 'second name updated', 'rashid@gmail.com', '018', 'Raj, 111,H', '2024-08-03 14:57:57', '2024-08-03 17:00:09'),
(4, 'Ru', 'ru@gmail.com', '019', 'rajshahi, 123.NY', '2024-08-03 10:00:28', '2024-08-03 10:00:28'),
(5, 'asif', 'asif@gmail.com', '+8801733290379', NULL, '2024-08-11 02:51:05', '2024-08-11 02:51:05'),
(6, 'End', 'end@gmail.com', NULL, 'end street', '2024-08-11 02:58:39', '2024-08-11 02:58:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cm_apps`
--
ALTER TABLE `cm_apps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cm_apps_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cm_apps`
--
ALTER TABLE `cm_apps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
