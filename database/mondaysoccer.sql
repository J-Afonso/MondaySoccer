-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2019 at 06:19 PM
-- Server version: 5.6.45
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baboon_mondaysoccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(45) NOT NULL,
  `display` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`, `display`) VALUES
(1, 'roimatola@gmail.com', 'Joao Afonso'),
(7, 'fredericobggoncalves@gmail.com', ' '),
(99, 'francisco.freire@montepio.pt', ''),
(42, 'angelomdelgado@gmail.com', ''),
(11, 'djpolivveira@gmail.com', ' '),
(12, ' jaleal@gmail.com', ' '),
(13, 'hugo_tavares81@hotmail.com', ' '),
(15, ' tiagofmo@sapo.pt', ' '),
(16, 'bruno_jarbas@hotmail.com', ' '),
(17, ' telmo.agostinho@gmail.com', ' '),
(18, 'bbggoncalves@gmail.com', ' '),
(19, 'hugocosta.mail@gmail.com', ' '),
(21, ' jonga31988@yahoo.com', ' '),
(22, 'helder_frn@hotmail.com', ' '),
(23, ' rncsousa@gmail.com', ' '),
(24, ' miguelcardosobmw@hotmail.com', ' '),
(93, 'pjsena76@hotmail.com', 'Paulo Sena'),
(91, 'hvarandas@gmail.com', ''),
(31, 'dcarnide@gmail.com', ' '),
(34, 'esotericaarte@mail.telepac.pt', ' '),
(73, 'snoopdoggy@gmail.com', 'Fernando'),
(38, ' PGCunha@montepio.pt', ' '),
(71, 'rjlima.88@gmail.com', 'Ricardo Lima'),
(97, 'AJFernandes@montepio.pt', ''),
(78, 'bruno.marques88@gmail.com', ''),
(47, 'bruno.m.b.simoes@gmail.com', 'bruno simoes'),
(2, 'hugo_msg@hotmail.com', 'Hugo'),
(49, 'antonioarcosta@gmail.com', 'António Costa'),
(52, 'tiagormorais@yahoo.com', 'Tiago Morais'),
(66, 'joaombtsantos@gmail.com', ''),
(98, 'dasajo@gmail.com', ''),
(56, 'bmsribeiro@hotmail.com', 'Ribeiro'),
(60, 'bruno.pinho@colegiodestomas.com', 'Bruno Pinho'),
(77, ' pmalmeida@montepio.pt', 'Paulo Almeida'),
(79, 'luis.amaral@coriant.com', 'Luis Amaral'),
(76, 'bruno_candeias_5_@hotmail.com', 'Bruno Candeias'),
(75, 'pedrosercio@gmail.com', 'Pedrito'),
(64, 'pinheiro.helder13@gmail.com', 'Helder'),
(65, 'oscarleal.network@gmail.com', 'Oscar'),
(85, 'Gmalcata@hotmail.com', ''),
(86, 'valentino_ag2@hotmail.com', ''),
(87, 'jcunharainho@gmail.com', ''),
(88, 'lasilva@montepio.pt', ''),
(89, 'Cportalegre2@hotmail.com', 'Carlos Martins'),
(92, 'Filipe.barata@gmail.com', 'Filipe Barata'),
(94, 'Luisfffrois1984@gmail.com', 'Luís frois'),
(95, 'fmquendera@gmail.com', 'Quendera'),
(96, 'david.francisco@yahoo.fr', 'David Francisco');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `messageId` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `messageId`) VALUES
(975, '<1ab8e7ee09078829c29192e0e736b5f8@www.bab-oon');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(10) UNSIGNED NOT NULL,
  `player` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `player`, `timestamp`) VALUES
(6405, 'The Telmo', '2019-08-22 13:01:15'),
(6406, 'Bernardo', '2019-08-22 13:03:37'),
(6420, 'JoÃ£o Pinto ', '2019-08-26 14:20:04'),
(6408, 'Carnydhe', '2019-08-22 13:08:12'),
(6409, 'Pedro Cunha', '2019-08-22 13:26:14'),
(6410, 'Sena', '2019-08-22 13:29:45'),
(6411, 'Mike', '2019-08-22 13:30:42'),
(6421, 'Paulo Almeida', '2019-08-26 15:41:43'),
(6414, 'Helder Marega Pinheiro', '2019-08-22 18:06:27'),
(6415, 'Tiago', '2019-08-22 18:44:05'),
(6416, 'Francisco Freire', '2019-08-23 07:37:57'),
(6417, 'Daniel Jorge', '2019-08-23 08:01:48'),
(6418, 'Henrique', '2019-08-25 00:46:45'),
(6419, 'JoÃ£o Afonso', '2019-08-25 22:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject`) VALUES
(432, 'Convocatoria 26 de Agosto');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `profile` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `profile`) VALUES
(16, 'player', '82e768192f01e1585d44b6af02d6b4a4', 'user'),
(17, 'admin', 'de920bd0e514da8a83342e38ed92bb8e', 'admin'),
(19, 'sida', 'ea9fea22f600db72fce3be3111b6b310', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=976;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6422;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
