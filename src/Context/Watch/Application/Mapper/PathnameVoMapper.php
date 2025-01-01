<?php

namespace App\Context\Watch\Application\Mapper;

use App\Common\Mapper\MapperException;
use App\Component\Attribute\Mapper;
use App\Component\Mapper\AbstractMapper;
use App\Component\Mapper\MapperInterface;
use App\Context\Watch\Application\Dto\EscapedPathnameVoDto;
use App\Context\Watch\Domain\Entity\PathnameVo;
use Throwable;

/**
 * @implements MapperInterface<EscapedPathnameVoDto, PathnameVo>
 */
#[Mapper(EscapedPathnameVoDto::class, PathnameVo::class)]
final class PathnameVoMapper extends AbstractMapper
{
    private const SLASH_ESCAPED = '---';
    private const SLASH_NORMAL  = '/';

    /**
     * @inheritDoc
     */
    public function toEntity(object $dto): object
    {
        $normalPathname = str_replace(self::SLASH_ESCAPED, self::SLASH_NORMAL, $dto->getValue());

        try {
            $entity = PathnameVo::create($normalPathname);
        } catch (Throwable $e) {
            throw new MapperException('Error mapping PathnameVoDto -> PathnameVo');
        }

        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function fromEntity(object $entity): object
    {
        $escapedPathname = str_replace(self::SLASH_NORMAL, self::SLASH_ESCAPED, $entity->getValue());

        try {
            $dto = EscapedPathnameVoDto::create($escapedPathname);
        } catch (Throwable $e) {
            throw new MapperException('Error mapping PathnameVo -> PathnameVoDto');
        }

        return $dto;
    }

}
