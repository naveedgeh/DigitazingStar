-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 03:08 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitizingstar`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Admin', 'admin@digitize.com', 'f865b53623b121fd34ee5426c792e5c33af8c227');

-- --------------------------------------------------------

--
-- Table structure for table `admin_deliver_order`
--

CREATE TABLE `admin_deliver_order` (
  `admin_deliver_id` int(20) NOT NULL,
  `user_name_id` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `workfile` varchar(200) NOT NULL,
  `work_status` varchar(200) NOT NULL DEFAULT 'Not Checked',
  `received_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_deliver_order`
--

INSERT INTO `admin_deliver_order` (`admin_deliver_id`, `user_name_id`, `user_id`, `comment`, `workfile`, `work_status`, `received_date`) VALUES
(19, 'Naveed928', 25, 'pleasess', 'ddd.jpg', 'CHECKED', '2020-08-14 12:21:20'),
(20, 'Naveed928', 25, 'please check order ', 'images.jpg', 'CHECKED', '2020-08-14 12:21:50'),
(21, 'Naveed928', 25, 'pleasess', 'ddd.jpg', 'Not Checked', '2020-08-19 22:17:44'),
(22, 'Naveed928', 25, 'please check order ', 'images.jpg', 'Not Checked', '2020-08-19 22:17:56'),
(23, 'Naveed928', 25, 'please check this order\'s', 'ddd.jpg', 'Not Checked', '2020-08-19 22:31:05'),
(24, 'Naveed928', 25, 'please check this order\'s', 'ddd.jpg', 'Not Checked', '2020-08-19 22:31:19'),
(25, 'Naveed928', 25, 'please check this order\'s', 'ddd.jpg', 'Not Checked', '2020-08-19 22:32:01'),
(26, 'Naveed928', 25, 'please check this order\'s', 'ddd.jpg', 'Not Checked', '2020-08-19 22:32:05'),
(27, 'Naveed928', 25, 'please check this order\'s', 'ddd.jpg', 'Not Checked', '2020-08-24 02:14:59'),
(28, 'Naveed928', 25, 'pleasess', '', 'Not Checked', '2020-08-24 22:27:05'),
(29, 'Naveed928', 25, 'pleasess', '', 'Not Checked', '2020-08-24 22:27:48'),
(30, 'Naveed928', 25, 'pleasess', '', 'Not Checked', '2020-08-24 22:30:29'),
(31, 'Naveed928', 25, 'pleasess', 'workfile586.jpg', 'Not Checked', '2020-08-24 22:41:40'),
(32, 'Naveed928', 25, 'pleasess', 'ddd.jpg', 'Not Checked', '2020-08-24 22:41:54'),
(33, 'Naveed928', 25, 'please check this order\'s', 'ddd.jpg', 'Not Checked', '2020-08-25 22:05:20'),
(34, 'Naveed928', 25, 'please check this order\'s', 'ddd.jpg', 'Not Checked', '2020-08-25 22:05:44'),
(35, 'Naveed928', 25, 'please check this order\'s', 'ddd.jpg', 'Not Checked', '2020-08-25 22:48:00'),
(36, 'Naveed928', 25, 'please check this order\'s', 'ddd.jpg', 'Not Checked', '2020-08-25 22:48:43'),
(37, 'Naveed928', 25, 'please check this order\'s', 'workfile263.jpg', 'Not Checked', '2020-08-25 22:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `admin_invoice`
--

CREATE TABLE `admin_invoice` (
  `admin_invoice_id` int(11) NOT NULL,
  `total_regular_work` int(200) NOT NULL,
  `regular_price` int(200) NOT NULL,
  `total_urgent_work` int(200) NOT NULL,
  `urgent_price` int(200) NOT NULL,
  `total_regular_price` int(200) NOT NULL,
  `total_urgent_price` int(200) NOT NULL,
  `grand_total` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `invoice_number` varchar(200) NOT NULL,
  `invoice_type` varchar(200) NOT NULL,
  `payment_status` varchar(200) NOT NULL DEFAULT 'Unpaid',
  `submittd_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(200) NOT NULL DEFAULT 'Not Send',
  `complex_order` int(200) NOT NULL,
  `complex_price` int(200) NOT NULL,
  `total_complex_price` int(200) NOT NULL,
  `back_logo` int(200) NOT NULL,
  `back_logo_price` int(200) NOT NULL,
  `total_back_logo_price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `commenet_admin`
--

CREATE TABLE `commenet_admin` (
  `comment_id` int(20) NOT NULL,
  `Comments` varchar(2000) NOT NULL,
  `order_idd` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commenet_admin`
