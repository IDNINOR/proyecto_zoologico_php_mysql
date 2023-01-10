-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2022 a las 15:37:41
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zoo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `fecha_nac` date NOT NULL,
  `id_pais_origen_fk` int(11) NOT NULL,
  `id_continente_fk` int(11) NOT NULL,
  `id_especie_fk` int(11) NOT NULL,
  `id_sexo_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `ciudad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continente`
--

CREATE TABLE `continente` (
  `id_continente` int(11) NOT NULL,
  `continente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `id_especie` int(11) NOT NULL,
  `nombre_cientifico` varchar(50) NOT NULL,
  `id_estado_extincion_fk` int(11) NOT NULL,
  `id_nombre_vulgar_fk` int(11) NOT NULL,
  `id_familia_fk` int(11) NOT NULL,
  `id_zoo_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_extincion`
--

CREATE TABLE `estado_extincion` (
  `id_estado_extincion` int(11) NOT NULL,
  `estado_extincion` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `id_familia` int(11) NOT NULL,
  `familia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_vulgar`
--

CREATE TABLE `nombre_vulgar` (
  `id_nombre_vulgar` int(11) NOT NULL,
  `nombre_vulgar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `pais` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `sexo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(5) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL DEFAULT 'usuario',
  `respuesta1` varchar(50) NOT NULL,
  `respuesta2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Datos tabla Sexo
--
INSERT INTO `sexo` (`id_sexo`,`sexo`) VALUES 
(1, 'F'),
(2, 'M');
--
-- Datos tabla Continente
--
INSERT INTO `continente`(`id_continente`, `continente`) VALUES 
(1,'Norte America'),
(2, 'Centro America'),
(3, 'Sur America'),
(4, 'Europa'),
(5, 'Asia'),
(6, 'Africa')
;

--
-- Datos tabla nombre_vulgar
--
INSERT INTO `nombre_vulgar`(`id_nombre_vulgar`, `nombre_vulgar`) VALUES 
(1,'Mamíferos'),
(2,'Aves'),
(3,'Reptiles'),
(4,'Anfibios'),
(5,'Peces'),
(6,'Insectos'),
(7,'Esponjas');

--
-- Datos tabla familia
--
INSERT INTO `familia`(`id_familia`, `familia`) VALUES 
(1,'Mammalia'),
(2,'Aves'),
(3,'Reptilia'),
(4,'Amphibia'),
(5,'Pisces'),
(6,'Insecta'),
(7,'Porifera');
--
-- Datos tabla estado extinción
--
INSERT INTO `estado_extincion`(`id_estado_extincion`, `estado_extincion`) VALUES (1,'SI'), (2, 'NO');
--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `usuario`, `clave`, `tipo_usuario`, `respuesta1`, `respuesta2`) VALUES
(1, 'admin', 'admin', 'administrador', 'goku', 'carne'),
(2, 'user', 'user', 'usuario', 'superman', 'frutas'),
(3, 'user2', 'ewqewqewqe', 'usuario', 'rwerwerwer', 'wewewe'),
(5, 'qew', 'qq', 'administrador', 'e', 'e'),
(2018, 'Daniel', 'daniel', 'administrador', 'superman', 'arroz'),
(2132, '2323', '32323', 'usuario', '23232', '2323'),
(222222, 'hernan', 'hernan', 'usuario', 'hulk', 'pasta');
-- --------------------------------------------------------
-- Tabla pais

--
INSERT INTO `pais` (`id_pais`, `pais`) VALUES 
(1, 'Colombia'),
(2, 'Venezuela'),
(3, 'Argentina'),
(4, 'Chile'),
(5, 'Peru');

-- 
-- Tabla ciudades

--
INSERT INTO `ciudad` (`id_ciudad`, `ciudad`) VALUES 

(1,	'Bogotá'),
(2,	'Medellín'),
(3,	'Cali'),
(4,	'Barranquilla'),
(5,	'Cartagena'),
(6,	'Cúcuta')	,
(7,	'Bucaramanga'),
(8,	'Santa Marta'),
(9,	'Ibagué'),
(10, 'Pasto'),
(11, 'Caracas'),
(12, 'Maracaibo'),
(13, 'Maracay'),
(14, 'Barinas'),
(15, 'Buenos Aires'),
(16, 'Rosario'),
(17, 'Mar de la Plata'),
(18, 'Bahia Blanca'),
(19, 'Santiago de Chile'),
(20, 'Concepción'),
(21, 'Valparaiso'),
(22, 'Antofagasta'),
(23, 'Puerto Montt'),
(24, 'Rancagua'),
(25, 'La Serena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_zoo`
--

CREATE TABLE `usuario_zoo` (
  `id_zoo` int(11) NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zoo`
--

CREATE TABLE `zoo` (
  `id_zoo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tamano` int(11) NOT NULL,
  `presupuesto_anual` int(11) NOT NULL,
  `id_pais_fk` int(11) NOT NULL,
  `id_ciudad_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `id_pais_origen_fk` (`id_pais_origen_fk`),
  ADD KEY `id_continente_fk` (`id_continente_fk`),
  ADD KEY `id_especie_fk` (`id_especie_fk`),
  ADD KEY `id_sexo_fk` (`id_sexo_fk`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `continente`
--
ALTER TABLE `continente`
  ADD PRIMARY KEY (`id_continente`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id_especie`),
  ADD KEY `id_zoo_fk` (`id_zoo_fk`),
  ADD KEY `id_familia_fk` (`id_familia_fk`),
  ADD KEY `id_nombre_vulgar_fk` (`id_nombre_vulgar_fk`),
  ADD KEY `id_estado_extincion_fk` (`id_estado_extincion_fk`);

--
-- Indices de la tabla `estado_extincion`
--
ALTER TABLE `estado_extincion`
  ADD PRIMARY KEY (`id_estado_extincion`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id_familia`);

--
-- Indices de la tabla `nombre_vulgar`
--
ALTER TABLE `nombre_vulgar`
  ADD PRIMARY KEY (`id_nombre_vulgar`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuario_zoo`
--
ALTER TABLE `usuario_zoo`
  ADD PRIMARY KEY (`id_zoo`,`codigo`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `zoo`
--
ALTER TABLE `zoo`
  ADD PRIMARY KEY (`id_zoo`),
  ADD KEY `id_pais_fk` (`id_pais_fk`),
  ADD KEY `id_ciudad_fk` (`id_ciudad_fk`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`id_pais_origen_fk`) REFERENCES `pais` (`id_pais`),
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`id_continente_fk`) REFERENCES `continente` (`id_continente`),
  ADD CONSTRAINT `animal_ibfk_3` FOREIGN KEY (`id_especie_fk`) REFERENCES `especie` (`id_especie`),
  ADD CONSTRAINT `animal_ibfk_4` FOREIGN KEY (`id_sexo_fk`) REFERENCES `sexo` (`id_sexo`);

--
-- Filtros para la tabla `especie`
--
ALTER TABLE `especie`
  ADD CONSTRAINT `especie_ibfk_1` FOREIGN KEY (`id_zoo_fk`) REFERENCES `zoo` (`id_zoo`),
  ADD CONSTRAINT `especie_ibfk_2` FOREIGN KEY (`id_familia_fk`) REFERENCES `familia` (`id_familia`),
  ADD CONSTRAINT `especie_ibfk_3` FOREIGN KEY (`id_nombre_vulgar_fk`) REFERENCES `nombre_vulgar` (`id_nombre_vulgar`),
  ADD CONSTRAINT `especie_ibfk_4` FOREIGN KEY (`id_estado_extincion_fk`) REFERENCES `estado_extincion` (`id_estado_extincion`);

--
-- Filtros para la tabla `usuario_zoo`
--
ALTER TABLE `usuario_zoo`
  ADD CONSTRAINT `usuario_zoo_ibfk_1` FOREIGN KEY (`id_zoo`) REFERENCES `zoo` (`id_zoo`),
  ADD CONSTRAINT `usuario_zoo_ibfk_2` FOREIGN KEY (`codigo`) REFERENCES `usuarios` (`codigo`);

--
-- Filtros para la tabla `zoo`
--
ALTER TABLE `zoo`
  ADD CONSTRAINT `zoo_ibfk_1` FOREIGN KEY (`id_pais_fk`) REFERENCES `pais` (`id_pais`),
  ADD CONSTRAINT `zoo_ibfk_2` FOREIGN KEY (`id_ciudad_fk`) REFERENCES `ciudad` (`id_ciudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
