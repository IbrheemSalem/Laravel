-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 11:28 PM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Ibrheem Salem', 'ebrheem-salem@hotmail.com', '$2y$10$dUMEvnxq4nWKmxoINt0.1ePCe951wBOhuoqmaVBw0acIFixjo.VEC');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Jordan'),
(2, 'Egypt');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '1 => male \r\n2 -> female',
  `medical_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `title`, `hospital_id`, `address`, `gender`, `medical_id`, `created_at`, `updated_at`) VALUES
(1, 'Ahmmad salem', 'Doctor', 1, 'Jordan - Amman', 1, 2, NULL, NULL),
(3, 'Ibraheem Mohammad', 'Advisor', 1, 'Jordan - Na\'ur', 1, 2, NULL, NULL),
(5, 'Amal Ali', 'Advisor', 4, ' Jordan - khlda', 2, 2, NULL, NULL),
(6, 'Ammane Abd', 'Doctor', 5, 'Jordan -  test', 2, 1, NULL, NULL),
(7, 'Name-test ', 'Advisor', 5, 'Jordan - test', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_service`
--

CREATE TABLE `doctor_service` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_service`
--

INSERT INTO `doctor_service` (`id`, `doctor_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL),
(2, 3, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 3, 4, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 5, 3, NULL, NULL),
(7, 1, 1, NULL, NULL),
(8, 1, 2, NULL, NULL),
(9, 1, 4, NULL, NULL),
(10, 6, 3, NULL, NULL),
(11, 6, 4, NULL, NULL),
(19, 7, 1, NULL, NULL),
(20, 7, 2, NULL, NULL),
(23, 7, 3, NULL, NULL),
(24, 7, 4, NULL, NULL),
(25, 6, 1, NULL, NULL);

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
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `countrie_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `address`, `countrie_id`, `created_at`, `updated_at`) VALUES
(1, 'Al-Bashir Hospital', 'Jordan - Amman', 1, NULL, NULL),
(4, 'salt Hospital', 'jordan - salt', 1, NULL, NULL),
(5, 'test Hospital', 'jordan - test ', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicals`
--

