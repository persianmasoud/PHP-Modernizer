<?php

declare(strict_types=1);

namespace PHPModernizer\Core;

/**
 * Version Manager
 *
 * Handles PHP Modernizer version information.
 */
final class Version
{
    /**
     * Application name.
     */
    private const NAME = 'PHP Modernizer';

    /**
     * Current application version.
     */
    private const VERSION = '0.1.0';

    /**
     * Get application name.
     */
    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * Get application version.
     */
    public function getVersion(): string
    {
        return self::VERSION;
    }

    /**
     * Get full application identifier.
     */
    public function getFullName(): string
    {
        return self::NAME . ' ' . self::VERSION;
    }

    /**
     * Compare current version with another version.
     *
     * Returns:
     * -1 if current version is lower
     *  0 if versions are equal
     *  1 if current version is higher
     */
    public function compare(string $version): int
    {
        return version_compare(
            self::VERSION,
            $version
        );
    }

    /**
     * Check if current version is at least given version.
     */
    public function isAtLeast(string $version): bool
    {
        return $this->compare($version) >= 0;
    }
}