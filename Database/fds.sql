-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2023 at 09:38 AM
-- Server version: 8.0.32
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fds`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customers_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_no` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pincode` int NOT NULL,
  PRIMARY KEY (`customers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customers_id`, `first_name`, `last_name`, `email_id`, `phone_no`, `address`, `pincode`) VALUES
(1, 'mark', 'berg', 'berg11@gmail.com', '9111111111', '28, 8th Main Rd, Malleswaram', 574154),
(2, 'winston', 'dsouza', 'winstonds12@gmail.com', '9764316497', 'Railway Layout, Bogadi', 574154),
(3, 'Sheldon', 'Sam', 'sam12@gmail.com', '9888888856', '93, Kanakapura Main Rd, Basavanagudi\n', 574154),
(4, 'kishore', 'kumar', 'kumar45@gmail.com', '9865326598', '1st Block, Jayanagar\n', 50004),
(5, 'bob', 'sin', 'bob14@gmail.com', '9081649731', 'Mahboob Gulshan Public Garden\n', 560102),
(6, 'meril', 'dsouza', 'meril11@gmail.com', '9632895563', 'No. 8P & 9P, Opposite Infosys Gate 4, Electronics City Phase 1, Electronics City\n', 560040),
(7, 'max', 'dsouza', 'max12@gmail.com', '9741628856', 'State Highway 19\n', 574154),
(8, 'maxton', 'mosses', 'mos12@gmail.com', '9741628856', '1st Main Rd, Koramangala 1st Block, Venkatapura, HSR Layout\n', 574154),
(9, 'Feona', 'Melisa', 'melisa@gmail.com', '9101928856', '16 A Main Rd, Yelahanka Satellite Town, Yelahanka\n', 574154),
(10, 'Merritt', 'Lucas', 'aptent.taciti@aol.couk', '5522088385', '165-9740 Et St.', 171916),
(63, 'Joshin', 'Vinod', 'mj@gmail.com', '55965959', 'Skyview Street', 452255),
(79, 'Samuel', 'Smithers', 'SS123@gmail.com', '7485961200', 'Valley View', 48699966),
(80, 'Samuel', 'Smithers', 'SS123@gmail.com', '7485961200', 'Valley View', 48699966),
(83, 'Joshin ', 'Shane', 'SJA123@gmail.com', '748596123', 'Red Stone St', 4566123),
(84, 'James', 'Albert', 'JA@gmail.com', '4741236598', 'jsjdsiji@gmail.com', 458711),
(85, 'James', 'Albert', 'JA@gmail.com', '4741236598', 'jsjdsiji@gmail.com', 458711),
(86, 'asaas', 'assasa', 'sasas@gmail.com', '7418529630', '123 Street', 749655),
(87, 'Lukas', 'Matthrew', 'LM@gmail.com', '1234567890', 'Shindler Creek', 749655),
(88, 'Delilah', 'Johnson', 'dj123@hotmail.com', '9876543210', 'Skystreet', 458896);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE IF NOT EXISTS `delivery` (
  `Delivery_ID` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `Payment` enum('CASH_ON_DELIVERY','ONLINE_PAYMENT') NOT NULL DEFAULT 'CASH_ON_DELIVERY',
  `Date` date NOT NULL,
  PRIMARY KEY (`Delivery_ID`),
  UNIQUE KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`Delivery_ID`, `customer_id`, `Payment`, `Date`) VALUES
(1, 1, 'CASH_ON_DELIVERY', '2023-03-13'),
(2, 2, 'CASH_ON_DELIVERY', '2023-03-20'),
(3, 3, 'ONLINE_PAYMENT', '2023-03-12'),
(4, 4, 'ONLINE_PAYMENT', '2023-03-20'),
(5, 5, 'CASH_ON_DELIVERY', '2023-03-12'),
(6, 7, 'CASH_ON_DELIVERY', '2023-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `food_product`
--

DROP TABLE IF EXISTS `food_product`;
CREATE TABLE IF NOT EXISTS `food_product` (
  `Food_ID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  PRIMARY KEY (`Food_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `food_product`
--

INSERT INTO `food_product` (`Food_ID`, `Name`, `Description`, `Price`) VALUES
(1, 'Butter Chicken Pizza', 'Butter Chicken Sause with chooped up masala toppings', '150.00'),
(2, 'Pineapple Pizza', 'Soft stuffed crust with tangy sause covered with pineapple and cheese', '275.00'),
(3, 'Cheese Pizza', 'Tangy Tomato Sause with Three Cheese', '270.00'),
(4, 'Shawarma Pizza', 'Shawarma Toppings with Garlic Cream Sause', '325.00'),
(5, 'Veg Pizza', 'Mushrooms, Bell Peppers, Tomatoes, Onions', '250.00'),
(6, 'Beef Burger', 'A Regular Hamburger with Cheese', '150.00'),
(7, 'Power Burger', 'The Meat is from a prime cut', '300.00'),
(8, 'Sandwich Burger', 'A Hybrid that is match made in heaven', '190.00'),
(9, '.Gulab Jamun', 'Sponge and sugery dessert', '195.00'),
(10, '.Chocholate Moose', 'Thick and pudding like dessert', '250.00'),
(11, '.Naugat Moose', 'Thick and pudding like dessert', '300.00'),
(12, '.Belgium Waffle', 'A crispy batter with multiple toppings', '150.00'),
(13, '.Chocolate Ice cream', 'frosted cream with chocolate toppings', '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `food_supply`
--

DROP TABLE IF EXISTS `food_supply`;
CREATE TABLE IF NOT EXISTS `food_supply` (
  `Supply_ID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Quantity` int NOT NULL,
  `Date` date NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Supply_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `food_supply`
--

INSERT INTO `food_supply` (`Supply_ID`, `Name`, `Quantity`, `Date`, `Amount`) VALUES
(1, 'Chicken Thighs', 20, '2023-03-15', '1200'),
(2, 'Vegetable Stock ', 5, '2023-04-01', '500'),
(3, 'Vegetable Package', 10, '2023-03-13', '4500'),
(4, 'Eggs', 100, '2023-04-21', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `Orders_ID` int NOT NULL,
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `Food_ID` int NOT NULL,
  `Quantity` int NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Orders_ID`),
  UNIQUE KEY `customer_id` (`customer_id`),
  KEY `Food_ID` (`Food_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Orders_ID`, `customer_id`, `Food_ID`, `Quantity`, `Date`) VALUES
