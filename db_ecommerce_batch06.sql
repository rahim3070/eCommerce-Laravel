-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2018 at 11:24 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce_batch06`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_level` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email_address`, `admin_password`, `admin_level`) VALUES
(1, 'Md. Abdur Rahim', 'rahim3070@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'Mst. Mehabuba Rahim', 'mstmehabubarahim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `deletion_status` tinyint(4) NOT NULL DEFAULT '0',
  `parent_id` tinyint(4) NOT NULL,
  `is_featured` tinyint(4) NOT NULL DEFAULT '0',
  `category_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `deletion_status`, `parent_id`, `is_featured`, `category_image`, `created_at`, `updated_at`) VALUES
(8, 'Computer', 'Computer Description', 1, 0, 0, 1, 'images/category_image/j3MVlXVfnGWcuSO8NEKL.jpg', NULL, NULL),
(9, 'Electronics', 'Electronics Description', 1, 0, 0, 1, 'images/category_image/Cra3BWux6a6WcIIpX3PT.jpg', NULL, NULL),
(10, 'Laptop', 'Laptop Description', 1, 0, 8, 0, 'images/category_image/Xvnlt6oFMOLcgGhDYQuj.jpg', NULL, NULL),
(11, 'Dextop', 'Dextop Description', 1, 0, 8, 0, 'images/category_image/ZcnyhMrXxDkQq5Cpokpg.jpg', NULL, NULL),
(14, 'Fashion', 'Fashion Description', 1, 0, 0, 1, 'images/category_image/lhlZBaq0NmHXWNcmdEel.jpg', NULL, NULL),
(15, 'Sports', 'Sports Description', 1, 0, 0, 0, 'images/category_image/RGQYzVnttbdTU55qm0fe.jpg', NULL, NULL),
(16, 'Foods', 'Foods  Description', 1, 0, 0, 0, 'images/category_image/wuP5MD97E8MOgA79osJj.jpg', NULL, NULL),
(17, 'Digital', 'Digital Description', 1, 0, 0, 0, 'images/category_image/XGylbkmWsNjLGTVFJ88z.jpg', NULL, NULL),
(18, 'Furniture', 'Furniture Description', 0, 0, 0, 0, 'images/category_image/qqLEOse7VqQMaYJYI7EW.jpg', NULL, NULL),
(19, 'Men\'s', 'Men\'s Description', 1, 0, 14, 0, NULL, NULL, NULL),
(20, 'Women\'s', 'Women\'s Description', 1, 0, 14, 0, 'images/category_image/1yVc3UZuZQNCsCEcytlK.jpg', NULL, NULL),
(21, 'Kid\'s', 'Kid\'s Description', 1, 0, 14, 0, 'images/category_image/Yryzem7yGv4H7QxL2TIp.jpg', NULL, NULL),
(22, 'Trending', 'Trending Description', 1, 0, 14, 0, 'images/category_image/ymSmy6mJyQi5IKKVVHyI.jpg', NULL, NULL),
(23, 'Senior Citizen', 'Senior Citizen Description', 1, 0, 14, 0, 'images/category_image/K0tp0gzoxpmUwMD8Eqtn.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `first_name`, `last_name`, `company_name`, `email_address`, `password`, `address`, `mobile`, `city`, `zip_code`, `country`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Abdur', 'Rahim', 'Rahi Corporation', 'rahim3070@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'Dhaka', '01675204103', 'Dhaka', '1207', 'Bangladesh', NULL, NULL, NULL),
(2, 'Mst. Mehabuba', 'Aktar', 'Rahi Corporation', 'mstmehabubarahim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Jessore', '01675204102', 'Jessore', '7432', 'Bangladesh', NULL, NULL, NULL),
(4, 'Mst. Mehabuba', 'Aktar', 'Rahi Corporation', 'mstmehabubarahim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Jessore', '01675204102', 'Jessore', '7432', 'Canada', NULL, NULL, NULL),
(5, 'Mst. Mehabuba', 'Aktar', 'Rahi Corporation', 'mstmehabubarahim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Jessore', '01675204102', 'Jessore', '7432', 'Canada', NULL, NULL, NULL),
(6, 'Mst. Mehabuba', 'Aktar', 'Rahi Corporation', 'mstmehabubarahim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Jessore', '01675204102', 'Jessore', '7432', 'Canada', NULL, NULL, NULL),
(7, 'Mst. Mehabuba', 'Aktar', 'Rahi Corporation', 'mstmehabuarahim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Jessore', '01675204102', 'Jessore', '7432', 'Canada', NULL, NULL, NULL),
(8, 'Mst. Mehabuba', 'Aktar', 'Rahi Corporation', 'mstmebuarahim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Jessore', '01675204102', 'Jessore', '7432', 'Canada', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturer`
--

CREATE TABLE `tbl_manufacturer` (
  `manufacturer_id` int(10) UNSIGNED NOT NULL,
  `manufacturer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer_description` text COLLATE utf8_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `deletion_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_manufacturer`
--

INSERT INTO `tbl_manufacturer` (`manufacturer_id`, `manufacturer_name`, `manufacturer_description`, `publication_status`, `deletion_status`, `created_at`, `updated_at`) VALUES
(1, 'HP', 'HP Description', 1, 0, NULL, NULL),
(2, 'DELL', 'DELL Description', 1, 0, NULL, NULL),
(3, 'ASUS', 'ASUS Description', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `shipping_id` int(10) NOT NULL,
  `payment_id` int(10) NOT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `order_total` float(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_status`, `order_total`, `created_at`, `updated_at`) VALUES
(1, 8, 10, 1, 'Pending', 47000.00, NULL, NULL),
(2, 8, 10, 2, 'Pending', 47000.00, NULL, NULL),
(3, 8, 10, 3, 'Pending', 47000.00, NULL, NULL),
(4, 8, 10, 4, 'Pending', 47000.00, NULL, NULL),
(5, 8, 10, 5, 'Pending', 47000.00, NULL, NULL),
(6, 8, 10, 6, 'Pending', 47000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_sales_qty` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'ASUS123', 47000.00, 1, NULL, NULL),
(2, 2, 3, 'ASUS123', 47000.00, 1, NULL, NULL),
(3, 3, 3, 'ASUS123', 47000.00, 1, NULL, NULL),
(4, 4, 3, 'ASUS123', 47000.00, 1, NULL, NULL),
(5, 5, 3, 'ASUS123', 47000.00, 1, NULL, NULL),
(6, 6, 3, 'ASUS123', 47000.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'paypal', 'Pending', NULL, NULL),
(2, 'paypal', 'Pending', NULL, NULL),
(3, 'paypal', 'Pending', NULL, NULL),
(4, 'paypal', 'Pending', NULL, NULL),
(5, 'paypal', 'Pending', NULL, NULL),
(6, 'cash_on_delivery', 'Pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8_unicode_ci NOT NULL,
  `new_price` decimal(10,0) NOT NULL,
  `old_price` decimal(10,0) NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `deletion_status` tinyint(4) NOT NULL DEFAULT '0',
  `is_featured` tinyint(4) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL,
  `product_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `category_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `short_description`, `long_description`, `new_price`, `old_price`, `publication_status`, `deletion_status`, `is_featured`, `stock`, `product_status`, `category_id`, `manufacturer_id`, `created_at`, `updated_at`) VALUES
(2, 'HP1234', 'HP1234 Short Description', 'HP1234 Long Description', '50000', '52000', 1, 0, 1, 100, '0', 10, 1, NULL, NULL),
(3, 'ASUS123', 'ASUS123 Short Description', 'ASUS123 Long Description', '47000', '48000', 1, 0, 1, 50, '0', 10, 3, NULL, NULL),
(4, 'Dell147', 'Dell147 Short Description', 'Dell147 Long Description', '45000', '45500', 1, 0, 1, 20, '0', 11, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image`
--

CREATE TABLE `tbl_product_image` (
  `product_image_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) NOT NULL,
  `image_option` text COLLATE utf8_unicode_ci NOT NULL,
  `image_level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product_image`
--

INSERT INTO `tbl_product_image` (`product_image_id`, `product_id`, `image_option`, `image_level`) VALUES
(1, 2, 'images/product_image/ZELOr3wflJ6gD6uvy6Ud.jpg', 1),
(2, 2, 'images/product_image/8Gc9q4qMrKibs92bGdAo.jpg', 0),
(3, 2, 'images/product_image/TO9F822A6Yoggn1HKQWp.jpg', 0),
(4, 2, 'images/product_image/NJeMievIyKyRxOXWdWfm.jpg', 0),
(5, 3, 'images/product_image/rQVr1tMSx1ECrIj2Bt9A.jpg', 1),
(6, 3, 'images/product_image/qW1ohZMvYjHZNoGWLGCd.jpg', 0),
(7, 3, 'images/product_image/AoaGLR64Sf6jHUF545HU.jpg', 0),
(8, 4, 'images/product_image/tKIbBvnlpHgPYKKnURAO.jpg', 1),
(9, 4, 'images/product_image/DGFdf9fONoFYlwj38L20.jpg', 0),
(10, 4, 'images/product_image/UVt1BzZPD80d4DjDxEwR.jpg', 0),
(11, 4, 'images/product_image/rJqlfkhGvcKnvsgCPSk6.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `first_name`, `last_name`, `company_name`, `email_address`, `address`, `mobile`, `city`, `zip_code`, `country`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Mst. Mehabuba', 'Aktar', 'Rahi Corporation', 'mstmehabubarahim@gmail.com', 'Jessore', '01675204102', 'Jessore', '7432', 'Canada', NULL, NULL, NULL),
(8, 'Mst. Mehabuba', 'Aktar', 'Rahi Corporation', 'mstmehabubarahim@gmail.com', 'Jessore', '01675204102', 'Jessore', '7432', 'Canada', NULL, NULL, NULL),
(9, 'Mst. Mehabuba', 'Aktar', 'Rahi Corporation', 'asd', 'Jessore', '01675204102', 'Jessore', '7432', 'Canada', NULL, NULL, NULL),
(10, 'Mst. Mehabuba', 'Aktar', 'Rahi Corporation', 'mstmubarahim@gmail.com', 'Jessore', '01675204102', 'Jessore', '7432', 'Canada', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  ADD PRIMARY KEY (`product_image_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  MODIFY `manufacturer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  MODIFY `product_image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
