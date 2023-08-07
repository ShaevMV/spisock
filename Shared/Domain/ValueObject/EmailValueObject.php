<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

use Shared\Domain\Exceptions\ValueObjectException;

class EmailValueObject extends StringValueObject
{
    public function __construct(?string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new ValueObjectException("$value не email");
        }

        parent::__construct($value);
    }
}
