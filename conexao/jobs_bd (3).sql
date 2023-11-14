-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Abr-2023 às 18:46
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jobs_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `chat_id` int NOT NULL AUTO_INCREMENT,
  `receber_id` int NOT NULL,
  `enviar_id` int NOT NULL,
  `messagem` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `abrindo` tinyint(1) NOT NULL DEFAULT '0',
  `criar_tempo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `chats`
--

INSERT INTO `chats` (`chat_id`, `receber_id`, `enviar_id`, `messagem`, `abrindo`, `criar_tempo`) VALUES
(1, 3, 1, 'Ola mundo', 1, '2023-04-10 00:08:17'),
(2, 3, 1, 'Mundo novo', 1, '2023-04-10 00:23:23'),
(3, 1, 3, 'Estou otimo e vc?', 1, '2023-04-10 00:26:01'),
(4, 3, 1, 'Oi mundo', 1, '2023-04-10 00:29:02'),
(5, 1, 3, 'que bom', 1, '2023-04-10 00:29:26'),
(6, 1, 3, 'mudei', 1, '2023-04-10 00:40:38'),
(7, 3, 1, 'Fico feliz por isso...', 1, '2023-04-10 09:44:23'),
(8, 1, 3, 'oi', 1, '2023-04-10 12:32:10'),
(9, 3, 1, 'ola', 1, '2023-04-10 12:32:25'),
(10, 1, 3, 'Ola mundo', 1, '2023-04-10 12:36:47'),
(11, 3, 1, 'Ola mundo', 1, '2023-04-10 12:36:56'),
(12, 3, 1, 'oi\noi', 1, '2023-04-10 15:58:08'),
(13, 1, 3, 'ola', 1, '2023-04-10 15:58:50'),
(14, 1, 4, 'olá', 1, '2023-04-10 16:02:33'),
(15, 4, 12, 'oi', 0, '2023-04-10 18:19:08'),
(16, 12, 5, 'oii\n', 0, '2023-04-10 18:32:42'),
(17, 5, 12, 'oiii\n', 0, '2023-04-10 19:03:33'),
(18, 12, 4, 'olá \n', 0, '2023-04-17 18:46:15'),
(19, 5, 4, 'olá', 0, '2023-04-17 18:50:22'),
(20, 4, 1, 'oi', 0, '2023-04-17 18:54:09'),
(21, 1, 3, 'Oi fofa', 1, '2023-04-19 15:01:02'),
(22, 3, 1, 'Tudo bem', 1, '2023-04-19 15:01:26'),
(23, 1, 3, 'Estou bem', 1, '2023-04-19 15:05:59'),
(24, 3, 1, 'que bom', 1, '2023-04-19 15:10:12'),
(25, 3, 1, 'Como tens passado o dia', 1, '2023-04-19 15:11:29'),
(26, 1, 3, 'ola', 1, '2023-04-19 15:12:39'),
(27, 3, 1, 'OI todo bem', 1, '2023-04-19 15:13:57'),
(28, 1, 3, 'vou bem e tu...?', 1, '2023-04-19 15:14:13'),
(29, 3, 1, 'oii\n', 1, '2023-04-19 15:15:30'),
(30, 1, 3, 'como estás?', 1, '2023-04-19 15:15:45'),
(31, 2, 3, 'ola', 1, '2023-04-19 15:17:25'),
(32, 3, 2, 'OI', 1, '2023-04-19 16:20:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conversas`
--