--

INSERT INTO `commenet_admin` (`comment_id`, `Comments`, `order_idd`) VALUES
(20, 'please check this order', 156),
(21, '', 157);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `total_regular_work` int(200) NOT NULL,
  `regular_price` int(200) NOT NULL,
  `total_urgent_work` int(200) NOT NULL,
  `urgent_price` int(200) NOT NULL,
  `total_regular_price` int(200) NOT NULL,
  `total_urgent_price` int(200) NOT NULL,
  `grand_total` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `invoice_number` varchar(200) NOT NULL,
  `invoice_type` varchar(200) NOT NULL,
  `payment_status` varchar(200) NOT NULL DEFAULT 'Unpaid',
  `submittd_date` datetime NOT NULL DEFAULT current_timestamp(),
  `complex_order` int(200) NOT NULL,
  `complex_price` int(200) NOT NULL,
  `total_complex_price` int(200) NOT NULL,
  `back_logo` int(200) NOT NULL,
  `back_logo_price` int(200) NOT NULL,
  `total_back_logo_price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_tb`
--

CREATE TABLE `order_tb` (
  `order_id` int(200) NOT NULL,
  `design_name` varchar(70) COLLATE utf8_bin NOT NULL,
  `order_type` varchar(50) COLLATE utf8_bin NOT NULL,
  `required_format` varchar(40) COLLATE utf8_bin NOT NULL,
  `width` int(60) NOT NULL,
  `height` int(60) NOT NULL,
  `measure_type` varchar(40) COLLATE utf8_bin NOT NULL,
  `fabric_type` varchar(90) COLLATE utf8_bin NOT NULL,
  `placement` varchar(100) COLLATE utf8_bin NOT NULL,
  `colors` int(20) NOT NULL,
  `blending` varchar(10) COLLATE utf8_bin NOT NULL,
  `additional_details` varchar(2000) COLLATE utf8_bin NOT NULL,
  `reject` int(11) NOT NULL DEFAULT 0,
  `transfer_status` int(11) NOT NULL DEFAULT 0,
  `technician_id` int(11) NOT NULL DEFAULT 0,
  `statuss` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT 'Pending',
  `image_files` varchar(300) COLLATE utf8_bin NOT NULL,
  `user_id` int(20) NOT NULL,
  `usernameid` varchar(200) COLLATE utf8_bin NOT NULL,
  `urgent_work` varchar(200) COLLATE utf8_bin NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order_tb`
--

INSERT INTO `order_tb` (`order_id`, `design_name`, `order_type`, `required_format`, `width`, `height`, `measure_type`, `fabric_type`, `placement`, `colors`, `blending`, `additional_details`, `reject`, `transfer_status`, `technician_id`, `statuss`, `image_files`, `user_id`, `usernameid`, `urgent_work`, `order_date`) VALUES
(155, 'jon', 'Vectorize', 'eps', 0, 0, 'N/A', 'N/A', 'N/A', 0, 'Yes', 'pleae check', 0, 0, 46, 'Deliver', 'workfile3332.zip', 25, 'Naveed928', 'Yes', '2020-08-13 23:43:12'),
(156, 'nad', 'Vectorize', 'ai', 0, 0, 'N/A', 'N/A', 'N/A', 0, 'Yes', 'pleae check ', 0, 0, 46, 'Deliver', 'workfile1513.jpg', 25, 'Naveed928', 'Yes', '2020-08-13 23:43:52'),
(157, 'logo design', 'Vectorize', 'cdr', 0, 0, 'N/A', 'N/A', 'N/A', 0, 'Yes', 'please check this order', 0, 0, 46, 'Deliver', 'workfile8758.jpg', 25, 'Naveed928', 'Yes', '2020-08-14 12:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

CREATE TABLE `technician_tb` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tech_username` varchar(200) NOT NULL,
  `tech_password` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`id`, `name`, `phone`, `email`, `tech_username`, `tech_password`, `image`, `status`) VALUES
