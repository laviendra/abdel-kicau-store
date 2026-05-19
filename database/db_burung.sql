-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2026 at 03:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_burung`
--

-- --------------------------------------------------------

--
-- Table structure for table `birds`
--

CREATE TABLE `birds` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `birds`
--

INSERT INTO `birds` (`id`, `name`, `slug`, `type`, `image`, `price`, `description`, `weight`, `origin`, `quality`, `check`, `created_at`, `updated_at`) VALUES
(1, 'Burung Kenari', 'burung-kenari', 'Burung Kicau', 'kenari.jpeg', 300000, 'Nikmati alunan merdu dari Kenari pilihan. Perawatannya mudah dan cocok untuk pemula maupun master.', '80-120g', 'Lokal', 'S Grade', 'Sehat', '2025-10-15 08:49:35', '2025-10-23 20:08:45'),
(2, 'Burung Lovebird', 'burung-lovebird', 'Burung Hias', 'lovebird.jpeg', 250000, 'Hadirkan keceriaan di rumah dengan warna-warni cantik dan sifat sosial Lovebird yang menggemaskan.', '40-60g', 'Import', 'A Grade', 'Sehat', '2025-10-15 08:49:35', '2025-10-16 00:14:29'),
(3, 'Burung Gagak', 'burung-gagak', 'Burung Hias', 'gagak.jpeg', 250000, 'Burung cerdas dengan bulu hitam legam yang eksotis. Peliharaan unik yang menunjukkan kelas tersendiri.', '500-700g', 'Lokal', 'A Grade', 'Sehat', '2025-10-15 08:49:35', '2025-10-16 00:14:39'),
(4, 'Burung Merpati', 'burung-merpati', 'Burung Hias', 'merpati.jpeg', 100000, 'Simbol kesetiaan dengan sifat yang jinak dan menenangkan. Sangat cocok sebagai peliharaan keluarga.', '300-400g', 'Lokal', 'B Grade', 'Sehat', '2025-10-15 08:49:35', '2025-10-15 22:57:03'),
(5, 'Jalak Bali', 'jalak-bali', 'Burung Kicau', 'jalak_bali.jpeg', 2500000, 'Ikon kebanggaan Bali dengan bulu putih bersih dan pelupuk mata biru yang eksotis. Sangat langka dan berkelas.', '90-110g', 'Indonesia', 'Top Grade', 'Bersertifikat', '2025-10-15 08:49:35', '2025-10-15 22:57:13'),
(6, 'Burung Cucak Ijo', 'burung-cucak-ijo', 'Burung Kicau', 'cucak_ijo.jpeg', 300000, 'Dikenal dengan warna hijau khas dan kicauan \"ngentrok\" yang bervariasi. Jagoan di arena perlombaan.', '50-70g', 'Sumatera', 'A Grade', 'Sehat', '2025-10-15 08:49:35', '2025-10-15 22:57:33'),
(7, 'Burung Murai', 'burung-murai', 'Burung Kicau', 'murai.jpeg', 350000, 'Sang primadona dengan ekor panjang menawan dan volume kicauan dahsyat. Investasi terbaik untuk kicau mania.', '30-40g', 'Medan', 'A Grade', 'Sehat', '2025-10-15 08:49:35', '2025-10-15 22:57:51'),
(8, 'Burung Kacer', 'burung-kacer', 'Burung Kicau', 'kacer.jpeg', 280000, 'Gaya tarung \"ngobra\" yang khas dengan warna hitam putih elegan. Pilihan favorit para juara kontes burung kicau.', '30-50g', 'Jawa', 'A Grade', 'Sehat', '2025-10-15 08:49:35', '2025-10-15 22:58:11'),
(9, 'Burung Merak', 'burung-merak', 'Burung Hias', 'merak.jpeg', 17500000, 'Pancarkan kemewahan dengan ekor kipasnya yang legendaris. Burung Merak adalah simbol keindahan dan keanggunan mutlak.', '4-6 kg', 'India', 'Top Grade', 'Sehat', '2025-10-15 08:49:35', '2025-10-15 22:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `bird_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `bird_id`, `quantity`, `created_at`, `updated_at`) VALUES
(7, 2, 3, 1, '2025-10-16 01:28:00', '2025-10-16 01:28:00');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_10_06_110119_create_birds_table', 1),
(6, '2025_10_06_162628_create_carts_table', 1),
(7, '2025_10_06_172350_create_orders_table', 1),
(8, '2025_10_06_172358_create_order_items_table', 1),
(9, '2025_10_15_141539_add_payment_proof_to_orders_table', 1),
(10, '2025_10_15_154634_add_is_admin_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `city`, `post_code`, `total_price`, `payment_method`, `status`, `payment_proof`, `created_at`, `updated_at`) VALUES
(1, 1, 'e l', 'abcd@gmail.com', '1234567', 'jakbar', 'jakarta', '11200', 750000, 'cod', 'selesai', NULL, '2025-10-15 08:56:10', '2025-10-16 00:42:14'),
(2, 1, 'roni apalah', 'roni@gmail.com', '123456', 'pinggir kota', 'tangerang', '1000', 35000000, 'bank_transfer', 'selesai', 'proofs/QYnN7iRdTQfw7eiHltlpsotu4FrClk9Tne4qv0mo.jpg', '2025-10-15 22:01:37', '2025-10-16 23:05:36'),
(3, 2, 'roni chan', 'roni@gmail.com', '123456', 'pinggir kota', 'tangerang', '100', 250000, 'cod', 'diproses', NULL, '2025-10-16 00:27:00', '2025-10-16 01:31:39'),
(4, 1, 'alex panter', 'alex@gmail.com', '123456', 'jln 12 soto', 'Surabaya', '1200', 250000, 'bank_transfer', 'menunggu konfirmasi', 'proofs/naR3YOQVSUqqExEHPutDqANKo2fZHGlj0KoTtv1y.jpg', '2025-10-22 22:21:17', '2025-10-22 23:29:35'),
(5, 3, 'jaka nugroho', 'jaka@gmail.com', '08968263263681', 'ciseeng', 'sukabumi', '2211', 17500000, 'bank_transfer', 'dikirim', 'proofs/jZjpOKVxgrcXLo4bipX28pSOkYbwXPDOZbH484FD.png', '2025-10-23 19:59:57', '2025-10-23 20:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `bird_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `bird_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 3, 250000, '2025-10-15 08:56:10', '2025-10-15 08:56:10'),
(2, 2, 9, 2, 17500000, '2025-10-15 22:01:37', '2025-10-15 22:01:37'),
(3, 3, 1, 1, 150000, '2025-10-16 00:27:00', '2025-10-16 00:27:00'),
(4, 3, 4, 1, 100000, '2025-10-16 00:27:00', '2025-10-16 00:27:00'),
(5, 4, 2, 1, 250000, '2025-10-22 22:21:17', '2025-10-22 22:21:17'),
(6, 5, 9, 1, 17500000, '2025-10-23 19:59:57', '2025-10-23 19:59:57');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'radit', 'radit@gmail.com', 0, NULL, '$2y$12$gj2bHtFE.hv5WPc5X/Ri2OBA/w0NoYzMvjIw0cAz0DyPzmb7NWjES', NULL, '2025-10-15 08:50:05', '2025-10-15 18:27:54'),
(2, 'admin', 'admin@gmail.com', 1, NULL, '$2y$12$IUlCCeIu7YkuVqefdDuT1ekTbq9N21pBRhi4v73H16agNWZrPDvOy', NULL, '2025-10-15 08:57:51', '2025-10-15 08:57:51'),
(3, 'jaka ciseeeng', 'jaka@gmail.com', 0, NULL, '$2y$12$UKpx5jEgDMRHfeEYYgbP1uDqCqTal8ut825vjaCkoWFp2uxQYaQFu', NULL, '2025-10-23 19:57:39', '2025-10-23 19:57:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birds`
--
ALTER TABLE `birds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `birds_slug_unique` (`slug`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_bird_id_foreign` (`bird_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_bird_id_foreign` (`bird_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birds`
--
ALTER TABLE `birds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_bird_id_foreign` FOREIGN KEY (`bird_id`) REFERENCES `birds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_bird_id_foreign` FOREIGN KEY (`bird_id`) REFERENCES `birds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
