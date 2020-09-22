-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 12:41 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcevalsystem_db`
--
CREATE DATABASE IF NOT EXISTS `bcevalsystem_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bcevalsystem_db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_record`
--

CREATE TABLE `tbl_admin_record` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `acc_type` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_record`
--

INSERT INTO `tbl_admin_record` (`id`, `username`, `password`, `email`, `firstname`, `middlename`, `lastname`, `acc_type`, `status`) VALUES
(1, 'admin', 'admin', 'briancalmadevacc2016@gmail.com', 'Brian', 'Apinado', 'Calma', 'super_admin', 'APPROVED'),
(6, 'root', 'root', 'root@gmail.com', 'RootKit', 'Roo', 'Toor', 'super_admin', 'APPROVED'),
(7, 'WYNANDRADA', 'WYNANDRADA', '', '', '', '', 'super_admin', 'BANNED'),
(15, 'absoflux', 'absoflux', '', '', '', '', 'admin', 'DISAPPROVED'),
(16, 'admun', 'admun', '', 'admun', 'admina', 'adminao', 'admin', 'DISAPPROVED'),
(17, 'Retsu', '', '', '', '', '', 'admin', 'DISAPPROVED'),
(18, 'Retsupotpot', 'Retsupotpot', '', 'Retsupotpot', 'Retsupotpot', 'Retsupotpot', 'admin', 'DISAPPROVED'),
(19, '', 'admina', '', 'admina', 'admina', 'admina', 'admin', 'BANNED'),
(20, '', 'adminkiera', '', 'ADMIN', 'ADMIN', 'ADMIN', 'admin', 'BANNED'),
(21, '', 'adminkiera', '', 'adminkiera', 'adminkiera', 'adminkiera', 'admin', 'BANNED'),
(22, 'blackpanther', 'blackpanther', '', 'Tachala', 'Albura', 'Wakanda', 'admin', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_college_student_record`
--

CREATE TABLE `tbl_college_student_record` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_college_student_record`
--

INSERT INTO `tbl_college_student_record` (`id`, `username`, `password`, `student_id`, `firstname`, `middlename`, `lastname`, `age`, `address`, `contact_number`, `gender`, `birthday`, `course`, `year`, `semester`, `sy`, `department`) VALUES
(19, '091234567', '091234567', '091234567', 'Bien', 'Dllanor', 'Render', '21', '', '09091122445', 'male', '', 'BSCS', '4', '1st Sem', '2017 - 2018', 'CCS'),
(20, '014241996', '014241996', '014241996', 'Shin', 'Argote', 'Calma', '19', '', '09393345751', 'male', '', 'BSCS', '2', '1st Sem', '2017 - 2018', 'CCS'),
(21, '141999111', '141999111', '141999111', 'James', 'R', 'Reid', '20', '', '09393345751', 'male', '', 'LAW', '4', '1st Sem', '2017 - 2018', 'Grad-School');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_record`
--

CREATE TABLE `tbl_course_record` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_desc` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course_record`
--

INSERT INTO `tbl_course_record` (`id`, `course_code`, `course_desc`, `department`) VALUES
(1, 'BSCS', 'Bachelor Of Science In Computer Science', 'CCS'),
(2, 'BSIS', 'Bachelor Of Science In Information System', 'CCS'),
(3, 'ACT', 'Associate In Computer Technology', 'CCS'),
(4, 'BSIT', 'Bachelor Of Science In Information Technology', 'CCS'),
(5, 'BSBA - Major in Marketing Management', 'Bachelor of Science in Business Administration Major in Marketing Management', 'BSBA'),
(6, 'BSBA - Major in Financial Management', 'Bachelor of Science in Business Administration Major in Financial Management', 'BSBA'),
(7, 'BS - Entrepreneurship', 'Bachelor of Science in Entrepreneurship', 'BSBA'),
(8, 'BS - Tourism', 'Bachelor of Science in Tourism Management', 'BSBA'),
(9, 'BS - Hospitality Management', 'Bachelor of Science in Hospitality Management', 'BSBA'),
(10, 'BSED-Fil', 'Bachelor of Science in Secondary Education Major In Filipino', 'EDUC'),
(11, 'BSED-Eng', 'Bachelor of Science in Secondary Education Major In English', 'EDUC'),
(12, 'BSN', 'Bachelor of Science in Nursing', 'Nursing'),
(13, 'MDW', 'Midwifery', 'Nursing'),
(14, 'BSAIS', 'Bachelor of Science in Accounting Info System', 'Accountancy'),
(15, 'BSACT', 'Bachelor of Science in Accounting', 'Accountancy'),
(16, 'BSED-Mapeh', 'Bachelor of Science in Secondary Education Major In Mapeh', 'EDUC'),
(17, 'BSED-Math', 'Bachelor of Science in Secondary Education Major In Math', 'EDUC'),
(18, 'BSED-BIO', 'Bachelor of Science in Secondary Education Major In Biology', 'EDUC'),
(19, 'BSED-Pre-School', 'Bachelor of Science in Basic Education', 'EDUC'),
(20, 'HRM', 'Hotel and Restaurant Management', 'BSBA'),
(21, 'LAW', 'Masters in Law', 'Grad-School');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculum_map`
--

CREATE TABLE `tbl_curriculum_map` (
  `id` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_desc` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_curriculum_map`
--

INSERT INTO `tbl_curriculum_map` (`id`, `subject_code`, `subject_desc`, `department`) VALUES
(1, 'CSBC_00', 'Office Procedure Fundamentals', 'CCS'),
(2, 'CSBC_01', 'Introduction To Computer Programming', 'CCS'),
(3, 'WEBPROG01', 'Internet HTML Design Basics', 'CCS'),
(4, 'Eng01', 'English - Communication Skills ', 'CCS'),
(5, 'DISCMATH01', 'Discrete Mathematics', 'CCS'),
(10, 'FIL_01', 'Wika Pambansa ', 'Elementary'),
(11, 'Fil_04', 'El Filibusterismo', 'HS-Prim'),
(12, 'Research01', 'Primary Research For Life', 'HS-Sec'),
(13, 'Math_01', 'Basic Elementary Math', 'Elementary'),
(14, 'Math_02', 'Advance Basic Math', 'Elementary'),
(15, 'Sci_01', 'Basic Science And Technology', 'Elementary'),
(16, 'Sci_02', 'Advance Science And Technology', 'Elementary'),
(17, 'Algebra', 'Elementary Algebra', 'HS-Prim'),
(18, 'Geometry', 'Advance Math For Geometry', 'HS-Prim'),
(19, 'AP', 'Araling Panlipunan', 'HS-Prim'),
(20, 'Filipino_03', 'Noli Me Tangere', 'HS-Prim'),
(21, 'Phy01', 'Introduction to Physics', 'HS-Sec'),
(22, 'ET', 'Empowerment And Technology', 'HS-Sec'),
(23, 'TVL-Prog2', 'Technical Vocational Track Programming 2', 'HS-Sec'),
(24, 'TVL-Prog1', 'Technical Vocational Track Programming 1', 'HS-Sec'),
(25, 'MAS_LAW_01', 'Law Basics Human rights 101', 'Grad-School'),
(26, 'Soft_Eng101', 'Software Engineering 101', 'CCS'),
(27, 'Phy101', 'Physics 101', 'CCS'),
(28, 'Soft_Eng101', 'Software Engineering 101', 'CCS'),
(29, 'Phy101', 'Physics 101', 'CCS'),
(30, 'OOP01', 'Object Oriented Programming 1', 'CCS'),
(31, 'OOP02', 'Object Oriented Programming 2', 'CCS'),
(32, 'Thesis01', 'Thesis 1 : Chapter Intoduction', 'CCS'),
(33, 'Bus01', 'Business Theory 101', 'BSBA'),
(34, 'Bus02', 'Business Theory 102', 'BSBA'),
(35, 'Bus03', 'Business Theory 103', 'BSBA'),
(36, 'Bus04', 'Business Theory 104', 'BSBA'),
(37, 'Bus05', 'Business Theory 105', 'BSBA'),
(38, 'Bus06', 'Business Theory 106', 'BSBA'),
(39, 'Bus07', 'Business Theory 107', 'BSBA'),
(40, 'Bus08', 'Business Theory 108', 'BSBA'),
(41, 'Bus09', 'Business Theory 109', 'BSBA'),
(42, 'Bus10', 'Business Theory 110', 'BSBA'),
(43, 'Eng101', 'English 101', 'EDUC'),
(44, 'Eng102', 'English 102', 'EDUC'),
(45, 'Math101', 'Math Theory 101', 'EDUC'),
(46, 'Math102', 'Math Theory 102', 'EDUC'),
(47, 'Sci101', 'Science 101', 'EDUC'),
(48, 'Sci102', 'Science 102', 'EDUC'),
(49, 'SocSci101', 'Social Science 101', 'EDUC'),
(50, 'SocSci102', 'Social Science 102', 'EDUC'),
(51, 'Fil101', 'Filipino 101', 'EDUC'),
(52, 'Fil102', 'Filipino 102', 'EDUC'),
(53, 'Crim101', 'Criminology 101', 'CRIM'),
(54, 'Crim102', 'Criminology 102', 'CRIM'),
(55, 'Crim103', 'Criminology 103', 'CRIM'),
(56, 'Crim104', 'Criminology 104', 'CRIM'),
(57, 'Crim105', 'Criminology 105', 'CRIM'),
(58, 'Crim106', 'Criminology 106', 'CRIM'),
(59, 'Crim107', 'Criminology 107', 'CRIM'),
(60, 'Crim108', 'Criminology 108', 'CRIM'),
(61, 'Crim109', 'Criminology 109', 'CRIM'),
(62, 'Crim110', 'Criminology 110', 'CRIM'),
(63, 'COMP01', 'Computer 101', 'HS-Prim'),
(64, 'COMP02', 'Computer 102', 'HS-Prim'),
(65, 'COMP03', 'Computer 103', 'HS-Prim'),
(66, 'COMP04', 'Computer 104', 'HS-Prim'),
(67, 'EngCom01', 'English Communication 01', 'HS-Prim'),
(68, 'EngCom02', 'English Communication 02', 'HS-Prim'),
(69, 'EngCom03', 'English Communication 03', 'HS-Prim'),
(70, 'EngCom04', 'English Communication 04', 'HS-Prim'),
(71, 'SOCSCI01', 'Social Science 01', 'HS-Prim'),
(72, 'SOCSCI02', 'Social Science 02', 'HS-Prim'),
(73, 'Bus101', 'Busines Math 101', 'HS-Sec'),
(74, 'Bus102', 'Busines Math 102', 'HS-Sec'),
(75, 'ET01', 'Empowerment And Technology 101', 'HS-Sec'),
(76, 'ET02', 'Empowerment And Technology 102', 'HS-Sec'),
(77, 'PhySci01', 'Physical Science 101', 'HS-Sec'),
(78, 'PhySci02', 'Physical Science 102', 'HS-Sec'),
(79, 'GeoMath101', 'Geometry 101', 'HS-Sec'),
(80, 'GeoMath102', 'Geometry 102', 'HS-Sec'),
(81, 'SocSci101', 'Social Science 101', 'HS-Sec'),
(82, 'SocSci102', 'Social Science 102\r\n', 'HS-Sec'),
(90, 'Eng1', 'English 1', 'Elementary'),
(91, 'Eng2', 'English 2', 'Elementary'),
(92, 'Math1', 'Math 1', 'Elementary'),
(93, 'Math2', 'Math 2', 'Elementary'),
(94, 'Sci1', 'Science 1', 'Elementary'),
(95, 'Sci2', 'Science 2', 'Elementary'),
(96, 'Sci3', 'Science 3', 'Elementary'),
(97, 'Sci4', 'Science 4', 'Elementary'),
(98, 'Fil1', 'Filipino 1', 'Elementary'),
(99, 'Fil2', 'Filipino 2', 'Elementary'),
(100, 'Acc101', 'Accounting 101', 'Accounting'),
(101, 'Acc102', 'Accounting 102', 'Accounting'),
(102, 'Acc103', 'Accounting 103', 'Accounting'),
(103, 'Acc104', 'Accounting 104', 'Accounting'),
(104, 'Acc105', 'Accounting 105', 'Accounting'),
(105, 'Acc106', 'Accounting 106', 'Accounting'),
(106, 'Acc107', 'Accounting 107', 'Accounting'),
(107, 'Acc108', 'Accounting 108', 'Accounting'),
(108, 'Acc109', 'Accounting 109', 'Accounting'),
(109, 'Acc110', 'Accounting 110', 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dean_record`
--

CREATE TABLE `tbl_dean_record` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dean_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dean_record`
--

INSERT INTO `tbl_dean_record` (`id`, `username`, `password`, `dean_id`, `firstname`, `middlename`, `lastname`, `age`, `contact_number`, `gender`, `semester`, `sy`, `department`, `STATUS`) VALUES
(8, '042419961', '042419961', '042419961', 'Erika Queny', 'Argote', 'Calma', 21, '09393345751', 'female', '1st Sem', '2017 - 2018', '09393345751', 1),
(11, '2014007b', '2014007b', '2014007b', 'denver', 'merillo', 'meteoro', 30, '09101192062', 'male', '1st Sem', '2017 - 2018', 'CCS', 1),
(12, 'BSBAFREN', 'BSBAFREN', 'BSBAFREN', 'Fortunato', 'Reolanda', 'Romero', 51, '09090210111', 'male', '1st Sem', '2017 - 2018', 'BSBA', 1),
(13, '04441111', '04441111', '04441111', 'Blad', 'Vladimir', 'Mapussan', 25, '09393345751', 'male', '1st Sem', '2017 - 2018', 'EDUC', 1),
(14, '04240111', '04240111', '04240111', '04240111', '04240111', '04240111', 21, '04240111000', 'male', '1st Sem', '2017 - 2018', 'BSBA', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `department_name`, `department_code`) VALUES
(1, 'College of Computer Studies', 'CCS'),
(2, 'College of Business Education', 'BSBA'),
(3, 'Teacher Education', 'EDUC'),
(4, 'Criminal Justice', 'CRIM'),
(6, 'High School Primary', 'HS-Prim'),
(7, 'High School Secondary', 'HS-Sec'),
(8, 'Elementary', 'Elementary'),
(9, 'College of Accountancy', 'Accountancy'),
(10, 'College of Nursing', 'Nursing'),
(11, 'Graduate School/LAW PP', 'Grad-School');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_elementary_student_record`
--

CREATE TABLE `tbl_elementary_student_record` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_elementary_student_record`
--

INSERT INTO `tbl_elementary_student_record` (`id`, `username`, `password`, `student_id`, `firstname`, `middlename`, `lastname`, `age`, `address`, `contact_number`, `gender`, `birthday`, `grade_level`, `department`, `sy`) VALUES
(17, '001122334', '001122334', '001122334', 'Raylie', 'Raylie', 'Raylie', '15', '', '09393345751', 'male', '', '5', 'Elementary', '2017 - 2018'),
(18, '097855334', '097855334', '097855334', 'Ming', 'Min', 'Mung', '5', '', '09393345751', 'male', '', '1', 'Elementary', '2017 - 2018'),
(19, '097855335', '097855335', '097855335', 'Milkk', 'Mik', 'Mub', '6', '', '09393345751', 'male', '', '2', 'Elementary', '2017 - 2018'),
(20, '097855336', '097855336', '097855336', 'Ohoo', 'Ohaa', 'Ohee', '7', '', '09393345751', 'female', '', '1', 'Elementary', '2017 - 2018'),
(21, '097855337', '097855337', '097855337', 'Fritz', 'Fring', 'Frung', '8', '', '09393345751', 'male', '', '4', 'Elementary', '2017 - 2018'),
(22, '042511223', '042511223', '042511223', 'aa', 'a', 'a', '21', '', '09393345751', 'male', '', '', 'Elementary', '2017 - 2018'),
(23, '131321215', '131321215', '131321215', 'Kris', 'Prat', 'Nukes', '8', '', '09393345751', 'female', '', '4', 'Elementary', '2017 - 2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eval_items_record`
--

CREATE TABLE `tbl_eval_items_record` (
  `id` int(11) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_eval_items_record`
--

INSERT INTO `tbl_eval_items_record` (`id`, `section_id`, `content`) VALUES
(1, 'A. Planning and Preparation ', 'Demonstrates knowledge of content and related pedagogy '),
(2, 'A. Planning and Preparation ', 'Demonstrates knowledge of development characteristics of age group '),
(3, 'A. Planning and Preparation ', 'Demonstrates knowledge of how students learn '),
(4, 'A. Planning and Preparation ', 'Demonstrates awareness of student skills and knowledge '),
(5, 'A. Planning and Preparation ', 'Designs instructional materials and activities '),
(6, 'A. Planning and Preparation ', 'Designs and structures lessons '),
(7, 'B. Teacher/Student Relationships', 'Student demonstrates respect for teacher'),
(8, 'B. Teacher/Student Relationships', 'Teacher demonstrates positive attitude and openness to students'),
(9, 'B. Teacher/Student Relationships', 'Teacher demonstrates ability to personalize the instructional program for students '),
(10, 'B. Teacher/Student Relationships', 'Teacher demonstrates willingness to be flexible '),
(11, 'C. Class Management ', 'Teacher creates a stimulating and effective environment for learning '),
(12, 'C. Class Management ', 'Teacher establishes and maintains a disciplined environment '),
(13, 'C. Class Management ', 'Teacher demonstrates effective planning and organization skills '),
(14, 'C. Class Management ', 'Teacher is effective in directing the class'),
(15, 'C. Class Management ', 'Teacher effectively organizes the class '),
(16, 'C. Class Management ', 'Teacher has established procedures that govern the handling of routine\r\nadministrative matters '),
(17, 'D. Management of Student Behavior', 'Teacher has established procedures that govern student verbal participation during\r\ndifferent types of activities whole class instruction, small group instruction, etc. '),
(18, 'D. Management of Student Behavior', 'Teacher has established procedures that govern student movement in the classroom\r\nduring different types of instructional activities '),
(19, 'D. Management of Student Behavior', 'Teacher frequently monitors the behavior of all students during whole-class, small\r\ngroup and seat work activities and during transitions between instructional activities '),
(20, 'D. Management of Student Behavior', 'Teacher stops inappropriate behavior promptly and consistently, yet maintains the dignity of the student '),
(21, 'E. Instructional Time ', 'Materials, supplies, and equipment are ready at the start of the lessons or\r\ninstructional activity'),
(22, 'E. Instructional Time ', 'Students are on task quickly at the beginning of each lesson or instructional activity '),
(23, 'E. Instructional Time ', 'Teacher maintains a high level of student time on-task ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hsprimary_student_record`
--

CREATE TABLE `tbl_hsprimary_student_record` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hsprimary_student_record`
--

INSERT INTO `tbl_hsprimary_student_record` (`id`, `username`, `password`, `student_id`, `firstname`, `middlename`, `lastname`, `age`, `address`, `contact_number`, `gender`, `birthday`, `grade_level`, `department`, `sy`) VALUES
(11, '001112223', '001112223', '001112223', 'Rex', 'Rex', 'Rex', 21, '', '09393345751', 'male', '', '7', 'HS-Prim', '2017 - 2018'),
(12, '053567994', '053567994', '053567994', 'Saver', 'Dela', 'Cruz JR.', 15, '', '09393345751', 'male', '', '10', 'HS-Prim', '2017 - 2018'),
(13, '053567995', '053567995', '053567995', 'Shung', 'Shung', 'Shung', 15, '', '09393345751', 'male', '', '9', 'HS-Prim', '2017 - 2018'),
(14, '097855331', '097855331', '097855331', 'Bricks', 'Bring', 'Broom', 18, '', '09393345751', 'female', '', '10', 'HS-Prim', '2017 - 2018'),
(15, '097855332', '097855332', '097855332', 'Juan', 'Dela', 'Cruz JR.', 16, '', '09393345751', 'male', '', '9', 'HS-Prim', '2017 - 2018'),
(16, '099922211', '099922211', '099922211', 'Shin', 'Shin', 'Argote', 21, '', '09393345751', 'male', '', '10', 'HS-Prim', '2017 - 2018'),
(17, '041122331', '041122331', '041122331', 'Red', 'Royal', 'Rule', 13, '', '09393345751', 'female', '', '7', 'HS-Prim', '2017 - 2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hssecondary_student_record`
--

CREATE TABLE `tbl_hssecondary_student_record` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hssecondary_student_record`
--

INSERT INTO `tbl_hssecondary_student_record` (`id`, `username`, `password`, `student_id`, `firstname`, `middlename`, `lastname`, `age`, `address`, `contact_number`, `gender`, `birthday`, `grade_level`, `department`, `semester`, `sy`) VALUES
(6, '042519911', '042519911', '042519911', 'Shing', 'SHing', 'SHing', 17, '', '09393345751', 'male', '', '11', 'HS-Sec', '1st Sem', '2017 - 2018'),
(7, '000000001', '000000001', '000000001', 'Rb', 'rb', 'rb', 19, '', '09393345751', 'male', '', '11', 'HS-Sec', '1st Sem', '2017 - 2018'),
(8, '053567991', '053567991', '053567991', 'Gorge', 'Gecho', 'Gorgie', 17, '', '09393345751', 'male', '', '11', 'HS-Sec', '1st Sem', '2017 - 2018'),
(9, '053567992', '053567992', '053567992', 'Kiera', 'Queny', 'Argote', 19, '', '09393345751', 'female', '', '12', 'HS-Sec', '1st Sem', '2017 - 2018'),
(10, '053567993', '053567993', '053567993', 'Nolie', 'Mee', 'Tangee', 19, '', '09393345751', 'male', '', '12', 'HS-Sec', '1st Sem', '2017 - 2018'),
(11, '123456789', '123456789', '123456789', 'Shinichiro', 'Argote', 'Calma', 12, '', '09393345751', 'male', '', '11', 'HS-Sec', '1st Sem', '2017 - 2018'),
(12, '042611888', '042611888', '042611888', 'Justin', 'B', 'Beiber', 17, '', '09393345751', 'male', '', '12', 'HS-Sec', '1st Sem', '2017 - 2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_feed`
--

CREATE TABLE `tbl_news_feed` (
  `id` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `post_creator` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_year`
--

CREATE TABLE `tbl_school_year` (
  `id` int(11) NOT NULL,
  `sy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_school_year`
--

INSERT INTO `tbl_school_year` (`id`, `sy`) VALUES
(1, '2017 - 2018'),
(2, '2018 - 2019'),
(3, '2019 - 2020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`id`, `semester`) VALUES
(1, '1st Sem'),
(2, '2nd Sem');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_eval`
--

CREATE TABLE `tbl_student_eval` (
  `id` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `question_id` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_eval`
--

INSERT INTO `tbl_student_eval` (`id`, `subject_code`, `question_id`, `value`, `student_id`, `teacher_id`, `sy`, `semester`, `department`) VALUES
(1815, '', '1', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1816, '', '2', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1817, '', '3', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1818, '', '4', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1819, '', '5', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1820, '', '6', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1821, '', '7', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1822, '', '8', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1823, '', '9', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1824, '', '10', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1825, '', '11', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1826, '', '12', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1827, '', '13', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1828, '', '14', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1829, '', '15', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1830, '', '16', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1831, '', '17', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1832, '', '18', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1833, '', '19', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1834, '', '20', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1835, '', '21', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1836, '', '22', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1837, '', '23', '5', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', ''),
(1838, '', '24', 'Good Professor to be with. Is a Good Teacher. Follows well structure of a course.', '123456789', 'HSROOK01', '2017 - 2018', '1st Sem', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_record`
--

CREATE TABLE `tbl_subject_record` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject_record`
--

INSERT INTO `tbl_subject_record` (`id`, `student_id`, `subject_code`, `subject_name`, `subject_teacher`, `teacher_id`, `sy`, `semester`, `department`) VALUES
(58, '012345678', 'CSBC_00', 'Office Procedure Fundamentals', 'Brian Apinado Calma', '04241996', '2017 - 2018', '1st Sem', 'CCS'),
(59, '012345678', 'CSBC_01', 'Introduction To Computer Programming', 'Ashley Mae Apinado Calma', '111222333', '2017 - 2018', '1st Sem', 'CCS'),
(66, '012345678', 'DISCMATH01', 'Discrete Mathematics', 'JudyAn Apinada Zubaku', 'ELEM_TCH_001', '2017 - 2018', '1st Sem', 'CCS'),
(71, '097855337', 'Math_01', 'Basic Elementary Math', 'Rendel Rine Ring', 'ELMTCH02', '2017 - 2018', 'NA', 'Elementary'),
(73, '091121334', 'MAS_LAW_01', 'Law Basics Human rights 101', 'L Law Liet', '04b02017', '2017 - 2018', '1st Sem', 'Grad-School'),
(75, '123456789', 'TVL-Prog1', 'Technical Vocational Track Programming 1', 'Brian Apinado Calma', 'HSROOK01', '2017 - 2018', '1st Sem', 'HS-Sec'),
(77, '014241996', 'CSBC_01', 'Introduction To Computer Programming', 'mark lolo marinas', '04a0201b', '2017 - 2018', '1st Sem', 'CCS'),
(79, '014241996', 'CSBC_00', 'Office Procedure Fundamentals', 'Retsu Pot Gremio', 'COL024BC', '2017 - 2018', '1st Sem', 'CCS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_eval`
--

CREATE TABLE `tbl_teacher_eval` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `teacher_id_1` varchar(255) NOT NULL,
  `teacher_id_2` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher_eval`
--

INSERT INTO `tbl_teacher_eval` (`id`, `question_id`, `content`, `teacher_id_1`, `teacher_id_2`, `user_type`, `sy`, `sem`, `department`) VALUES
(1417, 1, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1418, 2, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1419, 3, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1420, 4, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1421, 5, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1422, 6, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1423, 7, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1424, 8, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1425, 9, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1426, 10, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1427, 11, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1428, 12, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1429, 13, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1430, 14, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1431, 15, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1432, 16, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1433, 17, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1434, 18, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1435, 19, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1436, 20, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1437, 21, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1438, 22, '5', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1439, 23, '4', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1440, 24, 'Is An Intermediate Teacher.', 'BSBAFRDN', 'BSBAFRDN', 'Dean', '2017 - 2018', '1st Sem', ''),
(1441, 1, '5', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1442, 2, '5', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1443, 3, '5', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1444, 4, '5', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1445, 5, '5', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1446, 6, '5', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1447, 7, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1448, 8, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1449, 9, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1450, 10, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1451, 11, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1452, 12, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1453, 13, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1454, 14, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1455, 15, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1456, 16, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1457, 17, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1458, 18, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1459, 19, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1460, 20, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1461, 21, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1462, 22, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1463, 23, '4', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1464, 24, 'Follows well structure of a course. Is a Good Teacher.', 'BSBAFREN', 'TCBSBA01', 'Dean', '2017 - 2018', '1st Sem', ''),
(1465, 1, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1466, 2, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1467, 3, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1468, 4, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1469, 5, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1470, 6, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1471, 7, '4', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1472, 8, '4', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1473, 9, '4', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1474, 10, '4', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1475, 11, '4', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1476, 12, '4', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1477, 13, '4', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1478, 14, '4', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1479, 15, '4', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1480, 16, '4', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1481, 17, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1482, 18, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1483, 19, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1484, 20, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1485, 21, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1486, 22, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1487, 23, '5', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1488, 24, 'Is An Intermediate Teacher. Good Professor to be with.', 'TCBSBA01', 'TCBSBA01', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1489, 1, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1490, 2, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1491, 3, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1492, 4, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1493, 5, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1494, 6, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1495, 7, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1496, 8, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1497, 9, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1498, 10, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1499, 11, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1500, 12, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1501, 13, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1502, 14, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1503, 15, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1504, 16, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1505, 17, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1506, 18, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1507, 19, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1508, 20, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1509, 21, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1510, 22, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1511, 23, '5', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', ''),
(1512, 24, 'Good Professor to be with.', '04a0201b', '04a0201b', 'Teacher', '2017 - 2018', '1st Sem', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_eval_log`
--

CREATE TABLE `tbl_teacher_eval_log` (
  `id` int(11) NOT NULL,
  `teacher_id_1` varchar(255) NOT NULL,
  `teacher_id_2` varchar(255) NOT NULL,
  `is_peer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher_eval_log`
--

INSERT INTO `tbl_teacher_eval_log` (`id`, `teacher_id_1`, `teacher_id_2`, `is_peer`) VALUES
(38, 'exox2122', 'HSROOK01', ''),
(60, 'BSBAFREN', 'KIERA004', ''),
(61, 'BSBAFREN', 'TCBSBA01', 'YES'),
(63, '2014007b', '04a0201b', ''),
(74, 'HSROOK01', 'exox2122', ''),
(75, '2014007b', 'COL024BC', ''),
(76, '2014007b', '2014007a', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_record`
--

CREATE TABLE `tbl_teacher_record` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher_record`
--

INSERT INTO `tbl_teacher_record` (`id`, `username`, `password`, `teacher_id`, `firstname`, `middlename`, `lastname`, `age`, `contact_number`, `gender`, `semester`, `sy`, `department`, `STATUS`) VALUES
(19, 'HSROOK01', 'HSROOK01', 'HSROOK01', 'Brian', 'Apinado', 'Calma', 21, '09393345751', 'male', '1st Sem', '2017 - 2018', 'HS-Sec', 1),
(20, '04a0201b', '04a0201b', '04a0201b', 'mark', 'lolo', 'marinas', 35, '09393345751', 'male', '1st Sem', '2017 - 2018', 'CCS', 1),
(21, 'exox2122', 'exox2122', 'exox2122', 'Hello', 'Hella', 'Hex', 25, '09393345751', 'male', '1st Sem', '2017 - 2018', 'HS-Sec', 1),
(22, '2014007a', 'meteoro', '2014007a', 'jandenver', 'merillo', 'meteoro', 20, '09101192062', 'male', '1st Sem', '2017 - 2018', 'CCS', 1),
(25, 'COL024BC', 'COL024BC', 'COL024BC', 'Retsu', 'Pot', 'Gremio', 28, '09393345751', 'male', '1st Sem', '2017 - 2018', 'CCS', 1),
(26, 'TCBSBA01', 'TCBSBA01', 'TCBSBA01', 'Angelica', 'Apuli', 'Abion', 35, '090902110211', 'male', '1st Sem', '2017 - 2018', 'BSBA', 1),
(27, 'KIERA004', 'KIERA004', 'KIERA004', 'Erika Queny ', 'Argote', 'Calma', 25, '09393345751', 'female', '1st Sem', '2017 - 2018', 'BSBA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_list`
--

CREATE TABLE `tbl_user_list` (
  `id` int(11) NOT NULL,
  `user_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_list`
--

INSERT INTO `tbl_user_list` (`id`, `user_account`) VALUES
(1, 'Student'),
(2, 'Dean'),
(3, 'Teacher'),
(4, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_record`
--
ALTER TABLE `tbl_admin_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_college_student_record`
--
ALTER TABLE `tbl_college_student_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course_record`
--
ALTER TABLE `tbl_course_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_curriculum_map`
--
ALTER TABLE `tbl_curriculum_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dean_record`
--
ALTER TABLE `tbl_dean_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_elementary_student_record`
--
ALTER TABLE `tbl_elementary_student_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_eval_items_record`
--
ALTER TABLE `tbl_eval_items_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hsprimary_student_record`
--
ALTER TABLE `tbl_hsprimary_student_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hssecondary_student_record`
--
ALTER TABLE `tbl_hssecondary_student_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news_feed`
--
ALTER TABLE `tbl_news_feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_eval`
--
ALTER TABLE `tbl_student_eval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject_record`
--
ALTER TABLE `tbl_subject_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher_eval`
--
ALTER TABLE `tbl_teacher_eval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher_eval_log`
--
ALTER TABLE `tbl_teacher_eval_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher_record`
--
ALTER TABLE `tbl_teacher_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_list`
--
ALTER TABLE `tbl_user_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_record`
--
ALTER TABLE `tbl_admin_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_college_student_record`
--
ALTER TABLE `tbl_college_student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_course_record`
--
ALTER TABLE `tbl_course_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_curriculum_map`
--
ALTER TABLE `tbl_curriculum_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_dean_record`
--
ALTER TABLE `tbl_dean_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_elementary_student_record`
--
ALTER TABLE `tbl_elementary_student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_eval_items_record`
--
ALTER TABLE `tbl_eval_items_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_hsprimary_student_record`
--
ALTER TABLE `tbl_hsprimary_student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_hssecondary_student_record`
--
ALTER TABLE `tbl_hssecondary_student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_news_feed`
--
ALTER TABLE `tbl_news_feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student_eval`
--
ALTER TABLE `tbl_student_eval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1911;

--
-- AUTO_INCREMENT for table `tbl_subject_record`
--
ALTER TABLE `tbl_subject_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_teacher_eval`
--
ALTER TABLE `tbl_teacher_eval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1585;

--
-- AUTO_INCREMENT for table `tbl_teacher_eval_log`
--
ALTER TABLE `tbl_teacher_eval_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_teacher_record`
--
ALTER TABLE `tbl_teacher_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_user_list`
--
ALTER TABLE `tbl_user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
