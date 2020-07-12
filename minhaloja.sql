-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jul-2020 às 00:34
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `minhaloja`
--
CREATE DATABASE IF NOT EXISTS `minhaloja` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `minhaloja`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `busca` varchar(45) NOT NULL,
  `ordem` int(11) NOT NULL,
  `limite` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `valorold` decimal(10,2) NOT NULL,
  `caminho` varchar(23) NOT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `busca`, `ordem`, `limite`, `titulo`, `preco`, `valorold`, `caminho`, `grupo`) VALUES
(14, '', 0, 0, 'Calça Moletom', '199.90', '400.00', '2020.07.13-00.30.40.jpg', 1),
(15, '', 0, 0, 'Relógio muito bonito', '1999.90', '2000.00', '2020.07.12-22.47.33.jpg', 1),
(16, '', 0, 0, 'Tênis marca boa', '300.00', '499.00', '2020.07.12-22.47.47.jpg', 1),
(17, '', 0, 0, 'Tênis esportivo', '789.90', '400.00', '2020.07.12-22.47.58.jpg', 1),
(18, '', 0, 0, 'Camiseta Alternativa', '70.00', '99.90', '2020.07.12-22.48.07.jpg', 1),
(19, '', 0, 0, 'Camiseta Branca', '21.99', '50.00', '2020.07.12-22.48.16.jpg', 1),
(20, '', 0, 0, 'Kit 6 camisetas', '300.00', '399.90', '2020.07.12-22.48.25.jpg', 2),
(21, '', 0, 0, 'Camiseta Leão', '69.90', '70.00', '2020.07.12-22.48.35.jpg', 2),
(22, '', 0, 0, 'Skate radical', '350.99', '299.90', '2020.07.13-00.31.44.jpg', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `admin` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `admin`) VALUES
(1, 'marcos747', 'e6a8ed36bd4c5cbcbd0dd948ebcf72a2', '1'),
(6, 'cacao', '81dc9bdb52d04dc20036dbd8313ed055', '1'),
(7, 'cliente', '81dc9bdb52d04dc20036dbd8313ed055', '0'),
(8, 'marcos123', '432f45b44c432414d2f97df0e5743818', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
