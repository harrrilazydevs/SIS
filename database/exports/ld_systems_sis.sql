-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2021 at 11:01 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ld_systems_sis`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_accounts`
--

CREATE TABLE `applicant_accounts` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `mobile_no` text NOT NULL,
  `password` text NOT NULL,
  `date_of_application` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_accounts`
--

INSERT INTO `applicant_accounts` (`id`, `email`, `mobile_no`, `password`, `date_of_application`) VALUES
(3, 'kdlanguido@gmail.com', '6487897897', 'aa4ed9b78a4f4b6200fe4134fa7b31089085868f', '2021-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_information`
--

CREATE TABLE `applicant_information` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_information`
--

INSERT INTO `applicant_information` (`id`, `applicant_id`, `program_id`, `lastname`, `firstname`, `middlename`, `status`) VALUES
(1, 3, 4, 'languido', 'king dranreb', 'd', 'COMPLETE');

-- --------------------------------------------------------

--
-- Table structure for table `program_list`
--

CREATE TABLE `program_list` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_list`
--

INSERT INTO `program_list` (`id`, `school_id`, `name`) VALUES
(1, 1, 'CIVIL ENGINEER'),
(2, 1, 'ELECTRICAL ENGINEER'),
(3, 2, 'LEGAL MANAGEMENT'),
(4, 2, 'MARKETING MANAGEMENT');

-- --------------------------------------------------------

--
-- Table structure for table `requirement_list`
--

CREATE TABLE `requirement_list` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirement_list`
--

INSERT INTO `requirement_list` (`id`, `name`) VALUES
(1, 'FORM-137'),
(2, 'TRANSCRIPT OF RECORDS WITH SEAL'),
(3, 'HIGHSCHOOL DIPLOMA'),
(4, 'GOOD MORAL CERTIFICATE'),
(5, 'NSO BIRTH CERTIFICATE'),
(6, 'PROOF OF RESIDENCY'),
(7, 'NBI CLEARANCE'),
(8, '2x2 ID PICTURE'),
(9, 'MARRIAGE CERTIFICATE'),
(10, 'MEDICAL CERTIFICATE');

-- --------------------------------------------------------

--
-- Table structure for table `school_list`
--

CREATE TABLE `school_list` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_list`
--

INSERT INTO `school_list` (`id`, `name`) VALUES
(1, 'SCHOOL OF ENGINEERING'),
(2, 'SCHOOL OF MANAGEMENT, ACCOUNTANCY, REAL ESTATE, TOURISM');

-- --------------------------------------------------------

--
-- Table structure for table `student_requirement_records`
--

CREATE TABLE `student_requirement_records` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `requirement_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `file_directory` text NOT NULL,
  `date_submitted` date NOT NULL,
  `requirement_status` text NOT NULL,
  `approvers_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_requirement_records`
--

INSERT INTO `student_requirement_records` (`id`, `applicant_id`, `requirement_id`, `file_name`, `file_directory`, `date_submitted`, `requirement_status`, `approvers_comment`) VALUES
(3, 3, 1, '', '', '0000-00-00', 'PENDING', ''),
(4, 3, 3, '', '', '0000-00-00', 'PENDING', ''),
(5, 3, 2, '', '', '0000-00-00', 'PENDING', ''),
(6, 3, 4, 'sample.pdf', '', '0000-00-00', 'SUBMITTED', ''),
(7, 3, 5, 'personal-data.pdf', '', '0000-00-00', 'APPROVED', ''),
(8, 3, 6, 'address-data.pdf', '', '0000-00-00', 'DECLINED', ''),
(9, 3, 7, 'info.pdf', '', '0000-00-00', 'SUBMITTED', ''),
(10, 3, 8, 'document.pdf', '', '0000-00-00', 'SUBMITTED', ''),
(11, 3, 10, '', '', '0000-00-00', 'PENDING', ''),
(12, 3, 9, '', '', '0000-00-00', 'PENDING', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_accounts`
--
ALTER TABLE `applicant_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_information`
--
ALTER TABLE `applicant_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `program_list`
--
ALTER TABLE `program_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `requirement_list`
--
ALTER TABLE `requirement_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_list`
--
ALTER TABLE `school_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_requirement_records`
--
ALTER TABLE `student_requirement_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`),
  ADD KEY `requirement_id` (`requirement_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_accounts`
--
ALTER TABLE `applicant_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicant_information`
--
ALTER TABLE `applicant_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_list`
--
ALTER TABLE `program_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requirement_list`
--
ALTER TABLE `requirement_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `school_list`
--
ALTER TABLE `school_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_requirement_records`
--
ALTER TABLE `student_requirement_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant_information`
--
ALTER TABLE `applicant_information`
  ADD CONSTRAINT `applicant_information_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicant_accounts` (`id`),
  ADD CONSTRAINT `applicant_information_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `program_list` (`id`);

--
-- Constraints for table `program_list`
--
ALTER TABLE `program_list`
  ADD CONSTRAINT `program_list_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school_list` (`id`);

--
-- Constraints for table `student_requirement_records`
--
ALTER TABLE `student_requirement_records`
  ADD CONSTRAINT `student_requirement_records_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicant_accounts` (`id`),
  ADD CONSTRAINT `student_requirement_records_ibfk_2` FOREIGN KEY (`requirement_id`) REFERENCES `requirement_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