(15, 23, 10, 1, '2023-04-09'),
(16, 24, 5, 2, '2023-04-09'),
(17, 25, 5, 2, '2023-04-09'),
(106, 11, 12, 13, '2023-04-05'),
(998, 7, 10, 15, '2022-05-05'),
(999, 8, 12, 5, '2022-01-01'),
(1000, 1, 1, 2, '2023-03-29'),
(1001, 2, 1, 3, '2023-03-27'),
(1002, 3, 6, 1, '2023-03-29'),
(1003, 10, 10, 4, '2023-03-27'),
(1004, 69, 7, 4, '2023-03-29'),
(1005, 74, 7, 3, '2023-03-28'),
(1006, 80, 1, 2, '2023-04-09'),
(1010, 81, 4, 2, '2023-04-09'),
(1011, 84, 6, 5, '2023-04-11'),
(1012, 86, 9, 2, '2022-04-11'),
(1013, 87, 1, 1, '2023-04-11'),
(1014, 88, 6, 3, '2023-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_report`
--

DROP TABLE IF EXISTS `transaction_report`;
CREATE TABLE IF NOT EXISTS `transaction_report` (
  `Order_ID` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `Orders_ID` int NOT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`Order_ID`),
  UNIQUE KEY `customer_id` (`customer_id`),
  KEY `Orders_ID` (`Orders_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction_report`
--

INSERT INTO `transaction_report` (`Order_ID`, `customer_id`, `Orders_ID`, `Date`) VALUES
(1, 2, 16, '2023-04-09'),
(2, 3, 17, '2023-04-09'),
(3, NULL, 1011, '2023-04-11'),
(4, NULL, 1012, '2022-04-11'),
(5, NULL, 1013, '2023-04-11'),
(6, NULL, 1014, '2023-04-11');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`Food_ID`) REFERENCES `food_product` (`Food_ID`),
  ADD CONSTRAINT `order_details_ibfk_5` FOREIGN KEY (`Food_ID`) REFERENCES `food_product` (`Food_ID`);

--
-- Constraints for table `transaction_report`
--
ALTER TABLE `transaction_report`
  ADD CONSTRAINT `transaction_report_ibfk_3` FOREIGN KEY (`Orders_ID`) REFERENCES `order_details` (`Orders_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
