-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Fev-2023 às 23:36
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `campanhanatal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cuponscadastrados`
--

CREATE TABLE `cuponscadastrados` (
  `CODIGO` varchar(12) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `VALOR` varchar(10) DEFAULT NULL,
  `LOJA` varchar(100) DEFAULT NULL,
  `DATAHORACOMPRA` datetime DEFAULT NULL,
  `STATUS` varchar(30) DEFAULT 'ATIVO',
  `NUMEROSORTE` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cuponscadastrados`
--

INSERT INTO `cuponscadastrados` (`CODIGO`, `CPF`, `VALOR`, `LOJA`, `DATAHORACOMPRA`, `STATUS`, `NUMEROSORTE`) VALUES
('123', '12345678900', '10', NULL, '2023-02-01 13:47:00', 'ativo', NULL),
('123', '12345678900', '10', NULL, '2023-02-01 13:47:00', 'ativo', NULL),
('123', '12345678900', '10', 'aaa', '2023-02-01 13:53:00', 'ativo', NULL),
('123', '12345678900', '12312', 'aaa', '2023-02-01 13:54:00', 'ativo', NULL),
('12345', '22222222222', '10', 'aaa', '2023-02-01 14:30:00', 'ativo', NULL),
('1234566', '22222222222', '10', 'aaa', '2023-02-01 14:30:00', 'ativo', NULL),
('123456689900', '22222222222', '12312', 'eee', '2023-02-01 14:35:00', 'ativo', NULL),
('123456689900', '22222222222', '12312', 'eee', '2023-02-01 14:35:00', 'ativo', NULL),
('123456689900', '22222222222', '12312', 'eee', '2023-02-01 14:35:00', 'ativo', NULL),
('938', '22222222222', '10', 'eee', '2023-02-01 14:47:00', 'ativo', NULL),
('939', '22222222222', '10', 'eee', '2023-02-01 14:47:00', 'ativo', NULL),
('930', '22222222222', '10', 'eee', '2023-02-01 14:47:00', 'ativo', NULL),
('941', '22222222222', '10', 'eee', '2023-02-01 14:50:00', 'ativo', NULL),
('342', '22222222222', '10', 'aaa', '2023-02-01 14:52:00', 'ativo', NULL),
('343', '22222222222', '10', 'aaa', '2023-02-01 14:52:00', 'ativo', NULL),
('12345854', '22222222222', '10', 'aaa', '2023-02-02 16:47:00', 'ativo', NULL),
('83838383', '22222222222', '10', 'eee', '2023-02-03 16:48:00', 'ativo', NULL),
('555', '22222222222', '10', 'aaa', '2023-02-01 16:51:00', 'ativo', NULL),
('12345999', '22222222222', '10', 'aaa', '2023-02-01 16:56:00', 'ativo', NULL),
('123777', '22222222222', '10', 'ii', '2023-02-02 16:58:00', 'ativo', NULL),
('99', '22222222222', '10', 'uu', '2023-02-01 16:59:00', 'ativo', NULL),
('12300', '22222222222', '10', 'uuui', '2023-02-03 17:00:00', 'ativo', NULL),
(NULL, NULL, NULL, NULL, NULL, 'ATIVO', 823815),
('0101', '22222222222', '10', 'uia', '2023-02-01 17:04:00', 'ativo', NULL),
('1235555', '22222222222', '10', 'uia', '2023-02-01 17:06:00', 'ativo', NULL),
('123aaaaaaaa', '22222222222', '10', 'uu', '2023-02-01 17:07:00', 'ativo', 815371),
('000000', '22222222222', '10', 'uia', '2023-02-01 19:11:00', 'ativo', 590819),
('000001', '22222222222', '10', 'uia', '2023-02-01 19:11:00', 'ativo', 183523),
('000003', '22222222222', '10', 'uia', '2023-02-01 19:14:00', 'ativo', 950811),
('000004', '22222222222', '10', 'uia', '2023-02-01 19:14:00', 'ativo', 732349),
('000007', '22222222222', '10', 'uuui', '2023-02-01 19:16:00', 'ativo', 852337),
('000008', '22222222222', '10', 'uuui', '2023-02-01 19:16:00', 'ativo', 560893),
('000009', '22222222222', '10', 'eee', '2023-02-01 19:18:00', 'ativo', 463018),
('000018', '22222222222', '10', 'uia', '2023-02-01 19:21:00', 'ativo', 723580),
('001', '12345678910', '310', 'lojaA', '2023-02-01 16:15:00', 'ativo', 707563),
('000023', '10987654321', '15', 'uuui', '1111-11-11 10:10:00', 'ativo', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `NOME` varchar(150) DEFAULT NULL,
  `EMAIL` varchar(150) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `DATANASCIMENTO` date DEFAULT NULL,
  `SENHA` varchar(8) DEFAULT NULL,
  `GENERO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`NOME`, `EMAIL`, `CPF`, `DATANASCIMENTO`, `SENHA`, `GENERO`) VALUES
('leticia', 'leticia@gmail.com', '12345678901', '2023-02-01', '12345678', 'Feminino'),
('leticiab', 'leticiab@gmail.com', '11111111111', '2023-02-01', '123', 'Feminino'),
('rafael', 'rafael@gmail.com', '22222222222', '2023-02-01', '222', 'Masculino'),
('leticia', 'leticia@gmail.com', '22222222222', '2023-02-01', '11', 'Feminino'),
('leticia oliveira', 'leticiaoliveira@gmail.com', '12345678910', '1999-01-01', 'leticia', 'Feminino'),
('teste1', 'teste@gmail.com', '10987654321', '2023-02-02', '123', 'Feminino'),
('aa', 'leticiaoliveira@gmail.com', '22222222222', '1111-11-11', '1234', 'Feminino');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
