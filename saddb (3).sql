-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2025 at 08:39 PM
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
-- Database: `saddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `building_id` int(11) NOT NULL,
  `building_name` varchar(255) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`building_id`, `building_name`, `latitude`, `longitude`) VALUES
(1, 'Building A', 14.55610000, 121.02340000),
(2, 'Building B', 14.55820000, 121.02450000),
(3, 'Building C', 14.55930000, 121.02560000),
(4, 'Grand Hyatt Manila', 14.55672800, 121.05409600),
(5, 'SM Aura Premier', 14.54982000, 121.05697000),
(6, 'Uptown Mall', 14.55460000, 121.05420000),
(7, 'New High Street Tower', 14.55220000, 121.04950000),
(8, 'One Bonifacio High Street', 14.55280000, 121.05190000),
(9, 'Geocycle Philippines HQ', 14.54391234, 121.04958012);

-- --------------------------------------------------------

--
-- Table structure for table `collectionroutes`
--

CREATE TABLE `collectionroutes` (
  `route_id` int(11) NOT NULL,
  `assigned_truck` varchar(255) DEFAULT NULL,
  `optimized_path` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_description` text NOT NULL,
  `status` enum('available','claimed') DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `item_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donation_id`, `user_id`, `item_description`, `status`, `created_at`, `item_name`, `category`, `image`) VALUES
