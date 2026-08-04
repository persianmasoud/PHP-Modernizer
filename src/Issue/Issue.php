<?php

declare(strict_types=1);

namespace PHPModernizer\Issue;

final readonly class Issue
{
    public function __construct(
        public string $rule,
        public Severity $severity,
        public string $message,
        public string $file,
        public int $line,
        public int $column,
        public string $code,
        public array $context = []
    ) {
    }

    public function toArray(): array
    {
        return [
            'rule' => $this->rule,
            'severity' => $this->severity->value,
            'message' => $this->message,
            'file' => $this->file,
            'line' => $this->line,
            'column' => $this->column,
            'code' => $this->code,
            'context' => $this->context,
        ];
    }
}