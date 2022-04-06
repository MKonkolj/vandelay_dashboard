-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 06, 2022 at 10:13 AM
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
  `salary` int(11) NOT NULL,
  `email` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`employee_id`),
  KEY `position` (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `firstname`, `lastname`, `position_id`, `salary`, `email`, `password`) VALUES
(1, 'Ruthie', 'Cohen', 1, 1600, 'admin@vandelay.com', '$2y$10$66CGA1rOe8py6IRemLB49uiUzQ5kIaExqim5bgga/8Qzv8vVTflp.'),
(2, 'Jerry', 'Seinfeld', 5, 2500, 'jerry@vandelay.com', NULL),
(3, 'George', 'Costanza', 2, 1200, 'george@vandelay.com', NULL),
(4, 'Elaine', 'Benes', 5, 2100, 'elaine@vandelay.com', NULL),
(5, 'Cosmo', 'Kramer', 2, 1892, 'kramer@vandelay.com', NULL),
(6, 'Newman', 'Postman', 4, 1700, 'newman@vandelay.com', NULL),
(7, 'Susan', 'Ross', 5, 2300, 'susan@vandelay.com', NULL),
(8, 'Leo', 'Uncle', 4, 1600, 'leo@vandelay.com', NULL),
(9, 'Joe', 'Davola', 3, 1900, 'davola@vandelay.com', NULL),
(10, 'Tim', 'Whatley', 2, 2100, 'whatley@vandelay.com', NULL),
(11, 'Frank', 'Costanza', 4, 1600, 'frank@vandelay.com', NULL),
(12, 'Estelle', 'Costanza', 2, 1800, 'estelle@vandelay.com', NULL),
(13, 'Morty', 'Seinfeld', 2, 3400, 'morty@vandelay.com', NULL),
(14, 'Helen', 'Seinfeld', 3, 2300, 'helen@vandelay.com', NULL),
(15, 'George', 'Steinbrenner', 5, 6000, 'steinbrenner@vandelay.com', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_desc` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`task_id`),
  KEY `employee_id` (`employee_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
