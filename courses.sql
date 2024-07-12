-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 02:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courses`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_models`
--

CREATE TABLE `cart_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_models`
--

INSERT INTO `cart_models` (`id`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2024-07-10 13:13:58', '2024-07-10 13:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `category_models`
--

CREATE TABLE `category_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_models`
--

INSERT INTO `category_models` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Design', '47481720096256.svg', 'design', '2024-07-04 07:30:56', '2024-07-04 07:30:56'),
(3, 'Development', '33871720096776.svg', 'Development', '2024-07-04 07:39:36', '2024-07-04 07:39:36'),
(4, 'Marketing', '95041720096909.svg', 'Marketing', '2024-07-04 07:41:49', '2024-07-04 07:41:49'),
(5, 'Music', '25131720096960.svg', 'Music', '2024-07-04 07:42:40', '2024-07-04 07:42:40'),
(6, 'figma', NULL, NULL, '2024-07-04 08:55:29', '2024-07-04 08:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_heading` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `course_id`, `chapter_heading`, `created_at`, `updated_at`) VALUES
(1, 6, 'chapter1', '2024-07-06 13:39:39', '2024-07-06 13:39:39'),
(2, 6, 'chapter1', '2024-07-06 13:40:25', '2024-07-06 13:40:25'),
(3, 6, 'chapter11', '2024-07-06 13:51:08', '2024-07-06 13:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `course_add_models`
--

CREATE TABLE `course_add_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `total_lesson` varchar(255) DEFAULT NULL,
  `total_hours` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `final_price` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` text NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoryId` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_add_models`
--

INSERT INTO `course_add_models` (`id`, `teacher_id`, `title`, `image`, `video`, `total_lesson`, `total_hours`, `discount_price`, `final_price`, `description`, `status`, `created_at`, `updated_at`, `categoryId`) VALUES
(6, 2, 'Chicago International Conference on Education', '8431720102068.png', '1720187402_chemcons%20(1).mp4', '12', '3', '12', '90', 'Duis placerat eleifend leo nec mattis. Phasellus scelerisque arcu quis feugiat efficitur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer laoreet est eget est sagittis, et scelerisque quam convallis. Praesent at tortor facilisis, tempus ex quis, tempor arcu. Duis id velit mattis diam fermentum tincidunt. Sed et vehicula lectus.', '1', '2024-07-04 09:07:48', '2024-07-05 13:38:51', 2),
(7, 2, 'Chicago International Conference on Education', '74561720102128.png', '1720187402_chemcons%20(1).mp4', '37', '3', '12', '90', 'Duis placerat eleifend leo nec mattis. Phasellus scelerisque arcu quis feugiat efficitur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer laoreet est eget est sagittis, et scelerisque quam convallis. Praesent at tortor facilisis, tempus ex quis, tempor arcu. Duis id velit mattis diam fermentum tincidunt. Sed et vehicula lectus.', '1', '2024-07-04 09:08:48', '2024-07-05 13:30:06', 3),
(8, 3, 'Instructor2', '69851720294423.png', 'uploads/8Yov7iiZNzfOxDEcA8VyM76oPWS0eg1mdrKufBKr.mp4', '1', '1', '1', '1', 'instructor_id', '1', '2024-07-06 14:33:45', '2024-07-06 14:34:25', 4),
(9, 3, 'check', '57031720620195.png', 'uploads/0dTgdh4IMRXcdnUlOskDaxI55bgzD1RadHYuVPVk.png', '1', '1', '1', '1', 'check', '0', '2024-07-10 09:03:15', '2024-07-10 09:03:15', 2);

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `lecture_title` varchar(255) NOT NULL,
  `lecture_video` varchar(255) NOT NULL,
  `lecture_resources` varchar(255) NOT NULL,
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_25_183923_create_profile_models_table', 1),
(5, '2024_07_04_120947_create_category_models_table', 2),
(8, '2024_07_04_125425_create_course_add_models_table', 3),
(10, '2024_07_06_182930_create_chapters_table', 4),
(11, '2024_07_06_182939_create_lectures_table', 4),
(12, '2024_07_09_075744_add_foreign_key_to_course_add_models_table', 5),
(15, '2024_07_09_115653_create_cart_models_table', 6),
(16, '2024_07_10_134507_add_category_id_to_course_add_models', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_models`
--

CREATE TABLE `profile_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `education_description` text DEFAULT NULL,
  `education_title` varchar(255) DEFAULT NULL,
  `education_date` date DEFAULT NULL,
  `experience_title` varchar(255) DEFAULT NULL,
  `experience_description` text DEFAULT NULL,
  `experience_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_models`
--

INSERT INTO `profile_models` (`id`, `user_id`, `image`, `about`, `skill`, `phone_number`, `nationality`, `education_description`, `education_title`, `education_date`, `experience_title`, `experience_description`, `experience_date`, `created_at`, `updated_at`) VALUES
(1, 1, '35011719470016.Casual-Pants-Shirts-02-300x300-removebg-preview.png', 'I am web developer having 2+ years of experienced', 'web developer', '+9201236 968966', 'pakistan', NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-27 01:33:36', '2024-06-27 01:33:36'),
(2, 2, '7951720164491.images.jfif', NULL, 'web developer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-05 02:28:11', '2024-07-05 12:37:23'),
(3, 3, '25931720294378.demo-img-02.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-06 14:32:58', '2024-07-06 14:32:58');

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
('4mQTfNhd7Hcg9lDobCvKKiSfOq6GFJhxjH8mYuYJ', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicEU4RTB5Sk1LRjdSRTFMbXZKRUNpNmxIRFdHT0VOalB0VlBaWGNEWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQvY2F0ZWdvcmllcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1720707009),
('hOZjIU4oBDm6q8fGhoBmdE8WePWA5G8hWc6vrODG', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYXRMcWpLWWQwM3Z5NkR1c0FNaFBUb3p1U3d4a2M5SGtYazdDZXZrcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1720695751);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'student',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'student', 'student@gmail.com', NULL, 'Student', '$2y$12$BZgUQfe14kTbaXM49Q6WruQWXJJx0pSM3dnuZOwuaQLdC0k.F1/9S', NULL, '2024-06-26 07:01:43', '2024-06-26 07:01:43'),
(2, 'Instructor', 'Instructor@gmail.com', NULL, 'Instructor', '$2y$12$aOUFybvkR1fGR8jwFgvmPeDJUD6j91SEg8bh3zE4/Yj5B7QHrFAIG', NULL, '2024-06-27 01:53:38', '2024-06-27 01:53:38'),
(3, 'Instructor2', 'Instructor2@gmail.com', NULL, 'Instructor', '$2y$12$3dohsS5A2KICrLvJEAvLnu4XnfbElR.jBZeICGpds3AG1jciG0zFe', NULL, '2024-07-06 14:32:12', '2024-07-06 14:32:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cart_models`
--
ALTER TABLE `cart_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_models_user_id_foreign` (`user_id`),
  ADD KEY `cart_models_course_id_foreign` (`course_id`);

--
-- Indexes for table `category_models`
--
ALTER TABLE `category_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapters_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_add_models`
--
ALTER TABLE `course_add_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_add_models_teacher_id_index` (`teacher_id`),
  ADD KEY `course_add_models_categoryid_foreign` (`categoryId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lectures_chapter_id_foreign` (`chapter_id`);

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
-- Indexes for table `profile_models`
--
ALTER TABLE `profile_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_models_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `cart_models`
--
ALTER TABLE `cart_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_models`
--
ALTER TABLE `category_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_add_models`
--
ALTER TABLE `course_add_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `profile_models`
--
ALTER TABLE `profile_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_models`
--
ALTER TABLE `cart_models`
  ADD CONSTRAINT `cart_models_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course_add_models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_models_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course_add_models` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_add_models`
--
ALTER TABLE `course_add_models`
  ADD CONSTRAINT `course_add_models_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `category_models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_add_models_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile_models`
--
ALTER TABLE `profile_models`
  ADD CONSTRAINT `profile_models_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
