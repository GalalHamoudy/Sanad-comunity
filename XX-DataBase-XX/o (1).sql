-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 01:45 PM
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
-- Database: `o`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `from_id`, `to_id`, `text`, `time`) VALUES
(35, 26, 26, '123', '2020-07-18 19:37:03'),
(36, 26, 27, '321', '2020-07-18 19:37:10'),
(37, 26, 27, '4321', '2020-07-18 19:38:36'),
(38, 26, 27, '454', '2020-07-18 19:39:16'),
(39, 27, 26, '987', '2020-07-18 19:39:30'),
(40, 26, 27, '123', '2020-07-18 19:39:48'),
(41, 27, 26, 'q', '2020-07-18 19:40:54'),
(42, 26, 27, 'qq', '2020-07-18 19:41:04'),
(43, 27, 26, 'rr', '2020-07-18 19:41:27'),
(44, 26, 27, '1', '2020-07-18 19:44:22'),
(45, 27, 26, '2', '2020-07-18 19:44:32'),
(46, 26, 27, '9', '2020-07-18 19:46:49'),
(48, 26, 26, '1', '2020-07-18 19:57:56'),
(49, 26, 26, '123', '2020-07-18 19:58:04'),
(50, 26, 26, '3333', '2020-07-18 19:58:07'),
(51, 26, 26, '9', '2020-07-18 19:59:10'),
(52, 27, 27, '12', '2020-07-18 19:59:52'),
(53, 27, 27, '444', '2020-07-18 19:59:56'),
(54, 26, 26, '6567', '2020-07-18 20:00:08'),
(55, 27, 26, 'qwe', '2020-07-18 20:00:22'),
(56, 26, 27, 'rtrtrtrtrt', '2020-07-18 20:00:32'),
(57, 34, 34, 'ضثصض', '2020-07-18 21:22:24'),
(58, 34, 26, 'شسيشسي', '2020-07-18 21:22:31'),
(59, 34, 27, 'asdasd', '2020-07-18 21:26:11'),
(60, 34, 32, 'qqqq', '2020-07-18 21:26:19'),
(61, 26, 34, 'qweqwe', '2020-07-18 21:27:33'),
(62, 26, 26, '1', '2020-07-20 17:39:35'),
(63, 26, 26, '1', '2020-07-20 17:41:27'),
(64, 26, 26, '1', '2020-07-20 17:41:48'),
(69, 26, 26, '1', '2020-07-20 17:44:09'),
(75, 26, 27, 'wefwef', '2020-07-20 17:47:04'),
(76, 26, 27, '', '2020-07-20 17:48:09'),
(77, 26, 27, '', '2020-07-20 17:49:26'),
(78, 26, 27, '', '2020-07-20 17:52:13'),
(79, 26, 27, '', '2020-07-20 17:53:06'),
(80, 26, 27, '', '2020-07-20 17:53:46'),
(81, 26, 27, '', '2020-07-20 17:54:26'),
(82, 26, 27, '', '2020-07-20 17:55:35'),
(83, 26, 27, '', '2020-07-20 17:56:38'),
(84, 26, 27, '', '2020-07-20 17:57:19'),
(85, 26, 27, '', '2020-07-20 17:57:42'),
(86, 26, 27, '', '2020-07-20 17:58:53'),
(87, 26, 27, '', '2020-07-20 17:59:48'),
(88, 26, 27, '', '2020-07-20 18:00:18'),
(90, 26, 26, 'رد يمهنج', '2020-08-14 09:22:35'),
(91, 26, 26, '', '2020-09-12 14:39:14'),
(93, 26, 26, 'asd', '2020-09-12 15:33:29'),
(94, 26, 34, 'dd', '2020-09-12 15:33:37'),
(95, 27, 26, 'qqqqq', '2020-09-12 15:35:31'),
(96, 26, 27, 'df', '2020-09-12 15:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `record` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_users`, `id_post`, `text`, `picture`, `record`, `time`) VALUES
(68, 27, 92, NULL, NULL, '513594455896.wav', '2020-09-08 01:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `o_users`
--

CREATE TABLE `o_users` (
  `o_id` int(11) NOT NULL,
  `o_name` varchar(255) NOT NULL,
  `o_email` varchar(255) NOT NULL,
  `o_password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nic_name` varchar(255) NOT NULL,
  `sec_place` varchar(255) NOT NULL,
  `phone` bigint(14) NOT NULL,
  `birth` date NOT NULL,
  `bio` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `login` datetime NOT NULL,
  `f_pic` varchar(255) NOT NULL,
  `b_pic` varchar(255) NOT NULL,
  `online` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `o_users`
--

INSERT INTO `o_users` (`o_id`, `o_name`, `o_email`, `o_password`, `status`, `nic_name`, `sec_place`, `phone`, `birth`, `bio`, `address`, `login`, `f_pic`, `b_pic`, `online`) VALUES
(26, 'kiraunited', 'kiraunited@gmail.com', 'kiraunited', 'اعزب', 'ابو جلال', 'اخميم', 1156716526, '2000-06-05', 'kiraunitedkiraunitedkiraunited', 'اخميم سوهاج ', '2020-07-07 01:15:39', '842917.jpg', '897058.jpg', '2020-09-12 18:03:21'),
(27, 'midogalal', 'midogalal@gmail.com', 'midogalal', 'متزوج', 'كيرا', 'اخميم', 1156716527, '2020-07-02', 'بسم الله الرحمن الرحيم ', 'اخميم سوهاج المحافظة ', '2020-07-07 01:24:57', '76524.png', '911071.jpg', '2020-09-12 17:35:38'),
(28, 'mohamedgalal', 'mohamedgalal@gmail.com', 'mohamedgalal', 'مطلق', 'ابو عساف', 'سوهاج', 1234567892, '2020-07-04', 'تم تصميم الموقع بواسطتي', 'بجوار الجامعة ', '2020-07-07 01:43:30', '55132.jpg', '534398.jpg', '2020-07-17 17:19:59'),
(29, 'mohamedAssaf', 'mohamedAssaf@gmail.com', 'mohamedAssaf', 'متزوج باربعة', 'محمد عساف', 'طهطا', 1156716527, '2000-06-05', 'هذه نبذه شخصية عني', 'هنا نكتب العنوان الشخصي', '2020-07-07 02:28:47', '807656.jpg', '215309.jpg', '2020-07-17 17:19:59'),
(30, 'GalalGalal', 'GalalGalal@gmail.com', 'GalalGalal', 'اعزب', 'ميدو جلال', 'المحافظة', 4611880, '2000-12-12', 'انا قائد علي اسطولي', 'سوهاج اخميم بجوار مسجد الرحمن ', '2020-07-07 02:35:16', '660632.jpg', '463303.jpg', '2020-07-17 17:19:59'),
(31, 'mohammed', 'mohammed@gmail.com', 'mohammed', 'مرتبط', 'البشمهندس', 'الكوثر', 1156716527, '2000-04-04', 'سيبشسيب سيشبش شيسي', 'سيشبس ثضق خهمع', '2020-07-13 09:13:12', '281133.jpg', '269053.jpg', '2020-07-17 17:19:59'),
(32, 'yarayara', 'yarayara@gmail.com', 'yarayara', 'yarayara', 'yarayara', 'yarayara', 1241244124124, '2020-07-02', 'yarayarayarayara', 'yarayarayarayara', '2020-07-15 12:53:51', '52994.jpg', '415210.jpg', '2020-07-18 21:25:50'),
(33, 'wwwwwwwww', 'wwwwwwwww@www.www', 'wwwwwwwww', 'wwwwwwwwwww', 'wwwwwwwwwww', 'wwwwwwwwwww', 111111111111, '2020-07-03', 'wwwwwwwwwww', 'wwwwwwwwwww', '2020-07-15 05:13:04', '177855.png', '596883.jpg', '2020-07-17 17:19:59'),
(34, 'wowowwow', 'wowwow@wow.com', 'wowowwow', '   wowowwow', '   wowowwow', '   wowowwow', 12321414, '2020-07-08', '   wowowwow', '   wowowwow', '2020-07-18 10:23:58', '928303.jpg', '813360.jpg', '2020-07-18 23:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `time` datetime NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `record` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `id_users`, `text`, `time`, `picture`, `record`, `type`) VALUES
(73, 31, '123', '2020-07-13 10:51:21', '811937.jpg', NULL, 'غير ذلك'),
(74, 32, 'رات ليعلم الجميع كيف تقضي يو', '2020-07-15 01:05:59', NULL, NULL, 'سياسة'),
(75, 32, 'asdasd', '2020-07-15 01:20:04', NULL, NULL, 'كوميدي'),
(76, 34, '123', '2020-07-18 10:29:48', NULL, NULL, 'غير ذلك'),
(78, 34, 'ناروووتو', '2020-07-18 10:30:08', '532047.jpg', NULL, 'غير ذلك'),
(82, 27, 'wwwwwwwwwwwwww', '2020-08-13 11:04:21', '446479.jpg', NULL, 'غير ذلك'),
(83, 27, 'Ubi', '2020-08-13 11:05:18', '445062.jpg', NULL, 'رياضية'),
(92, 26, NULL, '2020-09-08 02:51:29', NULL, '763396978951.wav', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seen`
--

CREATE TABLE `seen` (
  `id_see` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seen`
--

INSERT INTO `seen` (`id_see`, `id_user`, `id_post`) VALUES
(110, 26, 74),
(111, 26, 75),
(112, 26, 76),
(113, 26, 78),
(124, 26, 82),
(136, 27, 92),
(137, 26, 73),
(138, 26, 92);

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id`, `id_users`, `text`, `time`) VALUES
(2389, 31, 'sdfadf', '10:59:48'),
(2390, 32, 'dsfa', '01:03:50'),
(2391, 33, 'sdfad', '05:18:18'),
(2392, 33, 'asdfasdf', '05:18:20'),
(2395, 26, 'sdsdsd', '11:26:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `from_id` (`from_id`),
  ADD KEY `to_id` (`to_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `o_users`
--
ALTER TABLE `o_users`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `seen`
--
ALTER TABLE `seen`
  ADD PRIMARY KEY (`id_see`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `o_users`
--
ALTER TABLE `o_users`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `seen`
--
ALTER TABLE `seen`
  MODIFY `id_see` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2396;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `o_users` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`to_id`) REFERENCES `o_users` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `o_users` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `o_users` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seen`
--
ALTER TABLE `seen`
  ADD CONSTRAINT `seen_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `o_users` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `story_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `o_users` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
