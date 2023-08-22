-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 12:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(25) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_price` varchar(30) NOT NULL,
  `user_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `total_amount` varchar(25) NOT NULL,
  `paymentMethod` text NOT NULL,
  `time` varchar(25) NOT NULL,
  `status` int(3) NOT NULL,
  `user_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `first_name`, `last_name`, `email`, `address`, `phone_number`, `product_name`, `total_amount`, `paymentMethod`, `time`, `status`, `user_id`) VALUES
(36, 'Ayesha', 'Sohail', 'user@gmail.com', 'RWP', '00000000000', 'L-EK-0201042- FORMAL SANDAL,', '3199', 'COD', '2023-08-15 13:43:32', 1, 2),
(38, 'Asif', 'Iqbal', 'user@gmail.com', 'LHR', '00000000000', 'M-MV-0200439-LEATHER FORMALS,', '7999', 'COD', '2023-07-15 13:44:53', 0, 2),
(39, 'Ayeza ', 'Kashif', 'user@gmail.com', 'BWN', '00000000000', 'G-GR-0400106-COMFORTABLE OPEN,', '1599', 'COD', '2023-07-15 13:45:52', 1, 2),
(40, 'Ayesha', 'Yasir', 'user@gmail.com', 'RWP', '00000000000', 'L-EK-0201036- FORMAL SANDAL,', '2239', 'COD', '2023-06-15 13:46:37', 1, 2),
(41, 'Afroz', 'Kashif', 'user@gmail.com', 'BWN', '00000000000', 'B-YT-0100035-COMFORTABLE CLOSE,', '3299', 'COD', '2023-06-15 13:47:28', 0, 2),
(42, 'Ummara', 'Iqbal', 'user@gmail.com', 'ICT', '00000000000', 'L-EK-0201041-FORMAL SANDAL,', '2999', 'COD', '2023-05-16 13:48:15', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_pic` varchar(35) NOT NULL,
  `pro_size` varchar(30) NOT NULL,
  `pro_price` varchar(15) NOT NULL,
  `sold` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `subCat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_pic`, `pro_size`, `pro_price`, `sold`, `status`, `subCat_id`) VALUES
