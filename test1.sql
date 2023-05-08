-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 08:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `apicall`
--

CREATE TABLE `apicall` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apicall`
--

INSERT INTO `apicall` (`id`, `user_id`, `timestamp`) VALUES
(1, 1, '2023-05-07 14:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `dbt_user`
--

CREATE TABLE `dbt_user` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbt_user`
--

INSERT INTO `dbt_user` (`id`, `name`, `email`, `password`) VALUES
(1, 'pavan', 'pavanvikky99@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, '', 'pavanvikky99@gmail.com1', 'd00f5d5217896fb7fd601412cb890830'),
(3, '', 'pavanvikky99@gmail.com21', '4e9856db5da0f76588ab99ea40eb8c1b'),
(4, '4', 'pavanvikky99@gmail.com211', '4e9856db5da0f76588ab99ea40eb8c1b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apicall`
--
ALTER TABLE `apicall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbt_user`
--
ALTER TABLE `dbt_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apicall`
--
ALTER TABLE `apicall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dbt_user`
--
ALTER TABLE `dbt_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
