-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3312
-- Tempo de geração: 12/06/2024 às 20:18
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
('6669e501e3bd2', 'carlos', 'carlos.freitas@example.com', 'Estou impressionado com a qualidade do conteúdo!', '2024-06-12 18:12:17', 1),
('6669e501ea814', 'lucas', 'lucas.oliveira@example.com', 'Muito obrigado pela iniciativa de compartilhar esse conhecimento!', '2024-06-12 18:12:17', 0),
('6669e501eda27', 'juliana', 'juliana.almeida@example.com', 'Parabéns pela organização e clareza das informações!', '2024-06-12 18:12:17', 0),
('6669e501f11ad', 'pedro', 'pedro.souza@example.com', 'Excelente trabalho! Continuem assim, estou ansioso por mais conteúdo.', '2024-06-12 18:12:17', 0),
('6669e501f3eb3', 'mariana', 'mariana.lima@example.com', 'Obrigado por disponibilizarem esse material de forma gratuita!', '2024-06-12 18:12:17', 0),
('6669e50200a90', 'rafael', 'rafael.silva@example.com', 'Seu site é uma fonte valiosa de informações, continue assim!', '2024-06-12 18:12:18', 0),
('6669e50203b81', 'amanda', 'amanda.sousa@example.com', 'Estou adorando navegar pelo seu site, está muito bem feito!', '2024-06-12 18:12:18', 0),
('6669e502073df', 'gabriel', 'gabriel.pereira@example.com', 'Parabéns pelo conteúdo de qualidade e pela iniciativa de ajudar os usuários!', '2024-06-12 18:12:18', 0),
('6669e5020a0bd', 'larissa', 'larissa.fernandes@example.com', 'Seu site me ajudou a entender muitos conceitos que eu não conseguia antes.', '2024-06-12 18:12:18', 0),
('6669e5bc04bd0', 'carlos', 'carlos.freitas@example.com', 'Estou impressionado com a qualidade do conteúdo!', '2024-06-12 18:15:24', 0),
('6669e5bc08313', 'fernanda', 'fernanda.santos@example.com', 'Seu site me ajudou muito a encontrar as informações que eu precisava.', '2024-06-12 18:15:24', 0),
('6669e5bc097a1', 'lucas', 'lucas.oliveira@example.com', 'Muito obrigado pela iniciativa de compartilhar esse conhecimento!', '2024-06-12 18:15:24', 0),
('6669e5bc0a5f2', 'juliana', 'juliana.almeida@example.com', 'Parabéns pela organização e clareza das informações!', '2024-06-12 18:15:24', 0),
('6669e5bc0d719', 'pedro', 'pedro.souza@example.com', 'Excelente trabalho! Continuem assim, estou ansioso por mais conteúdo.', '2024-06-12 18:15:24', 0),
('6669e5bc0e5f5', 'mariana', 'mariana.lima@example.com', 'Obrigado por disponibilizarem esse material de forma gratuita!', '2024-06-12 18:15:24', 0),
('6669e5bc119d1', 'rafael', 'rafael.silva@example.com', 'Seu site é uma fonte valiosa de informações, continue assim!', '2024-06-12 18:15:24', 0),
('6669e5bc127cf', 'amanda', 'amanda.sousa@example.com', 'Estou adorando navegar pelo seu site, está muito bem feito!', '2024-06-12 18:15:24', 0),
('6669e5bc153bd', 'gabriel', 'gabriel.pereira@example.com', 'Parabéns pelo conteúdo de qualidade e pela iniciativa de ajudar os usuários!', '2024-06-12 18:15:24', 0),
('6669e5bc16178', 'larissa', 'larissa.fernandes@example.com', 'Seu site me ajudou a entender muitos conceitos que eu não conseguia antes.', '2024-06-12 18:15:24', 0);

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

--
-- Despejando dados para a tabela `commentaries_response`
--

INSERT INTO `commentaries_response` (`id`, `id_commentary`, `response`, `created_at`) VALUES
(1718215990, '6669e501ea814', 'teste', '2024-06-12 18:13:10'),
(1718216079, '6669e501ea814', 'dasdsa', '2024-06-12 18:14:39');

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
('c5a918de-4165-4f5c-872a-8cf07dc0418b', '$2y$10$tmJoLvD8FC5ymyrXZ4.fW.Go9kTlr1Irch/PrtDNrQff0vqn2Q7Qa', 'admin@admin.com', '2024-06-10 00:43:25');

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
