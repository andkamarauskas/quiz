-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 02:15 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `quest_id` int(10) UNSIGNED NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `quest_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 'Atsiprašau', '2017-10-02 09:57:30', '2017-10-02 09:57:30'),
(2, 1, 'Atsiprasau', '2017-10-02 09:57:30', '2017-10-02 09:57:30'),
(3, 1, 'Sori', '2017-10-02 09:57:30', '2017-10-02 09:57:30'),
(6, 2, 'Skalbimo', '2017-10-02 09:58:26', '2017-10-02 09:58:26'),
(7, 2, 'skalbimo', '2017-10-02 09:58:26', '2017-10-02 09:58:26'),
(8, 3, 'veidrodinis', '2017-10-02 09:59:24', '2017-10-02 09:59:24'),
(9, 3, 'Veidrodinis', '2017-10-02 09:59:24', '2017-10-02 09:59:24'),
(10, 4, 'Siauliai', '2017-10-02 10:00:21', '2017-10-02 10:00:21'),
(11, 4, 'Šiauliai', '2017-10-02 10:00:21', '2017-10-02 10:00:21'),
(12, 4, 'Shiauliai', '2017-10-02 10:00:21', '2017-10-02 10:00:21'),
(13, 5, 'trikotazas', '2017-10-02 10:01:24', '2017-10-02 10:01:24'),
(14, 5, 'trikotažas', '2017-10-02 10:01:24', '2017-10-02 10:01:24'),
(15, 5, 'Trikotažas', '2017-10-02 10:01:24', '2017-10-02 10:01:24'),
(16, 6, 'Yva', '2017-10-02 10:02:52', '2017-10-02 10:02:52'),
(17, 6, 'yva', '2017-10-02 10:02:52', '2017-10-02 10:02:52'),
(18, 6, 'Natalija', '2017-10-02 10:02:52', '2017-10-02 10:02:52'),
(19, 6, 'natalija', '2017-10-02 10:02:52', '2017-10-02 10:02:52'),
(20, 7, 'Kernagis', '2017-10-02 10:04:06', '2017-10-02 10:04:06'),
(21, 7, 'Vytautas Kernagis', '2017-10-02 10:04:06', '2017-10-02 10:04:06'),
(22, 7, 'vytautas kernagis', '2017-10-02 10:04:06', '2017-10-02 10:04:06'),
(23, 7, 'kernagis', '2017-10-02 10:04:06', '2017-10-02 10:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Filmai', NULL, NULL, NULL),
(2, 'Sportas', NULL, NULL, NULL),
(3, 'Mokslas', NULL, NULL, NULL),
(4, 'Istorija', NULL, NULL, NULL),
(5, 'Geografija', NULL, NULL, NULL),
(6, 'Knygos', NULL, NULL, NULL),
(7, 'Muzika', NULL, NULL, NULL),
(8, 'Menas', NULL, NULL, NULL);

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
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2017_09_28_120120_create_categories_table', 1),
(18, '2017_09_28_123217_create_quests_table', 1),
(19, '2017_09_29_072215_create_answers_table', 1),
(20, '2017_09_30_122014_create_trains_table', 1),
(21, '2017_09_30_123225_create_train_quests_table', 1),
(22, '2017_10_02_163304_create_user_answers_table', 2);

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
-- Table structure for table `quests`
--

CREATE TABLE `quests` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quests`
--

