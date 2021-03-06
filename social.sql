-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 07:49 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(255) NOT NULL,
  `froemail` varchar(255) DEFAULT NULL,
  `tooemail` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `timed` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `froemail`, `tooemail`, `text`, `timed`) VALUES
(1, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'hello shashank', '2020-09-28 19:21:00.959390'),
(2, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'hello shashank ', '2020-09-28 19:21:50.543406'),
(3, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'hello shashank 122', '2020-09-28 19:22:24.245081'),
(4, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'hello shashank 1224', '2020-09-28 19:22:36.292564'),
(5, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'hello shashank 1224', '2020-09-28 19:22:52.201420'),
(6, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'hello shashank 1224', '2020-09-28 19:23:12.271280'),
(7, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu6@gmail.com', 'what', '2020-09-28 19:33:05.377330'),
(8, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'rr', '2020-09-28 19:33:47.145753'),
(9, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'rrr', '2020-09-28 19:34:29.381695'),
(10, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'rrr', '2020-09-28 19:34:33.578410'),
(11, 'cdeepakdeepu0@gmail.com', 'cdeepakdeepu6@gmail.com', 'what are you typing', '2020-09-28 19:35:51.872356'),
(12, 'cdeepakdeepu0@gmail.com', 'cdeepakdeepu6@gmail.com', 'what are you typing', '2020-09-28 19:35:58.270783'),
(13, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'why do you want to know', '2020-09-28 19:37:05.404134'),
(14, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'working', '2020-09-28 19:38:33.426073'),
(15, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'good night', '2020-09-28 20:46:05.937223'),
(16, 'cdeepakdeepu0@gmail.com', 'cdeepakdeepu6@gmail.com', 'bye', '2020-09-28 20:46:28.845338'),
(17, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'good morning', '2020-09-29 11:20:15.710227'),
(18, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'hello', '2020-09-29 12:43:45.585982'),
(19, 'cdeepakdeepu6@gmail.com', 'cdeepakdeepu0@gmail.com', 'what', '2020-09-29 13:11:35.566259');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(255) NOT NULL,
  `toemail` varchar(255) DEFAULT NULL,
  `fremail` varchar(255) DEFAULT NULL,
  `response` int(10) DEFAULT '0',
  `day` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `toemail`, `fremail`, `response`, `day`) VALUES
(16, 'cdeepakdeepu0@gmail.com', 'cdeepakdeepu6@gmail.com', 1, '2020-09-28 07:38:57.067507'),
(20, 'infopedia.org4@gmail.com', 'cdeepakdeepu6@gmail.com', 1, '2020-09-29 14:07:48.673059'),
(21, 'infopedia.org4@gmail.com', 'cdeepakdeepu0@gmail.com', 0, '2020-09-29 14:22:18.062903');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(255) NOT NULL,
  `number` int(10) DEFAULT NULL,
  `date` int(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL DEFAULT 'private',
  `online` int(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `email`, `password`, `number`, `date`, `gender`, `id`, `image`, `mode`, `online`) VALUES
('deepak', 'cdeepakdeepu6@gmail.com', 12, 2147483645, 2020, 'male', 1, '20190722_30.jpg', 'public', 1),
('shashank', 'cdeepakdeepu0@gmail.com', 12, 123456765, 2020, 'male', 2, 'quiz.jpg', 'public', 1),
('ravi', 'infopedia.org4@gmail.com', 12345, 1234567899, 2020, 'male', 3, '', 'private', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `images` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `pemail` varchar(255) DEFAULT NULL,
  `timep` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `pid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`images`, `text`, `pemail`, `timep`, `pid`) VALUES
('20190722_30.jpg', NULL, 'cdeepakdeepu6@gmail.com', '2020-09-28 05:12:00.000510', 1),
('image.jpg', 'Hello', 'cdeepakdeepu0@gmail.com', '2020-09-28 06:25:52.601968', 2),
('image3.jpg', NULL, 'cdeepakdeepu0@gmail.com', '2020-09-28 07:18:26.219482', 3),
('cousera.png', NULL, 'cdeepakdeepu6@gmail.com', '2020-09-29 07:06:41.009376', 4),
('back.jpg', NULL, 'infopedia.org4@gmail.com', '2020-09-29 14:09:24.171695', 5),
('back.jpg', NULL, 'cdeepakdeepu6@gmail.com', '2020-09-29 14:11:41.798744', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
