-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2022 at 03:59 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21919118_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(100) NOT NULL,
  `aname` char(20) NOT NULL,
  `a_cont_no` varchar(20) NOT NULL,
  `a_email` varchar(30) NOT NULL,
  `a_pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `a_cont_no`, `a_email`, `a_pass`) VALUES
(1, 'priyanshu', '9016276879', 'ranapriyanshu8080@gmail.com', 'priyanshu123'),
(2, 'dwij', '9016276879', 'ranapriyanshu9898@gmail.com', 'dwij123'),
(3, 'Dwij_ad', '8849259341', 'dwijpatel1704@gmail.com', 'Dwij1704');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `b_no` char(10) NOT NULL,
  `b_date` date NOT NULL,
  `b_time` varchar(10) NOT NULL,
  `b_ampm` char(2) NOT NULL,
  `total_price` varchar(10) NOT NULL,
  `cid` int(100) NOT NULL,
  `s_id` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`b_no`, `b_date`, `b_time`, `b_ampm`, `total_price`, `cid`, `s_id`) VALUES
('b07', '2022-04-23', '11:15:06', 'am', '  300', 2, 's15'),
('b08', '2022-04-23', '11:30:34', 'am', '  420', 2, 's34'),
('b09', '2022-05-12', '09:45:32', 'pm', '  750', 7, 's47'),
('b10', '2022-05-14', '08:55:08', 'pm', '  1150', 7, 's46');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `cont_id` int(11) NOT NULL,
  `cont_name` char(30) NOT NULL,
  `cont_email` varchar(50) NOT NULL,
  `cont_mssg` text NOT NULL,
  `cid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`cont_id`, `cont_name`, `cont_email`, `cont_mssg`, `cid`) VALUES
(1, 'janam', 'ranapriyanshu2828@gmail.com', 'priyanshu rana', 2),
(2, 'Dwij', 'pateldev77958@gmail.com', 'hii', 7);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(100) NOT NULL,
  `cname` char(20) NOT NULL,
  `c_cont_no` varchar(20) NOT NULL,
  `c_email` varchar(30) NOT NULL,
  `c_pass` varchar(15) NOT NULL,
  `mail_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cname`, `c_cont_no`, `c_email`, `c_pass`, `mail_status`) VALUES
(2, 'guru', '901627687', 'priyanshurana2228@gmail.com', 'guru123', 1),
(3, 'gitu', '9016276879', 'gitanjaliramiya0905@gmail.com', 'gitu123', 1),
(6, 'dev', '9328986829', 'pateldev77958@gmail.com', 'dev13', 0),
(7, 'Dwij', '8849259341', 'dwijpatel1704@gmail.com', 'dwij1704', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `m_no` varchar(10) NOT NULL,
  `m_name` char(30) NOT NULL,
  `m_dimension` varchar(10) NOT NULL,
  `m_language` char(30) NOT NULL,
  `m_hr` varchar(15) NOT NULL,
  `m_min` varchar(15) NOT NULL,
  `m_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`m_no`, `m_name`, `m_dimension`, `m_language`, `m_hr`, `m_min`, `m_pic`) VALUES
('m03', 'Spider Man No Way Home', '3D', 'Hindi', '2', '0', 'f85.jpg'),
('m06', 'Titanic', '2D', 'Hindi', '1', '55', '12.jpg'),
('m08', 'The Batman', '2D', 'English', '2', '05', 'batman4-1-scaled.jpg'),
('m10', 'Moon Knight', '2D', 'Hindi', '3', '25', 'FNgAy4XVgAQfIFf.jpeg'),
('m11', 'Doctor Strange 2', '3D', 'English', '3', '25', 'hahahahha.jpg'),
('m12', 'Thor Love And Thunder', 'IM', 'English', '3', '45', 'FQzsdTBVkAERLwI.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `sbill`
--

CREATE TABLE `sbill` (
  `sb_id` int(100) NOT NULL,
  `b_no` char(10) NOT NULL,
  `Seatid` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sbill`
--

INSERT INTO `sbill` (`sb_id`, `b_no`, `Seatid`) VALUES
(134, 'b07', 'S04'),
(135, 'b07', 'S03'),
(136, 'b08', 'S54'),
(137, 'b08', 'S55'),
(158, 'b09', 'S04'),
(159, 'b09', 'S05'),
(160, 'b09', 'S06'),
(161, 'b10', 'S01'),
(162, 'b10', 'S02'),
(163, 'b10', 'S12'),
(164, 'b10', 'S22'),
(165, 'b10', 'S11'),
(166, 'b10', 'S21'),
(167, 'b10', 'S32'),
(168, 'b10', 'S31'),
(169, 'b10', 'S41'),
(170, 'b10', 'S42'),
(171, 'b10', 'S45'),
(172, 'b10', 'S46'),
(173, 'b10', 'S47'),
(174, 'b10', 'S44'),
(175, 'b10', 'S43'),
(176, 'b10', 'S33'),
(177, 'b10', 'S34'),
(178, 'b10', 'S35'),
(179, 'b10', 'S36'),
(180, 'b10', 'S37'),
(181, 'b10', 'S27'),
(182, 'b10', 'S25'),
(183, 'b10', 'S26'),
(184, 'b10', 'S24'),
(185, 'b10', 'S23'),
(186, 'b10', 'S13'),
(187, 'b10', 'S14'),
(188, 'b10', 'S15'),
(189, 'b10', 'S16'),
(190, 'b10', 'S17'),
(191, 'b10', 'S07'),
(192, 'b10', 'S06'),
(193, 'b10', 'S05'),
(194, 'b10', 'S04'),
(195, 'b10', 'S03'),
(196, 'b10', 'S08'),
(197, 'b10', 'S48'),
(198, 'b10', 'S38'),
(199, 'b10', 'S28'),
(200, 'b10', 'S18'),
(201, 'b10', 'S19'),
(202, 'b10', 'S29'),
(203, 'b10', 'S39'),
(204, 'b10', 'S49'),
(205, 'b10', 'S09'),
(206, 'b10', 'S20'),
(207, 'b10', 'S10'),
(208, 'b10', 'S50'),
(209, 'b10', 'S40'),
(210, 'b10', 'S30');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `Seatid` char(5) NOT NULL,
  `Seatno` varchar(10) NOT NULL,
  `Row_no` char(5) NOT NULL,
  `Col_no` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`Seatid`, `Seatno`, `Row_no`, `Col_no`) VALUES
