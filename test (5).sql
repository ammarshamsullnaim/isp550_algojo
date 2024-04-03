-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 03:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'meal', 'heavy meal'),
(2, 'drink', 'any drink');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuID` varchar(4) NOT NULL,
  `menuItem` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menudetails`
--

CREATE TABLE `menudetails` (
  `menuDetailsID` varchar(4) NOT NULL,
  `category` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(6) NOT NULL,
  `orderDate` date NOT NULL,
  `statusOrder` varchar(10) NOT NULL,
  `total` float NOT NULL,
  `paymentMethod` varchar(10) NOT NULL,
  `amountPaid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderDate`, `statusOrder`, `total`, `paymentMethod`, `amountPaid`) VALUES
(2, '2023-07-08', 'Preparing', 111, '', 0),
(3, '2023-07-09', 'Pending', 0, '', 0),
(4, '2023-07-13', 'Pending', 0, '', 0),
(5, '2023-07-13', 'Pending', 0, '', 0),
(6, '2023-07-13', 'Pending', 0, '', 0),
(7, '2023-07-13', 'Pending', 0, '', 0),
(8, '2023-07-13', 'Pending', 38, '', 0),
(9, '2023-07-14', 'Pending', 120, '', 0),
(10, '2023-07-14', 'Pending', 120, '', 0),
(11, '2023-07-14', 'Pending', 10, '', 0),
(12, '2023-07-14', 'Pending', 120, '', 0),
(13, '2023-07-14', 'Pending', 120, '', 0),
(14, '2023-07-14', 'Pending', 120, '', 0),
(15, '2023-07-14', 'Pending', 120, '', 0),
(16, '2023-07-14', 'Pending', 30, '', 0),
(17, '2023-07-14', 'Pending', 30, '', 0),
(18, '2023-07-14', 'Pending', 30, '', 0),
(19, '2023-07-14', 'Pending', 30, '', 0),
(20, '2023-07-14', 'Pending', 30, '', 0),
(21, '2023-07-14', 'Pending', 70, '', 0),
(22, '2023-07-14', 'Pending', 70, '', 0),
(23, '2023-07-14', 'Pending', 30, '', 0),
(24, '2023-07-14', 'Pending', 30, '', 0),
(25, '2023-07-14', 'Pending', 30, '', 0),
(26, '2023-07-14', 'Pending', 30, '', 0),
(27, '2023-07-14', 'Pending', 30, '', 0),
(28, '2023-07-14', 'Pending', 20, '', 0),
(29, '2023-07-14', 'Pending', 20, '', 0),
(30, '2023-07-14', 'Pending', 70, '', 0),
(31, '2023-07-14', 'Pending', 70, '', 0),
(32, '2023-07-14', 'Pending', 30, '', 0),
(33, '2023-07-14', 'Pending', 30, '', 0),
(34, '2023-07-14', 'Pending', 30, '', 0),
(35, '2023-07-14', 'Pending', 0, '', 0),
(36, '2023-07-14', 'Pending', 30, '', 0),
(37, '2023-07-14', 'Pending', 0, '', 0),
(38, '2023-07-14', 'Pending', 30, '', 0),
(39, '2023-07-14', 'Pending', 30, '', 0),
(40, '2023-07-14', 'Pending', 30, '', 0),
(41, '2023-07-14', 'Pending', 30, '', 0),
(42, '2023-07-14', 'Pending', 30, '', 0),
(151, '2023-07-14', 'Pending', 0, '', 0),
(152, '2023-07-14', 'Pending', 0, '', 0),
(153, '2023-07-14', 'Pending', 56, '', 0),
(154, '2023-07-14', 'Pending', 50, '', 0),
(155, '2023-07-14', 'Pending', 50, '', 0),
(156, '2023-07-14', 'Pending', 50, '', 0),
(157, '2023-07-14', 'Pending', 30, '', 50),
(158, '2023-07-14', 'Pending', 30, '', 50),
(159, '2023-07-14', 'Pending', 30, '', 50),
(160, '2023-07-14', 'Pending', 38, '', 50),
(161, '2023-07-14', 'Pending', 30, '', 50),
(162, '2023-07-14', 'Pending', 30, '', 50),
(163, '2023-07-14', 'Pending', 30, '', 50),
(164, '2023-07-14', 'Pending', 50, '', 100),
(165, '2023-07-14', 'Pending', 50, '', 100),
(166, '2023-07-14', 'Pending', 30, '', 50);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(4) NOT NULL,
  `order_id` int(4) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `price`, `amount`) VALUES
