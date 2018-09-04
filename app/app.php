<?php
$includesPath = PATH_SEPARATOR . __DIR__;
$includesPath .= PATH_SEPARATOR . __DIR__ . '/views';
$includesPath .= PATH_SEPARATOR . get_include_path();


set_include_path($includesPath);