-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 22, 2024 at 11:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brainster_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `Authors`
--

CREATE TABLE `Authors` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `bio` text NOT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Authors`
--

INSERT INTO `Authors` (`id`, `firstname`, `lastname`, `bio`, `is_deleted`) VALUES
(10, 'Jason', 'Statham', 'Jason Statham is holywood actor', 0),
(11, 'John', 'Doe', 'John Doe is character from imagination', 0),
(12, 'Jane ', 'Doe', 'John\'s wife is this women ', 0),
(13, 'Bradd', 'Pit', 'Here is to fullfill database', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` int(11) UNSIGNED NOT NULL,
  `release_year` year(4) NOT NULL,
  `pages` int(11) NOT NULL,
  `imageURL` varchar(100) NOT NULL,
  `category` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`id`, `title`, `author`, `release_year`, `pages`, `imageURL`, `category`) VALUES
(25, 'web builder', 10, '2002', 210, 'https://media.springernature.com/full/springer-static/cover-hires/book/978-1-4302-0350-6', 25),
(26, 'web prettier', 11, '2009', 200, 'https://media.springernature.com/full/springer-static/cover-hires/book/978-1-4302-0225-7', 29),
(27, 'Php intro and variables', 12, '2009', 88, 'https://media.springernature.com/full/springer-static/cover-hires/book/978-1-4302-2474-7', 26),
(28, 'java', 13, '1999', 100, 'https://bpbonline.com/cdn/shop/products/1021_Front.jpg?v=1625292795', 30),
(29, 'Javascript magic', 11, '1999', 200, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSni3qTZfCHgLiHHjTW6HlOYMr7k1foJ30EfA&s', 27),
(30, 'gitlab', 10, '1999', 100, 'https://m.media-amazon.com/images/I/41twc6WWixL._SL500_.jpg', 28),
(31, 'Title', 11, '2111', 222, 'https://media.springernature.com/full/springer-static/cover-hires/book/978-1-4302-0225-7', 26),
(32, 'Title', 11, '2010', 2, 'https://m.media-amazon.com/images/I/41twc6WWixL._SL500_.jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(32) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`id`, `type`, `is_deleted`) VALUES
(18, 'comedy', 1),
(19, 'crime', 1),
(20, 'sci-fi', 1),
(21, 'crime', 1),
(22, 'html', 1),
(23, 'crime', 1),
(24, 'comedy', 1),
(25, 'html', 0),
(26, 'php', 0),
(27, 'javascript', 0),
(28, 'git', 1),
(29, 'css', 1),
(30, 'java', 0),
(31, 'python', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Commentars`
--

CREATE TABLE `Commentars` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `bookID` int(11) NOT NULL,
  `user` varchar(32) NOT NULL,
  `is_approved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Notes`
--

CREATE TABLE `Notes` (
  `id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `bookID` int(11) NOT NULL,
  `user` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Notes`
--

INSERT INTO `Notes` (`id`, `content`, `bookID`, `user`) VALUES
(4, 'Duci note', 27, 'chichevalievd'),
(10, 'private note edited', 25, 'nastovska');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `email`, `username`, `password`, `is_admin`) VALUES
(11, 'admin@admin.com', 'Admin', '36a2930dae16f82885cc78fc5bc8bf5a', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Authors`
--
ALTER TABLE `Authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk` (`category`),
  ADD KEY `author_fk` (`author`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Commentars`
--
ALTER TABLE `Commentars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_fk` (`bookID`);

--
-- Indexes for table `Notes`
--
ALTER TABLE `Notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nodes_fk` (`bookID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Authors`
--
ALTER TABLE `Authors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `Commentars`
--
ALTER TABLE `Commentars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Notes`
--
ALTER TABLE `Notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Books`
--
ALTER TABLE `Books`
  ADD CONSTRAINT `author_fk` FOREIGN KEY (`author`) REFERENCES `Authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`category`) REFERENCES `Categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Commentars`
--
ALTER TABLE `Commentars`
  ADD CONSTRAINT `comment_fk` FOREIGN KEY (`bookID`) REFERENCES `Books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Notes`
--
ALTER TABLE `Notes`
  ADD CONSTRAINT `nodes_fk` FOREIGN KEY (`bookID`) REFERENCES `Books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
