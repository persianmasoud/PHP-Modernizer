<?php

declare(strict_types=1);

namespace PHPModernizer\Rule;

enum RuleSeverity: string
{
    case Critical = 'critical';
    case High = 'high';
    case Medium = 'medium';
    case Low = 'low';
    case Info = 'info';
}