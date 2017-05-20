-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 20-Maio-2017 às 08:15
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
  `tipo` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `defeito` varchar(255) NOT NULL,
  `solucao` varchar(255) NOT NULL,
  `codPeca` varchar(255) NOT NULL,
  `descricaoPeca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `equip_id` int(11) NOT NULL,
  `equip_nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 'Samsung');

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
(38, 'Falha na impressÃ£o', 'CabeÃ§ote ou cartucho de tinta com injetores (nozzles entupidos)"                                          ', 'Desentupir nozzles (limpar com alcool isopropilico e presionar cabeÃ§ote no papel higienico com agua)                                    ', 3, 0),
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
(73, 'carro travado', 'Correia arrebentada      ', 'Trocar Correia (observaÃ§Ã£o cuidar com o tamanho A0 ou A1)            ', 1, 0),
(77, '900', 'Erro generico de comunicaÃ§Ã£o entre placas (mau contatos no slot)      ', 'tirar a placa controle do slot e passar lima contato             ', 12, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `modelo_id` int(11) NOT NULL,
  `modelo_nome` varchar(255) DEFAULT NULL,
  `fab_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`modelo_id`, `modelo_nome`, `fab_fk`) VALUES
(1, 'Laserjet 1100', 1),
(2, 'Laserjet 4250', 1),
(3, 'Deskjet 1220', 1),
(4, 'Designjet 500', 1),
(5, 'Deskjet 950', 1),
(6, 'Deskjet 840', 1),
(7, 'Designjet 450C', 1),
(8, 'Laserjet 5000', 1),
(9, 'PSC 1210', 1),
(10, 'MFP 2727', 1),
(11, 'MFP 4345', 1),
(12, 'T640', 3);

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
  `equip_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_fab`
--

CREATE TABLE `tipo_fab` (
  `tipo_fk` int(11) DEFAULT NULL,
  `fab_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, '', '', '', '', 0);

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
  ADD KEY `fkFab` (`fab_fk`);

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
  ADD KEY `equip_id` (`equip_fk`);

--
-- Indexes for table `tipo_fab`
--
ALTER TABLE `tipo_fab`
  ADD KEY `tipo_id` (`tipo_fk`),
  ADD KEY `fab_id` (`fab_fk`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `equip_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `fab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `informacao`
--
ALTER TABLE `informacao`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `modelo`
--
ALTER TABLE `modelo`
  MODIFY `modelo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `peca`
--
ALTER TABLE `peca`
  MODIFY `peca_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `tipo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tipo`
--
ALTER TABLE `tipo`
  ADD CONSTRAINT `tipo_ibfk_1` FOREIGN KEY (`equip_fk`) REFERENCES `equipamento` (`equip_id`);

--
-- Limitadores para a tabela `tipo_fab`
--
ALTER TABLE `tipo_fab`
  ADD CONSTRAINT `tipo_fab_ibfk_1` FOREIGN KEY (`fab_fk`) REFERENCES `fabricante` (`fab_id`),
  ADD CONSTRAINT `tipo_fab_ibfk_2` FOREIGN KEY (`tipo_fk`) REFERENCES `tipo` (`tipo_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
