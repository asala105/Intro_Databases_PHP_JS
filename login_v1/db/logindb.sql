-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 07:01 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `gender`) VALUES
(5, 'asala', 'asala@mail.com', '846f908172968ed0c763c2db3f49a7b35a8baa1396fb528b6167ba86490c0596', 1),
(7, 'alissar', 'alissar@mail.com', 'd20053f7935224a8e53a9e535d20ac2b44e896ecc2410321a4098fd92ba2317c', 1),
(8, 'ali', 'ali@mail.com', '311339a6c86e58717f1f145db47d191d426fb0844f0400180741196c1e8f4e18', 0),
(9, 'goerge', 'goerge@mail.com', '00cca4f22ce41583839abe15ab59c65ac8aafea2020fa9cea190c366027e86b5', 0),
(10, 'tala', 'tala@email.com', 'c0a438edba51135451b2da182ad5d6e51452dcf33c5aa9d0b10cd35990fbdf38', 1),
(11, 'julia', 'julia@mail.com', '4ad1c8c319644482cba72b92c7f9d6bef189be33b870dc5988c34564f7e42040', 1),
(12, 'mohammad', 'mohammad@mail.com', 'fdfe39eae852df89315b0fba0d465d8df50ced00305227841fe1a615d1cfeafd', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
