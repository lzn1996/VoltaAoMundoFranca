-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3312
-- Tempo de geração: 18/06/2024 às 12:39
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `volta_ao_mundo_franca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `commentaries`
--

CREATE TABLE `commentaries` (
  `id` varchar(36) NOT NULL,
  `guest_name` varchar(255) NOT NULL,
  `guest_email` varchar(64) NOT NULL,
  `commentary` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `commentaries`
--

INSERT INTO `commentaries` (`id`, `guest_name`, `guest_email`, `commentary`, `created_at`, `is_valid`) VALUES
('667163ca52e7a', 'teste', 'luan6992@outlook.com', 'asdasas', '2024-06-18 10:39:06', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `commentaries_response`
--

CREATE TABLE `commentaries_response` (
  `id` int(11) NOT NULL,
  `id_commentary` varchar(36) DEFAULT NULL,
  `response` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` varchar(36) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `created_at`) VALUES
('1718706761', '$2y$10$9I0a3vtTzqjWuyFHOkpCdOpYHPffxS0GCHj8.M4JKKIbzogmCg2SO', 'admin@admin.com', '2024-06-18 10:32:41');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `commentaries`
--
ALTER TABLE `commentaries`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `commentaries_response`
--
ALTER TABLE `commentaries_response`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaries_response_ibfk_1` (`id_commentary`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `commentaries_response`
--
ALTER TABLE `commentaries_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `commentaries_response`
--
ALTER TABLE `commentaries_response`
  ADD CONSTRAINT `commentaries_response_ibfk_1` FOREIGN KEY (`id_commentary`) REFERENCES `commentaries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
