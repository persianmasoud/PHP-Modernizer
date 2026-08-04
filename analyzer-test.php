<?php

require __DIR__ . '/vendor/autoload.php';

use PHPModernizer\Scanner\PhpFileScanner;
use PHPModernizer\Analyzer\Php82Checker;


$file = __DIR__ . '/Tests/Sample_Project/old.php';


$fileScanner = new PhpFileScanner();

$lines = $fileScanner->scan($file);


$checker = new Php82Checker();

$issues = $checker->analyze(
    $file,
    $lines
);


foreach ($issues as $issue) {

    print_r(
        $issue->toArray()
    );
}