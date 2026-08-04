<?php

declare(strict_types=1);

namespace PHPModernizer\Analyzer;

use PHPModernizer\Issue\Issue;

interface AnalyzerInterface
{
    /**
     * Analyze PHP source code.
     *
     * @param array<int,string> $lines
     *
     * @return array<int,Issue>
     */
    public function analyze(
        string $file,
        array $lines
    ): array;
}