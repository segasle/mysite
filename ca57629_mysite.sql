-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 13 2019 г., 20:34
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
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `url`) VALUES
(1, 'Главная', '?page=main'),
(2, 'Навыки', '?page=experience'),
(3, 'Проекты', '?page=project'),
(4, 'Отзывы', '?page=comments'),
(5, 'Графический дизайн', '?page=design'),
(6, 'Контакты', '?page=contacts'),
(8, 'Заказать сайт', '?page=products'),
(9, 'Грамоты', '?page=charters');

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
-- Структура таблицы `meta_title`
--

CREATE TABLE IF NOT EXISTS `meta_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_meta` varchar(90) NOT NULL,
  `url_meta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `meta_title`
--

INSERT INTO `meta_title` (`id`, `title_meta`, `url_meta`) VALUES
(1, 'Главная страница о Сергее Слепенкова', '?page=main'),
(2, 'Навыки', '?page=experience'),
(3, 'Проекты', '?page=project'),
(4, 'Контакты', '?page=contacts'),
(5, 'Работы по графическому дизайну', '?page=design'),
(6, 'Отзывы', '?page=comments'),
(7, 'Главная страница о Сергее Слепенкова', NULL),
(8, 'Заказ сайтов', '?page=products');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `sms` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id_products` int(11) NOT NULL AUTO_INCREMENT,
  `name_products` varchar(50) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id_products`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_products`, `name_products`, `price`) VALUES
(1, 'Сайт визитка', 1500),
(2, 'Интернет кафе', 7000),
(3, 'Интернет магазин', 10000);

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
(1, 'segasle@gmail.com', 'Сергей', 'Слепенков', 'e4401f122e6c0e10d72f40bf6a6215b532d63f6fd14295f4bd2ec163514efb5815b5ccf2f2d3c1155fe9b', 176938709),
(2, 'Dendmisle@gmail.com', 'Даниил', 'Слепенков', '45c27e39664494cdbdc3adaa29d77ab17ac8ed0f5527cf234a23724102c150df8fb931d2701abffcefc5b', 514298316);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
