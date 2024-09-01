-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 09:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_email` varchar(255) NOT NULL,
  `patient_phone` varchar(255) NOT NULL,
  `patient_date` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `doctor` int(11) NOT NULL,
  `appoitnment_type` varchar(255) NOT NULL,
  `appointment_slot` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `appointment_payment` varchar(1000) NOT NULL DEFAULT '',
  `appointment_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `appointment_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_name`, `patient_email`, `patient_phone`, `patient_date`, `department_id`, `doctor`, `appoitnment_type`, `appointment_slot`, `message`, `appointment_payment`, `appointment_status`, `appointment_by`, `created_at`) VALUES
(2, 'haseeb', 'hasiikamanger@gmail.com', '03331549645', '2023-05-01', 1, 13, 'Physical', '10:30am - 11:00am', 'Test', 'Cash', 'Approved', 14, '2023-04-30 11:35:53'),
(3, 'haseeb', 'hasiikamanger@gmail.com', '03331549645', '2023-05-02', 2, 13, 'Physical', '11:00am - 11:30am', 'Test', 'Bank Transfer', 'Pending', 14, '2023-04-30 11:41:30'),
(4, 'haseeb', 'hasiikamanger@gmail.com', '03331549645', '2023-05-01', 1, 13, 'Physical', '10:30am - 11:00am', 'Test', 'Cash', 'Pending', 14, '2023-05-16 07:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_avl` varchar(1000) NOT NULL DEFAULT '',
  `slot_avl` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `user_id`, `date_avl`, `slot_avl`) VALUES
(1, 13, '2023-05-01', '10:00am - 10:30am'),
(2, 13, '2023-05-01', '10:30am - 11:00am'),
(3, 13, '2023-05-02', '11:00am - 11:30am');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(1, 'Child Specialist'),
(2, 'Ent Specialist'),
(3, 'Eye Specialist');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `report_path` varchar(1000) NOT NULL,
  `notes` varchar(1000) NOT NULL,
  `appointment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `date`, `report_path`, `notes`, `appointment_id`) VALUES
(1, '2023-05-01', '1682854774Untitled.png', 'This report was done yesterday.', 2),
(2, '2023-05-01', '1682854813Untitled.png', 'This time reports was done through Aslam.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL DEFAULT '0',
  `user_role` varchar(255) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_status`, `user_role`, `user_created_at`) VALUES
(1, 'Admin', 'admin@telemedicine.com', '+92 333 111 5555', '123456', '0', '2', '2023-03-13 04:27:47'),
(13, 'Moon', 'moon@gmail.com', '03331549645', '123456', '1', '0', '2023-04-30 11:18:51'),
(14, 'Sufiyan', 'Sufiyan@gmail.com', '03331549645', '123456', '0', '1', '2023-04-30 11:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `user_meta_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_designation` varchar(1000) NOT NULL,
  `department` varchar(1000) NOT NULL DEFAULT '',
  `short_description` varchar(1000) NOT NULL,
  `checkup_fees` varchar(1000) NOT NULL DEFAULT '',
  `full_description` varchar(1000) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `instagram_url` varchar(255) NOT NULL,
  `linkedin_url` varchar(255) NOT NULL,
  `documents_path` varchar(255) NOT NULL,
  `profilepic_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`user_meta_id`, `user_id`, `user_designation`, `department`, `short_description`, `checkup_fees`, `full_description`, `facebook_url`, `twitter_url`, `instagram_url`, `linkedin_url`, `documents_path`, `profilepic_path`) VALUES
(1, 13, 'CEO', 'Child Specialist', 'CEO', '1000', 'Test', '#', '#', '#', '#', '1684082570Capture.PNG', '1684082564HD-wallpaper-lips-red-female-lip-model-black-bg-cherries-lips-sexy-women-fruit-people-hot-cherry (1).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `department` (`department_id`),
  ADD KEY `doctor` (`doctor`),
  ADD KEY `appointment_by` (`appointment_by`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`user_meta_id`),
  ADD UNIQUE KEY `user_meta_id` (`user_meta_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `user_meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`doctor`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`appointment_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD CONSTRAINT `user_meta_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
