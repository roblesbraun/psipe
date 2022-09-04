-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 04, 2022 at 08:45 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminUsuarios`
--

CREATE TABLE `adminUsuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminUsuarios`
--

INSERT INTO `adminUsuarios` (`id_usuario`, `usuario`, `password`) VALUES
(1, 'Master', 'master');

-- --------------------------------------------------------

--
-- Table structure for table `bibliotecaClase`
--

CREATE TABLE `bibliotecaClase` (
  `idArchivo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `rutaArchivo` varchar(255) NOT NULL,
  `idClase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bibliotecaClase`
--

INSERT INTO `bibliotecaClase` (`idArchivo`, `nombre`, `rutaArchivo`, `idClase`) VALUES
(1, 'Prueba 1', '1-2-PALETALOGOPSIPE.pdf', 1),
(2, 'Clase 1', '2-damian-ochrymowicz-CSuPtVN167g-unsplash.jpeg', 1),
(3, 'Clase 2', '3-nL.jpeg', 2),
(4, 'Clase 2', '4-docentes.jpg', 2),
(5, 'sdsdfasdfasdfasdfasd asdf asdf asdf asdf asdf asdf asdf asdf asf sadfsad fasdf asdf ', '5-inicio.jpg', 2),
(6, 'sdfñlaksdj fñaskdjf asdlkfj añslkdfj ñasdkjf ñasdlfj ñlaskdjfñlaskjdfñlaksjdfñlkjasdñ fjañsldkfjñ asldfjñaslkdfjñlaskdjfñlaksjdfñlkasdjfñlaksjdfñ askñldfjñalskdjfñalskdjfñ asdfjñlkasjdfñlaksdjf', '6-docentes.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bibliotecaCurso`
--

CREATE TABLE `bibliotecaCurso` (
  `idBiblioteca` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bibliotecaCurso`
--

INSERT INTO `bibliotecaCurso` (`idBiblioteca`, `nombre`, `idCurso`) VALUES
(1, 'Biblio Prueba', 5);

-- --------------------------------------------------------

--
-- Table structure for table `bibliotecaCursoArchivos`
--

CREATE TABLE `bibliotecaCursoArchivos` (
  `idArchivo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `rutaArchivo` varchar(255) NOT NULL,
  `idBiblioteca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bibliotecaCursoArchivos`
--

INSERT INTO `bibliotecaCursoArchivos` (`idArchivo`, `nombre`, `rutaArchivo`, `idBiblioteca`) VALUES
(1, 'Hola1', '1-damian-ochrymowicz-CSuPtVN167g-unsplash.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carruselClase`
--

CREATE TABLE `carruselClase` (
  `idImagen` int(11) NOT NULL,
  `rutaImagen` varchar(255) NOT NULL,
  `idClase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carruselClase`
--

INSERT INTO `carruselClase` (`idImagen`, `rutaImagen`, `idClase`) VALUES
(3, '3-dmitry-sumar-ySQvJ3JHTM8-unsplash.jpg', 1),
(4, '4-mgg-vitchakorn-vBOxsZrfiCw-unsplash.jpeg', 1),
(5, '5-dmitry-sumar-ySQvJ3JHTM8-unsplash.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carruselHome`
--

CREATE TABLE `carruselHome` (
  `idImagen` int(11) NOT NULL,
  `rutaImagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carruselHome`
--

INSERT INTO `carruselHome` (`idImagen`, `rutaImagen`) VALUES
(3, '3-ali-morshedlou-WMD64tMfc4k-unsplash.jpeg'),
(6, '6-frankie-cilliers-scOfuyY2rbw-unsplash.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `clases`
--

CREATE TABLE `clases` (
  `idClase` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `instrucciones` text NOT NULL,
  `presentacion` varchar(500) NOT NULL,
  `video` varchar(255) NOT NULL,
  `idModulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clases`
--

INSERT INTO `clases` (`idClase`, `nombre`, `instrucciones`, `presentacion`, `video`, `idModulo`) VALUES
(1, 'Clase 1', 'Hola hola como estas<br>\r\nMe encanta el curso', 'https://docs.google.com/presentation/d/e/2PACX-1vQAfsXGMdwEUjSVXr0GE1tZyZuhYxtLIm0lsq4-blq0dhxkvCX1QOeETTWE0BvQ3-BQKP916cLil1u0/embed?start=false&loop=false&delayms=3000', 'https://www.youtube.com/embed/IsL82G5c0Qo', 1),
(2, 'Clase 2', 'Todo cool', 'zxsdsdf', 'https://www.youtube.com/embed/gnV-8pkILF0&t=2318s', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `numero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`numero`) VALUES
('525569158438');

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE `cursos` (
  `idCurso` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `docente` varchar(255) NOT NULL,
  `duracion` int(10) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `horario` varchar(20) NOT NULL,
  `horasPresenciales` int(10) NOT NULL,
  `horasAsincronas` int(10) NOT NULL,
  `linkClase` varchar(500) NOT NULL,
  `rutaImagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`idCurso`, `nombre`, `docente`, `duracion`, `dia`, `horario`, `horasPresenciales`, `horasAsincronas`, `linkClase`, `rutaImagen`) VALUES
(5, 'Prueba', 'Oscar Robles', 80, 'Lunes', '7 a 9', 30, 30, 'https://us02web.zoom.us/j/81496237703?pwd=ZDNPUUF6NGovSlllTGgwcjNoRWp5dz09', '5-3-4-absLogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `docentes`
--

CREATE TABLE `docentes` (
  `idDocente` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `carrera` varchar(255) NOT NULL,
  `experiencia` varchar(5000) NOT NULL,
  `rutaImagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE `modulos` (
  `idModulo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `rangoClases` varchar(255) NOT NULL,
  `idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modulos`
--

INSERT INTO `modulos` (`idModulo`, `nombre`, `rangoClases`, `idCurso`) VALUES
(1, 'Módulo I: Bases de la Intervención logopédica', 'Clases 1, 2 y 3', 5);

-- --------------------------------------------------------

--
-- Table structure for table `temarioModulos`
--

CREATE TABLE `temarioModulos` (
  `idTemario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `idModulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `correo`, `password`) VALUES
(1, 'roblesbraun@gmail.com', '$2y$10$ZcpJYnYeI.NLFS4NptNFlOk06l/Tz0z0C8z0cJa2b1cB.8.EyMT2q'),
(2, 'frida@gmail.com', '$2y$10$L9fyPtYEH9YIUgRQuDdnX.qZCWQ56QbFN0jItkk4P5VvTBU.OS7c2');

-- --------------------------------------------------------

--
-- Table structure for table `usuariosCursos`
--

CREATE TABLE `usuariosCursos` (
  `id_usuario` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuariosCursos`
--

INSERT INTO `usuariosCursos` (`id_usuario`, `id_curso`) VALUES
(1, 5),
(1, 5),
(2, 5),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `videosClase`
--

CREATE TABLE `videosClase` (
  `idVideo` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `idClase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videosClase`
--

INSERT INTO `videosClase` (`idVideo`, `nombre`, `link`, `idClase`) VALUES
(1, 'Video 1', 'https://www.youtube.com/embed/pYovPyJDr4c', 1),
(2, 'Video 2', 'https://www.youtube.com/embed/pYovPyJDr4c', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminUsuarios`
--
ALTER TABLE `adminUsuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `bibliotecaClase`
--
ALTER TABLE `bibliotecaClase`
  ADD PRIMARY KEY (`idArchivo`),
  ADD KEY `idClase` (`idClase`);

--
-- Indexes for table `bibliotecaCurso`
--
ALTER TABLE `bibliotecaCurso`
  ADD PRIMARY KEY (`idBiblioteca`),
  ADD KEY `idCurso` (`idCurso`);

--
-- Indexes for table `bibliotecaCursoArchivos`
--
ALTER TABLE `bibliotecaCursoArchivos`
  ADD PRIMARY KEY (`idArchivo`),
  ADD KEY `idBiblioteca` (`idBiblioteca`);

--
-- Indexes for table `carruselClase`
--
ALTER TABLE `carruselClase`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `idClase` (`idClase`);

--
-- Indexes for table `carruselHome`
--
ALTER TABLE `carruselHome`
  ADD PRIMARY KEY (`idImagen`);

--
-- Indexes for table `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`idClase`),
  ADD KEY `idModulo` (`idModulo`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indexes for table `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`idDocente`);

--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idModulo`),
  ADD KEY `idCurso` (`idCurso`);

--
-- Indexes for table `temarioModulos`
--
ALTER TABLE `temarioModulos`
  ADD PRIMARY KEY (`idTemario`),
  ADD KEY `idModulo` (`idModulo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `usuariosCursos`
--
ALTER TABLE `usuariosCursos`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indexes for table `videosClase`
--
ALTER TABLE `videosClase`
  ADD PRIMARY KEY (`idVideo`),
  ADD KEY `idClase` (`idClase`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminUsuarios`
--
ALTER TABLE `adminUsuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bibliotecaClase`
--
ALTER TABLE `bibliotecaClase`
  MODIFY `idArchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bibliotecaCurso`
--
ALTER TABLE `bibliotecaCurso`
  MODIFY `idBiblioteca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bibliotecaCursoArchivos`
--
ALTER TABLE `bibliotecaCursoArchivos`
  MODIFY `idArchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carruselClase`
--
ALTER TABLE `carruselClase`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carruselHome`
--
ALTER TABLE `carruselHome`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clases`
--
ALTER TABLE `clases`
  MODIFY `idClase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idCurso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `docentes`
--
ALTER TABLE `docentes`
  MODIFY `idDocente` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temarioModulos`
--
ALTER TABLE `temarioModulos`
  MODIFY `idTemario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videosClase`
--
ALTER TABLE `videosClase`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bibliotecaClase`
--
ALTER TABLE `bibliotecaClase`
  ADD CONSTRAINT `bibliotecaclase_ibfk_1` FOREIGN KEY (`idClase`) REFERENCES `clases` (`idClase`);

--
-- Constraints for table `bibliotecaCurso`
--
ALTER TABLE `bibliotecaCurso`
  ADD CONSTRAINT `bibliotecacurso_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`idCurso`);

--
-- Constraints for table `bibliotecaCursoArchivos`
--
ALTER TABLE `bibliotecaCursoArchivos`
  ADD CONSTRAINT `bibliotecacursoarchivos_ibfk_1` FOREIGN KEY (`idBiblioteca`) REFERENCES `bibliotecaCurso` (`idBiblioteca`);

--
-- Constraints for table `carruselClase`
--
ALTER TABLE `carruselClase`
  ADD CONSTRAINT `carruselclase_ibfk_1` FOREIGN KEY (`idClase`) REFERENCES `clases` (`idClase`);

--
-- Constraints for table `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`idModulo`) REFERENCES `modulos` (`idModulo`);

--
-- Constraints for table `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `modulos_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`idCurso`);

--
-- Constraints for table `temarioModulos`
--
ALTER TABLE `temarioModulos`
  ADD CONSTRAINT `temariomodulos_ibfk_1` FOREIGN KEY (`idModulo`) REFERENCES `modulos` (`idModulo`);

--
-- Constraints for table `usuariosCursos`
--
ALTER TABLE `usuariosCursos`
  ADD CONSTRAINT `usuarioscursos_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`idCurso`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuarioscursos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Constraints for table `videosClase`
--
ALTER TABLE `videosClase`
  ADD CONSTRAINT `videosclase_ibfk_1` FOREIGN KEY (`idClase`) REFERENCES `clases` (`idClase`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
