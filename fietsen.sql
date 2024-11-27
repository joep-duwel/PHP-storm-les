-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 nov 2024 om 10:25
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fietsen`
--
CREATE DATABASE IF NOT EXISTS `fietsen` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fietsen`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fiets`
--

CREATE TABLE `fiets` (
  `id` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `prijs` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `fiets`
--

INSERT INTO `fiets` (`id`, `merk`, `type`, `prijs`) VALUES
(1, 'Batavus', 'Blockbuter', 699),
(2, 'Batavus', 'Flying D ', 799),
(3, 'Gazelle', 'Chamonix', 1049),
(4, 'Gazelle', 'Eclipse', 799),
(5, 'Gazelle', 'Giro', 899),
(6, 'Gaint', 'Competition', 999),
(7, 'Gaint', 'Expedition At', 1299),
(10, 'corona', 'a 12', 799);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `fiets`
--
ALTER TABLE `fiets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `fiets`
--
ALTER TABLE `fiets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
