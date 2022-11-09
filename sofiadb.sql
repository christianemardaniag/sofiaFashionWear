-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 05:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sofiadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_db`
--

CREATE TABLE `admin_db` (
  `ID` int(10) NOT NULL,
  `username` varchar(115) NOT NULL,
  `password` varchar(115) NOT NULL,
  `email_add` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_db`
--

INSERT INTO `admin_db` (`ID`, `username`, `password`, `email_add`) VALUES
(1, 'admin', 'admin', 'christianemardaniag@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` double(25,2) NOT NULL,
  `size` varchar(115) NOT NULL,
  `expiration` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `qty`, `total`, `size`, `expiration`) VALUES
(200, 42, 40, 2, 100.00, 'Small', '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `order_data`
--

CREATE TABLE `order_data` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `qty` int(20) NOT NULL,
  `total` double(25,2) NOT NULL,
  `order_no` bigint(20) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `rate` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_data`
--

INSERT INTO `order_data` (`order_id`, `customer_id`, `product_id`, `prod_name`, `qty`, `total`, `order_no`, `order_status`, `rate`, `date`) VALUES
(94, 41, 62, 'Nike Shoes', 1, 700.00, 933110, 'CANCELLED', 'NOT', '2022-11-09 00:00:00'),
(95, 42, 50, 'NRA Shirt', 1, 40.00, 3062, 'CLAIMED', 'DONE', '2022-11-08 00:00:00'),
(96, 41, 48, 'Skirt', 1, 40.00, 369935, 'CANCELLED', 'NOT', '2022-11-08 00:00:00'),
(97, 41, 52, 'Polo Shirt', 1, 50.00, 369935, 'CANCELLED', 'NOT', '2022-11-08 00:00:00'),
(98, 41, 44, 'BTI Shirt', 1, 50.00, 853575, 'CLAIMED', 'DONE', '2022-11-08 00:00:00'),
(99, 41, 40, 'Gown Dress', 1, 50.00, 687556, 'CLAIMED', 'DONE', '2022-11-08 00:00:00'),
(100, 41, 51, 'Home Free Shirt', 1, 50.00, 935604, 'CLAIMED', 'DONE', '2022-11-08 00:00:00'),
(101, 41, 31, 'Jeans Woman', 1, 50.00, 231621, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(102, 41, 45, 'Converse Jacket', 1, 50.00, 914238, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(103, 41, 56, 'Gray Jacket', 2, 100.00, 573032, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(104, 41, 62, 'Nike Shoes', 1, 700.00, 476318, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(105, 41, 64, 'Basketball Shoes', 1, 500.00, 476318, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(106, 42, 2, 'Nike Zoom Fly 5', 2, 1200.00, 604408, 'CLAIMED', 'DONE', '2022-11-08 00:00:00'),
(107, 42, 30, 'Girl Graphic', 1, 50.00, 681178, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(108, 42, 63, 'Jeans', 1, 50.00, 681178, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(109, 41, 41, 'Heart Necklaces', 1, 100.00, 443731, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(110, 41, 67, 'Taslan shorts', 1, 50.00, 687256, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(111, 41, 67, 'Taslan shorts', 1, 50.00, 687256, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(112, 41, 67, 'Taslan shorts', 1, 50.00, 687256, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(113, 43, 1, 'Nike Air Force', 1, 700.00, 333480, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(114, 43, 2, 'Nike Zoom Fly 5', 1, 600.00, 333480, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(115, 43, 30, 'Girl Graphic', 1, 50.00, 333480, 'CANCELLED', 'NOT', '2022-11-08 00:00:00'),
(116, 43, 31, 'Jeans Woman', 1, 50.00, 333480, 'CLAIMED', 'NOT', '2022-11-08 00:00:00'),
(117, 43, 40, 'Gown Dress', 1, 50.00, 333480, 'PENDING', 'NOT', '2022-11-08 00:00:00'),
(118, 43, 40, 'Gown Dress', 1, 50.00, 333480, 'PENDING', 'NOT', '2022-11-08 00:00:00'),
(119, 43, 41, 'Heart Necklaces', 1, 100.00, 333480, 'PENDING', 'NOT', '2022-11-08 00:00:00'),
(120, 43, 1, 'Nike Air Force', 1, 700.00, 761909, 'PENDING', 'NOT', '2022-11-08 00:00:00'),
(121, 43, 2, 'Nike Zoom Fly 5', 1, 600.00, 550121, 'PENDING', 'NOT', '2022-11-08 00:00:00'),
(122, 42, 30, 'Girl Graphic', 1, 50.00, 498545, 'PENDING', 'NOT', '2022-11-09 00:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_data`
--

CREATE TABLE `product_data` (
  `product_id` int(10) NOT NULL,
  `product_name` text NOT NULL,
  `description` text NOT NULL,
  `price` double(25,2) NOT NULL,
  `ratings` text NOT NULL,
  `image_path` text NOT NULL,
  `front_image` text NOT NULL,
  `back_image` text NOT NULL,
  `small` int(10) NOT NULL,
  `medium` int(10) NOT NULL,
  `large` int(10) NOT NULL,
  `category` text NOT NULL,
  `release_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_data`
--

INSERT INTO `product_data` (`product_id`, `product_name`, `description`, `price`, `ratings`, `image_path`, `front_image`, `back_image`, `small`, `medium`, `large`, `category`, `release_date`) VALUES
(30, 'Girl Graphic', 'Graphic Shirt', 50.00, 'No Ratings Yet', 'sofiaimages/Products/graphicshirt.png', 'sofiaimages/Products/graphicshirt.png', 'sofiaimages/Products/graphicshirt.png', 16, 23, 1, 'Tops', '2022-09-03'),
(31, 'Jeans Woman', 'Denim Jeans', 50.00, 'No Ratings Yet', 'sofiaimages/Products/JeansWoman.png', 'sofiaimages/Products/JeansWoman.png', 'sofiaimages/Products/JeansWoman.png', 1, 7, 11, 'Bottoms', '2022-09-04'),
(40, 'Gown Dress', 'Pink Cocktail Dress', 50.00, '5.00', 'sofiaimages/Products/GownDress.png', 'sofiaimages/Products/GownDress.png', 'sofiaimages/Products/GownDress.png', 2, 7, 7, 'Dresses', '2022-09-01'),
(41, 'Heart Necklaces', 'Silver Heart Necklace', 100.00, 'No Ratings Yet', 'sofiaimages/Products/heartnecklace.png', 'sofiaimages/Products/heartnecklace.png', 'sofiaimages/Products/heartnecklace.png', 4, 5, 7, 'Accessories', '2022-09-02'),
(43, 'Gray Jacket', 'Santa Cruz Jacket', 70.00, 'No Ratings Yet', 'sofiaimages/Products/bg.png', 'sofiaimages/Products/bg.png', 'sofiaimages/Products/bg.png', 6, 6, 6, 'Tops', '2022-09-05'),
(44, 'BTI Shirt', 'Brotherhood Shirt', 50.00, '5.00', 'sofiaimages/Products/btinobg.png', 'sofiaimages/Products/btinobg.png', 'sofiaimages/Products/btinobg.png', 9, 12, 10, 'Tops', '2022-09-06'),
(45, 'Converse Jacket', 'Converse Cream Jacket', 50.00, '5.00', 'sofiaimages/Products/conjacket.png', 'sofiaimages/Products/conjacket.png', 'sofiaimages/Products/conjacket.png', 7, 8, 6, 'Tops', '2022-09-06'),
(46, 'Thrasher Jacket', 'Thrasher Black', 50.00, '5.00', 'sofiaimages/Products/thrasher.png', 'sofiaimages/Products/thrasher.png', 'sofiaimages/Products/thrasher.png', 9, 8, 7, 'Tops', '2022-09-06'),
(47, 'NBA Cap', '2018 NBA Cap', 65.00, 'No Ratings Yet', 'sofiaimages/Products/nbacap.png', 'sofiaimages/Products/nbacap1.png', 'sofiaimages/Products/nbacap1.png', 5, 5, 8, 'Accessories', '2022-09-06'),
(48, 'Skirt', 'Denim Skirt', 40.00, 'No Ratings Yet', 'sofiaimages/Products/KoreanSkirt.png', 'sofiaimages/Products/KoreanSkirt.png', 'sofiaimages/Products/KoreanSkirt.png', 6, 7, 8, 'Bottoms', '2022-09-06'),
(49, 'US Shirt', 'US Map Shirt', 45.00, 'No Ratings Yet', 'sofiaimages/Products/usa.png', 'sofiaimages/Products/usa.png', 'sofiaimages/Products/usa.png', 9, 7, 5, 'Tops', '2022-09-06'),
(50, 'NRA Shirt', 'Golden Eagles Shirt', 40.00, '5.00', 'sofiaimages/Products/nra.png', 'sofiaimages/Products/nra.png', 'sofiaimages/Products/nra.png', 8, 9, 4, 'Tops', '2022-09-06'),
(51, 'Home Free Shirt', 'Holiday Special Shirt ', 50.00, '5.00', 'sofiaimages/Products/homefree.png', 'sofiaimages/Products/homefree.png', 'sofiaimages/Products/homefree.png', 7, 9, 9, 'Tops', '2022-09-06'),
(52, 'Polo Shirt', 'Blue Polo', 50.00, 'No Ratings Yet', 'sofiaimages/Products/bluepolo.png', 'sofiaimages/Products/bluepolo.png', 'sofiaimages/Products/bluepolo.png', 3, 4, 4, 'Tops', '2022-09-06'),
(53, 'White Jacket', 'Plain White Jacket', 40.00, 'No Ratings Yet', 'sofiaimages/Products/whitejacket.png', 'sofiaimages/Products/whitejacket.png', 'sofiaimages/Products/whitejacket.png', 10, 4, 8, 'Tops', '2022-09-06'),
(54, 'POLO', 'Black Polo Shirt', 60.00, 'No Ratings Yet', 'sofiaimages/Products/blackpolo.png', 'sofiaimages/Products/blackpolo.png', 'sofiaimages/Products/blackpolo.png', 5, 6, 5, 'Tops', '2022-09-06'),
(55, 'Fancy Pants', 'High Waist Pants', 50.00, 'No Ratings Yet', 'sofiaimages/Products/pantzy.png', 'sofiaimages/Products/pantzy.png', 'sofiaimages/Products/pantzy.png', 7, 7, 8, 'Bottoms', '2022-09-06'),
(56, 'Gray Jacket', 'Hoody Gray Jacket', 50.00, 'No Ratings Yet', 'sofiaimages/Products/grayjacket.png', 'sofiaimages/Products/grayjacket.png', 'sofiaimages/Products/grayjacket.png', 4, 6, 5, 'Tops', '2022-09-06'),
(63, 'Jeans', 'Ripped Jeans', 50.00, 'No Ratings Yet', 'sofiaimages/Products/jeanswomansample.png', 'sofiaimages/Products/jeanswomansample.png', 'sofiaimages/Products/jeanswomansample.png', 3, 7, 11, 'Bottoms', '2022-10-22'),
(65, 'Short', 'Dolphin Shorts', 30.00, 'No Ratings Yet', 'sofiaimages/Products/output-onlinepngtools (3).png', 'sofiaimages/Products/output-onlinepngtools (3).png', 'sofiaimages/Products/output-onlinepngtools (3).png', 9, 9, 8, 'Bottoms', '2022-10-22'),
(66, 'Red Skirt', 'Red Skirt', 40.00, 'No Ratings Yet', 'sofiaimages/Products/skirt.png', 'sofiaimages/Products/skirt.png', 'sofiaimages/Products/skirt.png', 7, 8, 7, 'Bottoms', '2022-10-22'),
(67, 'Taslan shorts', 'Taslan Shorts', 50.00, 'No Ratings Yet', 'sofiaimages/Products/output-onlinepngtools (6).png', 'sofiaimages/Products/output-onlinepngtools (6).png', 'sofiaimages/Products/output-onlinepngtools (6).png', 8, 7, 7, 'Bottoms', '2022-10-22'),
(68, 'Denim Pants', 'Denim Pants', 50.00, 'No Ratings Yet', 'sofiaimages/Products/highwaist.png', 'sofiaimages/Products/highwaist.png', 'sofiaimages/Products/highwaist.png', 9, 9, 7, 'Bottoms', '2022-10-22'),
(69, 'Denim short', 'Denim Shorts', 50.00, 'No Ratings Yet', 'sofiaimages/Products/denim.png', 'sofiaimages/Products/denim.png', 'sofiaimages/Products/denim.png', 9, 10, 8, 'Bottoms', '2022-10-22'),
(70, 'Jacket', 'Adidas Jacket', 50.00, 'No Ratings Yet', 'sofiaimages/Products/whitejacket(1).png', 'sofiaimages/Products/whitejacket(1).png', 'sofiaimages/Products/whitejacket(1).png', 8, 9, 8, 'Tops', '2022-10-22'),
(71, 'Gray Polo', 'Gray Polo Shirt', 50.00, 'No Ratings Yet', 'sofiaimages/Products/graypolo.png', 'sofiaimages/Products/graypolo.png', 'sofiaimages/Products/graypolo.png', 7, 9, 9, 'Tops', '2022-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rate_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `five` int(150) NOT NULL,
  `four` int(150) NOT NULL,
  `three` int(150) NOT NULL,
  `two` int(150) NOT NULL,
  `one` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rate_id`, `product_id`, `five`, `four`, `three`, `two`, `one`) VALUES
(19, 44, 1, 0, 0, 0, 0),
(20, 40, 1, 0, 0, 0, 0),
(21, 51, 1, 0, 0, 0, 0),
(22, 50, 1, 0, 0, 0, 0),
(23, 2, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `ID` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phoneno` text NOT NULL,
  `email_add` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`ID`, `name`, `address`, `phoneno`, `email_add`, `username`, `password`) VALUES
(41, 'banawa, ma nina joy', 'pambong bulacan', '639386940251', 'maninajoy.banawa@gmail.com', 'maria', 'f2ceea1536ac1b8fed1a167a9c8bf04d'),
(42, 'sarte, sophia', 'calumpit, bulacan', '639369540265', 'christianemardaniag@gmail.com', 'pia', 'pia123'),
(43, 'mayuyu, jerivic', 'san miguel, bulacan', '639369420811', 'jerivicmayuyu@gmail.com', 'jerivic', 'bcbe3365e6ac95ea2c0343a2395834dd'),
(44, 'domingo, jenica', 'pambong bulacan', '9386940251', 'jenica@gmail.com', 'jenica', '310dcbbf4cce62f762a2aaa148d556bd'),
(45, 'Geronimo, Pamela', 'Marilao', '9786654321', 'pam@gmail.com', 'pam', '91c0f7100bde719c44790e7df757a1a6'),
(46, 'juan', '1abc st, Xyz, Bulacan', '09050448797', 'emardchristiananiag@gmail.com', 'juan', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_db`
--
ALTER TABLE `admin_db`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `order_data`
--
ALTER TABLE `order_data`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_data`
--
ALTER TABLE `product_data`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_db`
--
ALTER TABLE `admin_db`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `order_data`
--
ALTER TABLE `order_data`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `product_data`
--
ALTER TABLE `product_data`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rate_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
