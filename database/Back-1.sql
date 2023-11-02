-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 08:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_idab`
--

-- --------------------------------------------------------

--
-- Table structure for table `annual_fees`
--

CREATE TABLE `annual_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `fine` decimal(10,2) DEFAULT NULL,
  `due_amount` decimal(10,2) DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `fee_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_details_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `card_holder_name` varchar(255) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `committee_types`
--

CREATE TABLE `committee_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committee_types`
--

INSERT INTO `committee_types` (`id`, `name`, `description`, `user_id`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Ad Hoc Committee', 'TEST DR - 1', 1, 1, 0, '2023-10-31 04:00:58', '2023-10-31 04:00:58'),
(2, 'Founder Members', 'TEST DR - 2', 1, 1, 0, '2023-10-31 04:00:58', '2023-10-31 04:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `self` int(11) DEFAULT NULL,
  `guest` int(11) DEFAULT NULL,
  `driver` int(11) DEFAULT NULL,
  `spouse` int(11) DEFAULT NULL,
  `child_above` int(11) DEFAULT NULL,
  `child_bellow` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_registers`
--

CREATE TABLE `event_registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `self` int(11) DEFAULT NULL,
  `guest` int(11) DEFAULT NULL,
  `driver` int(11) DEFAULT NULL,
  `spouse` int(11) DEFAULT NULL,
  `child_above` int(11) DEFAULT NULL,
  `child_bellow` int(11) DEFAULT NULL,
  `total_person` int(11) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `payment_details_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `fee_plans`
--

CREATE TABLE `fee_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cover` text DEFAULT NULL,
  `drive_url` varchar(255) DEFAULT NULL,
  `public` tinyint(1) DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info_academics`
--

CREATE TABLE `info_academics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `mast_qualification_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `passing_year` int(11) DEFAULT NULL,
  `other_qualification` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_academics`
--

