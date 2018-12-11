-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Дек 11 2018 г., 16:31
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `MySitr`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `topic`, `text`) VALUES
(1, 's', 'segasle@gmail.com', 'ghdfg', 'ggfdsdfdas'),
(2, 's', 'segasle@gmail.com', 'ghdfg', 'ggfdsdfdas'),
(0, 'Сер', 'segasle@gmail.com', 'AQW', 'WSSDFGHGHJHGR'),
(0, 'Сер', 'segasle@gmail.com', 'AQW', 'WSSDFGHGHJHGR');

-- --------------------------------------------------------

--
-- Структура таблицы `maps_blog`
--

CREATE TABLE `maps_blog` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '?page=',
  `header` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(255) NOT NULL DEFAULT 'img/author.jpg',
  `fio` varchar(255) NOT NULL DEFAULT 'Сергей Слепенков'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `maps_blog`
--

INSERT INTO `maps_blog` (`id`, `img`, `url`, `header`, `title`, `data`, `author`, `fio`) VALUES
(1, 'https://www.iphones.ru/wp-content/uploads/2016/07/itunes-wallpaper-by-ianpk.jpg', '?page=4-12-2018', 'Как установить iTunes ', 'apple', '2018-12-06 13:40:09', 'img/author.jpg', 'Сергей Слепенков');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `patent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `url`, `patent`) VALUES
(1, 'Главная', '?page=main', '0'),
(2, 'Навыки', '?page=experience', '0'),
(3, 'Проекты', '?page=project', '0'),
(4, 'Блог', '?page=blog', '0'),
(5, 'Контакты', '?page=contacts', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `link`, `title`, `img`, `data`) VALUES
(1, 'http://kafe-lyi.ru', 'Кафе ЛУИ', 'img/IMG.png', '2018-10-19'),
(2, 'http://psiholog-szsrcn.ru', 'Психолог', 'http://psiholog-szsrcn.ru/photo/IMG_1403.png', '2016-04-08');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `maps_blog`
--
ALTER TABLE `maps_blog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `maps_blog`
--
ALTER TABLE `maps_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
