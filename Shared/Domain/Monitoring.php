<?php

declare(strict_types=1);

namespace Shared\Domain;

interface Monitoring
{
    public function incrementCounter(int $times): void;

    public function incrementGauge(int $times): void;

    public function decrementGauge(int $times): void;

    public function setGauge(int $value): void;

    /**
     * @param array<int,string> $labels
     */
    public function observeHistogram(int $value, array $labels = []): void;
}
