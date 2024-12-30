<?php

namespace CodeAnalyzer\Context\User\Application\Mapper;

use CodeAnalyzer\Common\Mapper\MapperException;
use CodeAnalyzer\Common\Util\GlobalConfig;
use CodeAnalyzer\Common\ValueObject\IdVo;
use CodeAnalyzer\Component\Attribute\Mapper;
use CodeAnalyzer\Component\Mapper\AbstractMapper;
use CodeAnalyzer\Component\Mapper\MapperInterface;
use CodeAnalyzer\Context\User\Application\Dto\UserDto;
use CodeAnalyzer\Context\User\Domain\Entity\User;
use CodeAnalyzer\Context\User\Domain\Entity\UserStatus;
use DateTime;
use Throwable;

/**
 * @implements MapperInterface<UserDto, User>
 */
#[Mapper(UserDto::class, User::class)]
final class UserMapper extends AbstractMapper
{
    /**
     * @inheritDoc
     */
    public function toEntity(object $dto): object
    {
        try {
            $entity = new User(
                id:        new IdVo($dto->id),
                username:  $dto->username,
                email:     $dto->email,
                password:  $dto->password,
                status:    UserStatus::fromName($dto->status),
                createdAt: new DateTime($dto->createdAt),
            );
        } catch (Throwable $e) {
            throw new MapperException("Error mapping UserDto -> User");
        }

        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function fromEntity(object $entity): object
    {
        try {
            $dto = new UserDto(
                id:        $entity->getId()->getValue(),
                username:  $entity->getUsername(),
                email:     $entity->getEmail(),
                password:  $entity->getPassword(),
                status:    $entity->getStatus()->value,
                createdAt: $entity->getCreatedAt()->format(GlobalConfig::DATE_FORMAT_DEFAULT),
            );
        } catch (Throwable $e) {
            throw new MapperException("Error mapping User -> UserDto");
        }

        return $dto;
    }
}