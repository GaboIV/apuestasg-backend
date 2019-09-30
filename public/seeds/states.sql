
--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name`, `iso_3166-2`) VALUES
(1, 'Amazonas', 'VE-X'),
(2, 'Anzoátegui', 'VE-B'),
(3, 'Apure', 'VE-C'),
(4, 'Aragua', 'VE-D'),
(5, 'Barinas', 'VE-E'),
(6, 'Bolívar', 'VE-F'),
(7, 'Carabobo', 'VE-G'),
(8, 'Cojedes', 'VE-H'),
(9, 'Delta Amacuro', 'VE-Y'),
(10, 'Falcón', 'VE-I'),
(11, 'Guárico', 'VE-J'),
(12, 'Lara', 'VE-K'),
(13, 'Mérida', 'VE-L'),
(14, 'Miranda', 'VE-M'),
(15, 'Monagas', 'VE-N'),
(16, 'Nueva Esparta', 'VE-O'),
(17, 'Portuguesa', 'VE-P'),
(18, 'Sucre', 'VE-R'),
(19, 'Táchira', 'VE-S'),
(20, 'Trujillo', 'VE-T'),
(21, 'Vargas', 'VE-W'),
(22, 'Yaracuy', 'VE-U'),
(23, 'Zulia', 'VE-V'),
(24, 'Distrito Capital', 'VE-A'),
(25, 'Dependencias Federales', 'VE-Z');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
