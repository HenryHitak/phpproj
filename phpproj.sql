-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 07:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userName` varchar(50) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userName`, `password`) VALUES
('admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentId` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `DoctorName` varchar(50) NOT NULL,
  `DoctorNumber` varchar(50) NOT NULL,
  `DoctorGender` varchar(50) NOT NULL,
  `DoctorSpeciality` varchar(50) NOT NULL,
  `DoctorBio` varchar(500) NOT NULL,
  `appointDate` varchar(50) NOT NULL,
  `appointTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentId`, `DoctorID`, `userid`, `DoctorName`, `DoctorNumber`, `DoctorGender`, `DoctorSpeciality`, `DoctorBio`, `appointDate`, `appointTime`) VALUES
(2, 1, 1, 'Hitak', '123456', 'Male', 'Medicine', 'A psychologist usually has an advanced degree, mos', '2022-08-27', '8');

-- --------------------------------------------------------

--
-- Table structure for table `doctorrecords`
--

CREATE TABLE `doctorrecords` (
  `DoctorID` int(11) NOT NULL,
  `DoctorName` varchar(11) NOT NULL,
  `DoctorNumber` int(50) NOT NULL,
  `DoctorGender` varchar(50) NOT NULL,
  `DoctorSpeciality` varchar(50) NOT NULL,
  `DoctorBio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorrecords`
--

INSERT INTO `doctorrecords` (`DoctorID`, `DoctorName`, `DoctorNumber`, `DoctorGender`, `DoctorSpeciality`, `DoctorBio`) VALUES
(1, 'Hitak', 123456, 'Male', 'Medicine', 'A psychologist usually has an advanced degree, mos'),
(2, 'Nak', 234567, 'Male', 'Dermatology', 'Dermatology is the branch of medicine dealing with'),
(3, 'Milad', 99999999, 'Female', 'Allergy and immunology', 'IT specialist'),
(4, 'Alyce', 77777777, 'Female', 'Medicine', 'IT specialist'),
(8, 'admin', 99999999, 'Male', 'Surgery', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `userid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `phoneNumber` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userid`, `name`, `password`, `age`, `phoneNumber`) VALUES
(1, 'admin@gmail.com', 'admin', 20, '44444444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentId`),
  ADD KEY `user_cons` (`userid`);

--
-- Indexes for table `doctorrecords`
--
ALTER TABLE `doctorrecords`
  ADD PRIMARY KEY (`DoctorID`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctorrecords`
--
ALTER TABLE `doctorrecords`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `user_cons` FOREIGN KEY (`userid`) REFERENCES `usertable` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
