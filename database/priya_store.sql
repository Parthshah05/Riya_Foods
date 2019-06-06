-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2019 at 02:38 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `priya_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `user_subject` varchar(50) NOT NULL,
  `user_message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`user_id`, `user_name`, `user_email`, `user_subject`, `user_message`) VALUES
(13, 'asdas', 'asd@gmail.com', 'jsjdgosj', 'jsdogspd'),
(14, 'asdas', 'asd@gmail.com', 'jsjdgosj', 'jsdogspd'),
(15, 'asdas', 'asd@gmail.com', 'jsjdgosj', 'jsdogspd'),
(16, 'asdas', 'asd@gmail.com', 'jsjdgosj', 'jsdogspd'),
(17, 'asdas', 'asd@gmail.com', 'jsjdgosj', 'jsdogspd'),
(18, 'asdas', 'asd@gmail.com', 'jsjdgosj', 'jsdogspd'),
(19, 'asdas', 'asd@gmail.com', 'jsjdgosj', 'jsdogspd'),
(20, 'asdas', 'asd@gmail.com', 'jsjdgosj', 'jsdogspd'),
(21, 'asdas', 'asd@gmail.com', 'jsjdgosj', 'jsdogspd'),
(22, 'asdas', 'asd@gmail.com', 'jsjdgosj', 'jsdogspd'),
(23, 'asdas', 'asd@gmail.com', 'jsjdgosj', 'jsdogspd');

-- --------------------------------------------------------

--
-- Table structure for table `kart_product`
--

