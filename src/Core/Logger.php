<?php

declare(strict_types=1);

namespace PHPModernizer\Core;

/**
 * Logger
 *
 * Simple logging system for PHP Modernizer.
 *
 * Records application events and messages.
 */
final class Logger
{
    /**
     * Log entries.
     */
    private array $logs = [];

    /**
     * Add log entry.
     */
    public function log(
        string $message,
        string $level = 'INFO'
    ): void {
        $this->logs[] = [
            'timestamp' => date('Y-m-d H:i:s'),
            'level' => strtoupper($level),
            'message' => $message,
        ];
    }

    /**
     * Add information message.
     */
    public function info(string $message): void
    {
        $this->log($message, 'INFO');
    }

    /**
     * Add warning message.
     */
    public function warning(string $message): void
    {
        $this->log($message, 'WARNING');
    }

    /**
     * Add error message.
     */
    public function error(string $message): void
    {
        $this->log($message, 'ERROR');
    }

    /**
     * Add debug message.
     */
    public function debug(string $message): void
    {
        $this->log($message, 'DEBUG');
    }

    /**
     * Get all logs.
     */
    public function all(): array
    {
        return $this->logs;
    }

    /**
     * Get logs count.
     */
    public function count(): int
    {
        return count($this->logs);
    }

    /**
     * Clear all logs.
     */
    public function clear(): void
    {
        $this->logs = [];
    }
}