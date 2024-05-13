-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 04:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduling_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `ID` int(11) NOT NULL,
  `course_code` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `program_code` varchar(50) DEFAULT NULL,
  `yrLevel` enum('1','2','3','4','5','6','7') DEFAULT NULL,
  `TypeOfRoom` enum('Regular','Laboratory','Court') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`ID`, `course_code`, `description`, `credits`, `program_code`, `yrLevel`, `TypeOfRoom`) VALUES
(32, 'ITELECT 2', 'IT ELECTIVE 2', 4, 'BSIT', '2', 'Laboratory'),
(39, 'IPT1', 'Integrative Programming and Technologies 1', 3, 'BSIT', '2', 'Laboratory'),
(40, 'ACSS', 'Advance Computer System Service', 3, 'BSIT', '2', 'Laboratory'),
(41, 'FUDBS', 'Fundamental of Databese System', 3, 'BSIT', '2', 'Regular'),
(42, 'OOP', 'Object Oriented Programming', 3, 'BSCPE', '1', 'Laboratory');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculums`
--

CREATE TABLE `tbl_curriculums` (
  `ID` int(11) NOT NULL,
  `course_code` varchar(50) DEFAULT NULL,
  `program_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrollments`
--

CREATE TABLE `tbl_enrollments` (
  `ID` int(11) NOT NULL,
  `students_no` varchar(50) DEFAULT NULL,
  `course_code` varchar(50) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_enrollments`
--

INSERT INTO `tbl_enrollments` (`ID`, `students_no`, `course_code`, `section`) VALUES
(102, '22-00003', 'IPT1', 'BSIT 2A'),
(105, '23-00001', 'IPT1', 'BSIT 2C'),
(106, '23-00002', 'ITELECT 2', 'BSIT 2B'),
(107, '23-00001', 'ITELECT 2', 'BSIT 2D');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instructors`
--

CREATE TABLE `tbl_instructors` (
  `ID` int(11) NOT NULL,
  `instructor_no` varchar(50) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `employee_status` enum('Part Time','Full Time') DEFAULT NULL,
  `availability` set('Mon','Tue','Wed','Thu','Fri','Sat','Sun') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_instructors`
--

INSERT INTO `tbl_instructors` (`ID`, `instructor_no`, `firstname`, `lastname`, `email`, `gender`, `employee_status`, `availability`) VALUES
(51, '22-11111', 'Marjon', 'Umbay', 'umbay@gmail.com', 'Male', 'Full Time', 'Mon,Tue,Wed,Thu,Fri,Sat,Sun'),
(54, '22-22222', 'Jepchion', 'Evangelio', 'evangelio@gmail.com', 'Male', 'Full Time', 'Mon,Tue,Wed,Thu,Fri,Sat,Sun'),
(55, '22-12345', 'Kurt ', 'Mellina', 'kurt@gmail.com', 'Male', 'Part Time', 'Mon,Sat,Sun'),
(57, '22-33333', 'Jorie', 'Visaya', 'visayagmail.com', 'Male', 'Part Time', 'Mon,Tue,Wed,Sun'),
(58, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'Male', 'Part Time', 'Mon,Tue,Wed,Sun'),
(59, '32-1111', 'Rizza Mae', 'Brao', 'brao@gmail.com', 'Female', 'Full Time', 'Mon,Tue,Wed,Thu,Fri,Sat,Sun');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programs`
--

CREATE TABLE `tbl_programs` (
  `ID` int(11) NOT NULL,
  `program_code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `NoOfYear` enum('1','2','3','4','5','6') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_programs`
--

INSERT INTO `tbl_programs` (`ID`, `program_code`, `name`, `department`, `NoOfYear`) VALUES
(27, 'BSIT', 'Bachelor of Science in Information Technology', 'ICS', '4'),
(28, 'BSCPE', 'Bachelor of Science in Computer Engineer ', 'ICS', '2'),
(29, 'BSED', 'Bachelor of Science in Education', 'IOB', '3');

--
-- Triggers `tbl_programs`
--
DELIMITER $$
CREATE TRIGGER `update_category_trigger` AFTER UPDATE ON `tbl_programs` FOR EACH ROW BEGIN
    UPDATE tbl_sections
    SET category = CONCAT(NEW.program_code, ' ', tbl_sections.year, tbl_sections.name)
    WHERE tbl_sections.program_code = OLD.program_code;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `ID` int(11) NOT NULL,
  `room_no` varchar(50) DEFAULT NULL,
  `building_name` varchar(100) DEFAULT NULL,
  `floor_level` varchar(11) DEFAULT NULL,
  `TypeOfRoom` enum('Regular','Laboratory','Court') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`ID`, `room_no`, `building_name`, `floor_level`, `TypeOfRoom`) VALUES
(27, '101', 'ICS Building', '1', 'Laboratory'),
(28, '102', 'ICS Building', '1', 'Laboratory'),
(29, '103', 'ICS Building', '1', 'Laboratory'),
(31, '201', 'PRRC Building', '2', 'Regular'),
(32, '202', 'PRRC Building', '2', 'Regular'),
(33, '203', 'PRRC Building', '2', 'Laboratory'),
(35, '301', 'Function Hall', '4', 'Court'),
(36, '404', 'ICS', '4', 'Laboratory'),
(37, '402', 'ICS', '4', 'Laboratory');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedules`
--

