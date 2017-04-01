-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 01-Abr-2017 às 05:38
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
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante`
--

CREATE TABLE `fabricante` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fabricante`
--

INSERT INTO `fabricante` (`id`, `nome`) VALUES
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
  `id` int(11) NOT NULL,
  `erro` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `solucao` varchar(250) NOT NULL,
  `modelo_id` int(11) DEFAULT NULL,
  `fabricante_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `informacao`
--

INSERT INTO `informacao` (`id`, `erro`, `descricao`, `solucao`, `modelo_id`, `fabricante_id`) VALUES
(38, 'Falha na impressÃ£o', 'CabeÃ§ote ou cartucho de tinta com injetores (nozzles entupidos)"', '', 2, 1),
(45, 'NÃ£o puxa papel', 'Roletes gastos patinam na hora de tracionar o papel da gaveta para o mecanismo da impressora', '', 2, 1),
(46, '50', 'problema de aquecimento da unidade fusora', '', 2, 1),
(48, 'NÃ£o Liga', 'cabo mal encaixado ou fonte queimada', '', 2, 1),
(51, 'Tranca folha na saÃ­da', 'haste do sensor de passagem do papel gasta', '', 1, 1),
(52, '51', 'Laser scanner danificado', '', 10, 1),
(53, 'Puxando varias folhas', 'Separation pad gasto', '', 1, 1),
(54, 'Carro trancado', 'Correira desfiando', '', 4, 1),
(55, 'Cortando a impressÃ£o', 'Flat cable ressecado', '', 4, 1),
(56, 'NÃ£o reconhece cartucho', 'Flat cable Quebrado', '', 3, 1),
(70, 'teste', 'pifado            ', '  trocado         ', 1, 1),
(71, 'Embola papel na bandeja', 'Ao puxar folhas embola papel na parte traseira da bandeja      ', 'Fazer ajuste nas travas traseiras para que a bandeja encaixe perfeitamente no fundo      ', 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `fab_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`id`, `nome`, `fab_id`) VALUES
(1, 'Laserjet 1100', NULL),
(2, 'Laserjet 4250', NULL),
(3, 'Deskjet 1220', NULL),
(4, 'Designjet 500', NULL),
(5, 'Deskjet 950', NULL),
(6, 'Deskjet 840', NULL),
(7, 'Designjet 450C', NULL),
(8, 'Laserjet 5000', NULL),
(9, 'PSC 1210', NULL),
(10, 'MFP 2727', NULL),
(11, 'MFP 4345', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_info`
--

CREATE TABLE `modelo_info` (
  `id` int(11) NOT NULL,
  `modelo_id` int(11) DEFAULT NULL,
  `info_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `equip_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_fab`
--

CREATE TABLE `tipo_fab` (
  `id` int(11) NOT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `fab_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, 'fdrtec@gmail.com', '123'),
(2, 'alexs.jordao26@gmail.com', '123'),
(4, 'eduardo@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informacao`
--
ALTER TABLE `informacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fab_id` (`fab_id`);

--
-- Indexes for table `modelo_info`
--
ALTER TABLE `modelo_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modelo_id` (`modelo_id`),
  ADD KEY `info_id` (`info_id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equip_id` (`equip_id`);

--
-- Indexes for table `tipo_fab`
--
ALTER TABLE `tipo_fab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_id` (`tipo_id`),
  ADD KEY `fab_id` (`fab_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `informacao`
--
ALTER TABLE `informacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `modelo_info`
--
ALTER TABLE `modelo_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_fab`
--
ALTER TABLE `tipo_fab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
