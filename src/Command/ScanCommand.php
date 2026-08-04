<?php

declare(strict_types=1);

namespace PHPModernizer\Command;

use PHPModernizer\Scanner\ProjectScanner;
use PHPModernizer\Scanner\PhpFileScanner;
use PHPModernizer\Analyzer\Php82Checker;
use PHPModernizer\Reporter\ReportGenerator;

final class ScanCommand implements CommandInterface
{
    public function execute(array $arguments): int
    {
        if (!isset($arguments[0])) {
            echo "Usage: scan <project_path>\n";

            return 1;
        }

        $projectPath = $arguments[0];

        $projectScanner = new ProjectScanner(
            $projectPath
        );

        $project = $projectScanner->scan();


        $fileScanner = new PhpFileScanner();

        $checker = new Php82Checker();

        $issues = [];


        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $projectPath,
                \FilesystemIterator::SKIP_DOTS
            )
        );


        foreach ($iterator as $file) {

            if (!$file->isFile()) {
                continue;
            }

            if (
                strtolower(
                    $file->getExtension()
                ) !== 'php'
            ) {
                continue;
            }


            $lines = $fileScanner->scan(
                $file->getPathname()
            );


            $issues = array_merge(
                $issues,
                $checker->analyze(
                    $file->getPathname(),
                    $lines
                )
            );
        }


        $reporter = new ReportGenerator();

        echo $reporter->generate($issues);

        return 0;
    }
}