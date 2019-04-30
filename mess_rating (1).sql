-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2019 at 04:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mess_rating`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `rollno` varchar(9) NOT NULL,
  `text` varchar(1500) NOT NULL,
  `mess` varchar(100) NOT NULL,
  `review_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`month`, `year`, `rollno`, `text`, `mess`, `review_number`) VALUES
(4, 2019, '170123047', 'Bad bad bad awesome', 'Umiam', 3),
(4, 2019, '170101086', 'awesome and horrible', 'Kameng', 6),
(2, 2019, '170101086', 'horrible', 'Barak', 7),
(2, 2018, '170101086', 'AWESOME', 'Kameng', 8),
(4, 2019, '170101085', 'horrible', 'Kameng', 9),
(4, 2019, '170101081', 'bad bad', 'Umiam', 10),
(4, 2019, '170101078', 'awesome', 'Umiam', 11);

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `word` varchar(100) NOT NULL,
  `points` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`word`, `points`) VALUES
('awesome', 8),
('bad', 2),
('horrible', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mess_manager`
--

CREATE TABLE `mess_manager` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mess` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mess_manager`
--

INSERT INTO `mess_manager` (`username`, `password`, `mess`, `name`) VALUES
('lullu', '202cb962ac59075b964b07152d234b70', 'Barak', 'Lavish Gulati'),
('annanya', '900150983cd24fb0d6963f7d28e17f72', 'Kameng', 'Annanya Pratap Singh'),
('chirag', '900150983cd24fb0d6963f7d28e17f72', 'Lohit', 'Chirag Gupta'),
('barnu', '202cb962ac59075b964b07152d234b70', 'Umiam', 'Mayank Baranwall');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `username` varchar(9) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mess` varchar(20) NOT NULL,
  `next_mess` varchar(20) NOT NULL,
  `hostel` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`username`, `password`, `mess`, `next_mess`, `hostel`, `name`) VALUES
('170101078', '900150983cd24fb0d6963f7d28e17f72', 'Umiam', 'Umiam', 'Umiam', 'vakul'),
('170101081', '900150983cd24fb0d6963f7d28e17f72', 'Umiam', 'Umiam', 'Umiam', 'Uddu'),
('170101086', '202cb962ac59075b964b07152d234b70', 'Kameng', 'Kameng', 'Kameng', 'Shivang Dalal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`review_number`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`word`);

--
-- Indexes for table `mess_manager`
--
ALTER TABLE `mess_manager`
  ADD PRIMARY KEY (`mess`),
  ADD UNIQUE KEY `user_unique` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `review_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
