<?php

declare(strict_types=1);

namespace PHPModernizer\Core;

/**
 * PHP Modernizer Application Kernel
 *
 * Main entry point of the application.
 * Responsible for initializing and coordinating all modules.
 */
final class Application
{
    /**
     * Application version.
     */
    public const VERSION = '0.1.0-dev';


    /**
     * Service container.
     */
    private Container $container;


    /**
     * Create application instance.
     */
    public function __construct()
    {
        $this->container = new Container();
    }


    /**
     * Boot the application.
     */
    public function boot(): void
    {
        // Register core services

        $this->container->set(
            'version',
            new Version()
        );
    }


    /**
     * Run application.
     */
    public function run(): void
    {
        $this->boot();

        // Execute selected workflow
    }


    /**
     * Get service container.
     */
    public function getContainer(): Container
    {
        return $this->container;
    }
}