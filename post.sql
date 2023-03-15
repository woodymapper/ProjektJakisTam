-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Mar 2023, 15:47
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bazacms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `TimeStamp` datetime NOT NULL,
  `FileName` varchar(96) NOT NULL,
  `MemeTitle` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `post`
--

INSERT INTO `post` (`ID`, `TimeStamp`, `FileName`, `MemeTitle`) VALUES
(7, '2023-03-15 15:07:33', 'img/c2ffd9e3360a59aff83eb6d5c62e8135e6d15b9e64abfae1588746a403f9b526.webp', ''),
(8, '2023-03-15 15:08:26', 'img/3d5682b86dfd65f255be1449e330208d14e1f5b05b12d8b13e9948b1519c0331.webp', ''),
(9, '2023-03-15 15:09:03', 'img/ced6f875a6c3d3bc65b5ef716b988dfa41248905dce75c6caaf4a5c62cafd166.webp', ''),
(10, '2023-03-15 15:12:05', 'img/7dddeb1685e5d24a8bab913c48cd506cad176c5b657426b68a75092aa448b715.webp', '1'),
(11, '2023-03-15 15:18:17', 'img/069d459bdac6eb06f7dc0d19245fdc0581435763f566804e716df82f47e98cf9.webp', '1'),
(12, '2023-03-15 15:44:46', 'img/f1bac938496e4d5399c9cc8cc42497301ded8bfa7cbea42c2f28e145350796fe.webp', 'Podaj Tytul mem'),
(13, '2023-03-15 15:45:37', 'img/1e667a22ce79d40fa3aa49a793a286bc00e0e2488bf00565b0bf351e2272df07.webp', 'chuj');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
