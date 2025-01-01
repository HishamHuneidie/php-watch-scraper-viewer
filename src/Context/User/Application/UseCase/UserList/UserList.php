<?php

namespace App\Context\User\Application\UseCase\UserList;

use App\Common\Mapper\MapperException;
use App\Common\Repository\RepositoryException;
use App\Component\Mapper\MapperInterface;
use App\Context\User\Application\Dto\UserDto;
use App\Context\User\Application\Mapper\UserMapper;
use App\Context\User\Domain\Repository\UserRepositoryInterface;
use App\Context\User\Infrastructure\Persistence\Repository\UserRepository;

/**
 * UseCase that search all users with no filters
 */
final readonly class UserList
{

    /**
     * @param UserRepository $userRepository
     * @param UserMapper     $mapper
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

