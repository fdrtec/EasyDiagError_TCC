-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 24-Jun-2017 às 03:19
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EasyDiagError`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `captacao`
--

CREATE TABLE `captacao` (
  `id` int(11) NOT NULL,
  `equipamento` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `erro` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `solucao` varchar(255) NOT NULL,
  `codPeca` varchar(255) NOT NULL,
  `descricaoPeca` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `captacao`
--

INSERT INTO `captacao` (`id`, `equipamento`, `tipo`, `fabricante`, `modelo`, `erro`, `descricao`, `solucao`, `codPeca`, `descricaoPeca`) VALUES
(166, 'impressora', 'Plotter', 'HP', 'Designjet 110plus nr', 'imprime com falhas', 'Falha na cor preta', 'Troca da cabeÃ§a de impressÃ£o', 'C4810A', 'CabeÃ§ote Preto de impressÃ£o '),
(167, 'impressora', 'Laser', 'HP', 'Laserjet Pro MFP M426dw', 'Painel sem informaÃ§Ãµes', 'Painel em branco ao ligar', 'Troca do painel ', 'B3Q10-60139', 'Painel de controle'),
(168, 'impressora', 'Plotter', 'HP', 'Designjet T120', 'NÃ£o completa alinhamento', 'cabeÃ§ote de impressÃ£o danificado', 'Troca da cabeÃ§a de impressÃ£o', 'C1Q10A', 'CabeÃ§a de impressÃ£o'),
(169, 'impressora', 'Laser', 'HP', 'Laserjet M1132 MFP', 'E8', 'Leitora danificada', 'Troca da leitora', 'CE847-60108', 'Leitora do mÃ³dulo de cÃ³pias'),
(170, 'impressora', 'Laser', 'HP', 'Laserjet Pro 400 M425', 'Acusa erro no ADF', 'Falha no ADF', 'Troca do ADF', 'CF288-60029', 'Alimentador de Documentos'),
(171, 'impressora', 'Laser', 'HP', 'Laserjet Enterprise M605', '98.00', 'Placa EMMC sem comunicaÃ§Ã£o', 'Troca da placa EMMC', 'B5L32-60001', 'Placa EMMC'),
(172, 'impressora', 'Laser', 'HP', 'Laserjet Pro MFP M426dw', 'ImpressÃ£o falhada', 'falta de polarizaÃ§Ã£o', 'Troca da placa LVPS', 'RM2-8518', 'Placa fonte de baixa tensÃ£o'),
(173, 'impressora', 'Laser', 'HP', 'Laserjet P2014', 'NÃ£o puxa papel pela bandeja MP', 'rolete tracionado gasto', 'Troca do rolete tracionador', 'RL1-1525-000CN', 'Rolete tracionador'),
(174, 'impressora', 'Laser', 'HP', 'Laserjet P2014', 'Barulho no funcionamento', 'engrenagem fusor gasta', 'Troca da engrenagem de suporte do fusor', 'RC1-3575-000CN', 'Engrenagem com balancim'),
(175, 'impressora', 'Plotter', 'HP', 'Designjet T520', 'Erro no sistema de tinta', 'CabeÃ§a de impressÃ£o danificada', 'Troca da cabeÃ§a de impressÃ£o', 'C1Q10A', 'CabeÃ§a de impressÃ£o'),
(176, 'impressora', 'Laser', 'HP', 'Laserjet Pro 400 M425', 'Erro 52', 'laser scanner pifado', 'Troca do Laser Scanner', 'RM1-9135-000CN', 'Laser Scanner'),
(177, 'impressora', 'Laser', 'HP', 'Color Laserjet CP1525', 'ImpressÃ£o falhada', 'Fita da esteira marcada', 'Troca da esteira de transferÃªncia', 'RM1-7866-000CN', 'Esteira de transferÃªncia'),
(178, 'impressora', 'Laser', 'HP', 'Laserjet P2055', 'Atolamento de papel', 'Pelicula nÃ£o gira', 'Troca do fusor', 'RM1-6405-000CN', 'Fusor 110v'),
(179, 'impressora', 'Laser', 'HP', 'Laserjet Pro 400 M425', 'Falso atolamento no ADF', 'falha na comunicacao dos sensores', 'Troca do Alimentador AutomÃ¡tico de Documentos', 'CF288-60029', 'Alimentador AutomÃ¡tico de Documentos'),
(180, 'impressora', 'Jato de Tinta', 'HP', 'Officejet Pro X476', 'Painel touch nÃ£o funciona', 'Painel inoperante', 'Troca do painel touchscreen', 'CN461-60002', 'Painel de controle touchscreen');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `equip_id` int(11) NOT NULL,
  `equip_nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`equip_id`, `equip_nome`) VALUES
