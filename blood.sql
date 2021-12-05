-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 02:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `image`) VALUES
(1, 'admin', 'admin', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock`
--

CREATE TABLE `blood_stock` (
  `id` int(11) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_stock`
--

INSERT INTO `blood_stock` (`id`, `bloodgroup`, `quantity`) VALUES
(1, 'A-', 60),
(2, 'A+', 60),
(3, 'O-', 68),
(4, 'O+', 110),
(5, 'B-', 21),
(6, 'B+', 34),
(7, 'AB-', 32),
(8, 'AB+', 23);

-- --------------------------------------------------------

--
-- Table structure for table `donate_blood`
--

CREATE TABLE `donate_blood` (
  `id` int(11) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` date NOT NULL,
  `donor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donate_blood`
--

INSERT INTO `donate_blood` (`id`, `bloodgroup`, `unit`, `disease`, `age`, `status`, `date`, `donor_id`) VALUES
(1, 'O-', 12, 'nothing', 22, 'approved', '2021-12-03', 1),
(2, 'A-', 60, 'nothing', 22, 'approved', '2021-12-04', 1),
(3, 'AB+', 12, 'nothing', 22, 'reject', '2021-12-04', 1),
(4, 'O+', 60, 'nothing', 22, 'approved', '2021-12-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `bloodgroup` varchar(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `bloodgroup`, `first_name`, `last_name`, `username`, `password`, `address`, `phone_number`, `image`) VALUES
(1, 'O+', 'user', 'user', 'user', 'user', 'Amman, Jordan', '0771234567', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `donor_blood_request`
--

CREATE TABLE `donor_blood_request` (
  `id` int(11) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_age` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `donor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_blood_request`
--

INSERT INTO `donor_blood_request` (`id`, `bloodgroup`, `patient_name`, `patient_age`, `reason`, `unit`, `date`, `status`, `donor_id`) VALUES
(1, 'O+', 'mohammad', 23, 'cancer', 12, '2021-12-03', 'pending', 1),
(2, 'O+', 'mohammad', 23, 'cancer', 12, '2021-12-03', 'pending', 1),
(3, 'O-', 'mohammad', 23, 'cancer', 12, '2021-12-03', 'pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `username`, `first_name`, `last_name`, `password`, `bloodgroup`, `age`, `doctor_name`, `disease`, `address`, `phone_number`, `image`) VALUES
(1, 'user', 'user', 'user', 'user', 'O+', 22, 'mohammad', 'Nothing', 'Amman, Jordan', '0771234567', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `patient_blood_request`
--

CREATE TABLE `patient_blood_request` (
  `id` int(11) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_age` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_blood_request`
--

INSERT INTO `patient_blood_request` (`id`, `bloodgroup`, `patient_name`, `patient_age`, `reason`, `unit`, `date`, `status`, `patient_id`) VALUES
(1, 'O+', 'mohammad', 23, 'cancer', 12, '2021-12-03', 'pending', 1),
(2, 'O+', 'mohammad', 23, 'cancer', 12, '2021-12-03', 'pending', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate_blood`
--
ALTER TABLE `donate_blood`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor_blood_request`
--
ALTER TABLE `donor_blood_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_blood_request`
--
ALTER TABLE `patient_blood_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood_stock`
--
ALTER TABLE `blood_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donate_blood`
--
ALTER TABLE `donate_blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donor_blood_request`
--
ALTER TABLE `donor_blood_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_blood_request`
--
ALTER TABLE `patient_blood_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donate_blood`
--
ALTER TABLE `donate_blood`
  ADD CONSTRAINT `donate_blood_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor_blood_request`
--
ALTER TABLE `donor_blood_request`
  ADD CONSTRAINT `donor_blood_request_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_blood_request`
--
ALTER TABLE `patient_blood_request`
  ADD CONSTRAINT `patient_blood_request_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
