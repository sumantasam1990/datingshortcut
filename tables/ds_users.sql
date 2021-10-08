-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 06:01 PM
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
-- Table structure for table `ds_users`
--

CREATE TABLE `ds_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime DEFAULT NULL,
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `photo_status` int(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ds_users`
--

INSERT INTO `ds_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`, `photo_status`) VALUES
(1, 'admin', '$P$BcS6UgihjswCvwvfKNIIKWqDSl17Y2.', 'admin', 'sumantasam1990@gmail.com', 'http://localhost/wordpress', '2021-09-11 15:05:51', '', 0, 'admin', 2),
(2, 'sumanta', '$P$B8VFwNaggNQkh/3O/mjbPDwf5kMAZZ1', 'sumanta', 'sumanta.php@gmail.com', '', '2021-09-18 11:25:39', '', 0, 'sumanta', 0),
(3, 'maria', '$P$Bh2tWYq/4brAYxxnQDr3rVLSb6lJY..', 'maria', 'maria@gmail.com', '', '2021-09-18 15:02:30', '', 0, 'maria', 0),
(8, 'jennifer', '$P$Boe1ffCoGKTQNiRZuzDjAJeknQZ7NU/', 'jennifer', 'jennifer@gmail.com', '', '2021-10-05 06:15:38', '', 0, 'jennifer', 0),
(9, 'user007', '$P$BETmgAPxbYtYezi./i1wLiNvfinyja0', 'user007', 'user@gmail.com', '', '2021-10-08 08:25:30', '', 0, 'user007', 0),
(10, 'katrina', '$P$BwvVMXBI8abIKPAYTd1qTliT0oy5wZ.', 'katrina', 'katrina@gmail.com', '', '2021-10-08 09:03:51', '', 0, 'Katrina Cat', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ds_users`
--
ALTER TABLE `ds_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ds_users`
--
ALTER TABLE `ds_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
