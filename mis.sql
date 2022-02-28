-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2021 at 08:32 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `icon`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Fasteners 100', '1630084083_download.png', NULL, '2021-05-08 15:17:53', '2021-08-27 11:38:03'),
(2, 'test', '1620535535_M3301090000.jpg', '2021-05-09 04:45:42', '2021-05-09 04:45:35', '2021-05-09 04:45:42'),
(3, 'Materials', NULL, NULL, '2021-05-10 12:55:19', '2021-05-10 12:55:19'),
(4, 'Test', NULL, '2021-08-25 12:12:22', '2021-08-25 12:10:03', '2021-08-25 12:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `childcategory`
--

CREATE TABLE `childcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parentcategory_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `childcategory`
--

INSERT INTO `childcategory` (`id`, `name`, `parentcategory_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'pan head screw', 1, NULL, '2021-05-08 15:36:22', '2021-05-08 15:36:22'),
(2, 'Configurable Plates', 2, NULL, '2021-05-10 12:59:25', '2021-05-10 12:59:25'),
(3, 'Flush type', 21, '2021-08-17 06:58:41', '2021-07-06 07:30:15', '2021-08-17 06:58:41'),
(4, 'Large flange', 21, '2021-08-17 06:58:18', '2021-07-06 07:30:44', '2021-08-17 06:58:18'),
(5, 'Counter Sunk', 21, '2021-08-17 06:58:15', '2021-07-06 07:31:01', '2021-08-17 06:58:15'),
(6, 'Flush type', 22, '2021-08-17 06:58:12', '2021-07-06 07:31:16', '2021-08-17 06:58:12'),
(7, 'Large flange', 22, '2021-08-17 06:58:09', '2021-07-06 07:31:26', '2021-08-17 06:58:09'),
(8, 'Counter Sunk', 22, '2021-08-17 06:58:05', '2021-07-06 07:31:40', '2021-08-17 06:58:05'),
(9, 'Dome Head', 13, NULL, '2021-08-17 07:30:30', '2021-08-17 07:30:30'),
(10, 'Large flange', 23, NULL, '2021-08-17 09:18:26', '2021-08-17 09:18:26'),
(11, 'Cage nut', 24, NULL, '2021-08-18 08:15:40', '2021-08-18 08:15:40'),
(12, 'Weld Stud', 25, NULL, '2021-08-18 08:26:46', '2021-08-18 08:26:46'),
(13, 'CSK Head', 16, NULL, '2021-08-18 09:20:14', '2021-08-18 09:20:14'),
(14, 'Large flange', 12, NULL, '2021-08-24 16:35:33', '2021-08-24 16:35:33'),
(15, 'Large flange demo', 12, NULL, '2021-08-30 06:41:58', '2021-08-30 06:41:58'),
(16, 'Large flange dem123', 12, NULL, '2021-08-30 07:12:49', '2021-08-30 07:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `customer_userid` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `customer_password` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `otp_code` int(11) DEFAULT NULL,
  `phone_number` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `customer_type` tinyint(1) DEFAULT 1,
  `company_institution` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `company_gstno` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `newsletter` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL,
  `hash` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `customer_code` bigint(20) NOT NULL,
  `customer_photo` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `customer_name`, `customer_userid`, `customer_password`, `email_address`, `otp_code`, `phone_number`, `address`, `last_login_at`, `is_active`, `customer_type`, `company_institution`, `company_gstno`, `newsletter`, `created_at`, `modified_at`, `hash`, `customer_code`, `customer_photo`) VALUES
