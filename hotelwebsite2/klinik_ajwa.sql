-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 11:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik_ajwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_c` int(7) NOT NULL,
  `name_c` varchar(30) CHARACTER SET latin1 NOT NULL,
  `checkin_c` varchar(15) NOT NULL,
  `checkout_c` varchar(15) NOT NULL,
  `roomtype_c` varchar(100) CHARACTER SET latin1 NOT NULL,
  `contact_c` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_c`, `name_c`, `checkin_c`, `checkout_c`, `roomtype_c`, `contact_c`) VALUES
(73, 'faiz azrai', '7/11/2022', '9/11/2022', 'Seaview room', '0169875643'),
(78, 'arip', '5/10/2022', '7/10/2022', 'superior', '0195678976'),
(79, 'mirul faruqi', '8/9/2022', '10/9/2022', 'double room', '09865432246'),
(80, 'Kai Bahar', '10/10/2022', '12/10/2022', 'Double room', '0187689675'),
(83, 'fayad hilmi', '7/8/2022', '8/8/2022', 'deluxe room', '0167865465');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(7) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `phone_num`, `email`, `position`, `password`) VALUES
(1000, 'luqz', '123456', 'luqking@gmail.com', 'manager', 'luq123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_c`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_c` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
