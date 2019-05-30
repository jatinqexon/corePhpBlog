-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2019 at 01:42 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.2.14-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs_user`
--

CREATE TABLE `blogs_user` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs_user`
--

INSERT INTO `blogs_user` (`id`, `user_id`, `title`, `content`) VALUES
(11, 14, 'fweqfwe', 'fqwfqwfqf'),
(12, 14, 'fqwfqwf', 'gwegwqegg'),
(13, 14, 'fqwfqwf', 'fwqfqwfwqf'),
(15, 14, 'fwqfqwfqw', 'fqwfqwfwqf'),
(16, 14, 'fqwfwqfqwf', 'fwqfqwfqwf'),
(17, 14, 'fwqfqwfg', 'gwqgqq'),
(18, 14, 'qqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq'),
(19, 14, '1111111111111111111111', '11111111111111111ddddddddddeeeeeeeeeeeeewwwwwwwwwwwwwweeeeeeeeeeedccccccccccccc'),
(20, 14, 'e3r', 'wefrwerfwerfwefwfwfgw'),
(23, 14, 'v324v423b', '4523b52v42v'),
(24, 14, 'fgewrgwerg', 'gwergewg'),
(25, 14, 'gerge', 'grege'),
(26, 14, 'greg', 'gewrgera'),
(27, 14, 'gaewrga', 'gweagawe'),
(28, 14, 'gaerga', 'gaewrgae'),
(29, 14, 'gaewrgae', 'geawrgae'),
(30, 14, 'gaerga', 'gaewrga'),
(31, 14, 'aergae', 'gaergae'),
(32, 14, 'gaergea', 'gerga'),
(33, 14, 'gaergaer', 'gaerga'),
(34, 14, 'gerga', 'ergaeg'),
(35, 14, 'gaergae', 'erga'),
(36, 14, 'gaergaer', 'gegea'),
(37, 14, 'gaergae', 'agerga'),
(38, 14, 'gaergae', 'eargaeg'),
(39, 14, 'ergag', 'aerwgaewg'),
(40, 14, 'weg', 'gwegwg'),
(42, 14, 'update', 'hellobdfbhd \r\nrthrteeeeeeeeeeeeeeeee'),
(49, 13, 'yee', 'check'),
(50, 13, 'ur', 'ujrtujr'),
(51, 13, 'fewf', 'fewfwe'),
(52, 13, 'fewf', 'fewfwe'),
(53, 13, 'fewf', 'fewfwe'),
(57, 15, 'gwegwG', 'GWEGWG'),
(58, 13, 'kk', 'tktyktyk'),
(59, 13, 'gga', 'gaagaergaergwergwaegawegwaegwegwegwaegwg\r\ngaagaergaergwergwaegawegwaegwegwegwaegwggaagaergaergwergwaegawegwaegwegwegwaegwggaagaergaergwergwaegawegwaegwegwegwaegwggaagaergaergwergwaegawegwaegwegwegwaegwggaagaergaergwergwaegawegwaegwegwegwaegwg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` int(20) NOT NULL,
  `modified_on` int(20) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `modified_by` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-active,0-inactive',
  `delete_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1-deleted,0-notdeleted',
  `phone` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `created_on`, `modified_on`, `created_by`, `modified_by`, `status`, `delete_status`, `phone`, `password`) VALUES
(1, 'hgrthgdsg', 'ankit@qexon.com', '', 0, 0, '', '', 1, 0, 5435, 'onclick123'),
(2, 'jtghfdh', 'ankit@qexon.com', '', 0, 0, '', '', 1, 0, 0, '32de3fe99c83bd30e0ef'),
(3, 'dhdhyr', 'ankit@qexon.com', '', 0, 0, '', '', 1, 0, 645, '32de3fe99c83bd30e0ef'),
(4, 'drtureye', 'ankit@qexon.com', '', 0, 0, '', '', 1, 0, 546, '32de3fe99c83bd30e0ef'),
(5, 't34r543', 'sef', '', 0, 0, '', '', 1, 0, 0, 'ddd7dfce014071d4b806'),
(6, 'dsgagwerg', 'jatin@gmail.com', '', 0, 0, '', '', 1, 0, 6534634, 'b0baee9d279d34fa1dfd'),
(7, 'oigreggrewg', 'aa@gmail.com', '', 0, 0, '', '', 1, 0, 0, '3d2172418ce305c7d16d4b05597c6a59'),
(8, '8756', 'ujtr@gmail.com', 'download.jpeg', 0, 0, '', '', 1, 0, 6546, 'b0baee9d279d34fa1dfd71aadb908c3f'),
(9, 'garggdfg', 'gdfg@gerg.jfj', '', 0, 0, '', '', 1, 0, 2147483647, '93279e3308bdbbeed946fc965017f67a'),
(10, 'hfrtghhtrhrt', 'htgr@dh.hftgh', '', 0, 0, '', '', 1, 0, 2147483647, '93279e3308bdbbeed946fc965017f67a');

-- --------------------------------------------------------

--
-- Table structure for table `users_new`
--

CREATE TABLE `users_new` (
  `id` int(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL COMMENT '1-Admin,0-User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_new`
--

INSERT INTO `users_new` (`id`, `gender`, `email`, `password`, `profession`, `about`, `image`, `name`, `is_admin`) VALUES
(13, 'male', 'ankit@qexon.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'programmer', 'vged', 'my3.jpg', 'Admin', 1),
(14, 'Female', 'jatin@qexon.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'programmer', 'jmthmjsd', 'my5.jpg', 'smith', 0),
(15, 'male', 'sourabh@qexon.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'programmer', 'good person', 'my5.jpg', 'sourabh', 0),
(16, 'male', 'mohit@qexon.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '1', 'gewgweg', 'my6.jpeg', 'mohit', 0),
(17, 'male', 'abhishek@qexon.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '4', 'fewf', 'my5.jpg', 'abhishek', 0),
(18, 'female', 'aasish@qexon.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '1', 'efef', 'download.jpeg', 'aasish', 0),
(19, 'male', 'usertest0023@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '1', 'etgqe', 'my3.jpg', 'abhishek', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_comment`
--

CREATE TABLE `user_comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_comment`
--

INSERT INTO `user_comment` (`id`, `user_id`, `comment`, `blog_id`) VALUES
(1, 13, 'hemml bro', 9),
(2, 13, 'check', 9),
(3, 13, 'test', 10),
(4, 14, 'different', 11),
(6, 13, 'jatin', 9),
(7, 13, 'ewfwq', 9),
(8, 13, 'jatin', 10),
(9, 13, 'kuy', 9),
(10, 14, 'fewfw', 9),
(11, 13, 'how r you', 10),
(18, 13, 'hlo mohit', 13),
(19, 13, 'hlo mohit', 13),
(20, 13, 'hello mohit', 45),
(21, 13, 'gergher', 10),
(22, 13, 'grege', 54),
(23, 13, 'kyujkly', 54),
(24, 13, 'greger', 54),
(25, 13, 'fwqfqw', 12),
(26, 13, 'erwgweg', 9),
(27, 13, 'fewf', 9),
(28, 13, 'update data', 9),
(29, 13, '', 9),
(30, 13, '', 9),
(31, 13, '', 9),
(32, 13, '', 9),
(33, 13, 'fewef', 9),
(34, 13, '', 9),
(35, 13, '', 9),
(36, 13, '', 11),
(37, 13, '', 11),
(38, 13, '', 11),
(39, 13, 'bdfb', 10),
(40, 15, 'fewfwef', 10),
(41, 15, 'gregaeg', 11),
(42, 15, 'ewfgwef', 13),
(43, 13, 'fwqf', 49),
(44, 13, 'jtykt', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs_user`
--
ALTER TABLE `blogs_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_new`
--
ALTER TABLE `users_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_comment`
--
ALTER TABLE `user_comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs_user`
--
ALTER TABLE `blogs_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users_new`
--
ALTER TABLE `users_new`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_comment`
--
ALTER TABLE `user_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
