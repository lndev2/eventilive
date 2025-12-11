-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2025 at 03:33 PM
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
-- Database: `eventilive`
--

-- --------------------------------------------------------

--
-- Table structure for table `artisti`
--

CREATE TABLE `artisti` (
  `id_artista` int(11) NOT NULL,
  `nome_artista` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `esibizioni`
--

CREATE TABLE `esibizioni` (
  `id_artista` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventi`
--

CREATE TABLE `eventi` (
  `id_evento` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `titolo` varchar(20) NOT NULL,
  `città` varchar(20) NOT NULL,
  `luogo` varchar(20) NOT NULL,
  `data_inizio` date NOT NULL,
  `ora` time NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `immagine` varchar(100) DEFAULT NULL,
  `descrizione` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `iscrizioni`
--

CREATE TABLE `iscrizioni` (
  `id_categoria` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_utente` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `commento` varchar(500) DEFAULT NULL,
  `voto` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `id_utente` int(11) NOT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artisti`
--
ALTER TABLE `artisti`
  ADD PRIMARY KEY (`id_artista`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nome` (`nome_categoria`);

--
-- Indexes for table `esibizioni`
--
ALTER TABLE `esibizioni`
  ADD PRIMARY KEY (`id_artista`,`id_evento`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indexes for table `eventi`
--
ALTER TABLE `eventi`
  ADD PRIMARY KEY (`id_evento`),
  ADD UNIQUE KEY `titolo` (`titolo`),
  ADD KEY `id_utente` (`id_utente`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `iscrizioni`
--
ALTER TABLE `iscrizioni`
  ADD PRIMARY KEY (`id_categoria`,`id_utente`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id_utente`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artisti`
--
ALTER TABLE `artisti`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventi`
--
ALTER TABLE `eventi`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `esibizioni`
--
ALTER TABLE `esibizioni`
  ADD CONSTRAINT `esibizioni_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artisti` (`id_artista`),
  ADD CONSTRAINT `esibizioni_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventi` (`id_evento`);

--
-- Constraints for table `eventi`
--
ALTER TABLE `eventi`
  ADD CONSTRAINT `eventi_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id_utente`),
  ADD CONSTRAINT `eventi_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id_categoria`);

--
-- Constraints for table `iscrizioni`
--
ALTER TABLE `iscrizioni`
  ADD CONSTRAINT `iscrizioni_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id_categoria`),
  ADD CONSTRAINT `iscrizioni_ibfk_2` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id_utente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
