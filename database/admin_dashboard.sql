-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Aug 27, 2024 at 12:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_code` varchar(115) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_status` varchar(255) NOT NULL,
  `category_question` int(115) NOT NULL,
  `category_time` int(115) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_code`, `category_name`, `category_status`, `category_question`, `category_time`, `admin_id`, `date_time`) VALUES
(1, 'P-10', 'Python', 'active', 30, 30, 0, '2024-08-23 13:00:06'),
(2, 'R-01', 'React', 'active', 20, 30, 0, '2024-08-23 13:00:06'),
(3, 'HT-50', 'HTML', 'disabled', 30, 35, 0, '2024-08-23 13:00:43'),
(4, 'CSS-02', 'CSS', 'active', 25, 25, 0, '2024-08-23 13:00:43'),
(32, 'NJ-02', 'Node JS', 'paused', 30, 30, 0, '2024-08-23 15:24:08'),
(33, 'FL-01', 'Flutter', 'paused', 15, 30, 4, '2024-08-23 15:25:49'),
(36, 'AICT-01', 'AICT', 'paused', 222, 22, 4, '2024-08-23 17:15:31'),
(37, 'MAT', 'qq', 'active', 222, 22, 4, '2024-08-23 17:16:43'),
(39, '', 's', 'active', 22, 22, 0, '2024-08-23 17:18:21'),
(41, '', 's', 'active', 22, 22, 0, '2024-08-23 17:19:19'),
(42, 'MAT', 's', 'active', 22, 22, 4, '2024-08-23 17:19:37'),
(43, 'PHY-02', 'Physic', 'paused', 10, 30, 4, '2024-08-23 17:34:17'),
(44, 'MAT-201', 'Calculus', 'active', 5, 30, 4, '2024-08-23 17:40:10'),
(45, 'MAT-201', 'Calculus', 'active', 5, 30, 1, '2024-08-23 17:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `category_questions`
--

CREATE TABLE `category_questions` (
  `questionId` int(255) NOT NULL,
  `questionCategory` text NOT NULL,
  `firstOption` text NOT NULL,
  `secondOption` text NOT NULL,
  `thirdOption` text NOT NULL,
  `fourthOption` text NOT NULL,
  `correctOptions` varchar(50) NOT NULL,
  `categoryId` int(255) NOT NULL,
  `categoryCode` varchar(100) NOT NULL,
  `adminId` int(155) NOT NULL,
  `adminName` varchar(155) NOT NULL,
  `updatedBy_Id` int(11) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_questions`
--

