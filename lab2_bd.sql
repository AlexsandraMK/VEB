-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 03 2021 г., 14:42
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lab2_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `my_bd`
--

CREATE TABLE `my_bd` (
  `id` int(11) NOT NULL,
  `date_new` datetime NOT NULL,
  `title` text NOT NULL,
  `anons` text NOT NULL,
  `text_new` text NOT NULL,
  `pict` text NOT NULL,
  `pict_1` text NOT NULL,
  `pict_2` text NOT NULL,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users_bd`
--

CREATE TABLE `users_bd` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_bd`
--

INSERT INTO `users_bd` (`id`, `login`, `password`) VALUES
(1, 'Sasha', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `my_bd`
--
ALTER TABLE `my_bd`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_bd`
--
ALTER TABLE `users_bd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `my_bd`
--
ALTER TABLE `my_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users_bd`
--
ALTER TABLE `users_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
