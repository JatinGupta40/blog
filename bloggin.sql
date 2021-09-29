-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 04:48 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id` int(11) NOT NULL,
  `userid` int(20) NOT NULL,
  `Heading` varchar(50) NOT NULL,
  `image` varchar(225) NOT NULL,
  `content` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `userid`, `Heading`, `image`, `content`) VALUES
(1, 27, 'Automobile', '', 'AAAAAAA AAAAAAAAAAAAAA AAAAAAAAAAAAA AAAAAAAAAAA AAAAAAAAAAA AAAAAAAAAAAA AAAAAAAAAAAAA AAAAAAAAAAAA AAAAAAAA '),
(2, 42, 'Analytics ABCD', '', 'hello Jatin'),
(4, 27, 'hello', '', 'SDSADASD'),
(5, 27, 'hello', '', 'jatin\r\n'),
(6, 42, 'M', '', 'N'),
(7, 42, 'N', '', 'M'),
(8, 42, 'abcd', '', 'efgh'),
(9, 42, 'ijkl', '', 'mnop'),
(10, 42, 'qrst', '', 'uvwx'),
(11, 42, 'yz', '', 'ab'),
(12, 42, '1234', '', '5678'),
(13, 42, '9101112', '', '13141516'),
(14, 42, 'Avengers', '', 'Mazaa nhi aya'),
(15, 42, 'Spider Man - No Way ', 'lakec.jpg', 'Bye God Trailer dekh ke mazaa agya'),
(16, 78, 'How Do You do', '', 'NAMASTE\r\nVADAKKAM\r\nJAI SHRI KRISHNA'),
(18, 27, 'TATA', '', 'SAFARI GOLD'),
(19, 82, 'adAD', '', 'aASDA'),
(20, 42, 'MN', '', 'MMMMKKKKK');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `userid` int(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `imageby` varchar(225) NOT NULL,
  `checked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `userid`, `image`, `title`, `imageby`, `checked`) VALUES
(13, 27, 'images/upload/20aee3a5f4643755a79ee5f6a73050acsunsetc.jpg', 'hello', 'J', 0),
(14, 27, 'images/upload/dd458505749b2941217ddd59394240e8images.jpg', 'Long Drive', 'JATIN', 1),
(15, 27, 'images/upload/66808e327dc79d135ba18e051673d906images.jpg', 'Long Drive', 'Jatin', 1),
(17, 30, 'images/upload/38db3aed920cf82ab059bfccbd02be6asunsetc.jpg', 'Vacation', 'Beach and Sunset', 0),
(18, 42, 'images/upload/20aee3a5f4643755a79ee5f6a73050acsunsetc.jpg', 'HELLOOO', 'MN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `subscription` tinyint(1) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `reset_link_token` varchar(200) NOT NULL,
  `exp_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `emailid`, `password`, `subscription`, `comment`, `reset_link_token`, `exp_date`) VALUES
(27, 'Jatin', 'Gupta', 'gupta.jatin40@gmail.com', 'd9a9046d60f3ec4358ba9e9594d5f1a7', 0, '', '', '0000-00-00 00:00:00'),
(29, 'Jatin', 'Gupta', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0, '', '', '0000-00-00 00:00:00'),
(30, 'Libbna', 'Mathew', 'libbnamathew@gmail.com', '6177eaba04a520a95be90b340b149b8a', 0, '', '', '0000-00-00 00:00:00'),
(42, 'm', 'n', 'mn@gmail.com', '412566367c67448b599d1b7666f8ccfc', 0, '', '', '0000-00-00 00:00:00'),
(43, 'Hemant', 'Gupta', 'hemant@gmail.com', '17563740df9a804bc5e3b31c5cb58984', 0, '', '', '0000-00-00 00:00:00'),
(73, 'vishal', 'bandre', 'vishalbandre@gmail.com', 'af70a306f71eda7f3ff19c1c5cb064ef', 0, '', '', '0000-00-00 00:00:00'),
(77, 'Jatin', 'Gupta', 'gupta.jatin4@gmail.com', '1fdda3f0c5555b8b3057369ba3c58215', 0, '', '', '0000-00-00 00:00:00'),
(78, 'Jatin', 'Gupta', 'gupta.jatin422@gmail.com', '1fdda3f0c5555b8b3057369ba3c58215', 0, '', '', '0000-00-00 00:00:00'),
(81, 'anju', 'Gupta', 'anju@gmail.com', 'c9b313a695b0e925eef0a30310f80ee6', 0, '', '', '0000-00-00 00:00:00'),
(82, 'Libbna', 'Mathew', 'libbna260296@gmail.com', '6177eaba04a520a95be90b340b149b8a', 0, '', '', '0000-00-00 00:00:00'),
(83, 'Vandana', 'Gupta', 'vandanagupta@gmail.com', '79c64644698d33279d6d6f0d7ec18b21', 0, '', '', '0000-00-00 00:00:00'),
(90, 'y', 'y', 'yy@gmail.com', '3e44107170a520582ade522fa73c1d15', 0, '', '', '0000-00-00 00:00:00'),
(91, 'y', 'y', 'yyy@gmail.com', '2fb1c5cf58867b5bbc9a1b145a86f3a0', 0, '', '', '0000-00-00 00:00:00'),
(92, 'y', 'y', 'yyyy@gmail.com', '2fb1c5cf58867b5bbc9a1b145a86f3a0', 0, '', '', '0000-00-00 00:00:00'),
(93, 'Jatin', 'Gupta', 'gupta.jatin@gmail.com', '6c5d8d55f80196ef98e2af6f62c8db6e', 0, '', '', '0000-00-00 00:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

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
