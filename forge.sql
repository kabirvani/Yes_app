-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 12:51 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forge`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `financial_year_end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beee_level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beee_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_address_line1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_address_line2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physical_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_address_line1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_address_line2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `po_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesorder_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_confirm` int(11) DEFAULT '0',
  `commit_confirmed` int(11) DEFAULT '0',
  `paymentstatus` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `name`, `email`, `reg_num`, `company_type`, `industry`, `tel_num`, `country_code`, `website_address`, `financial_year_end`, `vat_num`, `beee_level`, `beee_certificate`, `physical_address_line1`, `physical_address_line2`, `physical_city`, `physical_state`, `physical_zip_code`, `physical_country`, `postal_address_line1`, `postal_address_line2`, `postal_city`, `postal_state`, `postal_zip_code`, `postal_country`, `created_at`, `updated_at`, `user_id`, `po_number`, `salesorder_no`, `invoice_number`, `payment_confirm`, `commit_confirmed`, `paymentstatus`) VALUES
(1, 'test', 'maninder.punia@kabirinfo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-08 02:01:54', '2019-03-08 02:01:54', 1, NULL, NULL, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_phone_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_phone_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `email`, `primary_first_name`, `primary_last_name`, `primary_phone_num`, `primary_country_code`, `account_first_name`, `account_last_name`, `account_phone_num`, `account_country_code`, `account_email`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'maninder.punia@kabirinfo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-03-08 02:01:54', '2019-03-08 02:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_02_18_123417_create_company_details_table', 1),
(12, '2019_02_19_130608_create_contact_details_table', 1),
(13, '2019_02_26_134417_create_work_experiences_table', 1),
(14, '2019_03_05_213016_add_user_id_to_company_details_table', 1),
(15, '2019_03_06_093022_add_invoices_to_company_details_table', 1),
(16, '2019_03_07_100813_create_youths_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`) VALUES
(1, 'test', 'maninder.punia@kabirinfo.com', '$2y$10$Ym4MNWRVceBjqVOs12TvUOBb.XuB/lEOBcNxNRdaU8zVzkmzmmbSq', NULL, '2019-03-08 02:01:54', '2019-03-08 02:01:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youth_num` int(11) DEFAULT '0',
  `excluding_vat` double(8,2) DEFAULT '0.00',
  `po_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `checkout_status` int(11) DEFAULT '0',
  `exp_type` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `youths`
--

CREATE TABLE `youths` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_signed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `race` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disabled` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `youths`
--

INSERT INTO `youths` (`id`, `job_title`, `title`, `first_name`, `last_name`, `mobile`, `start_date`, `work_address`, `contact_signed`, `id_number`, `gender`, `race`, `disabled`, `employee_number`, `monthly_salary`, `primary_email`, `sup_first_name`, `sup_last_name`, `sup_email`, `sup_mobile`, `created_at`) VALUES
(1, ' \n                  job title1\n                ', ' \n                   \n                   \n                  title\n                \n                ', 'ed', ' \n                   \n                   \n                   \n                   \n                   \n                   \n                  ssdf', '767687678', ' \n                  03/03/2019\n                ', 'Chandigarh', '03/03/2019', ' \n                   \n                   \n                   \n                   \n                   \n                   \n                  gfggfg', 'Male', 'swdcsaq', 'No', '76876876', '10000', 'test@gmail.com', 'testname', 'tsetlastname', 'test@gmail.com', '7676787678', '2019-03-08 11:39:14'),
(2, 'job title2', 'title2', ' \n                   \n                  ssqwdsqw', 'mendy', '767687678', 'sq03/03/2019\n                ', 'Chandigarh', '03/03/2019', ' \n                   \n                  dsq', 'Male', 'swdcsaq', 'No', '76876876', '10000', 'test@gmail.com', 'testname', 'tsetlastname', 'test@gmail.com', '7676787678', '2019-03-08 08:00:28'),
(3, 'job title3', 'title3', ' \r\n                   \r\n                  ssqwdsqw', 'mike', 'tysn', '03/04/2019\r\n                ', 'Chandigarh', '03/03/2019', ' \n                   \n                   \n                  rdgdfgd', 'Female', 'swdcsaq', 'No', '76876876', '10000', 'test@gmail.com', 'testname', 'tsetlastname', 'test@gmail.com', '7676787678', '2019-03-08 11:39:25'),
(4, 'job title4', 'title4', ' \r\n                   \r\n                  ssqwdsqw', 'janine', 'beron', '03/04/2019\r\n                ', 'Chandigarh', '03/03/2019', ' \r\n                   \r\n                  dsq', 'Female', 'swdcsaq', 'No', '76876876', '10000', 'test@gmail.com', 'testname', 'tsetlastname', 'test@gmail.com', '7676787678', '2019-03-08 08:00:28'),
(5, 'job title5', 'title5', ' janine\r\n                   \r\n                  ssqwdsqw', 'beron', '7878676756', '03/04/2019\r\n                ', 'Chandigarh', '03/03/2019', ' \r\n                   \r\n                  dsq', 'Female', 'swdcsaq', 'No', '76876876', '10000', 'test@gmail.com', 'testname', 'tsetlastname', 'test@gmail.com', '7676787678', '2019-03-08 08:00:28'),
(6, 'job title6', 'title6', 'janine\r\n                   \r\n                  ssqwdsqw', 'beron', '7878676756', '03/04/2019\r\n                ', 'Chandigarh', '03/03/2019', ' \r\n                   \r\n                  dsq', 'Female', 'swdcsaq', 'No', '76876876', '10000', 'test@gmail.com', 'testname', 'tsetlastname', 'test@gmail.com', '7676787678', '2019-03-08 08:00:28'),
(7, 'job title7', 'title7', 'sona\r\n                   \r\n                  ssqwdsqw', 'beron', '7878676756', '03/04/2019\r\n                ', 'Chandigarh', '03/03/2019', ' \r\n                   \r\n                  dsq', 'Female', 'swdcsaq', 'No', '76876876', '10000', 'test@gmail.com', 'testname', 'tsetlastname', 'test@gmail.com', '7676787678', '2019-03-08 08:00:28'),
(8, 'job title8', 'title8', 'mike\r\n                   \r\n                  ssqwdsqw', 'beron', '7878676756', '03/04/2019\r\n                ', 'Chandigarh', '03/03/2019', ' \r\n                   \r\n                  dsq', 'Female', 'swdcsaq', 'No', '76876876', '10000', 'test@gmail.com', 'testname', 'tsetlastname', 'test@gmail.com', '7676787678', '2019-03-08 08:00:28'),
(9, 'job title9', 'title9', 'mike\r\n                   \r\n                  ssqwdsqw', 'beron', '7878676756', '03/04/2019\r\n                ', 'Chandigarh', '03/03/2019', ' \r\n                   \r\n                  dsq', 'Female', 'swdcsaq', 'No', '76876876', '10000', 'test@gmail.com', 'testname', 'tsetlastname', 'test@gmail.com', '7676787678', '2019-03-08 08:00:28'),
(10, 'job title10', 'title10', 'mike\r\n                   \r\n                  ssqwdsqw', 'beron', '7878676756', '03/04/2019\r\n                ', 'Chandigarh', '03/03/2019', ' \r\n                   \r\n                  dsq', 'Female', 'swdcsaq', 'No', '76876876', '10000', 'test@gmail.com', 'testname', 'tsetlastname', 'test@gmail.com', '7676787678', '2019-03-08 08:00:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_details_email_unique` (`email`),
  ADD KEY `company_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_details_email_unique` (`email`),
  ADD KEY `contact_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youths`
--
ALTER TABLE `youths`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `youths`
--
ALTER TABLE `youths`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_details`
--
ALTER TABLE `company_details`
  ADD CONSTRAINT `company_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD CONSTRAINT `contact_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
