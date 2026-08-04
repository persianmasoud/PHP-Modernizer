<?php

declare(strict_types=1);

namespace PHPModernizer\Scanner;

use PHPModernizer\Core\Logger;

/**
 * Project Scanner
 *
 * Scans a PHP project and collects basic information.
 */
final class ProjectScanner
{
    /**
     * Project path.
     */
    private string $path;

    /**
     * Logger instance.
     */
    private ?Logger $logger;

    /**
     * Scan result.
     */
    private array $result = [];


    /**
     * Create scanner.
     */
    public function __construct(
        string $path,
        ?Logger $logger = null
    ) {
        $this->path = rtrim($path, DIRECTORY_SEPARATOR);
        $this->logger = $logger;
    }


    /**
     * Execute scan.
     */
    public function scan(): array
    {
        if (!is_dir($this->path)) {
            throw new \RuntimeException(
                "Project path does not exist: {$this->path}"
            );
        }

        $this->logger?->info(
            "Scanning project: {$this->path}"
        );


        $files = $this->getFiles();


        $phpFiles = array_filter(
            $files,
            fn(string $file): bool =>
                strtolower(pathinfo($file, PATHINFO_EXTENSION)) === 'php'
        );


        $this->result = [
            'project_path' => $this->path,
            'total_files' => count($files),
            'php_files' => count($phpFiles),
            'scanned_at' => date('Y-m-d H:i:s'),
        ];


        $this->logger?->info(
            "Scan completed. PHP files: " . count($phpFiles)
        );


        return $this->result;
    }


    /**
     * Get all project files.
     */
    private function getFiles(): array
    {
        $files = [];


        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $this->path,
                \FilesystemIterator::SKIP_DOTS
            )
        );


        foreach ($iterator as $file) {

            if ($file->isFile()) {
                $files[] = $file->getPathname();
            }

        }


        return $files;
    }
}
