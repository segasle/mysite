-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 09 2019 г., 21:10
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.6.40

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `data`, `name`, `email`) VALUES
(1, 'Сергей хороший специалист, справляется со всеми моими пожеланиями, понимает с полуслова, очень приятно работать с такими людьми! Профессионал своего дела', '2019-05-31 18:58:38', 'Ваня', 'Jayteeedition@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `descriptions_products`
--

CREATE TABLE IF NOT EXISTS `descriptions_products` (
  `id_descriptions` int(11) NOT NULL AUTO_INCREMENT,
  `id_id_products` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_descriptions`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `descriptions_products`
--

INSERT INTO `descriptions_products` (`id_descriptions`, `id_id_products`, `description`) VALUES
(1, 1, 'Меню'),
(2, 2, 'Натяжка на cms'),
(3, 2, 'Адаптивная вёрстка '),
(4, 3, 'Натяжка на cms'),
(5, 3, 'Анимация'),
(6, 3, 'Адаптивная верстка '),
(7, 3, 'Сложная верстка'),
(8, 2, 'Форма обратной связи'),
(9, 1, 'Простая верстка');

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
) ENGINE=InnoDB AUTO_INCREMENT=327 DEFAULT CHARSET=utf8;

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
  `keywords_meta` varchar(100) NOT NULL,
  `description_meta` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `meta_title`
--

INSERT INTO `meta_title` (`id`, `title_meta`, `url_meta`, `keywords_meta`, `description_meta`) VALUES
(1, 'Главная страница о Сергее Слепенкова', '?page=main', 'Сергей Слепенков, back-end разработчик, верстальщик, web-программист, web-дизайнер, программист', ''),
(2, 'Навыки', '?page=experience', 'Навыки, умение', ''),
(3, 'Проекты', '?page=project', 'Стаж, опыт, Проекты', ''),
(4, 'Контакты', '?page=contacts', 'Контакты Сергея Слепенкова, Контакты верстальщика, Контакты программиста , контакты разработчика', ''),
(5, 'Работы по графическому дизайну', '?page=design', 'Графический дизайн', ''),
(6, 'Отзывы', '?page=comments', 'Отзывы Сергея Слепенкова', ''),
(7, 'Главная страница о Сергее Слепенкова', NULL, '', ''),
(8, 'Заказ сайтов', '?page=products', 'Закать сайт, доработать сайт', '');

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
(1, 'Эконом', 1500),
(2, 'Стандарт', 7000),
(3, 'Бизнес', 10000);

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
  `surname` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `surname`, `token`, `id_users`, `password`) VALUES
(1, 'segasle@gmail.com', 'Сергей', 'Слепенков', 'db195ad4e3863e7b933c703162470e74a00e2db934f13cf82e56474dfd7fb26582ebfeb0d161255d8e155', 176938709, '$2y$10$f.hpZFuEPFIxZD6u1Sy7fOv.lLUGuKijL9J7Q86CNvIGZ0anhDwai'),
(2, 'Dendmisle@gmail.com', 'Даниил', 'Слепенков', '45c27e39664494cdbdc3adaa29d77ab17ac8ed0f5527cf234a23724102c150df8fb931d2701abffcefc5b', 514298316, NULL),
(3, 'Jayteeedition@gmail.com', 'Ваня', 'Трифонов', '3173482c8f830fbbab09646af401e2240820f34df76d889507f4059c959a777a3cbb4c656bd6fd90e5f0e', 42104989, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
