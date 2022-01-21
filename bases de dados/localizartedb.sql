-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Jan-2022 às 01:29
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `localizartedb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `museums`
--

DROP TABLE IF EXISTS `museums`;
CREATE TABLE IF NOT EXISTS `museums` (
  `name` varchar(60) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `categories` varchar(150) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `website` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `museums`
--

INSERT INTO `museums` (`name`, `adress`, `price`, `categories`, `contact`, `website`, `description`) VALUES
('museu do prado', 'C. de Ruiz de Alarcón, 23, 28014 Madrid, Espanha', 15, '1', '+34913302800', 'https://www.museodelprado.es', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` varchar(150) NOT NULL,
  `address` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `categories` varchar(15) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `website` varchar(150) NOT NULL,
  `picture` tinyint(1) NOT NULL,
  `newName` varchar(60) NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `requests`
--

INSERT INTO `requests` (`id`, `address`, `price`, `categories`, `contact`, `website`, `picture`, `newName`, `description`) VALUES
('museu do prado;runlo', 'C. de Ruiz de AlarcÃ³n, 23, 28014 Madrid, Espanha', 15, '1', '+34913302800', 'https://www.museodelprado.es', 0, 'museu do prado', 'ganda fixe mesmo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `preferences` varchar(150) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`username`, `name`, `password`, `email`, `birthdate`, `admin`, `preferences`) VALUES
('biladeiro', 'biladeiro', '69ed29fa5d6c9707d8a0e494e10641f0', 'localizarte@outlook.pt', '2001-01-20', 1, ''),
('runlo', 'Gonçalo Pereira', '6c6f35f15c9f3f7d88ddc5be3e746c23', 'phpmaster@gmail.com', '2001-05-06', 0, ''),
('surumkata', 'Tiago Silva', '1416bda6db1517eed29b34c964f70180', 'tstiagosilva2001@gmail.com', '2001-07-27', 0, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
