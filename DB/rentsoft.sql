-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2022 at 12:06 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentsoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `attached_documents`
--

CREATE TABLE `attached_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive | 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attached_documents`
--

INSERT INTO `attached_documents` (`id`, `customer_id`, `title`, `document`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 'Vue JS', '1581619258 - vue.js', 1, '2020-02-14 06:40:58', '2020-02-14 06:40:58'),
(6, 1, 'Vue JS Cheatsheet', '1581619258 - Vue-Essentials-Cheat-Sheet.pdf', 1, '2020-02-14 06:40:58', '2020-02-14 06:40:58'),
(7, 2, 'Visa List', '1581763617 - 2020-01-25.jpg', 1, '2020-02-15 22:46:58', '2020-02-15 22:46:58'),
(9, 9, 'Docs  file', '1584010341 - BVCPS  Slides (1).pdf', 1, '2020-03-12 21:52:21', '2020-03-12 21:52:21'),
(10, 14, 'visa copy', '1584257741 - acqhr02.png', 1, '2020-03-15 18:35:41', '2020-03-15 18:35:41'),
(11, 14, 'Scan copy', '1584257741 - Best-HR-Payroll-software-company-in-Bangladesh.png', 1, '2020-03-15 18:35:41', '2020-03-15 18:35:41'),
(12, 15, NULL, '1599027546 - De.JPG', 1, '2020-09-02 17:19:06', '2020-09-02 17:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `country_name` text,
  `country_desc` text,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `country_desc`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Germany', 'European Country', 1, '2020-10-20 10:39:30', '2020-10-21 04:26:47'),
(14, 'China', 'wonderful land', 1, '2020-10-20 10:54:21', '2020-10-21 04:26:49'),
(16, 'Maldives', 'Land of beaches', 1, '2020-10-20 11:09:25', '2020-10-20 11:10:59'),
(17, 'India', 'Land of foods', 1, '2020-10-20 11:20:45', '2020-10-20 11:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_type_id` int(20) DEFAULT NULL,
  `serial_no` bigint(20) DEFAULT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `given_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sur_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `resident_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nrb_residence_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '1=Male | 2=Female',
  `type` tinyint(4) NOT NULL COMMENT '1=Individual | 2=Group',
  `group_id` bigint(20) DEFAULT NULL,
  `management` tinyint(4) NOT NULL COMMENT '1=Private | 2=Government',
  `identity` tinyint(4) NOT NULL COMMENT '1=NID | 2=Birth Certificate',
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` tinyint(4) NOT NULL COMMENT '1=Single | 2=Married | 3=Others',
  `current_address` text COLLATE utf8mb4_unicode_ci,
  `current_police_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `permanent_police_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dependent_id` bigint(20) DEFAULT NULL,
  `maharam_id` bigint(20) DEFAULT NULL,
  `mahram_relation_id` int(20) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `service_type_id`, `serial_no`, `tracking_no`, `given_name`, `sur_name`, `father_name`, `mother_name`, `date_of_birth`, `resident_type`, `nrb_residence_country`, `gender`, `type`, `group_id`, `management`, `identity`, `nid_number`, `birth_certificate_number`, `occupation`, `company_name`, `email`, `passport_id`, `mobile`, `marital_status`, `current_address`, `current_police_station`, `current_district`, `current_postcode`, `permanent_address`, `permanent_police_station`, `permanent_district`, `permanent_postcode`, `photo`, `spouse_name`, `dependent_id`, `maharam_id`, `mahram_relation_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1001, 'SN000001', 'Ferdous', 'Anam', NULL, NULL, '2020-02-13', 'Bangladeshi', NULL, 1, 1, NULL, 1, 1, 'Ferdous', NULL, 'Private Job', 'Acquaint Technologies', 'ferdous.anam@gmail.com', NULL, '01738238012', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1581610085 - 300x400 - Green.jpg', NULL, NULL, NULL, NULL, NULL, '2020-02-01 15:07:51', '2020-02-14 04:10:29'),
(2, 1, 1002, 'SN000002', 'Ahmed', 'Hasan', 'ABC1', 'ABC1', '2019-12-02', 'Bangladeshi', NULL, 1, 2, 2, 1, 1, '324234231', NULL, 'Govt. Job', NULL, 'anam1@gmail.com', NULL, '01234569871', 2, 'ABC1', '101', '11', '1234', 'ABC1', '251', '33', '1234', '1580634681 - of01.jpg', 'ABC12', NULL, NULL, 1, NULL, '2020-02-01 15:18:37', '2020-03-07 17:05:06'),
(3, 1, 1003, 'SN000003', 'Ashiqur Rahman', 'asdasd', 'ABC', 'ABC', '2020-02-01', 'Bangladeshi', NULL, 1, 2, 1, 1, 1, '23432423', NULL, 'Govt. Job', NULL, 'abc@abc.com', '1', '0145654654654', 1, 'ABC', NULL, NULL, '1234', 'ABC', NULL, NULL, '1231', '1580548821 - w1912zx.png', '1', NULL, NULL, 1, NULL, '2020-02-01 15:20:21', '2020-03-04 20:06:10'),
(4, 1, 1004, 'SN000004', 'Rezaul', 'Oni', 'Khalek Mia', 'Nur Nahar', '1993-02-17', 'Bangladeshi', NULL, 1, 1, NULL, 1, 1, '195468795494585', NULL, 'Private Job', 'ICT Hub', 'oni@icthub.com', NULL, '01635566993', 1, 'Current Address', '51', '5', '5533', 'Dhamrai Dhaka', '366', '47', '6633', '1581951845 - 300x400 - Violate.jpg', NULL, NULL, NULL, NULL, NULL, '2020-02-18 03:04:05', '2020-02-18 03:04:05'),
(5, 1, 1005, 'SN000005', 'Ferdous', 'Anam', 'ASD', 'ASF', '2020-03-02', 'Bangladeshi', NULL, 1, 1, NULL, 1, 1, '547863265798278', NULL, 'Govt. Job', NULL, 'hello@gmail.com', '3', '01738238012', 1, NULL, '369', '47', NULL, NULL, '102', '11', NULL, '1583155759 - 300x400 - Blue.jpg', NULL, NULL, NULL, NULL, NULL, '2020-03-03 01:29:19', '2020-03-04 20:24:40'),
(6, 1, 1006, 'SN000006', 'New', 'Test', 'Umar Khan', 'Hasna Begum', '2020-03-02', 'Bangladeshi', NULL, 1, 1, NULL, 1, 1, '566565656565656565', NULL, 'Govt. Job', NULL, 'new@test.com', NULL, '01479865657', 1, 'Address', '223', '28', '1205', 'Permanent Address', '130', '14', '6530', '1583156216 - 300x400 - Dark Red.jpg', NULL, NULL, NULL, NULL, NULL, '2020-03-03 01:36:56', '2020-03-03 01:36:56'),
(7, 1, 1007, 'SN000007', 'AHMED', 'YOUSUF', NULL, NULL, '2020-03-04', 'Bangladeshi', NULL, 1, 1, NULL, 1, 1, NULL, NULL, 'Govt. Job', NULL, 'asdas@asd.com', NULL, '01738238011', 1, 'Test Address', '269', '35', '1234', 'Test Address', '269', '35', '1234', '1583311680 - doctor1.jpg', NULL, NULL, NULL, NULL, NULL, '2020-03-04 20:38:09', '2020-03-15 01:39:31'),
(8, 1, 1008, 'SN000008', 'Dummy', 'User', 'Father\'s Name', 'Mother\'s Name', '2020-03-04', 'Bangladeshi', NULL, 1, 1, NULL, 1, 1, '133455465124551354', NULL, 'Govt. Job', 'Acquaint Technologies', 'hello@acquaintbd.com', NULL, '01734222391', 1, 'G.A Bhaban Suit # 2, (3rd floor),\r\n8 Purana Paltan', '412', '54', '1000', 'G.A Bhaban Suit # 2, (3rd floor),\r\n8 Purana Paltan', '99', '11', '1000', '1583332284 - 2020-03-02.png', NULL, NULL, NULL, NULL, NULL, '2020-03-05 02:25:08', '2020-03-05 03:26:38'),
(9, 1, 1009, 'SN000009', 'Hasan', 'Abul', NULL, NULL, '2020-03-05', 'Bangladeshi', NULL, 1, 1, NULL, 1, 1, '01232322233', NULL, 'Private Job', 'Hasan Associates', 'test@test.com', '3', '01716040888', 1, 'Dhanmondi', '367', '47', '12234', 'Dhanmondi', '365', '47', '1234', '1583382156 - 212.jpeg', 'rahela khatun', NULL, NULL, NULL, 'Applied for Omra visa with full family', '2020-03-05 16:22:37', '2020-03-12 21:55:29'),
(10, 1, 1010, 'SN000010', 'Shhs', 'Dhdhd', NULL, NULL, '2020-03-07', 'Bangladeshi', NULL, 1, 1, NULL, 1, 1, NULL, NULL, 'Govt. Job', NULL, 'gsgh@dhhd.com', NULL, '017474747447', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1583561627 - received_812381489172201.jpeg', NULL, NULL, NULL, NULL, 'Good Client', '2020-03-07 18:13:47', '2020-03-10 04:23:30'),
(11, 1, 1011, 'SN000011', 'ANSARY', 'REDWAN', NULL, NULL, '1990-03-07', 'Bangladeshi', NULL, 1, 2, 5, 1, 1, NULL, NULL, 'Govt. Job', NULL, 'hamimpuspo@gmail.com', NULL, '01675115258', 1, 'ffgdfgfd', '330', '43', '2222', NULL, NULL, NULL, NULL, '1583562189 - 89227990_812381492505534_5304521417876832256_n.jpg', NULL, NULL, NULL, NULL, NULL, '2020-03-07 18:23:09', '2020-03-07 19:00:35'),
(12, 1, 1012, 'SN000012', 'asdasd', 'asdasdas', NULL, NULL, '2020-03-07', 'Bangladeshi', NULL, 1, 1, NULL, 1, 1, NULL, NULL, 'Govt. Job', NULL, 'asdas@asd.com', NULL, '0345345345344', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1583591743 - 01.jpg', NULL, NULL, NULL, NULL, NULL, '2020-03-08 02:35:44', '2020-03-08 02:35:44'),
(13, 1, 1013, 'SN000013', 'asdas', 'asd', NULL, NULL, '2020-03-01', 'NRB', NULL, 1, 1, NULL, 1, 1, NULL, NULL, 'Govt. Job', NULL, 'asd@asd.com', NULL, '01432423423', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1583648687 - 020.png', NULL, NULL, NULL, NULL, NULL, '2020-03-08 17:24:48', '2020-03-08 17:24:48'),
(14, 1, 1014, 'SN000014', 'ALAM', 'HASEM', 'Ali Hasen', 'Alia alam', '1990-02-09', 'NRB', 'Saudia Arabia', 1, 2, 6, 1, 1, '12323123333', NULL, 'Private Job', 'Amir Group', 'testalam@test.com', NULL, '01238472834', 1, 'Monpura housing', '263', '34', '222', 'Monpura housing', '263', '34', '222', '1584257739 - 040.png', 'hosne ara', NULL, NULL, NULL, NULL, '2020-03-15 18:35:41', '2020-03-15 18:40:11'),
(15, 1, 1015, 'SN000015', 'SHUMON', 'ABDUS SATTAR', 'kazi Abdul baten', 'mrs. samsun nahar', '1984-09-05', 'Bangladeshi', NULL, 1, 1, NULL, 2, 1, '1234567892', NULL, 'Others', NULL, 'nilufasattar@gmail.com', '7', '01911943839', 2, 'gridan tenga, atpara,', '485', '64', NULL, 'gridan tenga, atpara,', '485', '64', NULL, '1599027546 - Satter copy-.jpg', NULL, NULL, NULL, NULL, NULL, '2020-09-02 17:19:06', '2020-09-02 17:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `customer_passports`
--

CREATE TABLE `customer_passports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `passport_type` tinyint(4) NOT NULL COMMENT '1=General | 2=Government | 3=Others',
  `issue_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `emergency_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_location` text COLLATE utf8mb4_unicode_ci,
  `box_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_passports`
--

INSERT INTO `customer_passports` (`id`, `full_name`, `passport_no`, `date_of_birth`, `passport_type`, `issue_date`, `expiry_date`, `emergency_contact_number`, `issue_location`, `box_no`, `reference_id`, `created_at`, `updated_at`) VALUES
(1, 'Ferdous Anam', '111222233331', '1995-01-01', 1, '2018-02-11', '2023-02-12', '01738238012', 'Dhaka1 Passport Office', NULL, NULL, '2020-02-02 06:40:29', '2020-10-09 17:40:42'),
(3, 'Ferdous Anam', '777788889999', '2020-02-02', 2, '2020-02-02', '2020-02-02', NULL, 'Rangpur Passport Office', NULL, NULL, '2020-02-02 06:43:20', '2020-02-03 02:35:12'),
(7, 'SHUMON ABDUS SATTAR', '123456789', '1984-09-05', 1, '2020-09-02', '2022-10-28', NULL, 'dhaka', NULL, NULL, '2020-09-02 17:19:06', '2020-09-02 17:19:06'),
(8, 'MD ISHAK FARID', 'AD456221', '2020-10-19', 1, '2020-10-19', '2020-10-19', '01913180703', 'JURAIN, DHAKA-1204', NULL, NULL, '2020-10-19 16:09:34', '2020-10-19 16:09:34'),
(9, 'Farhan Ahmed', '0549', '2020-10-20', 1, '2020-10-20', '2020-10-20', '01913472130', 'laalbagh', NULL, NULL, '2020-10-20 09:25:24', '2020-10-20 10:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `customer_visas`
--

CREATE TABLE `customer_visas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visa_collect_from` text COLLATE utf8mb4_unicode_ci,
  `visa_fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  `service_charge` decimal(10,2) NOT NULL DEFAULT '0.00',
  `customer_visa_type_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `visa_for_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_visas`
--

INSERT INTO `customer_visas` (`id`, `customer_name`, `visa_collect_from`, `visa_fee`, `service_charge`, `customer_visa_type_id`, `visa_for_country`, `passport_number`, `created_at`, `updated_at`) VALUES
(3, 'Lyle Burks', 'Voluptate voluptatem', '1200.00', '300.00', 1, 'Nam repudiandae earu', '4111111111111111', '2020-10-10 03:27:42', '2020-10-10 03:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `customer_visa_types`
--

CREATE TABLE `customer_visa_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_visa_types`
--

INSERT INTO `customer_visa_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Single Entry', '2020-10-10 00:51:02', '2020-10-10 00:51:02'),
(2, 'Double Entry', '2020-10-10 00:51:02', '2020-10-10 00:51:02'),
(3, 'Hajj', '2020-10-10 00:51:02', '2020-10-10 00:51:02'),
(4, 'Umrah Hajj', '2020-10-10 00:51:02', '2020-10-10 00:51:02'),
(5, 'Others', '2020-10-10 00:51:02', '2020-10-10 00:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `dev_app_details`
--

CREATE TABLE `dev_app_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `brand_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'brand.png',
  `app_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'favicon.ico',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dev_app_details`
--

INSERT INTO `dev_app_details` (`id`, `app_name`, `company_name`, `company_address`, `company_contact`, `company_logo`, `brand_logo`, `app_icon`, `created_at`, `updated_at`) VALUES
(1, 'ATech Rent Management System', 'ATech Rent Management System', 'Dhaka - 1207, Bangladesh', '09638048849', 'logo.png', 'brand.png', 'favicon.ico', '2020-01-27 22:11:05', '2020-11-02 08:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `dev_developer_details`
--

CREATE TABLE `dev_developer_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dev_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dev_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dev_footer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dev_developer_details`
--

INSERT INTO `dev_developer_details` (`id`, `dev_name`, `dev_website`, `dev_footer`, `created_at`, `updated_at`) VALUES
(1, 'Acquaint Technologies', 'https://acquaintbd.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dev_mode_setup`
--

CREATE TABLE `dev_mode_setup` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `developer_mode` int(11) NOT NULL DEFAULT '1' COMMENT '1 = On & 0 = off',
  `attendance_type` int(11) NOT NULL DEFAULT '1',
  `developer` int(11) NOT NULL DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dev_mode_setup`
--

INSERT INTO `dev_mode_setup` (`id`, `developer_mode`, `attendance_type`, `developer`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `bn_name`) VALUES
(1, 'Comilla', 'কুমিল্লা'),
(2, 'Feni', 'ফেনী'),
(3, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া'),
(4, 'Rangamati', 'রাঙ্গামাটি'),
(5, 'Noakhali', 'নোয়াখালী'),
(6, 'Chandpur', 'চাঁদপুর'),
(7, 'Lakshmipur', 'লক্ষ্মীপুর'),
(8, 'Chattogram', 'চট্টগ্রাম'),
(9, 'Coxsbazar', 'কক্সবাজার'),
(10, 'Khagrachhari', 'খাগড়াছড়ি'),
(11, 'Bandarban', 'বান্দরবান'),
(12, 'Sirajganj', 'সিরাজগঞ্জ'),
(13, 'Pabna', 'পাবনা'),
(14, 'Bogura', 'বগুড়া'),
(15, 'Rajshahi', 'রাজশাহী'),
(16, 'Natore', 'নাটোর'),
(17, 'Joypurhat', 'জয়পুরহাট'),
(18, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ'),
(19, 'Naogaon', 'নওগাঁ'),
(20, 'Jashore', 'যশোর'),
(21, 'Satkhira', 'সাতক্ষীরা'),
(22, 'Meherpur', 'মেহেরপুর'),
(23, 'Narail', 'নড়াইল'),
(24, 'Chuadanga', 'চুয়াডাঙ্গা'),
(25, 'Kushtia', 'কুষ্টিয়া'),
(26, 'Magura', 'মাগুরা'),
(27, 'Khulna', 'খুলনা'),
(28, 'Bagerhat', 'বাগেরহাট'),
(29, 'Jhenaidah', 'ঝিনাইদহ'),
(30, 'Jhalakathi', 'ঝালকাঠি'),
(31, 'Patuakhali', 'পটুয়াখালী'),
(32, 'Pirojpur', 'পিরোজপুর'),
(33, 'Barisal', 'বরিশাল'),
(34, 'Bhola', 'ভোলা'),
(35, 'Barguna', 'বরগুনা'),
(36, 'Sylhet', 'সিলেট'),
(37, 'Moulvibazar', 'মৌলভীবাজার'),
(38, 'Habiganj', 'হবিগঞ্জ'),
(39, 'Sunamganj', 'সুনামগঞ্জ'),
(40, 'Narsingdi', 'নরসিংদী'),
(41, 'Gazipur', 'গাজীপুর'),
(42, 'Shariatpur', 'শরীয়তপুর'),
(43, 'Narayanganj', 'নারায়ণগঞ্জ'),
(44, 'Tangail', 'টাঙ্গাইল'),
(45, 'Kishoreganj', 'কিশোরগঞ্জ'),
(46, 'Manikganj', 'মানিকগঞ্জ'),
(47, 'Dhaka', 'ঢাকা'),
(48, 'Munshiganj', 'মুন্সিগঞ্জ'),
(49, 'Rajbari', 'রাজবাড়ী'),
(50, 'Madaripur', 'মাদারীপুর'),
(51, 'Gopalganj', 'গোপালগঞ্জ'),
(52, 'Faridpur', 'ফরিদপুর'),
(53, 'Panchagarh', 'পঞ্চগড়'),
(54, 'Dinajpur', 'দিনাজপুর'),
(55, 'Lalmonirhat', 'লালমনিরহাট'),
(56, 'Nilphamari', 'নীলফামারী'),
(57, 'Gaibandha', 'গাইবান্ধা'),
(58, 'Thakurgaon', 'ঠাকুরগাঁও'),
(59, 'Rangpur', 'রংপুর'),
(60, 'Kurigram', 'কুড়িগ্রাম'),
(61, 'Sherpur', 'শেরপুর'),
(62, 'Mymensingh', 'ময়মনসিংহ'),
(63, 'Jamalpur', 'জামালপুর'),
(64, 'Netrokona', 'নেত্রকোণা');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_category_id` bigint(20) NOT NULL,
  `expense_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `expense_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_category_id`, `expense_title`, `expense_by`, `description`, `expense_date`, `amount`, `created_at`, `updated_at`) VALUES
(2, 1, 'Bill print', 'Some One\'s Name', 'bill purpose', '2020-02-16 06:00:00', '2700.00', '2020-02-16 20:01:21', '2020-03-11 02:56:15'),
(3, 1, 'hajj', NULL, 'hajj Office jatayat, by Car', '2020-03-04 06:00:00', '1000.00', '2020-03-07 19:17:43', '2020-03-07 19:17:43'),
(4, 1, 'Boos (hasan)', NULL, 'bil dynasti umrah visa', '2020-03-07 06:00:00', '300000.00', '2020-03-07 19:22:14', '2020-03-07 19:22:14'),
(5, 1, 'shahin_20', NULL, 'tee', '2020-03-07 06:00:00', '300.00', '2020-03-07 19:23:36', '2020-03-07 19:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive | 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'General Expense', NULL, 1, '2020-02-16 18:51:17', '2020-02-16 18:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `f_id` bigint(20) UNSIGNED NOT NULL,
  `landlord_id` bigint(20) DEFAULT NULL,
  `house` text,
  `f_number` varchar(200) DEFAULT NULL,
  `f_floor` int(100) DEFAULT NULL,
  `f_sqft` int(255) DEFAULT NULL,
  `f_status` int(100) DEFAULT NULL,
  `f_available` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`f_id`, `landlord_id`, `house`, `f_number`, `f_floor`, `f_sqft`, `f_status`, `f_available`, `created_at`, `updated_at`) VALUES
(19, 3, 'Nishu Villa', 'Q2', 7, 2540, 1, 'Yes', '2020-12-23 06:37:25', '2020-12-28 10:37:20'),
(35, 3, 'Samer Villa', 'Q3', 4, 2345, 1, 'Yes', '2020-12-29 06:37:24', '2020-12-29 07:08:24'),
(36, 3, 'Samer Villa', 'Q2', 7, 7777, 1, 'Yes', '2020-12-29 09:24:34', '2020-12-29 09:24:34'),
(37, 3, 'Nishu Villa', 'Q3', 5, 4356, 1, 'Yes', '2020-12-29 09:40:19', '2020-12-29 09:40:19'),
(38, 1, 'Haunted Mansion', 'A1', 3, 1234, 1, 'No', '2020-12-30 05:07:15', '2020-12-30 10:09:48'),
(39, 1, 'Haunted Mansion', 'A2', 2, 555, 1, 'Yes', '2020-12-30 05:14:14', '2020-12-30 05:14:14'),
(40, 1, 'Samer Villa', 'A2', 3, 5555, 1, 'Yes', '2020-12-30 10:01:27', '2020-12-30 10:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Hajj | 2=Omra Hajj',
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leader_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `management_type` tinyint(4) NOT NULL COMMENT '0=Group Leader | 1=Office',
  `management_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_code`, `group_type`, `group_name`, `leader_name`, `management_type`, `management_name`, `address`, `contact_no`, `email`, `created_at`, `updated_at`) VALUES
(1, 'SN-G000001', 1, 'Group 1', 'Mosh Hamedani', 0, NULL, 'Dhaka\n', '4654874132468', 'group1@mail.com', '2020-01-31 03:59:59', '2020-01-31 04:00:04'),
(2, 'SN-G000002', 1, 'Islam Group', 'Ali Islam', 0, NULL, 'Dhaka', '01744444444', 'ali@mail.com', '2020-01-31 03:59:59', '2020-02-02 21:09:14'),
(5, 'SN-G000005', 1, 'HASAN', 'Abul Hasan Siddiky', 1, 'হাফিজ', 'Daudkandi', '01675115258', 'hamimpuspo@gmail.com', '2020-02-05 23:00:08', '2020-03-04 18:49:28'),
(6, 'SN-G000006', 2, 'Omra SN Group', 'Hasan', 0, 'Hasan', NULL, '0146456456546', NULL, '2020-02-16 20:03:46', '2020-02-16 20:03:46'),
(7, 'SN-G000007', 1, 'HASAN siddiky 2020', 'Abul Hasan Siddiky', 1, 'Abul Hasan Siddiky', NULL, '01675115258', NULL, '2020-03-07 19:03:51', '2020-03-07 19:04:17'),
(8, 'SN-G000008', 1, 'SN Hajj - 01', 'Shahjahan Akhaura', 0, 'Shahjahan Akhaura', 'AKhaura Brahmanbaria', '01752852032', 'sntravelstours@yahoo.com', '2020-10-15 16:54:02', '2020-10-15 16:54:02'),
(9, 'SN-G000009', 2, 'SN Umrah - 01', 'Shahjahan Akhaura', 0, 'Shahjahan Akhaura', 'Jurain', '01752852032', 'sntravelstours@yahoo.com', '2020-10-15 16:56:38', '2020-10-15 16:56:38'),
(10, 'SN-G000010', 1, 'IBRAHIM HASAN SHAHEB', 'IBRAHIM HASAN SHAHEB', 1, 'IBRAHIM HASAN SHAHEB', 'BAITUL MUAJJAM MASJID', '01915609562', NULL, '2020-10-15 21:38:14', '2020-10-15 21:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `hajjs`
--

CREATE TABLE `hajjs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Hajj | 2=Omra Hajj',
  `serial_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) DEFAULT NULL,
  `hijri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `customer_id` bigint(20) DEFAULT NULL,
  `package_id` bigint(20) DEFAULT NULL,
  `departure_status` bigint(20) DEFAULT NULL,
  `payment_status` bigint(20) NOT NULL DEFAULT '0' COMMENT '0=Partially Paid | 1=Paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hajjs`
--

INSERT INTO `hajjs` (`id`, `type`, `serial_no`, `year`, `hijri`, `start_date`, `end_date`, `description`, `customer_id`, `package_id`, `departure_status`, `payment_status`, `created_at`, `updated_at`) VALUES
(5, 1, 'Haji-1001', 2020, '1441', '2020-04-01', '2020-04-15', 'Payment will delay', 1, 1, 3, 0, '2020-02-05 07:07:54', '2020-02-08 21:08:22'),
(6, 2, 'Omra Haji-1001', 2020, NULL, '2020-03-07', '2020-02-15', 'Will go', 2, 4, 3, 0, '2020-02-05 20:12:20', '2020-02-05 20:12:20'),
(7, 2, 'Omra Haji-1002', 2020, NULL, '2020-03-07', '2020-03-28', 'Thanks for fly', 3, 4, 0, 0, '2020-02-08 20:05:58', '2020-02-08 20:05:58'),
(8, 1, 'Haji-1002', 2020, '1896', '2020-02-15', '2020-03-28', NULL, 3, 1, 0, 0, '2020-02-08 21:04:16', '2020-02-08 21:04:16'),
(9, 1, 'Haji-1003', 2020, '1896', '2020-02-17', '2020-03-26', 'welcome', 2, 1, 0, 0, '2020-02-17 22:55:20', '2020-02-17 22:55:20'),
(10, 2, 'Omra Haji-1003', 2020, NULL, '2020-02-20', '2020-03-27', NULL, 1, 3, 0, 0, '2020-02-17 22:57:58', '2020-02-17 22:57:58'),
(11, 1, 'Haji-1004', 2020, '1896', '2020-04-01', '2020-06-26', NULL, 11, 1, 0, 1, '2020-03-07 18:37:18', '2020-03-07 18:45:54'),
(12, 1, 'Haji-1005', NULL, NULL, NULL, NULL, NULL, 15, 1, 0, 0, '2020-09-02 17:21:47', '2020-09-02 17:21:47'),
(13, 1, 'Haji-1006', NULL, NULL, NULL, NULL, NULL, 15, 1, 0, 0, '2020-09-02 17:27:10', '2020-09-02 17:27:10'),
(14, 2, 'Omra Haji-1004', NULL, NULL, NULL, NULL, NULL, 15, 4, 0, 0, '2020-09-02 17:28:13', '2020-09-02 17:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `hajj_payments`
--

CREATE TABLE `hajj_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hajj_id` bigint(20) DEFAULT NULL,
  `voucher_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Cash | 2=Bank/Cheque',
  `depositor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_date` date DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Pending | 1=Paid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hajj_payments`
--

INSERT INTO `hajj_payments` (`id`, `hajj_id`, `voucher_name`, `type`, `depositor_name`, `bank_name`, `bank_branch_name`, `cheque_number`, `deposit_date`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'BD120202', 1, 'ABC Ahmed', 'DBBL', 'DHAKA', NULL, '2020-02-08', '20000.00', 1, '2020-02-08 19:03:57', '2020-02-08 19:03:57'),
(2, 7, '25uiwi56', 2, 'Anwar haq', 'Dbbl', 'Dhaka', NULL, '2020-02-06', '70000.00', 1, '2020-02-08 20:07:07', '2020-02-08 20:07:07'),
(3, 6, 'BH006699', 1, 'Akram Khan', NULL, NULL, NULL, '2020-02-16', '20000.00', 0, '2020-02-17 00:16:22', '2020-02-17 00:16:22'),
(4, 11, 'redwan', 1, 'ANSARY REDWAN', NULL, NULL, NULL, '2020-03-10', '120000.00', 0, '2020-03-07 18:42:23', '2020-03-07 18:42:23'),
(5, 7, 'redwan n', 1, 'ANSARY REDWAN', NULL, NULL, NULL, '2020-03-13', '120000.00', 1, '2020-03-07 18:43:40', '2020-03-07 18:43:40'),
(6, 11, 'redwan n2', 1, 'ANSARY REDWAN', NULL, NULL, NULL, '2020-03-26', '120000.00', 1, '2020-03-07 18:44:57', '2020-03-07 18:44:57'),
(7, 11, 'redwan n2222', 1, 'ANSARY REDWAN', NULL, NULL, NULL, '2020-03-26', '260000.00', 1, '2020-03-07 18:45:36', '2020-03-07 18:45:36'),
(8, 6, 'redwan n2222gg', 2, 'ANSARY REDWAN', NULL, NULL, NULL, '2020-03-10', '50000.00', 0, '2020-03-07 20:58:43', '2020-03-07 20:58:43'),
(9, 12, 'Cheque', 2, 'Abdus Sattar', 'DBBL', 'Tejgoan', '1232546', '2020-09-02', '200000.00', 0, '2020-09-02 17:30:42', '2020-09-02 17:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `hotel_name`, `cost`, `created_at`, `updated_at`) VALUES
(1, 'Hotel 1', '22000.00', '2020-02-11 05:35:41', '2020-02-16 18:02:46'),
(2, 'Hotel 2', '16937.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(3, 'Hotel 3', '39007.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(4, 'Hotel 4', '49501.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(5, 'Hotel 5', '37593.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(6, 'Hotel 6', '44983.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(7, 'Hotel 7', '46804.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(8, 'Hotel 8', '25220.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(9, 'Hotel 9', '15126.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(10, 'Hotel 10', '36294.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(11, 'Hotel 11', '10544.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(12, 'Hotel 12', '47080.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(13, 'Hotel 13', '11381.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(14, 'Hotel 14', '13235.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(15, 'Hotel 15', '15371.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(16, 'Hotel 16', '16982.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(17, 'Hotel 17', '24619.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(18, 'Hotel 18', '36256.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(19, 'Hotel 19', '19837.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41'),
(20, 'Hotel 20', '43469.00', '2020-02-11 05:35:41', '2020-02-11 05:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `h_id` bigint(20) UNSIGNED NOT NULL,
  `house_name` text,
  `holding_no` varchar(100) DEFAULT NULL,
  `road_no` varchar(100) DEFAULT NULL,
  `city` text,
  `thana` text,
  `district` text,
  `llord_foreign_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`h_id`, `house_name`, `holding_no`, `road_no`, `city`, `thana`, `district`, `llord_foreign_id`, `created_at`, `updated_at`) VALUES
(2, 'Nishu Villa', '18/1', '7', 'Dhaka City', 'Bonshal', 'Dhaka', 3, '2020-12-28 09:04:33', '2020-12-28 09:04:33'),
(3, 'Samer Villa', '18/1', '2', 'Dhaka City', 'Kotwali', 'Dhaka', 3, '2020-12-28 10:09:30', '2020-12-28 10:09:30'),
(4, 'Haunted Mansion', '25', '2', 'Dhaka City', 'Kotwali', 'Dhaka', 1, '2020-12-30 04:55:38', '2020-12-30 04:55:38'),
(5, 'Samer Villa', '3/2', '4', 'Dhaka city', 'Kotwali', 'Dhaka', 1, '2020-12-30 10:00:52', '2020-12-30 10:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `mahram_relations`
--

CREATE TABLE `mahram_relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `relation_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive | 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahram_relations`
--

INSERT INTO `mahram_relations` (`id`, `relation_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Husband', 1, '2020-02-13 04:19:42', '2020-02-13 04:19:42'),
(2, 'Son', 1, '2020-02-13 04:19:42', '2020-02-13 04:19:42'),
(3, 'Brother', 1, '2020-02-13 04:19:42', '2020-02-13 04:19:42'),
(4, 'Nephew', 1, '2020-02-13 04:19:42', '2020-02-13 04:19:42'),
(5, 'Group Of Women', 1, '2020-02-13 04:19:42', '2020-02-13 04:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `selector` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_visibility` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = On & 0 = Off',
  `status` int(11) NOT NULL COMMENT '1 = Active & 0 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `selector`, `parent_id`, `serial_no`, `menu_name`, `route_name`, `icon`, `sidebar_visibility`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 0, 1, 'Dashboard', 'dashboard', 'fas fa-columns', 1, 1, '2020-01-31 18:10:21', '2020-12-26 10:27:55'),
(2, 'renter', 0, 3, 'Renter', '#', 'fas fa-user', 1, 1, '2020-01-31 18:10:21', '2020-12-26 10:26:36'),
(3, 'add-renter', 2, 1, 'Add New Renter', '/add-renter', NULL, 1, 1, '2020-01-31 18:10:21', '2020-11-03 05:52:51'),
(4, 'renters', 2, 2, 'All Renter List', '/view-renter', NULL, 1, 1, '2020-01-31 18:10:21', '2020-11-03 05:52:51'),
(5, 'email-marketing', 49, 2, 'Email Marketing', 'email-marketing', 'fas fa-mail-bulk', 0, 1, '2020-01-31 18:10:21', '2020-11-03 05:52:51'),
(6, 'services-4', 2, 4, 'Services 4', 'services-4', 'fa fa-hand-o-right', 0, 0, '2020-01-31 18:10:21', '2020-11-03 05:52:51'),
(7, 'services-5', 2, 5, 'Services 5', 'services-5', 'fa fa-hand-o-right', 0, 0, '2020-01-31 18:10:21', '2020-11-03 05:52:51'),
(8, 'services-1-1', 3, 1, 'Services 1.1', 'services-1-1', 'fa fa-check', 0, 0, '2020-01-31 18:10:21', '2020-11-03 05:52:51'),
(10, 'services-1-3', 3, 3, 'Services 1.3', 'services-1-3', 'fa fa-check', 0, 1, '2020-01-31 18:10:21', '2020-11-03 05:52:51'),
(11, 'flat', 0, 2, 'Flat', '#', 'fa fa-home', 1, 1, '2020-01-31 18:10:21', '2020-12-26 10:25:56'),
(12, 'add-flat', 11, 1, 'Add Flat', '/add-flat', NULL, 1, 1, '2020-01-31 18:13:33', '2020-11-03 05:52:51'),
(13, 'flats', 11, 2, 'All Flat List', '/view-flat', NULL, 1, 1, '2020-01-31 18:15:56', '2020-11-03 05:52:51'),
(14, 'renter-flat', 0, 4, 'Renter Flat', '#', 'fas fa-person-booth', 1, 1, '2020-01-31 18:24:09', '2020-11-03 05:52:51'),
(15, 'monthly-total', 0, 5, 'Monthly Total', '#', 'fas fa-money-bill-wave', 1, 1, '2020-01-31 18:25:45', '2020-11-03 05:52:51'),
(16, 'passport-management', 0, 7, 'Passport Management', '#', 'fa fa-book', 0, 1, '2020-01-31 18:26:34', '2020-11-03 05:52:51'),
(17, 'package-management', 0, 6, 'Package Management', '#', 'fa fa-box', 0, 1, '2020-01-31 18:28:44', '2020-11-03 05:52:51'),
(18, 'add-renter-flat-information', 14, 1, 'Add Renter Flat Information', '/add-rflat', NULL, 1, 1, '2020-01-31 18:34:37', '2020-11-03 05:52:51'),
(19, 'show-renter-flat-information', 14, 2, 'Show Renter Flat Information', '/view-rflat', NULL, 1, 1, '2020-01-31 18:36:47', '2020-11-03 05:52:51'),
(20, 'add-total', 15, 1, 'Add Total', '/add-total', NULL, 1, 1, '2020-01-31 18:38:09', '2020-11-03 05:52:51'),
(21, 'view-total', 15, 2, 'View Total', '/view-total', NULL, 1, 1, '2020-01-31 18:39:00', '2020-11-03 05:52:51'),
(22, 'add-hajj-package', 17, 1, 'Add Hajj Package', 'hajj-package/create', NULL, 0, 1, '2020-01-31 18:53:50', '2020-11-03 05:52:51'),
(23, 'all-hajj-package', 14, 3, 'All Hajj Packages', 'hajj-package', NULL, 0, 0, '2020-01-31 18:55:22', '2020-11-03 05:52:51'),
(24, 'add-omra-hajj-package', 17, 3, 'Add Omra Hajj Package', 'omra-hajj-package/create', NULL, 0, 1, '2020-01-31 18:57:17', '2020-11-03 05:52:51'),
(25, 'monthly-receipt', 15, 3, 'Monthly Receipt', '/create-receipt', NULL, 1, 1, '2020-01-31 18:58:06', '2020-11-04 07:29:23'),
(26, 'add-passport-information', 16, 1, 'Add Passport Information', 'passport-info/create', NULL, 0, 1, '2020-01-31 19:13:32', '2020-11-03 05:52:51'),
(27, 'all-passport-list', 16, 2, 'All Passport List', 'passport-info', NULL, 0, 1, '2020-01-31 19:15:26', '2020-11-03 05:52:51'),
(28, 'check-passport-history', 16, 4, 'Check Passport History', 'passport-history', NULL, 0, 1, '2020-01-31 19:21:30', '2020-11-03 05:52:51'),
(29, 'reports', 0, 8, 'Reports', '#', 'fa fa-home', 1, 1, '2020-01-31 19:26:08', '2020-11-03 05:52:51'),
(30, 'sms-sending-system', 49, 1, 'SMS Sending System', 'sms-sending-system', 'fa fa-mobile', 0, 1, '2020-01-31 19:29:10', '2020-11-03 05:52:51'),
(31, 'customer-payment-details', 11, 3, 'Customer Payment Details', 'customer-payment', NULL, 0, 1, '2020-02-03 22:01:18', '2020-11-03 05:52:51'),
(32, 'haji-payment-details', 14, 3, 'Haji Payment Details', 'haji-payment-details', NULL, 0, 0, '2020-02-03 22:03:06', '2020-11-03 05:52:51'),
(33, 'omra-haji-payment-details', 15, 3, 'Umrah Payment Details', 'omra-haji-payment-details', NULL, 0, 1, '2020-02-03 22:05:07', '2020-11-03 05:52:51'),
(34, 'makka-madina-management', 0, 6, 'Makka Madina Management', '#', 'fa fa-star', 0, 1, '2020-02-03 22:09:18', '2020-11-03 05:52:51'),
(35, 'hotel-rate-list', 34, 1, 'Hotel Rate List', 'hotel-rate', NULL, 0, 1, '2020-02-03 22:11:52', '2020-11-03 05:52:51'),
(36, 'vehicle-rate-list', 34, 2, 'Airlines Rate List', 'vehicle-rate', NULL, 0, 1, '2020-02-03 22:12:50', '2020-11-03 05:52:51'),
(37, 'total-report', 29, 1, 'Monthly Total Report', 'total-report', NULL, 1, 1, '2020-02-03 22:17:31', '2020-11-03 07:38:41'),
(38, 'haji-report', 29, 2, 'Haji Report', 'haji-report', NULL, 0, 1, '2020-02-03 22:18:00', '2020-11-03 05:52:51'),
(39, 'omra-haji-report', 29, 3, 'Omra Haji Report', 'omra-haji-report', NULL, 0, 1, '2020-02-03 22:18:53', '2020-11-03 05:52:51'),
(40, 'passport-report', 29, 4, 'Passport Report', 'passport-report', NULL, 0, 1, '2020-02-03 22:19:50', '2020-11-03 05:52:51'),
(43, 'accounts-management', 0, 10, 'Accounts Management', '#', 'fa fa-money-bill-wave', 0, 1, '2020-02-09 19:30:16', '2020-11-03 05:52:51'),
(44, 'deposit-list', 43, 1, 'List of Deposits', 'deposit-list', 'fa fa-plus', 0, 1, '2020-02-09 19:31:49', '2020-11-03 05:52:51'),
(45, 'expense-list', 43, 2, 'List of Expenses', 'expense-list', 'fa fa-minus', 0, 1, '2020-02-09 19:32:33', '2020-11-03 05:52:51'),
(46, 'cash-in-hand', 43, 3, 'Cash in Hand', 'cash-in-hand', 'fa fa-hand', 0, 1, '2020-02-09 19:33:12', '2020-11-03 05:52:51'),
(47, 'hajj-groups', 14, 3, 'Hajj Group List', 'hajj-groups', NULL, 0, 0, '2020-02-16 03:32:46', '2020-11-03 05:52:51'),
(48, 'omra-hajj-groups', 15, 3, 'Omra Hajj Group List', 'omra-hajj-groups', NULL, 0, 1, '2020-02-16 03:33:55', '2020-11-03 05:52:51'),
(49, 'marketing-management', 0, 10, 'Marketing Management', '#', 'fas fa-poll', 0, 1, '2020-03-08 17:39:49', '2020-11-03 05:52:51'),
(50, 'ticket-management', 0, 11, 'Ticket Management', '#', 'la la-ticket', 0, 1, '2020-03-08 17:40:24', '2020-11-03 05:52:51'),
(51, 'visa-management', 0, 12, 'Visa Management', 'visa-management', 'la la-cc-visa', 0, 1, '2020-03-08 17:40:42', '2020-11-03 05:52:51'),
(52, 'passport-collection', 16, 3, 'Passport Collection', 'passport-collection', NULL, 0, 1, '2020-03-15 17:58:15', '2020-11-03 05:52:51'),
(53, 'ticketing-airlines', 50, 1, 'Ticketing Airlines List', 'ticketing-airlines', NULL, 0, 1, '2020-10-20 17:10:14', '2020-11-03 05:52:51'),
(54, 'ticket-sales', 50, 2, 'Ticket Sales', 'ticket-sales', NULL, 0, 1, '2020-10-20 17:10:14', '2020-11-03 05:52:51'),
(55, 'ticket-refund', 50, 3, 'Ticket Refund', 'ticket-refund', NULL, 0, 1, '2020-10-20 17:10:14', '2020-11-03 05:52:51'),
(56, 'ticket-sales-commission', 50, 4, 'Ticket Sales Commission', 'ticket-sales-commission', NULL, 0, 1, '2020-10-20 17:10:14', '2020-11-03 05:52:51'),
(57, 'house', 0, 1, 'House', '#', 'fa fa-building', 1, 1, '2020-12-26 10:22:13', '2020-12-26 10:29:27'),
(58, 'add-house', 57, 1, 'Add House', 'add-house', NULL, 1, 1, '2020-12-26 10:30:33', '2020-12-26 10:30:33'),
(59, 'view-house', 57, 2, 'All House List', 'view-house', NULL, 1, 1, '2020-12-26 10:31:37', '2020-12-26 10:31:37');

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
(4, '2019_09_03_139999_add_new_columns_to_users_table', 2),
(5, '2019_09_03_141000_create_dev_developer_details_table', 2),
(6, '2019_09_03_141001_create_priorities_table', 2),
(7, '2019_09_03_154934_create_menus_table', 2),
(8, '2019_09_03_183043_create_priority_menu_table', 2),
(9, '2019_09_03_185154_create_dev_mode_setup_table', 2),
(10, '2019_09_03_185527_create_dev_app_details_table', 2),
(11, '2019_10_17_080139_create_profiles_table', 2),
(12, '2020_01_27_173921_create_groups_table', 3),
(13, '2020_01_27_173950_create_customers_table', 3),
(14, '2020_01_27_174200_create_customer_passports_table', 3),
(15, '2020_01_27_174241_create_payments_table', 3),
(16, '2020_01_27_174255_create_packages_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_totals`
--

CREATE TABLE `monthly_totals` (
  `mt_id` bigint(20) UNSIGNED NOT NULL,
  `llord` bigint(20) DEFAULT NULL,
  `mt_rf_id` bigint(20) UNSIGNED NOT NULL,
  `m_house` text,
  `flat_number` varchar(100) DEFAULT NULL,
  `renter_name` text,
  `mt_date` date DEFAULT NULL,
  `mt_rent` int(255) DEFAULT NULL,
  `mt_water` int(255) DEFAULT NULL,
  `mt_gas` int(255) DEFAULT NULL,
  `mt_sewer` int(255) DEFAULT NULL,
  `mt_others_cost` int(255) DEFAULT NULL,
  `mt_maintain` int(100) DEFAULT NULL,
  `mt_current` int(255) DEFAULT NULL,
  `total_money` int(255) DEFAULT NULL,
  `payment_status` text,
  `payment_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monthly_totals`
--

INSERT INTO `monthly_totals` (`mt_id`, `llord`, `mt_rf_id`, `m_house`, `flat_number`, `renter_name`, `mt_date`, `mt_rent`, `mt_water`, `mt_gas`, `mt_sewer`, `mt_others_cost`, `mt_maintain`, `mt_current`, `total_money`, `payment_status`, `payment_date`, `created_at`, `updated_at`) VALUES
(50, 3, 37, 'Samer Villa', 'Q3', 'Sohana Afroz', '2021-02-10', 1500, 220, 0, 0, 0, 0, 0, 1720, 'Yes', '2021-02-02', '2020-12-29 07:17:27', '2021-09-21 04:37:15'),
(51, 3, 37, 'Samer Villa', 'Q3', 'Sohana Afroz', '2021-01-13', 1500, 220, 0, 0, 0, 0, 0, 1720, 'Yes', '2021-01-06', '2020-12-29 07:18:55', '2020-12-29 07:18:55'),
(52, 3, 38, 'Nishu Villa', 'Q3', 'Rafeen Khan', '2021-01-20', 1700, 0, 0, 0, 0, 0, 0, 1700, 'Yes', '2021-01-12', '2020-12-29 09:43:20', '2020-12-29 09:43:20'),
(53, 1, 39, 'Haunted Mansion', 'A1', 'Peter Parker', '2021-01-13', 17500, 0, 500, 0, 0, 0, 0, 18000, 'Yes', '2021-01-10', '2020-12-30 06:04:46', '2020-12-31 11:13:28'),
(54, 1, 39, 'Haunted Mansion', 'A1', 'Peter Parker', '2020-12-22', 17500, 0, 500, 0, 0, 0, 0, 18000, 'Yes', '2020-12-08', '2020-12-30 10:15:29', '2020-12-30 10:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Hajj | 2=Omra Hajj',
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `hijri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `no_of_days` int(11) NOT NULL DEFAULT '0',
  `makka_arrival_date` date DEFAULT NULL,
  `madina_arrival_date` date DEFAULT NULL,
  `makka_ziyarah_date` date DEFAULT NULL,
  `madinaa_ziyarah_date` date DEFAULT NULL,
  `hotel_id` int(20) NOT NULL,
  `vehicle_id` int(20) NOT NULL,
  `total_price` double NOT NULL DEFAULT '0',
  `package_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Inactive | 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_type`, `package_name`, `pack_code`, `year`, `hijri`, `start_date`, `end_date`, `no_of_days`, `makka_arrival_date`, `madina_arrival_date`, `makka_ziyarah_date`, `madinaa_ziyarah_date`, `hotel_id`, `vehicle_id`, `total_price`, `package_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gold Package 2020', 'GP-2020', 2020, '1441', '2020-04-01', '2020-04-29', 29, '2020-11-01', '2020-11-07', '2020-11-02', '2020-11-04', 1, 4, 500000, NULL, 1, '2020-02-04 06:10:38', '2020-10-10 00:06:31'),
(3, 2, 'Package 1', '555X223', 2012, NULL, '2020-06-01', '2020-06-16', 15, NULL, NULL, NULL, NULL, 2, 5, 200000, NULL, 1, '2020-02-04 06:11:51', '2020-03-15 05:22:55'),
(4, 2, '7 March Grand Package', '703-2020', 2020, NULL, '2020-03-07', '2020-03-21', 5, NULL, NULL, NULL, NULL, 3, 6, 95000, NULL, 1, '2020-02-04 23:55:03', '2020-03-15 05:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `passport_documents`
--

CREATE TABLE `passport_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_passport_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive | 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passport_documents`
--

INSERT INTO `passport_documents` (`id`, `customer_passport_id`, `title`, `document`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, 'Image', '1602225642 - images.png', 1, '2020-10-09 17:40:42', '2020-10-09 17:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `passport_history`
--

CREATE TABLE `passport_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `passport_id` bigint(20) NOT NULL,
  `passport_status_id` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passport_history`
--

INSERT INTO `passport_history` (`id`, `passport_id`, `passport_status_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-02-19 18:05:28', '2020-02-20 06:05:28', '2020-02-20 06:05:28'),
(2, 3, 1, '2020-02-19 18:06:02', '2020-02-20 06:06:02', '2020-02-20 06:06:02'),
(3, 3, 2, '2020-02-19 18:06:09', '2020-02-20 06:06:09', '2020-02-20 06:06:09'),
(4, 3, 3, '2020-02-25 05:30:17', '2020-02-25 17:30:17', '2020-02-25 17:30:17'),
(5, 3, 4, '2020-02-26 10:51:25', '2020-02-26 22:51:25', '2020-02-26 22:51:25'),
(6, 3, 5, '2020-02-26 10:51:34', '2020-02-26 22:51:34', '2020-02-26 22:51:34'),
(7, 3, 6, '2020-02-26 10:53:05', '2020-02-26 22:53:05', '2020-02-26 22:53:05'),
(8, 3, 7, '2020-02-26 10:53:29', '2020-02-26 22:53:29', '2020-02-26 22:53:29'),
(9, 1, 3, '2020-03-07 07:56:05', '2020-03-07 19:56:05', '2020-03-07 19:56:05'),
(10, 1, 7, '2020-03-07 07:56:25', '2020-03-07 19:56:25', '2020-03-07 19:56:25'),
(11, 5, 3, '2020-09-02 06:41:04', '2020-09-02 17:41:04', '2020-09-02 17:41:04'),
(12, 9, 1, '2020-10-20 17:05:12', '2020-10-20 17:05:12', '2020-10-20 17:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `passport_statuses`
--

CREATE TABLE `passport_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` bigint(20) DEFAULT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passport_statuses`
--

INSERT INTO `passport_statuses` (`id`, `serial_no`, `status_name`, `description`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Passport Received', NULL, 1, '2020-02-20 03:36:11', '2020-02-20 03:36:11'),
(2, 2, 'Passport Kept in Box 01', NULL, 2, '2020-02-20 03:36:11', '2020-02-20 03:36:11'),
(3, 3, 'Passport Sent for Visa', NULL, 3, '2020-02-20 03:36:11', '2020-02-20 03:36:11'),
(4, 4, 'Passport received from Embassy ', NULL, 4, '2020-02-20 03:36:11', '2020-02-20 03:36:11'),
(6, 5, 'Issue Ticket', NULL, 2, '2020-02-20 03:36:11', '2020-02-20 03:36:11'),
(7, 6, 'Passport Kept in Box 02 after visa', NULL, 5, '2020-02-20 03:36:11', '2020-02-20 03:36:11'),
(8, 7, 'Passport Delivered to Client', NULL, NULL, '2020-02-20 03:36:11', '2020-02-20 03:36:11');

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
  `customer_id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  `voucher_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_type` tinyint(4) NOT NULL COMMENT '1=Cash | 2=Bank',
  `depositor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_date` datetime DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` text COLLATE utf8mb4_unicode_ci,
  `paid_amount` double NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `priority_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `priority_name`, `priority_description`, `priority_status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Super Admin. This user has complete control in the application.', '1', '2020-01-27 22:11:05', '2020-01-27 22:11:05'),
(2, 'General Admin', 'General Admin', '1', '2020-02-02 21:21:03', '2020-02-02 21:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `priority_menu`
--

CREATE TABLE `priority_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `priority_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priority_menu`
--

INSERT INTO `priority_menu` (`id`, `priority_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(886, 1, 1, NULL, NULL),
(887, 1, 57, NULL, NULL),
(888, 1, 58, NULL, NULL),
(889, 1, 59, NULL, NULL),
(890, 1, 11, NULL, NULL),
(891, 1, 12, NULL, NULL),
(892, 1, 13, NULL, NULL),
(893, 1, 31, NULL, NULL),
(894, 1, 2, NULL, NULL),
(895, 1, 3, NULL, NULL),
(896, 1, 4, NULL, NULL),
(897, 1, 14, NULL, NULL),
(898, 1, 18, NULL, NULL),
(899, 1, 19, NULL, NULL),
(900, 1, 15, NULL, NULL),
(901, 1, 20, NULL, NULL),
(902, 1, 21, NULL, NULL),
(903, 1, 25, NULL, NULL),
(904, 1, 33, NULL, NULL),
(905, 1, 48, NULL, NULL),
(906, 1, 17, NULL, NULL),
(907, 1, 22, NULL, NULL),
(908, 1, 24, NULL, NULL),
(909, 1, 34, NULL, NULL),
(910, 1, 35, NULL, NULL),
(911, 1, 36, NULL, NULL),
(912, 1, 16, NULL, NULL),
(913, 1, 26, NULL, NULL),
(914, 1, 27, NULL, NULL),
(915, 1, 52, NULL, NULL),
(916, 1, 28, NULL, NULL),
(917, 1, 29, NULL, NULL),
(918, 1, 37, NULL, NULL),
(919, 1, 38, NULL, NULL),
(920, 1, 39, NULL, NULL),
(921, 1, 40, NULL, NULL),
(922, 1, 43, NULL, NULL),
(923, 1, 44, NULL, NULL),
(924, 1, 45, NULL, NULL),
(925, 1, 46, NULL, NULL),
(926, 1, 49, NULL, NULL),
(927, 1, 30, NULL, NULL),
(928, 1, 5, NULL, NULL),
(929, 1, 50, NULL, NULL),
(930, 1, 53, NULL, NULL),
(931, 1, 54, NULL, NULL),
(932, 1, 55, NULL, NULL),
(933, 1, 56, NULL, NULL),
(934, 1, 51, NULL, NULL),
(935, 2, 1, NULL, NULL),
(936, 2, 57, NULL, NULL),
(937, 2, 58, NULL, NULL),
(938, 2, 59, NULL, NULL),
(939, 2, 11, NULL, NULL),
(940, 2, 12, NULL, NULL),
(941, 2, 13, NULL, NULL),
(942, 2, 2, NULL, NULL),
(943, 2, 3, NULL, NULL),
(944, 2, 4, NULL, NULL),
(945, 2, 14, NULL, NULL),
(946, 2, 18, NULL, NULL),
(947, 2, 19, NULL, NULL),
(948, 2, 15, NULL, NULL),
(949, 2, 20, NULL, NULL),
(950, 2, 21, NULL, NULL),
(951, 2, 25, NULL, NULL),
(952, 2, 29, NULL, NULL),
(953, 2, 37, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `phone`, `company_name`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, '01733333333', 'Acquaint Technologies', NULL, '2020-01-30 21:02:13', '2020-01-30 21:02:13'),
(2, 2, '01222322544', 'ABCABC', 'ABCABCABCABC ABCABC ABCABC ABCABC ABCABC', '2021-09-21 05:15:16', '2021-09-21 05:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `renters`
--

CREATE TABLE `renters` (
  `r_id` bigint(20) UNSIGNED NOT NULL,
  `landlord_id` bigint(20) DEFAULT NULL,
  `r_name` text,
  `father` text,
  `birthday` date DEFAULT NULL,
  `marital_status` text,
  `r_phone` varchar(100) DEFAULT NULL,
  `r_email` varchar(100) DEFAULT NULL,
  `per_address` varchar(255) DEFAULT NULL,
  `occupation` text,
  `company` text,
  `religion` text,
  `qualification` text,
  `r_nid` text,
  `p` int(20) DEFAULT NULL,
  `e_full_name` text,
  `e_rel` text,
  `e_add` text,
  `e_phone` text,
  `member_name_one` text,
  `member_age_one` int(20) DEFAULT NULL,
  `member_occupation_one` text,
  `member_phone_one` text,
  `member_name_two` text,
  `member_age_two` int(20) DEFAULT NULL,
  `member_occupation_two` text,
  `member_phone_two` text,
  `member_name_three` text,
  `member_age_three` int(20) DEFAULT NULL,
  `member_occupation_three` text,
  `member_phone_three` text,
  `maid_name` text,
  `maid_nid` bigint(100) DEFAULT NULL,
  `maid_phone` text,
  `maid_address` text,
  `driver_name` text,
  `driver_nid` int(20) DEFAULT NULL,
  `driver_phone` text,
  `driver_address` text,
  `pre_owner_name` text,
  `pre_owner_phone` text,
  `pre_owner_address` text,
  `reason` text,
  `new_owner_name` text,
  `new_owner_phone` text,
  `new_house_start_date` date DEFAULT NULL,
  `r_image` text,
  `status` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `renters`
--

INSERT INTO `renters` (`r_id`, `landlord_id`, `r_name`, `father`, `birthday`, `marital_status`, `r_phone`, `r_email`, `per_address`, `occupation`, `company`, `religion`, `qualification`, `r_nid`, `p`, `e_full_name`, `e_rel`, `e_add`, `e_phone`, `member_name_one`, `member_age_one`, `member_occupation_one`, `member_phone_one`, `member_name_two`, `member_age_two`, `member_occupation_two`, `member_phone_two`, `member_name_three`, `member_age_three`, `member_occupation_three`, `member_phone_three`, `maid_name`, `maid_nid`, `maid_phone`, `maid_address`, `driver_name`, `driver_nid`, `driver_phone`, `driver_address`, `pre_owner_name`, `pre_owner_phone`, `pre_owner_address`, `reason`, `new_owner_name`, `new_owner_phone`, `new_house_start_date`, `r_image`, `status`, `created_at`, `updated_at`) VALUES
(30, 3, 'Sohana Afroz', 'Salam Rahman', '1993-12-12', 'Unmarried', '01513470130', 'sohana@gmail.com', 'paltan, Dhaka', 'Job Holder', 'Justice League', 'Islam', 'Bachelors', '1234567895', 12365478, 'Safi', 'Brother', 'Laalbagh,Dhaka', '01313470120', 'Safi', 40, 'Job Holder', '01313470120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Anwar', 1236547868, '017134701320', 'Chandpur', 'Samer Kauser', '01913470130', 'Laalmatia, Dhaka', 'Electricity Problem', 'Kader Zilani', '01413470130', '2020-12-02', 'public/admin/renter-images/e60f456ed23914c10c28bc68e069673d.jpg', 1, '2020-12-23 06:46:49', '2020-12-23 06:46:49'),
(31, 3, 'Rafeen Khan', 'Mahbub Rahman', '2000-08-10', 'Unmarried', '01513470130', 'rafin@gmail.com', 'Laalmatia, Dhaka', 'Unemployed', NULL, 'Islam', 'Honours', '1236547852', 1234560, 'Mahbub Alam', 'Uncle', 'Mirpur', '01313470120', 'Joy Mahmud', 24, 'Job Holder', '01313470120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Salam Murshed', '01913470130', 'Laalmatia, Dhaka', 'Water supply problem', 'Wahab Riaz', '01413470130', '2021-01-02', 'public/admin/renter-images/4d949724336ba30cf51e5cc48fcdb537.png', 1, '2020-12-29 09:27:37', '2020-12-29 09:27:37'),
(32, 1, 'Peter Parker', 'Benjamin Parker', '1996-12-30', 'Unmarried', '01513470130', 'peter@gmail.com', '12/1 Steve street, Queens', 'Student', NULL, 'Christianity', 'SSC', '2587413695', 12365474, 'May Parker', 'Auntie', '12/1 Steve street, Queens', '01313470120', 'May Parker', 45, 'Housewife', '01313470120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bruce Wayne', '01913470130', 'Wayne Tower, Gotham City', 'Rent is two much high, tough behaviour', 'Tony Stark', '01413470130', '2020-12-30', 'public/admin/renter-images/Tom+Holland+Heart+Sea+New+York+Premiere+Red+ApeGfqG5rZ-l.jpg', 1, '2020-12-30 05:36:48', '2020-12-30 05:36:48'),
(33, 1, 'Wanda Maximoff', 'Eric Lensher', '1990-12-10', 'Unmarried', '01813970160', 'maximoff@gmail.com', '15/7 Vision road, Edinburgh, Scotland', 'Self Employed', NULL, 'Christianity', 'Honours', '1457823594', 123654786, 'Vision Jarvis', 'Husband', '15/7 Vision road, Edinburgh, Scotland', '01915470150', 'Pietro Maximoff', 27, 'Job Holder', '01471470150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tony Stark', '01913470130', 'Avengers Tower, NY', 'Car parking problem', 'Bruce Wayne', '01413470130', '2020-12-17', 'public/admin/renter-images/e1a60e5e2c1439e6e550647d3fb7c8ab.jpg', NULL, '2020-12-30 06:02:05', '2020-12-30 06:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `renter_flats`
--

CREATE TABLE `renter_flats` (
  `rf_id` bigint(20) UNSIGNED NOT NULL,
  `landlord` bigint(20) DEFAULT NULL,
  `renter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `flat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `advance` int(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `rent` int(255) DEFAULT NULL,
  `water` int(255) DEFAULT NULL,
  `gas` int(255) DEFAULT '0',
  `sewer` int(255) DEFAULT '0',
  `others` int(255) DEFAULT '0',
  `maintain_cost` int(255) DEFAULT '0',
  `current` int(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `renter_flats`
--

INSERT INTO `renter_flats` (`rf_id`, `landlord`, `renter_id`, `flat_id`, `advance`, `start_date`, `end_date`, `rent`, `water`, `gas`, `sewer`, `others`, `maintain_cost`, `current`, `created_at`, `updated_at`) VALUES
(36, 3, 30, 19, 7000, '2020-12-05', NULL, 12500, 70, 80, 40, 50, 100, 200, '2020-12-23 06:52:33', '2020-12-23 06:57:38'),
(37, 3, 30, 35, 2500, '2020-12-29', NULL, 1500, 220, 0, 0, 0, 0, 0, '2020-12-29 07:08:46', '2020-12-29 07:09:12'),
(38, 3, 31, 37, 2500, '2020-12-01', NULL, 1700, 0, 0, 0, 0, 0, 0, '2020-12-29 09:41:04', '2020-12-29 09:41:04'),
(39, 1, 32, 38, 2500, '2021-01-02', NULL, 17500, 0, 0, 0, 0, 0, 0, '2020-12-30 06:03:08', '2020-12-30 06:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive | 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `service_type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hajj', NULL, 1, '2020-02-13 03:49:04', '2020-02-13 03:49:04'),
(2, 'Omra Hajj', NULL, 1, '2020-02-13 03:49:04', '2020-02-13 03:49:04'),
(3, 'Ticketing', NULL, 1, '2020-02-13 03:49:04', '2020-02-13 03:49:04'),
(4, 'Visa', NULL, 1, '2020-02-13 03:49:04', '2020-02-13 03:49:04'),
(5, 'Others', NULL, 1, '2020-02-13 03:49:04', '2020-02-13 03:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int(3) NOT NULL,
  `district_id` int(2) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার'),
(2, 1, 'Barura', 'বরুড়া'),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া'),
(4, 1, 'Chandina', 'চান্দিনা'),
(5, 1, 'Chauddagram', 'চৌদ্দগ্রাম'),
(6, 1, 'Daudkandi', 'দাউদকান্দি'),
(7, 1, 'Homna', 'হোমনা'),
(8, 1, 'Laksam', 'লাকসাম'),
(9, 1, 'Muradnagar', 'মুরাদনগর'),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট'),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর'),
(12, 1, 'Meghna', 'মেঘনা'),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ'),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ'),
(15, 1, 'Titas', 'তিতাস'),
(16, 1, 'Burichang', 'বুড়িচং'),
(17, 1, 'Lalmai', 'লালমাই'),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া'),
(19, 2, 'Feni Sadar', 'ফেনী সদর'),
(20, 2, 'Sonagazi', 'সোনাগাজী'),
(21, 2, 'Fulgazi', 'ফুলগাজী'),
(22, 2, 'Parshuram', 'পরশুরাম'),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা'),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর'),
(25, 3, 'Kasba', 'কসবা'),
(26, 3, 'Nasirnagar', 'নাসিরনগর'),
(27, 3, 'Sarail', 'সরাইল'),
(28, 3, 'Ashuganj', 'আশুগঞ্জ'),
(29, 3, 'Akhaura', 'আখাউড়া'),
(30, 3, 'Nabinagar', 'নবীনগর'),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর'),
(32, 3, 'Bijoynagar', 'বিজয়নগর'),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর'),
(34, 4, 'Kaptai', 'কাপ্তাই'),
(35, 4, 'Kawkhali', 'কাউখালী'),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি'),
(37, 4, 'Barkal', 'বরকল'),
(38, 4, 'Langadu', 'লংগদু'),
(39, 4, 'Rajasthali', 'রাজস্থলী'),
(40, 4, 'Belaichari', 'বিলাইছড়ি'),
(41, 4, 'Juraichari', 'জুরাছড়ি'),
(42, 4, 'Naniarchar', 'নানিয়ারচর'),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর'),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ'),
(45, 5, 'Begumganj', 'বেগমগঞ্জ'),
(46, 5, 'Hatia', 'হাতিয়া'),
(47, 5, 'Subarnachar', 'সুবর্ণচর'),
(48, 5, 'Kabirhat', 'কবিরহাট'),
(49, 5, 'Senbug', 'সেনবাগ'),
(50, 5, 'Chatkhil', 'চাটখিল'),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী'),
(52, 6, 'Haimchar', 'হাইমচর'),
(53, 6, 'Kachua', 'কচুয়া'),
(54, 6, 'Shahrasti', 'শাহরাস্তি	'),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর'),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ'),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ'),
(58, 6, 'Matlab North', 'মতলব উত্তর'),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ'),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর'),
(61, 7, 'Kamalnagar', 'কমলনগর'),
(62, 7, 'Raipur', 'রায়পুর'),
(63, 7, 'Ramgati', 'রামগতি'),
(64, 7, 'Ramganj', 'রামগঞ্জ'),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া'),
(66, 8, 'Sitakunda', 'সীতাকুন্ড'),
(67, 8, 'Mirsharai', 'মীরসরাই'),
(68, 8, 'Patiya', 'পটিয়া'),
(69, 8, 'Sandwip', 'সন্দ্বীপ'),
(70, 8, 'Banshkhali', 'বাঁশখালী'),
(71, 8, 'Boalkhali', 'বোয়ালখালী'),
(72, 8, 'Anwara', 'আনোয়ারা'),
(73, 8, 'Chandanaish', 'চন্দনাইশ'),
(74, 8, 'Satkania', 'সাতকানিয়া'),
(75, 8, 'Lohagara', 'লোহাগাড়া'),
(76, 8, 'Hathazari', 'হাটহাজারী'),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি'),
(78, 8, 'Raozan', 'রাউজান'),
(79, 8, 'Karnafuli', 'কর্ণফুলী'),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর'),
(81, 9, 'Chakaria', 'চকরিয়া'),
(82, 9, 'Kutubdia', 'কুতুবদিয়া'),
(83, 9, 'Ukhiya', 'উখিয়া'),
(84, 9, 'Moheshkhali', 'মহেশখালী'),
(85, 9, 'Pekua', 'পেকুয়া'),
(86, 9, 'Ramu', 'রামু'),
(87, 9, 'Teknaf', 'টেকনাফ'),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর'),
(89, 10, 'Dighinala', 'দিঘীনালা'),
(90, 10, 'Panchari', 'পানছড়ি'),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি'),
(92, 10, 'Mohalchari', 'মহালছড়ি'),
(93, 10, 'Manikchari', 'মানিকছড়ি'),
(94, 10, 'Ramgarh', 'রামগড়'),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা'),
(96, 10, 'Guimara', 'গুইমারা'),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর'),
(98, 11, 'Alikadam', 'আলীকদম'),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি'),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি'),
(101, 11, 'Lama', 'লামা'),
(102, 11, 'Ruma', 'রুমা'),
(103, 11, 'Thanchi', 'থানচি'),
(104, 12, 'Belkuchi', 'বেলকুচি'),
(105, 12, 'Chauhali', 'চৌহালি'),
(106, 12, 'Kamarkhand', 'কামারখন্দ'),
(107, 12, 'Kazipur', 'কাজীপুর'),
(108, 12, 'Raigonj', 'রায়গঞ্জ'),
(109, 12, 'Shahjadpur', 'শাহজাদপুর'),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর'),
(111, 12, 'Tarash', 'তাড়াশ'),
(112, 12, 'Ullapara', 'উল্লাপাড়া'),
(113, 13, 'Sujanagar', 'সুজানগর'),
(114, 13, 'Ishurdi', 'ঈশ্বরদী'),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া'),
(116, 13, 'Pabna Sadar', 'পাবনা সদর'),
(117, 13, 'Bera', 'বেড়া'),
(118, 13, 'Atghoria', 'আটঘরিয়া'),
(119, 13, 'Chatmohar', 'চাটমোহর'),
(120, 13, 'Santhia', 'সাঁথিয়া'),
(121, 13, 'Faridpur', 'ফরিদপুর'),
(122, 14, 'Kahaloo', 'কাহালু'),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর'),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি'),
(125, 14, 'Shajahanpur', 'শাজাহানপুর'),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া'),
(127, 14, 'Adamdighi', 'আদমদিঘি'),
(128, 14, 'Nondigram', 'নন্দিগ্রাম'),
(129, 14, 'Sonatala', 'সোনাতলা'),
(130, 14, 'Dhunot', 'ধুনট'),
(131, 14, 'Gabtali', 'গাবতলী'),
(132, 14, 'Sherpur', 'শেরপুর'),
(133, 14, 'Shibganj', 'শিবগঞ্জ'),
(134, 15, 'Paba', 'পবা'),
(135, 15, 'Durgapur', 'দুর্গাপুর'),
(136, 15, 'Mohonpur', 'মোহনপুর'),
(137, 15, 'Charghat', 'চারঘাট'),
(138, 15, 'Puthia', 'পুঠিয়া'),
(139, 15, 'Bagha', 'বাঘা'),
(140, 15, 'Godagari', 'গোদাগাড়ী'),
(141, 15, 'Tanore', 'তানোর'),
(142, 15, 'Bagmara', 'বাগমারা'),
(143, 16, 'Natore Sadar', 'নাটোর সদর'),
(144, 16, 'Singra', 'সিংড়া'),
(145, 16, 'Baraigram', 'বড়াইগ্রাম'),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া'),
(147, 16, 'Lalpur', 'লালপুর'),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর'),
(149, 16, 'Naldanga', 'নলডাঙ্গা'),
(150, 17, 'Akkelpur', 'আক্কেলপুর'),
(151, 17, 'Kalai', 'কালাই'),
(152, 17, 'Khetlal', 'ক্ষেতলাল'),
(153, 17, 'Panchbibi', 'পাঁচবিবি'),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর'),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর'),
(156, 18, 'Gomostapur', 'গোমস্তাপুর'),
(157, 18, 'Nachol', 'নাচোল'),
(158, 18, 'Bholahat', 'ভোলাহাট'),
(159, 18, 'Shibganj', 'শিবগঞ্জ'),
(160, 19, 'Mohadevpur', 'মহাদেবপুর'),
(161, 19, 'Badalgachi', 'বদলগাছী'),
(162, 19, 'Patnitala', 'পত্নিতলা'),
(163, 19, 'Dhamoirhat', 'ধামইরহাট'),
(164, 19, 'Niamatpur', 'নিয়ামতপুর'),
(165, 19, 'Manda', 'মান্দা'),
(166, 19, 'Atrai', 'আত্রাই'),
(167, 19, 'Raninagar', 'রাণীনগর'),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর'),
(169, 19, 'Porsha', 'পোরশা'),
(170, 19, 'Sapahar', 'সাপাহার'),
(171, 20, 'Manirampur', 'মণিরামপুর'),
(172, 20, 'Abhaynagar', 'অভয়নগর'),
(173, 20, 'Bagherpara', 'বাঘারপাড়া'),
(174, 20, 'Chougachha', 'চৌগাছা'),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা'),
(176, 20, 'Keshabpur', 'কেশবপুর'),
(177, 20, 'Jessore Sadar', 'যশোর সদর'),
(178, 20, 'Sharsha', 'শার্শা'),
(179, 21, 'Assasuni', 'আশাশুনি'),
(180, 21, 'Debhata', 'দেবহাটা'),
(181, 21, 'Kalaroa', 'কলারোয়া'),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর'),
(183, 21, 'Shyamnagar', 'শ্যামনগর'),
(184, 21, 'Tala', 'তালা'),
(185, 21, 'Kaliganj', 'কালিগঞ্জ'),
(186, 22, 'Mujibnagar', 'মুজিবনগর'),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর'),
(188, 22, 'Gangni', 'গাংনী'),
(189, 23, 'Narail Sadar', 'নড়াইল সদর'),
(190, 23, 'Lohagara', 'লোহাগড়া'),
(191, 23, 'Kalia', 'কালিয়া'),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর'),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা'),
(194, 24, 'Damurhuda', 'দামুড়হুদা'),
(195, 24, 'Jibannagar', 'জীবননগর'),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর'),
(197, 25, 'Kumarkhali', 'কুমারখালী'),
(198, 25, 'Khoksa', 'খোকসা'),
(199, 25, 'Mirpur', 'মিরপুর'),
(200, 25, 'Daulatpur', 'দৌলতপুর'),
(201, 25, 'Bheramara', 'ভেড়ামারা'),
(202, 26, 'Shalikha', 'শালিখা'),
(203, 26, 'Sreepur', 'শ্রীপুর'),
(204, 26, 'Magura Sadar', 'মাগুরা সদর'),
(205, 26, 'Mohammadpur', 'মহম্মদপুর'),
(206, 27, 'Paikgasa', 'পাইকগাছা'),
(207, 27, 'Fultola', 'ফুলতলা'),
(208, 27, 'Digholia', 'দিঘলিয়া'),
(209, 27, 'Rupsha', 'রূপসা'),
(210, 27, 'Terokhada', 'তেরখাদা'),
(211, 27, 'Dumuria', 'ডুমুরিয়া'),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা'),
(213, 27, 'Dakop', 'দাকোপ'),
(214, 27, 'Koyra', 'কয়রা'),
(215, 28, 'Fakirhat', 'ফকিরহাট'),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর'),
(217, 28, 'Mollahat', 'মোল্লাহাট'),
(218, 28, 'Sarankhola', 'শরণখোলা'),
(219, 28, 'Rampal', 'রামপাল'),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ'),
(221, 28, 'Kachua', 'কচুয়া'),
(222, 28, 'Mongla', 'মোংলা'),
(223, 28, 'Chitalmari', 'চিতলমারী'),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর'),
(225, 29, 'Shailkupa', 'শৈলকুপা'),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু'),
(227, 29, 'Kaliganj', 'কালীগঞ্জ'),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর'),
(229, 29, 'Moheshpur', 'মহেশপুর'),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর'),
(231, 30, 'Kathalia', 'কাঠালিয়া'),
(232, 30, 'Nalchity', 'নলছিটি'),
(233, 30, 'Rajapur', 'রাজাপুর'),
(234, 31, 'Bauphal', 'বাউফল'),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর'),
(236, 31, 'Dumki', 'দুমকি'),
(237, 31, 'Dashmina', 'দশমিনা'),
(238, 31, 'Kalapara', 'কলাপাড়া'),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ'),
(240, 31, 'Galachipa', 'গলাচিপা'),
(241, 31, 'Rangabali', 'রাঙ্গাবালী'),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর'),
(243, 32, 'Nazirpur', 'নাজিরপুর'),
(244, 32, 'Kawkhali', 'কাউখালী'),
(245, 32, 'Zianagar', 'জিয়ানগর'),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া'),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া'),
(248, 32, 'Nesarabad', 'নেছারাবাদ'),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর'),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ'),
(251, 33, 'Babuganj', 'বাবুগঞ্জ'),
(252, 33, 'Wazirpur', 'উজিরপুর'),
(253, 33, 'Banaripara', 'বানারীপাড়া'),
(254, 33, 'Gournadi', 'গৌরনদী'),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া'),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ'),
(257, 33, 'Muladi', 'মুলাদী'),
(258, 33, 'Hizla', 'হিজলা'),
(259, 34, 'Bhola Sadar', 'ভোলা সদর'),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন'),
(261, 34, 'Charfesson', 'চরফ্যাশন'),
(262, 34, 'Doulatkhan', 'দৌলতখান'),
(263, 34, 'Monpura', 'মনপুরা'),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন'),
(265, 34, 'Lalmohan', 'লালমোহন'),
(266, 35, 'Amtali', 'আমতলী'),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর'),
(268, 35, 'Betagi', 'বেতাগী'),
(269, 35, 'Bamna', 'বামনা'),
(270, 35, 'Pathorghata', 'পাথরঘাটা'),
(271, 35, 'Taltali', 'তালতলি'),
(272, 36, 'Balaganj', 'বালাগঞ্জ'),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার'),
(274, 36, 'Bishwanath', 'বিশ্বনাথ'),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ'),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ'),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ'),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট'),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর'),
(280, 36, 'Kanaighat', 'কানাইঘাট'),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর'),
(282, 36, 'Zakiganj', 'জকিগঞ্জ'),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা'),
(284, 36, 'Osmaninagar', 'ওসমানী নগর'),
(285, 37, 'Barlekha', 'বড়লেখা'),
(286, 37, 'Kamolganj', 'কমলগঞ্জ'),
(287, 37, 'Kulaura', 'কুলাউড়া'),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর'),
(289, 37, 'Rajnagar', 'রাজনগর'),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল'),
(291, 37, 'Juri', 'জুড়ী'),
(292, 38, 'Nabiganj', 'নবীগঞ্জ'),
(293, 38, 'Bahubal', 'বাহুবল'),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ'),
(295, 38, 'Baniachong', 'বানিয়াচং'),
(296, 38, 'Lakhai', 'লাখাই'),
(297, 38, 'Chunarughat', 'চুনারুঘাট'),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর'),
(299, 38, 'Madhabpur', 'মাধবপুর'),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর'),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ'),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর'),
(303, 39, 'Chhatak', 'ছাতক'),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর'),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার'),
(306, 39, 'Tahirpur', 'তাহিরপুর'),
(307, 39, 'Dharmapasha', 'ধর্মপাশা'),
(308, 39, 'Jamalganj', 'জামালগঞ্জ'),
(309, 39, 'Shalla', 'শাল্লা'),
(310, 39, 'Derai', 'দিরাই'),
(311, 40, 'Belabo', 'বেলাবো'),
(312, 40, 'Monohardi', 'মনোহরদী'),
(313, 40, 'Narsingdi Sadar', 'নরসিংদী সদর'),
(314, 40, 'Palash', 'পলাশ'),
(315, 40, 'Raipura', 'রায়পুরা'),
(316, 40, 'Shibpur', 'শিবপুর'),
(317, 41, 'Kaliganj', 'কালীগঞ্জ'),
(318, 41, 'Kaliakair', 'কালিয়াকৈর'),
(319, 41, 'Kapasia', 'কাপাসিয়া'),
(320, 41, 'Gazipur Sadar', 'গাজীপুর সদর'),
(321, 41, 'Sreepur', 'শ্রীপুর'),
(322, 42, 'Shariatpur Sadar', 'শরিয়তপুর সদর'),
(323, 42, 'Naria', 'নড়িয়া'),
(324, 42, 'Zajira', 'জাজিরা'),
(325, 42, 'Gosairhat', 'গোসাইরহাট'),
(326, 42, 'Bhedarganj', 'ভেদরগঞ্জ'),
(327, 42, 'Damudya', 'ডামুড্যা'),
(328, 43, 'Araihazar', 'আড়াইহাজার'),
(329, 43, 'Bandar', 'বন্দর'),
(330, 43, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর'),
(331, 43, 'Rupganj', 'রূপগঞ্জ'),
(332, 43, 'Sonargaon', 'সোনারগাঁ'),
(333, 44, 'Basail', 'বাসাইল'),
(334, 44, 'Bhuapur', 'ভুয়াপুর'),
(335, 44, 'Delduar', 'দেলদুয়ার'),
(336, 44, 'Ghatail', 'ঘাটাইল'),
(337, 44, 'Gopalpur', 'গোপালপুর'),
(338, 44, 'Madhupur', 'মধুপুর'),
(339, 44, 'Mirzapur', 'মির্জাপুর'),
(340, 44, 'Nagarpur', 'নাগরপুর'),
(341, 44, 'Sakhipur', 'সখিপুর'),
(342, 44, 'Tangail Sadar', 'টাঙ্গাইল সদর'),
(343, 44, 'Kalihati', 'কালিহাতী'),
(344, 44, 'Dhanbari', 'ধনবাড়ী'),
(345, 45, 'Itna', 'ইটনা'),
(346, 45, 'Katiadi', 'কটিয়াদী'),
(347, 45, 'Bhairab', 'ভৈরব'),
(348, 45, 'Tarail', 'তাড়াইল'),
(349, 45, 'Hossainpur', 'হোসেনপুর'),
(350, 45, 'Pakundia', 'পাকুন্দিয়া'),
(351, 45, 'Kuliarchar', 'কুলিয়ারচর'),
(352, 45, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর'),
(353, 45, 'Karimgonj', 'করিমগঞ্জ'),
(354, 45, 'Bajitpur', 'বাজিতপুর'),
(355, 45, 'Austagram', 'অষ্টগ্রাম'),
(356, 45, 'Mithamoin', 'মিঠামইন'),
(357, 45, 'Nikli', 'নিকলী'),
(358, 46, 'Harirampur', 'হরিরামপুর'),
(359, 46, 'Saturia', 'সাটুরিয়া'),
(360, 46, 'Manikganj Sadar', 'মানিকগঞ্জ সদর'),
(361, 46, 'Gior', 'ঘিওর'),
(362, 46, 'Shibaloy', 'শিবালয়'),
(363, 46, 'Doulatpur', 'দৌলতপুর'),
(364, 46, 'Singiar', 'সিংগাইর'),
(365, 47, 'Savar', 'সাভার'),
(366, 47, 'Dhamrai', 'ধামরাই'),
(367, 47, 'Keraniganj', 'কেরাণীগঞ্জ'),
(368, 47, 'Nawabganj', 'নবাবগঞ্জ'),
(369, 47, 'Dohar', 'দোহার'),
(370, 48, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর'),
(371, 48, 'Sreenagar', 'শ্রীনগর'),
(372, 48, 'Sirajdikhan', 'সিরাজদিখান'),
(373, 48, 'Louhajanj', 'লৌহজং'),
(374, 48, 'Gajaria', 'গজারিয়া'),
(375, 48, 'Tongibari', 'টংগীবাড়ি'),
(376, 49, 'Rajbari Sadar', 'রাজবাড়ী সদর'),
(377, 49, 'Goalanda', 'গোয়ালন্দ'),
(378, 49, 'Pangsa', 'পাংশা'),
(379, 49, 'Baliakandi', 'বালিয়াকান্দি'),
(380, 49, 'Kalukhali', 'কালুখালী'),
(381, 50, 'Madaripur Sadar', 'মাদারীপুর সদর'),
(382, 50, 'Shibchar', 'শিবচর'),
(383, 50, 'Kalkini', 'কালকিনি'),
(384, 50, 'Rajoir', 'রাজৈর'),
(385, 51, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর'),
(386, 51, 'Kashiani', 'কাশিয়ানী'),
(387, 51, 'Tungipara', 'টুংগীপাড়া'),
(388, 51, 'Kotalipara', 'কোটালীপাড়া'),
(389, 51, 'Muksudpur', 'মুকসুদপুর'),
(390, 52, 'Faridpur Sadar', 'ফরিদপুর সদর'),
(391, 52, 'Alfadanga', 'আলফাডাঙ্গা'),
(392, 52, 'Boalmari', 'বোয়ালমারী'),
(393, 52, 'Sadarpur', 'সদরপুর'),
(394, 52, 'Nagarkanda', 'নগরকান্দা'),
(395, 52, 'Bhanga', 'ভাঙ্গা'),
(396, 52, 'Charbhadrasan', 'চরভদ্রাসন'),
(397, 52, 'Madhukhali', 'মধুখালী'),
(398, 52, 'Saltha', 'সালথা'),
(399, 53, 'Panchagarh Sadar', 'পঞ্চগড় সদর'),
(400, 53, 'Debiganj', 'দেবীগঞ্জ'),
(401, 53, 'Boda', 'বোদা'),
(402, 53, 'Atwari', 'আটোয়ারী'),
(403, 53, 'Tetulia', 'তেতুলিয়া'),
(404, 54, 'Nawabganj', 'নবাবগঞ্জ'),
(405, 54, 'Birganj', 'বীরগঞ্জ'),
(406, 54, 'Ghoraghat', 'ঘোড়াঘাট'),
(407, 54, 'Birampur', 'বিরামপুর'),
(408, 54, 'Parbatipur', 'পার্বতীপুর'),
(409, 54, 'Bochaganj', 'বোচাগঞ্জ'),
(410, 54, 'Kaharol', 'কাহারোল'),
(411, 54, 'Fulbari', 'ফুলবাড়ী'),
(412, 54, 'Dinajpur Sadar', 'দিনাজপুর সদর'),
(413, 54, 'Hakimpur', 'হাকিমপুর'),
(414, 54, 'Khansama', 'খানসামা'),
(415, 54, 'Birol', 'বিরল'),
(416, 54, 'Chirirbandar', 'চিরিরবন্দর'),
(417, 55, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর'),
(418, 55, 'Kaliganj', 'কালীগঞ্জ'),
(419, 55, 'Hatibandha', 'হাতীবান্ধা'),
(420, 55, 'Patgram', 'পাটগ্রাম'),
(421, 55, 'Aditmari', 'আদিতমারী'),
(422, 56, 'Syedpur', 'সৈয়দপুর'),
(423, 56, 'Domar', 'ডোমার'),
(424, 56, 'Dimla', 'ডিমলা'),
(425, 56, 'Jaldhaka', 'জলঢাকা'),
(426, 56, 'Kishorganj', 'কিশোরগঞ্জ'),
(427, 56, 'Nilphamari Sadar', 'নীলফামারী সদর'),
(428, 57, 'Sadullapur', 'সাদুল্লাপুর'),
(429, 57, 'Gaibandha Sadar', 'গাইবান্ধা সদর'),
(430, 57, 'Palashbari', 'পলাশবাড়ী'),
(431, 57, 'Saghata', 'সাঘাটা'),
(432, 57, 'Gobindaganj', 'গোবিন্দগঞ্জ'),
(433, 57, 'Sundarganj', 'সুন্দরগঞ্জ'),
(434, 57, 'Phulchari', 'ফুলছড়ি'),
(435, 58, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর'),
(436, 58, 'Pirganj', 'পীরগঞ্জ'),
(437, 58, 'Ranisankail', 'রাণীশংকৈল'),
(438, 58, 'Haripur', 'হরিপুর'),
(439, 58, 'Baliadangi', 'বালিয়াডাঙ্গী'),
(440, 59, 'Rangpur Sadar', 'রংপুর সদর'),
(441, 59, 'Gangachara', 'গংগাচড়া'),
(442, 59, 'Taragonj', 'তারাগঞ্জ'),
(443, 59, 'Badargonj', 'বদরগঞ্জ'),
(444, 59, 'Mithapukur', 'মিঠাপুকুর'),
(445, 59, 'Pirgonj', 'পীরগঞ্জ'),
(446, 59, 'Kaunia', 'কাউনিয়া'),
(447, 59, 'Pirgacha', 'পীরগাছা'),
(448, 60, 'Kurigram Sadar', 'কুড়িগ্রাম সদর'),
(449, 60, 'Nageshwari', 'নাগেশ্বরী'),
(450, 60, 'Bhurungamari', 'ভুরুঙ্গামারী'),
(451, 60, 'Phulbari', 'ফুলবাড়ী'),
(452, 60, 'Rajarhat', 'রাজারহাট'),
(453, 60, 'Ulipur', 'উলিপুর'),
(454, 60, 'Chilmari', 'চিলমারী'),
(455, 60, 'Rowmari', 'রৌমারী'),
(456, 60, 'Charrajibpur', 'চর রাজিবপুর'),
(457, 61, 'Sherpur Sadar', 'শেরপুর সদর'),
(458, 61, 'Nalitabari', 'নালিতাবাড়ী'),
(459, 61, 'Sreebordi', 'শ্রীবরদী'),
(460, 61, 'Nokla', 'নকলা'),
(461, 61, 'Jhenaigati', 'ঝিনাইগাতী'),
(462, 62, 'Fulbaria', 'ফুলবাড়ীয়া'),
(463, 62, 'Trishal', 'ত্রিশাল'),
(464, 62, 'Bhaluka', 'ভালুকা'),
(465, 62, 'Muktagacha', 'মুক্তাগাছা'),
(466, 62, 'Mymensingh Sadar', 'ময়মনসিংহ সদর'),
(467, 62, 'Dhobaura', 'ধোবাউড়া'),
(468, 62, 'Phulpur', 'ফুলপুর'),
(469, 62, 'Haluaghat', 'হালুয়াঘাট'),
(470, 62, 'Gouripur', 'গৌরীপুর'),
(471, 62, 'Gafargaon', 'গফরগাঁও'),
(472, 62, 'Iswarganj', 'ঈশ্বরগঞ্জ'),
(473, 62, 'Nandail', 'নান্দাইল'),
(474, 62, 'Tarakanda', 'তারাকান্দা'),
(475, 63, 'Jamalpur Sadar', 'জামালপুর সদর'),
(476, 63, 'Melandah', 'মেলান্দহ'),
(477, 63, 'Islampur', 'ইসলামপুর'),
(478, 63, 'Dewangonj', 'দেওয়ানগঞ্জ'),
(479, 63, 'Sarishabari', 'সরিষাবাড়ী'),
(480, 63, 'Madarganj', 'মাদারগঞ্জ'),
(481, 63, 'Bokshiganj', 'বকশীগঞ্জ'),
(482, 64, 'Barhatta', 'বারহাট্টা'),
(483, 64, 'Durgapur', 'দুর্গাপুর'),
(484, 64, 'Kendua', 'কেন্দুয়া'),
(485, 64, 'Atpara', 'আটপাড়া'),
(486, 64, 'Madan', 'মদন'),
(487, 64, 'Khaliajuri', 'খালিয়াজুরী'),
(488, 64, 'Kalmakanda', 'কলমাকান্দা'),
(489, 64, 'Mohongonj', 'মোহনগঞ্জ'),
(490, 64, 'Purbadhala', 'পূর্বধলা'),
(491, 64, 'Netrokona Sadar', 'নেত্রকোণা সদর');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_level` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Active & 0 = Inactive',
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_failed_login_at` datetime DEFAULT NULL,
  `last_failed_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_image`, `email_verified_at`, `password`, `remember_token`, `user_level`, `status`, `last_login_at`, `last_login_ip`, `last_failed_login_at`, `last_failed_login_ip`, `created_at`, `updated_at`) VALUES
(1, 'Samer', 'samer@gmail.com', NULL, NULL, '$2y$10$sIfaH3EQZqJF.IQeYTmdG.Rh9GP1p9/nXeLigAW3C2WQX8UKV7tC.', NULL, 2, 1, '2021-01-04 19:25:28', '119.30.45.250', '2021-02-18 16:56:44', '103.3.225.205', '2020-01-27 22:11:05', '2021-02-18 10:56:44'),
(2, 'Ashiqur Rahman', 'ashiqur@gmail.com', NULL, NULL, '$2y$10$jTusf3ddO6aBCSi6agHyDOIKOKI/dRQBHFQXMcxHDTUPqpnCWS7pO', '2qSmwYgVrsMF3InTZh8tI8qPEKNR8mpurNYEGiWQ56v4E6lAUXEMcq59SIcP', 1, 1, '2021-09-21 10:21:09', '223.27.94.123', '2021-09-21 10:19:26', '223.27.94.123', '2020-01-28 01:30:04', '2021-09-21 04:21:09'),
(3, 'Belal Khan', 'belal@gmail.com', NULL, NULL, '$2y$10$gIq4JxEuhbpik5xGzoUmq.lXBWaoVDxYkl0zd0dQqLLxt7uQ5pFwW', NULL, 2, 1, '2020-12-31 17:25:15', '103.106.237.132', NULL, NULL, '2020-12-23 05:10:03', '2020-12-31 11:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `flight_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_datetime` datetime DEFAULT NULL,
  `arrival_datetime` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_name`, `cost`, `flight_number`, `departure_datetime`, `arrival_datetime`, `created_at`, `updated_at`) VALUES
(1, 'Airline 101', '25000.00', NULL, NULL, '2020-10-09 18:10:16', '2020-02-11 05:48:50', '2020-02-16 18:29:22'),
(2, 'Airline 102', '24203.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(3, 'Airline 103', '19553.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(4, 'Airline 104', '31584.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(5, 'Airline 105', '40943.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(6, 'Airline 106', '14840.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(7, 'Airline 107', '33740.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(8, 'Airline 108', '48330.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(9, 'Airline 109', '29975.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(10, 'Airline 110', '40913.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(11, 'Airline 111', '20419.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(12, 'Airline 112', '11158.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(13, 'Airline 113', '33988.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(14, 'Airline 114', '36279.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(15, 'Airline 115', '26997.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(16, 'Airline 116', '29761.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(17, 'Airline 117', '47982.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(18, 'Airline 118', '25963.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(19, 'Airline 119', '35169.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50'),
(20, 'Airline 120', '14547.00', NULL, NULL, NULL, '2020-02-11 05:48:50', '2020-02-11 05:48:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attached_documents`
--
ALTER TABLE `attached_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_passports`
--
ALTER TABLE `customer_passports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_visas`
--
ALTER TABLE `customer_visas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_visa_types`
--
ALTER TABLE `customer_visa_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dev_app_details`
--
ALTER TABLE `dev_app_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dev_developer_details`
--
ALTER TABLE `dev_developer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dev_mode_setup`
--
ALTER TABLE `dev_mode_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_code` (`group_code`);

--
-- Indexes for table `hajjs`
--
ALTER TABLE `hajjs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hajjs_serial_no_unique` (`serial_no`);

--
-- Indexes for table `hajj_payments`
--
ALTER TABLE `hajj_payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hajj_payments_voucher_name_unique` (`voucher_name`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `mahram_relations`
--
ALTER TABLE `mahram_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_totals`
--
ALTER TABLE `monthly_totals`
  ADD PRIMARY KEY (`mt_id`),
  ADD KEY `mt_rf_id` (`mt_rf_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passport_documents`
--
ALTER TABLE `passport_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passport_history`
--
ALTER TABLE `passport_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passport_statuses`
--
ALTER TABLE `passport_statuses`
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
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priority_menu`
--
ALTER TABLE `priority_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renters`
--
ALTER TABLE `renters`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `renter_flats`
--
ALTER TABLE `renter_flats`
  ADD PRIMARY KEY (`rf_id`),
  ADD KEY `renter_id` (`renter_id`),
  ADD KEY `flat_id` (`flat_id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attached_documents`
--
ALTER TABLE `attached_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer_passports`
--
ALTER TABLE `customer_passports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_visas`
--
ALTER TABLE `customer_visas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_visa_types`
--
ALTER TABLE `customer_visa_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dev_app_details`
--
ALTER TABLE `dev_app_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dev_developer_details`
--
ALTER TABLE `dev_developer_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dev_mode_setup`
--
ALTER TABLE `dev_mode_setup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flats`
--
ALTER TABLE `flats`
  MODIFY `f_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hajjs`
--
ALTER TABLE `hajjs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hajj_payments`
--
ALTER TABLE `hajj_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `h_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mahram_relations`
--
ALTER TABLE `mahram_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `monthly_totals`
--
ALTER TABLE `monthly_totals`
  MODIFY `mt_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `passport_documents`
--
ALTER TABLE `passport_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `passport_history`
--
ALTER TABLE `passport_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `passport_statuses`
--
ALTER TABLE `passport_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `priority_menu`
--
ALTER TABLE `priority_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=954;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `renters`
--
ALTER TABLE `renters`
  MODIFY `r_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `renter_flats`
--
ALTER TABLE `renter_flats`
  MODIFY `rf_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `monthly_totals`
--
ALTER TABLE `monthly_totals`
  ADD CONSTRAINT `monthly_totals_ibfk_3` FOREIGN KEY (`mt_rf_id`) REFERENCES `renter_flats` (`rf_id`);

--
-- Constraints for table `renter_flats`
--
ALTER TABLE `renter_flats`
  ADD CONSTRAINT `renter_flats_ibfk_1` FOREIGN KEY (`renter_id`) REFERENCES `renters` (`r_id`),
  ADD CONSTRAINT `renter_flats_ibfk_2` FOREIGN KEY (`flat_id`) REFERENCES `flats` (`f_id`);

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
