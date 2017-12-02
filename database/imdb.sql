-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 02 Δεκ 2017 στις 22:27:08
-- Έκδοση διακομιστή: 10.1.21-MariaDB
-- Έκδοση PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `imdb`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `acts`
--

CREATE TABLE `acts` (
  `afid` int(11) NOT NULL,
  `aaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `acts`
--

INSERT INTO `acts` (`afid`, `aaid`) VALUES
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 20),
(3, 21),
(3, 22),
(4, 13),
(4, 14),
(4, 15),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(6, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `artist`
--

CREATE TABLE `artist` (
  `aid` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `artist`
--

INSERT INTO `artist` (`aid`, `name`, `surname`, `birth_date`, `sex`, `age`, `country`) VALUES
(1, 'Al', 'Pacino', '1940-04-25', 'm', NULL, 'USA '),
(2, 'Steven', 'Bauer', '1956-12-02', 'm', NULL, 'Cuba'),
(3, 'Michelle', 'Pfeiffer', '1958-04-29', 'f', NULL, 'USA'),
(4, 'Mary Elizabeth', 'Mastrantonio', '1958-11-17', 'f', NULL, 'USA'),
(5, 'Rebecca', 'Hall', '1982-04-03', 'f', NULL, 'UK'),
(6, 'Scarlett', 'Johansson', '1984-11-22', 'f', NULL, 'USA'),
(7, 'Javier', 'Bardem', '1969-03-01', 'm', NULL, 'Spain'),
(8, 'Penelope ', 'Cruz', '1974-04-28', 'f', NULL, 'Spain'),
(9, 'Andrew', 'Lincoln', '1973-09-14', 'm', NULL, 'UK'),
(10, 'Steven', 'Yeun', '1983-12-21', 'm', NULL, 'South Korea'),
(11, 'Chandler', 'Riggs', '1999-06-27', 'm', NULL, 'USA'),
(12, 'Norman', 'Reedus', '1969-01-06', 'm', NULL, 'USA'),
(13, 'Sylvester', 'Stallone', '1946-07-06', 'm', NULL, 'USA'),
(14, 'Julie', 'Benz', '1972-04-01', 'f', NULL, 'USA'),
(15, 'Matthew', 'Marsden', '1973-03-03', 'm', NULL, 'UK'),
(16, 'Frank', 'Darabont', '1959-01-28', 'm', NULL, 'France'),
(17, 'Woody', 'Allen', '1935-12-01', 'm', NULL, 'USA'),
(18, 'Martin', 'Scorsese', '1942-11-17', 'm', NULL, 'USA'),
(19, 'Brian', 'De Palma', '1940-09-11', 'm', NULL, 'USA'),
(20, 'Leonardo', 'DiCaprio', '1974-11-11', 'm', NULL, 'USA'),
(21, 'Emily', 'Mortimer', '1971-12-01', 'f', NULL, 'UK'),
(22, 'Mark', 'Ruffalo', '1967-11-22', 'm', NULL, 'USA'),
(23, 'Martin', 'Brest', '1951-08-08', 'm', NULL, 'USA');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `directs`
--

CREATE TABLE `directs` (
  `dfid` int(11) NOT NULL,
  `daid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `directs`
--

INSERT INTO `directs` (`dfid`, `daid`) VALUES
(1, 17),
(2, 19),
(3, 18),
(4, 13),
(5, 16),
(6, 23);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `episode`
--

CREATE TABLE `episode` (
  `eid` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `duration` int(5) DEFAULT NULL,
  `season` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `episode`
--

INSERT INTO `episode` (`eid`, `name`, `number`, `duration`, `season`) VALUES
(1, 'Days Gone Bye ', 1, 67, 1),
(2, 'Guts', 2, 45, 1),
(3, 'Tell It to the Frogs', 3, 44, 1),
(4, 'Pretty Much Dead Already', 7, 43, 2),
(5, 'Judge, Jury, Executioner', 11, 43, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `e_location`
--

CREATE TABLE `e_location` (
  `leid` int(11) NOT NULL,
  `lang` double NOT NULL,
  `long` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `film`
--

CREATE TABLE `film` (
  `fid` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `duration` int(5) DEFAULT NULL,
  `oscar` int(2) UNSIGNED ZEROFILL DEFAULT NULL,
  `rdate` date DEFAULT NULL,
  `estbudget` int(11) DEFAULT NULL,
  `m_or_s` bit(1) DEFAULT NULL,
  `seasons` int(2) DEFAULT NULL,
  `channel` varchar(45) DEFAULT NULL,
  `ended` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `film`
--

INSERT INTO `film` (`fid`, `name`, `duration`, `oscar`, `rdate`, `estbudget`, `m_or_s`, `seasons`, `channel`, `ended`) VALUES
(1, 'Vicky Cristina Barcelona', 96, 01, '2008-10-09', 15000000, b'0', NULL, NULL, NULL),
(2, 'Scarface', 170, NULL, '1984-03-23', 25000000, b'0', NULL, NULL, NULL),
(3, 'Shutter Island', 138, NULL, '2010-02-19', 80000000, b'0', NULL, NULL, NULL),
(4, 'Rambo', 92, NULL, '2008-01-25', 50000000, b'0', NULL, NULL, NULL),
(5, 'The Walking Dead', NULL, NULL, '2010-10-31', NULL, b'1', 4, 'AMC ', b'1'),
(6, 'Scent of a Woman', 157, 01, '1992-12-23', 31000000, b'0', NULL, NULL, NULL),
(402, 'To Rome with Love', 112, 00, '2012-09-06', 17000000, b'0', NULL, NULL, NULL),
(403, 'test', NULL, NULL, '2017-11-27', NULL, b'1', 9, 'amc', b'0');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `f_location`
--

CREATE TABLE `f_location` (
  `lfid` int(11) NOT NULL,
  `lang` double NOT NULL,
  `long` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `f_location`
--

INSERT INTO `f_location` (`lfid`, `lang`, `long`) VALUES
(1, 41.389173, 2.163448),
(2, -14.732386, -62.669449),
(2, 25.798037, -80.227028),
(2, 40.727486, -74.004014),
(3, 42.33723, -70.901062),
(4, 19.326695, 97.96762),
(5, 33.742613, -84.442635),
(6, 40.364335, -74.361391),
(402, 41.84563808037002, 12.531738504767418),
(403, 15.12752030003604, 9.257805347442627);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `gerne`
--

CREATE TABLE `gerne` (
  `gfid` int(11) NOT NULL,
  `gerne` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `gerne`
--

INSERT INTO `gerne` (`gfid`, `gerne`) VALUES
(1, 'drama'),
(1, 'romance'),
(2, 'crime'),
(2, 'drama'),
(3, 'drama'),
(3, 'mystery'),
(3, 'thriller'),
(4, 'action'),
(4, 'thriller'),
(4, 'war'),
(5, 'drama'),
(5, 'horror'),
(5, 'thriller'),
(6, 'drama'),
(402, 'comedy'),
(402, 'romance'),
(403, 'comedy');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `have`
--

CREATE TABLE `have` (
  `hfid` int(11) NOT NULL,
  `haid` int(11) NOT NULL DEFAULT '0',
  `heid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `have`
--

INSERT INTO `have` (`hfid`, `haid`, `heid`) VALUES
(5, 9, 1),
(5, 9, 2),
(5, 9, 3),
(5, 9, 4),
(5, 9, 5),
(5, 10, 1),
(5, 10, 2),
(5, 10, 3),
(5, 10, 4),
(5, 10, 5),
(5, 11, 1),
(5, 11, 2),
(5, 11, 3),
(5, 11, 4),
(5, 11, 5),
(5, 12, 1),
(5, 12, 2),
(5, 12, 3),
(5, 12, 4),
(5, 12, 5);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `review`
--

CREATE TABLE `review` (
  `rid` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL,
  `comment` longtext,
  `rate` varchar(45) DEFAULT NULL,
  `reid` int(11) DEFAULT NULL,
  `rfid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `review`
--

INSERT INTO `review` (`rid`, `title`, `user`, `comment`, `rate`, `reid`, `rfid`) VALUES
(1, 'H xeiroterh tainia pou exw dei', 'Bichter13', 'kamia sxesh me tis palies tou woody', '4', NULL, 1),
(4, 'kalh', 'guest', 'Ti na pw', '4', NULL, 1),
(5, 'kako', 'guest', 'kakos', '1', NULL, 1),
(30, 'best', 'guest', 'polu kalo', '5', NULL, 1),
(31, 'Nice', 'c', 'Nice', '5', NULL, 5);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `acts`
--
ALTER TABLE `acts`
  ADD PRIMARY KEY (`afid`,`aaid`),
  ADD KEY `aaid_idx` (`aaid`);

--
-- Ευρετήρια για πίνακα `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `b` (`surname`);

--
-- Ευρετήρια για πίνακα `directs`
--
ALTER TABLE `directs`
  ADD PRIMARY KEY (`dfid`,`daid`),
  ADD KEY `daid_idx` (`daid`);

--
-- Ευρετήρια για πίνακα `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`eid`);

--
-- Ευρετήρια για πίνακα `e_location`
--
ALTER TABLE `e_location`
  ADD PRIMARY KEY (`leid`,`lang`,`long`);

--
-- Ευρετήρια για πίνακα `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `a` (`name`);

--
-- Ευρετήρια για πίνακα `f_location`
--
ALTER TABLE `f_location`
  ADD PRIMARY KEY (`lfid`,`lang`,`long`);

--
-- Ευρετήρια για πίνακα `gerne`
--
ALTER TABLE `gerne`
  ADD PRIMARY KEY (`gfid`,`gerne`);

--
-- Ευρετήρια για πίνακα `have`
--
ALTER TABLE `have`
  ADD PRIMARY KEY (`hfid`,`haid`,`heid`),
  ADD KEY `haid_idx` (`haid`),
  ADD KEY `heid_idx` (`heid`);

--
-- Ευρετήρια για πίνακα `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `rfid_idx` (`rfid`),
  ADD KEY `reid_idx` (`reid`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `artist`
--
ALTER TABLE `artist`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT για πίνακα `episode`
--
ALTER TABLE `episode`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT για πίνακα `film`
--
ALTER TABLE `film`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;
--
-- AUTO_INCREMENT για πίνακα `review`
--
ALTER TABLE `review`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `acts`
--
ALTER TABLE `acts`
  ADD CONSTRAINT `aaid` FOREIGN KEY (`aaid`) REFERENCES `artist` (`aid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `afid` FOREIGN KEY (`afid`) REFERENCES `film` (`fid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `directs`
--
ALTER TABLE `directs`
  ADD CONSTRAINT `daid` FOREIGN KEY (`daid`) REFERENCES `artist` (`aid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dfid` FOREIGN KEY (`dfid`) REFERENCES `film` (`fid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `e_location`
--
ALTER TABLE `e_location`
  ADD CONSTRAINT `leid` FOREIGN KEY (`leid`) REFERENCES `episode` (`eid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `f_location`
--
ALTER TABLE `f_location`
  ADD CONSTRAINT `lfid` FOREIGN KEY (`lfid`) REFERENCES `film` (`fid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `gerne`
--
ALTER TABLE `gerne`
  ADD CONSTRAINT `gfid` FOREIGN KEY (`gfid`) REFERENCES `film` (`fid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `have`
--
ALTER TABLE `have`
  ADD CONSTRAINT `haid` FOREIGN KEY (`haid`) REFERENCES `artist` (`aid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `heid` FOREIGN KEY (`heid`) REFERENCES `episode` (`eid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hfid` FOREIGN KEY (`hfid`) REFERENCES `film` (`fid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `reid` FOREIGN KEY (`reid`) REFERENCES `episode` (`eid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rfid` FOREIGN KEY (`rfid`) REFERENCES `film` (`fid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
