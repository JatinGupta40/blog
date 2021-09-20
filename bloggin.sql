-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 09:28 PM
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
(1, 27, 'Automobile', '', 'AAAAAAA AAAAAAAAAAAAAA AAAAAAAAAAAAA AAAAAAAAAAA AAAAAAAAAAA AAAAAAAAAAAA AAAAAAAAAAAAA AAAAAAAAAAAA AAAAAAAA AAAAAAAAA \r\n AAAAAAA AAAAAAAA AAAAAAAAAAAA AAAAAAAAAAA AAAAAAAAAAAA AAAAAAAAA AAAAAAAAAA AAAAAAAAAAA AAAAAAAAAAAA AAAAAAAAAAA AAAAAAAAAAAA AAAAAAAAAA AAAAAAAAAAAA AAAAAAAAAAAAA AAAAAAAAAAAAAA AAAAAAAAAAAA AAAAAAAAAA AAAAAAAAAA AAAAAAAAAAAA AAAAAAAAAAA AAAAAAAAAAA AAAAAAAAAAA AAAAAAAA AAAAA AAAAAAAA AAAAAAAAAAA AAAAAAA AAAAAA AAAAAAA AAAA AAAAAAA A AAAA A A A A A A AAAAAAAAAAA AAAAAAAAAAA'),
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
(15, 42, 'Spider Man - No Way ', 'lakec.jpg', 'Bye God Trailer dekh ke mazaa agya');

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
(14, 27, 'images/upload/dd458505749b2941217ddd59394240e8images.jpg', 'Long Drive', 'JATIN', 0),
(15, 27, 'images/upload/66808e327dc79d135ba18e051673d906images.jpg', 'Long Drive', 'Jatin', 0),
(16, 27, 'images/upload/d2ed45a52bc0edfa11c2064e9edee8bfwp4472163.jpg', 'Travel', 'Journey', 0),
(17, 30, 'images/upload/38db3aed920cf82ab059bfccbd02be6asunsetc.jpg', 'Vacation', 'Beach and Sunset', 0);

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
  `comment` varchar(2000) NOT NULL,
  `reset_link_token` varchar(200) NOT NULL,
  `exp_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `emailid`, `password`, `comment`, `reset_link_token`, `exp_date`) VALUES
(27, 'Jatin', 'Gupta', 'gupta.jatin40@gmail.com', 'd9a9046d60f3ec4358ba9e9594d5f1a7', '', '', '0000-00-00 00:00:00'),
(29, 'Jatin', 'Gupta', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', '', '0000-00-00 00:00:00'),
(30, 'Libbna', 'Mathew', 'libbnamathew@gmail.com', '6177eaba04a520a95be90b340b149b8a', '', '', '0000-00-00 00:00:00'),
(38, 'x', 'y', 'xy@gmail.om', '3e44107170a520582ade522fa73c1d15', '', '', '0000-00-00 00:00:00'),
(39, 'w', 'e', 'we@gmail.com', 'ff1ccf57e98c817df1efcd9fe44a8aeb', '', '', '0000-00-00 00:00:00'),
(40, 'q', 'q', 'qq@gmail.com', '099b3b060154898840f0ebdfb46ec78f', '', '', '0000-00-00 00:00:00'),
(41, 'z', 'z', 'zz@gmail.com', '25ed1bcb423b0b7200f485fc5ff71c8e', '', '', '0000-00-00 00:00:00'),
(42, 'm', 'n', 'mn@gmail.com', '412566367c67448b599d1b7666f8ccfc', '', '', '0000-00-00 00:00:00'),
(43, 'Hemant', 'Gupta', 'hemant@gmail.com', '17563740df9a804bc5e3b31c5cb58984', '', '', '0000-00-00 00:00:00'),
(45, 'Anju', 'Gupta', 'anju@gmail.com', 'anju', '', '', '0000-00-00 00:00:00'),
(46, 'Jatin', 'Gupta', 'gupta.jatin80@gmail.com', 'jatingupta', '', '', '0000-00-00 00:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
