-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 02:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cate`
--

CREATE TABLE `tbl_cate` (
  `id_cate` int(11) NOT NULL,
  `name_cate` varchar(100) DEFAULT NULL,
  `date_cate` datetime DEFAULT NULL,
  `status_cate` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cate`
--

INSERT INTO `tbl_cate` (`id_cate`, `name_cate`, `date_cate`, `status_cate`) VALUES
(1, 'LV', NULL, 1),
(2, 'STUT', NULL, 1),
(3, 'Shock', NULL, 1),
(4, 'Casio', NULL, 1),
(5, 'VNCA', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `id_cate` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `id_cate`, `name`, `price`, `description`, `date_create`, `status`) VALUES
(1, 1, 'Đồng hồ LV', 30, 'đồng hồ xuất dư LuisVuiton', '2021-03-20 19:10:10', 1),
(2, 2, 'Đồng hồ hãng Stut', 35, 'đồng hồ fake', '2021-03-20 19:10:20', 1),
(3, 3, 'Đồng hồ hãng Shock', 40, 'không phải đồng hồ', '2021-03-20 19:10:24', 1),
(4, 4, 'Đồng hồ hãng Casio', 1050, 'đồng hồ chính hãng Casio', '2021-03-20 19:10:26', 1),
(6, 5, 'Đồng hồ hãng VNCA', 678, 'đồng hồ Việt Nam sản xuất', '2021-03-20 19:42:25', 1),
(7, 5, 'Đồng hồ hãng VTQ', 999, 'đồng hồ gia truyền nhà VTQ', '2021-03-20 19:42:33', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cate`
--
ALTER TABLE `tbl_cate`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cate` (`id_cate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cate`
--
ALTER TABLE `tbl_cate`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`id_cate`) REFERENCES `tbl_cate` (`id_cate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
