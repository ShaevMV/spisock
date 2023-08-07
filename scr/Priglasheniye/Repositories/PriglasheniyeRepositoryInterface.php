<?php
declare(strict_types=1);

namespace Spisok\Priglasheniye\Repositories;

use Spisok\Priglasheniye\Domain\PriglasheniyeEntity;

interface PriglasheniyeRepositoryInterface
{
    public function create(PriglasheniyeEntity $entity): bool;
}
