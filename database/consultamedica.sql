-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-08-2021 a las 03:48:29
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `consultamedica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificativo`
--

CREATE TABLE IF NOT EXISTS `calificativo` (
  `id_cal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `calificacion` varchar(15) NOT NULL,
  PRIMARY KEY (`id_cal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `cdr` (
  `id_cdr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_cdr` int(10) unsigned NOT NULL,
  `nombre_cdr` varchar(60) NOT NULL,
  PRIMARY KEY (`id_cdr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cdr_nucleo`
--

CREATE TABLE IF NOT EXISTS `cdr_nucleo` (
  `id_nuc` int(10) unsigned NOT NULL,
  `id_cdr` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_nuc`,`id_cdr`),
  KEY `id_nuc` (`id_nuc`),
  KEY `id_cdr` (`id_cdr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `circunscripcion`
--

CREATE TABLE IF NOT EXISTS `circunscripcion` (
  `id_cir` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_cir` int(10) unsigned NOT NULL,
  `nombre_cir` varchar(60) NOT NULL,
  PRIMARY KEY (`id_cir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cir_cdr`
--

CREATE TABLE IF NOT EXISTS `cir_cdr` (
  `id_cdr` int(10) unsigned NOT NULL,
  `id_cir` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_cdr`,`id_cir`),
  KEY `id_cdr` (`id_cdr`),
  KEY `id_cir` (`id_cir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
  `id_eval` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evaluacion` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_eval`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

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
-- Estructura de tabla para la tabla `factor_riesgo`
--

CREATE TABLE IF NOT EXISTS `factor_riesgo` (
  `id_fr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `factor` varchar(120) NOT NULL,
  PRIMARY KEY (`id_fr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factor_riesgo_pac`
--

CREATE TABLE IF NOT EXISTS `factor_riesgo_pac` (
  `id_pac` int(10) unsigned NOT NULL,
  `id_fr` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_pac`,`id_fr`),
  KEY `id_pac` (`id_pac`),
  KEY `id_fr` (`id_fr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionalidad`
--

CREATE TABLE IF NOT EXISTS `funcionalidad` (
  `id_func` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_func` varchar(62) NOT NULL,
  PRIMARY KEY (`id_func`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `funcionalidad`
--

INSERT INTO `funcionalidad` (`id_func`, `tipo_func`) VALUES
(1, 'Funcional'),
(2, 'Riesgo de Disfuncion'),
(3, 'Disfuncional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id_gen` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genero` varchar(1) NOT NULL,
  PRIMARY KEY (`id_gen`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `grupo_disp` (
  `di_gd` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grupo` varchar(30) NOT NULL,
  PRIMARY KEY (`di_gd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_disp_pac`
--

CREATE TABLE IF NOT EXISTS `grupo_disp_pac` (
  `id_pac` int(10) unsigned NOT NULL,
  `id_gd` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_pac`,`id_gd`),
  KEY `id_pac` (`id_pac`),
  KEY `id_gd` (`id_gd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervencion`
--

CREATE TABLE IF NOT EXISTS `intervencion` (
  `id_inter` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_intervencion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_inter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervencion_nucleo`
--

CREATE TABLE IF NOT EXISTS `intervencion_nucleo` (
  `id_nuc` int(10) unsigned NOT NULL,
  `id_inter` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_nuc`,`id_inter`),
  KEY `id_nuc` (`id_nuc`),
  KEY `id_inter` (`id_inter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_educacional`
--

CREATE TABLE IF NOT EXISTS `nivel_educacional` (
  `id_ne` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nivel` varchar(30) NOT NULL,
  PRIMARY KEY (`id_ne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `nivel_educacional`
--

INSERT INTO `nivel_educacional` (`id_ne`, `nivel`) VALUES
(1, 'Primaria'),
(2, 'Secundaria'),
(3, 'Preuniversitario'),
(4, 'Obrero calificado'),
(5, 'Tecnico medio'),
(6, 'Tecnico medio superior'),
(7, 'Nivel superior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nucleo`
--

CREATE TABLE IF NOT EXISTS `nucleo` (
  `id_nuc` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dir_nuc` text NOT NULL,
  `no_nuc` int(10) NOT NULL,
  `cond_estr_viv` int(10) unsigned DEFAULT NULL,
  `indic_hac` int(10) unsigned DEFAULT NULL,
  `eq_dom_bas` int(10) unsigned DEFAULT NULL,
  `satis_ingreso` int(10) unsigned DEFAULT NULL,
  `funcionamiento_nucleo` int(10) unsigned DEFAULT NULL,
  `eval_nuc` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_nuc`),
  KEY `cond_estr_viv` (`cond_estr_viv`,`indic_hac`,`eq_dom_bas`,`satis_ingreso`,`funcionamiento_nucleo`,`eval_nuc`),
  KEY `nucleo_ibfk_2` (`eq_dom_bas`),
  KEY `nucleo_ibfk_3` (`indic_hac`),
  KEY `nucleo_ibfk_4` (`satis_ingreso`),
  KEY `nucleo_ibfk_5` (`funcionamiento_nucleo`),
  KEY `nucleo_ibfk_6` (`eval_nuc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `nucleo`
--

INSERT INTO `nucleo` (`id_nuc`, `dir_nuc`, `no_nuc`, `cond_estr_viv`, `indic_hac`, `eq_dom_bas`, `satis_ingreso`, `funcionamiento_nucleo`, `eval_nuc`) VALUES
(41, '67 #13613', 100, 1, 1, 1, 1, 1, 3),
(42, '39 #8402', 209, 1, 1, 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nucleo_pac`
--

CREATE TABLE IF NOT EXISTS `nucleo_pac` (
  `id_pac` int(10) unsigned NOT NULL,
  `id_nuc` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_pac`,`id_nuc`),
  KEY `id_pac` (`id_pac`),
  KEY `id_nuc` (`id_nuc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nucleo_pac`
--

INSERT INTO `nucleo_pac` (`id_pac`, `id_nuc`) VALUES
(45, 41),
(46, 41),
(47, 42),
(48, 42),
(52, 42),
(63, 41);

--
-- Disparadores `nucleo_pac`
--
DROP TRIGGER IF EXISTS `DelPac`;
DELIMITER //
CREATE TRIGGER `DelPac` AFTER DELETE ON `nucleo_pac`
 FOR EACH ROW DELETE FROM paciente WHERE id_pac = old.id_pac
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id_pac` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_comp_pac` varchar(60) NOT NULL,
  `edad_pac` int(10) unsigned NOT NULL,
  `fecha_nac_pac` date NOT NULL,
  `labor_pac` varchar(120) DEFAULT NULL,
  `diagnostico_pac` varchar(250) NOT NULL,
  `grupo_disponible_pac` varchar(7) DEFAULT NULL,
  `sexo` int(10) unsigned NOT NULL,
  `nivel_educacional` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_pac`),
  UNIQUE KEY `nombre_comp_pac` (`nombre_comp_pac`,`fecha_nac_pac`),
  KEY `sexo` (`sexo`),
  KEY `nivel_educacional` (`nivel_educacional`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=64 ;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_pac`, `nombre_comp_pac`, `edad_pac`, `fecha_nac_pac`, `labor_pac`, `diagnostico_pac`, `grupo_disponible_pac`, `sexo`, `nivel_educacional`) VALUES
(45, 'Danelys Tamayo Trujillo', 29, '1991-11-25', 'DefectÃ³loga', 'Sano', '1', 2, 7),
(46, 'Mercedes Trujillo Gonzales', 58, '1962-10-18', 'Economica', 'HTA, Diabetes', '3', 2, 5),
(47, 'Susana de Oro Pineda', 21, '2000-07-24', 'Estudiante', 'Sano', '1', 2, 3),
(48, 'Susel de Oro Pineda', 14, '2006-10-16', 'Estudiante', 'HTA', '3', 2, 1),
(52, 'Barbara Pineda IbaÃ±ez', 54, '1966-12-04', 'MÃ©dico', 'Sano', '1', 2, 7),
(63, 'Daniel Alberto Tamayo Trujillo', 21, '2000-02-07', 'Sin trabajar', 'Sano', '1', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion`
--

CREATE TABLE IF NOT EXISTS `planificacion` (
  `id_plan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_prox_consulta` date NOT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion_pac`
--

CREATE TABLE IF NOT EXISTS `planificacion_pac` (
  `id_pac` int(10) unsigned NOT NULL,
  `id_plan` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_pac`,`id_plan`),
  KEY `id_pac` (`id_pac`),
  KEY `id_plan` (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion_tipo_plan`
--

CREATE TABLE IF NOT EXISTS `planificacion_tipo_plan` (
  `id_plan` int(10) unsigned NOT NULL,
  `id_tp` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_plan`,`id_tp`),
  KEY `id_plan` (`id_plan`),
  KEY `id_tp` (`id_tp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `satis_ingreso`
--

CREATE TABLE IF NOT EXISTS `satis_ingreso` (
  `id_si` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `satisfaccion` varchar(62) NOT NULL,
  PRIMARY KEY (`id_si`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `satis_ingreso`
--

INSERT INTO `satis_ingreso` (`id_si`, `satisfaccion`) VALUES
(1, 'Satisfecho'),
(2, 'M/Satisfecho'),
(3, 'Insatisfecho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_plan`
--

CREATE TABLE IF NOT EXISTS `tipo_plan` (
  `id_tp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(60) NOT NULL,
  PRIMARY KEY (`id_tp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

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
-- Filtros para la tabla `factor_riesgo_pac`
--
ALTER TABLE `factor_riesgo_pac`
  ADD CONSTRAINT `factor_riesgo_pac_ibfk_1` FOREIGN KEY (`id_pac`) REFERENCES `paciente` (`id_pac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factor_riesgo_pac_ibfk_2` FOREIGN KEY (`id_fr`) REFERENCES `factor_riesgo` (`id_fr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo_disp_pac`
--
ALTER TABLE `grupo_disp_pac`
  ADD CONSTRAINT `grupo_disp_pac_ibfk_1` FOREIGN KEY (`id_pac`) REFERENCES `paciente` (`id_pac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupo_disp_pac_ibfk_2` FOREIGN KEY (`id_gd`) REFERENCES `grupo_disp` (`di_gd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `intervencion_nucleo`
--
ALTER TABLE `intervencion_nucleo`
  ADD CONSTRAINT `intervencion_nucleo_ibfk_1` FOREIGN KEY (`id_nuc`) REFERENCES `nucleo` (`id_nuc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intervencion_nucleo_ibfk_2` FOREIGN KEY (`id_inter`) REFERENCES `intervencion` (`id_inter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nucleo`
--
ALTER TABLE `nucleo`
  ADD CONSTRAINT `nucleo_ibfk_1` FOREIGN KEY (`cond_estr_viv`) REFERENCES `calificativo` (`id_cal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nucleo_ibfk_2` FOREIGN KEY (`eq_dom_bas`) REFERENCES `calificativo` (`id_cal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nucleo_ibfk_3` FOREIGN KEY (`indic_hac`) REFERENCES `calificativo` (`id_cal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nucleo_ibfk_4` FOREIGN KEY (`satis_ingreso`) REFERENCES `satis_ingreso` (`id_si`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nucleo_ibfk_5` FOREIGN KEY (`funcionamiento_nucleo`) REFERENCES `funcionalidad` (`id_func`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nucleo_ibfk_6` FOREIGN KEY (`eval_nuc`) REFERENCES `evaluacion` (`id_eval`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nucleo_pac`
--
ALTER TABLE `nucleo_pac`
  ADD CONSTRAINT `nucleo_pac_ibfk_1` FOREIGN KEY (`id_pac`) REFERENCES `paciente` (`id_pac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nucleo_pac_ibfk_2` FOREIGN KEY (`id_nuc`) REFERENCES `nucleo` (`id_nuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`sexo`) REFERENCES `genero` (`id_gen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paciente_ibfk_2` FOREIGN KEY (`nivel_educacional`) REFERENCES `nivel_educacional` (`id_ne`) ON DELETE CASCADE ON UPDATE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
