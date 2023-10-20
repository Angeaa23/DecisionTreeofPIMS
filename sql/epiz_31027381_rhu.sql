-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql308.epizy.com
-- Generation Time: Mar 02, 2022 at 09:26 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31027381_rhu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `address`, `contactno`, `email`, `password`, `regDate`, `updationDate`) VALUES
(1, 'Admin', 'Agdangan', '09123456789', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-11-26 07:57:33', '26-11-2021 01:57:35 PM');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `adminID` int(10) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `adminID`, `specialization`, `fullName`, `address`, `contactno`, `email`, `password`, `regDate`, `updationDate`) VALUES
(1, 1, 'General Physician', 'Felixberto Ilagan', 'Agdangan', '09123456789', 'felixbertoilagan@gmail.com', '3e76deee91d43d29d02a270ceefc725f', '2021-11-25 06:19:23', '2021-12-17 05:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(64, 1, 'felixbertoilagan@gmail.com', 0x3136322e3135382e3137392e31373000, '2022-02-11 15:26:38', '11-02-2022 09:00:58 PM', 1),
(65, 1, 'felixbertoilagan@gmail.com', 0x3137322e36382e3235332e3437000000, '2022-02-12 03:20:23', '12-02-2022 08:51:58 AM', 1),
(66, 1, 'felixbertoilagan@gmail.com', 0x3136322e3135382e3137382e38370000, '2022-02-12 03:22:51', '12-02-2022 09:00:32 AM', 1),
(67, 1, 'felixbertoilagan@gmail.com', 0x3137322e36382e3235342e3635000000, '2022-02-12 05:16:23', '12-02-2022 10:48:19 AM', 1),
(68, 1, 'felixbertoilagan@gmail.com', 0x3136322e3135382e3137392e38380000, '2022-02-12 06:08:09', '12-02-2022 11:40:36 AM', 1),
(70, 1, 'felixbertoilagan@gmail.com', 0x3136322e3135382e3137382e32313200, '2022-02-17 02:59:55', '17-02-2022 08:55:13 AM', 1),
(71, 1, 'felixbertoilagan@gmail.com', 0x3137322e36382e3235342e3635000000, '2022-02-17 04:06:04', '17-02-2022 09:37:53 AM', 1),
(72, 1, 'felixbertoilagan@gmail.com', 0x3137322e36392e33342e333000000000, '2022-02-17 04:21:59', '17-02-2022 09:54:05 AM', 1),
(74, 1, 'felixbertoilagan@gmail.com', 0x3137322e37302e3230362e3232390000, '2022-02-17 07:48:57', '17-02-2022 02:06:18 PM', 1),
(75, 1, 'felixbertoilagan@gmail.com', 0x3137322e36392e33342e373400000000, '2022-02-17 09:27:15', '17-02-2022 03:08:56 PM', 1),
(76, 1, 'felixbertoilagan@gmail.com', 0x3137322e36382e3235332e3700000000, '2022-02-17 13:39:37', '17-02-2022 07:18:31 PM', 1),
(77, 1, 'felixbertoilagan@gmail.com', 0x3136322e3135382e3137392e32313200, '2022-02-17 14:26:33', '17-02-2022 08:00:33 PM', 1),
(78, 1, 'felixbertoilagan@gmail.com', 0x3136322e3135382e3137392e32313200, '2022-02-17 14:48:10', '17-02-2022 08:32:57 PM', 1),
(81, 1, 'felixbertoilagan@gmail.com', 0x3136322e3135382e3137382e36350000, '2022-02-19 06:46:35', '19-02-2022 12:22:52 PM', 1),
(82, 1, 'felixbertoilagan@gmail.com', 0x3136322e3135382e3137382e31303200, '2022-02-23 08:20:49', '23-02-2022 01:55:04 PM', 1),
(86, 1, 'felixbertoilagan@gmail.com', 0x3136322e3135382e3137382e38370000, '2022-02-23 09:55:29', '23-02-2022 03:27:36 PM', 1),
(87, 1, 'felixbertoilagan@gmail.com', 0x3137322e36382e3235342e3635000000, '2022-02-23 10:28:55', '23-02-2022 04:03:03 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecialization`
--

CREATE TABLE `doctorspecialization` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecialization`
--

INSERT INTO `doctorspecialization` (`id`, `uid`, `specialization`, `creationDate`, `updationDate`) VALUES
(1, 1, 'General Physician', '2016-12-28 06:37:25', '2021-12-17 19:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `dutypersonnel`
--

CREATE TABLE `dutypersonnel` (
  `id` int(11) NOT NULL,
  `adminID` int(10) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `dutyName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `dutyEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dutypersonnel`
--

INSERT INTO `dutypersonnel` (`id`, `adminID`, `specialization`, `dutyName`, `address`, `contactno`, `dutyEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 1, 'Registered Midwife', 'Abesamis, Marianne Grace H.', 'Agdangan', '09123456789', 'mariannegraceabesamis@gmail.com', '556beb0a31cb97e340cfc95ddbf1042f', '2021-02-26 04:59:54', '2021-12-17 05:56:09'),
(2, 1, 'Registered Nurse', 'Argoso, Gerilyn T.', 'Agdangan', '09123456789', 'gerilynargoso@gmail.com', '219a985431bd268293062797e2090ca3', '2021-02-26 05:01:52', '2021-12-17 05:56:15'),
(3, 1, 'Registered Nurse', 'Arzadon, Mae Angela B.', 'Agdangan', '09123456789', 'maeangelaarzadon@gmail.com', '18db2f0b6cee9ee27032a66c2e14eaee', '2021-02-26 05:03:21', '2021-12-17 05:56:18'),
(4, 1, 'Registered Nurse', 'Baltazar, Raquel Anne A.', 'Agdangan', '09123456789', 'raquelannebaltazar@gmail.com', '473845f73040ebd0629532603eff777e', '2021-02-26 05:04:50', '2021-12-17 05:56:21'),
(5, 1, 'Registered Nurse', 'Manimtim, Rica Blanca J.', 'Agdangan', '9123456789', 'ricablancamanimtim@gmail.com', '86631b23e13fdcc606468a09bded7b9e', '2021-02-26 05:06:09', '2021-12-17 05:56:25'),
(6, 1, 'Registered Nurse', 'Menor, Maria Cristina A.', 'Agdangan', '09123456789', 'mariacristinamenor@gmail.com', '5cccc326195090c37b638999f3ee1b85', '2021-02-26 05:07:14', '2021-12-17 05:56:28'),
(7, 1, 'Registered Nurse', 'Naag, Princess Ricamae V.', 'Agdangan', '09123456789', 'princessricamaenaag@gmail.com', '92ce0fb6133b6368f5ce977eb860270f', '2021-02-26 05:08:29', '2021-12-17 05:56:31'),
(8, 1, 'Registered Nurse', 'Ormilla, Ruth D.', 'Agdangan', '09123456789', 'ruthormilla@gmail.com', '795051b9b305117c2cbd511b276da552', '2021-02-26 05:09:33', '2021-12-17 05:56:33'),
(9, 1, 'Registered Nurse', 'Uy, Abbygail Cristy A.', 'Agdangan', '09123456789', 'abbygailcristyuy@gmail.com', 'fdc100c7c8e4cf848180c3ea278a7906', '2021-02-26 05:11:28', '2021-12-17 05:56:37'),
(10, 1, 'Registered Nurse', 'Vargas, Elienie Lucelle E.', 'Agdangan', '09123456789', 'elienielucellevargas@gmail.com', 'e6ef2531e36e55a13665eae0b853210e', '2021-02-26 05:14:15', '2021-12-17 05:56:40'),
(11, 1, 'Administrative Aide', 'Villocillo, Mariel Celeste V.', 'Agdangan', '09123456789', 'marielcelestevillocillo@gmail.com', '44e7f1ab6f061613ade85c0a62e492ca', '2021-02-26 05:15:08', '2021-12-17 05:56:43'),
(12, 1, 'Registered Nurse', 'Yulip, Immi I.', 'Agdangan', '09123456789', 'immiyulip@gmail.com', 'bc650fc4c5596dcbd429999dcd063e89', '2021-02-26 05:16:36', '2021-12-17 05:56:47'),
(13, 2, 'Registered Nurse', 'Abesamis, Marianne Grace B.', 'Agdangan', '09123456789', 'adriane@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-12-17 06:52:00', '2021-12-17 18:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `dutypersonnelslog`
--

CREATE TABLE `dutypersonnelslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dutypersonnelslog`
--

INSERT INTO `dutypersonnelslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(41, 11, 'marielcelestevillocillo@gmail.com', 0x3136322e3135382e3137392e31373000, '2022-02-11 15:24:58', '12-02-2022 09:21:54 AM', 1),
(46, 11, 'marielcelestevillocillo@gmail.com', 0x3136322e3135382e3137382e32313200, '2022-02-17 04:24:19', '17-02-2022 10:18:32 AM', 1),
(47, 11, 'marielcelestevillocillo@gmail.com', 0x3137322e36392e33332e323437000000, '2022-02-17 09:20:36', '17-02-2022 02:58:26 PM', 1),
(48, 11, 'marielcelestevillocillo@gmail.com', 0x3136322e3135382e3137392e32343000, '2022-02-17 13:25:39', '17-02-2022 07:10:54 PM', 1),
(49, 11, 'marielcelestevillocillo@gmail.com', 0x3136322e3135382e3137382e32343600, '2022-02-19 06:34:41', '19-02-2022 12:17:05 PM', 1),
(51, 11, 'marielcelestevillocillo@gmail.com', 0x3137322e36382e3235332e3700000000, '2022-02-23 08:18:21', '23-02-2022 01:52:23 PM', 1),
(53, 11, 'marielcelestevillocillo@gmail.com', 0x3136322e3135382e3137382e38370000, '2022-02-23 09:56:44', '23-02-2022 03:28:49 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dutypersonnelspecialization`
--

CREATE TABLE `dutypersonnelspecialization` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dutypersonnelspecialization`
--

INSERT INTO `dutypersonnelspecialization` (`id`, `uid`, `specialization`, `creationDate`, `updationDate`) VALUES
(1, 1, 'Registered Nurse', '2021-02-13 21:25:37', '2021-12-17 19:06:35'),
(2, 1, 'Registered Midwife', '2021-02-13 21:29:15', '2021-12-17 19:06:38'),
(3, 1, 'Administrative Aide', '2021-02-13 21:50:45', '2021-12-17 19:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `HealthCenter` varchar(200) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `ContactNo` varchar(12) DEFAULT NULL,
  `EmailAdd` mediumtext DEFAULT NULL,
  `OpeningHour` varchar(200) DEFAULT NULL,
  `Doctor` mediumtext DEFAULT NULL,
  `About` mediumtext DEFAULT NULL,
  `Map` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `HealthCenter`, `Address`, `ContactNo`, `EmailAdd`, `OpeningHour`, `Doctor`, `About`, `Map`) VALUES
(1, 'Agdangan Rural Health Unit', 'Agdangan, Quezon', '+63425497210', 'rhuagdangan@yahoo.com.ph', '8:00 AM - 5:00 PM (Mon-Fri)', 'Felixberto L. Ilagan', 'A government owned health center located in Agdangan, Quezon.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991561.5762272379!2d121.43070821521809!3d13.8817554825565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a2bec62ed509bb%3A0xcc239840d05bcd2e!2sAgdangan%20Rural%20Health%20Unit!5e0!3m2!1sen!2sph!4v1611680958862!5m2!1sen!2sph');

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `PatientAge` varchar(100) DEFAULT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Height` varchar(100) DEFAULT NULL,
  `Bmi` decimal(6,1) DEFAULT NULL,
  `BmiCategory` varchar(100) DEFAULT NULL,
  `WaistCircum` varchar(100) DEFAULT NULL,
  `BirthWeight` varchar(100) DEFAULT NULL,
  `BirthLength` varchar(100) DEFAULT NULL,
  `MedHistory` varchar(100) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `PatientAge`, `Weight`, `Height`, `Bmi`, `BmiCategory`, `WaistCircum`, `BirthWeight`, `BirthLength`, `MedHistory`, `MedicalPres`, `CreationDate`, `UpdationDate`) VALUES
(1, 3, '21 years old', '45', '160', '17.6', 'Underweight', '26', 'N/A', 'N/A', 'Flu', 'Allerta', '2022-02-11 00:27:37', '2022-02-11 00:42:29'),
(2, 1, '22 years old', '47', '154', '19.8', 'Normal', '26', 'N/A', 'N/A', 'Allergy', 'Allerta', '2022-02-11 00:27:31', NULL),
(4, 2, '22 years old', '55', '154', '23.2', 'Normal', '29', 'N/A', 'N/A', 'Cold', 'Neozep', '2022-02-11 00:27:24', NULL),
(14, 4, '30 years old', '83', '167', '29.8', 'Overweight', '33', 'N/A', 'N/A', 'Flu', 'Paracetamol', '2022-02-11 00:29:09', NULL),
(17, 5, '1 month old', 'N/A', 'N/A', '20.1', 'Normal', '26', '23', '24', 'Allergy', 'Allerta', '2022-02-11 00:29:27', '2022-02-11 02:01:57'),
(26, 10, '1 month old', 'N/A', 'N/A', '11.6', 'Underweight', '3', '2.9', '50', 'Flu', 'Paracetamol', '2022-02-17 09:30:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Dutyid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` varchar(11) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientBirthplace` varchar(200) DEFAULT NULL,
  `PatientBirthday` date DEFAULT NULL,
  `PatientCivil` varchar(50) DEFAULT NULL,
  `PatientReligion` varchar(200) DEFAULT NULL,
  `PatientBlood` varchar(50) DEFAULT NULL,
  `MotherName` varchar(200) DEFAULT NULL,
  `MotherBirthday` date DEFAULT NULL,
  `PhilhealthMember` varchar(50) DEFAULT NULL,
  `PhilhealthStatus` varchar(50) DEFAULT NULL,
  `PatientRegion` varchar(200) DEFAULT NULL,
  `DswdMember` varchar(50) DEFAULT NULL,
  `BloodPressure` varchar(100) DEFAULT NULL,
  `PulseRate` varchar(100) DEFAULT NULL,
  `BodyTemperature` varchar(100) DEFAULT NULL,
  `BpMeasurement` varchar(100) DEFAULT NULL,
  `IntakeMed` varchar(200) DEFAULT NULL,
  `AdministeredBy` varchar(200) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Dutyid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientBirthplace`, `PatientBirthday`, `PatientCivil`, `PatientReligion`, `PatientBlood`, `MotherName`, `MotherBirthday`, `PhilhealthMember`, `PhilhealthStatus`, `PatientRegion`, `DswdMember`, `BloodPressure`, `PulseRate`, `BodyTemperature`, `BpMeasurement`, `IntakeMed`, `AdministeredBy`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(1, 11, 'Darby May Arazo', '09123456789', 'darbymayarazo@gmail.com', 'Female', 'Danlagan, Padre Burgos, Quezon', 'Nabua, Camarines, Sur', '1999-12-21', 'Single', 'Born Again Christian', 'O+', 'Marian Ireno Bensal', '1978-04-17', 'Yes', 'Dependent', 'IV-A - CALABARZON', 'No', '80/110', '72', '36', 'Non Hypertensive', 'N/A', 'Villocillo, Mariel Celeste V.', 'Allergy', '2021-11-25 07:16:51', '2022-02-11 03:05:37'),
(2, 11, 'Adriane Parafina', '09079678827', 'adrianeparafina@gmail.com', 'Male', 'Ilayang Kinagunan, Agdangan, Quezon', 'Nabua, Camarines, Sur', '1999-10-03', 'Single', 'Roman Catholic', 'A+', 'Marian Ireno Bensal', '1978-04-17', 'Yes', 'Dependent', 'IV-A - CALABARZON', 'Yes', '80/100', '72', '37', 'Non Hypertensive', 'N/A', 'Villocillo, Mariel Celeste V.', 'Cold', '2021-11-25 21:50:52', '2022-02-08 22:32:27'),
(3, 11, 'Liz Zaira Autor', '09461855489', 'lizzairaautor@gmail.com', 'Female', 'Poblacion 2, Agdangan, Quezon', 'Nabua, Camarines, Sur', '2000-03-14', 'Married', 'Born Again Christian', 'B+', 'Gina Briozo Autor', '1970-04-06', 'Yes', 'Member', 'IV-A - CALABARZON', 'Yes', '80/110', '77', '38', 'Non Hypertensive', 'N/A', 'Villocillo, Mariel Celeste V.', 'Cough', '2021-11-25 21:54:43', '2022-02-11 02:29:48'),
(4, 11, 'Ryan Villalon', '09123456789', 'ryanvillalon01@gmail.com', 'Male', 'Unisan, Quezon', 'Agdangan, Quezon', '1991-03-29', 'Married', 'Born Again', 'A+', 'Ashie', '2022-01-04', 'Yes', 'Member', 'IV-A - CALABARZON', 'No', '80/110', '77', '36', 'Non Hypertensive', 'N/A', 'Abesamis, Marianne Grace H., RM', 'Cough', '2022-01-07 23:07:20', '2022-02-11 00:28:48'),
(5, 11, 'James Reid', '09123456789', 'jamesreid@gmail.com', 'Male', 'Australia', 'California', '2021-12-10', 'Single', 'Christian', 'AB+', 'Maria Aprilyn Marquinez', '2021-12-15', 'No', 'N/A', 'XII - SOCCSKSARGEN', 'Yes', '80/110', '77', '35', 'Non Hypertensive', 'N/A', 'Villocillo, Mariel Celeste V.', 'Allergy', '2022-02-03 20:48:47', '2022-02-17 03:12:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecialization`
--
ALTER TABLE `doctorspecialization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dutypersonnel`
--
ALTER TABLE `dutypersonnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dutypersonnelslog`
--
ALTER TABLE `dutypersonnelslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dutypersonnelspecialization`
--
ALTER TABLE `dutypersonnelspecialization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `doctorspecialization`
--
ALTER TABLE `doctorspecialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dutypersonnel`
--
ALTER TABLE `dutypersonnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dutypersonnelslog`
--
ALTER TABLE `dutypersonnelslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `dutypersonnelspecialization`
--
ALTER TABLE `dutypersonnelspecialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
