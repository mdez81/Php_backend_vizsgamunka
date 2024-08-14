-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Aug 13. 10:18
-- Kiszolgáló verziója: 8.4.0
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `konyvtar_app`
--
-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int NOT NULL,
  `felhasznalo_id` int NOT NULL,
  `nev` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `felhasznalonev` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `jelszo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email_cim` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `telefonszam` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `statusz` int NOT NULL,
  `letrehozas_datuma` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modositas_datuma` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `felhasznalo_id`, `nev`, `felhasznalonev`, `jelszo`, `email_cim`, `telefonszam`, `statusz`, `letrehozas_datuma`, `modositas_datuma`) VALUES
(1, 100, 'Anuj kumar', 'ankum76', '$2y$10$5WKSPpg5F8/16wN2sKVdle2.bZ0k7zBgHXSGG1qI4WaXB9wExiUd2', 'teszt@gmail.com', '9865472555', 0, '2024-07-09 11:42:35', '2024-07-28 12:09:13'),
(22, 101, 'gipszj76', 'Gipsz Jakab', '$2y$10$IppOiQVeQZ/AmSfJBIG/3.KbG044Km7U2dUaAUEUGg.e4Rm7tA.ga', 'gipszj67@mail.com', '00365400000', 0, '2024-07-29 06:45:46', '2024-08-07 15:52:53'),
(23, 102, 'soma65', 'kovács Soma', '$2y$10$ZXFzMlXmJOi4uQGRcsP32eXMlxqM5pm.Kdx65Imsq0IOgXiZttjre', 'soma65@mail.com', '00363021100', 0, '2024-07-29 06:58:18', '2024-08-07 15:52:59'),
(58, 105, 'zéé', 'Zelk Zoltán', '$2y$10$UX21l9KgqR9hyPucOPRj6uiq5Pl16ESbb8WBPD80ML9BGyBQ83X4q', 'zz@mail.com', '00365400000', 0, '2024-08-07 16:29:00', '2024-08-07 16:29:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int NOT NULL,
  `kategoria_neve` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `statusz` int NOT NULL,
  `letrehozas_datuma` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modositas_datuma` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategoria`
--

INSERT INTO `kategoria` (`id`, `kategoria_neve`, `statusz`, `letrehozas_datuma`, `modositas_datuma`) VALUES
(4, 'Romantic', 1, '2024-01-31 06:23:03', '2024-02-04 05:33:43'),
(5, 'Technology', 1, '2024-01-31 06:23:03', '2024-02-04 05:33:51'),
(6, 'Science', 1, '2024-01-31 06:23:03', '2024-02-04 05:33:51'),
(7, 'Management', 1, '2024-01-31 06:23:03', '2024-02-04 05:33:51'),
(8, 'General', 1, '2024-01-31 06:23:03', '2024-02-04 05:33:51'),
(9, 'Programming tech', 1, '2024-01-31 06:23:03', '2024-08-08 12:17:02');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kolcsonzes`
--

