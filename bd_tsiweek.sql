-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.45 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para bd_tsiweek
CREATE DATABASE IF NOT EXISTS `bd_tsiweek` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd_tsiweek`;

-- Volcando estructura para tabla bd_tsiweek.asistencia
CREATE TABLE IF NOT EXISTS `asistencia` (
  `Id_Asistencia` int(50) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Asistencia` int(11) NOT NULL,
  `Id_Eventos` int(11) NOT NULL,
  PRIMARY KEY (`Id_Asistencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_tsiweek.asistencia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;

-- Volcando estructura para tabla bd_tsiweek.categoria_evento
CREATE TABLE IF NOT EXISTS `categoria_evento` (
  `ID_CategoriaEvento` int(11) NOT NULL,
  `Tipo_Evento` varchar(300) DEFAULT NULL,
  `Icono_Evento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_CategoriaEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_tsiweek.categoria_evento: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_evento` DISABLE KEYS */;
INSERT INTO `categoria_evento` (`ID_CategoriaEvento`, `Tipo_Evento`, `Icono_Evento`) VALUES
	(1, 'Taller basico', 'fa-code'),
	(2, 'Taller avanzado', 'fa-code'),
	(3, 'Conferencia', 'fa-comment'),
	(4, 'Actividad', 'fa-university'),
	(5, 'Hackathon y Rally', 'fa-users fa-laptop');
/*!40000 ALTER TABLE `categoria_evento` ENABLE KEYS */;

-- Volcando estructura para tabla bd_tsiweek.conocimiento
CREATE TABLE IF NOT EXISTS `conocimiento` (
  `Id_Conocimiento` int(50) NOT NULL,
  `Id_Registro` int(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_tsiweek.conocimiento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `conocimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `conocimiento` ENABLE KEYS */;

-- Volcando estructura para tabla bd_tsiweek.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `Id_Eventos` int(50) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Fecha_Inicio` date DEFAULT NULL,
  `Fecha_Fin` date DEFAULT NULL,
  `Hora_Inicio` time DEFAULT NULL,
  `Hora_Fin` time DEFAULT NULL,
  `Id_CategoriaEvento` int(50) NOT NULL,
  `Id_Ubicacion` int(50) NOT NULL,
  `Id_Poniente` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_tsiweek.eventos: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` (`Id_Eventos`, `Nombre`, `Fecha_Inicio`, `Fecha_Fin`, `Hora_Inicio`, `Hora_Fin`, `Id_CategoriaEvento`, `Id_Ubicacion`, `Id_Poniente`) VALUES
	(1, 'Arquitectura de la Información', '2019-07-15', '2019-07-18', '14:00:00', '16:00:00', 2, 4, 7),
	(2, 'Blockchain', '2019-07-19', '2019-07-19', '11:00:00', '12:00:00', 3, 6, 16),
	(3, 'Ciberseguridad, camino a la innovación', '2019-07-19', '2019-07-19', '12:00:00', '13:00:00', 3, 6, 17),
	(4, 'Datos abiertos enlazados', '2019-07-18', '2019-07-18', '11:00:00', '12:00:00', 3, 6, 14),
	(5, 'Hackathon y Rally', '2019-07-19', '2019-07-19', '09:00:00', '11:00:00', 4, 2, 18),
	(6, 'IA + IOT = Movilidad Eficiente', '2019-07-15', '2019-07-15', '11:20:00', '12:00:00', 3, 6, 9),
	(7, 'Inauguración', '2019-07-15', '2019-07-15', '11:00:00', '12:00:00', 4, 6, 18),
	(8, 'Instalación Linux', '2019-07-15', '2019-07-18', '09:00:00', '11:00:00', 1, 4, 4),
	(9, 'Internet del futuro: El internet de las cosas y la ciencia de datos', '2019-07-17', '2019-07-17', '12:00:00', '13:00:00', 3, 6, 13),
	(10, 'Java Basico', '2019-07-15', '2019-07-18', '09:00:00', '11:00:00', 1, 2, 2),
	(11, 'Java Avanzado', '2019-07-15', '2019-07-18', '14:00:00', '16:00:00', 2, 2, 6),
	(12, 'JavaScript', '2019-07-15', '2019-07-18', '09:00:00', '11:00:00', 1, 3, 3),
	(13, 'Phyton', '2019-07-15', '2019-07-18', '09:00:00', '11:00:00', 1, 1, 1),
	(14, 'Premiación y Clausura', '2019-07-19', '2019-07-19', '13:10:00', '14:00:00', 4, 6, 18),
	(15, 'Realidad Virtual en Aplicaciones Biomédicas', '2019-07-17', '2019-07-17', '11:00:00', '12:00:00', 3, 6, 12),
	(16, 'Reconocimiento de Patrones', '2019-07-15', '2019-07-18', '14:00:00', '16:00:00', 2, 3, 5),
	(17, 'Redes Nacionales de Educación', '2019-07-15', '2019-07-15', '12:00:00', '13:00:00', 3, 6, 10),
	(18, 'Respuesta a incidentes de seguridad', '2019-07-16', '2019-07-16', '13:00:00', '14:00:00', 3, 6, 11),
	(19, 'Reunión con Egresados', '2019-07-16', '2019-07-16', '11:00:00', '13:00:00', 4, 6, 18),
	(20, 'The Game of Drones', '2019-07-18', '2019-07-18', '12:00:00', '00:00:00', 3, 6, 15),
	(21, 'Unity', '2019-07-15', '2019-07-18', '14:00:00', '16:00:00', 2, 5, 8);
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;

-- Volcando estructura para tabla bd_tsiweek.galeria
CREATE TABLE IF NOT EXISTS `galeria` (
  `Id_Galeria` int(50) NOT NULL,
  `Imagen_URL` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_tsiweek.galeria: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `galeria` DISABLE KEYS */;
INSERT INTO `galeria` (`Id_Galeria`, `Imagen_URL`) VALUES
	(1, '01.jpg'),
	(2, '02.jpg'),
	(3, '03.jpg'),
	(4, '04.jpg'),
	(5, '05.jpg'),
	(6, '06.jpg'),
	(7, '07.jpg'),
	(8, '08.jpg'),
	(9, '09.jpg'),
	(10, '10.jpg'),
	(11, '11.jpg'),
	(12, '12.jpg'),
	(13, '13.jpg'),
	(14, '14.jpg'),
	(15, '15.jpg'),
	(16, '16.jpg'),
	(17, '17.jpg'),
	(18, '18.jpg'),
	(19, '19.jpg'),
	(20, '20.jpg');
/*!40000 ALTER TABLE `galeria` ENABLE KEYS */;

-- Volcando estructura para tabla bd_tsiweek.poniente
CREATE TABLE IF NOT EXISTS `poniente` (
  `Id_Poniente` int(50) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido_P` varchar(50) DEFAULT NULL,
  `Apellido_M` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(10000) DEFAULT NULL,
  `Imagen_URL` varchar(100) DEFAULT NULL,
  `Tipo_Poniente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_tsiweek.poniente: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `poniente` DISABLE KEYS */;
INSERT INTO `poniente` (`Id_Poniente`, `Nombre`, `Apellido_P`, `Apellido_M`, `Descripcion`, `Imagen_URL`, `Tipo_Poniente`) VALUES
	(1, 'Sael', 'Flores', 'a', '', '', 'Instructor'),
	(2, 'Juan Manuel', 'Díaz', 'b', '', '', 'Instructor'),
	(3, 'Eduardo', 'Cebrero', 'c', '', '', 'Instructor'),
	(4, 'Dominique', 'Decouchant', 'a', '', '', 'Instructor'),
	(5, 'Esaú', 'Villatoro', 'b', '', '', 'Instructor'),
	(6, 'Emilio', 'Olvera', 'c', '', '', 'Instructor'),
	(7, 'Abraham', 'Lepe', 'a', '', '', 'Instructor'),
	(8, 'Alba', 'Nuñez', 'b', '', '', 'Instructor'),
	(9, 'Humberto', 'Sossa', 'c', 'Juan Humberto Sossa Azuela es Ingeniero en Comunicaciones y Electrónica por la Universidad de Guadalajara, obtuvo el grado de Maestro en Ciencias con especialidad en Ingeniería Eléctrica en el Centro de Investigación y de Estudios Avanzados (Cinvestav) del IPN y es Doctor en Ciencias por el Instituto Politécnico de Grenoble, Francia. Es, miembro del SNI con Nivel 3 y de la Academia Mexicana de Ciencias desde 1997.', 'invitado1.jpg', 'Conferencista'),
	(10, 'Salma', 'Jalife', 'a', 'Salma Jalife es Ingeniera en Computación y Maestra en Ciencias con Especialidad en Telecomunicaciones. Es docente, conferencista, investigadora y consultora reconocida a nivel nacional e internacional. Su labor ha sido fundamental en el desarrollo de infraestructura de telecomunicaciones de México y en la evolución de las instituciones públicas que regulan ese sector.', 'invitado2.jpg', 'Conferencista'),
	(11, 'Víctor', 'Gómez', 'b', 'Global Cybersec', 'invitado3.jpg', 'Conferencista'),
	(12, 'Miguel', 'Padilla', 'c', 'Miguel Angel Padilla-Castañeda obtuvo en 2012 el Doctorado en Tecnologías de la Innovación y Robótica con Honores, por la Escuela Superior Sant’ Anna de Pisa, Italia, así como la Maestría en Ciencias de la Computación e Ingeniería en Computación, ambas con Mención Honorífica por la UNAM, en 2001 y 2000 respectivamente. Desde el 2001 es miembro del Instituto de Ciencias Aplicadas y Tecnología, UNAM, donde actualmente es Investigador Asociado C adscrito a la Unidad de Investigación y Desarrollo Tecnológico del CCADET en el Hospital General de México “Dr. Eduardo Liceaga”. ', 'invitado4.jpg', 'Conferencista'),
	(13, 'Rolando', 'Menchaca', 'a', 'Rolando Menchaca-Méndez es Profesor Titular C y jefe del Laboratorio de Redes y Ciencia de Datos del CIC-IPN. Obtuvo el grado de Ing. en Electrónica por parte de la UAM Azcapotzalco, el de M. en C. de la computación por parte del IPN y el de Dr. en Ingeniería en Computación por parte de la Universidad de California en Santa Cruz. Ha publicado más de 70 artículos científicos en revistas, conferencias y libros. Sus líneas de investigación son teoría de algoritmos, así como diseño y análisis de protocolos de comunicación.', 'invitado5.jpg', 'Conferencista'),
	(14, 'Elizabeth', 'Perez', 'b', 'Elizabeth Pérez Cortés es egresada de la Licenciatura en Computación de la UAM-Iztapalapa (medalla al mérito universitario), recibió el grado de Maestra en Ciencias de la Computación de la UACPyP del CCH de la Universidad Nacional Autónoma de México en 1992 (medalla Gabino Barreda) y el Diploma de estudios especializados de la Escuela Nacional de Sistemas y Matemáticas Aplicadas de Grenoble en 1993 y, finalmente, el grado de Doctora en Sistemas Computacionales del Instituto Politécnico Nacional de Grenoble, Francia en 1996. ', 'invitado6.jpg', 'Conferencista'),
	(15, 'Bernardino', 'Castillo-Toledo', 'c', 'Bernardino Castillo Toledo obtuvo el título de Ingeniero en Comunicaciones y Electrónica en la Escuela Superior de Ingeniería Mecánica y Eléctrica (ESIME) del Instituto Politécnico Nacional en 1985, el grado de Maestro en Ciencias, especialidad Ingeniería Eléctrica del Centro de Investigación y de Estudios Avanzados (CINVESTAV) del IPN en 1985, el grado de Doctor en Ciencias de la Universidad de Roma "La Sapienza", Italia, en 1992 y un postdoctorado en el Laboratoire de Automatique et Analyse des Systèmes, Toulouse, Francia en 2000. ', 'invitado7.jpg', 'Conferencista'),
	(16, 'Baltazar', 'Rodríguez', 'a', 'Consultor de TI especializado en Transformación Digital, Estrategia de TI y Negocio - Alineación de TI con una experiencia exitosa y larga en la transformación del sector público.\r\nA lo largo de mi carrera, he ayudado a transformar organizaciones mediante el uso de la tecnología. Creo que la transformación tecnológica siempre debe estar impulsada por el negocio, por lo tanto, estudio y entiendo la estrategia, la motivación y los impulsores del negocio para desarrollar una estrategia de TI de apoyo.', 'invitado8.jpg', 'Conferencista'),
	(17, 'Eduardo', 'Palacios', 'b', 'Eduardo Palacio López es un Ingeniero en Tecnologías Computacionales egresado del Tecnológico de Monterrey con mención honorífica y una especialidad en Redes y Seguridad Informática. Eduardo tiene amplia experiencia en Estrategias de Seguridad, Seguridad Aplicativa e Inteligencia de Seguridad. Hoy en día funge como Especialista Técnico de soluciones de Prevención de Fraude Financiero en México y como speaker para la Unidad de Negocio de Seguridad de IBM.', 'invitado9.jpg', 'Conferencista'),
	(18, 'Benjamin', 'Carrera', 'Carrera', 'Alumno de tecnologias de la información', 'invitado10.jpg', 'Instructor');
/*!40000 ALTER TABLE `poniente` ENABLE KEYS */;

-- Volcando estructura para tabla bd_tsiweek.registro
CREATE TABLE IF NOT EXISTS `registro` (
  `Id_Registro` int(50) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido_P` varchar(50) NOT NULL,
  `Apellido_M` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `Matricula` int(50) DEFAULT NULL,
  `Institucion` varchar(100) DEFAULT NULL,
  `Id_Eventos` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_tsiweek.registro: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;

-- Volcando estructura para tabla bd_tsiweek.ubicacion
CREATE TABLE IF NOT EXISTS `ubicacion` (
  `Id_Ubicacion` int(5) NOT NULL,
  `Nombre_U` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_tsiweek.ubicacion: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `ubicacion` DISABLE KEYS */;
INSERT INTO `ubicacion` (`Id_Ubicacion`, `Nombre_U`) VALUES
	(1, 'L-528'),
	(2, 'L-522'),
	(3, 'L-524'),
	(4, 'Sala de PTs'),
	(5, 'Salon pendiente'),
	(6, 'Aula Magna'),
	(7, 'Aula de capacitación');
/*!40000 ALTER TABLE `ubicacion` ENABLE KEYS */;

-- Volcando estructura para tabla bd_tsiweek.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id_Usuario` int(50) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido_P` varchar(50) DEFAULT NULL,
  `Apellido_M` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Matricula` varchar(50) DEFAULT NULL,
  `Estatus` char(1) NOT NULL,
  `Rol` varchar(30) DEFAULT NULL,
  `Contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_tsiweek.usuario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`Id_Usuario`, `Nombre`, `Apellido_P`, `Apellido_M`, `Email`, `Matricula`, `Estatus`, `Rol`, `Contrasena`) VALUES
	(1, 'Daniel', 'de Jesús', 'de Jesús', 'dragneel.960229@gmail.com', '2153030947', 'A', 'Administrador', '63577536');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
