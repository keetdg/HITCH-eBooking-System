-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 02:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstonedb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookid` int(11) NOT NULL,
  `passenger` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `lat1` varchar(255) NOT NULL,
  `lng1` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `driver` varchar(255) NOT NULL,
  `driverid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `traveldistance` decimal(10,2) NOT NULL,
  `tariff` decimal(9,2) NOT NULL,
  `proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookid`, `passenger`, `number`, `location`, `lat`, `lng`, `destination`, `lat1`, `lng1`, `datetime`, `driver`, `driverid`, `userid`, `status`, `traveldistance`, `tariff`, `proof`) VALUES
(17, 'Tudtud, Rogelio', '090-8262-3593', 'Nailon, Cebu, Central Visayas, 6010, Philippines', '11.04743', '124.03902', 'Gairan, Cebu, Central Visayas, 6010, Philippines', '11.04505', '124.01053', '2023-01-24 22:47:21', 'Abao, Stewart', 11, 17, 'Dropped-Off', '2.11', '10.55', ''),
(18, 'Abao, Stewart', '090-8262-3593', 'Bogo, Cebu, Central Visayas, 6010, Philippines', '11.0530536', '124.0110354', 'Bogo, Cebu, Central Visayas, 6010, Philippines', '11.043541662477889', '124.03042408431759', '2023-02-04 21:42:12', 'Alburo, Kim Cloyde', 12, 18, 'Pending', '2.70', '13.52', '');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driverid` int(11) NOT NULL,
  `dfullname` text NOT NULL,
  `dbirthdate` date NOT NULL,
  `dage` int(11) NOT NULL,
  `daddress` text NOT NULL,
  `dgender` varchar(255) NOT NULL,
  `dnumber` varchar(255) NOT NULL,
  `didtype` varchar(255) NOT NULL,
  `dimg` varchar(255) NOT NULL,
  `dusertype` enum('passenger','driver','','') NOT NULL,
  `ddate` datetime NOT NULL DEFAULT current_timestamp(),
  `dstatus` varchar(2555) NOT NULL DEFAULT 'Pending',
  `demail` varchar(255) NOT NULL,
  `dpass` varchar(255) NOT NULL,
  `dconpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverid`, `dfullname`, `dbirthdate`, `dage`, `daddress`, `dgender`, `dnumber`, `didtype`, `dimg`, `dusertype`, `ddate`, `dstatus`, `demail`, `dpass`, `dconpass`) VALUES
(11, 'Abao, Stewart', '2022-12-09', 21, 'Sambag, Bogo City Cebu', 'Male', '090-8262-3593', 'National ID', 'icon.png', 'passenger', '2022-12-09 20:54:30', 'Accepted', 'abaostewart@gmail.com', '123', '123'),
(12, 'Alburo, Kim Cloyde', '2023-01-24', 22, 'Gairan, Bogo City Cebu', 'Male', '090-8263-3593', 'National ID', 'icon.png', 'passenger', '2023-01-24 23:17:44', 'Accepted', 'alburokim@gmail.com', '123', '123'),
(13, 'Valenzuela, Justine', '2023-01-25', 22, 'Bungtod, Bogo City Cebu', 'Male', '090-8262-3593', 'National ID', 'icon.png', 'passenger', '2023-01-25 00:22:03', 'Accepted', 'valenzjustine@gmail.com', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `habalhabal`
--

CREATE TABLE `habalhabal` (
  `habalid` int(11) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `driverid` int(11) NOT NULL,
  `motortype` varchar(255) NOT NULL,
  `station` longtext NOT NULL,
  `route` varchar(255) NOT NULL,
  `fare` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `habalhabal`
--

INSERT INTO `habalhabal` (`habalid`, `driver`, `driverid`, `motortype`, `station`, `route`, `fare`, `status`) VALUES
(26, 'Alburo, Kim Cloyde', 12, 'Yamaha', 'Gairan, Bogo City Cebu', '7', '5', 'Available'),
(27, 'Valenzuela, Justine', 13, 'Suzuki', 'Bungtod, Bogo City Cebu', '8', '5', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `lat`, `lng`, `address`) VALUES
(36, 11.052465, 124.038689, '');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receiptid` int(11) NOT NULL,
  `passenger` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `driver` varchar(255) NOT NULL,
  `distance` int(11) NOT NULL,
  `fare` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `proofofpayment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `routeid` int(11) NOT NULL,
  `route` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`routeid`, `route`) VALUES
(7, 'Nailon-Gairan'),
(8, 'Dakit-Bungtod');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `ufullname` varchar(255) NOT NULL,
  `ubirthdate` date NOT NULL,
  `uage` int(11) NOT NULL,
  `uaddress` varchar(255) NOT NULL,
  `ugender` varchar(255) NOT NULL,
  `unumber` varchar(255) NOT NULL,
  `uidtype` varchar(255) NOT NULL,
  `uimg` varchar(255) NOT NULL,
  `uusertype` enum('passenger','driver','','') NOT NULL,
  `ddate` datetime NOT NULL DEFAULT current_timestamp(),
  `uemail` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `uconpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `ufullname`, `ubirthdate`, `uage`, `uaddress`, `ugender`, `unumber`, `uidtype`, `uimg`, `uusertype`, `ddate`, `uemail`, `upass`, `uconpass`) VALUES
(17, 'Tudtud, Rogelio', '2023-01-24', 21, 'Nailon, Bogo City Cebu', 'Male', '090-8262-3593', 'National ID', 'profile.png', 'passenger', '2023-01-24 22:31:42', 'rogeliotudtud@gmail.com', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70'),
(18, 'Abao, Stewart', '2023-02-03', 21, 'Gairan, Bogo City Cebu', 'Male', '090-8262-3593', 'National ID', 'icon.png', 'passenger', '2023-02-03 13:11:27', 'stewartabao@gmail.com', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(10, 'admin2', '1234', 'adminn'),
(11, 'Keet', '1231', 'Jenn Keith Gastador');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driverid`),
  ADD UNIQUE KEY `demail` (`demail`);

--
-- Indexes for table `habalhabal`
--
ALTER TABLE `habalhabal`
  ADD PRIMARY KEY (`habalid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receiptid`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`routeid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `u_email` (`uemail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driverid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `habalhabal`
--
ALTER TABLE `habalhabal`
  MODIFY `habalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receiptid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `routeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
