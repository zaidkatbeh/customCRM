-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 06:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2019_08_19_000000_create_failed_jobs_table', 1),
(30, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(31, '2023_01_26_132653_projects', 1),
(32, '2023_01_26_141015_project_users', 1),
(33, '2023_01_27_142646_task', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `client_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 'matloop', '2023-01-27 08:55:31', '2023-01-27 11:51:08', NULL),
(2, 13, '3d video', '2023-01-27 09:53:43', '2023-01-27 09:53:43', NULL),
(3, 9, 'epic games', '2023-01-27 11:42:27', '2023-01-27 11:42:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_users`
--

CREATE TABLE `project_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_users`
--

INSERT INTO `project_users` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 2, 12, NULL, NULL, NULL),
(13, 1, 10, '2023-01-27 13:41:28', '2023-01-27 13:41:28', NULL),
(14, 1, 11, '2023-01-27 13:41:28', '2023-01-27 13:41:28', NULL),
(15, 1, 12, '2023-01-27 13:41:28', '2023-01-27 13:41:28', NULL),
(16, 3, 10, '2023-01-27 13:42:27', '2023-01-27 13:42:27', NULL),
(17, 3, 11, '2023-01-27 13:42:27', '2023-01-27 13:42:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `project_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'use figma to design the UI/UX', 1, '2023-01-27 12:30:00', '2023-01-27 13:13:32', NULL),
(2, 'design the charachters using 3d max', 2, '2023-01-27 13:00:36', '2023-01-27 13:00:36', NULL),
(3, 'clone the desing using react js', 3, '2023-01-27 13:00:51', '2023-01-27 13:09:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'zaid katbeh', 2, 'zaidkatbeh5@gmail.com', '2023-01-26 15:37:36', '$2y$10$IqnksfFNQh9amgCYi3gCSuETG/6aNr/fBDJLvKWuwCZlSdrE/8Hki', NULL, '2023-01-26 15:36:58', '2023-01-26 15:37:36', NULL),
(9, 'anas amro', 1, 'anasamro@gmail.com', NULL, '$2y$10$f6H6fXYefei4gdxwEs35AeE2yao/5u.TGIfQVCPv99uc67utTqko6', NULL, '2023-01-27 08:44:07', '2023-01-27 08:44:07', NULL),
(10, 'zaid.M.katbeh', 0, '21911098@students.hebron.edu', '2023-01-27 08:45:33', '$2y$10$jhBZpOV6pts5KJVcGvcAneVzP0wVAV6mxLUfkdB41pu9L0dNxg.UG', NULL, '2023-01-27 08:45:02', '2023-01-27 08:45:33', NULL),
(11, 'mohammad NR', 0, 'mohammadNR@gmail.com', NULL, '$2y$10$tnIjlrxU1oYSMh70uOaNR.pIzwngnZB44uHiIwye2QYxi/Rdvl3rW', NULL, '2023-01-27 08:46:49', '2023-01-27 08:46:49', NULL),
(12, 'ahmad abo alfelat', 0, 'ahmadaboalfelat@gmail.com', NULL, '$2y$10$WktNW0m2464h5zaev0rauOg89u2vg5WMFiMw1IeG4C9n6Fhn4kXVu', NULL, '2023-01-27 08:47:40', '2023-01-27 11:47:14', NULL),
(13, 'arwa alnajjar', 1, 'arwaa2lnajjar@gmail.com', NULL, '$2y$10$NultuC1fk4uSAjZmu5.l/OnzuPeHZkjr5YfdEKJdnZvSxILBYNe7W', NULL, '2023-01-27 08:48:19', '2023-01-27 08:48:19', NULL),
(14, 'abd alaziz', 1, 'abdalaziz@gmail.com', NULL, '$2y$10$Lum3T400PueVQ.2C0lncqeQmDaeD9DIPD0jJZ9r6nZK6ZgqP9NKVe', NULL, '2023-01-27 14:07:34', '2023-01-27 14:07:34', NULL),
(15, 'belal amro', 1, 'belalamro@gmail.com', NULL, '$2y$10$vlKPtIlvEhOYaG7QwARC0ut3jdUWac0Oe3QaOXS.RLmulujMNbjKG', NULL, '2023-01-27 14:08:08', '2023-01-27 14:08:08', NULL),
(16, 'baraa ahlashlamon', 0, 'baraaahlashlamon@gmail.com', NULL, '$2y$10$MHrBXzBs9hQkS8AmkYGhAev1./zXuKg/3SsKzey2BhJ4WY7le/29S', NULL, '2023-01-27 14:09:05', '2023-01-27 14:09:05', NULL),
(17, 'yosof abo alfealt', 0, 'yosofaboalfealt@gmail.com', NULL, '$2y$10$wILl53uMsAaaZDKVfbYFke3aeIC2UxEjqi8zS0KWUSYe1r04nX/wa', NULL, '2023-01-27 14:10:53', '2023-01-27 14:10:53', NULL),
(18, 'oday katbeh', 0, 'odaykatbeh@gmail.com', NULL, '$2y$10$CfDmFul61PEmtUp4Rky2b.6zAh5VzKKcTYjc8WDERFFpC3VbR2ifO', NULL, '2023-01-27 14:11:28', '2023-01-27 14:11:28', NULL),
(19, 'deyaa jabari', 0, 'deyaajabari@gmail.com', NULL, '$2y$10$qXM7aJ8K8OPEa8/w1vO.6uwW5DDnWul66o6ToPm5DL/Lnmg1nOZMG', NULL, '2023-01-27 14:13:26', '2023-01-27 14:13:26', NULL),
(20, 'ayman alrajabi', 0, 'aymanalrajabi@gmail.com', NULL, '$2y$10$paYsn8tM5QHBt.crmA8BmeYaOZv1a50S7C56YXH8FCOavLxDjsz62', NULL, '2023-01-27 14:14:33', '2023-01-27 14:14:33', NULL),
(21, 'test test', 0, 'testtest@gmail.com', NULL, '$2y$10$tDcrQdHa7dXXKKgigc1cDu6Yqd.H/RypJOhaHr8f4ha5maiYIE0FC', NULL, '2023-01-27 14:15:58', '2023-01-27 14:15:58', NULL),
(22, 'rami alzaro', 0, 'ramialzaro@gmail.com', NULL, '$2y$10$d6lxhWTkKxDfbhc51U1Pd.6hdFd9i1IT7PvZGuhBoOCNivyGy6tiK', NULL, '2023-01-27 14:17:43', '2023-01-27 14:17:43', NULL),
(23, 'ibrahim alatsha', 0, 'ibrahimalatsha@gmail.com', NULL, '$2y$10$uw/YPnKIduo9mF3QcZ/hJuaSAGjrWJnTdfLvT26K84bHv6Rc/qS3G', NULL, '2023-01-27 14:18:22', '2023-01-27 14:18:22', NULL),
(24, 'mahmoud katbeh', 0, 'mahmoudkatbeh@gmail.com', NULL, '$2y$10$0.F9IN.Vm5FSCfFuEgKOTuqlpbk.QAZSPz2FKJ1orMrZyX5iCAQtO', NULL, '2023-01-27 14:19:25', '2023-01-27 14:19:25', NULL),
(25, 'mahmoud qabaha', 0, 'mahmoudqabaha@gmail.com', NULL, '$2y$10$y8KTjrYdALqJ23B72S8Op.k4klq7L1ctFOLkkM/TyqjV47vw.hVI.', NULL, '2023-01-27 14:19:45', '2023-01-27 14:19:45', NULL),
(26, 'sklah1123', 0, 'sklah1123@gmail.com', NULL, '$2y$10$bH0/dM2KK8vQA5/zNaqSQ.wFeA/Qy73tHFKXQL8ocfn6HTOLDaOMm', NULL, '2023-01-27 14:20:44', '2023-01-27 14:20:44', NULL),
(27, 'amro katbeh', 0, 'amrokatbeh@gmail.com', NULL, '$2y$10$ly11JNhWuTaR8V/z7f.aQe05U2832Vf639uER7TMSP8Gb9aC2mVEW', NULL, '2023-01-27 14:22:30', '2023-01-27 14:22:30', NULL),
(28, 'karem katbek', 0, 'karemkatbek@gmail.com', NULL, '$2y$10$0bW/y95XBcFXZ2lPT1Wcje7Nx4wYprZmScjBCaLyZCvgGtzzlrzVO', NULL, '2023-01-27 14:22:49', '2023-01-27 14:22:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_users`
--
ALTER TABLE `project_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_users`
--
ALTER TABLE `project_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
