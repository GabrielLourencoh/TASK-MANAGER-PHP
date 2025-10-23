-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/10/2025 às 15:52
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `task_manager`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `task`
--

CREATE TABLE `task` (
  `ID` int(11) NOT NULL,
  `DATE_TIME` datetime NOT NULL,
  `TITLE` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPTION` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `STATUS` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `task`
--

INSERT INTO `task` (`ID`, `DATE_TIME`, `TITLE`, `DESCRIPTION`, `STATUS`, `USER_ID`) VALUES
(1, '2025-10-23 10:42:00', 'titulo da task', 'task criada', 1, 3),
(2, '2025-10-23 10:52:16', 'titulo da task', 'task criada', 1, 3),
(3, '2025-10-23 10:52:18', 'titulo da task', 'task criada', 1, 3),
(4, '2025-10-23 10:52:18', 'titulo da task', 'task criada', 1, 3),
(5, '2025-10-23 10:52:19', 'titulo da task', 'task criada', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1 - ADMIN | 2 - USER'
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_bin;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Gabriel Lourenco', 'lourenco@teste.com', 'minhasenha123', 1),
(2, 'Gabriel Lourenco', 'lourenco@teste.com', 'minhasenha123', 1),
(3, 'Gabriel Lourenco', 'lourenco@teste.com', 'minhasenha123', 1),
(4, 'Gabriel Lourenco', 'lourenco@teste.com', 'minhasenha123', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `task`
--
ALTER TABLE `task`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
