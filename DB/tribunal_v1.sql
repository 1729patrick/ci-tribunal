-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 03-Fev-2018 às 13:45
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(4, 'Inês', '279.862.893-5', '2486583', 175359, '(47) 22928-5285', 'mesa@gmail.com', 'Acrê');

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
(6, 'Maria', '545.633.546-3', '5863186', 484633, '(48) 96336-2255', 'maria@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jurados`
--

CREATE TABLE `jurados` (
  `id` int(11) UNSIGNED NOT NULL,
  `idpessoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jurados`
--

INSERT INTO `jurados` (`id`, `idpessoa`) VALUES
(1, 6);

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
(3, 'José', ' 148.632.586-2', ' 25.486.293-6', '(47) 63286-3559', 'Joaçaba', 0),
(4, 'Pedro', ' 148.521.485-9', '6325821', '(51) 96854-7635', 'Porto Alegre', 0),
(5, 'Fernanda', ' 220.159.632-5', '2596259', '(52) 92589-6259', 'Três Passos', 0),
(6, 'Bruna', ' 025.130.259-6', '2586325', '(48) 54862-0582', 'Caçador', 0);

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
(4, '01/05/2014', '14:04:53', '14/09/2015', '08:14:42', 'Manaus', 1, 5, 4),
(5, '08/04/2011', '08:45', '25/05/2011', '17:55', 'Vitória', 0, 6, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reus`
--

CREATE TABLE `reus` (
  `id` int(11) UNSIGNED NOT NULL,
  `idpessoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reus`
--

INSERT INTO `reus` (`id`, `idpessoa`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `testemunhas`
--

CREATE TABLE `testemunhas` (
  `id` int(11) UNSIGNED NOT NULL,
  `idpessoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `testemunhas`
--

INSERT INTO `testemunhas` (`id`, `idpessoa`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vitimas`
--

CREATE TABLE `vitimas` (
  `id` int(11) UNSIGNED NOT NULL,
  `idpessoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vitimas`
--

INSERT INTO `vitimas` (`id`, `idpessoa`) VALUES
(1, 5);

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
-- Indexes for table `jurados`
--
ALTER TABLE `jurados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpessoa` (`idpessoa`);

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
-- Indexes for table `reus`
--
ALTER TABLE `reus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpessoa` (`idpessoa`);

--
-- Indexes for table `testemunhas`
--
ALTER TABLE `testemunhas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpessoas` (`idpessoa`);

--
-- Indexes for table `vitimas`
--
ALTER TABLE `vitimas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpessoa` (`idpessoa`);

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
-- AUTO_INCREMENT for table `jurados`
--
ALTER TABLE `jurados`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `processos`
--
ALTER TABLE `processos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reus`
--
ALTER TABLE `reus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testemunhas`
--
ALTER TABLE `testemunhas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vitimas`
--
ALTER TABLE `vitimas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `jurados`
--
ALTER TABLE `jurados`
  ADD CONSTRAINT `jurados_ibfk_1` FOREIGN KEY (`idpessoa`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `processos`
--
ALTER TABLE `processos`
  ADD CONSTRAINT `FK_processos_advogados` FOREIGN KEY (`idadvogado`) REFERENCES `advogados` (`id`),
  ADD CONSTRAINT `FK_processos_juizes` FOREIGN KEY (`idjuiz`) REFERENCES `juizes` (`id`);

--
-- Limitadores para a tabela `reus`
--
ALTER TABLE `reus`
  ADD CONSTRAINT `reus_ibfk_1` FOREIGN KEY (`idpessoa`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `testemunhas`
--
ALTER TABLE `testemunhas`
  ADD CONSTRAINT `testemunhas_ibfk_1` FOREIGN KEY (`idpessoa`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `vitimas`
--
ALTER TABLE `vitimas`
  ADD CONSTRAINT `vitimas_ibfk_1` FOREIGN KEY (`idpessoa`) REFERENCES `pessoas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
