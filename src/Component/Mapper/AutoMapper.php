<?php

namespace CodeAnalyzer\Component\Mapper;

use CodeAnalyzer\Component\Attribute\Mapper;

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