-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.48 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных weather
CREATE DATABASE IF NOT EXISTS `weather` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `weather`;


-- Дамп структуры для таблица weather.weather
CREATE TABLE IF NOT EXISTS `weather` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `temperature` int(11) NOT NULL,
  `windspeed` int(11) NOT NULL,
  `windturn` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `humidity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы weather.weather: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `weather` DISABLE KEYS */;
INSERT INTO `weather` (`id`, `temperature`, `windspeed`, `windturn`, `status`, `humidity`) VALUES
	(1, 28, 11, 'N.E.', 'Extended cloudiness', 48);
/*!40000 ALTER TABLE `weather` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