(1, 0, '0', 13, 10, 130),
(2, 0, '2', 2, 10, 20),
(3, 0, '0', 2, 10, 20),
(4, 0, '2', 4, 10, 40),
(5, 0, '2', 2, 10, 20),
(6, 0, '3', 2, 2, 4),
(8, 5, '0', 1, 10, 10),
(9, 7, '2', 1, 10, 10),
(10, 7, '0', 3, 10, 30),
(11, 0, '2', 1, 10, 10),
(12, 0, '3', 15, 2, 30),
(13, 8, '0', 1, 10, 10),
(14, 8, '3', 14, 2, 28),
(15, 9, '0', 12, 10, 120),
(16, 10, '0', 12, 10, 120),
(17, 11, '0', 1, 10, 10),
(18, 12, '0', 12, 10, 120),
(19, 13, '0', 12, 10, 120),
(20, 14, '0', 12, 10, 120),
(21, 15, '2', 12, 10, 120),
(22, 16, '2', 3, 10, 30),
(23, 17, '0', 3, 10, 30),
(24, 18, '0', 3, 10, 30),
(25, 19, '0', 3, 10, 30),
(26, 20, '0', 3, 10, 30),
(27, 21, '2', 3, 10, 30),
(28, 21, '2', 4, 10, 40),
(29, 22, '2', 3, 10, 30),
(30, 22, '2', 4, 10, 40),
(31, 23, '2', 3, 10, 30),
(32, 24, '2', 3, 10, 30),
(33, 25, '2', 3, 10, 30),
(34, 26, '2', 3, 10, 30),
(35, 27, '2', 3, 10, 30),
(86, 28, '0', 2, 10, 20),
(87, 29, '0', 2, 10, 20),
(88, 30, '0', 3, 10, 30),
(89, 30, '2', 4, 10, 40),
(90, 31, '0', 3, 10, 30),
(91, 31, '2', 4, 10, 40),
(92, 32, '0', 3, 10, 30),
(93, 33, '2', 3, 10, 30),
(94, 34, '2', 3, 10, 30),
(95, 36, '2', 3, 10, 30),
(96, 38, '2', 3, 10, 30),
(97, 39, '2', 3, 10, 30),
(98, 40, '2', 3, 10, 30),
(99, 41, '2', 3, 10, 30),
(100, 42, '2', 3, 10, 30),
(101, 0, '2', 3, 10, 30),
(102, 0, '2', 3, 10, 30),
(103, 153, '2', 5, 10, 50),
(104, 153, '3', 3, 2, 6),
(105, 154, '2', 5, 10, 50),
(106, 155, '2', 5, 10, 50),
(107, 156, '2', 5, 10, 50),
(108, 157, '0', 3, 10, 30),
(109, 158, '0', 3, 10, 30),
(110, 159, '0', 3, 10, 30),
(111, 160, '2', 3, 10, 30),
(112, 160, '3', 4, 2, 8),
(113, 161, '2', 3, 10, 30),
(114, 162, '2', 3, 10, 30),
(115, 163, '2', 3, 10, 30),
(116, 164, '7', 5, 10, 50),
(117, 165, '7', 5, 10, 50),
(118, 166, '0', 3, 10, 30);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` varchar(4) NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentMethod` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `category_id`) VALUES
(0, 'nasi', 'nasi sahaja', 10, 1),
(2, 'nasi hijau', 'nasi warna hijau', 10, 1),
(3, 'air kosong', 'air', 2, 2),
(7, 'nasi putih 1', 'nasi putih', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `receiptid`
--

CREATE TABLE `receiptid` (
  `receiptID` varchar(4) NOT NULL,
  `orderID` varchar(4) NOT NULL,
  `paymentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `ic` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`name`, `email`, `username`, `password`, `ic`, `address`, `tel_no`) VALUES
('Ali bin abu', 'ali@gmail.com', '0001', 'ali', '0041923122', 'arau, perlis', '999'),
('admin', 'admin', 'admin', '123', '12312', '1231', '123123'),
('Muhammad haznor haqiff bin hamam', 'haznor97@gmail.com', 'anor', '123123', '123', 'A-8-1 pangsapuri kos rendah', '0122251127'),
('muaz', 'muaz@gmail.com', 'muaz', '123', '011030103023', 'kuala lumpur', '01211112222');

-- --------------------------------------------------------

--
-- Table structure for table `vehicletable`
--

CREATE TABLE `vehicletable` (
  `plateNo` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `modelName` varchar(20) NOT NULL,
  `yearMade` int(20) NOT NULL,
  `regDate` varchar(20) NOT NULL,
  `mileage` int(20) NOT NULL,
  `condition` varchar(20) NOT NULL,
  `transmission` varchar(20) NOT NULL,
  `horsePower` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicletable`
--

INSERT INTO `vehicletable` (`plateNo`, `brand`, `modelName`, `yearMade`, `regDate`, `mileage`, `condition`, `transmission`, `horsePower`) VALUES
('BFD7500', 'Proton', 'Perdana', 2010, '8/9/2010', 14000, 'Used Car', 'Automatic', 1.6),
('VFQ2521', 'Perodua', 'AXIA', 2022, '9/2/2022', 23000, 'New Car', 'Automatic', 1.5),
('VJN2159', 'Honda', 'CRV', 2021, '9/4/2022', 15000, 'Used Car', 'Automatic', 1.8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuID`);

--
-- Indexes for table `menudetails`
--
ALTER TABLE `menudetails`
  ADD PRIMARY KEY (`menuDetailsID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category_id` (`category_id`);

--
-- Indexes for table `receiptid`
--
ALTER TABLE `receiptid`
  ADD PRIMARY KEY (`receiptID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `vehicletable`
--
ALTER TABLE `vehicletable`
  ADD PRIMARY KEY (`plateNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `id_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
