-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2023 at 12:56 PM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbvitalsync`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(50, '2014_10_12_000000_create_users_table', 1),
(51, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(52, '2019_08_19_000000_create_failed_jobs_table', 1),
(53, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(54, '2023_12_03_142350_create_application_forms_table', 1),
(55, '2023_12_04_081607_create_user_accounts_table', 1),
(56, '2023_12_04_084241_create_patient_profiles_table', 1),
(57, '2023_12_06_122937_create_processed_forms_table', 1),
(58, '2023_12_06_123203_create_logs_table', 1),
(59, '2023_12_06_123357_create_patient_allergies_table', 1),
(60, '2023_12_06_124539_create_allergies_table', 1),
(61, '2023_12_08_155657_create_lab_reports_table', 2),
(62, '2023_12_08_160534_create_medical_histories_table', 2),
(63, '2023_12_08_161333_create_guardian_profiles_table', 2),
(68, '2023_12_09_135814_create_prescriptions_table', 3),
(69, '2023_12_09_140457_create_prescription_drugs_table', 3),
(70, '2023_12_09_140954_create_drugs_table', 3),
(71, '2023_12_09_141330_create_doctor_profiles_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\UserAccounts', 0, 'MyAppToken', 'c5cb4a4485f285f39ac304251dddba5dc5d95df6acfa0bf5d898d698d1d696b0', '[\"*\"]', NULL, NULL, '2023-12-12 01:44:15', '2023-12-12 01:44:15'),
(2, 'App\\Models\\UserAccounts', 0, 'MyAppToken', '8e65687c82d17dc53839f215e80ce8beec58c8b090375bf6f23a4e4e0888637f', '[\"*\"]', '2023-12-12 06:36:10', NULL, '2023-12-12 01:49:56', '2023-12-12 06:36:10'),
(3, 'App\\Models\\UserAccounts', 0, 'MyAppToken', 'bdc80042d4a3914ebbde2c364c3ff2122036762aaefb1be04188f008de71105b', '[\"*\"]', NULL, NULL, '2023-12-12 01:56:17', '2023-12-12 01:56:17'),
(4, 'App\\Models\\UserAccounts', 0, 'MyAppToken', '7799003d9e95087e4bf84bf20f69faec3c8a2cf3109d22bba1e94e75813726b1', '[\"*\"]', NULL, NULL, '2023-12-12 02:02:59', '2023-12-12 02:02:59'),
(5, 'App\\Models\\UserAccounts', 0, 'MyAppToken', '9f5cc20c3e90ecbd8dc3bc3bd8bd27a993bba3064142db98555be45e7fc69f99', '[\"*\"]', NULL, NULL, '2023-12-12 07:22:58', '2023-12-12 07:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allergies`
--

