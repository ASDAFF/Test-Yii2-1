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
-- Структура таблицы `remarks`
--

CREATE TABLE IF NOT EXISTS `remarks` (
  `userID` int(11) NOT NULL,
  `remark` text NOT NULL,
  `dateAdd` int(11) NOT NULL,
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `remarks`
--

INSERT INTO `remarks` (`userID`, `remark`, `dateAdd`) VALUES
(9, 'arwerwerwe', 1427809966),
(9, 'аываыв', 1427810093),
(9, '<script>alert(''test'')</script>', 1427810108),
(9, 'Новый комментарий', 1427810940),
(9, 'askdjalsk\r\nsdasd', 1427811775),
(6, 'wefwefw', 1427822451),
(7, 'тестовый комментарий', 1427868760);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `remarks`
--
ALTER TABLE `remarks`
  ADD CONSTRAINT `remarks_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