DROP TABLE IF EXISTS `conversas`;
CREATE TABLE IF NOT EXISTS `conversas` (
  `conversa_id` int NOT NULL AUTO_INCREMENT,
  `user_1` int NOT NULL,
  `user_2` int NOT NULL,
  PRIMARY KEY (`conversa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `conversas`
--

INSERT INTO `conversas` (`conversa_id`, `user_1`, `user_2`) VALUES
(1, 3, 1),
(2, 2, 3),
(3, 1, 4),
(4, 4, 12),
(5, 12, 5),
(6, 5, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) NOT NULL,
  `numero_cliente` varchar(20) NOT NULL,
  `endereco_cliente` varchar(100) DEFAULT NULL,
  `email_cliente` varchar(100) NOT NULL,
  `data_cliente` date DEFAULT NULL,
  `senha_cliente` varchar(15) NOT NULL,
  `img_cliente` varchar(150) NOT NULL DEFAULT 'avatar.png',
  `ver_tempo` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `senha_cliente` (`senha_cliente`),
  UNIQUE KEY `senha_cliente_2` (`senha_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id_cliente`, `nome_cliente`, `numero_cliente`, `endereco_cliente`, `email_cliente`, `data_cliente`, `senha_cliente`, `img_cliente`, `ver_tempo`) VALUES
(1, 'Pinto Matamba', '947691246', '', 'matamba@mail.com', '2000-01-01', 'bi2020', 'avatar.png', '2023-04-07 19:08:01'),
(2, 'Aldair Mateu', '047546983', '', 'alda@mail.com', '1999-12-31', 'bi2021', 'professor.png', '2023-04-07 18:53:42'),
(3, 'Auria Agusta', '87453344', 'Samba Caju', 'auggustarua@mail.com', '1997-10-28', '0000', 'loja (4).jpg', '2023-04-07 19:08:30'),
(4, 'Cleópatra', '944712952', 'Morro bento', 'cleopatraadryansantos@gmail.com', '2004-09-28', '12345', 'Papel-de-parede-gamer-4k-para-seu-pc-1.webp', '2023-04-10 16:01:45'),
(5, 'Sandra santos', '95556777', 'morro bento', 'sandra@gmail.com', '2004-09-28', '1234', 'Captura de ecrã_20230119_222419.png', '2023-04-10 18:22:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_prestador`
--

DROP TABLE IF EXISTS `tb_prestador`;
CREATE TABLE IF NOT EXISTS `tb_prestador` (
  `id_prestador` int NOT NULL AUTO_INCREMENT,
  `nome_prestador` varchar(100) NOT NULL,
  `contacto_prestador` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `categoria_prestador` varchar(50) DEFAULT NULL,
  `senha_prestador` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `data_prestador` date DEFAULT NULL,
  `endereco_prestador` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email_prestador` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `formacao_prestador` varchar(255) DEFAULT NULL,
  `descricao_prestador` text,
  `img_prestador` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `ver_tempo` datetime DEFAULT CURRENT_TIMESTAMP,
  `solicitacao` int DEFAULT NULL,
  `destaques` int DEFAULT NULL,
  `id_trabalho` int DEFAULT NULL,
  PRIMARY KEY (`id_prestador`),
  KEY `frk_prestador` (`id_trabalho`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tb_prestador`
--

INSERT INTO `tb_prestador` (`id_prestador`, `nome_prestador`, `contacto_prestador`, `categoria_prestador`, `senha_prestador`, `data_prestador`, `endereco_prestador`, `email_prestador`, `formacao_prestador`, `descricao_prestador`, `img_prestador`, `ver_tempo`, `solicitacao`, `destaques`, `id_trabalho`) VALUES
(1, 'Paulo Pinto', '+244927148025', 'Programador', '1234', '1994-04-30', 'Bairro camama, Rua 4 de Abril, Lunda/Angola', 'paulo@mail.com', 'Web Developer(PHP,NODE JS)', 'Cria seu web num piscar de olhos...', 'developer.png', '2023-04-10 15:55:21', 3, 91, 1),
(2, 'Antonio', '+2449478884', 'Fotografo', '0000', '2000-11-01', 'Bairro camama, Rua 4 de Abril, Lunda/Angola', 'foto@mail.co.ao', 'Fotografia Proficional, Designer Grafico', 'Sou um fotografo competente e eficaz no meu trabalho', 'fotografo2.jpg', '2023-04-07 18:26:36', 2, 43, 2),
(3, 'Dialtom Santos', '928734878', 'maquilhador', '12345', '2004-09-12', 'Morro bento, Luanda', 'Cleopatra@gmail.com', NULL, NULL, 'paste.png', '2023-04-19 19:46:23', NULL, 3, 5),
(4, 'cleopatra', '944712952', 'Cabelereiro', '6777', '2000-09-23', 'Gamek', 'Cleopatraadryan@gmail.com', NULL, NULL, 'cabel.jpeg', '2023-04-17 19:28:05', 4, 0, 4),
(5, 'Lucas Marcos', '1234567', 'Animador', '9876', '1993-04-30', 'Benfica/Luanda', 'marcosLuca@mail.com', NULL, NULL, 'client101.png', '2023-04-11 00:04:32', 1, NULL, 6),
(10, 'Diego', '999999', 'Geral', '1095', '2023-03-27', 'gamek', 'feminino.acess@gmail.com', NULL, NULL, 'professor.png', '0000-00-00 00:00:00', NULL, NULL, 3),
(11, 'Simata', '00000', 'Geral', '7777', '2023-04-12', 'gamek', 'feminino.acess@gmail.com', NULL, NULL, 'educadora.png', '0000-00-00 00:00:00', 0, NULL, 3),
(12, 'Cleo', '00000', 'Geral', '4444', '2004-09-28', 'gamek', 'cleopatraadryansantos@gmail.com', NULL, NULL, 'c1.jpg', '0000-00-00 00:00:00', 5, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_trabalho`
--

DROP TABLE IF EXISTS `tb_trabalho`;
CREATE TABLE IF NOT EXISTS `tb_trabalho` (
  `id_trabalho` int NOT NULL AUTO_INCREMENT,
  `tipo_trabalho` varchar(100) NOT NULL,
  `img_categoria` varchar(200) DEFAULT NULL,
  `descricao_trabalho` varchar(200) DEFAULT NULL,
  `destaque_trabalho` int DEFAULT NULL,
  `data_inicio_trabalho` date DEFAULT NULL,
  `data_fim_trabalho` date DEFAULT NULL,
  `id_prestador` int DEFAULT NULL,
  `id_cliente` int DEFAULT NULL,
  PRIMARY KEY (`id_trabalho`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tb_trabalho`
--

INSERT INTO `tb_trabalho` (`id_trabalho`, `tipo_trabalho`, `img_categoria`, `descricao_trabalho`, `destaque_trabalho`, `data_inicio_trabalho`, `data_fim_trabalho`, `id_prestador`, `id_cliente`) VALUES
(1, 'Programação', 'programador3.jpg', 'Criacão de webSites, Criacão de Aplicações...', 4, NULL, NULL, NULL, NULL),
(2, 'Fotográfos', 'fotografo2.jpg', 'Sessão de Fotos, Cobertura de casamentos e eventos...', 6, NULL, NULL, NULL, NULL),
(3, 'Explicador', 'explicador.png', 'Explicadores de Matemática, Língua Inglesa, Química, Física, Geográfia, \r\nProgramação...', 5, NULL, NULL, NULL, NULL),
(4, 'Cabeleireiros', 'cabele.jpg', 'Tratamento de todo tipo de cabelo, Tranças, penteados e muito mais', 7, NULL, NULL, NULL, NULL),
(5, 'Maquilhagem', 'maquilhagem.jpg', 'Maquilhagens para casamentos, festas infantis e muito mais...', 8, NULL, NULL, NULL, NULL),
(6, 'Dj´s', 'djs.jpg', 'Tocamos em todos os eventos', 9, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_trabalhos_feitos`
--

DROP TABLE IF EXISTS `tb_trabalhos_feitos`;
CREATE TABLE IF NOT EXISTS `tb_trabalhos_feitos` (
  `id_trabalhos_feito` int NOT NULL AUTO_INCREMENT,
  `Desqu_pic` text NOT NULL,
  `pic_trabalho` varchar(250) NOT NULL,
  `id_prestador_trabalho` int DEFAULT NULL,
  PRIMARY KEY (`id_trabalhos_feito`),
  KEY `fk_trabalho_feito` (`id_prestador_trabalho`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tb_trabalhos_feitos`
--

INSERT INTO `tb_trabalhos_feitos` (`id_trabalhos_feito`, `Desqu_pic`, `pic_trabalho`, `id_prestador_trabalho`) VALUES
(1, 'Foto De Modelo', 'paste.png', 2),
(2, 'Foto tirada em um revelion de Luanda...', 'djs.jpg', 2);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_prestador`
--
ALTER TABLE `tb_prestador`
  ADD CONSTRAINT `frk_prestador` FOREIGN KEY (`id_trabalho`) REFERENCES `tb_trabalho` (`id_trabalho`);

--
-- Limitadores para a tabela `tb_trabalhos_feitos`
--
ALTER TABLE `tb_trabalhos_feitos`
  ADD CONSTRAINT `fk_trabalho_feito` FOREIGN KEY (`id_prestador_trabalho`) REFERENCES `tb_prestador` (`id_prestador`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
