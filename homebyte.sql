-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2026 at 05:26 PM
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
-- Database: `homebyte`
--

-- --------------------------------------------------------

--
-- Table structure for table `ann_banner`
--

CREATE TABLE `ann_banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `paragraph` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ann_banner`
--

INSERT INTO `ann_banner` (`id`, `title`, `image`, `created_at`, `paragraph`) VALUES
(1, 'Enough Wasting your time', 'house1.jpg', '2026-04-11 23:26:16', 'Find the best real estate deals with us'),
(2, 'Luxury Living', 'house2.jpg', '2026-04-11 23:26:16', 'Find what you deserve'),
(3, 'New Arrival', 'house3.jpg', '2026-04-12 18:07:17', 'We keep it fresh and we keep it updated'),
(5, 'Find Your Dream Home', 'house4.jpg', '2026-04-16 18:50:15', 'we got it here for you');

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `id` int(11) NOT NULL,
  `userID` int(255) DEFAULT NULL,
  `card_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(50) DEFAULT NULL,
  `expiry` varchar(10) DEFAULT NULL,
  `cvv` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `productID` int(255) DEFAULT NULL,
  `userID` int(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Name` varchar(255) DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `userID` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`userID`, `name`, `email`, `password`, `phone`, `created_at`) VALUES
