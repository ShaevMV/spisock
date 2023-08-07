<?php

declare(strict_types=1);

namespace Shared\Domain\Aggregate;

use Illuminate\Contracts\Foundation\Application;
use Shared\Domain\Bus\Command\Command;
use Shared\Domain\Bus\Command\CommandHandler;
use Shared\Domain\Bus\EventJobs\DomainEvent;
use Shared\Domain\Bus\Query\Query;
use Shared\Domain\Bus\Query\QueryHandler;
use Shared\Infrastructure\Bus\Command\InMemorySymfonyCommandBus;
use Shared\Infrastructure\Bus\Query\InMemorySymfonyQueryBus;

abstract class AggregateRoot
{
    protected InMemorySymfonyQueryBus $inMemorySymfonyQueryBus;

    protected InMemorySymfonyCommandBus $inMemorySymfonyCommandBus;
    private array $domainEvents = [];

    protected Application $application;

    final public function pullDomainEvents(): array
    {
        $domainEvents       = $this->domainEvents;
        $this->domainEvents = [];

        return $domainEvents;
    }

    final protected function record(DomainEvent $domainEvent): void
    {
        $this->domainEvents[] = $domainEvent;
    }

    public function __construct()
    {
        $this->application = app();

        if(!empty($this->getQueryRole())) {
            $this->inMemorySymfonyQueryBus = new InMemorySymfonyQueryBus($this->getQueryRole());
        }

        if(!empty($this->getCommandRole())) {
            $this->inMemorySymfonyCommandBus = new InMemorySymfonyCommandBus($this->getCommandRole());
        }
    }

    /**
     * @return array<class-string<Query>, QueryHandler>
     */
    protected function getQueryRole(): array
    {
        return [];
    }

    /**
     * @return array<class-string<Command>, CommandHandler>
     */
    protected function getCommandRole(): array
    {
        return [];
    }
}
