-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Out-2019 às 22:12
-- Versão do servidor: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto_ferias`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aprendizado_questões`
--

CREATE TABLE `aprendizado_questões` (
  `id` int(11) NOT NULL,
  `id_aula_aprendizado` int(11) NOT NULL,
  `questão_enredo` varchar(1000) NOT NULL,
  `alternativa-01` varchar(255) NOT NULL,
  `alternativa-02` varchar(255) NOT NULL,
  `alternativa-03` varchar(255) NOT NULL,
  `alternativa-04` varchar(255) NOT NULL,
  `alternativa-05` varchar(255) NOT NULL,
  `questão_correta` enum('alternativa-01','alternativa-02','alternativa-03','alternativa-04','alternativa-05') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aprendizado_questões`
--

INSERT INTO `aprendizado_questões` (`id`, `id_aula_aprendizado`, `questão_enredo`, `alternativa-01`, `alternativa-02`, `alternativa-03`, `alternativa-04`, `alternativa-05`, `questão_correta`) VALUES
(7, 1, 'Selecione somente as linguagens de compilação. ', 'C, Pascal e Php', 'C, Pascal e C++', 'Php, Java e C++', 'C++, Perl e Pascal', 'Java, C++ e Perl', 'alternativa-02'),
(8, 1, 'Qual desses foi o criador da linguagem Pascal? ', 'Niklaus Wirth', 'Rasmus Lerdorf', 'James Gosling', 'Bjarne Stroustrup', 'Dennis Ritchie', 'alternativa-01'),
(9, 2, 'Quanto é 1+1?', '1', '2', '3', '4', '5', 'alternativa-02'),
(10, 2, 'Quanto é 2+2?', '1', '2', '3', '4', '5', 'alternativa-04'),
(11, 2, 'Quanto é 2*2?', '1', '2', '3', '4', '5', 'alternativa-04'),
(12, 2, 'Quanto é 1+4?', '1', '2', '3', '4', '5', 'alternativa-05'),
(13, 2, 'Quanto é 1+3?', '1', '2', '3', '4', '5', 'alternativa-04'),
(6, 1, 'Qual é o nome do criador da World Wide Web?', 'Tim Berners-Lee', 'Larry Page', 'Mark Zuckerberg', 'Sergey Brin', 'Bill Gates', 'alternativa-01'),
(5, 1, 'Qual foi a linguagem principal de criação do sistema LPL Game - Learn Programing Logic Game? ', 'C++', 'Python', 'C#', 'Pascal', 'Php', 'alternativa-05'),
(4, 1, 'Com qual linguagem de programação vamos trabalhar?', 'Php', 'Javascript', 'Pascal', 'C', 'Java', 'alternativa-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avatars`
--

CREATE TABLE `avatars` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `avatar_id` varchar(255) NOT NULL,
  `avatar_imagem` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `moedas` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avatars`
--

INSERT INTO `avatars` (`id`, `nome`, `avatar_id`, `avatar_imagem`, `level`, `moedas`) VALUES
(1, 'avatar nome', 'avatar1', '1.jpg', 1, 0),
(2, 'avatar nome', 'avatar2', '2.jpg', 2, 10),
(3, 'avatar nome', 'avatar3', '3.jpg', 3, 15),
(4, 'avatar nome', 'avatar4', '4.jpg', 4, 20),
(5, 'avatar nome', 'avatar5', '5.jpg', 5, 25),
(6, 'avatar nome', 'avatar6', '6.jpg', 6, 30),
(7, 'avatar nome', 'avatar7', '7.jpg', 7, 35),
(8, 'avatar nome', 'avatar8', '8.jpg', 8, 40),
(9, 'avatar nome', 'avatar9', '9.jpg', 9, 45),
(10, 'avatar nome', 'avatar10', '10.jpg', 10, 50),
(11, 'avatar nome', 'avatar11', '11.jpg', 11, 55),
(12, 'avatar nome', 'avatar12', '12.jpg', 12, 60),
(13, 'avatar nome', 'avatar13', '13.jpg', 13, 65),
(14, 'avatar nome', 'avatar14', '14.jpg', 14, 70),
(15, 'avatar nome', 'avatar15', '15.jpg', 15, 75),
(16, 'avatar nome', 'avatar16', '16.jpg', 16, 80),
(17, 'avatar nome', 'avatar17', '17.jpg', 17, 85),
(18, 'avatar nome', 'avatar18', '18.jpg', 18, 90),
(19, 'avatar nome', 'avatar19', '19.jpg', 19, 95),
(20, 'avatar nome', 'avatar20', '20.jpg', 20, 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `origem` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `assunto` varchar(60) NOT NULL,
  `mensagem` text NOT NULL,
  `lida` enum('sim','não') NOT NULL DEFAULT 'não'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `data`, `origem`, `destino`, `assunto`, `mensagem`, `lida`) VALUES
(48, '2018-09-27 15:00:00', 44, 43, 'Testando o serviço', 'asdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsa', 'sim'),
(49, '2018-09-27 03:00:00', 44, 43, 'Testando o serviço', 'asdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsa', 'não'),
(50, '2018-09-27 17:00:00', 44, 43, 'Testando o serviço', 'asdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsaasdasd sad asd sad asdl aslkd asdjk sajkd jsa', 'sim'),
(51, '2018-09-30 18:23:18', 43, 44, 'assunto', 'asdasdsadas', 'não');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modo_aprendizado`
--

CREATE TABLE `modo_aprendizado` (
  `id` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `estrelas_necessárias` int(11) NOT NULL DEFAULT '0',
  `cor` enum('red','blue','orange','green','yellow','black') NOT NULL DEFAULT 'blue',
  `video` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modo_aprendizado`
--

INSERT INTO `modo_aprendizado` (`id`, `id_aula`, `titulo`, `subtitulo`, `estrelas_necessárias`, `cor`, `video`) VALUES
(1, 1, 'Introdução a algoritmos', 'Nessa primeira aula iremos lhe apresentar os conceitos básicos de algoritmos.', 0, 'green', 'media/aula1.mp4'),
(2, 2, 'Conceituando', 'Nessa primeira aula iremos lhe apresentar os conceitos básicos de algoritmos.', 3, 'orange', 'media/aula1.mp4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificações`
--

CREATE TABLE `notificações` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `tipo` enum('success','warning','danger') NOT NULL DEFAULT 'warning',
  `remetente` enum('sistema','administrador') NOT NULL DEFAULT 'sistema',
  `destinatario` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `lida` enum('sim','não') NOT NULL DEFAULT 'não',
  `data` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notificações`
--

INSERT INTO `notificações` (`id`, `nome`, `tipo`, `remetente`, `destinatario`, `mensagem`, `lida`, `data`) VALUES
(1, 'Notificação', 'success', 'sistema', 43, 'This is a primary alert with <a href=\"#\" class=\"alert-link\">an example link</a>. Give it a click if you like.', 'sim', '2018-09-27 17:03:30'),
(2, 'asdasd', 'warning', 'administrador', 43, 'asfsasafsaf', 'sim', '2018-09-27 00:00:00'),
(3, 'Test', 'danger', 'sistema', 43, 'O sistema encontrou um erro que ninguém no universo pode resolver...', 'sim', '2018-09-28 00:00:00'),
(4, 'test2', 'warning', 'sistema', 43, 'testsa85das 44asd 4as4d sa45ads 45 das54ads 45 das45das 45d as5das45d sa54ad s45ad 4s d554 as45da s4asd 45 as4 das45 ads', 'sim', '2018-09-29 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nick` varchar(30) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `moedas` int(11) NOT NULL DEFAULT '500',
  `moedas_faturadas` int(11) NOT NULL DEFAULT '500',
  `nivel` int(11) NOT NULL DEFAULT '1',
  `stamina` int(11) DEFAULT '100',
  `exp` int(11) NOT NULL DEFAULT '50',
  `exp_max` int(11) DEFAULT '100',
  `pontos` int(11) NOT NULL DEFAULT '0',
  `tipo_de_conta` set('aluno','professor','admin') DEFAULT 'aluno',
  `sexo` set('Masculino','Feminino','Indefinido') NOT NULL DEFAULT 'Indefinido',
  `telefone` varchar(13) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(50) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `avatar` varchar(100) NOT NULL DEFAULT '0.jpg',
  `ip_cadastro` varchar(15) DEFAULT NULL,
  `ip_ultimologin` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `nome`, `moedas`, `moedas_faturadas`, `nivel`, `stamina`, `exp`, `exp_max`, `pontos`, `tipo_de_conta`, `sexo`, `telefone`, `cidade`, `uf`, `data_nascimento`, `email`, `senha`, `data_cadastro`, `avatar`, `ip_cadastro`, `ip_ultimologin`) VALUES
(43, 'guildahard@hotmail.com', 'Jorge junior', 2005, 2085, 12, 100, 0, 760, 0, 'aluno', 'Masculino', '74988618728', 'Várzea Nova', 'BA', '1996-10-01', 'guildahard@hotmail.com', 'f5e9cfed522312302b639abe412a7320', '2018-12-25 19:32:06', '6.jpg', '127.0.0.1', '127.0.0.1'),
(44, 'jorge', 'João Pedreiro', 500, 500, 1, 100, 50, 100, 0, 'aluno', 'Indefinido', NULL, NULL, NULL, NULL, 'kasdjisadij@gmail.com', 'f5e9cfed522312302b639abe412a7320', '2018-10-20 22:47:03', '1.jpg', '127.0.0.1', '127.0.0.1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_aprendizado`
--

CREATE TABLE `usuarios_aprendizado` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `estrelas` int(11) NOT NULL,
  `liberação` enum('sim','não') NOT NULL DEFAULT 'não',
  `questionario` enum('ativado','desativado') NOT NULL DEFAULT 'desativado',
  `primeira_vez` enum('sim','não') NOT NULL DEFAULT 'sim'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios_aprendizado`
--

INSERT INTO `usuarios_aprendizado` (`id`, `id_usuario`, `id_aula`, `estrelas`, `liberação`, `questionario`, `primeira_vez`) VALUES
(31, 43, 1, 2, 'sim', 'desativado', 'não');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_avatars`
--

CREATE TABLE `usuarios_avatars` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL DEFAULT '0',
  `avatar1` int(11) NOT NULL DEFAULT '0',
  `avatar2` int(11) NOT NULL DEFAULT '0',
  `avatar3` int(11) NOT NULL DEFAULT '0',
  `avatar4` int(11) NOT NULL DEFAULT '0',
  `avatar5` int(11) NOT NULL DEFAULT '0',
  `avatar6` int(11) NOT NULL DEFAULT '0',
  `avatar7` int(11) NOT NULL DEFAULT '0',
  `avatar8` int(11) NOT NULL DEFAULT '0',
  `avatar9` int(11) NOT NULL DEFAULT '0',
  `avatar10` int(11) NOT NULL DEFAULT '0',
  `avatar11` int(11) NOT NULL DEFAULT '0',
  `avatar12` int(11) NOT NULL DEFAULT '0',
  `avatar13` int(11) NOT NULL DEFAULT '0',
  `avatar14` int(11) NOT NULL DEFAULT '0',
  `avatar15` int(11) NOT NULL DEFAULT '0',
  `avatar16` int(11) NOT NULL DEFAULT '0',
  `avatar17` int(11) NOT NULL DEFAULT '0',
  `avatar18` int(11) NOT NULL DEFAULT '0',
  `avatar19` int(11) NOT NULL DEFAULT '0',
  `avatar20` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios_avatars`
--

INSERT INTO `usuarios_avatars` (`id`, `usuario_id`, `avatar1`, `avatar2`, `avatar3`, `avatar4`, `avatar5`, `avatar6`, `avatar7`, `avatar8`, `avatar9`, `avatar10`, `avatar11`, `avatar12`, `avatar13`, `avatar14`, `avatar15`, `avatar16`, `avatar17`, `avatar18`, `avatar19`, `avatar20`) VALUES
(3, 43, 1, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 44, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aprendizado_questões`
--
ALTER TABLE `aprendizado_questões`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `origem` (`origem`,`destino`);

--
-- Indexes for table `modo_aprendizado`
--
ALTER TABLE `modo_aprendizado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificações`
--
ALTER TABLE `notificações`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `usuarios_aprendizado`
--
ALTER TABLE `usuarios_aprendizado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_avatars`
--
ALTER TABLE `usuarios_avatars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aprendizado_questões`
--
ALTER TABLE `aprendizado_questões`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `modo_aprendizado`
--
ALTER TABLE `modo_aprendizado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notificações`
--
ALTER TABLE `notificações`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `usuarios_aprendizado`
--
ALTER TABLE `usuarios_aprendizado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `usuarios_avatars`
--
ALTER TABLE `usuarios_avatars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
