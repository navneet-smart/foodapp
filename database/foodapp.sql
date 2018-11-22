-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 08:37 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `combos`
--

CREATE TABLE `combos` (
  `id` int(10) UNSIGNED NOT NULL,
  `combo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `combos`
--

INSERT INTO `combos` (`id`, `combo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'C', 1, '2018-10-07 06:28:43', '2018-10-07 06:28:43'),
(2, 'C', 1, '2018-10-07 23:43:45', '2018-10-07 23:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food_trucks`
--

CREATE TABLE `food_trucks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order_value` int(11) NOT NULL,
  `device_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_trucks`
--

INSERT INTO `food_trucks` (`id`, `user_id`, `display_name`, `speciality`, `min_order_value`, `device_token`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Burger Point', 'Burger', 149, 'xyz', 'Excellent', 1, '2018-10-07 06:10:51', '2018-10-07 06:10:51'),
(2, 3, 'Domino\'s Truck', 'Pizza', 399, 'xyz', 'Excellent', 1, '2018-10-07 06:12:03', '2018-10-07 06:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_detail_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `order_detail_id`, `description`, `display_name`, `f_id`, `p_id`, `price`, `quantity`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fresh', 'Luger Burger', 1, 1, 149.00, 2, 298, 1, '2018-10-07 06:37:07', '2018-10-07 06:37:07'),
(2, 2, 'Fresh', 'Paradise Pizza', 2, 2, 340.00, 1, 340, 1, '2018-10-07 06:37:07', '2018-10-07 06:37:07'),
(3, 2, 'Fresh', 'Chicken Pakora', 2, 3, 470.00, 1, 470, 1, '2018-10-07 06:37:08', '2018-10-07 06:37:08'),
(4, 3, 'Fresh', 'Paradise Pizza', 2, 2, 340.00, 2, 680, 1, '2018-10-07 23:48:41', '2018-10-07 23:48:41');

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
(3, '2018_09_21_114326_add_columns_to_users', 1),
(4, '2018_09_21_125415_create_owners_table', 1),
(5, '2018_09_21_125659_create_food_trucks_table', 1),
(6, '2018_09_21_132822_create_provider_categories_table', 1),
(7, '2018_09_21_134515_create_products_table', 1),
(8, '2018_09_22_070030_create_banners_table', 1),
(9, '2018_09_22_070233_create_sponsers_table', 1),
(10, '2018_09_26_045213_create_categories_table', 1),
(11, '2018_09_26_071715_create_combos_table', 1),
(12, '2018_09_26_081339_add_columns_to_categories', 1),
(13, '2018_09_26_100908_create_orders_table', 1),
(14, '2018_10_04_053357_create_delivery_boys_table', 1),
(15, '2018_10_04_054319_add_more_columns_to_users', 1),
(16, '2018_10_06_095411_create_order_details_table', 1),
(17, '2018_10_06_105139_create_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `cid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charges` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` bigint(20) NOT NULL,
  `device_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cid`, `charges`, `subtotal`, `total`, `name`, `email`, `contact`, `device_token`, `created`, `status`, `created_at`, `updated_at`) VALUES
(1, 'C1', 50.00, 1108.00, 1158.00, 'Deep Kuldeep', 'deep@gmail.com', 8872488356, 'xyz', 1537301238121, 1, '2018-10-07 06:37:07', '2018-10-07 06:37:07'),
(2, 'C2', 20.00, 680.00, 700.00, 'Sarbjeet Singh', 'sarbjeet@gmail.com', 9501880649, 'xyz', 1537301238121, 1, '2018-10-07 23:48:40', '2018-10-07 23:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `orderNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `truckName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `orderNumber`, `truckName`, `created`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'C10', 'Burger Point', 1537301238121, 1, '2018-10-07 06:37:07', '2018-10-07 06:37:07'),
(2, 1, 'C11', 'Domino\'s Truck', 1537301238121, 1, '2018-10-07 06:37:07', '2018-10-07 06:37:07'),
(3, 2, 'C20', 'Domino\'s Truck', 1537301238121, 1, '2018-10-07 23:48:41', '2018-10-07 23:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_and_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_veg` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `f_id`, `cat_id`, `name`, `display_name`, `description`, `size_and_price`, `is_veg`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Luger Burger', 'Luger Burger', 'Fresh', '149', 0, 1, '2018-10-07 06:23:19', '2018-10-07 06:23:19'),
(2, 2, 3, 'Paradise Pizza', 'Paradise Pizza', 'Fresh', '340', 0, 1, '2018-10-07 06:24:31', '2018-10-07 06:24:31'),
(3, 2, 4, 'Chicken Pakora', 'Chicken Pakora', 'Fresh', '470', 1, 1, '2018-10-07 06:25:41', '2018-10-07 06:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `provider_categories`
--

CREATE TABLE `provider_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provider_categories`
--

INSERT INTO `provider_categories` (`id`, `f_id`, `category`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Burger', 1, '2018-10-07 06:13:09', '2018-10-07 06:13:09'),
(2, 1, 'Dosa', 1, '2018-10-07 06:13:20', '2018-10-07 06:13:20'),
(3, 2, 'Pizza', 1, '2018-10-07 06:14:47', '2018-10-07 06:14:47'),
(4, 2, 'Chicken', 1, '2018-10-07 06:14:59', '2018-10-07 06:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `sponsers`
--

CREATE TABLE `sponsers` (
  `id` int(10) UNSIGNED NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsers`
--

INSERT INTO `sponsers` (`id`, `display_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Coca Cola', '76487.png', '2018-10-07 06:26:32', '2018-10-07 06:26:32'),
(2, 'Pepsi', '20295.png', '2018-10-07 06:26:45', '2018-10-07 06:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `contact` bigint(20) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `contact`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Truck Eat Admin', 'admin@truckeat.com', NULL, '$2y$10$8IGquyKklYJ/eDiNRxhbiOrfQziCr6AMR041ex3ATlLxRo3psyq6y', NULL, 'Admin', 0, 1, '2018-10-07 06:04:32', '2018-10-07 06:04:32'),
(2, 'Kuldeep Singh', 'kuldeep@gmail.com', NULL, '$2y$10$oRxH7cEZOYz.eZOFIDXdeuyXSZDamVVdSY//v7465C/fTwROGh9by', 'V3pkmcRJry7FraNd7Kz5rg8HFZ3EZeJSyMKk4kTf', 'Owner', 0, 1, '2018-10-07 06:06:04', '2018-10-07 06:06:04'),
(3, 'Sitara Singh', 'sitara@gmail.com', NULL, '$2y$10$QgizjxSaiqvok9siDeJieeNAlzT233BxFaWPQ9kcy680xfO.bW9dS', '8amgz4POIwIboAb5eoScMYAdwVoTiCiBwG6wXJW0', 'Owner', 0, 1, '2018-10-07 06:06:18', '2018-10-07 06:06:18'),
(4, 'Manpreet Singh', 'manpreet@gmail.com', NULL, '$2y$10$T75gh.rT4VlX4Wmgcv5Yhu2H22qWZneQQijEztINczgZNtz3.aXxS', 'VowEdz56TYPfy2XX9IIbA6TyXl7GdsdUmBrlSxyy', 'Dboy', 7973506691, 1, '2018-10-07 06:27:25', '2018-10-07 06:27:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_f_id_index` (`f_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_trucks`
--
ALTER TABLE `food_trucks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_trucks_user_id_index` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_order_detail_id_index` (`order_detail_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_index` (`order_id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_f_id_index` (`f_id`),
  ADD KEY `products_cat_id_index` (`cat_id`);

--
-- Indexes for table `provider_categories`
--
ALTER TABLE `provider_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_categories_f_id_index` (`f_id`);

--
-- Indexes for table `sponsers`
--
ALTER TABLE `sponsers`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `combos`
--
ALTER TABLE `combos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_trucks`
--
ALTER TABLE `food_trucks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provider_categories`
--
ALTER TABLE `provider_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sponsers`
--
ALTER TABLE `sponsers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_f_id_foreign` FOREIGN KEY (`f_id`) REFERENCES `food_trucks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `food_trucks`
--
ALTER TABLE `food_trucks`
  ADD CONSTRAINT `food_trucks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_order_detail_id_foreign` FOREIGN KEY (`order_detail_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `provider_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_f_id_foreign` FOREIGN KEY (`f_id`) REFERENCES `food_trucks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `provider_categories`
--
ALTER TABLE `provider_categories`
  ADD CONSTRAINT `provider_categories_f_id_foreign` FOREIGN KEY (`f_id`) REFERENCES `food_trucks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
