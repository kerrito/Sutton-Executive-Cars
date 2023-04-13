-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2023 at 10:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsultan`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `id` int NOT NULL,
  `name` varchar(235) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `class` varchar(235) DEFAULT NULL,
  `passengers` varchar(235) DEFAULT NULL,
  `luggage` varchar(235) DEFAULT NULL,
  `img` varchar(235) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_details`
--

INSERT INTO `car_details` (`id`, `name`, `price`, `class`, `passengers`, `luggage`, `img`) VALUES
(2, 'MERCEDES E CLASS ESTATE', 190, 'LUXERY', '1-4', '3 LARGE CASES 2 SMALL', 'D248258.jpg'),
(3, 'MERCEDES E CLASS SALOON', 240, 'Luxery', '1-4', '2 Large Cases 2 Small', 'MB-E-Class.jpg'),
(4, 'MERCEDES V CLASS', 185, 'Luxery', '1-4', '2 Large Cases 2 Small', 'mercedes-benz-v-class-color-409026.jpg'),
(5, 'MERCEDES V CLASS', 210, 'Luxery', '1-7', '6 Large Cases 2 Small', '61b6484bacd7fabff077a139fe8ff8eb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `location_credential`
--

CREATE TABLE `location_credential` (
  `id` int NOT NULL,
  `pickup_loc` text,
  `pickup_latitude` text,
  `pickup_time` time DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `drop_loc` text,
  `drop_latitude` text,
  `drop_time` time DEFAULT NULL,
  `drop_date` date DEFAULT NULL,
  `via_loc` text,
  `via_latitude` text,
  `payment` varchar(235) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `location_credential`
--

INSERT INTO `location_credential` (`id`, `pickup_loc`, `pickup_latitude`, `pickup_time`, `pickup_date`, `drop_loc`, `drop_latitude`, `drop_time`, `drop_date`, `via_loc`, `via_latitude`, `payment`) VALUES
(1680967282, 'London Luton Airport (LTN), Airport Way, Luton, UK', 'https://maps.google.com/?cid=3316593207723760336', '22:21:00', '2023-04-14', 'Ukrainian Catholic Cathedral, Duke Street, London, UK', 'https://maps.google.com/?cid=14904302651574882822', '22:23:00', '2023-04-15', 'No via location', 'No via url', NULL),
(1680973275, 'London Luton Airport (LTN), Airport Way, Luton, UK', 'https://maps.google.com/?cid=3316593207723760336', '14:04:00', '2023-05-06', 'Ukrainian Catholic Cathedral, Duke Street, London, UK', 'https://maps.google.com/?cid=14904302651574882822', '16:07:00', '2023-05-06', 'No via location', 'No via location', NULL),
(1681064763, 'London Luton Airport (LTN), Airport Way, Luton, UK', 'https://maps.google.com/?cid=3316593207723760336', '14:29:00', '2023-05-26', 'Ukrainian Catholic Cathedral, Duke Street, London, UK', 'https://maps.google.com/?cid=14904302651574882822', '15:30:00', '2023-06-28', 'No via location', 'No via location', NULL),
(1681065552, 'London Luton Airport (LTN), Airport Way, Luton, UK', 'https://maps.google.com/?cid=3316593207723760336', '23:42:00', '2023-09-20', 'Ukrainian Catholic Cathedral, Duke Street, London, UK', 'https://maps.google.com/?cid=14904302651574882822', '23:44:00', '2023-09-23', 'No via location', 'No via location', NULL),
(1681069507, 'London Luton Airport (LTN), Airport Way, Luton, UK', 'https://maps.google.com/?cid=3316593207723760336', '00:47:00', '2023-12-21', 'Ukrainian Catholic Cathedral, Duke Street, London, UK', 'https://maps.google.com/?cid=14904302651574882822', '04:49:00', '2023-12-23', 'No via location', 'No via location', NULL),
(1681071035, 'London Luton Airport (LTN), Airport Way, Luton, UK', 'https://maps.google.com/?cid=3316593207723760336', '01:13:00', '2024-02-08', 'Ukrainian Catholic Cathedral, Duke Street, London, UK', 'https://maps.google.com/?cid=14904302651574882822', '06:10:00', '2024-02-22', 'No via location', 'No via location', NULL),
(1681073242, 'London Luton Airport (LTN), Airport Way, Luton, UK', 'https://maps.google.com/?cid=3316593207723760336', '04:50:00', '2023-11-09', 'Ukrainian Catholic Cathedral, Duke Street, London, UK', 'https://maps.google.com/?cid=14904302651574882822', '01:51:00', '2024-02-02', 'No via location', 'No via location', NULL),
(1681073736, 'Ukrainian Catholic Cathedral, Duke Street, London, UK', 'https://maps.google.com/?cid=14904302651574882822', '04:55:00', '2024-02-02', 'London Luton Airport (LTN), Airport Way, Luton, UK', 'https://maps.google.com/?cid=3316593207723760336', '06:55:00', '2024-01-31', 'No via location', 'No via location', NULL),
(1681160226, 'London Luton Airport (LTN), Airport Way, Luton, UK', 'https://maps.google.com/?cid=3316593207723760336', '05:56:00', '2023-07-21', 'Ukrainian Catholic Cathedral, Duke Street, London, UK', 'https://maps.google.com/?cid=14904302651574882822', '06:57:00', '2023-07-28', 'No via location', 'No via location', '240'),
(1681160336, 'London Luton Airport (LTN), Airport Way, Luton, UK', 'https://maps.google.com/?cid=3316593207723760336', '13:01:00', '2024-01-19', 'Ukrainian Catholic Cathedral, Duke Street, London, UK', 'https://maps.google.com/?cid=14904302651574882822', '05:58:00', '2024-01-11', 'No via location', 'No via location', '210'),
(1681161488, 'London Luton Airport (LTN), Airport Way, Luton, UK', 'https://maps.google.com/?cid=3316593207723760336', '05:17:00', '2023-12-22', 'Ukrainian Catholic Cathedral, Duke Street, London, UK', 'https://maps.google.com/?cid=14904302651574882822', '06:18:00', '2023-12-27', 'No via location', 'No via location', '210');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int NOT NULL,
  `payment_id` varchar(235) DEFAULT NULL,
  `payer_id` varchar(235) DEFAULT NULL,
  `payer_email` varchar(235) DEFAULT NULL,
  `payment` varchar(235) DEFAULT NULL,
  `currency` varchar(235) DEFAULT NULL,
  `payment_status` varchar(235) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `payment_id`, `payer_id`, `payer_email`, `payment`, `currency`, `payment_status`) VALUES
(1, 'PAYID-MQ2H2LI3R111632SG560125X', '9DHKA38ZFYS2E', 'sb-2wba4325486114@business.example.com', '210.00', 'USD', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `id` int NOT NULL,
  `car_id` int DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `drop_date` date DEFAULT NULL,
  `payment_method` varchar(235) NOT NULL,
  `loc_cren_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`id`, `car_id`, `pickup_date`, `drop_date`, `payment_method`, `loc_cren_id`) VALUES
(1, 3, '2023-09-01', '2024-02-08', 'PayPal', 1680965739),
(2, 3, '2023-05-06', '2023-05-06', 'Pay offline', 1680973275),
(3, 3, '2023-05-26', '2023-06-28', 'Pay offline', 1681064763),
(4, 4, '2023-09-20', '2023-09-23', 'Pay offline', 1681065552),
(5, 4, '2023-09-20', '2023-09-23', 'Pay offline', 1681065552),
(6, 4, '2023-12-21', '2023-12-23', 'Pay offline', 1681069507),
(7, 4, '2024-02-08', '2024-02-22', 'Pay offline', 1681071035),
(8, 4, '2024-02-08', '2024-02-22', 'Pay offline', 1681071035),
(9, 4, '2023-11-09', '2024-02-02', 'Pay offline', 1681073242),
(10, 5, '2024-02-02', '2024-01-31', 'Pay offline', 1681073736),
(11, 3, '2023-07-21', '2023-07-28', 'Pay offline', 1681160226),
(12, 3, '2023-07-21', '2023-07-28', 'Pay pal', 1681160226),
(13, 5, '2024-01-19', '2024-01-11', 'PayPal', 1681160336),
(14, 5, '2023-12-22', '2023-12-27', 'PayPal', 1681161488);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int NOT NULL,
  `name` varchar(235) DEFAULT NULL,
  `email` varchar(235) DEFAULT NULL,
  `number` bigint DEFAULT NULL,
  `pass` varchar(235) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `email`, `number`, `pass`) VALUES
(1, 'arshan', 'arshan@gmail.com', 11111, 'f56561c916e79a9c7be7b1b853090737');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(235) DEFAULT NULL,
  `email` varchar(235) DEFAULT NULL,
  `number` varchar(235) DEFAULT NULL,
  `loc_cren_id` int DEFAULT NULL,
  `last_name` varchar(235) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `loc_cren_id`, `last_name`) VALUES
(1, 'Arshan', 'skaacas@gmail.com', '097383', 1680129157, 'Irfan'),
(2, 'Arshan', 'skaacas@gmail.com', '097383', 1680202325, 'Irfan'),
(3, 'Khalid', 'skaacas@gmail.com', '097383', 1680204617, 'khan'),
(4, 'Khalid', 'skaacas@gmail.com', '097383', 1680204617, 'khan'),
(5, 'Khalid', 'skaacas@gmail.com', '097383', 1680204617, 'Irfan'),
(6, 'Khalid', 'skaacas@gmail.com', '097383', 1680204617, 'Irfan'),
(7, 'shakeel', 'skaacas@gmail.com', '9938372', 1680212064, 'noman'),
(8, 'Khalid', 'skaacas@gmail.com', '9938372', 1680275505, 'Irfan'),
(9, 'Khalid', 'skaacas@gmail.com', '9938372', 1680370176, 'Irfan'),
(10, 'Khalid', 'skaacas@gmail.com', '097383', 1680383142, 'Irfan'),
(11, 'Khalid', 'skaacas@gmail.com', '097383', 1680383142, 'Irfan'),
(12, 'Khalid', 'asasds@gmail.com', '03030303', 1680435734, 'Irfan'),
(13, 'Khalid', 'asasds@gmail.com', '11111111', 1680631754, 'Irfan'),
(14, 'Khalid', 'skaacas@gmail.com', '09738311', 1680631754, 'Irfan'),
(15, 'Khalid', 'skaacas@gmail.com', '11111111', 1680633513, 'Irfan'),
(16, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1680732136, 'Irfan'),
(17, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1680732136, 'Irfan'),
(18, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1680732136, 'Irfan'),
(19, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1680732136, 'Irfan'),
(20, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1680734256, 'khan'),
(21, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1680734256, 'khan'),
(22, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1680734256, 'khan'),
(23, 'Khalid', 'shoaibtechy.j75@gmail.com', '11111111', 1680734967, 'Irfan'),
(24, 'Khalid', 'shoaibtechy.j75@gmail.com', '11111111', 1680897573, 'Irfan'),
(25, 'Khalid', 'shoaibtechy.j75@gmail.com', '11111111', 1680897573, 'khan'),
(26, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1680898022, 'khan'),
(27, 'Khalid', 'shoaibtechy.j75@gmail.com', '11111111', 1680899234, 'Irfan'),
(28, 'Khalid', 'shoaibtechy.j75@gmail.com', '11111111', 1680901104, 'Irfan'),
(29, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681064763, 'Hussain'),
(30, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681064763, 'Hussain'),
(31, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681064763, 'Hussain'),
(32, '', '', '', 1681064763, ''),
(33, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681064763, 'Hussain'),
(34, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681064763, 'Hussain'),
(35, 'Khalid', 'shoaibtechy.j75@gmail.com', '11111111', 1681065552, 'Hussain'),
(36, 'Khalid', 'shoaibtechy.j75@gmail.com', '11111111', 1681065552, 'Hussain'),
(37, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681065552, 'Hussain'),
(38, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681065552, 'Hussain'),
(39, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681065552, 'Hussain'),
(40, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681065552, 'Hussain'),
(41, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681065552, 'Hussain'),
(42, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681065552, 'Hussain'),
(43, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681065552, 'Hussain'),
(44, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681065552, 'Hussain'),
(45, 'Khalid', 'shoaibtechy.j75@gmail.com', '11111111', 1681065552, 'Irfan'),
(46, 'Arshan', 'muhammadarshanirfan@gmail.com', '11111111', 1681065552, 'Irfan'),
(47, 'Arshan', 'muhammadarshanirfan@gmail.com', '11111111', 1681069507, 'Irfan'),
(48, 'Arshan', 'muhammadarshanirfan@gmail.com', '11111111', 1681069507, 'Irfan'),
(49, 'Ashir', 'ashirirfan507@gmail.com', '11111111', 1681069507, 'Irfan'),
(50, 'Arshan', 'skaacas@gmail.com', '11111111', 1681069507, 'Irfan'),
(51, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681069507, 'khan'),
(52, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681069507, 'Hussain'),
(53, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681069507, 'Hussain'),
(54, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681069507, 'Hussain'),
(55, 'Arshan', 'muhammadarshanirfan@gmail.com', '11111111', 1681069507, 'Irfan'),
(56, 'Arshan', 'muhammadarshanirfan@gmail.com', '11111111', 1681071035, 'Irfan'),
(57, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681073242, 'Hussain'),
(58, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681073242, 'Hussain'),
(59, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681073736, 'Hussain'),
(60, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681160226, 'Hussain'),
(61, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681160336, 'Hussain'),
(62, 'shoaib', 'shoaibtechy.j75@gmail.com', '11111111', 1681161488, 'Hussain');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_credential`
--
ALTER TABLE `location_credential`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_details`
--
ALTER TABLE `car_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location_credential`
--
ALTER TABLE `location_credential`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1681161489;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
