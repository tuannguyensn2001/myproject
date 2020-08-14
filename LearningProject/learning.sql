-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 07:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Machine Learning'),
(2, 'Front-End'),
(3, 'Back-End'),
(4, 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `typethumbnail` varchar(255) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `typethumbnail`, `teacher_id`, `category_id`, `about`, `description`, `price`, `is_active`) VALUES
(1, 'VueJS', 'PNG', 1, 1, 'Môn toán đang phát triển', 'Vue.js là một framework linh động (nguyên bản tiếng Anh: progressive) dùng để xây dựng giao diện người dùng (user interfaces).\r\nVue được thiết kế từ đầu theo hướng cho phép và khuyến khích việc phát triển ứng dụng theo từng bước. Khi phát triển lớp giao diện (view layer), người dùng chỉ cần dùng thư viện lõi (core library) của Vue, vốn rất dễ học và tích hợp với các thư viện hoặc dự án có sẵn.\r\nVue cũng đáp ứng được dễ dàng nhu cầu xây dựng những ứng dụng một trang (SPA - Single-Page Applications) với độ phức tạp cao hơn nhiều khi kết hợp với những kĩ thuật hiện đại như SFC (single file components) và các thư viện hỗ trợ.\r\nVueJs có mã nguồn mở, miễn phí hoàn toàn, được sử dụng bởi hàng ngàn lập trình viên trên thế giới.\r\nđoán xem', 'Free', '1'),
(2, 'NodeJS', 'PNG', 1, 2, NULL, '', 'Free', '1'),
(3, 'PHP', 'png', 1, 3, NULL, 'học về php nè', 'Free', '1'),
(4, 'Java', 'PNG', 1, 4, NULL, 'về java nè', 'Free', '1'),
(5, 'Python', NULL, 1, 4, NULL, '', 'Free', '0');

-- --------------------------------------------------------

--
-- Table structure for table `learning`
--

CREATE TABLE `learning` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `exercise` varchar(255) DEFAULT NULL,
  `id_course` varchar(255) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `learning`
--

INSERT INTO `learning` (`id`, `name`, `video`, `exercise`, `id_course`, `is_active`) VALUES
(1, 'Giới thiệu chương trình', '', NULL, '1', NULL),
(2, 'Tại sao phải học VueJS', '../../mvc/views/Outline/video/course1-1.mp4', NULL, '1', NULL),
(3, 'Cài đặt môi trường lập trình', NULL, NULL, '1', NULL),
(4, 'Tìm hiểu về Vue Instance', NULL, NULL, '1', NULL),
(5, 'Ràng buộc dữ liệu 1 chiều với Data Binding', NULL, NULL, '1', NULL),
(6, 'Sử dụng v on xử lý sự kiện người dùng', NULL, NULL, '1', NULL),
(7, 'Cách sử dụng Event Modifiers', NULL, NULL, '1', NULL),
(8, 'Tìm hiểu về Computed', NULL, NULL, '1', NULL),
(9, 'Ràng buộc dữ liệu 2 chiều', NULL, NULL, '1', NULL),
(10, 'Ràng buộc Class bằng VueJS', NULL, NULL, '1', NULL),
(11, 'Ràng buộc Style cho phần tử', NULL, NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `introduction` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `avatar`, `introduction`) VALUES
(1, 'Nguyễn Phụ Hoàng Lân', NULL, 'introduce');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mycourse` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`mycourse`)),
  `is_active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `mycourse`, `is_active`) VALUES
(1, 'tuannguyensn2001@gmail.com', 'devpro2001@gmail.com', 'java2001', '{\"1\":\"1\",\"2\":1,\"3\":1,\"4\":1,\"5\":0}', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learning`
--
ALTER TABLE `learning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `learning`
--
ALTER TABLE `learning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
