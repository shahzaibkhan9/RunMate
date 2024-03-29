-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 07:31 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitlynk`
--

-- --------------------------------------------------------

--
-- Table structure for table `rm_base`
--

CREATE TABLE `rm_base` (
  `bid` int(11) NOT NULL,
  `bweek` int(11) DEFAULT NULL,
  `bday` int(11) DEFAULT NULL,
  `bactivityid` int(11) NOT NULL,
  `bactivity` varchar(255) DEFAULT NULL,
  `bduration` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rm_base`
--

INSERT INTO `rm_base` (`bid`, `bweek`, `bday`, `bactivityid`, `bactivity`, `bduration`) VALUES
(1, 1, 1, 0, 'Warm Up', '00:05:00'),
(2, 1, 1, 1, 'Running', '00:01:00'),
(3, 1, 1, 1, 'Jogging', '00:01:30'),
(4, 1, 1, 2, 'Running', '00:01:00'),
(5, 1, 1, 2, 'Jogging', '00:01:30'),
(6, 1, 1, 3, 'Running', '00:01:00'),
(7, 1, 1, 3, 'Jogging', '00:01:30'),
(8, 1, 1, 4, 'Running', '00:01:00'),
(9, 1, 1, 4, 'Jogging', '00:01:30'),
(10, 1, 1, 5, 'Running', '00:01:00'),
(11, 1, 1, 5, 'Jogging', '00:01:30'),
(12, 1, 1, 6, 'Running', '00:01:00'),
(13, 1, 1, 6, 'Jogging', '00:01:30'),
(14, 1, 1, 7, 'Running', '00:01:00'),
(15, 1, 1, 7, 'Jogging', '00:01:30'),
(16, 1, 1, 8, 'Running', '00:01:00'),
(17, 1, 1, 8, 'Jogging', '00:01:30'),
(18, 1, 1, -1, 'Cooldown', '00:05:00'),
(19, 1, 2, 0, 'Warm Up', '00:05:00'),
(20, 1, 2, 1, 'Running', '00:01:00'),
(21, 1, 2, 1, 'Jogging', '00:01:30'),
(22, 1, 2, 2, 'Running', '00:01:00'),
(23, 1, 2, 2, 'Jogging', '00:01:30'),
(24, 1, 2, 3, 'Running', '00:01:00'),
(25, 1, 2, 3, 'Jogging', '00:01:30'),
(26, 1, 2, 4, 'Running', '00:01:00'),
(27, 1, 2, 4, 'Jogging', '00:01:30'),
(28, 1, 2, 5, 'Running', '00:01:00'),
(29, 1, 2, 5, 'Jogging', '00:01:30'),
(30, 1, 2, 6, 'Running', '00:01:00'),
(31, 1, 2, 6, 'Jogging', '00:01:30'),
(32, 1, 2, 7, 'Running', '00:01:00'),
(33, 1, 2, 7, 'Jogging', '00:01:30'),
(34, 1, 2, 8, 'Running', '00:01:00'),
(35, 1, 2, 8, 'Jogging', '00:01:30'),
(36, 1, 2, -1, 'Cooldown', '00:05:00'),
(37, 1, 3, 0, 'Warm Up', '00:05:00'),
(38, 1, 3, 1, 'Running', '00:01:00'),
(39, 1, 3, 1, 'Jogging', '00:01:30'),
(40, 1, 3, 2, 'Running', '00:01:00'),
(41, 1, 3, 2, 'Jogging', '00:01:30'),
(42, 1, 3, 3, 'Running', '00:01:00'),
(43, 1, 3, 3, 'Jogging', '00:01:30'),
(44, 1, 3, 4, 'Running', '00:01:00'),
(45, 1, 3, 4, 'Jogging', '00:01:30'),
(46, 1, 3, 5, 'Running', '00:01:00'),
(47, 1, 3, 5, 'Jogging', '00:01:30'),
(48, 1, 3, 6, 'Running', '00:01:00'),
(49, 1, 3, 6, 'Jogging', '00:01:30'),
(50, 1, 3, 7, 'Running', '00:01:00'),
(51, 1, 3, 7, 'Jogging', '00:01:30'),
(52, 1, 3, 8, 'Running', '00:01:00'),
(53, 1, 3, 8, 'Jogging', '00:01:30'),
(54, 1, 3, -1, 'Cooldown', '00:05:00'),
(55, 2, 1, 0, 'Warm Up', '00:05:00'),
(56, 2, 1, 1, 'Running', '00:01:30'),
(57, 2, 1, 1, 'Jogging', '00:02:00'),
(58, 2, 1, 2, 'Running', '00:01:30'),
(59, 2, 1, 2, 'Jogging', '00:02:00'),
(60, 2, 1, 3, 'Running', '00:01:30'),
(61, 2, 1, 3, 'Jogging', '00:02:00'),
(62, 2, 1, 4, 'Running', '00:01:30'),
(63, 2, 1, 4, 'Jogging', '00:02:00'),
(64, 2, 1, 5, 'Running', '00:01:30'),
(65, 2, 1, 5, 'Jogging', '00:02:00'),
(66, 2, 1, 6, 'Running', '00:01:30'),
(67, 2, 1, 6, 'Jogging', '00:02:00'),
(68, 2, 1, -1, 'Cooldown', '00:05:00'),
(69, 2, 2, 0, 'Warm Up', '00:05:00'),
(70, 2, 2, 1, 'Running', '00:01:30'),
(71, 2, 2, 1, 'Jogging', '00:02:00'),
(72, 2, 2, 2, 'Running', '00:01:30'),
(73, 2, 2, 2, 'Jogging', '00:02:00'),
(74, 2, 2, 3, 'Running', '00:01:30'),
(75, 2, 2, 3, 'Jogging', '00:02:00'),
(76, 2, 2, 4, 'Running', '00:01:30'),
(77, 2, 2, 4, 'Jogging', '00:02:00'),
(78, 2, 2, 5, 'Running', '00:01:30'),
(79, 2, 2, 5, 'Jogging', '00:02:00'),
(80, 2, 2, 6, 'Running', '00:01:30'),
(81, 2, 2, 6, 'Jogging', '00:02:00'),
(82, 2, 2, -1, 'Cooldown', '00:05:00'),
(83, 2, 3, 0, 'Warm Up', '00:05:00'),
(84, 2, 3, 1, 'Running', '00:01:30'),
(85, 2, 3, 1, 'Jogging', '00:02:00'),
(86, 2, 3, 2, 'Running', '00:01:30'),
(87, 2, 3, 2, 'Jogging', '00:02:00'),
(88, 2, 3, 3, 'Running', '00:01:30'),
(89, 2, 3, 3, 'Jogging', '00:02:00'),
(90, 2, 3, 4, 'Running', '00:01:30'),
(91, 2, 3, 4, 'Jogging', '00:02:00'),
(92, 2, 3, 5, 'Running', '00:01:30'),
(93, 2, 3, 5, 'Jogging', '00:02:00'),
(94, 2, 3, 6, 'Running', '00:01:30'),
(95, 2, 3, 6, 'Jogging', '00:02:00'),
(96, 2, 3, -1, 'Cooldown', '00:05:00'),
(97, 3, 1, 0, 'Warm Up', '00:05:00'),
(98, 3, 1, 1, 'Running', '00:02:00'),
(99, 3, 1, 1, 'Jogging', '00:01:30'),
(100, 3, 1, 2, 'Running', '00:02:00'),
(101, 3, 1, 2, 'Jogging', '00:01:30'),
(102, 3, 1, 3, 'Running', '00:04:00'),
(103, 3, 1, 3, 'Jogging', '00:03:00'),
(104, 3, 1, 4, 'Running', '00:04:00'),
(105, 3, 1, 4, 'Jogging', '00:03:00'),
(106, 3, 1, -1, 'Cooldown', '00:05:00'),
(107, 3, 2, 0, 'Warm Up', '00:05:00'),
(108, 3, 2, 1, 'Running', '00:03:00'),
(109, 3, 2, 1, 'Jogging', '00:01:30'),
(110, 3, 2, 2, 'Running', '00:03:00'),
(111, 3, 2, 2, 'Jogging', '00:01:30'),
(112, 3, 2, 3, 'Running', '00:03:00'),
(113, 3, 2, 3, 'Jogging', '00:03:00'),
(114, 3, 2, 4, 'Running', '00:03:00'),
(115, 3, 2, 4, 'Jogging', '00:03:00'),
(116, 3, 2, -1, 'Cooldown', '00:05:00'),
(117, 3, 3, 0, 'Warm Up', '00:05:00'),
(118, 3, 3, 1, 'Running', '00:03:00'),
(119, 3, 3, 1, 'Jogging', '00:01:30'),
(120, 3, 3, 2, 'Running', '00:03:00'),
(121, 3, 3, 2, 'Jogging', '00:01:30'),
(122, 3, 3, 3, 'Running', '00:03:00'),
(123, 3, 3, 3, 'Jogging', '00:03:00'),
(124, 3, 3, 4, 'Running', '00:03:00'),
(125, 3, 3, 4, 'Jogging', '00:03:00'),
(126, 3, 3, -1, 'Cooldown', '00:05:00'),
(127, 4, 1, 0, 'Warm Up', '00:05:00'),
(128, 4, 1, 1, 'Running', '00:03:00'),
(129, 4, 1, 1, 'Jogging', '00:01:30'),
(130, 4, 1, 2, 'Running', '00:03:00'),
(131, 4, 1, 2, 'Jogging', '00:01:30'),
(132, 4, 1, 3, 'Running', '00:05:00'),
(133, 4, 1, 3, 'Jogging', '00:02:30'),
(134, 4, 1, 4, 'Running', '00:05:00'),
(135, 4, 1, 4, 'Jogging', '00:02:30'),
(136, 4, 1, -1, 'Cooldown', '00:05:00'),
(137, 4, 2, 0, 'Warm Up', '00:05:00'),
(138, 4, 2, 1, 'Running', '00:05:00'),
(139, 4, 2, 1, 'Jogging', '00:01:30'),
(140, 4, 2, 2, 'Running', '00:05:00'),
(141, 4, 2, 2, 'Jogging', '00:01:30'),
(142, 4, 2, 3, 'Running', '00:05:00'),
(143, 4, 2, 3, 'Jogging', '00:02:30'),
(144, 4, 2, 4, 'Running', '00:05:00'),
(145, 4, 2, 4, 'Jogging', '00:02:30'),
(146, 4, 2, -1, 'Cooldown', '00:05:00'),
(147, 5, 1, 0, 'Warm Up', '00:05:00'),
(148, 5, 1, 1, 'Running', '00:05:00'),
(149, 5, 1, 1, 'Jogging', '00:03:00'),
(150, 5, 1, 2, 'Running', '00:05:00'),
(151, 5, 1, 2, 'Jogging', '00:03:00'),
(152, 5, 1, 3, 'Running', '00:05:00'),
(153, 5, 1, -1, 'Cooldown', '00:05:00'),
(154, 5, 2, 0, 'Warm Up', '00:05:00'),
(155, 5, 2, 1, 'Running', '00:08:00'),
(156, 5, 2, 1, 'Jogging', '00:05:00'),
(157, 5, 2, 2, 'Running', '00:08:00'),
(158, 5, 2, 2, 'Jogging', '00:03:00'),
(159, 5, 2, 3, 'Running', '00:05:00'),
(160, 5, 2, -1, 'Cooldown', '00:05:00'),
(161, 5, 3, 0, 'Warm Up', '00:05:00'),
(162, 5, 3, 1, 'Running', '00:05:00'),
(163, 5, 3, 1, 'Jogging', '00:03:00'),
(164, 5, 3, 2, 'Running', '00:05:00'),
(165, 5, 3, 2, 'Jogging', '00:03:00'),
(166, 5, 3, 3, 'Running', '00:05:00'),
(167, 5, 3, -1, 'Cooldown', '00:05:00'),
(168, 6, 1, 0, 'Warm Up', '00:05:00'),
(169, 6, 1, 1, 'Running', '00:08:00'),
(170, 6, 1, 1, 'Jogging', '00:03:00'),
(171, 6, 1, 2, 'Running', '00:08:00'),
(172, 6, 1, 2, 'Jogging', '00:03:00'),
(173, 6, 1, -1, 'Cooldown', '00:05:00'),
(174, 6, 2, 0, 'Warm Up', '00:05:00'),
(175, 6, 2, 1, 'Running', '00:10:00'),
(176, 6, 2, 1, 'Jogging', '00:03:00'),
(177, 6, 2, 2, 'Running', '00:10:00'),
(178, 6, 2, 2, 'Jogging', '00:05:00'),
(179, 6, 2, -1, 'Cooldown', '00:05:00'),
(180, 6, 3, 0, 'Warm Up', '00:05:00'),
(181, 6, 3, 1, 'Running', '00:22:00'),
(182, 6, 3, 1, 'Jogging', '00:05:00'),
(183, 6, 3, -1, 'Cooldown', '00:05:00'),
(184, 7, 1, 0, 'Warm Up', '00:05:00'),
(185, 7, 1, 1, 'Running', '00:25:00'),
(186, 7, 1, 1, 'Jogging', '00:05:00'),
(187, 7, 1, -1, 'Cooldown', '00:05:00'),
(188, 7, 2, 0, 'Warm Up', '00:05:00'),
(189, 7, 2, 1, 'Running', '00:25:00'),
(190, 7, 2, 1, 'Jogging', '00:05:00'),
(191, 7, 2, -1, 'Cooldown', '00:05:00'),
(192, 7, 3, 0, 'Warm Up', '00:05:00'),
(193, 7, 3, 1, 'Running', '00:25:00'),
(194, 7, 3, 1, 'Jogging', '00:05:00'),
(195, 7, 3, -1, 'Cooldown', '00:05:00'),
(196, 8, 1, 0, 'Warm Up', '00:05:00'),
(197, 8, 1, 1, 'Running', '00:28:00'),
(198, 8, 1, 1, 'Jogging', '00:05:00'),
(199, 8, 1, -1, 'Cooldown', '00:05:00'),
(200, 8, 2, 0, 'Warm Up', '00:05:00'),
(201, 8, 2, 1, 'Running', '00:28:00'),
(202, 8, 2, 1, 'Jogging', '00:05:00'),
(203, 8, 2, -1, 'Cooldown', '00:05:00'),
(204, 8, 3, 0, 'Warm Up', '00:05:00'),
(205, 8, 3, 1, 'Running', '00:28:00'),
(206, 8, 3, 1, 'Jogging', '00:05:00'),
(207, 8, 3, -1, 'Cooldown', '00:05:00'),
(208, 9, 1, 0, 'Warm Up', '00:05:00'),
(209, 9, 1, 1, 'Running', '00:30:00'),
(210, 9, 1, 1, 'Jogging', '00:05:00'),
(211, 9, 1, -1, 'Cooldown', '00:05:00'),
(212, 9, 2, 0, 'Warm Up', '00:05:00'),
(213, 9, 2, 1, 'Running', '00:30:00'),
(214, 9, 2, 1, 'Jogging', '00:05:00'),
(215, 9, 2, -1, 'Cooldown', '00:05:00'),
(216, 9, 3, 0, 'Warm Up', '00:05:00'),
(217, 9, 3, 1, 'Running', '00:30:00'),
(218, 9, 3, 1, 'Jogging', '00:05:00'),
(219, 9, 3, -1, 'Cooldown', '00:05:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rm_base`
--
ALTER TABLE `rm_base`
  ADD PRIMARY KEY (`bid`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