('S01', 'A1', 'A', 1),
('S02', 'A2', 'A', 2),
('S03', 'A3', 'A', 3),
('S04', 'A4', 'A', 4),
('S05', 'A5', 'A', 5),
('S06', 'A6', 'A', 6),
('S07', 'A7', 'A', 7),
('S08', 'A8', 'A', 8),
('S09', 'A9', 'A', 9),
('S10', 'A10', 'A', 10),
('S100', 'A10', 'A', 10),
('S101', 'B1', 'B', 1),
('S102', 'B2', 'B', 2),
('S103', 'B3', 'B', 3),
('S104', 'B4', 'B', 4),
('S105', 'B5', 'B', 5),
('S106', 'B6', 'B', 6),
('S107', 'B7', 'B', 7),
('S108', 'B8', 'B', 8),
('S109', 'B9', 'B', 9),
('S11', 'B1', 'B', 1),
('S110', 'B10', 'B', 10),
('S111', 'C1', 'C', 1),
('S112', 'C2', 'C', 2),
('S113', 'C3', 'C', 3),
('S114', 'C4', 'C', 4),
('S115', 'C5', 'C', 5),
('S116', 'C6', 'C', 6),
('S117', 'C7', 'C', 7),
('S118', 'C8', 'C', 8),
('S119', 'C9', 'C', 9),
('S12', 'B2', 'B', 2),
('S120', 'C10', 'C', 10),
('S13', 'B3', 'B', 3),
('S14', 'B4', 'B', 4),
('S15', 'B5', 'B', 5),
('S16', 'B6', 'B', 6),
('S17', 'B7', 'B', 7),
('S18', 'B8', 'B', 8),
('S19', 'B9', 'B', 9),
('S20', 'B10', 'B', 10),
('S21', 'C1', 'C', 1),
('S22', 'C2', 'C', 2),
('S23', 'C3', 'C', 3),
('S24', 'C4', 'C', 4),
('S25', 'C5', 'C', 5),
('S26', 'C6', 'C', 6),
('S27', 'C7', 'C', 7),
('S28', 'C8', 'C', 8),
('S29', 'C9', 'C', 9),
('S30', 'C10', 'C', 10),
('S31', 'D1', 'D', 1),
('S32', 'D2', 'D', 2),
('S33', 'D3', 'D', 3),
('S34', 'D4', 'D', 4),
('S35', 'D5', 'D', 5),
('S36', 'D6', 'D', 6),
('S37', 'D7', 'D', 7),
('S38', 'D8', 'D', 8),
('S39', 'D9', 'D', 9),
('S40', 'D10', 'D', 10),
('S41', 'E1', 'E', 1),
('S42', 'E2', 'E', 2),
('S43', 'E3', 'E', 3),
('S44', 'E4', 'E', 4),
('S45', 'E5', 'E', 5),
('S46', 'E6', 'E', 6),
('S47', 'E7', 'E', 7),
('S48', 'E8', 'E', 8),
('S49', 'E9', 'E', 9),
('S50', 'E10', 'E', 10),
('S51', 'A1', 'A', 1),
('S52', 'A2', 'A', 2),
('S53', 'A3', 'A', 3),
('S54', 'A4', 'A', 4),
('S55', 'A5', 'A', 5),
('S56', 'A6', 'A', 6),
('S57', 'A7', 'A', 7),
('S58', 'A8', 'A', 8),
('S59', 'A9', 'A', 9),
('S60', 'A10', 'A', 10),
('S61', 'B1', 'B', 1),
('S62', 'B2', 'B', 2),
('S63', 'B3', 'B', 3),
('S64', 'B4', 'B', 4),
('S65', 'B5', 'B', 5),
('S66', 'B6', 'B', 6),
('S67', 'B7', 'B', 7),
('S68', 'B8', 'B', 8),
('S69', 'B9', 'B', 9),
('S70', 'B10', 'B', 10),
('S71', 'C1', 'C', 1),
('S72', 'C2', 'C', 2),
('S73', 'C3', 'C', 3),
('S74', 'C4', 'C', 4),
('S75', 'C5', 'C', 5),
('S76', 'C6', 'C', 6),
('S77', 'C7', 'C', 7),
('S78', 'C8', 'C', 8),
('S79', 'C9', 'C', 9),
('S80', 'C10', 'C', 10),
('S81', 'D1', 'D', 1),
('S82', 'D2', 'D', 2),
('S83', 'D3', 'D', 3),
('S84', 'D4', 'D', 4),
('S85', 'D5', 'D', 5),
('S86', 'D6', 'D', 6),
('S87', 'D7', 'D', 7),
('S88', 'D8', 'D', 8),
('S89', 'D9', 'D', 9),
('S90', 'D10', 'D', 10),
('S91', 'A1', 'A', 1),
('S92', 'A2', 'A', 2),
('S93', 'A3', 'A', 3),
('S94', 'A4', 'A', 4),
('S95', 'A5', 'A', 5),
('S96', 'A6', 'A', 6),
('S97', 'A7', 'A', 7),
('S98', 'A8', 'A', 8),
('S99', 'A9', 'A', 9);

