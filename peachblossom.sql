-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 09:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peachblossom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  `CONTACT` bigint(10) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `FIRSTNAME`, `LASTNAME`, `CONTACT`, `EMAIL`, `USERNAME`, `PASSWORD`) VALUES
(5, 'Shirisha', 'Chhetri', 9809876761, 'shirisha.chhetri@yahoo.com', 'Admin', 'YWRtaW4=');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CATEGORY_NAME` varchar(15) NOT NULL,
  `IMAGE` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CATEGORY_NAME`, `IMAGE`) VALUES
(4, 'Hair-clip', 'clip1.jpg'),
(5, 'Scrunchie', 'scr5.jpg'),
(6, 'Necklace', 'neck5.jpg'),
(7, 'Bracelet', 'bracelet.jpeg'),
(8, 'Earring', 'ear6.jpg'),
(9, 'Ring', 'ring1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CUS_ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(20) NOT NULL,
  `LASTNAME` varchar(20) NOT NULL,
  `CONTACT` bigint(10) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PASSWORD` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CUS_ID`, `FIRSTNAME`, `LASTNAME`, `CONTACT`, `EMAIL`, `PASSWORD`) VALUES
(39, 'Shirisha', 'Chhetri', 9809871234, 'shirisha.chhetri@yahoo.com', 'c2hpcmlzaGE='),
(40, 'Kai', 'Xu', 9809876765, 'xukai@gmail.com', 'eHVrYWk='),
(41, 'Hyunjin', 'Hwang', 9809888011, 'crisa.chhetri@gmail.com', 'Y3Jpc2E=');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(50) NOT NULL,
  `QUANTITY` varchar(20) NOT NULL,
  `PRICE` varchar(50) NOT NULL,
  `CUSTOMER` int(11) NOT NULL,
  `TRANSACTION_ID` varchar(100) NOT NULL,
  `ORDERED_DATE` date NOT NULL,
  `ORDER_STATUS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORDER_ID`, `PRODUCT_NAME`, `QUANTITY`, `PRICE`, `CUSTOMER`, `TRANSACTION_ID`, `ORDERED_DATE`, `ORDER_STATUS`) VALUES
(44, 'Gold Rolling Necklace', '2', '500', 41, 'card_1LYVOnSAqwIwgmCpwy7zzIUZ', '2022-08-19', 'Pending'),
(45, 'Moon Star Silver Bracelet', '3', '200', 41, 'card_1LYVOnSAqwIwgmCpwy7zzIUZ', '2022-08-19', 'Shipped'),
(46, 'Moon Ring', '3', '400', 40, 'card_1LYlekSAqwIwgmCpptJLXETh', '2022-08-20', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PRODUCT_ID` int(30) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `IMAGE` varchar(200) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PRODUCT_ID`, `NAME`, `IMAGE`, `PRICE`, `CATEGORY_ID`) VALUES
(1, 'Pearl Stud Earring', 'bg7.jpg', 200, 8),
(2, 'Metallic and Solid Scrunchie', 'scr4.jpg', 250, 5),
(3, 'Sterling Silver Pearl Necklace', 'neck.jpg', 500, 6),
(6, 'Crystal Crystal Gold Plated', 'bracelet.jpeg', 400, 7),
(7, 'Floral Clip', 'clip7.jpg', 600, 4),
(8, 'Gold Rolling Necklace', 'neck3.jpg', 500, 6),
(9, 'Flower Designed U-pin', 'crystal.jpg', 350, 4),
(10, 'Alloy Bracelet', 'bracelet5.jpeg', 700, 7),
(11, 'Scrunchie and Headband Set', 'scr8.jpg', 299, 5),
(12, 'Oxidised Afghani Tribal Earring', 'ear.jpg', 250, 8),
(13, 'Moon Ring', 'ring5.jpeg', 400, 9),
(14, 'Punk Style Ear Cuff Clip', 'ear1.jpg', 150, 8),
(15, 'Velvet Elastic Bands', 'scr7.jpg', 150, 5),
(16, 'Leiophrix Heart', 'neck8.jpg', 399, 6),
(17, 'Opal Crystal Clip', 'opalcrystal.jpg', 280, 4),
(18, 'Moon Star Silver Bracelet', 'bracelet9.jpeg', 200, 7),
(19, 'Diamond Ring', 'ring.jpeg', 1000, 9),
(20, 'Sterling Silver Earring', 'ear10.jpg', 100, 8),
(21, 'Rhinestone Hair Clip', 'rhinestonehairclamp.jpg', 130, 4),
(23, 'Earring Set', 'ear14.jpg', 450, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CUS_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `CUSTOMER` (`CUSTOMER`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CUS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PRODUCT_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CUSTOMER`) REFERENCES `customers` (`CUS_ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `category` (`CATEGORY_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
