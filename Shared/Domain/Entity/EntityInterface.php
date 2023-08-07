<?php

namespace Shared\Domain\Entity;

interface EntityInterface
{
    /**
     * Преобразовать значения сущности в массив
     * @return null|array<string, mixed>
     */
    public function toArray(): ?array;

    /**
     * @param string $name
     *
     * @return mixed|null
     */
    public function __get(string $name);

    /**
     * Вывести объект в виде json
     */
    public function toJson(): string;

    /**
     * @param array<string, mixed> $data
     * @return self
     */
    public static function fromState(array $data): EntityInterface;
}
