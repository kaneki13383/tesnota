-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 21 2022 г., 16:29
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
  `count` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id_order`, `id_user`, `id_product`, `count`) VALUES
(46, 7, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `surname`, `email`, `comment`) VALUES
(1, 'Даниил', 'Куницын', 'danchik.kun@mail.ru', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi temporibus dolores adipisci ea nihil officia repellendus molestiae quam minus.');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback_food`
--

CREATE TABLE `feedback_food` (
  `id` int NOT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `name_user` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `avatar_user` varchar(200) DEFAULT NULL,
  `id_food` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback_food`
--

INSERT INTO `feedback_food` (`id`, `comment`, `name_user`, `avatar_user`, `id_food`) VALUES
(6, 'Вроде норм', 'Куницын Олег Геннадьевич', 'avatars/1646081749Без имени.png', 1);

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
(1, 'Баранья корейка в духовке', 'img_menu/d0b2d0bad183d181d0bdd18bd0b9-d180d0b5d186d0b5d0bfd182-d180d0b5d0b1d180d18bd188d0b5d0ba.jpg', 'Баранья корейка – спинная часть барана с мясом и ребрами, самая сочная часть баранины. Баранья корейка, как и любая баранина, богата витаминами В-группы, содержит витамин Е, а железа в ней на 30% больше, чем в свинине.', 800, 'dessert'),
(2, 'Тигровые креветки в томатном соусе', 'img_menu/23714-ed4_wide.jpg', 'Наверное, самым популярным рецептом приготовления креветок будет на сковороде в томатном соусе. Именно так приготовленные эти морепродукты можно встретить в каждом ресторанчике с морской тематикой. ', 850, 'dessert'),
(3, 'Скумбрия в горячем маринаде', 'img_menu/149855-ed4_wide.png', 'Скумбрия, замаринованная горячим способом, готовится быстро и просто. Через несколько часов вы уже сможете подать закуску на стол. Рыба получается плотная, насыщенная ароматами специй.', 1500, 'snacks'),
(4, 'Молочный коктейль с клубникой', 'img_menu/7475-ed4_wide.jpg', 'Этот восхитительный клубничный коктейль прекрасно освежает в летнюю жару. К тому же он очень полезный и питательный.', 150, 'drinks'),
(6, 'Какао с мятой и маршмеллоу', 'img_menu/148755-ed4_wide.png', 'Ароматное, вкусное, согревающее какао с нежной кремовой шапочкой из маршмеллоу нравится и взрослым, и детям. Напиток поднимает жизненный тонус, стимулирует физическую и умственную активность и просто дарит хорошее настроение. ', 100, 'drinks'),
(7, 'Гребешки фенхель на гриле', 'img_menu/22664-ed4_wide.jpg', 'Это удивительное блюдо сочетает в себе различные вкусы: сладость гребешка, вкус кислой маракуйи и освежающего салата из фенхеля, авокадо и граната, а кунжутный тюиль обеспечивает хрустящую текстуру.', 2500, 'snacks');

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
(1, 'Куницын Даниил Олегович', 'kaneki13383', 'danchik.kun@mail.ru', '123', 'avatars/1652535945tgJqI8-J0dk.jpg', 'Ул Кубанская 17 дом 17 кв 107', '89673312786', 1),
(7, 'Куницын Олег Геннадьевич', 'kog', 'k-o-g@mail.ru', '111', 'avatars/1646081749Без имени.png', 'ул. Кубанская 17 дом 17 кв. 107', '89673312786', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_order`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback_food`
--
ALTER TABLE `feedback_food`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `feedback_food`
--
ALTER TABLE `feedback_food`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
