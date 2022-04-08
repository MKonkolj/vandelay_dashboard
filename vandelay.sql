-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2022 at 08:10 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vandelay`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `salary` decimal(10,2) NOT NULL,
  `email` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`employee_id`),
  KEY `position` (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `firstname`, `lastname`, `position_id`, `salary`, `email`, `password`) VALUES
(1, 'Ruthie', 'Cohen', 1, '1600.00', 'admin@vandelay.com', '$2y$10$66CGA1rOe8py6IRemLB49uiUzQ5kIaExqim5bgga/8Qzv8vVTflp.'),
(2, 'Jerry', 'Seinfeld', 5, '2500.00', 'jerry@vandelay.com', NULL),
(3, 'George', 'Costanza', 2, '1200.00', 'george@vandelay.com', NULL),
(4, 'Elaine', 'Benes', 5, '2100.00', 'elaine@vandelay.com', NULL),
(5, 'Cosmo', 'Kramer', 2, '1892.00', 'kramer@vandelay.com', NULL),
(6, 'Newman', 'Postman', 4, '1700.00', 'newman@vandelay.com', NULL),
(7, 'Susan', 'Ross', 5, '2300.00', 'susan@vandelay.com', NULL),
(8, 'Leo', 'Uncle', 4, '1600.00', 'leo@vandelay.com', NULL),
(9, 'Joe', 'Davola', 3, '1900.00', 'davola@vandelay.com', NULL),
(10, 'Tim', 'Whatley', 2, '2100.00', 'whatley@vandelay.com', NULL),
(11, 'Frank', 'Costanza', 4, '1600.00', 'frank@vandelay.com', NULL),
(12, 'Estelle', 'Costanza', 2, '1800.00', 'estelle@vandelay.com', NULL),
(13, 'Morty', 'Seinfeld', 2, '3400.00', 'morty@vandelay.com', NULL),
(14, 'Helen', 'Seinfeld', 3, '2300.00', 'helen@vandelay.com', NULL),
(15, 'George', 'Steinbrenner', 5, '6000.00', 'steinbrenner@vandelay.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_name`) VALUES
(1, 'Administrator'),
(2, 'Developer'),
(3, 'Designer'),
(4, 'System Administrator'),
(5, 'IT Manager');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`) VALUES
(1, 'Season 1'),
(2, 'Season 2'),
(3, 'Season 3'),
(4, 'Season 4'),
(5, 'Season 5'),
(6, 'Season 6'),
(7, 'Season 7'),
(8, 'Season 8'),
(9, 'Season 9');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `deadline` date NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `employee_id` (`employee_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `project_id`, `employee_id`, `deadline`) VALUES
(1, 'The Seinfeld Chronicles', 1, 2, '2022-04-08'),
(2, 'The Stake Out', 1, 3, '2022-04-09'),
(3, 'The Robbery', 1, 4, '2022-04-08'),
(4, 'Male Unbonding', 1, 5, '2022-04-09'),
(5, 'The Stock Tip', 1, 6, '2022-04-10'),
(6, 'The Ex-Girlfriend', 2, 2, '2022-04-11'),
(7, 'The Pony Remark', 2, 3, '2022-04-12'),
(8, 'The Jacket', 2, 4, '2022-04-13'),
(9, 'The Phone Message', 2, 2, '2022-04-14'),
(10, 'The Apartment', 2, 4, '2022-04-15'),
(11, 'The Statue', 2, 3, '2022-04-16'),
(12, 'The Revenge', 2, 2, '2022-04-17'),
(13, 'The Heart Attack', 2, 2, '2022-04-18'),
(14, 'The Deal', 2, 5, '2022-04-19'),
(15, 'The Baby Shower', 2, 4, '2022-04-20'),
(16, 'The Chinese Restaurant', 2, 5, '2022-04-21'),
(17, 'The Busboy', 2, 2, '2022-04-22');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `position` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
