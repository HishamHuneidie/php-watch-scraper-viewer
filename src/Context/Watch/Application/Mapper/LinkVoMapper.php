<?php

namespace App\Context\Watch\Application\Mapper;

use App\Common\Mapper\MapperException;
use App\Component\Attribute\Mapper;
use App\Component\Mapper\AbstractMapper;
use App\Component\Mapper\MapperInterface;
use App\Context\Watch\Application\Dto\LinkVoDto;
use App\Context\Watch\Domain\Entity\LinkVo;
use Throwable;

/**
 * @implements MapperInterface<LinkVoDto, LinkVo>
 */
#[Mapper(LinkVoDto::class, LinkVo::class)]
final class LinkVoMapper extends AbstractMapper
{
    private const SLASH_ESCAPED = '---';
    private const SLASH_NORMAL  = '/';

    /**
     * @inheritDoc
     */
    public function toEntity(object $dto): object
    {
        $normalLink = str_replace(self::SLASH_ESCAPED, self::SLASH_NORMAL, $dto->getValue());

        try {
            $entity = LinkVo::create($normalLink);
        } catch (Throwable $e) {
            throw new MapperException('Error mapping LinkVoDto -> LinkVo');
        }

        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function fromEntity(object $entity): object
    {
        $escapedLink = str_replace(self::SLASH_NORMAL, self::SLASH_ESCAPED, $entity->getValue());

        try {
            $dto = LinkVoDto::create($escapedLink);
        } catch (Throwable $e) {
            throw new MapperException('Error mapping LinkVo -> LinkVoDto');
        }

        return $dto;
    }

}
