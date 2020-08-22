-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 20, 2020 at 01:39 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsod_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('Admin','Sub Admin') NOT NULL DEFAULT 'Admin',
  `profile_view_access` tinyint(4) NOT NULL,
  `profile_edit_access` int(11) NOT NULL,
  `profile_full_access` int(11) NOT NULL,
  `occupation_access` tinyint(4) NOT NULL DEFAULT '0',
  `sponsorship_access` tinyint(4) DEFAULT '0',
  `settlement_access` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `type`, `profile_view_access`, `profile_edit_access`, `profile_full_access`, `occupation_access`, `sponsorship_access`, `settlement_access`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'fcea920f7412b5da7be0cf42b8c93759', 'Admin', 1, 1, 1, 0, 0, 0, 1, '2020-08-11 17:00:15', '2020-08-04 10:51:20'),
(7, 'test', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 0, 0, 0, 0, 0, 0, 1, '2020-08-10 10:27:43', '2020-08-06 14:17:41'),
(8, 'steve', '827ccb0eea8a706c4c34a16891f84e7b', 'Sub Admin', 1, 1, 0, 1, 1, 1, 1, '2020-08-13 17:29:50', '2020-08-10 10:11:48'),
(9, 'tashi', 'd41d8cd98f00b204e9800998ecf8427e', 'Sub Admin', 0, 0, 0, 0, 0, 0, 0, '2020-08-11 19:42:49', '2020-08-10 10:12:19'),
(10, 'john', '827ccb0eea8a706c4c34a16891f84e7b', 'Sub Admin', 0, 0, 0, 1, 0, 1, 1, '2020-08-11 17:44:42', '2020-08-10 10:13:39'),
(11, 'mary', '827ccb0eea8a706c4c34a16891f84e7b', 'Sub Admin', 0, 0, 0, 1, 1, 1, 1, '2020-08-11 17:51:42', '2020-08-10 10:15:01'),
(13, 'testamin', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 0, 0, 0, 0, 0, 0, 1, '2020-08-11 18:28:24', '2020-08-10 10:49:56'),
(14, 'test2admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 0, 0, 0, 0, 0, 0, 1, '2020-08-11 18:46:22', '2020-08-10 10:50:50'),
(15, 'sadfsd', 'acf7ef943fdeb3cbfed8dd0d8f584731', 'Sub Admin', 0, 0, 0, 1, 1, 1, 1, '2020-08-11 18:12:37', '2020-08-10 10:53:59'),
(16, 'Sherab', '15c6d98082895abf1c20c0358aff2a67', 'Sub Admin', 1, 0, 0, 1, 1, 1, 1, '2020-08-11 18:03:30', '2020-08-11 10:47:04'),
(17, 'tsering', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 1, 1, 1, 0, 0, 0, 1, '2020-08-11 18:16:31', '2020-08-11 13:25:22'),
(18, 'tsomo', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 1, 1, 1, 0, 0, 0, 1, '2020-08-11 13:26:14', '2020-08-11 13:26:14'),
(19, 'wangdue', 'd41d8cd98f00b204e9800998ecf8427e', 'Admin', 1, 1, 1, 0, 0, 0, 1, '2020-08-11 18:15:50', '2020-08-11 16:41:25'),
(20, 'migmar', 'e10adc3949ba59abbe56e057f20f883e', 'Sub Admin', 0, 0, 0, 0, 0, 0, 1, '2020-08-11 20:04:17', '2020-08-11 20:04:17'),
(21, 'passang', 'e10adc3949ba59abbe56e057f20f883e', 'Sub Admin', 1, 1, 1, 1, 1, 1, 1, '2020-08-11 20:05:26', '2020-08-11 20:05:26'),
(22, 'Nyima', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 1, 1, 1, 0, 0, 0, 1, '2020-08-11 20:05:52', '2020-08-11 20:05:52'),
(23, 'testadmin', 'fcea920f7412b5da7be0cf42b8c93759', 'Admin', 1, 1, 1, 0, 0, 0, 0, '2020-08-13 07:42:40', '2020-08-13 07:41:12'),
(24, 'actual test', 'd41d8cd98f00b204e9800998ecf8427e', 'Admin', 1, 1, 1, 0, 0, 0, 0, '2020-08-13 07:45:07', '2020-08-13 07:43:17'),
(25, 'testing subadmin', 'd41d8cd98f00b204e9800998ecf8427e', 'Sub Admin', 0, 0, 0, 0, 0, 0, 1, '2020-08-13 07:48:29', '2020-08-13 07:48:02');

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
(3, '2020_06_25_060150_create_occupation_table', 2),
(4, '2020_06_26_090142_create_sponsorship_table', 3),
(5, '2020_06_26_093006_create_sponsorships_table', 4),
(6, '2020_06_26_093249_create_sponsorship_table', 5),
(7, '2020_06_26_093353_create_sponsorship_table', 6),
(11, '2020_06_29_062258_create_settlement_table', 7),
(12, '2020_07_03_043858_create_main_table', 7),
(13, '2020_07_03_061131_create_profiles_table', 8),
(14, '2020_07_03_084119_create_profiles_table', 9),
(16, '2020_07_03_085055_create_profiles_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE `occupations` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`id`, `parent_id`, `name`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Student', 1, NULL, '2020-06-26 01:01:10', '2020-08-11 12:15:10'),
(7, 0, 'test', 1, NULL, '2020-06-26 04:44:05', '2020-08-10 11:55:02'),
(9, 0, 'Monk', 1, NULL, '2020-07-20 01:47:07', '2020-07-20 01:47:07'),
(10, 0, 'Nun', 1, NULL, '2020-07-20 01:47:14', '2020-07-20 01:47:14'),
(11, 0, 'SFF', 1, NULL, '2020-07-20 01:47:23', '2020-07-20 01:47:23'),
(14, 0, 'Others', 1, NULL, '2020-07-20 23:55:12', '2020-07-20 23:55:12');

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('M','F','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M',
  `dob` date NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gbno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rcno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passportno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation_id` int(11) DEFAULT NULL,
  `sponsorship_id` int(11) DEFAULT NULL,
  `settlement_id` int(11) DEFAULT NULL,
  `person_group` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `person_name`, `gender`, `dob`, `fname`, `mname`, `gbno`, `rcno`, `passportno`, `occupation_id`, `sponsorship_id`, `settlement_id`, `person_group`, `image`, `created_at`, `updated_at`) VALUES
(17, 'Sherab', 'M', '2020-07-15', 'Tashi', 'Rinzin', 'g45', 'rc34', 'p12', 9, 5, 4, 4, '30522.jpg', '2020-07-28 01:17:14', '2020-08-11 11:25:36'),
(18, 'Gyatso', 'M', '2020-07-31', 'gfather', 'gmother', 'g234', 'rc234', 'ps342', 1, 4, 10, 3, '38225.png', '2020-06-10 23:36:32', '2020-08-11 12:23:34'),
(19, 'Tashi', 'M', '2020-07-02', 'tshif', 'tashm', 'tash234', 'tahd2', 'tahds23', 9, 5, 4, 4, '71103.png', '2020-07-30 03:26:29', '2020-07-31 04:07:20'),
(20, 'Dolma', 'F', '2020-07-10', 'dolma dad', 'dolma mom', 'doldb23', 'dolrc324', 'dolpa234', 14, 5, 39, 5, '88274.jpg', '2020-07-31 11:54:42', '2020-07-31 11:54:42'),
(21, 'Sam', 'M', '2019-07-15', 'sam father', 'sam mother', 'samgb3', 'samrc3', 'samps3', 14, 6, 7, 4, '80013.jpg', '2019-10-07 18:30:00', '2020-08-02 22:39:01'),
(22, 'chokden', 'M', '2010-02-01', 'chok father', 'chok mother', 'gh34', 'chok3r', 'cokp234', 1, 5, 62, 1, '19939.png', '2019-11-04 22:21:33', '2020-08-10 22:21:33'),
(23, 'Rinzin', 'M', '2002-01-10', 'rin father', 'rin mother', 'ring324', 'rinrc324', 'rinpas234', 1, NULL, 6, 2, '95845.png', '2020-08-11 03:26:09', '2020-08-11 03:37:27'),
(24, 'Kunga', 'M', '2003-01-10', 'kun father', 'kun mohter', 'kungnb34', 'kunrc234', 'kunpas34', 1, 5, 4, 1, '53557.png', '2020-06-08 04:10:42', '2020-08-11 04:10:42'),
(25, 'Sam', 'M', '2020-07-30', 'sam fath', 'sam moth', 'samgb324', 'samrc34', 'samps324', 0, 0, 0, 2, '2305.png', '2020-08-11 04:11:33', '2020-08-11 04:11:33'),
(26, 'kunga chon', 'F', '2019-08-20', 'kunhc father', 'kunch mother', 'kunchgb324', 'kunchrc234', 'kunchpa234', 14, 0, 0, 0, '53695.png', '2020-08-11 04:35:21', '2020-08-19 08:37:31'),
(27, 'Tenzin Tsering', 'M', '2020-07-29', 'ten father', 'ten mother', 'tnegb23', 'tenrcrere23', 'tenpas34', 0, 0, 0, 0, '88675.png', '2020-08-11 07:59:48', '2020-08-11 07:59:48'),
(28, 'Tsultrim', 'M', '2020-08-01', 'tsul father', 'tsul mother', 'tsulgb234', 'tsurc234', 'tsulp23', 9, 6, 13, 0, '31385.png', '2020-08-11 12:24:30', '2020-08-11 12:24:49'),
(29, 'Passang', 'M', '2020-08-07', 'pss father', 'pass mother', 'passgb234', 'pssrc234', 'passpa24', 0, 0, 0, 0, '90527.jpg', '2020-08-13 01:50:06', '2020-08-13 01:50:06'),
(30, 'Trinlay', 'M', '2020-08-09', 'thinl Father', 'thin mother', 'thingb2', 'thinrc321', 'thinpas3423', 1, 4, 4, 6, '98568.png', '2020-08-13 01:55:11', '2020-08-13 02:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `settlements`
--

CREATE TABLE `settlements` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settlements`
--

INSERT INTO `settlements` (`id`, `parent_id`, `name`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 0, 'BIR', 1, NULL, NULL, '2020-08-11 12:22:03'),
(6, 0, 'CHAUNTRA', 1, NULL, NULL, NULL),
(7, 0, 'CLEMEN TOWN', 1, NULL, NULL, NULL),
(8, 0, 'DALHOUSIE', 1, NULL, NULL, NULL),
(9, 0, 'DEHRADUN', 1, NULL, NULL, NULL),
(10, 0, 'DEKYILING', 1, NULL, NULL, NULL),
(13, 0, 'DHOLANJI', 1, NULL, NULL, NULL),
(14, 0, 'GONDIA', 1, NULL, NULL, NULL),
(15, 0, 'GOPALPUR', 1, NULL, NULL, NULL),
(16, 0, 'KULLU', 1, NULL, NULL, NULL),
(17, 0, 'HUNSUR', 1, NULL, NULL, NULL),
(18, 0, 'KANGRA', 1, NULL, NULL, NULL),
(19, 0, 'KOLLEGAL', 1, NULL, NULL, NULL),
(20, 0, 'CHOGLAMSAR', 1, NULL, NULL, NULL),
(21, 0, 'LAKHANWALA', 1, NULL, NULL, NULL),
(22, 0, 'MAINPAT', 1, NULL, NULL, NULL),
(23, 0, 'MANALI', 1, NULL, NULL, NULL),
(24, 0, 'MANDI', 1, NULL, NULL, NULL),
(25, 0, 'MIAO', 1, NULL, NULL, NULL),
(26, 0, 'MUNDGOD', 1, NULL, NULL, NULL),
(27, 0, 'MUSSOORIE', 1, NULL, NULL, NULL),
(28, 0, 'NAINITAL', 1, NULL, NULL, NULL),
(29, 0, 'OOTY', 1, NULL, NULL, NULL),
(30, 0, 'PANDOH', 1, NULL, NULL, NULL),
(31, 0, 'PAONTA SAHIB', 1, NULL, NULL, NULL),
(32, 0, 'PATHLIKUL', 1, NULL, NULL, NULL),
(33, 0, 'PURUWALA', 1, NULL, NULL, NULL),
(34, 0, 'RAJPUR', 1, NULL, NULL, NULL),
(35, 0, 'RAVANGLA', 1, NULL, NULL, NULL),
(36, 0, 'SAHARANPUR', 1, NULL, NULL, NULL),
(37, 0, 'SATAUN', 1, NULL, NULL, NULL),
(38, 0, 'SHILLONG', 1, NULL, NULL, NULL),
(39, 0, 'SHIMLA', 1, NULL, NULL, NULL),
(40, 0, 'SIRMOUR', 1, NULL, NULL, NULL),
(41, 0, 'SOLAN', 1, NULL, NULL, NULL),
(42, 0, 'SUJA', 1, NULL, NULL, NULL),
(43, 0, 'TASHI JONG', 1, NULL, NULL, NULL),
(44, 0, 'TENZIN GANG', 1, NULL, NULL, NULL),
(45, 0, 'TEZU', 1, NULL, NULL, NULL),
(46, 0, 'TUTING', 1, NULL, NULL, NULL),
(47, 0, 'VARANASI', 1, NULL, NULL, NULL),
(48, 0, 'CHENNAI', 1, NULL, NULL, NULL),
(49, 0, 'DARJEELING', 1, NULL, NULL, NULL),
(50, 0, 'GANGTOK', 1, NULL, NULL, NULL),
(51, 0, 'KALIMPONG', 1, NULL, NULL, NULL),
(52, 0, 'HENLEY - LADAKH', 1, NULL, NULL, NULL),
(53, 0, 'MANDUWALA', 1, NULL, NULL, NULL),
(54, 0, 'MUSSOORIE', 1, NULL, NULL, NULL),
(55, 0, 'MYSORE', 1, NULL, NULL, NULL),
(56, 0, 'PRATAPGARH', 1, NULL, NULL, NULL),
(57, 0, 'SUNDER NAGAR', 1, NULL, NULL, NULL),
(58, 0, 'NILGIRIS', 1, NULL, NULL, NULL),
(59, 0, 'TAWANG', 1, NULL, NULL, NULL),
(60, 0, 'TINDOLING', 1, NULL, NULL, NULL),
(61, 0, 'CHAMUNDA', 1, NULL, NULL, NULL),
(62, 0, 'MUMBAI', 1, NULL, NULL, NULL),
(63, 0, 'GURGAON', 1, NULL, NULL, NULL),
(64, 0, 'DHARAMSALA CANTT', 1, NULL, NULL, NULL),
(65, 0, 'CHANDIGARH', 1, NULL, NULL, NULL),
(66, 0, 'VADODARA', 1, NULL, NULL, NULL),
(67, 0, 'MANGALORE', 1, NULL, NULL, NULL),
(68, 0, 'BODH GAYA', 1, NULL, NULL, NULL),
(69, 0, 'AMBALA', 1, NULL, NULL, NULL),
(70, 0, 'HYDERABAD', 1, NULL, NULL, NULL),
(71, 0, 'SALUGARA', 1, NULL, NULL, NULL),
(72, 0, 'SANJOULI', 1, NULL, NULL, NULL),
(73, 0, 'CHANGLANG', 1, NULL, NULL, NULL),
(74, 0, 'CHANDAGIRI', 1, NULL, NULL, NULL),
(75, 0, 'CHAMRAJNANAGAR', 1, NULL, NULL, NULL),
(76, 0, 'CHAMBA', 1, NULL, NULL, NULL),
(77, 0, 'PHUNTSOKLING', 1, NULL, NULL, NULL),
(78, 0, 'SARNATH', 1, NULL, NULL, NULL),
(79, 0, 'KAMRAO', 1, NULL, NULL, NULL),
(80, 0, 'NAGALAND', 1, NULL, NULL, NULL),
(81, 0, 'KOLKATA', 1, NULL, NULL, NULL),
(82, 0, 'BHOPAL', 1, NULL, NULL, NULL),
(83, 0, 'PUNE', 1, NULL, NULL, NULL),
(84, 0, 'PUNDUCHERRY', 1, NULL, NULL, NULL),
(85, 0, 'KATHMANDU', 1, NULL, NULL, NULL),
(86, 0, 'TIBET', 1, NULL, NULL, NULL),
(87, 0, 'GOA', 1, NULL, NULL, NULL),
(88, 0, 'LUDHIANA', 1, NULL, NULL, NULL),
(89, 0, 'KALAPATHER', 1, NULL, NULL, NULL),
(90, 0, 'BOMDIA', 1, NULL, NULL, NULL),
(91, 0, 'NEW YORK', 1, NULL, NULL, NULL),
(92, 0, 'MOSCOW', 1, NULL, NULL, NULL),
(93, 0, 'WIEN', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsorships`
--

CREATE TABLE `sponsorships` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsorships`
--

INSERT INTO `sponsorships` (`id`, `parent_id`, `name`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 0, 'Nyamthak', 1, NULL, '2020-06-26 04:13:35', '2020-08-11 08:01:39'),
(5, 0, 'Day Family', 1, NULL, '2020-07-31 03:25:33', '2020-07-31 04:04:40'),
(6, 0, 'The HOME Family', 1, NULL, '2020-08-01 06:18:31', '2020-08-01 06:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sherab', 'sherab@gmail.com', '$2y$10$7ZkAgYZEdCxeP0jT6v0JUubpOe1tWgD2cGjhp69PuLkvzS/B.1my.', 1, 'yytDtgjapGngEHjgSglgwXSAMjH8dIJ2LovnYWHXgL95Du87dT2krKOQmgeP', '2020-06-22 05:19:58', '2020-06-25 00:12:11'),
(2, 'test', 'test@gmail.com', '$2y$10$ydWpXOGDm0iUeiErelB55.7qipXxCWMQxi5.kToxN/hvXjnXVYLf.', NULL, 'z9QFzxikCFPR8nnl9IHZWler7j2wIvcaTFauCPl1umDmqZIBK8v0BKdDkxml', '2020-06-22 22:47:11', '2020-06-22 22:47:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupations`
--
ALTER TABLE `occupations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_gbno_unique` (`gbno`),
  ADD UNIQUE KEY `profiles_rcno_unique` (`rcno`),
  ADD UNIQUE KEY `profiles_passportno_unique` (`passportno`);

--
-- Indexes for table `settlements`
--
ALTER TABLE `settlements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsorships`
--
ALTER TABLE `sponsorships`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `occupations`
--
ALTER TABLE `occupations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `settlements`
--
ALTER TABLE `settlements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `sponsorships`
--
ALTER TABLE `sponsorships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
