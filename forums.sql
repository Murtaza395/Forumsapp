-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2024 at 01:45 PM
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
-- Database: `forums`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python Language', '2024-08-07 22:01:36'),
(2, 'javascript', 'javascript language', '2024-08-07 22:02:04'),
(3, 'Java', 'Java Language', '2024-08-08 10:28:29'),
(4, 'React Js', 'React Js framework', '2024-08-08 10:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(255) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(255) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(29, 'hi this is me', 1, 5, '2024-08-11 01:05:12'),
(30, 'hi this is me', 1, 5, '2024-08-11 01:05:50'),
(31, 'hi boss', 1, 5, '2024-08-11 01:05:59'),
(32, 'hi boss', 1, 5, '2024-08-11 01:06:02'),
(33, 'AOA! How are you', 1, 5, '2024-08-11 01:06:15'),
(34, 'hi boss', 1, 5, '2024-08-11 01:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(255) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(255) NOT NULL,
  `thread_user_id` int(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `created`) VALUES
(1, 'this is thread', 'thread\r\n', 1, 5, '2024-08-11 01:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_pass`, `created`) VALUES
(5, 'mughal@gmail.com', '$2y$10$ugd14E/fg2xv6Ff76b5EAuXHe/E2qYoxThl2VW25xZnHpXdnIV826', '2024-08-11 01:03:21'),
(6, 'mughalmurtaza999@gmail.com', '$2y$10$9PPXAtdjvMwzBM2HzpLZNui22xPEyhLqolwZBWl3mIeJqhXkUP13C', '2024-08-11 01:03:29'),
(7, 'talha@gmail.com', '$2y$10$iaDtEcGD9feUOGD1dpeyxOc3VfVvJ8i4H72E9u6VWA6fBgcFuq/SW', '2024-08-11 01:03:39'),
(8, 'm@gmail.com', '$2y$10$FW.eUFdfm0q.frvWDw3pPO.wDX4qKmQCpbbCzQWngNE/CJTf4iBKu', '2024-08-11 01:03:48'),
(9, 'mughalmurtaza218@gmail.com', '$2y$10$LDqu8ft6gTG.wJju6ny8geDDcTm/p6G.xajsIrrWzoRf2j1TVF6mW', '2024-08-11 01:03:57'),
(10, 'n@gmail.com', '$2y$10$HrR942z9lXe18AzbCyFZ/evj4rIQXtwdE79GlHWTCCQokdiHh2.72', '2024-08-11 01:04:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
