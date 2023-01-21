-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jan-2023 às 01:28
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetophp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `feiras`
--

CREATE TABLE `feiras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `logradouro` varchar(30) NOT NULL,
  `numero` int(4) NOT NULL,
  `complemento` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(30) NOT NULL,
  `cep` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `data_de_emissão` varchar(8) NOT NULL,
  `data_de_nascimento` varchar(8) NOT NULL,
  `cpf` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `nome` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `logradouro` varchar(25) NOT NULL,
  `numero` int(4) NOT NULL,
  `complemento` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `cpf` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `cpf`, `email`, `senha`) VALUES
(2, 'Juliano', '', 0, '', '', '', '', '0', 0, 'juliano@gmail.com', NULL),
(3, 'juliano', '', 0, '', '', '', '', '0', 0, 'juliano1@gmail.com', NULL),
(4, 'herbert', 'senac nova iguaçu', 461, '87', 'centro', 'nova iguaçu', 'RJ', '26012790', 0, 'herbert@gmail.com', '$2y$10$138cEUrw9ftH6UGzh4v6uulnao697M3fqnVBeHY5HpXWOes5gPGli'),
(5, 'juliano souza', '', 0, '', '', '', '', '0', 0, 'juliano12@gmail.com', '$2y$10$izyCAfsXHStqFG5iBv2KUehUnPvTMHsot4tysKgiSWqwK5wYeMpze'),
(6, 'juliano souza', '', 0, '', '', '', '', '0', 0, 'juliano12@gmail.com', '$2y$10$V3V.P1FJwX/fjj0IxWuOOeMILkC/LcdjrCBNpvuCUWEvgTnGuKnni'),
(7, 'Elias', 'rua a ', 21, '21', 'miguel couto', 'nova iguaçu', 'rj', '21474836', 0, 'elias@gmail.com', '$2y$10$72qOl7zGxV2W7F9a8GM82O2MvZgcnJqtOBoBzqCSROgcNHRPw9fsK'),
(8, 'RECRUTA', '123', 123, '123', 'BAIRRO', 'CIDADE', 'RJ', '21312321', 0, 'RECRUTA@GMAIL.COM', '$2y$10$r9pq9fYBsJfhvjGXfA8Fgu/6hGWlxF0oQDdg1nvsFtPu01RTda1qi'),
(9, 'RECRUTA', '123', 123, '123', 'BAIRRO', 'CIDADE', 'RJ', '0', 0, 'RECRUTA@GMAIL.COM', '$2y$10$oTUT1O3Yz4CEMzA25xV5TelzM5jt4Mp/tPOKzIK9w5yd1UJw4LLWe'),
(10, 'RECRUTA', '123', 123, '123', 'BAIRRO', 'CIDADE', 'RJ', '1234', 0, 'RECRUTA@GMAIL.COM', '$2y$10$W7Hav4cE8FqyTGpjT1xu9.yG0cfQVr0lh9SyYIgMO8T4txmE/mu9S'),
(11, 'RECRUTA', '123', 123, '123', 'BAIRRO', 'CIDADE', 'RJ', '1234', 0, 'RECRUTA@GMAIL.COM', '$2y$10$nmo1ueFU2OXHM44oc1w5te2j260Dp1EYKfLdSZzxY8UM/67ein0dS'),
(12, 'juliano', '123', 123, 'ap 03', 'BAIRRO', 'nova iguaçu', 'RJ', '1234', 0, 'herbert@gmail.com', '$2y$10$5zgR4/h3BeJZX/YvrMrNu.bUlZmRfuHA82XJSfyB6Adlqc2/TEtd2'),
(13, 'QWE', 'dqwdq', 123, 'ap 03', 'BAIRRO', 'nova iguaçu', 'rj', '1234', 0, 'QWEQWEQW@GMAIL.COM', '$2y$10$UepYT6lxJbdEgZMrCmbwPOIG9xPc/20.gcXdMFzbf.fqLoN2tH0pG'),
(14, 'QWE', 'dqwdq', 123, 'ap 03', 'BAIRRO', 'nova iguaçu', 'rj', '12345', 0, 'QWEQWEQW@GMAIL.COM', '$2y$10$6rNZqY.kmqMpR2Zow0HvFeZ.WLNYa/P0iJt0AYFK/5YHt9.kkUlEq'),
(15, 'Daniell', 'rua a ', 123, 'ap 03', 'centro', 'belford roxo', 'RJ', '12345', 0, 'daniel@gmail.com', '$2y$10$L5m9j8.zzM34vvmhvPMCJ.XlOMpZ.C2D3yqDiDnzOn0q5E5ibtMfa'),
(16, 'Daniell', 'rua a ', 123, 'ap 03', 'centro', 'belford roxo', 'RJ', '12345', 0, 'daniel@gmail.com', '$2y$10$nqbdGXL/JB.UP2k.yXo4h.ewPaYYBHVkfnZl7CtE86pkt5bH8EEaG'),
(17, 'Daniell', 'rua a ', 123, 'ap 03', 'centro', 'belford roxo', 'RJ', '12345', 0, 'daniel@gmail.com', '$2y$10$5V7Dp/PLZRz6Nubg3g2JOOfFUuxzwr8y6bjfcFz0kzBc8lC1NULJ2'),
(18, 'Daniell', 'rua a ', 123, 'ap 03', 'centro', 'belford roxo', 'RJ', '12345-67', 0, 'daniel@gmail.com', '$2y$10$xmisDCLmRHtf0Js6xRsZgujTLNbnK8lu1SpKxYn55kWIDVAanHxkC');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `feiras`
--
ALTER TABLE `feiras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `feiras`
--
ALTER TABLE `feiras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
