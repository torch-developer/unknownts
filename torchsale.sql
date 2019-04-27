-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2019 at 03:00 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `torchsale`
--

-- --------------------------------------------------------

--
-- Table structure for table `postads`
--

CREATE TABLE `postads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_category` varchar(50) NOT NULL,
  `ad_title` varchar(50) NOT NULL,
  `ad_caption` varchar(255) NOT NULL,
  `ad_price` int(50) NOT NULL,
  `ad_condition` varchar(255) NOT NULL,
  `ad_description` varchar(500) NOT NULL,
  `ad_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postads`
--

INSERT INTO `postads` (`id`, `user_id`, `ad_category`, `ad_title`, `ad_caption`, `ad_price`, `ad_condition`, `ad_description`, `ad_image`) VALUES
(16, 0, 'Cars', 'boooook', 'booo', 456, 'Good', 'asdfghjklkjhgfdfghjk', './uploads/5cc077b5db78b0.70686694.1-512.png');

-- --------------------------------------------------------

--
-- Table structure for table `remembered_logins`
--

CREATE TABLE `remembered_logins` (
  `token_hash` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `remembered_logins`
--

INSERT INTO `remembered_logins` (`token_hash`, `user_id`, `expires_at`) VALUES
('a0ab1c5fc89d26905b22ffd386080ec7d9bf3979978f7db981b308cda74e26c1', 15, '2019-05-24 16:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_hash` varchar(64) DEFAULT NULL,
  `password_reset_expires_at` datetime DEFAULT NULL,
  `activation_hash` varchar(64) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `shop_name`, `phone_number`, `address`, `password_hash`, `password_reset_hash`, `password_reset_expires_at`, `activation_hash`, `is_active`) VALUES
(12, 'mustyytee1@gmail.com', 'baba chedera', '11111111111', 'off-k', '$2y$10$50I2XfaYMjXT6hoUc4HVl.soQ.prUhLSkM/tTF2MkyfDv2ikigWdu', '9b1073bbffe908116bfd8d835919bc34e15f31cd976d0eb9fe335a92a4b4c409', '2019-04-24 18:56:05', NULL, 1),
(13, 'mustyytee2@gmail.com', 'baba', '0', 'pop', '$2y$10$vYLv0SkSw2XYgXSe49UxfuuFZVbN0v4xCDCYhUSgY0ICUQoCd9V6K', NULL, NULL, 'daf171aa88a4a5f8ec4005b72f8172a79a3a3c82bcb22a698be98543938a5e85', 0),
(14, 'taiwomustapha4real@yahoo.com', 'shop1', '9024022316', 'taiwomustapha4real@yahoo.com', '$2y$10$4cmcCmr5Q68zkLUROy0/NuAQd9tel.lrq1Y87PYTwnLrkB/z6Ub0y', NULL, NULL, 'bff345e39354966b35ef6ac09ebdd835560f9835586dab2dc6dd1b358c8e8b08', 0),
(15, 'mustyytee@gmail.com', 'chenex', '09024022316', 'olunlade', '$2y$10$4Lzex3531i5hiUADD8gHo.ZYKerpcgoVgrNLOZdzxc8FaJII3WxaG', NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `postads`
--
ALTER TABLE `postads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `remembered_logins`
--
ALTER TABLE `remembered_logins`
  ADD PRIMARY KEY (`token_hash`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_hash` (`password_reset_hash`),
  ADD UNIQUE KEY `activation_hash` (`activation_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postads`
--
ALTER TABLE `postads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
