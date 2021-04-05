-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 04 2021 г., 14:14
-- Версия сервера: 5.7.24
-- Версия PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lar-test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$Y/sf65CSSDDw3oxDmhEnBOvu0kKIx01N1oy92D8dZZ1063Filr9vC', NULL, '2021-04-04 07:51:00', '2021-04-04 07:51:00');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_create` datetime NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_message` varchar(255) NOT NULL,
  `answered` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `date_create`, `user_email`, `user_phone`, `user_name`, `user_message`, `answered`) VALUES
(1, '2021-01-14 08:58:17', 'sh@sh.sg', '380969999999', 'Євген', 'is message here', 0),
(2, '2021-02-03 03:00:53', '1ds@df.sd', '1ds@df.sd', 'sdfgh', 'wdfghmnb', 0),
(3, '2021-02-03 03:02:01', 'dsfsd@ds.df', '123456789', 'fds', 'sadfghj', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2021_03_31_054543_create_tour_table', 2),
(9, '2021_03_31_061349_create_tour_route_table', 2),
(10, '2021_03_31_061930_create_tour_booking_table', 2),
(11, '2021_04_04_083337_create_admins_table', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` blob NOT NULL,
  `picture` blob,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `picture`, `date_create`, `date_update`) VALUES
(1, 'Розпочато сезон', 0x3c756c3e0d0a093c6c693e303c2f6c693e0d0a093c6c693e313c2f6c693e0d0a093c6c693e323c2f6c693e0d0a093c6c693e333c2f6c693e0d0a093c6c693e343c2f6c693e0d0a3c2f756c3e0d0a3c68313ed09fd180d0b8d0b2d0b5d1823c2f68313e, NULL, '2021-01-14 12:22:30', '2021-01-14 12:22:30'),
(2, 'Відпочинок на річці Дністер', 0x3c21444f43545950452068746d6c3e0d0a3c68746d6c206c616e673d22656e223e0d0a3c686561643e0d0a3c7469746c653e5368766574732059657668656e2c204c6162393c2f7469746c653e0d0a3c6d65746120636861727365743d227574662d38223e0d0a3c6d657461206e616d653d2276696577706f72742220636f6e74656e743d2277696474683d6465766963652d77696474682c20696e697469616c2d7363616c653d31223e0d0a3c6c696e6b2072656c3d227374796c6573686565742220687265663d227374796c652e637373223e0d0a3c2f686561643e0d0a3c626f64793e0d0a3c6865616465723e0d0a20203c68323e4369746965733c2f68323e0d0a3c2f6865616465723e0d0a0d0a3c73656374696f6e3e0d0a20203c6e61763e0d0a202020203c756c3e0d0a2020202020203c6c693e3c6120687265663d22696e6465782e68746d6c223e4c6f6e646f6e3c2f613e3c2f6c693e0d0a2020202020203c6c693e3c6120687265663d22312e68746d6c223e50617269733c2f613e3c2f6c693e0d0a2020202020203c6c693e3c6120687265663d22322e68746d6c223e546f6b796f3c2f613e3c2f6c693e0d0a202020203c2f756c3e0d0a20203c2f6e61763e0d0a20200d0a20203c61727469636c6520636c6173733d22617274223e0d0a202020203c68313e546f6b796f3c2f68313e0d0a202020203c703e546f6b796f2c206f6e65206f662074686520776f726c642773206c617267657374206369746965732c206f6666657273206120756e697175656c792065636c6563746963206d6978206f6620747261646974696f6e616c20616e6420636f6e74656d706f726172792061747472616374696f6e732e20506c6561736520656e6a6f7920546f6b796f20616e64206265796f6e6420647572696e6720796f7572207374617920666f72206120636f6e666572656e63652c206d656574696e67206f7220627573696e6573732e3c2f703e0d0a20203c2f61727469636c653e0d0a3c2f73656374696f6e3e0d0a0d0a3c666f6f7465723e0d0a20203c703e436f7079205368766574732059657668656e3c2f703e0d0a3c2f666f6f7465723e0d0a0d0a3c2f626f64793e0d0a3c2f68746d6c3e0d0a, NULL, '2021-01-14 22:35:16', '2021-01-18 18:14:00'),
(8, 'ntcn', 0xd0afd0ba20d183d0bcd180d1832c20d182d0be20d0bfd0bed185d0bed0b2d0b0d0b9d182d0b53c62723e0d0ad09cd0b5d0bdd0b520d0bdd0b020d0bcd0bed0b3d0b8d0bbd1963c62723e0d0ad0a1d0b5d180d0b5d0b420d181d182d0b5d0bfd18320d188d0b8d180d0bed0bad0bed0b3d0be3c62723e0d0ad09dd0b020d092d0bad180d0b0d197d0bdd19620d0bcd0b8d0bbd196d0b92c3c62723e0d0ad0a9d0bed0b120d0bbd0b0d0bdd0b820d188d0b8d180d0bed0bad0bed0bfd0bed0bbd1962c3c62723e0d0ad08620d094d0bdd196d0bfd180d0be2c20d19620d0bad180d183d187d1963c62723e0d0ad091d183d0bbd0be20d0b2d0b8d0b4d0bdd0be2c20d0b1d183d0bbd0be20d187d183d182d0b82c3c62723e0d0ad0afd0ba20d180d0b5d0b2d0b520d180d0b5d0b2d183d187d0b8d0b92e3c62723e0d0ad0afd0ba20d0bfd0bed0bdd0b5d181d0b520d0b720d0a3d0bad180d0b0d197d0bdd0b83c62723e0d0ad0a320d181d0b8d0bdd194d19420d0bcd0bed180d0b53c62723e0d0ad09ad180d0bed0b220d0b2d0bed180d0bed0b6d1832e2e2e20d0bed182d0bed0b9d0b4d19620d18f3c62723e0d0ad08620d0bbd0b0d0bdd0b820d19620d0b3d0bed180d0b820e280943c62723e0d0ad092d181d0b520d0bfd0bed0bad0b8d0bdd1832c20d19620d0bfd0bed0bbd0b8d0bdd1833c62723e0d0ad094d0be20d181d0b0d0bcd0bed0b3d0be20d091d0bed0b3d0b03c62723e0d0ad09cd0bed0bbd0b8d182d0b8d181d18f2e2e2e20d0b020d0b4d0be20d182d0bed0b3d0be3c62723e0d0ad0af20d0bdd0b520d0b7d0bdd0b0d18e20d091d0bed0b3d0b02e3c62723e0d0ad09fd0bed185d0bed0b2d0b0d0b9d182d0b520d182d0b020d0b2d181d182d0b0d0b2d0b0d0b9d182d0b52c3c62723e0d0ad09ad0b0d0b9d0b4d0b0d0bdd0b820d0bfd0bed180d0b2d196d182d0b53c62723e0d0ad08620d0b2d180d0b0d0b6d0bed18e20d0b7d0bbd0bed18e20d0bad180d0bed0b2e28099d18e3c62723e0d0ad092d0bed0bbd18e20d0bed0bad180d0bed0bfd196d182d0b52e3c62723e0d0ad08620d0bcd0b5d0bdd0b520d0b220d181d0b5d0bce28099d19720d0b2d0b5d0bbd0b8d0bad196d0b92c3c62723e0d0ad09220d181d0b5d0bce28099d19720d0b2d0bed0bbd18cd0bdd196d0b92c20d0bdd0bed0b2d196d0b92c3c62723e0d0ad09dd0b520d0b7d0b0d0b1d183d0b4d18cd182d0b520d0bfd0bed0bce28099d18fd0bdd183d182d0b83c62723e0d0ad09dd0b5d0b7d0bbd0b8d0bc20d182d0b8d185d0b8d0bc20d181d0bbd0bed0b2d0bed0bc2e3c62723e, NULL, '2021-02-08 14:12:00', '2021-02-08 14:12:00');

-- --------------------------------------------------------

--
-- Структура таблицы `post_tags`
--

CREATE TABLE `post_tags` (
  `id_post` int(10) UNSIGNED NOT NULL,
  `id_tag` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_tags`
--

INSERT INTO `post_tags` (`id_post`, `id_tag`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reservetariff`
--

CREATE TABLE `reservetariff` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tarif` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reservetariff`
--

INSERT INTO `reservetariff` (`id`, `id_tarif`, `user_name`, `user_phone`, `user_email`, `user_comment`) VALUES
(1, 1, 'Євген', '380969269100', 'shvets_06@ukr.net', 'Ураааа.'),
(2, 1, '1', '1234567', 'sh@sd.sd', '345'),
(3, 1, '2e', '12345', '2@ds.sd', '234'),
(4, 1, '1', '1', '1@sda.asd', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Дністер'),
(2, 'Дніпро'),
(3, 'Археологи'),
(4, 'Золотошукачі'),
(5, 'Літо2020');

-- --------------------------------------------------------

--
-- Структура таблицы `tariffs`
--

CREATE TABLE `tariffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `description` blob NOT NULL,
  `picture` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tariffs`
--

INSERT INTO `tariffs` (`id`, `name`, `date_start`, `date_end`, `price`, `description`, `picture`) VALUES
(1, 'Лук та історія', '2021-01-14 10:22:23', '2021-01-29 10:22:23', 2000, 0x31323334353637382031323334353637380d0a313233343536373839203132333435363738390d0a313233343536373830203132333435363738390d0a717765727479313233207177657274793132330d0a717765727479313233332073646266646764666764660d0a, NULL),
(3, 'Меч та історія', '2021-01-14 10:22:23', '2021-01-29 10:22:23', 2500, 0x3c21444f43545950452068746d6c3e0d0a3c68746d6c206c616e673d22656e223e0d0a3c626f6479207374796c653d226261636b67726f756e642d636f6c6f723a20726762283137372c203232362c20313939293b223e200d0a202020203c63656e7465723e0d0a20202020202020203c646976207374796c653d22666f6e742d73697a653a20333070783b20636f6c6f723a206461726b677265656e3b223e0d0a2020202020202020202020205468697320697320746f70206672616d650d0a20202020202020203c2f6469763e0d0a20202020202020203c6120687265663d22312e68746d6c22207461726765743d226d32223e436c69636b3c2f613e0d0a20202020202020203c62723e0d0a20202020202020203c6120687265663d22322e68746d6c223e4261636b3c2f613e0d0a202020203c2f63656e7465723e0d0a3c2f626f64793e0d0a3c2f68746d6c3e, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `test_table`
--

CREATE TABLE `test_table` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `surname` varchar(222) NOT NULL,
  `middle_name` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `test_table`
--

INSERT INTO `test_table` (`id`, `name`, `surname`, `middle_name`) VALUES
(1, 'name1', 'surname1', 'mname1'),
(2, 'name12', 'surname12', 'mname12'),
(3, 'name123', 'surname123', 'mname123');

-- --------------------------------------------------------

--
-- Структура таблицы `tour`
--

CREATE TABLE `tour` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` datetime NOT NULL,
  `days` int(11) NOT NULL,
  `price_1` int(11) NOT NULL,
  `price_2` int(11) NOT NULL,
  `in_price` mediumtext COLLATE utf8mb4_unicode_ci,
  `not_in_price` mediumtext COLLATE utf8mb4_unicode_ci,
  `short_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `complexity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDiscount` tinyint(1) DEFAULT NULL,
  `additional_information` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tour`
--

INSERT INTO `tour` (`id`, `name`, `address`, `date_start`, `days`, `price_1`, `price_2`, `in_price`, `not_in_price`, `short_description`, `long_description`, `complexity`, `isDiscount`, `additional_information`) VALUES
(1, 'Tour1', 'Kyiv', '2021-04-01 09:36:37', 5, 10000, 8000, NULL, NULL, 'Просто текст', 'Довгий дужеві вжалівєалж віліждал ждівлажд лівжда текст', 'Легко', NULL, NULL),
(2, 'Київ - круто', 'Київ', '2021-04-22 10:22:02', 10, 1000, 800, 'проживання', 'їжа, дорога', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Легко', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ornare arcu odio ut sem nulla pharetra diam sit amet. Quam lacus suspendisse faucibus interdum posuere lorem ipsum. Magna sit amet purus gravida. At tellus at urna condimentum mattis pellentesque id nibh tortor. Aliqua'),
(3, 'Чернівці - круто', 'Чернівці', '2021-04-22 10:22:02', 10, 1000, 800, NULL, NULL, 'Тут буде дуже круто (чергівці)', 'Дуже детальна інформація', 'Легко', NULL, NULL),
(4, 'Чернівці - круто2', 'Чернівці', '2021-04-22 10:22:02', 10, 1000, 800, NULL, NULL, 'Тут буде дуже круто (чергівці)fdsfdsfdsfsdfdsfsdfdsfsdfsd', 'Дуже детальна інформаціяfsdfsdfsdfsdfsdfsd', 'Легко', NULL, NULL),
(9, 'Test1', 'Київ', '2021-04-02 08:00:00', 11, 10000, 9500, 'їда', 'проживання', 'Тут буде просто короткий опис', 'Тут буде повний опис', 'Легко', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tour_booking`
--

CREATE TABLE `tour_booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_number_of_people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tour_booking`
--

INSERT INTO `tour_booking` (`id`, `tour_id`, `user_name`, `user_surname`, `user_phone`, `user_email`, `user_number_of_people`, `date_create`) VALUES
(1, 1, 'Євген', 'Швець', '+380969269100', 'shvets_06@ukr.net', '2', '2021-04-01 11:36:15'),
(2, 1, 'dfds', 'dfs', '+4324324324332', 'sdvds@dfs.dsf', '3', '2021-04-01 11:47:18');

-- --------------------------------------------------------

--
-- Структура таблицы `tour_route`
--

CREATE TABLE `tour_route` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tour_route`
--

INSERT INTO `tour_route` (`id`, `tour_id`, `name`, `description`) VALUES
(1, 2, 'Чернівці', 'Твоє місто, майже село'),
(2, 2, 'Тернопіль', 'Файне місто Тернопіль'),
(5, 2, 'Харків', 'Перша столиця України'),
(6, 2, 'Київ', 'Столиця України');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yevhen', 'shvets_06@ukr.net', NULL, '$2y$10$G8OIeRXV.NoEdhA/Y2FQKuUmf5shqhnqA7b.D9v95b8jyDQnqhe1C', 'TYNS1AUf5nPICe92wf9E3vsdSTPPssZJtVS91mWhfJau1BFUcuyCNgbv53AB', '2021-01-18 06:21:18', '2021-01-18 06:21:18');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_tags`
--
ALTER TABLE `post_tags`
  ADD KEY `post_tags_id_tag_foreign` (`id_tag`),
  ADD KEY `post_tags_id_post_foreign` (`id_post`);

--
-- Индексы таблицы `reservetariff`
--
ALTER TABLE `reservetariff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservetariff_id_tarif_foreign` (`id_tarif`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tariffs`
--
ALTER TABLE `tariffs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test_table`
--
ALTER TABLE `test_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tour_booking`
--
ALTER TABLE `tour_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_booking_tour_id_foreign` (`tour_id`);

--
-- Индексы таблицы `tour_route`
--
ALTER TABLE `tour_route`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_route_tour_id_foreign` (`tour_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `reservetariff`
--
ALTER TABLE `reservetariff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tariffs`
--
ALTER TABLE `tariffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `test_table`
--
ALTER TABLE `test_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tour`
--
ALTER TABLE `tour`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `tour_booking`
--
ALTER TABLE `tour_booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tour_route`
--
ALTER TABLE `tour_route`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_id_post_foreign` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `post_tags_id_tag_foreign` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`);

--
-- Ограничения внешнего ключа таблицы `reservetariff`
--
ALTER TABLE `reservetariff`
  ADD CONSTRAINT `reservetariff_id_tarif_foreign` FOREIGN KEY (`id_tarif`) REFERENCES `tariffs` (`id`);

--
-- Ограничения внешнего ключа таблицы `tour_booking`
--
ALTER TABLE `tour_booking`
  ADD CONSTRAINT `tour_booking_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tour_route`
--
ALTER TABLE `tour_route`
  ADD CONSTRAINT `tour_route_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
