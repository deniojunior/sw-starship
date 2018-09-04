<?php
$includesPath = PATH_SEPARATOR . __DIR__ . '/../app';
$includesPath .= PATH_SEPARATOR . __DIR__ . '/../app/views';
$includesPath .= PATH_SEPARATOR . get_include_path();
set_include_path($includesPath);

require __DIR__ . '/../vendor/autoload.php';
