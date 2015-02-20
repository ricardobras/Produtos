-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.5.21 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para produtos
CREATE DATABASE IF NOT EXISTS `produtos` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `produtos`;


-- Copiando estrutura para tabela produtos.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `databasechb` varchar(45) DEFAULT NULL,
  `codigochb` int(11) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `servidor` varchar(200) DEFAULT NULL,
  `porta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela produtos.empresa: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
REPLACE INTO `empresa` (`id`, `databasechb`, `codigochb`, `nome`, `servidor`, `porta`) VALUES
	(1, 'rubi', 1, 'Cooper-Rubi', 'cooperrubi.dyndns.org', '8088'),
	(2, 'rubi', 2, 'Agro-rub', 'cooperrubi.dyndns.org', '8088');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;


-- Copiando estrutura para tabela produtos.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `codigo` int(11) NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `marca` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela produtos.marca: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;


-- Copiando estrutura para tabela produtos.ncm
CREATE TABLE IF NOT EXISTS `ncm` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `unidconsumo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela produtos.ncm: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `ncm` DISABLE KEYS */;
REPLACE INTO `ncm` (`codigo`, `descricao`, `unidconsumo`) VALUES
	(1, 'ncm1', 'PC'),
	(2, 'ncm2', 'SC'),
	(3, 'ncm3', 'LT');
/*!40000 ALTER TABLE `ncm` ENABLE KEYS */;


