-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 30-Out-2021 às 21:02
-- Versão do servidor: 5.7.32-0ubuntu0.16.04.1
-- PHP Version: 7.2.34-9+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendencias`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pendencias_abertas`
--

CREATE TABLE `pendencias_abertas` (
  `id` int(11) NOT NULL,
  `user_add_id` int(11) NOT NULL,
  `status_pend` int(11) NOT NULL,
  `pend_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pend_dataFinalizada` timestamp NULL DEFAULT NULL,
  `pend_cliente` varchar(100) DEFAULT NULL,
  `pend_obs` varchar(500) DEFAULT NULL,
  `pend_oc` varchar(100) DEFAULT NULL,
  `pend_condPgmt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pendencias_abertas`
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`) VALUES
(2, 'adm', 'adm@21@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pendencias_abertas`
--
ALTER TABLE `pendencias_abertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_add_id` (`user_add_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendencias_abertas`
--
ALTER TABLE `pendencias_abertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pendencias_abertas`
--
ALTER TABLE `pendencias_abertas`
  ADD CONSTRAINT `pendencias_abertas_ibfk_1` FOREIGN KEY (`user_add_id`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
