-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Out-2021 às 02:17
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
(1, 'Marcos da Vila', '34777333858', '11988447326', 'Rua Antonio Carlos', '2002-02-02'),
(2, 'Maria das Dores Santos', '75589388746', '17991747717', 'Rua Masazo ', '1998-10-10'),
(3, 'Carla Dias', '77382717131', '11988397461', 'Rua Antonio Marcos ', '1990-06-10'),
(4, 'Pedro Mario Bueno', '12323488843', '15977746382', 'Rua Frei', '2000-02-02'),
(5, 'Carlo Santana Maia', '12313558112', '11984373666', 'Rua Placido Vieira', '2001-04-02'),
(6, 'Geize Caruline', '11112345532', '11943873322', 'Av Santo Amaro', '1998-03-05'),
(7, 'Marina Batista Santos', '12443512555', '11984477736', 'Av Paulista', '1995-05-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_desconto`
--

CREATE TABLE `tb_desconto` (
  `id_desconto` int(11) NOT NULL,
  `cd_desconto` varchar(50) NOT NULL,
  `vl_desconto` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_desconto`
--

INSERT INTO `tb_desconto` (`id_desconto`, `cd_desconto`, `vl_desconto`) VALUES
(1, 'geiza10', '150'),
(2, 'matheus20', '20'),
(3, 'sextaoff', '20'),
(4, 'segundaon', '15'),
(5, 'ck3vyg', '30'),
(6, 'aniverdmk', '100');

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
(1, 20, 1),
(2, 30, 2),
(3, 50, 3),
(4, 66, 4),
(5, 5, 5),
(6, 1, 6),
(7, 4, 7),
(8, 69, 9),
(9, NULL, 10),
(10, 23, 11),
(11, 44444, 12),
(12, NULL, 13),
(13, NULL, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nm_funcionario` varchar(60) NOT NULL,
  `ds_rg` varchar(10) NOT NULL,
  `ds_cpf` varchar(15) NOT NULL,
  `vl_salario` decimal(10,0) NOT NULL,
  `ds_endereco` varchar(60) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `ds_cargo` varchar(60) NOT NULL,
  `img_funcionário` blob DEFAULT NULL,
  `ds_senha` varchar(50) NOT NULL,
  `ds_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_funcionario`, `nm_funcionario`, `ds_rg`, `ds_cpf`, `vl_salario`, `ds_endereco`, `dt_nascimento`, `ds_cargo`, `img_funcionário`, `ds_senha`, `ds_email`) VALUES
(1, 'Jose Marcos dos Santos', '228884795', '322295777432', '1800', 'Rua margarida', '1998-02-10', 'vendedor', NULL, 'testeteste', ''),
(2, 'Maria do Bairro', '647285947', '22284723363', '1600', 'Rua Jose Freitas', '1990-10-06', 'estoquista', NULL, 'maria123', ''),
(3, 'Henrique Gomes da Costa', '738881950', '4222049928', '1600', 'Rua Marcos Gomes da Costa', '1990-10-16', 'estoquista', NULL, 'mariazinha', ''),
(4, 'Carla Souza', '289994401', '00003944481', '1800', 'Rua Barão do Rio Branco', '1896-05-05', 'vendedor', NULL, 'adminadmin', ''),
(5, 'Pedro Henrique Alves Buerno', '999999931', '45772745611', '10000', 'Rua Ilha Bela', '2002-10-10', 'diretor', NULL, 'euamoageiza', ''),
(6, 'Frank Henrique Zettler Saraiva', '526492372', '42220344827', '10000', 'Rua Masazo ', '2002-06-10', 'diretor', NULL, '12345678', ''),
(7, 'Matheus Teixeira', '287474742', '38375857111', '10000', 'Rua Marcos Jose', '2001-02-02', 'diretor', NULL, 'matheus1233444', ''),
(8, 'admin', '645634564', 'admin', '54345', '564635415', '2011-10-18', 'gerente', NULL, 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'emailzaolocodoadmin@email.loko'),
(12, 'Pedro Bueno', '2468541', '654513', '655546', 'Rua alberto albertino albertão roberto, n69', '2001-07-07', 'estoquista', NULL, '', ''),
(13, 'asfalto antônio', '657468', '6876841', '2469', 'Rua alberto albertino albertão roberto, n69', '2001-07-07', 'estoquista', NULL, '', ''),
(14, 'robertinho almeida', '67465', '358745864', '6963', 'Antônio barroso, 64 - barco azul', '2021-09-07', 'diretor', NULL, '', ''),
(15, 'Roberto dos santos 6901', '57468', '5465453', '346546541', '6546541654654', '2021-09-21', 'vendedor', NULL, '', ''),
(16, 'Patriarca da familia', '35745', '4154', '35454', 'Rua altar do gerônimo, n79 - roberto assunção', '2021-10-14', 'estoquista', NULL, '', 'emaildeverdade@email.com'),
(17, 'Stella adonato', '6586', '81032', '2501', '14523', '2021-10-30', 'estoquista', NULL, '', 'emaildeverdade2@email.com'),
(18, 'Samuel Roberto', '354654', '34165', '20001', 'Rua pau nelas', '1945-05-06', 'estoquista', NULL, 'da66e6c1739f341465a3de3b52ad3b2975620c95', 'samuelreidelas@email.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_metas`
--

CREATE TABLE `tb_metas` (
  `id_meta` int(11) NOT NULL,
  `qtd_vendas` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_metas`
--

INSERT INTO `tb_metas` (`id_meta`, `qtd_vendas`, `id_funcionario`) VALUES
(1, 50, 1),
(2, 50, 2),
(3, 50, 3),
(4, 50, 4),
(5, 50, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `vl_total` decimal(10,0) NOT NULL,
  `dt_pedido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_pedido`
--

INSERT INTO `tb_pedido` (`id_pedido`, `id_cliente`, `id_funcionario`, `vl_total`, `dt_pedido`) VALUES
(1, 2, 1, '500', '2021-09-30'),
(2, 3, 1, '1500', '2021-09-30'),
(3, 5, 1, '2000', '2021-09-30'),
(4, 1, 3, '1000', '2021-09-25'),
(5, 1, 5, '660', '2021-09-24');

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
(1, 1, 1),
(2, 1, 3),
(3, 2, 3),
(4, 2, 4),
(5, 2, 1),
(6, 3, 6),
(7, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id_produto` int(11) NOT NULL,
  `nm_produto` varchar(70) NOT NULL,
  `vl_produto` decimal(10,0) NOT NULL,
  `ds_marca` varchar(70) NOT NULL,
  `ds_modelo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `nm_produto`, `vl_produto`, `ds_marca`, `ds_modelo`) VALUES
(1, 'roberto', '23133', '', ''),
(2, 'robson da silva', '69', '', ''),
(3, 'Correia Dentada', '50', '', ''),
(4, 'Espelho', '50', '', ''),
(5, 'Pastilha', '60', '', ''),
(6, 'Bateria', '100', '', ''),
(7, 'Vela', '70', '', ''),
(9, 'correia de moto que faz barlho', '790', '', ''),
(10, 'Óleo de motor', '76', '', ''),
(11, 'kit escape silencioso', '161', 'Celta', 'G2 94'),
(12, 'aaaaa', '44444', 'aaaaaa', 'aaaaa'),
(13, 'Ferrero Rocher', '46', ' Alérgico', 'G9 64'),
(14, 'aaaaaab', '444447', 'aaaaab', 'baaaa');

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
-- Índices para tabela `tb_metas`
--
ALTER TABLE `tb_metas`
  ADD PRIMARY KEY (`id_meta`),
  ADD KEY `tb_metas_fk0` (`id_funcionario`);

--
-- Índices para tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `tb_pedido_fk0` (`id_cliente`),
  ADD KEY `tb_pedido_fk1` (`id_funcionario`);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_desconto`
--
ALTER TABLE `tb_desconto`
  MODIFY `id_desconto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_estoque`
--
ALTER TABLE `tb_estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_metas`
--
ALTER TABLE `tb_metas`
  MODIFY `id_meta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_pedidoitem`
--
ALTER TABLE `tb_pedidoitem`
  MODIFY `id_pedidoitem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_estoque`
--
ALTER TABLE `tb_estoque`
  ADD CONSTRAINT `tb_estoque_fk0` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`);

--
-- Limitadores para a tabela `tb_metas`
--
ALTER TABLE `tb_metas`
  ADD CONSTRAINT `tb_metas_fk0` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`);

--
-- Limitadores para a tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD CONSTRAINT `tb_pedido_fk0` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`),
  ADD CONSTRAINT `tb_pedido_fk1` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id_funcionario`);

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
