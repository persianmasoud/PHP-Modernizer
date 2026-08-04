<?php

declare(strict_types=1);

namespace PHPModernizer\Reporter;

use PHPModernizer\Issue\Issue;

final class ReportGenerator
{
    /**
     * Generate console report.
     *
     * @param array<int,Issue> $issues
     */
    public function generate(
        array $issues
    ): string {

        $output = [];

        $output[] = '========================================';
        $output[] = ' PHP Modernizer Report';
        $output[] = '========================================';
        $output[] = '';

        $output[] = 'Issues Found: ' . count($issues);
        $output[] = '';


        foreach ($issues as $issue) {

            $output[] = '[' .
                strtoupper($issue->severity->value) .
                ']';

            $output[] =
                'Rule: ' . $issue->rule;

            $output[] =
                'File: ' . $issue->file;

            $output[] =
                'Line: ' . $issue->line;

            $output[] =
                'Message: ' . $issue->message;


            if (
                isset(
                    $issue->context['suggestion']
                )
            ) {
                $output[] =
                    'Suggestion: ' .
                    $issue->context['suggestion'];
            }


            $output[] =
                '----------------------------------------';
        }


        return implode(
            PHP_EOL,
            $output
        );
    }
}