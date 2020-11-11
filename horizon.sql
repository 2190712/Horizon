-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 11-Nov-2020 às 15:14
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `horizon`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

DROP TABLE IF EXISTS `atividade`;
CREATE TABLE IF NOT EXISTS `atividade` (
  `id_atividade_atv` int(11) NOT NULL AUTO_INCREMENT,
  `data_atv` date NOT NULL,
  `start_atv` time NOT NULL,
  `distancia_atv` decimal(10,0) NOT NULL,
  `elevacao_atv` decimal(10,0) NOT NULL,
  `velocidade_media_atv` int(11) NOT NULL,
  `likes_atv` decimal(10,0) NOT NULL,
  `tempo_atv` int(11) NOT NULL,
  `id_equipamento_atv` int(11) NOT NULL,
  `id_utilizador_atv` int(11) NOT NULL,
  `titulo_atv` varchar(20) NOT NULL,
  PRIMARY KEY (`id_atividade_atv`),
  KEY `id_equipamento_atv` (`id_equipamento_atv`,`id_utilizador_atv`),
  KEY `id_utilizador_atv` (`id_utilizador_atv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario_com` int(11) NOT NULL AUTO_INCREMENT,
  `data_com` date NOT NULL,
  `hora_com` time NOT NULL,
  `comentario_com` text NOT NULL,
  `id_utilizador_com` int(11) NOT NULL,
  `id_atividade_com` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario_com`),
  KEY `id_atividade_com` (`id_atividade_com`),
  KEY `id_utilizador_com` (`id_utilizador_com`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

DROP TABLE IF EXISTS `equipamento`;
CREATE TABLE IF NOT EXISTS `equipamento` (
  `id_equipamento_ept` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_ept` varchar(20) NOT NULL,
  `kilometros_ept` decimal(10,0) NOT NULL,
  `id_utilizador_ept` int(11) NOT NULL,
  PRIMARY KEY (`id_equipamento_ept`),
  KEY `id_utilizador_ept` (`id_utilizador_ept`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto`
--

DROP TABLE IF EXISTS `foto`;
CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto_ft` int(11) NOT NULL,
  `foto_ft` blob NOT NULL,
  `data_ft` date NOT NULL,
  `hora_ft` time NOT NULL,
  `id_atividade_ft` int(11) NOT NULL,
  PRIMARY KEY (`id_foto_ft`),
  KEY `id_atividade_ft` (`id_atividade_ft`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `locaisinteressante`
--

DROP TABLE IF EXISTS `locaisinteressante`;
CREATE TABLE IF NOT EXISTS `locaisinteressante` (
  `id_local_loc` int(11) NOT NULL,
  `titulo_loc` varchar(20) NOT NULL,
  `rua_loc` varchar(80) NOT NULL,
  `localidade_loc` varchar(20) NOT NULL,
  `coordenadas_loc` varchar(30) NOT NULL,
  `data_loc` date DEFAULT NULL,
  `pais_loc` varchar(20) NOT NULL,
  `comentario_loc` text,
  `id_atividade_loc` int(11) NOT NULL,
  PRIMARY KEY (`id_local_loc`),
  KEY `id_atividade_loc` (`id_atividade_loc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_utilizador`
--

DROP TABLE IF EXISTS `perfil_utilizador`;
CREATE TABLE IF NOT EXISTS `perfil_utilizador` (
  `id_perfil_per` int(11) NOT NULL AUTO_INCREMENT,
  `banido_per` tinyint(1) NOT NULL,
  `visualizacoes_per` int(11) NOT NULL,
  `id_utilizador_per` int(11) NOT NULL,
  PRIMARY KEY (`id_perfil_per`),
  KEY `id_utilizador_per` (`id_utilizador_per`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

DROP TABLE IF EXISTS `utilizadores`;
CREATE TABLE IF NOT EXISTS `utilizadores` (
  `id_utilizador_utz` int(11) NOT NULL AUTO_INCREMENT,
  `nome_utz` varchar(50) NOT NULL,
  `username_utz` varchar(20) NOT NULL,
  `password_utz` int(12) NOT NULL,
  `telemovel_utz` int(9) NOT NULL,
  `email_utz` varchar(50) NOT NULL,
  `idade_utz` int(3) NOT NULL,
  `administrador_utz` tinyint(1) NOT NULL,
  `distancia_total_utz` decimal(10,0) NOT NULL,
  `n_volta_total_utz` decimal(10,0) NOT NULL,
  `ganho_elevacao_utz` decimal(10,0) NOT NULL,
  `maior_volta_utz` decimal(10,0) NOT NULL,
  `n_corridas_utz` decimal(10,0) NOT NULL,
  `tempo_total_utz` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_utilizador_utz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `atividade_ibfk_1` FOREIGN KEY (`id_utilizador_atv`) REFERENCES `utilizadores` (`id_utilizador_utz`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `atividade_ibfk_2` FOREIGN KEY (`id_equipamento_atv`) REFERENCES `equipamento` (`id_equipamento_ept`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_utilizador_com`) REFERENCES `utilizadores` (`id_utilizador_utz`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_atividade_com`) REFERENCES `atividade` (`id_atividade_atv`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Limitadores para a tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `equipamento_ibfk_1` FOREIGN KEY (`id_utilizador_ept`) REFERENCES `utilizadores` (`id_utilizador_utz`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Limitadores para a tabela `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_atividade_ft`) REFERENCES `atividade` (`id_atividade_atv`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Limitadores para a tabela `locaisinteressante`
--
ALTER TABLE `locaisinteressante`
  ADD CONSTRAINT `locaisinteressante_ibfk_1` FOREIGN KEY (`id_atividade_loc`) REFERENCES `atividade` (`id_atividade_atv`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Limitadores para a tabela `perfil_utilizador`
--
ALTER TABLE `perfil_utilizador`
  ADD CONSTRAINT `perfil_utilizador_ibfk_1` FOREIGN KEY (`id_utilizador_per`) REFERENCES `utilizadores` (`id_utilizador_utz`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
