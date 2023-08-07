<?php

namespace Shared\Domain\ValueObject;

interface EntityDataInterface
{
    /**
     * Преобразовать значение сущности в строку
     */
    public function __toString(): string;

    /**
     * Вывести сущность в виде json строки
     *
     * @return string
     */
    public function toJson(): string;
}
