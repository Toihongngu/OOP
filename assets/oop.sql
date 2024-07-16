-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2024 at 06:48 PM
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
-- Database: `oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`) VALUES
(36, 112);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` int NOT NULL,
  `cart_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `cart_id`, `product_id`, `quantity`) VALUES
(61, 36, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(10, 'Blazers'),
(3, 'Dresses'),
(11, 'Jackets'),
(5, 'Jeans'),
(9, 'Jumpsuits'),
(4, 'Shirts'),
(12, 'Shoes'),
(7, 'Sleepwear'),
(8, 'Sportswear'),
(6, 'Swimwear');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `shipping_name` varchar(255) DEFAULT NULL,
  `shipping_email` varchar(255) DEFAULT NULL,
  `shipping_phone` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `status_delivery` enum('0','1','2','3','4','5') NOT NULL DEFAULT '0',
  `status_payment` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `shipping_name`, `shipping_email`, `shipping_phone`, `shipping_address`, `status_delivery`, `status_payment`, `created_at`, `updated_at`) VALUES
(25, 112, 'Bình Nguyễn', 'shigeotokudabut@gmail.com', '', '', NULL, NULL, NULL, NULL, '0', 0, '2024-07-01 21:25:12', '2024-07-01 21:25:12'),
(27, 112, 'Bình Nguyễn', 'shigeotokudabut@gmail.com', '0862466599', 'abcvsdfsd', NULL, NULL, NULL, NULL, '0', 0, '2024-07-02 19:59:51', '2024-07-02 19:59:51'),
(28, 112, 'Bình Nguyễn', 'shigeotokudabut@gmail.com', '0862466599', 'abcvsdfsd', NULL, NULL, NULL, NULL, '0', 0, '2024-07-02 20:00:03', '2024-07-02 20:00:03'),
(29, 112, 'Bình Nguyễn', 'shigeotokudabut@gmail.com', '0862466599', '6516516', NULL, NULL, NULL, NULL, '1', 0, '2024-07-02 20:00:30', '2024-07-02 20:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price_regular` int NOT NULL,
  `price_sale` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price_regular`, `price_sale`) VALUES
(4, 25, 33, 3, 100, 85),
(5, 25, 34, 1, 60, 50),
(10, 27, 34, 1, 60, 50),
(11, 28, 32, 7, 150, 130),
(12, 29, 35, 1, 90, 750),
(13, 29, 28, 2, 70, 55);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_thumbnail` varchar(255) DEFAULT NULL,
  `price_regular` int NOT NULL,
  `price_sale` int DEFAULT NULL,
  `overview` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `img_thumbnail`, `price_regular`, `price_sale`, `overview`, `content`, `created_at`, `updated_at`) VALUES
(16, 3, 'Elegant Evening Dress', 'assets/uploads/product-1.jpg', 150, 120, 'Elegant evening dress perfect for formal occasions', 'Detailed description of Elegant Evening Dress', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(17, 3, 'Casual Summer Dress', 'assets/uploads/product-1.jpg', 60, 50, 'Light and comfortable summer dress', 'Detailed description of Casual Summer Dress', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(18, 4, 'Classic White Shirt', 'assets/uploads/product-2.jpg', 30, 25, 'Classic white shirt suitable for all occasions', 'Detailed description of Classic White Shirt', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(19, 4, 'Checked Shirt', 'assets/uploads/product-2.jpg', 35, 28, 'Stylish checked shirt', 'Detailed description of Checked Shirt', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(20, 5, 'Blue Denim Jeans', 'assets/uploads/product-3.jpg', 50, 40, 'Comfortable blue denim jeans', 'Detailed description of Blue Denim Jeans', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(21, 5, 'Black Skinny Jeans', 'assets/uploads/product-3.jpg', 55, 45, 'Trendy black skinny jeans', 'Detailed description of Black Skinny Jeans', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(22, 6, 'Men\'s Swim Trunks', 'assets/uploads/product-4.jpg', 25, 20, 'Comfortable swim trunks for men', 'Detailed description of Men\'s Swim Trunks', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(23, 6, 'Women\'s Bikini', 'assets/uploads/product-4.jpg', 30, 25, 'Stylish bikini for women', 'Detailed description of Women\'s Bikini', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(24, 7, 'Cozy Pajamas', 'assets/uploads/product-5.jpg', 40, 35, 'Comfortable and cozy pajamas', 'Detailed description of Cozy Pajamas', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(25, 7, 'Silk Nightwear', 'assets/uploads/product-5.jpg', 60, 50, 'Luxurious silk nightwear', 'Detailed description of Silk Nightwear', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(26, 8, 'Men\'s Sportswear Set', 'assets/uploads/product-6.jpg', 80, 65, 'Complete sportswear set for men', 'Detailed description of Men\'s Sportswear Set', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(27, 8, 'Women\'s Yoga Outfit', 'assets/uploads/product-6.jpg', 70, 55, 'Comfortable yoga outfit', 'Detailed description of Women\'s Yoga Outfit', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(28, 9, 'Casual Jumpsuit', 'assets/uploads/product-6.jpg', 70, 55, 'Comfortable casual jumpsuit', 'Detailed description of Casual Jumpsuit', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(29, 9, 'Elegant Jumpsuit', 'assets/uploads/product-6.jpg', 90, 75, 'Elegant jumpsuit suitable for formal occasions', 'Detailed description of Elegant Jumpsuit', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(30, 10, 'Formal Blazer', 'assets/uploads/product-6.jpg', 100, 85, 'Stylish formal blazer', 'Detailed description of Formal Blazer', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(31, 10, 'Casual Blazer', 'assets/uploads/product-6.jpg', 80, 65, 'Comfortable casual blazer', 'Detailed description of Casual Blazer', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(32, 11, 'Leather Jacket', 'assets/uploads/product-6.jpg', 150, 130, 'High-quality leather jacket', 'Detailed description of Leather Jacket', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(33, 11, 'Denim Jacket', 'assets/uploads/product-6.jpg', 100, 85, 'Stylish denim jacket', 'Detailed description of Denim Jacket', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(34, 12, 'Running Shoes', 'assets/uploads/product-6.jpg', 60, 50, 'Comfortable running shoes', 'Detailed description of Running Shoes', '2024-06-29 04:06:14', '2024-06-29 04:06:14'),
(35, 14, 'Formal Shoes', 'assets/uploads/product-6.jpg', 90, 750, 'Elegant formal shoes', 'Detailed description of Formal Shoes', '2024-06-29 04:06:14', '2024-06-29 04:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('admin','member') NOT NULL DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `password`, `type`, `created_at`, `updated_at`, `is_active`) VALUES
(112, 'Bình Nguyễn', NULL, 'shigeotokudabut@gmail.com', '$2y$10$jlFGUVzVe4FUH.W3cEJTJeK4qkpUh3N9/21wvJH7wEEhT5DtaZj2.', 'admin', '2024-06-30 19:01:49', '2024-06-30 19:01:49', 0),
(120, 'Bình Nguyễn', NULL, 'shigeotokudabut23@gmail.com', '$2y$10$Fp.i08a5AyeLBs7LvPOH7uX6ZOnXb6c2aT3fUJCrj1Xg85g3T8uGS', 'member', '2024-06-30 19:25:21', '2024-06-30 19:25:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