(16, 'M-DC-0200004-LEATHER SHOES', 'M-DC-0200004_645.png', '40,41,42,43,44,45', '5499', 0, 'available', 91),
(17, 'M-LF-0200366-LEATHER SHOES', 'M-LF-0200366_3.png', '40,41,42,43,44,45', '7499', 0, 'upcoming', 91),
(18, 'M-LF-0200353-LEATHER SHOES', 'M-LF-0200353_4.png', '40,41,42,43,44,45', '3999', 0, 'available', 91),
(19, 'M-LF-0200365-LEATHER SHOES', 'M-LF-0200365_7.png', '40,41,42,43,44,45', '5999', 0, 'available', 91),
(20, 'M-LF-0200351-LEATHER SHOES', 'M-LF-0200351_7.png', '40,41,42,43,44,45', '3999', 0, 'available', 91),
(21, 'M-DC-0200020-LEATHER SHOES', 'M-DC-0200020_2.png', '40,41,42,43,44,45', '3499', 0, 'available', 91),
(22, 'M-DC-0200009-LEATHER SHOES', 'M-DC-0200009_8.png', '40,41,42,43,44,45', '3999', 0, 'available', 91),
(23, 'M-SR-0200002-TRENDY FORMALS', 'M-SR-0200002_4.png', '40,41,42,43,44', '2999', 0, 'upcoming', 91),
(24, 'M-MV-0200438-LEATHER FORMALS', 'M-MV-0200438_6.png', '41,42,43,44,45', '7999', 0, 'available', 91),
(25, 'M-MV-0200439-LEATHER FORMALS', 'M-MV-0200439_6.png', '41,42,43,44,45', '7999', 0, 'available', 91),
(26, 'M-SR-0200007-COMFORTABLE MOCS', 'M-SR-0200007_4.webp', '6,7,8,9,10', '659', 0, 'available', 90),
(27, 'M-SR-0200006-COMFORTABLE MOCS', 'M-SR-0200006_8.png', '6,7,8,9,10', '659', 0, 'available', 90),
(28, 'M-MV-0200466-COMFORTABLE MOCS', 'M-MV-0200466_3.png', '39,40,41,42,43,44', '2499', 0, 'available', 90),
(29, 'M-MV-0200177-MEN CASUAL', '08_de9c3bd4.png', '40/06,41/07,42/08,43/09,44/10,', '6499', 0, 'available', 90),
(30, 'M-DC-0200011-COMFORTABLE MOCS', 'M-DC-0200011_4.png', '7,8,9,10', '1999', 0, 'available', 90),
(31, 'M-MV-0200393-COMFORTABLE MOCS', 'M-MV-0200393_3.png', '41,42,43,44', '6499', 0, 'available', 90),
(32, 'M-MV-0200184-MEN MOCCS', 'M-MV-0200184_3.png', '40,41,42,43,44,45', '4999', 0, 'available', 90),
(33, 'M-MV-0200392-COMFORTABLE MOCS', 'M-MV-0200392_2.png', '40,41,42,43,44,45,46', '6499', 0, 'upcoming', 90),
(34, 'M-MV-0200457-COMFORTABLE MOCS', 'M-MV-0200457a_1.png', '40,41,42,43,44,45,46', '5499', 0, 'available', 90),
(35, 'M-MV-0200459-COMFORTABLE MOCS', 'M-MV-0200459_2.png', '40,41,42,43,44,45,46', '2999', 0, 'available', 90),
(36, 'L-AC-0100048-WOMEN AHTLEISURE', '0100048_3.png', '36,37,38,39,40,41', '3299', 0, 'available', 98),
(37, 'L-AC-0100036-WOMEN AHTLEISURE', 'L-AC-0100019_4.png', '36,37,38,39,40,41', '5999', 0, 'available', 98),
(38, 'L-AC-0100044-WOMEN AHTLEISURE', 'L-AC-0100044a_5.png', '36,37,38,39,40,41', '2799', 0, 'available', 98),
(39, 'L-AC-0100048-WOMEN AHTLEISURE', 'L-AC-0100048_2.png', '36,37,38,39,40,41', '3299', 0, 'available', 98),
(40, 'L-AC-0100043-WOMEN AHTLEISURE', 'L-AC-0100043_3.png', '36,37,38,39,40,41', '2659', 0, 'available', 98),
(41, 'L-AC-0100041-WOMEN AHTLEISURE', 'L-AC-0100041_9.png', '36,37,38,39,40,41', '2799', 0, 'available', 98),
(42, 'L-AC-0100049-WOMEN ATHLEISURE', 'L-AC-0100049_2.png', '36,37,38,39,40,41', '3299', 0, 'upcoming', 98),
(43, 'L-AC-0100040-WOMEN AHTLEISURE', 'L-AC-0100040_3.png', '36,37,38,39,40,41', '2799', 0, 'available', 98),
(44, 'L-AC-0100037- RUNNERS', 'L-AC-0100037Pink-38.png', '36,37,38,39,40,41', '5999', 0, 'available', 98),
(45, 'L-AC-0100019-WOMEN ATHLEISURE', 'L-AC-0100019_4.png', '36,37,38,39,40,41', '2639', 0, 'available', 98),
(46, 'L-EK-0201041-FORMAL SANDAL', 'L-EK0201041.png', '36,37,38,39,40,41', '2999', 0, 'available', 99),
(47, 'L-EK-0201042- FORMAL SANDAL', 'L-EK0201042.png', '36,37,38,39,40,41', '3199', 1, 'upcoming', 99),
(48, 'L-EK-0201043- FORMAL SANDAL', 'L-EK-0201042Grey.png', '36,37,38,39,40,41', '3199', 0, 'available', 99),
(49, 'L-EK-0201039- FORMAL SANDAL', 'L-EK-0201039LPINK.png', '36,37,38,39,40,41', '2449', 0, 'available', 99),
(50, 'L-EK-0201036- FORMAL SANDAL', 'L-EL-0201036GRY.png', '36,37,38,39,40,41', '2239', 1, 'available', 99),
(51, 'L-EK-0201020-FORMAL SANDAL', 'L-EK-0201022Black.png', '36,37,38,39,40,41', '2999', 0, 'available', 99),
(52, 'L-EK-0201022-FORMAL SANDAL', 'L-EK-0201022Black.png', '36,37,38,39,40,41', '2099', 0, 'available', 99),
(53, 'L-EK-0201019-FORMAL SANDAL', 'L-EK-0201019.png', '36,37,38,39,40,41', '1999', 0, 'available', 99),
(54, 'L-EK-0201032-WOMEN HEELS', '11_12cd.png', '36,37,38,39,40,41', '2249', 0, 'available', 99),
(55, 'L-EK-0201016-WOMEN CHAPPAL', 'L-EK-0201016_3.png', '36,37,38,39,40,41', '1099', 0, 'available', 99),
(56, 'B-BO-0400124-KIDS SANDAL', 'B-BO-0400124_2.png', '31,32,33,34,35,36', '2639', 0, 'available', 93),
(57, 'B-BO-0300136-KIDS CHAPPAL', 'B-BO-0300136_4.png', '1,11,12,13', '959', 0, 'upcoming', 93),
(58, 'B-CH-0400099-COMFORTABLE OPEN', 'B-CH-0400099_4.png', '25,26,27,28,29,30', '2399', 0, 'available', 93),
(59, 'B-CH-0300022-COMFORTABLE OPEN', 'B-BO-0300022_5.png', '24,25,26,27,28,29', '1279', 0, 'available', 93),
(60, 'COMFORTABLE OPEN SHOES', 'B-BO-0300115_2_.png', '2,3,4,5', '449', 0, 'available', 93),
(61, 'B-BO-0350024-COMFORTABLE OPEN', 'B-BO-0350024_3.png', '1,13', '799', 0, 'available', 93),
(62, 'B-YT-0400090-COMFORTABLE OPEN', 'B-BO-0400090_3.png', '2,3,4,5', '1039', 0, 'upcoming', 93),
(63, 'B-BO-0400076-COMFORTABLE OPEN', 'B-BO-0400076_3.png', '1,11,12,13', '509', 0, 'available', 93),
(64, 'B-YT-0100035-COMFORTABLE CLOSE ', 'B-YT-0100035_2.png', '35,36,37,38', '3299', 0, 'available', 93),
(65, 'B-IN-0500024-COMFORTABLE CLOSE ', 'B-IN-0500024_3.png', '2,3,4,5', '1599', 0, 'available', 93),
(66, 'G-GR-0400116-COMFORTABLE CLOSE', 'G-GR-0400116_2.png', '30,31,32,33,34', '509', 0, 'upcoming', 92),
(67, 'G-GR-0400108-COMFORTABLE OPEN', 'G-GR-0400108s.png', '31,32,33,34,35,36', '1599', 0, 'available', 92),
(68, 'G-GR-0400106-COMFORTABLE OPEN', 'G-CH-0400106_9.png', '31,32,33,34,35,36', '1599', 1, 'available', 92),
(69, 'G-GR-0300091-COMFORTABLE OPEN', 'G-GR-0300091_3 (1).png', '30,31,32,33,34,35', '1119', 0, 'upcoming', 92),
(70, 'G-CH-0300082-COMFORTABLE OPEN', '01_10f3f3ce.png', '24,25,26,27,28,29', '1119', 0, 'available', 92),
(71, 'G-GR-0100029-COMFORTABLE SHOES', '0100029_1.png', '32,34,35', '1699', 0, 'available', 92),
(72, 'B-IN-0500025-COMFORTABLE SHOES', '0500025_3.png', '2,3,4', '1399', 0, 'upcoming', 92),
(73, 'B-CH-0100096-COMFORTABLE SHOES', '0100096_4.png', '25,26,27,28,29,30', '2799', 0, 'available', 92),
(74, 'G-GR-0500130-COMFORTABLE CLOSE SHOES', 'G-CH-0500130_6.png', '30,31,32,33,34,35,36', '1499', 0, 'available', 92),
(75, 'G-GR-0100046-COMFORTABLE CLOSE SHOES', 'B-CH-0100046_4.png', '31,32,33,34,35,36', '2499', 0, 'available', 92);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subCat_id` int(11) NOT NULL,
  `subCat_name` text NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subCat_id`, `subCat_name`, `cat_id`) VALUES
(90, 'casual(men)', 1),
(91, 'formal', 1),
(92, 'girls', 3),
(93, 'boys', 3),
(98, 'casual(women)', 2),
(99, 'party(women)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `password` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email`, `contact`, `role`) VALUES
(2, 'user', 123, 'user@gmail.com', '0000000000', 'user'),
(3, 'admin', 123, 'admin@gmail.com', '0000000000', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `subCat_id` (`subCat_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subCat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subCat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`subCat_id`) REFERENCES `subcategory` (`subCat_id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
