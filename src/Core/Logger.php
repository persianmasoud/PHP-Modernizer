<?php

declare(strict_types=1);

namespace PHPModernizer\Core;

/**
 * Logger
 *
 * Records application events.
 */
final class Logger
{
    /**
     * @var LogEntry[]
     */
    private array $logs = [];

    public function debug(
        string $message,
        ?string $file = null,
        ?int $line = null,
        array $context = []
    ): void {
        $this->add(
            LogLevel::DEBUG,
            $message,
            $file,
            $line,
            $context
        );
    }

    public function info(
        string $message,
        ?string $file = null,
        ?int $line = null,
        array $context = []
    ): void {
        $this->add(
            LogLevel::INFO,
            $message,
            $file,
            $line,
            $context
        );
    }

    public function warning(
        string $message,
        ?string $file = null,
        ?int $line = null,
        array $context = []
    ): void {
        $this->add(
            LogLevel::WARNING,
            $message,
            $file,
            $line,
            $context
        );
    }

    public function error(
        string $message,
        ?string $file = null,
        ?int $line = null,
        array $context = []
    ): void {
        $this->add(
            LogLevel::ERROR,
            $message,
            $file,
            $line,
            $context
        );
    }

    public function critical(
        string $message,
        ?string $file = null,
        ?int $line = null,
        array $context = []
    ): void {
        $this->add(
            LogLevel::CRITICAL,
            $message,
            $file,
            $line,
            $context
        );
    }

    private function add(
        LogLevel $level,
        string $message,
        ?string $file,
        ?int $line,
        array $context
    ): void {

        $this->logs[] = new LogEntry(
            timestamp: date('Y-m-d H:i:s'),
            level: $level,
            message: $message,
            file: $file,
            line: $line,
            context: $context
        );

    }

    /**
     * @return LogEntry[]
     */
    public function all(): array
    {
        return $this->logs;
    }

    public function count(): int
    {
        return count($this->logs);
    }

    public function clear(): void
    {
        $this->logs = [];
    }
}