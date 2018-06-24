-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jun-2017 às 01:30
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `componentes`
--

CREATE TABLE `componentes` (
  `idcomponente` int(10) UNSIGNED NOT NULL,
  `nome` varchar(245) NOT NULL,
  `ano` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `componentes`
--

INSERT INTO `componentes` (`idcomponente`, `nome`, `ano`) VALUES
(1, 'TCC', 3),
(2, 'LÃ³gica', 1),
(3, 'html', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudos`
--

CREATE TABLE `conteudos` (
  `idconteudo` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `conteudo` longtext,
  `tipo_conteudo` char(1) DEFAULT NULL,
  `imagens` char(1) DEFAULT NULL,
  `idcomponente` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conteudos`
--

INSERT INTO `conteudos` (`idconteudo`, `descricao`, `conteudo`, `tipo_conteudo`, `imagens`, `idcomponente`) VALUES
(1, 'intro lÃ³', 'LÃ³gica (do grego Î»Î¿Î³Î¹ÎºÎ® logos[1]) tem dois significados principais: discute o uso de raciocÃ­nio em alguma atividade e Ã© o estudo normativo, filosÃ³fico do raciocÃ­nio vÃ¡lido.[2] No segundo sentido, a lÃ³gica Ã© discutida principalmente nas disciplinas de filosofia, matemÃ¡tica e ciÃªncia da computaÃ§Ã£o. Ambos os sentidos se baseando no foco comum referente a harmonia de raciocÃ­nio, a proporcionalidade formal entre argumentos, assim sendo, a correta e equilibrada relaÃ§Ã£o entre todos os termos, a total concordÃ¢ncia entre cada um deles dentro de um desenvolvimento.[3]\r\n\r\nA lÃ³gica examina de forma genÃ©rica as formas que a argumentaÃ§Ã£o pode tomar, quais dessas formas sÃ£o vÃ¡lidas e quais sÃ£o falaciosas. Em filosofia, o estudo da lÃ³gica aplica-se na maioria dos seus principais ramos: metafÃ­sica, ontologia, epistemologia e Ã©tica. Na matemÃ¡tica, estudam-se as formas vÃ¡lidas de inferÃªncia de uma linguagem formal.[4] Na ciÃªncia da computaÃ§Ã£o, a lÃ³gica Ã© uma ferramenta indispensÃ¡vel. Por fim, a lÃ³gica tambÃ©m Ã© estudada na teoria da argumentaÃ§Ã£o.[5]\r\n\r\nA lÃ³gica foi estudada em vÃ¡rias civilizaÃ§Ãµes da Antiguidade. Na Ãndia, a recursÃ£o silogÃ­stica, Nyaya remonta a 1900 anos atrÃ¡s. Na China, o MoÃ­smo e a Escola dos Nomes datam de 2200 anos atrÃ¡s. Na GrÃ©cia Antiga a lÃ³gica foi estabelecida como disciplina por AristÃ³teles, com a sua obra Organon. Ele dividiu a lÃ³gica em formal e material. O estudo da lÃ³gica era parte do Trivium clÃ¡ssico, juntamente com a gramÃ¡tica e a retÃ³rica (ver: Artes liberais).', 'T', NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(10) UNSIGNED NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome`, `email`, `senha`) VALUES
(1, 'Administrador', 'admin@admin.com', 'MQ==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`idcomponente`);

--
-- Indexes for table `conteudos`
--
ALTER TABLE `conteudos`
  ADD PRIMARY KEY (`idconteudo`),
  ADD KEY `fk_componente_conteudo_idx` (`idcomponente`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `componentes`
--
ALTER TABLE `componentes`
  MODIFY `idcomponente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `idconteudo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `conteudos`
--
ALTER TABLE `conteudos`
  ADD CONSTRAINT `fk_componente_conteudo` FOREIGN KEY (`idcomponente`) REFERENCES `componentes` (`idcomponente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