-- Copiando estrutura para tabela produtos.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `dv` int(2) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `compl1` varchar(200) DEFAULT NULL,
  `compl2` varchar(200) DEFAULT NULL,
  `princ_ativo` int(11) DEFAULT NULL,
  `tp_prod` varchar(45) DEFAULT NULL,
  `bloqueado` char(1) DEFAULT NULL,
  `citricidade` varchar(45) DEFAULT NULL,
  `user_cadastro` varchar(45) DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `user_val` varchar(45) DEFAULT NULL,
  `dt_val` datetime DEFAULT NULL,
  `user_int` varchar(45) DEFAULT NULL,
  `dt_int` datetime DEFAULT NULL,
  `ncm_codigo` int(11) NOT NULL,
  `marca_codigo` int(11) DEFAULT '0',
  `idsolicitacaoweb` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0 = Em andamento, 1 = Concluido',
  PRIMARY KEY (`codigo`,`ncm_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela produtos.produto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
REPLACE INTO `produto` (`codigo`, `dv`, `descricao`, `compl1`, `compl2`, `princ_ativo`, `tp_prod`, `bloqueado`, `citricidade`, `user_cadastro`, `dt_cadastro`, `user_val`, `dt_val`, `user_int`, `dt_int`, `ncm_codigo`, `marca_codigo`, `idsolicitacaoweb`, `status`) VALUES
	(160, 0, 'SAPATO DE SEGURANCA', '', '', 1600, '07', 'N', '0', '13', '2015-02-19 16:38:06', '', '2015-02-19 16:38:06', '', '2015-02-19 16:38:06', 1, 0, 111, 1),
	(161, 2, 'CADERNO CAPA DURA', '', '', 1612, '07', 'N', '0', '13', '2015-02-19 16:54:01', '', '2015-02-19 16:54:01', '', '2015-02-19 16:54:01', 1, 0, 105, 0),
	(162, 4, 'MOUSE PRETO', '1', '1', 1624, '06', 'N', '0', '13', '2015-02-19 17:03:42', '', '2015-02-19 17:03:42', '', '2015-02-19 17:03:42', 1, 0, 107, 0),
	(163, NULL, '', '', '', 0, '0', 'N', '0', '13', '2015-02-19 17:02:10', '', NULL, '', NULL, 0, 0, 109, 0);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


-- Copiando estrutura para tabela produtos.produto_detalhes
CREATE TABLE IF NOT EXISTS `produto_detalhes` (
  `empresa_id` int(11) NOT NULL,
  `produto_codigo` int(11) NOT NULL,
  `unidCompras` varchar(5) DEFAULT NULL,
  `unidConsumo` varchar(5) DEFAULT NULL,
  `ccusto` int(11) DEFAULT NULL,
  `grupo` varchar(45) DEFAULT NULL,
  `ordproducao` varchar(45) DEFAULT NULL,
  `opentrada` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`empresa_id`,`produto_codigo`),
  KEY `fk_produto_detalhes_empresa1` (`empresa_id`),
  KEY `fk_produto_detalhes_produto1` (`produto_codigo`),
  CONSTRAINT `fk_produto_detalhes_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_detalhes_produto1` FOREIGN KEY (`produto_codigo`) REFERENCES `produto` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela produtos.produto_detalhes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `produto_detalhes` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto_detalhes` ENABLE KEYS */;


-- Copiando estrutura para tabela produtos.solicitacao
CREATE TABLE IF NOT EXISTS `solicitacao` (
  `idsolicitacao` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL DEFAULT '0',
  `descricao` varchar(200) DEFAULT NULL,
  `und` varchar(45) DEFAULT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `marca` varchar(200) DEFAULT NULL,
  `ccusto` varchar(45) DEFAULT NULL,
  `grupo` varchar(45) DEFAULT NULL,
  `ordproducao` varchar(45) DEFAULT NULL,
  `aplicacao` varchar(45) DEFAULT NULL,
  `observacao` varchar(200) DEFAULT NULL,
  `importancia` varchar(45) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `usuario_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `usuario_selecao` varchar(55) DEFAULT NULL,
  `dt_solicitacao` datetime DEFAULT NULL,
  PRIMARY KEY (`idsolicitacao`,`usuario_id`,`empresa_id`),
  KEY `fk_solicitacao_usuario1` (`usuario_id`),
  KEY `fk_solicitacao_empresa1` (`empresa_id`),
  CONSTRAINT `fk_solicitacao_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitacao_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela produtos.solicitacao: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `solicitacao` DISABLE KEYS */;
REPLACE INTO `solicitacao` (`idsolicitacao`, `codigo`, `descricao`, `und`, `referencia`, `marca`, `ccusto`, `grupo`, `ordproducao`, `aplicacao`, `observacao`, `importancia`, `status`, `usuario_id`, `empresa_id`, `usuario_selecao`, `dt_solicitacao`) VALUES
	(97, '0', 'CANETA BIC AZUL amarela preta vermelha branca marrom', 'PCS', 'CANETA', 'BIC', '1910', '234', '34334', 'ESCRCITORIO', '', '2', 0, 13, 1, '', '2015-01-23 15:52:55'),
	(98, '0', 'ASD', 'FADSF', 'ASDF', 'ADSF', 'ads', 'fasd', 'fasd', 'asdf', 'asdf', '2', 0, 13, 1, '', '2015-01-23 15:53:23'),
	(99, '0', 'ASDFADSF', 'D', 'D', 'D', 'd', 'd', 'd', 'd', 'd', '1', 0, 13, 1, '', '2015-01-26 13:32:28'),
	(100, '0', 'CELULAR MOTOROLA MOTO G', 'PCS', 'CELULAR', 'MOTOROLA', '002.001', '1000', '388.300.399', 'ADMINISTRACAO', 'CELULAR PARA DIRETORIA', '3', 0, 13, 1, '', '2015-01-29 14:10:47'),
	(101, '0', 'ADSFASDF', 'ASDFASDF', 'ASDF', 'ASDFASD', 'fasd', 'fasd', 'fasd', 'fa', 'sdfasdf', '1', 0, 13, 2, '', '2015-01-29 15:08:42'),
	(102, '0', 'FONE DE OUVIDO', 'PC', 'MS1010', 'MICROSOFT', '3939.399', '39993.399', '29.299.2999', 'DEPARTAMENTO DE TI', 'DE PREFERENCIA NA COR PRETA', '2', 0, 13, 1, '', '2015-01-31 08:23:40'),
	(103, '0', 'ASDF', 'PC', 'ASDFAS', 'DFASD', 'fasd', 'fasdf', 'asd', 'fasdf', 'asdfasdfasd', '1', 0, 13, 1, '', '2015-01-31 08:36:30'),
	(104, '0', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', 'D', '1', 0, 13, 1, '', '2015-02-02 08:48:21'),
	(105, '0', 'CADERNO CAPA DURA', 'PC', 'PEQUENO', 'TILIBRA', '51.06', '10.01', '3.1.07.14', 'ADMINISTRAÇÃO', 'CAPA VERDE', '3', 0, 14, 1, '', '2015-02-03 17:55:59'),
	(106, '0', 'AAAAAAAAAAAAAAAA', 'PÇ', 'A', 'A', 'a', 'a', '4.1.02.09', 'a', '', '0', 0, 13, 2, '', '2015-02-13 16:35:46'),
	(107, '0', 'MOUSE PRETO', 'PC', 'MICROSOFT', 'MICROSOFT', '10992', '10.03', '8.9.99.22', 'administracao', '', '3', 0, 13, 1, '', '2015-02-13 17:25:29'),
	(108, '0', '33333', '3333', 'A', 'A', '3', '33.33', '3.3.33.33', '33', '3333', '0', 0, 13, 1, '', '2015-02-13 17:28:45'),
	(109, '0', 'CANETA PRETA', 'PC', '1111', 'MICROSOFT', '33939939', '99.99', '9.9.99.99', '999', '', '3', 0, 13, 1, '', '2015-02-13 17:40:47'),
	(110, '0', 'MOCHILA PARA NOTEBOOK', 'PÇ', 'DDDD', 'DDDD', '3333333', '22.22', '2.2.22.22', 'seeefsdfsa', 'ASDFASDFASDF', '1', 0, 13, 1, '', '2015-02-18 08:07:20'),
	(111, '0', 'SAPATO DE SEGURANCA', 'PC', 'ADMINISTRACAO', 'FERRACINI', '33', '90.99', '9.0.10.10', 'SEG TRB', 'MARROM', '3', 0, 13, 1, '', '2015-02-19 16:29:33');
/*!40000 ALTER TABLE `solicitacao` ENABLE KEYS */;


-- Copiando estrutura para tabela produtos.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `setor` varchar(45) DEFAULT NULL,
  `ramal` varchar(45) DEFAULT NULL,
  `login` varchar(60) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `nivelacesso` varchar(45) DEFAULT NULL,
  `ativo` char(1) DEFAULT 'S',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela produtos.usuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
REPLACE INTO `usuario` (`id`, `nome`, `email`, `setor`, `ramal`, `login`, `senha`, `nivelacesso`, `ativo`) VALUES
	(13, 'Ricardo Bras', 'ricardo@cooper-rubi.com.br', 'ti', '6014', 'ricardo.bras', 'ce20e76095cd23c1e38c44075b283999', 'Cadastro', 'S'),
	(14, 'Wesley Alves', 'wesley@cooper-rubi.com.br', 'TI', '6013', 'wesley.alves', 'ce20e76095cd23c1e38c44075b283999', 'Solicitante', 'S'),
	(15, 'df', 'fd', 'df', 'dfd', 'fd', '36eba1e1e343279857ea7f69a597324e', 'Solicitante', 'S');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


-- Copiando estrutura para tabela produtos.usuario_empresa
CREATE TABLE IF NOT EXISTS `usuario_empresa` (
  `usuario_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`empresa_id`),
  KEY `fk_usuario_has_empresa_empresa1` (`empresa_id`),
  KEY `fk_usuario_has_empresa_usuario` (`usuario_id`),
  CONSTRAINT `fk_usuario_has_empresa_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_empresa_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela produtos.usuario_empresa: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_empresa` DISABLE KEYS */;
REPLACE INTO `usuario_empresa` (`usuario_id`, `empresa_id`) VALUES
	(13, 1),
	(14, 1),
	(13, 2);
/*!40000 ALTER TABLE `usuario_empresa` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
