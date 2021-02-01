-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/

-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Fev-2021 às 11:28
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- Banco de dados: `horizon`

CREATE DATABASE IF NOT EXISTS horizon;
USE horizon;
-- --------------------------------------------------------


-- Estrutura da tabela `atividade`


DROP TABLE IF EXISTS `atividade`;
CREATE TABLE IF NOT EXISTS `atividade` (
  `id_atividade_atv` int(11) NOT NULL AUTO_INCREMENT,
  `data_atv` date DEFAULT NULL,
  `start_atv` time NOT NULL,
  `distancia_atv` decimal(10,0) NOT NULL,
  `elevacao_atv` decimal(10,0) NOT NULL,
  `velocidade_media_atv` decimal(11,0) NOT NULL,
  `likes_atv` decimal(10,0) NOT NULL,
  `tempo_atv` time NOT NULL,
  `id_equipamento_atv` int(11) NOT NULL,
  `id_user_atv` int(11) NOT NULL,
  `titulo_atv` varchar(100) NOT NULL,
  PRIMARY KEY (`id_atividade_atv`),
  KEY `id_equipamento_atv` (`id_equipamento_atv`,`id_user_atv`),
  KEY `id_utilizador_atv` (`id_user_atv`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;


-- Extraindo dados da tabela `atividade`


INSERT INTO `atividade` (`id_atividade_atv`, `data_atv`, `start_atv`, `distancia_atv`, `elevacao_atv`, `velocidade_media_atv`, `likes_atv`, `tempo_atv`, `id_equipamento_atv`, `id_user_atv`, `titulo_atv`) VALUES
(9, '2021-01-07', '06:08:06', '52', '1563', '16', '3', '03:04:00', 1, 1, 'Volta Matinal'),
(10, '2021-01-18', '07:08:06', '52', '1563', '19', '3', '03:04:00', 1, 1, 'Volta Fresca '),
(11, '2021-01-04', '11:00:37', '90', '562', '12', '6', '06:09:00', 5, 2, 'Corrente Partida');

-- --------------------------------------------------------


-- Estrutura da tabela `auth_assignment`


DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- Extraindo dados da tabela `auth_assignment`


INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1609862147),
('author', '15', 1609875852),
('author', '18', 1609884800),
('author', '19', 1609926737),
('author', '20', 1609926882),
('author', '21', 1609952372),
('author', '22', 1610123735),
('author', '23', 1610123916),
('author', '24', 1610123988),
('author', '25', 1610124036),
('author', '38', 1611595661);

-- --------------------------------------------------------


-- Estrutura da tabela `auth_item`


DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- Extraindo dados da tabela `auth_item`


INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1609862147, 1609862147),
('author', 1, NULL, NULL, NULL, 1609862147, 1609862147),
('backend', 2, 'Backend', NULL, NULL, 1609862147, 1609862147),
('createPost', 2, 'Create a post', NULL, NULL, 1609862147, 1609862147),
('deletePost', 2, 'Delete post', NULL, NULL, 1609862147, 1609862147),
('updatePost', 2, 'Update post', NULL, NULL, 1609862147, 1609862147),
('viewPost', 2, 'View a post', NULL, NULL, 1609862147, 1609862147);

-- --------------------------------------------------------


-- Estrutura da tabela `auth_item_child`


DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- Extraindo dados da tabela `auth_item_child`


INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'author'),
('admin', 'backend'),
('admin', 'createPost'),
('admin', 'deletePost'),
('admin', 'updatePost'),
('admin', 'viewPost'),
('author', 'viewPost');

-- --------------------------------------------------------


-- Estrutura da tabela `auth_rule`


DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------


-- Estrutura da tabela `comentarios`


DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario_com` int(11) NOT NULL AUTO_INCREMENT,
  `data_com` date NOT NULL,
  `hora_com` time NOT NULL,
  `comentario_com` text NOT NULL,
  `id_user_com` int(11) NOT NULL,
  `id_atividade_com` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario_com`),
  KEY `id_atividade_com` (`id_atividade_com`),
  KEY `id_utilizador_com` (`id_user_com`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


-- Estrutura da tabela `equipamento`


DROP TABLE IF EXISTS `equipamento`;
CREATE TABLE IF NOT EXISTS `equipamento` (
  `id_equipamento_ept` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_ept` varchar(20) NOT NULL,
  `kilometros_ept` decimal(10,0) NOT NULL,
  `id_user_ept` int(11) NOT NULL,
  PRIMARY KEY (`id_equipamento_ept`),
  KEY `id_utilizador_ept` (`id_user_ept`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


-- Extraindo dados da tabela `equipamento`


INSERT INTO `equipamento` (`id_equipamento_ept`, `titulo_ept`, `kilometros_ept`, `id_user_ept`) VALUES
(3, 'Coluer Reserve', '567', 1),
(4, 'Specialized ', '134', 12),
(5, 'S-Works', '234', 2);

-- --------------------------------------------------------


-- Estrutura da tabela `foto`


DROP TABLE IF EXISTS `foto`;
CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto_ft` int(11) NOT NULL AUTO_INCREMENT,
  `foto_ft` longblob NOT NULL,
  `data_ft` date NOT NULL,
  `hora_ft` time NOT NULL,
  `id_atividade_ft` int(11) NOT NULL,
  PRIMARY KEY (`id_foto_ft`),
  KEY `id_atividade_ft` (`id_atividade_ft`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


-- Estrutura da tabela `locaisinteressante`


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


-- Estrutura da tabela `migration`


DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- Extraindo dados da tabela `migration`


INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m201230_190105_init_rbac', 1609354995),
('m210105_144430_init_rbac', 1609857930);

-- --------------------------------------------------------


-- Estrutura da tabela `perfil_utilizador`


DROP TABLE IF EXISTS `perfil_utilizador`;
CREATE TABLE IF NOT EXISTS `perfil_utilizador` (
  `id_perfil_per` int(11) NOT NULL AUTO_INCREMENT,
  `banido_per` tinyint(1) NOT NULL,
  `visualizacoes_per` int(11) NOT NULL,
  `id_user_per` int(11) NOT NULL,
  PRIMARY KEY (`id_perfil_per`),
  KEY `id_utilizador_per` (`id_user_per`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


-- Estrutura da tabela `user`


DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `role` int(11) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primeiro` varchar(20) CHARACTER SET latin1 NOT NULL,
  `apelido` varchar(20) CHARACTER SET latin1 NOT NULL,
  `telemovel` int(9) NOT NULL,
  `idade` int(3) NOT NULL,
  `genero` varchar(10) CHARACTER SET latin1 NOT NULL,
  `distancia_total` decimal(6,0) NOT NULL,
  `n_volta_total` int(6) NOT NULL,
  `ganho_elevacao` decimal(6,0) NOT NULL,
  `maior_volta` decimal(10,0) NOT NULL,
  `n_corridas` decimal(10,0) NOT NULL,
  `tempo_total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- Extraindo dados da tabela `user`


INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`, `verification_token`, `primeiro`, `apelido`, `telemovel`, `idade`, `genero`, `distancia_total`, `n_volta_total`, `ganho_elevacao`, `maior_volta`, `n_corridas`, `tempo_total`) VALUES
(1, 'duarte_fpereira', 'UG_c9nEuPHGmgv22BUpwsu7qdyKkxiyS', '$2y$13$cOXJuX2uTFn6StznWX8OYuNk1WC8g5jpJuDXlcHRUOvFLKIL4F7B.', NULL, 'duartefrazao.9@gmail.com', 10, 20, 1609354087, 1610243818, 'OZDvLDG7NQ0LbhBApKNFHHdffOKCqTfx_1609354087', 'Duarte', 'Pereira', 915107661, 20, 'masculino', '0', 0, '0', '0', '0', '0'),
(2, 'LuisP', '2baO6qmAURHPwj6YV938IenjnfLHdaCP', '$2y$13$oB7xcpBLFHR.o9B7kbXmZ.2Mz4Gm5Ha9brc.4Kml6NnJLjGV0Bpt2', NULL, 'luispererira@gmail.com', 10, 10, 1609355216, 1609355216, 'DcbhbNb98kAX8mDCDTh_UNi-46PMLR2-_1609355216', 'Luis', 'Pereira', 915454421, 35, 'masculino', '0', 0, '0', '0', '0', '0'),
(12, 'marilyu', 'FWLpRIw3giuHQJg1XeN2d6kHvE58SRzj', '$2y$13$V8q9VLrLeo5jGJeacclz6OAM/QTR7ZD20.DxYQN55j2LaQ.4k38jK', NULL, 'mara@gmail.com', 10, 10, 1609613005, 1609613005, 'g-TZzVuSBhMGCOd0pH943PGOBTDlV5DE_1609613005', 'Maria', 'Rosário', 951856598, 32, 'feminino', '0', 0, '0', '0', '0', '0'),
(19, 'soso', 'Yt1KOHyWa6ekVSewaHPu5YwjyIbnsybJ', '$2y$13$9Rm1YmBOn5K8uflTV/3w7eg2glIfjdfPNvBSyLKIXhmo2pc9t4YbK', NULL, 'soso@gmail.com', 10, 10, 1609926737, 1609926737, 'PUgtfvM_H8VylFZPif3ucywJbR9LkYA0_1609926737', 'Soraia', 'Ferreira', 956225478, 23, 'feminino', '0', 0, '0', '0', '0', '0'),
(21, 'delher', 'v7h5eJ_vw5gjIUODMp2E2LPHqavk9aed', '$2y$13$XrSNCem66fgkOOs41BgKB.DlNS4U4/AwbtHXHplHKz.cCAB3Tjl/C', NULL, 'helder@gmail.com', 10, 10, 1609952372, 1609962515, 'Oh4qLkK6KETdNQ5-FGklEfzpjS6GFfrV_1609952372', 'Helder', 'Frazão', 951425632, 45, 'masculino', '0', 0, '0', '0', '0', '0'),
(25, 'tiago.jorge', 'L0Z9P6Dw0rYe8QfLH3zjrY8gUFQ8HcWb', '$2y$13$WeeQy1.7gxbVVCOmrzYu6OpHoqTdcm6q6iXtNz7dHdapdMNCo8YZO', NULL, 'tiago@gmail.com', 10, 10, 1610124036, 1610124036, 'FxQQnikoU_Tq8C5qIhZ_zIyax5NKo8yF_1610124036', 'Tiago', 'Jorge', 903456197, 20, 'masculino', '0', 0, '0', '0', '0', '0'),
(27, 'Juju', 'UG_c9nEuPHGmgv22BUpwsu7qdyKkxiyS', '$2y$13$cOXJuX2uTFn6StznWX8OYuNk1WC8g5jpJuDXlcHRUOvFLKIL4F7B.', NULL, 'julito@gmail.com', 9, 10, 1610731643, 1610731643, 'OZDvLDG7NQ0LbhBApKNFHHdffOKCqTfx_1609354087', 'Julio', 'Figueiredo', 915107661, 19, 'masculino', '0', 2, '0', '0', '0', '0'),
(31, 'Juliana', 'po6vKstRHOVBqP4-r5RFIyS-b0XAODWI', '$2y$13$S9giaEyY5JCcZSRI.DVEn.DrVthOMWGGvkMuU2p3AJEz993oVyScm', NULL, 'julili@gmail.com', 9, 10, 1610808351, 1610808351, '4DtgfgzpHZOyn62NLdIlEUY-9zvvSYGX_1610808351', 'juliana', 'Rodrigues', 912236561, 17, 'feminino', '0', 2, '0', '0', '0', '0'),
(32, 'goncalo', 'ym7FZt59qte_D-oHcHDyQ0xZuH0Oav66', '$2y$13$l2JA66Lbq8vk9vEyZXxc2edao4KYXOXPsZpP2YsdCrqFQGMDAjA0W', NULL, 'gonzo@gmail.com', 9, 10, 1610898384, 1610898384, 's_TWInueGxgyUEq1SNc0W0c0zRVB1km5_1610898384', 'goncalo', 'Enes', 912265561, 17, 'masculino', '0', 2, '0', '0', '0', '0'),
(38, 'Helderzito', '19i8Q_rNBz8v0ECGqwZlock4kawHAnnT', '$2y$13$1Vyx4AgQWEL4oQmP7OaX..i0r2lwq/A8Jlhoeb7vRkx8dZUBWEo4m', NULL, 'helderzito@gmail.com', 10, 10, 1611595661, 1611595661, 'mhhwFiPiz-IWNhv19W_mph5SL1pkrU8z_1611595661', 'Helder', 'Rodrigues', 956236236, 20, 'masculino', '0', 0, '0', '0', '0', '0');


-- Restrições para despejos de tabelas



-- Limitadores para a tabela `atividade`

ALTER TABLE `atividade`
  ADD CONSTRAINT `atividade_ibfk_1` FOREIGN KEY (`id_user_atv`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Limitadores para a tabela `auth_assignment`

ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Limitadores para a tabela `auth_item`

ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;


-- Limitadores para a tabela `auth_item_child`

ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Limitadores para a tabela `comentarios`

ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_atividade_com`) REFERENCES `atividade` (`id_atividade_atv`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`id_user_com`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Limitadores para a tabela `equipamento`

ALTER TABLE `equipamento`
  ADD CONSTRAINT `equipamento_ibfk_1` FOREIGN KEY (`id_user_ept`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Limitadores para a tabela `foto`

ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_atividade_ft`) REFERENCES `atividade` (`id_atividade_atv`) ON UPDATE CASCADE;


-- Limitadores para a tabela `locaisinteressante`

ALTER TABLE `locaisinteressante`
  ADD CONSTRAINT `locaisinteressante_ibfk_1` FOREIGN KEY (`id_atividade_loc`) REFERENCES `atividade` (`id_atividade_atv`) ON UPDATE CASCADE;


-- Limitadores para a tabela `perfil_utilizador`

ALTER TABLE `perfil_utilizador`
  ADD CONSTRAINT `perfil_utilizador_ibfk_1` FOREIGN KEY (`id_user_per`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
