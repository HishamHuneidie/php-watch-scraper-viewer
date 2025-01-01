<?php

namespace App\Context\User\Application\UseCase\UserById;

use App\Common\Mapper\MapperException;
use App\Common\Repository\RepositoryException;
use App\Common\ValueObject\IdVo;
use App\Common\ValueObject\ValueObjectException;
use App\Component\Mapper\MapperInterface;
use App\Context\User\Application\Dto\UserDto;
use App\Context\User\Application\Mapper\UserMapper;
use App\Context\User\Domain\Repository\UserRepositoryInterface;
use App\Context\User\Infrastructure\Persistence\Repository\UserRepository;

/**
 * UseCase that search one user by ID
 */
final readonly class UserById
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