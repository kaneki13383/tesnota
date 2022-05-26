-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 26 2022 г., 10:51
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tesnota`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id_order` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_product` int DEFAULT NULL,
  `summ` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id_order`, `id_user`, `id_product`, `summ`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `discription` varchar(500) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `img`, `discription`, `price`, `type`) VALUES
(1, 'Баранья корейка в духовке', 'img_menu/image 4.png', 'Баранья корейка – спинная часть барана с мясом и ребрами, самая сочная часть баранины,. Кстати, название \"корейка\" происходит от французского слова carre, что и обозначает эту часть тушки. Баранья корейка, как и любая баранина, богата витаминами В-группы, содержит витамин Е, а железа в ней на 30% больше, чем в свинине. Кроме того, баранья корейка – не самая жирная часть барашка,  содержание холестерина в ней невелико, поэтому полезность  этого мяса вряд ли можно переоценить.', 600, 'dessert'),
(2, 'Тигровые креветки в томатном соусе', 'img_menu/image 5.png', 'Наверное, самым популярным рецептом приготовления креветок будет на сковороде в томатном соусе. Именно так приготовленные эти морепродукты можно встретить в каждом ресторанчике с морской тематикой. Но для того, чтобы попробовать вкуснейшие креветки в томатном соусе, вовсе не обязательно идти в ресторан, их очень быстро и просто можно приготовить в домашних условиях. Не верите? Сейчас убедитесь в этом сами.', 850, 'dessert');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `login` varchar(70) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `adress` varchar(500) DEFAULT NULL,
  `number` varchar(30) DEFAULT NULL,
  `role` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`, `adress`, `number`, `role`) VALUES
(1, 'Куницын Даниил Олегович', 'kaneki13383', 'danchik.kun@mail.ru', '123', 'avatars/1652535945tgJqI8-J0dk.jpg', 'Ул Кубанская 17 дом 17 кв 107', '8967312786', 0),
(2, 'Куницын Олег Геннадьевич', 'kog', 'k-o-g@mail.ru', '111', 'avatars/1652539431d3df3caa.jpg', NULL, NULL, 0),
(3, 'Куницын Илья Олегович', 'ilya', 'kunitcyndaniil@gmail.com', '123', 'avatars/1652539507', NULL, NULL, 0),
(5, 'Куницын Олег Геннадьевич ', 'greger', 'kog@mail.ru', '123', 'avatars/16529058351652539431d3df3caa.jpg', 'Ул Кубанская 17 дом 17 кв 107', '89673312786', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_order`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
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
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