CREATE TABLE `tbl_allergies` (
  `allrgy_id` int UNSIGNED NOT NULL,
  `allrgy_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allrgy_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allrgy_severity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allrgy_notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_allergies`
--

INSERT INTO `tbl_allergies` (`allrgy_id`, `allrgy_name`, `allrgy_type`, `allrgy_severity`, `allrgy_notes`) VALUES
(1, 'buh', 'cat', 'very', 'its real');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app_form`
--

CREATE TABLE `tbl_app_form` (
  `app_queue_num` int UNSIGNED NOT NULL,
  `app_full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_app_form`
--

INSERT INTO `tbl_app_form` (`app_queue_num`, `app_full_name`, `app_department`, `app_service`, `app_email`) VALUES
(5, 'karlos daniel', 'ortho', 'akmdnsad', 'laggerlol236@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_profile`
--

CREATE TABLE `tbl_doctor_profile` (
  `doctor_id` int UNSIGNED NOT NULL,
  `doctor_surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_mid_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_extn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_doctor_profile`
--

INSERT INTO `tbl_doctor_profile` (`doctor_id`, `doctor_surname`, `doctor_first_name`, `doctor_mid_name`, `doctor_extn_name`, `doctor_sex`, `doctor_contact_number`, `doctor_address`, `doctor_signature`) VALUES
(1, 'buh', 'karlos', 'buh', NULL, 'male', '+6534564561', 'somewhere', '/storage/Signatures/Fpn2iG0fwIkVhIOrz4SF0otrHMACrM5dkHx4LcRm.png'),
(2, 'buh', 'karlos', 'buh', NULL, 'male', '+6534564561', 'somewhere', '/storage/Signatures/BbIC6MRupZAfF236ssMH15LyZWX1X7h3cuTzL0eA.png'),
(3, 'buh', 'karlos', 'buh', NULL, 'male', '+6534564561', 'somewhere', '/storage/Signatures/wh8OKazXSqi3sOsxxmBwtsZ8eQ87LR3ejiTlJQ0x.png'),
(4, 'buh', 'karlos', 'buh', NULL, 'male', '+6534564561', 'somewhere', '/storage/o1umSjQ91TxtUsqwZCmpv8eivfKq4iPVKzGcDjl7.png'),
(5, 'buh', 'karlos', 'buh', NULL, 'male', '+6534564561', 'somewhere', '/storage/Signatures/o5fRSeBySJSvtoSc7wMRHfMJAR4hnRzU8haUkNoC.png'),
(6, 'buh', 'karlos', 'buh', NULL, 'male', '+6534564561', 'somewhere', '/storage/Signatures/ijxsQjHyc4M4MeG1UCNV0vGyt3mYzdFd61TdatGX.png'),
(7, 'buh', 'karlos', 'buh', NULL, 'male', '+6534564561', 'somewhere', '/storage//tmp/phpL13VwD'),
(8, 'buh', 'karlos', 'buh', NULL, 'male', '+6534564561', 'somewhere', '/storage/lGYOSRbXnrgYdqjzYjDgCn9lVOYhYl9NDbcuTXhL.png'),
(9, 'buh', 'karlos', 'buh', NULL, 'male', '+6534564561', 'somewhere', '/storage/Signatures/Pez57jGhCBVDTJFGO3EPoCJI91wDEygDbkNkVlrE.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drugs`
--

CREATE TABLE `tbl_drugs` (
  `drug_id` int UNSIGNED NOT NULL,
  `drug_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drug_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_drugs`
--

INSERT INTO `tbl_drugs` (`drug_id`, `drug_name`, `drug_description`) VALUES
(1, 'addy', 'for adhd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grdn_profile`
--

CREATE TABLE `tbl_grdn_profile` (
  `grdn_id` int UNSIGNED NOT NULL,
  `grdn_surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grdn_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grdn_mid_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grdn_extn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grdn_sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grdn_birth_date` date NOT NULL,
  `grdn_blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grdn_marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grdn_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grdn_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_grdn_profile`
--

INSERT INTO `tbl_grdn_profile` (`grdn_id`, `grdn_surname`, `grdn_first_name`, `grdn_mid_name`, `grdn_extn_name`, `grdn_sex`, `grdn_birth_date`, `grdn_blood_group`, `grdn_marital_status`, `grdn_contact_number`, `grdn_address`) VALUES
(1, 'buh', 'karlos', 'buh', NULL, 'male', '2002-05-15', 's', 'single', '+63954654654', 'b1 l2 w3 s4 n5 e6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lab_report`
--

CREATE TABLE `tbl_lab_report` (
  `labrep_id` int UNSIGNED NOT NULL,
  `labrep_ptnt_id` int NOT NULL,
  `labrep_test_date` date NOT NULL,
  `labrep_test_time` time NOT NULL,
  `labrep_result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labrep_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_lab_report`
--

INSERT INTO `tbl_lab_report` (`labrep_id`, `labrep_ptnt_id`, `labrep_test_date`, `labrep_test_time`, `labrep_result`, `labrep_type`) VALUES
(1, 1, '2023-10-15', '20:30:00', 'dead', 'dead');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int UNSIGNED NOT NULL,
  `log_usr_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_app_queue_num` int NOT NULL,
  `log_action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `log_usr_username`, `log_app_queue_num`, `log_action`) VALUES
(1, 'laefy', 3, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_med_history`
--

CREATE TABLE `tbl_med_history` (
  `medhis_id` int UNSIGNED NOT NULL,
  `medhis_ptnt_id` int NOT NULL,
  `medhis_record_date` date NOT NULL,
  `medhis_record_time` time NOT NULL,
  `medhis_height` double(8,2) NOT NULL,
  `medhis_weight` double(8,2) NOT NULL,
  `medhis_blood_pressure` double(8,2) NOT NULL,
  `medhis_glucose` double(8,2) NOT NULL,
  `medhis_illness` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_med_history`
--

INSERT INTO `tbl_med_history` (`medhis_id`, `medhis_ptnt_id`, `medhis_record_date`, `medhis_record_time`, `medhis_height`, `medhis_weight`, `medhis_blood_pressure`, `medhis_glucose`, `medhis_illness`) VALUES
(1, 1, '2010-01-20', '08:40:00', 150.80, 60.10, 50.30, 10.10, 'ligma');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_allergies`
--

CREATE TABLE `tbl_patient_allergies` (
  `pa_ptnt_id` int NOT NULL,
  `pa_allrgy_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_patient_allergies`
--

INSERT INTO `tbl_patient_allergies` (`pa_ptnt_id`, `pa_allrgy_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_profile`
--

CREATE TABLE `tbl_patient_profile` (
  `ptnt_id` int UNSIGNED NOT NULL,
  `ptnt_grdn_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ptnt_surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ptnt_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ptnt_mid_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ptnt_extn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ptnt_sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ptnt_birth_date` date NOT NULL,
  `ptnt_blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ptnt_marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ptnt_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ptnt_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_patient_profile`
--

INSERT INTO `tbl_patient_profile` (`ptnt_id`, `ptnt_grdn_id`, `ptnt_surname`, `ptnt_first_name`, `ptnt_mid_name`, `ptnt_extn_name`, `ptnt_sex`, `ptnt_birth_date`, `ptnt_blood_group`, `ptnt_marital_status`, `ptnt_contact_number`, `ptnt_address`) VALUES
(1, '1', 'vicario', 'karlos', 'castillo', NULL, 'male', '2002-05-15', 'z', 'HUH', '09', 'ZU LUL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription`
--

CREATE TABLE `tbl_prescription` (
  `prescr_id` int UNSIGNED NOT NULL,
  `prescr_ptnt_id` int NOT NULL,
  `prescr_doctor_id` int NOT NULL,
  `prescr_date` date NOT NULL,
  `prescr_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_prescription`
--

INSERT INTO `tbl_prescription` (`prescr_id`, `prescr_ptnt_id`, `prescr_doctor_id`, `prescr_date`, `prescr_time`) VALUES
(1, 1, 1, '2020-10-20', '21:30:00'),
(2, 1, 9, '2020-10-20', '21:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription_drugs`
--

CREATE TABLE `tbl_prescription_drugs` (
  `pd_prescr_id` int NOT NULL,
  `pd_drug_id` int NOT NULL,
  `pd_instruction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_prescription_drugs`
--

INSERT INTO `tbl_prescription_drugs` (`pd_prescr_id`, `pd_drug_id`, `pd_instruction`) VALUES
(1, 1, '3x a day'),
(2, 1, '3x a day');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_processed_forms`
--

CREATE TABLE `tbl_processed_forms` (
  `form_id` int UNSIGNED NOT NULL,
  `form_app_queue_num` int NOT NULL,
  `form_appointment_date` date NOT NULL,
  `form_appointment_time` time NOT NULL,
  `form_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_isaccepted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_processed_forms`
--

INSERT INTO `tbl_processed_forms` (`form_id`, `form_app_queue_num`, `form_appointment_date`, `form_appointment_time`, `form_reason`, `form_isaccepted`) VALUES
(1, 4, '2050-10-10', '01:50:00', 'buh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_accounts`
--

CREATE TABLE `tbl_user_accounts` (
  `usr_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_acc_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user_accounts`
--

INSERT INTO `tbl_user_accounts` (`usr_email`, `usr_username`, `usr_password`, `usr_acc_type`) VALUES
('laggerlol236@gmail.com', 'laefy13', '$2y$12$TVSlr6rzYEx8USwAD7/Hdutmk7qFA5qV0XLq.s/tvYyRnbUCNpufy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_allergies`
--
ALTER TABLE `tbl_allergies`
  ADD PRIMARY KEY (`allrgy_id`);

--
-- Indexes for table `tbl_app_form`
--
ALTER TABLE `tbl_app_form`
  ADD PRIMARY KEY (`app_queue_num`);

--
-- Indexes for table `tbl_doctor_profile`
--
ALTER TABLE `tbl_doctor_profile`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `tbl_drugs`
--
ALTER TABLE `tbl_drugs`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `tbl_grdn_profile`
--
ALTER TABLE `tbl_grdn_profile`
  ADD PRIMARY KEY (`grdn_id`);

--
-- Indexes for table `tbl_lab_report`
--
ALTER TABLE `tbl_lab_report`
  ADD PRIMARY KEY (`labrep_id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_med_history`
--
ALTER TABLE `tbl_med_history`
  ADD PRIMARY KEY (`medhis_id`);

--
-- Indexes for table `tbl_patient_allergies`
--
ALTER TABLE `tbl_patient_allergies`
  ADD KEY `tbl_patient_allergies_pa_ptnt_id_pa_allrgy_id_index` (`pa_ptnt_id`,`pa_allrgy_id`);

--
-- Indexes for table `tbl_patient_profile`
--
ALTER TABLE `tbl_patient_profile`
  ADD PRIMARY KEY (`ptnt_id`);

--
-- Indexes for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD PRIMARY KEY (`prescr_id`);

--
-- Indexes for table `tbl_processed_forms`
--
ALTER TABLE `tbl_processed_forms`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `tbl_user_accounts`
--
ALTER TABLE `tbl_user_accounts`
  ADD PRIMARY KEY (`usr_email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_allergies`
--
ALTER TABLE `tbl_allergies`
  MODIFY `allrgy_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_app_form`
--
ALTER TABLE `tbl_app_form`
  MODIFY `app_queue_num` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_doctor_profile`
--
ALTER TABLE `tbl_doctor_profile`
  MODIFY `doctor_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_drugs`
--
ALTER TABLE `tbl_drugs`
  MODIFY `drug_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_grdn_profile`
--
ALTER TABLE `tbl_grdn_profile`
  MODIFY `grdn_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_lab_report`
--
ALTER TABLE `tbl_lab_report`
  MODIFY `labrep_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_med_history`
--
ALTER TABLE `tbl_med_history`
  MODIFY `medhis_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_patient_profile`
--
ALTER TABLE `tbl_patient_profile`
  MODIFY `ptnt_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  MODIFY `prescr_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_processed_forms`
--
ALTER TABLE `tbl_processed_forms`
  MODIFY `form_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
