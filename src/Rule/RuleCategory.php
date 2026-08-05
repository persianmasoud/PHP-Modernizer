<?php

declare(strict_types=1);

namespace PHPModernizer\Rule;

enum RuleCategory: string
{
    case Compatibility = 'compatibility';
    case Security = 'security';
    case Database = 'database';
    case Charset = 'charset';
    case Architecture = 'architecture';
    case Quality = 'quality';
}