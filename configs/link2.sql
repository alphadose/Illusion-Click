-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2017 at 03:57 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `link`
--

-- --------------------------------------------------------

--
-- Table structure for table `link2`
--

CREATE TABLE `link2` (
  `name` text COLLATE utf8mb4_unicode_ci,
  `age` int(11) DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `link2`
--

INSERT INTO `link2` (`name`, `age`, `password`, `link`) VALUES
('a', 1, '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'a'),
('alpha', 1, 'a295e0bdde1938d1fbfd343e5a3e569e868e1465', 'delta'),
('m', 1, '6b0d31c0d563223024da45691584643ac78c96e8', 'm'),
('meow', 1, 'hulla', 'hu'),
('poker', 19, 'da39a3ee5e6b4b0d3255bfef95601890afd80709', ''),
('z', 1, 'z', 'zzz'),
('zzz', 12, 'zzz', 'zzz');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
