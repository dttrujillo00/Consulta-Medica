-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2021 a las 04:54:45
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultamedica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificativo`
--

CREATE TABLE `calificativo` (
  `id_cal` int(10) UNSIGNED NOT NULL,
  `calificacion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calificativo`
--

INSERT INTO `calificativo` (`id_cal`, `calificacion`) VALUES
(1, 'Bien'),
(2, 'Regular'),
(3, 'Mal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cdr`
--

CREATE TABLE `cdr` (
  `id_cdr` int(10) UNSIGNED NOT NULL,
  `no_cdr` int(10) UNSIGNED NOT NULL,
  `nombre_cdr` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cdr_nucleo`
--

CREATE TABLE `cdr_nucleo` (
  `id_nuc` int(10) UNSIGNED NOT NULL,
  `id_cdr` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `circunscripcion`
--

CREATE TABLE `circunscripcion` (
  `id_cir` int(10) UNSIGNED NOT NULL,
  `no_cir` int(10) UNSIGNED NOT NULL,
  `nombre_cir` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cir_cdr`
--

CREATE TABLE `cir_cdr` (
  `id_cdr` int(10) UNSIGNED NOT NULL,
  `id_cir` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cond_estr_viv`
--

CREATE TABLE `cond_estr_viv` (
  `id_nuc` int(10) UNSIGNED NOT NULL,
  `id_cal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eq_dom_bas`
--

CREATE TABLE `eq_dom_bas` (
  `id_nuc` int(10) UNSIGNED NOT NULL,
  `id_cal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `id_eval` int(10) UNSIGNED NOT NULL,
  `evaluacion` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id_eval`, `evaluacion`) VALUES
(1, 'Sin Problemas'),
(2, 'Dificultades c/ condiciones materiales'),
(3, 'Dificultades c/ la salud de los integrantes'),
(4, 'Dificultades c/ el funcionamiento de la familia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eval_nuc`
--

CREATE TABLE `eval_nuc` (
  `id_nuc` int(10) UNSIGNED NOT NULL,
  `id_eval` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factor_riesgo`
--

CREATE TABLE `factor_riesgo` (
  `id_fr` int(10) UNSIGNED NOT NULL,
  `factor` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factor_riesgo_pac`
--

CREATE TABLE `factor_riesgo_pac` (
  `id_pac` int(10) UNSIGNED NOT NULL,
  `id_fr` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionalidad`
--

CREATE TABLE `funcionalidad` (
  `id_func` int(10) UNSIGNED NOT NULL,
  `tipo_func` varchar(62) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `funcionalidad`
--

INSERT INTO `funcionalidad` (`id_func`, `tipo_func`) VALUES
(1, 'Funcional'),
(2, 'Riesgo de Disfunción'),
(3, 'Disfuncional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionalidad_nucleo`
--

CREATE TABLE `funcionalidad_nucleo` (
  `id_func` int(10) UNSIGNED NOT NULL,
  `id_nuc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_gen` int(10) UNSIGNED NOT NULL,
  `genero` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_gen`, `genero`) VALUES
(1, 'M'),
(2, 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_disp`
--

CREATE TABLE `grupo_disp` (
  `di_gd` int(10) UNSIGNED NOT NULL,
  `grupo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_disp_pac`
--

CREATE TABLE `grupo_disp_pac` (
  `id_pac` int(10) UNSIGNED NOT NULL,
  `id_gd` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indic_hac`
--

CREATE TABLE `indic_hac` (
  `id_nuc` int(10) UNSIGNED NOT NULL,
  `id_cal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervencion`
--

CREATE TABLE `intervencion` (
  `id_inter` int(10) UNSIGNED NOT NULL,
  `tipo_intervencion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervencion_nucleo`
--

CREATE TABLE `intervencion_nucleo` (
  `id_nuc` int(10) UNSIGNED NOT NULL,
  `id_inter` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_educacional`
--

CREATE TABLE `nivel_educacional` (
  `id_ne` int(10) UNSIGNED NOT NULL,
  `nivel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nivel_educacional`
--

INSERT INTO `nivel_educacional` (`id_ne`, `nivel`) VALUES
(1, 'Primaria'),
(2, 'Secundaria'),
(3, 'Preuniversitario'),
(4, 'Obrero calificado'),
(5, 'Técnico medio'),
(6, 'Técnico medio superior'),
(7, 'Nivel superior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_educacional_paciente`
--

CREATE TABLE `nivel_educacional_paciente` (
  `id_pac` int(10) UNSIGNED NOT NULL,
  `id_ne` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nivel_educacional_paciente`
--

INSERT INTO `nivel_educacional_paciente` (`id_pac`, `id_ne`) VALUES
(9, 1),
(10, 1),
(11, 7),
(12, 1),
(16, 2),
(17, 7),
(18, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nucleo`
--

CREATE TABLE `nucleo` (
  `id_nuc` int(10) UNSIGNED NOT NULL,
  `dir_nuc` text NOT NULL,
  `no_nuc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nucleo`
--

INSERT INTO `nucleo` (`id_nuc`, `dir_nuc`, `no_nuc`) VALUES
(1, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 2),
(2, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 5),
(3, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 5),
(4, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 5),
(5, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 9),
(6, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 13),
(7, '122/25 y 27a no12256', 3),
(8, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 13),
(9, '122/25 y 27a no12256', 4),
(10, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 5),
(11, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 17),
(12, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 2),
(13, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 2),
(14, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 2),
(15, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 2),
(16, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 2),
(17, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 2),
(18, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 2),
(19, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 2),
(20, '4ta Norte edif LACETEL appto 16, Primero de Mayo Boyeros', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nucleo_pac`
--

CREATE TABLE `nucleo_pac` (
  `id_pac` int(10) UNSIGNED NOT NULL,
  `id_nuc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nucleo_pac`
--

INSERT INTO `nucleo_pac` (`id_pac`, `id_nuc`) VALUES
(9, 2),
(10, 11),
(11, 6),
(12, 7),
(16, 12),
(17, 13),
(18, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_pac` int(10) UNSIGNED NOT NULL,
  `nombre_comp_pac` varchar(60) NOT NULL,
  `edad_pac` int(10) UNSIGNED NOT NULL,
  `fecha_nac_pac` date NOT NULL,
  `labor_pac` varchar(120) DEFAULT NULL,
  `diagnostico_pac` varchar(250) NOT NULL,
  `grupo_disponible_pac` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_pac`, `nombre_comp_pac`, `edad_pac`, `fecha_nac_pac`, `labor_pac`, `diagnostico_pac`, `grupo_disponible_pac`) VALUES
(9, 'Henri Daniel PeÃ±a Dequero', 2021, '2000-03-31', '', 'paracetamol y abundante agua', '3'),
(10, 'Henri Daniel PeÃ±a Dequero', 21, '2000-03-31', 'Estudiante', 'paracetamol y abundante agua', '3'),
(11, 'Henri Daniel PeÃ±a Dequero', 21, '2000-03-31', 'web developer', 'paracetamol y abundante agua', '1'),
(12, 'ThalÃ­a PÃ©rez RodrÃ­guez', 21, '2000-06-10', 'Estudiante', 'sano', '1'),
(16, 'InÃ©s MarÃ­a Tito IrÃ­bar', 79, '1941-09-10', 'Jubilada', 'Reposo', '4'),
(17, 'Henri PeÃ±a Vidal', 46, '1975-04-24', 'Proyectista de clima, ETECSA', 'Ejercicios', '2'),
(18, 'Ahmed Abdula Dequero', 24, '1996-07-24', 'Trabajador por cuenta propia', 'sano', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion`
--

CREATE TABLE `planificacion` (
  `id_plan` int(10) UNSIGNED NOT NULL,
  `fecha_prox_consulta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion_pac`
--

CREATE TABLE `planificacion_pac` (
  `id_pac` int(10) UNSIGNED NOT NULL,
  `id_plan` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion_tipo_plan`
--

CREATE TABLE `planificacion_tipo_plan` (
  `id_plan` int(10) UNSIGNED NOT NULL,
  `id_tp` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `satis_ingreso`
--

CREATE TABLE `satis_ingreso` (
  `id_si` int(10) UNSIGNED NOT NULL,
  `satisfaccion` varchar(62) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `satis_ingreso`
--

INSERT INTO `satis_ingreso` (`id_si`, `satisfaccion`) VALUES
(1, 'Satisfecho'),
(2, 'M/Satisfecho'),
(3, 'Insatisfecho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `satis_ingreso_nucleo`
--

CREATE TABLE `satis_ingreso_nucleo` (
  `id_nuc` int(10) UNSIGNED NOT NULL,
  `id_si` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `pac` int(10) UNSIGNED NOT NULL,
  `gen` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`pac`, `gen`) VALUES
(9, 1),
(10, 1),
(11, 1),
(17, 1),
(18, 1),
(12, 2),
(16, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_plan`
--

CREATE TABLE `tipo_plan` (
  `id_tp` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificativo`
--
ALTER TABLE `calificativo`
  ADD PRIMARY KEY (`id_cal`);

--
-- Indices de la tabla `cdr`
--
ALTER TABLE `cdr`
  ADD PRIMARY KEY (`id_cdr`);

--
-- Indices de la tabla `cdr_nucleo`
--
ALTER TABLE `cdr_nucleo`
  ADD PRIMARY KEY (`id_nuc`,`id_cdr`),
  ADD KEY `id_nuc` (`id_nuc`),
  ADD KEY `id_cdr` (`id_cdr`);

--
-- Indices de la tabla `circunscripcion`
--
ALTER TABLE `circunscripcion`
  ADD PRIMARY KEY (`id_cir`);

--
-- Indices de la tabla `cir_cdr`
--
ALTER TABLE `cir_cdr`
  ADD PRIMARY KEY (`id_cdr`,`id_cir`),
  ADD KEY `id_cdr` (`id_cdr`),
  ADD KEY `id_cir` (`id_cir`);

--
-- Indices de la tabla `cond_estr_viv`
--
ALTER TABLE `cond_estr_viv`
  ADD PRIMARY KEY (`id_nuc`,`id_cal`),
  ADD KEY `id_nuc` (`id_nuc`),
  ADD KEY `id_cal` (`id_cal`);

--
-- Indices de la tabla `eq_dom_bas`
--
ALTER TABLE `eq_dom_bas`
  ADD PRIMARY KEY (`id_nuc`,`id_cal`),
  ADD KEY `id_nuc` (`id_nuc`),
  ADD KEY `id_cal` (`id_cal`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`id_eval`);

--
-- Indices de la tabla `eval_nuc`
--
ALTER TABLE `eval_nuc`
  ADD PRIMARY KEY (`id_nuc`,`id_eval`),
  ADD KEY `id_nuc` (`id_nuc`),
  ADD KEY `id_eval` (`id_eval`);

--
-- Indices de la tabla `factor_riesgo`
--
ALTER TABLE `factor_riesgo`
  ADD PRIMARY KEY (`id_fr`);

--
-- Indices de la tabla `factor_riesgo_pac`
--
ALTER TABLE `factor_riesgo_pac`
  ADD PRIMARY KEY (`id_pac`,`id_fr`),
  ADD KEY `id_pac` (`id_pac`),
  ADD KEY `id_fr` (`id_fr`);

--
-- Indices de la tabla `funcionalidad`
--
ALTER TABLE `funcionalidad`
  ADD PRIMARY KEY (`id_func`);

--
-- Indices de la tabla `funcionalidad_nucleo`
--
ALTER TABLE `funcionalidad_nucleo`
  ADD PRIMARY KEY (`id_func`,`id_nuc`) USING BTREE,
  ADD KEY `id_func` (`id_func`),
  ADD KEY `id_nuc` (`id_nuc`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_gen`);

--
-- Indices de la tabla `grupo_disp`
--
ALTER TABLE `grupo_disp`
  ADD PRIMARY KEY (`di_gd`);

--
-- Indices de la tabla `grupo_disp_pac`
--
ALTER TABLE `grupo_disp_pac`
  ADD PRIMARY KEY (`id_pac`,`id_gd`),
  ADD KEY `id_pac` (`id_pac`),
  ADD KEY `id_gd` (`id_gd`);

--
-- Indices de la tabla `indic_hac`
--
ALTER TABLE `indic_hac`
  ADD PRIMARY KEY (`id_nuc`,`id_cal`),
  ADD KEY `id_nuc` (`id_nuc`),
  ADD KEY `id_cal` (`id_cal`);

--
-- Indices de la tabla `intervencion`
--
ALTER TABLE `intervencion`
  ADD PRIMARY KEY (`id_inter`);

--
-- Indices de la tabla `intervencion_nucleo`
--
ALTER TABLE `intervencion_nucleo`
  ADD PRIMARY KEY (`id_nuc`,`id_inter`),
  ADD KEY `id_nuc` (`id_nuc`),
  ADD KEY `id_inter` (`id_inter`);

--
-- Indices de la tabla `nivel_educacional`
--
ALTER TABLE `nivel_educacional`
  ADD PRIMARY KEY (`id_ne`);

--
-- Indices de la tabla `nivel_educacional_paciente`
--
ALTER TABLE `nivel_educacional_paciente`
  ADD PRIMARY KEY (`id_pac`,`id_ne`),
  ADD KEY `id_pac` (`id_pac`),
  ADD KEY `id_ne` (`id_ne`);

--
-- Indices de la tabla `nucleo`
--
ALTER TABLE `nucleo`
  ADD PRIMARY KEY (`id_nuc`);

--
-- Indices de la tabla `nucleo_pac`
--
ALTER TABLE `nucleo_pac`
  ADD PRIMARY KEY (`id_pac`,`id_nuc`),
  ADD KEY `id_pac` (`id_pac`),
  ADD KEY `id_nuc` (`id_nuc`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_pac`);

--
-- Indices de la tabla `planificacion`
--
ALTER TABLE `planificacion`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `planificacion_pac`
--
ALTER TABLE `planificacion_pac`
  ADD PRIMARY KEY (`id_pac`,`id_plan`),
  ADD KEY `id_pac` (`id_pac`),
  ADD KEY `id_plan` (`id_plan`);

--
-- Indices de la tabla `planificacion_tipo_plan`
--
ALTER TABLE `planificacion_tipo_plan`
  ADD PRIMARY KEY (`id_plan`,`id_tp`),
  ADD KEY `id_plan` (`id_plan`),
  ADD KEY `id_tp` (`id_tp`);

--
-- Indices de la tabla `satis_ingreso`
--
ALTER TABLE `satis_ingreso`
  ADD PRIMARY KEY (`id_si`);

--
-- Indices de la tabla `satis_ingreso_nucleo`
--
ALTER TABLE `satis_ingreso_nucleo`
  ADD PRIMARY KEY (`id_nuc`,`id_si`),
  ADD KEY `id_nuc` (`id_nuc`),
  ADD KEY `id_si` (`id_si`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`gen`,`pac`),
  ADD KEY `pac` (`pac`),
  ADD KEY `gen` (`gen`);

--
-- Indices de la tabla `tipo_plan`
--
ALTER TABLE `tipo_plan`
  ADD PRIMARY KEY (`id_tp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificativo`
--
ALTER TABLE `calificativo`
  MODIFY `id_cal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cdr`
--
ALTER TABLE `cdr`
  MODIFY `id_cdr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `circunscripcion`
--
ALTER TABLE `circunscripcion`
  MODIFY `id_cir` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id_eval` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factor_riesgo`
--
ALTER TABLE `factor_riesgo`
  MODIFY `id_fr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funcionalidad`
--
ALTER TABLE `funcionalidad`
  MODIFY `id_func` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_gen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `grupo_disp`
--
ALTER TABLE `grupo_disp`
  MODIFY `di_gd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `intervencion`
--
ALTER TABLE `intervencion`
  MODIFY `id_inter` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nivel_educacional`
--
ALTER TABLE `nivel_educacional`
  MODIFY `id_ne` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nucleo`
--
ALTER TABLE `nucleo`
  MODIFY `id_nuc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_pac` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `planificacion`
--
ALTER TABLE `planificacion`
  MODIFY `id_plan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `satis_ingreso`
--
ALTER TABLE `satis_ingreso`
  MODIFY `id_si` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_plan`
--
ALTER TABLE `tipo_plan`
  MODIFY `id_tp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cdr_nucleo`
--
ALTER TABLE `cdr_nucleo`
  ADD CONSTRAINT `cdr_nucleo_ibfk_1` FOREIGN KEY (`id_nuc`) REFERENCES `nucleo` (`id_nuc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cdr_nucleo_ibfk_2` FOREIGN KEY (`id_cdr`) REFERENCES `cdr` (`id_cdr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cir_cdr`
--
ALTER TABLE `cir_cdr`
  ADD CONSTRAINT `cir_cdr_ibfk_1` FOREIGN KEY (`id_cdr`) REFERENCES `cdr` (`id_cdr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cir_cdr_ibfk_2` FOREIGN KEY (`id_cir`) REFERENCES `circunscripcion` (`id_cir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cond_estr_viv`
--
ALTER TABLE `cond_estr_viv`
  ADD CONSTRAINT `cond_estr_viv_ibfk_1` FOREIGN KEY (`id_nuc`) REFERENCES `nucleo` (`id_nuc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cond_estr_viv_ibfk_2` FOREIGN KEY (`id_cal`) REFERENCES `calificativo` (`id_cal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eq_dom_bas`
--
ALTER TABLE `eq_dom_bas`
  ADD CONSTRAINT `eq_dom_bas_ibfk_1` FOREIGN KEY (`id_nuc`) REFERENCES `nucleo` (`id_nuc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eq_dom_bas_ibfk_2` FOREIGN KEY (`id_cal`) REFERENCES `calificativo` (`id_cal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eval_nuc`
--
ALTER TABLE `eval_nuc`
  ADD CONSTRAINT `eval_nuc_ibfk_1` FOREIGN KEY (`id_nuc`) REFERENCES `nucleo` (`id_nuc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eval_nuc_ibfk_2` FOREIGN KEY (`id_eval`) REFERENCES `evaluacion` (`id_eval`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factor_riesgo_pac`
--
ALTER TABLE `factor_riesgo_pac`
  ADD CONSTRAINT `factor_riesgo_pac_ibfk_1` FOREIGN KEY (`id_pac`) REFERENCES `paciente` (`id_pac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factor_riesgo_pac_ibfk_2` FOREIGN KEY (`id_fr`) REFERENCES `factor_riesgo` (`id_fr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `funcionalidad_nucleo`
--
ALTER TABLE `funcionalidad_nucleo`
  ADD CONSTRAINT `funcionalidad_nucleo_ibfk_1` FOREIGN KEY (`id_func`) REFERENCES `funcionalidad` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funcionalidad_nucleo_ibfk_2` FOREIGN KEY (`id_nuc`) REFERENCES `nucleo` (`id_nuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo_disp_pac`
--
ALTER TABLE `grupo_disp_pac`
  ADD CONSTRAINT `grupo_disp_pac_ibfk_1` FOREIGN KEY (`id_pac`) REFERENCES `paciente` (`id_pac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupo_disp_pac_ibfk_2` FOREIGN KEY (`id_gd`) REFERENCES `grupo_disp` (`di_gd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `indic_hac`
--
ALTER TABLE `indic_hac`
  ADD CONSTRAINT `indic_hac_ibfk_1` FOREIGN KEY (`id_nuc`) REFERENCES `nucleo` (`id_nuc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `indic_hac_ibfk_2` FOREIGN KEY (`id_cal`) REFERENCES `calificativo` (`id_cal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `intervencion_nucleo`
--
ALTER TABLE `intervencion_nucleo`
  ADD CONSTRAINT `intervencion_nucleo_ibfk_1` FOREIGN KEY (`id_nuc`) REFERENCES `nucleo` (`id_nuc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intervencion_nucleo_ibfk_2` FOREIGN KEY (`id_inter`) REFERENCES `intervencion` (`id_inter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nivel_educacional_paciente`
--
ALTER TABLE `nivel_educacional_paciente`
  ADD CONSTRAINT `nivel_educacional_paciente_ibfk_1` FOREIGN KEY (`id_pac`) REFERENCES `paciente` (`id_pac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nivel_educacional_paciente_ibfk_2` FOREIGN KEY (`id_ne`) REFERENCES `nivel_educacional` (`id_ne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nucleo_pac`
--
ALTER TABLE `nucleo_pac`
  ADD CONSTRAINT `nucleo_pac_ibfk_1` FOREIGN KEY (`id_pac`) REFERENCES `paciente` (`id_pac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nucleo_pac_ibfk_2` FOREIGN KEY (`id_nuc`) REFERENCES `nucleo` (`id_nuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planificacion_pac`
--
ALTER TABLE `planificacion_pac`
  ADD CONSTRAINT `planificacion_pac_ibfk_1` FOREIGN KEY (`id_pac`) REFERENCES `paciente` (`id_pac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `planificacion_pac_ibfk_2` FOREIGN KEY (`id_plan`) REFERENCES `planificacion` (`id_plan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planificacion_tipo_plan`
--
ALTER TABLE `planificacion_tipo_plan`
  ADD CONSTRAINT `planificacion_tipo_plan_ibfk_1` FOREIGN KEY (`id_plan`) REFERENCES `planificacion` (`id_plan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `planificacion_tipo_plan_ibfk_2` FOREIGN KEY (`id_tp`) REFERENCES `tipo_plan` (`id_tp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `satis_ingreso_nucleo`
--
ALTER TABLE `satis_ingreso_nucleo`
  ADD CONSTRAINT `satis_ingreso_nucleo_ibfk_1` FOREIGN KEY (`id_nuc`) REFERENCES `nucleo` (`id_nuc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `satis_ingreso_nucleo_ibfk_2` FOREIGN KEY (`id_si`) REFERENCES `satis_ingreso` (`id_si`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD CONSTRAINT `sexo_ibfk_1` FOREIGN KEY (`gen`) REFERENCES `genero` (`id_gen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sexo_ibfk_2` FOREIGN KEY (`pac`) REFERENCES `paciente` (`id_pac`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
