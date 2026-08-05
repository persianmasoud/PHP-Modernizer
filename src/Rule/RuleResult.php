<?php

declare(strict_types=1);

namespace PHPModernizer\Rule;

final class RuleResult
{
    public function __construct(
        private readonly string $message,
        private readonly array $evidence = [],
        private readonly ?string $recommendation = null
    ) {
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getEvidence(): array
    {
        return $this->evidence;
    }

    public function getRecommendation(): ?string
    {
        return $this->recommendation;
    }
}