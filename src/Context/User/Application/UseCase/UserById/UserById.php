<?php

namespace CodeAnalyzer\Context\User\Application\UseCase\UserById;

use CodeAnalyzer\Common\Mapper\MapperException;
use CodeAnalyzer\Common\Repository\RepositoryException;
use CodeAnalyzer\Common\ValueObject\IdVo;
use CodeAnalyzer\Common\ValueObject\ValueObjectException;
use CodeAnalyzer\Component\Mapper\MapperInterface;
use CodeAnalyzer\Context\User\Application\Dto\UserDto;
use CodeAnalyzer\Context\User\Application\Mapper\UserMapper;
use CodeAnalyzer\Context\User\Domain\Repository\UserRepositoryInterface;
use CodeAnalyzer\Context\User\Infrastructure\Persistence\Repository\UserRepository;

/**
 * UseCase that search one user by ID
 */
final readonly class UserById
{

    /**
     * @param UserRepository $userRepository
     * @param UserMapper $mapper
     */
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private MapperInterface         $mapper,
    ) {}

    /**
     * @throws RepositoryException|ValueObjectException|MapperException
     */
    public function execute(string $id): UserDto
    {
        $user = $this->userRepository->findById(
            id: new IdVo($id),
        );

        return $this->mapper->fromEntity($user);
    }
}