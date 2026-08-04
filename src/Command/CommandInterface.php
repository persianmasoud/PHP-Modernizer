<?php

declare(strict_types=1);

namespace PHPModernizer\Command;

interface CommandInterface
{
    public function execute(array $arguments): int;
}