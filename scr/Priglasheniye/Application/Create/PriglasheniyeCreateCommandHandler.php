<?php

declare(strict_types=1);

namespace Spisok\Priglasheniye\Application\Create;

use Shared\Domain\Bus\Command\CommandHandler;
use Spisok\Priglasheniye\Repositories\PriglasheniyeRepositoryInterface;

class PriglasheniyeCreateCommandHandler implements CommandHandler
{
    public function __construct(
        private PriglasheniyeRepositoryInterface $repository
    )
    {
    }

    public function __invoke(PriglasheniyeApplicationCommand $command): void
    {
        $this->repository->create($command->getPriglasheniyeEntity());
    }
}
