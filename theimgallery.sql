-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2024 a las 20:24:22
-- Versión del servidor: 8.1.0
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `theimgallery`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE `image` (
  `img_id` int NOT NULL,
  `img_title` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `img_capt` varchar(1000) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `img_date` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `img_img` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `img_user` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `prof_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `image`
--

INSERT INTO `image` (`img_id`, `img_title`, `img_capt`, `img_date`, `img_img`, `img_user`, `prof_id`) VALUES
(3, 'Chopper', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '13/12/23', 'uploads/chopper_wano13_12_23_32.jpg', 'Juan', 24),
(4, 'Fallout New Vegas', 'Fallout: New Vegas es un videojuego de rol de 2010 perteneciente a la saga Fallout, desarrollado por Obsidian Entertainment, y distribuido por Bethesda Softworks, considerado por muchos el mejor Fallout moderno, y uno de los mejores videojuegos de toda la franquicia.', '13/12/23', 'uploads/newvegas13_12_23_65.png', 'Magazine', 26),
(5, 'Kanye Breast', 'One piece, one piece is reaaaaaaal', '14/12/23', 'uploads/imagen_2023-12-14_13303306014_12_23_67.png', 'Magazine', 26),
(9, 'Chu-Suke', 'The mouse fighter', '17/01/24', 'uploads/imagen_2024-01-17_09540422217_01_24_36.png', 'Yendro', 25),
(10, 'Dragón de ojos azules', 'Pero este es la versión definitiva', '17/01/24', 'uploads/imagen_2024-01-17_09550994117_01_24_52.png', 'Yendro', 25),
(11, 'Morra', 'Una morra para hacer pruebas', '17/01/24', 'uploads/402853289_357257160309789_1457046454937233954_n17_01_24_99.jpg', 'YailCastle', 27),
(12, 'Aborigenes', 'Equisde', '17/01/24', 'uploads/imagen_2024-01-17_12452261817_01_24_70.png', 'Kike ac', 28),
(13, 'No sé', 'asasas', '17/01/24', 'uploads/sanji-chopper17_01_24_61.jpg', 'Yendro', 25),
(14, 'Mi bebé hermosa', 'Yamato te amo', '22/01/24', 'uploads/yamato22_01_24_88.png', 'Samarripa', 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `prof_id` int NOT NULL,
  `prof_img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `prof_bio` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `prof_color` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `prof_fontcolor` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`prof_id`, `prof_img`, `prof_bio`, `prof_color`, `prof_fontcolor`, `id`) VALUES
(24, 'web/uploads/profpics/profpic_Juan(24).png', '', '--default', '--white', 24),
(25, 'web/uploads/profpics/profpic_Yendro(25).jpg', 'Ocho trigramas, sesenta y cuatro palmas', '--lgray', '--black', 25),
(26, 'web/uploads/profpics/profpic_Magazine(26).png', 'Prueba de cambio de biografía', '--black', '--white', 26),
(27, 'web/uploads/profpics/profpic_YailCastle(27).png', 'Nothing to think about', '--default', '--white', 27),
(28, 'web/uploads/profpics/profpic_Kike ac(28).png', '', '--default', '--white', 28),
(29, 'web/uploads/profpics/profpic_Samarripa(29).png', 'aasdasd', '--pink', '--white', 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'miguel', 'FzUvFd4gWUunM00i4NZ35ioKyC_qOpIU', '$2y$13$x3XLV7XoDE9ikIP1uqQUQeHo2peybhwI5NNDWC5Zw0YtPn2XcuANe', NULL, 'admin@gmail.com', 10, 1579751199, 1579751199, 'CAp88Usjux4EInTX0BajYWvomEyGcUtI_1579751199'),
(24, 'Juan', '9pFqnTA_dEbNzLqrRWz9VoDuFLmk1oaO', '$2y$13$tRwVj03uHfhSzW7hEr8INeu1lOyNSMvtz5zm0zZg7bDM0WwW7612S', NULL, 'juan@bombas.com', 10, 1702491763, 1702491763, 'h61tmihbDs8bcO__Pvk23_KJkdOiX_yV_1702491763'),
(25, 'Yendro', 'Xtm9gXarvxUUTclg-vyKROubTfwFBNBx', '$2y$13$c9HWqxQUnoMX4ize25feiuHEDxRYyOEfxbulEtwecnLsi4RyYpmIO', NULL, 'yendro@loco.com', 10, 1702492069, 1702492069, 'MnVybTTnL1yn8r7ZIvwUxUwavP-VTslF_1702492069'),
(26, 'Magazine', '0eCKGzAFKoOgpLB0X-nWr3jMH-a1HIb3', '$2y$13$cIlPBV68cHAqlGWp5SA0rOXuXh6tiuVC2kPvtff4m/uCWcpYRUD/W', NULL, 'magazine@rodri.com', 10, 1702495834, 1702495834, '0_RgS8wGhPy-_k4okCAFbFZE-GJK5kpD_1702495834'),
(27, 'YailCastle', '4Sjpt43yaOGyyzJDBoiDzF4Pv5dvjqxx', '$2y$13$JWiEMR7TjsI/2D3G/eEU4eMTJMKXsqAZA5x.c6STKEfMTFvbVh6M.', NULL, 'yail.castle@gmail.com', 10, 1705507194, 1705507194, 'R2LhGXyHN-LWjzv58gy5QGW2SQRNVrYk_1705507194'),
(28, 'Kike ac', '4IZ2zTFil6YbPHjemtUIbUpQ7iwoddYj', '$2y$13$LlUldCtkgUDfNgrZgZyWEOyDtouBOfcS6vRMKuWXvINrtiSlO8no2', NULL, 'kikeac@gmail.com', 10, 1705517090, 1705517090, '9PWEUUjU-EMMzjyAVOPZOh22OQ_gNMpW_1705517090'),
(29, 'Samarripa', 'RI8rIiHV1Hg5h3AOom_flrfMY2_o-nbz', '$2y$13$se8z.C7t03F5Js6pIPR8J.W.23QU/EBstHGXSJPqrYTVYZChdC6Zi', NULL, 'sama@rripa.com', 10, 1705947671, 1705947671, 'uiWbU0JvXpLPGZ4RJ3RctAojPbKAMPIV_1705947671');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `prof_id` (`prof_id`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`prof_id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `prof_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `profile` (`prof_id`);

--
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
