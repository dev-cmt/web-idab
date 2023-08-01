-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 01:09 PM
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
-- Database: `pune_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `committee_user`
--

CREATE TABLE `committee_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `committee_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `check` int(11) NOT NULL DEFAULT 0,
  `seen` tinyint(4) NOT NULL DEFAULT 0,
  `to_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
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
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_payments`
--

CREATE TABLE `event_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` int(11) NOT NULL,
  `pay_number` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
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
  `person_no` int(11) DEFAULT NULL,
  `payment_number` varchar(255) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `transaction_no` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `receive_by` int(11) DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
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
  `collage` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `passing_year` int(11) DEFAULT NULL,
  `degree` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_academics`
--

INSERT INTO `info_academics` (`id`, `collage`, `subject`, `passing_year`, `degree`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Pune College', 'Computer Science', 1995, 2, '2023-04-05 05:07:55', '2023-04-05 05:07:55', 1),
(2, 'Pune College', 'Computer Science', 1995, 2, '2023-04-05 05:07:56', '2023-04-05 05:07:56', 2),
(3, NULL, NULL, NULL, NULL, '2023-04-05 05:08:06', '2023-04-05 05:08:06', 3),
(4, NULL, NULL, NULL, NULL, '2023-04-05 05:08:07', '2023-04-05 05:08:07', 4),
(5, NULL, NULL, NULL, NULL, '2023-04-05 05:08:07', '2023-04-05 05:08:07', 5);

-- --------------------------------------------------------

--
-- Table structure for table `info_families`
--

CREATE TABLE `info_families` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_name` varchar(255) DEFAULT NULL,
  `child_dob` date DEFAULT NULL,
  `child_gender` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
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
  `designation` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
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
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_others`
--

INSERT INTO `info_others` (`id`, `about_me`, `nick_name`, `phone_number`, `designation`, `company_name`, `cover_photo`, `favorite`, `facebook_url`, `youtube_url`, `instagram_url`, `twitter_url`, `linkedin_url`, `whatsapp_url`, `telegram_url`, `snapchat_url`, `tiktok_url`, `wechat_url`, `discord_url`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'Supper Admin', 'Icon Information Systems Ltd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-04-05 05:07:55', '2023-04-05 05:07:55'),
(2, NULL, NULL, NULL, 'Admin', 'Icon Information Systems Ltd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-04-05 05:07:56', '2023-04-05 05:07:56'),
(3, NULL, NULL, NULL, 'Deputy General Manager', 'Bangladesh Bank, Head Office', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2023-04-05 05:08:06', '2023-04-05 05:08:06'),
(4, NULL, NULL, NULL, 'Managing director', 'Icon Information Systems Ltd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2023-04-05 05:08:07', '2023-04-05 05:08:07'),
(5, NULL, NULL, NULL, 'Deputy Managing Director', 'Icon Information Systems Ltd.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2023-04-05 05:08:07', '2023-04-05 05:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `info_personals`
--

CREATE TABLE `info_personals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `marrital_status` int(11) DEFAULT NULL,
  `spouse` varchar(255) DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `number_child` int(11) DEFAULT NULL,
  `em_name` int(11) DEFAULT NULL,
  `em_phone` int(11) DEFAULT NULL,
  `em_rleation` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_personals`
--

INSERT INTO `info_personals` (`id`, `dob`, `gender`, `address`, `city`, `marrital_status`, `spouse`, `birth_day`, `number_child`, `em_name`, `em_phone`, `em_rleation`, `created_at`, `updated_at`, `user_id`) VALUES
(1, NULL, NULL, 'Shariatpur', 'Dhaka', 0, NULL, NULL, 0, NULL, NULL, NULL, '2023-04-05 05:07:55', '2023-04-05 05:07:55', 1),
(2, NULL, NULL, 'Shariatpur', 'Dhaka', 0, NULL, NULL, 0, NULL, NULL, NULL, '2023-04-05 05:07:55', '2023-04-05 05:07:55', 2),
(3, NULL, NULL, 'Gulshan', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-05 05:08:06', '2023-04-05 05:08:06', 3),
(4, NULL, NULL, 'Gulshan', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-05 05:08:07', '2023-04-05 05:08:07', 4),
(5, NULL, NULL, 'Gulshan', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-05 05:08:07', '2023-04-05 05:08:07', 5);

-- --------------------------------------------------------

--
-- Table structure for table `lose_members`
--

CREATE TABLE `lose_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `batch` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, '2023_02_28_060339_create_galleries_table', 1),
(9, '2023_02_28_060645_create_images_table', 1),
(10, '2023_03_06_062889_create_info_personals_table', 1),
(11, '2023_03_06_062922_create_info_academics_table', 1),
(12, '2023_03_06_063858_create_info_families_table', 1),
(13, '2023_03_06_063990_create_info_others_table', 1),
(14, '2023_03_13_045337_create_committees_table', 1),
(15, '2023_03_13_092450_create_committee_user_table', 1),
(16, '2023_03_19_074905_create_lose_members_table', 1),
(17, '2023_03_19_075912_create_contacts_table', 1),
(18, '2023_03_19_084411_create_events_table', 1),
(19, '2023_03_22_085235_create_event_payments_table', 1),
(20, '2023_03_22_085312_create_event_registers_table', 1),
(21, '2023_03_27_040904_create_subscription_setups_table', 1),
(22, '2023_03_28_040905_create_subscriptions_table', 1),
(23, '2023_04_02_095647_create_subscriptions_histories_table', 1),
(24, '2023_04_03_140847_add_trigger', 1);

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
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5);

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
(1, 'Setting access', 'web', '2023-04-05 05:07:57', '2023-04-05 05:07:57'),
(2, 'Pages access', 'web', '2023-04-05 05:07:57', '2023-04-05 05:07:57'),
(3, 'Gallery access', 'web', '2023-04-05 05:07:57', '2023-04-05 05:07:57'),
(4, 'Gallery create', 'web', '2023-04-05 05:07:57', '2023-04-05 05:07:57'),
(5, 'Gallery edit', 'web', '2023-04-05 05:07:57', '2023-04-05 05:07:57'),
(6, 'Gallery delete', 'web', '2023-04-05 05:07:57', '2023-04-05 05:07:57'),
(7, 'Member access', 'web', '2023-04-05 05:07:58', '2023-04-05 05:07:58'),
(8, 'Approve Member', 'web', '2023-04-05 05:07:58', '2023-04-05 05:07:58'),
(9, 'Member create', 'web', '2023-04-05 05:07:58', '2023-04-05 05:07:58'),
(10, 'Member edit', 'web', '2023-04-05 05:07:58', '2023-04-05 05:07:58'),
(11, 'Member delete', 'web', '2023-04-05 05:07:58', '2023-04-05 05:07:58'),
(12, 'User access', 'web', '2023-04-05 05:07:58', '2023-04-05 05:07:58'),
(13, 'User create', 'web', '2023-04-05 05:07:59', '2023-04-05 05:07:59'),
(14, 'User edit', 'web', '2023-04-05 05:07:59', '2023-04-05 05:07:59'),
(15, 'User delete', 'web', '2023-04-05 05:07:59', '2023-04-05 05:07:59'),
(16, 'Role access', 'web', '2023-04-05 05:07:59', '2023-04-05 05:07:59'),
(17, 'Role create', 'web', '2023-04-05 05:07:59', '2023-04-05 05:07:59'),
(18, 'Role edit', 'web', '2023-04-05 05:07:59', '2023-04-05 05:07:59'),
(19, 'Role delete', 'web', '2023-04-05 05:07:59', '2023-04-05 05:07:59');

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
(1, 'Supper-Admin', 'web', '2023-04-05 05:07:56', '2023-04-05 05:07:56'),
(2, 'Admin', 'web', '2023-04-05 05:07:56', '2023-04-05 05:07:56'),
(3, 'Member', 'web', '2023-04-05 05:07:56', '2023-04-05 05:07:56');

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
(3, 2),
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
(19, 1);

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
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `payment_number` varchar(255) DEFAULT NULL,
  `transaction_no` varchar(255) DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `duo_amount` int(11) DEFAULT NULL,
  `fineds` int(11) DEFAULT NULL,
  `receive_by` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `subscriptions`
--
DELIMITER $$
CREATE TRIGGER `add_trigger_subscriptions` AFTER INSERT ON `subscriptions` FOR EACH ROW BEGIN
                set @mydate =(select sub_start_date from subscription_setups);
                set @fees =(select monthly_fee from subscription_setups);
                sET @NUM=NEW.duo_amount / @fees;
                set @i=0, @chk=0;
                set @chk=(select COUNT(*) FROM subscriptions_histories WHERE subscriptions_histories.user_id = NEW.user_id );
                
                -- if (OLD.status = 0 and new.status =  1 ) then  
                    if (@chk < 1 )then
                        while (@i < @NUM) do
                            INSERT INTO subscriptions_histories (sub_month, pay_date, amount, subscriptions_id, user_id)
                            VALUES (@mydate, NEW.start_date, @fees, NEW.id, NEW.user_id);
                            SET @mydate= date_add(@mydate,INTERVAL 1 month);
                            set @i=@i + 1;
                        end while;
                    ELSE	
                        set @mydate =(select sub_month from subscriptions_histories WHERE subscriptions_histories.user_id = NEW.user_id order by sub_month desc LIMIT 1);
                        while (@i < @NUM) do
                            SET @mydate= date_add(@mydate,INTERVAL 1 month);
                            INSERT INTO subscriptions_histories (sub_month, pay_date, amount, subscriptions_id, user_id)
                            VALUES (@mydate, NEW.start_date, @fees, NEW.id, NEW.user_id);
                            
                            set @i=@i + 1;
                        end while;
                    end if;
                -- end if;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions_histories`
--

CREATE TABLE `subscriptions_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_month` date DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `subscriptions_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_setups`
--

CREATE TABLE `subscription_setups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `monthly_fee` int(11) DEFAULT NULL,
  `sub_start_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_setups`
--

INSERT INTO `subscription_setups` (`id`, `monthly_fee`, `sub_start_date`, `created_at`, `updated_at`) VALUES
(1, 500, '2023-01-01', '2023-04-05 05:08:06', '2023-04-05 05:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `cm_adviser` tinyint(1) NOT NULL DEFAULT 0,
  `cm_ecommittee` tinyint(1) NOT NULL DEFAULT 0,
  `cm_welfare` tinyint(1) NOT NULL DEFAULT 0,
  `pune_member` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `batch`, `contact_number`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `status`, `is_admin`, `cm_adviser`, `cm_ecommittee`, `cm_welfare`, `pune_member`, `created_at`, `updated_at`) VALUES
(1, 'Pune Club', '55', '01909302126', 'admin@gmail.com', '1999-12-31 18:00:00', '$2y$10$ZExizO8uB/dghKNScAoJteYCGLehCoHGBchFOIql6NfZ.McQlRvCS', NULL, NULL, NULL, NULL, NULL, 'fix/admin.jpg', 1, 1, 0, 0, 0, 0, '2023-04-05 05:07:55', '2023-04-05 05:07:55'),
(2, 'Member', '55', '01909302126', 'member@gmail.com', '1999-12-31 18:00:00', '$2y$10$kkFqt24ejCzrv0Brfh6jJuJpxCxsRe7MQdytbpkgZ1r0FVW4LmBBi', NULL, NULL, NULL, NULL, NULL, 'fix/member.jpg', 1, 1, 0, 0, 0, 0, '2023-04-05 05:07:55', '2023-04-05 05:07:55'),
(3, 'Md Zakiul Alam Sarker', '1995', '01711136108', 'zakiulalam@iconisl.com', '1999-12-31 18:00:00', '$2y$10$hL5AMD5EylC646omNBuonu2Ktx8IAml5u2e/isUMS9ZA0Diro8hFK', NULL, NULL, NULL, NULL, NULL, 'fix/Md. Zakiul Alam Sarker.jpg', 1, 1, 1, 1, 1, 1, '2023-04-05 05:08:06', '2023-04-05 05:08:06'),
(4, 'Khondokar Arifur Rahman', '1995', '01720012715', 'arif@iconisl.com', '1999-12-31 18:00:00', '$2y$10$ysU4sjXbXbDEfhqdUEPqve2rtbYAoRccDchZjEfKvOtDrhRpGCgea', NULL, NULL, NULL, NULL, NULL, 'fix/Khondokar Arifur Rahman.jpg', 1, 1, 1, 1, 0, 1, '2023-04-05 05:08:07', '2023-04-05 05:08:07'),
(5, 'Reajul Islam Chisty', '1993', '01756937902', 'chisty@iconisl.com', '1999-12-31 18:00:00', '$2y$10$ndynoAlmeEmwIqqdUoutHeETgfF/9h07nmBk29eQTnbqLOP5/47Yq', NULL, NULL, NULL, NULL, NULL, 'fix/Sk Md.Reajul Islam.jpg', 1, 1, 1, 1, 0, 1, '2023-04-05 05:08:07', '2023-04-05 05:08:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committees_user_id_foreign` (`user_id`);

--
-- Indexes for table `committee_user`
--
ALTER TABLE `committee_user`
  ADD KEY `committee_user_user_id_foreign` (`user_id`),
  ADD KEY `committee_user_committee_id_foreign` (`committee_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_payments`
--
ALTER TABLE `event_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_payments_event_id_foreign` (`event_id`),
  ADD KEY `event_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_registers`
--
ALTER TABLE `event_registers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_registers_event_id_foreign` (`event_id`),
  ADD KEY `event_registers_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_user_id_foreign` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_academics`
--
ALTER TABLE `info_academics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_academics_user_id_foreign` (`user_id`);

--
-- Indexes for table `info_families`
--
ALTER TABLE `info_families`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_families_user_id_foreign` (`user_id`);

--
-- Indexes for table `info_others`
--
ALTER TABLE `info_others`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_others_user_id_foreign` (`user_id`);

--
-- Indexes for table `info_personals`
--
ALTER TABLE `info_personals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_personals_user_id_foreign` (`user_id`);

--
-- Indexes for table `lose_members`
--
ALTER TABLE `lose_members`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`);

--
-- Indexes for table `subscriptions_histories`
--
ALTER TABLE `subscriptions_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `subscription_setups`
--
ALTER TABLE `subscription_setups`
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
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `event_payments`
--
ALTER TABLE `event_payments`
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
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_academics`
--
ALTER TABLE `info_academics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `info_families`
--
ALTER TABLE `info_families`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_others`
--
ALTER TABLE `info_others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `info_personals`
--
ALTER TABLE `info_personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lose_members`
--
ALTER TABLE `lose_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions_histories`
--
ALTER TABLE `subscriptions_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_setups`
--
ALTER TABLE `subscription_setups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `committees`
--
ALTER TABLE `committees`
  ADD CONSTRAINT `committees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `committee_user`
--
ALTER TABLE `committee_user`
  ADD CONSTRAINT `committee_user_committee_id_foreign` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `committee_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_payments`
--
ALTER TABLE `event_payments`
  ADD CONSTRAINT `event_payments_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_registers`
--
ALTER TABLE `event_registers`
  ADD CONSTRAINT `event_registers_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_registers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `info_academics`
--
ALTER TABLE `info_academics`
  ADD CONSTRAINT `info_academics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `info_families`
--
ALTER TABLE `info_families`
  ADD CONSTRAINT `info_families_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `info_others`
--
ALTER TABLE `info_others`
  ADD CONSTRAINT `info_others_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `info_personals`
--
ALTER TABLE `info_personals`
  ADD CONSTRAINT `info_personals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions_histories`
--
ALTER TABLE `subscriptions_histories`
  ADD CONSTRAINT `subscriptions_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
