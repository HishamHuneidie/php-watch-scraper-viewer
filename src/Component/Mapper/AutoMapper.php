<?php

namespace App\Component\Mapper;

use App\Common\Mapper\MapperException;
use App\Component\Attribute\Mapper;
use ReflectionClass;
use ReflectionException;

#[Mapper('*', '*')]
final class AutoMapper extends AbstractMapper
{
    /**
     * @inheritDoc
     */
    public function toEntity(object $dto): object
    {
        // TODO: Implement toEntity() method.
    }

    /**
     * @inheritDoc
     */
    public function fromEntity(object $entity): object
    {
        // TODO: Implement fromEntity() method.
    }

}