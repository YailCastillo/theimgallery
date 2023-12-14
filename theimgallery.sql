-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2023 a las 21:06:51
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
(1, 'Basura', 'monomonomonomonomonomono', '13/12/23', 'uploads/yamato13_12_23_61.png', 'Yendro', 25),
(2, 'Dedoooooooooo', 'naminaminaminaminaminami', '13/12/23', 'uploads/Nami_wano13_12_23_83.png', 'Yendro', 25),
(3, 'Chopper', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '13/12/23', 'uploads/chopper_wano13_12_23_32.jpg', 'Juan', 24),
(4, 'Fallout New Vegas', 'Fallout: New Vegas es un videojuego de rol de 2010 perteneciente a la saga Fallout, desarrollado por Obsidian Entertainment, y distribuido por Bethesda Softworks, considerado por muchos el mejor Fallout moderno, y uno de los mejores videojuegos de toda la franquicia.', '13/12/23', 'uploads/newvegas13_12_23_65.png', 'Magazine', 26),
(5, 'Kanye Breast', 'One piece, one piece is reaaaaaaal', '14/12/23', 'uploads/imagen_2023-12-14_13303306014_12_23_67.png', 'Magazine', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `prof_id` int NOT NULL,
  `prof_img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `prof_bio` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`prof_id`, `prof_img`, `prof_bio`, `id`) VALUES
(24, 'images/user_icon.jpg', NULL, 24),
(25, '/uploads/profpics/mono14_12_23_52.jpg', 'Mono parado de mono', 25),
(26, 'uploads/profpics/profpic_Magazine(26).png', 'Prueba de cambio de biografía', 26);

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
(26, 'Magazine', '0eCKGzAFKoOgpLB0X-nWr3jMH-a1HIb3', '$2y$13$cIlPBV68cHAqlGWp5SA0rOXuXh6tiuVC2kPvtff4m/uCWcpYRUD/W', NULL, 'magazine@rodri.com', 10, 1702495834, 1702495834, '0_RgS8wGhPy-_k4okCAFbFZE-GJK5kpD_1702495834');

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
  MODIFY `img_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `prof_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
