<?php

require __DIR__ . '/vendor/autoload.php';

use PHPModernizer\Scanner\ProjectScanner;

$scanner = new ProjectScanner(
    __DIR__ . '/Tests/Sample_Project'
);

$result = $scanner->scan();

print_r($result);