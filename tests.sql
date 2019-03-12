-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2019 at 10:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tests`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2019_02_22_082307_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `verify_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `number` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `password_reset_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `verify_token`, `dob`, `number`, `gender`, `address`, `is_active`, `password_reset_code`, `google_id`, `google_token`, `facebook_id`, `facebook_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Pratik Korade', 'pratik.korade@tacto.in', '$2y$10$fsP4evJR49eRcDYSyuyka.9ToQiSk91cMuv/q4uMyw8r3asXALz7q', '', '0000-00-00', 0, 0, 'address of  pratik korade ', 0, '', '112132593760094002777', 'ya29.Gly8BhRNXftGLUKjYBxV4lINg5MeXLdqjuYJYBZIv4UBTdQp1cVg1viTk0y20ooV3IGw5m-B4FpBvP04_50d3EcGa4zNKeKv-Lv0oyySXMzZ6UXP6gdGn0kb_eIY_A', '', '', 'cRzUiLNhGTbnPXQdI1tRuzt21FEenhL7ohbq1kCu39Z6lXphUIL6t6yV2O7O', '2019-02-25 05:15:24', '2019-02-26 00:58:24'),
(9, 'pratik', 'pratik@tcato.in', '$2y$10$vigKgF0Tr90zoDhF4YoHXe0AdI63rKh31dWjB1k40br./KBDyqqym', 'eKN3P9gCWXHDX6kGBJb02c2XIjMaa3', '2019-02-06', 2147483647, 1, 'sajxs ,j EMAIL:￼ NUMBER:￼\r\nADDRESS:sa,jsak', 1, '', '', '', '', '', 'ion6TxlcqgpmwXR6ZfdzF52l9DkUS0UVx2EMFxeQb1zOOElTUkOZ2i9bKf5i', '2019-02-25 10:32:06', '2019-02-26 05:38:18'),
(10, 'abc', 'abc@gmail.com', '$2y$10$eBGxmo2J10nAHyA5wbga2eAap3h0NU9IuMvkzcmk1y7LVjO68GFlG', 'SuxvzFNmmkjLiMsJ7Mu61Poh2YbBDD', '2019-02-14', 2147483647, 0, 'abs bjmsbjka sbjsan ajJSANKLA', 1, '', '', '', '', '', 'hl7R74o8pDLcsvJWVNpZXlvdw5V9vdJvsTILmtciwLIt5t9AQ3KxBzJZa7la', '2019-02-26 01:43:18', '2019-02-26 01:50:24'),
(12, 'aaa', 'aaa@gm.com', '$2y$10$YRdlLQuzkcqGPFde9nstFuUqQTZUFAIqWy5IHBMzX/1QGXOSYrJTK', 'KrJ2rfnPH9kXsSga7qwGNlEsC6k7YM', '2019-02-15', 2147483647, 1, 'aas sssssaa', 1, '', '', '', '', '', 'syTfWbRjwzrjjZzWaK5qo0zWNUnE7KyoVxmM636CqQeBgJtmtAHaeQYBYlzg', '2019-02-26 05:20:11', '2019-02-26 06:02:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
