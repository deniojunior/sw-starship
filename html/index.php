<?php
$autoloadFile = __DIR__ . '/../vendor/autoload.php';

if (!file_exists($autoloadFile)) {
    die("Nao foi possível encontrar '$autoloadFile'. Execute 'composer install' na pasta raíz da aplicação.");
}

require $autoloadFile;
require __DIR__ . '/../app/app.php';

session_name("swstarship");
session_start();

include __DIR__ . '/../app/router.php';

Router::start();