CREATE TABLE `medicals` (
  `id` int(11) NOT NULL,
  `pdf` varchar(100) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicals`
--

INSERT INTO `medicals` (`id`, `pdf`, `patient_id`) VALUES
(1, 'Ibraheem.pdf', 1),
(2, 'Ahmmad.pdf', 2);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_12_27_133454_create_mobile_db', 1),
(5, '2022_12_27_214452_create_test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offrts`
--

CREATE TABLE `offrts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `name_ar` varchar(50) DEFAULT NULL,
  `name_en` varchar(50) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `statues` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offrts`
--

INSERT INTO `offrts` (`id`, `name`, `price`, `photo`, `updated_at`, `created_at`, `name_ar`, `name_en`, `details`, `statues`) VALUES
(38, 'offers 7', 200, '1672565784.png', NULL, '2023-01-01 07:36:24', 'عرض 7', 'offers 7', 'offers 7 offers 7 offers 7 offers 7 offers 7', 0),
(45, 'offers 4', 200, '1672612902.jpg', NULL, '2023-01-01 20:41:42', 'عرض 4', 'offers 4', 'offers 8 offers 8 offers 8 offers 8 offers 8 offers 8', 0),
(46, 'offers 5', 200, '1672612925.png', NULL, '2023-01-01 20:42:05', 'عرض 5', 'offers 5', 'offers 5 offers 5 offers 5 offers 5 offers 5', 0),
(47, 'offers 6444', 200444444, '1672612940.png', '2023-01-02 09:56:37', '2023-01-01 20:42:20', 'عرض 64444', 'offers 6444', 'offers 6 offers 6 offers 6 offers 6', 1),
(48, 'qqqqq', 22222, '1672785175.png', '2023-01-03 20:32:55', '2023-01-03 20:32:55', 'qqqqqqqqqqqqq', 'qqqqq', 'wwww', 1),
(49, 'sss', 333, '1672785259.png', '2023-01-03 20:34:19', '2023-01-03 20:34:19', 'ssss', 'sss', 'dddd', 1),
(50, 'xxxx', 3333, '1672785289.png', '2023-01-03 20:34:49', '2023-01-03 20:34:49', 'www', 'xxxx', NULL, 1),
(51, 'xxxxss', 2222222, '1672785960.png', '2023-01-03 20:46:00', '2023-01-03 20:46:00', 'xxxxxxxxxxxxxxx', 'xxxxss', '22eeeeeeeeee', 1),
(52, 'offers 44', 200, '1672846794.png', '2023-01-04 13:39:54', '2023-01-04 13:39:54', 'عرض 44', 'offers 44', 'offers 44 offers 44 offers 44 offers 44 offers 44', 1),
(53, 'offers 4444', 200, '1672846823.png', '2023-01-04 13:40:23', '2023-01-04 13:40:23', 'عرض 4444', 'offers 4444', 'offers 44 offers 44 offers 44 offers 44 offers 4444', 1),
(54, 'offers 55', 55555, '1672849883.png', '2023-01-04 14:31:23', '2023-01-04 14:31:23', 'عرض 6555', 'offers 55', 'offers 55 offers 55 offers 55 offers 55', 1),
(55, 'offers 466666666', 44444, '1672849935.jpg', '2023-01-04 14:32:15', '2023-01-04 14:32:15', 'عرض 66666666664', 'offers 466666666', 'offers 666 offers 666 offers 666 offers 666 offers 66644', 1),
(56, 'offers 45555555555555444444444', 666655, '1672849991.png', '2023-01-04 14:33:11', '2023-01-04 14:33:11', 'عرض 44444444444444444444', 'offers 45555555555555444444444', 'offers 666 offers 666 offers 666 offers 666 offers 6667779999999', 1),
(57, 'offers 4aa', 200, '1672926629.jpg', '2023-01-05 11:50:29', '2023-01-05 11:50:29', 'عرض 4', 'OFFERS 4AA', 'aaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ebrheem-salem@hotmail.com', '$2y$10$LAb0dGnL58qGcTbw0IZfAOYuCmT9DHNDIslnmNuFTK4V7nhVfaTiC', '2022-12-28 08:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `age`) VALUES
(1, 'Ibraheem Salem', 26),
(2, 'Ahmmad Salem', 55);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `code`, `phone`, `user_id`) VALUES
(1, '02', '0789468554', 11),
(3, '04', '888888', 14);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'orthodontics', NULL, NULL),
(2, 'Teeth implant', NULL, NULL),
(3, 'tooth implant', NULL, NULL),
(4, 'Fillings and cleaning', NULL, NULL),
(5, 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `expire` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=>active, 1=>expire',
  `age` int(11) DEFAULT 14
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `mobile`, `expire`, `age`) VALUES
(10, 'ali salem', 'ali-salem@hotmail.com', NULL, '$2y$10$feHKgIlG5ru0G0qyTsjNmeRnyVSqSyHX9D2nLQxrH6Ah3fRN3afrq', NULL, '2022-12-28 10:37:42', '2022-12-28 13:13:17', ' ', 1, 14),
(11, 'ibraheem salem', 'ebrheem-salem@hotmail.com', NULL, '$2y$10$dUMEvnxq4nWKmxoINt0.1ePCe951wBOhuoqmaVBw0acIFixjo.VEC', NULL, '2022-12-28 10:38:29', '2022-12-28 13:13:17', '0789468554', 1, 18),
(12, 'ahmmad salem', 'ahmmad-salem@hotmail.com', NULL, '$2y$10$Xk6vtWmc56kRgrK8EVbkseRPVtbUVjIF5/zUAf.DRMJ/cPZCWfF.K', NULL, '2022-12-28 10:44:08', '2022-12-28 13:13:17', '', 1, 14),
(13, 'khaled salem', 'khaled-salem@hotmail.com', NULL, '$2y$10$hYPuYl3zAdGiI9SF/ppL6OpQHcUN.9fjxVveG9.8mxnT1xTP4QVcS', NULL, '2022-12-28 12:46:46', '2022-12-28 13:13:17', ' ', 1, 33),
(14, 'ibraheem salem', 'test.test@hotmail.com', NULL, '$2y$10$KQ85RXR1mqeLo.G6dttU6.gJBtD1kI/GutBfnP8LTDEilSzADG1GG', NULL, '2022-12-28 13:13:00', '2022-12-28 13:13:17', '0789468554', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `viewers` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `name`, `viewers`, `updated_at`) VALUES
(1, 'video 1', 17, '2023-01-02 19:54:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_service`
--
ALTER TABLE `doctor_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicals`
--
ALTER TABLE `medicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offrts`
--
ALTER TABLE `offrts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor_service`
--
ALTER TABLE `doctor_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medicals`
--
ALTER TABLE `medicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offrts`
--
ALTER TABLE `offrts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
