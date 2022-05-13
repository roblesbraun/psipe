-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 02, 2022 at 11:44 PM
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
-- Table structure for table `bibliotecaClase`
--

CREATE TABLE `bibliotecaClase` (
  `idArchivo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `rutaArchivo` varchar(255) NOT NULL,
  `idClase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bibliotecaCurso`
--

CREATE TABLE `bibliotecaCurso` (
  `idBiblioteca` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `carruselClase`
--

CREATE TABLE `carruselClase` (
  `idImagen` int(11) NOT NULL,
  `rutaImagen` varchar(255) NOT NULL,
  `idClase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `videosClase`
--

CREATE TABLE `videosClase` (
  `idVideo` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `idClase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `videosClase`
--
ALTER TABLE `videosClase`
  ADD PRIMARY KEY (`idVideo`),
  ADD KEY `idClase` (`idClase`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bibliotecaClase`
--
ALTER TABLE `bibliotecaClase`
  MODIFY `idArchivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bibliotecaCurso`
--
ALTER TABLE `bibliotecaCurso`
  MODIFY `idBiblioteca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bibliotecaCursoArchivos`
--
ALTER TABLE `bibliotecaCursoArchivos`
  MODIFY `idArchivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carruselClase`
--
ALTER TABLE `carruselClase`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clases`
--
ALTER TABLE `clases`
  MODIFY `idClase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idCurso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `videosClase`
--
ALTER TABLE `videosClase`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `videosClase`
--
ALTER TABLE `videosClase`
  ADD CONSTRAINT `videosclase_ibfk_1` FOREIGN KEY (`idClase`) REFERENCES `clases` (`idClase`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
