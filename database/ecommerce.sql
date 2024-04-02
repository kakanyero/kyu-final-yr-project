-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 05:12 PM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartItemId` int(7) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` int(50) NOT NULL,
  `numberOfItems` int(10) NOT NULL,
  `totalCost` int(50) NOT NULL,
  `sizeSelected` varchar(50) NOT NULL,
  `dateAdded` date NOT NULL,
  `productId` int(50) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartItemId`, `productName`, `productPrice`, `numberOfItems`, `totalCost`, `sizeSelected`, `dateAdded`, `productId`, `location`) VALUES
(5, 'Abstract Print Shirt', 50, 3, 50, 'Select Size', '2024-03-31', 1, ''),
(13, 'FLORAL PRINT SHIRT', 100, 1, 100, 'XL', '2024-04-01', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(7) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productLabel` varchar(100) NOT NULL,
  `productPrice` int(100) NOT NULL,
  `productCategory` varchar(100) NOT NULL,
  `productSize` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `arrival_time` varchar(50) NOT NULL DEFAULT 'New',
  `productDetails` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `productLabel`, `productPrice`, `productCategory`, `productSize`, `img`, `arrival_time`, `productDetails`) VALUES
(1, 'Abstract Print Shirt', 'Zara', 50, 'Men', 'X', 'f1.jpg', 'Old', 'The Gildan Ultra Cotton Shirt is made from a substontial 6.0 oz. per\n        sq. yd. fabric constructed from 100% cotton. This classic fit\n        preshrunk jersey knit provides unmatched comfort with each wear.\n        Featuring a toped neck and shoulder, and a seemless double-needle\n        collar, and available in a range of colors, it offers it all in the\n        ultimate head- turning package.'),
(2, 'Pinted Strechy Shirt', 'Gucci', 70, 'Men', 'S', 'f2.jpg', 'New', 'The Gildan Ultra Cotton Shirt is made from a substontial 6.0 oz. per\n        sq. yd. fabric constructed from 100% cotton. This classic fit\n        preshrunk jersey knit provides unmatched comfort with each wear.\n        Featuring a toped neck and shoulder, and a seemless double-needle\n        collar, and available in a range of colors, it offers it all in the\n        ultimate head- turning package.'),
(3, 'Women Summer Top', 'D&G', 29, 'Ladies', 'XL', 'f8.jpg', 'Old', 'The Gildan Ultra Cotton Shirt is made from a substontial 6.0 oz. per\n        sq. yd. fabric constructed from 100% cotton. This classic fit\n        preshrunk jersey knit provides unmatched comfort with each wear.\n        Featuring a toped neck and shoulder, and a seemless double-needle\n        collar, and available in a range of colors, it offers it all in the\n        ultimate head- turning package.'),
(4, 'Wide Linen-blend Trouser', 'H&M', 80, 'Ladies', 'XXL', 'f7.jpg', 'New', 'The Gildan Ultra Cotton Shirt is made from a substontial 6.0 oz. per\n        sq. yd. fabric constructed from 100% cotton. This classic fit\n        preshrunk jersey knit provides unmatched comfort with each wear.\n        Featuring a toped neck and shoulder, and a seemless double-needle\n        collar, and available in a range of colors, it offers it all in the\n        ultimate head- turning package.'),
(5, 'FLORAL PRINT SHIRT', 'Zara', 100, 'Men', 'X', 'f5.jpg', 'Old', 'The Gildan Ultra Cotton Shirt is made from a substontial 6.0 oz. per\n        sq. yd. fabric constructed from 100% cotton. This classic fit\n        preshrunk jersey knit provides unmatched comfort with each wear.\n        Featuring a toped neck and shoulder, and a seemless double-needle\n        collar, and available in a range of colors, it offers it all in the\n        ultimate head- turning package.'),
(6, 'FINE CORDUROY SHIRT', 'Polo', 50, 'Women', 'L', 'f6.jpg', 'New', 'The Gildan Ultra Cotton Shirt is made from a substontial 6.0 oz. per\n        sq. yd. fabric constructed from 100% cotton. This classic fit\n        preshrunk jersey knit provides unmatched comfort with each wear.\n        Featuring a toped neck and shoulder, and a seemless double-needle\n        collar, and available in a range of colors, it offers it all in the\n        ultimate head- turning package.'),
(7, 'Classic Sleeved Shirt', 'Vans', 120, 'Women', 'XL', 'n2.jpg', 'New', 'The Gildan Ultra Cotton Shirt is made from a substontial 6.0 oz. per\n        sq. yd. fabric constructed from 100% cotton. This classic fit\n        preshrunk jersey knit provides unmatched comfort with each wear.\n        Featuring a toped neck and shoulder, and a seemless double-needle\n        collar, and available in a range of colors, it offers it all in the\n        ultimate head- turning package.'),
(8, 'Classic Casual Shirt', 'Vans', 120, 'Men', 'L', 'f3.jpg', 'Old', 'The Gildan Ultra Cotton Shirt is made from a substontial 6.0 oz. per\n        sq. yd. fabric constructed from 100% cotton. This classic fit\n        preshrunk jersey knit provides unmatched comfort with each wear.\n        Featuring a toped neck and shoulder, and a seemless double-needle\n        collar, and available in a range of colors, it offers it all in the\n        ultimate head- turning package.'),
(9, 'Jean Shirt', 'Crocs', 90, 'Women', 'S', 'n5.jpg', 'Old', 'The Gildan Ultra Cotton Shirt is made from a substontial 6.0 oz. per\n        sq. yd. fabric constructed from 100% cotton. This classic fit\n        preshrunk jersey knit provides unmatched comfort with each wear.\n        Featuring a toped neck and shoulder, and a seemless double-needle\n        collar, and available in a range of colors, it offers it all in the\n        ultimate head- turning package.'),
(10, 'Catoon Astronaut Short', 'Eddy Bauer', 40, 'Men', 'M', 'n6.jpg', 'New', 'The Gildan Ultra Cotton Shirt is made from a substontial 6.0 oz. per\n        sq. yd. fabric constructed from 100% cotton. This classic fit\n        preshrunk jersey knit provides unmatched comfort with each wear.\n        Featuring a toped neck and shoulder, and a seemless double-needle\n        collar, and available in a range of colors, it offers it all in the\n        ultimate head- turning package.'),
(11, 'Regular Fit Resort Shirt', 'Vans', 200, 'Men', 'L', 'n8.jpg', 'Old', 'The Gildan Ultra Cotton Shirt is made from a substontial 6.0 oz. per\n        sq. yd. fabric constructed from 100% cotton. This classic fit\n        preshrunk jersey knit provides unmatched comfort with each wear.\n        Featuring a toped neck and shoulder, and a seemless double-needle\n        collar, and available in a range of colors, it offers it all in the\n        ultimate head- turning package.'),
(12, 'Regular Fit Cotton Shirt', 'VL', 110, 'Women', 'M', 'n1.jpg', 'New', 'The Gildan Ultra Cotton Shirt is made from a substontial 6.0 oz. per\n        sq. yd. fabric constructed from 100% cotton. This classic fit\n        preshrunk jersey knit provides unmatched comfort with each wear.\n        Featuring a toped neck and shoulder, and a seemless double-needle\n        collar, and available in a range of colors, it offers it all in the\n        ultimate head- turning package.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(7) NOT NULL,
  `username` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `userpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `city`, `useremail`, `phone`, `userpassword`) VALUES
(5, 'Danny', 'KAMPALA', 'akanyijuka1danson@gmail.com', '0779264619', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartItemId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartItemId` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
