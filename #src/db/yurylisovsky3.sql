-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 08 2020 г., 10:59
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yurylisovsky3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `zone_id` int(11) NOT NULL,
  `care_id` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `care`
--

CREATE TABLE `care` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `care`
--

INSERT INTO `care` (`id`, `name`, `picture_name`, `description`) VALUES
(1, 'посадка', '', ''),
(2, 'полив', '', ''),
(3, 'обрезка', '', ''),
(4, 'подкормка', '', ''),
(5, 'побелка', '', ''),
(6, 'обработка от насекомых', '', ''),
(7, 'обработка от болезней', '', ''),
(8, 'борьба с сорняками', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `care_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `plant`
--

CREATE TABLE `plant` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_name` text NOT NULL,
  `description` text NOT NULL,
  `picture_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `plant`
--

INSERT INTO `plant` (`id`, `name`, `category_id`, `type_name`, `description`, `picture_name`) VALUES
(8, 'туя', 1, '', '', ''),
(9, 'малина', 2, '', '', ''),
(10, 'яблоня', 5, '', '', ''),
(11, 'можевельник', 2, '', '', ''),
(12, 'роза', 3, '', '', ''),
(13, 'абрикос', 5, '', '', ''),
(14, 'персик', 5, '', '', ''),
(16, 'Яблоня', 5, 'Скифское золото', 'Раннезимний сорт.\r\n\r\nОтличается скороплодностью, высокой урожайностью, зимостойкостью, иммунностью к парше и толерантностью к мучнистой росе.\r\n\r\nДерево быстрорастущее, образует компактную крону (возможно загущенное размещение деревьев в саду: 4х3, 4х2 м).\r\n\r\nПлоды крупные, массой 175-190 г, золотисто-жёлтые с выраженным румянцем. Мякоть кремовая, плотная,сочная, ароматная, отличного кисло-сладкого вкуса.\r\n\r\nОсновное назначение - потребление в свежем виде и для приготовления высококачественных светлых соков.\r\n\r\nСъёмная зрелость наступает в конце сентября. Период потребления - от съёма до конца января - середины февраля.\r\n\r\nС 1993 года сорт находится в государственном сортоиспытании. Один из первых иммунных к парше сортов украинской селекции с плодами отличных вкусовых качеств.', ''),
(17, 'роза', 3, 'Поздняя', '', ''),
(18, 'Огурцы', 4, 'Поздние', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `plant_category`
--

CREATE TABLE `plant_category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `picture_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `plant_category`
--

INSERT INTO `plant_category` (`id`, `name`, `picture_name`) VALUES
(1, 'хвойные', ''),
(2, 'кустарники', ''),
(3, 'цветы', ''),
(4, 'огородные', ''),
(5, 'фруктовые деревья', '');

-- --------------------------------------------------------

--
-- Структура таблицы `seed_plant`
--

CREATE TABLE `seed_plant` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `user_plant_id` int(11) NOT NULL,
  `calendar_id` int(11) NOT NULL,
  `ready` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tool`
--

CREATE TABLE `tool` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `care_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `picture_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `confirm_mail` varchar(255) NOT NULL,
  `verifed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `phone`, `password`, `email`, `birthday`, `confirm_mail`, `verifed`) VALUES
(27, '14', '101010', 'aab3238922bcc25a6f606eb525ffdc56', '14@14', '2020-05-07', '', 0),
(28, '2222', '2222', '934b535800b1cba8f96a5d72f72f1611', '2222', '2020-05-07', '', 0),
(29, '22222', 'dddd', '3d2172418ce305c7d16d4b05597c6a59', '22222@1', '2020-05-07', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_photo`
--

CREATE TABLE `user_photo` (
  `id` int(11) NOT NULL,
  `user_plant_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `picture_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_plant`
--

CREATE TABLE `user_plant` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `planted` int(11) NOT NULL DEFAULT 0,
  `planting_date` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `seller_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `is_watch` int(11) NOT NULL DEFAULT 0,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `zone`
--

CREATE TABLE `zone` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zone`
--

INSERT INTO `zone` (`id`, `name`, `picture_name`, `description`) VALUES
(1, 'Степь', 'image/map1.jpg', 'На карте обозначено Желтым'),
(2, 'Лесостепь', 'image/map1.jpg', 'На карте обозначено Оранжевым'),
(3, 'Полесье', 'image/map1.jpg', 'На карте обозначено Фиолетовым');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `care_id` (`care_id`),
  ADD KEY `plant_id` (`plant_id`,`tool_id`),
  ADD KEY `tool_id` (`tool_id`);

--
-- Индексы таблицы `care`
--
ALTER TABLE `care`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `care_id` (`care_id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Индексы таблицы `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `plant_category`
--
ALTER TABLE `plant_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `seed_plant`
--
ALTER TABLE `seed_plant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`,`plant_id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Индексы таблицы `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_plant_id` (`user_plant_id`,`calendar_id`),
  ADD KEY `calendar_id` (`calendar_id`);

--
-- Индексы таблицы `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`id`),
  ADD KEY `care_id` (`care_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_photo`
--
ALTER TABLE `user_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_plant_id` (`user_plant_id`);

--
-- Индексы таблицы `user_plant`
--
ALTER TABLE `user_plant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `plant_id` (`plant_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `care`
--
ALTER TABLE `care`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `plant`
--
ALTER TABLE `plant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `plant_category`
--
ALTER TABLE `plant_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `seed_plant`
--
ALTER TABLE `seed_plant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tool`
--
ALTER TABLE `tool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `user_photo`
--
ALTER TABLE `user_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_plant`
--
ALTER TABLE `user_plant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`),
  ADD CONSTRAINT `calendar_ibfk_2` FOREIGN KEY (`care_id`) REFERENCES `care` (`id`),
  ADD CONSTRAINT `calendar_ibfk_3` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`id`),
  ADD CONSTRAINT `calendar_ibfk_4` FOREIGN KEY (`tool_id`) REFERENCES `tool` (`id`);

--
-- Ограничения внешнего ключа таблицы `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`care_id`) REFERENCES `care` (`id`),
  ADD CONSTRAINT `info_ibfk_2` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`id`);

--
-- Ограничения внешнего ключа таблицы `plant`
--
ALTER TABLE `plant`
  ADD CONSTRAINT `plant_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `plant_category` (`id`);

--
-- Ограничения внешнего ключа таблицы `seed_plant`
--
ALTER TABLE `seed_plant`
  ADD CONSTRAINT `seed_plant_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`),
  ADD CONSTRAINT `seed_plant_ibfk_2` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`id`);

--
-- Ограничения внешнего ключа таблицы `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`user_plant_id`) REFERENCES `user_plant` (`id`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`calendar_id`) REFERENCES `calendar` (`id`);

--
-- Ограничения внешнего ключа таблицы `tool`
--
ALTER TABLE `tool`
  ADD CONSTRAINT `tool_ibfk_1` FOREIGN KEY (`care_id`) REFERENCES `care` (`id`),
  ADD CONSTRAINT `tool_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_photo`
--
ALTER TABLE `user_photo`
  ADD CONSTRAINT `user_photo_ibfk_1` FOREIGN KEY (`user_plant_id`) REFERENCES `user_plant` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_plant`
--
ALTER TABLE `user_plant`
  ADD CONSTRAINT `user_plant_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`),
  ADD CONSTRAINT `user_plant_ibfk_2` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`id`),
  ADD CONSTRAINT `user_plant_ibfk_3` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`),
  ADD CONSTRAINT `user_plant_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
