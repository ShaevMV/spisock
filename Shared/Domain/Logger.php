<?php

declare(strict_types=1);

namespace Shared\Domain;

interface Logger
{
    /**
     * @param array<int, string> $context
     */
    public function info(string $message, array $context = []): void;

    /**
     * @param array<int, string> $context
     */
    public function warning(string $message, array $context = []): void;

    /**
     * @param array<int, string> $context
     */
    public function critical(string $message, array $context = []): void;
}
