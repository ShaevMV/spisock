<?php

declare(strict_types=1);

namespace Spisok\Priglasheniye\Domain;

use Shared\Domain\Entity\AbstractionEntity;
use Shared\Domain\Exceptions\ValueObjectException;
use Shared\Domain\ValueObject\EmailValueObject;
use Shared\Domain\ValueObject\Status;
use Shared\Domain\ValueObject\Uuid;

class PriglasheniyeEntity extends AbstractionEntity
{
    protected Status $status;

    /**
     * @param array<int, UchasnikValueObject> $uchasniki
     */
    public function __construct(
        protected Uuid               $id,
        protected Uuid               $curatorId,
        protected ProjectValueObject $project,
        protected EmailValueObject   $email,
        protected array              $uchasniki,
        ?Status                      $status = null,
    )
    {
        if (is_null($status)) {
            $this->status = new Status(Status::NEW);
        }
    }


    public static function fromState(array $data): self
    {
        if (empty($data['list'])) {
            throw new ValueObjectException('В заявке нет участников!');
        }

        $rawList = explode("\r\n", (string)$data['list']);
        $uchasniki = [];
        foreach ($rawList as $datum) {
            $uchasniki[] = new UchasnikValueObject($datum);
        }

        $status = isset($data['status']) ? new Status((string)$data['status']) : null;

        return new self(
            new Uuid((string)$data['id']),
            new Uuid((string)$data['curator_id']),
            new ProjectValueObject((string)$data['project']),
            new EmailValueObject((string)$data['email']),
            $uchasniki,
            $status
        );
    }
}
