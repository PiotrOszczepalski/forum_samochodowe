-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Cze 2023, 20:22
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `user_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post`
--

CREATE TABLE `post` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `post`
--

INSERT INTO `post` (`id`, `name`, `content`, `photo`) VALUES
(4, 'Piotr', 'Zakupiłem ostatnio BMW M4 COMPETITION. Jest świetne!', 'm4g82.jpg'),
(13, 'Admin_Janek', 'Za niedługo zmiana regulaminu. A na zdjęciu mój nowy samochód.', 'm4f82.png'),
(14, 'Admin_Henryk', 'Jutro zmiana regulaminu -> a tu moja Panamera', 'panamera.jpg'),
(16, 'Admin_Gustaw', 'Jutro wszyscy nieaktywni użytkownicy będą usunięci z forum.', 'gklasa.png'),
(17, 'Maciek09', 'Moje nowe Audi :)', 'rs6.png'),
(30, 'Piotr', 'Mój nowy samochód', 'm3f80.jpg'),
(34, 'Janusz3423', 'Zakupiłem ostatnio BMW M3 COMPETITION - 510hp, 3.0 r6', 'm3g80.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Marek', 'marek@o2.pl', '091cbaf8fc9a3d12ce957d6228b3c04c', 'user'),
(3, 'Piotr', 'piotr@o2.pl', '3ad23a007ddf1d4f26249cc1c18562e1', 'user'),
(4, 'Janusz', 'janusz@o2.pl', '368bd3a959b44543a48291f9e4552b34', 'user'),
(6, 'Admin_Janek', 'janek@admin.pl', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(7, 'Admin_Henryk', 'henryk@admin.pl', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(8, 'Admin_Gustaw', 'gustaw@admin.pl', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(14, 'Maciek09', 'maciek@poczta.fm', 'b20ddd773ae9407bc168f3753698fea6', 'user'),
(15, 'Piotr777', 'piotr777@o2.pl', '3ad23a007ddf1d4f26249cc1c18562e1', 'user'),
(16, 'Janusz3423', 'janusz@onet.pl', '368bd3a959b44543a48291f9e4552b34', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `post`
--
ALTER TABLE `post`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
