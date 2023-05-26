-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 07:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `password`) VALUES
('administrator', 'admin@au');

-- --------------------------------------------------------

--
-- Table structure for table `bca1`
--

CREATE TABLE `bca1` (
  `sub_name` varchar(40) DEFAULT NULL,
  `sub_id` varchar(5) NOT NULL,
  `type` varchar(9) DEFAULT NULL,
  `teacher` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bca1`
--

INSERT INTO `bca1` (`sub_name`, `sub_id`, `type`, `teacher`) VALUES
('Mathematics I', 'p1', 'theory', '200'),
('Statistics', 'p2', 'theory', '204'),
('Digital Electronics', 'p3', 'theory', '203'),
('C Language', 'p4', 'theory', '213'),
('Communication Skills', 'p5', 'theory', '206'),
('Discrete Structure & Graph Theory', 'p6', 'theory', '202'),
('C Language', 'pr1', 'practical', '204'),
('Digital Electronics', 'pr2', 'practical', '203');

-- --------------------------------------------------------

--
-- Table structure for table `bca3`
--

CREATE TABLE `bca3` (
  `sub_name` varchar(40) DEFAULT NULL,
  `sub_id` varchar(5) NOT NULL,
  `type` varchar(9) DEFAULT NULL,
  `teacher` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bca3`
--

INSERT INTO `bca3` (`sub_name`, `sub_id`, `type`, `teacher`) VALUES
('Discrete Structure & Graph Theory', 'p1', 'theory', '200'),
('Design & Analysis of Algorithm', 'p2', 'theory', '201'),
('System Software', 'p3', 'theory', '205'),
('OOP using C++', 'p4', 'theory', '202'),
('DBMS', 'p5', 'theory', '208'),
('Computer Architecture & Microprocessors', 'p6', 'theory', '203'),
('OOP using C++', 'pr1', 'practical', '202'),
('DBMS', 'pr2', 'practical', '204');

-- --------------------------------------------------------

--
-- Table structure for table `bca_ds1`
--

CREATE TABLE `bca_ds1` (
  `sub_name` varchar(40) DEFAULT NULL,
  `sub_id` varchar(5) NOT NULL,
  `type` varchar(9) DEFAULT NULL,
  `teacher` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bca_ds1`
--

INSERT INTO `bca_ds1` (`sub_name`, `sub_id`, `type`, `teacher`) VALUES
('Mathematics I', 'p1', 'theory', '200'),
('C with Data Structure', 'p2', 'theory', '217'),
('Data Engineering', 'p3', 'theory', '209'),
('Fundamental of Data Science', 'p4', 'theory', '210'),
('Internet Programming', 'p5', 'theory', '207'),
('Communication Skills', 'p6', 'theory', '206'),
('C with Data Structure', 'pr1', 'practical', '208'),
('Internet Programming', 'pr2', 'practical', '207');

-- --------------------------------------------------------

--
-- Table structure for table `bca_ds3`
--

CREATE TABLE `bca_ds3` (
  `sub_name` varchar(40) DEFAULT NULL,
  `sub_id` varchar(5) NOT NULL,
  `type` varchar(9) DEFAULT NULL,
  `teacher` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bca_ds3`
--

INSERT INTO `bca_ds3` (`sub_name`, `sub_id`, `type`, `teacher`) VALUES
('Statistics', 'p1', 'theory', '211'),
('AI', 'p2', 'theory', '201'),
('Advanced Data Structure', 'p3', 'theory', '210'),
('Discrete Maths', 'p4', 'theory', '200'),
('Web Technology using Python', 'p5', 'theory', '209'),
('Fundamental of Computer Networks', 'p6', 'theory', '211'),
('Advanced Data Structure', 'pr1', 'practical', '208'),
('Web Technology using Python', 'pr2', 'practical', '209');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` int(3) NOT NULL,
  `room` varchar(10) NOT NULL,
  `dept` varchar(15) NOT NULL,
  `floor` varchar(1) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `room`, `dept`, `floor`, `type`) VALUES
(1, 'L1', 'CFT', '3', 'Lecture hall'),
(2, 'L2', 'CFT', '3', 'Lecture hall'),
(3, 'Lab1', 'CFT', '3', 'Computer lab'),
(4, 'EL1', 'E-Learning', '1', 'Lecture hall'),
(5, 'EL2', 'E-Learning', '1', 'Lecture hall'),
(6, 'LH1', 'CCET', '2', 'Lecture hall'),
(7, 'LH2', 'CCET', '2', 'Lecture hall'),
(8, 'Lab2', 'CCET', '1', 'Computer lab'),
(9, 'Lab2', 'E-Learning', '2', 'Computer lab'),
(10, 'Lab1', 'E-Learning', '1', 'Computer lab'),
(11, 'Lab1', 'CCET', '1', 'Electronics lab');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `class` int(2) NOT NULL,
  `lab` int(2) NOT NULL,
  `timetable` varchar(3) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `class`, `lab`, `timetable`) VALUES
(2, 'mca3', 1, 3, 'No'),
(3, 'mca1', 5, 3, 'Yes'),
(4, 'bca1', 4, 8, 'Yes'),
(5, 'bca3', 5, 10, 'No'),
(7, 'bca_ds1', 1, 8, 'Yes'),
(8, 'bca_ds3', 7, 9, 'No'),
(9, 'pgdca1', 6, 8, 'Yes'),
(10, 'newcourse', 0, 0, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `mca1`
--

CREATE TABLE `mca1` (
  `sub_name` varchar(40) DEFAULT NULL,
  `sub_id` varchar(5) NOT NULL,
  `type` varchar(9) DEFAULT NULL,
  `teacher` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mca1`
--

INSERT INTO `mca1` (`sub_name`, `sub_id`, `type`, `teacher`) VALUES
('C with Data Structure', 'p1', 'theory', '213'),
('DBMS', 'p2', 'theory', '214'),
('Computer Organization & Archtecture', 'p3', 'theory', '203'),
('Principle of Management', 'p4', 'theory', '216'),
('Software Engineering', 'p5', 'theory', '201'),
('Discrete Structure & Graph Theory', 'p6', 'theory', '208'),
('C with Data Structure', 'pr1', 'practical', '211'),
('DBMS', 'pr2', 'practical', '201');

-- --------------------------------------------------------

--
-- Table structure for table `mca3`
--

CREATE TABLE `mca3` (
  `sub_name` varchar(40) DEFAULT NULL,
  `sub_id` varchar(5) NOT NULL,
  `type` varchar(9) DEFAULT NULL,
  `teacher` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mca3`
--

INSERT INTO `mca3` (`sub_name`, `sub_id`, `type`, `teacher`) VALUES
('.NET Framework with C#', 'p1', 'theory', '202'),
('Operation Research', 'p2', 'theory', '208'),
('Data Communication & Networks', 'p3', 'theory', '207'),
('Information Retrieval & Web Mining', 'p4', 'theory', '209'),
('Machine Learning Techniques', 'p5', 'theory', '214'),
('Multimedia System', 'p6', 'theory', '204'),
('Mini Project', 'pr1', 'practical', '201');

-- --------------------------------------------------------

--
-- Table structure for table `newcourse`
--

CREATE TABLE `newcourse` (
  `sub_name` varchar(40) DEFAULT NULL,
  `sub_id` varchar(5) NOT NULL,
  `type` varchar(9) DEFAULT NULL,
  `teacher` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newcourse`
--

INSERT INTO `newcourse` (`sub_name`, `sub_id`, `type`, `teacher`) VALUES
('.NET Framework with C#', 'p1', 'theory', '213'),
('Advanced Algorithms and Analysis', 'p2', 'theory', '203'),
('.NET Framework with C#', 'pr1', 'practical', '201');

-- --------------------------------------------------------

--
-- Table structure for table `pgdca1`
--

CREATE TABLE `pgdca1` (
  `sub_name` varchar(40) DEFAULT NULL,
  `sub_id` varchar(5) NOT NULL,
  `type` varchar(9) DEFAULT NULL,
  `teacher` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pgdca1`
--

INSERT INTO `pgdca1` (`sub_name`, `sub_id`, `type`, `teacher`) VALUES
('Computer Fundamental & IT', 'p1', 'theory', '212'),
('Office Automation & DTP Tools', 'p2', 'theory', '205'),
('Web Technology', 'p3', 'theory', '215'),
('C with Data Structure', 'p4', 'theory', '217'),
('System Software', 'p5', 'theory', '207'),
('C with Data Structure', 'pr1', 'practical', '207'),
('Web Technology', 'pr2', 'practical', '205');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `s_id` int(3) NOT NULL,
  `sub_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`s_id`, `sub_name`) VALUES
(1, 'C with Data Structure'),
(2, 'DBMS'),
(3, 'Computer Organization & Archtecture'),
(4, 'Principle of Management'),
(5, 'Software Engineering'),
(6, 'Discrete Structure & Graph Theory'),
(7, 'Theory of Computation'),
(8, 'OOP with Python'),
(9, 'AI & Robotics'),
(10, 'Design & Analysis of Algorithm'),
(11, 'OS & Linux Shell Programming'),
(12, 'Data Communication & Networks'),
(14, 'Cryptography & Cyber Security'),
(15, 'Compiler Design'),
(16, 'Optimization Techniques'),
(17, 'Machine Learning Techniques'),
(18, 'Elective I'),
(19, 'Mini Project'),
(20, 'Mobile Computing & Applications'),
(21, 'Elective II'),
(22, 'Major Project'),
(23, 'Mathematics I'),
(24, 'Statistics'),
(25, 'Digital Electronics'),
(26, 'C Language'),
(27, 'Communication Skills'),
(28, 'Mathematics II'),
(29, 'Data Structure'),
(30, 'Core Java'),
(31, 'System Software'),
(32, 'Principle of Programming Languages'),
(33, 'Operating System'),
(34, 'AI'),
(35, 'Computer Graphics'),
(36, 'Fundamental of Data Science'),
(37, 'Data Mining & Warehousing'),
(38, 'Digital Image Processing'),
(39, 'Cyber Ethics'),
(40, 'Artificial Neural & Deep Learning'),
(41, 'Computer Vision'),
(42, 'Parallel Computing'),
(43, 'Distributed System'),
(44, 'Internet Programming'),
(45, 'Applied Algebra'),
(46, 'Entrepreneurship Development'),
(47, 'Advanced Data Structure'),
(48, 'Discrete Maths'),
(49, 'Web Technology using Python'),
(50, 'Probability Theory '),
(51, 'Advanced Algorithms and Analysis'),
(52, 'Advanced DBMS'),
(53, 'Computational Intelligence'),
(54, 'Ethics in IT'),
(55, 'Data Visualization'),
(56, 'R Programming'),
(57, 'Transforms and Their Applications '),
(58, 'Statistical Pattern Recognition'),
(59, 'Big Data System'),
(60, 'Formal Languages & Automata Theory'),
(61, 'Business Analytics '),
(62, 'Bio-inspired Data Engineering '),
(63, 'Research Methodology'),
(64, 'Work Place Skills'),
(65, 'Colloquium'),
(66, 'Fuzzy Logic and its Applications'),
(67, 'Blockchain Technology'),
(68, 'Multivariate & Time Series Analysis'),
(69, 'Complex Network Analysis'),
(70, 'Domain Engineering'),
(71, 'Elective III'),
(72, 'Computer Fundamental & IT'),
(73, 'Office Automation & DTP Tools'),
(74, 'Web Technology'),
(75, 'Introduction to Algorithm'),
(76, 'Numerical Methods'),
(77, 'Financial & Organizational Management'),
(78, 'System Programming'),
(79, 'Core & Advanced JAVA'),
(80, 'Advanced Computer Organization'),
(81, 'Operation Research'),
(82, 'Information Retrieval & Web Mining'),
(83, 'Multimedia System'),
(84, 'Secure Computing'),
(85, 'Embedded System Design'),
(86, 'Image Processing'),
(87, 'Digital Communication'),
(88, 'OOP using C++'),
(89, 'Computer Architecture & Microprocessors'),
(90, 'Data Engineering'),
(91, 'Fundamental of Computer Networks'),
(94, '.NET Framework with C#'),
(96, 'Subject1');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(4) NOT NULL,
  `tname` varchar(35) NOT NULL,
  `tphone` int(10) NOT NULL,
  `tmail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `tname`, `tphone`, `tmail`) VALUES
(0, 'Bhoot', 1431431431, 'bhoot@gmail.com'),
(198, 'Prof. Ashish Khare', 1111111111, 'khare@allduniv.ac.in'),
(200, 'Dr. Madhusudan Singh', 1111111112, 'smadhu_math@rediffmail.com'),
(201, 'Dr. Sarika Yadav', 1111111113, 'sarika.yadav@allduniv.ac.in'),
(202, 'Ms. Sunita Tripathi', 1111111114, 'sunita@allduniv.ac.in'),
(203, 'Ms. Farha Usman', 1111111115, 'farhausman@allduniv.ac.in'),
(204, 'Mr. Rajendra Kumar Pandey', 1111111116, 'rkumarpandey21@gmail.com'),
(205, 'Mr. Brijesh Rai', 1111111117, 'raibrijesh@allduniv.ac.in'),
(206, 'Ms. Gunjan Varshney', 1111111118, 'gunjanvarshney@allduniv.ac.in'),
(207, 'Mr. Dhananjay Pratap Singh', 111111119, 'dhananjay228@gmail.com'),
(208, 'Mr. Anand Durga Singh', 1111111110, 'adsingh3036@gmail.com'),
(209, 'Mr. Rahul Mishra', 1111111120, 'rahulmishra@allduniv.ac.in'),
(210, 'Mr. Vipul Chandra Varshney', 1111111121, 'v.vipul@allduniv.ac.in'),
(211, 'Dr.Reddy Mounika B.', 1111111122, 'reddymounika.b@gmail.com'),
(212, 'Mr. Anurag Singh Chauhan', 1111111123, 'anurag@allduniv.ac.in'),
(213, 'Dr. Richa Srivastava', 1111111124, 'richa@gmail.com'),
(214, 'Ms. Arti Kushwaha', 1111111125, 'arti@gmail.com'),
(215, 'Ms. Neha Jaiswal', 1111111126, 'neha@gmail.com'),
(216, 'Dr. Shivi Srivastava', 1111111127, 'shivi@gmail.com'),
(217, 'Mr. Khakon  Das', 1111111128, 'khakon@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(1) NOT NULL,
  `value` int(1) NOT NULL,
  `tid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `value`, `tid`) VALUES
(1, 0, 595);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bca1`
--
ALTER TABLE `bca1`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `bca3`
--
ALTER TABLE `bca3`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `bca_ds1`
--
ALTER TABLE `bca_ds1`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `bca_ds3`
--
ALTER TABLE `bca_ds3`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mca1`
--
ALTER TABLE `mca1`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `mca3`
--
ALTER TABLE `mca3`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `newcourse`
--
ALTER TABLE `newcourse`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `pgdca1`
--
ALTER TABLE `pgdca1`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `s_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
