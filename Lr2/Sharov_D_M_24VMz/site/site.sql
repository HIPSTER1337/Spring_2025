-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 15 2025 г., 19:27
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `unik_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bron`
--

CREATE TABLE `bron` (
  `ID` int NOT NULL,
  `id_car` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_reg` date NOT NULL,
  `confirm` int NOT NULL DEFAULT '0',
  `date_bron` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `ID` int NOT NULL,
  `title` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `amount` double NOT NULL,
  `year` int NOT NULL,
  `power` int NOT NULL,
  `color` text COLLATE utf8mb4_general_ci NOT NULL,
  `category` text COLLATE utf8mb4_general_ci NOT NULL,
  `url_img` text COLLATE utf8mb4_general_ci NOT NULL,
  `all_urls` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`ID`, `title`, `description`, `amount`, `year`, `power`, `color`, `category`, `url_img`, `all_urls`) VALUES
(7, 'ГАЗ-31105', 'ГАЗ-31105 — это надежный российский седан, отличающийся просторным салоном и высокой проходимостью. Он идеально подходит для городских условий и дальних поездок, сочетая комфорт с прочностью конструкции.', 2000, 2005, 131, 'Серебристый', 'B', 'газ31105-1.jpg', '{\"1\": \"газ31105-1.jpg\", \"2\": \"газ31105-2.jpg\"}'),
(8, 'ВАЗ-2114', 'ВАЗ-2114 — популярный отечественный хэтчбек, известный своей простотой и экономичностью. Компактный и удобный в управлении, он отлично подходит для городских поездок и ежедневных нужд.', 3000, 2011, 81, 'Зелёный', 'B', 'ваз2114-1.jpg', '{\"1\": \"ваз2114-1.jpg\", \"2\": \"ваз2114-2.jpg\"}');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `login` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_reg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `login`, `password`, `user_name`, `date_reg`) VALUES
(1, 'admin', '$2y$10$bGlpVPe2XOuD3jnzvAu1luqUjk1YZy.3z2a9v/91KGB9K9hgxztHa', 'Черемша', '2025-04-11 12:24:06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bron`
--
ALTER TABLE `bron`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bron`
--
ALTER TABLE `bron`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
