-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 01 2015 г., 10:44
-- Версия сервера: 5.5.37
-- Версия PHP: 5.4.4-14+deb7u9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tests`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`),
  UNIQUE KEY `email` (`email`),
  KEY `login` (`email`,`pwd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userID`, `email`, `pwd`, `admin`) VALUES
(6, 'turbocom-mlt@yandex.ru', '2fd6ae08d12570d7c24f37daf430619a', 0),
(7, 'turbocom-mlt2@yandex.ru', '2fd6ae08d12570d7c24f37daf430619a', 0),
(8, 'kjkjl@jkjk.dd', '25d55ad283aa400af464c76d713c07ad', 0),
(9, 'gifttoru@gmail.com', 'cb12a0c3444eb878b9cb6cce492aa6ab', 1),
(10, 'tur@dsds.ds', '4830988bc1b4ce85986fee601a8a15a2', 0),
(11, 'erwer@dsd.ds', '4830988bc1b4ce85986fee601a8a15a2', 0),
(12, 'admin@admin.ru', 'fd7828c67d2d55b3fc414372a8acf140', 1),
(13, 'jhj@kjskd.ri', '4830988bc1b4ce85986fee601a8a15a2', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