INSERT INTO `info_academics` (`id`, `institute`, `mast_qualification_id`, `subject`, `passing_year`, `other_qualification`, `status`, `member_id`, `created_at`, `updated_at`) VALUES
(1, 'Thakurgaon Polytechnic Institute', 3, 'Architecture & Interior Design', 2020, NULL, 1, 3, '2023-10-31 04:37:41', '2023-10-31 04:37:41'),
(2, 'state university', 5, 'Architecture', 2016, NULL, 1, 4, '2023-10-31 04:54:15', '2023-10-31 04:54:15'),
(3, 'Exterior interior design training institute', 3, 'Interior Design', 2018, 'Master\'s', 1, 5, '2023-10-31 05:07:40', '2023-10-31 05:07:40'),
(4, 'United Asia Pacific University', 3, 'Architecture', 2011, NULL, 1, 6, '2023-10-31 05:18:13', '2023-10-31 05:18:13'),
(5, 'Shanto-Mariam University of Creative Technology', 3, 'Bachelor Of Interior Architecture', 2012, NULL, 1, 7, '2023-10-31 05:18:57', '2023-10-31 05:18:57'),
(6, 'EX IN', 3, NULL, NULL, NULL, 1, 8, '2023-10-31 05:45:18', '2023-10-31 05:45:18'),
(7, 'National University', 3, 'Management', 2009, 'Diploma In Interior Design', 1, 9, '2023-10-31 05:51:42', '2023-10-31 05:51:42'),
(8, 'CORDALE INTERIOR DESIGN SCHOOL', 3, 'Interior Design', 2016, NULL, 1, 10, '2023-10-31 21:54:34', '2023-10-31 21:54:34'),
(9, 'Architecture', 1, 'Architecture', NULL, NULL, 1, 11, '2023-10-31 23:36:18', '2023-10-31 23:36:18'),
(10, 'Vogue Institute of Fashion & Technology', 5, 'Interior Design', 2007, 'Master of Arts', 1, 12, '2023-10-31 23:40:25', '2023-10-31 23:40:25'),
(11, 'The University of Asia Pacific', 1, 'Architecture', 2008, 'Diploma in Interior design', 1, 13, '2023-10-31 23:58:15', '2023-10-31 23:58:15'),
(12, 'DIPTI', 5, 'Interior', 2024, NULL, 1, 14, '2023-11-01 00:24:54', '2023-11-01 00:24:54'),
(13, 'University of Asia Pacific', 8, 'B.Architecture', 2021, NULL, 1, 15, '2023-11-01 00:59:20', '2023-11-01 00:59:20'),
(14, 'Envision Institute of Design & Technologies', 8, 'Diploma in Interior Design', 2008, NULL, 1, 16, '2023-11-01 01:00:02', '2023-11-01 01:00:02'),
(15, 'EX IN', 9, NULL, 2013, NULL, 1, 17, '2023-11-01 01:07:49', '2023-11-01 01:07:49'),
(16, 'NUll', 1, NULL, NULL, NULL, 1, 18, '2023-11-01 01:11:14', '2023-11-01 01:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `info_child_details`
--

CREATE TABLE `info_child_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_name` varchar(255) DEFAULT NULL,
  `child_dob` date DEFAULT NULL,
  `child_gender` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info_companies`
--

CREATE TABLE `info_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_phone` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `web_url` varchar(255) DEFAULT NULL,
  `is_job` tinyint(4) NOT NULL DEFAULT 0,
  `is_business` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_companies`
--

INSERT INTO `info_companies` (`id`, `company_name`, `company_email`, `company_phone`, `designation`, `address`, `web_url`, `is_job`, `is_business`, `status`, `member_id`, `created_at`, `updated_at`) VALUES
(1, 'DWL architects & interior', 'dwlbd.arch@gmail.com', '+8809678800547', 'senior architect', 'house 39, road 37, gulshan 2, dhaka', 'www.dwlbd.com', 1, 0, 1, 4, '2023-10-31 04:54:15', '2023-10-31 04:54:15'),
(2, 'Karigar Interior', 'karigarinteriorbd@gmail.com', '01710762333', 'CEO & Interior Designer', '63/1 sukrabad, Dhaka', NULL, 1, 0, 1, 5, '2023-10-31 05:07:40', '2023-10-31 05:07:40'),
(3, 'Dwl architect\'s & interior', NULL, NULL, 'Senior Architect', NULL, NULL, 1, 0, 1, 6, '2023-10-31 05:18:13', '2023-10-31 05:18:13'),
(4, 'Design Source Architecture & Interior', 'designsourcebd.info@gmail.com', '01749856140', 'Chief Designer', 'House-15(3rd floor),Main Road,Block-C,Banasree,Dhaka-1219', 'www.designsourcebd.net', 1, 0, 1, 7, '2023-10-31 05:18:57', '2023-10-31 05:18:57'),
(5, 'Rcadia interior', 'rcadia.interior@gmail.com', '01711101980', 'CEO', 'Appartment: Eastern', NULL, 1, 0, 1, 8, '2023-10-31 05:45:18', '2023-10-31 05:45:18'),
(6, 'Interior-Concepts & Design Limited', 'interior.concepts.bd@gmail.com', '01618 900 555', 'Managing  Director', '323, 1st Floor, BDDL Aftab Tower, DIT Road, East Rampura, Dhaka, Bangladesh', 'www.interiorconceptsbd.com', 1, 0, 1, 9, '2023-10-31 05:51:42', '2023-10-31 05:51:42'),
(7, 'Design Lab OPC', 'mahi@designlab247.com', '01722544665', 'CEO', 'House 02, Dr. Safi Sarani, Madani Avenue, Vatara, Gulshan', 'https://designlab247.com', 1, 0, 1, 10, '2023-10-31 21:54:34', '2023-10-31 21:54:34'),
(8, 'Architecture', 'rashedmazhar69@gmail.com', NULL, 'CEO', 'FLAT : 2B, 58, LAKE CIRCUS, KALABAGAN, DHAKA- 1205', NULL, 1, 0, 1, 11, '2023-10-31 23:36:18', '2023-10-31 23:36:18'),
(9, 'ORANZDOT', 'oranzdot@gmail.com', NULL, 'CEO', 'House 142, Road 03, Block A, Niketan, Gulshan 1, dhaka', NULL, 1, 0, 1, 12, '2023-10-31 23:40:25', '2023-10-31 23:40:25'),
(10, 'DWL architects & interior', 'dwlbd.arch@gmail.com', '+8809678800547', 'Senior Architect', 'house 39, road 37, gulshan 2, dhaka', 'www.dwlbd.com', 1, 0, 1, 13, '2023-10-31 23:58:15', '2023-10-31 23:58:15'),
(11, 'Azmal Architect & Consultancy ltd.', 'azmalgroup@gmail.com', '01876278593/01994667667', 'Managing Director', 'Saj Bhobon, 1st Floor, purana palton, Dhaka', NULL, 1, 0, 1, 14, '2023-11-01 00:24:54', '2023-11-01 00:24:54'),
(12, 'NULL', NULL, NULL, 'NULL', NULL, NULL, 1, 0, 1, 15, '2023-11-01 00:59:20', '2023-11-01 00:59:20'),
(13, 'Preview Architects Engineers', 'previewbd@gmail.com', '01713724625', 'Interior Designer & CEO', 'Rashid Court, House 4 Road 7 Sector 03 Uttara Dhaka', 'www.previewinterior.com', 1, 0, 1, 16, '2023-11-01 01:00:02', '2023-11-01 01:00:02'),
(14, 'Concept Interior', 'conceptinteriorinfo@gmil.com', '01615228092', 'MD', '50/2 R.K mission Road Gopibag Dhaka 1203', NULL, 1, 0, 1, 17, '2023-11-01 01:07:49', '2023-11-01 01:07:49'),
(15, 'Creative Circle Ltd.', 'creativecircleltd@gmail.com', '01712254936', 'FOUNDER', '1,Rain razzak plaza,mogbazar,Dhaka', 'creativecirclebd.com', 1, 0, 1, 18, '2023-11-01 01:11:14', '2023-11-01 01:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `info_documents`
--

CREATE TABLE `info_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trade_licence` varchar(255) DEFAULT NULL,
  `tin_certificate` varchar(255) DEFAULT NULL,
  `nid_photo_copy` varchar(255) DEFAULT NULL,
  `passport_photo` varchar(255) DEFAULT NULL,
  `edu_certificate` varchar(255) DEFAULT NULL,
  `experience_certificate` varchar(255) DEFAULT NULL,
  `stu_id_copy` varchar(255) DEFAULT NULL,
  `recoment_letter` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_documents`
--

INSERT INTO `info_documents` (`id`, `trade_licence`, `tin_certificate`, `nid_photo_copy`, `passport_photo`, `edu_certificate`, `experience_certificate`, `stu_id_copy`, `recoment_letter`, `status`, `member_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'document/member/3/edu/EDU_CERTIFICATE_1698748662.jpeg', NULL, 'document/member/3/stu/STU_ID_COPY_1698748662.jpeg', NULL, 1, 3, '2023-10-31 04:37:42', '2023-10-31 04:37:42'),
(2, 'document/member/4/trade/TRADE_LICENCE_1698749655.jpg', 'document/member/4/tin/TIN_CERTIFICATE_1698749655.jpg', 'document/member/4/nid/NID_PHOTO_COPY_1698749655.jpg', NULL, 'document/member/4/edu/EDU_CERTIFICATE_1698749655.jpg', NULL, NULL, NULL, 1, 4, '2023-10-31 04:54:15', '2023-10-31 04:54:15'),
(3, 'document/member/5/trade/TRADE_LICENCE_1698750460.jpg', 'document/member/5/tin/TIN_CERTIFICATE_1698750460.jpg', 'document/member/5/nid/NID_PHOTO_COPY_1698750460.jpg', NULL, 'document/member/5/edu/EDU_CERTIFICATE_1698750460.jpg', 'document/member/5/experience/EXPERIENCE_CERTIFICATE_1698750460.jpg', NULL, NULL, 1, 5, '2023-10-31 05:07:40', '2023-10-31 05:07:40'),
(4, 'document/member/6/trade/TRADE_LICENCE_1698751093.jpeg', 'document/member/6/tin/TIN_CERTIFICATE_1698751093.jpeg', 'document/member/6/nid/NID_PHOTO_COPY_1698751093.jpeg', NULL, 'document/member/6/edu/EDU_CERTIFICATE_1698751093.jpeg', 'document/member/6/experience/EXPERIENCE_CERTIFICATE_1698751093.jpeg', NULL, NULL, 1, 6, '2023-10-31 05:18:13', '2023-10-31 05:18:13'),
(5, 'document/member/7/trade/TRADE_LICENCE_1698751137.jpeg', 'document/member/7/tin/TIN_CERTIFICATE_1698751137.jpg', 'document/member/7/nid/NID_PHOTO_COPY_1698751137.jpg', NULL, 'document/member/7/edu/EDU_CERTIFICATE_1698751137.jpg', NULL, NULL, NULL, 1, 7, '2023-10-31 05:18:57', '2023-10-31 05:18:57'),
(6, 'document/member/8/trade/TRADE_LICENCE_1698752718.pdf', 'document/member/8/tin/TIN_CERTIFICATE_1698752718.pdf', 'document/member/8/nid/NID_PHOTO_COPY_1698752718.pdf', NULL, 'document/member/8/edu/EDU_CERTIFICATE_1698752718.pdf', NULL, NULL, NULL, 1, 8, '2023-10-31 05:45:18', '2023-10-31 05:45:18'),
(7, 'document/member/9/trade/TRADE_LICENCE_1698753102.pdf', 'document/member/9/tin/TIN_CERTIFICATE_1698753102.jpg', 'document/member/9/nid/NID_PHOTO_COPY_1698753102.jpg', NULL, 'document/member/9/edu/EDU_CERTIFICATE_1698753102.pdf', NULL, NULL, NULL, 1, 9, '2023-10-31 05:51:42', '2023-10-31 05:51:42'),
(8, 'document/member/10/trade/TRADE_LICENCE_1698810874.pdf', 'document/member/10/tin/TIN_CERTIFICATE_1698810874.pdf', 'document/member/10/nid/NID_PHOTO_COPY_1698810874.png', NULL, 'document/member/10/edu/EDU_CERTIFICATE_1698810874.jpeg', NULL, NULL, NULL, 1, 10, '2023-10-31 21:54:34', '2023-10-31 21:54:34'),
(9, 'document/member/11/trade/TRADE_LICENCE_1698816978.jpg', 'document/member/11/tin/TIN_CERTIFICATE_1698816978.jpg', 'document/member/11/nid/NID_PHOTO_COPY_1698816978.jpg', NULL, 'document/member/11/edu/EDU_CERTIFICATE_1698816978.jpg', NULL, NULL, NULL, 1, 11, '2023-10-31 23:36:18', '2023-10-31 23:36:18'),
(10, 'document/member/12/trade/TRADE_LICENCE_1698817225.pdf', 'document/member/12/tin/TIN_CERTIFICATE_1698817225.pdf', 'document/member/12/nid/NID_PHOTO_COPY_1698817225.pdf', NULL, 'document/member/12/edu/EDU_CERTIFICATE_1698817225.jpg', NULL, NULL, NULL, 1, 12, '2023-10-31 23:40:25', '2023-10-31 23:40:25'),
(11, 'document/member/13/trade/TRADE_LICENCE_1698818295.jpg', 'document/member/13/tin/TIN_CERTIFICATE_1698818295.jpg', 'document/member/13/nid/NID_PHOTO_COPY_1698818295.jpg', NULL, 'document/member/13/edu/EDU_CERTIFICATE_1698818295.jpg', 'document/member/13/experience/EXPERIENCE_CERTIFICATE_1698818295.jpg', NULL, NULL, 1, 13, '2023-10-31 23:58:15', '2023-10-31 23:58:15'),
(12, 'document/member/14/trade/TRADE_LICENCE_1698819894.jpf', 'document/member/14/tin/TIN_CERTIFICATE_1698819894.jpg', 'document/member/14/nid/NID_PHOTO_COPY_1698819894.jpg', NULL, 'document/member/14/edu/EDU_CERTIFICATE_1698819894.jpg', NULL, NULL, NULL, 1, 14, '2023-11-01 00:24:54', '2023-11-01 00:24:54'),
(13, 'document/member/15/trade/TRADE_LICENCE_1698821960.jpg', 'document/member/15/tin/TIN_CERTIFICATE_1698821960.jpg', 'document/member/15/nid/NID_PHOTO_COPY_1698821960.jpg', NULL, 'document/member/15/edu/EDU_CERTIFICATE_1698821960.jpg', NULL, NULL, NULL, 1, 15, '2023-11-01 00:59:20', '2023-11-01 00:59:20'),
(14, 'document/member/16/trade/TRADE_LICENCE_1698822002.pdf', 'document/member/16/tin/TIN_CERTIFICATE_1698822002.pdf', 'document/member/16/nid/NID_PHOTO_COPY_1698822002.pdf', NULL, 'document/member/16/edu/EDU_CERTIFICATE_1698822002.pdf', 'document/member/16/experience/EXPERIENCE_CERTIFICATE_1698822002.jpg', NULL, NULL, 1, 16, '2023-11-01 01:00:02', '2023-11-01 01:00:02'),
(15, 'document/member/17/trade/TRADE_LICENCE_1698822469.jpg', 'document/member/17/tin/TIN_CERTIFICATE_1698822469.jpg', 'document/member/17/nid/NID_PHOTO_COPY_1698822469.jpg', NULL, 'document/member/17/edu/EDU_CERTIFICATE_1698822469.jpg', NULL, NULL, NULL, 1, 17, '2023-11-01 01:07:49', '2023-11-01 01:07:49'),
(16, 'document/member/18/trade/TRADE_LICENCE_1698822674.jpg', 'document/member/18/tin/TIN_CERTIFICATE_1698822674.jpg', 'document/member/18/nid/NID_PHOTO_COPY_1698822674.jpg', NULL, 'document/member/18/edu/EDU_CERTIFICATE_1698822674.jpg', 'document/member/18/experience/EXPERIENCE_CERTIFICATE_1698822674.jpg', NULL, NULL, 1, 18, '2023-11-01 01:11:14', '2023-11-01 01:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `info_others`
--

CREATE TABLE `info_others` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_me` text DEFAULT NULL,
  `nick_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `favorite` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `whatsapp_url` varchar(255) DEFAULT NULL,
  `telegram_url` varchar(255) DEFAULT NULL,
  `snapchat_url` varchar(255) DEFAULT NULL,
  `tiktok_url` varchar(255) DEFAULT NULL,
  `wechat_url` varchar(255) DEFAULT NULL,
  `discord_url` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_others`
--

INSERT INTO `info_others` (`id`, `about_me`, `nick_name`, `phone_number`, `cover_photo`, `favorite`, `facebook_url`, `youtube_url`, `instagram_url`, `twitter_url`, `linkedin_url`, `whatsapp_url`, `telegram_url`, `snapchat_url`, `tiktok_url`, `wechat_url`, `discord_url`, `status`, `member_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, '2023-10-31 04:37:42', '2023-10-31 04:37:42'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, '2023-10-31 04:54:15', '2023-10-31 04:54:15'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2023-10-31 05:07:40', '2023-10-31 05:07:40'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, '2023-10-31 05:18:13', '2023-10-31 05:18:13'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, '2023-10-31 05:18:57', '2023-10-31 05:18:57'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 8, '2023-10-31 05:45:18', '2023-10-31 05:45:18'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 9, '2023-10-31 05:51:42', '2023-10-31 05:51:42'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 10, '2023-10-31 21:54:34', '2023-10-31 21:54:34'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, '2023-10-31 23:36:18', '2023-10-31 23:36:18'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 12, '2023-10-31 23:40:25', '2023-10-31 23:40:25'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 13, '2023-10-31 23:58:15', '2023-10-31 23:58:15'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 14, '2023-11-01 00:24:54', '2023-11-01 00:24:54'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 15, '2023-11-01 00:59:20', '2023-11-01 00:59:20'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 16, '2023-11-01 01:00:02', '2023-11-01 01:00:02'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 17, '2023-11-01 01:07:49', '2023-11-01 01:07:49'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 18, '2023-11-01 01:11:14', '2023-11-01 01:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `info_personals`
--

CREATE TABLE `info_personals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `nid_no` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `parmanent_address` text DEFAULT NULL,
  `gender` int(11) NOT NULL DEFAULT 0,
  `blood_group` int(11) DEFAULT NULL,
  `marrital_status` int(11) DEFAULT NULL,
  `spouse` varchar(255) DEFAULT NULL,
  `spouse_dob` date DEFAULT NULL,
  `number_child` int(11) DEFAULT NULL,
  `em_name` int(11) DEFAULT NULL,
  `em_phone` int(11) DEFAULT NULL,
  `em_rleation` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_personals`
--

INSERT INTO `info_personals` (`id`, `contact_number`, `nid_no`, `dob`, `father_name`, `mother_name`, `present_address`, `parmanent_address`, `gender`, `blood_group`, `marrital_status`, `spouse`, `spouse_dob`, `number_child`, `em_name`, `em_phone`, `em_rleation`, `status`, `member_id`, `created_at`, `updated_at`) VALUES
(1, '01796951254', NULL, '2001-06-20', 'Mozibir Rahman', 'Abc', 'Link Road, Gulshan', 'Link Road, Gulshan', 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, '2023-10-31 04:37:41', '2023-10-31 04:37:41'),
(2, '01735229364', NULL, '1993-08-12', 'Mashihur rahman talukdar', 'Konika yesmen', NULL, 'Shorisha bari, tarakandi, jamalpur', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, '2023-10-31 04:54:15', '2023-10-31 04:54:15'),
(3, '01710762333', NULL, '1991-12-29', 'Dulal Kumar', 'Dipali Rani', 'House-181, Road-9/4, South banashree, Dhaka.', 'Vill: Naogoan, Thana: Tarash, Dis: Sirajgonj', 0, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2023-10-31 05:07:40', '2023-10-31 05:07:40'),
(4, '01733553830', NULL, '2000-09-06', 'Md. Saydur Rahman', 'Mst Rahana Parvin', 'Mohakhali, Dhaka', 'Chapainawabganj, Rajshahi', 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, '2023-10-31 05:18:13', '2023-10-31 05:18:13'),
(5, '01749856140', NULL, '1989-12-01', 'Md. Shafiqul Islam', 'Sayeda Asma Begum', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, '2023-10-31 05:18:57', '2023-10-31 05:18:57'),
(6, '01711101980', NULL, '1979-05-04', 'MOHAMMAD ABUL HASEM SIKDER', 'FATEMA KHATUN', 'APPARTMENT: EASTERN PIONEER, FLAT NO: 601,\r\n36, PIONEER ROAD, SEGUNBAGICHA', 'VILL: MADHAPPUR, THANA: BRAHMAN PARA, DIST: CULILLA', 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 8, '2023-10-31 05:45:18', '2023-10-31 05:45:18'),
(7, '01618 900 555', NULL, NULL, 'Md Mahmudul Haque', 'Morium Haq', '283/1 Dhupchaya , East Rampura High School Road,', 'NAZU MAHAJAN BARI\r\nMIDDLE LAXMIPUR, LASKAR HAT, FENI - 3903', 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 9, '2023-10-31 05:51:42', '2023-10-31 05:51:42'),
(8, '01722544665', NULL, '1987-06-13', 'Md A Razzak', 'Mamataz begum', 'House 478, Road 07, block H, Bashundhara R/A, Dhaka 1229', 'Tentul Baria, Morrelgonj, Bagerhat', 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 10, '2023-10-31 21:54:34', '2023-10-31 21:54:34'),
(9, '01711112169', NULL, '1978-01-14', 'MD. MIZANUL ISLAM', 'AMBIA ISLAM', 'FLAT : 2B, 58, LAKE CIRCUS, KALABAGAN, DHAKA- 1205', 'VILL: BAROGHARIA, POST: BIRPASHA, 3432, BIJOYNAGAR, B-BARIA', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, '2023-10-31 23:36:18', '2023-10-31 23:36:18'),
(10, '01737686010', NULL, '1978-07-09', 'Muhammad Hossen Sikder', 'Momtaz Begum', 'House-145, Road-03, Block-A,\r\nNiketan, Gulshan-1, Dhaka', 'House-10, Road- 05, Nasirabad H/S, Chattogram', 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 12, '2023-10-31 23:40:25', '2023-10-31 23:40:25'),
(11, '01733400054', NULL, '1982-12-05', 'Md. Shajahan', 'Selina akter', 'House 39, Road 37, Gulshan -2 . Dhaka', 'Jalkuri, siddirgang, Narajanganj.', 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 13, '2023-10-31 23:58:15', '2023-10-31 23:58:15'),
(12, '01876278593', NULL, '1991-12-31', 'Nozir Ahammod', 'Arober nessa', 'Saj Bhobon, 1st Floor, purana palton, Dhaka', 'Olipur,Dhorbani bari, post: Jokshin bazar, p/s sodor, distric: Laxmipur', 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 14, '2023-11-01 00:24:54', '2023-11-01 00:24:54'),
(13, '+8801824231966', NULL, '1997-01-28', 'Md Hafizur Rahaman', 'Mst Shahnaj Begum', 'Goalpara Thakurgaon Sadar 5100', 'Goalpara Thakurgaon Sadar 5100', 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 15, '2023-11-01 00:59:20', '2023-11-01 00:59:20'),
(14, '01819252989', NULL, '1977-12-13', 'Abdur Razzak', 'Rokeya Begum', 'Rashid Court, House 4 Road 7 Sector 03 Uttara Dhaka', 'Rajapur, Varuakhali, Jamalpur Sadar, Jamalapur', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 16, '2023-11-01 01:00:02', '2023-11-01 01:00:02'),
(15, '01815228092', NULL, '1990-01-01', 'Abdur Rashid Sharker', 'Sakina Begum', 'RK Misson Road Gopibag Dhaka', 'Baushia Gazaria Munshiganj', 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 17, '2023-11-01 01:07:49', '2023-11-01 01:07:49'),
(16, '01712254936', NULL, '1979-09-22', 'Md. khalilur Rahaman prodania', 'Shaheda Bagum', '1,Rain razzak plaza,mogbazar,dhaka', '3,mona tower,new eskaton ,bangla motor,dhaka', 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 18, '2023-11-01 01:11:14', '2023-11-01 01:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `info_students`
--

CREATE TABLE `info_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_institute` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `head_faculty_name` varchar(255) DEFAULT NULL,
  `head_faculty_number` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_students`
--

INSERT INTO `info_students` (`id`, `student_institute`, `semester`, `head_faculty_name`, `head_faculty_number`, `status`, `member_id`, `created_at`, `updated_at`) VALUES
(1, 'Fareast International University', '2-3', 'Mr. Arafat', '01885808576', 1, 3, '2023-10-31 04:37:41', '2023-10-31 04:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `mast_qualifications`
--

CREATE TABLE `mast_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mast_qualifications`
--

INSERT INTO `mast_qualifications` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`, `status`, `is_delete`) VALUES
(1, 'BSc in Architecture', 'Admin Input', 1, '2023-10-31 04:00:58', '2023-10-31 04:00:58', 1, 0),
(2, 'Masters in any Discipline', 'Admin Input', 1, '2023-10-31 04:00:58', '2023-10-31 04:00:58', 1, 0),
(3, 'BSc in Civil Engineering', 'Admin Input', 1, '2023-10-31 04:00:58', '2023-10-31 04:00:58', 1, 0),
(4, 'BSc in Interior Architecture', 'Admin Input', 1, '2023-10-31 04:00:58', '2023-10-31 04:00:58', 1, 0),
(5, 'Graduation in Any Discipline', 'Admin Input', 1, '2023-10-31 04:00:58', '2023-10-31 04:00:58', 1, 0),
(6, 'Diploma in Civil Engineering', 'Admin Input', 1, '2023-10-31 04:00:58', '2023-10-31 04:00:58', 1, 0),
(7, 'Diploma in Architecture', 'Admin Input', 1, '2023-10-31 04:00:58', '2023-10-31 04:00:58', 1, 0),
(8, 'Diploma in Interior Design', 'Admin Input', 1, '2023-10-31 04:00:58', '2023-10-31 04:00:58', 1, 0),
(9, 'Bachelor in fine arts', 'Admin Input', 1, '2023-10-31 04:00:58', '2023-10-31 04:00:58', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_types`
--

CREATE TABLE `member_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `registration_fee` decimal(10,2) DEFAULT NULL,
  `monthly_fee` decimal(10,2) DEFAULT NULL,
  `annual_fee` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_types`
--

INSERT INTO `member_types` (`id`, `name`, `prefix`, `registration_fee`, `monthly_fee`, `annual_fee`, `description`, `user_id`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Professional Member', '', 3000.00, 0.00, 4000.00, 'DR - 1', 1, 1, 0, '2023-10-31 04:00:58', '2023-10-31 04:00:58'),
(2, 'Associate Member', 'A-', 2000.00, 0.00, 4000.00, 'DR - 2', 1, 1, 0, '2023-10-31 04:00:58', '2023-10-31 04:00:58'),
(3, 'Candidate Member', 'C-', 2000.00, 0.00, 4000.00, 'DR - 3', 1, 1, 0, '2023-10-31 04:00:58', '2023-10-31 04:00:58'),
(4, 'Trade Member', 'T-', 2000.00, 0.00, 4000.00, 'DR - 5', 1, 1, 0, '2023-10-31 04:00:58', '2023-10-31 04:00:58'),
(5, 'Student Member', 'S-', 1000.00, 0.00, 1000.00, 'DR - 4', 1, 1, 0, '2023-10-31 04:00:58', '2023-10-31 04:00:58');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_08_27_075954_create_sessions_table', 1),
(7, '2022_09_08_043923_create_permission_tables', 1),
(8, '2023_06_01_100000_create_contacts_table', 1),
(9, '2023_07_01_000001_create_mast_qualifications_table', 1),
(10, '2023_07_02_000001_create_member_types_table', 1),
(11, '2023_07_02_000002_create_committee_types_table', 1),
(12, '2023_08_01_000001_create_info_personals_table', 1),
(13, '2023_08_01_000002_create_info_child_details_table', 1),
(14, '2023_08_01_000003_create_info_academics_table', 1),
(15, '2023_08_01_000004_create_info_students_table', 1),
(16, '2023_08_01_000005_create_info_companies_table', 1),
(17, '2023_08_01_000006_create_info_others_table', 1),
(18, '2023_08_01_000008_create_info_documents_table', 1),
(19, '2023_08_08_080000_create_fee_plans_table', 1),
(20, '2023_08_08_090000_create_payment_reasons_table', 1),
(21, '2023_08_08_090001_create_payment_methods_table', 1),
(22, '2023_08_08_090002_create_payment_numbers_table', 1),
(23, '2023_08_09_022210_create_transactions_table', 1),
(24, '2023_08_09_022211_create_payment_details_table', 1),
(25, '2023_08_09_022212_create_cards_table', 1),
(26, '2023_08_09_100001_create_galleries_table', 1),
(27, '2023_08_09_100002_create_gallery_images_table', 1),
(28, '2023_08_09_100003_create_events_table', 1),
(29, '2023_10_01_000000_create_event_registers_table', 1),
(30, '2023_10_01_000001_create_annual_fees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

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
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `payment_number` varchar(255) DEFAULT NULL,
  `transaction_number` varchar(255) DEFAULT NULL,
  `payment_reason_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ref_reason_id` int(11) DEFAULT NULL,
  `transfer_number` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `slip` varchar(255) DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `payment_date`, `paid_amount`, `payment_number`, `transaction_number`, `payment_reason_id`, `ref_reason_id`, `transfer_number`, `message`, `slip`, `transaction_id`, `payment_method_id`, `member_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-11-01', 3000.00, '1223936906001', NULL, 1, NULL, NULL, NULL, 'document/member/8/bank-info/SLIP_1698810354.jpg', 1, 2, 8, NULL, 0, '2023-10-31 21:45:55', '2023-10-31 21:45:55'),
(2, '2023-11-01', 4000.00, '1223936906001', NULL, 1, NULL, NULL, NULL, 'document/member/11/bank-info/SLIP_1698817088.jpg', 2, 2, 11, NULL, 0, '2023-10-31 23:38:08', '2023-10-31 23:38:08'),
(3, '2023-11-01', 4000.00, '1223936906001', NULL, 1, NULL, NULL, NULL, 'document/member/13/bank-info/SLIP_1698819580.jpeg', 3, 2, 13, NULL, 0, '2023-11-01 00:19:40', '2023-11-01 00:19:40'),
(4, '2023-11-01', 5000.00, '1223936906001', NULL, 1, NULL, NULL, NULL, 'document/member/18/bank-info/SLIP_1698822798.jpg', 4, 2, 18, NULL, 0, '2023-11-01 01:13:18', '2023-11-01 01:13:18'),
(5, '2023-11-01', 3000.00, '+8801710762333', 'T-01819252989', 1, NULL, '01819252989', NULL, NULL, 5, 1, 16, NULL, 0, '2023-11-01 01:21:04', '2023-11-01 01:21:04'),
(6, '2023-11-01', 4000.00, '+8801710762333', 'CB32931', 1, NULL, 'Null', 'Actually, I deposited 4000/-', NULL, 6, 1, 9, NULL, 0, '2023-11-01 01:25:41', '2023-11-01 01:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'bKash', 'bKash.png', 1, '2023-10-31 04:00:58', '2023-10-31 04:00:58'),
(2, 'City-Bank', 'city-bank.png', 1, '2023-10-31 04:00:58', '2023-10-31 04:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `payment_numbers`
--

CREATE TABLE `payment_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `payment_reason_id` bigint(20) UNSIGNED NOT NULL,
  `ref_reason_id` int(11) DEFAULT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_numbers`
--

INSERT INTO `payment_numbers` (`id`, `number`, `payment_reason_id`, `ref_reason_id`, `payment_method_id`, `member_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '+8801710762333', 1, NULL, 1, 2, 1, 1, '2023-09-04 23:11:47', '2023-09-04 23:11:47'),
(2, '1223936906001', 1, NULL, 2, 1, 1, 1, '2023-09-18 05:38:19', '2023-09-18 05:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment_reasons`
--

CREATE TABLE `payment_reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_reasons`
--

INSERT INTO `payment_reasons` (`id`, `name`, `description`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Membership', NULL, 1, 0, '2023-10-31 04:00:58', '2023-10-31 04:00:58'),
(2, 'Event', NULL, 1, 0, '2023-10-31 04:00:58', '2023-10-31 04:00:58'),
(3, 'Annual', NULL, 1, 0, '2023-10-31 04:00:58', '2023-10-31 04:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Member menu access', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(2, 'Payment menu access', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(3, 'Post menu access', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(4, 'Setting menu access', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(5, 'Member access', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(6, 'Member edit', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(7, 'Member view', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(8, 'Member delete', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(9, 'Member approve access', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(10, 'Member approved', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(11, 'Member approve record', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(12, 'CommitteeType access', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(13, 'CommitteeType create', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(14, 'CommitteeType edit', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(15, 'CommitteeType view', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(16, 'CommitteeType delete', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(17, 'MemberType access', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(18, 'MemberType create', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(19, 'MemberType edit', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(20, 'MemberType view', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(21, 'MemberType delete', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(22, 'Qualification access', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(23, 'Qualification create', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(24, 'Qualification edit', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(25, 'Qualification view', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(26, 'Qualification delete', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(27, 'Annual fees access', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(28, 'Annual fees approved', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(29, 'Annual fees record', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(30, 'Event fees access', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(31, 'Event fees approved', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(32, 'Event fees record', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(33, 'Membership fees access', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(34, 'Membership fees approved', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(35, 'Membership fees record', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(36, 'Pyment number access', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(37, 'Pyment number create', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(38, 'Pyment number edit', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(39, 'Pyment number view', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(40, 'Pyment number delete', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(41, 'Pyment fees access', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(42, 'Pyment annual fees', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(43, 'Pyment membership fees', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(44, 'Gallery access', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(45, 'Gallery create', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(46, 'Gallery edit', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(47, 'Gallery delete', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(48, 'Event access', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(49, 'Event create', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(50, 'Event edit', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(51, 'Event delete', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(52, 'Contact access', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(53, 'Contact reply', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(54, 'Contact delete', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(55, 'Role access', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(56, 'Role create', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(57, 'Role edit', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(58, 'Role delete', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(59, 'User access', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(60, 'User create', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(61, 'User edit', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(62, 'User delete', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(63, 'Super-Admin', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(64, 'Admin', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(65, 'Member', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(66, 'Data Setting', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(67, 'Student Member', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(68, 'Candidate Member', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(69, 'Professional Member', 'web', '2023-10-31 04:00:57', '2023-10-31 04:00:57'),
(70, 'Associate Member', 'web', '2023-10-31 04:00:58', '2023-10-31 04:00:58'),
(71, 'Trade Member', 'web', '2023-10-31 04:00:58', '2023-10-31 04:00:58'),
(72, 'Corporate Member', 'web', '2023-10-31 04:00:58', '2023-10-31 04:00:58');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super-Admin', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(2, 'Admin', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(3, 'Member', 'web', '2023-10-31 04:00:56', '2023-10-31 04:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(44, 2),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(65, 2),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PLYCAx5NWAFtCNHBFAnA5XAB4O2zhHUcQ59LYQQx', 1, '192.168.10.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVTNlSWRvd2p1dXhHZXFRb1lrVWJPZGRzcHNzUnVDb1ZNNEJaV1k2VSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xOTIuMTY4LjEwLjE3L3dlYi1pZGFiL3VzZXJzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRFQ0xacFk1SHVreXdEdTRhdW5YNmRlQnpOc1dQODFqdS9TUDdDRWJJLlQyRFAvVXlxVkNHTyI7fQ==', 1698823583),
('TYO8bkNqZEXkP523OfaJRjKytneVutFWKCwTmAn4', 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoid3U1Z3Z5WDdFMHJ0UXJoS0lNQk9HVnA0UGZDNUk1ME9wNzFHWlNUWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3Qvd2ViLWlkYWIvbWVtYmVyLWFwcHJvdmUvcGFkZGluZyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkRjNDVGVRL2ljU3dUamJiMVFydHVFLmMxTG5sU3RNaFE5ZVBHa0puMTVaaUE3aC5lc2U4ZzIiO30=', 1698823542);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `transaction_type` tinyint(4) NOT NULL DEFAULT 1,
  `transaction_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `transaction_type`, `transaction_id`, `status`, `payment_method_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3000.00, 1, NULL, 0, 2, 8, '2023-10-31 21:45:54', '2023-10-31 21:45:54'),
(2, 4000.00, 1, NULL, 0, 2, 11, '2023-10-31 23:38:08', '2023-10-31 23:38:08'),
(3, 4000.00, 1, NULL, 0, 2, 13, '2023-11-01 00:19:40', '2023-11-01 00:19:40'),
(4, 5000.00, 1, NULL, 0, 2, 18, '2023-11-01 01:13:18', '2023-11-01 01:13:18'),
(5, 3000.00, 1, NULL, 0, 1, 16, '2023-11-01 01:21:04', '2023-11-01 01:21:04'),
(6, 4000.00, 1, NULL, 0, 1, 9, '2023-11-01 01:25:41', '2023-11-01 01:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `member_code` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(255) DEFAULT NULL,
  `member_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `committee_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `approve_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `member_code`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `member_type_id`, `committee_type_id`, `status`, `is_admin`, `approve_by`, `created_at`, `updated_at`) VALUES
(1, 'IDAB', 'Admin', 'IDAB-ADMIN', '2021-12-31 18:00:00', '$2y$10$ECLZpY5HukywDu4aunX6deBzNsWP81ju/SP7CEbI.T2DP/UyqVCGO', NULL, NULL, NULL, NULL, NULL, 'fix/admin.jpg', NULL, NULL, 1, 1, NULL, '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(2, 'Member', 'member@gmail.com', 'IDAB-00000', '1999-12-31 18:00:00', '$2y$10$eCtfIVYFxmPeOX3UX9KZw.mf2qZcPsoENUZ8YqimU48LLGo/m8Wlq', NULL, NULL, NULL, NULL, NULL, 'fix/member.jpg', NULL, NULL, 1, 1, NULL, '2023-10-31 04:00:56', '2023-10-31 04:00:56'),
(3, 'Akram Hossen', 'akram0171254@gmail.com', 'S-2023-10-001', '2023-10-31 10:38:10', '$2y$10$lE71cwMV7nrNVmGsImDwleTf3ekPKNsabOP0jkCtRxDbXUf2/N0XK', NULL, NULL, NULL, NULL, NULL, 'akram_1698748661.jpg', 5, NULL, 0, 0, NULL, '2023-10-31 04:37:41', '2023-10-31 04:37:41'),
(4, 'Fahmida Yesmen', 'archfahmida.anannya@gmail.com', '2023-10-001', '2023-10-31 10:54:30', '$2y$10$MeByPjJdiI98DX0.sLheBOg754aHbNwJMkS.lAG2C2Cl9xb3Kdoci', NULL, NULL, NULL, NULL, NULL, 'Fahmida_1698749655.png', 1, NULL, 0, 0, NULL, '2023-10-31 04:54:15', '2023-10-31 04:54:15'),
(5, 'Sumon Kumar', 'karigarinteriorbd@gmail.com', '2023-10-002', '2023-10-31 11:07:58', '$2y$10$H61oqWCjxwfGXcoU896TauVtXmu0dlmmMBLcS6ScdgpsWUooNPLSS', NULL, NULL, NULL, NULL, NULL, 'INDIA_1694261033_1698750460.JPG', 1, NULL, 0, 0, NULL, '2023-10-31 05:07:40', '2023-10-31 05:07:40'),
(6, 'Md. Arafat rahman', 'robiarafat59@gmail.com', '2023-10-003', '2023-10-31 11:18:25', '$2y$10$dCB1u5.qcZeKzm1iSyIGqezkaiWgVzxXz03xAlHL13SUbCvdkHYgy', NULL, NULL, NULL, NULL, NULL, 'for cv_1694408126_1698751092.jpg', 1, NULL, 0, 0, NULL, '2023-10-31 05:18:13', '2023-10-31 05:18:13'),
(7, 'Mohammad Shariful Islam', 'i.ar.sharif@gmail.com', '2023-10-004', '2023-10-31 11:20:34', '$2y$10$xOa56wsKIyuo9qZcZBabcO22dbCQE6.b8EmvDM4uhVhQlsGPPc14O', NULL, NULL, NULL, NULL, NULL, 'Sharif Pic (1)_1694519368_1698751137.jpg', 1, NULL, 0, 0, NULL, '2023-10-31 05:18:57', '2023-10-31 05:18:57'),
(8, 'MOHAMMAD AMINUL ISLAM SIKDER', 'rcadia.interior@gmail.com', '2023-10-005', '2023-10-31 11:45:34', '$2y$10$oRaSDsHC2HhSqoN8dIVGAebSwiJ0Jq8Wky/t8xR.HjqSoRVfTfKxm', NULL, NULL, NULL, NULL, NULL, 'IMG_20201210_013724_1694948329_1698752717.jpg', 1, NULL, 0, 1, NULL, '2023-10-31 05:45:18', '2023-10-31 21:45:54'),
(9, 'Md Anamul Haque', 'interior.concepts.bd@gmail.com', 'C-2023-10-001', '2023-10-31 11:52:04', '$2y$10$F3CTeQ/icSwTjbb1QrtuE.c1LnlStMhQ9ePGkJn15ZiA7h.ese8g2', NULL, NULL, NULL, NULL, NULL, 'Untitled-1_1695044341_1698753102.jpg', 3, NULL, 0, 1, NULL, '2023-10-31 05:51:42', '2023-11-01 01:25:41'),
(10, 'Mahiuddin Suman', 'mahi@designlab247.com', '2023-11-001', '2023-11-30 05:36:47', '$2y$10$hrekeCd3RWtn.PXblb2w4.dgEdGgfV/tSzeoF/gRfzfrvqfpUkt5u', NULL, NULL, NULL, NULL, NULL, 'Mahiuddin Suman_1698810874.jpeg', 1, NULL, 0, 0, NULL, '2023-10-31 21:54:34', '2023-10-31 21:54:34'),
(11, 'MD. MAZHARUL ISLAM', 'rashedmazhar69@gmail.com', '2023-11-002', '2023-11-30 05:36:38', '$2y$10$Do0usLz1zlJ9GO7OM29z/O87DyZ6I3R/fQui3.QnAhHRr3.6Kjur2', NULL, NULL, NULL, NULL, NULL, 'IMG-20230918-WA0025_1695110269_1698816977.jpg', 1, NULL, 0, 1, NULL, '2023-10-31 23:36:18', '2023-10-31 23:38:08'),
(12, 'ROKSANA HOSSEN', 'roksanahossen@gmail.com', '2023-11-003', '2023-11-01 06:17:09', '$2y$10$nzsGrSd8iw5F5Afe9AtaPeZ3W6HMYpcfz4F9Xlzbv0WYZcKpWFNTy', NULL, NULL, NULL, NULL, NULL, '2x2_1695118699_1698817225.jpg', 1, NULL, 0, 0, NULL, '2023-10-31 23:40:25', '2023-10-31 23:40:25'),
(13, 'Md. Shajib jahan', 'shajibjahan@yahoo.com', '2023-11-004', '2023-11-01 06:17:02', '$2y$10$RqWYt.Oa0kv5ZCGXiMop1OCjgE4.uW.6QxILcmrpiOam0uY3G/Ply', NULL, NULL, NULL, NULL, NULL, 'BB5BD33D-572E-4F57-B6BF-9F3BF76DB1FF_1695128291_1698818294.jpeg', 1, NULL, 0, 1, NULL, '2023-10-31 23:58:15', '2023-11-01 00:19:40'),
(14, 'MD ABDUR RAHIM', 'azmalgroup@gmail.com', 'C-2023-11-001', '2023-11-01 06:25:10', '$2y$10$wHgs8XgvSM2K/jPsJogzJO7Xy1W2Y/eC.LzuYRnFDW4DWKmLQ9L7i', NULL, NULL, NULL, NULL, NULL, 'MD ABDUR RAHIM_1698819894.jpg', 3, NULL, 0, 0, NULL, '2023-11-01 00:24:54', '2023-11-01 00:24:54'),
(15, 'Md Shammur Rahaman Shantu', '123shantu@gmail.com', 'A-2023-11-001', '2023-11-01 07:12:40', '$2y$10$Zls3goH11hTWuIC2VGHVz.LFrzGBNL4drtDa5rixl/lznj/Io9J.i', NULL, NULL, NULL, NULL, NULL, 'Md Shammur Rahaman Shantu_1698821959.jpg', 2, NULL, 0, 0, NULL, '2023-11-01 00:59:20', '2023-11-01 00:59:20'),
(16, 'Mohammad Ruhul Amin', 'previewbd@gmail.com', '2023-11-005', '2023-11-01 07:12:37', '$2y$10$v88kRI4PnBX6La0SGSRlPuVyOBUIXtXtYQhu5O8e7leDE5e2zDaSe', NULL, NULL, NULL, NULL, NULL, 'picture_1695209779_1698822002.jpg', 1, NULL, 0, 1, NULL, '2023-11-01 01:00:02', '2023-11-01 01:21:04'),
(17, 'Md Pia Sarker', 'piasarkerinfo@gmail.com', '2023-11-006', '2023-11-01 07:12:33', '$2y$10$R7x6T0jI8YNzp0sD0qDL1O.c2l5jCc6xth5ijlCgy7yC2rPQftEOG', NULL, NULL, NULL, NULL, NULL, 'Pia S_1695917502_1698822469.jpg', 1, NULL, 0, 0, NULL, '2023-11-01 01:07:49', '2023-11-01 01:07:49'),
(18, 'Md.Saiful Islam Saron', 'creativecircleltd@gmail.com', '2023-11-007', '2023-11-01 07:12:28', '$2y$10$c3usj4kRDgrVpR1hQ9PKv.uA2Zd38NTmpBSq2sFfOyMY.GAMS/Up2', NULL, NULL, NULL, NULL, NULL, 'saron_1697117514_1698822674.jpeg', 1, NULL, 0, 1, NULL, '2023-11-01 01:11:14', '2023-11-01 01:13:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annual_fees`
--
ALTER TABLE `annual_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annual_fees_payment_details_id_foreign` (`payment_details_id`),
  ADD KEY `annual_fees_member_id_foreign` (`member_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cards_user_id_foreign` (`user_id`);

--
-- Indexes for table `committee_types`
--
ALTER TABLE `committee_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committee_types_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_registers`
--
ALTER TABLE `event_registers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_registers_event_id_foreign` (`event_id`),
  ADD KEY `event_registers_payment_details_id_foreign` (`payment_details_id`),
  ADD KEY `event_registers_member_id_foreign` (`member_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_plans`
--
ALTER TABLE `fee_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_user_id_foreign` (`user_id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_academics`
--
ALTER TABLE `info_academics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_academics_mast_qualification_id_foreign` (`mast_qualification_id`),
  ADD KEY `info_academics_member_id_foreign` (`member_id`);

--
-- Indexes for table `info_child_details`
--
ALTER TABLE `info_child_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_child_details_member_id_foreign` (`member_id`);

--
-- Indexes for table `info_companies`
--
ALTER TABLE `info_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_companies_member_id_foreign` (`member_id`);

--
-- Indexes for table `info_documents`
--
ALTER TABLE `info_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_documents_member_id_foreign` (`member_id`);

--
-- Indexes for table `info_others`
--
ALTER TABLE `info_others`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_others_member_id_foreign` (`member_id`);

--
-- Indexes for table `info_personals`
--
ALTER TABLE `info_personals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_personals_member_id_foreign` (`member_id`);

--
-- Indexes for table `info_students`
--
ALTER TABLE `info_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_students_member_id_foreign` (`member_id`);

--
-- Indexes for table `mast_qualifications`
--
ALTER TABLE `mast_qualifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mast_qualifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `member_types`
--
ALTER TABLE `member_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_types_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `payment_details_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `payment_details_member_id_foreign` (`member_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_numbers`
--
ALTER TABLE `payment_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_numbers_payment_reason_id_foreign` (`payment_reason_id`),
  ADD KEY `payment_numbers_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `payment_numbers_member_id_foreign` (`member_id`),
  ADD KEY `payment_numbers_user_id_foreign` (`user_id`);

--
-- Indexes for table `payment_reasons`
--
ALTER TABLE `payment_reasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_reasons_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `annual_fees`
--
ALTER TABLE `annual_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `committee_types`
--
ALTER TABLE `committee_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_registers`
--
ALTER TABLE `event_registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_plans`
--
ALTER TABLE `fee_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_academics`
--
ALTER TABLE `info_academics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `info_child_details`
--
ALTER TABLE `info_child_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_companies`
--
ALTER TABLE `info_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `info_documents`
--
ALTER TABLE `info_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `info_others`
--
ALTER TABLE `info_others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `info_personals`
--
ALTER TABLE `info_personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `info_students`
--
ALTER TABLE `info_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mast_qualifications`
--
ALTER TABLE `mast_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member_types`
--
ALTER TABLE `member_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_numbers`
--
ALTER TABLE `payment_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_reasons`
--
ALTER TABLE `payment_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annual_fees`
--
ALTER TABLE `annual_fees`
  ADD CONSTRAINT `annual_fees_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `annual_fees_payment_details_id_foreign` FOREIGN KEY (`payment_details_id`) REFERENCES `payment_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `committee_types`
--
ALTER TABLE `committee_types`
  ADD CONSTRAINT `committee_types_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_registers`
--
ALTER TABLE `event_registers`
  ADD CONSTRAINT `event_registers_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_registers_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_registers_payment_details_id_foreign` FOREIGN KEY (`payment_details_id`) REFERENCES `payment_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `info_academics`
--
ALTER TABLE `info_academics`
  ADD CONSTRAINT `info_academics_mast_qualification_id_foreign` FOREIGN KEY (`mast_qualification_id`) REFERENCES `mast_qualifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `info_academics_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `info_child_details`
--
ALTER TABLE `info_child_details`
  ADD CONSTRAINT `info_child_details_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `info_companies`
--
ALTER TABLE `info_companies`
  ADD CONSTRAINT `info_companies_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `info_documents`
--
ALTER TABLE `info_documents`
  ADD CONSTRAINT `info_documents_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `info_others`
--
ALTER TABLE `info_others`
  ADD CONSTRAINT `info_others_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `info_personals`
--
ALTER TABLE `info_personals`
  ADD CONSTRAINT `info_personals_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `info_students`
--
ALTER TABLE `info_students`
  ADD CONSTRAINT `info_students_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mast_qualifications`
--
ALTER TABLE `mast_qualifications`
  ADD CONSTRAINT `mast_qualifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `member_types`
--
ALTER TABLE `member_types`
  ADD CONSTRAINT `member_types_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_details_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_numbers`
--
ALTER TABLE `payment_numbers`
  ADD CONSTRAINT `payment_numbers_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_numbers_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_numbers_payment_reason_id_foreign` FOREIGN KEY (`payment_reason_id`) REFERENCES `payment_reasons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_numbers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_reasons`
--
ALTER TABLE `payment_reasons`
  ADD CONSTRAINT `payment_reasons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
