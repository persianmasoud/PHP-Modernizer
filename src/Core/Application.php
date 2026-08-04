<?php

declare(strict_types=1);

namespace PHPModernizer\Core;

use PHPModernizer\Command\ScanCommand;

final class Application
{
    public const VERSION = '0.1.0-dev';

    private Container $container;


    public function __construct()
    {
        $this->container = new Container();
    }


    public function boot(): void
    {
        $this->container->set(
            'version',
            new Version()
        );
    }


    public function run(): void
    {
        $this->boot();

        global $argv;


        $command = $argv[1] ?? null;


        if ($command === 'scan') {

            $scanCommand = new ScanCommand();

            $exitCode = $scanCommand->execute(
                array_slice($argv, 2)
            );

            exit($exitCode);
        }


        echo "PHP Modernizer CLI\n";
        echo "Available commands:\n";
        echo "  scan <project_path>\n";
    }


    public function getContainer(): Container
    {
        return $this->container;
    }
}