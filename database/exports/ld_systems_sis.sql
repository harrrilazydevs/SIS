-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 08:09 PM
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
  `date_of_application` date NOT NULL,
  `pass_type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_accounts`
--

INSERT INTO `applicant_accounts` (`id`, `email`, `mobile_no`, `password`, `date_of_application`, `pass_type`) VALUES
(52, 'alyastubigman@gmail.com', '8987987465', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2021-09-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_information`
--

CREATE TABLE `applicant_information` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL DEFAULT 'Applicant',
  `middlename` text NOT NULL,
  `status` text NOT NULL,
  `suffix` text NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `age` int(11) NOT NULL,
  `place_of_birth` text NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `gender` text NOT NULL,
  `religion` text NOT NULL,
  `civil_status` text NOT NULL,
  `citizenship` text NOT NULL,
  `acr_no` text DEFAULT NULL,
  `passport_no` text DEFAULT NULL,
  `spouse` text DEFAULT NULL,
  `applicant_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_information`
--

INSERT INTO `applicant_information` (`id`, `applicant_id`, `program_id`, `lastname`, `firstname`, `middlename`, `status`, `suffix`, `date_of_birth`, `age`, `place_of_birth`, `mobile_no`, `gender`, `religion`, `civil_status`, `citizenship`, `acr_no`, `passport_no`, `spouse`, `applicant_type`) VALUES
(17, 52, 1, '', 'Applicant', '', '', '', '0000-00-00', 0, '', 0, 'MALE', '', '', 'Filipino', '', '', '', 2);

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
(250, 52, 13, '', '', '0000-00-00', 'PENDING', ''),
(251, 52, 16, '', '', '0000-00-00', 'PENDING', ''),
(252, 52, 21, '', '', '0000-00-00', 'PENDING', ''),
(253, 52, 12, '', '', '0000-00-00', 'PENDING', ''),
(254, 52, 11, '', '', '0000-00-00', 'PENDING', ''),
(255, 52, 15, '', '', '0000-00-00', 'PENDING', ''),
(256, 52, 14, '', '', '0000-00-00', 'PENDING', ''),
(257, 52, 18, '', '', '0000-00-00', 'PENDING', ''),
(258, 52, 19, '', '', '0000-00-00', 'PENDING', '');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_type_list`
--

CREATE TABLE `applicant_type_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `citizenship` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_type_list`
--

INSERT INTO `applicant_type_list` (`id`, `name`, `citizenship`) VALUES
(1, 'Frosh - Filipino', 'Filipino'),
(2, 'Frosh - Foreign', 'Foreign'),
(3, 'Transferee - Foreign', 'Foreign'),
(4, 'Transferee - Filipino', ' Filipino');

-- --------------------------------------------------------

--
-- Table structure for table `building_list`
--

CREATE TABLE `building_list` (
  `id` int(11) NOT NULL,
  `building_number` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building_list`
--

INSERT INTO `building_list` (`id`, `building_number`, `name`, `description`) VALUES
(1, '1', 'SAMPLE BUILDING', 'TEST');

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
  `name` text NOT NULL,
  `document_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirement_list`
--

INSERT INTO `requirement_list` (`id`, `name`, `document_type`) VALUES
(11, 'SHS Permanent Record', 'PDF'),
(12, 'Form-138- SHS CARD ', 'PDF'),
(13, '2x2 ID Picture White BG ', 'PHOTO'),
(14, 'Marriage Certificate \r\n', 'PDF'),
(15, 'Medical Certificate ', 'PDF'),
(16, 'Birth Certificate', 'PDF'),
(17, 'Transcript of Record', 'PDF'),
(18, 'ACR ', 'PHOTO'),
(19, 'Passport ', 'PHOTO'),
(20, 'Copy of Grades', 'PDF'),
(21, 'Certicate of Good Moral', 'PDF'),
(26, 'TEST', 'PDF');

-- --------------------------------------------------------

--
-- Table structure for table `requirement_setup_applicant_list`
--

CREATE TABLE `requirement_setup_applicant_list` (
  `id` int(11) NOT NULL,
  `requirement_id` int(11) NOT NULL,
  `applicant_type_id` int(11) NOT NULL,
  `is_required` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirement_setup_applicant_list`
--

INSERT INTO `requirement_setup_applicant_list` (`id`, `requirement_id`, `applicant_type_id`, `is_required`) VALUES
(1, 13, 1, 1),
(2, 16, 1, 1),
(3, 21, 1, 1),
(4, 12, 1, 1),
(5, 11, 1, 1),
(6, 15, 1, 0),
(7, 14, 1, 0),
(8, 13, 2, 1),
(9, 16, 2, 1),
(10, 21, 2, 1),
(11, 12, 2, 1),
(12, 11, 2, 1),
(13, 15, 2, 0),
(14, 14, 2, 0),
(15, 18, 2, 1),
(16, 19, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

CREATE TABLE `room_list` (
  `id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`id`, `room_number`, `name`, `description`) VALUES
(1, 200, 'Physics Room', 'Vacant minsan'),
(2, 69, 'For lesbians/ Bi', 'test'),
(3, 50, 'Porn Room', 'araw araw ka nandito lloyd');

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
  ADD KEY `program_id` (`program_id`),
  ADD KEY `applicant_type` (`applicant_type`);

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
-- Indexes for table `applicant_type_list`
--
ALTER TABLE `applicant_type_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building_list`
--
ALTER TABLE `building_list`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `requirement_setup_applicant_list`
--
ALTER TABLE `requirement_setup_applicant_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_type_id` (`applicant_type_id`),
  ADD KEY `requirement_id` (`requirement_id`);

--
-- Indexes for table `room_list`
--
ALTER TABLE `room_list`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `applicant_information`
--
ALTER TABLE `applicant_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `applicant_mailing_address_information`
--
ALTER TABLE `applicant_mailing_address_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_requirement_records`
--
ALTER TABLE `applicant_requirement_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `applicant_type_list`
--
ALTER TABLE `applicant_type_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `building_list`
--
ALTER TABLE `building_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `requirement_setup_applicant_list`
--
ALTER TABLE `requirement_setup_applicant_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `room_list`
--
ALTER TABLE `room_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `applicant_information_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `program_list` (`id`),
  ADD CONSTRAINT `applicant_information_ibfk_3` FOREIGN KEY (`applicant_type`) REFERENCES `applicant_type_list` (`id`);

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

--
-- Constraints for table `requirement_setup_applicant_list`
--
ALTER TABLE `requirement_setup_applicant_list`
  ADD CONSTRAINT `requirement_setup_applicant_list_ibfk_1` FOREIGN KEY (`applicant_type_id`) REFERENCES `applicant_type_list` (`id`),
  ADD CONSTRAINT `requirement_setup_applicant_list_ibfk_2` FOREIGN KEY (`requirement_id`) REFERENCES `requirement_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
