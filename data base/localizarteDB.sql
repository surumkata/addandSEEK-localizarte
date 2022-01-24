-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 24, 2022 at 07:16 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `museums`
--

CREATE TABLE `museums` (
  `name` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `categories` varchar(150) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `website` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `coords` varchar(50) NOT NULL,
  `schedule` varchar(170) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `museums`
--

INSERT INTO `museums` (`name`, `address`, `price`, `categories`, `contact`, `website`, `description`, `coords`, `schedule`) VALUES
('Museo del Prado', 'C. de Ruiz de Alarcón, 23, 28014 Madrid, Espanha', 15, '1', '(+34) 913 30 28 00', 'https://www.museodelprado.es/', 'O Museu do Prado é o mais importante museu da Espanha e um dos mais importantes do mundo. Apresentando belas e preciosas obras de arte, localiza-se em Madrid e foi mandado construir por Carlos III. As obras de construção se estenderam por muitos anos, tendo sido inaugurado somente no reinado de Fernando VII.', '40.41433727248034, -3.6922129306929286', '10:00-19:00;10:00-20:00;10:00-20:00;10:00-20:00;10:00-20:00;10:00-20:00;10:00-20:00'),
('Museu do Douro', 'R. do Marquês de Pombal, 5050-282 Peso da Régua', 30, '3;8', '(+351) 254 310 190', 'https://www.museudodouro.pt/', 'O Museu do Douro é um museu localizado em Peso da Régua dedicado ao estudo e divulgação do património da Região Demarcada do Douro e dos seus vinhos, nomeadamente o vinho do Porto. Foi criado pela Assembleia da República, em 1997, através da Lei n.º 125/97 de 2 de Dezembro.', '41.16167605455531, -7.789968784653535', '10:00-18:00;10:00-18:00;10:00-18:00;10:00-18:00;10:00-18:00;10:00-18:00;10:00-18:00'),
('Museu D. Diogo de Sousa', 'R. dos Bombeiros Voluntários s/n, 4700-025 Braga', 3, '4;7', '(+351) 253 273 706 / 253 615 844', 'https://www.museuddiogodesousa.gov.pt/', 'O Museu de Arqueologia D. Diogo de Sousa é um museu de arqueologia localizado em Braga, Portugal.', '41.54658589900556, -8.427328346039392', '10:00-17:30;_;10:00-17:30;10:00-17:30;10:00-17:30;10:00-17:30;10:00-17:30'),
('Museu dos Biscaínhos', 'R. dos Biscaínhos s/n, 4700-415 Braga', 1, '4', '(+351) 253204650', 'www.ipmuseus.pt/pt-PT/museus_palacios/ContentDetail.aspx?id=1111', 'O Palácio dos Biscainhos localiza-se na freguesia da Sé, cidade e concelho de Braga, distrito de mesmo nome, em Portugal.', '41.55172925812263, -8.429360453960607', '10:00–12:30,14:00–17:30;_;10:00–12:30,14:00–17:30;10:00–12:30,14:00–17:30;10:00–12:30,14:00–17:30;10:00–12:30,14:00–17:30;10:00–12:30,14:00–17:30'),
('Museu dos Coches', 'Av. da Índia 136, 1300-300 Lisboa', 8, '4', '(+351) 210492400', 'http://museudoscoches.gov.pt/pt/', 'O Museu Nacional dos Coches possui a mais importante colecção, a nível mundial, de coches e carruagens reais do século XVI ao século XIX.', '38.697166796283796, -9.198360869316325', '10:00–18:00;_;10:00–18:00;10:00–18:00;10:00–18:00;10:00–18:00;10:00–18:00'),
('Musée du Louvre', 'Rue de Rivoli, 75001 Paris, França', 15, '1', '(+33) 140205050', 'https://www.louvre.fr/', 'Louvre ou Museu do Louvre é o maior museu de arte do mundo e um monumento histórico em Paris, França. Um marco central da cidade, está localizado na margem direita do rio Sena, no 1º arrondissement da cidade.', '48.86120400439847, 2.337644', '09:00–18:00;09:00–18:00;_;09:00–18:00;09:00–18:00;09:00–18:00;09:00–18:00'),
('Museu CR7', 'Praça CR7, Av. Sá Carneiro Nº27, 9004-518 Funchal', 5, '2', '(+351) 291639880', 'https://museucr7.com/', 'O Museu CR7 é um museu português onde está retratada a história do futebolista português Cristiano Ronaldo e que se situa numa das principais zonas turísticas da cidade do Funchal, Madeira.', '32.64478811493884, -16.9135733772653', '_;10:00–17:00;10:00–17:00;10:00–17:00;10:00–17:00;10:00–17:00;_'),
('Bob Marley Museum', '6, 56 Hope Rd, Kingston, Jamaica', 22, '2', '(+1) 8766301588', 'https://www.bobmarleymuseum.com/', 'O Museu Bob Marley fica em Kingston, Jamaica, e é dedicado ao músico de reggae Bob Marley. Localiza-se ao número 56 da Hope Road, Kingston 6, antiga residência do cantor. O museu oferece a oportunidade de conhecer informações sobre o cantor, sua vida e sua música, a partir de objetos, exposições e peças pessoais.', '18.020324395700246, -76.7797008306837', '_;09:30–16:00;09:30–16:00;_;09:30–16:00;09:30–16:00;_'),
('Mosteiro dos Jerónimos', 'Praça do Império 1400-206 Lisboa', 10, '2;4', '(+351) 213620034', 'http://www.mosteirojeronimos.pt/', 'O Mosteiro de Santa Maria de Belém, mais conhecido como Mosteiro dos Jerónimos, é um mosteiro português, mandado construir no final do século XV pelo rei D. Manuel I e estava entregue à Ordem de São Jerónimo. Situa-se na freguesia de Belém, na cidade e concelho de Lisboa.', '38.698661244663974, -9.206660984658164', '10:00–17:00;_;10:00–17:00;10:00–17:00;10:00–17:00;10:00–17:00;10:00–17:00'),
('The Sherlock Holmes Museum', '221b Baker St, London NW1 6XE, Reino Unido', 12, '8', '(+44) 2072243688', 'https://www.sherlock-holmes.co.uk/', 'O Museu Sherlock Holmes é um museu privado britânico dedicado ao detetive ficcional Sherlock Holmes. Foi fundado a 27 de março de 1990 e está situado na Baker Street, em Londres, Inglaterra, na mesma rua onde Arthur Conan Doyle fez residir Holmes na fictícia 221B.', '51.524541336778725, -0.15838403863264966', '10:00–17:00;_;_;10:00–17:00;10:00–17:00;10:00–17:00;10:00–17:00'),
('Madame Tussauds London', 'Marylebone Rd, London NW1 5LR, Reino Unido', 40, '1;8', '(+44) 8718943000', 'https://www.madametussauds.com/london/en/', 'O Museu Madame Tussauds é um famoso museu de figuras de cera. Possui a maior coleção de figuras de celebridades.', '51.52341792726064, -0.15453296136735034', '10:00–15:00;10:00–15:00;10:00–15:00;10:00–15:00;10:00–15:00;10:00–15:00;10:00–15:00'),
('Anacostia Community Museum', '1901 Fort Pl SE, Washington, DC 20020, Estados Unidos', 62, '3;5', '(+1) 202 633 4820', 'http://www.anacostia.si.edu/', 'O Anacostia Community Museum é um museu comunitário no bairro de Anacostia, em Washington, DC, nos Estados Unidos. É um dos vinte museus sob a égide da Smithsonian Institution e foi o primeiro museu comunitário financiado pelo governo federal nos Estados Unidos.', '38.85721257689791, -76.9766145232908', '_;_;11:00–16:00;11:00–16:00;11:00–16:00;11:00–16:00;11:00–16:00'),
('Brooklyn Museum', '200 Eastern Pkwy, Brooklyn, NY 11238, Estados Unidos', 14, '1;3', '(+1) 718 638 5000', 'https://www.brooklynmuseum.org/', 'O Brooklyn Museum, fundado em 1895 e localizado no Eastern Parkway, em Nova York na subprefeitura de Brooklyn, é o segundo maior museu de arte na cidade de Nova York, e um dos maiores nos Estados Unidos. Atualmente, Arnold L. Lehman é o diretor do museu.', '40.67185718992334, -73.96363060000002', '11:00–18:00;_;_;11:00–18:00;11:00–18:00;11:00–20:00;11:00–20:00'),
('Museu da Cidade Porto', 'R. da Alfândega 10, 4050-029 Porto', 4, '4;5;8', '', 'https://museudacidadeporto.pt/', 'Um Museu à escala da Cidade constituído por sistema que incorpora 17 estações, entre sítios arqueológicos, núcleos museológicos, parques e jardins implantados no território.', '41.14162418615261, -8.613665315237993', '_;_;10:00-19:00;10:00-19:00;10:00-19:00;10:00-19:00;10:00-19:00'),
('Museu da Cidade de Aveiro', 'R. João Mendonça n. 9, 3800-200 Aveiro', 2, '1;5', '(+351) 234 406 485', 'http://www.cm-aveiro.pt/', 'Museu num antigo convento dedicado às belas-artes, com objetos sagrados e exposições temporárias.', '40.64221461512449, -8.654074331239785', '10:00-12:30,13:30-18:00;10:00-12:30,13:30-18:00;10:00-12:30,13:30-18:00;10:00-12:30,13:30-18:00;10:00-12:30,13:30-18:00;10:00-12:30,13:30-18:00;10:00-12:30,13:30-18:00'),
('Museu Militar do Porto', 'Rua do Heroísmo 329, 4300-096 Porto', 3, '4;5;6', '', 'http://www.patrimoniocultural.gov.pt/pt/museus-e-monumentos/rede-portuguesa/m/museu-militar-do-porto/', 'O Museu Militar do Porto é uma instituição pertencente ao Exército Português, vocacionada para a preservação da história popular.', '41.14654505007665, -8.594999338632649', '10:00-12:30,14:00-17:00;_;10:00-12:30,14:00-17:00;10:00-12:30,14:00-17:00;10:00-12:30,14:00-17:00;10:00-12:30,14:00-17:00;14:00-17:00'),
('Centro de Interpretação da História Militar', 'Paço do Marquês, 4990-062 Pte. de Lima', 1, '4;6', '(+351) 258 240 211', 'http://www.museuspontedelima.com/', 'Instalado no imponente edifício conhecido como Paço do Marquês, erguido na segunda metade do século XV como residência do alcaide-mor D. Leonel de Lima, o Centro de Interpretação da História Militar de Ponte de Lima resulta de um protocolo estabelecido entre o Exército Português e o Município de Ponte de Lima em 2011.', '41.766798917889005, -8.583194784653534', '10:00-12:00,14:00-17:00;_;10:00-12:00,14:00-17:00;10:00-12:00,14:00-17:00;10:00-12:00,14:00-17:00;10:00-12:00,14:00-17:00;10:00-12:00,14:00-17:00'),
('Museu Nacional de História Natural e da Ciência', 'R. da Escola Politécnica 56, 1250-102 Lisboa', 20, '1;4;5;7', '(+351) 213 921 800', 'https://www.museus.ulisboa.pt/', 'O Museu Nacional de História Natural e da Ciência / Museus da Universidade de Lisboa (MUHNAC / MULisboa) é um organismo da Universidade de Lisboa que tem como missão promover a curiosidade e a compreensão pública sobre a natureza e a ciência, através da valorização das suas colecções e do património universitário, da investigação, da realização de exposições, conferências e outras acções de carácter científico, educativo, cultural e de lazer.', '38.71848341526484, -9.150701369316325', '10:00-17:00;_;10:00-17:00;10:00-17:00;10:00-17:00;10:00-17:00;10:00-17:00'),
('Galeria da Biodiversidade', 'Rua do Campo Alegre 1191, 4150-181 Porto', 5, '5;7', '(+351) 220 408 700', 'https://mhnc.up.pt/galeria-da-biodiversidade/', 'Instalada na Casa Andresen, no Jardim Botânico do Porto, a Galeria da Biodiversidade – Centro Ciência Viva surge como o produto da primeira fase do ambicioso plano de reabilitação do MHNC-UP, que se encontra neste momento em curso, em colaboração próxima com a Agência Ciência Viva.', '41.15434853040452, -8.642620230683676', '10:00-13:00,14:00-18:00;_;10:00-13:00,14:00-18:00;10:00-13:00,14:00-18:00;10:00-13:00,14:00-18:00;10:00-13:00,14:00-18:00;10:00-13:00,14:00-18:00'),
('Museu Benfica Cosme Damião', 'Av. Eusébio da Silva Ferreira Porta 9, 1500-313 Lisboa', 10, '2;3;4;5;8', '(+351) 217 219 590', 'https://museubenfica.slbenfica.pt/', 'O Museu Benfica – Cosme Damião é um museu dedicado à história do Sport Lisboa e Benfica, da cidade de Lisboa e do mundo e está situado no exterior do Estádio da Luz, em Lisboa, Portugal.', '38.75212383176818, -9.184086507948974', '10:00-18:00;_;10:00-18:00;10:00-18:00;10:00-18:00;10:00-18:00;10:00-18:00');

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
  `description` varchar(500) NOT NULL,
  `schedule` varchar(170) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
('brazafonso', 'Goncalo Braz', '435cad5c96a4cfc723361bfee68bd78a', 'brazafonso2001@gmail.com', '2001-02-02', 0, ''),
('runlo', 'Gonçalo Pereira', '6c6f35f15c9f3f7d88ddc5be3e746c23', 'phpmaster@gmail.com', '2001-05-06', 0, '3;4;8'),
('simaocunha71', 'Simão Cunha', '72304a27b99a82bbed40ddaa814f3464', 'simaopscunha@outlook.pt', '2001-01-07', 0, '4;5;8'),
('surumkata', 'Tiago Silva', '1416bda6db1517eed29b34c964f70180', 'tstiagosilva2001@gmail.com', '2001-07-27', 0, '1;4;8');

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
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;

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
