<?php

namespace Spisok\Priglasheniye\Repositories;

use App\Models\Tickets;
use Nette\Utils\JsonException;
use Spisok\Priglasheniye\Domain\PriglasheniyeEntity;
use Spisok\Priglasheniye\Repositories\PriglasheniyeRepositoryInterface;

class InMemoryMySqlPriglasheniyeRepository implements PriglasheniyeRepositoryInterface
{

    public function __construct(
        private Tickets $tickets,
    )
    {
    }


    /**
     * @throws JsonException
     */
    public function create(PriglasheniyeEntity $entity): bool
    {
        return $this->tickets->load($entity->toArray())->save();
    }
}
