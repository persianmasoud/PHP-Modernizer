<?php

declare(strict_types=1);

namespace PHPModernizer\Rule;

interface RuleInterface
{
    public function getId(): string;

    public function getName(): string;

    public function getCategory(): RuleCategory;

    public function getSeverity(): RuleSeverity;

    public function check(array $context): ?RuleResult;
}