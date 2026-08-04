<?php

declare(strict_types=1);

namespace PHPModernizer\Core;

/**
 * Log levels.
 */
enum LogLevel: string
{
    case DEBUG = 'DEBUG';
    case INFO = 'INFO';
    case NOTICE = 'NOTICE';
    case WARNING = 'WARNING';
    case ERROR = 'ERROR';
    case CRITICAL = 'CRITICAL';
}