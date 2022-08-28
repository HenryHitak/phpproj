-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 22-08-28 21:22
-- 서버 버전: 10.4.21-MariaDB
-- PHP 버전: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `phpproj`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `admin`
--

CREATE TABLE `admin` (
  `userName` varchar(50) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `admin`
--

INSERT INTO `admin` (`userName`, `password`) VALUES
('admin', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `appointment`
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
-- 테이블의 덤프 데이터 `appointment`
--

INSERT INTO `appointment` (`appointmentId`, `DoctorID`, `userid`, `DoctorName`, `DoctorNumber`, `DoctorGender`, `DoctorSpeciality`, `DoctorBio`, `appointDate`, `appointTime`) VALUES
(2, 1, 1, 'Hitak', '123456', 'Male', 'Medicine', 'A psychologist usually has an advanced degree, mos', '2022-08-27', '8');

-- --------------------------------------------------------

--
-- 테이블 구조 `doctorrecords`
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
-- 테이블의 덤프 데이터 `doctorrecords`
--

INSERT INTO `doctorrecords` (`DoctorID`, `DoctorName`, `DoctorNumber`, `DoctorGender`, `DoctorSpeciality`, `DoctorBio`) VALUES
(1, 'Hitak', 123456, 'Male', 'Medicine', 'A psychologist usually has an advanced degree, mos'),
(2, 'Nak', 234567, 'Male', 'Dermatology', 'Dermatology is the branch of medicine dealing with'),
(3, 'Milad', 99999999, 'Female', 'Allergy and immunology', 'IT specialist'),
(4, 'Alyce', 77777777, 'Female', 'Medicine', 'IT specialist'),
(8, 'admin', 99999999, 'Male', 'Surgery', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `Invoice`
--

CREATE TABLE `Invoice` (
  `appointmentId` int(11) NOT NULL,
  `PatientName` int(11) NOT NULL,
  `DoctortName` varchar(100) NOT NULL,
  `PatientEmail` varchar(200) NOT NULL,
  `AppoDate` date NOT NULL,
  `Vtime` date NOT NULL,
  `Ltime` date NOT NULL,
  `preFile` varchar(200) NOT NULL,
  `MSF` int(11) NOT NULL,
  `MF` int(11) NOT NULL,
  `PF` int(11) NOT NULL,
  `Total` varchar(100) NOT NULL,
  `doi` date NOT NULL,
  `pcd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `usertable`
--

CREATE TABLE `usertable` (
  `userid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `phoneNumber` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `usertable`
--

INSERT INTO `usertable` (`userid`, `name`, `password`, `age`, `phoneNumber`) VALUES
(1, 'admin@gmail.com', 'admin', 20, '44444444'),
(2, 'nakhe@hanmail.net', '1234', 22, '12341234');

-- --------------------------------------------------------

--
-- 테이블 구조 `User_DB`
--

CREATE TABLE `User_DB` (
  `user_num` int(11) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `salt` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `User_DB`
--

INSERT INTO `User_DB` (`user_num`, `occupation`, `firstName`, `lastName`, `gender`, `dob`, `email`, `pass`, `phone`, `addr`, `salt`) VALUES
(2, 'admin', 'Nak', 'Kim', 'Male', '1990-07-29', 'nakhe@hanmail.net', '1234', '60497833', '999 spiderman st', 'salt'),
(7, 'doctor', 'Langsdon', 'Phoenix', 'Male', '1987-08-06', 'lphoenix3@joomla.org', '1234', '957-200-8692', '1 Utah Way', 'salt'),
(8, 'general', 'Ara', 'Gutherson', 'Female', '1876-06-20', 'agutherson4@qq.com', '1234', '708-682-3195', '62003 Schurz Parkway', 'salt'),
(9, 'doctor', 'Terrill', 'Cowndley', 'Male', '1879-06-23', 'tcowndley5@deviantart.com', '1234', '973-807-2629', '432 Vidon Street', 'salt'),
(10, 'doctor', 'Edgard', 'Cutts', 'Male', '1768-05-12', 'ecutts6@addthis.com', '1234', '717-781-8801', '9984 Gerald Pass', 'salt'),
(11, 'doctor', 'Maurie', 'Joanaud', 'Male', '1967-05-30', 'mjoanaud7@geocities.com', '1234', '468-543-1551', '09498 International Pass', 'salt'),
(12, 'doctor', 'Katey', 'Druett', 'Female', '2001-05-21', 'kdruett8@tripod.com', '1234', '671-606-3527', '6 Lunder Terrace', 'salt'),
(13, 'general', 'Kayla', 'Shimmin', 'Female', '2004-03-30', 'kshimmin9@oakley.com', '1234', '125-499-6567', '4263 Crescent Oaks Plaza', 'salt'),
(14, 'doctor', 'Quintilla', 'Searight', 'Female', '1984-09-12', 'qsearighta@ebay.co.uk', '1234', '175-622-0821', '96 Stuart Park', 'salt'),
(15, 'general', 'Athene', 'Di Lucia', 'Female', '1834-01-11', 'adiluciab@surveymonkey.com', '1234', '430-303-3878', '1 Di Loreto Junction', 'salt'),
(16, 'doctor', 'John', 'Pandya', 'Male', '1955-03-23', 'jpandyac@histats.com', '1234', '892-969-0908', '66279 Holmberg Plaza', 'salt'),
(17, 'doctor', 'Benji', 'Cullon', 'Male', '1955-05-31', 'bcullond@over-blog.com', '1234', '492-603-2810', '58540 Pennsylvania Street', 'salt'),
(18, 'doctor', 'Rubie', 'Fox', 'Female', '2007-10-22', 'rfoxe@mac.com', '1234', '244-337-5633', '19 Harper Way', 'salt'),
(19, 'doctor', 'Gregorio', 'St. Clair', 'Male', '1987-03-30', 'gstclairf@europa.eu', '1234', '288-974-8271', '26959 Arapahoe Court', 'salt'),
(20, 'general', 'My', 'Trimmill', 'Male', '1967-02-28', 'mtrimmillg@soup.io', '1234', '314-168-7457', '62 Waubesa Drive', 'salt'),
(21, 'admin', 'Dene', 'Yitzovitz', 'Male', '1933-02-19', 'dyitzovitzh@stumbleupon.com', '1234', '434-250-0680', '939 Briar Crest Street', 'salt'),
(22, 'doctor', 'Paloma', 'Camerana', 'Female', '1964-07-24', 'pcameranai@google.it', '1234', '709-195-1632', '8964 Trailsway Junction', 'salt'),
(23, 'doctor', 'Fairlie', 'Chiplin', 'Male', '2004-05-20', 'fchiplinj@wsj.com', '1234', '667-164-1090', '971 Scofield Crossing', 'salt'),
(24, 'general', 'Rodolphe', 'Reichhardt', 'Male', '1877-02-26', 'rreichhardtk@berkeley.edu', '1234', '148-383-6587', '5 Atwood Parkway', 'salt'),
(25, 'general', 'Conant', 'Bosche', 'Male', '1234-02-13', 'cboschel@reference.com', '1234', '219-867-3086', '38 Kinsman Pass', 'salt'),
(26, 'general', 'Tanhya', 'Madigan', 'Female', '1865-12-12', 'tmadiganm@uol.com.br', '1234', '990-529-4911', '315 Mockingbird Avenue', 'salt'),
(27, 'doctor', 'Jsandye', 'Triggol', 'Female', '1965-05-15', 'jtriggoln@ycombinator.com', '1234', '226-579-5927', '252 Anhalt Alley', 'salt'),
(28, 'general', 'Jojo', 'Zanassi', 'Female', '1944-09-26', 'jzanassio@addthis.com', '1234', '127-127-9531', '14148 School Alley', 'salt'),
(29, 'general', 'Debbie', 'Scothorn', 'Female', '1988-05-25', 'dscothornp@intel.com', '1234', '989-955-0471', '2 Hollow Ridge Terrace', 'salt'),
(30, 'doctor', 'Anne-marie', 'Josiah', 'Female', '1999-04-24', 'ajosiahq@yale.edu', '1234', '601-322-8070', '85413 Comanche Terrace', 'salt'),
(31, 'general', 'Veda', 'Buttery', 'Female', '2002-08-17', 'vbutteryr@desdev.cn', '1234', '693-304-0663', '906 Lakewood Crossing', 'salt'),
(32, 'doctor', 'Ly', 'McCully', 'Male', '1966-09-19', 'lmccullys@dot.gov', '1234', '953-966-0675', '9 Oneill Circle', 'salt'),
(33, 'general', 'wowwow', 'kim', 'Male', '2020-01-01', 'nakhe@hanmail.net', '1234', '12345', 'asdfasdf', 'salt'),
(34, 'admin', 'Nakhyeon', 'Kim', 'Male', '2022-08-29', 'nakhe@hanmail.net', 'dsdfa', '2222', 'dhththththth', 'salt'),
(35, 'admin', 'testtest', 'Kim', 'Male', '2022-08-30', 'nakhe@hanmail.net', 'dsdfa', '60497833', 'dhththththth', 'salt'),
(36, 'doctor', 'testtest', 'test', 'Male', '2022-08-18', 'nakhe@hanmail.net', 'dsdfa', '60497833', '871 Roth Avenue', 'salt'),
(37, 'admin', 'nak', 'Kim', 'Male', '2022-08-31', 'nakhe@hanmail.net', 'dsdfa', '636-264-1723', '경기도 성남시 수정구 복정로32번길 22 (복정동)', 'salt');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentId`),
  ADD KEY `user_cons` (`userid`);

--
-- 테이블의 인덱스 `doctorrecords`
--
ALTER TABLE `doctorrecords`
  ADD PRIMARY KEY (`DoctorID`);

--
-- 테이블의 인덱스 `Invoice`
--
ALTER TABLE `Invoice`
  ADD KEY `appoint` (`appointmentId`);

--
-- 테이블의 인덱스 `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userid`);

--
-- 테이블의 인덱스 `User_DB`
--
ALTER TABLE `User_DB`
  ADD PRIMARY KEY (`user_num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `doctorrecords`
--
ALTER TABLE `doctorrecords`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `User_DB`
--
ALTER TABLE `User_DB`
  MODIFY `user_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `user_cons` FOREIGN KEY (`userid`) REFERENCES `usertable` (`userid`);

--
-- 테이블의 제약사항 `Invoice`
--
ALTER TABLE `Invoice`
  ADD CONSTRAINT `appoint` FOREIGN KEY (`appointmentId`) REFERENCES `appointment` (`appointmentId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
