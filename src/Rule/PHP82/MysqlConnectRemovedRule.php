<?php

declare(strict_types=1);

namespace PHPModernizer\Rule\PHP82;

use PHPModernizer\Rule\RuleCategory;
use PHPModernizer\Rule\RuleInterface;
use PHPModernizer\Rule\RuleResult;
use PHPModernizer\Rule\RuleSeverity;

final class MysqlConnectRemovedRule implements RuleInterface
{
    public function getId(): string
    {
        return 'PHP82-REMOVED-MYSQL-CONNECT';
    }

    public function getName(): string
    {
        return 'mysql_connect removed from PHP';
    }

    public function getCategory(): RuleCategory
    {
        return RuleCategory::Compatibility;
    }

    public function getSeverity(): RuleSeverity
    {
        return RuleSeverity::High;
    }

    public function check(array $context): ?RuleResult
    {
        $functions = $context['functions'] ?? [];

        if (in_array('mysql_connect', $functions, true)) {
            return new RuleResult(
                'Function mysql_connect was removed from PHP.',
                [
                    'function' => 'mysql_connect',
                    'target' => 'PHP 8.2'
                ],
                'Replace mysql_connect with mysqli or PDO.'
            );
        }

        return null;
    }
}