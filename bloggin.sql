-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2021 at 12:30 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
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
-- Database: `bloggin`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `Heading` varchar(50) NOT NULL,
  `language` varchar(50) DEFAULT NULL,
  `image` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `content` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cleanurl` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `userid`, `Heading`, `language`, `image`, `content`, `cleanurl`) VALUES
(1, 27, 'Automobile', NULL, '', 'AAAAAAA AAAAAAAAAAAAAA AAAAAAAAAAAAA AAAAAAAAAAA AAAAAAAA ', ''),
(2, 42, 'Analytics ABCD', NULL, '', 'hello Jatin', ''),
(8, 42, 'abcd', NULL, '', 'efgh', ''),
(11, 42, 'yz', NULL, '', 'ab', ''),
(12, 42, '1234', NULL, '', '5678', ''),
(14, 42, 'Avengers', NULL, '', 'Mazaa nhi aya', ''),
(15, 42, 'Spider Man - No Way ', NULL, 'lakec.jpg', 'Bye God Trailer dekh ke mazaa agya', ''),
(16, 78, 'How Do You do', NULL, '', 'NAMASTE\r\nVADAKKAM\r\nJAI SHRI KRISHNA', ''),
(18, 27, 'TATA', NULL, '', 'SAFARI GOLD', ''),
(23, 27, 'TATA ', NULL, '', 'Punch\r\n', ''),
(24, 27, 'M', NULL, '', 'MJ ', ''),
(25, 27, 'QED42', NULL, '', 'JATIN GUPTA', ''),
(29, 27, 'Holy Post', NULL, '', 'Dussehra', ''),
(44, 27, 'Holy Post', NULL, '', 'Diwali', ''),
(45, 27, 'Holy Post', NULL, '', 'Holi', ''),
(55, 27, 'HOHOHO', NULL, '', 'HOHOHOHOHOHOHOHOHOHOHOHO', ''),
(73, 27, 'nana', NULL, '', 'patekar', ''),
(74, 27, 'QED42', NULL, '', 'Drupal', 'drupal'),
(82, 42, 'asd', NULL, '', 'qwe', ''),
(83, 42, 'asd', NULL, '', 'asd', ''),
(90, 27, 'check', NULL, '', 'adasdasdadadasdsadsa', 'apple'),
(94, 139, 'Maruti ', NULL, NULL, 'celerio', 'a-b-c-d');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `image` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `imageby` varchar(225) NOT NULL,
  `checked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `userid`, `image`, `title`, `imageby`, `checked`) VALUES
(17, 30, 'images/upload/38db3aed920cf82ab059bfccbd02be6asunsetc.jpg', 'Vacation', 'Beach and Sunset', 0),
(84, 27, 'images/upload/05049e90fa4f5039a8cadc6acbb4b2ccsafari-goldblack-desktop.jpg', 'Black', 'Gold', 1),
(86, 27, 'images/upload/c399862d3b9d6b76c8436e924a68c45bsafari-goldwhite-desktop.jpg', 'TATA ', 'White Gold', 1),
(88, 27, 'images/upload/c0f168ce8900fa56e57789e2a2f2c9d0safari-gold-d-banner1.jpg', 'SAFARI', 'SUV', 0);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `prrfix` varchar(50) DEFAULT NULL,
  `lang_default` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `emailid` varchar(225) NOT NULL,
  `subscribe` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `userid`, `emailid`, `subscribe`) VALUES
(2, 0, 'gupta@gmail.com', 0),
(3, 0, 'gupta40@gmail.com', 0),
(9, 0, 'gupta.jatin40@gmail.com', 0),
(10, 0, 'gupta.jatin4595@gmail.com', 0),
(11, 0, 'mn@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `subscription` tinyint(1) DEFAULT NULL,
  `comment` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `reset_link_token` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `exp_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `emailid`, `password`, `subscription`, `comment`, `reset_link_token`, `exp_date`) VALUES
(27, 'Jatin', 'Gupta', 'gupta.jatin40@gmail.com', 'd9a9046d60f3ec4358ba9e9594d5f1a7', 0, '', '', '0000-00-00 00:00:00'),
(29, 'admin', '', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0, '', '', '0000-00-00 00:00:00'),
(30, 'Libbna', 'Mathew', 'libbnamathew@gmail.com', '6177eaba04a520a95be90b340b149b8a', 0, '', '', '0000-00-00 00:00:00'),
(42, 'm', 'n', 'mn@gmail.com', '412566367c67448b599d1b7666f8ccfc', 0, '', '', '0000-00-00 00:00:00'),
(43, 'Hemant', 'Gupta', 'hemant@gmail.com', '17563740df9a804bc5e3b31c5cb58984', 0, '', '', '0000-00-00 00:00:00'),
(73, 'vishal', 'bandre', 'vishalbandre@gmail.com', 'af70a306f71eda7f3ff19c1c5cb064ef', 0, '', '', '0000-00-00 00:00:00'),
(77, 'Jatin', 'Gupta', 'gupta.jatin4@gmail.com', '1fdda3f0c5555b8b3057369ba3c58215', 0, '', '', '0000-00-00 00:00:00'),
(78, 'Jatin', 'Gupta', 'gupta.jatin422@gmail.com', '1fdda3f0c5555b8b3057369ba3c58215', 0, '', '', '0000-00-00 00:00:00'),
(81, 'anju', 'Gupta', 'anju@gmail.com', 'c9b313a695b0e925eef0a30310f80ee6', 0, '', '', '0000-00-00 00:00:00'),
(82, 'Libbna', 'Mathew', 'libbna260296@gmail.com', '6177eaba04a520a95be90b340b149b8a', 0, '', '', '0000-00-00 00:00:00'),
(120, 'Krishan', 'Gupta', 'kkgupta29@gmail.com', '69fb127376c7bcd05caee9bed739c23f', 0, '', '', '0000-00-00 00:00:00'),
(121, 'omkar', 'd', 'om@gmail.com', 'd58da82289939d8c4ec4f40689c2847e', 0, '', '', '0000-00-00 00:00:00'),
(132, 'M', 'J', 'mj@gmail.com', '007de96adfa8b36dc2c8dd268d039129', 0, '', '', '0000-00-00 00:00:00'),
(133, 'Jatin', 'Gupta', 'gupta.jatin4595@gmail.com', 'a7cbc05da7fa0468d1c54272a8f15a6a', 0, '', NULL, NULL),
(137, 'Jatin', 'Gupta', 'gupta.jatin@gmail.com', 'd9a9046d60f3ec4358ba9e9594d5f1a7', NULL, NULL, NULL, NULL),
(138, 'Libbna', 'Mathew', 'lm@gmail.com', '192292e35fbe73f6d2b8d96bd1b6697d', NULL, NULL, NULL, NULL),
(139, 'K', 'B', 'kb@gmail.com', 'ba34ea40525a4379add785228e37fe86', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `blog_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `carousel`
--
ALTER TABLE `carousel`
  ADD CONSTRAINT `carousel_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
