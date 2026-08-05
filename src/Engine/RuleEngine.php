<?php

declare(strict_types=1);

namespace PHPModernizer\Engine;

use PHPModernizer\Rule\RuleResult;

final class RuleEngine
{
    public function __construct(
        private readonly RuleRegistry $registry
    ) {
    }

    /**
     * @return RuleResult[]
     */
    public function analyze(array $context): array
    {
        $results = [];

        foreach ($this->registry->all() as $rule) {
            $result = $rule->check($context);

            if ($result !== null) {
                $results[] = $result;
            }
        }

        return $results;
    }
}