-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 06:22 PM
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
-- Table structure for table `applicant_mailing_address_information`
--

CREATE TABLE `applicant_mailing_address_information` (
  `id` int(11) NOT NULL,
  `city_no_st_sbdv` text NOT NULL,
  `city_brgy` text NOT NULL,
  `city_city` text NOT NULL,
  `city_zipcode` text NOT NULL,
  `province_no_st_sbdv` text NOT NULL,
  `province_brgy` text NOT NULL,
  `province_city` text NOT NULL,
  `province_zipcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_requirement_records`
--

CREATE TABLE `applicant_requirement_records` (
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
-- Dumping data for table `applicant_requirement_records`
--

INSERT INTO `applicant_requirement_records` (`id`, `applicant_id`, `requirement_id`, `file_name`, `file_directory`, `date_submitted`, `requirement_status`, `approvers_comment`) VALUES
(3, 3, 1, 'c2f711cf49fd18c1dbb9ddbe56aa3152fa5c728f.pdf', '../../../storage/files', '2021-09-11', 'SUBMITTED', ''),
(4, 3, 2, 'c2f711cf49fd18c1dbb9ddbe56aa3152fa5c728f.pdf', '../../../storage/files', '2021-09-11', 'SUBMITTED', ''),
(5, 3, 3, 'c2f711cf49fd18c1dbb9ddbe56aa3152fa5c728f.pdf', '../../../storage/files', '2021-09-11', 'SUBMITTED', ''),
(6, 3, 4, 'c2f711cf49fd18c1dbb9ddbe56aa3152fa5c728f.pdf', '../../../storage/files', '2021-09-11', 'SUBMITTED', ''),
(7, 3, 5, 'c2f711cf49fd18c1dbb9ddbe56aa3152fa5c728f.pdf', '../../../storage/files', '2021-09-11', 'SUBMITTED', ''),
(8, 3, 6, 'c2f711cf49fd18c1dbb9ddbe56aa3152fa5c728f.pdf', '../../../storage/files', '2021-09-11', 'SUBMITTED', ''),
(9, 3, 7, 'c2f711cf49fd18c1dbb9ddbe56aa3152fa5c728f.pdf', '../../../storage/files', '2021-09-11', 'SUBMITTED', ''),
(10, 3, 8, '', '', '0000-00-00', 'PENDING', ''),
(11, 3, 9, '', '', '0000-00-00', 'PENDING', ''),
(12, 3, 10, '', '', '0000-00-00', 'PENDING', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_information`
--

CREATE TABLE `employee_information` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_information`
--

INSERT INTO `employee_information` (`id`, `firstname`, `middlename`, `lastname`, `user_id`, `picture`) VALUES
(1, 'Harrri', 'L', 'D', 1, 'employee1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_course_table`
--

CREATE TABLE `monitoring_course_table` (
  `id` int(11) NOT NULL,
  `monitoring_student_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitoring_course_table`
--

INSERT INTO `monitoring_course_table` (`id`, `monitoring_student_id`, `name`) VALUES
(84, 25, 'test'),
(85, 26, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_table`
--

CREATE TABLE `monitoring_table` (
  `id` int(11) NOT NULL,
  `student_no` text NOT NULL,
  `student_name` text NOT NULL,
  `school_id` int(11) NOT NULL,
  `year` text NOT NULL,
  `academic_year` text NOT NULL,
  `semester` text NOT NULL,
  `date_enrolled` date NOT NULL,
  `enrollment_type` text NOT NULL,
  `inputted_by` text NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date DEFAULT NULL,
  `file_dir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitoring_table`
--

INSERT INTO `monitoring_table` (`id`, `student_no`, `student_name`, `school_id`, `year`, `academic_year`, `semester`, `date_enrolled`, `enrollment_type`, `inputted_by`, `date_created`, `date_updated`, `file_dir`) VALUES
(25, 'test', '', 1, '1ST', 'AY 2021-2022', '1ST SEM', '0000-00-00', 'WALK-IN', 'ARMIE', '2021-09-09', NULL, '19-00295_ferrer, gillana_smart.xlsx - com.pdf'),
(26, 'test', '', 1, '1ST', 'AY 2021-2022', '1ST SEM', '2021-09-09', 'WALK-IN', 'ARMIE', '2021-09-09', NULL, '19-00295_ferrer, gillana_smart.xlsx - com.pdf');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(1, 'dev1@lazydevs.ph', '356a192b7913b04c54574d18c28d46e6395428ab', 'DEVELOPER');

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
-- Indexes for table `applicant_mailing_address_information`
--
ALTER TABLE `applicant_mailing_address_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_requirement_records`
--
ALTER TABLE `applicant_requirement_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`),
  ADD KEY `requirement_id` (`requirement_id`);

--
-- Indexes for table `employee_information`
--
ALTER TABLE `employee_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `monitoring_course_table`
--
ALTER TABLE `monitoring_course_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monitoring_student_id` (`monitoring_student_id`);

--
-- Indexes for table `monitoring_table`
--
ALTER TABLE `monitoring_table`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `applicant_mailing_address_information`
--
ALTER TABLE `applicant_mailing_address_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_requirement_records`
--
ALTER TABLE `applicant_requirement_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_information`
--
ALTER TABLE `employee_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `monitoring_course_table`
--
ALTER TABLE `monitoring_course_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `monitoring_table`
--
ALTER TABLE `monitoring_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `applicant_requirement_records`
--
ALTER TABLE `applicant_requirement_records`
  ADD CONSTRAINT `applicant_requirement_records_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicant_accounts` (`id`),
  ADD CONSTRAINT `applicant_requirement_records_ibfk_2` FOREIGN KEY (`requirement_id`) REFERENCES `requirement_list` (`id`);

--
-- Constraints for table `employee_information`
--
ALTER TABLE `employee_information`
  ADD CONSTRAINT `employee_information_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `monitoring_course_table`
--
ALTER TABLE `monitoring_course_table`
  ADD CONSTRAINT `monitoring_course_table_ibfk_1` FOREIGN KEY (`monitoring_student_id`) REFERENCES `monitoring_table` (`id`);

--
-- Constraints for table `program_list`
--
ALTER TABLE `program_list`
  ADD CONSTRAINT `program_list_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
