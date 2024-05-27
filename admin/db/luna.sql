-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 11:22 AM
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
-- Database: `it28-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rrp` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES 
(1, 'Samsung', 'Galaxy S21', 'A flagship smartphone with top-of-the-line features and performance.', 999, 1099, 50, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYU6JzypQadT7ryWnNOIrYdBy_kN2usmgyEvKYtnB7PA&s', '2024-05-08 00:00:00'), 
(2, 'Apple', 'iPhone 13', 'The latest iPhone model with improved camera capabilities and faster performance.', 1099, 1199, 30, 'https://static.wikia.nocookie.net/ipod/images/3/3e/Iphone13promax.jpg/revision/latest/thumbnail/width/360/height/450?cb=20211229112100', '2024-05-08 00:00:00'), 
(3, 'OnePlus', '9 Pro', 'A high-performance Android smartphone with a smooth 120Hz display and fast charging.', 899, 999, 40, 'https://upload.wikimedia.org/wikipedia/commons/b/b3/OnePlus_9_Pro_Camera_Module_with_Hasselblad_logo.jpg', '2024-05-08 00:00:00'),
(4, 'Xiaomi', 'Redmi Note 11', 'A budget-friendly smartphone with a large display and long-lasting battery life.', 299, 349, 60, 'https://www.dpreview.com/files/p/articles/7450305057/Redmi_Note_1.jpeg', '2024-05-08 00:00:00'),
(5, 'Google', 'Pixel 6', 'A camera-centric smartphone with advanced AI features and a sleek design.', 799, 899, 20, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjxzPmT5uqJ5NHvgNPlAPQmUNcUk7xPrqDRq8jP_zCBg&s', '2024-05-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$kGp4g1TjBK4XwLIwRbBHSeZ4W5FpPbYoB1ap5NfFUjUPAcE3KR5QG', '2024-04-29 16:39:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

CREATE TABLE payments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE addresses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    street_address VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    state VARCHAR(100) NOT NULL,
    postal_code VARCHAR(20) NOT NULL,
    country VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
