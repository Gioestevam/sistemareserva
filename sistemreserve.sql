-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2017 às 18:47
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facima`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserve`
--

CREATE TABLE `reserve` (
  `id_reserve` int(11) NOT NULL,
  `delivery_reserve` varchar(255) NOT NULL,
  `date_reserve` varchar(255) CHARACTER SET latin1 NOT NULL,
  `local_reserve` varchar(200) NOT NULL,
  `item` varchar(255) CHARACTER SET latin1 NOT NULL,
  `quantidade` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user` varchar(255) CHARACTER SET latin1 NOT NULL,
  `devolution` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reserve`
--

INSERT INTO `reserve` (`id_reserve`, `delivery_reserve`, `date_reserve`, `local_reserve`, `item`, `quantidade`, `user`, `devolution`) VALUES
(1, '28/11/2017', '1511629361', 'Recife', '2', '11', '8', '29/11/2017'),
(2, '28/11/2017', '1511631923', 'teste', '1', '1', '8', '30/11/2017');

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `id_item` int(11) NOT NULL,
  `code_item` varchar(11) CHARACTER SET latin1 NOT NULL,
  `amount_item` int(255) NOT NULL,
  `name_item` varchar(200) CHARACTER SET latin1 NOT NULL,
  `description_item` varchar(300) CHARACTER SET latin1 NOT NULL,
  `img_item` mediumblob NOT NULL,
  `remaining` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `stock`
--

INSERT INTO `stock` (`id_item`, `code_item`, `amount_item`, `name_item`, `description_item`, `img_item`, `remaining`) VALUES
(1, '00005', 10, 'Microfone', 'Equipamento para Som', '', '9'),
(2, '7', 66, 'tablet', 'tablet', 0x31, '55'),
(3, '00006', 55, 'paisagem', 'tablet', '', '55'),
(4, '00006', 100, 'tablet', 'tablet', 0x323031372d30392d30342d3030313032305f32373236783736385f7363726f742e706e67, '100'),
(5, '0009', 1, 'fone', 'fone', 0x323031372d30382d32372d3131303533305f32373236783736385f7363726f742e706e67, '1'),
(6, '00009', 1, 'caneta', 'big', '', '1'),
(7, '00015', 1, 'teste', 'teste', '', '1'),
(8, '1111', 4, 'teste', 'descrição teste', 0x636170612e6a7067, '4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `full_name_user` varchar(200) NOT NULL,
  `name_user` varchar(200) NOT NULL,
  `email_user` varchar(200) NOT NULL,
  `cpf_user` varchar(14) NOT NULL,
  `password_user` varchar(200) NOT NULL,
  `permission_user` int(1) NOT NULL,
  `status_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `full_name_user`, `name_user`, `email_user`, `cpf_user`, `password_user`, `permission_user`, `status_user`) VALUES
(6, 'Giovanni Batista Estevam', 'Giovanniestevam', 'giovanniestevam@hotmail.com', '122.992.814-60', '10470c3b4b1fed12c3baac014be15fac67c6e815', 1, 0),
(7, 'Giovanni Batista Estevam', 'Giovanniestevam', 'giovanniestevam98@hotmail.com', '122.992.814-60', '10832097de1a8c2b6b4948ca7305e9f47692c483', 3, 0),
(8, 'Fernando Lima Costa', 'fernando', 'fernando@nightweb.com.br', '123.542.123.12', '6e8df3d78050163af1c5363c7ffe4561193ea8f5', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id_reserve`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_item`,`name_item`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`,`cpf_user`,`email_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id_reserve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
