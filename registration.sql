-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 06, 2019 la 07:01 PM
-- Versiune server: 10.1.36-MariaDB
-- Versiune PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `registration`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `imageID` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `dataComm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `comments`
--

INSERT INTO `comments` (`commentID`, `imageID`, `comment`, `userID`, `dataComm`) VALUES
(3, 8, '---------------', 2, '2018-12-19 21:24:36'),
(27, 8, 'Test', 1, '2018-12-19 21:24:36'),
(28, 8, 'test nou', 1, '2018-12-19 21:24:36'),
(31, 6, 'Al doilea comentariu aici', 1, '2018-12-19 21:24:36'),
(33, 8, 'com nou aici', 2, '2018-12-19 21:24:36'),
(34, 17, 'a ...', 4, '2018-12-19 21:24:36'),
(35, 16, '<3 com test', 5, '2018-12-19 21:24:36'),
(38, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 2, '2018-12-19 21:24:36'),
(39, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 2, '2018-12-19 21:24:36'),
(40, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 2, '2018-12-19 21:24:36'),
(41, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 2, '2018-12-19 21:24:36'),
(42, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 2, '2018-12-19 21:24:36'),
(43, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 2, '2018-12-19 21:24:36'),
(44, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 2, '2018-12-19 21:24:36'),
(45, 6, 'Com 1', 1, '2018-12-19 21:24:36'),
(46, 5, '#coool\r\n', 1, '2018-12-19 21:39:16'),
(47, 5, '#yep. la 9-50', 1, '2018-12-19 21:50:14'),
(48, 5, 'Misto', 1, '2018-12-19 21:59:36'),
(49, 19, '#$$$$', 1, '2018-12-19 22:14:42'),
(50, 42, 'Primul comentariu', 1, '2018-12-19 22:17:42');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `images`
--

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_text` text NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `images`
--

INSERT INTO `images` (`imageID`, `image`, `image_text`, `data`, `userID`, `likes`) VALUES
(5, '1027_2018_11_18_08_03_35.png', '.....', '2018-12-16 00:00:00', 1, 2),
(6, '1027_2018_11_18_12_20_40.png', 'A 2a tinuta\r\n', '2018-12-17 00:00:00', 1, 3),
(8, 'accessories-297-c44.png', 'Poza 1 - Upload de Ana', '2018-12-07 00:00:00', 1, 3),
(16, '1027_2018_11_22_20_42_39.png', '', '2018-12-16 00:00:00', 3, 1),
(17, '1027_2018_11_24_16_14_32.png', '', '2018-12-04 10:00:00', 4, 1),
(19, '1027_2018_12_02_08_48_56.png', '...', '2018-12-13 02:15:13', 5, 1),
(21, '1027_2018_12_11_09_10_07.png', 'Yap', '2018-12-09 08:20:00', 2, 1),
(34, '1027_2018_11_19_16_53_35.png', '#cool', '2018-12-19 04:00:00', 2, 1),
(36, '2h4ghz9.jpg', '', '2018-12-18 00:00:00', 2, 0),
(38, '160pf2d.jpg', '', '2018-12-19 20:00:00', 3, 0),
(39, '108-1.jpg', '', '2018-12-19 06:33:30', 3, 0),
(41, '33v0npc.jpg', '', '2018-12-17 18:00:00', 4, 2),
(42, 'xqjotu.png', '', '2018-12-19 10:00:00', 5, 2),
(50, 'alpha-beta-phi.PNG', '#fg', '2018-12-26 14:31:20', 1, 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `likes`
--

CREATE TABLE `likes` (
  `likeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `imageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `likes`
--

INSERT INTO `likes` (`likeID`, `userID`, `imageID`) VALUES
(11, 2, 8),
(12, 2, 6),
(13, 1, 8),
(17, 5, 19),
(21, 1, 6),
(22, 2, 5),
(24, 2, 34),
(25, 3, 17),
(26, 4, 6),
(27, 4, 19),
(28, 4, 41),
(29, 5, 8),
(30, 5, 16),
(31, 5, 41),
(32, 1, 42),
(33, 1, 21),
(34, 1, 5),
(52, 1, 42);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'test', 'test@hosttest.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Ana', 'ana_1@test.com', 'b33e0dcc9e2d7a1649d96831260b5698'),
(3, 'Daniela', 'daniela@yahoo.com', '8420039bf8a2fbae97c300e3eb5a4f87'),
(4, 'diana', 'diana@di.com', '05cdda618b4515defb3c193afcda8f58'),
(5, 'laura', 'lau_10@d', '819fad732d166e627559fa7443ac20ad');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `imageID` (`imageID`),
  ADD KEY `userID` (`userID`);

--
-- Indexuri pentru tabele `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`),
  ADD UNIQUE KEY `image` (`image`),
  ADD KEY `userID` (`userID`);

--
-- Indexuri pentru tabele `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`),
  ADD KEY `imageID` (`imageID`),
  ADD KEY `userID` (`userID`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pentru tabele `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pentru tabele `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`imageID`) REFERENCES `images` (`imageID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constrângeri pentru tabele `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constrângeri pentru tabele `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`imageID`) REFERENCES `images` (`imageID`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
