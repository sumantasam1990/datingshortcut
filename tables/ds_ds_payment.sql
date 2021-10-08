-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 06:02 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datingshortcut`
--

-- --------------------------------------------------------

--
-- Table structure for table `ds_ds_payment`
--

CREATE TABLE `ds_ds_payment` (
  `payid` int(11) NOT NULL,
  `book_pay_id` int(11) NOT NULL,
  `source_type` varchar(255) DEFAULT NULL,
  `card_brand` varchar(255) DEFAULT NULL,
  `last_four` varchar(255) DEFAULT NULL,
  `exp_month` varchar(255) DEFAULT NULL,
  `exp_year` varchar(255) DEFAULT NULL,
  `fingerprint` text DEFAULT NULL,
  `card_type` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `pay_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='payment store table';

--
-- Dumping data for table `ds_ds_payment`
--

INSERT INTO `ds_ds_payment` (`payid`, `book_pay_id`, `source_type`, `card_brand`, `last_four`, `exp_month`, `exp_year`, `fingerprint`, `card_type`, `order_id`, `amount`, `currency`, `status`, `pay_datetime`) VALUES
(3, 37, 'CARD', 'VISA', '1111', '11', '2024', 'sq-1-Z-4lNDqtvucOmFT_Kiwe5A7uPeXTY1Cu_JBdQtDsSEzBPz6QzNq6fglSAfno1Gc6Lg', 'CREDIT', 'EgQWJCALcgqfHJZulLbyNRT1uaB', '99', 'USD', 'COMPLETED', '2021-09-28 08:10:08'),
(4, 36, 'CARD', 'VISA', '1111', '11', '2024', 'sq-1-Z-4lNDqtvucOmFT_Kiwe5A7uPeXTY1Cu_JBdQtDsSEzBPz6QzNq6fglSAfno1Gc6Lg', 'CREDIT', 'EuXcUC6k7KJpkHnaHEwFaen7uaB', '99', 'USD', 'COMPLETED', '2021-09-28 07:17:19'),
(5, 38, 'CARD', 'VISA', '1111', '11', '2024', 'sq-1-Z-4lNDqtvucOmFT_Kiwe5A7uPeXTY1Cu_JBdQtDsSEzBPz6QzNq6fglSAfno1Gc6Lg', 'CREDIT', 'elsUWPMFFViH7RUZYs8RcGjiuaB', '99', 'USD', 'COMPLETED', '2021-10-05 04:25:12'),
(6, 39, 'CARD', 'VISA', '1111', '11', '2024', 'sq-1-Z-4lNDqtvucOmFT_Kiwe5A7uPeXTY1Cu_JBdQtDsSEzBPz6QzNq6fglSAfno1Gc6Lg', 'CREDIT', 'iRJYwEqT8hE0GZLBCXW9OyNuuaB', '299', 'USD', 'COMPLETED', '2021-10-05 17:05:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ds_ds_payment`
--
ALTER TABLE `ds_ds_payment`
  ADD PRIMARY KEY (`payid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ds_ds_payment`
--
ALTER TABLE `ds_ds_payment`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