(5, 'Omar Ramadan', 'youssefeltayeb123@gmail.com', '$2y$10$wLbU1dc0TlTguJ2oOp4zJOzdmnqzKTZQjCe6Gql4WRPTIogOGoJ1C', '1002585706', '2026-04-16 18:01:23'),
(6, 'Amr Abdelsalam', 'amr123@gmail.com', '$2y$10$U4oKrCIXnj0w94OBqnCTq.u3JeWGspWnI3QDynv0SpbP8RD5Ze2Tq', '1234567890', '2026-04-18 19:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Test User', 'test@mail.com', 'Hello', 'Testing form', '2026-04-11 23:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fullname`, `email`, `message`, `created_at`, `phone`) VALUES
(1, 'Visitor', 'visitor@mail.com', 'I am interested in this property', '2026-04-11 23:26:17', '1234567890'),
(2, 'Omar Ramadan', 'youssefeltayeb123@gmail.com', 'I want to get this house ', '2026-04-18 17:52:38', '1002585706'),
(3, 'Samer', 'samer@yahoo.com', 'I wanna be a seller at your website ', '2026-04-18 20:15:35', '654312');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(255) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `productID` int(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `total`, `order_date`, `productID`, `message`, `name`, `email`, `phone`, `productName`) VALUES
(33, 5, 120000.00, '2026-04-18 22:40:45', 2, 'I am interested in this', 'Omar Ramadan', 'youssefeltayeb123@gmail.com', '1002585706', 'City Apartment'),
(36, 6, 1220000.00, '2026-04-18 23:32:17', 0, 'I am interested in this', 'Mariam Ahmed', 'mariam123@gmail.com', '1234567890', 'House0'),
(37, 6, 120000.00, '2026-04-19 13:10:26', 2, 'I am interested in this apartment Kindly reach me between 9:00 AM and 12:00 PM', 'Amr Abdelsalam', 'amr123@gmail.com', '1234567890', 'City Apartment'),
(38, 6, 1200000.00, '2026-04-19 13:26:36', 4, 'I am really interested in getting more info about this Kindly reach me soon', 'Amr Abdelsalam', 'amr123@gmail.com', '1234567890', 'House3');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL,
  `productID` int(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(255) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Price` int(15) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `Name`, `Price`, `image`, `category`, `description`, `status`, `created_at`) VALUES
(0, 'House0', 1220000, 'house1.jpg', 'Townhouse', 'Every aparment has its own story ', NULL, '2026-04-16 15:02:39'),
(1, 'Modern Villa', 250000, 'house4.jpg', 'Villa', 'Beautiful modern villa', 'available', '2026-04-11 23:26:16'),
(2, 'City Apartment', 120000, 'house2.jpg', 'Apartment', 'Apartment in city center', 'available', '2026-04-11 23:26:16'),
(4, 'House3', 1200000, 'house3.jpg', 'Twin House', 'Twin House you cannot find anything like it ', 'available', '2026-04-12 22:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `prod_details`
--

CREATE TABLE `prod_details` (
  `id` int(11) NOT NULL,
  `productID` int(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Price` int(15) DEFAULT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prod_details`
--

INSERT INTO `prod_details` (`id`, `productID`, `Name`, `Price`, `img1`, `img2`, `img3`, `img4`, `description`) VALUES
(1, 1, 'Modern Villa', 250000, '69dc2733d12f9_bed_1.jpg', '69dc2733d14f0_bed_2.jpg', '69dc2733d165b_bed_3.jpg', '69dc2733d17b0_bath_8.jpg', 'Project: Granville\nLocation: Fifth Settlement, New Cairo\nFinishing: Fully Finished\nArea: 400 m\nUnit Details:\n- 7 Bedrooms\n- 7 Bathrooms\nIn the heart of the capital and 5 minutes from the American University\nInstallments over 10 years\nDelivery Date : 6 months\n==============\nFounders Real Estate Development is a leading company in the Egyptian market. Launched in 2019 as a subsidiary of Hyde Park Developments, Founders specializes in delivering high-end residential and commercial projects with elegant European designs. The company focuses on selecting prime locations and offering premium-quality units with competitive pricing and flexible payment plans.\nIn addition to Granville, Founders has developed other successful projects such as Gardenia Compound in Nasr City and Wesal Compound in El Shorouk City. The company is committed to meeting client needs by delivering luxurious and globally-inspired real estate solutions.'),
(3, 2, 'City Apartment', 120000, '69e101ad6d783_living_7.jpg', '69e101ad6dc24_kitchen_9.jpg', '69e101ad6df6a_bed_38.jpg', '69e101ad76d7e_bath_68.jpg', 'Own an apartment in New Cairo with a minimal down payment and installments over 12 years.\nIn Taj City Compound.\nThe apartment offers a very distinctive view.\nThe best layout available.\nTotal area: 166 m.\nDivided into: 3 bedrooms (master bedroom + dressing room + bathroom).\nGuest bathroom - kitchen - 2-piece reception.\nThe compound is fully equipped with the best services.'),
(6, 0, 'House0', 1220000, '69e0fb09d98fb_bed_22.jpg', '69e0fb09d9bbc_bed_25.jpg', '69e0fb09d9dbf_bed_23.jpg', '69e0fb09df273_kitchen_32.jpg', 'Apartment Size: 95mآ²\nUltra Super Lux Hotel Finishing\nDelivery: By the end of 2026\nPayment Plan:\n20% down payment with installments over 3 years\n30% down payment with installments over 4 years\n40% down payment with installments over 5 years\n50% down payment with installments over 5 years\n25% discount for cash payments\nPrime Location in the Heart of Hurghada:\n7-minute walk to the beaches\n10 minutes from Hurghada International Airport\n5 minutes to Downtown & Sheraton Street\n3 minutes to Kawther area & the Bank District'),
(7, 4, 'House3', 1200000, '69e1005d9985d_kitchen_8.jpg', '69e1005d99b72_bath_5.jpg', '69e1005d99ea1_bed_8.jpg', '69e1005d9a102_living_9.jpg', 'Taj City Compound - New Cairo\nFifth Settlement\nOn Suez Road and in front of Cairo Airport\nFor Sale at the Lowest Price\nStudio for Sale at Less than the Company Price\nInstallments over a Year\nArea: 120 m\n3 Bedroom\n2 Bathroom');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `productID` int(255) DEFAULT NULL,
  `userID` int(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `screenshot` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ann_banner`
--
ALTER TABLE `ann_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `name` (`Name`,`Price`),
  ADD KEY `Price` (`Price`);

--
-- Indexes for table `prod_details`
--
ALTER TABLE `prod_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Name` (`Name`),
  ADD KEY `Price` (`Price`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `productID` (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ann_banner`
--
ALTER TABLE `ann_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `card_details`
--
ALTER TABLE `card_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `prod_details`
--
ALTER TABLE `prod_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card_details`
--
ALTER TABLE `card_details`
  ADD CONSTRAINT `card_details_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `customers` (`userID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `customers` (`userID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `customers` (`userID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `prod_details`
--
ALTER TABLE `prod_details`
  ADD CONSTRAINT `prod_details_ibfk_1` FOREIGN KEY (`Name`) REFERENCES `products` (`Name`),
  ADD CONSTRAINT `prod_details_ibfk_2` FOREIGN KEY (`Price`) REFERENCES `products` (`Price`),
  ADD CONSTRAINT `prod_details_ibfk_3` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `customers` (`userID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
