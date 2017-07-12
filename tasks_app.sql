-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2017 at 09:21 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasks_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `crews`
--

CREATE TABLE `crews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persons` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crews`
--

INSERT INTO `crews` (`id`, `user_id`, `name`, `persons`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nan', 5, 'silly', '2017-07-10 04:53:25', '2017-07-10 04:53:25'),
(2, 1, 'Van', 9, 'tiling', '2017-07-10 05:58:55', '2017-07-10 05:58:55'),
(3, 2, 'Set', 4, 'concrete', '2017-07-10 06:42:29', '2017-07-10 06:42:29'),
(4, 3, 'Savan', 23, 'concreting', '2017-07-10 19:14:26', '2017-07-10 19:14:26'),
(5, 1, 'Porn', 4, 'mosaic', '2017-07-11 05:21:54', '2017-07-11 05:21:54'),
(6, 1, 'Dim', 3, 'demolishing', '2017-07-11 21:50:22', '2017-07-11 21:50:22'),
(7, 1, 'Nin', 4, 'mosaic', '2017-07-11 21:52:02', '2017-07-11 21:52:02'),
(8, 8, 'TiraTest', 0, '1', '2017-07-12 00:13:42', '2017-07-12 00:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(79, '2014_10_12_000000_create_users_table', 1),
(80, '2014_10_12_100000_create_password_resets_table', 1),
(81, '2017_07_09_070341_create_tasks_table', 2),
(82, '2017_07_09_080619_create_crews_table', 2),
(83, '2017_07_09_085118_create_types_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `crew_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `room` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `start` date NOT NULL,
  `finish` date DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `crew_id`, `user_id`, `type_id`, `room`, `amount`, `start`, `finish`, `completed`) VALUES
(1, 1, 1, 2, '215', 22, '2017-07-05', NULL, 1),
(10, 2, 1, 2, '231', 22, '2017-07-12', NULL, 0),
(11, 2, 1, 5, '212', 8, '2017-07-12', NULL, 0),
(12, 2, 1, 3, '123', 24, '2017-07-05', '2017-07-12', 1),
(14, 2, 1, 2, '165', 3, '2017-07-11', NULL, 0),
(15, 1, 1, 3, '222', 21, '2017-07-04', '2017-07-11', 1),
(16, 1, 1, 5, '23', 12, '2017-07-10', NULL, 0),
(17, 1, 1, 6, '222', 56, '2017-07-08', '2017-07-11', 1),
(18, 5, 1, 3, 'stairway', 21, '2017-07-04', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(2, 'concreting'),
(3, 'tiling'),
(5, 'sleeping'),
(6, 'rendering'),
(7, 'fishing'),
(8, 'fishing'),
(9, 'fishing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tira(k)', 'k@mail.ru', '$2y$10$0qgYKA8Wx2BPmcBXqPdyweLl3W2if.j443WOBQq/NZ6oV4zSC1cGa', 'ut5MIaQAtIQdolWXp6HpISuB6DqlA3fpUsSdBkJjof8wn1mtGezdWHGZXpWr', '2017-07-10 04:49:15', '2017-07-10 04:49:15'),
(3, 'Kirill', 'kirill-shakirov@mail.ru', '$2y$10$x1F/ztdkvEX//tKohiCuB.QhwC0KIWRfZZYzbCXwEaT8agoKGOuse', 'g39XoBlA6Yy7WDuLS9i8vDwxTtKfrLAOQZnHikyz2JnXQEKkNXP8N6yx7gNF', '2017-07-10 19:11:51', '2017-07-10 19:11:51'),
(4, 'k@mail.rue', 'dkfjs@kdjf.ru', '$2y$10$br5EZDWLSfPdpLtQ/1v2SuxQ3875Wt6XSS6lsZvH9M8utbrM4Qd9u', NULL, '2017-07-11 22:03:26', '2017-07-11 22:03:26'),
(5, 'kita', 'kita@mail.ru1', '$2y$10$E1qX2MqcPaGphTy7QfNUg.c9PRmoAH1GkDwYMoz3gskUQudIx3t2K', 'xNRIDhiOhPMyS1ewhsDxQThzGOwphgNmvstnEsYYYF7mKeed0aTDSUztBoui', '2017-07-11 23:42:09', '2017-07-11 23:42:09'),
(6, 'tip', 'tirip@mail.ru', '$2y$10$iEPM2.J0cod0P1poqFCWuu/7E8rxC7knLLmeuyRFm79yP7e7NJhKq', 'xmaEvsGZDvxx5GiSC1v4lHqRLCzmMKQRQb9g4L1hUf0LpahWWqFjIicbPEHp', '2017-07-11 23:43:33', '2017-07-11 23:43:33'),
(7, 'te', 'te@mail.ru', '$2y$10$9eL3KF8fEtOaR6TNma7HxOzKgM9NcRDZroAGNB1CJISXMI/f61sja', '7cmTs7lmBgmhvKIAOTUr796LW8Z4mDDbpzdjjidASsIQ62CHxqlaiE4pGUhf', '2017-07-11 23:45:43', '2017-07-11 23:45:43'),
(8, 'Tira', 't@mail.ru', '$2y$10$EX46eXHJ9wUCXu6MUF7.COG2ZfNjge8iZPvlJteBGEieIa2IgGgYS', 'Mc8hpglynXwdQEqruqlDnjvMUrwYm3shYqouVRjRehSZE2LhVNbZlcCMMxwG', '2017-07-12 00:13:42', '2017-07-12 00:13:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crews`
--
ALTER TABLE `crews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `crews_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `crews`
--
ALTER TABLE `crews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
