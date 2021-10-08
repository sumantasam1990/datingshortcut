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
-- Table structure for table `ds_booking`
--

CREATE TABLE `ds_booking` (
  `book_id` int(11) NOT NULL,
  `book_from_id` int(11) NOT NULL,
  `book_to_id` int(11) NOT NULL,
  `book_date` date NOT NULL,
  `book_time` varchar(50) NOT NULL,
  `book_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `book_status` enum('0','1','2') NOT NULL DEFAULT '0',
  `book_pay_status` enum('0','1') NOT NULL DEFAULT '0',
  `book_secret` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='booking table';

--
-- Dumping data for table `ds_booking`
--

INSERT INTO `ds_booking` (`book_id`, `book_from_id`, `book_to_id`, `book_date`, `book_time`, `book_datetime`, `book_status`, `book_pay_status`, `book_secret`) VALUES
(32, 1, 3, '2021-09-29', '04:00 PM', '2021-09-28 07:09:38', '0', '0', 0),
(33, 1, 3, '2021-09-29', '04:00 PM', '2021-09-28 07:11:01', '0', '0', 0),
(34, 1, 3, '2021-09-30', '09:00 PM', '2021-09-28 07:14:46', '0', '0', 0),
(35, 1, 3, '2021-10-01', '01:30 PM', '2021-09-28 07:15:38', '0', '0', 0),
(36, 1, 3, '2021-10-02', '11:00 AM', '2021-09-28 07:16:21', '2', '1', 1),
(37, 1, 3, '2021-10-11', '09:00 PM', '2021-09-28 08:09:48', '2', '1', 1),
(38, 1, 3, '2021-10-18', '01:30 PM', '2021-10-05 04:25:00', '0', '1', 0),
(39, 1, 8, '2021-10-18', '11:00 AM', '2021-10-05 17:05:01', '0', '1', 7645);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ds_booking`
--
ALTER TABLE `ds_booking`
  ADD PRIMARY KEY (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ds_booking`
--
ALTER TABLE `ds_booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
