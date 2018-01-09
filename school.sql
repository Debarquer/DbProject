-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 09 jan 2018 kl 15:48
-- Serverversion: 5.6.26
-- PHP-version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `school`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `pk` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `location` varchar(32) NOT NULL,
  `teacher` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `course`
--

INSERT INTO `course` (`pk`, `name`, `location`, `teacher`) VALUES
(1, 'Database management', '', 0),
(2, 'Programming 2', '', 0),
(3, 'Email 101', '', 0),
(4, 'Mathematical Statistics', '', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `course_student`
--

CREATE TABLE IF NOT EXISTS `course_student` (
  `pk` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `pk` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `student`
--

INSERT INTO `student` (`pk`, `name`) VALUES
(1, 'Simon'),
(2, 'Bob'),
(3, 'Anna'),
(4, 'Betty'),
(5, 'Anne-Mary'),
(6, 'Marianne'),
(7, 'Mikael'),
(8, 'Per');

-- --------------------------------------------------------

--
-- Tabellstruktur `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `pk` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `teacher`
--

INSERT INTO `teacher` (`pk`, `name`) VALUES
(1, 'Erik'),
(2, 'Monika'),
(3, 'Arnold'),
(7, 'Veronica');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`pk`);

--
-- Index för tabell `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`pk`);

--
-- Index för tabell `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`pk`);

--
-- Index för tabell `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`pk`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `course`
--
ALTER TABLE `course`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT för tabell `course_student`
--
ALTER TABLE `course_student`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `student`
--
ALTER TABLE `student`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT för tabell `teacher`
--
ALTER TABLE `teacher`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
