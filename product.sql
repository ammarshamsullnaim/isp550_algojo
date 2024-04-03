-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 12:29 PM
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
(0, 'Grilled Salmon with Lemon Butt', 'Freshly grilled salmon fillet served with a tangy ', 10, 1),
(1, 'Cappuccino', 'A classic espresso-based coffee topped with steame', 12.5, 2),
(2, 'Spaghetti Bolognese', 'Classic Italian pasta dish with a hearty meat sauc', 12, 1),
(3, 'Matcha Latte', 'A delightful blend of high-quality matcha powder a', 9.9, 2),
(4, 'Chicken Alfredo Pasta', 'Creamy pasta dish with grilled chicken, mushrooms,', 16, 1),
(5, 'Chocolate Brownie Sundae', 'Warm chocolate brownie topped with vanilla ice cre', 14.5, 2),
(7, 'Caesar Wrap', 'A delicious wrap filled with grilled chicken, cris', 10, 1),
(8, 'Chicken Caesar Salad', 'Grilled chicken breast served on a bed of fresh ro', 18, 1),
(9, 'Margherita Pizza', 'Traditional Italian pizza topped with fresh tomato', 22.5, 1),
(10, 'Chocolate Brownie Sundae', 'Warm chocolate brownie topped with vanilla ice cre', 14.5, 2),
(11, 'Vanilla Ice Cream', 'Classic creamy vanilla ice cream.', 8, 3),
(12, 'Chocolate Ice Cream', 'Rich and indulgent chocolate-flavored ice cream.', 8, 3),
(13, 'Strawberry Ice Cream', 'Sweet and fruity strawberry-flavored ice cream.', 8, 3),
(14, 'Mint Chocolate Chip Ice Cream', 'Refreshing mint ice cream with chocolate chips.', 8, 3),
(15, 'Cookies and Cream Ice Cream', 'Creamy vanilla ice cream loaded with chunks of cho', 8, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category_id` (`category_id`);

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