INSERT INTO `quests` (`id`, `category_id`, `title`, `question`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'grafitti', 'Ką grafitti kūrėjas labai „nuoširdžiai“ norėjo pasakyti šiuo „šou“?', 'train', '2017-10-02 09:57:30', '2017-10-02 09:57:30', NULL),
(2, 1, 'Gribauskaite', 'Kokius buities reikmenis reklamuoja LR prezidentė Dalia Grybauskaitė?', 'train', '2017-10-02 09:58:20', '2017-10-02 09:58:26', NULL),
(3, 1, 'fotoparatas', 'Atsižvelgdami į nuotraukos atlikimo aplinkybes, vienu žodžiu įvardykite, koks čia fotoaparatas?', 'train', '2017-10-02 09:59:24', '2017-10-02 09:59:24', NULL),
(4, 1, 'siauliai', 'Šiame pasaulio mieste įsikūrusi vieta patenkanti į kraupiausių pasaulio vietų TOP 10. Sakykite kaip vadinasi ši vieta, jei ja ypač žavisi ir ten lankosi religingi vyresnio amžiaus žmonės?', 'train', '2017-10-02 10:00:20', '2017-10-02 10:00:20', NULL),
(5, 1, 'google', 'Kas „lietuviškas“ yra populiariausias Google paieškos sistemoje?', 'train', '2017-10-02 10:01:24', '2017-10-02 10:01:24', NULL),
(6, 1, 'bunke', 'Kas yra ši puikiai žinoma Lietuvos atlikėja?', 'train', '2017-10-02 10:02:52', '2017-10-02 10:02:52', NULL),
(7, 1, 'kernagis', 'Įvardykite Lietuvos atlikėją?', 'train', '2017-10-02 10:04:06', '2017-10-02 10:04:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `user_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2017-10-02 10:04:36', '2017-10-02 10:08:42'),
(2, 1, 0, '2017-10-02 10:11:45', '2017-10-02 10:12:10'),
(3, 1, 0, '2017-10-02 13:44:13', '2017-10-02 13:53:50'),
(4, 1, 0, '2017-10-02 14:07:41', '2017-10-02 14:08:44'),
(5, 1, 0, '2017-10-02 14:13:25', '2017-10-02 14:14:01'),
(6, 1, 0, '2017-10-03 04:31:51', '2017-10-03 05:22:30'),
(7, 1, 0, '2017-10-03 05:26:26', '2017-10-03 05:30:56'),
(8, 1, 0, '2017-10-03 08:08:48', '2017-10-03 09:28:57'),
(9, 1, 0, '2017-10-03 09:31:58', '2017-10-03 09:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `train_quests`
--

CREATE TABLE `train_quests` (
  `id` int(10) UNSIGNED NOT NULL,
  `train_id` int(10) UNSIGNED NOT NULL,
  `quest_id` int(10) UNSIGNED NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `train_quests`
--

INSERT INTO `train_quests` (`id`, `train_id`, `quest_id`, `used`, `correct`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, 1, '2017-10-02 10:04:36', '2017-10-02 10:06:08'),
(2, 1, 1, 1, 1, '2017-10-02 10:04:36', '2017-10-02 10:06:20'),
(3, 1, 2, 1, 1, '2017-10-02 10:04:36', '2017-10-02 10:06:26'),
(4, 1, 7, 1, 1, '2017-10-02 10:04:36', '2017-10-02 10:06:31'),
(5, 1, 3, 1, 1, '2017-10-02 10:04:36', '2017-10-02 10:08:23'),
(6, 1, 5, 1, 1, '2017-10-02 10:04:36', '2017-10-02 10:08:31'),
(7, 1, 4, 1, 0, '2017-10-02 10:04:36', '2017-10-02 10:08:41'),
(8, 2, 5, 1, 0, '2017-10-02 10:11:45', '2017-10-02 10:11:49'),
(9, 2, 6, 1, 0, '2017-10-02 10:11:45', '2017-10-02 10:11:52'),
(10, 2, 4, 1, 0, '2017-10-02 10:11:45', '2017-10-02 10:11:55'),
(11, 2, 1, 1, 0, '2017-10-02 10:11:45', '2017-10-02 10:11:57'),
(12, 2, 3, 1, 0, '2017-10-02 10:11:45', '2017-10-02 10:12:04'),
(13, 2, 7, 1, 0, '2017-10-02 10:11:45', '2017-10-02 10:12:06'),
(14, 2, 2, 1, 0, '2017-10-02 10:11:45', '2017-10-02 10:12:10'),
(15, 3, 2, 1, 0, '2017-10-02 13:44:13', '2017-10-02 13:46:44'),
(16, 3, 5, 1, 1, '2017-10-02 13:44:13', '2017-10-02 13:47:12'),
(17, 3, 7, 1, 1, '2017-10-02 13:44:13', '2017-10-02 13:48:31'),
(18, 3, 6, 1, 1, '2017-10-02 13:44:13', '2017-10-02 13:48:50'),
(19, 3, 3, 1, 0, '2017-10-02 13:44:13', '2017-10-02 13:49:51'),
(20, 3, 1, 1, 0, '2017-10-02 13:44:13', '2017-10-02 13:52:47'),
(21, 3, 4, 1, 0, '2017-10-02 13:44:13', '2017-10-02 13:53:50'),
(22, 4, 2, 1, 0, '2017-10-02 14:07:41', '2017-10-02 14:07:47'),
(23, 4, 6, 1, 0, '2017-10-02 14:07:41', '2017-10-02 14:07:52'),
(24, 4, 3, 1, 0, '2017-10-02 14:07:42', '2017-10-02 14:08:00'),
(25, 4, 5, 1, 1, '2017-10-02 14:07:42', '2017-10-02 14:08:09'),
(26, 4, 4, 1, 0, '2017-10-02 14:07:42', '2017-10-02 14:08:20'),
(27, 4, 1, 1, 0, '2017-10-02 14:07:42', '2017-10-02 14:08:37'),
(28, 4, 7, 1, 1, '2017-10-02 14:07:42', '2017-10-02 14:08:44'),
(29, 5, 1, 1, 0, '2017-10-02 14:13:26', '2017-10-02 14:13:32'),
(30, 5, 4, 1, 0, '2017-10-02 14:13:26', '2017-10-02 14:13:35'),
(31, 5, 7, 1, 0, '2017-10-02 14:13:26', '2017-10-02 14:13:39'),
(32, 5, 2, 1, 0, '2017-10-02 14:13:26', '2017-10-02 14:13:43'),
(33, 5, 5, 1, 0, '2017-10-02 14:13:26', '2017-10-02 14:13:47'),
(34, 5, 3, 1, 0, '2017-10-02 14:13:26', '2017-10-02 14:13:55'),
(35, 5, 6, 1, 0, '2017-10-02 14:13:26', '2017-10-02 14:14:01'),
(36, 6, 7, 1, 0, '2017-10-03 04:31:51', '2017-10-03 05:17:14'),
(37, 6, 3, 1, 0, '2017-10-03 04:31:51', '2017-10-03 05:17:24'),
(38, 6, 1, 1, 0, '2017-10-03 04:31:51', '2017-10-03 05:21:23'),
(39, 6, 6, 1, 0, '2017-10-03 04:31:51', '2017-10-03 05:21:36'),
(40, 6, 4, 1, 0, '2017-10-03 04:31:51', '2017-10-03 05:22:23'),
(41, 6, 2, 1, 0, '2017-10-03 04:31:51', '2017-10-03 05:22:27'),
(42, 6, 5, 1, 0, '2017-10-03 04:31:51', '2017-10-03 05:22:29'),
(43, 7, 2, 1, 0, '2017-10-03 05:26:26', '2017-10-03 05:26:29'),
(44, 7, 3, 1, 0, '2017-10-03 05:26:26', '2017-10-03 05:30:37'),
(45, 7, 1, 1, 0, '2017-10-03 05:26:26', '2017-10-03 05:30:39'),
(46, 7, 7, 1, 0, '2017-10-03 05:26:26', '2017-10-03 05:30:43'),
(47, 7, 6, 1, 0, '2017-10-03 05:26:26', '2017-10-03 05:30:48'),
(48, 7, 4, 1, 0, '2017-10-03 05:26:26', '2017-10-03 05:30:52'),
(49, 7, 5, 1, 0, '2017-10-03 05:26:26', '2017-10-03 05:30:55'),
(50, 8, 1, 1, 0, '2017-10-03 08:08:48', '2017-10-03 09:25:44'),
(51, 8, 2, 1, 0, '2017-10-03 08:08:48', '2017-10-03 09:28:31'),
(52, 8, 3, 1, 0, '2017-10-03 08:08:48', '2017-10-03 09:28:37'),
(53, 8, 6, 1, 0, '2017-10-03 08:08:48', '2017-10-03 09:28:42'),
(54, 8, 4, 1, 0, '2017-10-03 08:08:48', '2017-10-03 09:28:47'),
(55, 8, 7, 1, 0, '2017-10-03 08:08:48', '2017-10-03 09:28:52'),
(56, 8, 5, 1, 0, '2017-10-03 08:08:48', '2017-10-03 09:28:57'),
(57, 9, 5, 1, 0, '2017-10-03 09:31:58', '2017-10-03 09:33:00'),
(58, 9, 3, 1, 0, '2017-10-03 09:31:58', '2017-10-03 09:33:43'),
(59, 9, 6, 1, 1, '2017-10-03 09:31:58', '2017-10-03 09:33:50'),
(60, 9, 2, 1, 1, '2017-10-03 09:31:58', '2017-10-03 09:33:57'),
(61, 9, 7, 1, 1, '2017-10-03 09:31:58', '2017-10-03 09:34:02'),
(62, 9, 1, 1, 0, '2017-10-03 09:31:58', '2017-10-03 09:34:09'),
(63, 9, 4, 1, 0, '2017-10-03 09:31:58', '2017-10-03 09:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andrius', 'andkamarauskas@gmail.com', '$2y$10$X7XPmIQLosN/RqQ1qL60j.iEZn1Pyt4d7Oxg3frGnUP8C4mOWH7zq', 'bwgzklTdH6JEGh15yKvdAxPuKGG83mBYSL9iyoQguwNezKoDrFSfkjinVy55', '2017-10-02 09:56:45', '2017-10-02 09:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `train_quest_id` int(10) UNSIGNED NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `train_quest_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 2, 'tide', '2017-10-02 13:46:44', '2017-10-02 13:46:44'),
(2, 2, ' vanish', '2017-10-02 13:46:44', '2017-10-02 13:46:44'),
(3, 2, 'tide', '2017-10-02 13:46:44', '2017-10-02 13:46:44'),
(4, 2, ' vanish', '2017-10-02 13:46:44', '2017-10-02 13:46:44'),
(5, 5, 'trikotazas', '2017-10-02 13:47:11', '2017-10-02 13:47:11'),
(6, 5, ' kilimas', '2017-10-02 13:47:12', '2017-10-02 13:47:12'),
(7, 5, 'trikotazas', '2017-10-02 13:47:12', '2017-10-02 13:47:12'),
(8, 5, ' kilimas', '2017-10-02 13:47:12', '2017-10-02 13:47:12'),
(9, 5, 'trikotazas', '2017-10-02 13:47:12', '2017-10-02 13:47:12'),
(10, 5, ' kilimas', '2017-10-02 13:47:12', '2017-10-02 13:47:12'),
(11, 7, 'kernagis', '2017-10-02 13:48:31', '2017-10-02 13:48:31'),
(12, 7, 'kernagis', '2017-10-02 13:48:31', '2017-10-02 13:48:31'),
(13, 7, 'kernagis', '2017-10-02 13:48:31', '2017-10-02 13:48:31'),
(14, 7, 'kernagis', '2017-10-02 13:48:31', '2017-10-02 13:48:31'),
(15, 6, 'natalija', '2017-10-02 13:48:50', '2017-10-02 13:48:50'),
(16, 6, 'natalija', '2017-10-02 13:48:50', '2017-10-02 13:48:50'),
(17, 6, 'natalija', '2017-10-02 13:48:50', '2017-10-02 13:48:50'),
(18, 6, 'natalija', '2017-10-02 13:48:50', '2017-10-02 13:48:50'),
(19, 3, 'blondiniu', '2017-10-02 13:49:51', '2017-10-02 13:49:51'),
(20, 3, ' veidrodinis', '2017-10-02 13:49:51', '2017-10-02 13:49:51'),
(21, 3, 'blondiniu', '2017-10-02 13:49:51', '2017-10-02 13:49:51'),
(22, 3, ' veidrodinis', '2017-10-02 13:49:51', '2017-10-02 13:49:51'),
(23, 1, 'atsiprasau', '2017-10-02 13:52:46', '2017-10-02 13:52:46'),
(24, 1, ' prasau', '2017-10-02 13:52:46', '2017-10-02 13:52:46'),
(25, 1, 'atsiprasau', '2017-10-02 13:52:46', '2017-10-02 13:52:46'),
(26, 1, ' prasau', '2017-10-02 13:52:46', '2017-10-02 13:52:46'),
(27, 1, 'atsiprasau', '2017-10-02 13:52:46', '2017-10-02 13:52:46'),
(28, 1, ' prasau', '2017-10-02 13:52:47', '2017-10-02 13:52:47'),
(29, 4, 'siauliai', '2017-10-02 13:53:50', '2017-10-02 13:53:50'),
(30, 4, 'siauliai', '2017-10-02 13:53:50', '2017-10-02 13:53:50'),
(31, 4, 'siauliai', '2017-10-02 13:53:50', '2017-10-02 13:53:50'),
(32, 22, 'sads', '2017-10-02 14:07:47', '2017-10-02 14:07:47'),
(33, 22, 'asdn', '2017-10-02 14:07:47', '2017-10-02 14:07:47'),
(34, 22, 'sads', '2017-10-02 14:07:47', '2017-10-02 14:07:47'),
(35, 22, 'asdn', '2017-10-02 14:07:47', '2017-10-02 14:07:47'),
(36, 23, 'asdsfdg', '2017-10-02 14:07:51', '2017-10-02 14:07:51'),
(37, 23, 'dfgj', '2017-10-02 14:07:51', '2017-10-02 14:07:51'),
(38, 23, '', '2017-10-02 14:07:52', '2017-10-02 14:07:52'),
(39, 23, 'asdsfdg', '2017-10-02 14:07:52', '2017-10-02 14:07:52'),
(40, 23, 'dfgj', '2017-10-02 14:07:52', '2017-10-02 14:07:52'),
(41, 23, '', '2017-10-02 14:07:52', '2017-10-02 14:07:52'),
(42, 23, 'asdsfdg', '2017-10-02 14:07:52', '2017-10-02 14:07:52'),
(43, 23, 'dfgj', '2017-10-02 14:07:52', '2017-10-02 14:07:52'),
(44, 23, '', '2017-10-02 14:07:52', '2017-10-02 14:07:52'),
(45, 23, 'asdsfdg', '2017-10-02 14:07:52', '2017-10-02 14:07:52'),
(46, 23, 'dfgj', '2017-10-02 14:07:52', '2017-10-02 14:07:52'),
(47, 23, '', '2017-10-02 14:07:52', '2017-10-02 14:07:52'),
(48, 24, 'edsrdf', '2017-10-02 14:08:00', '2017-10-02 14:08:00'),
(49, 24, 'asdf', '2017-10-02 14:08:00', '2017-10-02 14:08:00'),
(50, 24, '', '2017-10-02 14:08:00', '2017-10-02 14:08:00'),
(51, 24, 'edsrdf', '2017-10-02 14:08:00', '2017-10-02 14:08:00'),
(52, 24, 'asdf', '2017-10-02 14:08:00', '2017-10-02 14:08:00'),
(53, 24, '', '2017-10-02 14:08:00', '2017-10-02 14:08:00'),
(54, 25, 'trikotazas', '2017-10-02 14:08:09', '2017-10-02 14:08:09'),
(55, 25, ' kilimas', '2017-10-02 14:08:09', '2017-10-02 14:08:09'),
(56, 25, 'trikotazas', '2017-10-02 14:08:09', '2017-10-02 14:08:09'),
(57, 25, ' kilimas', '2017-10-02 14:08:09', '2017-10-02 14:08:09'),
(58, 25, 'trikotazas', '2017-10-02 14:08:09', '2017-10-02 14:08:09'),
(59, 25, ' kilimas', '2017-10-02 14:08:09', '2017-10-02 14:08:09'),
(60, 26, 'siauliai', '2017-10-02 14:08:20', '2017-10-02 14:08:20'),
(61, 26, 'shanchajus', '2017-10-02 14:08:20', '2017-10-02 14:08:20'),
(62, 26, 'siauliai', '2017-10-02 14:08:20', '2017-10-02 14:08:20'),
(63, 26, 'shanchajus', '2017-10-02 14:08:20', '2017-10-02 14:08:20'),
(64, 26, 'siauliai', '2017-10-02 14:08:20', '2017-10-02 14:08:20'),
(65, 26, 'shanchajus', '2017-10-02 14:08:20', '2017-10-02 14:08:20'),
(66, 27, 'asiprasau', '2017-10-02 14:08:36', '2017-10-02 14:08:36'),
(67, 27, ' prasou', '2017-10-02 14:08:36', '2017-10-02 14:08:36'),
(68, 27, ' dar', '2017-10-02 14:08:36', '2017-10-02 14:08:36'),
(69, 27, 'asiprasau', '2017-10-02 14:08:36', '2017-10-02 14:08:36'),
(70, 27, ' prasou', '2017-10-02 14:08:36', '2017-10-02 14:08:36'),
(71, 27, ' dar', '2017-10-02 14:08:37', '2017-10-02 14:08:37'),
(72, 27, 'asiprasau', '2017-10-02 14:08:37', '2017-10-02 14:08:37'),
(73, 27, ' prasou', '2017-10-02 14:08:37', '2017-10-02 14:08:37'),
(74, 27, ' dar', '2017-10-02 14:08:37', '2017-10-02 14:08:37'),
(75, 28, 'kernagis', '2017-10-02 14:08:43', '2017-10-02 14:08:43'),
(76, 28, 'kernagis', '2017-10-02 14:08:43', '2017-10-02 14:08:43'),
(77, 28, 'kernagis', '2017-10-02 14:08:43', '2017-10-02 14:08:43'),
(78, 28, 'kernagis', '2017-10-02 14:08:43', '2017-10-02 14:08:43'),
(79, 29, 'scdzvfcgmh', '2017-10-02 14:13:32', '2017-10-02 14:13:32'),
(80, 29, 'dfgh', '2017-10-02 14:13:32', '2017-10-02 14:13:32'),
(81, 30, 'dxfgmfhgj', '2017-10-02 14:13:35', '2017-10-02 14:13:35'),
(82, 30, 'dfghg', '2017-10-02 14:13:35', '2017-10-02 14:13:35'),
(83, 31, 'xfgcmh', '2017-10-02 14:13:39', '2017-10-02 14:13:39'),
(84, 31, 'dngfhg', '2017-10-02 14:13:39', '2017-10-02 14:13:39'),
(85, 32, 'ghg', '2017-10-02 14:13:43', '2017-10-02 14:13:43'),
(86, 32, 'jgfhgj', '2017-10-02 14:13:43', '2017-10-02 14:13:43'),
(87, 33, 'xfncgmh', '2017-10-02 14:13:46', '2017-10-02 14:13:46'),
(88, 33, 'xfcgmv', '2017-10-02 14:13:47', '2017-10-02 14:13:47'),
(89, 34, 'zsdv', '2017-10-02 14:13:55', '2017-10-02 14:13:55'),
(90, 34, 'assb', '2017-10-02 14:13:55', '2017-10-02 14:13:55'),
(91, 34, 'sb', '2017-10-02 14:13:55', '2017-10-02 14:13:55'),
(92, 34, '', '2017-10-02 14:13:55', '2017-10-02 14:13:55'),
(93, 35, 'asdvsbf', '2017-10-02 14:14:01', '2017-10-02 14:14:01'),
(94, 35, 'sbd', '2017-10-02 14:14:01', '2017-10-02 14:14:01'),
(95, 35, '', '2017-10-02 14:14:01', '2017-10-02 14:14:01'),
(96, 36, 'sdsfgyh', '2017-10-03 05:17:14', '2017-10-03 05:17:14'),
(97, 36, '', '2017-10-03 05:17:14', '2017-10-03 05:17:14'),
(98, 37, 'sdff', '2017-10-03 05:17:24', '2017-10-03 05:17:24'),
(99, 37, 'sdsfgdm', '2017-10-03 05:17:24', '2017-10-03 05:17:24'),
(100, 37, 'sadfdgf', '2017-10-03 05:17:24', '2017-10-03 05:17:24'),
(101, 37, '', '2017-10-03 05:17:24', '2017-10-03 05:17:24'),
(102, 38, 'sads', '2017-10-03 05:21:23', '2017-10-03 05:21:23'),
(103, 38, 'asdm', '2017-10-03 05:21:23', '2017-10-03 05:21:23'),
(104, 39, 'afe', '2017-10-03 05:21:36', '2017-10-03 05:21:36'),
(105, 39, 'ag', '2017-10-03 05:21:36', '2017-10-03 05:21:36'),
(106, 39, 'dv', '2017-10-03 05:21:36', '2017-10-03 05:21:36'),
(107, 40, 'dafgfdgf', '2017-10-03 05:22:23', '2017-10-03 05:22:23'),
(108, 41, 'ygiuhijo', '2017-10-03 05:22:27', '2017-10-03 05:22:27'),
(109, 42, 'yiuo;i', '2017-10-03 05:22:29', '2017-10-03 05:22:29'),
(110, 43, 'afdsvfd', '2017-10-03 05:26:29', '2017-10-03 05:26:29'),
(111, 44, 'dfs', '2017-10-03 05:30:37', '2017-10-03 05:30:37'),
(112, 45, 'afe', '2017-10-03 05:30:39', '2017-10-03 05:30:39'),
(113, 46, 'sdff', '2017-10-03 05:30:43', '2017-10-03 05:30:43'),
(114, 46, 'sdsfgdm', '2017-10-03 05:30:43', '2017-10-03 05:30:43'),
(115, 46, 'sadfdgf', '2017-10-03 05:30:43', '2017-10-03 05:30:43'),
(116, 47, 'aff', '2017-10-03 05:30:48', '2017-10-03 05:30:48'),
(117, 48, 'dv', '2017-10-03 05:30:52', '2017-10-03 05:30:52'),
(118, 49, 'sfdc', '2017-10-03 05:30:55', '2017-10-03 05:30:55'),
(119, 50, 'asdsf', '2017-10-03 09:25:44', '2017-10-03 09:25:44'),
(120, 51, 'notanswered', '2017-10-03 09:28:31', '2017-10-03 09:28:31'),
(121, 52, 'notanswered', '2017-10-03 09:28:37', '2017-10-03 09:28:37'),
(122, 53, 'notanswered', '2017-10-03 09:28:42', '2017-10-03 09:28:42'),
(123, 54, 'notanswered', '2017-10-03 09:28:47', '2017-10-03 09:28:47'),
(124, 55, 'notanswered', '2017-10-03 09:28:52', '2017-10-03 09:28:52'),
(125, 56, 'notanswered', '2017-10-03 09:28:57', '2017-10-03 09:28:57'),
(126, 57, 'timeout...', '2017-10-03 09:33:00', '2017-10-03 09:33:00'),
(127, 58, 'veidr', '2017-10-03 09:33:43', '2017-10-03 09:33:43'),
(128, 59, 'yva', '2017-10-03 09:33:50', '2017-10-03 09:33:50'),
(129, 60, 'Skalbimo', '2017-10-03 09:33:57', '2017-10-03 09:33:57'),
(130, 61, 'kernagis', '2017-10-03 09:34:02', '2017-10-03 09:34:02'),
(131, 62, 'asiprasau', '2017-10-03 09:34:09', '2017-10-03 09:34:09'),
(132, 62, 'prasou', '2017-10-03 09:34:09', '2017-10-03 09:34:09'),
(133, 62, 'dar', '2017-10-03 09:34:09', '2017-10-03 09:34:09'),
(134, 63, 'siauliai', '2017-10-03 09:34:13', '2017-10-03 09:34:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_quest_id_foreign` (`quest_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quests_category_id_foreign` (`category_id`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trains_user_id_foreign` (`user_id`);

--
-- Indexes for table `train_quests`
--
ALTER TABLE `train_quests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `train_quests_train_id_foreign` (`train_id`),
  ADD KEY `train_quests_quest_id_foreign` (`quest_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_answers_train_quest_id_foreign` (`train_quest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `quests`
--
ALTER TABLE `quests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `train_quests`
--
ALTER TABLE `train_quests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_quest_id_foreign` FOREIGN KEY (`quest_id`) REFERENCES `quests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quests`
--
ALTER TABLE `quests`
  ADD CONSTRAINT `quests_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trains`
--
ALTER TABLE `trains`
  ADD CONSTRAINT `trains_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `train_quests`
--
ALTER TABLE `train_quests`
  ADD CONSTRAINT `train_quests_quest_id_foreign` FOREIGN KEY (`quest_id`) REFERENCES `quests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `train_quests_train_id_foreign` FOREIGN KEY (`train_id`) REFERENCES `trains` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_train_quest_id_foreign` FOREIGN KEY (`train_quest_id`) REFERENCES `train_quests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
