-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 08:24 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `myrole` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`myrole`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`, `myrole`) VALUES
(1, 'admin', 'admin', 'Manager', '{\"1\":1,\"2\":1,\"3\":1,\"4\":1,\"5\":1,\"6\":1,\"7\":1,\"8\":1}'),
(2, 'admin1', 'admin1', 'Admin', 'null'),
(3, 'admin2', 'admin2', 'Admin', '{\"1\":0,\"2\":0,\"3\":0,\"4\":1,\"5\":1,\"6\":1,\"7\":1}');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'Machine Learning', NULL),
(2, 'Front-End', NULL),
(3, 'Back-End', NULL),
(4, 'Android', NULL);

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
(1, 'VueJS', 'PNG', 1, 2, 'Môn toán đang phát triển', 'Vue.js là một framework linh động (nguyên bản tiếng Anh: progressive) dùng để xây dựng giao diện người dùng (user interfaces).\r\nVue được thiết kế từ đầu theo hướng cho phép và khuyến khích việc phát triển ứng dụng theo từng bước. Khi phát triển lớp giao diện (view layer), người dùng chỉ cần dùng thư viện lõi (core library) của Vue, vốn rất dễ học và tích hợp với các thư viện hoặc dự án có sẵn.\r\nVue cũng đáp ứng được dễ dàng nhu cầu xây dựng những ứng dụng một trang (SPA - Single-Page Applications) với độ phức tạp cao hơn nhiều khi kết hợp với những kĩ thuật hiện đại như SFC (single file components) và các thư viện hỗ trợ.\r\nVueJs có mã nguồn mở, miễn phí hoàn toàn, được sử dụng bởi hàng ngàn lập trình viên trên thế giới.\r\nđoán xem', 'Free', '1'),
(2, 'NodeJS', 'PNG', 1, 3, NULL, 'NodeJS là một môi trường chạy JavaScript ( JavaScript Runtime Environment) bên ngoài trình duyệt. NodeJS cũng bao gồm các thành phần, thư viện khác để nó có thể hoạt động như một Web Application Server.\r\nChú ý quan trọng: NodeJS không phải là một ngôn ngữ mở rộng của Javascript.', 'Free', '1'),
(3, 'PHP', 'png', 1, 3, NULL, 'PHP - viết tắt hồi quy của \"Hypertext Preprocessor\", là một ngôn ngữ lập trình kịch bản được chạy ở phía server nhằm sinh ra mã html trên client. PHP đã trải qua rất nhiều phiên bản và được tối ưu hóa cho các ứng dụng web, với cách viết mã rõ rãng, tốc độ nhanh, dễ học nên PHP đã trở thành một ngôn ngữ lập trình web rất phổ biến và được ưa chuộng.', 'Free', '1'),
(4, 'Java', 'jpg', 1, 4, NULL, 'Java là một ngôn ngữ lập lập trình, được phát triển bởi Sun Microsystem vào năm 1995, là ngôn ngữ kế thừa trực tiếp từ C/C++ và là một ngôn ngữ lập trình hướng đối tượng.\r\n\r\nVì sao ngôn ngữ này lại được đặt tên là Java? Java là tên một hòn đảo ở Indonesia - hòn đảo nổi tiếng với loại coffee Peet và cũng là loại nước uống phổ biến của các kỹ sư Sun. Ban đầu Ngôn ngữ này được đặt tên là \"Oak\" (có nghĩa là \"Cây sồi\" - 1991), nhưng các luật sư của Sun xác định rằng tên đó đã được đăng ký nhãn hiệu nên các nhà phát triển đã phải thay thế bằng một tên mới -  và cũng vì lý do trên mà cái tên Java đã ra đời và trở thành tên gọi chính thức của Ngôn ngữ này - Ngôn ngữ Lập trình Java. ', 'Free', '0'),
(5, 'Python', 'jpg', 1, 1, NULL, 'Python là một ngôn ngữ lập trình thông dịch (interpreted), hướng đối tượng (object-oriented), và là một ngôn ngữ bậc cao (high-level)  ngữ nghĩa động (dynamic semantics). Python hỗ trợ các module và gói (packages), khuyến khích chương trình module hóa và tái sử dụng mã. Trình thông dịch Python và thư viện chuẩn mở rộng có sẵn dưới dạng mã nguồn hoặc dạng nhị phân miễn phí cho tất cả các nền tảng chính và có thể được phân phối tự do.', 'Free', '0'),
(6, 'Học về toán nè', 'jpg', NULL, 1, NULL, '', '', '0');

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
(1, 'Giới thiệu chương trình', 'dSYJ1XYnFVI', NULL, '1', '1'),
(2, 'Tại sao phải học VueJS', 'ewO7ziR6u9U', NULL, '1', '1'),
(3, 'Cài đặt môi trường lập trình', 'bDwn9UN0Cns', NULL, '1', '1'),
(4, 'Tìm hiểu về Vue Instance', '6mlnBNKYpfI', NULL, '1', '1'),
(5, 'Ràng buộc dữ liệu 1 chiều với Data Binding', 'AHPkqa5ZaN0', NULL, '1', '1'),
(6, 'Sử dụng v on xử lý sự kiện người dùng', '3HP8dRIaBog', NULL, '1', '1'),
(7, 'Cách sử dụng Event Modifiers', '6M0PAQDLla8', NULL, '1', '1'),
(8, 'Tìm hiểu về Computed', '6l3Dv1KEuVs', NULL, '1', '1'),
(9, 'Ràng buộc dữ liệu 2 chiều', '7fKenz7ozj4', NULL, '1', '1'),
(10, 'Ràng buộc Class bằng VueJS', '8BHDy7Kb8eQ', NULL, '1', '1'),
(11, 'Ràng buộc Style cho phần tử', '2tLiCgTv7fc', NULL, '1', '1'),
(12, ' Render Template dùng biểu thức điều kiện', 'xZrioi3zOP4', NULL, '1', '1'),
(13, ' Render Template dùng vòng lặp trong VueJs', 'bCOcZ_BMaJU', NULL, '1', '1'),
(14, 'Toan ne', 'Khong co', NULL, '6', '0'),
(15, '', '', NULL, '6', ''),
(16, NULL, NULL, NULL, '6', NULL),
(17, NULL, NULL, NULL, '6', NULL),
(18, 'Giới thiệu về NodeJS', 'OR0hBEUk4wI', NULL, '2', '1'),
(19, 'Những rào cản trong việc học NodeJS', 'RHExzJ3OQfs', NULL, '2', '1'),
(20, 'Lưu ý về Loop và Condition trong VueJS', '9xTlT6b4', NULL, '1', '1'),
(21, 'Giao diện dòng lệnh Command Line Interface (CLI)', 'illPEfNegm0', NULL, '2', '1'),
(22, 'Mô hình Client - Server', 'sQgLSQ-mzbA', NULL, '2', '1'),
(23, NULL, NULL, NULL, '1', NULL),
(24, 'Tổng quan về PHP', '3yJeeub-6RY', NULL, '3', '1'),
(25, 'Biến, hằng và kiểu dữ liệu', 'QSRp1nvcf8g', NULL, '3', '1'),
(26, 'Toán tử trong PHP', 'TKxUO02aHPc', NULL, '3', '1'),
(27, 'Làm việc với Form', 'WAgLASrI7cY', NULL, '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `is_active` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `content`, `update_at`, `category_id`, `author_id`, `is_active`, `created_at`) VALUES
(1, 'Xử lý optional errors sử dụng Kotlin Sealed classes', 'Trong một chương trình phần mềm thì việc chúng ta viết một hàm mà có trả về một kiểu dữ liệu thì là điều rất bình thường tuy nhiên nếu như trường hợp hàm đó có thể trả về nhiều kiểu dữ liệu hoặc lỗi nếu có thì mình tin là sẽ có nhiều cách để anh em có thể', '<p>Trong một chương trình phần mềm thì việc chúng ta viết một hàm mà có trả về một kiểu dữ liệu thì là điều rất bình thường tuy nhiên nếu như trường hợp hàm đó&nbsp;có thể trả về nhiều kiểu dữ liệu hoặc lỗi nếu có thì mình tin là sẽ có nhiều cách để anh em có thể triển khai code giải quyết bài toán này.</p><p>Trong Kotlin có một khái niệm đó là Sealed Classes và chúng ta có thể áp dụng nó để giải quyết vấn đề ở trên.</p><p><strong>Chúng ta cùng xem ví dụ sau:</strong></p><p>private fun parse(url: String): ParsedData {\r\n&nbsp;&nbsp;val result = URL_PARSE_REGEX.find(url)\r\n\r\n&nbsp;&nbsp;if (result == null) {\r\n&nbsp;&nbsp;&nbsp;&nbsp;// Chúng ta làm gì trong block này? Trả về null, exception hay một object ParsedData không có data&nbsp;&nbsp;\r\n&nbsp;&nbsp;}\r\n\r\n&nbsp;&nbsp;val mimeType = result.groupValues[2]\r\n&nbsp;&nbsp;val data = result.groupValues[4]\r\n\r\n&nbsp;&nbsp;return ParsedData(data, mimeType)\r\n}\r\n\r\ndata class ParsedData(\r\n&nbsp;&nbsp;val data: String,\r\n&nbsp;&nbsp;val mimeType: String\r\n)\r\n</p><p>Như các bạn thấy thì chúng ta có chút lúng túng về logic nếu trường hợp if (result == null) {}. Okay, Giờ hãy xem cách giải quyết khi dùng Sealed Classes.</p><p><strong>Đầu tiên tạo một file ParseResult.kt với nội dung như sau:</strong></p><p>sealed class ParseResult&nbsp;\r\n\r\n// Chúng ta sẽ tạo ra hai đối tượng là Error và ParsedData =&gt; dùng để trả về trong hàm parse bên dưới \r\n\r\ndata class Error(val errorMessage: String) : ParseResult()\r\n\r\ndata class ParsedData(\r\n&nbsp;&nbsp;val data: String,\r\n&nbsp;&nbsp;val mimeType: String) : ParseResult()\r\n)\r\n</p><p><strong>và hàm parse chúng ta sẽ chỉnh lại như sau:</strong></p><p>private fun parse(url: String): ParseResult {\r\n&nbsp;&nbsp;val result = URL_PARSE_REGEX.find(url)\r\n&nbsp;&nbsp;if (result == null) {\r\n&nbsp;&nbsp;&nbsp;&nbsp;return ParseResult.Error(\"No match found\")\r\n&nbsp;&nbsp;}\r\n\r\n&nbsp;&nbsp;val mimeType = result.groupValues[2]\r\n&nbsp;&nbsp;val data = result.groupValues[4]\r\n\r\n&nbsp;&nbsp;return ParseResult.ParsedData(data, mimeType)\r\n}\r\n</p><p>=&gt; Các bạn có thể thấy hàm parse vẫn được thể hiện một kiểu trả về nhưng bên trong chúng ta có thể return về Error or ParseData và với hàm parse mới này thì mình tin đây là giải pháp ổn nhất. Chúng ta cũng hãy xem một trường hợp nữa khi kết hợp Sealed Classes với When()</p><p>val result = parse(url)\r\nwhen (result) {\r\n&nbsp;&nbsp;is ParseResult.ParsedData -&gt; doSomethingWithData(result.mimeType)\r\n&nbsp;&nbsp;is ParseResult.Error -&gt; handleError(result.errorMessage)\r\n}\r\n</p><p>&nbsp;</p><p>✅ Như vậy với việc sử dụng Sealed Classes giúp chúng ta có thể dễ dàng giải quyết các trường hợp trả về nhiều loại data khác nhau + việc định nghĩa các&nbsp;kiểu dữ liệu mới cũng hết sức đơn giản.&nbsp;&nbsp;</p>', '2020-06-30 16:02:21', 2, NULL, 1, '2020-06-30 14:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Thêm mới khóa học'),
(2, 'Chỉnh sửa khóa học'),
(3, 'Chỉnh sửa người dùng'),
(4, 'Thêm mới bài giảng'),
(5, 'Chỉnh sửa bài giảng'),
(6, 'Thêm mới bài viết'),
(7, 'Chỉnh sửa bài viết'),
(8, 'Xem người dùng');

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
(1, 'tuannguyensn2001', 'devpro2001@gmail.com', 'java2001', '{\"1\":1,\"2\":1,\"3\":0,\"4\":0,\"5\":0,\"6\":0,\"7\":0}', NULL),
(2, 'admin1', 'admin1', '1', '{\"1\":1,\"2\":1,\"3\":1,\"4\":1,\"5\":0,\"6\":0,\"7\":0}', '1'),
(3, 'admin23', 'admin255', '1', '{\"1\":0,\"2\":0,\"3\":0,\"4\":1,\"5\":0,\"6\":1,\"7\":0}', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `learning`
--
ALTER TABLE `learning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
