<?php

# Carrega o autoload.
require_once 'vendor/autoload.php';

# Converte a URL em um caminho absoluto.
$uri = $_SERVER['REQUEST_URI'];
$selfUri = $_SERVER['PHP_SELF'];
$uri = rawurldecode($uri);
$base = \explode(basename(__FILE__), $selfUri);

$baseUrlPath = implode('',$base);

$GLOBALS['baseUrlPath'] = $baseUrlPath;

# Carega os arquivos básicos de inicialização da aplicação.
require_once __DIR__ . '/src/Config/bootstrap.php';
