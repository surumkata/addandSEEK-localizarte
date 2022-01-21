-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 21, 2022 at 03:59 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localizarteDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `museum` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `username`, `museum`, `datetime`) VALUES
(17, 'runlo', 'museu do prado', '2022-01-21 15:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `museums`
--

CREATE TABLE `museums` (
  `name` varchar(60) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `categories` varchar(150) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `website` varchar(150) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `museums`
--

INSERT INTO `museums` (`name`, `adress`, `price`, `categories`, `contact`, `website`, `description`) VALUES
('museu do prado', 'C. de Ruiz de Alarcón, 23, 28014 Madrid, Espanha', 15, '1', '+34913302800', 'https://www.museodelprado.es', '');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` varchar(150) NOT NULL,
  `address` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `categories` varchar(15) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `website` varchar(150) NOT NULL,
  `picture` tinyint(1) NOT NULL,
  `newName` varchar(60) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `address`, `price`, `categories`, `contact`, `website`, `picture`, `newName`, `description`) VALUES
('museu do prado;runlo', 'C. de Ruiz de AlarcÃ³n, 23, 28014 Madrid, Espanha', 15, '1', '+34913302800', 'https://www.museodelprado.es', 0, 'museu do prado', 'ganda fixe mesmo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `preferences` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `password`, `email`, `birthdate`, `admin`, `preferences`) VALUES
('biladeiro', 'biladeiro', '69ed29fa5d6c9707d8a0e494e10641f0', 'localizarte@outlook.pt', '2001-01-20', 1, ''),
('runlo', 'Gonçalo Pereira', '6c6f35f15c9f3f7d88ddc5be3e746c23', 'phpmaster@gmail.com', '2001-05-06', 0, ''),
('surumkata', 'Tiago Silva', '1416bda6db1517eed29b34c964f70180', 'tstiagosilva2001@gmail.com', '2001-07-27', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `museums`
--
ALTER TABLE `museums`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
