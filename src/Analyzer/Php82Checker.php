<?php

declare(strict_types=1);

namespace PHPModernizer\Analyzer;

use PHPModernizer\Issue\Issue;
use PHPModernizer\Issue\Severity;

final class Php82Checker implements AnalyzerInterface
{
    /**
     * PHP compatibility rules.
     */
    private array $rules = [

        'mysql_connect' => [
            'rule' => 'PHP.REMOVED.MYSQL_CONNECT',
            'severity' => Severity::ERROR,
            'message' => 'mysql_connect() was removed in PHP 7.0',
            'suggestion' => 'Use PDO or mysqli'
        ],

        'mysql_query' => [
            'rule' => 'PHP.REMOVED.MYSQL_QUERY',
            'severity' => Severity::ERROR,
            'message' => 'mysql_query() was removed in PHP 7.0',
            'suggestion' => 'Use mysqli_query or PDO'
        ],

        'ereg' => [
            'rule' => 'PHP.REMOVED.EREG',
            'severity' => Severity::ERROR,
            'message' => 'ereg() was removed in PHP 7.0',
            'suggestion' => 'Use preg_match'
        ],

        'eregi' => [
            'rule' => 'PHP.REMOVED.EREGI',
            'severity' => Severity::ERROR,
            'message' => 'eregi() was removed in PHP 7.0',
            'suggestion' => 'Use preg_match with modifiers'
        ],

        'create_function' => [
            'rule' => 'PHP.REMOVED.CREATE_FUNCTION',
            'severity' => Severity::ERROR,
            'message' => 'create_function() was removed in PHP 8.0',
            'suggestion' => 'Use anonymous functions'
        ],

        'each' => [
            'rule' => 'PHP.REMOVED.EACH',
            'severity' => Severity::ERROR,
            'message' => 'each() was removed in PHP 8.0',
            'suggestion' => 'Use foreach'
        ],

        'session_register' => [
            'rule' => 'PHP.REMOVED.SESSION_REGISTER',
            'severity' => Severity::ERROR,
            'message' => 'session_register() was removed',
            'suggestion' => 'Use $_SESSION'
        ],
    ];


    /**
     * Analyze PHP source lines.
     *
     * @param array<int,string> $lines
     *
     * @return array<int,Issue>
     */
    public function analyze(
        string $file,
        array $lines
    ): array {

        $issues = [];


        foreach ($lines as $lineNumber => $line) {

            foreach ($this->rules as $function => $rule) {

                if (
                    stripos(
                        $line,
                        $function . '('
                    ) !== false
                ) {

                    $issues[] = new Issue(

                        rule: $rule['rule'],

                        severity: $rule['severity'],

                        message: $rule['message'],

                        file: $file,

                        line: $lineNumber + 1,

                        column: 1,

                        code: $function,

                        context: [
                            'suggestion' =>
                                $rule['suggestion']
                        ]
                    );
                }
            }
        }


        return $issues;
    }
}