-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Jan-2022 às 20:12
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
-- Estrutura da tabela `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id_history` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `museum` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_history`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

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
('museu do prado', 'C. de Ruiz de Alarcón, 23, 28014 Madrid, Espanha', 15, '1', '+34913302800', 'https://www.museodelprado.es', ''),
('museu do douro', 'R. do Marquês de Pombal, 5050-282 Peso da Régua', 30, '8;3', '254 310 190', 'https://www.museudodouro.pt/', 'O Museu do Douro é um museu localizado em Peso da Régua dedicado ao estudo e divulgação do património da Região Demarcada do Douro e dos seus vinhos, nomeadamente o vinho do Porto. '),
('museu de arqueologia D. Diogo de Sousa', 'Rua dos Bombeiros Voluntários', 3, '4;7', '253 615 844', 'mdds.imc-ip.pt', 'O Museu de Arqueologia D. Diogo de Sousa é um museu de arqueologia'),
('museu dos Biscaínhos', 'Rua dos Biscaínhos', 1, '4', '253 204 650', 'www.ipmuseus.pt/pt-PT/museus_palacios/ContentDetail.aspx?id=1111', 'O Palácio dos Biscainhos localiza-se na freguesia da Sé, cidade e concelho de Braga, distrito de mesmo nome, em Portugal. Foi erguido no século XVII e modificado ao longo dos séculos.');

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
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `requests`
--

INSERT INTO `requests` (`id`, `address`, `price`, `categories`, `contact`, `website`, `picture`, `description`) VALUES
('museu do douro;runlo', 'R. do Marquês de Pombal, 5050-282 Peso da Régua', 30, '3;8', '254 310 190', 'https://www.museudodouro.pt/', 0, 'O Museu do Douro é um museu localizado em Peso da Régua dedicado ao estudo e divulgação do património da Região Demarcada do Douro e dos seus vinhos, nomeadamente o vinho do Porto. '),
('museu do prado;runlo', 'C. de Ruiz de Alarcón, 23, 28014 Madrid, Espanha', 15, '1', '+34913302800', 'https://www.museodelprado.es', 0, 'testar');

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
('', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '1970-01-01', 0, ''),
('biladeiro', 'biladeiro', '69ed29fa5d6c9707d8a0e494e10641f0', 'localizarte@outlook.pt', '2001-01-20', 1, ''),
('brazafonso', 'Goncalo Braz', '435cad5c96a4cfc723361bfee68bd78a', 'brazafonso2001@gmail.com', '2001-02-02', 0, ''),
('runlo', 'Gonçalo Pereira', '6c6f35f15c9f3f7d88ddc5be3e746c23', 'phpmaster@gmail.com', '2001-05-06', 0, '3;4;8'),
('surumkata', 'Tiago Silva', '1416bda6db1517eed29b34c964f70180', 'tstiagosilva2001@gmail.com', '2001-07-27', 0, '');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
