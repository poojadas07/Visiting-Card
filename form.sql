-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2020 at 04:56 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `job` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `service1` varchar(100) NOT NULL,
  `service2` varchar(100) NOT NULL,
  `about` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `resume` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `land_mark` varchar(100) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `district` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `code` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `social_account_1` varchar(100) NOT NULL,
  `social_account_2` varchar(100) NOT NULL,
  `social_account_3` varchar(100) NOT NULL,
  `social_account_4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `first_name`, `last_name`, `age`, `job`, `company`, `service1`, `service2`, `about`, `photo`, `resume`, `address`, `land_mark`, `zip_code`, `district`, `country`, `code`, `phone`, `email`, `social_account_1`, `social_account_2`, `social_account_3`, `social_account_4`) VALUES
(1, 'Pooja', 'Das', 21, 'Web Developer', 'KingsLabs Pvt. Ltd.', 'Full Stack Web Developer', 'Collaboration', 'I am full stack web developer and highly interested in collaboration .', 'bg.jpg', 'bg.jpg', 'IIIT Bbbsr', 'Near IIIT ', 754200, 'Kannur', 'India', 91, '6370677192', 'poojadas04kv@gmail.com', 'poojadas07', 'pooja_das_07', 'PoojaDas07', 'pooja-das07'),
(2, 'Archana', 'Das', 15, 'Software Developer', 'KingsLab', 'Web Designing', 'Full Stack Web Developer', 'I am a software developer and also have knowledge of web development.', 'bg.jpg', 'bg.jpg', 'IIIT Bhubaneswar , Odisha ', 'Near IIIT', 754200, 'Idukki', 'India', 91, '6370677192', 'poojadas04kv@gmail.com', 'poojadas07', 'pooja_das_07', 'pooja-das07', 'PoojaDas07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `first_name` (`first_name`,`last_name`,`age`,`job`,`company`,`service1`,`service2`,`about`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
