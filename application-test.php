<?php

require __DIR__ . '/vendor/autoload.php';

use PHPModernizer\Core\Application;

$app = new Application();

$app->boot();

$version = $app
    ->getContainer()
    ->get('version');

echo $version->getFullName();