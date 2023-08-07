<?php

declare(strict_types=1);

namespace Spisok\Priglasheniye\Application\Create;

use Shared\Domain\Bus\Command\Command;
use Shared\Domain\Bus\Command\CommandHandler;
use Spisok\Priglasheniye\Domain\PriglasheniyeEntity;

class PriglasheniyeCreateCommand implements Command
{
    public function __construct(
        private PriglasheniyeEntity $priglasheniyeEntity
    )
    {
    }

    public function getPriglasheniyeEntity(): PriglasheniyeEntity
    {
        return $this->priglasheniyeEntity;
    }
}
