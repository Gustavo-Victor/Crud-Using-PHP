-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jul-2021 às 20:40
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_usuario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` smallint(6) NOT NULL,
  `nome` char(70) NOT NULL,
  `email` char(70) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `nome`, `email`, `created`, `modified`) VALUES
(1, 'Gustavo Guanabara', 'guanabarator2000@gmail.com', '2021-07-13 00:45:37', '2021-07-13 15:08:38'),
(2, 'Juliana Souza', 'julianasouza321@gmail.com', '2021-07-13 00:45:37', NULL),
(3, 'Gabriel Silva', 'gabrielsilva333@hotmail.com', '2021-07-13 00:46:40', NULL),
(11, 'Guilherme Barbosa', 'guilhermebarbosa321@gmail.com', '2021-07-13 15:03:52', NULL),
(12, 'Givanildo Souza Silva', 'gilsouza445@hotmail.com', '2021-07-13 15:04:05', '2021-07-13 15:08:10'),
(13, 'Ingrid Vitória', 'ingridvitoria@gmail.com', '2021-07-13 15:04:13', NULL),
(14, 'Gabriel Santos', 'gabrielzinhosantos987@outlook.com', '2021-07-13 15:04:34', NULL),
(15, 'Sabrina Sato Campos da Silva', 'sabrina432@gmail.com', '2021-07-13 15:04:55', NULL),
(16, 'Metusalém Abraão', 'metuabraam876@gmail.com', '2021-07-13 15:05:36', NULL),
(17, 'Oliver Queen', 'oliverarrow888@gmail.com', '2021-07-13 15:06:18', NULL),
(18, 'Bruce Wayne', 'brunebat1000@gmail.com', '2021-07-13 15:06:35', NULL),
(19, 'Adriana Aranha', 'drianaaranha86@outlook.com', '2021-07-13 15:07:01', NULL),
(20, 'Marcelo Souza', 'marcelinho@gmail.com', '2021-07-13 15:07:17', NULL),
(21, 'Luciano Silva', 'lucianosilva@gmail.com', '2021-07-13 15:07:36', NULL),
(22, 'Lucas Pedro', 'lucaspedro7792@hotmail.com', '2021-07-13 15:07:59', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
