-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Dez-2016 às 02:29
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tribunal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `advogados`
--

CREATE TABLE `advogados` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(14) NOT NULL,
  `oab` int(6) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `advogados`
--

INSERT INTO `advogados` (`id`, `nome`, `cpf`, `rg`, `oab`, `telefone`, `email`, `endereco`) VALUES
(3, 'Joaquim', ' 261.516.023-0', ' 45.215.266-2', 562562, '(11) 52033-2562', 'janela@gmail.com', 'Chapecó'),
(4, 'Ines', ' 279.862.893-5', ' 24.865.832-5', 175359, '(47) 22928-5285', 'mesa@gmail.com', 'Acrê');

-- --------------------------------------------------------

--
-- Estrutura da tabela `juizes`
--

CREATE TABLE `juizes` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(14) NOT NULL,
  `oab` int(6) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `juizes`
--

INSERT INTO `juizes` (`id`, `nome`, `cpf`, `rg`, `oab`, `telefone`, `email`) VALUES
(5, 'João', ' 575.777.558-5', ' 48.327.858-5', 847524, '(85) 74574-7475', 'joao@gmail.com'),
(6, 'Maria123', ' 545.633.546-3', ' 58.631.863-2', 484633, '(48) 96336-2255', 'maria@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(14) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `endereco` varchar(100) NOT NULL,
  `tipo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `cpf`, `rg`, `telefone`, `endereco`, `tipo`) VALUES
(1, 'Alan', '261.516.023-0	', '45.215.266-2', '(11) 52033-2562', 'Sergipe', 2),
(3, 'José', ' 148.632.586-2', ' 25.486.293-6', '(47) 63286-3559', 'Joaçaba', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `processos`
--

CREATE TABLE `processos` (
  `id` int(11) NOT NULL,
  `datainicio` varchar(12) DEFAULT NULL,
  `horainicio` varchar(10) DEFAULT NULL,
  `datafim` varchar(12) DEFAULT NULL,
  `horafim` varchar(10) DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `idjuiz` int(11) DEFAULT NULL,
  `idadvogado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `processos`
--

INSERT INTO `processos` (`id`, `datainicio`, `horainicio`, `datafim`, `horafim`, `local`, `status`, `idjuiz`, `idadvogado`) VALUES
(4, ' 01/05/2014', ' 14:04:53', ' 14/09/2015', ' 08:14:42', 'Manaus', 1, 5, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `processos_pessoas`
--

CREATE TABLE `processos_pessoas` (
  `id` int(11) NOT NULL,
  `idprocessos` int(11) NOT NULL,
  `idpessoas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advogados`
--
ALTER TABLE `advogados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `juizes`
--
ALTER TABLE `juizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processos`
--
ALTER TABLE `processos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_processos_advogados` (`idadvogado`),
  ADD KEY `FK_processos_juizes` (`idjuiz`);

--
-- Indexes for table `processos_pessoas`
--
ALTER TABLE `processos_pessoas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_processos_pessoas_processos` (`idprocessos`),
  ADD KEY `FK_processos_pessoas_pessoas` (`idpessoas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advogados`
--
ALTER TABLE `advogados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `juizes`
--
ALTER TABLE `juizes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `processos`
--
ALTER TABLE `processos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `processos_pessoas`
--
ALTER TABLE `processos_pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `processos`
--
ALTER TABLE `processos`
  ADD CONSTRAINT `FK_processos_advogados` FOREIGN KEY (`idadvogado`) REFERENCES `advogados` (`id`),
  ADD CONSTRAINT `FK_processos_juizes` FOREIGN KEY (`idjuiz`) REFERENCES `juizes` (`id`);

--
-- Limitadores para a tabela `processos_pessoas`
--
ALTER TABLE `processos_pessoas`
  ADD CONSTRAINT `FK_processos_pessoas_pessoas` FOREIGN KEY (`idpessoas`) REFERENCES `pessoas` (`id`),
  ADD CONSTRAINT `FK_processos_pessoas_processos` FOREIGN KEY (`idprocessos`) REFERENCES `processos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
