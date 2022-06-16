-- DUMP INICIAL BACKTRACK STUDIO DB

CREATE TABLE IF NOT EXISTS `registro` (
  `id_registro` INTEGER NOT NULL DEFAULT '',
  `id_registro_tabela` INTEGER NOT NULL DEFAULT '',
  `id_registro_admin` INTEGER NOT NULL DEFAULT '',
  `acao_registro` char(200) NOT NULL DEFAULT '',
  `data_registro` date DEFAULT '',
  PRIMARY KEY (`id_registro` AUTOINCREMENT)
);

-- INSERT INTO `registro` (`id_registro`, `id_registro_tabela`, `id_registro_admin`, `acao_registro`, `data_registro`) VALUES
-- (1, 1, 1, 'adicionou um novo cliente', datetime('now', 'localtime'));

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` INTEGER NOT NULL,
  `perm` char(20) NOT NULL DEFAULT '',
  `nome` char(100) NOT NULL DEFAULT '',
  `rg` char(20) NOT NULL DEFAULT '',
  `cpf` char(20) NOT NULL DEFAULT '',
  `dataNasc` date NOT NULL DEFAULT '',
  `email` char(100) NOT NULL DEFAULT '',
  `cep` char(20) NOT NULL DEFAULT '',
  `rua` char(200) NOT NULL DEFAULT '',
  `numero` int NOT NULL DEFAULT '',
  `bairro` char(100) NOT NULL DEFAULT '',
  `cidade` char(100) NOT NULL DEFAULT '',
  `uf` char(2) NOT NULL DEFAULT '',
  `senha` char(100) NOT NULL  DEFAULT '',
  PRIMARY KEY (`id_cliente` AUTOINCREMENT)
);

-- INSERT INTO `cliente` (`id_cliente`, `perm`, `nome`, `rg`, `cpf`, `dataNasc`, `email`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `uf`, `senha`) VALUES
-- (1, 'Administrador', 'Gustavo Lobo', '135520667', '13180902965', '20030411', 'gustavoqe.75@gmail.com', '81450480', 'Rua Jair Coelho', 434, 'Cidade Industrial', 'Curitiba', 'PR', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

CREATE TABLE IF NOT EXISTS `meta` (
  `id_meta` INTEGER NOT NULL DEFAULT '',
  `meta_ganhos` INTEGER NOT NULL DEFAULT '',
  `meta_agend` INTEGER NOT NULL DEFAULT '',
  `meta_cliente` INTEGER NOT NULL DEFAULT '',
  PRIMARY KEY (`id_meta`)
);

-- INSERT INTO `meta` (`id_meta`, `meta_ganhos`, `meta_agend`, `meta_cliente`) VALUES
-- (1, 0, 0, 0);

CREATE TABLE IF NOT EXISTS `sala` (
  `id_sala` INTEGER NOT NULL,
  `horario_disp1` datetime NOT NULL DEFAULT '',
  `horario_disp2` datetime NOT NULL DEFAULT '',
  `horario_disp3` datetime NOT NULL DEFAULT '',
  `valor_ensaio` INTEGER NOT NULL DEFAULT '',
  `valor_gravacao` INTEGER NOT NULL DEFAULT '',
  PRIMARY KEY (`id_sala`)
);

CREATE TABLE IF NOT EXISTS `equipamento` (
  `id_equipamento` INTEGER NOT NULL,
  `nome` char(100) NOT NULL DEFAULT '',
  `marca` char(100) NOT NULL DEFAULT '',
  `modelo` char(100) NOT NULL DEFAULT '',
  `tipo` char(100) NOT NULL DEFAULT '',
  `id_sala` INTEGER NOT NULL DEFAULT '',
  PRIMARY KEY (`id_equipamento` AUTOINCREMENT),
  CONSTRAINT `fk_sala_id`
    FOREIGN KEY (`id_sala`)
    REFERENCES `sala` (`id_sala`)
);

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` INTEGER NOT NULL,
  `data` date NOT NULL DEFAULT '',
  `horario` datetime NOT NULL DEFAULT '',
  `tipo` char(20) NOT NULL DEFAULT '',
  `valor` INTEGER NOT NULL DEFAULT '',
  `forma_pag` char(100) NOT NULL DEFAULT '',
  `id_cliente` INTEGER NOT NULL DEFAULT '',
  `id_sala` INTEGER NOT NULL DEFAULT '',
  PRIMARY KEY (`id_agenda` AUTOINCREMENT),
  CONSTRAINT `fk_id_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `cliente` (`id_cliente`)
  CONSTRAINT `fk_id_sala`
    FOREIGN KEY (`id_sala`)
    REFERENCES `sala` (`id_sala`)
);