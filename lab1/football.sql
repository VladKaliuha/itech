-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 28 2020 г., 15:24
-- Версия сервера: 5.5.25
-- Версия PHP: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `football`
--

-- --------------------------------------------------------

--
-- Структура таблицы `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `place` varchar(255) NOT NULL,
  `score` varchar(255) NOT NULL,
  `team1_id` int(11) NOT NULL,
  `team2_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `team1_id` (`team1_id`,`team2_id`),
  KEY `team2_id` (`team2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `team_id` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `team_id` (`team_id`),
  KEY `team_id_2` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `league` varchar(255) NOT NULL,
  `coach` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`team1_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`team2_id`) REFERENCES `team` (`id`);

--
-- Ограничения внешнего ключа таблицы `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE CASCADE;

INSERT INTO `football`.`team` (`id` , `name` , `league` , `coach`)
VALUES ('1', 'Team1', 'League1', 'Coach1');
INSERT INTO `football`.`team` (`id` , `name` , `league` , `coach`)
VALUES ('2', 'Team2', 'League1', 'Coach2');
INSERT INTO `football`.`team` (`id` , `name` , `league` , `coach`)
VALUES ('3', 'Team3', 'League2', 'Coach3');
INSERT INTO `football`.`team` (`id` , `name` , `league` , `coach`)
VALUES ('4', 'Team4', 'League2', 'Coach4');

INSERT INTO `football`.`player` (`id` , `name` , `team_id`)
VALUES ('1', 'Name1', '1');
INSERT INTO `football`.`player` (`id` , `name` , `team_id`)
VALUES ('2', 'Name2', '1');
INSERT INTO `football`.`player` (`id` , `name` , `team_id`)
VALUES ('3', 'Name3', '2');
INSERT INTO `football`.`player` (`id` , `name` , `team_id`)
VALUES ('4', 'Name4', '2');
INSERT INTO `football`.`player` (`id` , `name` , `team_id`)
VALUES ('5', 'Name5', '3');
INSERT INTO `football`.`player` (`id` , `name` , `team_id`)
VALUES ('6', 'Name6', '3');

INSERT INTO `football`.`game` (`id` , `date` , `place` , `score` , `team1_id` , `team2_id`)
VALUES ('1', '2020-04-08 00:00:00', 'Location1', '2:3', '1', '4');
INSERT INTO `football`.`game` (`id` , `date` , `place` , `score` , `team1_id` , `team2_id`)
VALUES ('2', '2020-04-08 00:00:00', 'Location1', '1:0', '2', '3');
INSERT INTO `football`.`game` (`id` , `date` , `place` , `score` , `team1_id` , `team2_id`)
VALUES ('3', '2020-04-08 00:00:00', 'Location1', '0:0', '3', '1');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
