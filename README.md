# desafio_leo

## Projeto criado com o intuito de apresentar o desafio técnico proposto pela empresa Leo Learning.

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

## Desenvolvedor

Nome: Wallace Silva de Oliveira

E-mail: rj.wallacesilva@hotmail.com

## Requisitos do Projeto

- Php >= 7.4
- Composer
- Base de dados criada no Mysql para abrir o projeto.

## Instalação

Baixe o projeto e instale suas respectivas dependências.

```sh
$ git clone https://github.com/wallaceti/desafio_leo.git
$ cd desafio_leo
$ composer install
```

> Note: Certifique-se de conceder as devidas permissões de leitura e escrita de acordo com seu sistema operacional.

Realize a instalação do banco de dados.

```sh
$ mysql -u <seu_usuario> -p  <base_de_dados> < database/install.sql
```

Abra o arquivo 'src/Config/Config.php' e configure o banco de dados no sistema.

```sh
define('DB_HOST', '127.0.0.1');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');
```

Execute o projeto em seu navegador.

```sh
http://127.0.0.1/desafio_leo/
```