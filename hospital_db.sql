-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 04:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Computer Science', 'Focuses on programming, algorithms, software development, data structures, and computer systems, preparing students for careers in software engineering, systems analysis, or AI research.', '2024-11-22 15:25:56'),
(2, 'Information Technology', 'Emphasizes IT systems, networking, cybersecurity, and database management, equipping students to work as IT specialists, systems administrators, or network engineers.', '2024-11-22 15:25:56'),
(3, 'Business Administration', 'Covers core business principles like marketing, management, finance, and operations, designed for students aiming for managerial or entrepreneurial roles.', '2024-11-22 15:26:42'),
(4, 'Criminology', 'Course dedicated to training students into the police force', '2024-11-22 15:26:42'),
(5, 'Education', 'Designed for aspiring teachers, this program includes pedagogy, curriculum planning, and specialization in elementary or secondary education', '2024-11-22 15:27:12'),
(6, 'Psychology', 'Explores human behavior, cognitive processes, and mental health, preparing students for careers in counseling, human resources, or research', '2024-11-22 15:27:12'),
(7, 'Office Administration', 'course for students who in position ensures that the set of tasks and practices in an office runs smoothly and efficiently', '2024-11-22 15:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `course_subjects`
--

CREATE TABLE `course_subjects` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `subject_id`, `title`, `created_at`) VALUES
(453, 71, 'Quiz 1', '2024-11-24 17:00:38'),
(454, 71, 'Quiz 2', '2024-11-24 17:00:38'),
(455, 71, 'Quiz 3', '2024-11-24 17:00:38'),
(456, 71, 'Quiz 4', '2024-11-24 17:00:38'),
(457, 71, 'Quiz 5', '2024-11-24 17:00:38'),
(458, 71, 'Quiz 6', '2024-11-24 17:00:38'),
(459, 71, 'Quiz 7', '2024-11-24 17:00:38'),
(460, 71, 'Quiz 8', '2024-11-24 17:00:38'),
(461, 71, 'Quiz 9', '2024-11-24 17:00:38'),
(462, 71, 'Quiz 10', '2024-11-24 17:00:38'),
(463, 71, 'Quiz 11', '2024-11-24 17:00:38'),
(464, 71, 'Quiz 12', '2024-11-24 17:00:38'),
(465, 71, 'Quiz 13', '2024-11-24 17:00:38'),
(466, 71, 'Quiz 14', '2024-11-24 17:00:38'),
(467, 71, 'Quiz 15', '2024-11-24 17:00:38'),
(468, 71, 'Quiz 16', '2024-11-24 17:00:38'),
(469, 71, 'Quiz 17', '2024-11-24 17:00:38'),
(470, 71, 'Quiz 18', '2024-11-24 17:00:38'),
(471, 72, 'Quiz 1', '2024-11-24 17:00:38'),
(472, 72, 'Quiz 2', '2024-11-24 17:00:38'),
(473, 72, 'Quiz 3', '2024-11-24 17:00:38'),
(474, 72, 'Quiz 4', '2024-11-24 17:00:38'),
(475, 72, 'Quiz 5', '2024-11-24 17:00:38'),
(476, 72, 'Quiz 6', '2024-11-24 17:00:38'),
(477, 72, 'Quiz 7', '2024-11-24 17:00:38'),
(478, 72, 'Quiz 8', '2024-11-24 17:00:38'),
(479, 72, 'Quiz 9', '2024-11-24 17:00:38'),
(480, 72, 'Quiz 10', '2024-11-24 17:00:38'),
(481, 72, 'Quiz 11', '2024-11-24 17:00:38'),
(482, 72, 'Quiz 12', '2024-11-24 17:00:38'),
(483, 72, 'Quiz 13', '2024-11-24 17:00:38'),
(484, 72, 'Quiz 14', '2024-11-24 17:00:38'),
(485, 72, 'Quiz 15', '2024-11-24 17:00:38'),
(486, 72, 'Quiz 16', '2024-11-24 17:00:38'),
(487, 72, 'Quiz 17', '2024-11-24 17:00:38'),
(488, 72, 'Quiz 18', '2024-11-24 17:00:38'),
(489, 73, 'Quiz 1', '2024-11-24 17:00:38'),
(490, 73, 'Quiz 2', '2024-11-24 17:00:38'),
(491, 73, 'Quiz 3', '2024-11-24 17:00:38'),
(492, 73, 'Quiz 4', '2024-11-24 17:00:38'),
(493, 73, 'Quiz 5', '2024-11-24 17:00:38'),
(494, 73, 'Quiz 6', '2024-11-24 17:00:38'),
(495, 73, 'Quiz 7', '2024-11-24 17:00:38'),
(496, 73, 'Quiz 8', '2024-11-24 17:00:38'),
(497, 73, 'Quiz 9', '2024-11-24 17:00:38'),
(498, 73, 'Quiz 10', '2024-11-24 17:00:38'),
(499, 73, 'Quiz 11', '2024-11-24 17:00:38'),
(500, 73, 'Quiz 12', '2024-11-24 17:00:38'),
(501, 73, 'Quiz 13', '2024-11-24 17:00:38'),
(502, 73, 'Quiz 14', '2024-11-24 17:00:38'),
(503, 73, 'Quiz 15', '2024-11-24 17:00:38'),
(504, 73, 'Quiz 16', '2024-11-24 17:00:38'),
(505, 73, 'Quiz 17', '2024-11-24 17:00:38'),
(506, 73, 'Quiz 18', '2024-11-24 17:00:38'),
(651, 82, 'Quiz 1', '2024-11-24 17:02:31'),
(652, 82, 'Quiz 2', '2024-11-24 17:02:31'),
(653, 82, 'Quiz 3', '2024-11-24 17:02:31'),
(654, 82, 'Quiz 4', '2024-11-24 17:02:31'),
(655, 82, 'Quiz 5', '2024-11-24 17:02:31'),
(656, 82, 'Quiz 6', '2024-11-24 17:02:31'),
(657, 82, 'Quiz 7', '2024-11-24 17:02:31'),
(658, 82, 'Quiz 8', '2024-11-24 17:02:31'),
(659, 82, 'Quiz 9', '2024-11-24 17:02:31'),
(660, 82, 'Quiz 10', '2024-11-24 17:02:31'),
(661, 82, 'Quiz 11', '2024-11-24 17:02:31'),
(662, 82, 'Quiz 12', '2024-11-24 17:02:31'),
(663, 82, 'Quiz 13', '2024-11-24 17:02:31'),
(664, 82, 'Quiz 14', '2024-11-24 17:02:31'),
(665, 82, 'Quiz 15', '2024-11-24 17:02:31'),
(666, 82, 'Quiz 16', '2024-11-24 17:02:31'),
(667, 82, 'Quiz 17', '2024-11-24 17:02:31'),
(668, 82, 'Quiz 18', '2024-11-24 17:02:31'),
(705, 85, 'Quiz 1', '2024-11-24 17:02:31'),
(706, 85, 'Quiz 2', '2024-11-24 17:02:31'),
(707, 85, 'Quiz 3', '2024-11-24 17:02:31'),
(708, 85, 'Quiz 4', '2024-11-24 17:02:31'),
(709, 85, 'Quiz 5', '2024-11-24 17:02:31'),
(710, 85, 'Quiz 6', '2024-11-24 17:02:31'),
(711, 85, 'Quiz 7', '2024-11-24 17:02:31'),
(712, 85, 'Quiz 8', '2024-11-24 17:02:31'),
(713, 85, 'Quiz 9', '2024-11-24 17:02:31'),
(714, 85, 'Quiz 10', '2024-11-24 17:02:31'),
(715, 85, 'Quiz 11', '2024-11-24 17:02:31'),
(716, 85, 'Quiz 12', '2024-11-24 17:02:31'),
(717, 85, 'Quiz 13', '2024-11-24 17:02:31'),
(718, 85, 'Quiz 14', '2024-11-24 17:02:31'),
(719, 85, 'Quiz 15', '2024-11-24 17:02:31'),
(720, 85, 'Quiz 16', '2024-11-24 17:02:31'),
(721, 85, 'Quiz 17', '2024-11-24 17:02:31'),
(722, 85, 'Quiz 18', '2024-11-24 17:02:31'),
(723, 86, 'Quiz 1', '2024-11-24 17:02:31'),
(724, 86, 'Quiz 2', '2024-11-24 17:02:31'),
(725, 86, 'Quiz 3', '2024-11-24 17:02:31'),
(726, 86, 'Quiz 4', '2024-11-24 17:02:31'),
(727, 86, 'Quiz 5', '2024-11-24 17:02:31'),
(728, 86, 'Quiz 6', '2024-11-24 17:02:31'),
(729, 86, 'Quiz 7', '2024-11-24 17:02:31'),
(730, 86, 'Quiz 8', '2024-11-24 17:02:31'),
(731, 86, 'Quiz 9', '2024-11-24 17:02:31'),
(732, 86, 'Quiz 10', '2024-11-24 17:02:31'),
(733, 86, 'Quiz 11', '2024-11-24 17:02:31'),
(734, 86, 'Quiz 12', '2024-11-24 17:02:31'),
(735, 86, 'Quiz 13', '2024-11-24 17:02:31'),
(736, 86, 'Quiz 14', '2024-11-24 17:02:31'),
(737, 86, 'Quiz 15', '2024-11-24 17:02:31'),
(738, 86, 'Quiz 16', '2024-11-24 17:02:31'),
(739, 86, 'Quiz 17', '2024-11-24 17:02:31'),
(740, 86, 'Quiz 18', '2024-11-24 17:02:31'),
(777, 89, 'Quiz 1', '2024-11-25 06:38:13'),
(778, 89, 'Quiz 2', '2024-11-25 06:38:13'),
(779, 89, 'Quiz 3', '2024-11-25 06:38:13'),
(780, 89, 'Quiz 4', '2024-11-25 06:38:13'),
(781, 89, 'Quiz 5', '2024-11-25 06:38:13'),
(782, 89, 'Quiz 6', '2024-11-25 06:38:13'),
(783, 89, 'Quiz 7', '2024-11-25 06:38:13'),
(784, 89, 'Quiz 8', '2024-11-25 06:38:13'),
(785, 89, 'Quiz 9', '2024-11-25 06:38:13'),
(786, 89, 'Quiz 10', '2024-11-25 06:38:13'),
(787, 89, 'Quiz 11', '2024-11-25 06:38:13'),
(788, 89, 'Quiz 12', '2024-11-25 06:38:13'),
(789, 89, 'Quiz 13', '2024-11-25 06:38:13'),
(790, 89, 'Quiz 14', '2024-11-25 06:38:13'),
(791, 89, 'Quiz 15', '2024-11-25 06:38:13'),
(792, 89, 'Quiz 16', '2024-11-25 06:38:13'),
(793, 89, 'Quiz 17', '2024-11-25 06:38:13'),
(794, 89, 'Quiz 18', '2024-11-25 06:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `course_code` tinytext NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `course_code`, `name`, `description`, `created_at`) VALUES
(71, 'ITE1', 'IT Elective 1', 'Learn Web Development! HTML CSS Javascript and PHP', '2024-11-24 17:00:38'),
(72, 'ITE2', 'IT Elective 2', 'Learn more Java!', '2024-11-24 17:00:38'),
(73, 'ITE3', 'IT Elective 3 (Research)', 'Learn about how to conduct a Research', '2024-11-24 17:00:38'),
(82, 'PM101', 'Project Management', 'Learn about managing projects professionally', '2024-11-24 17:02:31'),
(85, 'OAD', 'Foundation of Shorthand', 'Learn about George Shorthand and how to write it', '2024-11-24 17:02:31'),
(86, 'NE2', 'Natural Science (Zoology)', 'Learn about Animals in Zoology', '2024-11-24 17:02:31'),
(89, 'PSY312', 'Group Dynamics', 'a psychology theory that studies how people interact and behave in groups, and the processes and actions that take place within and between groups', '2024-11-25 06:38:13');

--
-- Triggers `subjects`
--
DELIMITER $$
CREATE TRIGGER `after_subject_insert` AFTER INSERT ON `subjects` FOR EACH ROW BEGIN
    DECLARE i INT DEFAULT 1;

    WHILE i <= 18 DO
        INSERT INTO `quizzes` (`subject_id`, `title`, `created_at`)
        VALUES (NEW.id, CONCAT('Quiz ', i), NOW());
        SET i = i + 1;
    END WHILE;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `gender` enum('m','f','o') DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `role` enum('patient','employee','admin','doctor') NOT NULL DEFAULT 'patient',
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `password`, `firstname`, `lastname`, `gender`, `address`, `dateofbirth`, `role`, `email`, `contact_no`, `notes`, `created_at`, `updated_at`) VALUES
(2, 'atesh', '$2y$10$yLpY74NKjHO/4iwi3FqdV.BbAPLY6IibrIw26Lk87A8rw9suAth0G', 'Chester Barry', 'Dapatnapo', 'm', 'Holy Cross', '2003-07-21', 'admin', 'atesh', '912345678', 'di na natutulog aaaaaaah', '2024-11-23 05:57:38', '2025-03-04 15:23:55'),
(3, 'keia', '$2y$10$QdJQHizyzZ5i6FtpF/AK3OjF0Jzas/phY63HgnTwyYO3weQKrT9Fm', 'Keith Anne', 'Delos Reyes', 'f', 'Antipolo', '2002-04-07', 'doctor', 'keia', '912345678', 'valorant valorant', '2024-11-23 05:57:38', '2025-03-04 15:23:56'),
(4, 'shizue', '$2y$10$reyp/8I1/U0vNXyOoFjouOLiXPshg6R8M08BKGstZ7TF6BToy/GD.', 'Mark Jade', 'Malisa', 'm', 'Nitang', '2000-01-01', 'employee', 'shizue', '912345678', 'heil hi-', '2024-11-23 05:57:38', '2025-03-04 15:23:56'),
(5, 'bankai', '$2y$10$GBMvWcCZnSwLsCBfukviXuPpdb5cnm1kuxeSI.UDHcv0OWGijYrQ6', 'Ivan Christopher', 'Bullo', 'm', 'Brgy. Manotoc', '2004-02-07', 'doctor', 'bankai', '912345678', 'nang-f-flash ng kampi', '2024-11-23 05:57:38', '2025-03-04 15:23:56'),
(9, 'kent', '$2y$10$6walkLV94HwxGYCXuNDgMuK7IZFz6GKCyKzesH0ZYSGQXFrKHlMgq', 'Kent Cedric', 'Ancheta', 'm', 'Sangandaan', '2004-08-02', 'patient', 'kent', '912345678', 'nagyayaya ng suntukan\r\n', '2024-11-23 05:57:38', '2025-03-04 15:23:56'),
(13, 'areyousure', '$2y$10$pFw1.hj7DQW9NJMqOr80LOAbdltqZgqfsld.xH/lRfb/MRa1drvRy', 'Rolando', 'Dela Pena', 'm', 'Talipapa', '2001-07-01', 'patient', 'rolando', '912345678', 'lagi maganda nasa isip, nabaliw', '2024-11-23 05:57:38', '2025-03-04 15:23:56'),
(14, 'mark', '$2y$10$fqRrIePey8vJ5F4.SnIA/O3QquDM2NUmsd/8S6xkHGg/oFTsr.xx2', 'Mark Angelo', 'Painagan', 'm', 'Talipapa', '2003-12-12', 'employee', 'mark', '912345678', 'clan war grinderist', '2024-11-23 05:57:38', '2025-03-04 15:23:57'),
(24, 'balacy', '$2y$10$FYCo0SSavYXnW7Af3m03QezhmT63mpq46lN8VJDZEUkf4OS01yA22', 'John Mark', 'Balacy', 'm', 'Commonwealth Ave.', '2022-01-18', 'employee', 'balacy', '912345678', 'ryujin', '2024-11-23 05:57:38', '2025-03-04 15:23:57'),
(30, 'ally', '$2y$10$n3tSmlabwtxdPArqdTjyxOd0.dVblv13pplUNWmGWk4n.rKEFBtRe', 'Allysa', 'Araneta', 'f', 'Quezon City', '2003-11-02', 'doctor', 'allysa@gmail.com', '946543362', 'sike', '2024-11-23 05:57:38', '2025-03-04 15:23:57'),
(31, 'jorge', '$2y$10$/Un8j7G/ir0BHcIlGB8uM.lKqdsO2wo.dD5Wjxr6y/6WBju/wWL.i', 'Jorge', 'Lucero', 'm', 'Quezon City', '0000-00-00', 'admin', 'jorgelucero@gmail.com', '976433234', 'I am the Project Sponsor', '0000-00-00 00:00:00', '2025-03-04 15:23:57'),
(32, 'andy', '$2y$10$PweXdulIwOSaX94FPC6W5exWHgWaIuVTdDv3mRb2lmPX1/Ay5g7Rm', 'Andy', 'Adovas', 'm', 'Quezon City', '1999-02-12', 'admin', 'andy@gmail.com', '913423823', 'I teach programming', '2024-11-23 05:57:38', '2025-03-04 15:23:57'),
(33, 'sid', '$2y$10$N6D6GeJLF3IfCbz1wT4jMehRklGPwlqyjqFkCJAO1dc1tcbnjVTNC', 'Joel', 'Almazan', 'o', 'Quezon City', '1999-06-16', 'admin', 'sid@gmail.com', '912345678', 'ahgaife', '2024-11-23 17:53:28', '2025-03-04 15:23:57'),
(34, 'jessa', '$2y$10$qU4JS7QgSJJZWXzsNaonT.GTf1x3dEiJXyZVM1gSJrZTi3wU2RnN.', 'Jessa', 'Brogada', 'f', 'Quezon CIty', '1999-07-15', 'admin', 'jessa@gmail.com', '924817549', 'agdfhjsy', '2024-11-24 07:02:37', '2025-03-04 15:23:57'),
(35, 'doritos', '$2y$10$4knMQEAhG9LUV9ff3GowHOOJS98o.GXFWXjYYOu3r0KGinKexS7di', 'Rainbow', 'Summer', 'f', 'Quezon City', '2006-05-29', 'admin', 'doritos@gmail.com', '09205292005', 'i like drums', '2025-03-04 14:39:10', '2025-03-04 15:23:57'),
(36, 'red', '$2y$10$cpS8KAHWV6sAt74438BiyuWU..xu8sjmIplXTHBNnsuGL/mlxmvsG', 'North', 'Walker', 'o', 'Norway', '2007-04-21', 'admin', 'north@gmail.com', '09904212007', 'ktaaaaa', '2025-03-07 08:07:48', '2025-03-07 08:50:00'),
(37, 'boy', '$2y$10$1X4.KLPpmH8Wx0ulsWiGHer7wmwgJOzvI9Gdtf1RvhcTe5sJLhv0m', 'One', 'Person', 'm', 'Quezon City', '2007-02-21', 'admin', 'boy@gmail.com', '09902212007', 'boi', '2025-03-07 08:55:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_subjects`
--
ALTER TABLE `course_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_ibfk_1` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_subjects`
--
ALTER TABLE `course_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=995;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_subjects`
--
ALTER TABLE `course_subjects`
  ADD CONSTRAINT `course_subjects_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
