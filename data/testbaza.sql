-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2019 at 04:34 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testbaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `idArticle` int(5) NOT NULL,
  `heading` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `idUser` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`idArticle`, `heading`, `text`, `idUser`) VALUES
(49, 'US immigration: Drowning exposes risks of illegal ', 'El Salvador\'s government has warned people against risking their lives to reach the US after a man and his baby daughter drowned in the Rio Grande.', 2),
(50, '\'Triple whammy\' threatens UN action on climate cha', 'A \"triple whammy\" of events threatens to hamper efforts to tackle climate change say UN delegates.', 2),
(51, 'France heatwave: Paris region closes schools', 'France is starting to close dozens of schools because of a heatwave, with temperatures expected to climb above 40C (104F) in some regions on Thursday.', 2),
(52, 'Spirited Away: Japanese anime trounces Toy Story 4', 'Japanese animation Spirited Away has dominated the Chinese box office over its opening weekend, making more than twice as much as Disney\'s Toy Story 4.', 2),
(53, 'How do you win the race to become US president?', 'Twenty Democratic candidates are about to hold the first debates of the 2020 US presidential race. The event comes soon after Donald Trump formally launched his re-election bid at a raucous rally in Florida.', 1),
(54, 'US election 2020: Which Democrat will take on Trum', 'Election day is still more than a year away, but the race to become the Democratic challenger to Donald Trump is already well under way.', 1),
(55, 'Democrats 2020: What their key issues are', 'The number of Democrats lining up to try to take on President Donald Trump as he seeks re-election is growing by the week. So who\'s running and what are their strengths and weaknesses?', 1),
(56, 'Child obesity drive \'stalled by Brexit\'', 'The drive to tackle child obesity has stalled with a raft of measures stuck in Brexit backlog, it is being claimed.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `idImg` int(5) NOT NULL,
  `big` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `idArticle` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`idImg`, `big`, `idArticle`) VALUES
(116, 'assets/images/articles/15615560961.jpg', 49),
(117, 'assets/images/articles/1561556163_107534419_enb_sb50_21june19_kiaraworth-47.jpg', 50),
(118, 'assets/images/articles/1561556213_107544311_eiffelplayingafp.jpg', 51),
(119, 'assets/images/articles/1561556253_107544317_heatwave_640_v3-nc.png', 51),
(120, 'assets/images/articles/1561556315_107541248_miyazaki-spirited_away_1_-c1162-poster.jpg', 52),
(121, 'assets/images/articles/1561556338_107542932_c1290b.0001b.jpg', 52),
(122, 'assets/images/articles/1561556423_107522009_gettyimages-157529561.jpg', 53),
(123, 'assets/images/articles/1561556434_107548217_gettyimages-917433514.jpg', 53),
(124, 'assets/images/articles/1561556515_106758178__106280385_index_image_bernie-nc.png', 54),
(125, 'assets/images/articles/1561556648_107533895_issues3.jpg', 55),
(126, 'assets/images/articles/1561556678_105310685_biden_976getty.jpg', 55),
(127, 'assets/images/articles/1561556761_102166586_gettyimages-187084123.jpg', 56),
(128, 'assets/images/articles/1561556773_102166592_gettyimages-486760902.jpg', 56);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(5) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`) VALUES
(1, 'dzondra', 'b23cf2d0fb74b0ffa0cf4c70e6e04926'),
(2, 'maja97', '916216a1fb8061ae0c8f3891852a3020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`idImg`),
  ADD KEY `idArticle` (`idArticle`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `idArticle` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `idImg` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
