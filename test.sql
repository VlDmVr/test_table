-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2017 г., 22:04
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(4) NOT NULL,
  `name_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name_cat`) VALUES
(1, 'смартфон'),
(2, 'планшет'),
(3, 'ноутбук');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_g` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cat_id` int(4) NOT NULL,
  `description` text NOT NULL,
  `price` float(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_g`, `name`, `cat_id`, `description`, `price`, `status`) VALUES
(1, 'Acer Aspire E5-573G-51N8', 3, 'Производитель Acer Corporation. Страна производства КИТАЙ.', 32999.99, 1),
(2, 'Samsung Galaxy Tab A 8.0 LTE', 2, 'Оснащенный 1,2 ГГц четырехъядерным процессором, 2 ГБ оперативной памяти и Android OS, планшет Samsung Galaxy Tab A обладает высокой производительностью.', 19990.50, 1),
(3, 'Huawei Honor 5A gold', 1, 'Смартфон Huawei Honor 5A с четырех ядерным процессором MediaTek MT6735P, 5-дюймовым сенсорным дисплеем с разрешением 1280 на 720 пикселей.', 8990.23, 1),
(13, 'Meizu U10 16GB', 1, 'Элегантность, надежность и долговечность Meizu U10 достигаются за счет эффективного сочетания стекла и металла. В четко очерченном корпусе установлено 2.5D-стекло со скругленным кантом.', 12000.66, 1),
(14, 'Samsung GALAXY Tab S2 9.7 Wi-Fi', 2, '8-мегапиксельная камера планшета Galaxy Tab S2 со светосильным объективом (f/1.9) позволяет делать яркие, четкие снимки и видео даже при низком уровне освещенности. Просматривайте свои фото и видео на большом и ярком экране с матрицей Super AMOLED.', 20000.55, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_g`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_g` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
