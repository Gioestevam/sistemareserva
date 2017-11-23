-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 23-Nov-2017 às 08:06
-- Versão do servidor: 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemreserve`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserve`
--

CREATE TABLE `reserve` (
  `id_reserve` int(11) NOT NULL,
  `take_reserve` varchar(200) NOT NULL,
  `delivery_reserve` varchar(200) NOT NULL,
  `date_reserve` date NOT NULL,
  `schedule_reserve` datetime NOT NULL,
  `course_reserve` varchar(200) NOT NULL,
  `period_reserve` varchar(200) NOT NULL,
  `local_reserve` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserve_has_stock`
--

CREATE TABLE `reserve_has_stock` (
  `reserve_id_reserve` int(11) NOT NULL,
  `stock_id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `id_item` int(11) NOT NULL,
  `code_item` varchar(5) NOT NULL,
  `amount_item` int(255) NOT NULL,
  `name_item` varchar(200) NOT NULL,
  `description_item` varchar(300) NOT NULL,
  `img_item` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `stock`
--

INSERT INTO `stock` (`id_item`, `code_item`, `amount_item`, `name_item`, `description_item`, `img_item`) VALUES
(1, '00005', 10, 'Microfone', 'Equipamento para Som', ''),
(2, '7', 66, 'tablet', 'tablet', 0x31),
(3, '00006', 55, 'paisagem', 'tablet', ''),
(4, '00006', 100, 'tablet', 'tablet', 0x323031372d30392d30342d3030313032305f32373236783736385f7363726f742e706e67),
(5, '0009', 1, 'fone', 'fone', 0x323031372d30382d32372d3131303533305f32373236783736385f7363726f742e706e67),
(6, '00009', 1, 'caneta', 'big', ''),
(7, '00015', 1, 'teste', 'teste', '');

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
(7, 'Giovanni Batista Estevam', 'Giovanniestevam', 'giovanniestevam98@hotmail.com', '122.992.814-60', '10832097de1a8c2b6b4948ca7305e9f47692c483', 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_has_reserve`
--

CREATE TABLE `user_has_reserve` (
  `user_id_user` int(11) NOT NULL,
  `reserve_id_reserve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id_reserve`);

--
-- Indexes for table `reserve_has_stock`
--
ALTER TABLE `reserve_has_stock`
  ADD PRIMARY KEY (`reserve_id_reserve`,`stock_id_item`),
  ADD KEY `fk_reserve_has_stock_stock1_idx` (`stock_id_item`),
  ADD KEY `fk_reserve_has_stock_reserve1_idx` (`reserve_id_reserve`);

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
-- Indexes for table `user_has_reserve`
--
ALTER TABLE `user_has_reserve`
  ADD PRIMARY KEY (`user_id_user`,`reserve_id_reserve`),
  ADD KEY `fk_user_has_reserve_reserve1_idx` (`reserve_id_reserve`),
  ADD KEY `fk_user_has_reserve_user_idx` (`user_id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id_reserve` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `reserve_has_stock`
--
ALTER TABLE `reserve_has_stock`
  ADD CONSTRAINT `fk_reserve_has_stock_reserve1` FOREIGN KEY (`reserve_id_reserve`) REFERENCES `reserve` (`id_reserve`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reserve_has_stock_stock1` FOREIGN KEY (`stock_id_item`) REFERENCES `stock` (`id_item`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `user_has_reserve`
--
ALTER TABLE `user_has_reserve`
  ADD CONSTRAINT `fk_user_has_reserve_reserve1` FOREIGN KEY (`reserve_id_reserve`) REFERENCES `reserve` (`id_reserve`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_reserve_user` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
