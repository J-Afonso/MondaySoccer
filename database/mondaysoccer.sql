-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2017 at 05:24 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`, `display`) VALUES
(1, 'roimatola@gmail.com', 'Joao Afonso'),
(7, 'fredericobggoncalves@gmail.com', ' '),
(8, ' jmgp.pereira@gmail.com', ' '),
(9, 'ivomagon@gmail.com', ' '),
(42, 'angelomdelgado@gmail.com', ''),
(11, 'djpolivveira@gmail.com', ' '),
(12, ' jaleal@gmail.com', ' '),
(13, 'hugo_tavares81@hotmail.com', ' '),
(14, ' joaomarian@gmail.com', ' '),
(15, ' tiagofmo@sapo.pt', ' '),
(16, 'bruno_jarbas@hotmail.com', ' '),
(17, ' telmo.agostinho@gmail.com', ' '),
(18, 'bbggoncalves@gmail.com', ' '),
(19, 'hugocosta.mail@gmail.com', ' '),
(84, 'RSFigueiredo@montepio.pt', ''),
(21, ' jonga31988@yahoo.com', ' '),
(22, 'helder_frn@hotmail.com', ' '),
(23, ' rncsousa@gmail.com', ' '),
(24, ' miguelcardosobmw@hotmail.com', ' '),
(83, 'filipe.luz@sdo-consultores.pt', ''),
(74, 'allankirsten@gmail.com', 'Allan'),
(82, 'mazevedocoutinho@gmail.com', ''),
(31, 'dcarnide@gmail.com', ' '),
(34, 'esotericaarte@mail.telepac.pt', ' '),
(73, 'snoopdoggy@gmail.com', 'Fernando'),
(81, 'pf.albuquerque@gmail.com', ''),
(38, ' PGCunha@montepio.pt', ' '),
(71, 'rjlima.88@gmail.com', 'Ricardo Lima'),
(80, 'simoes.jorgem@gmail.com', 'Jorge Simoes'),
(70, 'alcidio71@gmail.com', 'Alcidio'),
(72, 'joaquimereira@gmail.com', ''),
(78, 'bruno.marques88@gmail.com', ''),
(47, 'bruno.m.b.simoes@gmail.com', 'bruno simoes'),
(48, 'joaofelicio@gmail.com', 'joao felicio'),
(49, 'antonioarcosta@gmail.com', 'António Costa'),
(67, 'n.onateac@gmail.com', 'Caetano'),
(51, 'greg@teacherport.com', 'Greg'),
(52, 'tiagormorais@yahoo.com', 'Tiago Morais'),
(66, 'joaombtsantos@gmail.com', ''),
(54, 'rmricardo.moreira@gmail.com', 'Ricado Moreira'),
(56, 'bmsribeiro@hotmail.com', 'Ribeiro'),
(60, 'bruno.pinho@colegiodestomas.com', 'Bruno Pinho'),
(77, ' pmalmeida@montepio.pt', 'Paulo Almeida'),
(79, 'luis.amaral@coriant.com', 'Luis Amaral'),
(76, 'bruno_candeias_5_@hotmail.com', 'Bruno Candeias'),
(75, 'pedrosercio@gmail.com', 'Pedrito'),
(64, 'pinheiro.helder13@gmail.com', 'Helder'),
(65, 'oscarleal.network@gmail.com', 'Oscar'),
(85, 'Gmalcata@hotmail.com', ''),
(86, 'valentino_ag2@hotmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `messageId` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `messageId`) VALUES
(863, '<f91dde5851da43252163fdd378cb19f5@www.bab-oon');

-- --------------------------------------------------------

--
-- Table structure for table `message_thursday`
--

CREATE TABLE `message_thursday` (
  `id` int(255) NOT NULL,
  `messageId` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_thursday`
--

INSERT INTO `message_thursday` (`id`, `messageId`) VALUES
(12, '<3fd1b0589f7fa92864cd1cb9b5504787@www.bab-oon.com>\n');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(10) UNSIGNED NOT NULL,
  `player` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `player`, `timestamp`) VALUES
(4652, 'Ângelo', '2017-06-21 14:19:44'),
(4653, 'Bernardo', '2017-06-21 14:21:29'),
(4654, 'Pedro Cunha', '2017-06-21 14:32:22'),
(4655, 'FRED', '2017-06-21 14:36:00'),
(4656, 'ricardi silva', '2017-06-21 14:46:14'),
(4657, 'Morais', '2017-06-21 15:12:08'),
(4658, 'Carnide ', '2017-06-21 15:13:26'),
(4659, 'Tavares', '2017-06-21 15:32:22'),
(4660, 'Jorge K', '2017-06-21 18:18:20'),
(4661, 'Luis Silva', '2017-06-22 08:42:04'),
(4662, 'Pé de Atleta', '2017-06-22 14:32:39'),
(4663, 'Mike ', '2017-06-22 19:47:15'),
(4664, 'Hugo Costa', '2017-06-23 16:41:38'),
(4665, 'João Tiago', '2017-06-23 17:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `players_thursday`
--

CREATE TABLE `players_thursday` (
  `id` int(10) UNSIGNED NOT NULL,
  `player` varchar(255) NOT NULL,
  `timestamp` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players_thursday`
--

INSERT INTO `players_thursday` (`id`, `player`, `timestamp`) VALUES
(76, 'Ricardo Sousa', 2014),
(77, 'Bernardo', 2014),
(79, 'Miguel', 2014),
(80, 'Tavares', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject`) VALUES
(319, 'Convocatoria para Monday 26th of June 2017');

-- --------------------------------------------------------

--
-- Table structure for table `subject_thursday`
--

CREATE TABLE `subject_thursday` (
  `id` int(11) NOT NULL,
  `subject` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_thursday`
--

INSERT INTO `subject_thursday` (`id`, `subject`) VALUES
(21, 'Convocatoria para Thursday 16th of October 2014');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `profile` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `profile`) VALUES
(16, 'player', '82e768192f01e1585d44b6af02d6b4a4', 'user'),
(17, 'admin', 'de920bd0e514da8a83342e38ed92bb8e', 'admin');

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
-- Indexes for table `message_thursday`
--
ALTER TABLE `message_thursday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players_thursday`
--
ALTER TABLE `players_thursday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_thursday`
--
ALTER TABLE `subject_thursday`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=864;
--
-- AUTO_INCREMENT for table `message_thursday`
--
ALTER TABLE `message_thursday`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4666;
--
-- AUTO_INCREMENT for table `players_thursday`
--
ALTER TABLE `players_thursday`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;
--
-- AUTO_INCREMENT for table `subject_thursday`
--
ALTER TABLE `subject_thursday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
