<?php

require __DIR__ . '/vendor/autoload.php';

use PHPModernizer\Scanner\PhpFileScanner;
use PHPModernizer\Analyzer\Php82Checker;
use PHPModernizer\Reporter\ReportGenerator;


$file = __DIR__ .
    '/Tests/Sample_Project/old.php';


$scanner = new PhpFileScanner();

$lines = $scanner->scan($file);


$checker = new Php82Checker();

$issues = $checker->analyze(
    $file,
    $lines
);


$reporter = new ReportGenerator();

echo $reporter->generate($issues);