INSERT INTO `category_questions` (`questionId`, `questionCategory`, `firstOption`, `secondOption`, `thirdOption`, `fourthOption`, `correctOptions`, `categoryId`, `categoryCode`, `adminId`, `adminName`, `updatedBy_Id`, `dateTime`) VALUES
(1, 'questionCategory', 'firstOption', '2', '3', '4', 'correct', 43, 'categoryCode', 109, 'adminname', 0, '2024-08-24 17:06:07'),
(2, 'questionCategory', 'firstOption', '2', '3', '4', 'correct', 43, 'categoryCode', 109, 'adminname', 0, '2024-08-24 17:06:49'),
(3, 'Correct br tag', '< br >', '</ br>', '<br />', '</ br />', 'third', 3, 'HT-50', 4, 'Talha', 0, '2024-08-24 17:17:37'),
(4, 'Correct br tag', '< br >', '</ br>', '<br />', '</ br />', 'first', 2, 'R-01', 0, '', 4, '2024-08-24 17:18:25'),
(5, '22', '11', '11', '11', '', 'first', 43, 'PHY-02', 4, 'Talha', 0, '2024-08-24 17:36:00'),
(6, 'ss', 'sss', 'ssss', 'ss', '', 'first', 43, 'PHY-02', 4, 'Talha', 0, '2024-08-24 18:05:19'),
(7, 'ss', 'sss', 'ssss', 'ss', '', 'first', 43, 'PHY-02', 1, 'Hashir Meraj', 0, '2024-08-24 18:07:00'),
(8, 'Which HTML element is used to define the largest heading?', '', '', '', '', '', 0, '', 0, '', 0, '2024-08-26 13:23:31'),
(9, 'Which HTML element is used to define the largest heading?Which HTML element is used to define the largest heading?Which HTML element is used to define the largest heading?Which HTML element is used to define the largest heading?Which HTML element is used to define the largest heading?', '', '', '', '', '', 0, '', 0, '', 0, '2024-08-26 13:24:07'),
(10, 'How can I improve the performance of a PHP script that handles large amounts of data?', '', '', '', '', '', 0, '', 0, '', 0, '2024-08-26 13:26:40'),
(11, 'What are the most effective methods for optimizing SQL queries to improve database performance in a web application using PHP? Are there any tools or techniques that can help identify slow queries and suggest improvements?', '', '', '', '', '', 0, '', 0, '', 0, '2024-08-26 13:26:40'),
(12, 'In a Laravel project, what are the recommended practices for setting up and managing environment-specific configurations? How can I use environment variables securely, and what tools or techniques can help ensure that sensitive information is not exposed in the codebase or version control?', '', '', '', '', '', 0, '', 0, '', 0, '2024-08-26 13:27:13'),
(13, 'What are the key considerations and best practices for designing a scalable and maintainable database schema for a complex web application that involves multiple related entities and relationships? How can I ensure data integrity, optimize query performance, and accommodate future changes in the schema without significant disruption?', '', '', '', '', '', 0, '', 0, '', 0, '2024-08-26 13:27:13'),
(14, 'What are the best practices for optimizing SQL queries in PHP to enhance database performance and efficiency?', '', '', '', '', '', 0, '', 0, '', 0, '2024-08-26 13:28:51'),
(15, 'Correct br tag', '1', '1', '1', '1', 'second', 3, 'HT-50', 4, 'Talha', 0, '2024-08-26 14:47:53'),
(16, 'HAHAHA Checking Question', 'first  1', 'second2', 'Third3', 'Fourth4', 'fourth', 4, 'CSS-02', 4, 'Talha', 4, '2024-08-26 15:02:47'),
(17, 'HAHAHA Checking Question', 'first ', 'second', 'Third', 'Fourth', 'first', 4, 'CSS-02', 4, 'Talha', 0, '2024-08-26 18:44:18'),
(18, 'HAHAHA Checking Question', 'first ', 'second', 'Third', 'Fourth', 'first', 37, 'MAT', 4, 'Talha', 0, '2024-08-26 19:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(115) NOT NULL,
  `user_email` varchar(115) NOT NULL,
  `user_password` varchar(155) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`user_id`, `user_name`, `user_email`, `user_password`, `date_time`) VALUES
(1, 'Hashir Meraj', 'hashirmeraj1@gmail.com', '$2y$10$dtEOC5pMpK1XjamYl.pBjua9Tl9XbiEHaWLjNNm6c5mdUh0jUuQGK', '2024-08-22 23:50:28'),
(2, 'Hashir Meraj', 'hashirmeraj2@gmail.com', '$2y$10$mXlhr0FJtGSey4hVcWgvMObLCT9VSbecu4SrMWs8qJnIkjo7fKSdO', '2024-08-23 01:30:02'),
(3, 'Hashir Meraj', 'hashirmeraj11@gmail.com', '$2y$10$uOwVFxsACrRGo2PqGOFsCeVNNio4SjT/VOhTFZs0CTp6Zm.SaRV5O', '2024-08-23 02:29:53'),
(4, 'Talha', '1@1', '$2y$10$K7szUjxsyvph7FL.pg7WleWhh9cAa.InmQ1WAXL.8aUNFT41ioKnm', '2024-08-23 09:30:48'),
(5, 'Hashir Meraj', 'ali@1', '$2y$10$vh2dH/u23MjdZJ6FCn2Jn.DYE8EBI1hgEOQ.xAGyshXodjAPWqERO', '2024-08-23 19:55:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `category_questions`
--
ALTER TABLE `category_questions`
  ADD PRIMARY KEY (`questionId`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `category_questions`
--
ALTER TABLE `category_questions`
  MODIFY `questionId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
