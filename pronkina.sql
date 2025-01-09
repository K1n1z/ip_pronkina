-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 05 2022 г., 11:13
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pronkina`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `zagolovok` text NOT NULL,
  `info` text NOT NULL,
  `link_photo` text NOT NULL,
  `date` timestamp NOT NULL,
  `id_users` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `zagolovok`, `info`, `link_photo`, `date`, `id_users`) VALUES
(33, 'Проверка', 'Проверка', 'img/Desert.jpg', '2022-04-27 19:43:51', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `opfs`
--

CREATE TABLE `opfs` (
  `id` int NOT NULL,
  `forma` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `opfs`
--

INSERT INTO `opfs` (`id`, `forma`) VALUES
(1, 'Товарищество'),
(2, 'Акционерное общество (АО)'),
(3, 'Общество с ограниченной ответственностью (ООО)'),
(4, 'Государственное унитарное предприятие (ГУП)'),
(5, 'Фонд'),
(6, 'Учреждение'),
(7, 'Ассоциация'),
(8, 'Кооператив'),
(9, 'Индивидуальный предприниматель (ИП)');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Проверяется'),
(2, 'Одобрено'),
(3, 'Отказано');

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int NOT NULL,
  `id_users` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_uslugi` int NOT NULL,
  `id_opf` int NOT NULL,
  `info` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `id_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `id_users`, `name`, `id_uslugi`, `id_opf`, `info`, `phone`, `id_status`) VALUES
(8, 10, 'неолинк', 1, 3, 'Проверка', '79626764082', 2),
(11, 23, 'Альберт', 1, 1, 'Октябрь уж наступил — уж роща отряхает\r\nПоследние листы с нагих своих ветвей;\r\nДохнул осенний хлад — дорога промерзает.', '79626764082', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `second_name` text NOT NULL,
  `email` text NOT NULL,
  `id_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `first_name`, `last_name`, `second_name`, `email`, `id_status`) VALUES
(20, 'admin', '123456', 'Альберт', 'Пронькин', 'Андреевич', 'pronkin.albert2017@yandex.ru', 3),
(21, 'pisospro', '123', 'Альберт', 'Пронькин', 'Андреевич', 'pronkin.albert2017@yandex.ru', 2),
(22, 'admin2', '12345', 'Альберт', 'Пронькин', 'Андреевич', 'pronkin.albert2017@yandex.ru', 2),
(23, 'pis', '123', 'Альберт', 'Пронькин', 'Андреевич', 'pronkin.albert2017@yandex.ru', 1),
(24, 'pos', '123', 'Альберт', 'Пронькин', 'Андреевич', 'pronkin.albert2017@yandex.ru', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users_status`
--

CREATE TABLE `users_status` (
  `id` int NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users_status`
--

INSERT INTO `users_status` (`id`, `status`) VALUES
(1, 'Пользователь'),
(2, 'Модератор'),
(3, 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `uslugi`
--

CREATE TABLE `uslugi` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `uslugi`
--

INSERT INTO `uslugi` (`id`, `name`) VALUES
(1, 'Начисление зп'),
(2, 'Налоги от зп'),
(3, 'Кадровый учет'),
(4, 'Учет реализации'),
(5, 'Налоговый учет'),
(6, 'Статистический учет'),
(7, 'Отчетность ЦБРФ'),
(8, 'Ведение в ГИИСДМДК');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Индексы таблицы `opfs`
--
ALTER TABLE `opfs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_uslugi` (`id_uslugi`),
  ADD KEY `id_opf` (`id_opf`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`id_status`);

--
-- Индексы таблицы `users_status`
--
ALTER TABLE `users_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `opfs`
--
ALTER TABLE `opfs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users_status`
--
ALTER TABLE `users_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `task_ibfk_7` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`id_uslugi`) REFERENCES `uslugi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`id_opf`) REFERENCES `opfs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `task_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `task_ibfk_6` FOREIGN KEY (`id_status`) REFERENCES `users_status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
