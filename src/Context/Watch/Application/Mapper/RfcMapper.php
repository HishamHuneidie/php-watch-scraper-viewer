<?php

namespace App\Context\Watch\Application\Mapper;

use App\Common\Mapper\MapperException;
use App\Component\Attribute\Mapper;
use App\Component\Mapper\AbstractMapper;
use App\Component\Mapper\MapperInterface;
use App\Context\Watch\Application\Dto\RfcDto;
use App\Context\Watch\Domain\Entity\Rfc;
use Throwable;

/**
 * @implements MapperInterface<RfcDto, Rfc>
 */
#[Mapper(RfcDto::class, Rfc::class)]
final class RfcMapper extends AbstractMapper
{
    /**
     * @inheritDoc
     */
    public function toEntity(object $dto): object
    {
        try {
            $entity = new Rfc(
                link   : $this->mapper->toEntity($dto->link),
                title  : $dto->title,
                type   : $dto->type,
                version: $dto->version,
                status : $dto->status,
                content: $dto->content,
                phpLink: $this->mapper->toEntity($dto->phpLink),
            );
        } catch (Throwable $e) {
            throw new MapperException('Error mapping RfcDto -> Rfc');
        }

        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function fromEntity(object $entity): object
    {
        try {
            $dto = new RfcDto(
                link   : $this->mapper->fromEntity($entity->getLink()),
                title  : $entity->getTitle(),
                type   : $entity->getType(),
                version: $entity->getVersion(),
                status : $entity->getStatus(),
                content: $entity->getContent(),
                phpLink: $this->mapper->fromEntity($entity->getPhpLink()),
            );
        } catch (Throwable $e) {
            throw new MapperException('Error mapping Rfc -> RfcDto');
        }

        return $dto;
    }

}