(1, 'Impressora'),
(2, 'Notebook'),
(3, 'TV'),
(4, 'PC Desktop'),
(5, 'Tablet'),
(6, 'Celular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante`
--

CREATE TABLE `fabricante` (
  `fab_id` int(11) NOT NULL,
  `fab_nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fabricante`
--

INSERT INTO `fabricante` (`fab_id`, `fab_nome`) VALUES
(1, 'HP'),
(2, 'Ricoh'),
(3, 'Lexmark'),
(4, 'Epson'),
(5, 'Sony'),
(6, 'Apple'),
(7, 'Lenovo'),
(8, 'Dell'),
(9, 'Samsung'),
(10, 'Bematech');

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacao`
--

CREATE TABLE `informacao` (
  `info_id` int(11) NOT NULL,
  `erro` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `solucao` varchar(250) NOT NULL,
  `modelo_fk` int(11) NOT NULL,
  `peca_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `informacao`
--

INSERT INTO `informacao` (`info_id`, `erro`, `descricao`, `solucao`, `modelo_fk`, `peca_fk`) VALUES
(38, 'Falha na impressÃ£o', 'CabeÃ§ote ou cartucho de tinta com injetores (nozzles entupidos)                                                                                 ', 'Desentupir nozzles (limpar com alcool isopropÃ­lico e pressionar cabeÃ§ote no papel higiÃªnico com Ã¡gua)                                                                              ', 3, 0),
(45, 'NÃ£o puxa papel', 'roletes patinam na hora de tracionar o papel da gaveta para o mecanismo da impressora            ', 'Trocar Roletes gastos      ', 2, 0),
(46, '50', 'problema de aquecimento da unidade fusora            ', 'Medir: sensor de temperatura (330k), fusistor (1R) , se caso de  lampada(3R) ou resistencia(34R), troque a peÃ§a que estÃ¡ com a mediÃ§Ã£o em aberto        ', 1, 0),
(48, 'NÃ£o Liga', 'cabo mal encaixado ou fonte queimada            ', 'testar cabo ac e saÃ­da da fonte com multimetro. testar o equipamento com outra fonte ou providenciar reparo', 11, 0),
(51, 'Tranca folha na saÃ­da', 'haste do sensor de passagem do papel gasta      ', 'troca o conjunto de sensores de passagem do papel      ', 1, 0),
(52, '51', 'Laser scanner danificado            ', 'abrir e verificar se hÃ¡ obstruÃ§Ã£o do feixe de luz, se nÃ£o trocar a unidade', 10, 0),
(53, 'Puxando varias folhas', 'Separation pad gasto', '', 1, 0),
(54, 'Carro trancado', 'Correira desfiando      ', 'Colocar correia nova (cuidar se o tamanho Ã© A0 ou A1)', 4, 0),
(55, 'Cortando a impressÃ£o', 'Flat cable ressecado      ', 'Trocar o flat cable      ', 3, 0),
(56, 'NÃ£o reconhece cartucho', 'Flat cable Quebrado      ', 'trocar o Flat cable', 5, 0),
(71, 'Embola papel na bandeja', 'Ao puxar folhas embola papel na parte traseira da bandeja            ', 'Fazer ajuste nas travas traseiras para que a bandeja encaixe perfeitamente no fundo            ', 6, 0),
(73, 'Carro travado', 'Correia arrebentada            ', 'Trocar Correia (observaÃ§Ã£o cuidar com o tamanho A0 ou A1)                  ', 7, 0),
(77, '900', 'Erro generico de comunicaÃ§Ã£o entre placas (mau contatos no slot)            ', 'tirar a placa controle do slot e passar limpa contato                   ', 12, 0),
(82, 'Faixa preta na digitalizaÃ§Ã£o e na cÃ³pia', 'Ao digitalizar uma  folha no scanner de mesa, o resultado Ã© um risco vertical preto em toda copia      ', 'Trocar o flat cable quebrado', 13, 0),
(83, 'NÃ£o puxa papel', '   Tracionadores de papel gastos', '      Abra a gaveta, e verifique o estado dos roles no eixo coletor, se as borrachas estiverem lisa, solicite a troca', 14, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `modelo_id` int(11) NOT NULL,
  `modelo_nome` varchar(255) DEFAULT NULL,
  `tipo_fab_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`modelo_id`, `modelo_nome`, `tipo_fab_fk`) VALUES
(1, 'Laserjet 1100', 4),
(2, 'Laserjet 4250', 4),
(3, 'Deskjet 1220', 1),
(4, 'Designjet 500', 9),
(5, 'Deskjet 950', 1),
(6, 'Deskjet 840', 1),
(7, 'Designjet 450C', 9),
(8, 'Laserjet 5000', 4),
(9, 'PSC 1210', 1),
(10, 'MFP 2727', 4),
(11, 'MFP 4345', 4),
(12, 'T640', 6),
(13, 'X1100', 2),
(14, 'E332', 2),
(15, 'Laserjet P2014', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `peca`
--

CREATE TABLE `peca` (
  `peca_id` int(11) NOT NULL,
  `peca_nome` varchar(100) NOT NULL,
  `peca_codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `tipo_id` int(11) NOT NULL,
  `tipo_nome` varchar(255) DEFAULT NULL,
  `equip_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`tipo_id`, `tipo_nome`, `equip_fk`) VALUES
(1, 'Jato de Tinta', 1),
(2, 'Laser', 1),
(3, 'Plotter', 1),
(4, 'Matricial', 1),
(5, 'Termica', 1),
(6, '14', 2),
(7, '15', 2),
(8, '17', 2),
(9, '15.6', 2),
(10, 'LCD', 3),
(11, 'LED', 3),
(12, 'Plasma', 3),
(13, 'Intel', 4),
(14, 'AMD', 4),
(15, '5', 5),
(16, '7', 5),
(17, '10.1', 5),
(18, 'Smartphone', 6),
(19, 'Convencional', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_fab`
--

CREATE TABLE `tipo_fab` (
  `id_tipo_fab` int(11) NOT NULL,
  `tipo_fk` int(11) NOT NULL,
  `fab_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_fab`
--

INSERT INTO `tipo_fab` (`id_tipo_fab`, `tipo_fk`, `fab_fk`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 2, 4),
(8, 2, 9),
(9, 3, 1),
(10, 4, 1),
(11, 5, 10),
(12, 6, 1),
(13, 6, 5),
(14, 6, 8),
(15, 6, 9),
(16, 7, 1),
(17, 7, 5),
(18, 7, 8),
(19, 7, 9),
(20, 8, 1),
(21, 8, 5),
(22, 8, 8),
(23, 8, 9),
(24, 9, 1),
(25, 9, 5),
(26, 9, 8),
(27, 9, 9),
(28, 10, 5),
(29, 10, 9),
(30, 11, 5),
(31, 11, 9),
(32, 12, 5),
(33, 12, 9),
(34, 13, 1),
(35, 13, 7),
(36, 13, 8),
(37, 14, 1),
(38, 14, 7),
(39, 14, 8),
(40, 15, 6),
(41, 15, 9),
(42, 16, 6),
(43, 16, 9),
(44, 17, 6),
(45, 17, 9),
(46, 18, 5),
(47, 18, 6),
(48, 18, 7),
(49, 18, 9),
(50, 19, 5),
(51, 19, 7),
(52, 19, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `adminstrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `endereco`, `celular`, `adminstrador`) VALUES
(1, 'fdrtec@gmail.com', '123', '', '', 1),
(2, 'alexs.jordao26@gmail.com', '123', '', '', 1),
(4, 'eduardo@gmail.com', '123', '', '', 0),
(5, '', '', '', '', 0),
(6, 'leotux05@gmail.com', 'Senha', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `captacao`
--
ALTER TABLE `captacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`equip_id`);

--
-- Indexes for table `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`fab_id`);

--
-- Indexes for table `informacao`
--
ALTER TABLE `informacao`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `FKModelo` (`modelo_fk`),
  ADD KEY `FKPeca` (`peca_fk`) USING BTREE;

--
-- Indexes for table `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`modelo_id`),
  ADD KEY `tipo_fab_fk` (`tipo_fab_fk`);

--
-- Indexes for table `peca`
--
ALTER TABLE `peca`
  ADD PRIMARY KEY (`peca_id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`tipo_id`),
  ADD KEY `equip_fk` (`equip_fk`);

--
-- Indexes for table `tipo_fab`
--
ALTER TABLE `tipo_fab`
  ADD PRIMARY KEY (`id_tipo_fab`),
  ADD KEY `tipo_fk` (`tipo_fk`),
  ADD KEY `fab_fk` (`fab_fk`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `captacao`
--
ALTER TABLE `captacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `equip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `fab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `informacao`
--
ALTER TABLE `informacao`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `modelo`
--
ALTER TABLE `modelo`
  MODIFY `modelo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `peca`
--
ALTER TABLE `peca`
  MODIFY `peca_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `tipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tipo_fab`
--
ALTER TABLE `tipo_fab`
  MODIFY `id_tipo_fab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `tipo_fab_ibfk` FOREIGN KEY (`tipo_fab_fk`) REFERENCES `tipo_fab` (`id_tipo_fab`);

--
-- Limitadores para a tabela `tipo_fab`
--
ALTER TABLE `tipo_fab`
  ADD CONSTRAINT `fab_ibfk` FOREIGN KEY (`fab_fk`) REFERENCES `fabricante` (`fab_id`),
  ADD CONSTRAINT `tipo_ibfk` FOREIGN KEY (`tipo_fk`) REFERENCES `tipo` (`tipo_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
