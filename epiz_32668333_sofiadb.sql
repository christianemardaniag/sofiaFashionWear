-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql200.byetcluster.com
-- Generation Time: Dec 07, 2022 at 01:19 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32668333_sofiadb`
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
(1, 'admin', 'admin', 'maninajoy.banawa@gmail.com');

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
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_data`
--

INSERT INTO `order_data` (`order_id`, `customer_id`, `product_id`, `prod_name`, `qty`, `total`, `order_no`, `order_status`, `rate`, `date`, `transaction_date`) VALUES
(94, 41, 62, 'Nike Shoes', 1, 700.00, 933110, 'CANCELLED', 'NOT', '2022-11-09 00:00:00', '2022-11-10 02:14:50'),
(95, 42, 50, 'NRA Shirt', 1, 40.00, 3062, 'CLAIMED', 'DONE', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(96, 41, 48, 'Skirt', 1, 40.00, 369935, 'CANCELLED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(97, 41, 52, 'Polo Shirt', 1, 50.00, 369935, 'CANCELLED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(98, 41, 44, 'BTI Shirt', 1, 50.00, 853575, 'CLAIMED', 'DONE', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(99, 41, 40, 'Gown Dress', 1, 50.00, 687556, 'CLAIMED', 'DONE', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(100, 41, 51, 'Home Free Shirt', 1, 50.00, 935604, 'CLAIMED', 'DONE', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(101, 41, 31, 'Jeans Woman', 1, 50.00, 231621, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(102, 41, 45, 'Converse Jacket', 1, 50.00, 914238, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(103, 41, 56, 'Gray Jacket', 2, 100.00, 573032, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(104, 41, 62, 'Nike Shoes', 1, 700.00, 476318, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(105, 41, 64, 'Basketball Shoes', 1, 500.00, 476318, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(106, 42, 2, 'Nike Zoom Fly 5', 2, 1200.00, 604408, 'CLAIMED', 'DONE', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(107, 42, 30, 'Girl Graphic', 1, 50.00, 681178, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(108, 42, 63, 'Jeans', 1, 50.00, 681178, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(109, 41, 41, 'Heart Necklaces', 1, 100.00, 443731, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(110, 41, 67, 'Taslan shorts', 1, 50.00, 687256, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(111, 41, 67, 'Taslan shorts', 1, 50.00, 687256, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(112, 41, 67, 'Taslan shorts', 1, 50.00, 687256, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(113, 43, 1, 'Nike Air Force', 1, 700.00, 333480, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(114, 43, 2, 'Nike Zoom Fly 5', 1, 600.00, 333480, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(115, 43, 30, 'Girl Graphic', 1, 50.00, 333480, 'CANCELLED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(116, 43, 31, 'Jeans Woman', 1, 50.00, 333480, 'CLAIMED', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(117, 43, 40, 'Gown Dress', 1, 50.00, 333480, 'PENDING', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(118, 43, 40, 'Gown Dress', 1, 50.00, 333480, 'PENDING', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(119, 43, 41, 'Heart Necklaces', 1, 100.00, 333480, 'PENDING', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(120, 43, 1, 'Nike Air Force', 1, 700.00, 761909, 'PENDING', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(121, 43, 2, 'Nike Zoom Fly 5', 1, 600.00, 550121, 'PENDING', 'NOT', '2022-11-08 00:00:00', '2022-11-10 02:14:50'),
(122, 42, 30, 'Girl Graphic', 1, 50.00, 498545, 'PENDING', 'NOT', '2022-11-09 00:15:37', '2022-11-10 02:14:50'),
(123, 47, 30, 'Girl Graphic', 8, 400.00, 846485, 'CLAIMED', 'NOT', '2022-11-10 02:36:00', '2022-11-10 02:37:29'),
(124, 47, 31, 'Jeans Woman', 1, 50.00, 343139, 'CLAIMED', 'NOT', '2022-11-10 02:38:40', '2022-11-10 02:39:19'),
(125, 47, 43, 'Gray Jacket', 2, 140.00, 343139, 'CLAIMED', 'NOT', '2022-11-10 02:38:40', '2022-11-10 02:39:23'),
(126, 47, 44, 'BTI Shirt', 3, 150.00, 343139, 'CLAIMED', 'NOT', '2022-11-10 02:38:40', '2022-11-10 02:39:26'),
(127, 47, 46, 'Thrasher Jacket', 3, 150.00, 343139, 'CLAIMED', 'NOT', '2022-11-10 02:38:40', '2022-11-10 02:39:34'),
(128, 47, 53, 'White Jacket', 1, 40.00, 343139, 'CLAIMED', 'NOT', '2022-11-10 02:38:40', '2022-11-10 02:39:37'),
(129, 50, 48, 'Skirt', 3, 120.00, 839934, 'CANCELLED', 'NOT', '2022-11-10 02:40:37', '2022-11-10 02:41:44'),
(130, 50, 52, 'Polo Shirt', 1, 50.00, 839934, 'CLAIMED', 'NOT', '2022-11-10 02:40:37', '2022-11-10 02:41:51'),
(131, 50, 54, 'POLO', 1, 60.00, 839934, 'CLAIMED', 'NOT', '2022-11-10 02:40:37', '2022-11-10 02:42:44'),
(132, 56, 67, 'Taslan shorts', 1, 50.00, 132402, 'CLAIMED', 'NOT', '2022-11-10 02:41:12', '2022-11-10 02:42:36'),
(133, 56, 30, 'Girl Graphic', 1, 50.00, 132402, 'CANCELLED', 'NOT', '2022-11-10 02:41:12', '2022-11-10 02:41:59'),
(134, 56, 43, 'Gray Jacket', 1, 70.00, 132402, 'CLAIMED', 'NOT', '2022-11-10 02:41:12', '2022-11-10 02:42:39'),
(135, 55, 43, 'Gray Jacket', 1, 70.00, 250358, 'CLAIMED', 'NOT', '2022-11-10 02:43:06', '2022-11-10 02:45:25'),
(136, 55, 47, 'NBA Cap', 1, 65.00, 250358, 'CLAIMED', 'NOT', '2022-11-10 02:43:06', '2022-11-10 02:45:28'),
(137, 53, 43, 'Gray Jacket', 1, 70.00, 540255, 'CLAIMED', 'NOT', '2022-11-10 02:43:32', '2022-11-10 02:45:31'),
(138, 60, 31, 'Jeans Woman', 1, 50.00, 915485, 'CLAIMED', 'NOT', '2022-11-10 02:45:16', '2022-11-10 02:45:33'),
(139, 61, 47, 'NBA Cap', 1, 65.00, 955496, 'CLAIMED', 'DONE', '2022-11-10 02:46:45', '2022-11-10 02:46:51'),
(140, 58, 45, 'Converse Jacket', 1, 50.00, 82015, 'CLAIMED', 'NOT', '2022-11-10 02:49:31', '2022-11-10 02:50:04'),
(141, 62, 47, 'NBA Cap', 1, 65.00, 290282, 'CLAIMED', 'DONE', '2022-11-10 02:52:10', '2022-11-10 02:52:16'),
(142, 59, 52, 'Polo Shirt', 1, 50.00, 357662, 'CLAIMED', 'NOT', '2022-11-10 02:53:36', '2022-11-10 02:53:56'),
(143, 67, 69, 'Denim short', 1, 50.00, 438128, 'CLAIMED', 'NOT', '2022-11-10 02:54:15', '2022-11-10 02:54:22'),
(144, 67, 41, 'Heart Necklaces', 1, 100.00, 438128, 'CLAIMED', 'NOT', '2022-11-10 02:54:15', '2022-11-10 02:54:25'),
(145, 67, 65, 'Short', 1, 30.00, 438128, 'CLAIMED', 'NOT', '2022-11-10 02:54:15', '2022-11-10 02:54:27'),
(146, 66, 46, 'Thrasher Jacket', 1, 50.00, 728619, 'CLAIMED', 'NOT', '2022-11-10 02:55:48', '2022-11-10 02:58:39'),
(147, 66, 55, 'Fancy Pants', 1, 50.00, 728619, 'CLAIMED', 'DONE', '2022-11-10 02:55:48', '2022-11-10 02:58:44'),
(148, 66, 67, 'Taslan shorts', 1, 50.00, 728619, 'CANCELLED', 'NOT', '2022-11-10 02:55:48', '2022-11-10 02:58:41'),
(149, 65, 47, 'NBA Cap', 1, 65.00, 60406, 'CLAIMED', 'NOT', '2022-11-10 02:57:06', '2022-11-10 02:58:56'),
(150, 65, 43, 'Gray Jacket', 1, 70.00, 60406, 'CLAIMED', 'NOT', '2022-11-10 02:57:06', '2022-11-10 02:59:21'),
(151, 65, 51, 'Home Free Shirt', 1, 50.00, 60406, 'CANCELLED', 'NOT', '2022-11-10 02:57:06', '2022-11-10 02:59:01'),
(152, 65, 63, 'Jeans', 1, 50.00, 60406, 'CLAIMED', 'NOT', '2022-11-10 02:57:06', '2022-11-10 02:59:07'),
(153, 64, 46, 'Thrasher Jacket', 1, 50.00, 845394, 'CLAIMED', 'NOT', '2022-11-10 02:58:28', '2022-11-10 02:59:13'),
(154, 64, 48, 'Skirt', 1, 40.00, 845394, 'CLAIMED', 'NOT', '2022-11-10 02:58:28', '2022-11-10 02:59:19'),
(155, 64, 30, 'Girl Graphic', 1, 50.00, 845394, 'CANCELLED', 'NOT', '2022-11-10 02:58:28', '2022-11-10 02:59:16'),
(156, 51, 68, 'Denim Pants', 1, 50.00, 210682, 'CLAIMED', 'NOT', '2022-11-10 03:02:08', '2022-11-10 03:03:09'),
(157, 49, 41, 'Heart Necklaces', 1, 100.00, 832811, 'CLAIMED', 'NOT', '2022-11-10 03:03:52', '2022-11-10 03:05:11'),
(158, 49, 49, 'US Shirt', 1, 45.00, 832811, 'CANCELLED', 'NOT', '2022-11-10 03:03:52', '2022-11-10 03:05:15'),
(159, 48, 40, 'Gown Dress', 1, 50.00, 109663, 'CLAIMED', 'NOT', '2022-11-10 03:04:45', '2022-11-10 03:05:19'),
(160, 48, 31, 'Jeans Woman', 1, 50.00, 109663, 'CLAIMED', 'NOT', '2022-11-10 03:04:45', '2022-11-10 03:05:21'),
(161, 52, 43, 'Gray Jacket', 1, 70.00, 349620, 'CLAIMED', 'NOT', '2022-11-10 03:05:58', '2022-11-10 03:06:08'),
(162, 63, 40, 'Gown Dress', 1, 50.00, 623571, 'CLAIMED', 'NOT', '2022-11-10 03:09:50', '2022-11-10 03:09:55'),
(163, 68, 47, 'NBA Cap', 1, 65.00, 914127, 'CLAIMED', 'NOT', '2022-11-10 03:11:32', '2022-11-10 03:11:56'),
(164, 69, 65, 'Short', 1, 30.00, 656754, 'CLAIMED', 'NOT', '2022-11-10 03:21:54', '2022-11-10 03:21:58'),
(165, 52, 45, 'Converse Jacket', 1, 50.00, 366200, 'CLAIMED', 'NOT', '2022-11-10 03:24:56', '2022-11-10 03:25:32'),
(166, 52, 52, 'Polo Shirt', 1, 50.00, 366200, 'CLAIMED', 'NOT', '2022-11-10 03:24:56', '2022-11-10 03:25:34'),
(167, 48, 30, 'Girl Graphic', 1, 50.00, 612747, 'CLAIMED', 'NOT', '2022-11-10 03:34:25', '2022-11-21 01:19:35'),
(168, 48, 31, 'Jeans Woman', 1, 50.00, 612747, 'CANCELLED', 'NOT', '2022-11-10 03:34:25', '2022-11-10 06:04:36'),
(169, 48, 40, 'Gown Dress', 1, 50.00, 612747, 'CANCELLED', 'NOT', '2022-11-10 03:34:25', '2022-11-21 01:19:59'),
(170, 52, 41, 'Heart Necklaces', 1, 100.00, 144107, 'CLAIMED', 'NOT', '2022-11-10 03:35:07', '0000-00-00 00:00:00'),
(171, 52, 43, 'Gray Jacket', 3, 210.00, 144107, 'CLAIMED', 'NOT', '2022-11-10 03:35:07', '0000-00-00 00:00:00'),
(172, 52, 47, 'NBA Cap', 1, 65.00, 144107, 'CLAIMED', 'NOT', '2022-11-10 03:35:07', '2022-11-22 09:32:20'),
(173, 49, 48, 'Skirt', 1, 40.00, 784100, 'CLAIMED', 'NOT', '2022-11-10 03:35:53', '2022-11-21 02:20:20'),
(174, 49, 31, 'Jeans Woman', 2, 100.00, 784100, 'CLAIMED', 'NOT', '2022-11-10 03:35:53', '2022-11-21 02:20:29'),
(175, 49, 40, 'Gown Dress', 1, 50.00, 784100, 'CLAIMED', 'NOT', '2022-11-10 03:35:53', '2022-11-21 02:20:36'),
(176, 51, 44, 'BTI Shirt', 1, 50.00, 639965, 'CLAIMED', 'NOT', '2022-11-10 03:37:28', '2022-11-22 11:03:22'),
(177, 51, 52, 'Polo Shirt', 1, 50.00, 639965, 'CLAIMED', 'NOT', '2022-11-10 03:37:28', '2022-11-22 12:19:33'),
(178, 51, 30, 'Girl Graphic', 1, 50.00, 639965, 'CANCELLED', 'NOT', '2022-11-10 03:37:28', '2022-11-22 20:38:30'),
(179, 59, 31, 'Jeans Woman', 1, 50.00, 335381, 'CLAIMED', 'NOT', '2022-11-21 01:17:07', '2022-11-23 17:02:47'),
(180, 49, 31, 'Jeans Woman', 1, 50.00, 584887, 'CLAIMED', 'NOT', '2022-11-21 01:17:57', '2022-11-21 01:27:14'),
(181, 49, 49, 'US Shirt', 1, 45.00, 584887, 'CLAIMED', 'NOT', '2022-11-21 01:17:57', '2022-11-21 01:27:09'),
(182, 73, 30, 'Girl Graphic', 12, 600.00, 252833, 'CLAIMED', 'NOT', '2022-11-21 01:58:46', '2022-11-21 02:16:34'),
(183, 73, 43, 'Gray Jacket', 1, 70.00, 252833, 'CLAIMED', 'NOT', '2022-11-21 01:58:46', '2022-11-24 16:10:20'),
(184, 73, 31, 'Jeans Woman', 1, 50.00, 252833, 'CANCELLED', 'NOT', '2022-11-21 01:58:46', '2022-11-24 16:11:09'),
(185, 73, 44, 'BTI Shirt', 3, 150.00, 252833, 'PENDING', 'NOT', '2022-11-21 01:58:46', '2022-11-21 01:58:46'),
(186, 73, 31, 'Jeans Woman', 1, 50.00, 941766, 'CANCELLED', 'NOT', '2022-11-21 02:00:12', '2022-11-24 13:11:47'),
(187, 73, 50, 'NRA Shirt', 1, 40.00, 910301, 'PENDING', 'NOT', '2022-11-21 02:02:07', '2022-11-21 02:02:07'),
(188, 73, 43, 'Gray Jacket', 1, 70.00, 910301, 'PENDING', 'NOT', '2022-11-21 02:02:07', '2022-11-21 02:02:07'),
(189, 51, 54, 'POLO', 1, 60.00, 443647, 'PENDING', 'NOT', '2022-11-21 02:17:25', '2022-11-21 02:17:25'),
(190, 51, 55, 'Fancy Pants', 1, 50.00, 443647, 'PENDING', 'NOT', '2022-11-21 02:17:25', '2022-11-21 02:17:25'),
(191, 51, 71, 'Gray Polo', 1, 50.00, 443647, 'PENDING', 'NOT', '2022-11-21 02:17:25', '2022-11-21 02:17:25'),
(192, 63, 40, 'Gown Dress', 1, 50.00, 439999, 'CLAIMED', 'NOT', '2022-11-21 02:29:54', '2022-11-21 02:30:41'),
(193, 63, 40, 'Gown Dress', 1, 50.00, 439999, 'CLAIMED', 'NOT', '2022-11-21 02:29:54', '2022-11-21 02:30:46'),
(194, 63, 56, 'Gray Jacket', 1, 50.00, 439999, 'CLAIMED', 'NOT', '2022-11-21 02:29:54', '2022-11-21 02:30:52'),
(195, 56, 31, 'Jeans Woman', 1, 50.00, 192635, 'CLAIMED', 'NOT', '2022-11-21 02:58:35', '2022-11-24 13:09:09'),
(196, 74, 49, 'US Shirt', 1, 45.00, 890985, 'CLAIMED', 'NOT', '2022-11-21 03:00:05', '2022-11-21 03:01:11'),
(197, 74, 43, 'Gray Jacket', 1, 70.00, 890985, 'CLAIMED', 'NOT', '2022-11-21 03:00:05', '2022-11-21 03:01:19'),
(198, 74, 44, 'BTI Shirt', 1, 50.00, 890985, 'CLAIMED', 'NOT', '2022-11-21 03:00:05', '2022-11-21 03:01:32'),
(199, 74, 47, 'NBA Cap', 1, 65.00, 890985, 'CLAIMED', 'NOT', '2022-11-21 03:00:05', '2022-11-21 03:00:53'),
(200, 74, 48, 'Skirt', 1, 40.00, 890985, 'CLAIMED', 'NOT', '2022-11-21 03:00:05', '2022-11-21 03:01:41'),
(201, 74, 40, 'Gown Dress', 1, 50.00, 743536, 'PENDING', 'NOT', '2022-11-21 03:12:50', '2022-11-21 03:12:50'),
(202, 74, 31, 'Jeans Woman', 1, 50.00, 357560, 'PENDING', 'NOT', '2022-11-21 03:39:54', '2022-11-21 03:39:54'),
(203, 65, 40, 'Gown Dress', 1, 50.00, 188608, 'CLAIMED', 'NOT', '2022-11-21 04:21:50', '2022-11-21 04:22:08'),
(204, 49, 31, 'Jeans Woman', 1, 50.00, 825929, 'CLAIMED', 'NOT', '2022-11-21 04:23:57', '2022-11-21 04:25:51'),
(205, 64, 31, 'Jeans Woman', 1, 50.00, 506882, 'CLAIMED', 'NOT', '2022-11-21 04:29:51', '2022-11-21 04:30:26'),
(206, 64, 30, 'Girl Graphic', 1, 50.00, 506882, 'CLAIMED', 'NOT', '2022-11-21 04:29:51', '2022-11-21 04:30:32'),
(207, 64, 45, 'Converse Jacket', 1, 50.00, 814971, 'CLAIMED', 'NOT', '2022-11-21 04:34:28', '2022-11-21 04:35:35'),
(208, 65, 31, 'Jeans Woman', 1, 50.00, 399560, 'CLAIMED', 'NOT', '2022-11-21 07:35:53', '2022-11-24 13:08:58'),
(209, 76, 67, 'Taslan shorts', 1, 50.00, 655835, 'CLAIMED', 'NOT', '2022-11-21 07:46:27', '2022-11-21 07:46:45'),
(210, 76, 44, 'BTI Shirt', 1, 50.00, 655835, 'CLAIMED', 'NOT', '2022-11-21 07:46:27', '2022-11-21 07:47:00'),
(211, 76, 49, 'US Shirt', 1, 45.00, 655835, 'CLAIMED', 'NOT', '2022-11-21 07:46:27', '2022-11-21 07:47:05'),
(212, 76, 50, 'NRA Shirt', 1, 40.00, 655835, 'CLAIMED', 'NOT', '2022-11-21 07:46:27', '2022-11-21 07:47:10'),
(213, 76, 51, 'Home Free Shirt', 1, 50.00, 758836, 'CLAIMED', 'NOT', '2022-11-21 08:13:05', '2022-11-21 08:14:30'),
(214, 76, 30, 'Girl Graphic', 1, 50.00, 758836, 'CANCELLED', 'NOT', '2022-11-21 08:13:05', '2022-11-21 08:14:40'),
(215, 64, 46, 'Thrasher Jacket', 1, 50.00, 382646, 'CLAIMED', 'NOT', '2022-11-21 09:04:34', '2022-11-21 09:04:53'),
(216, 64, 30, 'Girl Graphic', 1, 50.00, 382646, 'PENDING', 'NOT', '2022-11-21 09:04:34', '2022-11-21 09:04:34'),
(217, 64, 44, 'BTI Shirt', 1, 50.00, 382646, 'PENDING', 'NOT', '2022-11-21 09:04:34', '2022-11-21 09:04:34'),
(218, 64, 45, 'Converse Jacket', 1, 50.00, 382646, 'PENDING', 'NOT', '2022-11-21 09:04:34', '2022-11-21 09:04:34'),
(219, 64, 46, 'Thrasher Jacket', 1, 50.00, 382646, 'CLAIMED', 'NOT', '2022-11-21 09:04:34', '2022-11-22 09:30:53'),
(220, 48, 43, 'Gray Jacket', 1, 70.00, 965395, 'CLAIMED', 'NOT', '2022-11-21 17:05:46', '2022-11-21 17:06:49'),
(221, 64, 40, 'Gown Dress', 1, 50.00, 28191, 'CLAIMED', 'DONE', '2022-11-21 19:40:52', '0000-00-00 00:00:00'),
(222, 64, 43, 'Gray Jacket', 2, 140.00, 210879, 'CLAIMED', 'NOT', '2022-11-22 08:57:40', '2022-11-21 19:46:25'),
(223, 64, 31, 'Jeans Woman', 3, 150.00, 24766, 'CLAIMED', 'NOT', '2022-11-22 09:12:27', '0000-00-00 00:00:00'),
(224, 74, 44, 'BTI Shirt', 1, 50.00, 726871, 'CANCELLED', 'NOT', '2022-11-22 12:18:00', '2022-11-24 12:39:57'),
(225, 75, 40, 'Dress', 2, 100.00, 562104, 'CLAIMED', 'NOT', '2022-11-23 20:02:51', '2022-11-24 13:09:20'),
(226, 75, 41, 'Heart Necklaces', 1, 100.00, 562104, 'PENDING', 'NOT', '2022-11-23 20:02:51', '2022-11-23 20:02:51'),
(227, 77, 48, 'Skirt', 1, 40.00, 916851, 'CLAIMED', 'NOT', '2022-11-23 20:03:30', '2022-11-24 13:09:30'),
(228, 77, 66, 'Red Skirt', 2, 80.00, 916851, 'CLAIMED', 'NOT', '2022-11-23 20:03:30', '2022-11-23 20:12:22'),
(229, 75, 65, 'Short', 1, 30.00, 945302, 'CLAIMED', 'NOT', '2022-11-23 20:16:08', '2022-11-23 20:17:06'),
(230, 75, 40, 'Dress', 1, 50.00, 945302, 'CLAIMED', 'NOT', '2022-11-23 20:16:08', '2022-11-23 20:17:14'),
(231, 61, 63, 'Jeans', 2, 100.00, 191696, 'CLAIMED', 'NOT', '2022-11-24 12:34:31', '2022-11-24 12:40:41'),
(232, 61, 47, 'NBA Cap', 1, 65.00, 191696, 'CLAIMED', 'NOT', '2022-11-24 12:34:31', '2022-11-24 12:40:48'),
(233, 53, 55, 'Fancy Pants', 1, 50.00, 525784, 'CLAIMED', 'NOT', '2022-11-24 12:37:27', '2022-11-24 12:39:04'),
(234, 53, 55, 'Fancy Pants', 1, 50.00, 525784, 'CLAIMED', 'NOT', '2022-11-24 12:37:27', '2022-11-24 12:39:10'),
(235, 74, 55, 'Fancy Pants', 1, 50.00, 278458, 'CLAIMED', 'DONE', '2022-11-24 13:29:49', '2022-11-24 13:30:00'),
(236, 66, 56, 'Gray Jacket', 1, 60.00, 579723, 'CLAIMED', 'NOT', '2022-11-28 16:05:28', '2022-11-28 16:06:07'),
(237, 66, 31, 'Jeans', 45, 2250.00, 990768, 'CLAIMED', 'NOT', '2022-11-28 16:10:50', '2022-11-28 16:12:17'),
(238, 66, 40, 'Dress', 47, 2350.00, 990768, 'CLAIMED', 'NOT', '2022-11-28 16:10:50', '2022-11-28 16:12:24'),
(239, 66, 40, 'Dress', 1, 50.00, 557987, 'PENDING', 'NOT', '2022-11-28 16:13:20', '2022-11-28 16:13:20'),
(240, 49, 40, 'Dress', 1, 50.00, 680724, 'CLAIMED', 'NOT', '2022-12-01 21:49:21', '2022-12-05 21:11:48'),
(241, 52, 55, 'Fancy Pants', 2, 100.00, 837703, 'CLAIMED', 'NOT', '2022-12-05 21:07:01', '2022-12-05 21:07:39'),
(242, 64, 72, 'Track Pants', 3, 165.00, 555134, 'CLAIMED', 'NOT', '2022-12-05 21:09:12', '2022-12-05 21:12:06'),
(243, 49, 31, 'Jeans', 4, 200.00, 750680, 'PENDING', 'NOT', '2022-12-05 21:10:15', '2022-12-05 21:10:15'),
(244, 66, 31, 'Jeans', 3, 150.00, 191702, 'CLAIMED', 'NOT', '2022-12-06 11:40:30', '2022-12-06 11:42:02');

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
(30, 'Girl Graphic', 'Graphic Shirt', 50.00, 'No Ratings Yet', 'sofiaimages/Products/graphicshirt.png', 'sofiaimages/Products/graphicshirt.png', 'sofiaimages/Products/graphicshirt.png', 50, 73, 50, 'Tops', '2022-09-03'),
(31, 'Jeans', 'Denim Jeans', 50.00, 'No Ratings Yet', 'sofiaimages/Products/JeansWoman.png', 'sofiaimages/Products/JeansWoman.png', 'sofiaimages/Products/JeansWoman.png', 43, 50, 50, 'Bottoms', '2022-09-04'),
(40, 'Dress', 'Pink Cocktail Dress', 50.00, '5.00', 'sofiaimages/Products/GownDress.png', 'sofiaimages/Products/GownDress.png', 'sofiaimages/Products/GownDress.png', 50, 50, 50, 'Dresses', '2022-09-01'),
(41, 'Heart Necklaces', 'Silver Heart Necklace', 100.00, 'No Ratings Yet', 'sofiaimages/Products/heartnecklace.png', 'sofiaimages/Products/heartnecklace.png', 'sofiaimages/Products/heartnecklace.png', 54, 56, 59, 'Accessories', '2022-09-02'),
(43, 'Hoodie Jacket', 'Santa Cruz Hoodie', 70.00, 'No Ratings Yet', 'sofiaimages/Products/bg.png', 'sofiaimages/Products/bg.png', 'sofiaimages/Products/bg.png', 50, 50, 50, 'Tops', '2022-09-05'),
(44, 'BTI Shirt', 'Brotherhood Shirt', 50.00, '5.00', 'sofiaimages/Products/btinobg.png', 'sofiaimages/Products/btinobg.png', 'sofiaimages/Products/btinobg.png', 50, 50, 50, 'Tops', '2022-09-06'),
(45, 'Converse Jacket', 'Converse Cream Jacket', 50.00, '5.00', 'sofiaimages/Products/conjacket.png', 'sofiaimages/Products/conjacket.png', 'sofiaimages/Products/conjacket.png', 50, 50, 50, 'Tops', '2022-09-06'),
(46, 'Thrasher Hoodie', 'Thrasher Black', 50.00, '5.00', 'sofiaimages/Products/thrasher.png', 'sofiaimages/Products/thrasher.png', 'sofiaimages/Products/thrasher.png', 50, 50, 50, 'Tops', '2022-09-06'),
(47, 'NBA Cap', '2018 NBA Cap', 65.00, '5.00', 'sofiaimages/Products/nbacap.png', 'sofiaimages/Products/nbacap1.png', 'sofiaimages/Products/nbacap1.png', 35, 26, 30, 'Accessories', '2022-09-06'),
(48, 'Skirt', 'Denim Skirt', 40.00, 'No Ratings Yet', 'sofiaimages/Products/KoreanSkirt.png', 'sofiaimages/Products/KoreanSkirt.png', 'sofiaimages/Products/KoreanSkirt.png', 50, 50, 51, 'Bottoms', '2022-09-06'),
(49, 'US Shirt', 'US Map Shirt', 45.00, 'No Ratings Yet', 'sofiaimages/Products/usa.png', 'sofiaimages/Products/usa.png', 'sofiaimages/Products/usa.png', 50, 60, 50, 'Tops', '2022-09-06'),
(50, 'NRA Shirt', 'Golden Eagles Shirt', 40.00, '5.00', 'sofiaimages/Products/nra.png', 'sofiaimages/Products/nra.png', 'sofiaimages/Products/nra.png', 5, 9, 4, 'Tops', '2022-09-06'),
(51, 'Home Free Shirt', 'Holiday Special Shirt ', 50.00, '5.00', 'sofiaimages/Products/homefree.png', 'sofiaimages/Products/homefree.png', 'sofiaimages/Products/homefree.png', 6, 8, 9, 'Tops', '2022-09-06'),
(52, 'Polo Shirt', 'Blue Polo', 50.00, 'No Ratings Yet', 'sofiaimages/Products/bluepolo.png', 'sofiaimages/Products/bluepolo.png', 'sofiaimages/Products/bluepolo.png', 0, 0, 4, 'Tops', '2022-09-06'),
(53, 'White Jacket', 'Plain White Jacket', 40.00, 'No Ratings Yet', 'sofiaimages/Products/whitejacket.png', 'sofiaimages/Products/whitejacket.png', 'sofiaimages/Products/whitejacket.png', 8, 3, 7, 'Tops', '2022-09-06'),
(54, 'POLO', 'Polo Shirt', 60.00, 'No Ratings Yet', 'sofiaimages/Products/blackpolo.png', 'sofiaimages/Products/blackpolo.png', 'sofiaimages/Products/blackpolo.png', 32, 23, 18, 'Tops', '2022-09-06'),
(55, 'Fancy Pants', 'High Waist Pants', 50.00, '3.50', 'sofiaimages/Products/pantzy.png', 'sofiaimages/Products/pantzy.png', 'sofiaimages/Products/pantzy.png', 24, 31, 39, 'Bottoms', '2022-09-06'),
(56, 'Gray Jacket', 'Hoody Gray Jacket', 60.00, 'No Ratings Yet', 'sofiaimages/Products/grayjacket.png', 'sofiaimages/Products/grayjacket.png', 'sofiaimages/Products/grayjacket.png', 33, 36, 37, 'Tops', '2022-09-06'),
(63, 'Jeans', 'Ripped Jeans', 50.00, 'No Ratings Yet', 'sofiaimages/Products/jeanswomansample.png', 'sofiaimages/Products/jeanswomansample.png', 'sofiaimages/Products/jeanswomansample.png', 36, 31, 38, 'Bottoms', '2022-10-22'),
(65, 'Short', 'Dolphin Shorts', 30.00, 'No Ratings Yet', 'sofiaimages/Products/output-onlinepngtools (3).png', 'sofiaimages/Products/output-onlinepngtools (3).png', 'sofiaimages/Products/output-onlinepngtools (3).png', 28, 37, 23, 'Bottoms', '2022-10-22'),
(66, 'Red Skirt', 'Red Skirt', 40.00, 'No Ratings Yet', 'sofiaimages/Products/skirt.png', 'sofiaimages/Products/skirt.png', 'sofiaimages/Products/skirt.png', 44, 45, 47, 'Bottoms', '2022-10-22'),
(67, 'Taslan shorts', 'Taslan Shorts', 50.00, 'No Ratings Yet', 'sofiaimages/Products/output-onlinepngtools (6).png', 'sofiaimages/Products/output-onlinepngtools (6).png', 'sofiaimages/Products/output-onlinepngtools (6).png', 54, 34, 31, 'Bottoms', '2022-10-22'),
(68, 'Denim Pants', 'Denim Pants', 50.00, 'No Ratings Yet', 'sofiaimages/Products/highwaist.png', 'sofiaimages/Products/highwaist.png', 'sofiaimages/Products/highwaist.png', 41, 32, 26, 'Bottoms', '2022-10-22'),
(69, 'Denim short', 'Denim Shorts', 50.00, 'No Ratings Yet', 'sofiaimages/Products/denim.png', 'sofiaimages/Products/denim.png', 'sofiaimages/Products/denim.png', 46, 36, 34, 'Bottoms', '2022-10-22'),
(70, 'Jacket', 'Adidas Jacket', 50.00, 'No Ratings Yet', 'sofiaimages/Products/whitejacket(1).png', 'sofiaimages/Products/whitejacket(1).png', 'sofiaimages/Products/whitejacket(1).png', 27, 31, 39, 'Tops', '2022-10-22'),
(71, 'Gray Polo', 'Gray Polo Shirt', 50.00, 'No Ratings Yet', 'sofiaimages/Products/graypolo.png', 'sofiaimages/Products/graypolo.png', 'sofiaimages/Products/graypolo.png', 46, 46, 43, 'Tops', '2022-10-22'),
(72, 'Track Pants', 'Black Pants', 55.00, 'No Ratings Yet', 'sofiaimages/Products/ASAPTyyTrackPants.png', 'sofiaimages/Products/ASAPTyyTrackPants.png', 'sofiaimages/Products/ASAPTyyTrackPants.png', 17, 22, 19, 'Bottoms', '2022-11-24');

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
(20, 40, 2, 0, 0, 0, 0),
(21, 51, 1, 0, 0, 0, 0),
(22, 50, 1, 0, 0, 0, 0),
(23, 2, 1, 0, 0, 0, 0),
(24, 47, 2, 0, 0, 0, 0),
(25, 55, 0, 1, 1, 0, 0);

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
(47, 'Sarte, Mariella Sophia', 'Buguion, Calumpit, Bulacan', '09669400632', 'mariellasophiasarte@gmail.com', 'Pia', 'PNi8FqYg'),
(48, 'Geronimo, Pamela', 'Meycauayan, Bulacan', '09123567895', 'geronimopamela0204@gmail.com', 'Pamela', 'pam'),
(49, 'Domingo, Jenica', 'Paombong, Bulacan', '09678543271', 'jdomingo0503@gmail.com', 'Jenica', '111'),
(50, 'Michelle Sarte', 'Calumpit, Bulacan', '09751553289', 'sartepia27@gmail.com', 'Michelle', '123'),
(51, 'Mayuyu, Jerivic', 'San Miguel, Bulacan', '09567895432', 'jerivicmayuyu05@gmail.com', 'Jerivic', 'jer'),
(52, 'Cabigting, Alcon', 'Guiguinto, Bulacan', '09786543261', 'alconcheng02@gmail.com', 'Alcon', 'alcon'),
(53, 'Sy, Neithaniel', 'Calumpit, Bulacan', '09876543256', 'neithanielsy@gmail.com', 'Neithan', '1234'),
(56, 'Lazo, Jameson', 'Malolos, Bulacan', '09267865432', 'jamesonlazojr@gmail.com', 'Jameson', 'pia'),
(59, 'Rivera, Andrei', 'Guiguinto, Bulacan', '09678965436', 'andreirivera@gmail.com', 'Drei', '111'),
(63, 'Sy, Irene', 'Malolos, Bulacan', '098765784532', 'irenesy01@gmail.com', 'Irene', 'nene'),
(64, 'Banawa, Ninajoy', 'paombong, bulacan', '09386940251', 'banawa.maninajoy.b.0957@gmail.com', 'nina', 'nina11'),
(65, 'fernandez, nj', 'paombong, bulacan', '09364734644', 'banawa.maninajoy@gmail.com', 'nj', 'nj11'),
(66, 'fernandez, aj', 'paombong, bulacan', '09926354119', 'fernandezaljean05@gmail.com', 'aj', '031122'),
(67, 'mendoza, marites', 'paombong, bulacan', '09383569832', 'nbanawa1111@gmail.com', 'marites', 'lME1!4g&'),
(73, 'Sarte, Ato', 'Purok 1 #0050 Buguion, Calumpit, Bulacan', '09876545632', 'mariellasophiasarte@gmail.com', 'Ato', '111'),
(74, 'Maymay, Jeje', 'Guiguinto, Bulacan', '09876546789', 'jerivicmayuyu05@gmail.com', 'jeje', '111'),
(75, 'Love', 'Hagonoy', '09876654545', 'love@gmail.com', 'love', 'love'),
(76, 'banawa, kwin', 'paombong, bulacan', '09364734644', 'banawakwin15@gmail.com', 'kwin', '1515'),
(77, 'jel', 'san miguel, bulacan', '09897786545', 'jel@gmail.com', 'jel', 'jel'),
(79, 'jer', 'san miguel', '09679139657', 'jer@gmail.com', 'je', 'jer');

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
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;

--
-- AUTO_INCREMENT for table `order_data`
--
ALTER TABLE `order_data`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `product_data`
--
ALTER TABLE `product_data`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rate_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
