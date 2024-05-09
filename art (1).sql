-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 06:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art`
--

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `income` double(8,2) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `position`, `description`, `income`, `address`, `image`, `status`, `type`, `created_at`, `updated_at`) VALUES
(3, 'Web Designer', 'Assist in doing web designs to improve the UI of the system.', 32000.00, 'Manila', 'justnpot/images/menu/admin-1menu-item-image1680687148.jpg', 1, 0, '2023-04-05 01:32:28', '2023-04-05 01:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(13, 'T-Shirt Print Designs', 'C', NULL, 'tangible', '2023-05-13 16:31:27', '2023-05-14 01:13:51'),
(15, 'Vector Art', NULL, NULL, 'intangible', '2023-05-14 01:14:35', '2023-05-14 01:14:35'),
(16, 'Pixel Art', 'Pixel-Intangible', NULL, 'intangible', '2023-05-17 00:39:17', '2023-05-17 00:39:17'),
(18, 'Mug Design', NULL, NULL, 'tangible', '2023-05-17 01:37:01', '2023-05-17 01:37:01'),
(19, 'Vexel Art-Canvas Print', 'Vexel Art-Canvas Print', NULL, 'tangible', '2023-05-17 18:32:08', '2023-05-17 18:32:08'),
(20, 'Pop Arts', NULL, NULL, 'tangible', '2023-05-17 18:48:07', '2023-05-17 18:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) DEFAULT 0,
  `customer_id` int(11) DEFAULT 0,
  `material_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_reply` int(11) DEFAULT 0,
  `customer_reply` int(11) DEFAULT 0,
  `is_read` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `store_id`, `customer_id`, `material_id`, `message`, `created_at`, `updated_at`, `store_reply`, `customer_reply`, `is_read`) VALUES
(62, 44, 45, 100, 'Hola', '2023-12-02 20:57:59', '2023-12-04 23:08:56', 0, 45, 1),
(63, 44, 45, NULL, 'Hi', '2023-12-02 20:59:12', '2023-12-04 23:08:56', 44, 0, 1),
(64, 44, 45, 44, 'Yow', '2023-12-02 22:53:21', '2023-12-04 23:08:56', 0, 45, 1),
(65, 66, 67, NULL, 'Hi I am the artist', '2023-12-06 03:06:44', '2023-12-06 03:31:12', 66, 0, 1),
(66, 66, 67, NULL, 'Hi I am the artist', '2023-12-06 03:31:21', '2023-12-06 03:31:21', 66, 0, 0),
(67, 66, 70, 102, 'Hi', '2023-12-08 22:02:45', '2023-12-08 22:07:53', 0, 70, 1),
(68, 66, 70, NULL, 'hello', '2023-12-08 22:08:03', '2023-12-08 22:08:03', 66, 0, 0);

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
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_like` tinyint(4) DEFAULT NULL,
  `menu_item_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_counts`
--

CREATE TABLE `login_counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_login` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_counts`
--

INSERT INTO `login_counts` (`id`, `user_id`, `date_login`, `created_at`, `updated_at`) VALUES
(99, 45, '2023-12-03', '2023-12-02 22:29:40', '2023-12-02 22:29:40'),
(100, 45, '2023-12-03', '2023-12-02 22:51:43', '2023-12-02 22:51:43'),
(101, 45, '2023-12-04', '2023-12-03 23:07:18', '2023-12-03 23:07:18'),
(102, 67, '2023-12-06', '2023-12-06 02:20:47', '2023-12-06 02:20:47'),
(103, 67, '2023-12-06', '2023-12-06 02:39:38', '2023-12-06 02:39:38'),
(104, 67, '2023-12-06', '2023-12-06 03:09:49', '2023-12-06 03:09:49'),
(105, 67, '2023-12-06', '2023-12-06 03:23:48', '2023-12-06 03:23:48'),
(106, 67, '2023-12-06', '2023-12-06 03:25:29', '2023-12-06 03:25:29'),
(107, 70, '2023-12-09', '2023-12-08 21:59:47', '2023-12-08 21:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `is_available` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `artist` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT 0,
  `is_best_seller` tinyint(4) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`, `created_at`, `updated_at`, `artist`, `is_featured`, `is_best_seller`, `user_id`) VALUES
