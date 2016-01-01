-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: webpagesdb.it.auth.gr:3306
-- Χρόνος δημιουργίας: 01 Ιαν 2016 στις 21:05:17
-- Έκδοση διακομιστή: 5.5.46-0ubuntu0.14.04.2
-- Έκδοση PHP: 5.5.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση δεδομένων: `Cave`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Answer`
--

CREATE TABLE IF NOT EXISTS `Answer` (
`Id` int(10) unsigned NOT NULL,
  `QuestionId` int(10) unsigned NOT NULL,
  `AnswerText` varchar(255) NOT NULL,
  `IsCorrect` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Άδειασμα δεδομένων του πίνακα `Answer`
--

INSERT INTO `Answer` (`Id`, `QuestionId`, `AnswerText`, `IsCorrect`) VALUES
(1, 0, 'Kylie Minogue', b'0'),
(2, 0, 'Patti Smith', b'0'),
(3, 0, 'PJ Harvey', b'1'),
(4, 0, 'Avril Lavigne', b'0'),
(5, 1, 'Blixa Bargeld', b'1'),
(6, 1, 'Warren Ellis', b'0'),
(7, 1, 'Martyn P. Casey', b'0'),
(8, 1, 'Jim Sclavunos', b'0'),
(9, 2, 'Hallelujah', b'0'),
(10, 2, 'Suzanne', b'1'),
(11, 2, 'The Mercy Seat', b'0'),
(12, 2, 'God is in the House', b'0'),
(13, 3, 'The ass saw the danger', b'0'),
(14, 3, 'And the God saw the Angel', b'0'),
(15, 3, 'And the Ass saw the Angel', b'1'),
(16, 3, 'And the Grass felt the Angel', b'0'),
(21, 4, 'The Sorry Dog', b'0'),
(22, 4, 'The Thirsty Dog', b'1'),
(23, 5, 'Do you love me', b'0'),
(24, 5, 'Let Love In', b'1'),
(25, 6, 'Savvopoulos', b'0'),
(26, 6, 'Psarantonis', b'1'),
(27, 6, 'Mpithikotsis', b'0'),
(28, 7, 'Two', b'1'),
(29, 7, 'Five', b'0'),
(30, 7, 'One', b'0'),
(31, 8, 'Into My Arms', b'1'),
(32, 8, 'The Ship Song', b'0'),
(33, 9, 'The Memory Remains', b'0'),
(34, 9, 'Mama said', b'0'),
(35, 9, 'Loverman', b'1'),
(36, 9, 'Nothing else matters', b'0');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Comments`
--

CREATE TABLE IF NOT EXISTS `Comments` (
`Id` int(10) unsigned NOT NULL,
  `CommentText` varchar(255) NOT NULL,
  `CommentDate` date NOT NULL,
  `CommentBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Άδειασμα δεδομένων του πίνακα `Comments`
--

INSERT INTO `Comments` (`Id`, `CommentText`, `CommentDate`, `CommentBy`) VALUES
(3, 'CommentTest', '2015-10-22', 'so@so.gr'),
(4, 'Nice Site', '2015-12-24', 'aggelos_dionysatos@channelsight.com'),
(5, 'such a site', '2015-12-24', 'email@email.gr'),
(6, 'You should definately check the quiz section', '2015-12-24', 'anonymous@cs.gr'),
(7, 'Amazing', '2015-12-24', NULL),
(8, 'Lovely', '2015-12-28', 'Anonymous@nomail.com'),
(9, 'Lovely', '2015-12-28', 'Anonymous@nomail.com'),
(10, 'Lovely', '2015-12-28', 'angel@cs.gr'),
(11, 'Lovely', '2015-12-28', 'angel@cs.gr'),
(12, 'test', '2015-12-28', 'Anonymous@nomail.com'),
(13, 'test', '2015-12-28', 'Anonymous@nomail.com'),
(14, 'test', '2015-12-28', 'Anonymous@nomail.com'),
(15, 'Erm...ok...', '2015-12-28', 'Anonymous@nomail.com'),
(16, 'zxcasdqwe', '2016-01-01', 'Anonymous@nomail.com'),
(17, 'zxcasdqwe', '2016-01-01', 'Anonymous@nomail.com');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Question`
--

CREATE TABLE IF NOT EXISTS `Question` (
`Id` int(10) unsigned NOT NULL,
  `QuestionTest` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Άδειασμα δεδομένων του πίνακα `Question`
--

INSERT INTO `Question` (`Id`, `QuestionTest`) VALUES
(0, 'Which of the Following singers did Nick Cave date?'),
(1, 'Who sang The Weeping Song along with Cave?'),
(2, 'Which of the following songs, sang by Cave, is a cover (not written by Cave)?'),
(3, 'Which of the following is the tile of first book cave wrote?'),
(4, 'Which of the following is the title of a song'),
(5, 'Which of the following is the title of an album?'),
(6, 'With which of the following Greek artists did Cave cooperate'),
(7, 'How Many books did Cave author'),
(8, 'Which of the following songs was translated to Greek'),
(9, 'Which of the following songs was covered by Metallica');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `Answer`
--
ALTER TABLE `Answer`
 ADD PRIMARY KEY (`Id`), ADD KEY `Question_Answer` (`QuestionId`);

--
-- Ευρετήρια για πίνακα `Comments`
--
ALTER TABLE `Comments`
 ADD PRIMARY KEY (`Id`);

--
-- Ευρετήρια για πίνακα `Question`
--
ALTER TABLE `Question`
 ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `Answer`
--
ALTER TABLE `Answer`
MODIFY `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT για πίνακα `Comments`
--
ALTER TABLE `Comments`
MODIFY `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT για πίνακα `Question`
--
ALTER TABLE `Question`
MODIFY `Id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `Answer`
--
ALTER TABLE `Answer`
ADD CONSTRAINT `Question_Answer` FOREIGN KEY (`QuestionId`) REFERENCES `Question` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
