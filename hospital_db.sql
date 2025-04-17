-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2025 at 04:03 PM
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
(37, 'boy', '$2y$10$1X4.KLPpmH8Wx0ulsWiGHer7wmwgJOzvI9Gdtf1RvhcTe5sJLhv0m', 'One', 'Person', 'm', 'Quezon City', '2007-02-21', 'admin', 'boy@gmail.com', '09902212007', 'boi', '2025-03-07 08:55:01', NULL),
(47, 'jiji', '$2y$10$jrO6cK6i2/rUhr9S7R4hfuaixSyRbfajFZYwBlc2v30ZpOxi7IgTu', 'jijigen', 'genggeng', 'f', 'nihon desu', '1999-02-16', 'patient', 'jiji@gmail.com', NULL, 'kusojiji', '2025-04-17 13:25:13', NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