CREATE TABLE `kart_product` (
  `kart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kart_tbl`
--

CREATE TABLE `kart_tbl` (
  `kart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kart_tbl`
--

INSERT INTO `kart_tbl` (`kart_id`, `user_id`) VALUES
(0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `past_order_tbl`
--

CREATE TABLE `past_order_tbl` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

CREATE TABLE `product_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`cat_id`, `cat_name`) VALUES
(1, 'Sweet'),
(2, 'Snacks');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `fk_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `product_name`, `product_desc`, `fk_cat_id`) VALUES
(1, 'Green Chutney', '', 2),
(2, 'Hot Rice', '', 2),
(3, 'Meetha Paan', '', 1),
(4, 'Naan', '', 2),
(5, 'Paneer', '', 2),
(6, 'Aloo Paratha', '', 2),
(7, 'Aloo Bonda', '', 2),
(8, 'Aloo Tikki', '', 2),
(9, 'Aloo Tokri', '', 2),
(10, 'Amritsari Tikki', '', 2),
(11, 'Asparagus & Corn Samosa', '', 2),
(12, 'Bhel Mix', '', 2),
(13, 'Boondi Raita', '', 2),
(14, 'Chakri', '', 2),
(15, 'Chana Daal', '', 2),
(16, 'Chicken Samosa', '', 2),
(17, 'Cocktail Samosa', '', 2),
(18, 'Corn Roll', '', 2),
(19, 'Daal Bhajiya', '', 2),
(20, 'Daal Chawal Roll', '', 2),
(21, 'Daal Kachori', '', 2),
(22, 'Dahi Bhalla', '', 2),
(23, 'Dahi Pakori', '', 2),
(24, 'Dhokla', '', 2),
(25, 'Dry Peas', '', 2),
(26, 'Fafda', '', 2),
(27, 'Gobi Paratha', '', 2),
(28, 'Goal Gappa', '', 2),
(29, 'Green Peas Samosa', '', 2),
(30, 'Gullafi Roll', '', 2),
(31, 'Guller Kebab', '', 2),
(32, 'Hara Bhara Kebab', '', 2),
(33, 'Khandvi', '', 2),
(34, 'Lachha Paratha', '', 2),
(35, 'Lachha Tokri', '', 2),
(36, 'Lamb Samosa', '', 2),
(37, 'Lilva Kachori', '', 2),
(38, 'Masala Boondi', '', 2),
(39, 'Masala Paratha', '', 2),
(40, 'Matar Kachori', '', 2),
(41, 'Mathiya', '', 2),
(42, 'Meat Samosa', '', 2),
(43, 'Methi Gota', '', 2),
(44, 'Methi Papadi', '', 2),
(45, 'Mix Bhajiya', '', 2),
(46, 'Mooli Paratha', '', 2),
(47, 'Moong Daal', '', 2),
(48, 'Mamra', '', 2),
(49, 'Nimki', '', 2),
(50, 'Nylon Sev', '', 2),
(51, 'Onion Bhajiyas', '', 2),
(52, 'Onion Kachori', '', 2),
(53, 'Palak Paratha', '', 2),
(54, 'Paneer Kachori', '', 2),
(55, 'Paneer Samosa', '', 2),
(56, 'Patra', '', 2),
(57, 'Plain Paratha', '', 2),
(58, 'Punjabi Samosa', '', 2),
(59, 'Punjabi V Samosa', '', 2),
(60, 'Raj Kachori', '', 2),
(61, 'Small Kala Jamun', '', 2),
(62, 'Sundry Sales', '', 2),
(63, 'Tamarind Chutney', '', 2),
(64, 'Tawa Roti', '', 2),
(65, 'Thepla', '', 2),
(66, 'Trikoni Paratha', '', 2),
(67, 'Trikoni Paratha', '', 2),
(68, 'Veg Roll', '', 2),
(69, 'Zill Mill Tikki', '', 2),
(70, 'Spicy Rig', '', 2),
(71, 'Angoori Rasmalai', '', 1),
(72, 'Anjeer Barfi', '', 1),
(73, 'Baby Boondi Jamun', '', 1),
(74, 'Badaam Barfi', '', 1),
(75, 'Balusai', '', 1),
(76, 'Beet Root Halwa', '', 1),
(77, 'Besan Laddo', '', 1),
(78, 'Boondi', '', 1),
(79, 'Boondi Laddo', '', 1),
(80, 'Carrot Halawa', '', 1),
(81, 'Chenna Kheer', '', 1),
(82, 'Chenna Murgi', '', 1),
(83, 'Chenna Sandwich', '', 1),
(84, 'Chocalate Barfi', '', 1),
(85, 'Chum Chum', '', 1),
(86, 'Chum Chum Stuffed', '', 1),
(87, 'Dudhi Halwa', '', 1),
(88, 'Ghewar', '', 1),
(89, 'Gujiya', '', 1),
(90, 'Gulab Jamun', '', 1),
(91, 'Gulab Jamun Stuffed', '', 1),
(92, 'Habshi Halwa', '', 1),
(93, 'Jalebi', '', 1),
(94, 'Kaju Katri', '', 1),
(95, 'Kaju Roll', '', 1),
(96, 'Kala Jamun', '', 1),
(97, 'Kala Jamun Stuffed', '', 1),
(98, 'Kalakand', '', 1),
(99, 'Khoya', '', 1),
(100, 'Kulfi', '', 1),
(101, 'Malai Ladoo', '', 1),
(102, 'Malpua', '', 1),
(103, 'Milk Cake', '', 1),
(104, 'Mohan Thaal', '', 1),
(105, 'Moong Daal Halwa', '', 1),
(106, 'Paisham', '', 1),
(107, 'Peda', '', 1),
(108, 'Pista Barfi', '', 1),
(109, 'Rabdi', '', 1),
(110, 'Rajbhog', '', 1),
(111, 'Ras Malai', '', 1),
(112, 'Rasgulla', '', 1),
(113, 'Saundesh', '', 1),
(114, 'Shakker Para', '', 1),
(115, 'Small Gulab Jamun', '', 1),
(116, 'Small Rasgulla', '', 1),
(117, 'Sooji Halwa', '', 1),
(118, 'Soon Papdi', '', 1),
(119, 'Walnut Halwa', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_company_name` varchar(50) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_otp` varchar(11) NOT NULL,
  `otp_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsVerified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `user_email`, `user_name`, `user_company_name`, `user_contact`, `user_password`, `user_otp`, `otp_timestamp`, `IsVerified`) VALUES
(5, 'mdshah9574@gmail.com', 'Malav Shah', 'Fintech Global', '12235545', 'bWFsYXY=', '394b538e44c', '2019-06-04 06:48:31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `kart_tbl`
--
ALTER TABLE `kart_tbl`
  ADD PRIMARY KEY (`kart_id`);

--
-- Indexes for table `past_order_tbl`
--
ALTER TABLE `past_order_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_cat`
--
ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `past_order_tbl`
--
ALTER TABLE `past_order_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_cat`
--
ALTER TABLE `product_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
