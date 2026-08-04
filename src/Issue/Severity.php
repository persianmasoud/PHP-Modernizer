<?php

declare(strict_types=1);

namespace PHPModernizer\Issue;

enum Severity: string
{
    case INFO = 'info';
    case WARNING = 'warning';
    case ERROR = 'error';
    case CRITICAL = 'critical';
}