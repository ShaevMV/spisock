<?php

declare(strict_types=1);

namespace Spisok\Priglasheniye\Domain;

use DomainException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Shared\Domain\Aggregate\AggregateRoot;
use Spisok\Priglasheniye\Application\Create\PriglasheniyeCreateCommand;
use Spisok\Priglasheniye\Application\Create\PriglasheniyeCreateCommandHandler;
use Throwable;

class PriglasheniyeAggregate extends AggregateRoot
{
    public function __construct(
        private PriglasheniyeEntity $entity
    )
    {
        parent::__construct();
    }

    public function getEntity(): PriglasheniyeEntity
    {
        return $this->entity;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function getCommandRole(): array
    {
        /** @var PriglasheniyeCreateCommandHandler $priglasheniyeCreateCommandHandler */
        $priglasheniyeCreateCommandHandler = $this->application->get(PriglasheniyeCreateCommandHandler::class);

        return [
            PriglasheniyeCreateCommand::class => $priglasheniyeCreateCommandHandler,
        ];
    }

    public static function create(PriglasheniyeEntity $priglasheniyeEntity): self
    {
        try {
            $self = (new self($priglasheniyeEntity));
            $self->inMemorySymfonyCommandBus->dispatch(new PriglasheniyeCreateCommand($priglasheniyeEntity));
        } catch (Throwable $exception) {
            throw new DomainException($exception->getMessage());
        }

        return $self;
    }
}
