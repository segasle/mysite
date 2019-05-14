-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Май 14 2019 г., 17:33
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `MySitr`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `descriptions_products`
--

CREATE TABLE `descriptions_products` (
  `id_descriptions` int(11) NOT NULL,
  `id_id_products` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `meta_contact` (
  `id` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `fio` varchar(255) NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `meta_contact`
--

INSERT INTO `meta_contact` (`id`, `birthday`, `fio`, `email`) VALUES
(1, '1998-10-21', ' Слепенков Сергей Дмитриевич', 'segasle@yandex.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `meta_title`
--

CREATE TABLE `meta_title` (
  `id` int(11) NOT NULL,
  `title_meta` varchar(90) NOT NULL,
  `url_meta` varchar(50) DEFAULT NULL,
  `keywords_meta` varchar(100) NOT NULL,
  `description_meta` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `sms` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `name_products` varchar(50) NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(2, 'http://psiholog-szsrcn.ru', 'Психолог', 'http://psiholog-szsrcn.ru/photo/IMG_1403.png', '2016-04-08'),
(3, 'http://sovietunionrus.ru/', 'Герой Советского Союза', 'http://sovietunionrus.ru/photo/main.jpg', '2019-01-08'),
(4, 'https://kostrovoinfo.ru', 'Сверхвидящее Кострово', 'https://pp.userapi.com/1EDPqTOf9VEHBXyFD-WOBo2IU8OS4Wi8sCYvfA/xmvGONM-XxQ.jpg', '2019-02-20');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `surname`, `token`, `id_users`) VALUES
(1, 'segasle@gmail.com', 'Сергей', 'Слепенков', 'e4401f122e6c0e10d72f40bf6a6215b532d63f6fd14295f4bd2ec163514efb5815b5ccf2f2d3c1155fe9b', 176938709),
(2, 'Dendmisle@gmail.com', 'Даниил', 'Слепенков', '45c27e39664494cdbdc3adaa29d77ab17ac8ed0f5527cf234a23724102c150df8fb931d2701abffcefc5b', 514298316);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `descriptions_products`
--
ALTER TABLE `descriptions_products`
  ADD PRIMARY KEY (`id_descriptions`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `meta_contact`
--
ALTER TABLE `meta_contact`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `meta_title`
--
ALTER TABLE `meta_title`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `descriptions_products`
--
ALTER TABLE `descriptions_products`
  MODIFY `id_descriptions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `meta_contact`
--
ALTER TABLE `meta_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `meta_title`
--
ALTER TABLE `meta_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
