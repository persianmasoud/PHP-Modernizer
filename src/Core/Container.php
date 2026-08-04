<?php

declare(strict_types=1);

namespace PHPModernizer\Core;

final class Container
{
    private array $services = [];


    public function set(
        string $name,
        object $service
    ): void {

        $this->services[$name] = $service;
    }


    public function get(
        string $name
    ): object {

        if (!isset($this->services[$name])) {

            throw new \RuntimeException(
                "Service not found: {$name}"
            );
        }

        return $this->services[$name];
    }


    public function has(
        string $name
    ): bool {

        return isset(
            $this->services[$name]
        );
    }
}