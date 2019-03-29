-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 29 2019 г., 11:55
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `topic`, `text`) VALUES
(1, '.HelenDag.', '.lutsk.name@bigmir.net.', '.Экология в Украине.', '.Здравствуйте, предлагаю ковый сайт об экологии города смотрите  \r\n&lt;a href=https://lutsk.name/ru&gt;Луцьк&lt;/a&gt;.'),
(2, '.Эльмир.', '.mailto:malegirov@bk.ru.', '.Хотите больше клиентов?.', '.Здравствуйте, простите, что доношу информацию таким образом, но вполне возможно, она Вам поможет. \r\nПредлагаем услуги по созданию новых сайтов, а также изменению и оптимизации уже имеющихся (разнообразные правки и прочее). Что в свою очередь при правильном подходе позволит Вам привлекать больше клиентов. \r\nСоотношение цена/качество лучше, чем у других веб-студий. \r\nДля связи: maks_levchenko_96@bk.ru \r\nЕсли Вам удобнее другой способ связи-напишите его на указанную выше почту..'),
(3, '.DavidHoick.', '.kyiv.name@bigmir.net.', '.kyiv.name - сайт об экологии.', '.Интересные новости на тему экологии -&lt;a href=https://kyiv.name/uk&gt;kyiv.name/ru/news&lt;/a&gt;.'),
(4, '.Jerrellamilm.', '.agbzjbat@spacecas.ru.', '.play for real money slots machine.', '.no download casino mac &lt;a href=http://wowcasinoonline.ooo/&gt;virtual console games from sd card&lt;/a&gt; &lt;a href=&quot;http://onlinecasinoside.ooo/&quot;&gt;malaysia best online casino&lt;/a&gt; play online casino games for real cash.'),
(5, '.Victrookykifeo.', '.viktorvareg2003@gmail.com.', '.Реклама в Яндексе.', '.Я рад вас вех видеть форумчане!Реклама в интернете, любой сложности:сайт-визитка, корпоративный, интернет-магазин, лендинг, а также предлагаю сделать рекламные рассылки. &lt;a href=http://lion-reclama.tk/index.php/products-list-view.html&gt;Ссылка...&lt;/a&gt;.'),
(6, '.Belly Dancer sah63.', '.ab.d.a.sh.a.vgr.eg.@gmail.com.', '.[url=http://www.youtube.com/user/YuliannaVoronina/]1 piece belly dance costume[/url].', '.belly dancer, belly dance songs, belly dance tutorial, belly dance kids, belly dance india, belly dance shakira, belly dance tik tok, belly dance drum solo, belly dance on, belly dance anime, belly dance at home, belly dance akon, belly dance arabic music, belly dance abs, belly dance agt, belly dance audition, belly dance asia, belly dance arms, belly dance at wedding, a belly dance song, a belly dancer,selina b belly dance, maya b belly dance reaction, kaur b belly dance, belly dance r&amp;b, belly dance choreography, belly dance cardio, belly dance cringe, belly dance cover, belly dance close up, belly dance cartoon, belly dance costumes, belly dance china \r\n&lt;a href=http://www.youtube.com/watch?v=JdbheaybTIU&gt;how to become a belly dancer&lt;/a&gt; \r\n&lt;a href=http://www.youtube.com/watch?v=JdbheaybTIU&gt;mp3 belly dance drum solo&lt;/a&gt; \r\n&lt;a href=http://www.youtube.com/user/YuliannaVoronina/&gt;3/4 shimmy belly dance&lt;/a&gt; \r\n&lt;a href=http://www.youtube.com/watch?v=JdbheaybTIU&gt;lati k belly dance&lt;/a&gt; \r\nhttp://www.youtube.com/watch?v=-GirH7y0klU - zin 75 belly dance \r\n&lt;a href=http://www.youtube.com/watch?v=Nnfi3NTxWnw&gt;belly dance drum solo choreography&lt;/a&gt; \r\n&lt;a href=http://www.youtube.com/watch?v=Nnfi3NTxWnw&gt;belly dance drum solo darbuka&lt;/a&gt; \r\nhttp://www.youtube.com/watch?v=JdbheaybTIU \r\nhttp://www.youtube.com/watch?v=U_xCzTq2ppI&amp;t=25s \r\nhttp://www.youtube.com/watch?v=-GirH7y0klU \r\nhttp://www.youtube.com/watch?v=PzcCOHwnPpY \r\nhttp://www.youtube.com/user/YuliannaVoronina/ \r\nhttp://www.youtube.com/watch?v=KxhSW7Q1xeM \r\nhttp://www.youtube.com/watch?v=Nnfi3NTxWnw \r\nhttp://www.youtube.com/watch?v=9U6-snryMf4 \r\nhttp://www.youtube.com/watch?v=kpSuGyBIOIE \r\nhttp://www.youtube.com/watch?v=BODdPUsCuZ4 \r\nhttp://www.youtube.com/watch?v=sNxdCUVOtVM \r\nhttp://www.youtube.com/watch?v=JdbheaybTIU&amp;list=PLqqerD_YYsIr4-6DZyUv6gQCAofEQcBpw \r\nbelly dance.');

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
-- Структура таблицы `meta_title`
--

CREATE TABLE IF NOT EXISTS `meta_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(90) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(1, 'segasle@gmail.com', 'Сергей', 'Слепенков', '71350bd7416cd086c569e630cf39a826bb88a0dd6c3c60b3b52f7b8b40a23c74e0462d67644c48136f376', 176938709),
(2, 'Dendmisle@gmail.com', 'Даниил', 'Слепенков', '45c27e39664494cdbdc3adaa29d77ab17ac8ed0f5527cf234a23724102c150df8fb931d2701abffcefc5b', 514298316);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
