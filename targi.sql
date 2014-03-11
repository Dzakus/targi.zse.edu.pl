-- phpMyAdmin SQL Dump
-- version 4.1.1
-- http://www.phpmyadmin.net
--
-- Host: 1282.m.tld.pl
-- Generation Time: 11 Mar 2014, 13:23
-- Server version: 5.5.31-55-log
-- PHP Version: 5.4.14-0+tld1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `baza1282_2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `sa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=62 ;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`id`, `mail`, `pass`, `sa`) VALUES
(1, 'kprosciewicz@gmail.com', '1c9cc7e88f0661de83382c35e8305a7177fa6219', 1),
(2, 'adrian.cieniuch@gmail.com', 'e42b31d4bb2a1c6edfbb65cd6e6c60f8065493d8', 1),
(8, 'brak@adresu.pl', 'f96cc07c8ce9387e6e534200010d601112694f37', 0),
(9, 'lo1@sosnowiec.edu.pl', '37d7d05bff5705ae0229db2e3631015ae4c29c52', 0),
(10, 'loplater@wp.pl', 'e2e2b8bf2ad09a19c47fc5ccedc45502329f2a13', 0),
(11, 'lo3@sosnowiec.edu.pl', '977a499a263e010b42be016383ff8210d7ec8e79', 0),
(12, 'lo4@sosnowiec.edu.pl', 'b43edfa728e8cd9ccb0566b30e28a9122c4a3de8', 0),
(13, 'lo4@sosnowiec.edu.pl', '6a4e7344c47252166f3e3f7af7ec145909146b38', 0),
(14, 'lo5@sosnowiec.edu.pl', 'f1e6c14aee51dd54393d15ea0462c2a0f760e245', 0),
(15, 'lo6@korczak.edu.pl', '4ec04331323d74b502d3e504580739e1e4c39538', 0),
(16, 'lo7@sosnowiec.edu.pl', 'bddac247edb065d33c404fa5ad068ae2004e6554', 0),
(17, 'zstl@sosnowiec.edu.pl', '3445cc575a5c6ecaac665e40c07dd978ca1a2366', 0),
(18, 'zsz1@sosnowiec.edu.pl', 'f6b07306bc87b18222f156e61afe51ffa7e0e5b7', 0),
(19, 'sekretariat@zse.edu.pl', 'f010ba96e6049ac4d19a76e88244281b8e63ec49', 0),
(20, 'zsz9@sosnowiec.edu.pl', '21014ddf871ef66187ecf84bad9e860c1261cc36', 0),
(21, 'zsz3@sosnowiec.edu.pl', '22e9421823380b135d9b0c9face594a040992aeb', 0),
(22, 'rekrutacja@zsgh.com.pl', 'f03c985a942891b92f70bd26ef1d81d5b3e1e0bb', 0),
(23, 'zsme@sosnowiec.edu.pl', '81d3457e6aa008dcd50dc793f3ee4f1f1e87fb5a', 0),
(24, 'zstl2@sosnowiec.edu.pl', 'bd3d56354c865d09244293e6195590e3e8178cc6', 0),
(25, 'zst@zst.sosnowiec.pl', '6e6d1d9d2a835eeba775833a3882c18ae938a2b0', 0),
(26, 'sekretariat@zsu.edu.pl', '5476b2db0b6202a7e8431cc46f7892228b299f5a', 0),
(27, 'loplater@wp.pl', '4f39cebc1685e40b6c079324a0d8ba3420d9ab5f', 0),
(28, 'loplater@wp.pl', '6b47938ede66d669a31310e8d91a129a74ca0ab4', 0),
(51, 'ania.janek@poczta.fm', 'df600fbab31dc99c4a7b92e413f32abb915be504', 1),
(60, '', 'dbb9e836a60d90d343f66b4d2fde300af035d8c0', 0),
(61, 'asdf@aadasd.pl', '5bdb7ed38f1f6a5f6d3ec137933756acde0463c1', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `centra`
--

DROP TABLE IF EXISTS `centra`;
CREATE TABLE IF NOT EXISTS `centra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `centrum` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `centra`
--

INSERT INTO `centra` (`id`, `centrum`) VALUES
(0, 'Ogólne'),
(1, 'Centrum Kształcenia Zawodowego i Ustawicznego ul.Grota-Roweckiego 64');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `prezentacje`
--

DROP TABLE IF EXISTS `prezentacje`;
CREATE TABLE IF NOT EXISTS `prezentacje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `ftp` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `prezentacje`
--

INSERT INTO `prezentacje` (`id`, `link`, `ftp`) VALUES
(3, 'p/zseii/', 'ZSEiI_2012.ppt');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `szkoly`
--

DROP TABLE IF EXISTS `szkoly`;
CREATE TABLE IF NOT EXISTS `szkoly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `telefon` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `html` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `views` int(11) NOT NULL,
  `id_centrum` int(11) DEFAULT '0',
  `prez_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=24 ;

--
-- Zrzut danych tabeli `szkoly`
--

INSERT INTO `szkoly` (`id`, `nazwa`, `adres`, `telefon`, `mail`, `html`, `link`, `views`, `id_centrum`, `prez_id`) VALUES
(1, 'Doradca zawodowy', 'Sucha 21 Sosnowiec 41-200', '(32) 266-14-71', 'brak@adresu.pl', 'koordynator_list.htm', 'http://www.poradnia.sosnowiec.pl/', 7, 0, 0),
(2, 'I LICEUM OGÓLNOKSZTAŁCĄCE im. Walentego Roździeńskiego w Zespole Szkół Ogólnokształcących nr 1', '41-200 Sosnowiec, ul. Staszica 62', '(32) 266-18-34', 'lo1@sosnowiec.edu.pl', '1lo.htm', 'http://www.rozdzienski.pl', 21, 0, 0),
(3, 'II LICEUM OGÓLNOKSZTAŁCĄCE im. Emilii Plater', '41-200 Sosnowiec, ul. Parkowa 1', '(32) 266-45-35', 'loplater@wp.pl', '2lo.htm', 'http://www.plater.edu.pl/', 16, 0, 0),
(4, 'III LICEUM OGÓLNOKSZTAŁCĄCE im. Bolesława Prusa w Zespole Szkół Ogólnokształcących nr 3', '41-209 Sosnowiec, ul. Józefa Piłsudskiego 114', '(32) 299-89-42', 'lo3@sosnowiec.edu.pl', '3lo.htm', 'http://www.prus.sosnowiec.pl', 12, 0, 0),
(5, 'IV LICEUM OGÓLNOKSZTAŁCĄCE im. Stanisława Staszica w Zespole Szkół Ogólnokształcących nr 15', '41-206 Sosnowiec, ul. Plac W. Zillingera 1', '(32) 291-37-84', 'lo4@sosnowiec.edu.pl', '4lo.htm', 'http://www.staszic.edu.pl', 12, 0, 0),
(7, 'V LICEUM OGÓLNOKSZTAŁCĄCE im. Roberta Schumana w Zespole Szkół Ogólnokształcących nr 7', '41-218 Sosnowiec, ul. Gwiezdna 2', '(32) 263-50-74', 'lo5@sosnowiec.edu.pl', '5lo.htm', 'http://www.lo5.sosnowiec.pl', 12, 0, 0),
(8, 'VI LICEUM OGÓLNOKSZTAŁCĄCE im. Janusza Korczaka w Zespole Szkół Ogólnokształcących nr 2  ', '41-214 Sosnowiec, ul. ul. Czeladzka 58', '(32) 291-57-10', 'lo6@korczak.edu.pl', '6lo.htm', 'http://www.korczak.edu.pl', 8, 0, 0),
(9, 'VII LICEUM OGÓLNOKSZTAŁCACE im. Krzysztofa Kamila Baczyńskiego w Zespole Szkół Ogólnokształcących nr 14', '41-219 Sosnowiec, ul. Kisielewskiego 4 b', '(32) 293-81-39', 'lo7@sosnowiec.edu.pl', '7lo.htm', 'http://www.zso14.edu.pl', 12, 0, 0),
(10, 'VIII Liceum Ogólnokształcące im. C. K. Norwida w Zespole Szkół Technicznych i Licealnych', '41-200 Sosnowiec, ul. Kilińskiego 31', '(32) 266-07-34 ', 'zstl@sosnowiec.edu.pl', 'ckziu25.htm', 'http://www.zstil.sosnowiec.pl', 7, 2, 0),
(11, 'Technikum nr 1 Ekonomiczne', '41-200 Sosnowiec, ul. Grota Roweckiego 66', '(32) 291-39-25', 'zsz1@sosnowiec.edu.pl', '1te.htm', 'http://www.zse.ckziu.com/', 11, 1, 0),
(12, 'Zespół Szkół Elektronicznych i Informatycznych', '41-200 Sosnowiec, ul. Jagiellońska 13', '(32) 292-44-70', 'sekretariat@zse.edu.pl', 'zseii.htm', 'http://zse.edu.pl/', 17, 0, 3),
(13, 'Technikum nr 7 Projektowania i Stylizacji Ubioru, Zasadnicza Szkoła Zawodowa nr 9 Rzemieślniczo - Artystyczna', '41-200 Sosnowiec, Grota Roweckiego 64', '(32) 266-06-82', 'sekretariat@ckziu.com', '7te.htm', 'http://www.szkolamody.ckziu.com', 7, 1, 0),
(14, 'Zespół Szkól Architektoniczno - Budowlanych', '41-219 Sosnowiec, ul. Braci Mieroszewskich 42', '(32) 269-95-50', 'zsz3@sosnowiec.edu.pl', 'zsab.htm', 'http://www.zsab.sosnowiec.pl', 4, 2, 0),
(15, 'Technikum nr 3 Gastronomiczno - Hotelarskie, Zasadnicza Szkoła nr 4 Gastronomiczna', '41-200 Sosnowiec, ul. Wawel 1', '(32) 266-27-01', 'zsgh.sc@gazeta.pl', '3te.htm', 'http://www.zsgh.ckziu.com', 6, 1, 0),
(16, 'Centrum Kształcenia Zawodowego i Ustawicznego Kilińskiego 25', '41-200 Sosnowiec, ul. Kilińskiego 25', '(32) 266-07-34', 'ckziu25@sosnowiec.edu.pl', 'ckziu25.htm', 'http://www.ckziu25.sosnowiec.pl', 11, 0, 0),
(18, 'Zespół Szkół Technicznych', '41-200 Sosnowiec, ul. Legionów 9', '(32) 293-52-52', 'zst@zst.sosnowiec.pl', 'zst.htm', 'http://www.zst.sosnowiec.pl', 4, 2, 0),
(19, 'Zespół Szkół Usługowych', '41-218 Sosnowiec, ul. Hubala-Dobrzańskiego 131', '(32) 294-89-58', 'sekretariat@zsu.edu.pl', 'zsu.htm', 'http://www.zsu.edu.pl', 5, 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
