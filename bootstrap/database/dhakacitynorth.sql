-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 08:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhakacitynorth`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_controls`
--

CREATE TABLE `admin_controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_controls`
--

INSERT INTO `admin_controls` (`id`, `phone_num`, `password`, `created_at`, `updated_at`) VALUES
(1, '01988406007', '1234', NULL, NULL),
(2, '০১৯৮৮৪০৬০০৭', '১২৩৪', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `d_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `d_name`, `created_at`, `updated_at`) VALUES
(5, 'প্রেসিডেন্ট', '2022-05-19 06:34:35', '2022-05-19 06:34:35'),
(6, 'সেক্রেটারি', '2022-05-19 06:34:38', '2022-05-19 06:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_14_115859_parlament_seat', 1),
(6, '2022_05_14_121148_parlament', 2),
(9, '2022_05_17_070746_create_designation_table', 3),
(10, '2022_05_22_161254_create_admin_controls_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mp_details`
--

CREATE TABLE `mp_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `mp_name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mp_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mp_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mp_nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mp_dob` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mp_img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mp_details`
--

INSERT INTO `mp_details` (`id`, `p_id`, `mp_name`, `mp_email`, `mp_phone`, `mp_nid`, `mp_dob`, `mp_img`, `created_at`, `updated_at`) VALUES
(6, 14, 'নবির', 'nobir.gwd@gmail.com', '৭৫৪৬২', '৫৪৪৫৪৬৩৭৫', '2022-06-05', '1653115400.jpg', '2022-05-20 08:27:22', '2022-05-21 00:43:20'),
(7, 13, 'নবির', 'nobir.wd@gmail.com', '১৯৮৮৪০৬০০৭', '৫৬৪৫৬12', '2022-05-19', '1653058740.jpg', '2022-05-20 08:59:00', '2022-05-20 08:59:00'),
(8, 17, 'নবির', 'nobir.wd@gmail.com', '৪৫৪২', '২৪৫২৪১২', '2022-05-26', '1653130109.jpg', '2022-05-21 04:48:29', '2022-05-21 04:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `parlament_seat`
--

CREATE TABLE `parlament_seat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parlament_seat`
--

INSERT INTO `parlament_seat` (`id`, `name`, `no`, `created_at`, `updated_at`) VALUES
(16, 'ঢাকা', '২', '2022-05-21 04:29:00', '2022-05-21 04:29:00'),
(17, 'ঢাকা', '১', '2022-05-21 04:29:08', '2022-05-21 04:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `police_stations`
--

CREATE TABLE `police_stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PS_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `P_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `police_stations`
--

INSERT INTO `police_stations` (`id`, `PS_name`, `P_id`, `created_at`, `updated_at`) VALUES
(23, 'মিরপুর-১', 17, '2022-05-21 04:32:51', '2022-05-21 04:32:51'),
(24, 'মিরপুর-২', 17, '2022-05-21 04:32:57', '2022-05-21 04:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `police_station_responsible_parsons`
--

CREATE TABLE `police_station_responsible_parsons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `ps_id` bigint(20) UNSIGNED NOT NULL,
  `d_id` bigint(20) UNSIGNED NOT NULL,
  `rp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rp_dob` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rp_img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `police_station_responsible_parsons`
--

INSERT INTO `police_station_responsible_parsons` (`id`, `p_id`, `ps_id`, `d_id`, `rp_name`, `rp_phone`, `rp_nid`, `rp_email`, `rp_dob`, `rp_img`, `created_at`, `updated_at`) VALUES
(7, 2, 11, 1, 'nobir', '32165123', '241562', '', '', '', '2022-05-17 06:25:54', '2022-05-17 06:25:54'),
(10, 2, 11, 2, 'Salman', '321651211', '2415', '', '', '', '2022-05-18 06:38:51', '2022-05-18 06:38:51'),
(11, 2, 12, 1, 'Salman', '2415', '2415611', '', '', '', '2022-05-18 06:39:58', '2022-05-18 06:39:58'),
(12, 5, 15, 1, 'nobir', '1234', '12345678', '', '', '', '2022-05-19 04:21:23', '2022-05-19 04:21:23'),
(13, 5, 15, 2, 'Salman', '12345', '123456', '', '', '', '2022-05-19 04:21:55', '2022-05-19 04:21:55'),
(14, 13, 21, 5, 'নবির', '৬৫৪৪২৪৫৬', '৪৫৬৭৫৮৬৭৪', '', '', '', '2022-05-19 06:37:19', '2022-05-20 05:11:30'),
(15, 13, 21, 6, 'নবির', '৮৫৪৩২৫৪', '৬৫৪৭৮৫৭', 'sifat@gmail.com', '2022-05-18', '1653118114.jpg', '2022-05-21 01:15:38', '2022-05-21 01:28:34'),
(16, 17, 23, 5, 'নবির', '৭৮৫৭৮৭৮', '৯৮৭৯৫৬৭৪৮', 'sifat@gmail.com', '2022-05-23', '1653130158.jpg', '2022-05-21 04:49:18', '2022-05-21 04:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `ps_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `union_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `p_id`, `ps_id`, `w_id`, `union_name`, `created_at`, `updated_at`) VALUES
(1, 2, 11, 6, 'Parbat', '2022-05-16 06:05:20', '2022-05-16 06:05:20'),
(5, 2, 11, 5, '3', '2022-05-18 07:17:07', '2022-05-18 07:17:07'),
(6, 2, 11, 5, '4', '2022-05-18 07:17:19', '2022-05-18 07:17:19'),
(7, 5, 14, 3, '1', '2022-05-19 04:23:05', '2022-05-19 04:23:05'),
(8, 13, 21, 19, 'পর্বত', '2022-05-19 06:33:30', '2022-05-20 05:10:25'),
(9, 13, 21, 20, 'পর্বত', '2022-05-20 03:20:04', '2022-05-20 03:20:04'),
(10, 17, 23, 21, 'পর্বত', '2022-05-21 04:47:16', '2022-05-21 04:47:16'),
(11, 17, 23, 21, 'পর্বতস', '2022-05-21 04:47:30', '2022-05-21 04:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `unit_r_p_s`
--

CREATE TABLE `unit_r_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `ps_id` bigint(20) UNSIGNED NOT NULL,
  `w_id` bigint(20) UNSIGNED NOT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `d_id` bigint(20) UNSIGNED NOT NULL,
  `rp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `rp_dob` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rp_img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_r_p_s`
--

INSERT INTO `unit_r_p_s` (`id`, `p_id`, `ps_id`, `w_id`, `u_id`, `d_id`, `rp_name`, `rp_phone`, `rp_nid`, `rp_email`, `rp_dob`, `rp_img`, `created_at`, `updated_at`) VALUES
(3, 2, 11, 5, 5, 1, 'nobir', '123', '123', '', '', '', '2022-05-18 07:19:59', '2022-05-18 07:19:59'),
(4, 5, 14, 3, 7, 1, 'nobir', '1234', '12345', '', '', '', '2022-05-19 04:23:28', '2022-05-19 04:23:28'),
(5, 5, 14, 3, 7, 2, 'Salman', '123456', '123456', '', '', '', '2022-05-19 04:23:53', '2022-05-19 04:23:53'),
(6, 13, 21, 19, 8, 5, 'নবির', '৪৫৬৪', '৪৫৬৩৪৫৬৩', '', '', '', '2022-05-19 06:37:45', '2022-05-19 06:37:45'),
(7, 13, 21, 20, 9, 5, 'নবির', '৫৬৪৮৫৬', '৫৬৪৫৬৪৫৬৩৬', 'sifat@gmail.com', '2022-05-18', '1653119684.jpg', '2022-05-21 01:52:12', '2022-05-21 01:54:44'),
(8, 17, 23, 21, 10, 5, 'নবির', '৫৭৮৫৬৭৮', '৮৭৬৮৭৬৫', 'sifat@gmail.com', '2022-05-18', '1653130388.jpg', '2022-05-21 04:53:08', '2022-05-21 04:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `ps_id` int(11) NOT NULL,
  `w_number` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `p_id`, `ps_id`, `w_number`, `updated_at`, `created_at`) VALUES
(1, 2, 2, '23', '2022-05-16 04:01:48', '2022-05-16 04:01:48'),
(3, 5, 14, '1', '2022-05-16 04:44:57', '2022-05-16 04:44:57'),
(5, 2, 11, '2', '2022-05-16 05:50:36', '2022-05-16 05:50:36'),
(7, 6, 18, '1', '2022-05-17 09:17:35', '2022-05-17 09:17:35'),
(8, 6, 17, '5', '2022-05-18 00:32:15', '2022-05-18 00:32:15'),
(9, 6, 18, '4', '2022-05-18 00:32:35', '2022-05-18 00:32:35'),
(10, 6, 16, '1', '2022-05-18 00:33:00', '2022-05-18 00:33:00'),
(11, 5, 5, '12', '2022-05-18 01:12:43', '2022-05-18 01:12:43'),
(12, 2, 11, '7', '2022-05-18 03:58:14', '2022-05-18 03:58:14'),
(15, 2, 11, '5', '2022-05-18 05:31:09', '2022-05-18 05:31:09'),
(18, 2, 11, '55', '2022-05-18 05:50:09', '2022-05-18 05:50:09'),
(19, 13, 21, '১', '2022-05-19 06:33:02', '2022-05-19 06:33:02'),
(20, 13, 21, '২', '2022-05-20 05:09:51', '2022-05-19 06:43:18'),
(21, 17, 23, '১', '2022-05-21 04:46:43', '2022-05-21 04:46:43'),
(22, 17, 23, '২', '2022-05-21 04:46:53', '2022-05-21 04:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `word_rps`
--

CREATE TABLE `word_rps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `ps_id` bigint(20) UNSIGNED NOT NULL,
  `w_id` bigint(20) UNSIGNED NOT NULL,
  `d_id` bigint(20) UNSIGNED NOT NULL,
  `rp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rp_dob` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rp_img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `word_rps`
--

INSERT INTO `word_rps` (`id`, `p_id`, `ps_id`, `w_id`, `d_id`, `rp_name`, `rp_phone`, `rp_nid`, `rp_email`, `rp_dob`, `rp_img`, `created_at`, `updated_at`) VALUES
(1, 2, 11, 5, 1, 'nobir', '54654', '56456', '', '', '', '2022-05-17 07:33:31', '2022-05-17 07:33:31'),
(2, 2, 11, 5, 2, 'nobir', '123', '123', '', '', '', '2022-05-18 07:13:46', '2022-05-18 07:13:46'),
(4, 13, 21, 19, 5, 'নবিরস', '৪৩৫', '৪৫৩', '', '', '', '2022-05-19 08:18:56', '2022-05-20 04:37:53'),
(5, 13, 21, 19, 6, 'নবিরস', '৫৪৫৬৩৪৫', '৫৪৬৩৫৩৫৬', 'sifat@gmail.com', '2022-05-18', '1653119132.jpg', '2022-05-21 01:37:03', '2022-05-21 01:45:32'),
(6, 17, 23, 21, 5, 'নবির', '৮৬৪৫৬৮৭', '৬৮৯৬৮৯৬৫', 'sifat@gmail.com', '2022-05-26', '1653130207.jpg', '2022-05-21 04:50:07', '2022-05-21 04:50:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_controls`
--
ALTER TABLE `admin_controls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `mp_details`
--
ALTER TABLE `mp_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parlament_seat`
--
ALTER TABLE `parlament_seat`
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
-- Indexes for table `police_stations`
--
ALTER TABLE `police_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `police_station_responsible_parsons`
--
ALTER TABLE `police_station_responsible_parsons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_r_p_s`
--
ALTER TABLE `unit_r_p_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `word_rps`
--
ALTER TABLE `word_rps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_controls`
--
ALTER TABLE `admin_controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mp_details`
--
ALTER TABLE `mp_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parlament_seat`
--
ALTER TABLE `parlament_seat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `police_stations`
--
ALTER TABLE `police_stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `police_station_responsible_parsons`
--
ALTER TABLE `police_station_responsible_parsons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `unit_r_p_s`
--
ALTER TABLE `unit_r_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `word_rps`
--
ALTER TABLE `word_rps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
