-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 06:41 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `documentmanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@streamy.in', '!@#$%@LIVE', '', '', ''),
(2, 'sanjay', 'client@streamy.in', '1212121212', 'admin', '2021-12-03 11:27:34', '2021-12-03 11:27:34');

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
(16, '2021_12_01_123008_create_tbl_employee_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(18, '2021_12_02_055638_create_tbl_document_table', 2),
(19, '2021_12_09_103826_create_tbl_vcategory_table', 3),
(20, '2021_12_10_132903_create_vendors_table', 4);

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
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'test', '2021-12-18 05:27:25', '2021-12-18 05:27:25'),
(2, ',,m', '2021-12-18 05:27:44', '2021-12-18 05:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE `tbl_document` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tm_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_document`
--

INSERT INTO `tbl_document` (`id`, `tm_id`, `cat_id`, `event_id`, `name`, `file`, `status`, `created_at`, `updated_at`) VALUES
(7, '2', '5', '2', 'sanjay', '16397291451.mp4', '1', '2021-12-17 02:49:05', '2021-12-17 02:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access` int(11) DEFAULT 1,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `email`, `password`, `role`, `access`, `status`, `created_at`, `updated_at`) VALUES
(2, 'sanjay yadav', 'sanjay@gmail.com', '1212121212', 'team', 2, '1', '2021-12-01 07:06:09', '2021-12-22 05:35:15'),
(3, 'sanjay gg', 'sanjayasa@gmail.com', '0000000000', 'team', 1, '1', '2021-12-02 00:18:52', '2021-12-06 06:43:55'),
(4, 'AAA', 'aaa@gmail.com', 'QW!@QW!@QW', 'team', 0, '0', '2021-12-03 05:33:43', '2021-12-03 05:33:43'),
(5, 'S K', 'sk@gmail.com', '12211221', 'team', 2, '1', '2021-12-03 05:58:27', '2021-12-14 00:56:50'),
(6, 'S K', 'sk@gmail.com', '12211221', 'team', 2, '1', '2021-12-03 05:58:27', '2021-12-14 00:56:50'),
(7, 'sanjay gg', 'sanjayasa@gmail.com', '0000000000', 'team', 1, '1', '2021-12-02 00:18:52', '2021-12-06 06:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id`, `name`, `date`, `type`, `status`, `created_at`, `updated_at`) VALUES
(2, 'MAX', '2021-12-05', 'Other', '10', '2021-12-01 02:37:38', '2021-12-06 01:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `p_user_id` int(11) NOT NULL,
  `v_id` varchar(255) NOT NULL,
  `pcat_id` varchar(255) NOT NULL,
  `p_service` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `payment_term` varchar(255) NOT NULL,
  `p_remark` text NOT NULL,
  `p_file` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `p_user_id`, `v_id`, `pcat_id`, `p_service`, `p_price`, `payment_term`, `p_remark`, `p_file`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, '3', '4', '3', '100', 'Day 15', 'bnb', '16407138151.png', 1, '2021-12-28 23:20:15', '2021-12-28 23:20:30'),
(10, 1, '8', '7', '4', '121212', 'Day 30', 'nbhj', '16407138761.png', 1, '2021-12-28 23:21:16', '2021-12-28 23:21:25'),
(11, 3, '1', '5', '3', '900', 'Day 30', 'nbh', '16407139991.png', 1, '2021-12-28 23:23:19', '2021-12-28 23:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productivity`
--

CREATE TABLE `tbl_productivity` (
  `p_id` int(20) UNSIGNED NOT NULL,
  `p_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access` int(11) DEFAULT 1,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_productivity`
--

INSERT INTO `tbl_productivity` (`p_id`, `p_name`, `p_email`, `p_password`, `role`, `access`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sanjay yadav a', 'sanjay@gmail.com', '0000000000', 'vendor', 1, '1', '2021-12-09 07:20:21', '2021-12-28 17:49:54'),
(3, 'Sanjeet', 'aky@gmail.com', '11', 'vendor', 1, '1', '2021-12-10 02:01:04', '2021-12-28 17:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vcat`
--

CREATE TABLE `tbl_vcat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vcat`
--

INSERT INTO `tbl_vcat` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'test3', '2021-12-10 00:13:36', '2021-12-10 06:32:36'),
(4, 'aaa', '2021-12-10 01:58:19', '2021-12-10 01:58:19'),
(5, 'good', '2021-12-10 01:58:31', '2021-12-10 01:58:31'),
(6, 'sanjay', '2021-12-10 06:32:25', '2021-12-10 06:32:25'),
(7, 'asas', '2021-12-10 06:34:54', '2021-12-10 06:34:54'),
(8, 'test34', '2021-12-10 06:35:05', '2021-12-10 06:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `evt_id` int(11) NOT NULL,
  `vcat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`id`, `p_id`, `evt_id`, `vcat_id`, `company_name`, `contact_no`, `email`, `mobile_no`, `city`, `country`, `website`, `gst_no`, `pan_no`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '5', 'Noida One', 'k99', 'sanjay@gmail.com', '9999999999', 'Noida', 'India', 'aaa.com', 'asqsq112', 'jhhj87hhjh', 'aasas', '0', '2021-12-20 04:57:37', '2021-12-20 04:57:37'),
(2, 1, 2, '5', 'Noida One two', 'k99', 'sanjay1@gmail.com', '9999999999', 'Noida', 'India', 'aaa.com', 'asqsq112', 'jhhj87hhjp', 'asas', '0', '2021-12-20 04:58:51', '2021-12-20 04:58:51'),
(3, 1, 2, '4', 'Noida One two', 'k99', 'sanjay2@gmail.com', '9999999999', 'Noida', 'India', 'aaa.com', 'asqsq112', 'jhhj87hhji', 'asas', '0', '2021-12-20 04:59:26', '2021-12-20 04:59:26'),
(4, 1, 2, '5', 'Noida One One', 'k99', 'sanjay3@gmail.com', '9999999999', 'Noida', 'India', 'aaa.com', 'aaaa', 'jhhj87hhee', 'asasa', '0', '2021-12-21 00:56:02', '2021-12-21 00:56:02'),
(5, 1, 2, '4', 'Noida One One', 'k99', 'sanjayv@gmail.com', '9999999999', 'Noida', 'India', 'aaa.com', 'asqsq112', 'jhhj87vvvv', ',mm,kl', '0', '2021-12-21 01:59:41', '2021-12-21 01:59:41'),
(6, 1, 2, '5', 'NN', 'k99', 'admin@streamy.in', '9999999999', 'Noida', 'India', 'aaa.com', 'hjhj87', 'bhj7898988', 'asas', '0', '2021-12-21 06:27:34', '2021-12-21 06:27:34'),
(7, 1, 2, '4', 'Noida', 'k99', 'sanjayas@gmail.com', '9999999999', 'Noida', 'India', 'aaa.com', 'uasa', 'bhj789898f', 'asas', '0', '2021-12-27 12:16:58', '2021-12-27 12:16:58'),
(8, 1, 2, '7', 'Delhi', '9898', 'sanjayq1@gmail.com', '9999999999', 'Noida', 'India', 'aaa.com', 'asqsq112', 'bhj7898912', 'aqws', '0', '2021-12-27 12:25:42', '2021-12-27 12:25:42'),
(9, 1, 2, '6', 'Noida', 'k99', 'sanjayasq@gmail.com', '9999999999', 'Noida', 'India', 'aaa.com', 'mm', 'bhj7898111', 'asas', '0', '2021-12-27 12:31:24', '2021-12-27 12:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vservice`
--

CREATE TABLE `tbl_vservice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_vservice`
--

INSERT INTO `tbl_vservice` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'A', '2021-12-10 06:25:02', '2021-12-10 06:25:02'),
(4, 'B', '2021-12-10 06:25:02', '2021-12-10 06:25:02');

-- --------------------------------------------------------

--
-- Stand-in structure for view `totaldoc`
-- (See below for the actual view)
--
CREATE TABLE `totaldoc` (
`name` varchar(255)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `totaldoc`
--
DROP TABLE IF EXISTS `totaldoc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totaldoc`  AS SELECT `tbl_employee`.`name` AS `name`, count(`tbl_document`.`tm_id`) AS `total` FROM (`tbl_document` left join `tbl_employee` on(`tbl_document`.`tm_id` = `tbl_employee`.`id`)) GROUP BY `tbl_document`.`tm_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_productivity`
--
ALTER TABLE `tbl_productivity`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_vcat`
--
ALTER TABLE `tbl_vcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vservice`
--
ALTER TABLE `tbl_vservice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_document`
--
ALTER TABLE `tbl_document`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_productivity`
--
ALTER TABLE `tbl_productivity`
  MODIFY `p_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_vcat`
--
ALTER TABLE `tbl_vcat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_vservice`
--
ALTER TABLE `tbl_vservice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
