-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 04:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pestana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', '$2y$10$SpRapj4yCfjWnosAfJladOCmrfuFAbRMYHwvtaV7iemfvjjcYs6yW');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', '$2y$10$SpRapj4yCfjWnosAfJladOCmrfuFAbRMYHwvtaV7iemfvjjcYs6yW');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(255) NOT NULL,
  `reservationid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(255) NOT NULL,
  `roomdid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `arrival` date NOT NULL,
  `departure` date NOT NULL,
  `Total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `roomdid`, `userid`, `arrival`, `departure`, `Total`) VALUES
(111, 31, 1, '2023-02-06', '2023-02-18', 492);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `Suitetype` varchar(255) DEFAULT NULL,
  `Occupied` tinyint(1) NOT NULL DEFAULT 0,
  `picture` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `title`, `Price`, `type`, `Suitetype`, `Occupied`, `picture`) VALUES
(11, 'Test', 9000, 'Single', '', 0, 'test1.webp'),
(13, 'last', 780, 'Single', 'Standard', 0, 'large 1.jpg'),
(14, 'please', 750, 'Single', 'Standard', 0, 'hot-4.jpg'),
(19, 'ezd', 563, 'Single', 'Standard', 0, 'test1.webp'),
(20, 'aaaaaaaaaaaa', 55555, 'Single', 'Standard', 0, 'test1.webp'),
(21, 'suitee test', 7800, 'Suite', 'Junior', 0, 'large 1.jpg'),
(23, 'tutu', 7744, 'Double', '', 0, 'large 1.jpg'),
(25, 'Juniorss', 78900, 'Suite', 'Junior', 0, 'photo-1582719478250-c89cae4dc85b.jfif'),
(26, 'Presidentt', 78000, 'Suite', 'Presidential', 0, '133061405.jpg'),
(27, 'Love room', 6400, 'Suite', 'Honeymoon', 0, '12-1920x1080-df9765b2395d05ba2069ac95ba2aa16b.jpg'),
(28, 'Standardio', 74000, 'Suite', 'Standard', 0, '140127103345-peninsula-shanghai-deluxe-mock-up.jpg'),
(29, 'Waifu time', 66666, 'Suite', 'Bridal', 0, 'Picture2.jpg'),
(30, 'Penthome', 46000, 'Suite', 'Penthouse', 0, 'Room-C_004-e1563551718755.jpg'),
(31, 'Solo life', 123, 'Single', 'Standard', 0, 'cristian-pulisic-bedroom-150.jpg'),
(33, 'testing', 90000, 'Suite', 'Bridal', 0, 'photo-1582719478250-c89cae4dc85b.jfif'),
(34, 'Futur--Room', 12300, 'Suite', 'Junior', 1, 'hot-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Frank_Ribery', 'ycode@gmail.com', '$2y$10$QHofu3sQTQLFcjCVcz5d5e4ar4a2vF7N2QgyC0k.myp7yjBrFTy8e', '2022-12-26 09:57:31'),
(3, 'test', 'test@test.com', '$2y$10$IFgnLNH/YS6/uYGF5IsQyePJWvGKm.tMwkDihP13Ax.xzlAIQ9pGm', '2023-01-16 18:39:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservationid` (`reservationid`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomid` (`roomdid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guests`
--
ALTER TABLE `guests`
  ADD CONSTRAINT `reservationid` FOREIGN KEY (`reservationid`) REFERENCES `reservations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `roomid` FOREIGN KEY (`roomdid`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
