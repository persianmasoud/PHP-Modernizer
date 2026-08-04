<?php

declare(strict_types=1);

namespace PHPModernizer\Scanner;

use RuntimeException;

final class PhpFileScanner
{
    /**
     * Read a PHP file.
     *
     * @return array<int,string>
     */
    public function scan(string $file): array
    {
        if (!is_file($file)) {
            throw new RuntimeException(
                "File not found: {$file}"
            );
        }

        $lines = file(
            $file,
            FILE_IGNORE_NEW_LINES
        );

        if ($lines === false) {
            throw new RuntimeException(
                "Unable to read file: {$file}"
            );
        }

        return $lines;
    }
}