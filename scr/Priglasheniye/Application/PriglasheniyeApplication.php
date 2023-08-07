<?php

declare(strict_types=1);

namespace Spisok\Priglasheniye\Application;

use App\Http\Requests\PriglasheniyeRequest;
use Shared\Domain\ValueObject\Uuid;
use Spisok\Priglasheniye\Domain\PriglasheniyeAggregate;
use Spisok\Priglasheniye\Domain\PriglasheniyeEntity;

class PriglasheniyeApplication
{
    public function create(PriglasheniyeRequest $request, Uuid $userId): void
    {
        PriglasheniyeAggregate::create(PriglasheniyeEntity::fromState(array_merge(
            $request->toArray(),
            [
                'curator_id' => $userId->value(),
                'id' => Uuid::random()->value(),
            ]
        )));
    }
}
