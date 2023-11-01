-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 06:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apple`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `img` varchar(400) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `img`, `username`, `full_name`, `email`, `password`) VALUES
(5001, '', 'murtayes', 'Murtayes Jarif', 'murtayes.jarif@gmail.com', '52743'),
(5003, 'img/5003_m_admin.jpeg', 'test1', 'Admin Test', 'test', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`) VALUES
(1, 'Iphone', 'Iphone'),
(2, 'Ipad', 'ipad'),
(3, 'Mac', 'Mac'),
(4, 'Vision', 'Vision'),
(5, 'Watch', 'Watch'),
(6, 'Airpod', 'Airpod');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `order_status`) VALUES
(6, 18, '2023-10-09 15:06:16', 'Delivered'),
(7, 18, '2023-10-09 15:23:55', 'Pending'),
(12, 19, '2023-10-27 02:57:54', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`) VALUES
(7, 6, 114, 2),
(8, 6, 116, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `img` varchar(400) NOT NULL,
  `name` varchar(255) NOT NULL,
  `colour` text DEFAULT NULL,
  `price` decimal(60,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `img`, `name`, `colour`, `price`, `quantity`, `category_id`) VALUES
(114, '../img/product/ip12.png', 'iPhone 12', 'Red', 445.00, 10, 1),
(115, '../img/product/ip13pro.png', 'iPhone 13 Pro', 'Graphite', 880.41, 5, 1),
(116, '../img/product/apple_watch9.png', 'Watch Series 9', 'Midnight', 399.00, 5, 5),
(117, '../img/product/iphone15pro.png', 'Apple iPhone 15 Pro', 'Black Titanium', 999.00, 5, 1),
(119, '../img/product/ipadmini6.png', 'iPad Mini 6', 'Pink', 384.93, 5, 2),
(120, '../img/product/ipadpro.png', 'iPad Pro 12.9-inch', 'Silver', 2189.00, 5, 2),
(121, '../img/product/ipadair.png', 'iPad Air (5th Generation)', 'Blue ', 459.99, 5, 2),
(122, '../img/product/macAirM1.png', 'MacBook Air Laptop M1 Chip', 'Silver ', 689.99, 5, 3),
(123, '../img/product/macAirM2.png', 'MacBook Air Laptop with M2 chip', 'Silver ', 1039.49, 5, 3),
(124, '../img/product/macProM1.png', 'MacBook Pro M1', 'Space Gray', 1999.00, 5, 3),
(125, '../img/product/MacBook Pro Laptop with M2.png', 'MacBook Pro Laptop with M2 chip', 'Space Gray', 2999.00, 5, 3),
(126, '../img/product/Apple Watch SE (2nd Gen).png', ' Apple Watch SE (2nd Gen) ', 'Midnight', 279.00, 10, 5),
(127, '../img/product/Apple Watch Ultra 2.png', 'Apple Watch Ultra 2', 'Titanium', 799.00, 10, 5),
(128, '../img/product/visionpro.png', 'Vision Pro', 'Midnight', 3499.00, 5, 4),
(129, '../img/product/Apple AirPods Pro (2nd Generation).png', 'Apple AirPods Pro (2nd Generation)', 'White', 129.00, 20, 6),
(130, '../img/product/Apple AirPods Pro (2nd Generation).png', 'Apple AirPods Pro (3rd Generation)', 'White', 169.00, 20, 6),
(131, '../img/product/AirPods Max.png', 'AirPods Max', 'Space Gray', 599.00, 5, 6),
(132, '../img/product/Apple iPhone 11 Pro Max.png', 'Apple iPhone 11 Pro Max', 'Space Gray', 523.00, 10, 1),
(133, '../img/product/Apple iPhone SE.png', 'Apple iPhone SE', 'Red', 399.00, 10, 1),
(134, '../img/product/Apple iPhone 12 Mini.png', 'Apple iPhone 12 Mini', 'Blue', 399.00, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `img` varchar(400) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `img`, `first_name`, `last_name`, `gender`, `email`, `phone`, `password`, `address`, `registration_date`) VALUES
(18, 'img/18_stevejobs.1419962539.jpeg', 'Test', 'User', 'Male', 'test@gmail.com', '0122333', '123', 'Dhaka,bangladesh', '2023-09-26 06:19:03'),
(19, '', 'Second', 'Test User', 'Female', 'second.user@gmail.com', '01111', '12', 'Uganda', '2023-09-26 06:46:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_items_ibfk_1` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5004;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
