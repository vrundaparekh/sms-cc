-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2023 at 09:39 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_07_12_065144_create_students_table', 1),
(5, '2023_07_12_070123_create_student_marks_table', 1),
(6, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(7, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(8, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(9, '2016_06_01_000004_create_oauth_clients_table', 2),
(10, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('195d0d9fd86598755ce4a1a885f3c8f7ba9fc16324cd7be027356c6c63b1475f9d5a177ef13f123d', 14, 1, 'api-application', '[]', 0, '2023-07-13 11:47:08', '2023-07-13 11:47:08', '2024-07-13 17:17:08'),
('8290aa455df439cb1b0bef60cbe4426909fa916e7f9a88c3e92e2ad7c05de92262d2aec41d8ed66e', 14, 1, 'api-application', '[]', 0, '2023-07-13 12:42:34', '2023-07-13 12:42:34', '2024-07-13 18:12:34'),
('f1cf9205535e8d8c7f50000e90354e521d09ae7af85b2b6c8c3235ba6afba1fda0fdf495b30b02f5', 14, 1, 'api-application', '[]', 0, '2023-07-13 23:32:18', '2023-07-13 23:32:18', '2024-07-14 05:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'McsbVPHX6ipaINJYqKJkA0Cr7qWT8B1SJpslU16t', NULL, 'http://localhost', 1, 0, 0, '2023-07-13 11:36:40', '2023-07-13 11:36:40'),
(2, NULL, 'Laravel Password Grant Client', 'aR3qEBN7Ww1caOzWjcOmnygAwSCzrSNPE8315v9P', 'users', 'http://localhost', 0, 1, 0, '2023-07-13 11:36:40', '2023-07-13 11:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-07-13 11:36:40', '2023-07-13 11:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rollno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parents_mobile_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_rollno_unique` (`rollno`),
  UNIQUE KEY `students_parents_mobile_no_unique` (`parents_mobile_no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `rollno`, `name`, `parents_mobile_no`, `class`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, '1', 'abhisha', '9633588757', '8', 'abhisha@mail.com', '$2y$10$QtFw1NNaYonJUCxDX27t.ee34yf6YJhK2wod1oc/V3DwbebBvL5Ym', '2023-07-14 04:00:42', '2023-07-14 04:00:42'),
(2, '2', 'bunny', '8802166520', '9', 'bunny@mail.com', '$2y$10$JlO0xoltmgXPZqdaqtj62.7nvu0CKZvxUdeCdIARqIutTFDc03ZPi', '2023-07-14 04:02:49', '2023-07-14 04:02:49'),
(3, '3', 'kajal', '9481563258', '9', 'kajal@mail.com', '$2y$10$m42fpk8oWuJoTnNIeXgWG.jnjZYbzg68cYiSsgJ4KYyzArgjWmnVS', '2023-07-14 04:04:07', '2023-07-14 04:04:07'),
(4, '4', 'shruti', '7056815675', '9', 'shruti@mail.com', '$2y$10$74Wm.JrXtiHaHke4.DTeuO4l59hA8I6grO0PN3iXGGuJbPxlRbjOa', '2023-07-14 04:04:49', '2023-07-14 04:04:49'),
(5, '5', 'krisha', '7990259632', '9', 'krisha@mail.com', '$2y$10$DKgaZmqRBFpwcK/cTg4FQuH8du9O4qm4xps3aDIEZWNOAPv46y6RS', '2023-07-14 04:05:59', '2023-07-14 04:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

DROP TABLE IF EXISTS `student_marks`;
CREATE TABLE IF NOT EXISTS `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `english` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maths` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `science` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hindi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` decimal(7,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_marks_student_id_foreign` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `english`, `maths`, `science`, `hindi`, `computer`, `total`, `grade`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 1, '70', '80', '85', '92', '98', '425', 'B', '85.00', '2023-07-14 04:00:44', '2023-07-14 04:00:44'),
(2, 2, '90', '59', '45', '80', '78', '352', 'C', '70.40', '2023-07-14 04:02:49', '2023-07-14 04:02:49'),
(3, 3, '52', '65', '72', '81', '90', '360', 'C', '72.00', '2023-07-14 04:04:07', '2023-07-14 04:04:07'),
(4, 4, '52', '65', '72', '81', '90', '360', 'C', '72.00', '2023-07-14 04:04:49', '2023-07-14 04:04:49'),
(5, 5, '35', '23', '42', '52', '49', '201', 'F', '40.20', '2023-07-14 04:05:59', '2023-07-14 04:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD CONSTRAINT `student_marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
