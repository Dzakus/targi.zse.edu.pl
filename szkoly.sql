-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 08 Mar 2014, 22:13
-- Wersja serwera: 5.5.32
-- Wersja PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `targi`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `szkoly`
--

DROP TABLE IF EXISTS `szkoly`;
CREATE TABLE IF NOT EXISTS `szkoly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `telefon` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `html` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `szkoly`
--

INSERT INTO `szkoly` (`id`, `nazwa`, `adres`, `telefon`, `mail`, `html`, `link`, `views`) VALUES
(16, 'I LICEUM OGÓLNOKSZTAŁCĄCE im. Walentego Roździeńskiego w Zespole Szkół Ogólnokształcących Nr 1 ', 'Staszica 62 41-200 Sosnowiec', 'Staszica 62 41-', 'lo1@sosnowiec.edu.pl', '1lo.htm', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
