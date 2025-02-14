-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2025 at 08:52 AM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `post_of_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `category`, `post_of_category`) VALUES
(1, 'Business', 2),
(5, 'CSS', 2),
(6, 'Sport', 2),
(7, ' Political', 1),
(8, 'C', 2),
(13, 'DBMS', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(255) DEFAULT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `PhoneNo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `catName` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `author` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `catName`, `date`, `author`, `img`) VALUES
(1, 'RADHE  RADHE  ', 'Radhe Krishana:-\r\nRadha and Krishna are Hindu deities who are considered to be the perfect couple and are often depicted together. Here are some details about Radha and Krishna: \r\n', 1, '30 Aug, 2024', 2, '17967145751750448-m.jpg'),
(2, 'Har Har Mahadev', 'Shiva Shakti:-\r\nThere are multiple matches for Shiv Shakti, including a Hindu philosophical concept, the name of a Chandrayaan-3 landing site, and books: \r\n', 5, '30 Aug, 2024', 2, '18121592299363816-m.jpg'),
(3, 'Sita Ram', 'SITA RAM\r\nThere are multiple matches for Sita Ram, including a Hindu goddess, an artist, and a book:', 6, '30 Aug, 2024', 2, 'images (1).jpg'),
(5, 'Himalayas Detail', 'The Himalayas are a crescent-shaped mountain range that stretches across the northeastern part of India and into the countries of Pakistan, Nepal, China, Bhutan, and Afghanistan. \r\n', 5, '30 Aug, 2024', 2, 'Mahadev.jpg'),
(6, 'Mount Everest', 'Mount Everest is a peak in the Himalaya mountain range. It is located between Nepal and Tibet, an autonomous region of China. At 8,849 meters (29,032 feet), it is considered the tallest point on Earth. In the nineteenth century, the mountain was named after George Everest, a former Surveyor General of India.', 13, '30 Aug, 2024', 2, 'camera3.jpg'),
(7, 'THIS IS HELLO', 'HELLO', 7, '31 Aug, 2024', 3, 'camera5.jpg'),
(19, 'THIS IS USER', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, tenetur.\r\n', 8, '31 Aug, 2024', 3, 'camera9.jpg'),
(20, 'Coffee', 'Coffee is a beverage brewed from the roasted and ground seeds of the tropical evergreen coffee plant. Coffee is one of the three most popular beverages in the world (alongside water and tea), and it is one of the most profitable international commodities.', 6, '03 Sep, 2024', 4, 'beverages-rise-and-grind-1-682x682.jpg'),
(21, 'Beautiful Wedding Day', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque ipsum nam libero magni nemo provident dolorem laudantium ipsam vero, voluptatum assumenda placeat possimus unde! Magnam!', 1, '09 Sep, 2024', 4, 'vicky&katrina.webp'),
(22, 'Wedding Day', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque ipsum nam libero magni nemo provident dolorem laudantium ipsam vero, voluptatum assumenda placeat possimus unde! Magnam!', 13, '09 Sep, 2024', 4, 'pulkit.jpg'),
(23, 'Wedding Beautiful Days', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque ipsum nam libero magni nemo provident dolorem laudantium ipsam vero, voluptatum assumenda placeat possimus unde! Magnam!', 8, '09 Sep, 2024', 4, 'Virat Kohli and Anushka Sharma wedding.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `uname`, `password`, `role`) VALUES
(1, 'Test', 'User', 'testuser', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(2, 'Parmar', 'Mitesh', 'mitesh', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(3, 'Jalpa', 'Parmar', 'radhe', 'fad1baf6464b5da8f87896439ca2de03', 1),
(4, 'Nirmala', 'Parmar', 'nirmala', 'fcea920f7412b5da7be0cf42b8c93759', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catName` (`catName`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`catName`) REFERENCES `categories` (`cid`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