(1, 21, 'vsfgsfg', 'available', '2025-03-21 13:53:28', 'Electrons', 'Electronics', ''),
(2, 21, 'vsfgsfg', 'available', '2025-03-21 13:54:24', 'Electrons', 'Electronics', ''),
(3, 21, 'asfadfda', 'available', '2025-03-21 13:55:20', 'bat ganon', 'Electronics', ''),
(4, 21, 'sfhggdjhgfd', 'available', '2025-03-21 14:00:13', 'ambot', 'Books', ''),
(5, 22, 'sent', 'available', '2025-03-22 13:24:10', 'Basura', 'Clothing', ''),
(6, 22, 'dasdsad', 'available', '2025-03-22 13:24:36', 'dasd', 'Clothing', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `feedback_message`, `submitted_at`) VALUES
(1, 8, 'mic check', '2025-03-10 15:35:56'),
(2, 8, 'nyare boss', '2025-03-10 15:36:20'),
(3, 8, 'isa pa', '2025-03-10 15:37:57'),
(4, 8, 'try ulit', '2025-03-10 15:40:06'),
(5, 8, 'try ulit', '2025-03-10 15:40:08'),
(6, 8, 'try ulit', '2025-03-10 15:41:25'),
(7, 8, 'aadasaf', '2025-03-10 15:57:06'),
(8, 8, 'acxvad', '2025-03-10 15:57:54'),
(9, 8, 'aadfad', '2025-03-10 15:58:44'),
(10, 8, 'adfgdg', '2025-03-10 16:02:28'),
(11, 8, 'agafshsfaet', '2025-03-10 16:05:02'),
(12, 8, 'safaefaefaetrag', '2025-03-10 16:09:44'),
(13, 8, 'afadv', '2025-03-10 16:10:36'),
(14, 8, 'tanginaaaaaa', '2025-03-10 16:10:50'),
(15, 8, 'adgadgafgasbsfv', '2025-03-10 16:14:54'),
(16, 8, 'dagdfs', '2025-03-11 02:07:48'),
(17, 8, 'adgfascbsardtafaretawgraj', '2025-03-11 02:09:22'),
(18, 8, 'afafafafaf', '2025-03-11 02:09:32'),
(19, 8, 'advasdgagfs', '2025-03-11 02:12:51'),
(20, 8, 'dfgadga', '2025-03-11 02:16:34'),
(21, 8, 'agag', '2025-03-11 02:21:57'),
(22, 8, 'azgfadgsfrhfds', '2025-03-11 02:23:29'),
(23, 8, 'agftasgsghsrf', '2025-03-11 10:09:29'),
(24, 8, 'jryfujifhdghdfj', '2025-03-11 11:42:55'),
(25, 8, 'sgasfgaradgart', '2025-03-11 11:44:19'),
(26, 8, 'asgbfshsfgadfgtas', '2025-03-11 11:45:12'),
(28, 15, 'Test Feedback', '2025-03-20 11:23:47'),
(29, 13, 'asfadfg', '2025-03-20 11:42:21'),
(30, 22, 'hell nah', '2025-03-22 13:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issue_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` enum('open','in_progress','resolved') DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`issue_id`, `user_id`, `description`, `photo_url`, `location`, `status`, `created_at`) VALUES
(1, 8, 'asfdad', NULL, '', '', '2025-03-08 08:59:06'),
(2, 8, 'qwreqwtr', 'uploads/1741426663_480791559_1160907325635555_4843043564405451618_n.jpg', '', '', '2025-03-08 09:37:43'),
(3, 8, 'qwreqwtr', 'uploads/1741426778_480791559_1160907325635555_4843043564405451618_n.jpg', '', '', '2025-03-08 09:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pickup_request_id` int(11) DEFAULT NULL,
  `type` enum('approved','rejected','rescheduled') NOT NULL,
  `is_admin_notification` tinyint(1) NOT NULL DEFAULT 0,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `pickup_request_id`, `type`, `is_admin_notification`, `message`, `is_read`, `created_at`) VALUES
(1, 1, 16, '', 1, 'New pickup request submitted by jack from Building B', 1, '2025-03-22 15:43:54'),
(2, 5, 16, '', 1, 'New pickup request submitted by jack from Building B', 0, '2025-03-22 15:43:54'),
(3, 6, 16, '', 1, 'New pickup request submitted by jack from Building B', 0, '2025-03-22 15:43:54'),
(4, 7, 16, '', 1, 'New pickup request submitted by jack from Building B', 0, '2025-03-22 15:43:54'),
(5, 1, 17, '', 1, 'New pickup request submitted by jack from Building B', 1, '2025-03-22 15:48:59'),
(6, 5, 17, '', 1, 'New pickup request submitted by jack from Building B', 0, '2025-03-22 15:48:59'),
(7, 6, 17, '', 1, 'New pickup request submitted by jack from Building B', 0, '2025-03-22 15:48:59'),
(8, 7, 17, '', 1, 'New pickup request submitted by jack from Building B', 0, '2025-03-22 15:48:59'),
(9, 1, 18, '', 1, 'New pickup request submitted by jack from Building B', 1, '2025-03-22 15:50:45'),
(10, 5, 18, '', 1, 'New pickup request submitted by jack from Building B', 0, '2025-03-22 15:50:45'),
(11, 6, 18, '', 1, 'New pickup request submitted by jack from Building B', 0, '2025-03-22 15:50:45'),
(12, 7, 18, '', 1, 'New pickup request submitted by jack from Building B', 0, '2025-03-22 15:50:45'),
(13, 1, 19, '', 1, 'New pickup request submitted by jack from Building B', 1, '2025-03-22 17:27:52'),
(14, 5, 19, '', 1, 'New pickup request submitted by jack from Building B', 0, '2025-03-22 17:27:52'),
(15, 6, 19, '', 1, 'New pickup request submitted by jack from Building B', 0, '2025-03-22 17:27:52'),
(16, 7, 19, '', 1, 'New pickup request submitted by jack from Building B', 0, '2025-03-22 17:27:52'),
(17, 23, 19, 'rejected', 0, 'Your pickup request has been rejected. Please contact the administrator for more information.', 1, '2025-03-22 17:28:21'),
(18, 1, 20, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building A', 1, '2025-03-22 17:29:12'),
(19, 5, 20, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building A', 0, '2025-03-22 17:29:12'),
(20, 6, 20, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building A', 0, '2025-03-22 17:29:12'),
(21, 7, 20, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building A', 0, '2025-03-22 17:29:12'),
(22, 1, 21, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 1, '2025-03-22 17:31:57'),
(23, 5, 21, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:31:57'),
(24, 6, 21, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:31:57'),
(25, 7, 21, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:31:57'),
(26, 1, 22, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 1, '2025-03-22 17:32:02'),
(27, 5, 22, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:32:02'),
(28, 6, 22, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:32:02'),
(29, 7, 22, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:32:02'),
(30, 1, 23, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 1, '2025-03-22 17:33:28'),
(31, 5, 23, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:33:28'),
(32, 6, 23, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:33:28'),
(33, 7, 23, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:33:28'),
(34, 24, 23, 'rejected', 0, 'Your pickup request has been rejected. Please contact the administrator for more information.', 1, '2025-03-22 17:33:54'),
(35, 1, 24, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 1, '2025-03-22 17:38:32'),
(36, 5, 24, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:38:32'),
(37, 6, 24, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:38:32'),
(38, 7, 24, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:38:32'),
(39, 24, 24, 'approved', 0, 'Your pickup request has been approved. Collection is scheduled for January 1, 1970 at 7:00 AM', 1, '2025-03-22 17:38:52'),
(40, 1, 25, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 1, '2025-03-22 17:43:29'),
(41, 5, 25, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:43:29'),
(42, 6, 25, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:43:29'),
(43, 7, 25, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:43:29'),
(44, 24, 25, 'approved', 0, 'Your pickup request has been approved. Collection is scheduled for March 23, 2025 at 12:00 PM', 1, '2025-03-22 17:44:00'),
(45, 1, 26, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 1, '2025-03-22 17:48:15'),
(46, 5, 26, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:48:15'),
(47, 6, 26, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:48:15'),
(48, 7, 26, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:48:15'),
(49, 1, 27, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 1, '2025-03-22 17:48:16'),
(50, 5, 27, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:48:16'),
(51, 6, 27, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:48:16'),
(52, 7, 27, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:48:16'),
(53, 1, 28, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 1, '2025-03-22 17:48:16'),
(54, 5, 28, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:48:16'),
(55, 6, 28, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:48:16'),
(56, 7, 28, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 17:48:16'),
(57, 24, 27, 'rejected', 0, 'Your pickup request has been rejected. Please contact the administrator for more information.', 1, '2025-03-22 17:48:33'),
(58, 24, 28, 'rejected', 0, 'Your pickup request has been rejected. Please contact the administrator for more information.', 1, '2025-03-22 17:54:59'),
(59, 24, 28, 'approved', 0, 'Your pickup request has been approved. Collection is scheduled for March 23, 2025 at 8:00 AM', 1, '2025-03-22 17:57:58'),
(60, 23, 18, '', 0, 'Your pickup request has been marked as completed. Thank you for using our service!', 0, '2025-03-22 18:13:53'),
(61, 23, 17, '', 0, 'Your pickup request has been marked as completed. Thank you for using our service!', 1, '2025-03-22 18:14:00'),
(62, 1, 29, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 1, '2025-03-22 18:14:57'),
(63, 5, 29, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 18:14:57'),
(64, 6, 29, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 18:14:57'),
(65, 7, 29, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 18:14:57'),
(66, 24, 29, 'approved', 0, 'Your pickup request has been approved. Collection is scheduled for March 23, 2025 at 11:00 AM', 1, '2025-03-22 18:15:35'),
(67, 24, 29, '', 0, 'Your pickup request has been marked as completed. Thank you for using our service!', 1, '2025-03-22 18:15:50'),
(68, 24, 26, 'approved', 0, 'Your pickup request has been approved. Collection is scheduled for March 23, 2025 at 7:00 AM.', 1, '2025-03-22 18:18:51'),
(69, 1, 30, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 1, '2025-03-22 18:19:26'),
(70, 5, 30, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 18:19:26'),
(71, 6, 30, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 18:19:26'),
(72, 7, 30, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 18:19:26'),
(73, 24, 30, 'approved', 0, 'Your pickup request has been approved. Collection is scheduled for March 23, 2025 at 7:00 AM.', 1, '2025-03-22 18:19:44'),
(74, 1, 30, '', 0, 'A new reschedule request has been submitted for pickup on March 23, 2025 at 8:00 AM.', 1, '2025-03-22 18:22:33'),
(75, 24, NULL, '', 1, 'Your reschedule request has been approved. New collection date: January 1, 1970 at 1:00 AM', 1, '2025-03-22 18:34:21'),
(76, 24, NULL, '', 1, 'A pickup in your building (Building B) has been rescheduled.\n\nCurrent Schedule: March 23, 2025 at 8:00 AM\nNew Schedule: January 1, 1970 at 1:00 AM\n\nPlease make sure to prepare your waste for collection on the new date and time.', 1, '2025-03-22 18:34:21'),
(77, 1, 31, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 1, '2025-03-22 18:34:59'),
(78, 5, 31, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 18:34:59'),
(79, 6, 31, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 18:34:59'),
(80, 7, 31, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 18:34:59'),
(81, 1, 32, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 1, '2025-03-22 18:36:32'),
(82, 5, 32, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 18:36:32'),
(83, 6, 32, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 18:36:32'),
(84, 7, 32, '', 1, 'New pickup request submitted by Paul Dominic Syparrado from Building B', 0, '2025-03-22 18:36:32'),
(85, 24, 31, 'approved', 0, 'Your pickup request has been approved. Collection is scheduled for March 23, 2025 at 7:00 AM.', 1, '2025-03-22 18:37:57'),
(86, 24, 32, 'approved', 0, 'Your pickup request has been approved. Collection is scheduled for March 23, 2025 at 10:00 AM', 1, '2025-03-22 18:41:50'),
(87, 24, 32, '', 1, 'A pickup in your building (Building B) has been approved. Collection is scheduled for March 23, 2025 at 10:00 AM', 1, '2025-03-22 18:41:53'),
(88, 1, 32, '', 0, 'A new reschedule request has been submitted for pickup on March 30, 2025 at 12:42 PM.', 0, '2025-03-22 18:42:28'),
(89, 24, 32, '', 1, 'A pickup in your building (Building B) has requested rescheduling. Current schedule: March 23, 2025 at 10:00 AM. Requested new schedule: March 30, 2025 at 12:42 PM. Reason: missed', 1, '2025-03-22 18:42:32'),
(90, 24, NULL, '', 1, 'Your reschedule request has been approved. New collection date: March 30, 2025 at 12:42 PM', 1, '2025-03-22 18:42:48'),
(91, 24, NULL, '', 1, 'A pickup in your building (Building B) has been rescheduled.\n\nCurrent Schedule: March 23, 2025 at 10:00 AM\nNew Schedule: March 30, 2025 at 12:42 PM\n\nPlease make sure to prepare your waste for collection on the new date and time.', 1, '2025-03-22 18:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `pickuprequests`
--

CREATE TABLE `pickuprequests` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('pending','approved','completed','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `building_id` int(11) NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pickuprequests`
--

INSERT INTO `pickuprequests` (`request_id`, `user_id`, `status`, `created_at`, `building_id`, `latitude`, `longitude`) VALUES
(9, 21, 'approved', '2025-03-20 07:56:55', 7, 14.55220000, 121.04950000),
(10, 15, 'approved', '2025-03-20 07:57:26', 3, 14.55930000, 121.02560000),
(11, 20, 'approved', '2025-03-20 07:58:08', 8, 14.55280000, 121.05190000),
(12, 21, 'approved', '2025-03-20 08:02:01', 7, 14.55220000, 121.04950000),
(13, 16, 'completed', '2025-03-20 08:12:31', 4, 14.55672800, 121.05409600),
(14, 22, 'approved', '2025-03-22 06:23:17', 1, 14.55610000, 121.02340000),
(15, 23, 'approved', '2025-03-22 08:39:38', 2, 14.55820000, 121.02450000),
(16, 23, 'approved', '2025-03-22 08:43:54', 2, 14.55820000, 121.02450000),
(17, 23, 'completed', '2025-03-22 08:48:59', 2, 14.55820000, 121.02450000),
(18, 23, 'completed', '2025-03-22 08:50:45', 2, 14.55820000, 121.02450000),
(19, 23, 'rejected', '2025-03-22 10:27:52', 2, 14.55820000, 121.02450000),
(20, 22, 'approved', '2025-03-22 10:29:12', 1, 14.55610000, 121.02340000),
(21, 24, 'approved', '2025-03-22 10:31:57', 2, 14.55820000, 121.02450000),
(22, 24, 'approved', '2025-03-22 10:32:02', 2, 14.55820000, 121.02450000),
(23, 24, 'rejected', '2025-03-22 10:33:28', 2, 14.55820000, 121.02450000),
(24, 24, 'approved', '2025-03-22 10:38:32', 2, 14.55820000, 121.02450000),
(25, 24, 'completed', '2025-03-22 10:43:29', 2, 14.55820000, 121.02450000),
(26, 24, 'approved', '2025-03-22 10:48:15', 2, 14.55820000, 121.02450000),
(27, 24, 'rejected', '2025-03-22 10:48:16', 2, 14.55820000, 121.02450000),
(28, 24, 'completed', '2025-03-22 10:48:16', 2, 14.55820000, 121.02450000),
(29, 24, 'completed', '2025-03-22 11:14:57', 2, 14.55820000, 121.02450000),
(30, 24, 'approved', '2025-03-22 11:19:26', 2, 14.55820000, 121.02450000),
(31, 24, 'approved', '2025-03-22 11:34:59', 2, 14.55820000, 121.02450000),
(32, 24, 'approved', '2025-03-22 11:36:32', 2, 14.55820000, 121.02450000);

-- --------------------------------------------------------

--
-- Table structure for table `pickup_schedules`
--

CREATE TABLE `pickup_schedules` (
  `schedule_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `collection_date` date NOT NULL,
  `collection_time` time DEFAULT '07:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pickup_schedules`
--

INSERT INTO `pickup_schedules` (`schedule_id`, `request_id`, `collection_date`, `collection_time`) VALUES
(37, 14, '2025-03-24', '07:00:00'),
(38, 13, '2025-03-23', '07:00:00'),
(39, 12, '2025-03-25', '07:00:00'),
(40, 11, '2025-03-22', '07:00:00'),
(41, 10, '2025-03-21', '07:00:00'),
(42, 15, '2025-03-19', '07:00:00'),
(43, 16, '2025-03-21', '10:00:00'),
(44, 17, '2025-03-23', '07:01:00'),
(45, 18, '2025-03-23', '11:00:00'),
(46, 22, '2025-03-24', '08:00:00'),
(47, 21, '0000-00-00', '09:00:00'),
(48, 20, '0000-00-00', '10:00:00'),
(49, 24, '0000-00-00', '07:00:00'),
(50, 25, '2025-03-23', '12:00:00'),
(51, 28, '2025-03-23', '08:00:00'),
(52, 29, '2025-03-23', '11:00:00'),
(53, 30, '0000-00-00', '00:00:00'),
(54, 32, '2025-03-30', '12:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `recyclingcenters`
--

CREATE TABLE `recyclingcenters` (
  `center_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `accepted_materials` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rescheduled_pickups`
--

CREATE TABLE `rescheduled_pickups` (
  `reschedule_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `reschedule_status` enum('Pending','Approved','Denied') DEFAULT 'Pending',
  `request_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `old_schedule_day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `new_schedule_day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reschedule_requests`
--

CREATE TABLE `reschedule_requests` (
  `reschedule_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `new_date` date DEFAULT NULL,
  `new_time` time DEFAULT NULL,
  `reason` text NOT NULL,
  `status` enum('Pending','Approved','Denied') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reschedule_requests`
--

INSERT INTO `reschedule_requests` (`reschedule_id`, `schedule_id`, `user_id`, `request_date`, `new_date`, `new_time`, `reason`, `status`) VALUES
(6, 53, 24, '2025-03-22 11:22:33', NULL, NULL, 'missed\r\n', 'Approved'),
(7, 54, 24, '2025-03-22 11:42:28', '2025-03-30', '12:42:00', 'missed', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `reward_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `points_used` int(11) DEFAULT NULL,
  `reward_description` text NOT NULL,
  `redeemed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`reward_id`, `user_id`, `points_used`, `reward_description`, `redeemed_at`) VALUES
(1, 8, 15, 'Eco-Friendly Tote Bag', '2025-03-10 12:29:54'),
(2, 8, 15, 'Eco-Friendly Tote Bag', '2025-03-10 12:30:56'),
(3, 8, 15, 'Eco-Friendly Tote Bag', '2025-03-10 12:33:16'),
(4, 8, 15, 'Eco-Friendly Tote Bag', '2025-03-10 12:34:08'),
(5, 8, 15, 'Eco-Friendly Tote Bag', '2025-03-10 12:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `rewards_info`
--

CREATE TABLE `rewards_info` (
  `reward_id` int(11) NOT NULL,
  `reward_name` varchar(255) NOT NULL,
  `points_required` int(11) NOT NULL,
  `reward_description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rewards_info`
--

INSERT INTO `rewards_info` (`reward_id`, `reward_name`, `points_required`, `reward_description`, `image`) VALUES
(1, 'Eco-Friendly Tote Bag', 15, 'A reusable eco-friendly tote bag for your daily needs.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `points` int(11) DEFAULT 0,
  `role` enum('resident','admin','collector') DEFAULT 'resident',
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `phone_number`, `points`, `role`, `building_id`) VALUES
(1, 'paul', 'paulrainiel01@gmail.com', '$2y$10$Pc9UyBXrUlftbEq5YoFC5uJ2mIRSa8SEG1a6GZrNVB3erv0RMV8fu', '09770035933', 0, 'admin', 9),
(2, 'patrick', 'patrickrainielsyparrado@gmail.com', '$2y$10$3rMs1N8EF3J0NG35dDRb7eE948dg80Jy8Did6LMqb78qqquxsoU92', '09770035933', 0, 'resident', 3),
(3, 'Decibol', 'deci@gmail', '$2y$10$STOJtXHlt2mzNwI56sJ62ulbDmH6BOLpy1OW3f9rfIszw8pfU5z0.', '0937764257', 0, 'collector', 9),
(4, 'Test Accounts Edit', 'testacc@gmail.com', '$2y$10$YLIk28aY6lcgaGh1zSCjRu6ZO2HMj5qdDT/a0MgyvQsY6/M3Sx6Bu', '0912345', 0, 'resident', 9),
(5, 'AlexJoyous', 'alex@gmail.com', '$2y$10$G0r.kL56g4Os9AxHz7URiOkbvBVI6lJxOE6GA8E6yikUQQgo2WqiK', '09122196781', 0, 'admin', 9),
(6, 'alexx', 'alexx@gmail.com', '$2y$10$4hr9nUAmt9ta9a0iz5y.feaXpdhLX7mh/mc07YE542CtWLN62b9iy', '091222916781', 0, 'admin', 9),
(7, 'alexxx', 'alexxx@gmail.com', '$2y$10$vMBI4Hr2Yq5eEYkcziIf7.i9g72hDwaDWaDuQVlW58LATvTy6/JuG', '0923409823085', 0, 'admin', 9),
(8, 'adi', 'adi@gmail.com', '$2y$10$TA7chBPRx64cFiqySHkikOkbY6ZXAsCq.pOvjEF3xJvT1vaGT/bXi', '0904582', 0, 'resident', 9),
(9, 'enzo', 'enzo@gmail.com', '$2y$10$PqKcB6wupZcLQDvQGVemNuIuE/2cQt.H6tO8i17YruEoEa7ulfcuu', '0946535', 0, 'collector', 9),
(10, 'aga', 'aga@gmail.com', '$2y$10$rCKxeHT9.0hOBt.rea2.l.tWGy3aD..46CFWlNKRDx2dLwcagVG1u', '6474685798', 0, 'collector', 9),
(11, 'user', 'user@gmail.com', '$2y$10$eSZPgUChdn4qKWBvug7oL.Tai9y2TghxhaS7xve8geMRa40/yWumW', '0954252415', 0, 'resident', 9),
(12, 'user3', 'user3@gmail.com', '$2y$10$Oo4imMeiQk3xm/4f2qYRJu.nUrhhuugFlXfxWh6P4j98Kudmj1Md6', '4363653635', 0, 'resident', 9),
(13, 'test', 'test@gmail.com', '$2y$10$2m4vYndvL3eugxNTd29n7OhgedNrumAp4z/iSC4DO9JuS7eaN6qr.', '563463', 0, 'resident', 9),
(15, 'rat', 'rat@gmail.com', '$2y$10$rpdKC4akI0UTFkPW8Sa0bOOqHbNMXcGC84sNxWSDTia4cmBWcImjO', '24235425', 0, 'resident', 3),
(16, 'bat', 'bat@gmail.com', '$2y$10$Bvah/AcZNLiBGClb.bNmRuk5Cgwfr0Ryi3ufVpA8wj1E.yJWg57l6', '563563', 0, 'resident', 4),
(17, 'dog', 'dog@gmail.com', '$2y$10$BcbKE0.tsl4mynesQnxHo.qP3oeNF.gKa1hwwrLeEWILnLMPMoURu', '14135426524', 0, 'resident', 5),
(18, 'cat', 'cat@gmail.com', '$2y$10$g3pAUUc132pro0Jb6u.ZSOj6oZqXpqfhFJAa1ZM1ynztsFLB11npa', '32542653245', 0, 'resident', 6),
(19, 'baby', 'baby@gmail.com', '$2y$10$jljRcd3Fpo7UBtJUIB9CoOIHsm3e3eLa8aRwZh.RenCTySYo4v.yy', '57845746', 0, 'resident', 7),
(20, 'fly', 'fly@gmail.com', '$2y$10$ZpYoPw4uP8cmc1J1jDBJGuebwwM3OKc4Z31AAQC3NtsBZgGDIPZHy', '4534753', 0, 'resident', 8),
(21, 'dad', 'dad@gmail.com', '$2y$10$vPKZml4J7msYN.RhTtpcO.pxwAFHPkQviK6iXgTuZe/O.IXuT7.h.', '435356354', 0, 'resident', 7),
(22, 'Paul Dominic Syparrado', 'paulrainiel@gmail.com', '$2y$10$.02r8Ld6rcbHYnqU9YSnt.rLXrjQmA4pJgJZcjqVB02BBzc7ehshC', '09770035933', 0, 'resident', 1),
(23, 'jack', 'jack123@gmail.com', '$2y$10$QewuqqKnTkjWtQyu9I5s8OZEQlh8BFowLlAABx6yABaRIaynMq5Na', '09770035933', 0, 'collector', 7),
(24, 'Paul Dominic Syparrado', 'paulrainiel03@gmail.com', '$2y$10$1TLEifJIGmxfDibHtSTqz.TtKwdUQ6RZP2.psUmDhXzWyF0SavIkO', '09770035933', 0, 'resident', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `collectionroutes`
--
ALTER TABLE `collectionroutes`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pickup_request_id` (`pickup_request_id`);

--
-- Indexes for table `pickuprequests`
--
ALTER TABLE `pickuprequests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `pickuprequests_ibfk_2` (`user_id`),
  ADD KEY `fk_pickuprequests_building` (`building_id`);

--
-- Indexes for table `pickup_schedules`
--
ALTER TABLE `pickup_schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `recyclingcenters`
--
ALTER TABLE `recyclingcenters`
  ADD PRIMARY KEY (`center_id`);

--
-- Indexes for table `rescheduled_pickups`
--
ALTER TABLE `rescheduled_pickups`
  ADD PRIMARY KEY (`reschedule_id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reschedule_requests`
--
ALTER TABLE `reschedule_requests`
  ADD PRIMARY KEY (`reschedule_id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`reward_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rewards_info`
--
ALTER TABLE `rewards_info`
  ADD PRIMARY KEY (`reward_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_users_building` (`building_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `collectionroutes`
--
ALTER TABLE `collectionroutes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `pickuprequests`
--
ALTER TABLE `pickuprequests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pickup_schedules`
--
ALTER TABLE `pickup_schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `recyclingcenters`
--
ALTER TABLE `recyclingcenters`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rescheduled_pickups`
--
ALTER TABLE `rescheduled_pickups`
  MODIFY `reschedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reschedule_requests`
--
ALTER TABLE `reschedule_requests`
  MODIFY `reschedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `reward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rewards_info`
--
ALTER TABLE `rewards_info`
  MODIFY `reward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`pickup_request_id`) REFERENCES `pickuprequests` (`request_id`) ON DELETE CASCADE;

--
-- Constraints for table `pickuprequests`
--
ALTER TABLE `pickuprequests`
  ADD CONSTRAINT `fk_pickuprequests_building` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`building_id`),
  ADD CONSTRAINT `pickuprequests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pickuprequests_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `pickup_schedules`
--
ALTER TABLE `pickup_schedules`
  ADD CONSTRAINT `pickup_schedules_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `pickuprequests` (`request_id`) ON DELETE CASCADE;

--
-- Constraints for table `rescheduled_pickups`
--
ALTER TABLE `rescheduled_pickups`
  ADD CONSTRAINT `rescheduled_pickups_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `pickuprequests` (`request_id`),
  ADD CONSTRAINT `rescheduled_pickups_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `pickup_schedules` (`schedule_id`),
  ADD CONSTRAINT `rescheduled_pickups_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reschedule_requests`
--
ALTER TABLE `reschedule_requests`
  ADD CONSTRAINT `reschedule_requests_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `pickup_schedules` (`schedule_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reschedule_requests_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `rewards`
--
ALTER TABLE `rewards`
  ADD CONSTRAINT `rewards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_building` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`building_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
