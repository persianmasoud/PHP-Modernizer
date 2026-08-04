<?php
/**
 * PHP Modernizer
 * PHP 8.2 Compatibility Scanner v0.2
 *
 * Author: Masoud F.
 *
 * This tool scans legacy PHP files and detects
 * deprecated/removed PHP functions.
 */

if ($argc < 2) {
    echo "Usage: php php82_checker.php <project_path>\n";
    exit(1);
}

$projectPath = $argv[1];

if (!is_dir($projectPath)) {
    echo "Error: Directory not found: $projectPath\n";
    exit(1);
}


/*
 * Functions removed or deprecated in PHP 8.x
 */
$rules = [

    'mysql_connect' => [
        'status' => 'Removed PHP 7',
        'suggestion' => 'Use mysqli or PDO'
    ],

    'mysql_query' => [
        'status' => 'Removed PHP 7',
        'suggestion' => 'Use mysqli_query or PDO'
    ],

    'ereg' => [
        'status' => 'Removed PHP 7',
        'suggestion' => 'Use preg_match'
    ],

    'eregi' => [
        'status' => 'Removed PHP 7',
        'suggestion' => 'Use preg_match with modifiers'
    ],

    'create_function' => [
        'status' => 'Removed PHP 8',
        'suggestion' => 'Use anonymous functions'
    ],

    'each' => [
        'status' => 'Removed PHP 8',
        'suggestion' => 'Use foreach'
    ],

    'session_register' => [
        'status' => 'Removed',
        'suggestion' => 'Use $_SESSION'
    ]
];


echo "\n";
echo "=====================================\n";
echo " PHP Modernizer Scanner v0.2\n";
echo " PHP 8.2 Compatibility Report\n";
echo "=====================================\n\n";


$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($projectPath)
);


foreach ($files as $file) {

    if ($file->isDir()) {
        continue;
    }

    if (pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
        continue;
    }


    $content = file_get_contents($file);

$lines = explode("\n", $content);

foreach ($rules as $function => $info) {

    foreach ($lines as $lineNumber => $line) {

        if (stripos($line, $function . '(') !== false) {

            echo "File: " . $file . "\n";
            echo "Line: " . ($lineNumber + 1) . "\n";
            echo "Found: " . $function . "()\n";
            echo "Status: " . $info['status'] . "\n";
            echo "Suggestion: " . $info['suggestion'] . "\n";
            echo "-------------------------------------\n";
        }
    }
}
}

echo "\nScan completed.\n";