-- --------------------------------------------------------

--
-- Table structure for table `show`
--

CREATE TABLE `show` (
  `s_id` char(10) NOT NULL,
  `s_no` char(20) NOT NULL,
  `screen_no` int(20) NOT NULL,
  `type_of_seat` char(30) NOT NULL,
  `price` varchar(15) NOT NULL,
  `s_hr` int(20) NOT NULL,
  `s_min` varchar(10) NOT NULL,
  `am_pm` char(10) NOT NULL,
  `s_date` date NOT NULL,
  `m_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show`
--

INSERT INTO `show` (`s_id`, `s_no`, `screen_no`, `type_of_seat`, `price`, `s_hr`, `s_min`, `am_pm`, `s_date`, `m_no`) VALUES
('s06', '02', 3, 'RECLINER BED', '260', 11, '15', 'am', '2022-05-17', 'm03'),
('s14', '01', 1, 'standard', '150', 11, '45', 'am', '2022-05-17', 'm08'),
('s15', '01', 1, 'standard', '150', 8, '45', 'am', '2022-05-17', 'm06'),
('s22', '02', 3, 'RECLINER BED', '260', 9, '45', 'pm', '2022-05-17', 'm08'),
('s28', '03', 1, 'standard', '150', 8, '15', 'pm', '2022-05-16', 'm08'),
('s33', '02', 2, 'Sofa', '210', 5, '30', 'pm', '2022-05-16', 'm08'),
('s34', '02', 2, 'Sofa', '210', 7, '45', 'pm', '2022-05-16', 'm06'),
('s40', '03', 1, 'Standard', '150', 6, '41', 'pm', '2022-05-17', 'm06'),
('s44', '03', 1, 'Standard', '150', 11, '40', 'pm', '2022-05-16', 'm10'),
('s45', '00', 1, 'Standard', '200', 8, '45', 'pm', '2022-05-17', 'm10'),
('s46', '00', 1, 'Standard', '23', 3, '13', 'am', '2022-05-17', 'm10'),
('s47', '00', 1, 'Standard', '250', 7, '10', 'pm', '2022-05-14', 'm03');

-- --------------------------------------------------------

--
-- Table structure for table `showseat`
--

CREATE TABLE `showseat` (
  `ss_id` int(11) NOT NULL,
  `s_id` char(10) NOT NULL,
  `Seatid` char(5) NOT NULL,
  `status` char(30) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showseat`
--

INSERT INTO `showseat` (`ss_id`, `s_id`, `Seatid`, `status`) VALUES
(592, 's06', 'S91', 'available'),
(593, 's06', 'S92', 'available'),
(594, 's06', 'S93', 'available'),
(595, 's06', 'S94', 'available'),
(596, 's06', 'S95', 'available'),
(597, 's06', 'S96', 'available'),
(598, 's06', 'S97', 'available'),
(599, 's06', 'S98', 'available'),
(600, 's06', 'S99', 'available'),
(601, 's06', 'S100', 'available'),
(602, 's06', 'S101', 'available'),
(603, 's06', 'S102', 'available'),
(604, 's06', 'S103', 'available'),
(605, 's06', 'S104', 'available'),
(606, 's06', 'S105', 'available'),
(607, 's06', 'S106', 'available'),
(608, 's06', 'S107', 'available'),
(609, 's06', 'S108', 'available'),
(610, 's06', 'S109', 'available'),
(611, 's06', 'S110', 'available'),
(612, 's06', 'S111', 'available'),
(613, 's06', 'S112', 'available'),
(614, 's06', 'S113', 'available'),
(615, 's06', 'S114', 'available'),
(616, 's06', 'S115', 'available'),
(617, 's06', 'S116', 'available'),
(618, 's06', 'S117', 'available'),
(619, 's06', 'S118', 'available'),
(620, 's06', 'S119', 'available'),
(621, 's06', 'S120', 'available'),
(712, 's14', 'S01', 'available'),
(713, 's14', 'S02', 'available'),
(714, 's14', 'S03', 'available'),
(715, 's14', 'S04', 'available'),
(716, 's14', 'S05', 'available'),
(717, 's14', 'S06', 'available'),
(718, 's14', 'S07', 'available'),
(719, 's14', 'S08', 'available'),
(720, 's14', 'S09', 'available'),
(721, 's14', 'S10', 'available'),
(722, 's14', 'S11', 'available'),
(723, 's14', 'S12', 'available'),
(724, 's14', 'S13', 'available'),
(725, 's14', 'S14', 'available'),
(726, 's14', 'S15', 'available'),
(727, 's14', 'S16', 'available'),
(728, 's14', 'S17', 'available'),
(729, 's14', 'S18', 'available'),
(730, 's14', 'S19', 'available'),
(731, 's14', 'S20', 'available'),
(732, 's14', 'S21', 'available'),
(733, 's14', 'S22', 'available'),
(734, 's14', 'S23', 'available'),
(735, 's14', 'S24', 'available'),
(736, 's14', 'S25', 'available'),
(737, 's14', 'S26', 'available'),
(738, 's14', 'S27', 'available'),
(739, 's14', 'S28', 'available'),
(740, 's14', 'S29', 'available'),
(741, 's14', 'S30', 'available'),
(742, 's14', 'S31', 'available'),
(743, 's14', 'S32', 'available'),
(744, 's14', 'S33', 'available'),
(745, 's14', 'S34', 'available'),
(746, 's14', 'S35', 'available'),
(747, 's14', 'S36', 'available'),
(748, 's14', 'S37', 'available'),
(749, 's14', 'S38', 'available'),
(750, 's14', 'S39', 'available'),
(751, 's14', 'S40', 'available'),
(752, 's14', 'S41', 'available'),
(753, 's14', 'S42', 'available'),
(754, 's14', 'S43', 'available'),
(755, 's14', 'S44', 'available'),
(756, 's14', 'S45', 'available'),
(757, 's14', 'S46', 'available'),
(758, 's14', 'S47', 'available'),
(759, 's14', 'S48', 'available'),
(760, 's14', 'S49', 'available'),
(761, 's14', 'S50', 'available'),
(762, 's15', 'S01', 'available'),
(763, 's15', 'S02', 'available'),
(764, 's15', 'S03', 'booked'),
(765, 's15', 'S04', 'booked'),
(766, 's15', 'S05', 'available'),
(767, 's15', 'S06', 'available'),
(768, 's15', 'S07', 'available'),
(769, 's15', 'S08', 'available'),
(770, 's15', 'S09', 'available'),
(771, 's15', 'S10', 'available'),
(772, 's15', 'S11', 'available'),
(773, 's15', 'S12', 'available'),
(774, 's15', 'S13', 'available'),
(775, 's15', 'S14', 'available'),
(776, 's15', 'S15', 'available'),
(777, 's15', 'S16', 'available'),
(778, 's15', 'S17', 'available'),
(779, 's15', 'S18', 'available'),
(780, 's15', 'S19', 'available'),
(781, 's15', 'S20', 'available'),
(782, 's15', 'S21', 'available'),
(783, 's15', 'S22', 'available'),
(784, 's15', 'S23', 'available'),
(785, 's15', 'S24', 'available'),
(786, 's15', 'S25', 'available'),
(787, 's15', 'S26', 'available'),
(788, 's15', 'S27', 'available'),
(789, 's15', 'S28', 'available'),
(790, 's15', 'S29', 'available'),
(791, 's15', 'S30', 'available'),
(792, 's15', 'S31', 'available'),
(793, 's15', 'S32', 'available'),
(794, 's15', 'S33', 'available'),
(795, 's15', 'S34', 'available'),
(796, 's15', 'S35', 'available'),
(797, 's15', 'S36', 'available'),
(798, 's15', 'S37', 'available'),
(799, 's15', 'S38', 'available'),
(800, 's15', 'S39', 'available'),
(801, 's15', 'S40', 'available'),
(802, 's15', 'S41', 'available'),
(803, 's15', 'S42', 'available'),
(804, 's15', 'S43', 'available'),
(805, 's15', 'S44', 'available'),
(806, 's15', 'S45', 'available'),
(807, 's15', 'S46', 'available'),
(808, 's15', 'S47', 'available'),
(809, 's15', 'S48', 'available'),
(810, 's15', 'S49', 'available'),
(811, 's15', 'S50', 'available'),
(812, 's22', 'S91', 'available'),
(813, 's22', 'S92', 'available'),
(814, 's22', 'S93', 'available'),
(815, 's22', 'S94', 'available'),
(816, 's22', 'S95', 'available'),
(817, 's22', 'S96', 'available'),
(818, 's22', 'S97', 'available'),
(819, 's22', 'S98', 'available'),
(820, 's22', 'S99', 'available'),
(821, 's22', 'S100', 'available'),
(822, 's22', 'S101', 'available'),
(823, 's22', 'S102', 'available'),
(824, 's22', 'S103', 'available'),
(825, 's22', 'S104', 'available'),
(826, 's22', 'S105', 'available'),
(827, 's22', 'S106', 'available'),
(828, 's22', 'S107', 'available'),
(829, 's22', 'S108', 'available'),
(830, 's22', 'S109', 'available'),
(831, 's22', 'S110', 'available'),
(832, 's22', 'S111', 'available'),
(833, 's22', 'S112', 'available'),
(834, 's22', 'S113', 'available'),
(835, 's22', 'S114', 'available'),
(836, 's22', 'S115', 'available'),
(837, 's22', 'S116', 'available'),
(838, 's22', 'S117', 'available'),
(839, 's22', 'S118', 'available'),
(840, 's22', 'S119', 'available'),
(841, 's22', 'S120', 'available'),
(983, 's28', 'S01', 'available'),
(984, 's28', 'S02', 'available'),
(985, 's28', 'S03', 'available'),
(986, 's28', 'S04', 'available'),
(987, 's28', 'S05', 'available'),
(988, 's28', 'S06', 'available'),
(989, 's28', 'S07', 'available'),
(990, 's28', 'S08', 'available'),
(991, 's28', 'S09', 'available'),
(992, 's28', 'S10', 'available'),
(993, 's28', 'S11', 'available'),
(994, 's28', 'S12', 'available'),
(995, 's28', 'S13', 'available'),
(996, 's28', 'S14', 'available'),
(997, 's28', 'S15', 'available'),
(998, 's28', 'S16', 'available'),
(999, 's28', 'S17', 'available'),
(1000, 's28', 'S18', 'available'),
(1001, 's28', 'S19', 'available'),
(1002, 's28', 'S20', 'available'),
(1003, 's28', 'S21', 'available'),
(1004, 's28', 'S22', 'available'),
(1005, 's28', 'S23', 'available'),
(1006, 's28', 'S24', 'available'),
(1007, 's28', 'S25', 'available'),
(1008, 's28', 'S26', 'available'),
(1009, 's28', 'S27', 'available'),
(1010, 's28', 'S28', 'available'),
(1011, 's28', 'S29', 'available'),
(1012, 's28', 'S30', 'available'),
(1013, 's28', 'S31', 'available'),
(1014, 's28', 'S32', 'available'),
(1015, 's28', 'S33', 'available'),
(1016, 's28', 'S34', 'available'),
(1017, 's28', 'S35', 'available'),
(1018, 's28', 'S36', 'available'),
(1019, 's28', 'S37', 'available'),
(1020, 's28', 'S38', 'available'),
(1021, 's28', 'S39', 'available'),
(1022, 's28', 'S40', 'available'),
(1023, 's28', 'S41', 'available'),
(1024, 's28', 'S42', 'available'),
(1025, 's28', 'S43', 'available'),
(1026, 's28', 'S44', 'available'),
(1027, 's28', 'S45', 'available'),
(1028, 's28', 'S46', 'available'),
(1029, 's28', 'S47', 'available'),
(1030, 's28', 'S48', 'available'),
(1031, 's28', 'S49', 'available'),
(1032, 's28', 'S50', 'available'),
(1033, 's33', 'S51', 'available'),
(1034, 's33', 'S52', 'available'),
(1035, 's33', 'S53', 'available'),
(1036, 's33', 'S54', 'available'),
(1037, 's33', 'S55', 'available'),
(1038, 's33', 'S56', 'available'),
(1039, 's33', 'S57', 'available'),
(1040, 's33', 'S58', 'available'),
(1041, 's33', 'S59', 'available'),
(1042, 's33', 'S60', 'available'),
(1043, 's33', 'S61', 'available'),
(1044, 's33', 'S62', 'available'),
(1045, 's33', 'S63', 'available'),
(1046, 's33', 'S64', 'available'),
(1047, 's33', 'S65', 'available'),
(1048, 's33', 'S66', 'available'),
(1049, 's33', 'S67', 'available'),
(1050, 's33', 'S68', 'available'),
(1051, 's33', 'S69', 'available'),
(1052, 's33', 'S70', 'available'),
(1053, 's33', 'S71', 'available'),
(1054, 's33', 'S72', 'available'),
(1055, 's33', 'S73', 'available'),
(1056, 's33', 'S74', 'available'),
(1057, 's33', 'S75', 'available'),
(1058, 's33', 'S76', 'available'),
(1059, 's33', 'S77', 'available'),
(1060, 's33', 'S78', 'available'),
(1061, 's33', 'S79', 'available'),
(1062, 's33', 'S80', 'available'),
(1063, 's33', 'S81', 'available'),
(1064, 's33', 'S82', 'available'),
(1065, 's33', 'S83', 'available'),
(1066, 's33', 'S84', 'available'),
(1067, 's33', 'S85', 'available'),
(1068, 's33', 'S86', 'available'),
(1069, 's33', 'S87', 'available'),
(1070, 's33', 'S88', 'available'),
(1071, 's33', 'S89', 'available'),
(1072, 's33', 'S90', 'available'),
(1104, 's34', 'S51', 'available'),
(1105, 's34', 'S52', 'available'),
(1106, 's34', 'S53', 'available'),
(1107, 's34', 'S54', 'booked'),
(1108, 's34', 'S55', 'booked'),
(1109, 's34', 'S56', 'available'),
(1110, 's34', 'S57', 'available'),
(1111, 's34', 'S58', 'available'),
(1112, 's34', 'S59', 'available'),
(1113, 's34', 'S60', 'available'),
(1114, 's34', 'S61', 'available'),
(1115, 's34', 'S62', 'available'),
(1116, 's34', 'S63', 'available'),
(1117, 's34', 'S64', 'available'),
(1118, 's34', 'S65', 'available'),
(1119, 's34', 'S66', 'available'),
(1120, 's34', 'S67', 'available'),
(1121, 's34', 'S68', 'available'),
(1122, 's34', 'S69', 'available'),
(1123, 's34', 'S70', 'available'),
(1124, 's34', 'S71', 'available'),
(1125, 's34', 'S72', 'available'),
(1126, 's34', 'S73', 'available'),
(1127, 's34', 'S74', 'available'),
(1128, 's34', 'S75', 'available'),
(1129, 's34', 'S76', 'available'),
(1130, 's34', 'S77', 'available'),
(1131, 's34', 'S78', 'available'),
(1132, 's34', 'S79', 'available'),
(1133, 's34', 'S80', 'available'),
(1134, 's34', 'S81', 'available'),
(1135, 's34', 'S82', 'available'),
(1136, 's34', 'S83', 'available'),
(1137, 's34', 'S84', 'available'),
(1138, 's34', 'S85', 'available'),
(1139, 's34', 'S86', 'available'),
(1140, 's34', 'S87', 'available'),
(1141, 's34', 'S88', 'available'),
(1142, 's34', 'S89', 'available'),
(1143, 's34', 'S90', 'available'),
(1454, 's40', 'S01', 'available'),
(1455, 's40', 'S02', 'available'),
(1456, 's40', 'S03', 'available'),
(1457, 's40', 'S04', 'available'),
(1458, 's40', 'S05', 'available'),
(1459, 's40', 'S06', 'available'),
(1460, 's40', 'S07', 'available'),
(1461, 's40', 'S08', 'available'),
(1462, 's40', 'S09', 'available'),
(1463, 's40', 'S10', 'available'),
(1464, 's40', 'S11', 'available'),
(1465, 's40', 'S12', 'available'),
(1466, 's40', 'S13', 'available'),
(1467, 's40', 'S14', 'available'),
(1468, 's40', 'S15', 'available'),
(1469, 's40', 'S16', 'available'),
(1470, 's40', 'S17', 'available'),
(1471, 's40', 'S18', 'available'),
(1472, 's40', 'S19', 'available'),
(1473, 's40', 'S20', 'available'),
(1474, 's40', 'S21', 'available'),
(1475, 's40', 'S22', 'available'),
(1476, 's40', 'S23', 'available'),
(1477, 's40', 'S24', 'available'),
(1478, 's40', 'S25', 'available'),
(1479, 's40', 'S26', 'available'),
(1480, 's40', 'S27', 'available'),
(1481, 's40', 'S28', 'available'),
(1482, 's40', 'S29', 'available'),
(1483, 's40', 'S30', 'available'),
(1484, 's40', 'S31', 'available'),
(1485, 's40', 'S32', 'available'),
(1486, 's40', 'S33', 'available'),
(1487, 's40', 'S34', 'available'),
(1488, 's40', 'S35', 'available'),
(1489, 's40', 'S36', 'available'),
(1490, 's40', 'S37', 'available'),
(1491, 's40', 'S38', 'available'),
(1492, 's40', 'S39', 'available'),
(1493, 's40', 'S40', 'available'),
(1494, 's40', 'S41', 'available'),
(1495, 's40', 'S42', 'available'),
(1496, 's40', 'S43', 'available'),
(1497, 's40', 'S44', 'available'),
(1498, 's40', 'S45', 'available'),
(1499, 's40', 'S46', 'available'),
(1500, 's40', 'S47', 'available'),
(1501, 's40', 'S48', 'available'),
(1502, 's40', 'S49', 'available'),
(1503, 's40', 'S50', 'available'),
(2074, 's44', 'S01', 'available'),
(2075, 's44', 'S02', 'available'),
(2076, 's44', 'S03', 'available'),
(2077, 's44', 'S04', 'available'),
(2078, 's44', 'S05', 'available'),
(2079, 's44', 'S06', 'available'),
(2080, 's44', 'S07', 'available'),
(2081, 's44', 'S08', 'available'),
(2082, 's44', 'S09', 'available'),
(2083, 's44', 'S10', 'available'),
(2084, 's44', 'S11', 'available'),
(2085, 's44', 'S12', 'available'),
(2086, 's44', 'S13', 'available'),
(2087, 's44', 'S14', 'available'),
(2088, 's44', 'S15', 'available'),
(2089, 's44', 'S16', 'available'),
(2090, 's44', 'S17', 'available'),
(2091, 's44', 'S18', 'available'),
(2092, 's44', 'S19', 'available'),
(2093, 's44', 'S20', 'available'),
(2094, 's44', 'S21', 'available'),
(2095, 's44', 'S22', 'available'),
(2096, 's44', 'S23', 'available'),
(2097, 's44', 'S24', 'available'),
(2098, 's44', 'S25', 'available'),
(2099, 's44', 'S26', 'available'),
(2100, 's44', 'S27', 'available'),
(2101, 's44', 'S28', 'available'),
(2102, 's44', 'S29', 'available'),
(2103, 's44', 'S30', 'available'),
(2104, 's44', 'S31', 'available'),
(2105, 's44', 'S32', 'available'),
(2106, 's44', 'S33', 'available'),
(2107, 's44', 'S34', 'available'),
(2108, 's44', 'S35', 'available'),
(2109, 's44', 'S36', 'available'),
(2110, 's44', 'S37', 'available'),
(2111, 's44', 'S38', 'available'),
(2112, 's44', 'S39', 'available'),
(2113, 's44', 'S40', 'available'),
(2114, 's44', 'S41', 'available'),
(2115, 's44', 'S42', 'available'),
(2116, 's44', 'S43', 'available'),
(2117, 's44', 'S44', 'available'),
(2118, 's44', 'S45', 'available'),
(2119, 's44', 'S46', 'available'),
(2120, 's44', 'S47', 'available'),
(2121, 's44', 'S48', 'available'),
(2122, 's44', 'S49', 'available'),
(2123, 's44', 'S50', 'available'),
(2174, 's45', 'S01', 'available'),
(2175, 's45', 'S02', 'available'),
(2176, 's45', 'S03', 'available'),
(2177, 's45', 'S04', 'available'),
(2178, 's45', 'S05', 'available'),
(2179, 's45', 'S06', 'available'),
(2180, 's45', 'S07', 'available'),
(2181, 's45', 'S08', 'available'),
(2182, 's45', 'S09', 'available'),
(2183, 's45', 'S10', 'available'),
(2184, 's45', 'S11', 'available'),
(2185, 's45', 'S12', 'available'),
(2186, 's45', 'S13', 'available'),
(2187, 's45', 'S14', 'available'),
(2188, 's45', 'S15', 'available'),
(2189, 's45', 'S16', 'available'),
(2190, 's45', 'S17', 'available'),
(2191, 's45', 'S18', 'available'),
(2192, 's45', 'S19', 'available'),
(2193, 's45', 'S20', 'available'),
(2194, 's45', 'S21', 'available'),
(2195, 's45', 'S22', 'available'),
(2196, 's45', 'S23', 'available'),
(2197, 's45', 'S24', 'available'),
(2198, 's45', 'S25', 'available'),
(2199, 's45', 'S26', 'available'),
(2200, 's45', 'S27', 'available'),
(2201, 's45', 'S28', 'available'),
(2202, 's45', 'S29', 'available'),
(2203, 's45', 'S30', 'available'),
(2204, 's45', 'S31', 'available'),
(2205, 's45', 'S32', 'available'),
(2206, 's45', 'S33', 'available'),
(2207, 's45', 'S34', 'available'),
(2208, 's45', 'S35', 'available'),
(2209, 's45', 'S36', 'available'),
(2210, 's45', 'S37', 'available'),
(2211, 's45', 'S38', 'available'),
(2212, 's45', 'S39', 'available'),
(2213, 's45', 'S40', 'available'),
(2214, 's45', 'S41', 'available'),
(2215, 's45', 'S42', 'available'),
(2216, 's45', 'S43', 'available'),
(2217, 's45', 'S44', 'available'),
(2218, 's45', 'S45', 'available'),
(2219, 's45', 'S46', 'available'),
(2220, 's45', 'S47', 'available'),
(2221, 's45', 'S48', 'available'),
(2222, 's45', 'S49', 'available'),
(2223, 's45', 'S50', 'available'),
(2224, 's46', 'S01', 'booked'),
(2225, 's46', 'S02', 'booked'),
(2226, 's46', 'S03', 'booked'),
(2227, 's46', 'S04', 'booked'),
(2228, 's46', 'S05', 'booked'),
(2229, 's46', 'S06', 'booked'),
(2230, 's46', 'S07', 'booked'),
(2231, 's46', 'S08', 'booked'),
(2232, 's46', 'S09', 'booked'),
(2233, 's46', 'S10', 'booked'),
(2234, 's46', 'S11', 'booked'),
(2235, 's46', 'S12', 'booked'),
(2236, 's46', 'S13', 'booked'),
(2237, 's46', 'S14', 'booked'),
(2238, 's46', 'S15', 'booked'),
(2239, 's46', 'S16', 'booked'),
(2240, 's46', 'S17', 'booked'),
(2241, 's46', 'S18', 'booked'),
(2242, 's46', 'S19', 'booked'),
(2243, 's46', 'S20', 'booked'),
(2244, 's46', 'S21', 'booked'),
(2245, 's46', 'S22', 'booked'),
(2246, 's46', 'S23', 'booked'),
(2247, 's46', 'S24', 'booked'),
(2248, 's46', 'S25', 'booked'),
(2249, 's46', 'S26', 'booked'),
(2250, 's46', 'S27', 'booked'),
(2251, 's46', 'S28', 'booked'),
(2252, 's46', 'S29', 'booked'),
(2253, 's46', 'S30', 'booked'),
(2254, 's46', 'S31', 'booked'),
(2255, 's46', 'S32', 'booked'),
(2256, 's46', 'S33', 'booked'),
(2257, 's46', 'S34', 'booked'),
(2258, 's46', 'S35', 'booked'),
(2259, 's46', 'S36', 'booked'),
(2260, 's46', 'S37', 'booked'),
(2261, 's46', 'S38', 'booked'),
(2262, 's46', 'S39', 'booked'),
(2263, 's46', 'S40', 'booked'),
(2264, 's46', 'S41', 'booked'),
(2265, 's46', 'S42', 'booked'),
(2266, 's46', 'S43', 'booked'),
(2267, 's46', 'S44', 'booked'),
(2268, 's46', 'S45', 'booked'),
(2269, 's46', 'S46', 'booked'),
(2270, 's46', 'S47', 'booked'),
(2271, 's46', 'S48', 'booked'),
(2272, 's46', 'S49', 'booked'),
(2273, 's46', 'S50', 'booked'),
(2474, 's47', 'S01', 'available'),
(2475, 's47', 'S02', 'available'),
(2476, 's47', 'S03', 'available'),
(2477, 's47', 'S04', 'booked'),
(2478, 's47', 'S05', 'booked'),
(2479, 's47', 'S06', 'booked'),
(2480, 's47', 'S07', 'available'),
(2481, 's47', 'S08', 'available'),
(2482, 's47', 'S09', 'available'),
(2483, 's47', 'S10', 'available'),
(2484, 's47', 'S11', 'available'),
(2485, 's47', 'S12', 'available'),
(2486, 's47', 'S13', 'available'),
(2487, 's47', 'S14', 'available'),
(2488, 's47', 'S15', 'available'),
(2489, 's47', 'S16', 'available'),
(2490, 's47', 'S17', 'available'),
(2491, 's47', 'S18', 'available'),
(2492, 's47', 'S19', 'available'),
(2493, 's47', 'S20', 'available'),
(2494, 's47', 'S21', 'available'),
(2495, 's47', 'S22', 'available'),
(2496, 's47', 'S23', 'available'),
(2497, 's47', 'S24', 'available'),
(2498, 's47', 'S25', 'available'),
(2499, 's47', 'S26', 'available'),
(2500, 's47', 'S27', 'available'),
(2501, 's47', 'S28', 'available'),
(2502, 's47', 'S29', 'available'),
(2503, 's47', 'S30', 'available'),
(2504, 's47', 'S31', 'available'),
(2505, 's47', 'S32', 'available'),
(2506, 's47', 'S33', 'available'),
(2507, 's47', 'S34', 'available'),
(2508, 's47', 'S35', 'available'),
(2509, 's47', 'S36', 'available'),
(2510, 's47', 'S37', 'available'),
(2511, 's47', 'S38', 'available'),
(2512, 's47', 'S39', 'available'),
(2513, 's47', 'S40', 'available'),
(2514, 's47', 'S41', 'available'),
(2515, 's47', 'S42', 'available'),
(2516, 's47', 'S43', 'available'),
(2517, 's47', 'S44', 'available'),
(2518, 's47', 'S45', 'available'),
(2519, 's47', 'S46', 'available'),
(2520, 's47', 'S47', 'available'),
(2521, 's47', 'S48', 'available'),
(2522, 's47', 'S49', 'available'),
(2523, 's47', 'S50', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`b_no`),
  ADD KEY `cid` (`cid`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`cont_id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`m_no`);

--
-- Indexes for table `sbill`
--
ALTER TABLE `sbill`
  ADD PRIMARY KEY (`sb_id`),
  ADD KEY `sbill_ibfk_1` (`b_no`),
  ADD KEY `sbill_ibfk_2` (`Seatid`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`Seatid`);

--
-- Indexes for table `show`
--
ALTER TABLE `show`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `show_ibfk_1` (`m_no`);

--
-- Indexes for table `showseat`
--
ALTER TABLE `showseat`
  ADD PRIMARY KEY (`ss_id`),
  ADD KEY `Seatid` (`Seatid`),
  ADD KEY `s_id` (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sbill`
--
ALTER TABLE `sbill`
  MODIFY `sb_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `showseat`
--
ALTER TABLE `showseat`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2524;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `show` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`);

--
-- Constraints for table `sbill`
--
ALTER TABLE `sbill`
  ADD CONSTRAINT `sbill_ibfk_1` FOREIGN KEY (`b_no`) REFERENCES `bill` (`b_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sbill_ibfk_2` FOREIGN KEY (`Seatid`) REFERENCES `seat` (`Seatid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `show`
--
ALTER TABLE `show`
  ADD CONSTRAINT `show_ibfk_1` FOREIGN KEY (`m_no`) REFERENCES `movie` (`m_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `showseat`
--
ALTER TABLE `showseat`
  ADD CONSTRAINT `showseat_ibfk_1` FOREIGN KEY (`Seatid`) REFERENCES `seat` (`Seatid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `showseat_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `show` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