CREATE TABLE `tbl_schedules` (
  `ID` int(11) NOT NULL,
  `room_no` varchar(50) DEFAULT NULL,
  `course_code` varchar(50) DEFAULT NULL,
  `instructor_no` varchar(50) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `class_day` set('Mon','Tue','Wed','Thu','Fri','Sat','Sun') DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schedules`
--

INSERT INTO `tbl_schedules` (`ID`, `room_no`, `course_code`, `instructor_no`, `section`, `class_day`, `start_time`, `end_time`) VALUES
(92, '101', 'ITELECT 2', '22-22222', 'BSIT 2B', 'Sun', '13:49:00', '14:00:00'),
(93, '101', 'ITELECT 2', '22-22222', 'BSIT 2C', 'Sun', '14:00:00', '15:00:00'),
(94, '102', 'IPT1', '22-11111', 'BSIT 2A', 'Sun', '13:49:00', '14:00:00'),
(95, '102', 'IPT1', '22-11111', 'BSIT 2D', 'Mon', '13:49:00', '14:00:00'),
(96, '103', 'IPT1', '22-12345', 'BSIT 2B', 'Mon,Sun', '14:00:00', '15:00:00'),
(97, '404', 'OOP', '22-33333', 'BSCPE 1B', 'Mon', '02:00:00', '03:00:00'),
(98, '102', 'IPT1', '22-11111', 'BSIT 2C', 'Mon', '16:05:00', '17:00:00'),
(99, '404', 'ITELECT 2', '22-22222', 'BSIT 2A', 'Mon,Tue', '16:46:00', '17:00:00'),
(100, '202', 'FUDBS', '32-1111', 'BSIT 2B', 'Mon', '20:00:00', '22:00:00'),
(101, '404', 'ITELECT 2', '22-22222', 'BSIT 2D', 'Sat', '06:00:00', '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schools`
--

CREATE TABLE `tbl_schools` (
  `ID` int(11) NOT NULL,
  `school_id` varchar(100) DEFAULT NULL,
  `school_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sections`
--

CREATE TABLE `tbl_sections` (
  `ID` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `program_code` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sections`
--

INSERT INTO `tbl_sections` (`ID`, `category`, `program_code`, `year`, `name`) VALUES
(71, 'BSIT 3B', 'BSIT', 3, 'B'),
(73, 'BSCPE 2B', 'BSCPE', 2, 'B'),
(74, 'BSCPE 1B', 'BSCPE', 1, 'B'),
(75, 'BSED 1C', 'BSED', 1, 'C'),
(76, 'BSED 2C', 'BSED', 2, 'C'),
(77, 'BSED 3C', 'BSED', 3, 'C'),
(78, 'BSED 4C', 'BSED', 4, 'C'),
(79, 'BSIT 2B', 'BSIT', 2, 'B'),
(81, 'BSIT 2C', 'BSIT', 2, 'C'),
(84, 'BSIT 2D', 'BSIT', 2, 'D'),
(85, 'BSIT 2A', 'BSIT', 2, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sessions`
--

CREATE TABLE `tbl_sessions` (
  `ID` int(11) NOT NULL,
  `instructor_no` varchar(50) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sessions`
--

INSERT INTO `tbl_sessions` (`ID`, `instructor_no`, `section`) VALUES
(83, '22-11111', 'BSIT 2B'),
(84, '22-11111', 'BSIT 2C'),
(85, '22-11111', 'BSIT 2D'),
(94, '22-11111', 'BSIT 2A'),
(95, '22-22222', 'BSIT 2B'),
(96, '22-22222', 'BSIT 2C'),
(97, '22-22222', 'BSIT 2D'),
(98, '22-22222', 'BSIT 2A'),
(99, '22-12345', 'BSIT 2B'),
(103, '22-33333', 'BSCPE 2B'),
(104, '22-33333', 'BSCPE 1B'),
(105, '22-33333', 'BSED 1C'),
(106, '22-33333', 'BSED 2C'),
(107, '22-33333', 'BSED 3C'),
(108, '22-33333', 'BSED 4C'),
(109, '22-33333', 'BSIT 2B'),
(110, '22-33333', 'BSIT 2C'),
(111, 'asdasd', 'BSCPE 2B'),
(112, '32-1111', 'BSIT 2B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `ID` int(11) NOT NULL,
  `students_no` varchar(50) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `student_status` enum('Regular','Irregular') DEFAULT NULL,
  `program_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`ID`, `students_no`, `firstname`, `lastname`, `email`, `gender`, `student_status`, `program_code`) VALUES
(11, '23-00001', 'Annjie', 'Fernandez', 'fernandez@gmail.com', 'Female', 'Regular', 'BSIT'),
(12, '23-00002', 'Mylene', 'Jasareno', 'jasareno@gmail.com', 'Female', 'Regular', 'BSIT'),
(13, '22-00003', 'Harlenkens', 'Sanchez', 'sanchez@gmail.com', 'Male', 'Irregular', 'BSIT'),
(14, '22-00004', 'Carlos', 'Vallejo', 'vallejo@gmail.com', 'Male', 'Irregular', 'BSCPE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `ID` int(11) NOT NULL,
  `instructor_no` varchar(50) DEFAULT NULL,
  `course_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`ID`, `instructor_no`, `course_code`) VALUES
(43, '22-11111', 'IPT1'),
(48, '22-22222', 'ITELECT 2'),
(50, '22-12345', 'IPT1'),
(52, '22-33333', 'OOP'),
(53, 'asdasd', 'IPT1'),
(54, '32-1111', 'FUDBS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('Admin','Editor','Viewer') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `unique_courseProg` (`course_code`,`program_code`) USING BTREE,
  ADD KEY `course_code` (`course_code`),
  ADD KEY `tbl_courses_ibfk_1` (`program_code`);

--
-- Indexes for table `tbl_curriculums`
--
ALTER TABLE `tbl_curriculums`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `tbl_curriculums_ibfk_1` (`course_code`),
  ADD KEY `tbl_curriculums_ibfk_2` (`program_code`);

--
-- Indexes for table `tbl_enrollments`
--
ALTER TABLE `tbl_enrollments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `tbl_enrollments_ibfk_1` (`students_no`),
  ADD KEY `tbl_enrollments_ibfk_2` (`course_code`),
  ADD KEY `tbl_enrollments_ibfk_3` (`section`);

--
-- Indexes for table `tbl_instructors`
--
ALTER TABLE `tbl_instructors`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `instructor_no` (`instructor_no`),
  ADD UNIQUE KEY `unique_name` (`firstname`,`lastname`);

--
-- Indexes for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `program_code` (`program_code`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `room_no` (`room_no`);

--
-- Indexes for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `tbl_schedules_ibfk_1` (`room_no`),
  ADD KEY `tbl_schedules_ibfk_2` (`course_code`),
  ADD KEY `tbl_schedules_ibfk_4` (`section`),
  ADD KEY `instructor_no` (`instructor_no`);

--
-- Indexes for table `tbl_schools`
--
ALTER TABLE `tbl_schools`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `school_id` (`school_id`);

--
-- Indexes for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `category` (`category`),
  ADD KEY `tbl_sections_ibfk_1` (`program_code`);

--
-- Indexes for table `tbl_sessions`
--
ALTER TABLE `tbl_sessions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `tbl_sessions_ibfk_1` (`instructor_no`),
  ADD KEY `tbl_sessions_ibfk_2` (`section`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `students_no` (`students_no`),
  ADD KEY `fk_program_code` (`program_code`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `tbl_subjects_ibfk_1` (`instructor_no`),
  ADD KEY `tbl_subjects_ibfk_2` (`course_code`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_curriculums`
--
ALTER TABLE `tbl_curriculums`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_enrollments`
--
ALTER TABLE `tbl_enrollments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_instructors`
--
ALTER TABLE `tbl_instructors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_schools`
--
ALTER TABLE `tbl_schools`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_sessions`
--
ALTER TABLE `tbl_sessions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD CONSTRAINT `tbl_courses_ibfk_1` FOREIGN KEY (`program_code`) REFERENCES `tbl_programs` (`program_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_curriculums`
--
ALTER TABLE `tbl_curriculums`
  ADD CONSTRAINT `tbl_curriculums_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `tbl_courses` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_curriculums_ibfk_2` FOREIGN KEY (`program_code`) REFERENCES `tbl_programs` (`program_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_enrollments`
--
ALTER TABLE `tbl_enrollments`
  ADD CONSTRAINT `tbl_enrollments_ibfk_1` FOREIGN KEY (`students_no`) REFERENCES `tbl_students` (`students_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_enrollments_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `tbl_courses` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_enrollments_ibfk_3` FOREIGN KEY (`section`) REFERENCES `tbl_sections` (`category`);

--
-- Constraints for table `tbl_schedules`
--
ALTER TABLE `tbl_schedules`
  ADD CONSTRAINT `tbl_schedules_ibfk_1` FOREIGN KEY (`room_no`) REFERENCES `tbl_rooms` (`room_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_schedules_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `tbl_courses` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_schedules_ibfk_4` FOREIGN KEY (`section`) REFERENCES `tbl_sections` (`category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_schedules_ibfk_5` FOREIGN KEY (`instructor_no`) REFERENCES `tbl_instructors` (`instructor_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  ADD CONSTRAINT `tbl_sections_ibfk_1` FOREIGN KEY (`program_code`) REFERENCES `tbl_programs` (`program_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sessions`
--
ALTER TABLE `tbl_sessions`
  ADD CONSTRAINT `tbl_sessions_ibfk_1` FOREIGN KEY (`instructor_no`) REFERENCES `tbl_instructors` (`instructor_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sessions_ibfk_2` FOREIGN KEY (`section`) REFERENCES `tbl_sections` (`category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD CONSTRAINT `fk_program_code` FOREIGN KEY (`program_code`) REFERENCES `tbl_programs` (`program_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD CONSTRAINT `tbl_subjects_ibfk_1` FOREIGN KEY (`instructor_no`) REFERENCES `tbl_instructors` (`instructor_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_subjects_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `tbl_courses` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
