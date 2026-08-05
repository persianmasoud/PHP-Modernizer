<?php

declare(strict_types=1);

namespace PHPModernizer\Engine;

use PHPModernizer\Rule\RuleInterface;

final class RuleRegistry
{
    /**
     * @var RuleInterface[]
     */
    private array $rules = [];

    public function register(RuleInterface $rule): void
    {
        $this->rules[$rule->getId()] = $rule;
    }

    public function get(string $id): ?RuleInterface
    {
        return $this->rules[$id] ?? null;
    }

    /**
     * @return RuleInterface[]
     */
    public function all(): array
    {
        return $this->rules;
    }
}