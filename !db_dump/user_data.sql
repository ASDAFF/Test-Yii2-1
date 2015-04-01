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
-- Структура таблицы `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `userID` int(11) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `sex` varchar(1) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `photo` varchar(20) NOT NULL,
  `remark` text,
  `dateAdd` int(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_data`
--

INSERT INTO `user_data` (`userID`, `phone`, `sex`, `country`, `city`, `photo`, `remark`, `dateAdd`) VALUES
(6, NULL, 'm', NULL, NULL, '', NULL, 1427539633),
(7, NULL, 'm', NULL, NULL, '', NULL, 1427539800),
(8, NULL, 'm', NULL, NULL, '', NULL, 1427540771),
(9, '+79788179440', 'm', 'Россия', 'Севастополь', '', NULL, 1427617565),
(10, NULL, 'm', NULL, NULL, '', NULL, 1427799310),
(11, NULL, 'f', NULL, NULL, '', NULL, 1427799345),
(12, '111111', 'm', 'Russia', 'Sevastopol', '12.jpg', NULL, 1427812213),
(13, NULL, 'm', NULL, NULL, '', NULL, 1427869065);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
