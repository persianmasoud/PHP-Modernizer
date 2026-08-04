<?php

declare(strict_types=1);

namespace PHPModernizer\Core;

/**
 * Environment Detector
 *
 * Provides information about the current execution environment.
 *
 * Responsible only for detection.
 * It does not modify system configuration.
 */
final class Environment
{
    /**
     * Detected environment data.
     */
    private array $data = [];

    /**
     * Create environment instance.
     */
    public function __construct()
    {
        $this->detect();
    }

    /**
     * Detect current environment information.
     */
    private function detect(): void
    {
        $this->data = [
            'php_version' => PHP_VERSION,

            'php_sapi' => PHP_SAPI,

            'operating_system' => PHP_OS_FAMILY,

            'system' => php_uname(),

            'memory_limit' => ini_get('memory_limit'),

            'max_execution_time' => ini_get('max_execution_time'),

            'upload_max_filesize' => ini_get('upload_max_filesize'),

            'post_max_size' => ini_get('post_max_size'),

            'current_directory' => getcwd(),

            'loaded_extensions' => get_loaded_extensions(),
        ];
    }

    /**
     * Get PHP version.
     */
    public function getPhpVersion(): string
    {
        return $this->data['php_version'];
    }

    /**
     * Get operating system family.
     */
    public function getOperatingSystem(): string
    {
        return $this->data['operating_system'];
    }

    /**
     * Get PHP SAPI.
     */
    public function getSapi(): string
    {
        return $this->data['php_sapi'];
    }

    /**
     * Get memory limit.
     */
    public function getMemoryLimit(): string|false
    {
        return $this->data['memory_limit'];
    }

    /**
     * Get maximum execution time.
     */
    public function getMaxExecutionTime(): string|false
    {
        return $this->data['max_execution_time'];
    }

    /**
     * Get upload maximum size.
     */
    public function getUploadMaxFilesize(): string|false
    {
        return $this->data['upload_max_filesize'];
    }

    /**
     * Get post maximum size.
     */
    public function getPostMaxSize(): string|false
    {
        return $this->data['post_max_size'];
    }

    /**
     * Check PHP extension availability.
     */
    public function hasExtension(string $extension): bool
    {
        return extension_loaded($extension);
    }

    /**
     * Get all detected information.
     */
    public function all(): array
    {
        return $this->data;
    }
}