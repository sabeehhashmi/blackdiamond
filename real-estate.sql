-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 03:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real-estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `path` varchar(111) NOT NULL,
  `source_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `path`, `source_id`, `created_at`, `updated_at`) VALUES
(2, '/properties/image_1639679411.jpeg', 0, '2021-12-17 02:30:11', '2021-12-17 02:30:11'),
(3, '/properties/image_1639679620.jpeg', 1, '2021-12-17 02:33:40', '2021-12-17 02:33:40'),
(4, '/properties/image_1639679620.jpeg', 1, '2021-12-17 02:33:40', '2021-12-17 02:33:40'),
(5, '/properties/image_1639679826.jpeg', 1, '2021-12-17 02:37:06', '2021-12-17 02:37:06'),
(6, '/properties/image_1639679826.jpeg', 1, '2021-12-17 02:37:07', '2021-12-17 02:37:07'),
(7, '/properties/image_1639681903.jpeg', 2, '2021-12-17 03:11:43', '2021-12-17 03:11:43'),
(8, '/properties/image_1639681903.jpeg', 2, '2021-12-17 03:11:43', '2021-12-17 03:11:43'),
(9, '/properties/image_1639681956.jpeg', 2, '2021-12-17 03:12:36', '2021-12-17 03:12:36'),
(10, '/properties/image_1639681956.jpeg', 2, '2021-12-17 03:12:37', '2021-12-17 03:12:37'),
(11, '/properties/image_1639684302.jpeg', 2, '2021-12-17 03:51:42', '2021-12-17 03:51:42'),
(12, '/properties/image_1639684302.jpeg', 2, '2021-12-17 03:51:42', '2021-12-17 03:51:42'),
(13, '/properties/image_1639684353.jpeg', 2, '2021-12-17 03:52:33', '2021-12-17 03:52:33'),
(14, '/properties/image_1639684354.jpeg', 2, '2021-12-17 03:52:34', '2021-12-17 03:52:34'),
(15, '/properties/image_1639684482.jpeg', 2, '2021-12-17 03:54:42', '2021-12-17 03:54:42'),
(16, '/properties/image_1639684482.jpeg', 2, '2021-12-17 03:54:43', '2021-12-17 03:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Houses', 'houses', '2021-12-15 23:50:59', '2021-12-15 23:51:35'),
(2, 'Agri Land2', 'Agri-land', '2021-12-17 03:07:31', '2021-12-17 03:07:42');

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
(5, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(6, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(7, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(8, '2016_06_01_000004_create_oauth_clients_table', 2),
(9, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'ktefVRGENCcJE6bWtlNGfkBo0HJjW4orwvAmArmj', NULL, 'http://localhost', 1, 0, 0, '2021-12-09 13:42:24', '2021-12-09 13:42:24'),
(2, NULL, 'Laravel Password Grant Client', 'SZIDNOFpbaQpLJCAGVB6GxoKQkGWnHcruElywfZV', 'users', 'http://localhost', 0, 1, 0, '2021-12-09 13:42:24', '2021-12-09 13:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-12-09 13:42:24', '2021-12-09 13:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'myApp', '70333f7013613db127d33d58129672cf57ff4ce882d7bc7b84fe9f609b20d2be', '[\"*\"]', NULL, '2021-12-09 13:44:02', '2021-12-09 13:44:02'),
(2, 'App\\Models\\User', 2, 'blackDiamond', '7d19a01cb9b93ac9f41c348673debea004e4917ee3b707a642ad5922b6bbe171', '[\"*\"]', NULL, '2021-12-09 13:47:25', '2021-12-09 13:47:25'),
(3, 'App\\Models\\User', 2, 'blackDiamond', '75f7608b1c002a12fe97c9befc117da95101552f8f03e4f1ec401fb6252e3080', '[\"*\"]', NULL, '2021-12-09 13:50:26', '2021-12-09 13:50:26'),
(4, 'App\\Models\\User', 2, 'blackDiamond', '5262a3f2bb344b80e37f158d5782c520bf87f36e450eb04495de5174ec514a93', '[\"*\"]', NULL, '2021-12-09 13:51:33', '2021-12-09 13:51:33'),
(5, 'App\\Models\\User', 2, 'blackDiamond', 'e42d497b8746f979e8d906ea72e27385bd14fa0a16bdcc377614d1b8eb28c6d8', '[\"*\"]', NULL, '2021-12-09 13:58:14', '2021-12-09 13:58:14'),
(6, 'App\\Models\\User', 2, 'blackDiamond', 'ace9279d2be74f99c47f4feacac4c664581f6ab3d0d2f2f4e8e8c4cc32c207d9', '[\"*\"]', NULL, '2021-12-09 13:58:52', '2021-12-09 13:58:52'),
(7, 'App\\Models\\User', 2, 'blackDiamond', '8db9044f07a3e494e50ecbb2c6052c3e25bd25096be5713c282fc53a08294017', '[\"*\"]', NULL, '2021-12-09 13:59:28', '2021-12-09 13:59:28'),
(8, 'App\\Models\\User', 2, 'blackDiamond', 'b171eb032db875cb5a75feacbb68bf7c1817ae09eb4333e4b2c1e1ad152b17f0', '[\"*\"]', NULL, '2021-12-09 14:06:00', '2021-12-09 14:06:00'),
(9, 'App\\Models\\User', 2, 'blackDiamond', '0489c74a9fb3eedaf73d855923a4d0655efae70d38c4e78c05171f333e25f0e4', '[\"*\"]', NULL, '2021-12-09 14:08:35', '2021-12-09 14:08:35'),
(10, 'App\\Models\\User', 2, 'blackDiamond', 'b7fe625cadc7a089a78d62170cb81f7b6704728018fe69481ebb50875c7e5592', '[\"*\"]', NULL, '2021-12-09 14:20:58', '2021-12-09 14:20:58'),
(11, 'App\\Models\\User', 4, 'blackDiamond', '6184d4f36000e0ea9b5082201e416b4d2f5a860be7038b8dd617758c045132ed', '[\"*\"]', NULL, '2021-12-10 13:40:06', '2021-12-10 13:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1 for rent 2 for sale',
  `propert_type_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `area` float DEFAULT NULL,
  `property` int(11) DEFAULT NULL COMMENT '1 for Occupied and 2 for Vacant',
  `rental` int(11) DEFAULT NULL COMMENT '1 for yes and two for no',
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `detail_information` longtext DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `status`, `propert_type_id`, `price`, `area`, `property`, `rental`, `address`, `city`, `state`, `zipcode`, `detail_information`, `seller_id`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, 'Test', 1, 1, 200, 200, 1, 1, 'Test address', 'lahore', 'Lahore', '3223423', 'test is information', 3, '30.230286934699468', '71.48306014574344', '2021-12-17 02:33:40', '2021-12-30 18:53:51'),
(2, 'Test Property2', 1, 1, 200, 200, 1, 1, 'Test address', 'lahore', 'Lahore', '3223423', 'test is information', 3, '23232', '232233221', '2021-12-17 03:11:43', '2021-12-30 18:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `property_bids`
--

CREATE TABLE `property_bids` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `offer_description` varchar(300) DEFAULT NULL,
  `start_price` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_bids`
--

INSERT INTO `property_bids` (`id`, `property_id`, `user_id`, `title`, `offer_description`, `start_price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'I wan to purcahse this', 'I really need to purchase this', NULL, '2021-12-22 22:58:11', '2021-12-22 22:58:11'),
(2, 1, 2, 'I wan to purcahse this', 'I really need to purchase this', NULL, '2021-12-22 22:58:33', '2021-12-22 22:58:33'),
(3, 1, 2, 'I wan to purcahse this', 'I really need to purchase this', NULL, '2021-12-22 22:59:05', '2021-12-22 22:59:05'),
(4, 1, 2, 'I wan to purcahse this', 'I really need to purchase this', NULL, '2021-12-22 23:00:54', '2021-12-22 23:00:54'),
(5, 1, 2, 'I wan to purcahse this', 'I really need to purchase this', NULL, '2021-12-22 23:01:12', '2021-12-22 23:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'house', '2021-12-15 18:45:07', '2021-12-15 18:45:07'),
(2, 'shop', '2021-12-15 18:45:07', '2021-12-15 18:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'STRIPE_API_KEY', 'sk_test_XbaM4DjbeUmQCA8Cv6OHKraX00YbemdDiR', '2021-12-23 16:28:32', '2021-12-24 00:50:24'),
(2, 'STRIPE_API_VERSION', '2020-08-27', '2021-12-23 16:28:37', '2021-12-23 16:30:21'),
(3, 'free_bids', '15', '2021-12-23 16:29:00', '2021-12-23 17:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `subcription_packages`
--

CREATE TABLE `subcription_packages` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `bids` int(11) NOT NULL,
  `subscription_id` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `cycle` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcription_packages`
--

INSERT INTO `subcription_packages` (`id`, `name`, `bids`, `subscription_id`, `price`, `cycle`, `created_at`, `updated_at`) VALUES
(2, 'Stripe Test', 26, 'plan_KmAvnDhNGJuPZh', 301, 'year', '2021-12-14 09:58:47', '2021-12-14 10:06:15'),
(3, '90 Bid Package', 90, 'plan_KmENorxff9tzZ7', 400, 'month', '2021-12-14 13:37:34', '2021-12-14 13:39:32');

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
  `role` int(11) NOT NULL DEFAULT 3 COMMENT '1 for admin, 2 for seller and 3 for buyer',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'sabeeh', 'sabeeh@gmail.com', NULL, '$2y$10$XCqwWxWNh2hY1/bhV5y9POTiD3r3CuL8hC44uhGqPVSU/ffHpk1e.', NULL, 3, NULL, '2021-12-08 15:37:12', '2021-12-08 15:37:12'),
(3, 'sabeeh', 'shashmi@gmail.com', NULL, '$2y$10$0vuji9Rvg0pxrJtcCTUfvO0XZtvpz05ySVH6auywfci2e8DgHl.v6', NULL, 2, '243435454554', '2021-12-10 13:37:12', '2021-12-10 13:37:12'),
(4, 'sabeeh', 's-hashmi@gmail.com', NULL, '$2y$10$EOhjg/nPFbRUJSWsu5heauO96dQMJuI9iLVkDaCbCve4rF6WQUUaK', NULL, 2, '2434354545543', '2021-12-10 13:39:24', '2021-12-10 15:41:09'),
(5, 'Admin', 'admin@gmail.com', NULL, '$2y$10$69aRbr1mO1qYXwmpxK1bb.mJo.FbdC9YyFfMfZE1PSp1ElUnS.oNC', NULL, 1, NULL, '2021-12-20 22:11:52', '2021-12-20 22:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_bids`
--

CREATE TABLE `user_bids` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `remaining_bids` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_bids`
--

INSERT INTO `user_bids` (`id`, `user_id`, `remaining_bids`, `created_at`, `updated_at`) VALUES
(1, 2, 101, '2021-12-22 22:58:11', '2021-12-29 00:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `verification_codes`
--

CREATE TABLE `verification_codes` (
  `id` int(11) NOT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification_codes`
--

INSERT INTO `verification_codes` (`id`, `verification_code`, `user_id`, `created_at`, `updated_at`) VALUES
(15, '46164274', 2, '2021-12-10 14:59:57', '2021-12-10 14:59:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_bids`
--
ALTER TABLE `property_bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcription_packages`
--
ALTER TABLE `subcription_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_bids`
--
ALTER TABLE `user_bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_bids`
--
ALTER TABLE `property_bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcription_packages`
--
ALTER TABLE `subcription_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_bids`
--
ALTER TABLE `user_bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
