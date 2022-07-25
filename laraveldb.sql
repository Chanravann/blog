-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2022 at 10:23 AM
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
-- Database: `laraveldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

DROP TABLE IF EXISTS `tbl_categories`;
CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `active`, `create_at`) VALUES
(1, 'Television asus', 0, '2022-07-02 10:13:04'),
(2, 'Monitor 1080', 1, '2022-07-02 10:13:04'),
(3, 'Mouse', 1, '2022-07-02 10:38:52'),
(4, 'Keyboard', 1, '2022-07-02 10:38:52'),
(5, 'Phone', 1, '2022-07-02 10:39:28'),
(6, 'TV', 1, '2022-07-02 10:39:28'),
(7, 'Beer', 1, '2022-07-02 15:25:15'),
(8, 'Printer', 1, '2022-07-02 15:28:15'),
(9, 'Switch', 1, '2022-07-02 15:28:41'),
(10, 'Camera', 1, '2022-07-02 15:28:49'),
(11, 'Connector', 1, '2022-07-02 15:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `regions_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `name`, `gender`, `phone`, `email`, `address`, `photo`, `active`, `regions_id`) VALUES
(1, 'VANN Chanra', 'M', '0714337757', 'vannchandarakampot@gmail.com', 'KP', 'upload/customer/km9BfPiTJ001gIQrhh2jqTAHlJthJwi98n1oM9Uh.webp', 1, 0),
(2, 'PISETH Roza', 'F', '071234242', 'pisethroza@gmail.com', 'Preah Vihear', 'upload/customer/I0JC7Fox8HpuFFVQda7jjauYn0MarI2dMl9dpubk.webp', 1, 0),
(3, 'NGAT Tounsotidachan', 'F', '0989754', 'ngattounsotidachan@gmail.com', 'BMC', 'upload/customer/BWUpJW7ikwn9rktohBx4vCsSlqBrAqWWNKP1KhwL.jpg', 1, 1),
(4, 'HOR Makara', 'F', '0989493229', 'hormakara@gmail.com', 'KPC', 'upload/customer/6f9iWMVgFSQkTdhs3BH6QZFtfK4JbTsSwTWTZiYU.jpg', 1, 1),
(5, 'GI Fu', 'M', '09875434', 'gifu@gmail.com', 'KPS', 'upload/customer/d22376c6dff7bf5d3bb009948463ae3f.jpg', 1, 3),
(6, 'BEAN CHHANG', 'F', '', 'beanchhang@gmail.com', 'Prey Veng', 'upload/customer/cdcae4eb841def56ca106d0f1ca6db37.jpg', 1, 5),
(7, 'LIM Tola', 'M', '098789748', 'limtola@gmail.com', 'Koh Kong', 'upload/customer/cc5868ed2d2e94829b445cd4f3e2f741.webp', 1, 2),
(8, 'SOK Vann', 'M', '098902093', 'sokvan@gmail.com', 'Takeo', 'upload/customer/2541d13dbfb5273ab64aee35ade13b6e.jpg', 1, 2),
(9, 'Sok Sakada', 'M', NULL, NULL, 'pp', 'upload/customer/5a62c2ac1da1073dd0425b9b424181d7.jpg', 0, 1),
(10, 'fe', 'M', NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regions`
--

DROP TABLE IF EXISTS `tbl_regions`;
CREATE TABLE IF NOT EXISTS `tbl_regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_regions`
--

INSERT INTO `tbl_regions` (`id`, `name`) VALUES
(1, 'ទួលគោក'),
(2, 'ទួលសង្កែ'),
(3, 'ទួលទំពូង'),
(4, 'ចោមចៅ'),
(5, 'ច្បាអំពៅ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

DROP TABLE IF EXISTS `tbl_students`;
CREATE TABLE IF NOT EXISTS `tbl_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `score` double NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `photo` text,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `name`, `gender`, `phone`, `score`, `email`, `address`, `photo`, `active`) VALUES
(1, 'VANN Chanra', 'M', '0983782424', 90.5, 'vannchanra@gmail.com', 'Kampot', 'upload/student/2022-07-02-09-34-34.jpg', 1),
(2, 'P Roza', 'F', '0978949234', 90.6, 'proza@gmail.com', 'Preah Vihear', 'upload/student/2022-07-02-09-32-09.webp', 1),
(3, 'SOM Puthea', 'F', '098893944', 90.4, 'somputhea@gmail.com', 'Pursat', 'upload/student/2022-07-02-09-34-51.jpg', 1),
(4, 'THEANG Senghong', 'M', '098573829', 88.9, 'theangsenghong@gmail.com', 'Banteay Meanchey', 'upload/student/2022-07-02-09-35-10.jpg', 1),
(5, 'HENG Vongkol', 'M', '09895920', 90.5, 'hegnvongkol@gmail.com', 'Banteay Meanchey', 'upload/student/2022-07-02-09-35-23.jpg', 1),
(6, 'MOM Panhavuth', 'M', '097849293', 99.8, 'mompanhavuth@gmail.com', 'Takéo', 'upload/student/2022-07-02-09-33-49.webp', 1),
(7, 'MARK Zuckerberg', 'M', '0714337757', 90.5, 'markzuckerberg@gmail.com', 'Phnom Penh', 'upload/student/2022-07-02-09-53-03.jpg', 1),
(8, 'BILL Gates', 'M', '071932424', 90.9, 'billgates@gmail.com', 'Kampot', 'upload/student/2022-07-02-09-54-27.jpg', 1),
(9, 'tttt', 'M', '0714337757', 90, NULL, 'Phnom Penh', NULL, 0),
(10, 'rrr', 'M', '0714337757', 90, NULL, 'Phnom Penh', NULL, 0),
(11, 'tt', 'M', '0714337757', 90.8, NULL, 'Phnom Penh', 'upload/student/2022-07-02-09-27-28.jpg', 1),
(12, 'tt', 'M', '0714337757', 90, NULL, 'Phnom Penh', 'upload/student/2022-07-02-09-26-24.jpg', 0),
(13, 'eeee', 'M', '0714337757', 90, NULL, 'Phnom Penh', 'upload/student/2022-07-02-07-51-32.jpg', 0),
(14, 'Heng Vongkol', 'M', '078542390', 90, 'hengvongkol@gmail.com', 'Stung Treng', 'upload/student/2022-07-02-07-54-18.jpg', 1),
(15, 'BEAN Chhang', 'F', '0714323324', 90, 'beanchhang@gmail.com', 'Svay Rieng', 'upload/student/2022-07-02-09-25-57.jpg', 1),
(16, 'Sok Chanthea', 'M', '071294050', 78, NULL, 'Koh Kong', 'upload/student/2022-07-02-11-31-38.jpg', 1),
(17, 'sok', 'M', NULL, 908, NULL, 'Phnom Penh', NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
