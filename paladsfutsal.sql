-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2019 at 05:47 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.3.13-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paladsfutsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lapangan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pemesan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_main` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `lapangan_id`, `nama_pemesan`, `tanggal_main`, `waktu_mulai`, `waktu_akhir`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 'Fachry Hidayat', '2019-11-11', '13:00:00', '14:00:00', 'Incoming', '2019-11-11 00:41:17', '2019-11-11 00:42:53'),
(6, 4, 1, 'test', '2019-11-11', '18:00:00', '19:00:00', 'Incoming', '2019-11-11 02:47:23', '2019-11-11 02:49:39'),
(8, 5, 3, 'Doricky Morinth', '2019-11-12', '12:00:00', '14:00:00', 'Unpaid', '2019-11-11 13:41:34', '2019-11-11 13:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `gambar`, `description`, `created_at`, `updated_at`) VALUES
(1, 'IMFEST 2K19', 'imfest-2k19', '1573433283.jpg', 'Hola️ #PemudaIndonesia SMA Ibnu Hajar proudly presents IMF 2K19 (Sports & Creativity Events of Ibnu Hajar Boarding School) “️Glimpse Of The Future”️.\r\n\r\nThe right place to prove your abilities and talents! A glimpse of your future! Don’t forget to mark the date and prove you are the best of the best! Our event will be held on: Date : 10 – 13 October 2019.', '2019-11-11 00:48:03', '2019-11-11 00:48:03');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(1, '1571917274.jpg', '2019-11-11 00:18:03', '2019-11-11 00:18:03'),
(2, '1571917592.jpg', '2019-11-11 00:18:23', '2019-11-11 00:18:23'),
(3, '1571918282.jpg', '2019-11-11 00:18:54', '2019-11-11 00:18:54'),
(4, '1571918296.jpg', '2019-11-11 00:19:16', '2019-11-11 00:19:16'),
(5, '1571918304.jpg', '2019-11-11 00:19:43', '2019-11-11 00:19:43'),
(6, '1571918596.jpg', '2019-11-11 00:20:03', '2019-11-11 00:20:03'),
(7, '1571918608.jpg', '2019-11-11 00:20:21', '2019-11-11 00:20:21'),
(8, '1571918615.jpg', '2019-11-11 00:20:42', '2019-11-11 00:20:42'),
(9, '1571918623.jpg', '2019-11-11 00:20:58', '2019-11-11 00:20:58'),
(10, '1571918632.jpg', '2019-11-11 00:21:20', '2019-11-11 00:21:20'),
(11, '1571918643.jpg', '2019-11-11 00:21:33', '2019-11-11 00:21:33'),
(12, '1571918686.jpg', '2019-11-11 00:21:59', '2019-11-11 00:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lapangan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pemesan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_main` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `struk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `user_id`, `lapangan_id`, `nama_pemesan`, `tanggal_main`, `waktu_mulai`, `no_telp`, `harga`, `struk`, `active`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Fachry Hidayat', '2019-11-11', '13:00:00', '087234121029', 70000, '1573432905.jpg', '1', '2019-11-11 00:42:53', '2019-11-11 00:42:53'),
(2, 2, 1, 'Muhammad Faiz', '2019-11-11', '12:00:00', '081298302929', 70000, '1573440094.jpg', '0', '2019-11-11 02:42:39', '2019-11-11 13:32:16'),
(3, 4, 1, 'test', '2019-11-11', '18:00:00', '083928310231', 70000, '1573440451.jpg', '1', '2019-11-11 02:49:39', '2019-11-11 02:49:39'),
(4, 2, 1, 'Muhammad Faiz', '2019-11-11', '21:00:00', '087234121029', 140000, '1573479364.jpg', '0', '2019-11-11 13:39:30', '2019-12-28 07:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `jams`
--

CREATE TABLE `jams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jams`
--

INSERT INTO `jams` (`id`, `name`, `time`, `created_at`, `updated_at`) VALUES
(1, '09:00', '09:00:00', '2019-11-11 00:00:10', '2019-11-11 00:02:36'),
(2, '10:00', '10:00:00', '2019-11-11 00:10:58', '2019-11-11 00:10:58'),
(3, '11:00', '11:00:00', '2019-11-11 00:11:28', '2019-11-11 00:11:28'),
(4, '12:00', '12:00:00', '2019-11-11 00:12:02', '2019-11-11 00:12:02'),
(5, '13:00', '13:00:00', '2019-11-11 00:12:18', '2019-11-11 00:12:18'),
(6, '14:00', '14:00:00', '2019-11-11 00:12:34', '2019-11-11 00:12:34'),
(7, '15:00', '15:00:00', '2019-11-11 00:12:51', '2019-11-11 00:12:51'),
(8, '16:00', '16:00:00', '2019-11-11 00:13:06', '2019-11-11 00:13:06'),
(9, '17:00', '17:00:00', '2019-11-11 00:13:32', '2019-11-11 00:13:32'),
(10, '18:00', '18:00:00', '2019-11-11 00:13:52', '2019-11-11 00:13:52'),
(11, '17:00', '17:00:00', '2019-11-11 00:14:19', '2019-11-11 00:14:19'),
(12, '18:00', '18:00:00', '2019-11-11 00:14:37', '2019-11-11 00:14:37'),
(13, '19:00', '19:00:00', '2019-11-11 00:15:08', '2019-11-11 00:15:08'),
(14, '20:00', '20:00:00', '2019-11-11 00:15:25', '2019-11-11 00:15:25'),
(15, '21:00', '21:00:00', '2019-11-11 00:15:46', '2019-11-11 00:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `lapangans`
--

CREATE TABLE `lapangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lapangans`
--

INSERT INTO `lapangans` (`id`, `nama`, `slug`, `foto`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Lapangan 1', 'Lapangan-1', 'lapangan1.jpg', NULL, '2019-11-10 23:57:14', '2019-11-10 23:57:14'),
(2, 'Lapangan 2', 'Lapangan-2', 'lapangan2.jpg', NULL, '2019-11-11 00:06:35', '2019-11-11 00:07:21'),
(3, 'Lapangan 3', 'Lapangan-3', 'lapangan3.jpg', NULL, '2019-11-11 00:09:11', '2019-11-11 00:09:11'),
(4, 'Lapangan 4', 'Lapangan-4', 'lapangan4.jpg', NULL, '2019-11-11 00:09:40', '2019-11-11 00:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_22_224742_create_lapangans_table', 1),
(5, '2019_09_23_122519_create_bookings_table', 1),
(6, '2019_09_23_171538_create_payments_table', 1),
(7, '2019_09_24_145915_create_jams_table', 1),
(8, '2019_10_06_151438_create_histories_table', 1),
(9, '2019_10_24_182742_create_galleries_table', 1),
(10, '2019_10_26_215306_create_events_table', 1),
(11, '2019_10_29_192341_create_messages_table', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `struk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_payment` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `no_telp`, `harga`, `struk`, `status`, `active`, `end_payment`, `created_at`, `updated_at`) VALUES
(2, 8, '081298302929', 140000, NULL, 'Belum Membayar', '1', '11:40:00', '2019-11-11 13:41:34', '2019-11-11 13:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `member`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ramadhan Adhitya', 'admin', 'amdhan@admin.io', NULL, '$2y$10$d/Nz/vTjzCZivzB7R6SH6.TIvdyJKKnRrQS0INlMwHiRwm2Ildv5m', '0', 'AqqjVDc63aLCvm0PdM8okSu5KIEv0FIDdzUAhF51XcVzi9faz9WuREkKm1qI', '2019-11-10 23:54:56', '2019-11-10 23:54:56'),
(2, 'Muhammad Faiz', 'user', 'faiz@user.io', NULL, '$2y$10$0YDr6YwVbyysrbpu51io3ewGfjVbcM4cshC0IWpNY7GUjbDR58GSm', '0', 'mGIeWaooIr9TNBXOH8H8dsQSeSb2ERX33TH96idonJKHugojfO8WdHFnszlI', '2019-11-11 00:04:04', '2019-11-11 00:04:04'),
(3, 'Fachry Hidayat', 'user', 'hidayat@user.io', NULL, '$2y$10$AwmwwhrvSsfulEx3jC0ItOfbLK.JoxOTXZ3LDs.hge3oXTUSkp/Ge', '0', 'N034svkfDNVOfaR8oekbGU95fw9p4XyWw47G9nwfSSpCMsucmTD0mUm5G1cO', '2019-11-11 00:35:10', '2019-11-11 00:35:10'),
(4, 'test', 'user', 'test@user.io', NULL, '$2y$10$6WIcecFutFp5mRka0Jb8iuBGmV/DUoK25IOWluK4fIv.mtyyyihdC', '0', '687hdRL8clUCl7e5fd23lSv2PIm4Sp8FumNZPoH7nqxZfuo1AxqzeAk5pnWp', '2019-11-11 02:43:03', '2019-11-11 02:43:03'),
(5, 'Doricky Morinth', 'user', 'dorlex@gmail.com', NULL, '$2y$10$i9NkkqfFx87oDqONZyQde.Wu1wgFGrBn7o19akI8.SIzbw.PA03Am', '0', 'IJEKQTg9JYr2fRFDH1Qo93QMsrBItr0yGw9cW0WkIiJCPm09Jk', '2019-11-11 13:40:59', '2019-11-11 13:40:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_lapangan_id_foreign` (`lapangan_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_user_id_foreign` (`user_id`),
  ADD KEY `histories_lapangan_id_foreign` (`lapangan_id`);

--
-- Indexes for table `jams`
--
ALTER TABLE `jams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapangans`
--
ALTER TABLE `lapangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_booking_id_foreign` (`booking_id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jams`
--
ALTER TABLE `jams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `lapangans`
--
ALTER TABLE `lapangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_lapangan_id_foreign` FOREIGN KEY (`lapangan_id`) REFERENCES `lapangans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_lapangan_id_foreign` FOREIGN KEY (`lapangan_id`) REFERENCES `lapangans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