(1, 'Kannan Paranthaman', 'kannanlabs@gmail.com', '123456', 'kannanlabs@gmail.com', NULL, '8870545820', '', NULL, 1, 1, 'IIPL', 'IIPL1234', 0, '2021-06-05 07:46:45', NULL, '32c6ec664dc4a9c76ef21a4deab00901', 1001, 'uploads/142506897_429536801425761_2473238082128317885_n.jpg'),
(2, 'Kannan Paranthaman', 'clicktokannan@yahoo.in', '123456789', 'clicktokannan@yahoo.in', NULL, '8870545820', '', NULL, 0, 1, '', '', 0, '2021-06-05 07:57:24', NULL, 'cc68e501e39a1ce6a4614e49877ced5e', 1002, ''),
(3, 'kkk', 'kk@gmail.com', 'kk@gmail.com', 'kk@gmail.com', NULL, '9876543210', '', NULL, 0, 1, '', '', 0, '2021-06-17 10:06:28', NULL, '089997d94e3b73aac3839d9543dd0ca2', 1002, ''),
(4, 'Solomon', 'slmn5900', 'Welcome@100', 'slmn5900@gmail.com', NULL, '9884113386', '', NULL, 1, 1, '', '', 0, '2021-06-17 10:37:18', NULL, '273cad15cd7949ce0db59a72b8bf4062', 1002, ''),
(5, 'Webdads', 'webdads2u', 'webdad@100', 'solomon@webdads2u.com', NULL, '9884113386', '', NULL, 1, 1, '', '', 0, '2021-06-17 10:44:50', NULL, '82a05223d2eb9e27e96d32f06eada85f', 1003, ''),
(6, 'Kiran', 'kiran123', '654321', 'marketing@bumaas.com', NULL, '8610129168', '', NULL, 1, 1, 'Bumaas', '122', 0, '2021-07-02 06:44:21', NULL, '10b3eedb7736255a42857450b3f233ea', 1004, NULL),
(7, 'Ratheesh', 'kur1', '123456', 'kur@bumaas.com', NULL, '9444441068', '', NULL, 1, 1, '', '', 0, '2021-07-02 07:13:47', NULL, '2e99aa738fe06905903d57c980d0ee63', 1005, NULL),
(8, 'solomon', 'solomon', 'Welcome@100', 'cslmn5900@gmail.com', NULL, '9884113386', '', NULL, 1, 1, 'webdads', '', 0, '2021-08-17 06:24:23', NULL, '30df90be7a3fdeb106bb0ebc477416f7', 1006, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_01_123149_create_category_table', 1),
(5, '2021_05_01_130113_create_subcategory_table', 1),
(6, '2021_05_01_140506_create_parentcategory_table', 1),
(7, '2021_05_01_140737_create_childcategory_table', 1),
(8, '2021_05_01_140841_create_product_table', 1),
(9, '2021_05_01_155637_create_product_part_number_table', 1),
(10, '2021_05_02_035516_create_specification_table', 1),
(11, '2021_05_02_035535_create_specification_type_table', 1),
(12, '2021_05_02_120900_create_product_specification_table', 1),
(13, '2021_05_02_122903_create_productpartnumber_specification_table', 1),
(14, '2021_06_27_070958_add_icon_to_parentcategory_table', 2),
(15, '2021_06_27_134029_add_icon_to_product_part_number_table', 2),
(16, '2021_07_23_171306_create_partnofields_table', 3),
(17, '2021_08_30_044741_create_partno_filters_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_postalcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_discount` int(11) NOT NULL DEFAULT 0,
  `billing_discount_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_subtotal` int(11) NOT NULL,
  `billing_tax` int(11) NOT NULL,
  `billing_total` int(11) NOT NULL,
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'stripe',
  `shipped` tinyint(1) NOT NULL DEFAULT 0,
  `error` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_email`, `billing_name`, `billing_address`, `billing_city`, `billing_province`, `billing_postalcode`, `billing_phone`, `billing_name_on_card`, `billing_discount`, `billing_discount_code`, `billing_subtotal`, `billing_tax`, `billing_total`, `payment_gateway`, `shipped`, `error`, `created_at`, `updated_at`) VALUES
(1, 61, 'hari95nn@gmail.com', 'hari', 'chennai', 'chennai', 'gd', '345435', '9080998766', 'hari', 0, '0', 41, 0, 41, 'stripe', 0, NULL, '2021-09-11 11:37:01', '2021-09-11 11:37:01'),
(2, 61, 'hari95nn@gmail.com', 'hari', 'chennai', 'chennai', 'gd', '345435', '9080998766', 'hari', 0, '0', 41, 0, 41, 'stripe', 0, NULL, '2021-09-11 11:40:01', '2021-09-11 11:40:01'),
(3, 61, 'hari95nn@gmail.com', 'hari', 'chennai', 'chennai', 'gd', '345435', '9080998766', 'hari', 0, '0', 41, 0, 41, 'stripe', 0, NULL, '2021-09-11 11:40:54', '2021-09-11 11:40:54'),
(4, 61, 'hari95nn@gmail.com', 'hari', 'chennai', 'chennai', 'gd', '345435', '9080998766', 'hari', 0, '0', 41, 0, 41, 'stripe', 0, NULL, '2021-09-11 11:41:06', '2021-09-11 11:41:06'),
(5, 61, 'hari95nn@gmail.com', 'hari', 'chennai', 'chennai', 'gd', '345435', '9080998766', 'hari', 0, '0', 41, 0, 41, 'stripe', 0, NULL, '2021-09-11 11:41:34', '2021-09-11 11:41:34'),
(6, 61, 'hari95nn@gmail.com', 'hari', 'chennai', 'chennai', 'gd', '345435', '9080998766', 'hari', 0, '0', 41, 0, 41, 'stripe', 0, NULL, '2021-09-11 11:42:19', '2021-09-11 11:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `product_id`, `order_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 3, '2021-09-11 11:37:02', '2021-09-11 11:37:02'),
(2, 9, 2, 3, '2021-09-11 11:40:01', '2021-09-11 11:40:01'),
(3, 9, 3, 3, '2021-09-11 11:40:54', '2021-09-11 11:40:54'),
(4, 9, 4, 3, '2021-09-11 11:41:06', '2021-09-11 11:41:06'),
(5, 9, 5, 3, '2021-09-11 11:41:34', '2021-09-11 11:41:34'),
(6, 9, 6, 3, '2021-09-11 11:42:19', '2021-09-11 11:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `parentcategory`
--

CREATE TABLE `parentcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parentcategory`
--

INSERT INTO `parentcategory` (`id`, `name`, `subcategory_id`, `deleted_at`, `created_at`, `updated_at`, `icon`, `description`) VALUES
(1, 'Cross Recessed bolts', 1, NULL, '2021-05-08 15:35:57', '2021-08-23 11:14:50', '1624811425_M3301110000.jpg', NULL),
(2, 'Material Plates, Blocks', 1, NULL, '2021-05-10 12:58:53', '2021-06-27 16:34:27', '1624811667_M3301090000.jpg', NULL),
(3, 'Self Tapping Screws, Taptite High Tech Screws', 1, NULL, '2021-06-27 16:34:43', '2021-06-27 16:34:43', '1624811683_M3301070000.jpg', NULL),
(4, 'Space Saving Bolts', 1, NULL, '2021-06-27 16:34:54', '2021-06-27 16:34:54', '1624811694_M3301180000.jpg', NULL),
(5, 'Small Screws', 1, NULL, '2021-06-27 16:35:08', '2021-06-27 16:35:08', '1624811708_M3301170000.jpg', NULL),
(6, 'Screws with Through Hole', 1, NULL, '2021-06-27 16:35:21', '2021-06-27 16:35:21', '1624811721_M3301150000.jpg', NULL),
(7, 'Hex Socket Button Head Cap Screws', 1, NULL, '2021-06-27 16:35:36', '2021-06-27 16:35:36', '1624811736_M3301140000.jpg', NULL),
(8, 'Hex Socket Flat Head Cap Screws', 1, NULL, '2021-06-27 16:35:49', '2021-06-27 16:35:49', '1624811749_221006184363.jpg', NULL),
(9, 'SB GRIP', 3, NULL, '2021-07-06 05:01:35', '2021-08-18 16:39:51', '1629304791_aa.jpg', NULL),
(10, 'Seal GRIP', 3, NULL, '2021-07-06 05:05:18', '2021-08-18 16:41:00', '1629304860_aa.jpg', NULL),
(11, 'Bulb GRIP', 3, NULL, '2021-07-06 05:05:51', '2021-08-18 16:41:18', '1629304878_aa.jpg', NULL),
(12, 'Multi GRIP', 3, NULL, '2021-07-06 05:06:22', '2021-07-06 05:06:22', NULL, NULL),
(13, 'HL GRIP', 3, NULL, '2021-07-06 05:06:35', '2021-07-06 05:06:35', NULL, NULL),
(14, 'HF GRIP', 3, NULL, '2021-07-06 05:06:46', '2021-07-06 05:06:46', NULL, NULL),
(15, 'Ultralok GRIP', 3, NULL, '2021-07-06 05:07:09', '2021-07-06 05:07:09', NULL, NULL),
(16, 'Monolok GRIP', 3, NULL, '2021-07-06 05:07:25', '2021-07-06 05:07:25', NULL, NULL),
(17, 'Trifold GRIP', 3, NULL, '2021-07-06 05:07:38', '2021-07-06 05:07:38', NULL, NULL),
(18, 'Peel GRIP', 3, NULL, '2021-07-06 05:07:53', '2021-07-06 05:07:53', NULL, NULL),
(19, 'Grooved GRIP', 3, NULL, '2021-07-06 05:08:07', '2021-07-06 05:08:07', NULL, NULL),
(20, 'Bolt GRIP', 3, NULL, '2021-07-06 05:08:20', '2021-07-06 05:08:20', NULL, NULL),
(21, 'Open GRIP Rivetnut', 4, NULL, '2021-07-06 07:29:12', '2021-07-06 07:29:12', NULL, NULL),
(22, 'Closed GRIP Rivetnut', 4, NULL, '2021-07-06 07:29:31', '2021-07-06 07:29:31', NULL, NULL),
(23, 'Splined', 4, NULL, '2021-08-17 09:17:41', '2021-08-17 09:17:41', NULL, NULL),
(24, 'Cage nut', 5, NULL, '2021-08-18 08:15:23', '2021-08-18 08:15:23', NULL, NULL),
(25, 'Weld Stud', 6, NULL, '2021-08-18 08:26:28', '2021-08-18 08:26:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partnofields`
--

CREATE TABLE `partnofields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `_label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `_status` int(11) NOT NULL,
  `product_part_number_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partnofields`
--

INSERT INTO `partnofields` (`id`, `_label`, `_value`, `_status`, `product_part_number_id`, `created_at`, `updated_at`) VALUES
(6, 'Dome Head Stl/stl 6.4x19mm HL GRIP Rivet', '5.89', 1, 8, '2021-08-17 09:09:19', '2021-08-17 09:09:19'),
(27, 'Dome Head SS/SS Black 3.2x7mm GRIP Rivet', '51567.50', 0, 27, '2021-08-24 06:48:07', '2021-08-24 06:48:07'),
(28, 'Dome Head SS/SS Black 3.2x7mm GRIP Rivet', '51567.50', 0, 28, '2021-08-24 07:03:22', '2021-08-24 07:03:22'),
(30, 'Dome Head Stl/Stl 6.4x24.5mm HF GRIP Rivet', '50209.92', 0, 30, '2021-08-24 07:27:28', '2021-08-24 07:27:28'),
(31, 'Dome Head Alu/Alu 4x18mm Trifold GRIP Rivets', '49568.10', 0, 31, '2021-08-24 07:43:10', '2021-08-24 07:43:10'),
(32, 'Dome Head Alu/stl 4.8x30mm Sealed GRIP Rivet', '48063.84', 0, 32, '2021-08-24 07:58:36', '2021-08-24 07:58:36'),
(33, 'Dome Head SS/SS 3.2x10mm GRIP Rivet', '46941.28', 0, 33, '2021-08-24 08:06:43', '2021-08-24 08:06:43'),
(34, 'Dome Head Stl/Stl 4.8x20mm Multi GRIP Rivet', '42480.00', 0, 34, '2021-08-24 08:19:11', '2021-08-24 08:19:11'),
(35, 'Dome Head SS/SS 3.2x7mm GRIP Rivets', '40875.00', 0, 35, '2021-08-24 08:24:55', '2021-08-24 08:24:55'),
(36, 'Dome Head SS/Steel 4x16mm GRIP Rivets', '37467.64', 0, 36, '2021-08-24 09:05:33', '2021-08-24 09:05:33'),
(37, 'Dome Head SS/SS 4x6mm GRIP Rivets', '33639.00', 0, 37, '2021-08-24 09:23:17', '2021-08-24 09:23:17'),
(38, 'Dome Head SS/SS 4x16mm GRIP Rivets', '33071.40', 0, 38, '2021-08-24 09:41:25', '2021-08-24 09:41:25'),
(39, 'Dome Head SS/SS 3.2x10mm GRIP Rivet with Blackening', '4.225', 0, 39, '2021-08-24 10:24:26', '2021-08-24 10:24:26'),
(41, 'Dome Head Alu/Stl 4x10mm Sealed GRIP Rivet', '30481.00', 0, 41, '2021-08-24 12:25:25', '2021-08-24 12:25:25'),
(42, 'Dome Head Alu/Stl  6.4x20mm Sealed GRIP Rivet', '26179.16', 0, 42, '2021-08-24 16:12:46', '2021-08-24 16:12:46'),
(43, 'CSK Head Steel/Steel 4.8x22mm Multi GRIP Rivet', '23350.18', 0, 43, '2021-08-24 16:34:04', '2021-08-24 16:34:04'),
(44, 'Large Flange SS/SS 4.8x25mm Multi GRIP Rivet', '23018.62', 0, 44, '2021-08-24 16:39:43', '2021-08-24 16:39:43'),
(47, 'Dome Head Stl/Stl 6.4x21mm HL GRIP Rivet', '225505.72', 1, 6, '2021-08-26 07:41:26', '2021-08-26 07:41:26'),
(48, 'Dome Head Stl/Stl 6.4x16.5mm HL GRIP Rivet', '819680.16', 1, 5, '2021-08-26 07:41:49', '2021-08-26 07:41:49'),
(49, 'Dome Head Stl/Stl 6.4x15mm HL GRIP Rivet', '110000.00', 0, 7, '2021-08-26 07:43:48', '2021-08-26 07:43:48'),
(57, 'Large Flange SS Splined M3x9mm GRIP Rivet Nut', '6.50', 1, 13, '2021-08-26 08:55:40', '2021-08-26 08:55:40'),
(58, 'Large Flange SS Splined M12x22mm GRIP Rivet Nut', '51567.50', 1, 14, '2021-08-26 08:56:57', '2021-08-26 08:56:57'),
(59, 'M8-Cage Nut with Auto Black Passivation', '5.9', 1, 15, '2021-08-26 09:04:02', '2021-08-26 09:04:02'),
(60, 'M8x65mm SS Weld Stud', '27.425', 1, 16, '2021-08-26 09:13:40', '2021-08-26 09:13:40'),
(61, 'Large Flange SS Splined M6x19.5mm GRIP Rivet Nut', '110000.00', 1, 10, '2021-08-26 09:14:58', '2021-08-26 09:14:58'),
(62, 'M5x15 SS Weld Stud', '2970.00', 1, 17, '2021-08-26 09:16:05', '2021-08-26 09:16:05'),
(63, 'Dome Head Stl/Stl 6x10 mm HL GRIP Rivet', '133576.77', 0, 18, '2021-08-26 09:20:08', '2021-08-26 09:20:08'),
(64, 'Dome Head SS/SS Monolock 6.4x14mm GRIP Rivets', '113945.87', 0, 19, '2021-08-26 09:36:13', '2021-08-26 09:36:13'),
(65, 'Dome Head Stl/Stl 6.4x14mm Monolock GRIP Rivets', '108232.32', 0, 20, '2021-08-26 09:36:51', '2021-08-26 09:36:51'),
(66, 'Dome Head Steel/Steel 4.8x12mm GRIP Rivet', '96600', 0, 21, '2021-08-26 09:41:14', '2021-08-26 09:41:14'),
(67, 'Dome Head Stl/Stl 4.8x10mm Monolock GRIP Rivets', '81144.18', 0, 22, '2021-08-26 09:46:16', '2021-08-26 09:46:16'),
(68, 'Dome Head Steel/Steel 6.4x20mm Monolock GRIP Rivet', '78386.87', 0, 23, '2021-08-26 09:47:23', '2021-08-26 09:47:23'),
(69, 'Dome Head SS/SS 6.4x20mm Monolock GRIP Rivet', '61130.32', 0, 24, '2021-08-26 09:48:19', '2021-08-26 09:48:19'),
(70, 'Dome Head SS/SS 4x20mm GRIP Rivets', '59145.90', 0, 25, '2021-08-26 09:49:06', '2021-08-26 09:49:06'),
(71, 'Dome Head St/Stl 4x10mm Multi GRIP Rivets', '55287.00', 0, 26, '2021-08-26 09:53:51', '2021-08-26 09:53:51'),
(72, 'Dome Head SS/SS Black 3.2x7mm GRIP Rivet', '51567.50', 0, 29, '2021-08-26 10:35:39', '2021-08-26 10:35:39'),
(73, 'Dome Head Alu/Stl 6.4x19mm GRIP Rivet', '30487.71', 0, 40, '2021-08-30 07:17:25', '2021-08-30 07:17:25'),
(74, 'Screw Type', '125', 0, 1, '2021-09-11 08:06:15', '2021-09-11 08:06:15'),
(75, 'Large Flange SS Splined M10x21.5mm GRIP Rivet Nut', '110000.00', 0, 9, '2021-09-11 08:06:53', '2021-09-11 08:06:53'),
(76, 'Large Flange SS Splined M8x18mm GRIP Rivet Nut', '133576.77', 1, 11, '2021-09-11 08:28:30', '2021-09-11 08:28:30'),
(77, 'Large Flange SS Splined M5x16mm GRIP Rivet Nut', '51567.50', 1, 12, '2021-09-11 08:29:06', '2021-09-11 08:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `partno_filters`
--

CREATE TABLE `partno_filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_part_number_id` bigint(20) UNSIGNED NOT NULL,
  `specification_type_id` bigint(20) UNSIGNED NOT NULL,
  `specification_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partno_filters`
--

INSERT INTO `partno_filters` (`id`, `product_part_number_id`, `specification_type_id`, `specification_id`, `created_at`, `updated_at`) VALUES
(11, 52, 1, '1', '2021-08-30 01:09:31', '2021-08-30 01:09:31'),
(12, 52, 3, '1', '2021-08-30 01:09:31', '2021-08-30 01:09:31'),
(13, 52, 4, '2', '2021-08-30 01:09:31', '2021-08-30 01:09:31'),
(14, 53, 1, '1', '2021-08-30 07:14:50', '2021-08-30 07:14:50'),
(15, 53, 4, '2', '2021-08-30 07:14:51', '2021-08-30 07:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('harihbk95@gmail.com', '$2y$10$JMN4sQtcu1XD5XAsUgaKQuGRcG8sRQ/bN2EImY50kb.4I6jSAT/p6', '2021-08-30 23:25:31'),
('hari95nn@gmail.com', '$2y$10$F9F7ezlXMQrtcC1vhWGpWe.b6s32826uS1vMY2D7/nUEk50Sp.jP.', '2021-09-04 12:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `childcategory_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `modified_by`, `image`, `childcategory_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Phillips Pan Head Screws (Box) [1-2,000 Pieces Per Package]', 'musi', NULL, '1620488246_221000547304_02859.jpg', 1, NULL, '2021-05-08 15:36:57', '2021-05-08 15:37:26'),
(2, 'Configurable Plates - SUS440C', 'Configurable Plates - SUS440C', NULL, '1620651639_1945505-200.png', 2, NULL, '2021-05-10 13:00:39', '2021-05-10 13:00:39'),
(3, 'sss', 'sss', NULL, NULL, 1, '2021-07-08 08:43:35', '2021-07-02 07:01:40', '2021-07-08 08:43:35'),
(4, 'Dome Head HL GRIP Rivet', 'Dome Head HL GRIP Rivet', NULL, '1629304974_doomad.jpg', 9, NULL, '2021-08-17 07:31:17', '2021-08-18 16:42:54'),
(5, 'Large flange', 'Large Flange GRIP Rivet Nut', NULL, NULL, 10, NULL, '2021-08-17 09:20:37', '2021-08-17 09:20:37'),
(6, 'Cage nut', 'Cage Nut with Auto Black Passivation', NULL, NULL, 11, NULL, '2021-08-18 08:16:22', '2021-08-18 08:16:22'),
(7, 'Weld Stud', 'SS Weld Stud', NULL, NULL, 12, NULL, '2021-08-18 08:27:17', '2021-08-18 08:27:17'),
(8, 'Monolock Grip Rivet', 'CSK Head Monolock  GRIP Rivets', NULL, NULL, 13, NULL, '2021-08-18 09:21:23', '2021-08-24 05:18:06'),
(9, 'Dome Head SS/SS Grip Rivet', 'Structural Blind rivet', NULL, NULL, 9, NULL, '2021-08-24 04:59:39', '2021-08-24 05:17:48'),
(10, 'Domehead ss/ss  Monolock Grip rivet', 'Monolock', NULL, NULL, 9, NULL, '2021-08-24 05:08:39', '2021-08-24 05:21:23'),
(11, 'Dome Head S/S Grip Rivet', 'Structural Blind', NULL, NULL, 9, NULL, '2021-08-24 05:26:36', '2021-08-24 05:26:36'),
(12, 'Dome Head HF GRIP Rivet', 'Hemform', NULL, NULL, 9, NULL, '2021-08-24 07:22:58', '2021-08-24 07:22:58'),
(13, 'Dome Head Trifold GRIP Rivets', 'Trifold grip rivet', NULL, NULL, 9, NULL, '2021-08-24 07:33:36', '2021-08-24 07:33:36'),
(14, 'Dome Head Sealed GRIP Rivet', 'Sealed Grip Rivet', NULL, NULL, 9, NULL, '2021-08-24 07:45:50', '2021-08-24 07:45:50'),
(15, 'Dome Head Multi GRIP Rivet', 'multi grip rivet', NULL, NULL, 9, NULL, '2021-08-24 08:12:29', '2021-08-24 08:12:29'),
(16, 'Dome Head SS/Stl GRIP Rivets', 'Structural Blind', NULL, NULL, 9, NULL, '2021-08-24 08:33:53', '2021-08-24 08:33:53'),
(17, 'Dome Head ALU/STL Grip Rivet', 'Structural Blind', NULL, NULL, 9, NULL, '2021-08-24 10:50:08', '2021-08-24 10:50:08'),
(18, 'CSK Head Steel/Steel Multi GRIP Rivet', 'CSK Head Multi GRIP Rivet', NULL, NULL, 13, NULL, '2021-08-24 16:18:41', '2021-08-24 16:18:41'),
(19, 'Large Flange SS/SS Multi GRIP Rivet', 'Large Flange Multi GRIP Rivet', NULL, NULL, 14, NULL, '2021-08-24 16:36:03', '2021-08-24 16:36:03'),
(20, 'Large flange prod', NULL, NULL, NULL, 15, NULL, '2021-08-30 07:15:32', '2021-08-30 07:15:32'),
(21, 'large demo123 p', 'ert', NULL, NULL, 16, NULL, '2021-08-30 07:16:14', '2021-08-30 07:16:43'),
(22, 'test', 'test', NULL, NULL, 14, NULL, '2021-08-30 10:34:00', '2021-08-30 10:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `productpartnumber_specification`
--

CREATE TABLE `productpartnumber_specification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_part_number_id` bigint(20) UNSIGNED NOT NULL,
  `specification_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productpartnumber_specification`
--

INSERT INTO `productpartnumber_specification` (`id`, `product_part_number_id`, `specification_id`, `created_at`, `updated_at`) VALUES
(10, 2, 1, NULL, NULL),
(11, 2, 2, NULL, NULL),
(12, 3, 1, NULL, NULL),
(13, 3, 2, NULL, NULL),
(17, 4, 2, NULL, NULL),
(22, 8, 1, NULL, NULL),
(43, 27, 1, NULL, NULL),
(44, 28, 1, NULL, NULL),
(46, 30, 1, NULL, NULL),
(47, 31, 1, NULL, NULL),
(48, 32, 1, NULL, NULL),
(49, 33, 1, NULL, NULL),
(50, 34, 1, NULL, NULL),
(51, 35, 1, NULL, NULL),
(52, 36, 1, NULL, NULL),
(53, 37, 1, NULL, NULL),
(54, 38, 1, NULL, NULL),
(55, 39, 1, NULL, NULL),
(57, 41, 1, NULL, NULL),
(58, 42, 1, NULL, NULL),
(59, 43, 1, NULL, NULL),
(60, 44, 1, NULL, NULL),
(64, 6, 1, NULL, NULL),
(65, 5, 1, NULL, NULL),
(66, 7, 1, NULL, NULL),
(75, 13, 2, NULL, NULL),
(76, 14, 2, NULL, NULL),
(77, 15, 2, NULL, NULL),
(78, 16, 2, NULL, NULL),
(79, 10, 1, NULL, NULL),
(80, 17, 2, NULL, NULL),
(81, 18, 1, NULL, NULL),
(82, 19, 1, NULL, NULL),
(83, 20, 1, NULL, NULL),
(84, 21, 1, NULL, NULL),
(85, 22, 1, NULL, NULL),
(86, 23, 1, NULL, NULL),
(87, 24, 1, NULL, NULL),
(88, 25, 1, NULL, NULL),
(89, 26, 1, NULL, NULL),
(90, 29, 1, NULL, NULL),
(95, 51, 1, NULL, NULL),
(96, 51, 2, NULL, NULL),
(102, 52, 1, NULL, NULL),
(103, 52, 2, NULL, NULL),
(104, 53, 1, NULL, NULL),
(105, 53, 2, NULL, NULL),
(106, 40, 1, NULL, NULL),
(107, 1, 1, NULL, NULL),
(108, 1, 2, NULL, NULL),
(109, 9, 2, NULL, NULL),
(110, 11, 2, NULL, NULL),
(111, 12, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_part_number`
--

CREATE TABLE `product_part_number` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `part_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dates_to_ship` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominal_thread_m` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominal_thread_inch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_length` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pinch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detailed_ship` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mounting_hole_shape` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `basic_shape` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `material` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surface_treatment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tip_shape` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_shape` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sales_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `application` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strength_class_steel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strength_class_stainless_steel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `screw_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manufacturer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_discount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `original_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dash_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_part_number`
--

INSERT INTO `product_part_number` (`id`, `part_number`, `dates_to_ship`, `nominal_thread_m`, `nominal_thread_inch`, `product_length`, `pinch`, `detailed_ship`, `mounting_hole_shape`, `basic_shape`, `material`, `surface_treatment`, `tip_shape`, `additional_shape`, `sales_unit`, `application`, `strength_class_steel`, `strength_class_stainless_steel`, `screw_type`, `manufacturer`, `sale_discount`, `cad`, `modified_by`, `product_id`, `deleted_at`, `created_at`, `updated_at`, `icon`, `quantity`, `original_price`, `dash_price`) VALUES
(1, 'BRCS-ST3W-M2.4-5.5', '-', '12', '21', '200', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-05-08 15:40:03', '2021-09-11 08:06:15', '1631367375_download.jpg', '100', '400', '450'),
(2, 'PMFMM-[20-500/0.5]-[20-200/0.5]-[5-30/0.5]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2021-05-10 13:01:37', '2021-06-27 16:36:40', '1624811800_M3301070000.jpg', '100', '300', '350'),
(3, 'BRCS-ST3W-M2.4-5.512', '-', '12', '21', '200', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-06-27 16:37:24', '2021-06-27 16:37:24', '1624811844_M3301150000.jpg', '100', '400', '450'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-26 09:41:34', '2021-07-26 08:03:27', '2021-08-26 09:41:34', '1629182063_fasteners.jpg', NULL, NULL, NULL),
(5, 'DSS-HLG 0815', NULL, NULL, NULL, 'Diameter= 6.4 & length=16.5mm', NULL, NULL, 'round', 'dome', 'Steel/Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 4, NULL, '2021-08-17 07:41:36', '2021-08-26 07:41:49', '1629963709_Hem-Lock-grip-rivet.png', '165450', '12.375', '12.375'),
(6, 'DSS-HLG 0819', NULL, NULL, NULL, 'DIAMETER: 6.4 LENGTH: 21mm', NULL, NULL, 'round', 'dome', 'Steel/Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 4, NULL, '2021-08-17 07:57:07', '2021-08-26 07:41:26', '1629963686_Hem-Lock-grip-rivet.png', '41000', '13.75', '13.75'),
(7, 'DSS-HLG 0813', NULL, NULL, NULL, 'DIAMETER: 6.4 LENGTH:15mm', NULL, NULL, 'round', 'dome', 'Steel/Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 4, NULL, '2021-08-17 08:04:08', '2021-08-26 07:43:47', '1629963827_Hem-Lock-grip-rivet.png', '20000', '13.75', '13.75'),
(8, 'DSS-HLG 0817', NULL, NULL, NULL, 'DIAMETER: 6.4 & LENGTH:19mm', NULL, NULL, 'round', 'dome', 'Steel/Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2021-08-17 16:48:09', '2021-08-17 09:09:19', '2021-08-17 16:48:09', NULL, '13000', '5.89', '5.89'),
(9, 'LFI-SP 1040', NULL, 'M10', NULL, 'M10x21.5mm', NULL, NULL, NULL, 'Large Flange', 'Stainless Steel', NULL, NULL, 'Splined', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 5, NULL, '2021-08-17 09:35:53', '2021-09-11 11:42:20', '1631367413_download.jpg', '10482', '13.75', '13.75'),
(10, 'LFI-SP 0655', NULL, 'M6', NULL, '9.5mm', NULL, NULL, 'round', 'Large Flange', 'Stainless Steel', NULL, NULL, 'Splined', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 5, NULL, '2021-08-17 09:59:09', '2021-08-26 09:14:58', '1629969298_Large-Flang-Rivet-Nut.jpg', '6580', '4.8', '4.8'),
(11, 'LFI-SP 0835', NULL, 'M8', NULL, 'x18mm', NULL, NULL, NULL, 'Large Flange', 'Stainless Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2021-08-18 07:33:06', '2021-09-11 08:28:29', '1631368709_download (1).jpg', '5930', '4.8', '4.8'),
(12, 'LFI-SP 0550', NULL, 'M5', NULL, '16mm', NULL, NULL, NULL, 'Large Flange', 'Stainless Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 5, NULL, '2021-08-18 07:35:50', '2021-09-11 08:29:06', '1631368746_download (1).jpg', '5000 Nos', '50', '4.4'),
(13, 'LFI-SP 0320', NULL, 'M3', NULL, '9mm', NULL, NULL, NULL, 'Large Flange', 'Stainless Steel', NULL, NULL, 'Splined', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, '2021-08-18 07:37:31', '2021-08-26 08:55:40', '1629968140_Large-Flang-Rivet-Nut.jpg', '979 Nos', '6.50', '6.50'),
(14, 'LFI-SP 1240-15H', NULL, 'M12', NULL, '22mm', NULL, NULL, NULL, 'Large Flange', 'Stainless Steel', NULL, NULL, 'Splined', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 5, NULL, '2021-08-18 08:13:00', '2021-08-26 08:56:57', '1629968217_Large-Flang-Rivet-Nut.jpg', '1000 Nos', '6.05', '6.05'),
(15, 'CGNSS-0835-B', NULL, 'M8', NULL, NULL, NULL, NULL, NULL, NULL, 'Steel / Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 6, NULL, '2021-08-18 08:19:33', '2021-08-26 09:04:02', '1629968642_Cage-Nut-M8-Black.jpg', '14665', '5.9', '5.9'),
(16, 'WDI-0865', NULL, 'M8', NULL, '65mm', NULL, NULL, NULL, NULL, 'Stainless Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 7, NULL, '2021-08-18 08:32:41', '2021-08-26 09:13:40', '1629969220_Grip-ss-weld-stud.jpg', '1335', '27.425', '27.425'),
(17, 'WDI-0515', NULL, 'M5', NULL, '15mm', NULL, NULL, NULL, NULL, 'Stainless Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 7, NULL, '2021-08-18 08:38:29', '2021-08-26 09:16:05', '1629969365_Grip-ss-weld-stud.jpg', '1500', '4.95', '4.95'),
(18, 'DII 6010', NULL, NULL, NULL, 'Diameter= 6 & length=10 mm', NULL, NULL, 'round', NULL, 'Stainless Steel / Stainless Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 9, NULL, '2021-08-24 05:07:13', '2021-08-26 09:20:08', '1629969608_hemlock-Domehead-rivet.gif', '31485', '10.6', '10.6'),
(19, 'DII-MBG 6414', NULL, NULL, NULL, 'Diameter= 6.4 & length=14 mm', NULL, NULL, 'round', 'dome', 'Stainless Steel / Stainless Steel', NULL, NULL, 'Monolock', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 10, NULL, '2021-08-24 05:13:32', '2021-08-26 09:36:13', '1629970573_Dome-Head-Mono-Lock.png', '9354', '12.18', '12.18'),
(20, 'DSS-MBG 6414', NULL, NULL, NULL, 'Diameter= 6.4 & length=14 mm', NULL, NULL, 'round', 'dome', 'Steel / Steel', NULL, NULL, 'Monolock', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 10, NULL, '2021-08-24 05:23:37', '2021-08-26 09:36:51', '1629970611_Dome-Head-Mono-Lock.png', '22843', '10.6', '10.6'),
(21, 'DSS 4812', NULL, NULL, NULL, 'Diameter= 4.8 & length=12 mm', NULL, NULL, NULL, 'dome', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 11, NULL, '2021-08-24 05:32:01', '2021-08-26 09:41:14', '1629970874_Dome-head-blind-rivets-.jpg', '70170', '3.45', '3.45'),
(22, 'DSS-MBG 4810', NULL, NULL, NULL, 'Diameter= 4.8 & length=10 mm', NULL, NULL, 'round', 'dome', 'Steel / Steel', NULL, NULL, 'Monolock', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 8, NULL, '2021-08-24 05:50:34', '2021-08-26 09:46:16', '1629971176_Dome-Head-Mono-Lock-Blind-Rivet.jpg', '18061', '4.49', '4.49'),
(23, 'DSS-MBG 6420', NULL, NULL, NULL, 'Diameter= 6.4 & length=20 mm', NULL, NULL, 'round', 'dome', 'Steel / Steel', NULL, NULL, 'Monolock', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 8, NULL, '2021-08-24 06:05:09', '2021-08-26 09:47:23', '1629971243_Dome-Head-Mono-Lock-Blind-Rivet.jpg', '13458', '14.55', '14.55'),
(24, 'DII-MBG 6420', NULL, NULL, NULL, 'Diameter= 6.4 & length=20 mm', NULL, NULL, 'round', 'dome', 'Steel / Steel', NULL, NULL, 'Monolock', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 8, NULL, '2021-08-24 06:35:43', '2021-08-26 09:48:19', '1629971299_Dome-Head-Mono-Lock-Blind-Rivet.jpg', '5070', '30.15', '30.15'),
(25, 'DII 4020', NULL, NULL, NULL, 'Diameter= 4 & length=20 mm', NULL, NULL, 'round', 'dome', 'Stainless Steel / Stainless Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 9, NULL, '2021-08-24 06:41:17', '2021-08-26 09:49:06', '1629971346_Dome-head-blind-rivets-.jpg', '29600', '5', '5'),
(26, 'DSS-MG 4010', NULL, NULL, NULL, 'Diameter= 4 & length=10 mm', NULL, NULL, 'round', 'dome', 'Steel / Steel', NULL, NULL, 'Monolock', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 8, NULL, '2021-08-24 06:43:26', '2021-08-26 09:53:51', '1629971631_Dome-Head-multi-grip.jpg', '30880', '4.5', '4.5'),
(27, 'DII 3207-PB', NULL, NULL, NULL, 'Diameter= 3.2 & length=07 mm', NULL, NULL, 'round', 'dome', 'Stainless Steel / Stainless Steel', 'Pigment Black', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 1, '2021-08-24 07:18:56', '2021-08-24 06:48:07', '2021-08-24 07:18:56', NULL, '34950 Nos', '1.48', '1.48'),
(28, 'DII 3207-PB', NULL, NULL, NULL, 'Diameter= 3.2 & length=07 mm', NULL, NULL, 'round', 'dome', 'Stainless Steel / Stainless Steel', 'Pigment Black', NULL, 'Monolock', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 1, '2021-08-24 07:18:49', '2021-08-24 07:03:22', '2021-08-24 07:18:49', NULL, '34950', '1.48', '1.48'),
(29, 'DII 3207-PB', NULL, NULL, NULL, 'Diameter= 3.2 & length=07 mm', NULL, NULL, NULL, 'dome', 'Stainless Steel / Stainless Steel', 'Pigment Black', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 9, NULL, '2021-08-24 07:18:22', '2021-08-26 10:35:39', '1629974139_Dome-Head-Black-Rivet.jpg', '34950 Nos', '3.7', '3.7'),
(30, 'DSS-HFG 6425', NULL, NULL, NULL, 'Diameter= 6.4 & length=25 mm', NULL, NULL, 'round', 'dome', 'Steel / Steel', NULL, NULL, 'Hemform', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 12, NULL, '2021-08-24 07:27:28', '2021-08-24 07:27:28', NULL, '8000', '6.28', '6.28'),
(31, 'DAA-TFG 4018', NULL, NULL, NULL, 'Diameter= 3.2 & length=07 mm', NULL, NULL, 'round', 'dome', 'Aluminium / Aluminium', NULL, NULL, 'Trifold', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 13, NULL, '2021-08-24 07:43:10', '2021-08-24 07:43:10', NULL, '21924 Nos', '2.26', '2.26'),
(32, 'DAS-SG 4830', NULL, NULL, NULL, 'Diameter= 4.8 & length=30 mm', NULL, NULL, 'round', 'dome', 'Aluminium / Steel', NULL, NULL, 'sealed', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 14, NULL, '2021-08-24 07:58:36', '2021-08-24 07:58:36', NULL, '24000', '2.00', '2.00'),
(33, 'DII 3210', NULL, NULL, NULL, 'Diameter= 3.2 & length=10 mm', NULL, NULL, 'round', 'dome', 'Stainless Steel / Stainless Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 9, NULL, '2021-08-24 08:06:43', '2021-08-24 08:06:43', NULL, '39005 Nos', '1.20', '1.20'),
(34, 'DSS-MG 4820', NULL, NULL, NULL, 'Diameter= 4.8 & length=20 mm', NULL, NULL, 'round', 'dome', 'Steel / Steel', NULL, NULL, 'multi grip', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 15, NULL, '2021-08-24 08:19:11', '2021-08-24 08:19:11', NULL, '15500 Nos', '2.74', '2.74'),
(35, 'DII 3207', NULL, NULL, NULL, 'Diameter= 3.2 & length=07 mm', NULL, NULL, NULL, 'dome', 'Stainless Steel / Stainless Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 9, NULL, '2021-08-24 08:24:55', '2021-08-24 08:24:55', NULL, '40750', '1.00', '1.00'),
(36, 'DIS 4016', NULL, NULL, NULL, 'Diameter= 4 & length=16 mm', NULL, NULL, 'round', 'dome', 'Stainless steel / steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 16, NULL, '2021-08-24 09:05:33', '2021-08-24 09:05:33', NULL, '28000', NULL, NULL),
(37, 'DII 4006', NULL, NULL, NULL, 'Diameter= 4 & length=06 mm', NULL, NULL, 'round', 'dome', 'Stainless Steel / Stainless Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 9, NULL, '2021-08-24 09:23:17', '2021-08-24 09:23:17', NULL, '24070', '3.5', '3.5'),
(38, 'DII 4016', NULL, NULL, NULL, 'Diameter= 4 & length= 16 mm', NULL, NULL, 'round', 'dome', 'Stainless Steel / Stainless Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 9, NULL, '2021-08-24 09:41:25', '2021-08-24 09:41:25', NULL, '20500', '4.025', '4.025'),
(39, 'DII 3210-PB', NULL, NULL, NULL, 'Diameter= 3.2 & length= 10 mm', NULL, NULL, 'round', 'dome', 'Stainless Steel / Stainless Steel', 'Pigment Black', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 1, NULL, '2021-08-24 10:24:26', '2021-08-24 10:24:26', NULL, '18276', '4.225', '4.225'),
(40, 'DAS 6419', NULL, NULL, NULL, 'Diameter= 6.4 & length= 19 mm', NULL, NULL, 'round', 'dome', 'Aluminium / Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 21, NULL, '2021-08-24 12:19:29', '2021-08-30 07:17:25', '', '11100 Nos', '6.875', '6.875'),
(41, 'DAS-SG 4010', NULL, NULL, NULL, 'Diameter= 4 & length=10 mm', NULL, NULL, 'round', 'dome', 'Aluminium / Steel', NULL, NULL, 'Sealed', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 14, NULL, '2021-08-24 12:25:25', '2021-08-24 12:25:25', NULL, '20110', '3.8', '3.8'),
(42, 'DAS-SG 6420', NULL, NULL, NULL, 'Diameter= 6.4 & length= 20mm', NULL, NULL, 'round', 'dome', 'Aluminium / Steel', NULL, NULL, 'sealed', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 17, NULL, '2021-08-24 16:12:46', '2021-08-24 16:12:46', NULL, '7000', '9.35', '9.35'),
(43, 'KSS-MG 4822', NULL, NULL, NULL, 'Diameter= 4.8 & length= 22mm', NULL, NULL, 'round', 'counter sunk', 'Steel / Steel', NULL, NULL, 'multi grip', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 18, NULL, '2021-08-24 16:34:04', '2021-08-24 16:34:04', NULL, '11500', '5.075', '5.075'),
(44, 'LFII-MG 4825', NULL, NULL, NULL, 'Diameter= 4.8 & length=25 mm', NULL, NULL, 'round', 'Large Flange', 'Stainless Steel / Stainless Steel', NULL, NULL, 'Multi Grip', NULL, NULL, NULL, NULL, NULL, 'GRIP', NULL, NULL, NULL, 19, NULL, '2021-08-24 16:39:43', '2021-08-24 16:39:43', NULL, '3970', '14.5', '14.5'),
(45, 'dsf', 'dsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-30 00:09:05', '2021-08-29 23:59:02', '2021-08-30 00:09:05', NULL, NULL, NULL, NULL),
(46, 'dsf', 'dsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-30 00:09:10', '2021-08-30 00:00:35', '2021-08-30 00:09:10', NULL, NULL, NULL, NULL),
(47, 'dsf', 'dsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-30 00:09:15', '2021-08-30 00:01:05', '2021-08-30 00:09:15', NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-30 00:08:58', '2021-08-30 00:01:23', '2021-08-30 00:08:58', NULL, NULL, NULL, NULL),
(49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-30 00:08:46', '2021-08-30 00:01:47', '2021-08-30 00:08:46', NULL, NULL, NULL, NULL),
(50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-30 00:08:52', '2021-08-30 00:02:39', '2021-08-30 00:08:52', NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-30 00:08:36', '2021-08-30 00:03:48', '2021-08-30 00:08:36', NULL, NULL, NULL, NULL),
(52, 'ghj', 'hgj', '34', '34', '43', '34', '34', '43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-08-30 00:09:45', '2021-08-30 01:03:31', '', NULL, NULL, NULL),
(53, 'BRCS-ST3W', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', NULL, NULL, NULL, NULL, 19, NULL, '2021-08-30 07:14:50', '2021-08-30 07:14:50', NULL, '1222', '122', '12');

-- --------------------------------------------------------

--
-- Table structure for table `product_specification`
--

CREATE TABLE `product_specification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `specification_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE `specification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'size', 'size', NULL, '2021-05-08 15:37:57', '2021-05-08 15:37:57'),
(2, 'Nomial of thread m', 'Nomial of thread m', NULL, '2021-05-08 15:38:19', '2021-05-08 15:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `specification_type`
--

CREATE TABLE `specification_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `spec_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specification_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `specification_type`
--

INSERT INTO `specification_type` (`id`, `spec_type`, `description`, `image`, `specification_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '', 1, NULL, '2021-05-08 15:38:34', '2021-05-08 15:38:34'),
(2, '1.5', '1.5', '', 1, NULL, '2021-05-08 15:38:47', '2021-05-08 15:38:47'),
(3, '3.00', '3.00', '', 1, NULL, '2021-05-08 15:39:07', '2021-05-08 15:39:07'),
(4, '4.00', '4.00', '', 2, NULL, '2021-05-08 15:39:24', '2021-05-08 15:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Screw,Bolts', 1, NULL, '2021-05-08 15:35:25', '2021-05-08 15:35:25'),
(2, 'Metal Materials', 3, NULL, '2021-05-10 12:57:40', '2021-05-10 12:57:40'),
(3, 'Rivets', 1, NULL, '2021-07-06 04:44:47', '2021-07-06 04:44:47'),
(4, 'Rivet nuts', 1, NULL, '2021-07-06 04:45:06', '2021-07-06 04:45:06'),
(5, 'Cage nut', 1, NULL, '2021-08-18 08:14:48', '2021-08-18 08:14:48'),
(6, 'Threaded Fasteners', 1, NULL, '2021-08-18 08:23:00', '2021-08-18 08:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0-admin , 1-user',
  `user_status` int(11) NOT NULL DEFAULT 1 COMMENT '1-active , 2-inactive',
  `mobileno` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userType` varchar(233) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userLoginUserId` varchar(233) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userCompany` varchar(233) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userCompanyGST` varchar(233) COLLATE utf8_unicode_ci DEFAULT NULL,
  `newsletter` varchar(233) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `user_status`, `mobileno`, `userType`, `userLoginUserId`, `userCompany`, `userCompanyGST`, `newsletter`) VALUES
(1, 'hari', 'hari@gmail.com', '2021-08-31 05:58:55', '$2y$10$uk7nLtfTT5x8z0ObAp0NJOSlpZUIL/9/pABoOHEJso6kBhF0M2YJO', NULL, '2021-05-08 15:17:09', '2021-05-08 15:17:09', 0, 1, NULL, NULL, NULL, NULL, NULL, ''),
(2, 'Kannan P', 'kannanlabs@gmail.com', NULL, '$2y$10$LIE9y3TcH..gk9JK06IUDOsyeXvuRf3SwygGlt3miVQA7/8.alYQG', NULL, '2021-05-10 12:52:53', '2021-05-10 12:52:53', 0, 1, NULL, NULL, NULL, NULL, NULL, ''),
(3, 'Solomon C', 'harin@gmail.com', NULL, '$2y$10$OFr0EMvfKi0RK2VZIbkgDeD0DhiaGpmKPloJ2vuudY6CODRnAUq3u', NULL, '2021-05-15 06:42:30', '2021-05-15 06:42:30', 1, 1, NULL, NULL, NULL, NULL, NULL, ''),
(61, 'hari', 'hari95nn@gmail.com', '2021-09-05 01:30:34', '$2y$10$NUIgBmWCyvelfA1N12m6beTgibwjqEI.mrkPg3R8cXsRLIsca3/nO', NULL, '2021-09-05 01:28:54', '2021-09-05 01:30:34', 1, 1, '9080118599', '1', 'hari', NULL, NULL, 'option1'),
(64, 'Solomon C', 'solomon@webdads2u.in', '2021-09-05 01:30:34', '$2y$10$ld1K0fW7HKrnu.UTafd9MeD/.RQGQVIhKIgLpm08ziFlDsMHaIItW', NULL, '2021-09-12 01:00:27', '2021-09-12 01:00:27', 1, 1, '9884113386', '1', 'solomon', NULL, NULL, 'option1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childcategory`
--
ALTER TABLE `childcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `childcategory_parentcategory_id_foreign` (`parentcategory_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_name` (`customer_name`) USING BTREE,
  ADD KEY `email_address` (`email_address`) USING BTREE;

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`);

--
-- Indexes for table `parentcategory`
--
ALTER TABLE `parentcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentcategory_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `partnofields`
--
ALTER TABLE `partnofields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partnofields_product_part_number_id_foreign` (`product_part_number_id`);

--
-- Indexes for table `partno_filters`
--
ALTER TABLE `partno_filters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partno_filters_product_part_number_id_foreign` (`product_part_number_id`),
  ADD KEY `partno_filters_specification_type_id_foreign` (`specification_type_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_childcategory_id_foreign` (`childcategory_id`);

--
-- Indexes for table `productpartnumber_specification`
--
ALTER TABLE `productpartnumber_specification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productpartnumber_specification_product_part_number_id_foreign` (`product_part_number_id`),
  ADD KEY `productpartnumber_specification_specification_id_foreign` (`specification_id`);

--
-- Indexes for table `product_part_number`
--
ALTER TABLE `product_part_number`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_part_number_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_specification`
--
ALTER TABLE `product_specification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_specification_product_id_foreign` (`product_id`),
  ADD KEY `product_specification_specification_id_foreign` (`specification_id`);

--
-- Indexes for table `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specification_type`
--
ALTER TABLE `specification_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specification_type_specification_id_foreign` (`specification_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategory_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `childcategory`
--
ALTER TABLE `childcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parentcategory`
--
ALTER TABLE `parentcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `partnofields`
--
ALTER TABLE `partnofields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `partno_filters`
--
ALTER TABLE `partno_filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `productpartnumber_specification`
--
ALTER TABLE `productpartnumber_specification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `product_part_number`
--
ALTER TABLE `product_part_number`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `product_specification`
--
ALTER TABLE `product_specification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specification_type`
--
ALTER TABLE `specification_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `childcategory`
--
ALTER TABLE `childcategory`
  ADD CONSTRAINT `childcategory_parentcategory_id_foreign` FOREIGN KEY (`parentcategory_id`) REFERENCES `parentcategory` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `parentcategory`
--
ALTER TABLE `parentcategory`
  ADD CONSTRAINT `parentcategory_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`);

--
-- Constraints for table `partnofields`
--
ALTER TABLE `partnofields`
  ADD CONSTRAINT `partnofields_product_part_number_id_foreign` FOREIGN KEY (`product_part_number_id`) REFERENCES `product_part_number` (`id`);

--
-- Constraints for table `partno_filters`
--
ALTER TABLE `partno_filters`
  ADD CONSTRAINT `partno_filters_product_part_number_id_foreign` FOREIGN KEY (`product_part_number_id`) REFERENCES `product_part_number` (`id`),
  ADD CONSTRAINT `partno_filters_specification_type_id_foreign` FOREIGN KEY (`specification_type_id`) REFERENCES `specification_type` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_childcategory_id_foreign` FOREIGN KEY (`childcategory_id`) REFERENCES `childcategory` (`id`);

--
-- Constraints for table `productpartnumber_specification`
--
ALTER TABLE `productpartnumber_specification`
  ADD CONSTRAINT `productpartnumber_specification_product_part_number_id_foreign` FOREIGN KEY (`product_part_number_id`) REFERENCES `product_part_number` (`id`),
  ADD CONSTRAINT `productpartnumber_specification_specification_id_foreign` FOREIGN KEY (`specification_id`) REFERENCES `specification` (`id`);

--
-- Constraints for table `product_part_number`
--
ALTER TABLE `product_part_number`
  ADD CONSTRAINT `product_part_number_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product_specification`
--
ALTER TABLE `product_specification`
  ADD CONSTRAINT `product_specification_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_specification_specification_id_foreign` FOREIGN KEY (`specification_id`) REFERENCES `specification` (`id`);

--
-- Constraints for table `specification_type`
--
ALTER TABLE `specification_type`
  ADD CONSTRAINT `specification_type_specification_id_foreign` FOREIGN KEY (`specification_id`) REFERENCES `specification` (`id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
