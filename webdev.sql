-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 13 2021 г., 18:01
-- Версия сервера: 5.7.23-log
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webdev`
--

-- --------------------------------------------------------

--
-- Структура таблицы `fav_nums`
--

CREATE TABLE `fav_nums` (
  `id_fn` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ufav` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fav_nums`
--

INSERT INTO `fav_nums` (`id_fn`, `id_user`, `id_ufav`, `date`) VALUES
(33, 13, 1, '2021-10-13'),
(34, 13, 2, '2021-10-13'),
(35, 13, 3, '2021-10-13');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `date_reg` date NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `number_user` varchar(11) NOT NULL,
  `login_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `date_reg`, `name_user`, `number_user`, `login_user`, `password_user`) VALUES
(1, '2021-10-09', 'ali', '1111111111', 'ali', '86318e52f5ed4801abe1d13d509443de'),
(2, '2021-10-09', 'vali', '222222222', 'valis', 'fb2429584d982a07b3461d2fc3d1458f'),
(3, '2021-10-09', 'gani', '3333333333', 'gani', '42b438a4533d22d6473647d3b5f81f75'),
(4, '2021-10-09', 'Mizo', '4444444444', 'Mizo', 'c78c28d44631455372519577c7f88360'),
(5, '2021-10-09', 'Abdu', '5555555555', 'Abdu', '54cfdda78f5b1c4df600107085671946'),
(6, '2021-10-09', 'Rahim', '6666666666', 'Rahim', '9733b92d7d60ecac9ad32ff7a5c87a3c'),
(7, '2021-10-09', 'Buvo', '7777777777', 'Buvo', 'ce29196cecf89a9e1a595cce9921e981'),
(8, '2021-10-09', 'Fedya', '8888888888', 'Fedya', 'd5478af3238e9f2332ce87eb3958b38a'),
(9, '2021-10-09', 'Sasha', '9999999999', 'Sasha', 'b1d98d7672054880001300026e92b84f'),
(10, '2021-10-09', 'Kolya', '1010101010', 'Kolya', 'ec3da25081aa81b637fe6faa3debe26e'),
(11, '2021-10-09', 'Jojo', '123456789', 'jojo', '7510d498f23f5815d3376ea7bad64e29'),
(12, '2021-10-09', 'lolo', '987654321', 'lolo', 'd6581d542c7eaf801284f084478b5fcc'),
(13, '2021-10-02', 'pepe', '98798465', 'pepe', '926e27eecdbc7a18858b3798ba99bddd'),
(14, '2021-10-02', 'sdfsdf', '2341231233', 'sdfaef', '28f4299a8e274436a08cee1fc7bc94ea');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `fav_nums`
--
ALTER TABLE `fav_nums`
  ADD PRIMARY KEY (`id_fn`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `fav_nums`
--
ALTER TABLE `fav_nums`
  MODIFY `id_fn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
