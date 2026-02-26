-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2026 at 06:47 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `id` int(11) NOT NULL,
  `heading` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `place` varchar(200) DEFAULT NULL,
  `presenter_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`id`, `heading`, `description`, `date`, `place`, `presenter_name`) VALUES
(7, 'CYBERSCURITY SEMINA', 'educational event—ranging from brief awareness sessions for non-technical staff to multi-day technical summits for experts—designed to address the evolving landscape of digital threats', '2026-02-10', 'New Amani', 'Dr. kaka T'),
(8, 'AI BASED TRAINING', 'artificial intelligence to enhance the creation, delivery, and personalization of learning materials, often replacing or supplementing traditional, static methods.', '2026-02-26', 'MUST-NYERERE HALL', 'Alto Dezdel'),
(9, 'workshop semina on security', 'all participant', '2026-02-26', 'MUST', 'kaka T');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_role` varchar(50) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_role`) VALUES
(2, 'temi', 'temikandasimeo@gmail.com', '$2y$10$h1FLdluTVHomQ18xS4bWlOlcDg8pqi6Ebs7untva5cISPzq9yUq.i', 'Moderator'),
(3, 'agath', 'agatha@gmail.com', '$2y$10$X4vwJgoPPhpcOzWmPriEVuhH01Yi1bfUs5sgOtE8mPwu1pFv1Ufxa', 'User'),
(9, 'alto', 'alto@gmail.com', '$2y$10$LBuu7Vqu.fGVKias735JjuNuK9oI5bSsDCf96clPhasMEleo6Z2RO', 'Admin'),
(12, 'nicomed', 'nicomed@gmail', '$2y$10$pHlAOQ6RlM1UUbMRb9ODZOBUO9S3LvPZxJnwA7wDY5/hTML9y5y62', 'Coordinator'),
(14, 'juma', 'juma@gmail.com', '$2y$10$r75PDfLB/O2eyzwtWpUNmeIKWU2m8op4LZxLrCkpod8AFfKQiDux2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
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
-- AUTO_INCREMENT for table `event_details`
--
ALTER TABLE `event_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
