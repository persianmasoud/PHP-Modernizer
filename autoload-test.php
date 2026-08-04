<?php

require __DIR__ . '/vendor/autoload.php';

use PHPModernizer\Core\Version;

$version = new Version();

echo $version->getFullName();