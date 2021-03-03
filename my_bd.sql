-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 03 2021 г., 17:41
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

--
-- Дамп данных таблицы `my_bd`
--

INSERT INTO `my_bd` (`id`, `date_new`, `title`, `anons`, `text_new`, `pict`, `pict_1`, `pict_2`, `author`) VALUES
(12, '2021-03-03 21:53:03', 'Польнарефф нашел ДЕВУШКУ?', 'СМИ рассекретили возлюбленную Жан-Пьера Польнареффа. Кто она? Как она покорила сердце льва пустошей?', 'Артемка напишет текст', 'img_id_1/Img_5.png', 'img_id_1/Img_1.png', 'img_id_1/Img_2.png', 'Каральчук Артём');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `my_bd`
--
ALTER TABLE `my_bd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `my_bd`
--
ALTER TABLE `my_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