CREATE TABLE `kolcsonzes` (
  `id` int NOT NULL,
  `konyv_id` int NOT NULL,
  `felhasznalo_id` int NOT NULL,
  `kolcsonzes_datuma` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `visszavetel_datuma` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `visszahozva_vane` int NOT NULL,
  `birsag` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `kolcsonzes`
--

INSERT INTO `kolcsonzes` (`id`, `konyv_id`, `felhasznalo_id`, `kolcsonzes_datuma`, `visszavetel_datuma`, `visszahozva_vane`, `birsag`) VALUES
(16, 9, 58, '2024-08-11 12:00:58', '2024-08-13 08:16:40', 1, 0),
(19, 9, 22, '2024-08-11 12:27:08', NULL, 0, NULL),
(20, 5, 23, '2024-08-11 12:35:46', NULL, 0, NULL),
(21, 9, 58, '2024-08-12 07:48:20', NULL, 0, NULL),
(22, 9, 1, '2024-08-12 10:35:00', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `konyvek`
--

CREATE TABLE `konyvek` (
  `id` int NOT NULL,
  `cim` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `katalogus_id` int NOT NULL,
  `szerzo_id` int NOT NULL,
  `isbn` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `fenykep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `kolcsonozve_vane` int NOT NULL DEFAULT '0',
  `letrehozas_datuma` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modositas_datuma` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `konyvek`
--

INSERT INTO `konyvek` (`id`, `cim`, `katalogus_id`, `szerzo_id`, `isbn`, `fenykep`, `kolcsonozve_vane`, `letrehozas_datuma`, `modositas_datuma`) VALUES
(1, 'Php  reference', 6, 2, '2223330000000', '1efecc0ca822e40b7b673c0d79ae943f.jpg', 1, '2024-01-30 06:23:03', '2024-08-09 08:03:09'),
(3, 'physics', 6, 4, '1111', 'dd8267b57e0e4feee5911cb1e1a03a79.jpg', 0, '2024-01-30 06:23:03', '2024-08-13 08:13:42'),
(5, 'Murach\'s MySQL', 5, 1, '9350237695', '5939d64655b4d2ae443830d73abc35b6.jpg', 1, '2024-01-30 06:23:03', '2024-02-04 05:34:11'),
(6, 'WordPress for Beginners 2022: A Visual Step-by-Step Guide to Mastering WordPress', 5, 10, 'B019MO3WCM', '144ab706ba1cb9f6c23fd6ae9c0502b3.jpg', 0, '2024-01-30 06:23:03', '2024-02-04 05:34:11'),
(7, 'WordPress Mastery Guide:', 5, 11, 'B09NKWH7NP', '90083a56014186e88ffca10286172e64.jpg', 0, '2024-01-30 06:23:03', '2024-02-04 05:34:11'),
(8, 'Rich Dad Poor Dad: What the Rich Teach Their Kids About Money That the Poor and Middle Class Do Not', 8, 12, 'B07C7M8SX9', '52411b2bd2a6b2e0df3eb10943a5b640.jpg', 0, '2024-01-30 06:23:03', '2024-02-04 05:34:11'),
(9, 'The Girl Who Drank the Moon', 8, 13, '1848126476', 'f05cd198ac9335245e1fdffa793207a7.jpg', 0, '2024-01-30 06:23:03', '2024-08-13 08:16:40'),
(10, 'C++: The Complete Reference, 4th Edition', 5, 14, '007053246X', '36af5de9012bf8c804e499dc3c3b33a5.jpg', 0, '2024-01-30 06:23:03', '2024-02-04 05:34:11'),
(11, 'ASP.NET Core 5 for Beginners', 9, 11, 'GBSJ36344563', 'b1b6788016bbfab12cfd2722604badc9.jpg', 0, '2024-01-30 06:23:03', '2024-02-04 05:34:11'),
(41, 'Effective Java', 9, 2, '2223330000001', '36578715o.jpg', 0, '2024-08-08 11:37:07', '2024-08-13 08:13:19'),
(42, 'Php pocket reference', 9, 10, '0123457891011', 'php-pocket-reference.jpg', 0, '2024-08-08 12:18:10', '2024-08-08 12:18:10');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendszer_felhasznalok`
--

CREATE TABLE `rendszer_felhasznalok` (
  `id` int NOT NULL,
  `nev` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `felhasznalo_nev` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `jelszo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email_cim` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `modositas_datuma` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `rendszer_felhasznalok`
--

INSERT INTO `rendszer_felhasznalok` (`id`, `nev`, `felhasznalo_nev`, `jelszo`, `email_cim`, `modositas_datuma`) VALUES
(1, 'Anuj Kumar', 'admin', '$2y$10$5WKSPpg5F8/16wN2sKVdle2.bZ0k7zBgHXSGG1qI4WaXB9wExiUd2', 'admin@gmail.com', '2024-07-27 11:12:13');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szerzok`
--

CREATE TABLE `szerzok` (
  `id` int NOT NULL,
  `szerzo_neve` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `letrehozas_datuma` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modositas_datuma` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `szerzok`
--

INSERT INTO `szerzok` (`id`, `szerzo_neve`, `letrehozas_datuma`, `modositas_datuma`) VALUES
(1, 'Anuj kumara', '2024-01-25 06:23:03', '2024-08-07 15:30:55'),
(2, 'Chetan Bhagatt', '2024-01-25 06:23:03', '2024-02-04 05:34:26'),
(3, 'Anita Desai', '2024-01-25 06:23:03', '2024-02-04 05:34:26'),
(4, 'HC Verma', '2024-01-25 06:23:03', '2024-02-04 05:34:26'),
(5, 'R.D. Sharma ', '2024-01-25 06:23:03', '2024-02-04 05:34:26'),
(9, 'fwdfrwer', '2024-01-25 06:23:03', '2024-02-04 05:34:26'),
(10, 'Dr. Andy Williams', '2024-01-25 06:23:03', '2024-02-04 05:34:26'),
(11, 'Kyle Hill', '2024-01-25 06:23:03', '2024-02-04 05:34:26'),
(12, 'Robert T. Kiyosak', '2024-01-25 06:23:03', '2024-02-04 05:34:26'),
(13, 'Kelly Barnhill', '2024-01-25 06:23:03', '2024-02-04 05:34:26'),
(14, 'Herbert Schildt', '2024-01-25 06:23:03', '2024-02-04 05:34:26'),
(48, 'Damy Moor', '2024-08-08 12:15:27', '2024-08-08 12:15:27'),
(49, 'Dany haily', '2024-08-08 12:15:49', '2024-08-08 12:15:49'),
(50, 'Dany haily', '2024-08-08 12:16:02', '2024-08-08 12:16:02');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_cim` (`email_cim`);

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kolcsonzes`
--
ALTER TABLE `kolcsonzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `koo_id` (`konyv_id`),
  ADD KEY `f_id` (`felhasznalo_id`);

--
-- A tábla indexei `konyvek`
--
ALTER TABLE `konyvek`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `sz_id` (`szerzo_id`),
  ADD KEY `ka_id` (`katalogus_id`);

--
-- A tábla indexei `rendszer_felhasznalok`
--
ALTER TABLE `rendszer_felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_cim` (`email_cim`);

--
-- A tábla indexei `szerzok`
--
ALTER TABLE `szerzok`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `kolcsonzes`
--
ALTER TABLE `kolcsonzes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT a táblához `konyvek`
--
ALTER TABLE `konyvek`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT a táblához `rendszer_felhasznalok`
--
ALTER TABLE `rendszer_felhasznalok`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `szerzok`
--
ALTER TABLE `szerzok`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `kolcsonzes`
--
ALTER TABLE `kolcsonzes`
  ADD CONSTRAINT `kolcsonzes_ibfk_1` FOREIGN KEY (`konyv_id`) REFERENCES `konyvek` (`id`),
  ADD CONSTRAINT `kolcsonzes_ibfk_2` FOREIGN KEY (`konyv_id`) REFERENCES `konyvek` (`id`),
  ADD CONSTRAINT `kolcsonzes_ibfk_3` FOREIGN KEY (`konyv_id`) REFERENCES `konyvek` (`id`),
  ADD CONSTRAINT `kolcsonzes_ibfk_4` FOREIGN KEY (`konyv_id`) REFERENCES `konyvek` (`id`),
  ADD CONSTRAINT `kolcsonzes_ibfk_5` FOREIGN KEY (`konyv_id`) REFERENCES `konyvek` (`id`),
  ADD CONSTRAINT `kolcsonzes_ibfk_6` FOREIGN KEY (`felhasznalo_id`) REFERENCES `felhasznalok` (`id`);

--
-- Megkötések a táblához `konyvek`
--
ALTER TABLE `konyvek`
  ADD CONSTRAINT `konyvek_ibfk_1` FOREIGN KEY (`szerzo_id`) REFERENCES `szerzok` (`id`),
  ADD CONSTRAINT `konyvek_ibfk_10` FOREIGN KEY (`katalogus_id`) REFERENCES `kategoria` (`id`),
  ADD CONSTRAINT `konyvek_ibfk_2` FOREIGN KEY (`katalogus_id`) REFERENCES `kategoria` (`id`),
  ADD CONSTRAINT `konyvek_ibfk_3` FOREIGN KEY (`szerzo_id`) REFERENCES `szerzok` (`id`),
  ADD CONSTRAINT `konyvek_ibfk_4` FOREIGN KEY (`katalogus_id`) REFERENCES `kategoria` (`id`),
  ADD CONSTRAINT `konyvek_ibfk_5` FOREIGN KEY (`szerzo_id`) REFERENCES `szerzok` (`id`),
  ADD CONSTRAINT `konyvek_ibfk_6` FOREIGN KEY (`katalogus_id`) REFERENCES `kategoria` (`id`),
  ADD CONSTRAINT `konyvek_ibfk_7` FOREIGN KEY (`szerzo_id`) REFERENCES `szerzok` (`id`),
  ADD CONSTRAINT `konyvek_ibfk_8` FOREIGN KEY (`katalogus_id`) REFERENCES `kategoria` (`id`),
  ADD CONSTRAINT `konyvek_ibfk_9` FOREIGN KEY (`szerzo_id`) REFERENCES `szerzok` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
