-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 07:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income` double(8,2) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `position`, `description`, `income`, `address`, `image`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Web Developer', 'A web developer\'s job is to create websites. While their primary role is to ensure the website is visually appealing and easy to navigate, many web developers are also responsible for the website\'s performance and capacity.', 20000.00, 'Manila', 'justnpot/images/menu/admin-1menu-item-image1670127285.jpg', 1, 0, '2022-12-03 20:14:45', '2022-12-03 20:14:45'),
(2, 'Software Engineer', 'A software engineer is a person who applies the principles of software engineering to design, develop, maintain, test, and evaluate computer software. The term programmer is sometimes used as a synonym, but may also lack connotations of engineering education or skills.', 35000.00, 'Taguig', 'justnpot/images/menu/admin-1menu-item-image1670127321.png', 1, 0, '2022-12-03 20:15:21', '2022-12-03 20:15:21'),
(3, 'Manager', 'Managers play an important role in the overall success of a company. They are responsible for leading a team of employees to meet goals and achieve performance metrics.', 50000.00, 'BGC', 'justnpot/images/menu/admin-1menu-item-image1670127406.png', 1, 0, '2022-12-03 20:16:46', '2022-12-03 20:16:46'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:47:33', '2023-01-12 01:47:33'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:47:37', '2023-01-12 01:47:37'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:47:52', '2023-01-12 01:47:52'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:48:04', '2023-01-12 01:48:04'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:48:22', '2023-01-12 01:48:22'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:49:15', '2023-01-12 01:49:15'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:49:17', '2023-01-12 01:49:17'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:49:18', '2023-01-12 01:49:18'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:49:18', '2023-01-12 01:49:18'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:49:34', '2023-01-12 01:49:34'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:49:45', '2023-01-12 01:49:45'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:49:45', '2023-01-12 01:49:45'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:49:46', '2023-01-12 01:49:46'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:49:46', '2023-01-12 01:49:46'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:49:46', '2023-01-12 01:49:46'),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:50:07', '2023-01-12 01:50:07'),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:50:34', '2023-01-12 01:50:34'),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:52:45', '2023-01-12 01:52:45'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:52:47', '2023-01-12 01:52:47'),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:52:47', '2023-01-12 01:52:47'),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:54:08', '2023-01-12 01:54:08'),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:55:18', '2023-01-12 01:55:18'),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:55:19', '2023-01-12 01:55:19'),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:55:20', '2023-01-12 01:55:20'),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:55:20', '2023-01-12 01:55:20'),
(29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:55:20', '2023-01-12 01:55:20'),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:11', '2023-01-12 01:57:11'),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:12', '2023-01-12 01:57:12'),
(32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:24', '2023-01-12 01:57:24'),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:24', '2023-01-12 01:57:24'),
(34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:25', '2023-01-12 01:57:25'),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:25', '2023-01-12 01:57:25'),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:25', '2023-01-12 01:57:25'),
(37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:26', '2023-01-12 01:57:26'),
(38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:26', '2023-01-12 01:57:26'),
(39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:26', '2023-01-12 01:57:26'),
(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:26', '2023-01-12 01:57:26'),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:27', '2023-01-12 01:57:27'),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:57:27', '2023-01-12 01:57:27'),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:58:00', '2023-01-12 01:58:00'),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 01:58:43', '2023-01-12 01:58:43'),
(45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:06:59', '2023-01-12 02:06:59'),
(46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:07:02', '2023-01-12 02:07:02'),
(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:07:02', '2023-01-12 02:07:02'),
(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:07:03', '2023-01-12 02:07:03'),
(49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:07:03', '2023-01-12 02:07:03'),
(50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:07:03', '2023-01-12 02:07:03'),
(51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:07:35', '2023-01-12 02:07:35'),
(52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:08:10', '2023-01-12 02:08:10'),
(53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:09:22', '2023-01-12 02:09:22'),
(54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:09:25', '2023-01-12 02:09:25'),
(55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:09:26', '2023-01-12 02:09:26'),
(56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:10:24', '2023-01-12 02:10:24'),
(57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:10:40', '2023-01-12 02:10:40'),
(58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:12:27', '2023-01-12 02:12:27'),
(59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-12 02:13:06', '2023-01-12 02:13:06');

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
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Abstract', 'abstract', 1, '2022-12-04 01:56:34', '2022-12-04 03:06:41'),
(2, 'Digital Art', 'digital art', 1, '2022-12-03 18:58:29', '2022-12-03 18:58:29'),
(3, 'Realism', 'Realism is a painting art style that aims to give the viewer a reflection of the real world. Many of the most famous paintings are painted in this style and for many, paintings made in this style are what they will think of when they think of ‘art’. It is important, however, to make the distinction between realism and photorealism – the former concerns itself with a realistic scene but does not aim to be a true depiction.', 3, '2022-12-03 19:11:56', '2022-12-03 19:15:53'),
(4, 'Expressionism', 'At the other end of the spectrum is expressionism. Expressionism is a style of art that doesn’t concern itself with realism, images and scenes are often distorted or painted with otherworldly, vivid colours that don’t match up with reality. The focus is instead on the artist’s ideas or feelings, which are expressed through the medium of art.', 4, '2022-12-03 19:24:14', '2022-12-03 19:24:14'),
(5, 'Abstract', 'Abstract', 5, '2022-12-03 19:37:40', '2022-12-03 19:37:40'),
(6, 'Digital', 'Digital', 5, '2022-12-03 19:42:27', '2022-12-03 19:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) DEFAULT 0,
  `customer_id` int(11) DEFAULT 0,
  `material_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_reply` int(11) DEFAULT 0,
  `customer_reply` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `store_id`, `customer_id`, `material_id`, `message`, `created_at`, `updated_at`, `store_reply`, `customer_reply`) VALUES
(1, 3, 2, 1, 'Hello', '2023-01-12 02:23:06', '2023-01-12 02:23:06', 2, 0),
(2, 3, 2, 1, 'asd', '2023-01-12 02:27:55', '2023-01-12 02:27:55', 0, 3),
(3, 3, 2, 1, 'fdg', '2023-01-12 02:27:58', '2023-01-12 02:27:58', 2, 0),
(4, 3, 2, 1, 'asd', '2023-01-12 02:37:35', '2023-01-12 02:37:35', 0, 3),
(5, 3, 2, 3, '123', '2023-01-12 02:49:56', '2023-01-12 02:49:56', NULL, NULL),
(6, NULL, NULL, 3, 'hmm', '2023-01-12 03:01:25', '2023-01-12 03:01:25', NULL, NULL),
(7, 4, 2, 3, 'dfg2', '2023-01-12 03:02:22', '2023-01-12 03:02:22', NULL, NULL),
(8, 0, 2, 3, 'dfg', '2023-01-12 03:03:03', '2023-01-12 03:03:03', NULL, NULL),
(9, 0, 2, 3, 'yuiyi', '2023-01-12 03:03:17', '2023-01-12 03:03:17', NULL, NULL),
(10, 0, 2, 3, 'asd', '2023-01-12 03:04:08', '2023-01-12 03:04:08', NULL, NULL),
(11, 0, 2, 3, 'sdf', '2023-01-12 03:04:19', '2023-01-12 03:04:19', NULL, NULL),
(12, 0, 2, 3, 'asd', '2023-01-12 03:04:36', '2023-01-12 03:04:36', NULL, NULL),
(13, 0, 2, 3, 'dfg2', '2023-01-12 03:04:53', '2023-01-12 03:04:53', NULL, NULL),
(14, 0, 2, 3, '111', '2023-01-12 03:04:56', '2023-01-12 03:04:56', NULL, NULL),
(15, 0, 2, 3, 'g', '2023-01-12 03:22:46', '2023-01-12 03:22:46', NULL, NULL),
(16, 0, 2, 4, 'fdg', '2023-01-12 13:32:51', '2023-01-12 13:32:51', 0, 2),
(17, 0, 2, 4, 'asd', '2023-01-12 13:32:57', '2023-01-12 13:32:57', 0, 2),
(18, 0, 2, 4, 'fdg', '2023-01-12 13:33:04', '2023-01-12 13:33:04', 0, 2),
(19, 0, 2, 4, '111', '2023-01-12 13:33:26', '2023-01-12 13:33:26', 0, 2),
(20, 3, 2, 4, '33', '2023-01-12 13:34:20', '2023-01-12 13:34:20', 0, 2),
(21, 3, 2, 4, '44', '2023-01-12 13:34:23', '2023-01-12 13:34:23', 0, 2),
(22, 3, 2, NULL, 'asd', '2023-01-12 14:23:11', '2023-01-12 14:23:11', 3, 0),
(23, 3, 2, 2, 'asan po ung link?', '2023-01-12 14:26:01', '2023-01-12 14:26:01', 0, 2),
(24, 3, 2, NULL, 'here po', '2023-01-12 14:26:07', '2023-01-12 14:26:07', 3, 0);

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

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `is_like`, `menu_item_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, NULL, NULL),
(2, NULL, 1, 1, NULL, NULL),
(3, NULL, 1, 2, NULL, NULL),
(4, NULL, 1, 2, NULL, NULL),
(5, NULL, 1, 1, NULL, NULL);

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
(1, 1, '2022-12-10', NULL, NULL),
(2, 2, '2022-12-10', NULL, NULL),
(3, 3, '2022-12-10', NULL, NULL),
(4, 1, '2022-12-10', NULL, NULL),
(5, 5, '2022-12-09', NULL, NULL),
(6, 2, '2022-12-10', '2022-12-09 23:33:00', '2022-12-09 23:33:00'),
(7, 2, '2022-12-10', '2022-12-09 23:34:08', '2022-12-09 23:34:08'),
(8, 2, '2023-01-12', '2023-01-11 20:20:00', '2023-01-11 20:20:00'),
(9, 2, '2023-01-13', '2023-01-12 13:12:00', '2023-01-12 13:12:00'),
(10, 2, '2023-01-13', '2023-01-12 14:23:29', '2023-01-12 14:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `is_available` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `artist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT 0,
  `is_best_seller` tinyint(4) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`, `created_at`, `updated_at`, `artist`, `is_featured`, `is_best_seller`, `user_id`) VALUES
(1, 3, 'MassKara', 'The MassKara festival’s history began with a tragic sea accident which took more than 750 people’s lives in the early 1980s. Just after the crisis, the people of Bacolod, Negros Occidental, found something to smile about and celebrate when the MassKara festival was born.', 'justnpot/images/menu/member-3menu-item-image1670123850.PNG', 1500.00, 0, 0, '2022-12-03 19:17:30', '2022-12-09 19:17:49', 'Noah Sian', 0, 1, 3),
(2, 3, 'Everyday Life', 'Huwag iisiping ikaw ay nag-iisa. Laging isipin na sa iyong pag-iisa, ay mayroong taong bukas ang mga palad upang umagapay sa iyong pangungulila', 'justnpot/images/menu/member-3menu-item-image1670124048.PNG', 2000.00, 0, 0, '2022-12-04 19:20:48', '2022-12-08 19:20:48', 'Victor Raymundo', 1, 0, 3),
(3, 4, 'Jeepney', 'Like most of us, they go out every day to earn an honest living the best way they can. A road nuisance to many, but to many more, it provides mobility. But times are changing, and the reign of the ‘king of the road” seems to be coming to an end as more practical modes of transport rapidly grow in numbers, signifying the end of an era. The jeepney is an age-old icon representing Pinoy\'s artistry and adaptability deserves to be remembered and immortalized.', 'justnpot/images/menu/member-4menu-item-image1670124310.PNG', 2500.00, 0, 0, '2022-12-05 19:20:48', '2022-12-07 19:25:10', 'Jojo Limpo', 1, 0, 4),
(4, 4, 'Pamilya', 'An idyllic life in the countryside seems even more appealing as we begin to realize that city comforts and a lot of the things that we value do not really matter, and are mostly useless in times of crisis.', 'justnpot/images/menu/member-4menu-item-image1670124369.PNG', 1800.00, 0, 0, '2022-12-06 19:20:48', '2022-12-06 19:26:09', 'Jojo Limpo', 1, 0, 3),
(5, 6, 'Life', 'The artwork depicts the pandemic in the Philippines and over a wide geographic area, which causes significant economic, social, and political disruption.  You can see the despair in the people\'s eyes.', 'justnpot/images/menu/member-5menu-item-image1670125402.PNG', 2100.00, 0, 0, '2022-12-07 19:20:48', '2022-12-05 19:43:22', 'Pado', 0, 1, 5),
(6, 6, 'Sabong', 'Cockfighting (Sabong) is a blood sport between two cocks, or gamecocks, held in a ring called a cockpit.', 'justnpot/images/menu/member-5menu-item-image1670125515.PNG', 2200.00, 0, 0, '2022-12-08 20:20:48', '2022-12-04 19:45:15', 'Pado', 1, 0, 5),
(7, 5, 'World Peace', 'An acrylic painting with a gloss varnish finish', 'justnpot/images/menu/member-5menu-item-image1670125319.PNG', 2300.00, 0, 0, '2022-12-08 19:51:59', '2022-12-03 19:41:59', 'Christian Prado', 0, 1, 5);

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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(10,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'PAYID-MOGBZXA4P660739UE771224M', 'N5TSU42LMGKEY', 'sb-la147q22067243@personal.example.com', 3800.00, 'PHP', 'approved', 1, NULL, 2, '2022-12-03 20:07:01', '2022-12-03 20:07:01');

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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `review` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` tinyint(4) DEFAULT NULL,
  `order_type` tinyint(4) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `payment_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 - Ordering, 1 - For Approval, 3 - Approved, 3 - Ready, 4 - On the way, 5 - Received, 6 - Decline, 7 - Cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `payment_type`, `order_type`, `delivery_date`, `total_amount`, `payment_reference`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, NULL, 3800.00, NULL, 1, '2022-12-03 20:07:01', '2022-12-03 20:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `transaction_id`, `menu_item_id`, `quantity`, `delivery_date`, `delivery_time`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 0, NULL, NULL, 0.00, 2, '2022-12-03 20:06:35', '2022-12-04 04:07:01'),
(2, 1, 4, 0, NULL, NULL, 0.00, 2, '2022-12-03 20:06:44', '2022-12-04 04:07:01'),
(3, NULL, 7, 0, NULL, NULL, 0.00, 2, '2023-01-11 20:20:14', '2023-01-11 20:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `mobile`, `email_verified_at`, `password`, `remember_token`, `role`, `is_active`, `status`, `image`, `is_verified`, `remarks`, `created_at`, `updated_at`, `birthdate`, `age`, `gender`) VALUES
(1, 'admin', 'admin@gmail.com', 'N/A', '000000000', NULL, '$2y$10$DnGF6NDQiyLsx.XctkbrrO6afuDLHs6RBLDIuzqr9.u8OvMQwNa1u', NULL, 1, NULL, 1, 'id-image1670117187.PNG', 1, NULL, '2022-12-03 17:26:27', '2022-12-03 17:26:27', '2022-12-04', 20, 0),
(2, 'Robert Magtalas', 'robert@gmail.com', 'Manila', '09812373184', NULL, '$2y$10$DnGF6NDQiyLsx.XctkbrrO6afuDLHs6RBLDIuzqr9.u8OvMQwNa1u', NULL, 0, NULL, 0, 'id-image1670121394.jpg', 1, NULL, '2022-12-03 18:36:34', '2022-12-03 18:36:34', '1999-02-08', 25, 0),
(3, 'Amaya Shens', 'shen@gmail.com', 'Sampaloc', '0986753184', NULL, '$2y$10$l.RvCx8sYCPKpRrANqLu5eFVZM9.xX5fhfebfphZgai8uaFSu/H2q', NULL, 2, NULL, 0, 'id-image1670124806.jpg', 1, NULL, '2022-12-03 18:36:34', '2022-12-09 21:21:55', '1999-02-08', 25, 0),
(4, 'Susan Ariola', 'susan@gmail.com', 'Poblacion', '0912233184', NULL, '$2y$10$rDnji2wJhl6SNQKmCsdfU.4JdlY9KYbo5kYYh1Ik5RBcoV7BkfDdu', NULL, 2, NULL, 0, 'id-image1670124813.jpg', 1, NULL, '2022-12-03 18:36:34', '2022-12-03 19:37:06', '1999-02-08', 25, 0),
(5, 'Ann Guzman', 'guzman@gmail.com', 'Sampaloc', '091242184', NULL, '$2y$10$eeporTNHRFo0aAXgeodY7.kxQqN1nrK9GYVZ3NoIawQ0v6Avo1K/O', NULL, 2, NULL, 0, 'id-image1670124820.jpg', 1, NULL, '2022-12-03 18:36:34', '2022-12-03 19:37:11', '1999-02-08', 25, 0);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_counts`
--
ALTER TABLE `login_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
