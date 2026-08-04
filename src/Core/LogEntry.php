<?php

declare(strict_types=1);

namespace PHPModernizer\Core;

/**
 * Log Entry
 */
final readonly class LogEntry
{
    public function __construct(
        public string $timestamp,
        public LogLevel $level,
        public string $message,
        public ?string $file = null,
        public ?int $line = null,
        public array $context = []
    ) {
    }

    public function toArray(): array
    {
        return [
            'timestamp' => $this->timestamp,
            'level' => $this->level->value,
            'message' => $this->message,
            'file' => $this->file,
            'line' => $this->line,
            'context' => $this->context,
        ];
    }
}