(100, 13, 'Summer Vibes', 'Summer Vibes', 'justnpot/images/menu/member-44menu-item-image1701576975.jpg', 500.00, 0, 0, '2023-12-02 20:16:15', '2023-12-02 20:16:15', 'test', 0, 0, 44),
(103, 16, 'arts', 'Cat', 'justnpot/images/menu/member-66menu-item-image1701862201.png', 1234.00, 0, 0, '2023-12-06 03:30:01', '2023-12-08 22:08:41', 'Jerome Carsola', 0, 0, 66),
(104, 16, 'test', 'an art', 'justnpot/images/menu/member-66menu-item-image1702101982.jpg', 123.00, 0, 0, '2023-12-08 22:06:22', '2023-12-08 22:08:41', 'Jerome Carsola', 0, 0, 66);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_10_094005_create_transactions_table', 1),
(6, '2022_07_12_151143_create_categories_table', 1),
(7, '2022_09_19_025143_create_order_items_table', 1),
(8, '2022_09_19_025549_create_menu_items_table', 1),
(9, '2022_09_23_135956_create_reviews_table', 1),
(10, '2022_09_26_115630_create_transaction_details_table', 1),
(11, '2022_09_30_211627_create_reservations_table', 1),
(12, '2022_10_01_120256_create_transaction_items_table', 1),
(13, '2022_10_02_112659_create_roles_table', 1),
(14, '2022_10_02_125220_create_role_user_table', 1),
(16, '2022_11_06_090123_create_carts_table', 2),
(17, '2022_11_23_051631_create_payments_table', 2),
(18, '2022_10_24_033703_create_memberships_table', 3),
(19, '2022_10_24_033703_create_careers_table', 4),
(20, '2022_12_02_081244_create_likes_table', 5),
(21, '2022_12_10_063251_create_login_counts_table', 6),
(22, '2023_01_12_044452_create_chats_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `payment_type` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payer_id`, `payer_email`, `amount`, `currency`, `payment_status`, `transaction_id`, `payment_type`, `user_id`, `created_at`, `updated_at`) VALUES
(59, 'PAYID-MVWARLQ0EW97846FR5182225', 'N5TSU42LMGKEY', 'sb-la147q22067243@personal.example.com', 2500.00, 'PHP', 'approved', 57, NULL, 45, '2023-12-02 20:51:13', '2023-12-02 20:51:13'),
(60, 'PAYID-MVWCLJI93G84435FC3442913', 'N5TSU42LMGKEY', 'sb-la147q22067243@personal.example.com', 500.00, 'PHP', 'approved', 58, NULL, 45, '2023-12-02 22:52:52', '2023-12-02 22:52:52'),
(61, 'PAYID-MVWXVXA8S816401FE1661641', 'N5TSU42LMGKEY', 'sb-la147q22067243@personal.example.com', 8000.00, 'PHP', 'approved', 59, NULL, 45, '2023-12-03 23:11:21', '2023-12-03 23:11:21'),
(62, 'PAYID-MVXMXBQ7CA70657NX050335E', 'N5TSU42LMGKEY', 'sb-la147q22067243@personal.example.com', 1500.00, 'PHP', 'approved', NULL, 2, 44, '2023-12-04 23:07:28', '2023-12-04 23:07:28'),
(63, 'PAYID-MV2AFMY60G31618KN569493P', 'N5TSU42LMGKEY', 'sb-la147q22067243@personal.example.com', 1234.00, 'PHP', 'approved', 60, NULL, 70, '2023-12-08 22:02:16', '2023-12-08 22:02:16'),
(64, 'PAYID-MV2AIGI2LP20822XN4430002', 'N5TSU42LMGKEY', 'sb-la147q22067243@personal.example.com', 200.00, 'PHP', 'approved', NULL, 0, 66, '2023-12-08 22:07:33', '2023-12-08 22:07:33');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(100) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `review` char(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(0, 'customer', 'customer', NULL, NULL),
(1, 'admin', 'admin', NULL, NULL),
(2, 'member', 'member', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `side_backs`
--

CREATE TABLE `side_backs` (
  `id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  `side_or_back` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `side_backs`
--

INSERT INTO `side_backs` (`id`, `menu_item_id`, `side_or_back`, `image`, `created_at`, `updated_at`) VALUES
(10, 53, 0, 'justnpot/images/menu/member-15menu-item-image1684127174.png', '2023-05-14 21:06:14', '2023-05-14 21:06:14'),
(11, 53, 1, 'justnpot/images/menu/member-15menu-item-image1684127174.jpg', '2023-05-14 21:06:14', '2023-05-14 21:06:14'),
(12, 56, 0, 'justnpot/images/menu/member-15menu-item-image1684312979.jpg', '2023-05-17 00:42:59', '2023-05-17 00:42:59'),
(14, 57, 0, 'justnpot/images/menu/member-15menu-item-image1684315183.jpg', '2023-05-17 01:19:43', '2023-05-17 01:19:43'),
(16, 58, 0, 'justnpot/images/menu/member-15menu-item-image1684315366.jpg', '2023-05-17 01:22:46', '2023-05-17 01:22:46'),
(18, 59, 0, 'justnpot/images/menu/member-15menu-item-image1684315960.jpg', '2023-05-17 01:32:40', '2023-05-17 01:32:40'),
(19, 0, 0, NULL, '2023-05-17 01:32:40', '2023-05-17 01:32:40'),
(20, 60, 0, 'justnpot/images/menu/member-15menu-item-image1684316249.jpg', '2023-05-17 01:37:29', '2023-05-17 01:37:29'),
(21, 0, 0, NULL, '2023-05-17 01:37:29', '2023-05-17 01:37:29'),
(22, 61, 0, 'justnpot/images/menu/member-15menu-item-image1684316560.jpg', '2023-05-17 01:42:40', '2023-05-17 01:42:40'),
(23, 0, 0, NULL, '2023-05-17 01:42:40', '2023-05-17 01:42:40'),
(24, 62, 0, 'justnpot/images/menu/member-15menu-item-image1684316659.jpg', '2023-05-17 01:44:19', '2023-05-17 01:44:19'),
(25, 62, 1, 'justnpot/images/menu/member-15menu-item-image1684316659.jpg', '2023-05-17 01:44:19', '2023-05-17 01:44:19'),
(26, 0, 0, NULL, '2023-05-17 01:59:43', '2023-05-17 01:59:43'),
(27, 63, 1, 'justnpot/images/menu/member-15menu-item-image1684317583.jpg', '2023-05-17 01:59:43', '2023-05-17 01:59:43'),
(28, 64, 0, 'justnpot/images/menu/member-15menu-item-image1684317703.jpg', '2023-05-17 02:01:43', '2023-05-17 02:01:43'),
(29, 64, 1, 'justnpot/images/menu/member-15menu-item-image1684317703.jpg', '2023-05-17 02:01:43', '2023-05-17 02:01:43'),
(30, 65, 0, 'justnpot/images/menu/member-15menu-item-image1684317784.jpg', '2023-05-17 02:03:04', '2023-05-17 02:03:04'),
(31, 65, 1, 'justnpot/images/menu/member-15menu-item-image1684317784.jpg', '2023-05-17 02:03:04', '2023-05-17 02:03:04'),
(32, 66, 0, 'justnpot/images/menu/member-15menu-item-image1684318144.jpg', '2023-05-17 02:09:04', '2023-05-17 02:09:04'),
(33, 66, 1, 'justnpot/images/menu/member-15menu-item-image1684318144.jpg', '2023-05-17 02:09:04', '2023-05-17 02:09:04'),
(34, 67, 0, 'justnpot/images/menu/member-15menu-item-image1684318305.jpg', '2023-05-17 02:11:45', '2023-05-17 02:11:45'),
(35, 67, 1, 'justnpot/images/menu/member-15menu-item-image1684318305.jpg', '2023-05-17 02:11:45', '2023-05-17 02:11:45'),
(36, 68, 0, 'justnpot/images/menu/member-15menu-item-image1684318377.jpg', '2023-05-17 02:12:57', '2023-05-17 02:12:57'),
(37, 68, 1, 'justnpot/images/menu/member-15menu-item-image1684318377.jpg', '2023-05-17 02:12:57', '2023-05-17 02:12:57'),
(38, 69, 0, 'justnpot/images/menu/member-15menu-item-image1684318745.jpg', '2023-05-17 02:19:05', '2023-05-17 02:19:05'),
(39, 69, 1, 'justnpot/images/menu/member-15menu-item-image1684318745.jpg', '2023-05-17 02:19:05', '2023-05-17 02:19:05'),
(40, 70, 0, 'justnpot/images/menu/member-15menu-item-image1684318798.jpg', '2023-05-17 02:19:58', '2023-05-17 02:19:58'),
(41, 70, 1, 'justnpot/images/menu/member-15menu-item-image1684318798.jpg', '2023-05-17 02:19:58', '2023-05-17 02:19:58'),
(42, 71, 0, 'justnpot/images/menu/member-15menu-item-image1684318848.jpg', '2023-05-17 02:20:48', '2023-05-17 02:20:48'),
(43, 71, 1, 'justnpot/images/menu/member-15menu-item-image1684318848.jpg', '2023-05-17 02:20:48', '2023-05-17 02:20:48'),
(44, 72, 0, 'justnpot/images/menu/member-15menu-item-image1684319072.jpg', '2023-05-17 02:24:32', '2023-05-17 02:24:32'),
(45, 72, 1, 'justnpot/images/menu/member-15menu-item-image1684319072.jpg', '2023-05-17 02:24:32', '2023-05-17 02:24:32'),
(46, 73, 0, 'justnpot/images/menu/member-15menu-item-image1684319193.jpg', '2023-05-17 02:26:33', '2023-05-17 02:26:33'),
(47, 73, 1, 'justnpot/images/menu/member-15menu-item-image1684319193.jpg', '2023-05-17 02:26:33', '2023-05-17 02:26:33'),
(48, 74, 0, 'justnpot/images/menu/member-15menu-item-image1684319262.jpg', '2023-05-17 02:27:42', '2023-05-17 02:27:42'),
(49, 74, 1, 'justnpot/images/menu/member-15menu-item-image1684319262.jpg', '2023-05-17 02:27:42', '2023-05-17 02:27:42'),
(50, 75, 0, 'justnpot/images/menu/member-15menu-item-image1684319515.jpg', '2023-05-17 02:31:55', '2023-05-17 02:31:55'),
(51, 75, 1, 'justnpot/images/menu/member-15menu-item-image1684319515.jpg', '2023-05-17 02:31:55', '2023-05-17 02:31:55'),
(52, 76, 0, 'justnpot/images/menu/member-15menu-item-image1684319630.jpg', '2023-05-17 02:33:50', '2023-05-17 02:33:50'),
(53, 76, 1, 'justnpot/images/menu/member-15menu-item-image1684319630.jpg', '2023-05-17 02:33:50', '2023-05-17 02:33:50'),
(54, 77, 0, 'justnpot/images/menu/member-15menu-item-image1684319995.jpg', '2023-05-17 02:39:55', '2023-05-17 02:39:55'),
(55, 0, 0, NULL, '2023-05-17 02:39:55', '2023-05-17 02:39:55'),
(56, 78, 0, 'justnpot/images/menu/member-15menu-item-image1684320176.jpg', '2023-05-17 02:42:56', '2023-05-17 02:42:56'),
(57, 78, 1, 'justnpot/images/menu/member-15menu-item-image1684320176.jpg', '2023-05-17 02:42:56', '2023-05-17 02:42:56'),
(58, 79, 0, 'justnpot/images/menu/member-15menu-item-image1684320274.jpg', '2023-05-17 02:44:34', '2023-05-17 02:44:34'),
(59, 79, 1, 'justnpot/images/menu/member-15menu-item-image1684320274.jpg', '2023-05-17 02:44:34', '2023-05-17 02:44:34'),
(60, 80, 0, 'justnpot/images/menu/member-15menu-item-image1684320406.jpg', '2023-05-17 02:46:46', '2023-05-17 02:46:46'),
(61, 80, 1, 'justnpot/images/menu/member-15menu-item-image1684320406.jpg', '2023-05-17 02:46:46', '2023-05-17 02:46:46'),
(62, 81, 0, 'justnpot/images/menu/member-15menu-item-image1684320779.jpg', '2023-05-17 02:52:59', '2023-05-17 02:52:59'),
(63, 81, 1, 'justnpot/images/menu/member-15menu-item-image1684320779.jpg', '2023-05-17 02:52:59', '2023-05-17 02:52:59'),
(64, 82, 0, 'justnpot/images/menu/member-15menu-item-image1684320890.jpg', '2023-05-17 02:54:50', '2023-05-17 02:54:50'),
(65, 82, 1, 'justnpot/images/menu/member-15menu-item-image1684320890.jpg', '2023-05-17 02:54:50', '2023-05-17 02:54:50'),
(66, 0, 0, 'justnpot/images/menu/member-15menu-item-imageside1684321025.jpgside', '2023-05-17 02:57:05', '2023-05-17 02:57:05'),
(67, 0, 0, 'justnpot/images/menu/member-15menu-item-imageside1684321039.jpgside', '2023-05-17 02:57:19', '2023-05-17 02:57:19'),
(68, 0, 1, 'justnpot/images/menu/member-15menu-item-imageback1684321039.jpgback', '2023-05-17 02:57:19', '2023-05-17 02:57:19'),
(69, 88, 0, 'justnpot/images/menu/member-15menu-item-imageside1684321317.jpgside', '2023-05-17 03:01:57', '2023-05-17 03:01:57'),
(70, 89, 0, 'justnpot/images/menu/member-15menu-item-imageside1684321326.jpgside', '2023-05-17 03:02:06', '2023-05-17 03:02:06'),
(71, 0, 1, 'justnpot/images/menu/member-15menu-item-imageback1684321326.jpgback', '2023-05-17 03:02:06', '2023-05-17 03:02:06'),
(72, 90, 0, 'justnpot/images/menu/member-15menu-item-imageside1684321423.jpgside', '2023-05-17 03:03:43', '2023-05-17 03:03:43'),
(73, 0, 1, 'justnpot/images/menu/member-15menu-item-imageback1684321423.jpgback', '2023-05-17 03:03:43', '2023-05-17 03:03:43'),
(74, 91, 0, 'justnpot/images/menu/member-15menu-item-imageside1684321517.jpgside', '2023-05-17 03:05:17', '2023-05-17 03:05:17'),
(75, 91, 1, 'justnpot/images/menu/member-15menu-item-imageback1684321517.jpgback', '2023-05-17 03:05:17', '2023-05-17 03:05:17'),
(76, 92, 1, 'justnpot/images/menu/member-15menu-item-imageback1684321639.jpgback', '2023-05-17 03:07:19', '2023-05-17 03:07:19'),
(77, 93, 0, 'justnpot/images/menu/member-15menu-item-imageside1684322120.jpgside', '2023-05-17 03:15:20', '2023-05-17 03:15:20'),
(78, 93, 1, 'justnpot/images/menu/member-15menu-item-imageback1684322120.jpgback', '2023-05-17 03:15:20', '2023-05-17 03:15:20'),
(79, 94, 1, 'justnpot/images/menu/member-15menu-item-imageback1684373387.jpgback', '2023-05-17 17:29:47', '2023-05-17 17:29:47'),
(80, 100, 0, 'justnpot/images/menu/member-44menu-item-imageside1701576975.jpgside', '2023-12-02 20:16:15', '2023-12-02 20:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` tinyint(4) DEFAULT NULL,
  `order_type` tinyint(4) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `payment_reference` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 - Ordering, 1 - For Approval, 3 - Approved, 3 - Ready, 4 - On the way, 5 - Received, 6 - Decline, 7 - Cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `payment_type`, `order_type`, `delivery_date`, `total_amount`, `payment_reference`, `status`, `created_at`, `updated_at`) VALUES
(57, 45, NULL, NULL, NULL, 2500.00, NULL, 3, '2023-12-02 20:51:13', '2023-12-02 20:53:30'),
(58, 45, NULL, NULL, NULL, 500.00, NULL, 1, '2023-12-02 22:52:52', '2023-12-02 22:52:52'),
(59, 45, NULL, NULL, NULL, 8000.00, NULL, 1, '2023-12-03 23:11:21', '2023-12-03 23:11:21'),
(60, 70, NULL, NULL, NULL, 1234.00, NULL, 1, '2023-12-08 22:02:16', '2023-12-08 22:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `address` char(100) NOT NULL,
  `email_address` char(100) NOT NULL,
  `contact_no` char(11) NOT NULL,
  `note` char(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `menu_item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `transaction_id`, `menu_item_id`, `quantity`, `delivery_date`, `delivery_time`, `amount`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(93, 57, 100, 5, NULL, NULL, 500.00, 45, 3, '2023-12-02 20:48:38', '2023-12-02 20:53:30'),
(94, 58, 100, 1, NULL, NULL, 500.00, 45, NULL, '2023-12-02 22:52:13', '2023-12-03 06:52:52'),
(95, 59, 100, 16, NULL, NULL, 8000.00, 45, NULL, '2023-12-03 23:07:43', '2023-12-04 07:11:21'),
(97, NULL, 100, 1, NULL, NULL, 500.00, 67, NULL, '2023-12-06 03:10:55', '2023-12-06 03:10:55'),
(98, NULL, 101, 1, NULL, NULL, 123.00, 67, NULL, '2023-12-06 03:27:13', '2023-12-06 03:27:13'),
(99, 60, 103, 1, NULL, NULL, 1234.00, 70, 1, '2023-12-08 22:00:58', '2023-12-08 22:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `mobile`, `email_verified_at`, `password`, `remember_token`, `role`, `is_active`, `status`, `image`, `picture`, `is_verified`, `remarks`, `created_at`, `updated_at`, `birthdate`, `age`, `gender`) VALUES
(1, 'admin', 'admin@gmail.com', 'N/A', '000000000', NULL, '$2y$10$X65fKvAmTndhAxIxgOOwY.Jdi4Ro1D.E5SIWBbf/0gVJTfwWz/CUS', NULL, 1, NULL, 1, 'id-image1678170396.png', NULL, 1, NULL, '2022-12-03 17:26:27', '2023-03-14 20:09:03', '2022-12-04', 20, 0),
(14, 'Mary Ann Customer1', 'customer1@gmail.com', 'Manila', '41241481847', NULL, '$2y$10$ZN86vGRvGIfPQf2x2Qm2heGBpT7ZqXZAmbaOCAMXQ3BAyUt7JYXK2', NULL, 0, NULL, 0, 'id-image1680675499.jpg', 'id-imageP1680675499.jpg', 1, NULL, '2023-04-04 22:18:19', '2023-04-27 19:56:58', '1999-02-12', 23, 0),
(15, 'Mary Ann Member1', 'member1@gmail.com', 'Manila', '12313', NULL, '$2y$10$LYoIHB.FtQ3yB/D.nfMqeesp7LiKfgoOvM8sNxR2YLDB7OCUCV24y', NULL, 2, NULL, 0, 'id-image1680675715.jpg', 'id-imageP1680675715.jpg', 1, NULL, '2023-04-04 22:21:55', '2023-04-10 19:33:47', '1999-12-12', 23, 0),
(16, 'MAry Ann Mamaril', 'member2@gmail.com', 'Test', '2566', NULL, '$2y$10$67xkcsvXcwf3EYn6EyOe.O9ZwtJrrIxI4ZZasxYN6FskeytSy/G2S', NULL, 2, NULL, 0, NULL, 'id-image1680675981.jpg', 1, NULL, '2023-04-04 22:26:21', '2023-04-05 01:02:30', '1999-02-12', 23, 0),
(17, 'Mary Ann Customer2', 'customer2@gmail.com', 'Manila', '00000000000', NULL, '$2y$10$sseuVGlKID7s9JL0UQHAq.e8uUeVvzp26I3Ylcbg/UhcWP80GyTW6', NULL, 0, NULL, 0, NULL, 'id-image1680677030.jpg', 1, NULL, '2023-04-04 22:43:50', '2023-04-04 22:43:50', '1999-02-12', 23, 0),
(18, 'Mary Ann Customer3', 'customer3@gmail.com', 'test', '00000000000', NULL, '$2y$10$mgbTg9AncFmZlSm1x87A4.C8pWxZvLfgFSGTguueUUHzvFLtvRI9K', NULL, 0, NULL, 0, NULL, 'id-image1680677105.jpg', 1, NULL, '2023-04-04 22:45:05', '2023-04-04 22:45:05', '0199-04-12', 45, 0),
(19, 'mary4', 'customer4@gmail.com', 'Manila', '01231251241', NULL, '$2y$10$Ugm75tDp.0mNa8ITsaT18OZtUDKKre75ORbgVmBjpqpYlZMOGmFiq', NULL, 0, NULL, 0, 'id-image1680678496.png', 'id-imageP1680678496.png', 1, NULL, '2023-04-04 23:08:17', '2023-04-04 23:22:13', '1999-02-12', -123, 1),
(20, 'Mark Lexter', 'member3@gmail.com', 'manila', '02154857421', NULL, '$2y$10$S9D6zZqN5dYOSe8SO57BeeSlG1G7wO6qv5a/6eNepEtpV1BVfKCqO', NULL, 2, NULL, NULL, NULL, 'id-image1680686117.png', 1, NULL, '2023-04-05 01:15:17', '2023-04-05 01:35:35', '1999-12-12', 23, 0),
(21, 'Edisonn8', 'member4@gmail.com', 'manila', NULL, NULL, '$2y$10$1KzzNegt14XDbN0WbiQUpuLS9VNEgIPw2u2ATGqP7RMGU0VwKGMCO', NULL, 2, NULL, 0, 'id-image1680686329.jpg', 'id-imageP1680686329.jpg', 1, NULL, '2023-04-05 01:18:49', '2023-04-05 01:21:19', '1999-12-12', 23, 0),
(44, 'test', 'test@test.com', 'test', '00000000000', NULL, '$2y$10$TyDaFg9A4tN.S6AvVgyGN.74WmGJFsmrXKRzpiyoqAphGzN4Zs3Wy', NULL, 2, NULL, 0, 'id-image1701575897.png', 'id-imageP1701575897.png', 1, NULL, '2023-12-02 19:58:17', '2023-12-02 20:48:02', '2020-02-12', 23, 0),
(45, 'Ronn Returan', 'ronnreturan@gmail.com', 'test', '00000000000', NULL, '$2y$10$x/JTK0AzkBL8mvhZLmiBxOjBdgrGo8B2WtNfP.Lm7ep6z6uiwdJeu', NULL, 0, NULL, 0, 'id-image1701577148.jpg', 'id-imageP1701577148.png', 1, NULL, '2023-12-02 20:19:08', '2023-12-02 22:26:17', '2014-02-12', 23, 0),
(46, 'Jerome', 'jerome@gmail.com', 'test', '00000000000', NULL, '$2y$10$AJ3a7ogZScVSwW31/QI/Q.uPijqrmKxjfNzgHwEvKS8zwn76RBxAG', NULL, 0, NULL, 0, 'id-image1701580182.jpg', 'id-imageP1701580182.jpg', 1, NULL, '2023-12-02 21:09:42', '2023-12-08 22:11:55', '2010-10-10', 24, 0),
(47, '123', 'test@test2.com', 'test', '00000000000', NULL, '$2y$10$ArthLihhaVZ9hEdM4.rQhO72WLk8lXF3qp3vMjyO7jUfKS1s2GonK', NULL, 0, NULL, 0, 'id-image1701580346.jpg', 'id-imageP1701580346.jpg', 0, NULL, '2023-12-02 21:12:26', '2023-12-02 21:12:26', '2020-02-12', 23, 0),
(48, 'test', '123@test.com', 't', '23232323232', NULL, '$2y$10$IVq9GDQsTq702UpW20BT0.UIv6HoSrWS2qIjsYe8n6ASc1PXovxkC', NULL, 2, NULL, 0, 'id-image1701580744.jpg', 'id-imageP1701580744.jpg', 0, NULL, '2023-12-02 21:19:04', '2023-12-02 21:19:04', '2022-04-12', 23, 0),
(49, 'test2', 'test26@gmail.com', '123', '42', NULL, '$2y$10$fR7lNuSuyiBSMGOfHBM5qe4/L5jPxtYoHWNlO9FQ/7Z9ytnq6eVOW', NULL, 2, NULL, 0, 'id-image1701580854.jpg', 'id-imageP1701580854.jpg', 0, NULL, '2023-12-02 21:20:54', '2023-12-02 21:20:54', '2009-02-12', 43, 1),
(52, 'test', 'customer8@gmail.com', '23', '55555555555', NULL, '$2y$10$YlipmgqSGBuKlYcjjB2u.eUSAsH3.WWt2ng/sgqfGa5IqsgQ2bsly', NULL, 2, NULL, 0, 'id-image1701582645.jpg', 'id-imageP1701582645.jpg', 0, NULL, '2023-12-02 21:50:45', '2023-12-02 21:50:45', '1999-02-12', 23, 0),
(53, 'test', '123@gmail.com', 'test@test.com', '00000000000', NULL, '$2y$10$J85JwqKOgs4h4j9ycRU1GuuIqjtpoGoG5YYcvQjiDKz2wJJmkOcqW', NULL, 2, NULL, 0, 'id-image1701582848.jpg', 'id-imageP1701582848.jpg', 0, NULL, '2023-12-02 21:54:08', '2023-12-02 21:54:08', '2000-02-12', 23, 0),
(54, 'test2', 'testing@test.com', 'test', '00000000000', NULL, '$2y$10$Dn/Npesq9kqZQuDEvUnCQOFWDrKY8pSQdqMGj/Bn4clciCMzybeYG', NULL, 0, NULL, 0, 'id-image1701583143.jpg', 'id-imageP1701583143.jpg', 0, NULL, '2023-12-02 21:59:03', '2023-12-02 21:59:03', '4455-12-12', 23, 1),
(55, 'test', '2@2.3', '00', '0000000000', NULL, '$2y$10$qq7YgOzdFYghNWJkX8ycoOol9qBgpe2MvWXBW8.UFw5XWH69R7Bi6', NULL, 2, NULL, 0, 'id-image1701583398.jpg', 'id-imageP1701583398.jpg', 0, NULL, '2023-12-02 22:03:18', '2023-12-02 22:03:18', '2023-02-12', 23, 0),
(56, '5', 'tes6t@gmail.com', '423', '2451', NULL, '$2y$10$U7arIu04PFwhSUaTgaX/8u/wTreVQNaIendQ65NmBXOWOaqvB9oBy', NULL, 0, NULL, 0, 'id-image1701583701.jpg', 'id-imageP1701583701.jpg', 0, NULL, '2023-12-02 22:08:21', '2023-12-02 22:08:21', '0566-12-23', 4, 1),
(57, 'test', '23@gmail.com', '123', '5', NULL, '$2y$10$fJoQMomtvXHYvwdx9a6uJ.GSNjNDiEOti3lA/MdOlqubVcpU6huJi', NULL, 0, NULL, 0, 'id-image1701583860.jpg', 'id-imageP1701583860.jpg', 0, NULL, '2023-12-02 22:11:00', '2023-12-02 22:11:00', '1999-02-12', 12, 1),
(58, 'k', 'k@t.c', '123', '231', NULL, '$2y$10$0.n9JoXzRPb.S5TGgLSKiuo2zU1Z/RLFn9eca0Z9FAVN1eBHQ8aHG', NULL, 0, NULL, 0, 'id-image1701584057.jpg', 'id-imageP1701584057.jpg', 0, NULL, '2023-12-02 22:14:17', '2023-12-02 22:14:17', '0111-02-11', 12, 0),
(59, 't', '564@g.c', '123123123', '1232323', NULL, '$2y$10$kVKtUaV.FoFBf3/6a.x1guTVHfSUhoEQGkkevweTpLsXfF0MYihiC', NULL, 2, NULL, 0, 'id-image1701584118.jpg', 'id-imageP1701584118.jpg', 0, NULL, '2023-12-02 22:15:18', '2023-12-02 22:15:18', '0006-03-21', 23, 0),
(60, 'test2', '764@g.cv', '3456', '43', NULL, '$2y$10$1tP7/qCTVn/b6oyJpFZgz.7uRjE.ugL.hc3BbloQ.8htCndoUG/ay', NULL, 0, NULL, 0, 'id-image1701585292.jpg', 'id-imageP1701585292.jpg', 0, NULL, '2023-12-02 22:34:52', '2023-12-02 22:34:52', '2112-03-12', 23, 0),
(61, 'test', 'test@test55.com', '5134@', '531251351', NULL, '$2y$10$rShpqSJLjMv6rOh7qrnn/eMNNdNFtH7q0NJ3Lu/LBSW4IZgXNoDsG', NULL, 0, NULL, 0, 'id-image1701586486.jpg', 'id-imageP1701586486.jpg', 0, NULL, '2023-12-02 22:54:46', '2023-12-02 22:54:46', '0322-02-12', 23, 0),
(62, 'test', 'charles@gmail.com', 'Manila', '00000000000', NULL, '$2y$10$r43D.C6Ut9avLZtEBOo/Z.dAKv/l.ygwceg6JJn8ldBn/8laP5fi6', NULL, 0, NULL, 0, 'id-image1701673553.png', 'id-imageP1701673553.png', 0, NULL, '2023-12-03 23:05:53', '2023-12-03 23:05:53', '1999-02-12', 23, 0),
(63, 'ronn', 'rvreturan@gmail.com', 'ewerv23e', '21054654652', NULL, '$2y$10$VBg9SBGlLuL6Z1hIvY0qSu1.QNKrigmzGLdsMp1yF1RKDCzfRMLOm', NULL, 2, NULL, 0, 'id-image1701853193.png', 'id-imageP1701853193.png', 1, NULL, '2023-12-06 00:59:53', '2023-12-06 01:25:46', '1997-11-12', 26, 0),
(65, 'Ronn Returan', 'mrvvreturan@tip.edu.ph', 'Marilao Bulacan', '0123456789', NULL, '$2y$10$LoW/6N7t0U8tx2N0gqiyb.nra2ttEiJd4yRWUUiowagO4fWnJVJ0C', NULL, 2, NULL, 0, 'id-image1701853885.png', 'id-imageP1701853885.png', 1, NULL, '2023-12-06 01:11:25', '2023-12-06 01:29:41', '1997-11-12', 26, 0),
(66, 'Jerome Carsola', 'majyu@tip.edu.ph', 'Marilao Bulacan', '09123465789', NULL, '$2y$10$kPJeh/Sq.Sm5tXUgic.J9.wNNMDr1dOgndt5kXODucTQUz.ooT7Iq', NULL, 2, NULL, 0, 'id-image1701854151.png', 'id-imageP1701854151.png', 1, NULL, '2023-12-06 01:15:51', '2023-12-08 22:08:41', '2002-12-12', 20, 0),
(67, 'jayrelle', 'jay@gmail.com', 'Manila', '0912242634', NULL, '$2y$10$3TFo.7v3kzB5ulE8fctoKuGlrpCU30vRTTuGRKiQrmYikN9a5Zo0y', NULL, 0, NULL, 0, 'id-image1701857947.png', 'id-imageP1701857947.png', 1, NULL, '2023-12-06 02:19:07', '2023-12-06 02:19:55', '2023-12-06', 20, 0),
(68, 'Jneil Yu', 'neil@gmail.com', 'Los Angeles California', '09778455651', NULL, '$2y$10$I94cxesHl/.UcgWqvyOtte9O1UJqudWN6ThjivVcANPr8CNhyDrli', NULL, 2, NULL, 0, 'id-image1701861777.png', 'id-imageP1701861777.jpg', 1, NULL, '2023-12-06 03:22:57', '2023-12-06 03:35:16', '2002-12-12', 21, 0),
(69, 'Anshun Neil Yu', 'aanshun@gmail.com', 'Los Angeles California', '09786532132', NULL, '$2y$10$ATkjzNSzA/JNVZSbptl42OSvqoylS960mRMnQFfkFX2xasHz.o.Ey', NULL, 0, NULL, 0, 'id-image1702101376.png', 'id-imageP1702101376.jpg', 0, NULL, '2023-12-08 21:56:16', '2023-12-08 21:56:16', '2004-04-06', 21, 0),
(70, 'Charles Gratela', 'charles.gratela@gmail.com', 'Manila', '09097845123', NULL, '$2y$10$8GgkYwhRykkNz61D1rdFIOdJXCyj2rfSV4.m4omOksvMbgKRCNFOa', NULL, 0, NULL, 0, 'id-image1702101523.jpg', 'id-imageP1702101523.jpg', 1, NULL, '2023-12-08 21:58:43', '2023-12-08 21:59:19', '1999-02-12', 23, 0),
(71, 'Test', 't@c.c', 'teqt', '13444444444', NULL, '$2y$10$L1k284ehMgPDHLPVFwQun.Kzd7WTDo1FVg0SzEF.2gTpUcuezJ67G', NULL, 0, NULL, 0, 'id-image1715265790.jpg', 'id-imageP1715265790.jpg', 0, NULL, '2024-05-09 06:43:10', '2024-05-09 06:43:10', '0134-12-12', 21, 1),
(72, 'test', 't@c.c5', 'tesdt12314', '4314141414', NULL, '$2y$10$uVYHV.Rk3IMUQAmTWZmgA.coLT5JXKPSBhrOaUpz4qv4jDO1.9w4q', NULL, 0, NULL, 0, 'id-image1715265940.jpg', 'id-imageP1715265940.jpg', 0, NULL, '2024-05-09 06:45:40', '2024-05-09 06:45:40', '0214-04-24', 43, 0),
(73, 'Test', 'c@kl.h', '1231241', '41412414', NULL, '$2y$10$7jfNskY078VUzsBOb/0F7eL4OpYbH52B.CjPx9EveffVk0eRrjt9i', NULL, 2, NULL, 0, 'id-image1715266396.jpg', 'id-imageP1715266396.jpg', 0, NULL, '2024-05-09 06:53:16', '2024-05-09 06:53:16', '0013-12-12', 413, 1),
(74, '531', '3515@c.c', '35125', '53151', NULL, '$2y$10$AETPF4ClkHOIpFPcxIxxMuXsGPofW9XYwssGAx/L.JwEvSEAzIB.6', NULL, 2, NULL, 0, 'id-image1715266847.jpg', 'id-imageP1715266847.jpg', 0, NULL, '2024-05-09 07:00:47', '2024-05-09 07:00:47', '0414-03-12', 321, 0),
(75, 'Test', 'tweqeq@t.c', 'Test', '123414141', NULL, '$2y$10$ZMmWf3LxF.DJV949kugVP.DjE6S6aJ073xOx.lBJ5VIN0sqZ/ZRLO', NULL, 0, NULL, 0, 'id-image1715267431.jpg', 'id-imageP1715267431.jpg', 0, NULL, '2024-05-09 07:10:32', '2024-05-09 07:10:32', '0414-12-14', 4314, 0),
(76, 'Test123', '141@c.c', '4141', '41', NULL, '$2y$10$PV3xTJ83zFMtfHCGM/MVZeYOmVMi0CPJ2JSeDocpKSAkJPZiQwJG2', NULL, 2, NULL, 0, 'id-image1715267461.jpg', 'id-imageP1715267461.jpg', 0, NULL, '2024-05-09 07:11:02', '2024-05-09 07:11:02', '0414-03-12', 2414, 0),
(77, '315', '53@fasd.d', 'teqw', '41241341414', NULL, '$2y$10$RC6hYdmUcFufuBpg09aUXOEN0Huw1B0zR.J0mDL0rNT/59F4TNRJG', NULL, 0, NULL, 0, 'id-image1715267814.jpg', 'id-imageP1715267814.jpg', 0, NULL, '2024-05-09 07:16:54', '2024-05-09 07:16:54', '0341-12-04', 4123, 0),
(79, '315', '553@fasd.d', 'teqw', '41241341414', NULL, '$2y$10$h2ZQPCYUBTSOwl7Angq2BewdGpHrLfkVDlO6jvjbnDtLWfwAAU2G6', NULL, 0, NULL, 0, 'id-image1715267899.jpg', 'id-imageP1715267899.jpg', 0, NULL, '2024-05-09 07:18:20', '2024-05-09 07:18:20', '0341-12-04', 4123, 0),
(80, 'Test123!', 't@fg.hg', '32141', '4141414', NULL, '$2y$10$8JKj.pQQz90pzd6uUJz9j.cQbvHeEoIwA4OigQK1wsmCofsUKI2LC', NULL, 0, NULL, 0, 'id-image1715268040.jpg', 'id-imageP1715268040.jpg', 0, NULL, '2024-05-09 07:20:40', '2024-05-09 07:20:40', '0314-04-12', 241, 1),
(81, 'Test123!', '3412.42@c.c', '1231', '31231314141', NULL, '$2y$10$R4wgHGhCyc5vqL81pXdijOzOaoYhlBM7SvcCTjl.DSBYopD.7bdh.', NULL, 0, NULL, 0, 'id-image1715268232.jpg', 'id-imageP1715268232.jpg', 0, NULL, '2024-05-09 07:23:52', '2024-05-09 07:23:52', '1212-12-12', 412414, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_counts`
--
ALTER TABLE `login_counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `side_backs`
--
ALTER TABLE `side_backs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_details_transaction_id_unique` (`transaction_id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
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
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `login_counts`
--
ALTER TABLE `login_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `side_backs`
--
ALTER TABLE `side_backs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
