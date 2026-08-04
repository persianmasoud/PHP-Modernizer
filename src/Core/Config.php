<?php

declare(strict_types=1);

namespace PHPModernizer\Core;

/**
 * Configuration Manager
 *
 * Handles application configuration values.
 */
final class Config
{
    /**
     * Configuration values.
     */
    private array $values = [];

    /**
     * Create configuration instance.
     */
    public function __construct(array $values = [])
    {
        $this->values = $values;
    }

    /**
     * Get configuration value.
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->values[$key] ?? $default;
    }

    /**
     * Set configuration value.
     */
    public function set(string $key, mixed $value): void
    {
        $this->values[$key] = $value;
    }

    /**
     * Check if configuration exists.
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->values);
    }

    /**
     * Return all configuration values.
     */
    public function all(): array
    {
        return $this->values;
    }
}