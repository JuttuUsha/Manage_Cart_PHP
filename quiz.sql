-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.ict.swin.edu.au:3306
-- Generation Time: Apr 06, 2013 at 09:57 AM
-- Server version: 5.1.67
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `liangyao_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `answer` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, 'Which desert did David Livingston cross to reach Lake Ngami?', 'Gobi', 'Kalahari', 'Sahara', 'Negev', 'b'),
(2, 'In what year did Sir Edmund Hillary and Tenzing Norgay become the first climbers to reach the summit of Mt. Everest?', '1927', '1936', '1949', '1953', 'd'),
(3, 'What African-American explorer reached the North Pole with Robert Peary in 1909?', 'Matthew Henson', 'Jim Beckwourth', 'Jesse Owens', 'Booker T. Washington', 'a'),
(4, 'What was the name of Jacques Cousteau''s research vessel?', 'Sea Witch', 'Calypso', 'New Frontier', 'Avignon', 'b'),
(5, 'Who was the first European to explore Florida?', 'Hernando De Soto', 'Sir Francis Drake', 'Ponce De Leon', 'James Cook', 'c'),
(6, 'When were emoticons invented?', '1992', '1978', '1921', '1881', 'd'),
(7, 'In what year did women first compete in the Olympics?', '1892', '1896', '1900', '1904', 'c');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