(46, 'Naveed Ahmad', '03074417913', 'naveedgeh@gmail.com', 'tech_naveed', 'tech_naveed', 'tech_naveed.jpg', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `tech_deliver_order`
--

CREATE TABLE `tech_deliver_order` (
  `tech_order_id` int(20) NOT NULL,
  `user_name_id` varchar(200) NOT NULL,
  `user_id` int(20) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `workfile` varchar(2000) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Not Delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tech_deliver_order`
--

INSERT INTO `tech_deliver_order` (`tech_order_id`, `user_name_id`, `user_id`, `comment`, `workfile`, `status`) VALUES
(9, 'Naveed928', 25, 'please check order ', 'images.jpg', 'Deliverd'),
(10, 'Naveed928', 25, 'please check this order\'s', 'ddd.jpg', 'Deliverd'),
(11, 'Naveed928', 25, 'please check this order\'s', 'ddd.jpg', 'Deliverd'),
(12, 'Naveed928', 25, 'pleasess', 'ddd.jpg', 'Deliverd');

-- --------------------------------------------------------

--
-- Table structure for table `user_dowload_status`
--

CREATE TABLE `user_dowload_status` (
  `user_dowload_id` int(20) NOT NULL,
  `user_dowload_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_dowload_status`
--

INSERT INTO `user_dowload_status` (`user_dowload_id`, `user_dowload_status`) VALUES
(1, 'Already Download This File');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `user_id` int(200) NOT NULL,
  `user_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `user_phone` int(15) NOT NULL,
  `user_password` varchar(60) COLLATE utf8_bin NOT NULL,
  `image_path` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `image_path`, `username`) VALUES
(24, 'jon', 'jon@gmail.com', 2147483647, 'jon123456', NULL, 'jon291'),
(25, 'Naveed', 'naveed@gmail.com', 2147483647, 'naveed123', NULL, 'Naveed928'),
(26, 'irfan', 'irfan@gmail.com', 234234, 'naveed123', 'pizza1.jpg', 'irfan20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `admin_deliver_order`
--
ALTER TABLE `admin_deliver_order`
  ADD PRIMARY KEY (`admin_deliver_id`);

--
-- Indexes for table `admin_invoice`
--
ALTER TABLE `admin_invoice`
  ADD PRIMARY KEY (`admin_invoice_id`);

--
-- Indexes for table `commenet_admin`
--
ALTER TABLE `commenet_admin`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `technician_tb`
--
ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tech_deliver_order`
--
ALTER TABLE `tech_deliver_order`
  ADD PRIMARY KEY (`tech_order_id`);

--
-- Indexes for table `user_dowload_status`
--
ALTER TABLE `user_dowload_status`
  ADD PRIMARY KEY (`user_dowload_id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_deliver_order`
--
ALTER TABLE `admin_deliver_order`
  MODIFY `admin_deliver_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `admin_invoice`
--
ALTER TABLE `admin_invoice`
  MODIFY `admin_invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `commenet_admin`
--
ALTER TABLE `commenet_admin`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `order_tb`
--
ALTER TABLE `order_tb`
  MODIFY `order_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `technician_tb`
--
ALTER TABLE `technician_tb`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tech_deliver_order`
--
ALTER TABLE `tech_deliver_order`
  MODIFY `tech_order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_dowload_status`
--
ALTER TABLE `user_dowload_status`
  MODIFY `user_dowload_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
