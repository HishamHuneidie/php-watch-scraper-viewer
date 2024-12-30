<?php

namespace CodeAnalyzer\Context\User\Application\UseCase\UserList;

use CodeAnalyzer\Common\Mapper\MapperException;
use CodeAnalyzer\Common\Repository\RepositoryException;
use CodeAnalyzer\Component\Mapper\MapperInterface;
use CodeAnalyzer\Context\User\Application\Dto\UserDto;
use CodeAnalyzer\Context\User\Application\Mapper\UserMapper;
use CodeAnalyzer\Context\User\Domain\Repository\UserRepositoryInterface;
use CodeAnalyzer\Context\User\Infrastructure\Persistence\Repository\UserRepository;

/**
 * UseCase that search all users with no filters
 */
final readonly class UserList
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
     * @return UserDto[]
     * @throws RepositoryException|MapperException
     */
    public function execute(): array
    {
        $userList = $this->userRepository->find();

        return $this->mapper->fromEntityList($userList);
    }
}

