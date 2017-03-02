-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 26/11/2016 às 05:11
-- Versão do servidor: 10.1.13-MariaDB
-- Versão do PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `EasyDiagError`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `informacoes`
--

CREATE TABLE `informacoes` (
  `id` int(11) NOT NULL,
  `erro` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `modelo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `informacoes`
--

INSERT INTO `informacoes` (`id`, `erro`, `descricao`, `modelo_id`) VALUES
(38, 'Falha na impressÃ£o', 'CabeÃ§ote ou cartucho de tinta com injetores (nozzles entupidos)"', 2),
(45, 'NÃ£o puxa papel', 'Roletes gastos patinam na hora de tracionar o papel da gaveta para o mecanismo da impressora', 2),
(46, '50', 'problema de aquecimento da unidade fusora', 2),
(48, 'NÃ£o Liga', 'cabo mal encaixado ou fonte queimada', 2),
(51, 'Tranca folha na saÃ­da', 'haste do sensor de passagem do papel gasta', 1),
(52, '51', 'Laser scanner danificado', 10),
(53, 'Puxando varias folhas', 'Separation pad gasto', 1),
(54, 'Carro trancado', 'Correira desfiando', 4),
(55, 'Cortando a impressÃ£o', 'Flat cable ressecado', 4),
(56, 'NÃ£o reconhece cartucho', 'Flat cable Quebrado', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `modelos`
--

INSERT INTO `modelos` (`id`, `nome`) VALUES
(1, 'Laserjet 1100'),
(2, 'Laserjet 4250'),
(3, 'Deskjet 1220'),
(4, 'Designjet 500'),
(5, 'Deskjet 950'),
(6, 'Deskjet 840'),
(7, 'Designjet 450C'),
(8, 'Laserjet 5000'),
(9, 'PSC 1210'),
(10, 'MFP 2727'),
(11, 'MFP 4345');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, 'fdrtec@gmail.com', '123'),
(2, 'alexs.jordao26@gmail.com', '123'),
(4, 'eduardo@gmail.com', '123');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `informacoes`
--
ALTER TABLE `informacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `informacoes`
--
ALTER TABLE `informacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de tabela `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
