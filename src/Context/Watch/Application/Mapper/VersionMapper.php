<?php

namespace App\Context\Watch\Application\Mapper;

use App\Common\Mapper\MapperException;
use App\Component\Attribute\Mapper;
use App\Component\Mapper\AbstractMapper;
use App\Component\Mapper\MapperInterface;
use App\Context\Watch\Application\Dto\ReleaseVoDto;
use App\Context\Watch\Application\Dto\VersionDto;
use App\Context\Watch\Domain\Entity\ReleaseVo;
use App\Context\Watch\Domain\Entity\Version;
use Throwable;

/**
 * @implements MapperInterface<VersionDto, Version>
 */
#[Mapper(VersionDto::class, Version::class)]
class VersionMapper extends AbstractMapper
{
    /**
     * @inheritDoc
     */
    public function toEntity(object $dto): object
    {
        try {
            $entity = new Version(
                versionNumber: $dto->versionNumber,
                link         : $dto->link,
                status       : $dto->status,
                release      : new ReleaseVo(
                    versionNumber: $dto->release->versionNumber,
                    link         : $dto->release->link,
                    date         : $dto->release->date,
                    listLink     : $dto->release->listLink,
                ),
            );
        } catch (Throwable $e) {
            throw new MapperException('Error mapping VersionDto -> Version');
        }

        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function fromEntity(object $entity): object
    {
        try {
            $dto = new VersionDto(
                versionNumber: $entity->getVersionNumber(),
                link         : $entity->getLink(),
                status       : $entity->getStatus(),
                release      : new ReleaseVoDto(
                    versionNumber: $entity->getRelease()->getVersionNumber(),
                    link         : $entity->getRelease()->getLink(),
                    date         : $entity->getRelease()->getDate(),
                    listLink     : $entity->getRelease()->getListLink(),
                ),
            );
        } catch (Throwable $e) {
            throw new MapperException('Error mapping Version -> VersionDto');
        }

        return $dto;
    }

}
