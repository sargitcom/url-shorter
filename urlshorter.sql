-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 03 Paź 2019, 12:03
-- Wersja serwera: 10.1.41-MariaDB-0ubuntu0.18.04.1
-- Wersja PHP: 7.2.22-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `urlshorter`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `links`
--

CREATE TABLE `links` (
  `link_id` int(11) NOT NULL,
  `link_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `links`
--

INSERT INTO `links` (`link_id`, `link_text`) VALUES
(1, 'http://google.pl'),
(2, 'http://google.pl'),
(3, 'http://google.pl'),
(4, 'https://wp.pl'),
(5, 'http://wp.pl'),
(6, 'http://wp.pl'),
(7, 'http://wp.pl'),
(8, 'http://wp.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `link_statistics`
--

CREATE TABLE `link_statistics` (
  `link_statistic_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `system` varchar(50) NOT NULL,
  `user_agent` text NOT NULL,
  `region` text,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `link_statistics`
--

INSERT INTO `link_statistics` (`link_statistic_id`, `link_id`, `ip`, `system`, `user_agent`, `region`, `added`) VALUES
(1, 3, '127.0.0.1', 'Linux', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', NULL, '2019-10-03 09:12:48'),
(2, 3, '127.0.0.1', 'Linux', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', NULL, '2019-10-03 09:18:54'),
(3, 4, '127.0.0.1', 'Linux', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', NULL, '2019-10-03 09:35:00'),
(4, 4, '127.0.0.1', 'Linux', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', NULL, '2019-10-03 09:35:11'),
(5, 1, '127.0.0.1', 'Linux', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', NULL, '2019-10-03 09:35:25'),
(6, 1, '127.0.0.1', 'Linux', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', NULL, '2019-10-03 09:58:04'),
(7, 1, '127.0.0.1', 'Linux', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', NULL, '2019-10-03 09:58:08');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`link_id`);

--
-- Indeksy dla tabeli `link_statistics`
--
ALTER TABLE `link_statistics`
  ADD PRIMARY KEY (`link_statistic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `links`
--
ALTER TABLE `links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `link_statistics`
--
ALTER TABLE `link_statistics`
  MODIFY `link_statistic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
