-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2023 at 02:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
(1, 'Ad Hoc Committee', 'TEST DR - 1', 1, 1, 0, '2023-08-27 06:04:05', '2023-08-27 06:04:05'),
(2, 'Founder Committee', 'TEST DR - 2', 1, 1, 0, '2023-08-27 06:04:06', '2023-08-27 06:04:06');

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
(1, 'SSC', 'Admin Input', 1, '2023-08-27 06:04:06', '2023-08-27 06:04:06', 1, 0),
(2, 'HSC', 'Admin Input', 1, '2023-08-27 06:04:06', '2023-08-27 06:04:06', 1, 0),
(3, 'Graduation', 'Admin Input', 1, '2023-08-27 06:04:06', '2023-08-27 06:04:06', 1, 0),
(4, 'Ph.D', 'Admin Input', 1, '2023-08-27 06:04:06', '2023-08-27 06:04:06', 1, 0);

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
(1, 'Student Member', 'S-', '1000.00', '0.00', '0.00', 'DR - 1', 1, 1, 0, '2023-08-27 06:04:05', '2023-08-27 06:04:05'),
(2, 'Candidate Member', '', '2000.00', '0.00', '4000.00', 'DR - 2', 1, 1, 0, '2023-08-27 06:04:05', '2023-08-27 06:04:05'),
(3, 'Professional Member', '', '2000.00', '0.00', '4000.00', 'DR - 3', 1, 1, 0, '2023-08-27 06:04:05', '2023-08-27 06:04:05'),
(4, 'Associate Member', 'A-', '2000.00', '0.00', '4000.00', 'DR - 4', 1, 1, 0, '2023-08-27 06:04:05', '2023-08-27 06:04:05'),
(5, 'Trade Member', 'T-', '2000.00', '0.00', '10000.00', 'DR - 5', 1, 1, 0, '2023-08-27 06:04:05', '2023-08-27 06:04:05'),
(6, 'Corporate Member', 'C-', '2000.00', '0.00', '4000.00', 'DR - 6', 1, 1, 0, '2023-08-27 06:04:05', '2023-08-27 06:04:05');

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
(1, 'bKash', 'bKash.png', 1, '2023-08-27 06:04:06', '2023-08-27 06:04:06'),
(2, 'City-Bank', 'city-bank.png', 1, '2023-08-27 06:04:06', '2023-08-27 06:04:06');

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
(1, 'Membership', NULL, 1, 0, '2023-08-27 06:04:06', '2023-08-27 06:04:06'),
(2, 'Event', NULL, 1, 0, '2023-08-27 06:04:06', '2023-08-27 06:04:06'),
(3, 'Annual', NULL, 1, 0, '2023-08-27 06:04:06', '2023-08-27 06:04:06');

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
(1, 'Member menu access', 'web', '2023-08-27 06:03:53', '2023-08-27 06:03:53'),
(2, 'Payment menu access', 'web', '2023-08-27 06:03:53', '2023-08-27 06:03:53'),
(3, 'Post menu access', 'web', '2023-08-27 06:03:53', '2023-08-27 06:03:53'),
(4, 'Setting menu access', 'web', '2023-08-27 06:03:53', '2023-08-27 06:03:53'),
(5, 'Member access', 'web', '2023-08-27 06:03:53', '2023-08-27 06:03:53'),
(6, 'Member edit', 'web', '2023-08-27 06:03:54', '2023-08-27 06:03:54'),
(7, 'Member view', 'web', '2023-08-27 06:03:54', '2023-08-27 06:03:54'),
(8, 'Member delete', 'web', '2023-08-27 06:03:54', '2023-08-27 06:03:54'),
(9, 'Member approve access', 'web', '2023-08-27 06:03:54', '2023-08-27 06:03:54'),
(10, 'Member approved', 'web', '2023-08-27 06:03:54', '2023-08-27 06:03:54'),
(11, 'Member approve record', 'web', '2023-08-27 06:03:54', '2023-08-27 06:03:54'),
(12, 'CommitteeType access', 'web', '2023-08-27 06:03:54', '2023-08-27 06:03:54'),
(13, 'CommitteeType create', 'web', '2023-08-27 06:03:54', '2023-08-27 06:03:54'),
(14, 'CommitteeType edit', 'web', '2023-08-27 06:03:54', '2023-08-27 06:03:54'),
(15, 'CommitteeType view', 'web', '2023-08-27 06:03:54', '2023-08-27 06:03:54'),
(16, 'CommitteeType delete', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(17, 'MemberType access', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(18, 'MemberType create', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(19, 'MemberType edit', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(20, 'MemberType view', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(21, 'MemberType delete', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(22, 'Qualification access', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(23, 'Qualification create', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(24, 'Qualification edit', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(25, 'Qualification view', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(26, 'Qualification delete', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(27, 'Annual fees access', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(28, 'Annual fees approved', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(29, 'Annual fees record', 'web', '2023-08-27 06:03:55', '2023-08-27 06:03:55'),
(30, 'Event fees access', 'web', '2023-08-27 06:03:56', '2023-08-27 06:03:56'),
(31, 'Event fees approved', 'web', '2023-08-27 06:03:56', '2023-08-27 06:03:56'),
(32, 'Event fees record', 'web', '2023-08-27 06:03:56', '2023-08-27 06:03:56'),
(33, 'Membership fees access', 'web', '2023-08-27 06:03:56', '2023-08-27 06:03:56'),
(34, 'Membership fees approved', 'web', '2023-08-27 06:03:56', '2023-08-27 06:03:56'),
(35, 'Membership fees record', 'web', '2023-08-27 06:03:56', '2023-08-27 06:03:56'),
(36, 'Pyment number access', 'web', '2023-08-27 06:03:56', '2023-08-27 06:03:56'),
(37, 'Pyment number create', 'web', '2023-08-27 06:03:56', '2023-08-27 06:03:56'),
(38, 'Pyment number edit', 'web', '2023-08-27 06:03:56', '2023-08-27 06:03:56'),
(39, 'Pyment number view', 'web', '2023-08-27 06:03:56', '2023-08-27 06:03:56'),
(40, 'Pyment number delete', 'web', '2023-08-27 06:03:56', '2023-08-27 06:03:56'),
(41, 'Pyment fees access', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(42, 'Pyment annual fees', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(43, 'Pyment membership fees', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(44, 'Gallery access', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(45, 'Gallery create', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(46, 'Gallery edit', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(47, 'Gallery delete', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(48, 'Event access', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(49, 'Event create', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(50, 'Event edit', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(51, 'Event delete', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(52, 'Contact access', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(53, 'Contact reply', 'web', '2023-08-27 06:03:57', '2023-08-27 06:03:57'),
(54, 'Contact delete', 'web', '2023-08-27 06:03:58', '2023-08-27 06:03:58'),
(55, 'Role access', 'web', '2023-08-27 06:03:58', '2023-08-27 06:03:58'),
(56, 'Role create', 'web', '2023-08-27 06:03:58', '2023-08-27 06:03:58'),
(57, 'Role edit', 'web', '2023-08-27 06:03:58', '2023-08-27 06:03:58'),
(58, 'Role delete', 'web', '2023-08-27 06:03:58', '2023-08-27 06:03:58'),
(59, 'User access', 'web', '2023-08-27 06:03:58', '2023-08-27 06:03:58'),
(60, 'User create', 'web', '2023-08-27 06:03:58', '2023-08-27 06:03:58'),
(61, 'User edit', 'web', '2023-08-27 06:03:58', '2023-08-27 06:03:58'),
(62, 'User delete', 'web', '2023-08-27 06:03:58', '2023-08-27 06:03:58'),
(63, 'Super-Admin', 'web', '2023-08-27 06:03:59', '2023-08-27 06:03:59'),
(64, 'Admin', 'web', '2023-08-27 06:03:59', '2023-08-27 06:03:59'),
(65, 'Member', 'web', '2023-08-27 06:03:59', '2023-08-27 06:03:59'),
(66, 'Data Setting', 'web', '2023-08-27 06:03:59', '2023-08-27 06:03:59'),
(67, 'Student Member', 'web', '2023-08-27 06:03:59', '2023-08-27 06:03:59'),
(68, 'Candidate Member', 'web', '2023-08-27 06:03:59', '2023-08-27 06:03:59'),
(69, 'Professional Member', 'web', '2023-08-27 06:03:59', '2023-08-27 06:03:59'),
(70, 'Associate Member', 'web', '2023-08-27 06:03:59', '2023-08-27 06:03:59'),
(71, 'Trade Member', 'web', '2023-08-27 06:03:59', '2023-08-27 06:03:59'),
(72, 'Corporate Member', 'web', '2023-08-27 06:03:59', '2023-08-27 06:03:59');

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
(1, 'Super-Admin', 'web', '2023-08-27 06:03:52', '2023-08-27 06:03:52'),
(2, 'Admin', 'web', '2023-08-27 06:03:52', '2023-08-27 06:03:52'),
(3, 'Member', 'web', '2023-08-27 06:03:53', '2023-08-27 06:03:53');

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
(1, 'IDAB', 'Admin', 'IDAB-ADMIN', '2021-12-31 18:00:00', '$2y$10$/lU8X/G9htoPUpxO1wp71OSu3ExCiJlY9fzumU1gyES6fwYcQjexK', NULL, NULL, NULL, NULL, NULL, 'fix/admin.jpg', NULL, NULL, 1, 1, NULL, '2023-08-27 06:03:52', '2023-08-27 06:03:52'),
(2, 'Member', 'member@gmail.com', 'IDAB-00000', '1999-12-31 18:00:00', '$2y$10$7eMEJa0UpZNcj2ONa/5Zpe7qiRvdxHTAqWm4bsWgN5Bh8qswDzyle', NULL, NULL, NULL, NULL, NULL, 'fix/member.jpg', NULL, NULL, 1, 1, NULL, '2023-08-27 06:03:52', '2023-08-27 06:03:52');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_child_details`
--
ALTER TABLE `info_child_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_companies`
--
ALTER TABLE `info_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_documents`
--
ALTER TABLE `info_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_others`
--
ALTER TABLE `info_others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_personals`
--
ALTER TABLE `info_personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_students`
--
ALTER TABLE `info_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mast_qualifications`
--
ALTER TABLE `mast_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member_types`
--
ALTER TABLE `member_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_numbers`
--
ALTER TABLE `payment_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
