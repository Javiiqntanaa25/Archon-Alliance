-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 16:08:52
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS projectg;
CREATE DATABASE projectg;
USE projectg;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projectg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `characters`
--

CREATE TABLE `characters` (
  `name` varchar(40) NOT NULL,
  `element` enum('Anemo','Geo','Pyro','Cryo','Hydro','Electro','Dendro') DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `img_Banner` varchar(200) NOT NULL,
  `weapon` enum('Espada ligera','Mandoble','Arco','Catalizador','Lanza') DEFAULT NULL,
  `rareza` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `characters`
--

INSERT INTO `characters` (`name`, `element`, `img`, `img_Banner`, `weapon`, `rareza`) VALUES
('Albedo', 'Geo', 'albedo_icon.png', 'albedo_banner.png', 'Espada ligera', '5'),
('Alhaitham', 'Dendro', 'alhatham_icon.png', 'alhaitham_banner.png', 'Espada ligera', '5'),
('Amber', 'Pyro', 'amber_icon.png\r\n', 'amber_banner.png', 'Arco', '4'),
('Arataki Itto', 'Geo', 'itto_icon.png', 'arataki Itto_banner.png', 'Mandoble', '5'),
('Baizhu', 'Dendro', 'baizhu_icon.png', 'baizhu_banner.png', 'Catalizador', '5'),
('Barbara', 'Hydro', 'barbara_icon.png', 'barbara_banner.png', 'Catalizador', '4'),
('Beidou', 'Electro', 'beidou_icon.png', 'beidou_banner.png', 'Mandoble', '4'),
('Bennett', 'Pyro', 'bennett_icon.png', 'bennett_banner.png', 'Espada ligera', '4'),
('Candance', 'Hydro', 'candance_icon.png', 'candance_banner.png', 'Lanza', '4'),
('Chongyun', 'Cryo', 'chongyun_icon.png', 'chongyun_banner.png', 'Mandoble', '4'),
('Collei', 'Dendro', 'collei_icon.png', 'collei_banner.png', 'Arco', '4'),
('Cyno', 'Electro', 'cyno_icon.png', 'cyno_banner.png', 'Lanza', '5'),
('Dehya', 'Pyro', 'dehya_icon.png', 'dehya_banner.png', 'Mandoble', '5'),
('Diluc', 'Pyro', 'diluc_icon.png', 'diluc_banner.png', 'Mandoble', '5'),
('Diona', 'Cryo', 'diona_icon.png', 'diona_banner.png', 'Arco', '4'),
('Dori', 'Electro', 'dori_icon.png', 'dori_banner.png', 'Mandoble', '4'),
('Eula', 'Cryo', 'eula_icon.png', 'eula_banner.png', 'Mandoble', '5'),
('Faruzan', 'Anemo', 'faruzan_icon.png', 'faruzan_banner.png', 'Arco', '4'),
('Fischl', 'Electro', 'fischl_icon.png', 'fischl_banner.png', 'Arco', '4'),
('Freminet', 'Cryo', 'freminet_icon.png', 'freminet_banner.png', 'Mandoble', '4'),
('Ganyu', 'Cryo', 'ganyu_icon.png', 'ganyu_banner.png', 'Arco', '5'),
('Gorou', 'Geo', 'gorou_icon.png', 'gorou_banner.png', 'Arco', '4'),
('Hu Tao', 'Pyro', 'hutao_icon.png', 'hu tao_banner.png', 'Lanza', '5'),
('Jean', 'Anemo', 'jean_icon.png', 'jean_banner.png', 'Espada ligera', '5'),
('Kaedehara Kazuha', 'Anemo', 'kazuha_icon.png', 'kaedehara kazuha_banner.png', 'Espada ligera', '5'),
('Kaeya', 'Cryo', 'kaeya_icon.png', 'kaeya_banner.png', 'Espada ligera', '4'),
('Kamisato Ayaka', 'Cryo', 'ayaka_icon.png', 'kamisato ayaka_banner.png', 'Espada ligera', '5'),
('Kamisato Ayato', 'Hydro', 'ayato_icon.png', 'kamisato ayato_banner.png', 'Espada ligera', '5'),
('Kaveh', 'Dendro', 'kaveh_icon.png', 'kaveh_banner.png', 'Mandoble', '4'),
('Keqing', 'Electro', 'keqing_icon.png', 'keqing_banner.png', 'Espada ligera', '5'),
('Kirara', 'Dendro', 'kirara_icon.png', 'kirara_banner.png', 'Espada ligera', '4'),
('Klee', 'Pyro', 'klee_icon.png', 'klee_banner.png', 'Catalizador', '5'),
('Kujou Sara', 'Electro', 'sara_icon.png', 'kujou sara_banner.png', 'Arco', '4'),
('Kuki Shinobu', 'Electro', 'kuki_icon.png', 'kuki shinobu_banner.png', 'Espada ligera', '4'),
('Layla', 'Cryo', 'layla_icon.png', 'layla_banner.png', 'Espada ligera', '4'),
('Lisa', 'Electro', 'lisa_icon.png', 'lisa_banner.png', 'Catalizador', '4'),
('Lynette', 'Anemo', 'lynette_icon.png', 'lynette_banner.png', 'Espada ligera', '4'),
('Lyney', 'Pyro', 'lyney_icon.png', 'lyney_banner.png', 'Arco', '5'),
('Mika', 'Cryo', 'mika_icon.png', 'mika_banner.png', 'Lanza', '4'),
('Mona', 'Hydro', 'mona_icon.png', 'mona_banner.png', 'Catalizador', '5'),
('Nahida', 'Dendro', 'nahida_icon.png', 'nahida_banner.png', 'Catalizador', '5'),
('Neuvillette', 'Hydro', 'neuvillette_icon.png', 'neuvillette_banner.png', 'Catalizador', '5'),
('Nilou', 'Hydro', 'nilou_icon.png', 'nilou_banner.png', 'Espada ligera', '5'),
('Ningguang', 'Geo', 'ningguang_icon.png', 'ningguang_banner.png', 'Catalizador', '4'),
('Noelle', 'Geo', 'noelle_icon.png', 'noelle_banner.png', 'Mandoble', '4'),
('Qiqi', 'Cryo', 'qiqi_icon.png', 'qiqi_banner.png', 'Espada ligera', '5'),
('Raiden Shogun', 'Electro', 'shogunraiden_icon.png', 'raiden shogun_banner.png', 'Lanza', '5'),
('Razor', 'Electro', 'razor_icon.png', 'razor_banner.png', 'Mandoble', '4'),
('Rosaria', 'Cryo', 'rosaria_icon.png', 'rosaria_banner.png', 'Lanza', '4'),
('Sangonomiya Kokomi', 'Hydro', 'kokomi_icon.png', 'sangonomiya kokomi_banner.png', 'Catalizador', '5'),
('Sayu', 'Anemo', 'sayu_icon.png', 'sayu_banner.png', 'Mandoble', '4'),
('Shenhe', 'Cryo', 'shenhe_icon.png', 'shenhe_banner.png', 'Lanza', '5'),
('Shikanoin Heizou', 'Anemo', 'heizou_icon.png', 'shikanoin heizou_banner.png', 'Catalizador', '4'),
('Sucrose', 'Anemo', 'sucrose_icon.png', 'sucrose_banner.png', 'Catalizador', '4'),
('Tartaglia', 'Hydro', 'tartaglia_icon.png', 'tartaglia_banner.png', 'Arco', '5'),
('Thoma', 'Pyro', 'thoma_icon.png', 'thoma_banner.png', 'Lanza', '4'),
('Tighnari', 'Dendro', 'tighnari_icon.png', 'tighnari_banner.png', 'Arco', '5'),
('Venti', 'Anemo', 'venti_icon.png', 'venti_banner.png', 'Arco', '5'),
('Wanderer', 'Anemo', 'wanderer_icon.png', 'wanderer_banner.png', 'Catalizador', '5'),
('Wriothesley', 'Cryo', 'wriothesley_icon.png', 'wriothesley_banner.png', 'Catalizador', '5'),
('Xiangling', 'Pyro', 'xiangling_icon.png', 'xiangling_banner.png', 'Lanza', '4'),
('Xiao', 'Anemo', 'xiao_icon.png', 'xiao_banner.png', 'Lanza', '5'),
('Xingqiu', 'Hydro', 'xingqiu_icon.png', 'xingqiu_banner.png', 'Espada ligera', '4'),
('Xinyan', 'Pyro', 'xinyan_icon.png', 'xinyan_banner.png', 'Mandoble', '4'),
('Yae Miko', 'Electro', 'yae_icon.png', 'yae miko_banner.png', 'Catalizador', '5'),
('Yanfei', 'Pyro', 'yanfei_icon.png', 'yanfei_banner.png', 'Catalizador', '4'),
('Yaoyao', 'Dendro', 'yaoyao_icon.png', 'yaoyao_banner.png', 'Lanza', '4'),
('Yelan', 'Hydro', 'yelan_icon.png', 'yelan_banner.png', 'Arco', '5'),
('Yoimiya', 'Pyro', 'yoimiya_icon.png', 'yoimiya_banner.png', 'Arco', '5'),
('Yun Jin', 'Geo', 'yunjin_icon.png', 'yunjin_banner.png', 'Lanza', '4'),
('Zhongli', 'Geo', 'zhongli_icon.png', 'zhongli_banner.png', 'Lanza', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `player`
--

CREATE TABLE `player` (
  `ID` varchar(9) NOT NULL COMMENT 'Player''s uid',
  `passw` varchar(64) NOT NULL,
  `usrName` varchar(30) NOT NULL COMMENT 'In game name',
  `lvl` varchar(2) NOT NULL COMMENT 'Player''s lvl',
  `WorldLevel` varchar(1) NOT NULL COMMENT 'Player''s world lvl',
  `PFP` varchar(200) DEFAULT NULL COMMENT 'Player''s profile picture',
  `usrDescription` varchar(100) DEFAULT NULL COMMENT 'Player''s description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Player''s info';

--
-- Volcado de datos para la tabla `player`
--

INSERT INTO `player` (`ID`, `passw`, `usrName`, `lvl`, `WorldLevel`, `PFP`, `usrDescription`) VALUES
('700040802', '$2y$10$iiNeINB94BeJpngPMl7e6ecIU50v1FNnq0UZvOmC8XrdDLxzzz7K.', 'Javii', '60', '8', NULL, 'Yelan step on me');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `id_team` int(1) NOT NULL,
  `player_uid` varchar(9) DEFAULT NULL,
  `character1` varchar(30) DEFAULT NULL,
  `character2` varchar(30) DEFAULT NULL,
  `character3` varchar(30) DEFAULT NULL,
  `character4` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `teams`
--

INSERT INTO `teams` (`id`, `id_team`, `player_uid`, `character1`, `character2`, `character3`, `character4`) VALUES
(1, 1, '700040802', 'Alhaitham', 'Arataki Itto', 'Chongyun', 'Collei'),
(2, 2, '700040802', 'Alhaitham', 'Amber', 'Cyno', 'Jean'),
(3, 3, '700040802', 'Baizhu', 'Amber', 'Candance', 'Alhaitham'),
(10, 4, '700040802', 'Alhaitham', 'Amber', 'Dehya', 'Cyno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `img` (`img`);

--
-- Indices de la tabla `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teams` (`id_team`),
  ADD KEY `teams_ibfk_1` (`player_uid`),
  ADD KEY `teams_ibfk_2` (`character1`),
  ADD KEY `teams_ibfk_3` (`character2`),
  ADD KEY `teams_ibfk_4` (`character3`),
  ADD KEY `teams_ibfk_5` (`character4`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`player_uid`) REFERENCES `player` (`ID`),
  ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`character1`) REFERENCES `characters` (`name`),
  ADD CONSTRAINT `teams_ibfk_3` FOREIGN KEY (`character2`) REFERENCES `characters` (`name`),
  ADD CONSTRAINT `teams_ibfk_4` FOREIGN KEY (`character3`) REFERENCES `characters` (`name`),
  ADD CONSTRAINT `teams_ibfk_5` FOREIGN KEY (`character4`) REFERENCES `characters` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
