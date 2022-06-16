# Backtrack Studio

   Backtrack Studio é um startup musical, oferecendo uma estrutura completa e robusta de um dashboard administrativo, desenvolvido em PHP, PHP Twig, JS e outros. Base do banco de dados foi utilizado o PDO SQLite. Foi construído no padrão MVC orientado a objetos. Como base foi utilizado o microframework MDMVC, desenvolvido por Maycon de Moraes.

## Bibliotecas, frameworks e outros

<p align="center">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img alt="Twig" src="https://img.shields.io/badge/Twig Symfony-%236DB33F?style=for-the-badge&logo=symfony&logoColor=white"/>
  <img alt="CSS" src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white"/>
  <img alt="SQLite" src="https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white"/>
  <img alt="JavaScript"  src="https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E"/>
  <img alt="JavaScript"  src="https://img.shields.io/badge/jquery-%230769AD.svg?style=for-the-badge&logo=jquery&logoColor=white"/>
</p>

## Vídeo de apresentação

[![Vídeo](https://i.imgur.com/ICF7Nmv.png)](https://youtu.be/89yqYrP3Mzw)

## Principais funções

- Visualização de tabelas dinâmicamente.
- CRUDS, modo visual, altera e deleta os dados do banco.
- Metas, consulta SQL do último mês e monta um gráfico de redondo dinâmico.
- Sistema de SESSION, segurança.
- Templates com Twig dinâmicos.
- Completamente orientado a objetos.

## Passo a passo para executar o programa

1. Clone o repositorio: `git clone https://github.com/lobofoltran/backtrack-studio`
2. Entre da pasta: `cd backtrack-studio`
3. Rode o comando: `composer install`
4. Utilize o servidor de desenvolvimento do PHP: `php -S localhost:80`
5. Abra o navegador no endereço `http://localhost:80`

## Banco de dados (SQLite)

- Código para implementação do banco de dados

1. Registro
```
CREATE TABLE IF NOT EXISTS `registro` (
  `id_registro` INTEGER NOT NULL DEFAULT '',
  `id_registro_tabela` INTEGER NOT NULL DEFAULT '',
  `id_registro_admin` INTEGER NOT NULL DEFAULT '',
  `acao_registro` char(200) NOT NULL DEFAULT '',
  `data_registro` date DEFAULT '',
  PRIMARY KEY (`id_registro` AUTOINCREMENT)
);
```
2. Cliente
```
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
```
3. Meta
```
CREATE TABLE IF NOT EXISTS `meta` (
  `id_meta` INTEGER NOT NULL DEFAULT '',
  `meta_ganhos` INTEGER NOT NULL DEFAULT '',
  `meta_agend` INTEGER NOT NULL DEFAULT '',
  `meta_cliente` INTEGER NOT NULL DEFAULT '',
  PRIMARY KEY (`id_meta`)
);
```
4. Sala
```
CREATE TABLE IF NOT EXISTS `sala` (
  `id_sala` INTEGER NOT NULL,
  `horario_disp1` datetime NOT NULL DEFAULT '',
  `horario_disp2` datetime NOT NULL DEFAULT '',
  `horario_disp3` datetime NOT NULL DEFAULT '',
  `valor_ensaio` INTEGER NOT NULL DEFAULT '',
  `valor_gravacao` INTEGER NOT NULL DEFAULT '',
  PRIMARY KEY (`id_sala`)
);
```
5. Equipamento
```
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
```
6. Agenda
```
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
```

## Encontre-me em
<p align="center">
  <a href= "https://www.linkedin.com/in/gustavo-lobo" target="_blank"><img src="https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white"</a>
  <a href= "mailto:gustavoqe.75@gmail.com" target="_blank"><img alt="Gmail" src="https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white"/></a>
</p>

Desenvolvido por [Gustavo Lobo](https://br.linkedin.com/in/gustavo-lobo "Gustavo Lobo"), inspirado no MDMVC desenvolvido por [Maycon de Moraes](https://br.linkedin.com/in/maycon-de-moraes-a76240116 "Maycon de Moraes").