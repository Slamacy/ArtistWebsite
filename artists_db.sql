-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 07:45 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artists_db`
--
CREATE DATABASE IF NOT EXISTS `artists_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `artists_db`;

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

DROP TABLE IF EXISTS `art`;
CREATE TABLE IF NOT EXISTS `art` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `art_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  PRIMARY KEY (`art_id`),
  KEY `artist_id` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`art_id`, `artist_id`, `date`, `art_name`, `file_path`) VALUES
(1, 1, '2017-11-29', 'BotZen', 'assets/accounts/Party_cia/Art/botzen.png'),
(2, 1, '2017-11-30', 'Chibi Me', 'assets/accounts/Party_cia/Art/chibime.png'),
(3, 1, '2017-12-05', 'Strong as the Mountain', 'assets/accounts/Party_cia/Art/Strong_as_the_Mountain.png'),
(4, 2, '2016-07-14', 'Aku Encounter', 'assets/accounts/Slamacy/Art/Aku Encounter.png'),
(5, 2, '2017-12-07', 'Mu and Nai-Nai', 'assets/accounts/Slamacy/Art/MuAndNai-Nai.png'),
(6, 2, '2017-12-07', 'Sans welcomes you', 'assets/accounts/Slamacy/Art/sansWelcome.png'),
(7, 3, '2017-12-08', 'They\'re all good boys', 'assets/accounts/Ash_m31/Art/They\'re_all_good_boys.jpg'),
(8, 3, '2017-12-08', 'Ash Harrow Sketch', 'assets/accounts/Ash_m31/Art/ashHarrow.jpg'),
(9, 3, '2017-12-08', 'Dan Sketch', 'assets/accounts/Ash_m31/Art/dan.jpg'),
(10, 4, '2017-10-30', 'Corrupted Ninja', 'assets/accounts/CurtZeNinja/Art/Corrupted_Ninja.png'),
(11, 4, '2017-02-01', 'Sonic\'s Adventure', 'assets/accounts/CurtZeNinja/Art/Sonic_s_Adventure.png'),
(12, 4, '2016-11-08', 'Knowledge Through Disintegration', 'assets/accounts/CurtZeNinja/Art/Knowledge_Through_Disintegration.png');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `artist_id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `artist_name`, `description`, `occupation`, `website`, `age`) VALUES
(1, 'Party_cia', 'I like art and video games', 'Student / Hobbyist', 'https://twitter.com/Party_cia', 19),
(2, 'Slamacy', 'I try at least.', 'Hobbyist / Student', 'https://twitter.com/Slamacy', 19),
(3, 'Ash_m31', 'Emma in korean', 'Hobbyist / Student', 'https://twitter.com/ash_m31', 21),
(4, 'CurtZeNinja', 'I\'m Curt and I like Sonic :D', 'Freelance Illustrator', 'https://twitter.com/CurtZeNinja', 21);

-- --------------------------------------------------------

--
-- Table structure for table `artist_assets`
--

DROP TABLE IF EXISTS `artist_assets`;
CREATE TABLE IF NOT EXISTS `artist_assets` (
  `assets_id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `background` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  PRIMARY KEY (`assets_id`),
  KEY `artist_id` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist_assets`
--

INSERT INTO `artist_assets` (`assets_id`, `artist_id`, `background`, `profile_pic`, `header`) VALUES
(1, 1, 'assets/accounts/Party_cia/background.png', 'assets/accounts/Party_cia/profilePic.png', 'assets/accounts/Party_cia/header.png'),
(2, 2, 'assets/accounts/Slamacy/background.png', 'assets/accounts/Slamacy/profilePic.png', 'assets/accounts/Slamacy/header.png'),
(3, 3, 'assets/accounts/Ash_m31/background.jpg', 'assets/accounts/Ash_m31/profilePic.jpg', 'assets/accounts/Ash_m31/header.jpg'),
(4, 4, 'assets/accounts/CurtZeNinja/background.png', 'assets/accounts/CurtZeNinja/profilePic.png', 'assets/accounts/CurtZeNinja/header.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `art`
--
ALTER TABLE `art`
  ADD CONSTRAINT `art_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `artist_assets`
--
ALTER TABLE `artist_assets`
  ADD CONSTRAINT `artist_assets_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
