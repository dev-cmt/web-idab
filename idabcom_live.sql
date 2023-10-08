-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 08, 2023 at 06:57 AM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idabcom_live`
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
(1, 'Ad Hoc Committee', 'TEST DR - 1', 1, 1, 0, '2023-08-27 00:04:05', '2023-08-27 00:04:05'),
(2, 'Founder Committee', 'TEST DR - 2', 1, 1, 0, '2023-08-27 00:04:06', '2023-08-27 00:04:06');

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

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `image`, `caption`, `event_date`, `self`, `guest`, `driver`, `spouse`, `child_above`, `child_bellow`, `description`, `location`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Interior Designers Night', 'certificate_1693900066.jpg', 'Certificate Giving  & Website Launching Ceremony.', '2023-08-31', 1000, 0, 0, 0, 0, 0, NULL, 'The Westin Dhaka', 1, 1, '2023-09-05 18:47:46', '2023-09-05 18:47:46'),
(2, 'Interior Design', 'interior design award ceremony_1693900178.jpg', 'Award Ceremony', '2023-08-15', 1000, 0, 0, 0, 0, 0, NULL, 'office', 1, 1, '2023-09-05 18:49:38', '2023-09-05 18:49:38');

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

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `description`, `date`, `cover`, `drive_url`, `public`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'General Gallery', NULL, '2023-09-05', 'photo-04_1693900402.jpeg', NULL, 1, 1, 1, '2023-09-05 08:53:22', '2023-09-05 08:53:22');

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

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `image`, `gallery_id`, `created_at`, `updated_at`) VALUES
(1, 'photo-01_1693900402.jpeg', 1, '2023-09-05 08:53:22', '2023-09-05 08:53:22'),
(2, 'photo-02_1693900402.jpeg', 1, '2023-09-05 08:53:22', '2023-09-05 08:53:22'),
(3, 'photo-03_1693900402.jpeg', 1, '2023-09-05 08:53:22', '2023-09-05 08:53:22'),
(4, 'photo-04_1693900402.jpeg', 1, '2023-09-05 08:53:22', '2023-09-05 08:53:22'),
(5, 'photo-05_1693900402.jpeg', 1, '2023-09-05 08:53:22', '2023-09-05 08:53:22'),
(6, 'photo-06_1693900402.jpeg', 1, '2023-09-05 08:53:23', '2023-09-05 08:53:23'),
(7, 'photo-07_1695120519.jpeg', 1, '2023-09-19 11:48:39', '2023-09-19 11:48:39'),
(8, 'photo-08_1695120519.jpeg', 1, '2023-09-19 11:48:39', '2023-09-19 11:48:39'),
(9, 'photo-09_1695120519.jpeg', 1, '2023-09-19 11:48:40', '2023-09-19 11:48:40'),
(10, 'photo-10_1695120520.jpeg', 1, '2023-09-19 11:48:40', '2023-09-19 11:48:40'),
(11, 'photo-11_1695120520.jpeg', 1, '2023-09-19 11:48:40', '2023-09-19 11:48:40'),
(12, 'photo-12_1695120520.jpeg', 1, '2023-09-19 11:48:40', '2023-09-19 11:48:40'),
(13, 'photo-13_1695120520.jpeg', 1, '2023-09-19 11:48:41', '2023-09-19 11:48:41'),
(14, 'photo-14_1695120521.jpeg', 1, '2023-09-19 11:48:41', '2023-09-19 11:48:41'),
(15, 'photo-15_1695120521.jpeg', 1, '2023-09-19 11:48:41', '2023-09-19 11:48:41'),
(16, 'photo-16_1695120521.jpeg', 1, '2023-09-19 11:48:41', '2023-09-19 11:48:41'),
(17, 'photo-17_1695120521.jpeg', 1, '2023-09-19 11:48:41', '2023-09-19 11:48:41'),
(18, 'photo-18_1695120521.jpeg', 1, '2023-09-19 11:48:42', '2023-09-19 11:48:42'),
(19, 'photo-19_1695120522.jpeg', 1, '2023-09-19 11:48:42', '2023-09-19 11:48:42'),
(20, 'photo-20_1695120522.jpeg', 1, '2023-09-19 11:48:42', '2023-09-19 11:48:42');

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
(2, 'Thakurgaon Polytechnic Institute', 3, 'Architecture & Interior Design', 2020, NULL, 1, 4, '2023-09-07 08:12:04', '2023-09-07 08:12:04'),
(3, 'state university', 3, 'architecture', 2016, NULL, 1, 5, '2023-09-07 09:51:38', '2023-09-07 09:51:38'),
(4, 'Exterior interior design training institute', 3, 'Interior Design', 2018, 'Master\'s', 1, 6, '2023-09-09 13:03:53', '2023-09-09 13:03:53'),
(5, 'United Asia Pacific University', 3, 'Architecture', 2011, NULL, 1, 7, '2023-09-11 05:55:27', '2023-09-11 05:55:27'),
(6, 'Shanto-Mariam University of Creative Technology', 3, 'Bachelor Of Interior Architecture', 2012, NULL, 1, 8, '2023-09-12 12:49:29', '2023-09-12 12:49:29'),
(10, 'National University', 3, 'Management', 2009, 'Diploma In Interior Design', 1, 13, '2023-09-18 14:39:02', '2023-09-18 14:39:02'),
(11, 'CORDALE INTERIOR DESIGN SCHOOL', 3, 'Interior Design', 2016, NULL, 1, 14, '2023-09-18 23:31:05', '2023-09-18 23:31:05'),
(12, 'Vogue Institute of Fashion & Technology', 5, 'Interior Design', 2007, 'Master of Arts', 1, 16, '2023-09-19 11:18:19', '2023-09-19 11:18:19'),
(13, 'The University of Asia Pacific', 3, 'Architecture', 2008, 'Diploma in Interior design', 1, 17, '2023-09-19 13:58:13', '2023-09-19 13:58:13'),
(14, 'dipti', 5, 'Interior', 2024, NULL, 1, 18, '2023-09-20 09:44:37', '2023-09-20 09:44:37'),
(15, 'Envision Institute of Design & Technologies', 6, 'Diploma in Interior Design', 2008, NULL, 1, 19, '2023-09-20 12:36:21', '2023-09-20 12:36:21'),
(16, 'University of Asia Pacific', 8, 'B.Architecture', 2021, NULL, 1, 20, '2023-09-21 07:51:10', '2023-09-21 07:51:10'),
(17, 'EX IN', 9, NULL, NULL, NULL, 1, 21, '2023-09-28 14:11:47', '2023-09-28 14:11:47'),
(18, 'EX IN', 9, NULL, 2013, NULL, 1, 22, '2023-09-28 14:36:24', '2023-09-28 14:36:24'),
(19, 'exin', 5, 'ID', 2002, 'B tech', 1, 23, '2023-09-30 11:34:32', '2023-09-30 11:34:32');

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
(1, 'DWL architects & interior', 'dwlbd.arch@gmail.com', '+8809678800547', 'senior architect', 'house 39, road 37, gulshan 2, dhaka', 'www.dwlbd.com', 1, 0, 1, 5, '2023-09-07 09:51:38', '2023-09-07 09:51:38'),
(2, 'Karigar Interior', 'karigarinteriorbd@gmail.com', '01710762333', 'CEO & Interior Designer', '63/1 sukrabad, Dhaka', NULL, 1, 0, 1, 6, '2023-09-09 13:03:53', '2023-09-09 13:03:53'),
(3, 'Dwl architect\'s & interior', NULL, NULL, 'Senior Architect', NULL, NULL, 1, 0, 1, 7, '2023-09-11 05:55:27', '2023-09-11 05:55:27'),
(4, 'Design Source Architecture & Interior', 'designsourcebd.info@gmail.com', '01749856140', 'Chief Designer', 'House-15(3rd floor),Main Road,Block-C,Banasree,Dhaka-1219', 'www.designsourcebd.net', 1, 0, 1, 8, '2023-09-12 12:49:29', '2023-09-12 12:49:29'),
(5, 'Interior-Concepts & Design Limited', 'interior.concepts.bd@gmail.com', '01618 900 555', 'Managing  Director', '323, 1st Floor, BDDL Aftab Tower, DIT Road, East Rampura, Dhaka, Bangladesh', 'www.interiorconceptsbd.com', 1, 0, 1, 13, '2023-09-18 14:39:02', '2023-09-18 14:39:02'),
(6, 'Design Lab OPC', 'mahi@designlab247.com', '01722544665', 'CEO', 'House 02, Dr. Safi Sarani, Madani Avenue, Vatara, Gulshan', 'https://designlab247.com', 1, 0, 1, 14, '2023-09-18 23:31:05', '2023-09-18 23:31:05'),
(7, 'ORANZDOT', 'oranzdot@gmail.com', NULL, 'CEO', 'House 142, Road 03, Block A, Niketan, Gulshan 1, dhaka', NULL, 1, 0, 1, 16, '2023-09-19 11:18:19', '2023-09-19 11:18:19'),
(8, 'DWL Architects & Interior', 'dwlbd.arch@gmail.com', '01733400054', 'Chief designer and CEO', 'H 39, R 37, Gulshan -2', 'Www.dwlbd.com', 1, 0, 1, 17, '2023-09-19 13:58:13', '2023-09-19 13:58:13'),
(9, 'Azmal Architect & Consultancy ltd.', 'azmalgroup@gmail.com', '01876278593/01994667667', 'Managing Director', 'Saj Bhobon, 1st Floor, purana palton, Dhaka', NULL, 1, 0, 1, 18, '2023-09-20 09:44:37', '2023-09-20 09:44:37'),
(10, 'Preview Architects Engineers', 'previewbd@gmail.com', '01713724625', 'Interior Designer & CEO', 'Rashid Court, House 4 Road 7 Sector 03 Uttara Dhaka', 'www.previewinterior.com', 1, 0, 1, 19, '2023-09-20 12:36:21', '2023-09-20 12:36:21'),
(11, 'Concept Interior', 'conceptinteriorinfo@gmil.com', '01615228092', 'MD', '50/2 R.K mission Road Gopibag Dhaka 1203', NULL, 1, 0, 1, 22, '2023-09-28 14:36:24', '2023-09-28 14:36:24'),
(12, 'Alcove', NULL, NULL, 'CEO', NULL, NULL, 1, 0, 1, 23, '2023-09-30 11:34:32', '2023-09-30 11:34:32');

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
(4, NULL, NULL, NULL, NULL, 'document/member/4/edu/EDU_CERTIFICATE_1694070724.jpeg', NULL, 'document/member/4/stu/STU_ID_COPY_1694070724.jpeg', NULL, 1, 4, '2023-09-07 12:12:04', '2023-09-07 12:12:04'),
(5, NULL, NULL, 'document/member/5/nid/NID_PHOTO_COPY_1694076698.jpg', NULL, 'document/member/5/edu/EDU_CERTIFICATE_1694076698.jpg', NULL, NULL, NULL, 1, 5, '2023-09-07 13:51:38', '2023-09-07 13:51:38'),
(6, NULL, NULL, NULL, NULL, 'document/member/6/edu/EDU_CERTIFICATE_1694261033.jpg', NULL, NULL, NULL, 1, 6, '2023-09-09 17:03:53', '2023-09-09 17:03:53'),
(7, 'document/member/7/trade/TRADE_LICENCE_1694408127.jpeg', 'document/member/7/tin/TIN_CERTIFICATE_1694408127.jpeg', 'document/member/7/nid/NID_PHOTO_COPY_1694408127.jpeg', NULL, 'document/member/7/edu/EDU_CERTIFICATE_1694408127.jpeg', 'document/member/7/experience/EXPERIENCE_CERTIFICATE_1694408127.jpeg', NULL, NULL, 1, 7, '2023-09-11 09:55:27', '2023-09-11 09:55:27'),
(8, 'document/member/8/trade/TRADE_LICENCE_1694519369.jpeg', 'document/member/8/tin/TIN_CERTIFICATE_1694519369.jpg', 'document/member/8/nid/NID_PHOTO_COPY_1694519369.jpg', NULL, 'document/member/8/edu/EDU_CERTIFICATE_1694519370.jpg', NULL, NULL, NULL, 1, 8, '2023-09-12 16:49:30', '2023-09-12 16:49:30'),
(11, 'document/member/11/trade/TRADE_LICENCE_1695044342.pdf', 'document/member/11/tin/TIN_CERTIFICATE_1695044342.jpg', 'document/member/11/nid/NID_PHOTO_COPY_1695044342.jpg', NULL, 'document/member/11/edu/EDU_CERTIFICATE_1695044343.pdf', NULL, NULL, NULL, 1, 11, '2023-09-18 18:39:03', '2023-09-18 18:39:03'),
(13, 'document/member/13/trade/TRADE_LICENCE_1695044342.pdf', 'document/member/13/tin/TIN_CERTIFICATE_1695044342.jpg', 'document/member/13/nid/NID_PHOTO_COPY_1695044342.jpg', NULL, 'document/member/13/edu/EDU_CERTIFICATE_1695044343.pdf', NULL, NULL, NULL, 1, 13, '2023-09-18 18:39:03', '2023-09-18 18:39:03'),
(14, 'document/member/14/trade/TRADE_LICENCE_1695076265.pdf', 'document/member/14/tin/TIN_CERTIFICATE_1695076266.pdf', 'document/member/14/nid/NID_PHOTO_COPY_1695076266.png', NULL, 'document/member/14/edu/EDU_CERTIFICATE_1695076266.jpeg', NULL, NULL, NULL, 1, 14, '2023-09-19 03:31:07', '2023-09-19 03:31:07'),
(15, 'document/member/15/trade/TRADE_LICENCE_1695076265.pdf', 'document/member/15/tin/TIN_CERTIFICATE_1695076266.pdf', 'document/member/15/nid/NID_PHOTO_COPY_1695076266.png', NULL, 'document/member/15/edu/EDU_CERTIFICATE_1695076266.jpeg', NULL, NULL, NULL, 1, 15, '2023-09-19 03:31:07', '2023-09-19 03:31:07'),
(16, 'document/member/16/trade/TRADE_LICENCE_1695118699.pdf', 'document/member/16/tin/TIN_CERTIFICATE_1695118699.pdf', 'document/member/16/nid/NID_PHOTO_COPY_1695118699.pdf', NULL, 'document/member/16/edu/EDU_CERTIFICATE_1695118700.jpg', NULL, NULL, NULL, 1, 16, '2023-09-19 15:18:20', '2023-09-19 15:18:20'),
(17, NULL, NULL, NULL, NULL, 'document/member/17/edu/EDU_CERTIFICATE_1695128293.jpg', NULL, NULL, NULL, 1, 17, '2023-09-19 17:58:13', '2023-09-19 17:58:13'),
(18, 'document/member/18/trade/TRADE_LICENCE_1695199477.jpf', 'document/member/18/tin/TIN_CERTIFICATE_1695199477.jpg', 'document/member/18/nid/NID_PHOTO_COPY_1695199480.jpg', NULL, 'document/member/18/edu/EDU_CERTIFICATE_1695199480.jpg', NULL, NULL, NULL, 1, 18, '2023-09-20 13:44:40', '2023-09-20 13:44:40'),
(19, 'document/member/19/trade/TRADE_LICENCE_1695209781.pdf', 'document/member/19/tin/TIN_CERTIFICATE_1695209781.pdf', 'document/member/19/nid/NID_PHOTO_COPY_1695209783.pdf', NULL, 'document/member/19/edu/EDU_CERTIFICATE_1695209785.pdf', NULL, NULL, NULL, 1, 19, '2023-09-20 16:36:25', '2023-09-20 16:36:25'),
(20, NULL, NULL, 'document/member/20/nid/NID_PHOTO_COPY_1695279070.jpg', NULL, 'document/member/20/edu/EDU_CERTIFICATE_1695279070.jpg', NULL, NULL, NULL, 1, 20, '2023-09-21 11:51:10', '2023-09-21 11:51:10'),
(21, NULL, NULL, NULL, NULL, 'document/member/21/edu/EDU_CERTIFICATE_1695917507.jpg', NULL, NULL, NULL, 1, 21, '2023-09-28 18:11:47', '2023-09-28 18:11:47'),
(22, 'document/member/22/trade/TRADE_LICENCE_1695918984.jpg', 'document/member/22/tin/TIN_CERTIFICATE_1695918984.jpg', 'document/member/22/nid/NID_PHOTO_COPY_1695918989.jpg', NULL, 'document/member/22/edu/EDU_CERTIFICATE_1695918989.jpg', NULL, NULL, NULL, 1, 22, '2023-09-28 18:36:29', '2023-09-28 18:36:29'),
(23, 'document/member/23/trade/TRADE_LICENCE_1696080872.jpeg', 'document/member/23/tin/TIN_CERTIFICATE_1696080872.jpeg', NULL, NULL, 'document/member/23/edu/EDU_CERTIFICATE_1696080872.jpeg', NULL, NULL, NULL, 1, 23, '2023-09-30 15:34:32', '2023-09-30 15:34:32');

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
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, '2023-09-07 08:12:04', '2023-09-07 08:12:04'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2023-09-07 09:51:38', '2023-09-07 09:51:38'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, '2023-09-09 13:03:53', '2023-09-09 13:03:53'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, '2023-09-11 05:55:27', '2023-09-11 05:55:27'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 8, '2023-09-12 12:49:29', '2023-09-12 12:49:29'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 13, '2023-09-18 14:39:02', '2023-09-18 14:39:02'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 14, '2023-09-18 23:31:05', '2023-09-18 23:31:05'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 16, '2023-09-19 11:18:19', '2023-09-19 11:18:19'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 17, '2023-09-19 13:58:13', '2023-09-19 13:58:13'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 18, '2023-09-20 09:44:37', '2023-09-20 09:44:37'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 19, '2023-09-20 12:36:21', '2023-09-20 12:36:21'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 20, '2023-09-21 07:51:10', '2023-09-21 07:51:10'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 21, '2023-09-28 14:11:47', '2023-09-28 14:11:47'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 22, '2023-09-28 14:36:24', '2023-09-28 14:36:24'),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 23, '2023-09-30 11:34:32', '2023-09-30 11:34:32');

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
(2, '01796951254', '6011993001', '2001-06-20', 'Mozibir Rahman', 'Abc', 'Link Road, Gulshan', 'Link Road, Gulshan', 0, 7, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, '2023-09-07 08:12:04', '2023-09-07 08:12:04'),
(3, '01735229364', '3255894242', '1993-08-12', 'mashihur rahman talukdar', 'konika yesmen', NULL, 'shorisha bari, tarakandi, jamalpur', 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2023-09-07 09:51:38', '2023-09-07 09:51:38'),
(4, '01710762333', '19918818952000111', '1991-12-29', 'Dulal Kumar', 'Dipali Rani', 'House-181, Road-9/4, South banashree, Dhaka.', 'Vill: Naogoan, Thana: Tarash, Dis: Sirajgonj', 0, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, '2023-09-09 13:03:53', '2023-09-09 13:03:53'),
(5, '01733553830', '3255894242', '2000-09-06', 'Md. Saydur Rahman', 'Mst Rahana Parvin', 'Mohakhali, Dhaka', 'Chapainawabganj, Rajshahi', 0, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, '2023-09-11 05:55:27', '2023-09-11 05:55:27'),
(6, '01749856140', '1022554941', '1989-12-01', 'Md. Shafiqul Islam', 'Sayeda Asma Begum', 'Design Source Architecture & Interior, House-15(3rd floor),Main Road,Block-C,Banasree-1219', 'Design Source Architecture & Interior, House-15(3rd floor),Main Road,Block-C,Banasree,Dhaka-1219', 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 8, '2023-09-12 12:49:29', '2023-09-12 12:49:29'),
(9, '01711101980', '2611038792215', '1979-05-04', 'MOHAMMAD ABUL HASEM SIKDER', 'FATEMA KHATUN', 'APPARTMENT: EASTERN PIONEER, FLAT NO: 601,\r\n36, PIONEER ROAD, SEGUNBAGICHA', 'VILL: MADHAPPUR, THANA: BRAHMAN PARA, DIST: CULILLA', 0, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11, '2023-09-17 11:58:50', '2023-09-17 11:58:50'),
(11, '01618 900 555', '4153513900', '1984-08-20', 'Md Mahmudul Haque', 'Morium Haq', '283/1 Dhupchaya , East Rampura High School Road, \r\nRampura.', 'NAZU MAHAJAN BARI\r\nMIDDLE LAXMIPUR, LASKAR HAT, FENI - 3903', 0, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 13, '2023-09-18 14:39:02', '2023-09-18 14:39:02'),
(12, '01722544665', '5522068848', '1987-06-13', 'Md A Razzak', 'Mamataz begum', 'House 478, road 07, block H, Bashundhara R/A, Dhaka 1229', 'Tentul Baria, Morrelgonj, Bagerhat', 0, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 14, '2023-09-18 23:31:05', '2023-09-18 23:31:05'),
(13, '01711112169', '5098731747', '1978-01-14', 'MD. MIZANUL ISLAM', 'AMBIA ISLAM', 'FLAT : 2B, 58, LAKE CIRCUS, KALABAGAN, DHAKA- 1205', 'VILL: BAROGHARIA, POST: BIRPASHA, 3432, BIJOYNAGAR, B-BARIA', 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 15, '2023-09-19 08:57:49', '2023-09-19 08:57:49'),
(14, '01737686010', '1912061544', '1978-07-09', 'Muhammad Hossen Sikder', 'Momtaz Begum', 'House-145, Road-03, Block-A,\r\nNiketan, Gulshan-1, Dhaka', 'House-10, Road- 05, Nasirabad H/S, Chattogram', 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 16, '2023-09-19 11:18:19', '2023-09-19 11:18:19'),
(15, '01733400054', '3736777354', '1982-12-05', 'Md. Shajahan', 'Selina akter', 'House 39, Road 37, Gulshan -2 . Dhaka', 'Jalkuri, siddirgang, Narajanganj.', 0, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 17, '2023-09-19 13:58:13', '2023-09-19 13:58:13'),
(16, '01876278593', NULL, '1991-12-31', 'Nozir Ahammod', 'Arober nessa', 'Saj Bhobon, 1st Floor, purana palton, Dhaka', 'Olipur,Dhorbani bari, post: Jokshin bazar, p/s sodor, distric: Laxmipur', 0, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 18, '2023-09-20 09:44:37', '2023-09-20 09:44:37'),
(17, '01819252989', '5954236609', '1977-12-13', 'Abdur Razzak', 'Rokeya Begum', 'Rashid Court, House 4 Road 7 Sector 03 Uttara Dhaka', 'Rajapur, Varuakhali, Jamalpur Sadar, Jamalapur', 0, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 19, '2023-09-20 12:36:21', '2023-09-20 12:36:21'),
(18, '+8801824231966', '9152125887', '1997-01-28', 'Md Hafizur Rahaman', 'Mst Shahnaj Begum', 'Goalpara Thakurgaon Sadar 5100', 'Goalpara Thakurgaon Sadar 5100', 0, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 20, '2023-09-21 07:51:10', '2023-09-21 07:51:10'),
(19, '01815228092', NULL, '1990-01-01', 'Abdur Rashid Sharker', 'Sakina Begum', 'RK Misson Road Gopibag Dhaka.', 'Baushia, Gazaria Munshiganj', 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 21, '2023-09-28 14:11:47', '2023-09-28 14:11:47'),
(20, '01815228092', '1015314451', '1990-01-01', 'Abdur Rashid Sharker', 'Sakina Begum', 'RK Misson Road Gopibag Dhaka', 'Baushia Gazaria Munshiganj', 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 22, '2023-09-28 14:36:24', '2023-09-28 14:36:24'),
(21, '01713040506', NULL, '1977-01-01', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 23, '2023-09-30 11:34:32', '2023-09-30 11:34:32');

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
(2, 'Fareast International University', '2-3', 'Mr. Arafat', '01885808576', 1, 4, '2023-09-07 08:12:04', '2023-09-07 08:12:04');

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
(1, 'BSc in Architecture', 'Admin Input', 1, '2023-10-07 22:47:19', '2023-10-07 22:47:19', 1, 0),
(2, 'Masters in any Discipline', 'Admin Input', 1, '2023-10-07 22:47:19', '2023-10-07 22:47:19', 1, 0),
(3, 'BSc in Civil Engineering', 'Admin Input', 1, '2023-10-07 22:47:19', '2023-10-07 22:47:19', 1, 0),
(4, 'BSc in Interior Architecture', 'Admin Input', 1, '2023-10-07 22:47:19', '2023-10-07 22:47:19', 1, 0),
(5, 'Graduation in Any Discipline', 'Admin Input', 1, '2023-10-07 22:47:19', '2023-10-07 22:47:19', 1, 0),
(6, 'Diploma in Civil Engineering', 'Admin Input', 1, '2023-10-07 22:47:19', '2023-10-07 22:47:19', 1, 0),
(7, 'Diploma in Architecture', 'Admin Input', 1, '2023-10-07 22:47:19', '2023-10-07 22:47:19', 1, 0),
(8, 'Diploma in Interior Design', 'Admin Input', 1, '2023-10-07 22:47:19', '2023-10-07 22:47:19', 1, 0),
(9, 'Bachelor in fine arts', 'Admin Input', 1, '2023-10-07 22:47:19', '2023-10-07 22:47:19', 1, 0);

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
(1, 'Professional Member', '', '3000.00', '0.00', '4000.00', 'DR - 1', 1, 1, 0, '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(2, 'Associate Member', 'A-', '2000.00', '0.00', '4000.00', 'DR - 2', 1, 1, 0, '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(3, 'Candidate Member', 'C-', '2000.00', '0.00', '4000.00', 'DR - 3', 1, 1, 0, '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(4, 'Trade Member', 'T-', '2000.00', '0.00', '4000.00', 'DR - 5', 1, 1, 0, '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(5, 'Student Member', 'S-', '1000.00', '0.00', '1000.00', 'DR - 4', 1, 1, 0, '2023-10-07 22:47:19', '2023-10-07 22:47:19');

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
(3, '2023-09-18', '2000.00', '1223936906001', 'CB32931', 1, NULL, '22August23', 'Actually I deposited 4000/-', NULL, 3, 2, 13, 1, 1, '2023-09-19 01:00:00', '2023-09-19 09:09:41'),
(4, '2023-09-19', '2000.00', '1223936906001', NULL, 1, NULL, NULL, NULL, 'document/member/11/bank-info/SLIP_1695108259.jpg', 4, 2, 11, NULL, 0, '2023-09-19 08:24:20', '2023-09-19 08:24:20'),
(5, '2023-09-19', '2000.00', '1223936906001', NULL, 1, NULL, NULL, NULL, 'document/member/15/bank-info/SLIP_1695112289.jpg', 5, 2, 15, NULL, 0, '2023-09-19 09:31:29', '2023-09-19 09:31:29'),
(6, '2023-09-19', '2000.00', '1223936906001', NULL, 1, NULL, NULL, 'I have paid 4000 taka', 'document/member/17/bank-info/SLIP_1695128485.jpeg', 6, 2, 17, NULL, 0, '2023-09-19 14:01:25', '2023-09-19 14:01:25'),
(7, '2023-09-20', '2000.00', '+8801710762333', '01819252989', 1, NULL, '01819252989', NULL, NULL, 7, 1, 19, NULL, 0, '2023-09-20 12:49:38', '2023-09-20 12:49:38'),
(8, '2023-09-30', '2000.00', '1223936906001', NULL, 1, NULL, NULL, NULL, NULL, 8, 2, 23, NULL, 0, '2023-09-30 11:44:42', '2023-09-30 11:44:42');

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
(1, 'bKash', 'bKash.png', 1, '2023-10-07 22:47:20', '2023-10-07 22:47:20'),
(2, 'City-Bank', 'city-bank.png', 1, '2023-10-07 22:47:20', '2023-10-07 22:47:20');

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
(1, '+8801710762333', 1, NULL, 1, 2, 1, 1, '2023-09-05 05:11:47', '2023-09-05 05:11:47'),
(2, '1223936906001', 1, NULL, 2, 1, 1, 1, '2023-09-18 11:38:19', '2023-09-18 11:38:19');

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
(1, 'Membership', NULL, 1, 0, '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(2, 'Event', NULL, 1, 0, '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(3, 'Annual', NULL, 1, 0, '2023-10-07 22:47:19', '2023-10-07 22:47:19');

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
(1, 'Member menu access', 'web', '2023-10-07 22:47:17', '2023-10-07 22:47:17'),
(2, 'Payment menu access', 'web', '2023-10-07 22:47:17', '2023-10-07 22:47:17'),
(3, 'Post menu access', 'web', '2023-10-07 22:47:17', '2023-10-07 22:47:17'),
(4, 'Setting menu access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(5, 'Member access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(6, 'Member edit', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(7, 'Member view', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(8, 'Member delete', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(9, 'Member approve access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(10, 'Member approved', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(11, 'Member approve record', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(12, 'CommitteeType access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(13, 'CommitteeType create', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(14, 'CommitteeType edit', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(15, 'CommitteeType view', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(16, 'CommitteeType delete', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(17, 'MemberType access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(18, 'MemberType create', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(19, 'MemberType edit', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(20, 'MemberType view', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(21, 'MemberType delete', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(22, 'Qualification access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(23, 'Qualification create', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(24, 'Qualification edit', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(25, 'Qualification view', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(26, 'Qualification delete', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(27, 'Annual fees access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(28, 'Annual fees approved', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(29, 'Annual fees record', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(30, 'Event fees access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(31, 'Event fees approved', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(32, 'Event fees record', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(33, 'Membership fees access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(34, 'Membership fees approved', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(35, 'Membership fees record', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(36, 'Pyment number access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(37, 'Pyment number create', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(38, 'Pyment number edit', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(39, 'Pyment number view', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(40, 'Pyment number delete', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(41, 'Pyment fees access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(42, 'Pyment annual fees', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(43, 'Pyment membership fees', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(44, 'Gallery access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(45, 'Gallery create', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(46, 'Gallery edit', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(47, 'Gallery delete', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(48, 'Event access', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(49, 'Event create', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(50, 'Event edit', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(51, 'Event delete', 'web', '2023-10-07 22:47:18', '2023-10-07 22:47:18'),
(52, 'Contact access', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(53, 'Contact reply', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(54, 'Contact delete', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(55, 'Role access', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(56, 'Role create', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(57, 'Role edit', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(58, 'Role delete', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(59, 'User access', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(60, 'User create', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(61, 'User edit', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(62, 'User delete', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(63, 'Super-Admin', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(64, 'Admin', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(65, 'Member', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(66, 'Data Setting', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(67, 'Student Member', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(68, 'Candidate Member', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(69, 'Professional Member', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(70, 'Associate Member', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(71, 'Trade Member', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19'),
(72, 'Corporate Member', 'web', '2023-10-07 22:47:19', '2023-10-07 22:47:19');

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
(1, 'Super-Admin', 'web', '2023-10-07 22:47:17', '2023-10-07 22:47:17'),
(2, 'Admin', 'web', '2023-10-07 22:47:17', '2023-10-07 22:47:17'),
(3, 'Member', 'web', '2023-10-07 22:47:17', '2023-10-07 22:47:17');

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
('2ON3Co7X5mZFEv0aGVCvmY6NLtr0xCYBow6lmgT8', NULL, '103.120.202.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNzFvdGFJSmJ4M2hPWklmUm5SdTAxTjJZZzgwdnRUU0RnUWU2NWJDVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vaWRhYi5jb20uYmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1696758740),
('5KXslQcdM5eOWFe4eutSSlyRhEiAYLeSTBZc2dGI', NULL, '123.108.90.251', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic2R1cEZjYTZWQUZOMTBucHh0NnM1VXZPUTBNVHU3dzA0ZWJZd2ZkayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vaWRhYi5jb20uYmQvcGFnZXMvMS9tZW1iZXIiO319', 1696756154),
('5YfKy73z6nAHYSlQ7HA8fkyt6RVOwDoF0vxfpPs3', NULL, '51.158.174.16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXV3clFhaFpFc241TjBSYXZHNlVrQnhVRnpFbXNJS1hISXNmNkFYVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vaWRhYi5jb20uYmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1696757890),
('CFSmDmLApG8UcPPBAlJ09gS45LNqAktD4NpzIs5E', NULL, '51.158.174.16', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3lndDgxVnp4eWc3WUFDbWUxVnVlbjRtTkRSWEw3UjJiVDRzRXFzdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vaWRhYi5jb20uYmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1696757895),
('CijgUBKca4XxgqqHKpYIbb8AbvE5IFaM3BmsRZXw', NULL, '15.204.182.106', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTJQd2lpVEhCZ1oyRUFlZll2ZFNsTkFCT0w1S1Jyb2F2TkpKMVFYRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9pZGFiLmNvbS5iZC9wYWdlcy9hYm91dC11cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1696756482),
('F2w8vnmQdg3moxZCpNJoYJg1MtP6NIHYwJvN67iA', NULL, '15.204.182.106', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUNFWlZtMmZrd3hxSDV5SXJEckJaakFUTU9mV1BhZXNFYUt1WGxlcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9pZGFiLmNvbS5iZC9wYWdlcy9jb250YWN0LXVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1696756940),
('GrPfRgOXqHPVw0J5PLQzxlxbwlj3L0WhEJxQp6g2', NULL, '15.204.182.106', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUmUycnJFWGJjcUNMMVZuRFppc21xZ2NjYjg4dUZDMGFVMzRYWnNoMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly93d3cuaWRhYi5jb20uYmQvcGFnZXMvYWJvdXQtdXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1696756482),
('j2YIeuloX9alikLGE1p4S89irrC4QQXhkVaXxboj', NULL, '15.204.182.106', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoienVRNXJkN1VaaDRGcTJOUEpSVWkwejJUTnQ1OHA5ZnhNVE5jVTVyayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly93d3cuaWRhYi5jb20uYmQvcGFnZXMvY29udGFjdC11cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1696756937),
('MDxFcNMZoLHpv3kfSJUU5kOaBUBkNelJQcsIYBAU', NULL, '15.204.182.106', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiODFXNFdweWdKSkNzTDVXZUNzaWtoV2ZJMkZpNklmU0NyQ3E3cGcwbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly93d3cuaWRhYi5jb20uYmQvcGFnZXMvcHJpdmFjeS1wb2xpY3kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1696757446),
('Mw9MYqVJ27w9Mc2c02OXTF29c3sVQ7IhmtXCCfp0', NULL, '51.158.174.16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/117.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGc0ZmluMlRyQTgza3RaU3ZQOUNvdVpsYUF4WE1Vc0FoaHVNeGwzMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vaWRhYi5jb20uYmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1696757891),
('oD10msD0tbWAElt4AlS9ZO2rmgmrZvIiUOZSYlHD', NULL, '40.77.167.26', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0tsUnlzQ1VRRzFJYmlyT2lBSUVhTEdodXpuaEFNWDBMdXZRTVVsciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vaWRhYi5jb20uYmQvcGFnZS9jb3Jwb3JhdGUtcGFydG5lcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1696756069),
('prSq9JC5S2ti1H7Qv4Umt3LBr9daLhmLHidmiVcs', NULL, '207.46.13.92', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWFGdEdWRmVGNVZvQUtBbm1HSmxzc3B5SVluVFJQaGVieEQ4S1R3eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vaWRhYi5jb20uYmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1696754988),
('s98p45T0D5RJhjbCrtncBRKybwdVkLyjz7gR0oIf', NULL, '15.204.182.106', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0xGcTNLaHRhQnpwS1NoZ1ZWc1lOTHJxSU9rZURsRXk2NjQwRlA3TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9pZGFiLmNvbS5iZC9wYWdlcy9wcml2YWN5LXBvbGljeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1696757446),
('z3f7hKpZ5af5y5lIik1d1ZGTCKLcoAqHt8o0a407', NULL, '103.120.202.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMDhSQjFFclZrYTJNTXp0bWdKeVRvOWlnbUpiRExmeG1nbEdaTWpvSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vaWRhYi5jb20uYmQvbG9naW4iO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjQ2OiJodHRwczovL2lkYWIuY29tLmJkL3RyYW5zYWN0aW9uLWV2ZW50LzEvY3JlYXRlIjt9fQ==', 1696762623);

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
(3, '2000.00', 1, NULL, 0, 2, 13, '2023-09-18 15:08:09', '2023-09-18 15:08:09'),
(4, '2000.00', 1, NULL, 0, 2, 11, '2023-09-19 08:24:19', '2023-09-19 08:24:19'),
(5, '2000.00', 1, NULL, 0, 2, 15, '2023-09-19 09:31:29', '2023-09-19 09:31:29'),
(6, '2000.00', 1, NULL, 0, 2, 17, '2023-09-19 14:01:25', '2023-09-19 14:01:25'),
(7, '2000.00', 1, NULL, 0, 1, 19, '2023-09-20 12:49:38', '2023-09-20 12:49:38'),
(8, '2000.00', 1, NULL, 0, 2, 23, '2023-09-30 11:44:42', '2023-09-30 11:44:42');

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
(1, 'IDAB', 'Admin', 'IDAB-ADMIN', '2021-12-31 12:00:00', '$2y$10$/lU8X/G9htoPUpxO1wp71OSu3ExCiJlY9fzumU1gyES6fwYcQjexK', NULL, NULL, NULL, NULL, NULL, 'fix/admin.jpg', NULL, NULL, 1, 1, NULL, '2023-08-27 00:03:52', '2023-08-27 00:03:52'),
(2, 'Members', 'member@gmail.com', 'IDAB-00000', '1999-12-31 12:00:00', '$2y$10$7eMEJa0UpZNcj2ONa/5Zpe7qiRvdxHTAqWm4bsWgN5Bh8qswDzyle', NULL, NULL, NULL, NULL, NULL, 'fix/member.jpg', NULL, NULL, 1, 1, NULL, '2023-08-27 00:03:52', '2023-09-20 06:16:16'),
(4, 'Akram Hossen', 'akram0171254@gmail.com', 'S-2023-09-001', NULL, '$2y$10$07D79IltENRnFc.zeIjR/u9hZ0Yhh/wAoTDeRMraoKonWdWNuqaSm', NULL, NULL, NULL, NULL, NULL, '310621119_1446539825857033_4925148524798473979_n_1694070723.jpg', 5, NULL, 0, 0, NULL, '2023-09-07 08:12:04', '2023-09-07 08:12:04'),
(5, 'fahmida yesmen', 'archfahmida.anannya@gmail.com', '2023-09-001', NULL, '$2y$10$ExtLm.24mGpLODarhTmt7e0OQiJtN/Hrk01d04jDyx.w0S9rLOFw.', NULL, NULL, NULL, NULL, NULL, 'Screenshot 2023-09-07 145106_1694076697.png', 1, NULL, 0, 0, NULL, '2023-09-07 09:51:38', '2023-09-07 09:51:38'),
(6, 'Sumon Kumar', 'Karigarinteriorbd@gmail.com', '2023-09-002', '2023-09-09 13:06:02', '$2y$10$bK7G8kq19XCFYWJGfrYXXup3qIAE6ZNRq7m2EXmXSgFlx9YSbermq', NULL, NULL, NULL, NULL, NULL, 'INDIA_1694261033.JPG', 1, NULL, 0, 0, NULL, '2023-09-09 13:03:53', '2023-09-09 13:06:02'),
(7, 'Md. Arafat rahman', 'robiarafat59@gmail.com', '2023-09-003', NULL, '$2y$10$MnIzTnd2MPfXXIde9l9feeUjv8OYzwI8eHtyGvQh9MBTiCAR5gsIq', NULL, NULL, NULL, NULL, NULL, 'for cv_1694408126.jpg', 1, NULL, 0, 0, NULL, '2023-09-11 05:55:27', '2023-09-11 05:55:27'),
(8, 'Mohammad Shariful Islam', 'i.ar.sharif@gmail.com', '2023-09-004', '2023-09-12 12:53:02', '$2y$10$vvXLNOrRLHIj4IY1n55sIuAYv/puOWsYjW0t6AzZNDA4VcP5labeW', NULL, NULL, NULL, NULL, NULL, 'Sharif Pic (1)_1694519368.jpg', 1, NULL, 0, 0, NULL, '2023-09-12 12:49:29', '2023-09-12 12:53:02'),
(11, 'MOHAMMAD AMINUL ISLAM SIKDER', 'rcadia.interior@gmail.com', '2023-09-005', '2023-09-17 12:03:52', '$2y$10$P1nTM4XbP0a/kAIK4MxV7.dbBAxgx7/AtwCEcBNtWoJLvfZ5mvDqm', NULL, NULL, NULL, NULL, NULL, 'IMG_20201210_013724_1694948329.jpg', 1, NULL, 0, 1, NULL, '2023-09-17 11:58:50', '2023-09-19 08:24:19'),
(13, 'Md Anamul Haque', 'interior.concepts.bd@gmail.com', '2023-09-006', '2023-09-18 14:53:39', '$2y$10$E7nuorrQkGe0yoKnA2TOyeofIodvZYf9ZNmXXLGyf/4TrQTgwX1G.', NULL, NULL, NULL, NULL, NULL, 'Untitled-1_1695044341.jpg', 3, NULL, 0, 1, NULL, '2023-09-18 14:39:02', '2023-09-18 15:08:09'),
(14, 'Mahiuddin Suman', 'mahi@designlab247.com', '2023-09-007', '2023-09-18 23:31:51', '$2y$10$ynpobnDBlMlOEN2wMwUePOHyDgyG9sRW8NXDoe74REM5hdCE5K3/6', NULL, NULL, NULL, NULL, NULL, '3918101F-9A89-4430-BC8E-76F71E3BF466_1695076264.jpeg', 1, NULL, 0, 0, NULL, '2023-09-18 23:31:05', '2023-09-18 23:31:51'),
(15, 'MD. MAZHARUL ISLAM', 'rashedmazhar69@gmail.com', '2023-09-008', '2023-09-19 09:29:52', '$2y$10$Ni1wwCvIJdO0dTS6laADAOQNnLGdxYzZG3hHso61KUUooJPy.O/Ma', NULL, NULL, NULL, NULL, NULL, 'IMG-20230918-WA0025_1695110269.jpg', 1, NULL, 0, 1, NULL, '2023-09-19 08:57:49', '2023-09-19 09:31:29'),
(16, 'ROKSANA HOSSEN', 'roksanahossen@gmail.com', '2023-09-009', '2023-09-19 11:18:46', '$2y$10$nxOQ0ujCH4ncsWg6qDo51O.Hgq50ufPnDCuyxUqNk.qkQllBDUTy6', NULL, NULL, NULL, NULL, NULL, '2x2_1695118699.jpg', 1, NULL, 0, 0, NULL, '2023-09-19 11:18:19', '2023-09-19 11:18:46'),
(17, 'Md. Shajib jahan', 'shajibjahan@yahoo.com', '2023-09-010', '2023-09-19 13:59:01', '$2y$10$ggBZK2pfkCX2F8eKF3qKJONu2FuXQl99.pLKUqjhSzphsRSBZOSym', NULL, NULL, NULL, NULL, NULL, 'BB5BD33D-572E-4F57-B6BF-9F3BF76DB1FF_1695128291.jpeg', 1, NULL, 0, 1, NULL, '2023-09-19 13:58:13', '2023-09-19 14:01:25'),
(18, 'MD ABDUR RAHIM', 'azmalgroup@gmail.com', '2023-09-011', NULL, '$2y$10$kzXDnC75AijxnAOGLMGLg.C4W/6ZrgveVyP1Obi.bWTRmYvyN./8u', NULL, NULL, NULL, NULL, NULL, '1111111111_1695199477.jpg', 3, NULL, 0, 0, NULL, '2023-09-20 09:44:37', '2023-09-20 09:44:37'),
(19, 'Mohammad Ruhul Amin', 'previewbd@gmail.com', '2023-09-012', '2023-09-20 12:38:31', '$2y$10$p4PaZwK7bn1eWvwaFqdRXeFFbKv83BVwnmzRorTV3aNotpoA8jkFa', NULL, NULL, NULL, NULL, NULL, 'picture_1695209779.jpg', 1, NULL, 0, 1, NULL, '2023-09-20 12:36:21', '2023-09-20 12:49:38'),
(20, 'Md Shammur Rahaman Shantu', '123shantu@gmail.com', 'A-2023-09-001', '2023-09-21 07:51:44', '$2y$10$AGy6yZCUUFGijh1ofj47zOUp9sPGnoGW1U.TSzrx1f6hpIuSQOuZ6', NULL, NULL, NULL, NULL, NULL, 'IMG-20230713-WA0007_1695279069.jpg', 2, NULL, 0, 0, NULL, '2023-09-21 07:51:10', '2023-09-21 07:51:44'),
(21, 'Md Pil Sarker', 'piasarkernu@gmail.com', '2023-09-013', NULL, '$2y$10$z6AG6r9qtB51FWpfzUKx3uLZEq3h1io1y07tRpF3KYnqB5HzSbkTy', NULL, NULL, NULL, NULL, NULL, 'Pia S_1695917502.jpg', 1, NULL, 0, 0, NULL, '2023-09-28 14:11:47', '2023-09-28 14:11:47'),
(22, 'Md Pia Sarker', 'piasarkerinfo@gmail.com', '2023-09-014', '2023-09-28 14:37:31', '$2y$10$CaOlI3gKh3pYp0KJ2USu3ey9xQ.lANIPhLX2FWMtdxYp.hsNPF2aa', NULL, NULL, NULL, NULL, NULL, 'Pia S_1695917502.jpg', 1, NULL, 0, 0, NULL, '2023-09-28 14:36:24', '2023-09-28 14:37:31'),
(23, 'quamrul', 'quamrul777@gmail.com', '2023-09-015', '2023-09-30 11:35:47', '$2y$10$8rlVhX8F.JAn00ZyUfA.N.f4ISu8s38ejDtVQHWr5fmzFAzO.pVTO', NULL, NULL, NULL, NULL, NULL, '—Pngtree—bangla new year pohela boyshakh_6581516_1696080866.png', 1, NULL, 0, 1, NULL, '2023-09-30 11:34:32', '2023-09-30 11:44:42');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `info_academics`
--
ALTER TABLE `info_academics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `info_child_details`
--
ALTER TABLE `info_child_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_companies`
--
ALTER TABLE `info_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `info_documents`
--
ALTER TABLE `info_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `info_others`
--
ALTER TABLE `info_others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `info_personals`
--
ALTER TABLE `info_personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `info_students`
--
ALTER TABLE `info_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
