CREATE DATABASE autopecas;
use autopecas;
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Nov-2021 às 03:19
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `autopecas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nm_cliente` varchar(50) NOT NULL,
  `ds_cpf` varchar(15) NOT NULL,
  `ds_telefone` varchar(20) NOT NULL,
  `ds_endereco` varchar(50) NOT NULL,
  `dt_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id_cliente`, `nm_cliente`, `ds_cpf`, `ds_telefone`, `ds_endereco`, `dt_nascimento`) VALUES
(1, 'Default Client', '000000000000', '0000000000000', 'Default Location', '0000-00-00'),
(2, 'Pedro Alvarez da silva', '555', '555', '555', '2001-07-07'),
(3, 'Marcos da Vila', '34777333858', '11988447326', 'Rua Antonio Carlos', '2002-02-02'),
(4, 'Maria das Dores Santos', '75589388746', '17991747717', 'Rua Masazo ', '1998-10-10'),
(5, 'Carla Dias', '77382717131', '11988397461', 'Rua Antonio Marcos ', '1990-06-10'),
(6, 'Pedro Mario Bueno', '12323488843', '15977746382', 'Rua Frei', '2000-02-02'),
(7, 'Carlo Santana Maia', '12313558112', '11984373666', 'Rua Placido Vieira', '2001-04-02'),
(8, 'Geize Caruline', '11112345532', '11943873322', 'Av Santo Amaro', '1998-03-05'),
(9, 'Marina Batista Santos', '12443512555', '11984477736', 'Av Paulista', '1995-05-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_desconto`
--

CREATE TABLE `tb_desconto` (
  `id_desconto` int(11) NOT NULL,
  `cd_desconto` varchar(50) NOT NULL,
  `vl_desconto` decimal(10,2) NOT NULL,
  `dt_validade` date NOT NULL,
  `ds_ativo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_desconto`
--

INSERT INTO `tb_desconto` (`id_desconto`, `cd_desconto`, `vl_desconto`, `dt_validade`, `ds_ativo`) VALUES
(1, '00', '0.00', '0000-00-00', 1),
(3, '10', '10.00', '2021-11-12', 0),
(4, '11', '10.00', '2021-11-13', 1),
(5, 'Roberto13', '50.00', '2021-11-17', 1),
(6, 'marcadocar100', '20.00', '2021-11-19', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estoque`
--

CREATE TABLE `tb_estoque` (
  `id_estoque` int(11) NOT NULL,
  `ds_quantidade` int(11) DEFAULT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_estoque`
--

INSERT INTO `tb_estoque` (`id_estoque`, `ds_quantidade`, `id_produto`) VALUES
(1, 0, 1),
(2, 24, 2),
(3, 44, 3),
(4, 4, 4),
(5, 3, 5),
(6, 13, 6),
(7, 13, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nm_funcionario` varchar(60) NOT NULL,
  `ds_rg` varchar(10) NOT NULL,
  `ds_cpf` varchar(15) NOT NULL,
  `vl_salario` decimal(10,2) NOT NULL,
  `ds_endereco` varchar(60) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `ds_cargo` varchar(60) NOT NULL,
  `ds_senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_funcionario`, `nm_funcionario`, `ds_rg`, `ds_cpf`, `vl_salario`, `ds_endereco`, `dt_nascimento`, `ds_cargo`, `ds_senha`) VALUES
(1, 'Jose Marcos dos Santos', '228884795', '322295777432', '1800.00', 'Rua margarida', '1998-02-10', 'vendedor', 'testeteste'),
(2, 'Maria do Bairro', '647285947', '22284723363', '1600.00', 'Rua Jose Freitas', '1990-10-06', 'estoquista', 'maria123'),
(3, 'Henrique Gomes da Costa', '738881950', '4222049928', '1600.00', 'Rua Marcos Gomes da Costa', '1990-10-10', 'estoquista', 'mariazinha'),
(4, 'Carla Souza', '289994401', '00003944481', '1800.00', 'Rua BarÃ£o do Rio Branco', '1896-05-05', 'vendedor', 'adminadmin'),
(5, 'Pedro Henrique Alves Buerno', '999999931', '45772745611', '10000.00', 'Rua Ilha Bela', '2002-10-10', 'diretor', 'euamoageiza'),
(6, 'Frank Henrique Zettler Saraiva', '526492372', '42220344827', '10000.00', 'Rua Masazo ', '2002-06-10', 'diretor', '12345678'),
(7, 'Matheus Teixeira', '287474742', '38375857111', '10000.00', 'Rua Marcos Jose', '2001-02-02', 'diretor', 'matheus1233444'),
(8, 'admin', 'admin', 'admin', '69.00', 'admin', '2001-07-07', 'admin', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `vl_total` decimal(10,2) NOT NULL,
  `dt_pedido` date NOT NULL,
  `forma_pagamento` varchar(30) NOT NULL,
  `qtd_parcelas` int(11) DEFAULT NULL,
  `id_desconto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_pedido`
--

INSERT INTO `tb_pedido` (`id_pedido`, `id_cliente`, `id_funcionario`, `vl_total`, `dt_pedido`, `forma_pagamento`, `qtd_parcelas`, `id_desconto`) VALUES
(3, 1, 8, '30.00', '2021-11-11', 'dinheiro', 0, 1),
(6, 1, 8, '15.00', '2021-11-11', 'dinheiro', 0, 5),
(7, 1, 8, '15.00', '2021-11-11', 'dinheiro', 0, 5),
(8, 1, 8, '30.00', '2021-11-11', 'credito', 2, 1),
(9, 1, 8, '150.00', '2021-11-11', 'debito', 0, 1),
(10, 1, 8, '30.00', '2021-11-11', 'debito', 0, 1),
(11, 1, 8, '90.00', '2021-11-12', 'debito', 0, 5),
(12, 1, 8, '30.00', '2021-11-13', 'credito', 2, 1),
(13, 7, 8, '108.00', '2021-11-13', 'credito', 2, 4),
(14, 5, 8, '50.00', '2021-11-13', 'credito', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedidoitem`
--

CREATE TABLE `tb_pedidoitem` (
  `id_pedidoitem` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_pedidoitem`
--

INSERT INTO `tb_pedidoitem` (`id_pedidoitem`, `id_pedido`, `id_produto`) VALUES
(1, 3, 1),
(2, 3, 1),
(3, 3, 1),
(4, 3, 3),
(5, 3, 1),
(6, 3, 1),
(7, 6, 1),
(8, 7, 1),
(9, 8, 1),
(10, 8, 4),
(11, 8, 1),
(12, 8, 2),
(13, 8, 2),
(14, 8, 2),
(15, 8, 3),
(16, 8, 3),
(17, 8, 3),
(18, 9, 1),
(19, 9, 1),
(20, 9, 1),
(21, 9, 1),
(22, 9, 1),
(23, 10, 1),
(24, 10, 1),
(25, 10, 2),
(26, 11, 1),
(27, 11, 1),
(28, 11, 5),
(29, 11, 5),
(30, 12, 1),
(31, 14, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id_produto` int(11) NOT NULL,
  `ds_marca` varchar(100) NOT NULL,
  `nm_produto` varchar(70) NOT NULL,
  `vl_produto` decimal(10,2) NOT NULL,
  `ds_modelo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `ds_marca`, `nm_produto`, `vl_produto`, `ds_modelo`) VALUES
(1, 'Shell', 'Óleo ', '30.00', '5W30'),
(2, 'Volkswagen', 'Faról', '50.00', 'Gol'),
(3, 'Volkswagen', 'Correia Dentada', '50.00', 'GOL'),
(4, 'GM', 'Retrovisor', '50.00', 'Corsa 2008'),
(5, 'Renault', 'Pastilha', '60.00', 'Eco1538'),
(6, 'Moura', 'Bateria', '100.00', 'M60AD'),
(7, 'GM', 'Vela', '70.00', 'Corsa');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `ds_cpf` (`ds_cpf`);

--
-- Índices para tabela `tb_desconto`
--
ALTER TABLE `tb_desconto`
  ADD PRIMARY KEY (`id_desconto`);

--
-- Índices para tabela `tb_estoque`
--
ALTER TABLE `tb_estoque`
  ADD PRIMARY KEY (`id_estoque`),
  ADD KEY `tb_estoque_fk0` (`id_produto`);

--
-- Índices para tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `ds_rg` (`ds_rg`),
  ADD UNIQUE KEY `ds_cpf` (`ds_cpf`);

--
-- Índices para tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `tb_pedido_fk0` (`id_cliente`),
  ADD KEY `tb_pedido_fk1` (`id_funcionario`),
  ADD KEY `tb_pedido_fk2` (`id_desconto`);

--
-- Índices para tabela `tb_pedidoitem`
--
ALTER TABLE `tb_pedidoitem`
  ADD PRIMARY KEY (`id_pedidoitem`),
  ADD KEY `tb_pedidoitem_fk0` (`id_pedido`),
  ADD KEY `tb_pedidoitem_fk1` (`id_produto`);

--
-- Índices para tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_desconto`
--
ALTER TABLE `tb_desconto`
  MODIFY `id_desconto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_estoque`
--
ALTER TABLE `tb_estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_pedidoitem`
--
ALTER TABLE `tb_pedidoitem`
  MODIFY `id_pedidoitem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_estoque`
--
ALTER TABLE `tb_estoque`
  ADD CONSTRAINT `tb_estoque_fk0` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`);

--
-- Limitadores para a tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD CONSTRAINT `tb_pedido_fk0` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`),
  ADD CONSTRAINT `tb_pedido_fk1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`),
  ADD CONSTRAINT `tb_pedido_fk2` FOREIGN KEY (`id_desconto`) REFERENCES `tb_desconto` (`id_desconto`);

--
-- Limitadores para a tabela `tb_pedidoitem`
--
ALTER TABLE `tb_pedidoitem`
  ADD CONSTRAINT `tb_pedidoitem_fk0` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id_pedido`),
  ADD CONSTRAINT `tb_pedidoitem_fk1` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



