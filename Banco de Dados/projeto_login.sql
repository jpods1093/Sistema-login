-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Ago-2023 às 14:16
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL,
  `parent_post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `topic_id`, `content`, `created_at`, `id_usuario`, `parent_post_id`) VALUES
(1, 1, 'teste', '2023-07-11 15:48:21', 0, 0),
(2, 2, 'teste', '2023-07-11 15:50:01', 0, 0),
(4, 4, 'jajajaajajaja', '2023-07-12 07:52:18', 0, 0),
(31, 31, 'teste de post so pra testar', '2023-07-12 08:31:54', 0, 0),
(32, 32, 'vamos testar o id do usuario ', '2023-07-13 08:22:11', 1, 0),
(33, 33, 'novooo', '2023-07-19 14:52:36', 1, 0),
(34, 1, 'teste', '2023-07-21 08:38:28', 1, 1),
(35, 32, 'vai Deus', '2023-07-21 08:39:31', 1, 32),
(36, 1, 'daleeee', '2023-07-21 10:40:08', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `topics`
--

INSERT INTO `topics` (`id`, `title`, `created_at`) VALUES
(1, '', '2023-07-11 15:48:21'),
(2, '', '2023-07-11 15:50:01'),
(3, '', '2023-07-11 15:51:01'),
(4, 'teste', '2023-07-12 07:52:18'),
(5, '', '2023-07-12 08:09:15'),
(6, '', '2023-07-12 08:09:16'),
(31, 'teste', '2023-07-12 08:31:54'),
(32, 'daleee', '2023-07-13 08:22:11'),
(33, '222', '2023-07-19 14:52:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `acesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `telefone`, `email`, `senha`, `acesso`) VALUES
(1, 'Joao pedro oliveira ', '31991744196', 'jpods@gmail.com', '9cca6ed8777c23f4f4fb4ac6fd32babe', 1),
(3, 'thalles', '31999999999', 'thalles@teste.com', 'abc@123', 2),
(4, 'teste', '3199999999', 'teste@teste.com', '9cca6ed8777c23f4f4fb4ac6fd32babe', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Índices para tabela `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
