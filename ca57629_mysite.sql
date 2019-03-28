-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 28 2019 г., 17:00
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ca57629_mysite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `text` text NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `url`) VALUES
(1, 'Главная', '?page=main'),
(2, 'Навыки', '?page=experience'),
(3, 'Проекты', '?page=project'),
(4, 'Отзывы', '?page=comments'),
(5, 'Работы по графическому дизайну', '?page=design'),
(6, 'Контакты', '?page=contacts');

-- --------------------------------------------------------

--
-- Структура таблицы `meta_contact`
--

CREATE TABLE IF NOT EXISTS `meta_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `birthday` date NOT NULL,
  `fio` varchar(255) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `meta_contact`
--

INSERT INTO `meta_contact` (`id`, `birthday`, `fio`, `email`) VALUES
(1, '1998-10-21', ' Слепенков Сергей Дмитриевич', 'segasle@yandex.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `link`, `title`, `img`, `data`) VALUES
(1, 'http://kafe-lyi.ru', 'Кафе ЛУИ', 'img/IMG.png', '2018-10-19'),
(2, 'http://psiholog-szsrcn.ru', 'Психолог', 'http://psiholog-szsrcn.ru/photo/IMG_1403.png', '2016-04-08'),
(3, 'http://sovietunionrus.ru/', 'Герой Советского Союза', 'http://sovietunionrus.ru/photo/main.jpg', '2019-01-08'),
(4, 'https://kostrovoinfo.ru', 'Сверхвидящее Кострово', 'https://pp.userapi.com/1EDPqTOf9VEHBXyFD-WOBo2IU8OS4Wi8sCYvfA/xmvGONM-XxQ.jpg', '2019-02-20');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `surname`, `token`, `id_users`) VALUES
(1, 'segasle@gmail.com', 'Сергей', 'Слепенков', '2ddf8d8a701007ff5f6209cadc38c109664542f79f1b1d99b4e6267032ebf7ce10a561292fe5fd12ccda9', 176938709),
(2, 'Dendmisle@gmail.com', 'Даниил', 'Слепенков', '8b85f1649182b96feef64bec2dca5a3dd52ff68759f1855063c7d0530421bf8c65fa5d3923e3f321a1ad6', 514298316);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
